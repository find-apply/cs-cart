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

namespace Tygh\SmartyEngine\Filters\Post;

use Smarty\Filter\FilterInterface;
use Smarty\Template;

class Translation implements FilterInterface
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
        /* @see \Tygh\SmartyEngine\Modifiers\Translate::compile */
        if (preg_match_all('/getModifierCallback\(\"__\"\)\(\"([\w\.]*?)\"/i', $code, $matches)) {
            return "<?php\n\Tygh\Languages\Helper::preloadLangVars(array('" . implode("','", $matches[1]) . "'));\n?>\n" . $code;
        }

        return $code;
    }
}
