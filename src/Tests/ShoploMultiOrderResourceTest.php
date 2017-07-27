<?php
/**
 * Created by PhpStorm.
 * User: adrianadamiec
 * Date: 04.05.2017
 * Time: 13:14
 */

namespace Tests;


use GuzzleHttp\Psr7\Response;
use ShoploMulti\Model\Collection\ShoploMultiOrdersCollection;
use ShoploMulti\Model\Order\ShoploMultiOrder;
use ShoploMulti\Model\Order\ShoploMultiOrderBillingAddress;
use ShoploMulti\Model\Order\ShoploMultiOrderCustomer;
use ShoploMulti\Model\Order\ShoploMultiOrderDiscountCode;
use ShoploMulti\Model\Order\ShoploMultiOrderFulfillments;
use ShoploMulti\Model\Order\ShoploMultiOrderItem;
use ShoploMulti\Model\Order\ShoploMultiOrderShippingAddress;
use ShoploMulti\Model\Order\ShoploMultiOrderShippingLine;
use ShoploMulti\Model\Product\ShoploMultiVariantProperty;
use ShoploMulti\Resource\ShoploMultiOrderResource;

class ShoploMultiOrderResourceTest extends ShoploMultiBaseTest
{
    private function getResponseArr()
    {
        return [new Response(200, [], $this->getResponseData('orders'))];
    }

    /**
     * @test
     */
    public function testGetOrders()
    {
        $with = [
            'with' => [
                'order.addresses',
                'order.tags',
                'order.items',
                'order.fulfillments',
                'order.customer',
                'order.shipping_lines',
            ]
        ];

        $ordersResource = new ShoploMultiOrderResource($this->getClient($this->getResponseArr()));
        /** @var ShoploMultiOrdersCollection $ordersCollection */
        $ordersCollection = $ordersResource->getOrders($with);

        $this->assertInstanceOf(ShoploMultiOrdersCollection::class, $ordersCollection);
        $this->assertCount(50, $ordersCollection->getIterator());
        $this->assertEquals(7, $ordersCollection->pages);
        $this->assertEquals(328, $ordersCollection->total);

        /** @var ShoploMultiOrder $order */
        $order = $ordersCollection->getItem(2);
        $this->assertInstanceOf(ShoploMultiOrder::class, $order);
        $this->assertEquals(6, $order->id);
        $this->assertEquals(2, $order->customer_id);
        $this->assertEquals('1466', $order->external_order_id);
        $this->assertEquals('7670', $order->external_customer_id);
//        $this->assertFalse($order->buyer_accepts_marketing);//todo
        $this->assertNull($order->browser_ip);
        $this->assertNull($order->variant_landing_url);
        $this->assertNull($order->cancel_reason);
        $this->assertNull($order->cancelled_at);
        $this->assertEquals('1NUG9XygHc9gyN1pzVUbqNz93xN9z6Tc', $order->cart_token);
        $this->assertNull($order->closed_at);
        $this->assertEquals("PLN", $order->currency);

        $discountCodes = $order->discount_codes;
        $this->assertArrayHasKey(0, $discountCodes);

        $discountCode = $discountCodes[0];

        $this->assertInstanceOf(ShoploMultiOrderDiscountCode::class, $discountCode);
        $this->assertEquals('Rabat dla klienta', $discountCode->code);
        $this->assertEquals(2380, $discountCode->amount);
        $this->assertEquals('percentage', $discountCode->type);

        $this->assertEquals("test@test.com", $order->email);
        $this->assertEquals("pending", $order->financial_status);
        $this->assertNull($order->fulfillment_status);
        $this->assertEquals('/checkout/3964/c7lyCCPfNiHTJAj3cbfIEvQraM6HYra8/beta', $order->landing_site);
        $this->assertEquals('#1466', $order->name);
        $this->assertNull($order->note);
        $this->assertNull($order->note_attributes);
        $this->assertEquals('1466', $order->order_number);
        $this->assertArrayHasKey(0, $order->payment_gateway_names);
        $this->assertEquals('przelew2', $order->payment_gateway_names[0]);
        $this->assertEquals('https://check.shoplo.com/checkout/3964/c7lyCCPfNiHTJAj3cbfIEvQraM6HYra8/beta', $order->referring_site);
        $this->assertEquals('web', $order->source_name);
        $this->assertEquals('Nowe', $order->status);
        $this->assertEquals(9675, $order->subtotal_price);
        $this->assertEmpty($order->tax_lines);
        $this->assertArrayNotHasKey(0, $order->tax_lines);
        $this->assertEquals(2380, $order->total_discounts);
        $this->assertEquals(11900, $order->total_line_items_price);
        $this->assertEquals(9520, $order->total_price);
        $this->assertEquals(2225, $order->total_tax);
        $this->assertEquals(0, $order->total_weight);
        $this->assertEquals('2017-03-31T07:53:29+00:00', $order->created_at);
        $this->assertEquals('2017-03-31T07:53:29+00:00', $order->updated_at);

        /** @var ShoploMultiOrderCustomer $customer */
        $customer = $order->customer;
        $this->assertInstanceOf(ShoploMultiOrderCustomer::class, $customer);
        $this->assertInternalType(\PHPUnit_Framework_Constraint_IsType::TYPE_INT, $customer->id);
        $this->assertTrue($customer->accepts_marketing);
        $this->assertEquals('test@test.com', $customer->email);
        $this->assertEquals('Jan', $customer->first_name);
        $this->assertEquals('Kowalski', $customer->last_name);
        $this->assertEquals('notatka', $customer->note);
        $this->assertEquals(49, $customer->orders_count);
        $this->assertFalse($customer->tax_exempt);
        $this->assertEquals(483469, $customer->total_spent);
        $this->assertFalse($customer->verified_email);
        $this->assertNull($customer->last_order_id);
        $this->assertNull($customer->last_order_date);
        $this->assertEquals("PLN", $customer->currency);
        $this->assertNull($customer->avatar_url);
        $this->assertEquals('2017-03-31T07:53:27+00:00', $customer->created_at);
        $this->assertNull($customer->updated_at);

        $this->assertNull($order->billing_address);

        /** @var ShoploMultiOrderShippingAddress $shippingAddress */
        $shippingAddress = $order->shipping_address;
        $this->assertInstanceOf(ShoploMultiOrderShippingAddress::class, $shippingAddress);

        $this->assertEquals(50, $shippingAddress->id);
        $this->assertEquals('Testowa', $shippingAddress->address1);
        $this->assertEquals('1/2', $shippingAddress->address2);
        $this->assertEquals('Test', $shippingAddress->city);
        $this->assertNull($shippingAddress->company);
        $this->assertNull($shippingAddress->country);
        $this->assertEquals('gb', $shippingAddress->country_code);
        $this->assertFalse($shippingAddress->default);
        $this->assertEquals('Jan', $shippingAddress->first_name);
        $this->assertEquals('Kowalski', $shippingAddress->last_name);
        $this->assertNull($shippingAddress->latitude);
        $this->assertNull($shippingAddress->longitude);
        $this->assertEquals('123123123', $shippingAddress->phone);
        $this->assertNull($shippingAddress->province);
        $this->assertNull($shippingAddress->province_code);
        $this->assertEquals('12-123', $shippingAddress->zip);
        $this->assertNull($shippingAddress->tax_id);
        $this->assertEquals('2017-03-31T07:53:29+00:00', $shippingAddress->created_at);
        $this->assertEquals('2017-03-31T07:53:29+00:00', $shippingAddress->updated_at);

        $orderItems = $order->order_items;
        $this->assertNotEmpty($orderItems);
        $this->assertCount(1, $orderItems);
        $this->assertArrayHasKey(0, $orderItems);

        /** @var ShoploMultiOrderItem $orderItem */
        $orderItem = $orderItems[0];

        $this->assertEquals(14, $orderItem->id);
        $this->assertEquals(11900, $orderItem->price);
        $this->assertEmpty($orderItem->properties);
        $this->assertEquals(1, $orderItem->quantity);
        $this->assertTrue($orderItem->requires_shipping);
        $this->assertEquals(0, $orderItem->weight);
        $this->assertEquals('8088', $orderItem->sku);
        $this->assertEquals('SUKIENKA KONTRAFAŁDA - beż 6-1', $orderItem->title);
        $this->assertEquals('SUKIENKA KONTRAFAŁDA - beż 6-1 - XL', $orderItem->name);
        $this->assertEquals('XL', $orderItem->variant_title);

        $variantProperies = $orderItem->variant_properties;
        $this->assertNotEmpty($variantProperies);
        $this->assertCount(1, $variantProperies);
        $this->assertArrayHasKey(0, $variantProperies);

        /** @var ShoploMultiVariantProperty $variantProperty */
        $variantProperty = $variantProperies[0];

        $this->assertEquals('Rozmiar', $variantProperty->title);
        $this->assertEquals('XL', $variantProperty->value);

        $this->assertNull($orderItem->vendor);
        $this->assertEquals('1232', $orderItem->external_order_item_id);
        $this->assertEquals('2', $orderItem->external_product_id);
        $this->assertEquals('8', $orderItem->external_variant_id);

        $taxLines = $orderItem->tax_lines;
        $this->assertNotEmpty($taxLines);
        $this->assertCount(1, $taxLines);
        $this->assertArrayHasKey(0, $taxLines);

        $taxLine = $taxLines[0];
        $this->assertNotEmpty($taxLine);
        $this->assertEquals('VAT', $taxLine->title);
        $this->assertEquals(2225, $taxLine->price);
        $this->assertEquals('0.23', $taxLine->rate);

        $this->assertEquals(2380, $orderItem->total_discount);
        $this->assertNull($orderItem->fulfillment_status);
        $this->assertTrue($orderItem->taxable);
        $this->assertEquals('2017-03-31T07:53:29+00:00', $orderItem->created_at);
        $this->assertEquals('2017-04-11T14:37:19+00:00', $orderItem->updated_at);

        $this->assertEmpty($order->tags);

        $orderFulfillments = $order->fulfillments;
        $this->assertNotEmpty($orderFulfillments);
        $this->assertCount(1, $orderFulfillments);
        $this->assertArrayHasKey(0, $orderFulfillments);

        $orderFulfillment = $orderFulfillments[0];
        $this->assertInstanceOf(ShoploMultiOrderFulfillments::class, $orderFulfillment);

        $this->assertEquals(184, $orderFulfillment->id);
        $this->assertEquals('test', $orderFulfillment->tracking_company);
        $this->assertNotEmpty($orderFulfillment->tracking_numbers);
        $this->assertArrayHasKey(0, $orderFulfillment->tracking_numbers);
        $this->assertEquals('12312312', $orderFulfillment->tracking_numbers[0]);

        $this->assertNotEmpty($orderFulfillment->tracking_urls);
        $this->assertArrayHasKey(0, $orderFulfillment->tracking_urls);
        $this->assertEquals('http://asd.pl', $orderFulfillment->tracking_urls[0]);

        $this->assertNotEmpty($orderFulfillment->tracking_data);
        $this->assertArrayHasKey(0, $orderFulfillment->tracking_data);
        $this->assertEquals('123', $orderFulfillment->tracking_data[0]);

        $this->assertNotEmpty($orderFulfillment->order_items_ids);
        $this->assertArrayHasKey(0, $orderFulfillment->order_items_ids);
        $this->assertEquals(14, $orderFulfillment->order_items_ids[0]);

        $this->assertEquals('2017-04-11T14:37:19+00:00', $orderFulfillment->created_at);
        $this->assertEquals('2017-04-11T14:37:19+00:00', $orderFulfillment->updated_at);

        $shippingLines = $order->shipping_lines;
        $this->assertNotEmpty($shippingLines);
        $this->assertCount(1, $shippingLines);
        $this->assertArrayHasKey(0, $shippingLines);

        $shippingLine = $shippingLines[0];
        $this->assertInstanceOf(ShoploMultiOrderShippingLine::class, $shippingLine);

        $this->assertEquals(6, $shippingLine->id);
        $this->assertEquals(0, $shippingLine->price);
        $this->assertEquals('Odbiór osobisty', $shippingLine->title);
        $this->assertEmpty($shippingLine->tax_lines);

    }
}
