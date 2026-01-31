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

namespace Tygh\SmartyEngine\Modifiers;

use Smarty\Compile\Modifier\Base;
use Smarty\Compiler\Template;

class Translate extends Base
{
    /**
     * phpcs:ignore
     * @param array    $params   Params
     * @param Template $compiler Compiler
     *
     * @return string
     */
    //phpcs:ignore
    public function compile($params, Template $compiler)
    {
        $var = $params[0];
        $_params = $params[1] ?? '[]';
        $lang_code = $params[2] ?? '$_smarty_tpl->getSmarty()->getLanguage()';

        $compiler->setRawOutput(true);

        /* @see \Tygh\SmartyEngine\Filters\Post\Translation::filter */
        return '$_smarty_tpl->getSmarty()->getModifierCallback("__")' . "({$var}, {$_params}, {$lang_code})";
    }
}
