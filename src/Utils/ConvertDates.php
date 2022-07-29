<?php

namespace App\Utils;

use Cake\I18n\FrozenTime;

class ConvertDates
{
    /**
     * @param FrozenTime $date
     * @param bool $time
     * @return string
     */
    public static function convertDateToPtBR(FrozenTime $date, bool $time = false): string
    {
        if (empty($date)) {
            return '';
        }
        $strTime = $time ? " H:i:s" : "";
        return $date->format("d/m/Y{$strTime}");
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
}
