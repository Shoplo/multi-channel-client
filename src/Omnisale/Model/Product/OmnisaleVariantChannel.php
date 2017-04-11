<?php

namespace Omnisale\Model\Product;

use Omnisale\Parser\StringHelper;
use JMS\Serializer\Annotation as Serializer;

class OmnisaleVariantChannel
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
     * @var OmnisaleVariantProperty[]
     * @Serializer\Type("array<Omnisale\Model\Product\OmnisaleVariantProperty>")
     */
    public $properties;


}