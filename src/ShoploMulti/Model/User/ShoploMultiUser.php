<?php

namespace ShoploMulti\Model\User;

use JMS\Serializer\Annotation as Serializer;

class ShoploMultiUser
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
     * @var ShoploMultiUserShop
     * @Serializer\Type("ShoploMulti\Model\User\ShoploMultiUserShop")
     */
    public $shop;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $created_at;
}