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

//phpcs:ignore
$schema = [
    'Vimeo' => [
        'source_name'           => 'Vimeo',
        'url_constructor_class' => '\Tygh\Video\UrlConstructors\VimeoUrlConstructor',
    ],
    'Youtube' => [
        'source_name'           => 'YouTube',
        'url_constructor_class' => '\Tygh\Video\UrlConstructors\YoutubeUrlConstructor',
    ],
];

return $schema;
