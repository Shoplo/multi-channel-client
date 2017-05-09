<?php

namespace ShoploMulti\Model\Collection;

use JMS\Serializer\Annotation as Serializer;
use ShoploMulti\Model\Customer\ShoploMultiCustomer;

class ShoploMultiCustomersCollection extends ShoploMultiBaseCollection
{
    /**
     * @var ShoploMultiCustomer[]
     * @Serializer\Type("array<ShoploMulti\Model\Customer\ShoploMultiCustomer>")
     */
    public $items = [];
}