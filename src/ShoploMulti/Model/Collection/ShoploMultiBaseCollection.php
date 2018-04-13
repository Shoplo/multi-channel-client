<?php
/**
 * Created by PhpStorm.
 * User: adrianadamiec
 * Date: 04.05.2017
 * Time: 14:30
 */

namespace ShoploMulti\Model\Collection;

use JMS\Serializer\Annotation as Serializer;

class ShoploMultiBaseCollection implements \IteratorAggregate
{
    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $page;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $limit;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $pages;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $total;

    public $items = [];

    public function addItem($obj, $key = null)
    {
        if ($key == null) {
            $this->items[] = $obj;
        } else {
            if (isset($this->items[$key])) {
                throw new \Exception("Key $key already in use.");
            } else {
                $this->items[$key] = $obj;
            }
        }
    }

    public function deleteItem($key)
    {
        if (isset($this->items[$key])) {
            unset($this->items[$key]);
        } else {
            throw new \Exception("Invalid key $key.");
        }
    }

    public function getItem($key)
    {
        if (isset($this->items[$key])) {
            return $this->items[$key];
        } else {
            throw new \Exception("Invalid key $key.");
        }
    }

    public function keys()
    {
        return array_keys($this->items);
    }

    public function length()
    {
        return count($this->items);
    }

    public function keyExists($key)
    {
        return isset($this->items[$key]);
    }

    public function getIterator()
    {
        return $this->items;
    }

//    public abstract function addItem($obj, $key = null);
//    public abstract function deleteItem($key);
//    public abstract function getItem($key);
//    public abstract function keys();
//    public abstract function length();
//    public abstract function keyExists($key);
//    public abstract function getIterator();
}