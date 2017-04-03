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
     * @Serializer\Type("OmnisaleProductChannelDetailsMetadata")
     */
    public $metadata;

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
     * @param string $short_description
     */
    public function setShortDescription(string $short_description)
    {
        $this->short_description = $short_description;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
    }

    /**
     * @param string $width
     */
    public function setWidth(string $width)
    {
        $this->width = $width;
    }

    /**
     * @param string $height
     */
    public function setHeight(string $height)
    {
        $this->height = $height;
    }

    /**
     * @param string $depth
     */
    public function setDepth(string $depth)
    {
        $this->depth = $depth;
    }

    /**
     * @param string $diameter
     */
    public function setDiameter(string $diameter)
    {
        $this->diameter = $diameter;
    }

    /**
     * @param string $tax
     */
    public function setTax(string $tax)
    {
        $this->tax = $tax;
    }

    /**
     * @param string $vendor
     */
    public function setVendor(string $vendor)
    {
        $this->vendor = $vendor;
    }

    /**
     * @param \string[] $tags
     */
    public function setTags(array $tags)
    {
        $this->tags = $tags;
    }

    /**
     * @param $metadata
     */
    public function setMetadata($metadata)
    {
        $this->metadata = new OmnisaleProductChannelDetailsMetadata((array)$metadata);
    }
}