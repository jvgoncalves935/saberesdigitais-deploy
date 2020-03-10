<?php
use Migrations\AbstractMigration;

class Aulas extends AbstractMigration
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
        $tabela = $this->table('aulas');
        $tabela->addColumn('Autorizada','boolean',[
            'default' => false,
            'null' => false
        ]);

        $tabela->addColumn('Validada','boolean',[
            'default' => false,
            'null' => false
        ]);

        $tabela->update();
    }
}
