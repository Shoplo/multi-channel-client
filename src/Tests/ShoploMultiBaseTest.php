<?php
/**
 * Created by PhpStorm.
 * User: adrianadamiec
 * Date: 05.05.2017
 * Time: 11:44
 */

namespace Tests;

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use JMS\Serializer\SerializerBuilder;
use ShoploMulti\Guzzle\GuzzleAdapter;
use ShoploMulti\ShoploMultiClient;

abstract class ShoploMultiBaseTest extends TestCase
{
    protected function getClient($responseArr)
    {
        $config = [
            'apiBaseUrl' => '',
            'publicKey' => '',
            'secretKey' => '',
            'callbackUrl' => '',
            'accessToken' => '',
            'refreshToken' => '',
            'scope' => 'scope_read_order scope_write_order scope_read_customer scope_write_customer scope_read_product scope_write_product',
        ];

        $client = new Client(
            [
                'handler' => HandlerStack::create(
                    new MockHandler(
                        $responseArr
                    )
                ),
            ]
        );
        $guzzleAdapter = new GuzzleAdapter($client);
        return new ShoploMultiClient($guzzleAdapter, SerializerBuilder::create()->build(), $config);
    }

    /**
     * @param  string $name
     * @return string
     */
    protected function getResponseData($name)
    {
        return file_get_contents(
            sprintf('%s/../Tests/Fixtures/Response/%s.json', __DIR__, $name)
        );
    }
}