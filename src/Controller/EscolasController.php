<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Escolas Controller
 *
 * @property \App\Model\Table\EscolasTable $Escolas
 *
 * @method \App\Model\Entity\Escola[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EscolasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $escolas = $this->paginate($this->Escolas);

        $this->set(compact('escolas'));
    }

    /**
     * View method
     *
     * @param string|null $id Escola id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $escola = $this->Escolas->get($id, [
            'contain' => []
        ]);

        $this->set('escola', $escola);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $escola = $this->Escolas->newEntity();
        if ($this->request->is('post')) {
            $escola = $this->Escolas->patchEntity($escola, $this->request->getData());
            if ($this->Escolas->save($escola)) {
                $this->Flash->success(__('Escola salva com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao salvar escola.'));
        }
        $this->set(compact('escola'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Escola id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $escola = $this->Escolas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $escola = $this->Escolas->patchEntity($escola, $this->request->getData());
            if ($this->Escolas->save($escola)) {
                $this->Flash->success(__('Escola alterada com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao alterar escola.'));
        }
        $this->set(compact('escola'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Escola id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $escola = $this->Escolas->get($id);
        if ($this->Escolas->delete($escola)) {
            $this->Flash->success(__('The escola has been deleted.'));
        } else {
            $this->Flash->error(__('The escola could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
