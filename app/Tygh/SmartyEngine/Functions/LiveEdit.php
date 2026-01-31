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
use Tygh\Registry;

class LiveEdit extends Base
{
    /**
     * phpcs:ignore
     * @param array{name: string, phrase: string, need_render: bool, input_type: string} $params   Function args
     * @param Template                                                                   $template Template
     *
     * @return string|void
     */
    //phpcs:ignore
    public function handle($params, Template $template)
    {
        if (Registry::get('runtime.customization_mode.live_editor') && !empty($params['name'])) {
            $content = ' data-ca-live-editor-obj="' . $params['name'] . '"';

            if (!empty($params['phrase'])) {
                $phrase = htmlspecialchars($params['phrase']);
                $content .= ' data-ca-live-editor-phrase="' . $phrase . '"';
            }

            if (!empty($params['need_render'])) {
                $content .= ' data-ca-live-editor-need-render="true"';
            }

            if (!empty($params['input_type'])) {
                $content .= ' data-ca-live-editor-input-type="' . $params['input_type'] . '"';
            }

            return $content;
        }
    }
}
