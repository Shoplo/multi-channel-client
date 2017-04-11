<?php

namespace Omnisale\Model\Product;

use Omnisale\Parser\StringHelper;
use JMS\Serializer\Annotation as Serializer;

class OmnisaleProductChannelDetailsMetadata
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