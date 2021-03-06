<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Materias Controller
 *
 * @property \App\Model\Table\MateriasTable $Materias
 *
 * @method \App\Model\Entity\Materia[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MateriasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $materias = $this->paginate($this->Materias);

        $this->set(compact('materias'));
    }

    /**
     * View method
     *
     * @param string|null $id Materia id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $materia = $this->Materias->get($id, [
            'contain' => ['Cursos']
        ]);

        $this->set('materia', $materia);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $materia = $this->Materias->newEntity();
        if ($this->request->is('post')) {
            $materia = $this->Materias->patchEntity($materia, $this->request->getData());

            //debug($materia);
            //exit();
            if ($this->Materias->save($materia)) {
                $this->Flash->success(__('Matéria adicionada com sucesso.'));
                return $this->redirect(['action' => 'index']);
            }else{
                $this->Flash->error(__('Erro ao adicionar matéria.'));
            }
        }
        $cursos = $this->Materias->Cursos->find('list', ['limit' => 200]);
        $this->set(compact('materia', 'cursos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Materia id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $materia = $this->Materias->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $materia = $this->Materias->patchEntity($materia, $this->request->getData());
            if ($this->Materias->save($materia)) {
                $this->Flash->success(__('The materia has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The materia could not be saved. Please, try again.'));
        }
        $cursos = $this->Materias->Cursos->find('list', ['limit' => 200]);
        $this->set(compact('materia', 'cursos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Materia id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $materia = $this->Materias->get($id);
        if ($this->Materias->delete($materia)) {
            $this->Flash->success(__('The materia has been deleted.'));
        } else {
            $this->Flash->error(__('The materia could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
