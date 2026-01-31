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

namespace Tygh\SmartyEngine\Blocks;

use Smarty\BlockHandler\BlockHandlerInterface;
use Smarty\Template;

class InlineScript implements BlockHandlerInterface
{
    /**
     * phpcs:ignore
     * @param array    $params   Params
     * @param string   $content  Content
     * @param Template $template Template
     * @param bool     $repeat   Repeat
     *
     * phpcs:ignore
     * @return mixed|string|null
     */
    //phpcs:ignore
    public function handle($params, $content, Template $template, &$repeat)
    {
        return smarty_block_inline_script($params, $content, $repeat);
    }

    /**
     * @return true
     */
    public function isCacheable(): bool
    {
        return true;
    }
}
