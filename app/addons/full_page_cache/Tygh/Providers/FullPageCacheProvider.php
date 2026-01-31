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

namespace Tygh\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Tygh\Addons\FullPageCache\Addon;
use Tygh\Addons\FullPageCache\Provider\VarnishProvider;
use Tygh\Application;
use Tygh\Registry;
use Tygh\Tygh;

/**
 * Class FullPageCacheProvider registers components used by "Full-page cache" add-on at Application container.
 *
 * @package Tygh\Providers
 */
final class FullPageCacheProvider implements ServiceProviderInterface
{
    /**
     * @inheritdoc
     *
     * @return void
     */
    public function register(Container $pimple)
    {
        Tygh::$app['addons.full_page_cache'] = static function (Application $app) {
            return new Addon(
                fn_get_schema('full_page_cache', 'varnish'),
                Tygh::$app['addons.full_page_cache.provider']
            );
        };

        Tygh::$app['addons.full_page_cache.provider'] = static function (Application $app) {
            $params = fn_explode(':', Registry::get('addons.full_page_cache.varnish_host'));
            $varnish_host = reset($params);
            $varnish_port = isset($params[1]) ? (int) $params[1] : 80;

            return new VarnishProvider($varnish_host, $varnish_port);
        };
    }
}
