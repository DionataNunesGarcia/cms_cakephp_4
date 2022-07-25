<?php


namespace App\Utils\Enum;


class LogsChangeTypesEnum
{
    /*
     * Database entries statuses
     */
    const CREATE = 'Create';
    const UPDATE = 'Update';
    const DELETE = 'Delete';

    const ARRAY_STR = [
        self::CREATE => 'Criado',
        self::UPDATE => 'Alterado',
        self::DELETE => 'Deletado',
    ];

    public static function getType($type) {
        return self::ARRAY_STR[$type];
    }
}
