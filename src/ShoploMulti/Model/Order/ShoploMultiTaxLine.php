<?php

namespace ShoploMulti\Model\Order;

use JMS\Serializer\Annotation as Serializer;

class ShoploMultiTaxLine
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $title;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $price;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $rate;
}