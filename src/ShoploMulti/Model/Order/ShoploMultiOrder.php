<?php

namespace ShoploMulti\Model\Order;

use JMS\Serializer\Annotation as Serializer;

class ShoploMultiOrder
{
    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $id;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $channel_id;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $shop_channel_id;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $customer_id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $external_order_id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $external_customer_id;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    public $buyer_accepts_marketing;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $browser_ip;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $variant_landing_url;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $cancel_reason;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $cancelled_at;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $cart_token;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $closed_at;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $currency;

    /**
     * @var ShoploMultiOrderDiscountCode[]
     * @Serializer\Type("array<ShoploMulti\Model\Order\ShoploMultiOrderDiscountCode>")
     */
    public $discount_codes;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $email;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $financial_status;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $fulfillment_status;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $landing_site;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $name;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $note;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $note_attributes;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $order_number;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $payment_gateway_names;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $referring_site;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $source_name;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $status;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $subtotal_price;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $tax_lines;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $total_discounts;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $total_line_items_price;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $total_price;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $total_tax;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $total_weight;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $created_at;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $updated_at;

    /**
     * @var ShoploMultiOrderCustomer
     * @Serializer\Type("ShoploMulti\Model\Order\ShoploMultiOrderCustomer")
     */
    public $customer;

    /**
     * @var ShoploMultiOrderBillingAddress
     * @Serializer\Type("ShoploMulti\Model\Order\ShoploMultiOrderBillingAddress")
     */
    public $billing_address;

    /**
     * @var ShoploMultiOrderShippingAddress
     * @Serializer\Type("ShoploMulti\Model\Order\ShoploMultiOrderShippingAddress")
     */
    public $shipping_address;

    /**
     * @var ShoploMultiOrderItem[]
     * @Serializer\Type("array<ShoploMulti\Model\Order\ShoploMultiOrderItem>")
     */
    public $order_items;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $tags;

    /**
     * @var ShoploMultiOrderShippingLine[]
     * @Serializer\Type("array<ShoploMulti\Model\Order\ShoploMultiOrderShippingLine>")
     */
    public $shipping_lines;

    /**
     * @var ShoploMultiOrderFulfillments[]
     * @Serializer\Type("array<ShoploMulti\Model\Order\ShoploMultiOrderFulfillments>")
     */
    public $fulfillments;
}