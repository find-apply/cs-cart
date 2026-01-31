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

use Tygh\Enum\Addons\VendorDataPremoderation\ProductStatuses;
use Tygh\Enum\ObjectStatuses;
use Tygh\Registry;

defined('BOOTSTRAP') or die('Access denied');

/**
 * @var array $request
 */
$request = $_REQUEST;

/** @var array $schema */
$schema['ebay.manage']['ebay_logs'] = [
    'href'     => 'ebay.product_logs',
    'text'     => __('ebay.actions.logs'),
    'position' => 100
];

$schema['ebay.manage']['ebay_products'] = [
    'href'     => 'products.manage?ebay_template_id=any',
    'text'     => __('ebay.actions.products'),
    'position' => 200
];


// Orders
$schema['orders.manage']['get_ebay_orders'] = [
    'href'     => 'ebay.get_orders',
    'position' => 1000,
    'text'     => __('ebay.actions.get_ebay_orders'),
    'data'     => [
        'data-ca-target-form' => 'orders_list_form'
    ]
];

// Products
if (
    !empty($request['dispatch'])
    && $request['dispatch'] === 'products.manage'
    && (
        empty($request['status'])
        || (
            Registry::get('addons.vendor_data_premoderation.status') === ObjectStatuses::ACTIVE
            && $request['status'] !== ProductStatuses::REQUIRES_APPROVAL
            && $request['status'] !== ProductStatuses::DISAPPROVED
        )
    )
) {
    $schema['products.manage']['export_products_to_ebay'] = [ // If the products are available
        'position' => 1000,
        'text'     => __('ebay.actions.export_products_to_ebay'),
        'class'    => 'cm-process-items cm-submit cm-ajax cm-comet',
        'dispatch' => 'dispatch[ebay.end_products]',
        'data'     => [
            'data-ca-target-form' => 'manage_products_form',
            'data-ca-dispatch'    => 'dispatch[ebay.export]'
        ]
    ];

    $schema['products.manage']['ebay_end_products_on_ebay'] = [ // If the products are available
        'position' => 1100,
        'text'     => __('ebay.actions.end_products_on_ebay'),
        'class'    => 'cm-process-items cm-submit cm-ajax cm-comet',
        'dispatch' => 'dispatch[ebay.end_products]',
        'data'     => [
            'data-ca-target-form' => 'manage_products_form',
            'data-ca-dispatch'    => 'dispatch[ebay.export]'
        ]
    ];

    $schema['products.manage']['ebay_sync_products_status'] = [ // If the products are available
        'position' => 1200,
        'text'     => __('ebay.actions.sync_products_status'),
        'class'    => 'cm-process-items cm-submit cm-ajax cm-comet',
        'dispatch' => 'dispatch[ebay.end_products]',
        'data'     => [
            'data-ca-target-form' => 'manage_products_form',
            'data-ca-dispatch'    => 'dispatch[ebay.export]'
        ]
    ];
}

return $schema;
