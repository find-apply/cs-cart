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

namespace Tygh\SmartyEngine;

use Smarty\Resource\FilePlugin;
use Smarty\Template;
use Smarty\Template\Source;

class FileResource extends FilePlugin
{
    /**
     * Allows to override template source with addons
     *
     * @param Source        $source    Source
     * @param Template|null $_template Template
     */
    public function populate(Source $source, Template $_template = null)
    {
        if ($_template !== null) {
            /** @var Core $smarty */
            $smarty = $_template->getSmarty();
            $overridden_resource = fn_addon_template_overrides($source->resource, $smarty);

            if ($overridden_resource != $source->resource) {
                $source->name = $overridden_resource;
                $source->resource = $overridden_resource;
            }
        }

        parent::populate($source, $_template);
    }
}
