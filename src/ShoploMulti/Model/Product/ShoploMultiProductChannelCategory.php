<?php

namespace ShoploMulti\Model\Product;


use JMS\Serializer\Annotation as Serializer;

class ShoploMultiProductChannelCategory
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
    public $external_id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $name;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $path;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $external_type;
}