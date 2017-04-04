<?php
/**
 * Created by PhpStorm.
 * User: adrianadamiec
 * Date: 03.04.2017
 * Time: 10:00
 */

namespace Omnisale\Resource;


use Omnisale\Model\Order\OmnisaleOrder;
use Omnisale\OmnisaleClient;

class OmnisaleOrderResource
{
    /** @var  OmnisaleClient */
    private $omnisaleClient;

    /**
     * OmnisaleOrderResource constructor.
     * @param OmnisaleClient $omnisaleClient
     */
    public function __construct(OmnisaleClient $omnisaleClient)
    {
        $this->omnisaleClient = $omnisaleClient;
    }

    /**
     * @param int $id
     * @param array $parameters
     * @return array
     */
    public function getOrders($id = 0, $parameters = [])
    {
        $ordersUrl = $this->omnisaleClient->getOrdersUrl($id, $parameters);
        $response = $this->omnisaleClient->apiClient->get($ordersUrl, $parameters);

        $results = [];
        foreach( $response['items'] as $k => $v ){

            $results[$k] = new OmnisaleOrder($v);
        }

        return $results;
    }
}