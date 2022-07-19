<?php


namespace App\Utils\Enum;


class StatusEnum
{
    /*
     * Database entries statuses
     */
    const DEFAULT = 0;
    const ACTIVE = 1;
    const INACTIVE = 2;
    const PENDING = 3;
    const CANCELED = 4;
    const INTERESTED = 6;
    const DRAFT = 7;
    const EXCLUDED = 8;
    const SUSPENDED = 9;
    const EXPIRED = 10;
    const BLOCKED = 11;
    const WAITING = 12;
    const FINISHED = 13;

    const ARRAY_STR = [
        self::DEFAULT => 'Default',
        self::ACTIVE => 'Ativo',
        self::INACTIVE => 'Inativo',
        self::PENDING => 'Pendente',
        self::CANCELED => 'Cancelado',
        self::INTERESTED => 'Interessado',
        self::DRAFT => 'Rascunho',
        self::EXCLUDED => 'Excluído',
        self::SUSPENDED => 'Suspenso',
        self::EXPIRED => 'Expirado',
        self::BLOCKED => 'Bloqueado',
        self::WAITING => 'Aguardando',
        self::FINISHED => 'Finalizado',
    ];

    const ARRAY_SIMPLE = [
        self::ACTIVE => 'Ativo',
        self::INACTIVE => 'Inativo',
        self::BLOCKED => 'Bloqueado',
    ];

    public static function getType($type) {
        return self::ARRAY_STR[$type];
    }
}
