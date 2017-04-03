<?php

namespace Omnisale\Model\Product;

use Omnisale\Parser\StringHelper;
use JMS\Serializer\Annotation as Serializer;

class OmnisaleProductDetails
{

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $title;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $short_description;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $description;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $width;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $height;

    /**
     * @var integer
     * @Serializer\Type("integer")
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
    public $measure_unit;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $category;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $tags;

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
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @param string $short_description
     */
    public function setShortDescription(string $short_description)
    {
        $this->short_description = $short_description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * @param int $width
     */
    public function setWidth(int $width)
    {
        $this->width = $width;
    }

    /**
     * @param int $height
     */
    public function setHeight(int $height)
    {
        $this->height = $height;
    }

    /**
     * @param int $depth
     */
    public function setDepth(int $depth)
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
     * @param string $measure_unit
     */
    public function setMeasureUnit(string $measure_unit)
    {
        $this->measure_unit = $measure_unit;
    }

    /**
     * @param $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @param $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }
}