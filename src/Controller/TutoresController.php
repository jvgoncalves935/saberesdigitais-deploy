<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Tutores Controller
 *
 * @property \App\Model\Table\TutoresTable $Tutores
 *
 * @method \App\Model\Entity\Tutore[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TutoresController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $tutores = $this->paginate($this->Tutores);

        $this->set(compact('tutores'));
    }

    /**
     * View method
     *
     * @param string|null $id Tutore id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tutore = $this->Tutores->get($id, [
            'contain' => []
        ]);

        $this->set('tutore', $tutore);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tutore = $this->Tutores->newEntity();
        if ($this->request->is('post')) {
            $tutore = $this->Tutores->patchEntity($tutore, $this->request->getData());
            if ($this->Tutores->save($tutore)) {
                $this->Flash->success(__('The tutore has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tutore could not be saved. Please, try again.'));
        }
        $this->set(compact('tutore'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tutore id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tutore = $this->Tutores->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tutore = $this->Tutores->patchEntity($tutore, $this->request->getData());
            if ($this->Tutores->save($tutore)) {
                $this->Flash->success(__('The tutore has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tutore could not be saved. Please, try again.'));
        }
        $this->set(compact('tutore'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tutore id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tutore = $this->Tutores->get($id);
        if ($this->Tutores->delete($tutore)) {
            $this->Flash->success(__('The tutore has been deleted.'));
        } else {
            $this->Flash->error(__('The tutore could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function relatorioAulas()
    {
        $tabelaCursos = TableRegistry::getTableLocator()->get('cursos');
        $cursosQuery = $tabelaCursos->find()->select(['CursoID','Nome']);
        $cursosIDs = array();
        foreach($cursosQuery as $curso){
            $cursosIDs[$curso['CursoID']] = $curso['Nome'];
        }

        $tabelaUsuarios = TableRegistry::getTableLocator()->get('usuarios');
        $usuariosQuery = $tabelaUsuarios->find()->select(['Cpf','Nome']);
        $usuariosIDs = array();
        foreach($usuariosQuery as $usuario){
            $usuariosIDs[$usuario['Cpf']] = $usuario['Nome'];
        }

        $tabelaMaterias = TableRegistry::getTableLocator()->get('materias');
        $materiasQuery = $tabelaMaterias->find()->select(['MateriaID','Nome','CursoID']);
        $materiasIDs = array();
        $materiasCursos = array();
        foreach($materiasQuery as $materia){
            $materiasIDs[$materia['MateriaID']] = $materia['Nome'];
            $materiasCursos[$materia['MateriaID']] = $materia['CursoID'];
        }
        
        $tabelaAulas = TableRegistry::getTableLocator()->get('aulas');
        $aulasQuery = $tabelaAulas->find('all', array(
            'order' => 'Cpf ASC'
            ))->where(['Validada' => true]);
        
        $aulasArray = array();
        
        foreach($aulasQuery as $aula){
            //$aula['NomeMateria'] = $materiasIDs[$aula['MateriaID']];
            $aulasArray[$aula['ID']] = $aula;
            //debug($aula['ID']." ". $aula['Cpf']);
        }
        //debug($aulasArray);

        $this->set(compact('aulasArray'));
        $this->set(compact('usuariosIDs'));
        $this->set(compact('materiasIDs'));
        $this->set(compact('materiasCursos'));
        $this->set(compact('cursosIDs'));
    }

    public function relatorioPerfis(){
        $tabelaUsuarios = TableRegistry::getTableLocator()->get('usuarios');
        $usuariosQuery = $tabelaUsuarios->find()->select(['Cpf','Nome']);
        $usuariosIDs = array();
        foreach($usuariosQuery as $usuario){
            $usuariosIDs[$usuario['Cpf']] = $usuario['Nome'];
        }

        $tabelaPerfis = TableRegistry::getTableLocator()->get('perfis_tipos');
        $perfisQuery = $tabelaPerfis->find()->select(['CPF','Perfil']);
        $perfisArrays = array();
        $perfisArrays['1'] = array();
        $perfisArrays['2'] = array();
        $perfisArrays['3'] = array();
        $perfisArrays['4'] = array();
        $perfisArrays['5'] = array();
        $perfisArrays['6'] = array();

        foreach($perfisQuery as $perfil){
            array_push($perfisArrays[$perfil['Perfil']],$usuariosIDs[$perfil['CPF']]);
        }

        //Iniciante,Empresarial,Programador,Gamer,Especialista em Redes,Robótica
        $nomesPerfis = array('1'=>'Iniciante','2'=>'Empresarial','3'=>'Programador','4'=>'Gamer','5'=>'Especialista em Redes','6'=>'Robótica');

        $this->set(compact('perfisArrays'));
        $this->set(compact('nomesPerfis'));
    }
}
