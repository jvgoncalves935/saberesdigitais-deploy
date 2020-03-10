<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Solicitaco Entity
 *
 * @property int $ID
 * @property int $MateriaID
 * @property int $CPFAluno
 * @property int $CPFTutor
 * @property bool $Autorizada
 */
class Solicitaco extends Entity
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
        'MateriaID' => true,
        'CPFAluno' => true,
        'CPFTutor' => true,
        'Autorizada' => true
    ];
}
