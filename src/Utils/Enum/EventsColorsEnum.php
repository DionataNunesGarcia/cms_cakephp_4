<?php


namespace App\Utils\Enum;


class EventsColorsEnum
{
    /*
     * Database entries statuses
     */
    const AQUA = '#00c0ef';
    const BLUE = '#0073b7';
    const LIGHT_BLUE = '#3c8dbc';
    const TEAL = '#39CCCC';
    const YELLOW = '#f39c12';
    const ORANGE = '#FF851B';
    const GREEN = '#00a65a';
    const LIME = '#01FF70';
    const RED = '#dd4b39';
    const PURPLE = '#605ca8';
    const FUCHSIA = '#F012BE';
    const MUTED = '#777';

    /**
     *
     */
    const ARRAY_STR = [
        self::AQUA => 'AQUA',
        self::BLUE => 'BLUE',
        self::LIGHT_BLUE => 'LIGHT_BLUE',
        self::TEAL => 'TEAL',
        self::YELLOW => 'YELLOW',
        self::ORANGE => 'ORANGE',
        self::GREEN => 'GREEN',
        self::LIME => 'LIME',
        self::RED => 'RED',
        self::PURPLE => 'PURPLE',
        self::FUCHSIA => 'FUCHSIA',
        self::MUTED => 'MUTED',
    ];

    /**
     * @param string $type
     * @return string
     */
    public static function getType(string $type) :string
    {
        return self::ARRAY_STR[$type];
    }
}
