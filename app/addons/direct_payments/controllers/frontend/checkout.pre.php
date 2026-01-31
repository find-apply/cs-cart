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

use Tygh\Enum\NotificationSeverity;

defined('BOOTSTRAP') or die('Access denied');

/** @var \Tygh\Addons\DirectPayments\Cart\Service $cart_service */
$cart_service = Tygh::$app['addons.direct_payments.cart.service'];

if ($mode === 'place_order') {
    if (!isset($_REQUEST['vendor_id'])) {
        // If direct_payments addon is on, vendor_id should always be passed with 'place_order' request.
        fn_set_notification(NotificationSeverity::ERROR, __('error'), __('direct_payments.no_vendor_id_in_request'));

        return [CONTROLLER_STATUS_NO_PAGE];
    }
}

/**
 * Override cart and data associated to it in session by same data for current vendor.
 */
$cart_service->overrideSessionDataByVendorData();

return [CONTROLLER_STATUS_OK];
