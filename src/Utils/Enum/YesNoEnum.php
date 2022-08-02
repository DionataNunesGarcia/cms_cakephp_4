<?php

namespace App\Utils\Enum;

class YesNoEnum
{
    /**
     * @return string[]
     */
    public static function getArray() :array
    {
        return [
            1 => 'Sim',
            0 => 'Não',
        ];
    }

    /**
     * @param string $type
     * @return string
     */
    public static function getType(string $type) :string
    {
        return self::getArray()[$type];
    }
}
