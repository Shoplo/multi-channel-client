<?php

namespace ShoploMulti\Model\Collection;

use JMS\Serializer\Annotation as Serializer;
use ShoploMulti\Model\Product\ShoploMultiProduct;

class ShoploMultiProductsCollection extends ShoploMultiBaseCollection
{
    /**
     * @var ShoploMultiProduct[]
     * @Serializer\Type("array<ShoploMulti\Model\Product\ShoploMultiProduct>")
     */
    public $items = [];
}