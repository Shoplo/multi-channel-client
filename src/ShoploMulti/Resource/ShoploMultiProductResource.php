<?php

namespace ShoploMulti\Resource;

use ShoploMulti\Model\Collection\ShoploMultiProductImagesCollection;
use ShoploMulti\Model\Collection\ShoploMultiProductsCollection;
use ShoploMulti\Model\Collection\ShoploMultiProductVariantsCollection;
use ShoploMulti\Model\Collection\ShoploMultiProductVariantsPropertiesCollection;
use ShoploMulti\Model\Product\ShoploMultiProduct;
use ShoploMulti\ShoploMultiClient;

class ShoploMultiProductResource
{
    /** @var  ShoploMultiClient */
    private $shoploMultiClient;

    /**
     * ShoploMultiProductResource constructor.
     *
     * @param ShoploMultiClient $shoploMultiClient
     */
    public function __construct(ShoploMultiClient $shoploMultiClient)
    {
        $this->shoploMultiClient = $shoploMultiClient;
    }

    public function getProductsUrl($id = 0, $parameters = [])
    {
        $filterParams = empty($parameters)
            ? ''
            : '?'.http_build_query(
                $parameters
            );

        return $id ? '/v1/public/products/'.$id.$filterParams
            : '/v1/public/products'.$filterParams;
    }

    public function getProductImagesUrl($id)
    {
        return '/v1/public/products/'.$id.'/images';
    }

    public function getProductVariantsUrl($id, $variantId = null)
    {
        return $variantId ? '/v1/public/products/'.$id.'/variants/'.$variantId
            : '/v1/public/products/'.$id.'/variants';
    }

    public function getProductVariantsPropertiesUrl($id)
    {
        return '/v1/public/products/'.$id.'/variants-properties';
    }

    public function getProduct($id, $parameters = [])
    {
        return $this->shoploMultiClient->get(
            ShoploMultiProduct::class,
            $this->getProductsUrl($id, $parameters),
            $parameters
        );
    }

    public function getProductVariant($id, $variantId)
    {
        return $this->shoploMultiClient->get(
            ShoploMultiProduct::class,
            $this->getProductVariantsUrl($id, $variantId)
        );
    }

    public function getProductImages($id)
    {
        return $this->shoploMultiClient->get(
            ShoploMultiProductImagesCollection::class,
            $this->getProductImagesUrl($id)
        );
    }

    public function getProductVariants($id)
    {
        return $this->shoploMultiClient->get(
            ShoploMultiProductVariantsCollection::class,
            $this->getProductVariantsUrl($id)
        );
    }

    public function getProductVariantsProperties($id)
    {
        return $this->shoploMultiClient->get(
            ShoploMultiProductVariantsPropertiesCollection::class,
            $this->getProductVariantsPropertiesUrl($id)
        );
    }

    public function getProducts($parameters = [])
    {
        return $this->shoploMultiClient->get(
            ShoploMultiProductsCollection::class,
            $this->getProductsUrl(0, $parameters),
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
        /** @var ShoploMultiProductsCollection $productsCollection */
        $productsCollection = $this->shoploMultiClient->get(
            ShoploMultiProductsCollection::class,
            $this->getProductsUrl(0, $parameters),
            $parameters
        );

        return $productsCollection->total;
    }
}