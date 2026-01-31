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

use Exception;
use Smarty\FunctionHandler\Base;
use Smarty\Template;

class EvalString extends Base
{
    /**
     * Evaluates string which contains smarty syntax and falls back to custom error message instead fatal error
     *
     * @param array{var: string} $params   Function args
     * @param Template           $template Template
     *
     * @return string
     */
    //phpcs:ignore
    public function handle($params, Template $template)
    {
        $smarty = $template->getSmarty();

        fn_set_hook('smarty_eval_string_pre', $params, $smarty);

        try {
            $contents = $smarty->fetch('string:' . $params['var']);
        } catch (Exception $e) {
            $contents = $e->getMessage();
        }

        return $contents;
    }
}
