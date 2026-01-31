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

defined('BOOTSTRAP') or die('Access denied');

/** @var array $schema */
$schema['my_account']['session_dependent'] = true;
$schema['cart_content']['session_dependent'] = true;
$schema['html_block']['session_dependent'] = true;
$schema['currencies']['session_dependent'] = true;
$schema['languages']['session_dependent'] = true;

if (isset($schema['geo_maps_customer_location'])) {
    $schema['geo_maps_customer_location']['session_dependent'] = true;
}

if (isset($schema['location_selector'])) {
    $schema['location_selector']['session_dependent'] = true;
}

if (isset($schema['closest_vendors'])) {
    $schema['closest_vendors']['session_dependent'] = true;
}

return $schema;
