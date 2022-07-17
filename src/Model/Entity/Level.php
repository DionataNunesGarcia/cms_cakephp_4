<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Level Entity
 *
 * @property int $id
 * @property string $name
 * @property int $status
 * @property bool $deletable
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\LevelsPermission[] $levels_permissions
 * @property \App\Model\Entity\User[] $users
 */
class Level extends Entity
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
        'name' => true,
        'status' => true,
        'deletable' => true,
        'created' => true,
        'modified' => true,
        'levels_permissions' => true,
        'users' => true,
    ];
}
