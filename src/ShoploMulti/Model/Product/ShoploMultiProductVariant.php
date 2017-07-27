<?php

namespace ShoploMulti\Model\Product;


use JMS\Serializer\Annotation as Serializer;

class ShoploMultiProductVariant
{

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $id;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $product_id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $title;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $sku;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $price;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $inventory_quantity;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $inventory_group;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $weight;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $position;

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