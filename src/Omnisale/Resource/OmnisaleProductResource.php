<?php

namespace Omnisale\Resource;

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

    public function getProducts($id = 0, $parameters = [])
    {
        $productsUrl = $this->omnisaleClient->getProductsUrl($id, $parameters);
        $response = $this->omnisaleClient->apiClient->get($productsUrl, $parameters);

        $results = [];
        foreach( $response['_items'] as $k => $v ){
            $results[$k] = new OmnisaleProduct($v);
            print_r($results[$k]);exit;
        }

        return $results;
    }
}