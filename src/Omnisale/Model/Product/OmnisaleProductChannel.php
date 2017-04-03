<?php

namespace Omnisale\Model\Product;

use Omnisale\Parser\StringHelper;
use JMS\Serializer\Annotation as Serializer;

class OmnisaleProductChannel
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
    public $price;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $quantity;

    /**
     * @var OmnisaleProductChannelCategory[]
     * @Serializer\Type("array<OmnisaleProductChannelCategory>")
     */
    public $channel_categories;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $currency_code;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $language;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $main_image_url;

    /**
     * @var OmnisaleProductChannelImage
     * @Serializer\Type("OmnisaleProductChannelImage")
     */
    public $main_image;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $external_product_id;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $shop_channel_id;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $channel_id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $status;

    /**
     * @var OmnisaleProductChannelDetails
     * @Serializer\Type("OmnisaleProductChannelDetails")
     */
    public $channel_details;

    /**
     * @var OmnisaleProductChannelParentProperty[]
     * @Serializer\Type("array<OmnisaleProductChannelParentProperty>")
     */
    public $parent_properties;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $updated_at;

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
     * @param int $price
     */
    public function setPrice(int $price)
    {
        $this->price = $price;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @param $channel_categories
     */
    public function setChannelCategories(array $channel_categories)
    {
        if( is_array($channel_categories) && $channel_categories ) {

            foreach( $channel_categories as $k => $v ) {

                $this->channel_categories[] = new OmnisaleProductChannelCategory((array)$v);
            }
        }
    }

    /**
     * @param string $currency_code
     */
    public function setCurrencyCode(string $currency_code)
    {
        $this->currency_code = $currency_code;
    }

    /**
     * @param string $language
     */
    public function setLanguage(string $language)
    {
        $this->language = $language;
    }

    /**
     * @param string $main_image_url
     */
    public function setMainImageUrl(string $main_image_url)
    {
        $this->main_image_url = $main_image_url;
    }

    /**
     * @param $main_image
     */
    public function setMainImage($main_image)
    {
        $this->main_image = new OmnisaleProductChannelImage($main_image);
    }

    /**
     * @param int $external_product_id
     */
    public function setExternalProductId(int $external_product_id)
    {
        $this->external_product_id = $external_product_id;
    }

    /**
     * @param int $shop_channel_id
     */
    public function setShopChannelId(int $shop_channel_id)
    {
        $this->shop_channel_id = $shop_channel_id;
    }

    /**
     * @param int $channel_id
     */
    public function setChannelId(int $channel_id)
    {
        $this->channel_id = $channel_id;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status)
    {
        $this->status = $status;
    }

    /**
     * @param $channel_details
     */
    public function setChannelDetails($channel_details)
    {
        $this->channel_details = new OmnisaleProductChannelDetails((array)$channel_details);
    }

    /**
     * @param $parent_properties
     */
    public function setParentProperties(array $parent_properties)
    {
        if( is_array($parent_properties) && $parent_properties ) {

            foreach( $parent_properties as $k => $v ) {

                $this->parent_properties[] = new OmnisaleProductChannelParentProperty((array)$v);
            }
        }
    }

    /**
     * @param string $updated_at
     */
    public function setUpdatedAt(string $updated_at)
    {
        $this->updated_at = $updated_at;
    }
}