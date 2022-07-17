<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SystemParameter Entity
 *
 * @property int $id
 * @property string $social_reason
 * @property string $fantasy_name
 * @property string $cnpj_cpf
 * @property bool $generate_access_logs
 * @property bool $generate_change_log
 * @property string $emails
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class SystemParameter extends Entity
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
        'social_reason' => true,
        'fantasy_name' => true,
        'cnpj_cpf' => true,
        'generate_access_logs' => true,
        'generate_change_log' => true,
        'emails' => true,
        'created' => true,
        'modified' => true,
    ];
}
