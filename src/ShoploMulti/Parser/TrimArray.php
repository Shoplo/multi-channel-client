<?php

namespace ShoploMulti\Parser;


class TrimArray
{
    public static function handle($input) {
        return is_array($input) ? array_filter($input,
            function (& $value) { return $value = self::handle($value); }
        ) : $input;
    }
}