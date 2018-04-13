<?php

namespace ShoploMulti\Model\Order;

use JMS\Serializer\Annotation as Serializer;
use ShoploMulti\Model\Product\ShoploMultiVariantProperty;

class ShoploMultiOrderItem
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
     * @var ShoploMultiVariantProperty[]
     * @Serializer\Type("array<ShoploMulti\Model\Product\ShoploMultiVariantProperty>")
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
     * @var ShoploMultiVariantProperty[]
     * @Serializer\Type("array<ShoploMulti\Model\Product\ShoploMultiVariantProperty>")
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
     * @var ShoploMultiTaxLine[]
     * @Serializer\Type("array<ShoploMulti\Model\Order\ShoploMultiTaxLine>")
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
     * @Serializer\Type("boolean")
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
     * @var string
     * @Serializer\Type("string")
     */
    public $order;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $order_fulfillment;
}