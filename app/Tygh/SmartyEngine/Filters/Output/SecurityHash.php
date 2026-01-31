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

namespace Tygh\SmartyEngine\Filters\Output;

use Smarty\Filter\FilterInterface;
use Smarty\Template;

class SecurityHash implements FilterInterface
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
        $code = preg_replace('/<input type="hidden" name="security_hash".*?>/i', '', $code);
        $code = str_replace(
            '</form>',
            '<input type="hidden" name="security_hash" class="cm-no-hide-input" value="' . fn_generate_security_hash() . '" /></form>',
            $code
        );

        return $code;
    }
}
