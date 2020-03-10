<?php
use Migrations\AbstractMigration;

class Materias extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $tabela = $this->table('materias');
        $tabela->addColumn('ContagemAulas','integer',[
            'default' => 0,
            'null' => false,
            'limit' => 11
        ]);

        $tabela->update();
    }
}
