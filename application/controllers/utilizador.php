<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Utilizador extends CI_Controller {

     function __construct() {
        parent::__construct();
     
          if($this->session ->userdata('conectado')==false){
            redirect('Welcome');
            
        }       
        
    }
    

    public function index() {
//        estatistica 
        $this->load->model('utilizador_m');
        $this->load->model('quotas_m');
        $data=date('Y');
       
        $totalAtuacoes=$this->utilizador_m->totalAtuacoes($data);        
        $totalAtividades=$this->utilizador_m->totalAtividades($data);       
        $totalEnsaios=$this->utilizador_m->totalEnsaios($data);      
        $totalAtivos=$this->utilizador_m->totalAtivos();       
        $proximaAtuacao=$this->utilizador_m->proximaAtuacao();     
        $proximaAtividade=$this->utilizador_m->proximaAtividade();     
        $proximoEnsaio=$this->utilizador_m->proximoEnsaio();
        $quotasEmFalta=$this->quotas_m->quotasEmFalta();
    
        $this->load->view('includes/header_v');
        $this->load->view('bemVindo_v',array('totalAtuacoes'=>$totalAtuacoes,
            'totalAtividades'=>$totalAtividades,'totalEnsaios'=>$totalEnsaios,
                'totalAtivos'=>$totalAtivos,'proximaAtuacao'=>$proximaAtuacao,
                'proximaAtividade' => $proximaAtividade,'proximoEnsaio' => $proximoEnsaio ,'quotasEmFalta' => $quotasEmFalta));
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }
     public function teste() {

//        $this->load->view('includes/header_v');
        $this->load->view('teste');
//        $this->load->view('includes/menu_v');
//       $this->load->view('includes/footer_v');
    }
 
    public function detalheUtilizador($id) {

        $this->load->model('utilizador_m');
        $totalAtuacoes= $this->utilizador_m->totalAtuacoesElemento($id);
        $totalEnsaios= $this->utilizador_m->totalEnsaiosElemento($id);
        $dados = $this->utilizador_m->compararIdDetalhes($id);
        $traje = $this->utilizador_m->get_traje_id($id);
        $instrumento = $this->utilizador_m->get_instrumento_id($id);
        $manutencao = $this->utilizador_m->get_manutencoes($id);
        
        
        if($dados['dataSocio']!=0){       
        $dataPagamento= date('Y/m/d', strtotime("+365 days",strtotime( $dados['dataSocio'])));
        }else{ $dataPagamento="Não é Sócio";}
        
        
       $imprimirOrgaoSocial= $this->utilizador_m->imprimirOrgaoSocial($id);
        
        
        $this->load->view('includes/header_v');
        $this->load->view('utilizador_v',array('totalAtuacoes' => $totalAtuacoes, 'utilizador'=>$dados,
            'totalEnsaios'=>$totalEnsaios,'pagamento'=>$dataPagamento,'orgaosSociais'=>$imprimirOrgaoSocial, 'traje'=>$traje, 'instrumento'=>$instrumento, 'manutencao'=>$manutencao));
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
        
        
        
    }

    public function criarUtilizador() {

        $this->load->view('includes/header_v');
        $this->load->view('criarUtilizador_v');
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }

//    devolve a lista de todos os utilizadores
    public function consultarUtilizadoresAtivos($indice=NULL) {
        $this->load->model('utilizador_m');
        $dados['utilizadoresAtivos'] = $this->utilizador_m->get_utilizadoresAtivos();
           
      if ($indice == 1) {
            $data['msg'] = "Utilizador foi Ativado.";
            $this->load->view('includes/msgSucesso_v', $data);
        } else if ($indice == 2) {
            $data['msg'] = "Não foi possível ativar o Utilizador.";
            $this->load->view('includes/msgSucesso_v', $data);
        }

        $this->load->view('includes/header_v');
        $this->load->view('ConsultarUtilizadores_v', $dados);
        $this->load->view('includes/menu_v');

    }
    //    devolve a lista de todos os utilizadores ativos
    public function consultarUtilizadoresInativos() {
        $this->load->model('utilizador_m');
        $dados['utilizadoresInativos'] = $this->utilizador_m->get_utilizadoresInativos(); 

        $this->load->view('includes/header_v');
        $this->load->view('historicoUtilizadores_v', $dados);
        $this->load->view('includes/menu_v');
//        $this->load->view('includes/footer_v');
    }
       //    ativar Utilizador
    public function ativarUtilizador($id) {
        $this->load->model('utilizador_m');
        $ativo['ativo']=1;
        $result=$this->utilizador_m->ativarUtilizador($id,$ativo);
        if($result == 1){
            
            redirect('Utilizador/consultarUtilizadoresAtivos'.'/1');
        }else{
            
            redirect('Utilizador/consultarUtilizadoresInativos'.'/2');
        }

    }
    

    public function registarUtilizador() {
        //strtolower-colocar tudo em minusculo
        //ucwords-colocar iniciais em maiusculo

        $this->form_validation->set_rules('nome', 'Nome', 'required|ucwords|is_unique[utilizador.nome]');
        $this->form_validation->set_rules('alcunha', 'Alcunha', 'required|alpha');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|strtolower|valid_email|is_unique[utilizador.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|strtolower');
        $this->form_validation->set_message('matches', 'O campo %s esta diferente do campo %s');
        $this->form_validation->set_rules('password2', 'Repita Password', 'required|strtolower|matches[password]');
        $this->form_validation->set_rules('nif', 'NIF', 'required|numeric|exact_length[9]|is_unique[utilizador.nif]');
        $this->form_validation->set_rules('bi', 'BI', 'required|numeric|exact_length[8]|is_unique[utilizador.bi]');
        $this->form_validation->set_rules('nAluno', 'NUmero Aluno', 'required|numeric');
        $this->form_validation->set_rules('dataNascimento', 'Data de Nascimento', 'required');
        $this->form_validation->set_rules('dataEntrada', 'Data de Entrada', 'required');
        $this->form_validation->set_rules('privilegio', 'Privilégio', 'required');
        $this->form_validation->set_rules('foto', 'Imagem', 'callback_validar_foto');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/header_v');
            $this->load->view('criarUtilizador_v');
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        } else {
            //insere os dados na base de dados
            $dados = elements(array('ativo','nAluno', 'socio', 'nome', 'alcunha', 'email', 'password', 'nif', 'bi', 'dataNascimento', 'privilegio', 'dataEntrada', 'foto'), $this->input->post());
            $dados['password'] = md5($dados['password']);
            $this->load->model('utilizador_m');
            $this->utilizador_m->do_insert($dados);

            //            envia utilizadores ativos
            $dados['utilizadoresAtivos'] = $this->utilizador_m->get_utilizadoresAtivos();
            $data['msg'] = "Sucesso.";
            $this->load->view('includes/header_v');
            $this->load->view('includes/msgSucesso_v', $data);
            $this->load->view('consultarUtilizadores_v',$dados);
            $this->load->view('includes/menu_v');
//            $this->load->view('includes/footer_v');
        }
    }

    public function validar_foto() {
        //FOTO
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '3000';
   




        $this->load->library('upload', $config);


        //isset-Determinar se uma variável está definido e não é NULL
        //empty — Informa se a variável é vazia
        if (isset($_FILES['foto']) && !empty($_FILES['foto']['name'])) {
            if ($this->upload->do_upload('foto')) {
                // coloca o nome do ficheiro na variavel
                $upload_data = $this->upload->data();
                $_POST['foto'] = $upload_data['file_name'];
                return true;
            } else {
                // mostrar os erros 
                $this->form_validation->set_message('validar_foto', $this->upload->display_errors());
                return false;
            }
        } else {
            $_POST['foto'] = 'index.jpg';
            return true;
        }
    }

//    vai permitar devolver os dados de um determinado utilizador
    public function atualizar($id = null, $indice = null) {

        $this->load->model('utilizador_m');
        $data['utilizador'] = $this->utilizador_m->compararId($id);


        $this->load->view('includes/header_v');
        if ($indice == 1) {
            $data['msg'] = "Senha atualizada com sucesso.";
            $this->load->view('includes/msgSucesso_v', $data);
        } else if ($indice == 2) {
            $data['msg'] = "Não foi possível atualizar a senha do usuário.";
            $this->load->view('includes/msgError_v', $data);
        } else if ($indice == 3) {
            $data['msg'] = "Atualização para sócio com sucesso.";
            $this->load->view('includes/msgSucesso_v', $data);
             $data['msg'] = " Primeira Quota Paga Automaticamente";
             $this->load->view('includes/msgSucesso_v', $data);
        } else if ($indice == 4) {
            $data['msg'] = "Não foi possível tornar-se sócio.";
            $this->load->view('includes/msgSucesso_v', $data);
        }else if ($indice == 5) {
            $data['msg'] = "Nova senha gerada.";
            $this->load->view('includes/msgSucesso_v', $data);
        }
        $this->load->view('editarUtilizador_v', $data);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }

    public function guardarAtualizacao() {
        //strtolower-colocar tudo em minusculo
        //ucwords-colocar iniciais em maiusculo

        $this->form_validation->set_rules('alcunha', 'Alcunha', 'required|alpha');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|strtolower|valid_email');
        $this->form_validation->set_rules('dataNascimento', 'Data Nascimento', 'required');
        $this->form_validation->set_rules('privilegio', 'Privilegio', 'required');
        $this->form_validation->set_rules('nAluno', 'Numero de Aluno', 'required|numeric');
        $id = $this->input->post('idUtilizador');

 

        if ($this->form_validation->run() == FALSE) {

            $this->load->model('utilizador_m');
            $data['utilizador'] = $this->utilizador_m->compararId($id);

            $this->load->view('includes/header_v');
            $this->load->view('editarUtilizador_v', $data);
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        } else {
            
   
            
            //insere os dados na base de dados
            $dados = elements(array('nAluno','ativo', 'alcunha', 'email', 'dataNascimento', 'privilegio'), $this->input->post());
               if($this->input->post('ativo') == 0){
                $dados['socio']=0;
            }else if($this->input->post('socio')==1){
                 $dados['socio']=1;
            }else {
                 $dados['socio']=0;
    }
    
            
            $this->load->model('utilizador_m');
            $this->utilizador_m->guardarAtualizacao($id, $dados);
            
//            envia utilizadores ativos
            $dados['utilizadoresAtivos'] = $this->utilizador_m->get_utilizadoresAtivos();

              
            $data['msg'] = "Alterado com Sucesso.";
            $this->load->view('includes/header_v');
            $this->load->view('includes/msgSucesso_v', $data);
            $this->load->view('ConsultarUtilizadores_v',$dados);
            $this->load->view('includes/menu_v');
//            $this->load->view('includes/footer_v');
        }
    }

    public function salvar_senha() {
        
        

        $this->load->model('utilizador_m');
        $id = $this->input->post('idUtilizador');
        
        if ($this->utilizador_m->salvar_senha()) {

            redirect('utilizador/atualizar/' . $id . '/1');
        } else {
            redirect('utilizador/atualizar/' . $id . '/2');
        }
    }

    public function alterarDataSocio() {
        $this->load->model('quotas_m');
        $this->load->model('utilizador_m');
        
        $dataSocio = $this->input->post('dataSocio');       
        $id = $this->input->post('idUtilizador');
//        $this->quotas_m->do_insert();
        
        if ($this->utilizador_m->alterarDataSocio() && $this->quotas_m->do_insert($id,$dataSocio)&& $this->quotas_m->criarLinhaQuota($id,$dataSocio) ) {

            redirect('utilizador/atualizar/' . $id . '/3');
        } else {
            redirect('utilizador/atualizar/' . $id . '/4');
        }
    }

    //botao pesquisar utilizadores ativos(consultarUtilizadores_v)
    public function pesquisarAtivos() {

        $this->load->model('utilizador_m');
        $dados['utilizadoresAtivos'] = $this->utilizador_m->pesquisar_utlizadoresAtivos();
   

        $this->load->view('includes/header_v');
        $this->load->view('ConsultarUtilizadores_v', $dados);
        $this->load->view('includes/menu_v');
//        $this->load->view('includes/footer_v');
    }
       //botao pesquisar utilizadores inativos(historicoUtilizadores_v)
        public function pesquisarInativos() {

        $this->load->model('utilizador_m');
        $dados['utilizadoresInativos'] = $this->utilizador_m->pesquisar_utlizadoresInativos();

        $this->load->view('includes/header_v');
        $this->load->view('historicoUtilizadores_v', $dados);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }


    //destroi a sessao 
    public function logout() {
        $this->session->sess_destroy();
        redirect('Welcome');
    }

    //    manda para a view onde imprime o certificado de socio
    public function comprovativoSocio($id) {
        $this->load->model('utilizador_m');        
        $dados['utilizador']=$this->utilizador_m->compararIdDetalhes($id); 
        $this->load->view('includes/comprovativoSocio_v',$dados);
    }
    
//    manda para a view onde imprime o certificado dos seus cargos
    public function comprovativoOrgaosSociais($id) {
        
        $this->load->model('utilizador_m');
        $dados['utilizador']=$this->utilizador_m->compararIdDetalhes($id);  
        $dados['comprovativo']=$this->utilizador_m->imprimirOrgaoSocial($id);        
       
        $this->load->view('includes/comprovativoOrgaosSociais_v',$dados);
    }
    
        public function OrgaosSociais($id) {
        
        $this->load->model('utilizador_m');
        $dados['utilizador']=$this->utilizador_m->compararIdDetalhes($id);  
        $dados['comprovativos']=$this->utilizador_m->imprimirOrgaoSocial($id);        
       
        $this->load->view('includes/header_v');
        $this->load->view('utilizador_v', $dados);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }
    public function presencasAtuacoes() {
        $dado['tab'] = "tab1";
//
        $this->load->view('includes/header_v');
        $this->load->view('presencasEventos_v', $dado);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }

//    a medida que utilizador escreve vai lhe dar opcoes de eventos registados na base de dados
    public function searchEventos() {
        $this->load->model('utilizador_m');

        if (isset($_GET['term'])) {
            $result = $this->utilizador_m->searchEventos($_GET['term']);

            if (count($result) > 0) {
                foreach ($result as $pr)
                    $arr_result[] = $pr->designacao;
                echo json_encode($arr_result);
            }
        }
    }

//tem duas operacoes a base de dados( permite buscar o idEvento atraves da designaçao)( buscar os utilizadores presentes no evento)
    public function eventosUtilizadores() {

        $designacao = $this->input->post('designacao');
        $this->load->model('utilizador_m');
        $result = $this->utilizador_m->eventosUtilizadores($designacao);
        $dados['tab'] = "tab1";
//        if (count($result) > 0) {
            foreach ($result as $pr){
                $dados['utilizadores'] = $this->utilizador_m->utilizadoresPorEvento($pr->idEventos);
            }

            $this->load->view('includes/header_v');
            $this->load->view('presencasEventos_v', $dados);
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
//        } else {
//
//            redirect('utilizador/presencasAtuacoes');
//        }
    }
 
//atuacoes num determinado ano 
    public function eventosPorAno() {

        $ano = $this->input->post('ano');
        $this->load->model('utilizador_m');
        $result['eventos'] = $this->utilizador_m->eventosPorAno($ano);

        $result['tab'] = "tab2";
//        if (count($result) > 0) {

            $this->load->view('includes/header_v');
            $this->load->view('presencasEventos_v', $result);
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
//        } else {

//            redirect('utilizador/presencasAtuacoes');
   //     }
    }


    // This function call from AJAX
    //vai dando sugestões de atuações registadas na base de dados
    public function verDetalhesEvento() {
       
        $this->load->model('utilizador_m');     
        $data = $this->utilizador_m->utilizadoresPorEvento($this->input->post('name'));

    // convertemos em json e colocamos na tela
        echo json_encode($data);
    }
    
    
    
    //    a medida que utilizador escreve vai lhe dar opcoes de utilizadores registados na base de dados
    public function searchUtilizadores() {
        $this->load->model('utilizador_m');

        if (isset($_GET['term'])) {
            $result = $this->utilizador_m->searchUtilizadores($_GET['term']);

            if (count($result) > 0) {
                foreach ($result as $pr)
                    $arr_result[] = $pr->nome;
                echo json_encode($arr_result);
            }
        }
    }

    
    
    //tem duas operacoes a base de dados( permite buscar o idUtilizador atraves do nome)( buscar os eventos onde teve presente o utilizador)
    public function utilizadorEventos() {

        $nome = $this->input->post('utilizador');
        $this->load->model('utilizador_m');
        $result = $this->utilizador_m->utilizadorEventos($nome);
        $dados['tab'] = "tab3";
//        if (count($result) > 0) {
            foreach ($result as $pr){
                $dados['presenca'] = $this->utilizador_m->eventoPorUtilizador($pr->idUtilizador);
            }

            $this->load->view('includes/header_v');
            $this->load->view('presencasEventos_v', $dados);
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
//             } else {
//
//             $this->load->view('includes/header_v');
//            $this->load->view('presencasEventos_v', $dados);
//            $this->load->view('includes/menu_v');
//            $this->load->view('includes/footer_v');
//        }
    }

    
     //    total de eventos por utilizador 
    public function totalEventos() {
        $this->load->model('utilizador_m');
        $ano = $this->input->post('ano');
    
        $utilizadores1=$this->utilizador_m->todosUtilizadores();
     
        
        foreach ($utilizadores1 as $as){
        //total atuacoes por utlizador
        $totalAtuacoes[]=$this->utilizador_m->totalAtuacaoPorAnoUtilizador($as->idUtilizador,$ano);
        
        //total de ensaios por utilizador       
        $totalEnsaios[]=$this->utilizador_m->totalEnsaioPorAnoUtilizador($as->idUtilizador,$ano);//        $array=array(

    
        }
            $dados = "tab4";
           
            $this->load->view('includes/header_v');
            $this->load->view('presencasEventos_v', array("tab"=>$dados,"totalAtuacoes"=>$totalAtuacoes,
                "utilizadores1"=>$utilizadores1,"totalEnsaios"=>$totalEnsaios));
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
    }
    
    
  
        
      
    function get_random_password($chars_min=6, $chars_max=8, $use_upper_case=false, $include_numbers=false, $include_special_chars=false)
    {
        $length = rand($chars_min, $chars_max);
        $selection = 'aeuoyibcdfghjklmnpqrstvwxz';
        if($include_numbers) {
            $selection .= "1234567890";
        }
        if($include_special_chars) {
            $selection .= "!@\"#$%&[]{}?|";
        }

        $password = "";
        for($i=0; $i<$length; $i++) {
            $current_letter = $use_upper_case ? (rand(0,1) ? strtoupper($selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))];            
            $password .=  $current_letter;
        }
     
         echo json_encode($password);
     // return $password;
    }

//    edita so a password
    public function guardarPassword(){
        $this->load->model('utilizador_m');
        $id = $this->input->post('idUtilizador');
        $this->utilizador_m->guardarPassword();
        redirect('utilizador/atualizar/' . $id . '/5');
    } 

        
        
        
    

}
