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

namespace Tygh\SmartyEngine\Filters\Pre;

use Smarty\Filter\FilterInterface;
use Smarty\Template;

class Script implements FilterInterface
{
    /**
     * @param string   $code     Code
     * @param Template $template Template
     *
     * phpcs:ignore
     * @return array|mixed|string|string[]
     */
    public function filter($code, Template $template)
    {
        $pattern = '/\<script([^>]*)\>.*?\<\/script\>/s';
        if (preg_match_all($pattern, $code, $matches)) {
            $m = $matches[0];
            $m_attrs = $matches[1];
            $has_literals = strpos($code, '{literal}');
            foreach ($m as $index => $match) {
                if (!strpos($m_attrs[$index], 'data-no-defer')) {
                    $inline_wrapper_open = '{inline_script}';
                    $inline_wrapper_close = '{/inline_script}';
                    // Check if script was wrapped by the {literal} tag
                    if ($has_literals !== false) {
                        $end_pos = strpos($code, $match);
                        // Calculate literals count to detect if script is between {literal}
                        // If end_pos is equal to 0, {literal} tag inside <script>, so skip it
                        if ($end_pos !== 0 && $end_pos !== false) {
                            $open_tags = substr_count($code, '{literal}', 0, $end_pos);
                            $close_tags = substr_count($code, '{/literal}', 0, $end_pos);
                            if ($open_tags !== $close_tags) {
                                $inline_wrapper_open = '{/literal}' . $inline_wrapper_open . '{literal}';
                                $inline_wrapper_close = '{/literal}' . $inline_wrapper_close . '{literal}';
                            }
                        }
                    }
                    $code = str_replace($match, $inline_wrapper_open . $match . $inline_wrapper_close, $code);
                }
            }
        }

        return $code;
    }
}
