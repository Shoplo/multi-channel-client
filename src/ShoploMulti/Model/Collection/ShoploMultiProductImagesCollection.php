<?php

namespace ShoploMulti\Model\Collection;

use JMS\Serializer\Annotation as Serializer;
use ShoploMulti\Model\Product\ShoploMultiProductImage;

class ShoploMultiProductImagesCollection extends ShoploMultiBaseCollection
{
    /**
     * @var ShoploMultiProductImage[]
     * @Serializer\Type("array<ShoploMulti\Model\Product\ShoploMultiProductImage>")
     */
    public $items = [];
}