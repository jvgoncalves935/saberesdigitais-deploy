<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ConquistasAlunos Controller
 *
 * @property \App\Model\Table\ConquistasAlunosTable $ConquistasAlunos
 *
 * @method \App\Model\Entity\ConquistasAluno[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ConquistasAlunosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $conquistasAlunos = $this->paginate($this->ConquistasAlunos);

        $this->set(compact('conquistasAlunos'));
    }

    /**
     * View method
     *
     * @param string|null $id Conquistas Aluno id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $conquistasAluno = $this->ConquistasAlunos->get($id, [
            'contain' => []
        ]);

        $this->set('conquistasAluno', $conquistasAluno);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $conquistasAluno = $this->ConquistasAlunos->newEntity();
        if ($this->request->is('post')) {
            $conquistasAluno = $this->ConquistasAlunos->patchEntity($conquistasAluno, $this->request->getData());
            if ($this->ConquistasAlunos->save($conquistasAluno)) {
                $this->Flash->success(__('The conquistas aluno has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The conquistas aluno could not be saved. Please, try again.'));
        }
        $this->set(compact('conquistasAluno'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Conquistas Aluno id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $conquistasAluno = $this->ConquistasAlunos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $conquistasAluno = $this->ConquistasAlunos->patchEntity($conquistasAluno, $this->request->getData());
            if ($this->ConquistasAlunos->save($conquistasAluno)) {
                $this->Flash->success(__('The conquistas aluno has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The conquistas aluno could not be saved. Please, try again.'));
        }
        $this->set(compact('conquistasAluno'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Conquistas Aluno id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $conquistasAluno = $this->ConquistasAlunos->get($id);
        if ($this->ConquistasAlunos->delete($conquistasAluno)) {
            $this->Flash->success(__('The conquistas aluno has been deleted.'));
        } else {
            $this->Flash->error(__('The conquistas aluno could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
