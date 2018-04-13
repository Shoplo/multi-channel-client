<?php

namespace ShoploMulti\Model\Order;

use JMS\Serializer\Annotation as Serializer;

class ShoploMultiOrderCustomer
{
    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $id;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    public $accepts_marketing;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $email;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $first_name;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $last_name;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $note;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $orders_count;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $tax_exempt;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $total_spent;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    public $verified_email;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $last_order_id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $last_order_date;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $currency;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $avatar_url;

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