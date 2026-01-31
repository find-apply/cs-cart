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

use Tygh\Tygh;

defined('BOOTSTRAP') or die('Access denied');

//phpcs:ignore
$add_storefront_handler = static function ($default_value) {
    if ($storefronts_limit = fn_get_storage_data('allowed_number_of_stores')) {
        /** @var \Tygh\Storefront\Repository $repository */
        $repository = Tygh::$app['storefront.repository'];
        $storefronts_count = $repository->getCount();

        return $storefronts_count < $storefronts_limit;
    }

    return $default_value;
};

//phpcs:ignore
$addon_full_page_cache_handler = static function () {
    if (fn_get_storage_data('used_full_page_cache_addon')) {
        return true;
    }

    return false;
};

return [];
