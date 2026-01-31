<?php
/***************************************************************************
*                                                                          *
*   (c) 2004 Vladimir V. Kalynyak, Alexey V. Vinokurov, Ilya M. Shalnev    *
*                                                                          *
* This  is  commercial  software,  only  users  who have purchased a valid *
* license  and  accept  to the terms of the  License Agreement can install *
* and use this program.                                                    *
*                                                                          *
****************************************************************************
* PLEASE READ THE FULL TEXT  OF THE SOFTWARE  LICENSE   AGREEMENT  IN  THE *
* "copyright.txt" FILE PROVIDED WITH THIS DISTRIBUTION PACKAGE.            *
****************************************************************************/

namespace Tygh\Addons\Stripe\Webhook\Handlers;

use Exception;
//phpcs:ignore
use Stripe\PaymentIntent;
use Tygh\Addons\Stripe\Webhook\Handler;
use Stripe\Event;
use Tygh\Enum\OrderStatuses;
use Tygh\Registry;
use Tygh\Tygh;

class PaymentIntentSucceeded implements Handler
{
    /**
     * Handles the payment_intent.succeeded event
     *
     * @param Event $event Stripe event
     *
     * @return void
     */
    public function handle(Event $event)
    {
        /** @var PaymentIntent $payment_intent */
        $payment_intent = $event->data->object;

        try {
            if (
                empty($payment_intent->metadata['order_id'])
                || empty($payment_intent->metadata['payment_type'])
                || $payment_intent->metadata['payment_type'] !== 'stripe'
            ) {
                return;
            }

            /** @var \Tygh\Lock\Factory $lock_factory */
            $lock_factory = Tygh::$app['lock.factory'];
            $lock = $lock_factory->createLock('stripe_handle_order_status_' . $payment_intent->metadata['order_id'], 60.0);
            if (!$lock->acquire()) {
                do {
                    $lock->wait();
                } while (!$lock->acquire());
            }

            if (fn_allowed_for('ULTIMATE')) {
                Registry::set('runtime.company_id', false);
            }

            /** @var array $order_info */
            $order_info = fn_get_order_info((int) $payment_intent->metadata['order_id']);
            $settled_order_statuses = fn_get_settled_order_statuses();

            if (
                $order_info
                && !in_array($order_info['status'], $settled_order_statuses)
            ) {
                fn_change_non_settled_order_status($order_info, OrderStatuses::PAID);
            }

            $lock->release();
        } catch (Exception $e) {
            fn_log_event('general', 'runtime', [
                'message' => __('stripe.webhook_handle_error', [
                    '[error]' => $e->getMessage(),
                ]),
            ]);
        }
    }
}
