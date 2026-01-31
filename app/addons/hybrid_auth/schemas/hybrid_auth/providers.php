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

use Tygh\Enum\YesNo;
use Tygh\Registry;

/** @var array $schema */
$schema = [
    'google' => [
        'provider' => 'Google',
        'callback' => fn_url('auth.process?hauth_done=Google'), // For backward compatibility
        'keys' => [
            'id' => [
                'db_field' => 'app_id',
                'label'    => 'id',
                'required' => true
            ],
            'secret' => [
                'db_field' => 'app_secret_key',
                'label'    => 'secret_key',
                'required' => true
            ],
        ],
        'params' => [
            'google_callback' => [
                'type'     => 'template',
                'template' => 'addons/hybrid_auth/components/callback_url.tpl',
                'callback_url' => '/' . Registry::get('config.customer_index') . '?dispatch=auth.process&hauth_done=Google',
            ]
        ],
        'instruction' => 'hybrid_auth.instruction_google'
    ],
    'facebook' => [
        'provider' => 'Facebook',
        'callback' => fn_url('auth.process?hauth_done=Facebook'), // For backward compatibility
        'keys' => [
            'id' => [
                'db_field' => 'app_id',
                'label'    => 'id',
                'required' => true
            ],
            'secret' => [
                'db_field' => 'app_secret_key',
                'label'    => 'secret_key',
                'required' => true
            ],
        ],
        'params' => [
            'facebook_oauth_redirect_uris' => [
                'type'     => 'template',
                'template' => 'addons/hybrid_auth/components/callback_url.tpl',
                'callback_url' => '/' . Registry::get('config.customer_index') . '?dispatch=auth.process&hauth_done=Facebook',
                'label'    => __('hybrid_auth.facebook_oauth_redirect_uris'),
            ]
        ],
        'instruction' => 'hybrid_auth.instruction_facebook_login',
    ],
    'twitter' => [
        'provider' => 'Twitter',
        'display_name' => 'X', // FIXME: this field is used because hybrid_auth lib still didn't update Twitter. Remove when lib is updated.
        'icon_name' => 'x', // FIXME: this field is used because hybrid_auth lib still didn't update Twitter. Remove when lib is updated.
        'callback' => fn_url('/auth/twitter'), // For backward compatibility
        'keys' => [
            'key' => [
                'db_field' => 'app_id',
                'label'    => 'id',
                'required' => true
            ],
            'secret' => [
                'db_field' => 'app_secret_key',
                'label'    => 'secret_key',
                'required' => true
            ],
        ],
        'params' => [
            'twitter_callback' => [
                'type'         => 'template',
                'template'     => 'addons/hybrid_auth/components/callback_url.tpl',
                'callback_url' => '/auth/twitter',
            ]
        ],
        'instruction' => 'hybrid_auth.instruction_x'
    ],
    'telegram' => [
        'provider' => 'Telegram',
        'keys' => [
            'id' => [
                'db_field' => 'app_id',
                'label'    => 'hybrid_auth.telegram.bot_id',
                'required' => true
            ],
            'secret' => [
                'db_field' => 'app_secret_key',
                'label'    => 'hybrid_auth.telegram.bot_token',
                'required' => true
            ]
        ],
        'instruction' => 'hybrid_auth.instruction_telegram'
    ],
];

return $schema;
