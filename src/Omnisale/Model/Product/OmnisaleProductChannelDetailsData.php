<?php

namespace Omnisale\Model\Product;

use Omnisale\Parser\StringHelper;
use JMS\Serializer\Annotation as Serializer;

class OmnisaleProductChannelDetailsData
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $short_description;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $url;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $width;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $height;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $depth;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $diameter;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $tax;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $vendor;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $tags;

    /**
     * @var OmnisaleProductChannelDetailsMetadata
     * @Serializer\Type("Omnisale\Model\Product\OmnisaleProductChannelDetailsMetadata")
     */
    public $metadata;
}