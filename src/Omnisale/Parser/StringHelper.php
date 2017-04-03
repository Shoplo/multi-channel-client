<?php

namespace Omnisale\Parser;


class StringHelper
{
    public static function ucword($str)
    {
        return mb_convert_case($str, MB_CASE_TITLE, "UTF-8");
    }

    public static function convertStringToCamelCase($string, $separator = "_")
    {
        $camelCaseString = $string;
        $stringArr       = explode("_", $string);
        if (count($stringArr))
        {
            foreach ($stringArr as $k => $f)
            {
                $stringArr[$k] = self::ucword($f);
            }
            $camelCaseString = implode("", $stringArr);
        }

        return $camelCaseString;
    }

    public static function normalise($str, $separator = '-')
    {
        $str = trim($str);
        $str = self::translit($str);
        $str = mb_strtolower($str);
        $str = mb_ereg_replace('(\W+)', $separator, $str);
        $str = trim($str, $separator);

        return $str;
    }

    public static function translit($str)
    {
        return @iconv('UTF-8', 'ASCII//TRANSLIT', $str);
    }
}