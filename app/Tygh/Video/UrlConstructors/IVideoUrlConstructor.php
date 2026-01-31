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

namespace Tygh\Video\UrlConstructors;

/**
 *  IVideoUrlConstructor.
 *
 * @package Tygh\Video\UrlConstructors
 */
interface IVideoUrlConstructor
{
    /**
     * Returns Video URL ID.
     *
     * @param string $video_url Video URL
     *
     * @return string|null
     */
    public function getUrlId($video_url);

    /**
     * Build video URL by video URL ID.
     *
     * @param string $video_id Video URL ID.
     *
     * @return array<string, string>
     */
    public function buildVideoUrlById($video_id);

    /**
     * Build video preview URL by video URL ID.
     *
     * @param string $video_id Video URL ID.
     *
     * @return string
     */
    public function buildPreviewUrlByVideoID($video_id);

    /**
     * Build video preview URL by video URL.
     *
     * @param string $video_url Video URL ID.
     *
     * @return string|bool
     */
    public function buildPreviewUrlByVideoUrl($video_url);

    /**
     * Build video URL for request video data.
     *
     * @param string $video_url Video URL ID.
     *
     * @return string|bool
     */
    public function buildVideoUrlForRequestData($video_url);
}
