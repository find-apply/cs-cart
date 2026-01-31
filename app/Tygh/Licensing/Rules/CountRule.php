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

class CountRule
{
    /**
     * @var int
     */
    private $count;

    /**
     * @param int $count Max limit
     */
    public function __construct($count)
    {
        $this->count = $count;
    }

    /**
     * @param int $current_count Count
     *
     * @return bool
     */
    public function isAllowed($current_count)
    {
        if ($current_count === null) {
            return false;
        }

        return $current_count < $this->count;
    }
}
