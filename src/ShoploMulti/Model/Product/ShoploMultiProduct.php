<?php

namespace ShoploMulti\Model\Product;


use JMS\Serializer\Annotation as Serializer;

class ShoploMultiProduct
{
    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $title;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $product_id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $short_description;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $description;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $width;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $height;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $depth;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $diameter;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $measure_unit;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $visibility;

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
     * @var ShoploMultiProductVariant[]
     * @Serializer\Type("array<ShoploMulti\Model\Product\ShoploMultiProductVariant>")
     */
    public $variants;

    /**
     * @var ShoploMultiProductImage[]
     * @Serializer\Type("array<ShoploMulti\Model\Product\ShoploMultiProductImage>")
     */
    public $images;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $tags;

    /**
     * @var ShoploMultiVariantProperty[]
     * @Serializer\Type("array<ShoploMulti\Model\Product\ShoploMultiVariantProperty>")
     */
    public $variants_properties;
}