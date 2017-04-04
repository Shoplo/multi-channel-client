<?php

namespace Omnisale\Model\Order;

use Omnisale\Parser\StringHelper;
use JMS\Serializer\Annotation as Serializer;
use Omnisale\Model\Product\OmnisaleProductChannel;
use Omnisale\Model\Product\OmnisaleVariantChannel;
use Omnisale\Model\Product\OmnisaleVariantProperty;

class OmnisaleOrderItem
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
    public $price;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $properties;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $quantity;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $requires_shipping;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $weight;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $sku;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $title;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $name;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $variant_title;

    /**
     * @var OmnisaleVariantProperty[]
     * @Serializer\Type("array<OmnisaleVariantProperty>")
     */
    public $variant_properties;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $vendor;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $external_order_item_id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $external_product_id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $external_variant_id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $tax_lines;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $total_discount;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $fulfillment_status;

    /**
     * @var bool
     * @Serializer\Type("bool")
     */
    public $taxable;

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
                if( method_exists( $this, $setterMethod ) ){
                    $value = is_null($value) ? '': $value;
                    $this->$setterMethod( $value );
                }
            }
        }
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param int $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @param string $properties
     */
    public function setProperties($properties)
    {
        $this->properties = $properties;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @param int $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * @param string $sku
     */
    public function setSku($sku)
    {
        $this->sku = $sku;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param string $variant_title
     */
    public function setVariantTitle($variant_title)
    {
        $this->variant_title = $variant_title;
    }

    /**
     * @param $variant_properties
     */
    public function setVariantProperties($variant_properties)
    {
        if( is_array($variant_properties) && $variant_properties ) {

            foreach( $variant_properties as $k => $v ) {

                $this->variant_properties[] = new OmnisaleVariantProperty((array)$v);
            }
        }
    }

    /**
     * @param string $vendor
     */
    public function setVendor($vendor)
    {
        $this->vendor = $vendor;
    }

    /**
     * @param string $tax_lines
     */
    public function setTaxLines($tax_lines)
    {
        $this->tax_lines = $tax_lines;
    }

    /**
     * @param int $total_discount
     */
    public function setTotalDiscount($total_discount)
    {
        $this->total_discount = $total_discount;
    }

    /**
     * @param boolean $taxable
     */
    public function setTaxable($taxable)
    {
        $this->taxable = $taxable;
    }

    /**
     * @param boolean $requires_shipping
     */
    public function setRequiresShipping($requires_shipping)
    {
        $this->requires_shipping = $requires_shipping;
    }

    /**
     * @param string $external_order_item_id
     */
    public function setExternalOrderItemId($external_order_item_id)
    {
        $this->external_order_item_id = $external_order_item_id;
    }

    /**
     * @param string $external_product_id
     */
    public function setExternalProductId($external_product_id)
    {
        $this->external_product_id = $external_product_id;
    }

    /**
     * @param string $external_variant_id
     */
    public function setExternalVariantId($external_variant_id)
    {
        $this->external_variant_id = $external_variant_id;
    }

    /**
     * @param string $fulfillment_status
     */
    public function setFulfillmentStatus($fulfillment_status)
    {
        $this->fulfillment_status = $fulfillment_status;
    }

    /**
     * @param string $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @param string $updated_at
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }
}