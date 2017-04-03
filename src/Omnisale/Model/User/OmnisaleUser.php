<?php

namespace Omnisale\Model\User;

use Omnisale\Parser\StringHelper;
use JMS\Serializer\Annotation as Serializer;

class OmnisaleUser
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
    public $first_name;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $last_name;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    public $is_blankslate_done;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $pass_last_updated;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $roles;

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
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @param string $avatar_url
     */
    public function setAvatarUrl(string $avatar_url)
    {
        $this->avatar_url = $avatar_url;
    }

    /**
     * @param string $first_name
     */
    public function setFirstName(string $first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @param string $last_name
     */
    public function setLastName(string $last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @param $is_blankslate_done
     */
    public function setIsBlankslateDone($is_blankslate_done)
    {
        $this->is_blankslate_done = $is_blankslate_done;
    }

    /**
     * @param string $pass_last_updated
     */
    public function setPassLastUpdated(string $pass_last_updated)
    {
        $this->pass_last_updated = $pass_last_updated;
    }

    /**
     * @param $roles
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;
    }
}