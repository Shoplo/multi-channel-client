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
                if( method_exists( $this, $setterMethod ) ) {
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
     * @param boolean $accepts_marketing
     */
    public function setAcceptsMarketing($accepts_marketing)
    {
        $this->accepts_marketing = $accepts_marketing;
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
     * @param string $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

    /**
     * @param int $orders_count
     */
    public function setOrdersCount($orders_count)
    {
        $this->orders_count = $orders_count;
    }

    /**
     * @param string $tax_exempt
     */
    public function setTaxExempt($tax_exempt)
    {
        $this->tax_exempt = $tax_exempt;
    }

    /**
     * @param int $total_spent
     */
    public function setTotalSpent($total_spent)
    {
        $this->total_spent = $total_spent;
    }

    /**
     * @param boolean $verified_email
     */
    public function setVerifiedEmail($verified_email)
    {
        $this->verified_email = $verified_email;
    }

    /**
     * @param string $last_order_id
     */
    public function setLastOrderId($last_order_id)
    {
        $this->last_order_id = $last_order_id;
    }

    /**
     * @param string $last_order_date
     */
    public function setLastOrderDate($last_order_date)
    {
        $this->last_order_date = $last_order_date;
    }

    /**
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @param string $avatar_url
     */
    public function setAvatarUrl($avatar_url)
    {
        $this->avatar_url = $avatar_url;
    }

    /**
     * @param string $created_at
     */
    public function setCreatedAt($created_at)
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
}