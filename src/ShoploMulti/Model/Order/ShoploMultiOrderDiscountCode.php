<?php

namespace ShoploMulti\Model\Order;


use JMS\Serializer\Annotation as Serializer;

class ShoploMultiOrderDiscountCode
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $code;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $amount;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $type;
}