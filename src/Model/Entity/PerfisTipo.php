<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PerfisTipo Entity
 *
 * @property int $ID
 * @property string $CPF
 * @property int $Perfil
 */
class PerfisTipo extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'CPF' => true,
        'Perfil' => true
    ];
}
