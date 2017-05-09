<?php

namespace ShoploMulti\Resource;

use ShoploMulti\Model\Collection\ShoploMultiProductsCollection;
use ShoploMulti\Model\Product\ShoploMultiProduct;
use ShoploMulti\ShoploMultiClient;

class ShoploMultiProductResource
{
    /** @var  ShoploMultiClient */
    private $shoploMultiClient;

    /**
     * ShoploMultiProductResource constructor.
     * @param ShoploMultiClient $shoploMultiClient
     */
    public function __construct(ShoploMultiClient $shoploMultiClient)
    {
        $this->shoploMultiClient = $shoploMultiClient;
    }

    public function getProductsUrl($id = 0, $parameters = [])
    {
        $filterParams = empty($parameters) ? '' : '?' . http_build_query($parameters);
        return $id ? '/v1/public/products/' . $id . $filterParams : '/v1/public/products' . $filterParams;
    }

    public function getProduct($id, $parameters = [])
    {
        return $this->shoploMultiClient->get(ShoploMultiProduct::class, $this->getProductsUrl($id, $parameters), $parameters);
    }

    public function getProducts($parameters = [])
    {
        return $this->shoploMultiClient->get(ShoploMultiProductsCollection::class, $this->getProductsUrl(0, $parameters), $parameters);
    }

    /**
     * @param array $parameters
     * @return int
     */
    public function getCount($parameters = [])
    {
        /** @var ShoploMultiProductsCollection $productsCollection */
        $productsCollection = $this->shoploMultiClient->get(ShoploMultiProductsCollection::class, $this->getProductsUrl(0, $parameters), $parameters);
        return $productsCollection->total;
    }
}