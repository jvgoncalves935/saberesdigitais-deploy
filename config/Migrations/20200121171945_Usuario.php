<?php
use Migrations\AbstractMigration;

class Usuario extends AbstractMigration
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
        $tabela = $this->table('usuarios');

        $tabela->addColumn('Foto','string',[
            'default' => null,
            'null' => true,
            'limit' => 200
        ]);

        $tabela->update();
    }
}
