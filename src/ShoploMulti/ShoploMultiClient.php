<?php

namespace ShoploMulti;
use JMS\Serializer\SerializerInterface;
use ShoploMulti\Model\User\ShoploMultiUser;

class ShoploMultiClient
{
    /** @var  ShoploMultiAdapterInterface */
    private $shoploMultiAdapterInterface;

    /** @var  SerializerInterface */
    public $serializer;

    public $publicKey;
    public $secretKey;
    public $callbackUrl;
    public $accessToken;
    public $refreshToken;
    public $apiBaseUri;
    public $scope;

    /**
     * ShoploMultiClient constructor.
     * @param $shoploMultiAdapterInterface
     * @param $serializer
     * @param $config
     */
    public function __construct($shoploMultiAdapterInterface, $serializer, $config)
    {
        $this->shoploMultiAdapterInterface = $shoploMultiAdapterInterface;
        $this->serializer = $serializer;

        $this->publicKey = $config['publicKey'];
        $this->secretKey = $config['secretKey'];
        $this->callbackUrl = $config['callbackUrl'];
        $this->accessToken = $config['accessToken'];
        $this->refreshToken = $config['refreshToken'];
        $this->apiBaseUri = $config['apiBaseUrl'];
        $this->scope = $config['scope'];
    }

    public function authorize($returnUrl = false)
    {
        if( isset($_GET['code']) && isset($_GET['state']) )
            return $this->getAccessToken($_GET['code'], $_GET['state']);
        else
            return $this->requestToken($returnUrl);
    }

    private function getUserUrl()
    {
        return '/v1/public/me';
    }

    public function getUser()
    {
        return $this->get(ShoploMultiUser::class, $this->getUserUrl());
    }

    private function getRequestTokenUrl()
    {
        return $this->apiBaseUri . '/oauth/v2/auth';
    }

    private function getAccessTokenUrl( $params )
    {
        $query  = http_build_query($params);
        return '/oauth/v2/token?' . $query;
    }

    public function getAccessToken($code, $state)
    {
        $params = [
            'client_id'     => $this->publicKey,
            'client_secret' => $this->secretKey,
            'code'          => $code,
            'grant_type'    => 'authorization_code',
            'redirect_uri'  => $this->callbackUrl,
            'state'         => $state,
        ];

        $response = $this->shoploMultiAdapterInterface->get($this->getAccessTokenUrl($params), $params);
        return json_decode($response, true);
    }

    public function requestToken($returnUrl = false)
    {
        $queryParameters = [
            'client_id'     => $this->publicKey,
            'redirect_uri'  => $this->callbackUrl,
            'response_type' => 'code',
            'scope'         => $this->scope,
            'state'         => 6960840,
        ];

        $query = http_build_query($queryParameters);
        $authUrl = $this->getRequestTokenUrl() . '?' . $query;

        if( $returnUrl ) return $authUrl;
        header("Location: {$authUrl}");
        exit;
    }

    public function refreshToken($refreshToken)
    {
        $params = [
            'refresh_token' => $refreshToken,
            'client_id'     => $this->publicKey,
            'client_secret' => $this->secretKey,
            'grant_type'    => 'refresh_token',
            'redirect_uri'  => $this->callbackUrl,
        ];

        $response = $this->shoploMultiAdapterInterface->get($this->getAccessTokenUrl($params), $params);
        return json_decode($response, true);
    }

    public function get( $type, $url, $parameters = [], $headers = [] )
    {
        $response = $this->shoploMultiAdapterInterface->get($url, $parameters, $headers);
        return $this->serializer->deserialize($response, $type, 'json');
    }

    public function put( $url, $data = [], $headers = [] )
    {
        return $this->shoploMultiAdapterInterface->put($url, $data, $headers);
    }

    public function post( $url, $data = [], $headers = [] )
    {
        return $this->shoploMultiAdapterInterface->post($url, $data, $headers);
    }

    public function delete( $url )
    {
        return $this->shoploMultiAdapterInterface->delete($url);
    }
}