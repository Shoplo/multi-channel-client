<?php
/**
 * Created by PhpStorm.
 * User: adrianadamiec
 * Date: 03.04.2017
 * Time: 10:00
 */

namespace Omnisale\Resource;


use Omnisale\Model\Collection\OmnisaleOrdersCollection;
use Omnisale\Model\Order\OmnisaleOrder;
use Omnisale\Model\Order\OmnisaleOrderFulfillments;
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
     * @param integer $id
     * @return OmnisaleOrder
     */
    public function getOrder($id, $parameters)
    {
        $ordersUrl = $this->omnisaleClient->getOrdersUrl($id, $parameters);
        $response = $this->omnisaleClient->apiClient->get($ordersUrl);

        return $this->omnisaleClient->serializer->deserialize($response, OmnisaleOrder::class, 'json');
    }


    public function createOrderFullfilments($id, OmnisaleOrderFulfillments $fulfillments)
    {
        $ordersUrl = $this->omnisaleClient->getOrdersFulfillmentsUrl($id);
        $data = $this->omnisaleClient->serializer->serialize($fulfillments, 'json');

        return $this->omnisaleClient->apiClient->post($ordersUrl, $data);
    }

    /**
     * @param array $parameters
     * @return OmnisaleOrdersCollection
     */
    public function getOrders($parameters = [])
    {
        $ordersUrl = $this->omnisaleClient->getOrdersUrl(0, $parameters);
        $response = $this->omnisaleClient->apiClient->get($ordersUrl, $parameters);

        return $this->omnisaleClient->serializer->deserialize($response, OmnisaleOrdersCollection::class, 'json');
    }

    /**
     * @param array $parameters
     * @return int
     */
    public function getCount($parameters = [])
    {
        $ordersUrl = $this->omnisaleClient->getOrdersUrl(0, $parameters);
        $response = $this->omnisaleClient->apiClient->get($ordersUrl, $parameters);

        $response = \GuzzleHttp\json_decode($response, true);

        return isset($response['total']) ? $response['total'] : 0;
    }
}