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

use Tygh\Providers\LicensingProvider;
use Tygh\Registry;

defined('BOOTSTRAP') or die('Access denied');

/**
 * @param string $feature Value of \Tygh\Licensing\Features
 *
 * @return bool
 */
function fn_upsell_is_upsellable($feature)
{
    if (ACCOUNT_TYPE !== 'admin' || !Registry::get('settings.Upgrade_center.license_number')) {
        return false;
    }

    $feature = fn_strtolower($feature);

    $upsell_features = fn_get_schema('upsell', 'upsell_features');

    if (!in_array($feature, $upsell_features)) {
        return false;
    }

    $current_plan = LicensingProvider::getLicensingService()->getCurrentPlan();

    return isset($current_plan->getFeatureCollection()[$feature]) && !fn_is_allowed($feature);
}
