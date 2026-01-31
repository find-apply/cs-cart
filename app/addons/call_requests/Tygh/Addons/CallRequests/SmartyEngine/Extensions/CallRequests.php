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

namespace Tygh\Addons\CallRequests\SmartyEngine\Extensions;

use Smarty\Extension\Base;
use Smarty\FunctionHandler\FunctionHandlerInterface;
use Tygh\Addons\CallRequests\SmartyEngine\Functions\CallPhone;
use Tygh\Addons\CallRequests\SmartyEngine\Functions\CallRequest;

class CallRequests extends Base
{
    /** @var array<string, ?FunctionHandlerInterface> $function_handlers */
    private $function_handlers = [];

    /**
     * @param string $function_name Func name
     */
    public function getFunctionHandler(string $function_name): ?FunctionHandlerInterface
    {
        if (isset($this->function_handlers[$function_name])) {
            return $this->function_handlers[$function_name];
        }

        //phpcs:disable
        switch ($function_name) {
            case 'call_phone':   $this->function_handlers[$function_name] = new CallPhone(); break;
            case 'call_request': $this->function_handlers[$function_name] = new CallRequest(); break;
        }
        //phpcs:enable

        return $this->function_handlers[$function_name] ?? null;
    }
}
