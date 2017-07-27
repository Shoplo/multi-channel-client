<?php

namespace ShoploMulti\Model\Product;


use JMS\Serializer\Annotation as Serializer;

class ShoploMultiVariantProperty
{
    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $parent_property_id;

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

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $position;
}