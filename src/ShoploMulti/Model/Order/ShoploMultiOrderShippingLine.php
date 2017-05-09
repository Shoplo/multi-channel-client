<?php

namespace ShoploMulti\Model\Order;

use ShoploMulti\Parser\StringHelper;
use JMS\Serializer\Annotation as Serializer;

class ShoploMultiOrderShippingLine
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

    /**
     * @var ShoploMultiTaxLine[]
     * @Serializer\Type("array<ShoploMulti\Model\Order\ShoploMultiTaxLine>")
     */
    public $tax_lines;
}