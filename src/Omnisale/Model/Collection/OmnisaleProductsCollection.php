<?php

namespace Omnisale\Model\Collection;

use JMS\Serializer\Annotation as Serializer;
use Omnisale\Model\Product\OmnisaleProduct;

class OmnisaleProductsCollection implements \IteratorAggregate
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
     * @var OmnisaleProduct[]
     * @Serializer\Type("array<Omnisale\Model\Product\OmnisaleProduct>")
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