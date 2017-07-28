<?php

namespace ShoploMulti\Model\Collection;

use JMS\Serializer\Annotation as Serializer;
use ShoploMulti\Model\Product\ShoploMultiProductVariant;

class ShoploMultiProductVariantsCollection extends ShoploMultiBaseCollection
{
    /**
     * @var ShoploMultiProductVariant[]
     * @Serializer\Type("array<ShoploMulti\Model\Product\ShoploMultiProductVariant>")
     */
    public $items = [];
}