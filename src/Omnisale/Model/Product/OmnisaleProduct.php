<?php

namespace Omnisale\Model\Product;

use Omnisale\Parser\StringHelper;
use JMS\Serializer\Annotation as Serializer;

class OmnisaleProduct
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
     * @var OmnisaleProductDetails
     * @Serializer\Type("Omnisale\Model\Product\OmnisaleProductDetails")
     */
    public $details;

    /**
     * @var OmnisaleProductVariant[]
     * @Serializer\Type("array<Omnisale\Model\Product\OmnisaleProductVariant>")
     */
    public $variants;
}