<?php

namespace ShoploMulti\Model\Product;


use JMS\Serializer\Annotation as Serializer;

class ShoploMultiProductImage
{
    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $title;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $src;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $position;
}