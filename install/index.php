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

$php_value = phpversion();
if (version_compare($php_value, '7.4.0', '<') || version_compare($php_value, '8.4.0', '>=')) {
    echo 'Your current PHP version ' . $php_value . ' isn\'t supported. CS-Cart supports PHP from 7.4 and up to (but not including) 8.4.0';
    die();
}

@include('run.php');

define('INSTALLER_STARTED', true);
