<?php

namespace ShoploMulti\Model\Collection;

use JMS\Serializer\Annotation as Serializer;
use ShoploMulti\Model\Product\ShoploMultiVariantProperty;

class ShoploMultiProductVariantsPropertiesCollection extends
    ShoploMultiBaseCollection
{
    /**
     * @var ShoploMultiVariantProperty[]
     * @Serializer\Type("array<ShoploMulti\Model\Product\ShoploMultiVariantProperty>")
     */
    public $items = [];
}