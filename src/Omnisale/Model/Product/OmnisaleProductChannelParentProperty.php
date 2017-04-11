<?php

namespace Omnisale\Model\Product;

use Omnisale\Parser\StringHelper;
use JMS\Serializer\Annotation as Serializer;

class OmnisaleProductChannelParentProperty
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
     * @var int
     * @Serializer\Type("integer")
     */
    public $position;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $external_id;
}