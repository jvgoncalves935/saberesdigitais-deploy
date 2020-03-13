<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use \Cake\Http\Session;

/**
 * Aulas Controller
 *
 * @property \App\Model\Table\AulasTable $Aulas
 *
 * @method \App\Model\Entity\Aula[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AulasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function index()
    {
        
        $session = new Session();
        $cpf = $session->consume('Auth.User.Cpf');
        $tabelaAulas = TableRegistry::getTableLocator()->get('aulas');
        $aulasAluno = $tabelaAulas->find()->where(['Cpf' => $cpf]);


        $idsMaterias = array();
        $aulasValidadas = array();
        foreach($aulasAluno as $aulaAux){
            array_push($idsMaterias,$aulaAux['MateriaID']);
            $aulasValidadas[$aulaAux['MateriaID']] = $aulaAux['Validada'];
        }

        $nomesCursos = array();
        $nomesCursosAux = array();
        $tabelaCursos = TableRegistry::getTableLocator()->get('cursos');
        $cursos = $tabelaCursos->find()->select(['Nome','CursoID']);
        
        foreach($cursos as $cursoAux){
            $nomesCursosAux[$cursoAux['CursoID']] = $cursoAux['Nome'];
        }

        $aulasCursos = array();
        if(!empty($idsMaterias)){
            $tabelaMaterias = TableRegistry::getTableLocator()->get('materias');
            $materiasCumpridas = $tabelaMaterias->find()->where(['MateriaID IN' => $idsMaterias]);
            
            $idsCursos = array();
            foreach($materiasCumpridas as $materiaAux){
                array_push($idsCursos,$materiaAux['CursoID']);
            }

            $idsCursosUnicos = array_unique($idsCursos);

            foreach($idsCursosUnicos as $idCursoAux){
                $arrayAux = array();
                foreach($materiasCumpridas as $materiaAux){
                    if($materiaAux['CursoID'] == $idCursoAux){
                        array_push($arrayAux,$materiaAux);
                    }
                }
                $aulasCursos[$idCursoAux] = $arrayAux;
                $nomesCursos[$idCursoAux] = $nomesCursosAux[$idCursoAux];
            }
        }

        //debug($aulasCursos);
        //debug($aulasValidadas);

        //$this->verificarConquistas($cpf);

        $aulas = $this->paginate($this->Aulas);
        
        $this->set(compact('aulas'));
        $this->set(compact('aulasCursos'));
        $this->set(compact('aulasValidadas'));
        $this->set(compact('nomesCursos'));
    }

    /**
     * View method
     *
     * @param string|null $id Aula id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $aula = $this->Aulas->get($id, [
            'contain' => []
        ]);

        $this->set('aula', $aula);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $aula = $this->Aulas->newEntity();

        if ($this->request->is('post')) {
            $aula = $this->Aulas->patchEntity($aula, $this->request->getData());
            $_POST['nenhumaSolicitacao'] = false;
            $session = new Session();
            $cpf = $session->consume('Auth.User.Cpf');

            $aula['Cpf'] = $cpf;

            $queryAulaRepetida = $this->Aulas->find()->select(['Cpf', 'MateriaID'])->where(['MateriaID' => $aula['MateriaID'],'Cpf' => $aula['Cpf']])->isEmpty();
            if(!$queryAulaRepetida){
                $this->Flash->error(__('Erro: esta aula já foi registrada.'));
                return $this->redirect(['action' => 'add']);
            }
            //debug($aula);
            //exit();
            
            if(!$this->verificarAutorizacaoAula($aula['MateriaID'])){
                $this->Flash->error(__('Erro: você não completou os requisitos desta aula. Complete os requisitos ou faça uma solicitação de quebra de requisitos.'));
                //return $this->redirect(['action' => 'add']);
                $this->set(compact('aula'));
                //$this->set(compact('nenhumaSolicitacaoPtr'));
                return;
            }

            if ($this->Aulas->save($aula)) {
                $this->Flash->success(__('Aula registrada com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao registrar aula.'));
        }
        $this->set(compact('aula'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Aula id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $aula = $this->Aulas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $aula = $this->Aulas->patchEntity($aula, $this->request->getData());
            if ($this->Aulas->save($aula)) {
                $this->Flash->success(__('The aula has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The aula could not be saved. Please, try again.'));
        }
        $this->set(compact('aula'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Aula id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $aula = $this->Aulas->get($id);
        if ($this->Aulas->delete($aula)) {
            $this->Flash->success(__('The aula has been deleted.'));
        } else {
            $this->Flash->error(__('The aula could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function search(){
        
        $this->request->allowMethod(['ajax','get']);
        $cursoID = $this->request->getQuery('cursoID');
        
        $_query = TableRegistry::get('materias')->find();
        $_query = TableRegistry::getTableLocator()->get('materias')->find()
                                                                ->where(['CursoID'=>$cursoID]);

        $materias = array();
        foreach($_query as $materia){
            $mat = array();
            $mat['id'] = $materia['MateriaID'];
            $mat['nome'] = $materia['Nome'];
            $materias[] = $mat;
            //$materias[$materia['MateriaID']] = $materia['Nome'];
        }

        $materiasJSON = json_encode($materias);
        //$materiasArrayString = "";
        //foreach($materias as $letra){
        //    $materiasArrayString = $materiasArrayString.$letra;
        //}
        //debug($materiasJSON);
        
        //$response = $this->response;
        //$response = $response->withStringBody($materiasJSON);
        //debug($response);

        //header('Content-type: application/json');
        //echo $materiasJSON;
        $this->set([
            'my_response' => $materiasJSON,
            '_serialize' => 'my_response',
        ]);
        $this->RequestHandler->renderAs($this, 'json');
        //return $response;
    }

    public function verificarAutorizacaoAula($materiaID){
        if(empty($materiaID)){
            return false;
        }

        $session = new Session();
        $cpf = $session->consume('Auth.User.Cpf');

        $requisitosQuery = TableRegistry::getTableLocator()->get('requisitos')->find()->select(['RequisitoID'])->where(['MateriaID' => $materiaID]);
        $requisitos = array();
        foreach($requisitosQuery as $requisito){
            $requisitos[] = $requisito['RequisitoID'];
        }

        $requisitosAtendidos = true;
        foreach($requisitos as $requisito){
            $queryAula = $this->Aulas->find()->where(['MateriaID' => $requisito,'Cpf' => $cpf])->first();

            if(empty($queryAula)){
                $requisitosAtendidos = false;
                break;
            }
        }
        if(!$requisitosAtendidos){
            $solicitacaoExistente = false;
            $querySolicitacao = TableRegistry::getTableLocator()->get('solicitacoes')->find()->where(['MateriaID' => $materiaID,'CPFAluno' => $cpf])->first();
            if(!empty($querySolicitacao)){
                if($querySolicitacao['Autorizada']){
                    return true;
                }else{
                    return false;
                }
                
            }else{
                $_POST['nenhumaSolicitacao'] = true;
                $_POST['solicitacaoMateriaID'] = $materiaID;
                $_POST['cpfAluno'] = $cpf;
                //debug($nenhumaSolicitacao);
                return false;
            }
        }else{
            return true;
        }

    }

    public function solicitarautorizacao(){
        $this->request->allowMethod(['ajax','get']);
        $materiaID = $this->request->query('materiaID');
        $cpfAluno = $this->request->query('cpfAluno');
        $cpfTutorQuery = TableRegistry::getTableLocator()->get('alunos')->find()->select(['CpfTutor'])->where(['CPFAluno' => $cpfAluno])->first();
        $cpfTutor = $cpfTutorQuery['CpfTutor'];

        $tabelaSolicitacoes = TableRegistry::getTableLocator()->get('solicitacoes');
        $solicitacao = $tabelaSolicitacoes->newEntity();
        $solicitacao->MateriaID = $materiaID;
        $solicitacao->CPFAluno = $cpfAluno;
        $solicitacao->CPFTutor = $cpfTutor;
        
        $id = -1;
        if($tabelaSolicitacoes->save($solicitacao)){
            debug("sucesso");
        }

        $materiasJSON = json_encode($solicitacao);
        
        $this->set([
            'my_response' => $materiasJSON,
            '_serialize' => 'my_response',
        ]);
        $this->RequestHandler->renderAs($this, 'json');
    }

    public function validar(){

        if(!$this->tutorOuAdmin()){
            //debug("nao eh tutor nem admin");
            return $this->redirect(['action' => 'index']);
        }else{
            //debug("tutor ou admin");
        }

        if($this->request->is('post')) {
            $this->parserValidacaoAulas($this->request->getData());
        }
        
    }

    public function solicitacoes(){
        if(!$this->tutorOuAdmin()){
            //debug("nao eh tutor nem admin");
            return $this->redirect(['action' => 'index']);
        }else{
            //debug("tutor ou admin");
        }

        if($this->request->is('post')) {
            $this->parserSolicitacaoAulas($this->request->getData());
        }
    }

    private function parserSolicitacaoAulas($dados){
        $aulasValidadas = array();
        $aulasRecusadas = array();
        $aulasEscolhidasChaves = array_keys($dados);
        $i = 0;
        foreach($dados as $dado){
            if($dado != '0'){
                if(strpos($aulasEscolhidasChaves[$i], 'validarAula') !== false){
                    array_push($aulasValidadas,intval(str_replace('validarAula','',$aulasEscolhidasChaves[$i]))); 
                }
                if(strpos($aulasEscolhidasChaves[$i], 'recusarAula') !== false){
                    array_push($aulasRecusadas,intval(str_replace('recusarAula','',$aulasEscolhidasChaves[$i]))); 
                }
                
            }
            $i++;
        }

        if(!empty($aulasValidadas)){
            $tabelaSolicitacoes = TableRegistry::getTableLocator()->get('solicitacoes');
            $solicitacoes = $tabelaSolicitacoes->find('all')
                    ->where(['ID IN' => $aulasValidadas]);

            foreach($solicitacoes as $solicitacaoAux){    
                //$query_aluno = TableRegistry::get('alunos')->find();

                $solicitacaoAux['Autorizada'] = true;
                //debug("autorizou ".$solicitacaoAux['ID']);
                $tabelaSolicitacoes->save($solicitacaoAux);
            }
        }

        if(!empty($aulasRecusadas)){
            $tabelaSolicitacoes = TableRegistry::getTableLocator()->get('solicitacoes');
            $querySolicitacoesRecusadas = $tabelaSolicitacoes->find('all')
                    ->where(['ID IN' => $aulasRecusadas]);

            foreach($querySolicitacoesRecusadas as $solicitacaoAux){
                //debug($aulaAux);
                $resultado = $tabelaSolicitacoes->delete($solicitacaoAux);
                //debug("recusou ".$solicitacaoAux['ID']);
            }
        }
        
        
        $this->Flash->success(__('Aulas validadas com sucesso.'));
    }

    private function tutorOuAdmin(){
        $session = new Session();

        $cpf = $session->consume('Auth.User.Cpf');

        $query = TableRegistry::get('administradores')->find();
        $query = TableRegistry::getTableLocator()->get('administradores')->find()
                                                                ->where(['Cpf' => $cpf])
                                                                ->first();
        $isAdmin = false;
        if($query != null){
            $isAdmin = true;
        }

        $query = TableRegistry::get('tutores')->find();
        $query = TableRegistry::getTableLocator()->get('tutores')->find()
                                                                ->where(['Cpf' => $cpf])
                                                                ->first();
        $isTutor = false;
        if($query != null){
            $isTutor = true;
        }

        if($isTutor || $isAdmin){
            return true;
        }else{
            return false;
        }
    }

    private function parserValidacaoAulas($dados){
        $aulasValidadas = array();
        $aulasRecusadas = array();
        $aulasEscolhidasChaves = array_keys($dados);
        $i = 0;
        foreach($dados as $dado){
            if($dado != '0'){
                if(strpos($aulasEscolhidasChaves[$i], 'validarAula') !== false){
                    array_push($aulasValidadas,intval(str_replace('validarAula','',$aulasEscolhidasChaves[$i]))); 
                }
                if(strpos($aulasEscolhidasChaves[$i], 'recusarAula') !== false){
                    array_push($aulasRecusadas,intval(str_replace('recusarAula','',$aulasEscolhidasChaves[$i]))); 
                }
                
            }
            $i++;
        }

        //debug($aulasValidadas);
        //debug($aulasRecusadas);
        //debug(empty($aulasValidadas));
        //debug(empty($aulasRecusadas));    

        $levels = $this->tabelaLevels();
        
        //Aulas à serem validadas
        if(!empty($aulasValidadas)){
            $aulas = $this->Aulas->find('all')
                    ->where(['ID IN' => $aulasValidadas]);

            foreach($aulas as $aulaAux){
                $tabelaAulas = TableRegistry::getTableLocator()->get('aulas');
                $tabelaAlunos = TableRegistry::getTableLocator()->get('alunos');
                //$query_aluno = TableRegistry::get('alunos')->find();
                $alunoAux = $tabelaAlunos->find()->where(['CpfAluno' => $aulaAux['Cpf']])->first();

                $query_materia = TableRegistry::get('materias')->find();
                $query_materia = TableRegistry::getTableLocator()->get('materias')->find()->where(['MateriaID' => $aulaAux['MateriaID']])->first();
                
                $novoExp = $alunoAux['EXPTotal'] + $query_materia['EXPMateria'];
                $novoLevel = $this->alterarLevel($levels,$novoExp);

                $aulaAux['Validada'] = true;
                $alunoAux['Level'] = $novoLevel;
                $alunoAux['EXPTotal'] = $novoExp;

                $tabelaAulas->save($aulaAux);
                $tabelaAlunos->save($alunoAux);

                $tabelaMaterias = TableRegistry::getTableLocator()->get('materias');
                $query_materia['ContagemAulas'] += 1;
                $tabelaMaterias->save($query_materia);

                $this->verificarConquistas($aulaAux['Cpf']);

                //debug($novoExp." ".$alunoAux['EXPTotal']." ".$query_materia['EXPMateria']);
                //debug($aulaAux);
                //debug($alunoAux);
            }
        }

        //Aulas à serem recusadas
        if(!empty($aulasRecusadas)){
            $queryAulasRecusadas = $this->Aulas->find('all')
                    ->where(['ID IN' => $aulasRecusadas]);

            foreach($queryAulasRecusadas as $aulaAux){
                //debug($aulaAux);
                $resultado = $this->Aulas->delete($aulaAux);
            }
        }
        
        
        $this->Flash->success(__('Aulas validadas com sucesso.'));
        //debug($dados);
    }

    private function alterarLevel($levels,$expAluno){
        $i = 1;
        while($i <= 30){
            if($expAluno <= $levels[$i]){
                return $i;
            }
            $i += 1;
        }
        return 30;
    }

    private function tabelaLevels(){
        $levels = array();
        $levels[1] = 1200;
        $levels[2] = 1920;
        $levels[3] = 3072;
        $levels[4] = 4915;
        $levels[5] = 7864;
        $levels[6] = 10223;
        $levels[7] = 13289;
        $levels[8] = 17275;
        $levels[9] = 22457;
        $levels[10] = 29194;
        $levels[11] = 35032;
        $levels[12] = 42038;
        $levels[13] = 50445;
        $levels[14] = 60534;
        $levels[15] = 72640;
        $levels[16] = 83536;
        $levels[17] = 96066;
        $levels[18] = 110475;
        $levels[19] = 127046;
        $levels[20] = 146102;
        $levels[21] = 160712;
        $levels[22] = 176783;
        $levels[23] = 194461;
        $levels[24] = 213907;
        $levels[25] = 235297;
        $levels[26] = 254120;
        $levels[27] = 274449;
        $levels[28] = 296404;
        $levels[29] = 320116;
        $levels[30] = 345725;

        return $levels;
    }

    private function verificarConquistas($cpf){
        $conquistasDesbloqueadas = array();
        
        $tabelaConquistas = TableRegistry::getTableLocator()->get('conquistas');
        $conquistas = $tabelaConquistas->find();

        foreach($conquistas as $conquista){
            $conquistasDesbloqueadas[$conquista['ConquistaID']] = false;
        }

        $tabelaConquistasAlunos = TableRegistry::getTableLocator()->get('conquistas_alunos');
        $conquistasAluno = $tabelaConquistasAlunos->find()->where(['Cpf' => $cpf]);

        //Marcar conquistas desbloqueadas
        foreach($conquistasAluno as $conquistaAluno){
            $conquistasDesbloqueadas[$conquistaAluno['ConquistaID']] = true;
        }

        $tabelaAulas = TableRegistry::getTableLocator()->get('aulas');
        $aulasQuery = $tabelaAulas->find()->where(['Cpf' => $cpf]);

        $tabelaAlunos = TableRegistry::getTableLocator()->get('alunos');
        $alunoQuery = $tabelaAlunos->find()->where(['CpfAluno' => $cpf])->first();

        
        $numMateriasCumpridas = $this->numMateriasCumpridas($aulasQuery,$alunoQuery);


        if(!$conquistasDesbloqueadas[1] && $this->conquista01($aulasQuery,$alunoQuery)){
            $this->registrarConquista(1,$cpf);
        }
        if(!$conquistasDesbloqueadas[2] && $this->conquista02($aulasQuery,$alunoQuery)){
            $this->registrarConquista(2,$cpf);
        }
        if(!$conquistasDesbloqueadas[3] && $this->conquista03($aulasQuery,$alunoQuery)){
            $this->registrarConquista(3,$cpf);
        }
        if(!$conquistasDesbloqueadas[4] && $this->conquista04($aulasQuery,$alunoQuery)){
            $this->registrarConquista(4,$cpf);
        }
        if(!$conquistasDesbloqueadas[5] && $this->conquista05($aulasQuery,$alunoQuery)){
            $this->registrarConquista(5,$cpf);
        }
        if(!$conquistasDesbloqueadas[6] && $this->conquista06($aulasQuery,$alunoQuery)){
            $this->registrarConquista(6,$cpf);
        }
        if(!$conquistasDesbloqueadas[7] && $this->conquista07($aulasQuery,$alunoQuery)){
            $this->registrarConquista(7,$cpf);
        }
        if(!$conquistasDesbloqueadas[8] && $this->conquista08($numMateriasCumpridas)){
            $this->registrarConquista(8,$cpf);
        }
        if(!$conquistasDesbloqueadas[9] && $this->conquista09($numMateriasCumpridas)){
            $this->registrarConquista(9,$cpf);
        }
        if(!$conquistasDesbloqueadas[10] && $this->conquista10($numMateriasCumpridas)){
            $this->registrarConquista(10,$cpf);
        }


    }

    private function registrarConquista(int $idConquista, string $cpf){
        $tabelaConquistasAlunos = TableRegistry::getTableLocator()->get('conquistas_alunos');
        $conquistaAluno = $tabelaConquistasAlunos->newEntity();
        $conquistaAluno['ConquistaID'] = $idConquista;
        $conquistaAluno['Cpf'] = $cpf;
        

        $tabelaAlunos = TableRegistry::getTableLocator()->get('alunos');
        $aluno = $tabelaAlunos->find()->where(['CpfAluno' => $cpf])->first();

        $tabelaConquista = TableRegistry::getTableLocator()->get('conquistas');
        $conquistaAux = $tabelaConquista->find()->where(['ConquistaID' => $idConquista])->first();
        
        $levels = $this->tabelaLevels();

        $novoExp = $aluno['EXPTotal'] + $conquistaAux['EXPConquista'];
        $novoLevel = $this->alterarLevel($levels,$novoExp);
        $aluno['EXPTotal'] = $novoExp;
        $aluno['Level'] = $novoLevel;

        //debug("CONQUISTA REGISTRADA ".$idConquista);
        $tabelaConquistasAlunos->save($conquistaAluno);
        $tabelaAlunos->save($aluno);
    }

    private function conquista01($aulas,$aluno){
        //debug("conq 01");
        //debug($aulas->count() >= 3);
        if($aulas->count() >= 3){
            return true;
        }
        return false;
    }

    private function conquista02($aulas,$aluno){
        //debug("conq 02");
        //debug($aulas->count() >= 10);
        if($aulas->count() >= 10){
            return true;
        }
        return false;
    }

    private function conquista03($aulas,$aluno){
        //debug("conq 03");
        //debug($aulas->count() >= 20);
        if($aulas->count() >= 20){
            return true;
        }
        return false;
    }

    private function conquista04($aulas,$aluno){
        //debug("conq 04");
        //debug($aluno['Level'] >= 10);
        if($aluno['Level'] >= 10){
            return true;
        }
        return false;
    }

    private function conquista05($aulas,$aluno){
        //debug("conq 05");
        //debug($aluno['Level'] >= 20);
        if($aluno['Level'] >= 20){
            return true;
        }
        return false;
    }

    private function conquista06($aulas,$aluno){
        //debug("conq 06");
        //debug($aluno['Level'] >= 30);
        if($aluno['Level'] >= 30){
            return true;
        }
        return false;
    }

    private function conquista07($aulas,$aluno){
        //debug("conq 07");
        //debug("curso app inventor");
        $aulasCumpridas = array();
        for($i = 6; $i <= 14; $i++){
            $aulasCumpridas[$i] = false;
        }
        foreach($aulas as $aula){
            if($aula['MateriaID'] >= 6 && $aula['MateriaID'] <= 14){
                $aulasCumpridas[$aula['MateriaID']] = true;
            }
        }

        foreach($aulasCumpridas as $aulaCumprida){
            if($aulaCumprida == false){
                return false;
            }
        }
        
        return true;
    }

    private function conquista08($numMat){
        //debug("conq 08");
        //debug($numMat >= 1);
        if($numMat >= 1){
            return true;
        }
        return false;
    }

    private function conquista09($numMat){
        //debug("conq 09");
        //debug($numMat >= 2);
        if($numMat >= 2){
            return true;
        }
        return false;
    }

    private function conquista10($numMat){
        //debug("conq 10");
        //debug($numMat >= 3);
        if($numMat >= 3){
            return true;
        }
        return false;
    }

    private function numMateriasCumpridas($aulas,$aluno){
        $tabelaCursos = TableRegistry::getTableLocator()->get('cursos');
        $cursosAux = $tabelaCursos->find();

        $tabelaMaterias = TableRegistry::getTableLocator()->get('materias');
        $materiasAux = $tabelaMaterias->find();

        $cursosMaterias = array();
        $cursosMateriasX = array();

        foreach($cursosAux as $curso){
            $cursoCount = 0;
            foreach($materiasAux as $materia){
                if($curso['CursoID'] == $materia['CursoID']){
                    $cursoCount += 1;
                }
            }
            $cursosMaterias[$curso['CursoID']] = $cursoCount;
            $cursosMateriasX[$curso['CursoID']] = 0;
        }

        $idsMateriasCursos = array();
        foreach($materiasAux as $materiaX){
            $idsMateriasCursos[$materiaX['MateriaID']] = $materiaX['CursoID'];
        }
        
        foreach($aulas as $aulaX){
            $cursosMateriasX[$idsMateriasCursos[$aulaX['MateriaID']]] += 1;
        }

        $contagemCursos = 0;
        foreach($cursosAux as $cursoX){
            //debug($cursosMateriasX[$cursoX['CursoID']]." ".$cursosMaterias[$cursoX['CursoID']]);
            if($cursosMateriasX[$cursoX['CursoID']] == $cursosMaterias[$cursoX['CursoID']]){
                $contagemCursos += 1;
            }
        }

        return $contagemCursos;
    }
}
