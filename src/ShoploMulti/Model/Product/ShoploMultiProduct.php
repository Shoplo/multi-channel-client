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
     * @var string
     * @Serializer\Type("string")
     */
    public $img_url;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $visibility;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $currency_code;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $channels_count;

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
     * @var ShoploMultiProductDetails
     * @Serializer\Type("ShoploMulti\Model\Product\ShoploMultiProductDetails")
     */
    public $details;

    /**
     * @var ShoploMultiProductVariant[]
     * @Serializer\Type("array<ShoploMulti\Model\Product\ShoploMultiProductVariant>")
     */
    public $variants;
}