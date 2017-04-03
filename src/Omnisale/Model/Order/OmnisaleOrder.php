<?php

namespace Omnisale\Model\Order;

use Omnisale\Parser\StringHelper;
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
     * @var int
     * @Serializer\Type("integer")
     */
    public $shop_channel_id;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $channel_id;

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
     * @Serializer\Type("bool")
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
     * @Serializer\Type("array<OmnisaleOrderDiscountCode>")
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
     * @Serializer\Type("OmnisaleOrderCustomer")
     */
    public $customer;

    /**
     * @var OmnisaleOrderCustomerChannel
     * @Serializer\Type("OmnisaleOrderCustomerChannel")
     */
    public $customer_channel;

    /**
     * @var OmnisaleOrderBillingAddressChannel
     * @Serializer\Type("OmnisaleOrderBillingAddressChannel")
     */
    public $billing_address_channel;

    /**
     * @var OmnisaleOrderShippingAddressChannel
     * @Serializer\Type("OmnisaleOrderShippingAddressChannel")
     */
    public $shipping_address_channel;

    /**
     * @var OmnisaleOrderChannelItem[]
     * @Serializer\Type("array<OmnisaleOrderShippingAddressChannel>")
     */
    public $order_channel_items;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $tags;

    /**
     * @var OmnisaleOrderShippingLine[]
     * @Serializer\Type("array<OmnisaleOrderShippingLine>")
     */
    public $shipping_lines;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $fulfillments;

    /**
     * @param array $data
     */
    public function __construct( Array $data = [] )
    {
        if( count($data) )
        {
            foreach( $data as $key => $value )
            {
                $field = StringHelper::convertStringToCamelCase( $key );

                $setterMethod = 'set' . $field;
                if( method_exists( $this, $setterMethod ) ) {
                    $value = is_null($value) ? '': $value;
                    $this->$setterMethod( $value );
                }
            }
        }
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @param int $customer_id
     */
    public function setCustomerId(int $customer_id)
    {
        $this->customer_id = $customer_id;
    }

    /**
     * @param int $shop_channel_id
     */
    public function setShopChannelId(int $shop_channel_id)
    {
        $this->shop_channel_id = $shop_channel_id;
    }

    /**
     * @param int $channel_id
     */
    public function setChannelId(int $channel_id)
    {
        $this->channel_id = $channel_id;
    }

    /**
     * @param string $external_order_id
     */
    public function setExternalOrderId(string $external_order_id)
    {
        $this->external_order_id = $external_order_id;
    }

    /**
     * @param string $external_customer_id
     */
    public function setExternalCustomerId(string $external_customer_id)
    {
        $this->external_customer_id = $external_customer_id;
    }

    /**
     * @param boolean $buyer_accepts_marketing
     */
    public function setBuyerAcceptsMarketing(bool $buyer_accepts_marketing)
    {
        $this->buyer_accepts_marketing = $buyer_accepts_marketing;
    }

    /**
     * @param string $browser_ip
     */
    public function setBrowserIp(string $browser_ip)
    {
        $this->browser_ip = $browser_ip;
    }

    /**
     * @param string $variant_landing_url
     */
    public function setVariantLandingUrl(string $variant_landing_url)
    {
        $this->variant_landing_url = $variant_landing_url;
    }

    /**
     * @param string $cancel_reason
     */
    public function setCancelReason(string $cancel_reason)
    {
        $this->cancel_reason = $cancel_reason;
    }

    /**
     * @param string $cancelled_at
     */
    public function setCancelledAt(string $cancelled_at)
    {
        $this->cancelled_at = $cancelled_at;
    }

    /**
     * @param string $cart_token
     */
    public function setCartToken(string $cart_token)
    {
        $this->cart_token = $cart_token;
    }

    /**
     * @param string $closed_at
     */
    public function setClosedAt(string $closed_at)
    {
        $this->closed_at = $closed_at;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency)
    {
        $this->currency = $currency;
    }

    /**
     * @param $discount_codes
     */
    public function setDiscountCodes($discount_codes)
    {
        if( is_array($discount_codes) && $discount_codes ) {

            foreach( $discount_codes as $k => $v ) {

                $this->discount_codes[] = new OmnisaleOrderShippingLine((array)$v);
            }
        }
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @param string $financial_status
     */
    public function setFinancialStatus(string $financial_status)
    {
        $this->financial_status = $financial_status;
    }

    /**
     * @param string $fulfillment_status
     */
    public function setFulfillmentStatus(string $fulfillment_status)
    {
        $this->fulfillment_status = $fulfillment_status;
    }

    /**
     * @param string $landing_site
     */
    public function setLandingSite(string $landing_site)
    {
        $this->landing_site = $landing_site;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param string $note
     */
    public function setNote(string $note)
    {
        $this->note = $note;
    }

    /**
     * @param string $note_attributes
     */
    public function setNoteAttributes(string $note_attributes)
    {
        $this->note_attributes = $note_attributes;
    }

    /**
     * @param string $order_number
     */
    public function setOrderNumber(string $order_number)
    {
        $this->order_number = $order_number;
    }

    /**
     * @param \string[] $payment_gateway_names
     */
    public function setPaymentGatewayNames(array $payment_gateway_names)
    {
        $this->payment_gateway_names = $payment_gateway_names;
    }

    /**
     * @param string $referring_site
     */
    public function setReferringSite(string $referring_site)
    {
        $this->referring_site = $referring_site;
    }

    /**
     * @param string $source_name
     */
    public function setSourceName(string $source_name)
    {
        $this->source_name = $source_name;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status)
    {
        $this->status = $status;
    }

    /**
     * @param string $subtotal_price
     */
    public function setSubtotalPrice(string $subtotal_price)
    {
        $this->subtotal_price = $subtotal_price;
    }

    /**
     * @param \string $tax_lines
     */
    public function setTaxLines($tax_lines)
    {
        $this->tax_lines = $tax_lines;
    }

    /**
     * @param string $total_discounts
     */
    public function setTotalDiscounts(string $total_discounts)
    {
        $this->total_discounts = $total_discounts;
    }

    /**
     * @param string $total_line_items_price
     */
    public function setTotalLineItemsPrice(string $total_line_items_price)
    {
        $this->total_line_items_price = $total_line_items_price;
    }

    /**
     * @param string $total_price
     */
    public function setTotalPrice(string $total_price)
    {
        $this->total_price = $total_price;
    }

    /**
     * @param string $total_tax
     */
    public function setTotalTax(string $total_tax)
    {
        $this->total_tax = $total_tax;
    }

    /**
     * @param string $total_weight
     */
    public function setTotalWeight(string $total_weight)
    {
        $this->total_weight = $total_weight;
    }

    /**
     * @param string $created_at
     */
    public function setCreatedAt(string $created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @param string $updated_at
     */
    public function setUpdatedAt(string $updated_at)
    {
        $this->updated_at = $updated_at;
    }

    /**
     * @param $customer
     */
    public function setCustomer($customer)
    {
        $this->customer = new OmnisaleOrderCustomer((array)$customer);
    }

    /**
     * @param $customer_channel
     */
    public function setCustomerChannel($customer_channel)
    {
        $this->customer_channel = new OmnisaleOrderCustomerChannel((array)$customer_channel);
    }

    /**
     * @param $billing_address_channel
     */
    public function setBillingAddressChannel($billing_address_channel)
    {
        $this->billing_address_channel = new OmnisaleOrderBillingAddressChannel((array)$billing_address_channel);
    }

    /**
     * @param  $shipping_address_channel
     */
    public function setShippingAddressChannel($shipping_address_channel)
    {
        $this->shipping_address_channel = new OmnisaleOrderShippingAddressChannel((array)$shipping_address_channel);
    }

    /**
     * @param $order_channel_items
     */
    public function setOrderChannelItems(array $order_channel_items)
    {
        if( is_array($order_channel_items) && $order_channel_items ) {

            foreach( $order_channel_items as $k => $v ) {

                $this->order_channel_items[] = new OmnisaleOrderChannelItem((array)$v);
            }
        }
    }

    /**
     * @param $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    /**
     * @param $shipping_lines
     */
    public function setShippingLines(array $shipping_lines)
    {
        if( is_array($shipping_lines) && $shipping_lines ) {

            foreach( $shipping_lines as $k => $v ) {

                $this->shipping_lines[] = new OmnisaleOrderShippingLine($v);
            }
        }
    }

    /**
     * @param \string[] $fulfillments
     */
    public function setFulfillments(array $fulfillments)
    {
        $this->fulfillments = $fulfillments;
    }
}