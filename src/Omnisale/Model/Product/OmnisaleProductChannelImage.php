<?php

namespace Omnisale\Model\Product;

use Omnisale\Parser\StringHelper;
use JMS\Serializer\Annotation as Serializer;

class OmnisaleProductChannelImage
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
     * @var int
     * @Serializer\Type("integer")
     */
    public $product_image_id;

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
    public $original_src;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $raw_src;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $position;
}