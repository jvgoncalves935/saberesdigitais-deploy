<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use \Cake\Http\Session;
use \Cake\Filesystem\Folder;
use \Cake\Filesystem\File;

/**
 * Alunos Controller
 *
 * @property \App\Model\Table\AlunosTable $Alunos
 *
 * @method \App\Model\Entity\Aluno[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AlunosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $alunos = $this->paginate($this->Alunos);

        $this->set(compact('alunos'));
    }

    /**
     * View method
     *
     * @param string|null $id Aluno id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $aluno = $this->Alunos->get($id, [
            'contain' => ['Conquistas']
        ]);

        $this->set('aluno', $aluno);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $aluno = $this->Alunos->newEntity();
        if ($this->request->is('post')) {
            $aluno = $this->Alunos->patchEntity($aluno, $this->request->getData());
            $aluno['Level'] = 1;
            $aluno['EXPTotal'] = 0;
            
            if ($this->Alunos->save($aluno)) {
                $this->Flash->success(__('Aluno salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao salvar aluno.'));
        }

        $this->set(compact('aluno'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Aluno id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $aluno = $this->Alunos->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $aluno = $this->Alunos->patchEntity($aluno, $this->request->getData());

            $alunosTable = TableRegistry::get('alunos');
            $alunosTable = TableRegistry::getTableLocator()->get('alunos');

            //$aluno = $alunosTable->find()->where(['CpfAluno' => $usuario->Cpf])->first();
            
            if($aluno == null){
                $aluno = $alunosTable->newEntity();
                $aluno->CpfAluno = $usuario['Cpf'];
                $aluno->CpfTutor = '11111111111';
                $aluno->EscolaID = 1;
                $aluno->Level = 1;
                $aluno->EXPTotal = 0;
            }
            debug($aluno);
            exit();

            if ($this->Alunos->save($aluno)) {
                $this->Flash->success(__('Aluno editado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao editar aluno.'));
        }
        $this->set(compact('aluno'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Aluno id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $aluno = $this->Alunos->get($id);
        if ($this->Alunos->delete($aluno)) {
            $this->Flash->success(__('The aluno has been deleted.'));
        } else {
            $this->Flash->error(__('The aluno could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function perfil($id = null)
    {
        
        
        $session = new Session();
        $cpf = $session->consume('Auth.User.Cpf');
        $tabelaAlunos = TableRegistry::getTableLocator()->get('alunos');
        $alunoOriginal = $tabelaAlunos->find()->where(['CpfAluno' => $cpf])->first();

        if($id == null){
            return $this->redirect(['action' => 'perfil',$alunoOriginal['ID']]);
        }

        $tabelaUsuarios = TableRegistry::getTableLocator()->get('usuarios');
        $usuario = $tabelaUsuarios->find()->where(['ID' => $id])->first();

        $aluno = $tabelaAlunos->find()->where(['CpfAluno' => $usuario['Cpf']])->first();

        
        $tabelaEscolas = TableRegistry::getTableLocator()->get('escolas');
        $escola = $tabelaEscolas->find()->where(['EscolaID' => $aluno->EscolaID])->first();
        $tutor = $tabelaUsuarios->find()->where(['Cpf' => $aluno->CpfTutor])->first();
        $xpProximoLevelAux = $this->levelMaximo($aluno['Level']);
        $xpProximoLevel = $xpProximoLevelAux - $this->levelMaximo($aluno['Level'] - 1);
        $xpProgressoAtual = $aluno['EXPTotal'] - $this->levelMaximo($aluno['Level'] - 1);
        $xpProximoLevelNormal = $xpProximoLevelAux;
        $porcentagemLevel = intval(($xpProgressoAtual / $xpProximoLevel) * 100);

        if(!empty($usuario->Foto)){
            $diretorioImagem = "webroot/img/user_data/". $usuario->Email . "/";
            $arquivoImagem = $usuario->Foto;
        }else{
            $diretorioImagem = "webroot/img/";
            $arquivoImagem = "default_user.jpg";
        }

        if($diretorioImagem == "webroot/img/"){
            $dirTemp = WWW_ROOT."img/";
        }else{
            $dirTemp = WWW_ROOT."img/user_data/". $usuario->Email . "/";
        }

        $selfUser = false;
        if($alunoOriginal['CpfAluno'] == $aluno['CpfAluno']){
            $selfUser = true;
        }


        $tabelaConquistasAlunos = TableRegistry::getTableLocator()->get('conquistas_alunos');
        $conquistasAluno = $tabelaConquistasAlunos->find()->where(['Cpf' => $usuario['Cpf']]);
        $listaConquistas = array();
        foreach($conquistasAluno as $conquistaAluno){
            array_push($listaConquistas,$conquistaAluno['ConquistaID']);
        }

        $diretorioImagemConquistas = "webroot/img/conquistas_img/minisize/";

        $nomesConquistas = array();
        $tabelaConquistas = TableRegistry::getTableLocator()->get('conquistas');
        if(!empty($listaConquistas)){
            $conquistas = $tabelaConquistas->find()->where(['ConquistaID IN' => $listaConquistas]);
            foreach($conquistas as $conquistaAux){
                $nomesConquistas[$conquistaAux['ConquistaID']] = $conquistaAux['Nome'];
            }
        }
        
        
        list($width, $height) = getimagesize($dirTemp.$arquivoImagem);
        //debug($width);
        //debug($height);

        $this->set(compact('aluno'));
        $this->set(compact('usuario'));
        $this->set(compact('escola'));
        $this->set(compact('tutor'));
        $this->set(compact('selfUser'));
        $this->set(compact('xpProgressoAtual'));
        $this->set(compact('xpProximoLevel'));
        $this->set(compact('porcentagemLevel'));
        $this->set(compact('xpProximoLevelNormal'));
        $this->set(compact('arquivoImagem'));
        $this->set(compact('diretorioImagem'));
        $this->set(compact('listaConquistas'));
        $this->set(compact('diretorioImagemConquistas'));
        $this->set(compact('nomesConquistas'));
    }

    public function editarPerfil()
    {
        $session = new Session();
        $cpf = $session->consume('Auth.User.Cpf');
        $tabelaAlunos = TableRegistry::getTableLocator()->get('alunos');
        $aluno = $tabelaAlunos->find()->where(['CpfAluno' => $cpf])->first();
        $tabelaUsuarios = TableRegistry::getTableLocator()->get('usuarios');
        $usuario = $tabelaUsuarios->find()->where(['Cpf' => $cpf])->first();
        $tabelaEscolas = TableRegistry::getTableLocator()->get('escolas');
        $escola = $tabelaEscolas->find()->where(['EscolaID' => $aluno->EscolaID])->first();

        $perfis = [
            '1' => 'Iniciante',
            '2' => 'Empresarial',
            '3' => 'Programador',
            '4' => 'Gamer',
            '5' => 'Especialista em Redes',
            '6' => 'Robótica'
        ];

        $tabelaPerfisTipos = TableRegistry::getTableLocator()->get('perfis_tipos');
        $perfisQuery = $tabelaPerfisTipos->find()->where(['CPF' => $cpf]);

        $perfisSelecionados = array();
        foreach($perfisQuery as $perfilAux){
            array_push($perfisSelecionados,$perfilAux['Perfil']);
        }

        //debug($this->request->session()->read('Auth'));
        

        if($this->request->is('post') || $this->request->is('put')){
            $dados = $this->request->getData();
            
            $aluno = $tabelaAlunos->find()->where(['CpfAluno' => $cpf])->first();
            $usuario = $tabelaUsuarios->find()->where(['Cpf' => $cpf])->first();
            $usuario->Nome = $dados['Nome'];
            $usuario->Genero = $dados['Genero'];
            //debug($usuario['Senha']);
            $usuario->Senha = $usuario['Senha'];
            
            $cpfTutor = $tabelaUsuarios->find()->select(['Cpf'])->where(['ID' => $dados['Tutor']])->first();
            $aluno->CpfTutor = $cpfTutor['Cpf'];
            $aluno->EscolaID = $dados['Escola'];
            
            $nomeAntigoFoto = $usuario->Foto;
            if($this->request->getData()['Foto']){
                $usuario->Foto = $this->request->getData()['Foto']['name'];
            }

            //Alterar Perfis
            foreach($perfisQuery as $perfilAux){
                $tabelaPerfisTipos->delete($perfilAux);
            }

            if(!empty($dados['Perfis'])){
                foreach($dados['Perfis'] as $dadoChave => $dadoValor){
                    $perfilTipo = $tabelaPerfisTipos->newEntity();
                    $perfilTipo['CPF'] = $cpf;
                    $perfilTipo['Perfil'] = $dadoValor;
                    $tabelaPerfisTipos->save($perfilTipo);
                }
            }else{
                $perfilTipo = $tabelaPerfisTipos->newEntity();
                $perfilTipo['CPF'] = $cpf;
                $perfilTipo['Perfil'] = 1;
                $tabelaPerfisTipos->save($perfilTipo);
            }
            /*
            debug($dados);
            debug($usuario);
            debug($aluno);
            */
            
            if ($this->Alunos->save($aluno) && $tabelaUsuarios->save($usuario)) {
                if(!empty($this->request->getData()['Foto']['name'])){
                    $this->atualizarFoto($usuario->Email,$nomeAntigoFoto, $this->request->getData()['Foto']);
                }
                $this->request->session()->write(['Auth.User' => $usuario]);
                //$session->renew();
                
                $this->Flash->success(__('Dados alterados com sucesso.'));
                return $this->redirect(['action' => 'perfil',$aluno['ID']]);
            }else{
                $this->Flash->error(__('Erro ao salvar aluno.'));
            }
            
            
        }

        

        if(!empty($usuario->Foto)){
            $diretorioImagem = "webroot/img/user_data/". $usuario->Email . "/";
            $arquivoImagem = $usuario->Foto;
        }else{
            $diretorioImagem = "webroot/img/";
            $arquivoImagem = "default_user.jpg";
        }

        if($diretorioImagem == "webroot/img/"){
            $dirTemp = WWW_ROOT."img/";
        }else{
            $dirTemp = WWW_ROOT."img/user_data/". $usuario->Email . "/";
        }
        
        list($width, $height) = getimagesize($dirTemp.$arquivoImagem);

        $tabelaTutores = TableRegistry::getTableLocator()->get('tutores');
        $tutoresAux = $tabelaTutores->find()->select(['Cpf']);
        $tabelaAdministradores = TableRegistry::getTableLocator()->get('administradores');
        $administradoresAux = $tabelaAdministradores->find()->select(['Cpf']);
        
        $cpfsTutores = array();
        foreach($tutoresAux as $tutor){
            array_push($cpfsTutores,$tutor['Cpf']);
        }
        foreach($administradoresAux as $administrador){
            array_push($cpfsTutores,$administrador['Cpf']);
        }

        $cpfsTutoresUnicos = array_unique($cpfsTutores);
        $tutoresAux = $tabelaUsuarios->find()->select(['ID','Nome'])->where(['Cpf IN' => $cpfsTutoresUnicos]);
        
        $tutores = array();
        foreach($tutoresAux as $tutor){
            $tutores[$tutor['ID']] = $tutor['Nome'];
        }

        $escolasAux = $tabelaEscolas->find()->select(['EscolaID','Nome']);
        $escolas = array();
        foreach($escolasAux as $escola){
            $escolas[$escola['EscolaID']] = $escola['Nome'];
        }
        //debug($width);
        //debug($height);
        

        $this->set(compact('aluno'));
        $this->set(compact('usuario'));
        $this->set(compact('escola'));
        $this->set(compact('escolas'));
        $this->set(compact('tutores'));
        $this->set(compact('perfis'));
        $this->set(compact('perfisSelecionados'));
        $this->set(compact('arquivoImagem'));
        $this->set(compact('diretorioImagem'));
    }

    private function atualizarFoto(string $userEmail,string $nomeAntigoFoto, array $foto){
        $caminho = WWW_ROOT . "img" . DS . "user_data". DS . $userEmail;
        $caminhoUsuario = new Folder($caminho,true);

        $file = new File($foto['tmp_name']);
        unlink($caminhoUsuario->path . DS .$nomeAntigoFoto);
        $file->copy($caminhoUsuario->path . DS . $foto['name']);
        $file->close();
    }

    private function levelMaximo(int $level){
        $levels = array();
        $levels[0] = 0;
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
        if($level >= 0 && $level <= 30){
            return $levels[$level];
        }else{
            return 0;
        }
        
    }

    public function visualizarAlunos(){
        $session = new Session();
        $cpf = $session->consume('Auth.User.Cpf');
        $tabelaAlunos = TableRegistry::getTableLocator()->get('alunos');
        $aluno = $tabelaAlunos->find()->where(['CpfAluno' => $cpf])->first();
        $escolaID = $aluno['EscolaID'];

        $tabelaEscolas = TableRegistry::getTableLocator()->get('escolas');
        $escola = $tabelaEscolas->find()->where(['EscolaID' => $escolaID])->first();
        $nomeEscola = $escola['Nome'];

        $alunos = $tabelaAlunos->find()->where(['EscolaID' => $escolaID]);

        $cpfAlunos = array();
        foreach($alunos as $alunoAux){
            array_push($cpfAlunos,$alunoAux['CpfAluno']);
        }
        $tabelaUsuarios = TableRegistry::getTableLocator()->get('usuarios');
        $usuariosQuery = $tabelaUsuarios->find()->where(['Cpf IN' => $cpfAlunos]);
        
        $usuarios = array();
        foreach($usuariosQuery as $usuarioAux){
            $arrayAux = array();
            $arrayAux['Nome'] = $usuarioAux['Nome'];
            $arrayAux['Email'] = $usuarioAux['Email'];
            $arrayAux['Genero'] = $usuarioAux['Genero'];
            $arrayAux['ID'] = $usuarioAux['ID'];

            if(!empty($usuarioAux['Foto'])){
                $arrayAux['DiretorioImagem'] = "webroot/img/user_data/". $usuarioAux->Email . "/";
                $arrayAux['ArquivoImagem'] = $usuarioAux['Foto'];
            }else{
                $arrayAux['DiretorioImagem'] = "webroot/img/";
                $arrayAux['ArquivoImagem'] = "default_user_128x128.jpg";
            }
            $usuarios[$usuarioAux['Cpf']] = $arrayAux;
        }

        $this->set(compact('usuarios'));
        $this->set(compact('alunos'));
        $this->set(compact('nomeEscola'));
    }

    public function recomendacoes(){
        $questionarios = null;
        $cursosModa = null;
        $cursosRecomendados = array();
        $session = new Session();
        $nomesCursosModa = array();
        $cpf = $session->consume('Auth.User.Cpf');

        $tabelaPerfisTipos = TableRegistry::getTableLocator()->get('perfis_tipos');
        $perfisQuery = $tabelaPerfisTipos->find()->where(['CPF' => $cpf]);

        if(!empty($perfisQuery)){
            $cursos = array();
            foreach($perfisQuery as $perfil){
                $cursos[] = $perfil['Perfil'];
            }
            
            $tabelaMaterias = TableRegistry::getTableLocator()->get('materias');
            $tabelaCursos = TableRegistry::getTableLocator()->get('cursos');

            $materias = $tabelaMaterias->find();
            $cursos = $tabelaCursos->find();
            $cursosCont = array();
            $numMateriasCursos = array();
            $nomesCursosAux = array();

            foreach($cursos as $curso){
                $cursosCont[$curso['CursoID']] = 0;
                $numMateriasCursos[$curso['CursoID']] = 0;
                $nomesCursosAux[$curso['CursoID']] = $curso['Nome'];
            }

            foreach($materias as $materia){
                $cursosCont[$materia['CursoID']] += $materia['ContagemAulas'];
                $numMateriasCursos[$materia['CursoID']] += 1;
            }

            //Recomendações Moda
            foreach($cursosCont as $chave=>$valor){
                $cursosCont[$chave] = $valor/$numMateriasCursos[$chave];
            }
            arsort($cursosCont);

            $cursosModaOrdenadoTop5 = array_slice($cursosCont,0,5,true);

            foreach($cursosModaOrdenadoTop5 as $auxChave=>$auxValor){
                $cursosModa[$auxChave] = $nomesCursosAux[$auxChave];
            }

            //Recomendações Heurística
            $tiposPerfilAluno = array();
            foreach($perfisQuery as $perfil){
                array_push($tiposPerfilAluno,$perfil['Perfil']);
            }

            $cursosAdequados = array();
            $tabelaCursosTipos = TableRegistry::getTableLocator()->get('cursos_tipos');
            $cursosTipos = $tabelaCursosTipos->find();

            foreach($cursosCont as $cursoChave=>$cursoValor){
                $arrayAux = array();
                foreach($cursosTipos as $cursoTipo){
                    if($cursoChave == $cursoTipo['CursoID']){
                        array_push($arrayAux,$cursoTipo['Perfil']);
                    }    
                }
                $cursosAdequados[$cursoChave] = $arrayAux;
            }

            foreach($cursosAdequados as $cursoChave=>$cursoValor){  
                foreach($tiposPerfilAluno as $perfilChave=>$perfilValor){
                    if(in_array($perfilValor,$cursoValor)){
                        array_push($cursosRecomendados,$nomesCursosAux[$cursoChave]);
                        break;
                    }
                }
            }

        }

        $nomesPerfis = ["Iniciante","Empresarial","Programador","Gamer","Especialista em Redes","Robótica"];

        $this->set(compact('cursosModa'));
        $this->set(compact('cursosRecomendados'));
        $this->set(compact('nomesPerfis'));
        $this->set(compact('nomesCursosModa'));

    }

    private function gerarPerfisEspecificos($cpf,$perfisUsuario){
        $tabelaPerfisTipos = TableRegistry::getTableLocator()->get('perfis_tipos');
        $perfisQuery = $tabelaPerfisTipos->find()->where(['CPF' => $cpf]);

        foreach($perfisQuery as $perfilQuery){
            $tabelaPerfisTipos->delete($perfilQuery);
        }

        if(empty($perfisUsuario)){
            //O sistema está criando os perfis e o usuário não os escolheu
            $tabelaQuestionarios = TableRegistry::getTableLocator()->get('questionarios_tipos');
            $questionario = $tabelaQuestionarios->find()->where(['CPF' => $cpf])->first();
            $perfisUsuario = $this->verificarPerfisQuestionario($questionario);
        }

        for($i = 0; $i < count($perfisUsuario); $i++){
            if($perfisUsuario[$i]){
                $perfil = $tabelaPerfisTipos->newEntity();
                $perfil['CPF'] = $cpf;
                $perfil['Perfil'] = $i + 1;

                $tabelaPerfisTipos->save($perfil);
            }
        }

    }

    private function verificarPerfisQuestionario($questionario){
        //Iniciante,Empresarial,Programador,Gamer,Especialista em Redes,Robótica
        $perfis = [false,false,false,false,false,false];

        if($questionario['Pergunta01'] + $questionario['Pergunta02'] >= 8){
            $perfis[0] = true;
        }
        if($questionario['Pergunta03'] + $questionario['Pergunta09'] + $questionario['Pergunta10'] >= 12){
            $perfis[1] = true;
        }
        if($questionario['Pergunta04'] + $questionario['Pergunta05'] + $questionario['Pergunta11'] >= 12){
            $perfis[2] = true;
        }
        if($questionario['Pergunta06'] + $questionario['Pergunta12'] >= 8){
            $perfis[3] = true;
        }
        if($questionario['Pergunta07'] + $questionario['Pergunta13'] + $questionario['Pergunta14'] >= 12){
            $perfis[4] = true;
        }
        if($questionario['Pergunta08'] + $questionario['Pergunta15'] >= 8){
            $perfis[5] = true;
        }

        //Caso nenhum o usuário não pontue o suficiente para se encaixar em pelo menos um perfil, ele será rotulado como "Iniciante".
        $achou = false;
        for($i = 0; $i < count($perfis); $i++){
            if($perfis[$i]){
                $achou = true;
                break;
            }
        }

        if(!$achou){
            $perfis[0] = true;
        }

        return $perfis;
    }

    public function questionario(){
        $perfis = null;
        if($this->request->is('post') || $this->request->is('put')){
            $session = new Session();
            $cpf = $session->consume('Auth.User.Cpf');
            $tabelaQuestionarios = TableRegistry::getTableLocator()->get('questionarios_tipos');

            $questionarioQuery = $tabelaQuestionarios->find()->where(['CPF' => $cpf])->first();
            if(empty($questionarioQuery)){
                $questionario = $tabelaQuestionarios->newEntity();
                $questionario['CPF'] = $cpf;

                $dados = $this->request->getData();
                foreach($dados as $indice=>$valor){
                    $questionario->$indice = $valor;
                    //debug($indice." ".$valor);
                }
                //debug($questionario);
                $tabelaQuestionarios->save($questionario);

                $this->gerarPerfisEspecificos($cpf,null);

                $this->Flash->success(__('Questionário preenchido com sucesso.'));
                return $this->redirect(['action' => 'recomendacoes']);
            }else{
                $this->Flash->error(__('Você já preencheu o questionário inicial.'));
            }
        }

        $this->set(compact('perfis'));        
        //$this->set(compact('questionarios'));
    }
    /*
    <tr>
        <progress value="<?= h($xpProgressoAtual) ?>" max="<?= h($xpProximoLevel) ?>"></progress>
    </tr>

    <span style='display:block; float:left;'>
        <?php echo $this->Html->image($arquivoImagem, ['pathPrefix' => $diretorioImagem]); ?>
    </span>
    */
}
