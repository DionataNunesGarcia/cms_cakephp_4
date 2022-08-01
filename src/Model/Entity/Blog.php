<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Blog Entity
 *
 * @property int $id
 * @property string $title
 * @property string $subtitle
 * @property string $slug
 * @property string|null $content
 * @property string $user_id
 * @property string $blog_category_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\BlogCategory $blog_category
 */
class Blog extends Entity
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
        'subtitle' => true,
        'slug' => true,
        'content' => true,
        'user_id' => true,
        'blog_category_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'blog_category' => true,
    ];
}
