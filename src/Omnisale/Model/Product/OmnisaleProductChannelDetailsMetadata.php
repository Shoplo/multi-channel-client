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
     * @param string $meta_title
     */
    public function setMetaTitle(string $meta_title)
    {
        $this->meta_title = $meta_title;
    }

    /**
     * @param string $meta_description
     */
    public function setMetaDescription(string $meta_description)
    {
        $this->meta_description = $meta_description;
    }

    /**
     * @param string $meta_keywords
     */
    public function setMetaKeywords(string $meta_keywords)
    {
        $this->meta_keywords = $meta_keywords;
    }
}