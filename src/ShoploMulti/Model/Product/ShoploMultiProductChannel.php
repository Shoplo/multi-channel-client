<?php

namespace ShoploMulti\Model\Product;

use ShoploMulti\Parser\StringHelper;
use JMS\Serializer\Annotation as Serializer;

class ShoploMultiProductChannel
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
     * @var ShoploMultiProductChannelCategory[]
     * @Serializer\Type("array<ShoploMulti\Model\Product\ShoploMultiProductChannelCategory>")
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
     * @var ShoploMultiProductChannelImage
     * @Serializer\Type("ShoploMulti\Model\Product\ShoploMultiProductChannelImage")
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
     * @var ShoploMultiProductChannelDetails
     * @Serializer\Type("ShoploMulti\Model\Product\ShoploMultiProductChannelDetails")
     */
    public $channel_details;

    /**
     * @var ShoploMultiProductChannelParentProperty[]
     * @Serializer\Type("array<ShoploMulti\Model\Product\ShoploMultiProductChannelParentProperty>")
     */
    public $parent_properties;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $updated_at;
}