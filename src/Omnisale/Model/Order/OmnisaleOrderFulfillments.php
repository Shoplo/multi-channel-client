<?php

namespace Omnisale\Model\Order;

use Omnisale\Parser\StringHelper;
use JMS\Serializer\Annotation as Serializer;

class OmnisaleOrderFulfillments
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
    public $tracking_company;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $tracking_numbers;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $tracking_urls;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $tracking_data;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $status;

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
     * @param int $tracking_company
     */
    public function setTrackingCompany($tracking_company)
    {
        $this->tracking_company = $tracking_company;
    }

    /**
     * @param string $tracking_numbers
     */
    public function setTrackingNumbers($tracking_numbers)
    {
        $this->tracking_numbers = $tracking_numbers;
    }

    /**
     * @param \string[] $tracking_urls
     */
    public function setTrackingUrls($tracking_urls)
    {
        $this->tracking_urls = $tracking_urls;
    }

    /**
     * @param string $tracking_data
     */
    public function setTrackingData($tracking_data)
    {
        $this->tracking_data = $tracking_data;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
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