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

namespace Tygh\Addons\CallRequests\SmartyEngine\Functions;

use Smarty\FunctionHandler\Base;
use Smarty\Template;

class CallRequest extends Base
{
    /**
     * phpcs:ignore
     * @param array    $params   Modifier args
     * @param Template $template Template
     *
     * @return string
     *
     * @throws \Smarty\Exception Smarty exception.
     */
    //phpcs:ignore
    public function handle($params, Template $template)
    {
        $params = array_merge([
            'link_text' => __('call_requests.request_call'),
            'product'  => false,
        ], $params);

        $smarty = $template->getSmarty();

        $new_template = $smarty->createTemplate('addons/call_requests/views/call_requests/components/popup.tpl', null, null, $template);

        foreach ($params as $key => &$value) {
            $new_template->assign($key, $value);
        }

        return $new_template->fetch();
    }
}
