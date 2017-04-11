<?php

namespace Omnisale\Resource;

use Omnisale\Model\Collection\OmnisaleProductsCollection;
use Omnisale\Model\Product\OmnisaleProduct;
use Omnisale\OmnisaleClient;

class OmnisaleProductResource
{
    /** @var  OmnisaleClient */
    private $omnisaleClient;

    /**
     * OmnisaleProductResource constructor.
     * @param OmnisaleClient $omnisaleClient
     */
    public function __construct(OmnisaleClient $omnisaleClient)
    {
        $this->omnisaleClient = $omnisaleClient;
    }

    public function getProduct($id)
    {
        $productsUrl = $this->omnisaleClient->getProductsUrl($id);
        $response = $this->omnisaleClient->apiClient->get($productsUrl);

        return $this->omnisaleClient->serializer->deserialize($response, OmnisaleProduct::class, 'json');
    }

    public function getProducts($parameters = [])
    {
        $productsUrl = $this->omnisaleClient->getProductsUrl(0, $parameters);
        $response = $this->omnisaleClient->apiClient->get($productsUrl, $parameters);

        return $this->omnisaleClient->serializer->deserialize($response, OmnisaleProductsCollection::class, 'json');
    }
}