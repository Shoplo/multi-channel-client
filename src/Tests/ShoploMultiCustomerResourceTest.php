<?php
/**
 * Created by PhpStorm.
 * User: adrianadamiec
 * Date: 04.05.2017
 * Time: 13:14
 */

namespace Tests;

use GuzzleHttp\Psr7\Response;
use ShoploMulti\Model\Collection\ShoploMultiCustomersCollection;
use ShoploMulti\Model\Customer\ShoploMultiCustomer;
use ShoploMulti\Resource\ShoploMultiCustomerResource;

class ShoploMultiCustomerResourceTest extends ShoploMultiBaseTest
{
    private function getResponseArr()
    {
        return [new Response(200, [], $this->getResponseData('customers'))];
    }

    /**
     * @test
     */
    public function testGetCustomers()
    {
        $customersResource = new ShoploMultiCustomerResource(
            $this->getClient($this->getResponseArr())
        );
        /** @var ShoploMultiCustomersCollection $customersCollection */
        $customersCollection = $customersResource->getCustomers();

        $this->assertInstanceOf(
            ShoploMultiCustomersCollection::class,
            $customersCollection
        );
        $this->assertCount(20, $customersCollection->getIterator());
        $this->assertEquals(1, $customersCollection->pages);

        /** @var ShoploMultiCustomer $customer */
        $customer = $customersCollection->getItem(2);
        $this->assertInstanceOf(ShoploMultiCustomer::class, $customer);
        $this->assertEquals(32, $customer->id);
        $this->assertTrue($customer->accepts_marketing);
        $this->assertEquals('asd@asd.pl', $customer->email);
        $this->assertEquals('Test', $customer->first_name);
        $this->assertEquals('', $customer->last_name);
        $this->assertNull($customer->note);
        $this->assertEquals(0, $customer->orders_count);
        $this->assertNull($customer->tax_exempt);
        $this->assertEquals(0, $customer->total_spent);
        $this->assertFalse($customer->verified_email);
        $this->assertNull($customer->last_order_id);
        $this->assertNull($customer->last_order_date);
        $this->assertEquals("PLN", $customer->currency);
        $this->assertNull($customer->avatar_url);
        $this->assertEquals('2017-03-31T07:53:28+00:00', $customer->created_at);
        $this->assertNull($customer->updated_at);

        $newCustomer                    = new ShoploMultiCustomer();
        $newCustomer->id                = 9999;
        $newCustomer->accepts_marketing = false;
        $newCustomer->email             = 'test@test.pl';
        $newCustomer->total_spent       = 1000;

        $customersCollection->addItem($newCustomer, 1234);

        /** @var ShoploMultiCustomer $customer */
        $testCustomer = $customersCollection->getItem(1234);

        $this->assertInstanceOf(ShoploMultiCustomer::class, $testCustomer);
        $this->assertFalse($testCustomer->accepts_marketing);
        $this->assertEquals('test@test.pl', $testCustomer->email);
        $this->assertEquals(1000, $testCustomer->total_spent);

        $this->assertCount(21, $customersCollection->getIterator());
    }
}
