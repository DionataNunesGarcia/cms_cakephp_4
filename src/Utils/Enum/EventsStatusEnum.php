<?php


namespace App\Utils\Enum;


class EventsStatusEnum
{
    /*
     * 'scheduled','confirmed','in progress','rescheduled','completed'
     */
    const SCHEDULED = 'scheduled';
    const CONFIRMED = 'confirmed';
    const IN_PROGRESS = 'in progress';
    const RESCHEDULED = 'rescheduled';
    const COMPLETED = 'completed';

    /**
     *
     */
    const ARRAY_STR = [
        self::SCHEDULED => 'Agendado',
        self::CONFIRMED => 'Confirmado',
        self::IN_PROGRESS => 'Em Progresso',
        self::RESCHEDULED => 'Reagendado',
        self::COMPLETED => 'Finalizado',
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
