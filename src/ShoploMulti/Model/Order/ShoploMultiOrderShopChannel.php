<?php

namespace ShoploMulti\Model\Order;

use JMS\Serializer\Annotation as Serializer;

class ShoploMultiOrderShopChannel
{
    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $id;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $external_id;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $channel_type;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $channel_id_name;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $channel_title;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $last_time_checked;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $orders_count;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $revenue;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $currency_code;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $currency_name;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $locale;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $language_name;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $channel_logo;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $channel_logo_small;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $channel_url;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $shop_channel_url;
}