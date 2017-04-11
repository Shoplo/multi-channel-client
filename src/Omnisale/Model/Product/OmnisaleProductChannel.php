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
     * @Serializer\Type("array<Omnisale\Model\Product\OmnisaleProductChannelCategory>")
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
     * @Serializer\Type("Omnisale\Model\Product\OmnisaleProductChannelImage")
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
     * @Serializer\Type("Omnisale\Model\Product\OmnisaleProductChannelDetails")
     */
    public $channel_details;

    /**
     * @var OmnisaleProductChannelParentProperty[]
     * @Serializer\Type("array<Omnisale\Model\Product\OmnisaleProductChannelParentProperty>")
     */
    public $parent_properties;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $updated_at;
}