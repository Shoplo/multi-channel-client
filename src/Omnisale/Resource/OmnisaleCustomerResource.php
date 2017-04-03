<?php

namespace Omnisale\Resource;


use Omnisale\Model\Customer\OmnisaleCustomer;
use Omnisale\OmnisaleClient;

class OmnisaleCustomerResource
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

    public function getCustomers($id = 0, $parameters = [])
    {
        $customersUrl = $this->omnisaleClient->getCustomersUrl($id, $parameters);
        $response = $this->omnisaleClient->apiClient->get($customersUrl, $parameters);

        $results = [];
        foreach( $response['_items'] as $k => $v ){

            $results[$k] = new OmnisaleCustomer($v);
        }

        return $results;
    }
}