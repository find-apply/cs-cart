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

// key is field in the data base, for value see \Tygh\Gdpr\DataModifier\UserPersonalDataAnonymizer::modifyValue
$schema = array(
    'email'          => '%rand%@example.com',
    'firstname'      => '*',
    'lastname'       => '*',
    'b_firstname'    => '*',
    'b_lastname'     => '*',
    'b_address'      => '*',
    'b_address_2'    => '*',
    'b_city'         => '*',
    'b_country'      => '*',
    'b_state'        => '*',
    'b_county'       => '',
    'b_zipcode'      => '*',
    'b_phone'        => '0000000000',
    's_firstname'    => '*',
    's_lastname'     => '*',
    's_address'      => '*',
    's_address_2'    => '*',
    's_city'         => '*',
    's_country'      => '*',
    's_state'        => '*',
    's_county'       => '',
    's_zipcode'      => '*',
    's_phone'        => '0000000000',
    's_address_type' => '',
    'phone'          => '0000000000',
    'fax'            => '',
    'url'            => '*',
    'ip_address'     => '1.2.3.4',
    'b_state_descr'  => '',
    's_state_descr'  => '',
    'address'        => '*',
    'address_2'      => '*',
    'city'           => '*',
    'country'        => '*',
    'state'          => '*',
    'county'         => '',
    'zipcode'        => '*',
    'country_descr'  => '',
    'state_descr'    => '',
    'birthday'       => '',
    'user_login'     => '*',
    'name'           => '*',
);

return $schema;
