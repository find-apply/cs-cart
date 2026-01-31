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

namespace Tygh\Api\Entities;

use Tygh\Api\AEntity;
use Tygh\Api\Response;

class Versions extends AEntity
{
    /**
     * @param string        $id     Entity id
     * @param array<string> $params Request params
     *
     * @return array{status: int, data: string[]}
     */
    // phpcs:ignore
    public function index($id = '', $params = [])
    {
        return [
            'status' => Response::STATUS_OK,
            'data'   => [
                '1.0',
                '2.0',
                '2.1',
                '4.0',
                '4.1'
            ]
        ];
    }

    /**
     * @param array<string> $params Request params
     *
     * @return array{status: int, data: array<void>}
     */
    // phpcs:ignore
    public function create($params)
    {
        return [
            'status' => Response::STATUS_METHOD_NOT_ALLOWED,
            'data'   => []
        ];
    }

    /**
     * @param int           $id     Entity id
     * @param array<string> $params Request params
     *
     * @return array{status: int, data: array<void>}
     */
    // phpcs:ignore
    public function update($id, $params)
    {
        return [
            'status' => Response::STATUS_METHOD_NOT_ALLOWED,
            'data'   => []
        ];
    }

    /**
     * @param int $id Entity id
     *
     * @return array{status: int, data: array<void>}
     */
    public function delete($id)
    {
        return [
            'status' => Response::STATUS_METHOD_NOT_ALLOWED,
            'data'   => []
        ];
    }

    /**
     * @return array<string, bool>
     */
    public function privilegesCustomer()
    {
        return [
            'index'  => true,
            'create' => false,
            'update' => false,
            'delete' => false,
        ];
    }

    /**
     * @return array<string, bool>
     */
    public function privileges()
    {
        return [
            'index'  => true,
            'create' => false,
            'update' => false,
            'delete' => false,
        ];
    }
}
