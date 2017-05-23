<?php

namespace ShoploMulti\Model\Product;


use JMS\Serializer\Annotation as Serializer;

class ShoploMultiVariantChannel
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
    public $external_id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $sku;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $price;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    public $is_syncing;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $compare_at_price;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $inventory_quantity;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $barcode;

    /**
     * @var ShoploMultiVariantProperty[]
     * @Serializer\Type("array<ShoploMulti\Model\Product\ShoploMultiVariantProperty>")
     */
    public $properties;


}