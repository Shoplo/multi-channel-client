<?php

namespace Omnisale\Model\Customer;

use Omnisale\Parser\StringHelper;
use JMS\Serializer\Annotation as Serializer;

class OmnisaleCustomer
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
     * @var integer
     * @Serializer\Type("integer")
     */
    public $orders_count;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $tax_exempt;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $total_spent;

    /**
     * @var boolean
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