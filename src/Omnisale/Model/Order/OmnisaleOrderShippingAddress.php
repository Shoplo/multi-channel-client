<?php

namespace Omnisale\Model\Order;

use Omnisale\Parser\StringHelper;
use JMS\Serializer\Annotation as Serializer;

class OmnisaleOrderShippingAddress
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
    public $address1;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $address2;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $city;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $company;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $country;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $country_code;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    public $default;

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
    public $latitude;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $longitude;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $phone;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $province;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $province_code;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $zip;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $tax_id;
}