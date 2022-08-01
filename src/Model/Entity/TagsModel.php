<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TagsModel Entity
 *
 * @property int $id
 * @property string $tag_id
 * @property int|null $foreign_key
 * @property string|null $model
 *
 * @property \App\Model\Entity\Tag $tag
 */
class TagsModel extends Entity
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
        'tag_id' => true,
        'foreign_key' => true,
        'model' => true,
        'tag' => true,
    ];
}
