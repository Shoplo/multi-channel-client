<?php

namespace ShoploMulti;


use JMS\Serializer\SerializerBuilder;
use ShoploMulti\Guzzle\GuzzleClient;
use ShoploMulti\Parser\JsonClassHintingNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class BaseClient
{
    public $logger;

    const SERVER_URI = 'https://api.shoplo.io';
    const REQUEST_TOKEN_URI = self::SERVER_URI . '/oauth/v2/auth';
    const ACCESS_TOKEN_URI = self::SERVER_URI . '/oauth/v2/token';

    /** @var  GuzzleClient */
    public $apiClient;

    /** @var  \JMS\Serializer\Serializer */
    public $serializer;

    /**
     * BaseRemoteAPI constructor.
     * @param GuzzleClient $apiClient
     */
    public function __construct(GuzzleClient $apiClient)
    {
        $this->apiClient = $apiClient;

        $this->serializer = SerializerBuilder::create()->build();
    }

    public function setLogger($logger)
    {
        $this->logger = $logger;
    }

    public function getRequestTokenUrl()
    {
        return self::REQUEST_TOKEN_URI;
    }

    public function getAccessTokenUrl()
    {
        return self::ACCESS_TOKEN_URI;
    }

    public function getOrdersUrl($id = 0, $parameters = [])
    {
        $filterParams = empty($parameters) ? '' : '?' . http_build_query($parameters);
        return $id ? self::SERVER_URI . '/v1/public/orders/' . $id . $filterParams : self::SERVER_URI . '/v1/public/orders' . $filterParams;
    }

    public function getOrdersFulfillmentsUrl($id, $fulfillmentId = 0, $parameters = [])
    {
        $filterParams = empty($parameters) ? '' : '?' . http_build_query($parameters);
        $url = self::SERVER_URI . '/v1/public/orders/' . $id . '/fulfillments';
        if( $fulfillmentId ) $url .= '/' . $fulfillmentId;

        return $url . $filterParams;
    }

    public function getCustomersUrl($id = 0, $parameters = [])
    {
        $filterParams = empty($parameters) ? '' : '?' . http_build_query($parameters);
        return $id ? self::SERVER_URI . '/v1/public/customers/' . $id . $filterParams : self::SERVER_URI . '/v1/public/customers' . $filterParams;
    }

    public function getProductsUrl($id = 0, $parameters = [])
    {
        $filterParams = empty($parameters) ? '' : '?' . http_build_query($parameters);
        return $id ? self::SERVER_URI . '/v1/public/products/' . $id . $filterParams : self::SERVER_URI . '/v1/public/products' . $filterParams;
    }

    public function getUserUrl()
    {
        return self::SERVER_URI . '/v1/public/me';
    }


}