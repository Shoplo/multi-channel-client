<?php

namespace Omnisale\Model\Product;

use Omnisale\Parser\StringHelper;
use JMS\Serializer\Annotation as Serializer;

class OmnisaleProductVariant
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
    public $product_id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $title;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $sku;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $price;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $compare_at_price;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $img_url;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $inventory_quantity;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $inventory_group;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $weight;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $availability_description;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $position;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $barcode;


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
     * @param int $product_id
     */
    public function setProductId(int $product_id)
    {
        $this->product_id = $product_id;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
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
     * @param int $compare_at_price
     */
    public function setCompareAtPrice(int $compare_at_price)
    {
        $this->compare_at_price = $compare_at_price;
    }

    /**
     * @param string $img_url
     */
    public function setImgUrl(string $img_url)
    {
        $this->img_url = $img_url;
    }

    /**
     * @param int $inventory_quantity
     */
    public function setInventoryQuantity(int $inventory_quantity)
    {
        $this->inventory_quantity = $inventory_quantity;
    }

    /**
     * @param string $inventory_group
     */
    public function setInventoryGroup(string $inventory_group)
    {
        $this->inventory_group = $inventory_group;
    }

    /**
     * @param int $weight
     */
    public function setWeight(int $weight)
    {
        $this->weight = $weight;
    }

    /**
     * @param string $availability_description
     */
    public function setAvailabilityDescription(string $availability_description)
    {
        $this->availability_description = $availability_description;
    }

    /**
     * @param int $position
     */
    public function setPosition(int $position)
    {
        $this->position = $position;
    }

    /**
     * @param string $barcode
     */
    public function setBarcode(string $barcode)
    {
        $this->barcode = $barcode;
    }
}