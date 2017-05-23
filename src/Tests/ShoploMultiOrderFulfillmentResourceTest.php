<?php
/**
 * Created by PhpStorm.
 * User: adrianadamiec
 * Date: 04.05.2017
 * Time: 13:14
 */

namespace Tests;


use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Response;
use ShoploMulti\Exception\NotFoundException;
use ShoploMulti\Exception\ValidationException;
use ShoploMulti\Resource\ShoploMultiOrderResource;

class ShoploMultiOrderFulFillmentResourceTest extends ShoploMultiBaseTest
{
    private function getSuccessCreateFulfillmentResponseArr()
    {
        return [new Response(200, [], "")];
    }

    private function getFailCreateFulfillmentResponseArr()
    {
        $exception = new \Exception('Client error: `POST https://api.shoplo.io/v1/public/orders/656/fulfillments` resulted in a `400 Bad Request` response:
{&quot;message&quot;:&quot;Invalid input data. Check error details.&quot;,&quot;code&quot;:0,&quot;status_code&quot;:400,&quot;errors&quot;:{&quot;tracking_numbers&quot;:[&quot;This val (truncated...)', 400);

        return [new ValidationException($exception)];
    }

    private function getSuccessDeleteFulfillmentResponseArr()
    {
        return [new Response(200, [], null)];
    }

    private function getFailDeleteFulfillmentResponseArr()
    {
        $exception = new \Exception('Client error: `DELETE https://api.shoplo.io/v1/public/orders/656/fulfillments/2302` resulted in a `404 Not Found` response:
{&quot;message&quot;:&quot;Page not found&quot;,&quot;code&quot;:0,&quot;status_code&quot;:404,&quot;errors&quot;:[]}', 404);
        return [new NotFoundException($exception)];
    }

    /**
     * @test
     */
    public function testFailCreateFulfillment()
    {
        $this->expectException(ValidationException::class);
        $this->expectExceptionCode(400);

        $ordersResource = new ShoploMultiOrderResource($this->getClient($this->getFailCreateFulfillmentResponseArr()));
        $fulfillments = new \ShoploMulti\Model\Order\ShoploMultiOrderFulfillments();
        $fulfillments->tracking_company = 'Poczta Polska';

        $ordersResource->createOrderFullfilments(656, $fulfillments);
    }

    /**
     * @test
     */
    public function testSuccessCreateFulfillment()
    {
        $ordersResource = new ShoploMultiOrderResource($this->getClient($this->getSuccessCreateFulfillmentResponseArr()));
        $fulfillments = new \ShoploMulti\Model\Order\ShoploMultiOrderFulfillments();
        $fulfillments->tracking_company = 'Poczta Polska';
        $trackingUrl = 'http://emonitoring.poczta-polska.pl/?numer=123123123123';

        $fulfillments->tracking_urls = [$trackingUrl];
        $fulfillments->tracking_numbers = ['123123123123'];

        $response = $ordersResource->createOrderFullfilments(656, $fulfillments);
        $this->assertEquals("", $response);
    }

    /**
     * @test
     */
    public function testSuccessDeleteFulfillment()
    {
        $ordersResource = new ShoploMultiOrderResource($this->getClient($this->getSuccessDeleteFulfillmentResponseArr()));
        $response = $ordersResource->deleteOrderFullfilments(2, 656);

        $this->assertNull($response);
    }

    /**
     * @test
     */
    public function testFailDeleteFulfillment()
    {
        $this->expectException(NotFoundException::class);
        $this->expectExceptionCode(404);

        $ordersResource = new ShoploMultiOrderResource($this->getClient($this->getFailDeleteFulfillmentResponseArr()));
        $ordersResource->deleteOrderFullfilments(2, 656);
    }
}
