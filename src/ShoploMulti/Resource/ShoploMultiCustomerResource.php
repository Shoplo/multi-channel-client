<?php

namespace ShoploMulti\Resource;

use ShoploMulti\Model\Collection\ShoploMultiCustomersCollection;
use ShoploMulti\Model\Customer\ShoploMultiCustomer;
use ShoploMulti\ShoploMultiClient;

class ShoploMultiCustomerResource
{
    /** @var  ShoploMultiClient */
    private $shoploMultiClient;

    /**
     * ShoploMultiOrderResource constructor.
     *
     * @param ShoploMultiClient $shoploMultiClient
     */
    public function __construct(ShoploMultiClient $shoploMultiClient)
    {
        $this->shoploMultiClient = $shoploMultiClient;
    }

    public function getCustomersUrl($id = 0, $parameters = [])
    {
        $filterParams = empty($parameters)
            ? ''
            : '?'.http_build_query(
                $parameters
            );

        return $id ? '/v1/public/customers/'.$id.$filterParams
            : '/v1/public/customers'.$filterParams;
    }

    public function getCustomer($id, $parameters = [])
    {
        return $this->shoploMultiClient->get(
            ShoploMultiCustomer::class,
            $this->getCustomersUrl($id, $parameters),
            $parameters
        );
    }

    public function getCustomers($parameters = [])
    {
        return $this->shoploMultiClient->get(
            ShoploMultiCustomersCollection::class,
            $this->getCustomersUrl(0, $parameters),
            $parameters
        );
    }

    /**
     * @param array $parameters
     *
     * @return int
     */
    public function getCount($parameters = [])
    {
        /** @var ShoploMultiCustomersCollection $customersCollection */
        $customersCollection = $this->shoploMultiClient->get(
            ShoploMultiCustomersCollection::class,
            $this->getCustomersUrl(0, $parameters),
            $parameters
        );

        return $customersCollection->total;
    }
}