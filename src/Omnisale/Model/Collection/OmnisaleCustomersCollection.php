<?php

namespace Omnisale\Model\Collection;

use JMS\Serializer\Annotation as Serializer;
use Omnisale\Model\Customer\OmnisaleCustomer;

class OmnisaleCustomersCollection implements \IteratorAggregate
{
    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $page;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $limit;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $pages;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $total;

    /**
     * @var OmnisaleCustomer[]
     * @Serializer\Type("array<Omnisale\Model\Customer\OmnisaleCustomer>")
     */
    public $items = [];

    public function add($item)
    {
        $this->items[] = $item;
        return $this;
    }

    public function getIterator()
    {
        return $this->items;
    }
}