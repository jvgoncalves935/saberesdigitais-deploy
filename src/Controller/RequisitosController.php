<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use \Cake\Http\Session;
/**
 * Requisitos Controller
 *
 * @property \App\Model\Table\RequisitosTable $Requisitos
 *
 * @method \App\Model\Entity\Requisito[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RequisitosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $requisitos = $this->paginate($this->Requisitos);

        $this->set(compact('requisitos'));
    }

    /**
     * View method
     *
     * @param string|null $id Requisito id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $requisito = $this->Requisitos->get($id, [
            'contain' => []
        ]);

        $this->set('requisito', $requisito);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $requisito = $this->Requisitos->newEntity();
        if ($this->request->is('post')) {
            $dados = $this->request->getData();
            if($dados['CursoID'] == '-1' || $dados['MateriaID'] == '-1' || $dados['CursoRequisitoID'] == '-1' || $dados['MateriaRequisitoID'] == '-1'){
                return $this->Flash->error(__('Erro: um dos campos não foi preenchido.'));
            }

            if($dados['CursoID'] == $dados['CursoRequisitoID'] && $dados['MateriaID'] == $dados['MateriaRequisitoID']){
                return $this->Flash->error(__('Erro: uma matéria não pode ter como requisito ela mesma.'));
            }

            $requisitoRepetido = $this->Requisitos->find('all')->where(['MateriaID' => $dados['MateriaID'],'RequisitoID'=> $dados['MateriaRequisitoID']])->first();
            if(!empty($requisitoRepetido)){
                return $this->Flash->error(__('Erro: requisito repetido para esta matéria.'));
            }

            $requisito['MateriaID'] = $dados['MateriaID'];
            $requisito['RequisitoID'] = $dados['MateriaRequisitoID'];
            //debug($requisito);
            
            if($this->Requisitos->save($requisito)){
                $this->Flash->success(__('Requisito salvo com sucesso.'));
                //return $this->redirect(['action' => 'add']);
            }else{
                $this->Flash->error(__('Erro ao salvar requisito.'));
            }
        }
        $this->set(compact('requisito'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Requisito id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $requisito = $this->Requisitos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $requisito = $this->Requisitos->patchEntity($requisito, $this->request->getData());
            if ($this->Requisitos->save($requisito)) {
                $this->Flash->success(__('The requisito has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The requisito could not be saved. Please, try again.'));
        }
        $this->set(compact('requisito'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Requisito id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $requisito = $this->Requisitos->get($id);
        if ($this->Requisitos->delete($requisito)) {
            $this->Flash->success(__('The requisito has been deleted.'));
        } else {
            $this->Flash->error(__('The requisito could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function search(){
        
        $this->request->allowMethod(['ajax','get']);
        $materiaID = $this->request->query('materiaID');
        
        $_queryRequisitos = TableRegistry::getTableLocator()->get('requisitos')->find()->select(['MateriaID', 'RequisitoID'])
                                                                ->where(['MateriaID'=>$materiaID]);

        $requisitosIDs = array();
        foreach($_queryRequisitos as $requisitoAux){
            array_push($requisitosIDs,$requisitoAux['RequisitoID']);
        }

        $_queryMaterias = TableRegistry::getTableLocator()->get('materias')->find()->select(['MateriaID', 'Nome'])
                                                                ->where(['MateriaID IN'=>$requisitosIDs]);

        

        $materias = array();
        foreach($_queryMaterias as $materia){
            $mat = array();
            $mat['id'] = $materia['MateriaID'];
            $mat['nome'] = $materia['Nome'];
            $materias[] = $mat;
        }

        $materiasJSON = json_encode($materias);
        
        $this->set([
            'my_response' => $materiasJSON,
            '_serialize' => 'my_response',
        ]);
        $this->RequestHandler->renderAs($this, 'json');
    }

    public function solicitar(){
        $requisitos = $this->paginate($this->Requisitos);
        $materias = array();
        $cursos = array();

        /*
        $tabelaMaterias = TableRegistry::getTableLocator()->get('materias');
        $materiasQuery = $tabelaMaterias->find()->select(['Nome', 'MateriaID']);
        */

        $tabelaCursos = TableRegistry::getTableLocator()->get('cursos');
        $cursosQuery = $tabelaCursos->find()->select(['Nome', 'CursoID']);

        foreach($cursosQuery as $curso){
            $cursos[$curso['CursoID']] = $curso['Nome'];
        }

        $this->set(compact('requisitos'));
        $this->set(compact('materias'));
        $this->set(compact('cursos'));
        
        if($this->request->is('post') || $this->request->is('put')){
            $dados = $this->request->getData();
            //debug($dados);

            $session = new Session();
            $cpf = $session->consume('Auth.User.Cpf');

            $solicitacaoTable = TableRegistry::getTableLocator()->get('solicitacoes');
            $queryVerificarSolicitacaoExistente = $solicitacaoTable->find()->where(['CPFAluno' => $cpf,'MateriaID'=> $dados['Materia']])->first();

            if(!empty($queryVerificarSolicitacaoExistente)){
                return $this->Flash->error(__('Erro: Solicitação de quebra de requisito já foi criada para esta matéria.'));
            }

            $tabelaAlunos = TableRegistry::getTableLocator()->get('alunos');
            $aluno = $tabelaAlunos->find()->where(['CpfAluno' => $cpf])->first();

            $solicitacao = $solicitacaoTable->newEntity();
            $solicitacao['Autorizada'] = false;
            $solicitacao['MateriaID'] = $dados['Materia'];
            $solicitacao['CPFAluno'] = $cpf;
            $solicitacao['CPFTutor'] = $aluno['CpfTutor'];
            //debug($solicitacao);

            
            if ($solicitacaoTable->save($solicitacao)) {
                $this->Flash->success(__('Solicitacao registrada com sucesso.'));
            }
            
        }

        
    }
}
