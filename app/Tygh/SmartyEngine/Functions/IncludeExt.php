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

namespace Tygh\SmartyEngine\Functions;

use Smarty\FunctionHandler\Base;
use Smarty\Template;

class IncludeExt extends Base
{
    /**
     * Includes template with ability to pass parameters as array.
     * Does not capture variables from global/parent scope unless passed explicitly.
     * phpcs:ignore
     * @param array    $params   Function args
     * @param Template $template Template
     *
     * @return string
     *
     * @throws \Smarty\Exception Exception.
     */
    //phpcs:ignore
    public function handle($params, Template $template)
    {
        /** @see Smarty::createTemplate() $tpl */
        $tpl = $template->getSmarty()->createTemplate($params['file']);
        $tpl->parent = null;
        unset($params['file']);

        $tpl->assign($params['params_array']);
        unset($params['params_array']);

        if (!empty($params)) {
            $tpl->assign($params);
        }

        $tpl->assign([
            'ldelim' => $template->getSmarty()->getLeftDelimiter(),
            'rdelim' => $template->getSmarty()->getRightDelimiter(),
        ]);

        $content = $tpl->fetch();

        if (!empty($params['assign'])) {
            $template->assign($params['assign'], $content);

            return '';
        }

        return $content;
    }
}
