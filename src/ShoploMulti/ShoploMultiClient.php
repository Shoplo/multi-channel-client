<?php

namespace ShoploMulti;

use JMS\Serializer\SerializerInterface;
use ShoploMulti\Model\User\ShoploMultiUser;
use SSOAuth\SSOAuthClient;

class ShoploMultiClient
{
    /** @var  ShoploMultiAdapterInterface */
    private $shoploMultiAdapterInterface;

    /** @var  SerializerInterface */
    public $serializer;
    public $apiBaseUri;

    /** @var SSOAuthClient */
    public $ssoAuthClient;

    /**
     * ShoploMultiClient constructor.
     *
     * @param $shoploMultiAdapterInterface
     * @param $serializer
     * @param $apiBaseUri
     */
    public function __construct(
        $shoploMultiAdapterInterface,
        $serializer,
        $apiBaseUri
    ) {
        $this->shoploMultiAdapterInterface = $shoploMultiAdapterInterface;
        $this->serializer                  = $serializer;

        $this->apiBaseUri = $apiBaseUri;
    }

    public function initSSOAuthClient($config)
    {
        $guzzleAuthConfig = [
            'base_uri' => $config['apiBaseUrl'],
        ];

        $guzzleAdapter       = new \SSOAuth\Guzzle\GuzzleAdapter(
            new \GuzzleHttp\Client($guzzleAuthConfig)
        );
        $this->ssoAuthClient = new \SSOAuth\SSOAuthClient(
            $guzzleAdapter,
            $config
        );
    }

    public function requestToken($returnUrl = false)
    {
        return $this->ssoAuthClient->requestToken($returnUrl);
    }

    public function accessToken($code)
    {
        return $this->ssoAuthClient->getAccessToken($code);
    }

    public function authorize($returnUrl = false)
    {
        if (isset($_GET['code']) && isset($_GET['app_id'])) {
            $rsp = $this->accessToken($_GET['code']);

            $this->shoploMultiAdapterInterface->setSSOAppId($_GET['app_id']);
            $this->shoploMultiAdapterInterface->setAccessToken(
                $rsp['access_token']
            );

            return $rsp;
        } else {
            return $this->requestToken($returnUrl);
        }
    }

    private function getUserUrl()
    {
        return '/v1/public/me';
    }

    public function getUser()
    {
        return $this->get(
            ShoploMultiUser::class,
            $this->getUserUrl()
        );
    }

    public function get($type, $url, $parameters = [], $headers = [])
    {
        $response = $this->shoploMultiAdapterInterface->get(
            $url,
            $parameters,
            $headers
        );

        return $this->serializer->deserialize($response, $type, 'json');
    }

    public function put($url, $data = [], $headers = [])
    {
        return $this->shoploMultiAdapterInterface->put($url, $data, $headers);
    }

    public function post($url, $data = [], $headers = [])
    {
        return $this->shoploMultiAdapterInterface->post($url, $data, $headers);
    }

    public function delete($url)
    {
        return $this->shoploMultiAdapterInterface->delete($url);
    }
}