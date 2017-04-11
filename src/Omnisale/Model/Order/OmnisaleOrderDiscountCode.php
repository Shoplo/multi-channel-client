<?php

namespace Omnisale\Model\Order;

use Omnisale\Parser\StringHelper;
use JMS\Serializer\Annotation as Serializer;

class OmnisaleOrderDiscountCode
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