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

use Tygh\Registry;

fn_register_hooks(
    'render_block_pre',
    'render_block_post',
    'dispatch_before_send_response',
    'dispatch_before_display',
    'registry_save_pre',
    'register_cache',
    'user_init',
    'init_currency_pre',
    'clear_cache_post',
    'db_query_executed',
    'sucess_user_login',
    'user_logout_after',
    'update_customization_mode',
    ['get_route', 1],
    ['get_route_runtime', 1]
);

fn_init_stack([
    static function () {
        Registry::set('runtime.full_page_cache.inited', true);
    }
]);
