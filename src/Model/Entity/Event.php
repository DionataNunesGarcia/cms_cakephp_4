<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Event Entity
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $details
 * @property int|null $event_type_id
 * @property \Cake\I18n\FrozenTime|null $start
 * @property \Cake\I18n\FrozenTime|null $end
 * @property bool $all_day
 * @property int $status
 * @property int $user_id
 * @property string $event_status
 * @property int|null $foreign_key
 * @property string|null $model
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\EventType $event_type
 */
class Event extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'title' => true,
        'slug' => true,
        'details' => true,
        'event_type_id' => true,
        'start' => true,
        'end' => true,
        'all_day' => true,
        'status' => true,
        'user_id' => true,
        'event_status' => true,
        'foreign_key' => true,
        'model' => true,
        'created' => true,
        'modified' => true,
        'event_type' => true,
    ];
}
