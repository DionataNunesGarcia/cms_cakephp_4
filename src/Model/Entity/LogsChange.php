<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LogsChange Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $table_name
 * @property int $record_id
 * @property string $action_type
 * @property string $new_value
 * @property string $old_value
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Record $record
 */
class LogsChange extends Entity
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
        'user_id' => true,
        'table_name' => true,
        'record_id' => true,
        'action_type' => true,
        'new_value' => true,
        'old_value' => true,
        'created' => true,
        'user' => true,
        'record' => true,
    ];
}
