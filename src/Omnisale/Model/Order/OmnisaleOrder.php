<?php

namespace Omnisale\Model\Order;

use JMS\Serializer\Annotation as Serializer;

class OmnisaleOrder
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
     * @var OmnisaleOrderDiscountCode[]
     * @Serializer\Type("array<Omnisale\Model\Order\OmnisaleOrderDiscountCode>")
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
     * @var string
     * @Serializer\Type("string")
     */
    public $tax_lines;

    /**
     * @var string
     * @Serializer\Type("string")
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
     * @var OmnisaleOrderCustomer
     * @Serializer\Type("Omnisale\Model\Order\OmnisaleOrderCustomer")
     */
    public $customer;

    /**
     * @var OmnisaleOrderBillingAddress
     * @Serializer\Type("Omnisale\Model\Order\OmnisaleOrderBillingAddress")
     */
    public $billing_address;

    /**
     * @var OmnisaleOrderShippingAddress
     * @Serializer\Type("Omnisale\Model\Order\OmnisaleOrderShippingAddress")
     */
    public $shipping_address;

    /**
     * @var OmnisaleOrderItem[]
     * @Serializer\Type("array<Omnisale\Model\Order\OmnisaleOrderItem>")
     */
    public $order_items;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $tags;

    /**
     * @var OmnisaleOrderShippingLine[]
     * @Serializer\Type("array<Omnisale\Model\Order\OmnisaleOrderShippingLine>")
     */
    public $shipping_lines;

    /**
     * @var OmnisaleOrderFulfillments[]
     * @Serializer\Type("array<Omnisale\Model\Order\OmnisaleOrderFulfillments>")
     */
    public $fulfillments;
}