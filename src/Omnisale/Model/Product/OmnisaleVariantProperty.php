<?php

namespace Omnisale\Model\Product;

use Omnisale\Parser\StringHelper;
use JMS\Serializer\Annotation as Serializer;

class OmnisaleVariantProperty
{
    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $parent_property_id;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $external_id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $title;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $value;
}