<?php

namespace ShoploMulti\Model\Order;

use JMS\Serializer\Annotation as Serializer;

class ShoploMultiOrderFulfillments
{
    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $tracking_company;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $tracking_numbers;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $tracking_urls;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $tracking_data = [];

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $status;

    /**
     * @var integer[]
     * @Serializer\Type("array<integer>")
     */
    public $order_items_ids;

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
}