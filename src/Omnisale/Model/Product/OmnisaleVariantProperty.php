<?php

namespace Omnisale\Model\Product;

use Omnisale\Parser\StringHelper;
use JMS\Serializer\Annotation as Serializer;

class OmnisaleVariantProperty
{
    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $parent_property_id;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $external_id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $title;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $value;

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
     * @param int $parent_property_id
     */
    public function setParentPropertyId($parent_property_id)
    {
        $this->parent_property_id = $parent_property_id;
    }

    /**
     * @param int $external_id
     */
    public function setExternalId($external_id)
    {
        $this->external_id = $external_id;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }
}