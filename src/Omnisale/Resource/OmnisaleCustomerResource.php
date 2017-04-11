<?php

namespace Omnisale\Resource;


use Omnisale\Model\Collection\OmnisaleCustomersCollection;
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

    public function getCustomer($id)
    {
        $customersUrl = $this->omnisaleClient->getCustomersUrl($id);
        $response = $this->omnisaleClient->apiClient->get($customersUrl);

        return $this->omnisaleClient->serializer->deserialize($response, OmnisaleCustomer::class, 'json');
    }

    public function getCustomers($parameters = [])
    {
        $customersUrl = $this->omnisaleClient->getCustomersUrl(0, $parameters);
        $response = $this->omnisaleClient->apiClient->get($customersUrl, $parameters);

        return $this->omnisaleClient->serializer->deserialize($response, OmnisaleCustomersCollection::class, 'json');
    }
}