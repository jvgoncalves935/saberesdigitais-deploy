<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Cursos Controller
 *
 * @property \App\Model\Table\CursosTable $Cursos
 *
 * @method \App\Model\Entity\Curso[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CursosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index($id = null)
    {
        
        $nomeCursosQuery = $this->Cursos->find()->select(['CursoID', 'Nome']);
        $nomeCursos = array();

        $materiasQuery = null;
        $flagPaginate = false;
        $requisitos = array();
        $nomeCursoHeader = null;
        $tiposCursos = null;

        if($this->request->is('post')){
            $dados = $this->request->getData();
            $cursoID = $dados['CursoID'];
            $cursoNomeQuery = TableRegistry::getTableLocator()->get('cursos')->find()->select(['Nome'])->where(['CursoID'=>$cursoID])->first();
            if(!empty($cursoNomeQuery)){
                $nomeCursoHeader = $cursoNomeQuery['Nome'];
            }
            //debug($nomeCursoHeader);

            $materias = array();
            $materiasQuery = TableRegistry::getTableLocator()->get('materias')->find()->select(['CursoID','MateriaID', 'Nome','EXPMateria'])->where(['CursoID'=>$cursoID]);
            

            foreach($materiasQuery as $materia){
                $requisitosQuery = TableRegistry::getTableLocator()->get('requisitos')->find()->where(['MateriaID'=>$materia['MateriaID']]);
                $idsRequisitos = array();

                foreach($requisitosQuery as $requisito){
                    array_push($idsRequisitos,$requisito['RequisitoID']);
                }

                $arrayAux = array();
                if(!empty($idsRequisitos)){
                    $nomesRequisitosQuery = TableRegistry::getTableLocator()->get('materias')->find()->select(['Nome'])->where(['MateriaID IN'=>$idsRequisitos]);
                    foreach($nomesRequisitosQuery as $nomeRequisito){
                        array_push($arrayAux,$nomeRequisito['Nome']);
                    }    
                }else{
                    $arrayAux = array();
                    $arrayAux[] = "-";
                }

                $requisitos[$materia['MateriaID']] = $arrayAux;
            }
            $flagPaginate = true;

            $tiposCursosTable = TableRegistry::getTableLocator()->get('cursos_tipos');
            $tiposCursosQuery = $tiposCursosTable->find()->where(['CursoID'=>$cursoID]);
            
            $tiposCursos = "";
            $tiposCursosCount = 0;

            foreach($tiposCursosQuery as $tipoCursoAux){
                if($tiposCursosCount > 0){
                    $tiposCursos = $tiposCursos.", ".$this->tipoCurso($tipoCursoAux['Perfil']);
                }else{
                    $tiposCursos = $tiposCursos.$this->tipoCurso($tipoCursoAux['Perfil']);
                }
                $tiposCursosCount += 1;
            }
            
            
        }

        foreach($nomeCursosQuery as $nomeCurso){
            $nomeCursos[$nomeCurso['CursoID']] = $nomeCurso['Nome'];
        }
        $materias = $this->paginate($materiasQuery);
        
        //debug($materias);

        $this->set(compact('materias'));
        $this->set(compact('requisitos'));
        $this->set(compact('nomeCursos'));
        $this->set(compact('tiposCursos'));
        $this->set(compact('nomeCursoHeader'));
        $this->set(compact('flagPaginate'));
        
    }

    /**
     * View method
     *
     * @param string|null $id Curso id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $curso = $this->Cursos->get($id, [
            'contain' => ['Materias']
        ]);

        $this->set('curso', $curso);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $curso = $this->Cursos->newEntity();
        if ($this->request->is('post')) {
            $dados = $this->request->getData();
            $curso = $this->Cursos->patchEntity($curso, $this->request->getData());

            //exit();

            if ($this->Cursos->save($curso)) {
                $idCurso = $curso['CursoID'];
                //debug($idProximoCurso);
                
                $tiposCursosTable = TableRegistry::getTableLocator()->get('cursos_tipos');
                foreach($dados['Perfis'] as $idPerfil){
                    $tipoCurso = $tiposCursosTable->newEntity();
                    $tipoCurso['CursoID'] = $idCurso;
                    $tipoCurso['Perfil'] = $idPerfil;

                    $tiposCursosTable->save($tipoCurso);
                    //debug($idPerfil);
                    //debug($tipoCurso);
                }
                //debug($curso);

                $this->Flash->success(__('Curso adicionado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao adicionar curso.'));
        }
        $materias = $this->Cursos->Materias->find('list', ['limit' => 200]);
        $this->set(compact('curso', 'materias'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Curso id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $curso = $this->Cursos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $curso = $this->Cursos->patchEntity($curso, $this->request->getData());
            if ($this->Cursos->save($curso)) {
                $this->Flash->success(__('Curso editado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao editar curso.'));
        }
        $materias = $this->Cursos->Materias->find('list', ['limit' => 200]);
        $this->set(compact('curso', 'materias'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Curso id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $curso = $this->Cursos->get($id);
        if ($this->Cursos->delete($curso)) {
            $this->Flash->success(__('The curso has been deleted.'));
        } else {
            $this->Flash->error(__('The curso could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function search(){
        
        $this->request->allowMethod(['ajax','get']);
        $materiaID = $this->request->query('materiaID');
        
        return $this->redirect(['action' => 'index',$materiaID]);
        $this->RequestHandler->renderAs($this, 'json');
    }

    private function tipoCurso($idTipoCurso){
        switch($idTipoCurso){
            case 1:
                return "Iniciante";
            case 2:
                return "Empresarial";
            case 3:
                return "Programador";
            case 4:
                return "Gamer";
            case 5:
                return "Especialista em Redes";
            case 6:
                return "Robótica";
            default:
                return "---";
        }
    }
}
