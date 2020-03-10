<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Aula Entity
 *
 * @property int $ID
 * @property string|null $Cpf
 * @property int $MateriaID
 * @property int $Pergunta01
 * @property int $Pergunta02
 * @property int $Pergunta03
 */
class Aula extends Entity
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
        'Cpf' => true,
        'MateriaID' => true,
        'Pergunta01' => true,
        'Pergunta02' => true,
        'Pergunta03' => true,
        'Autorizada' => true,
        'Validada' => true
    ];
}
