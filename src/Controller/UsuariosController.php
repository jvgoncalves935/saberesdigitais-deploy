<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use \Cake\Controller\Component\AuthComponent;
use \Cake\Controller\Component\CookieComponent;
use \Cake\Log\Log;
use \Cake\Http\Session;
use \Cake\Filesystem\Folder;
use \Cake\Filesystem\File;

/**
 * Usuarios Controller
 *
 * @property \App\Model\Table\UsuariosTable $Usuarios
 *
 * @method \App\Model\Entity\Usuario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsuariosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        //$session = new Session();
        //$session->write('teste.come','xd');
        //$session->write('teste.vaiem','xd');
        //$session->delete('teste');
        //debug($session->read());
        //debug($session->consume('teste'));
        $usuarios = $this->paginate($this->Usuarios);
        if($this->request->here(false) == "/webroot/usuarios"){
            //return $this->redirect(['controller'=>'Usuarios','action' => 'index']);
        }

        $this->set(compact('usuarios'));
    }

    /**
     * View method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usuario = $this->Usuarios->get($id, [
            'contain' => []
        ]);

        $this->set('usuario', $usuario);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usuario = $this->Usuarios->newEntity();
        //debug(WWW_ROOT);
        if ($this->request->is('post')) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());
            //debug($this->request->getData());
            
            $alunosTable = TableRegistry::get('alunos');
            $alunosTable = TableRegistry::getTableLocator()->get('alunos');
            
            $aluno = $alunosTable->newEntity();
            $aluno->CpfAluno = $usuario['Cpf'];
            $aluno->CpfTutor = '11111111111';
            $aluno->EscolaID = 1;
            $aluno->Level = 1;
            $aluno->EXPTotal = 0;

            if($this->request->getData()['Foto']){
                $usuario->Foto = $this->request->getData()['Foto']['name'];
            }
            
            //debug($aluno);
            //debug($usuario);
            //exit();

            if ($this->Usuarios->save($usuario) && $alunosTable->save($aluno)) {
                $this->Flash->success(__('Usuário salvo com sucesso.'));
                $this->uploadFoto($usuario->Email, $this->request->getData()['Foto']);

                return $this->redirect(['controller'=>'Usuarios','action' => 'add']);
            }
            $this->Flash->error(__('Erro ao salvar usuário.'));
            return $this->redirect(['controller'=>'Usuarios','action' => 'add']);
        }
        $this->set(compact('usuario'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usuario = $this->Usuarios->get($id, [
            'contain' => []
        ]);

        $usuario->unsetProperty('Senha');

        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());
            
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('Usuário alterado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao alterar usuário.'));
        }
        $this->set(compact('usuario'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usuario = $this->Usuarios->get($id);
        if ($this->Usuarios->delete($usuario)) {
            $this->Flash->success(__('The usuario has been deleted.'));
        } else {
            $this->Flash->error(__('The usuario could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login(){
        //Log::error('Teste xd','teste');

        if($this->request->is('post')){

            $dados = $this->request->getData();
            

            $user = $this->Usuarios->find('all')
                    ->where(['Email' => $dados['username']])
                    ->where(['Senha' => \Cake\Utility\Security::hash($dados['password'],'sha256')])
                    ->first();

            if($user){
                $this->Auth->setUser($user);
                return $this->redirect('/usuarios/pagina_inicial');
            }else{
                $this->Flash->error('Email e senha invalidos.');
            }
        }
    }

    public function logout(){
        return $this->redirect($this->Auth->logout());
    }

    private function uploadFoto(string $userEmail, array $foto){
        $caminho = WWW_ROOT . "img" . DS . "user_data". DS . $userEmail;
        $caminhoUsuario = new Folder($caminho,true);

        $file = new File($foto['tmp_name']);
        $file->copy($caminhoUsuario->path . DS . $foto['name']);
        $file->close();
    }

    public function paginaInicial(){

    }
}
