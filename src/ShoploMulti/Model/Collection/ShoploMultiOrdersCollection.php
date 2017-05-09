<?php

namespace ShoploMulti\Model\Collection;

use JMS\Serializer\Annotation as Serializer;
use ShoploMulti\Model\Order\ShoploMultiOrder;

class ShoploMultiOrdersCollection extends ShoploMultiBaseCollection
{
    /**
     * @var ShoploMultiOrder[]
     * @Serializer\Type("array<ShoploMulti\Model\Order\ShoploMultiOrder>")
     */
    public $items = [];
}