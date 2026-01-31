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

use Tygh\Licensing\Features;

defined('BOOTSTRAP') or die('Access denied');

$schema[] = Features::MASTER_PRODUCTS;
$schema[] = Features::VENDOR_RATING;
$schema[] = Features::VENDOR_CATEGORIES_FEE;
$schema[] = Features::VENDOR_PRIVILEGES;
$schema[] = Features::DIRECT_PAYMENTS;
$schema[] = Features::ORDER_FULFILLMENT;

return $schema;
