<?php

namespace Omnisale\Model\Order;

use Omnisale\Parser\StringHelper;
use JMS\Serializer\Annotation as Serializer;
use Omnisale\Model\Product\OmnisaleProductChannel;
use Omnisale\Model\Product\OmnisaleVariantChannel;
use Omnisale\Model\Product\OmnisaleVariantChannelProperty;

class OmnisaleOrderChannelItem
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
     * @var OmnisaleVariantChannelProperty[]
     * @Serializer\Type("array<OmnisaleVariantChannelProperty>")
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
    public $tax_lines;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $total_discount;

    /**
     * @var bool
     * @Serializer\Type("bool")
     */
    public $taxable;

    /**
     * @var OmnisaleProductChannel
     * @Serializer\Type("OmnisaleProductChannel")
     */
    public $product_channel;

    /**
     * @var OmnisaleVariantChannel
     * @Serializer\Type("OmnisaleVariantChannel")
     */
    public $channel_variant;

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
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @param int $price
     */
    public function setPrice(int $price)
    {
        $this->price = $price;
    }

    /**
     * @param string $properties
     */
    public function setProperties(string $properties)
    {
        $this->properties = $properties;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @param int $weight
     */
    public function setWeight(int $weight)
    {
        $this->weight = $weight;
    }

    /**
     * @param string $sku
     */
    public function setSku(string $sku)
    {
        $this->sku = $sku;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param string $variant_title
     */
    public function setVariantTitle(string $variant_title)
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

                $this->variant_properties[] = new OmnisaleVariantChannelProperty((array)$v);
            }
        }
    }

    /**
     * @param string $vendor
     */
    public function setVendor(string $vendor)
    {
        $this->vendor = $vendor;
    }

    /**
     * @param string $tax_lines
     */
    public function setTaxLines(string $tax_lines)
    {
        $this->tax_lines = $tax_lines;
    }

    /**
     * @param int $total_discount
     */
    public function setTotalDiscount(int $total_discount)
    {
        $this->total_discount = $total_discount;
    }

    /**
     * @param boolean $taxable
     */
    public function setTaxable(bool $taxable)
    {
        $this->taxable = $taxable;
    }

    /**
     * @param $product_channel
     */
    public function setProductChannel($product_channel)
    {
        $this->product_channel = new OmnisaleProductChannel((array)$product_channel);
    }

    /**
     * @param $channel_variant
     */
    public function setChannelVariant($channel_variant)
    {
        $this->channel_variant = new OmnisaleVariantChannel((array)$channel_variant);
    }
}