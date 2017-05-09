<?php

namespace ShoploMulti\Model\User;

use ShoploMulti\Parser\StringHelper;
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
     * @var string
     * @Serializer\Type("string")
     */
    public $avatar_url;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $source;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $lang;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $industry;

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
    public $created_at;
}