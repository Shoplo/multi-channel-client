<?php

namespace Omnisale\Model\Product;

use Omnisale\Parser\StringHelper;
use JMS\Serializer\Annotation as Serializer;

class OmnisaleProduct
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
     * @var string
     * @Serializer\Type("string")
     */
    public $img_url;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $visibility;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $currency_code;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $channels_count;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $created_at;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $updated_at;

    /**
     * @var OmnisaleProductDetails
     * @Serializer\Type("OmnisaleProductDetails")
     */
    public $details;

    /**
     * @var OmnisaleProductVariant[]
     * @Serializer\Type("array<OmnisaleProductVariant>")
     */
    public $variants;

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
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @param string $img_url
     */
    public function setImgUrl(string $img_url)
    {
        $this->img_url = $img_url;
    }

    /**
     * @param boolean $visibility
     */
    public function setVisibility(bool $visibility)
    {
        $this->visibility = $visibility;
    }

    /**
     * @param string $currency_code
     */
    public function setCurrencyCode(string $currency_code)
    {
        $this->currency_code = $currency_code;
    }

    /**
     * @param int $channels_count
     */
    public function setChannelsCount(int $channels_count)
    {
        $this->channels_count = $channels_count;
    }

    /**
     * @param string $created_at
     */
    public function setCreatedAt(string $created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @param string $updated_at
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    /**
     * @param $details
     */
    public function setDetails($details)
    {
        $this->details = new OmnisaleProductDetails($details);
    }

    /**
     * @param $variants
     */
    public function setVariants($variants)
    {
        if( is_array($variants) && $variants ) {

            foreach( $variants as $k => $v ) {

                $this->variants[] = new OmnisaleProductVariant((array)$v);
            }
        }
    }
}