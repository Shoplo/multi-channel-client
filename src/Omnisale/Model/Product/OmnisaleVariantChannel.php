<?php

namespace Omnisale\Model\Product;

use Omnisale\Parser\StringHelper;
use JMS\Serializer\Annotation as Serializer;

class OmnisaleVariantChannel
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
    public $external_id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $sku;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $price;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    public $is_syncing;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $compare_at_price;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $inventory_quantity;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $barcode;

    /**
     * @var OmnisaleVariantChannelProperty[]
     * @Serializer\Type("array<OmnisaleVariantChannelProperty>")
     */
    public $properties;

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
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @param int $external_id
     */
    public function setExternalId(int $external_id)
    {
        $this->external_id = $external_id;
    }

    /**
     * @param string $sku
     */
    public function setSku(string $sku)
    {
        $this->sku = $sku;
    }

    /**
     * @param int $price
     */
    public function setPrice(int $price)
    {
        $this->price = $price;
    }

    /**
     * @param boolean $is_syncing
     */
    public function setIsSyncing(bool $is_syncing)
    {
        $this->is_syncing = $is_syncing;
    }

    /**
     * @param int $compare_at_price
     */
    public function setCompareAtPrice(int $compare_at_price)
    {
        $this->compare_at_price = $compare_at_price;
    }

    /**
     * @param int $inventory_quantity
     */
    public function setInventoryQuantity(int $inventory_quantity)
    {
        $this->inventory_quantity = $inventory_quantity;
    }

    /**
     * @param string $barcode
     */
    public function setBarcode(string $barcode)
    {
        $this->barcode = $barcode;
    }

    /**
     * @param $properties
     */
    public function setProperties(array $properties)
    {
        if( is_array($properties) && $properties ) {

            foreach( $properties as $k => $v ) {

                $this->properties[] = new OmnisaleVariantChannelProperty((array)$v);
            }
        }
    }
}