<?php

namespace ShoploMulti\Guzzle;

use ShoploMulti\Exception\ExceptionManager;
use ShoploMulti\ShoploMultiAdapterInterface;

class GuzzleAdapter implements ShoploMultiAdapterInterface
{
    private $accessToken;
    private $ssoAppId;
    /** @var  \GuzzleHttp\Client */
    private $guzzle;

    public function __construct(
        \GuzzleHttp\Client $guzzle,
        $accessToken = null,
        $ssoAppId = null
    ) {
        $this->guzzle      = $guzzle;
        $this->accessToken = $accessToken;
        $this->ssoAppId    = $ssoAppId;
    }

    /**
     * @param null $accessToken
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * @param null $ssoAppId
     */
    public function setSSOAppId($ssoAppId)
    {
        $this->ssoAppId = $ssoAppId;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return ! $this->accessToken && $this->ssoAppId
            ? []
            : [
                'Authorization' => "Bearer {$this->accessToken}",
                'app-id'        => $this->ssoAppId,
                'Content-Type'  => 'application/json; charset=utf-8',
            ];
    }

    /**
     * @param       $url
     * @param array $parameters
     * @param array $headers
     *
     * @return string
     * @throws \Exception
     * @throws \ShoploMulti\Exception\BackendException
     * @throws \ShoploMulti\Exception\NotFoundException
     * @throws \ShoploMulti\Exception\ValidationException
     */
    public function get($url, $parameters = [], $headers = [])
    {
        $headers = array_merge($headers, $this->getHeaders());

        try {
            $rsp = $this->guzzle->request(
                'GET',
                $url,
                [
                    'headers' => $headers,
                ]
            );

            return $rsp->getBody()->getContents();
        } catch (\GuzzleHttp\Exception\ServerException $e) {
            ExceptionManager::throwException($e);
        }
    }

    /**
     * @param       $url
     * @param array $data
     * @param array $headers
     *
     * @return string
     * @throws \Exception
     * @throws \ShoploMulti\Exception\BackendException
     * @throws \ShoploMulti\Exception\NotFoundException
     * @throws \ShoploMulti\Exception\ValidationException
     */
    public function put($url, $data = [], $headers = [])
    {
        try {
            $headers = array_merge($headers, $this->getHeaders());
            $rsp     = $this->guzzle->request(
                'PUT',
                $url,
                [
                    'headers' => $headers,
                    'body'    => $data,
                ]
            );

            return $rsp->getBody()->getContents();
        } catch (\Exception $e) {
            ExceptionManager::throwException($e);
        }
    }

    /**
     * @param       $url
     * @param array $data
     * @param array $headers
     *
     * @return string
     * @throws \Exception
     * @throws \ShoploMulti\Exception\BackendException
     * @throws \ShoploMulti\Exception\NotFoundException
     * @throws \ShoploMulti\Exception\ValidationException
     */
    public function post($url, $data = [], $headers = [])
    {
        try {
            $headers = array_merge($headers, $this->getHeaders());
            $rsp     = $this->guzzle->request(
                'POST',
                $url,
                [
                    'headers' => $headers,
                    'body'    => $data,
                ]
            );

            return $rsp->getBody()->getContents();
        } catch (\Exception $e) {
            ExceptionManager::throwException($e);
        }
    }

    /**
     * @param       $url
     * @param array $headers
     *
     * @return mixed
     * @throws \Exception
     * @throws \ShoploMulti\Exception\BackendException
     * @throws \ShoploMulti\Exception\NotFoundException
     * @throws \ShoploMulti\Exception\ValidationException
     */
    public function delete($url, $headers = [])
    {
        try {
            $headers = array_merge($headers, $this->getHeaders());
            $rsp     = $this->guzzle->delete(
                $url,
                [
                    'headers' => $headers,
                ]
            );

            $json = \GuzzleHttp\json_decode($rsp->getBody(), true);

            return $json;
        } catch (\Exception $e) {
            ExceptionManager::throwException($e);
        }
    }
}