<?php
/**
 * Created by PhpStorm.
 * User: adrianadamiec
 * Date: 03.04.2017
 * Time: 10:00
 */

namespace ShoploMulti\Resource;


use ShoploMulti\Model\Collection\ShoploMultiOrdersCollection;
use ShoploMulti\Model\Order\ShoploMultiOrder;
use ShoploMulti\Model\Order\ShoploMultiOrderFulfillments;
use ShoploMulti\ShoploMultiClient;

class ShoploMultiOrderResource
{
    /** @var  ShoploMultiClient */
    private $shoploMultiClient;

    /**
     * ShoploMultiOrderResource constructor.
     * @param ShoploMultiClient $shoploMultiClient
     */
    public function __construct(ShoploMultiClient $shoploMultiClient)
    {
        $this->shoploMultiClient = $shoploMultiClient;
    }

    public function getOrdersUrl($id = 0, $parameters = [])
    {
        $filterParams = empty($parameters) ? '' : '?' . http_build_query($parameters);
        return $id ? '/v1/public/orders/' . $id . $filterParams : '/v1/public/orders' . $filterParams;
    }

    public function getOrdersFulfillmentsUrl($id, $fulfillmentId = 0, $parameters = [])
    {
        $filterParams = empty($parameters) ? '' : '?' . http_build_query($parameters);
        $url = '/v1/public/orders/' . $id . '/fulfillments';
        if( $fulfillmentId ) $url .= '/' . $fulfillmentId;

        return $url . $filterParams;
    }

    public function getOrder($id, $parameters = [])
    {
        return $this->shoploMultiClient->get(ShoploMultiOrder::class, $this->getOrdersUrl($id, $parameters), $parameters);
    }

    public function createOrderFullfilments($id, ShoploMultiOrderFulfillments $fulfillments)
    {
        $data = $this->shoploMultiClient->serializer->serialize($fulfillments, 'json');
        return $this->shoploMultiClient->post($this->getOrdersFulfillmentsUrl($id), $data);
    }

    public function updateOrderFullfilments($id, ShoploMultiOrderFulfillments $fulfillments)
    {
        $parameters = $this->shoploMultiClient->serializer->serialize($fulfillments, 'json');

        return $this->shoploMultiClient->post($this->getOrdersFulfillmentsUrl($id, $fulfillments->id), $parameters);
    }

    /**
     * @param $id
     * @param ShoploMultiOrder $order
     * @return mixed
     */
    public function updateOrder($id, ShoploMultiOrder $order)
    {
        $data = $this->shoploMultiClient->serializer->serialize($order, 'json');

        return $this->shoploMultiClient->put($this->getOrdersUrl($id), $data);
    }

    public function deleteOrderFullfilments($id, $fulfillmentId)
    {
        return $this->shoploMultiClient->delete($this->getOrdersFulfillmentsUrl($id, $fulfillmentId));
    }

    /**
     * @param array $parameters
     * @return ShoploMultiOrdersCollection
     */
    public function getOrders($parameters = [])
    {
        return $this->shoploMultiClient->get(ShoploMultiOrdersCollection::class, $this->getOrdersUrl(0, $parameters), $parameters);
    }

    /**
     * @param array $parameters
     * @return int
     */
    public function getCount($parameters = [])
    {
        /** @var ShoploMultiOrdersCollection $ordersCollection */
        $ordersCollection = $this->shoploMultiClient->get(ShoploMultiOrdersCollection::class, $this->getOrdersUrl(0, $parameters), $parameters);
        return $ordersCollection->total;
    }
}