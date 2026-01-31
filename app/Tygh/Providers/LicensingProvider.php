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

namespace Tygh\Providers;

use Tygh\Licensing\LicensingService;
//phpcs:ignore
use Tygh\Licensing\Plan;
use Tygh\Tygh;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * The provider class that registers the licensing service in the Tygh::$app container.
 *
 * @package Tygh\Providers
 */
class LicensingProvider implements ServiceProviderInterface
{
    /**
     * @param Container $app App
     */
    public function register(Container $app): void
    {
        $app['licensing.service'] = static function () {
            /** @var Plan[] $plans */
            $plans = fn_get_schema('licensing', 'plans');
            $current_plan_key = fn_get_storage_data('plan');

            foreach ($plans as $plan) {
                if ($plan->getKey() === $current_plan_key) {
                    $current_plan = $plan;
                    break;
                }

                if ($plan->getKey() === 'default') {
                    $current_plan = $plan;
                }
            }

            return new LicensingService($plans, $current_plan);
        };
    }

    /**
     * @return \Tygh\Licensing\LicensingService
     */
    public static function getLicensingService()
    {
        return Tygh::$app['licensing.service'];
    }
}
