<?php

namespace Omnisale\Model\Order;

use Omnisale\Parser\StringHelper;
use JMS\Serializer\Annotation as Serializer;

class OmnisaleOrderShippingLine
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
    public $price;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $title;
}