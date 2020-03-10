<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * QuestionariosTipo Entity
 *
 * @property int $ID
 * @property string $CPF
 * @property int $Pergunta01
 * @property int $Pergunta02
 * @property int $Pergunta03
 * @property int $Pergunta04
 * @property int $Pergunta05
 * @property int $Pergunta06
 * @property int $Pergunta07
 * @property int $Pergunta08
 * @property int $Pergunta09
 * @property int $Pergunta10
 * @property int $Pergunta11
 * @property int $Pergunta12
 * @property int $Pergunta13
 * @property int $Pergunta14
 * @property int $Pergunta15
 */
class QuestionariosTipo extends Entity
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
        'Pergunta01' => true,
        'Pergunta02' => true,
        'Pergunta03' => true,
        'Pergunta04' => true,
        'Pergunta05' => true,
        'Pergunta06' => true,
        'Pergunta07' => true,
        'Pergunta08' => true,
        'Pergunta09' => true,
        'Pergunta10' => true,
        'Pergunta11' => true,
        'Pergunta12' => true,
        'Pergunta13' => true,
        'Pergunta14' => true,
        'Pergunta15' => true
    ];
}
