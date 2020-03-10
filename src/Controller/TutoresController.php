<?php
namespace App\Controller;

use App\Controller\AppController;

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
}
