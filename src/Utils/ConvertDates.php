<?php

namespace App\Utils;

use Cake\I18n\FrozenTime;

class ConvertDates
{
    /**
     * @param FrozenTime|null $date
     * @param bool $time
     * @param bool $seconds
     * @return string
     */
    public static function convertDateToPtBR(FrozenTime $date = null, bool $time = false, bool $seconds = true): string
    {
        if (empty($date)) {
            return '';
        }
        $strTime = $time ? " H:i" : "";
        $strSeconds = $time && $seconds ? ":s" : "";
        return $date->format("d/m/Y{$strTime}{$strSeconds}");
    }

    /**
     * @param FrozenTime $date
     * @return string
     */
    public static function convertTimeToPtBR(FrozenTime $date): string
    {
        if (empty($date)) {
            return '';
        }
        return $date->format("H:i:s");
    }

    /**
     * @param string $value
     * @return string
     */
    public static function convertDateToDB(string $value) :string
    {
        if (empty($value) || $value == '00/00/0000') {
            return '';
        }
        $dateTime = \DateTime::createFromFormat('d/m/Y', $value);

        return $dateTime->format('Y-m-d');
    }

    /**
     * @param string $value
     * @return string
     */
    public static function convertDateTimeToDB(string $value = null) :string
    {
        if (empty($value) || $value == '00/00/0000') {
            return '';
        }

//        $value = strlen($value) > 16 ? substr($value, 0, -3) : $value;
        $dateTime = \DateTime::createFromFormat('d/m/Y H:i:s', $value);

        return $dateTime->format('Y-m-d H:i:s');
    }

    /**
     * @param string $value
     * @return string
     */
    public static function convertDateTimeToFrozen(string $value = null) :FrozenTime
    {
        if (empty($value) || $value == '00/00/0000') {
            return '';
        }
        $dateTime = \DateTime::createFromFormat('d/m/Y H:i:s', $value);

        return FrozenTime::parse($dateTime);
    }
}
