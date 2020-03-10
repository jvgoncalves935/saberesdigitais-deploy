<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use \Cake\Http\Session;

/**
 * Conquistas Controller
 *
 *
 * @method \App\Model\Entity\Conquista[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ConquistasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $session = new Session();
        $cpf = $session->consume('Auth.User.Cpf');
        $query = TableRegistry::get('conquistas_alunos')->find();
        $query = TableRegistry::getTableLocator()->get('conquistas_alunos')->find()
                                                                             ->select(['ConquistaID'])
                                                                             ->where(['Cpf' => $cpf]);
        $conquistasID = array();
        foreach ($query as $result) {
            array_push($conquistasID,$result['ConquistaID']);
        }
        $query = null;
        if(!empty($conquistasID)){
            $query = $this->Conquistas->find()->where(['ConquistaID IN' => $conquistasID]);
        }

        $aluno = TableRegistry::getTableLocator()->get('usuarios')->find()->select(['Nome'])->where(['Cpf' => $cpf])->first();
        $nomeAluno = $aluno['Nome'];
        

        $conquistas = $query;

        $this->set(compact('conquistas'));
        $this->set(compact('nomeAluno'));
    }

    /**
     * View method
     *
     * @param string|null $id Conquista id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $conquista = $this->Conquistas->get($id, [
            'contain' => []
        ]);

        $this->set('conquista', $conquista);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $conquista = $this->Conquistas->newEntity();
        if ($this->request->is('post')) {
            $conquista = $this->Conquistas->patchEntity($conquista, $this->request->getData());
            if ($this->Conquistas->save($conquista)) {
                $this->Flash->success(__('The conquista has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The conquista could not be saved. Please, try again.'));
        }
        $this->set(compact('conquista'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Conquista id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $conquista = $this->Conquistas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $conquista = $this->Conquistas->patchEntity($conquista, $this->request->getData());
            if ($this->Conquistas->save($conquista)) {
                $this->Flash->success(__('The conquista has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The conquista could not be saved. Please, try again.'));
        }
        $this->set(compact('conquista'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Conquista id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $conquista = $this->Conquistas->get($id);
        if ($this->Conquistas->delete($conquista)) {
            $this->Flash->success(__('The conquista has been deleted.'));
        } else {
            $this->Flash->error(__('The conquista could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function listaConquistas(){
        $session = new Session();
        $cpf = $session->consume('Auth.User.Cpf');
        $tabelaConquistas = TableRegistry::getTableLocator()->get('conquistas');
        $conquistas = $tabelaConquistas->find();
        
        $this->set(compact('conquistas'));
    }
    /*
    
    */
}
