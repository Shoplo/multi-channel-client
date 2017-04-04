<?php

namespace Omnisale\Model\Order;

use Omnisale\Parser\StringHelper;
use JMS\Serializer\Annotation as Serializer;

class OmnisaleOrderCustomerChannel
{
    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $id;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $shop_channel_id;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $external_customer_id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $total_spent;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $orders_count;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $note;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $state;

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
    public $external_last_order_id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $external_last_order_date;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $tax_exempt;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $tags;

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
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param $shop_channel_id
     */
    public function setShopChannelId($shop_channel_id)
    {
        $this->shop_channel_id = $shop_channel_id;
    }

    /**
     * @param int $external_customer_id
     */
    public function setExternalCustomerId($external_customer_id)
    {
        $this->external_customer_id = $external_customer_id;
    }

    /**
     * @param string $total_spent
     */
    public function setTotalSpent($total_spent)
    {
        $this->total_spent = $total_spent;
    }

    /**
     * @param int $orders_count
     */
    public function setOrdersCount($orders_count)
    {
        $this->orders_count = $orders_count;
    }

    /**
     * @param string $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

    /**
     * @param string $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param string $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @param string $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @param string $external_last_order_id
     */
    public function setExternalLastOrderId($external_last_order_id)
    {
        $this->external_last_order_id = $external_last_order_id;
    }

    /**
     * @param string $external_last_order_date
     */
    public function setExternalLastOrderDate($external_last_order_date)
    {
        $this->external_last_order_date = $external_last_order_date;
    }

    /**
     * @param string $tax_exempt
     */
    public function setTaxExempt($tax_exempt)
    {
        $this->tax_exempt = $tax_exempt;
    }

    /**
     * @param $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    /**
     * @param string $updated_at
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }
}