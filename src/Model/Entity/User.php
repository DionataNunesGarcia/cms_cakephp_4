<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $user
 * @property string $password
 * @property string $email
 * @property string $name
 * @property string $phone
 * @property string $cell_phone
 * @property int $status
 * @property bool $super
 * @property int $level_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Level $level
 * @property \App\Model\Entity\LogsAcces[] $logs_access
 * @property \App\Model\Entity\LogsChange[] $logs_change
 * @property \App\Model\Entity\Upload[] $uploads
 */
class User extends Entity
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
        'user' => true,
        'password' => true,
        'email' => true,
        'name' => true,
        'phone' => true,
        'cell_phone' => true,
        'status' => true,
        'super' => true,
        'level_id' => true,
        'created' => true,
        'modified' => true,
        'level' => true,
        'logs_access' => true,
        'logs_change' => true,
        'uploads' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'password',
    ];

    /**
     * @param string $password
     * @return string|null
     */
    protected function _setPassword(string $password) : ?string
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
        return null;
    }
}
