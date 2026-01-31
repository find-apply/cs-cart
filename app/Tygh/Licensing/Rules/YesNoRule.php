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

namespace Tygh\Licensing\Rules;

use Tygh\Enum\YesNo as YesNoEnum;

class YesNoRule
{
    /**
     * @var string
     */
    private $value;

    /**
     * @param string|bool $value YesNo enum
     */
    public function __construct($value)
    {
        $this->value = YesNoEnum::toId($value);
    }

    /**
     * @return bool
     */
    public function isAllowed()
    {
        return YesNoEnum::toBool($this->value);
    }
}
