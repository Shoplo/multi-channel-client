<?php

namespace ShoploMulti\Model\Product;


use JMS\Serializer\Annotation as Serializer;

class ShoploMultiProductChannelDetailsMetadata
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $meta_title;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $meta_description;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $meta_keywords;
}