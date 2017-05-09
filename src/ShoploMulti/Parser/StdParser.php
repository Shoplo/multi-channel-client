<?php

namespace ShoploMulti\Parser;


class StdParser
{

    /**
     * @param $array
     * @return object|\stdClass
     */
    public static function parse($array )
    {
        $rv = new \stdClass();

        if (is_array($array)) {
            foreach($array as $k => $v) {
                $rv->$k = is_array($v)
                    ? self::parse($v)
                    : $v;
            }
        } else {
            $rv = (object) $array;
        }

        return $rv;
    }
}