<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * About Entity
 *
 * @property int $id
 * @property string $title
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $cell_phone
 * @property string|null $facebook
 * @property string|null $instagram
 * @property string|null $linkedin
 * @property string|null $github
 * @property string $about
 * @property string $vision
 * @property string $mission
 * @property string $values
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class About extends Entity
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
        'email' => true,
        'phone' => true,
        'cell_phone' => true,
        'facebook' => true,
        'instagram' => true,
        'linkedin' => true,
        'github' => true,
        'about' => true,
        'vision' => true,
        'mission' => true,
        'values_about' => true,
    ];
}
