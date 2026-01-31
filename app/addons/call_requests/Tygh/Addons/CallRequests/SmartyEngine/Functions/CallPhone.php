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

class CallPhone extends Base
{
    /**
     * phpcs:ignore
     * @param array    $params   Modifier args
     * @param Template $template Template
     *
     * @return string
     */
    //phpcs:ignore
    public function handle($params, Template $template)
    {
        $phone = fn_call_requests_get_splited_phone();

        return '<span><span class="ty-cr-phone-prefix">' . $phone['prefix'] . '</span>' . $phone['postfix'] . '</span>';
    }
}
