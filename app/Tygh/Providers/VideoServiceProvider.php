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
use Tygh\Tygh;
use Tygh\Video\VideoManager;

/**
 * The provider class that registers video manager in the Tygh::$app container.
 *
 * @package Tygh\Providers
 */
class VideoServiceProvider implements ServiceProviderInterface
{
    /**
     * @param \Pimple\Container $app Application container
     *
     * @return void
     *
     * @psalm-suppress ParamNameMismatch,ArgumentTypeCoercion
     */
    public function register(Container $app)
    {
        $app['video.video_manager'] = static function () {
            $sources_data = [];
            $video_sources = fn_get_schema('video', 'available_providers');

            foreach ($video_sources as $source => $source_data) {
                if (isset($source_data['url_constructor_class']) && class_exists($source_data['url_constructor_class'])) {
                    $sources_data[$source]['url_constructor_class'] = new $source_data['url_constructor_class']();
                }
            }

            return new VideoManager($sources_data);
        };
    }

    /**
     * @return \Tygh\Video\VideoManager
     */
    public static function getVideoManager()
    {
        return Tygh::$app['video.video_manager'];
    }
}
