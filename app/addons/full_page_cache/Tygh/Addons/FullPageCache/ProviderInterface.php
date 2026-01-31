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

namespace Tygh\Addons\FullPageCache;

/**
 * Interface ProviderInterface
 *
 * @package Tygh\Addons\FullPageCache
 */
interface ProviderInterface
{
    /**
     * Gets HTTP header that contains cache dependecies for the current page.
     *
     * @param int           $ttl          Cache time to live on seconds.
     * @param array<string> $tags         List of cache tags
     * @param bool          $is_allow_esi Whether the use ESI
     *
     * @return string[]
     */
    public function buildPageHeaders($ttl = 180, array $tags = [], $is_allow_esi = false);

    /**
     * Invalidates all cache records that are marked with any of the given tags.
     *
     * @param array<string> $tags List of cache tags
     *
     * @return bool
     */
    public function invalidateCacheByTags(array $tags);

    /**
     * @return bool Whether the current request is an ESI request.
     */
    public function isEsiRequest();

    /**
     * Wraps given block contents with ESI directives.
     *
     * @param string $url           Block render URL
     * @param string $block_content Block content
     * @param bool   $debug         Enable debug
     *
     * @return string ESI XML tags.
     */
    public function renderESIBlock($url, $block_content, $debug = false);
}
