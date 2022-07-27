<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Upload Entity
 *
 * @property int $id
 * @property string $filename
 * @property int|null $foreign_key
 * @property string|null $model
 * @property string|null $type
 * @property int|null $order_files
 * @property int $user_id
 * @property string|null $extension
 * @property string|null $alt
 * @property string $description
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 */
class Upload extends Entity
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
        'filename' => true,
        'foreign_key' => true,
        'model' => true,
        'type' => true,
        'order_files' => true,
        'user_id' => true,
        'extension' => true,
        'alt' => true,
        'description' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
    ];
}
