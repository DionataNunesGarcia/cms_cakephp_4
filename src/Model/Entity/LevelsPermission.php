<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LevelsPermission Entity
 *
 * @property int $id
 * @property int $level_id
 * @property string $prefix
 * @property string $controller
 * @property string $action
 *
 * @property \App\Model\Entity\Level $level
 */
class LevelsPermission extends Entity
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
        'level_id' => true,
        'prefix' => true,
        'controller' => true,
        'action' => true,
        'level' => true,
    ];
}
