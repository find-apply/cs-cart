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

/*
    'use_case' => [
        'controller' => [
            // list of modes as strings (if empty - all modes are allowed)
            'mode1',
            'mode2',
            ...
        ]
    ]
 */

return [
    'use_vendor_id_from_request' => [
        'checkout' => []
    ]
];
