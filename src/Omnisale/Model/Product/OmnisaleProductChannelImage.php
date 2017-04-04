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

    /**
     * @param array $data
     */
    public function __construct( Array $data = [] )
    {
        if( count($data) )
        {
            foreach( $data as $key => $value )
            {
                $field = StringHelper::convertStringToCamelCase( $key );

                $setterMethod = 'set' . $field;
                if( method_exists( $this, $setterMethod ) ){
                    $value = is_null($value) ? '': $value;
                    $this->$setterMethod( $value );
                }
            }
        }
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param int $external_id
     */
    public function setExternalId($external_id)
    {
        $this->external_id = $external_id;
    }

    /**
     * @param int $product_image_id
     */
    public function setProductImageId($product_image_id)
    {
        $this->product_image_id = $product_image_id;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param string $src
     */
    public function setSrc($src)
    {
        $this->src = $src;
    }

    /**
     * @param string $original_src
     */
    public function setOriginalSrc($original_src)
    {
        $this->original_src = $original_src;
    }

    /**
     * @param string $raw_src
     */
    public function setRawSrc($raw_src)
    {
        $this->raw_src = $raw_src;
    }

    /**
     * @param string $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }
}