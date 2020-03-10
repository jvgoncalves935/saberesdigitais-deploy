<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Aluno Entity
 *
 * @property int $ID
 * @property string $CpfAluno
 * @property string $CpfTutor
 * @property int $EscolaID
 * @property int $Level
 * @property int $EXPTotal
 *
 * @property \App\Model\Entity\Conquista[] $conquistas
 */
class Aluno extends Entity
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
        'CpfAluno' => true,
        'CpfTutor' => true,
        'EscolaID' => true,
        'Level' => true,
        'EXPTotal' => true,
        'conquistas' => true
    ];
}
