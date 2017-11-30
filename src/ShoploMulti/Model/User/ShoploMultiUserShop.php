<?php

namespace ShoploMulti\Model\User;


use JMS\Serializer\Annotation as Serializer;

class ShoploMultiUserShop
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
    public $email;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $lang;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $created_at;
}