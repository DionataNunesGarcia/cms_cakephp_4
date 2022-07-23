<?php

namespace App\Utils;

class ConvertCharacters
{
    /**
     * @param string $value
     * @return int|null
     */
    public static function onlyNumbers(string $value) :?int
    {
        if (empty($value) || intval($value) == 0) {
            return null;
        }
        return preg_replace('/[^0-9]/', '', $value);
    }
}
