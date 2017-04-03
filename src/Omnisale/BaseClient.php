<?php

namespace Omnisale;


use Omnisale\Guzzle\GuzzleClient;

class BaseClient
{
    public $logger;

    const SERVER_URI = 'https://api.shoplo.io';
    const REQUEST_TOKEN_URI = self::SERVER_URI . '/oauth/v2/auth';
    const ACCESS_TOKEN_URI = self::SERVER_URI . '/oauth/v2/token';

    /** @var  GuzzleClient */
    public $apiClient;

    /**
     * BaseRemoteAPI constructor.
     * @param GuzzleClient $apiClient
     */
    public function __construct(GuzzleClient $apiClient)
    {
        $this->apiClient = $apiClient;
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
        return $id ? self::SERVER_URI . '/v1/orders/' . $id . $filterParams : self::SERVER_URI . '/v1/orders' . $filterParams;
    }

    public function getCustomersUrl($id = 0, $parameters = [])
    {
        $filterParams = empty($parameters) ? '' : '?' . http_build_query($parameters);
        return $id ? self::SERVER_URI . '/v1/customers/' . $id . $filterParams : self::SERVER_URI . '/v1/customers' . $filterParams;
    }

    public function getProductsUrl($id = 0, $parameters = [])
    {
        $filterParams = empty($parameters) ? '' : '?' . http_build_query($parameters);
        return $id ? self::SERVER_URI . '/v1/products/' . $id . $filterParams : self::SERVER_URI . '/v1/products' . $filterParams;
    }

    public function getUserUrl()
    {
        return self::SERVER_URI . '/v1/me';
    }

    public function get( $url, $parameters = [], $headers = [] )
    {
        return $this->apiClient->get($url, $parameters, $headers);
    }

    public function put( $url, $parameters = [], $headers = [] )
    {
        return $this->apiClient->put($url, $parameters, $headers);
    }

    public function post( $url, $parameters = [], $headers = [] )
    {
        return $this->apiClient->post($url, $parameters, $headers);
    }

    public function postWithBody( $url, $parameters = [], $headers = [] )
    {
        return $this->apiClient->postWithBody($url, $parameters, $headers);
    }

    public function delete( $url )
    {
        return $this->apiClient->delete($url);
    }
}