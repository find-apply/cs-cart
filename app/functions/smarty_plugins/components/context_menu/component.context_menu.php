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

use Smarty\Template;
use Tygh\ContextMenu\ContextMenu;
use Tygh\Registry;

defined('BOOTSTRAP') or die('Access denied');

/**
 * @param array<string, string> $params   Block params
 * @param string                $content  Block content
 * @param Template              $template Smarty template
 *
 * @return string
 */
function smarty_component_context_menu_context_menu(array $params, $content, Template $template)
{
    if (!isset($params['object'])) {
        return false;
    }

    $object = $params['object'];
    $schema = fn_get_schema('context_menu', $object);

    if (!$schema) {
        return false;
    }

    $request = $_REQUEST;
    $auth = Tygh::$app['session']['auth'];
    $runtime = Registry::get('runtime');

    $context_menu = ContextMenu::createFromSchema($schema);

    $template->assign(
        [
            'status_selector'    => $context_menu->getStatusSelector(),
            'context_menu_items' => $context_menu->getAvailableItems($request, $auth, $runtime),
            'params'             => $params,
        ]
    );

    /** @var \Tygh\SmartyEngine\Core $smarty */
    $smarty = $template->getSmarty();

    return $smarty->fetch($context_menu->getTemplate(), null, null, $template);
}
