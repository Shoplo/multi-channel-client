<?php

namespace Omnisale\Guzzle;

use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;

class GuzzleClient
{
    private $accessToken;
    /** @var  \GuzzleHttp\Client */
    private $guzzle;

    private $apiLimiter;

    private $storage;

    /**
     * @var \JMS\Serializer\SerializerInterface
     */
    private $serializer;

    /**
     * @var
     */
    private $publicKey;
    /**
     * @var
     */
    private $secretKey;
    /**
     * @var null
     */
    private $callbackUrl;
    /**
     * @var null
     */
    private $refreshToken;
    /**
     * @var
     */
    private $apiBaseUri;

    private $scope;


    public function __construct($config)
    {
        $this->serializer = SerializerBuilder::create()->build();
        $this->guzzle = new \GuzzleHttp\Client([
            'base_uri' => $config['apiBaseUrl'],
            'headers'  => $this->getHeaders(),
        ]);

        $this->publicKey = $config['publicKey'];
        $this->secretKey = $config['secretKey'];
        $this->callbackUrl = $config['callbackUrl'];
        $this->accessToken = $config['accessToken'];
        $this->refreshToken = $config['refreshToken'];
        $this->apiBaseUri = $config['apiBaseUrl'];
        $this->scope = $config['scope'];
    }


    public function getHeaders()
    {
        return !$this->accessToken ? [] : [
            'Authorization'             => "Bearer {$this->accessToken}",
            'Content-Type'              => 'application/json; charset=utf-8',
        ];
    }

    public function get($url, $parameters = [], $headers = [])
    {
        $headers = array_merge($headers, $this->getHeaders());

        $rsp = $this->guzzle->request(
            'GET',
            $url,
            [
                'auth'    => 'oauth',
                'headers' => $headers,
            ]
        );

        return $rsp->getBody()->getContents();
    }

    public function put($url, $data = [], $headers = [])
    {
        try
        {
            $headers = array_merge($headers, $this->getHeaders());

            if (is_object($data))
            {
                $data = $this->serializer->serialize($data, 'array');
            }

            try
            {
                $rsp = $this->guzzle->request(
                    'PUT',
                    $url,
                    [
                        'json'    => $data,
                        'auth'    => 'oauth',
                        'headers' => $headers,
                    ]
                );
            }
            catch (\GuzzleHttp\Exception\RequestException $e)
            {
                $r = (string)$e->getResponse()->getBody();
                throw $e;
            }

            return $rsp->getBody();
        }
        catch (\Exception $e)
        {
            throw $e;
        }
    }

    public function post($url, $data = [], $headers = [], $isMultipart = true)
    {
        try
        {
            $headers = array_merge($headers, $this->getHeaders());
            $rsp = $this->guzzle->request(
                'POST',
                $url,
                [
                    'auth'                                       => 'oauth',
                    'headers'                                    => $headers,
                    'body'                                       => $data,
                ]
            );

            return $rsp->getBody();
        }
        catch (\Exception $e)
        {
            throw $e;
        }
    }

    /**
     * @param $url
     * @param array $data
     * @param array $headers
     *
     * @return mixed
     */
    public function postWithBody($url, $data = [], $headers = [])
    {
        try
        {
            $headers = array_merge($headers, $this->getHeaders());

            $rsp = $this->guzzle->request(
                'POST',
                $url,
                [
                    'body'    => json_encode($data),
                    'auth'    => 'oauth',
                    'headers' => $headers,
                ]
            );

            return $rsp->getBody();
        }
        catch (\Exception $e)
        {
            throw $e;
        }
    }

    public function delete($url, $headers = [])
    {
        try
        {
            $headers = array_merge($headers, $this->getHeaders());
            $rsp     = $this->guzzle->delete($url, [
                'auth'    => 'oauth',
                'headers' => $headers,
            ]);

            $json = \GuzzleHttp\json_decode($rsp->getBody(), true);

            return $json;
        }
        catch (\Exception $e)
        {
            throw $e;
        }
    }

    public function getAccessToken($accessTokenUrl, $code, $state)
    {
        $params = [
            'client_id'     => $this->publicKey,
            'client_secret' => $this->secretKey,
            'code'          => $code,
            'grant_type'    => 'authorization_code',
            'redirect_uri'  => $this->callbackUrl,
            'state'         => $state,
        ];

        $client = new \GuzzleHttp\Client();

        try {

            $rsp = $client->post($accessTokenUrl, ['form_params'=>$params]);

            return json_decode($rsp->getBody()->getContents(), true);

        } catch( \Exception $e ) {

            throw $e;
        }
    }

    public function refreshToken($refreshTokenUrl, $refreshToken)
    {
        $params = [
            'refresh_token' => $refreshToken,
            'client_id'     => $this->publicKey,
            'client_secret' => $this->secretKey,
            'grant_type'    => 'refresh_token',
            'redirect_uri'  => $this->callbackUrl,
        ];

        $client = new \GuzzleHttp\Client();

        try {

            $rsp = $client->post($refreshTokenUrl, ['form_params'=>$params]);

            return json_decode($rsp->getBody()->getContents(), true);

        } catch( \Exception $e ) {

            throw $e;
        }
    }

    public function requestToken($requestTokenUrl, $returnUrl = false)
    {
        $queryParameters = [
            'client_id'     => $this->publicKey,
            'redirect_uri'  => $this->callbackUrl,
            'response_type' => 'code',
            'scope'         => $this->scope,
            'state'         => 6960840,
        ];

        $query = http_build_query($queryParameters);
        $authUrl = $requestTokenUrl . '?' . $query;

        if( $returnUrl ) return $authUrl;
        header("Location: {$authUrl}");
        exit;
    }

}