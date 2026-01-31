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

class Plan
{
    /**
     * @var string
     */
    private $key;

    /**
     * @var array<string, object>
     */
    private $feature_collection;

    /**
     * @param string                $key                Key
     * @param array<string, object> $feature_collection Feature collection
     */
    public function __construct($key, array $feature_collection)
    {
        $this->key = $key;
        $this->feature_collection = $feature_collection;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }


    /**
     * @return object[]
     */
    public function getFeatureCollection()
    {
        return $this->feature_collection;
    }
}
