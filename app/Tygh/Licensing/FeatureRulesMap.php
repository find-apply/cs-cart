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

namespace Tygh\Licensing;

use Tygh\Licensing\Rules\CountRule;

class FeatureRulesMap
{
    /**
     * @param string $feature Value of Feature enum
     * @param string $rule    Rule class
     *
     * @return \Closure|null
     */
    public static function getHandler($feature, $rule)
    {
        $map = [
            Features::ADD_STOREFRONT => [
                CountRule::class => static function () {
                    return db_get_field('SELECT COUNT(*) FROM ?:storefronts');
                }
            ]
        ];

        return $map[$feature][$rule] ?? null;
    }
}
