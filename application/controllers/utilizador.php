<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Utilizador extends CI_Controller {

//     function __construct() {
//        parent::__construct();
//     
//          if($this->session ->userdata('conectado')==false){
//            redirect('Welcome');
//            
//        }       
//        
//    }
//    

    public function index() {

        $this->load->view('includes/header_v');
        $this->load->view('bemVindo_v');
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }

    public function detalheUtilizador($id) {

        $this->load->model('utilizador_m');
        $totalAtuacoes= $this->utilizador_m->totalAtuacoesElemento($id);
        $totalEnsaios= $this->utilizador_m->totalEnsaiosElemento($id);
        $dados = $this->utilizador_m->compararId($id);

        $this->load->view('includes/header_v');
        $this->load->view('utilizador_v',array('totalAtuacoes' => $totalAtuacoes, 'utilizador'=>$dados,'totalEnsaios'=>$totalEnsaios));
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
    public function consultarUtilizadoresAtivos() {
        $this->load->model('utilizador_m');
        $dados['utilizadoresAtivos'] = $this->utilizador_m->get_utilizadoresAtivos();
           
      

        $this->load->view('includes/header_v');
        $this->load->view('ConsultarUtilizadores_v', $dados);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }
    //    devolve a lista de todos os utilizadores ativos
    public function consultarUtilizadoresInativos() {
        $this->load->model('utilizador_m');
        $dados['utilizadoresInativos'] = $this->utilizador_m->get_utilizadoresInativos(); 

        $this->load->view('includes/header_v');
        $this->load->view('historicoUtilizadores_v', $dados);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
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
            $dados = elements(array('ativo', 'socio', 'nome', 'alcunha', 'email', 'password', 'nif', 'bi', 'dataNascimento', 'privilegio', 'dataEntrada', 'foto'), $this->input->post());
            $dados['password'] = md5($dados['password']);
            $this->load->model('utilizador_m');
            $this->utilizador_m->do_insert($dados);

            $data['msg'] = "Sucesso.";
            $this->load->view('includes/header_v');
            $this->load->view('includes/msgSucesso_v', $data);
            $this->load->view('bemVindo_v');
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        }
    }

    public function validar_foto() {
        //FOTO
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
//        $config['max_size'] = '10';
        $config['max_width'] = '400';
        $config['max_height'] = '400';


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
            $this->load->view('includes/msgSucesso_v', $data);
        } else if ($indice == 3) {
            $data['msg'] = "Atualização para sócio com sucesso.";
            $this->load->view('includes/msgSucesso_v', $data);
        } else if ($indice == 4) {
            $data['msg'] = "Não foi possível tornar-se sócio.";
            $this->load->view('includes/msgSucesso_v', $data);
        }
        $this->load->view('editarUtilizador_v', $data);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }

    public function guardarAtualizacao() {
        //strtolower-colocar tudo em minusculo
        //ucwords-colocar iniciais em maiusculo

        $this->form_validation->set_rules('nome', 'Nome', 'required|ucwords');
        $this->form_validation->set_rules('alcunha', 'Alcunha', 'required|alpha');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|strtolower|valid_email');
        $this->form_validation->set_rules('nif', 'NIF', 'required|numeric|exact_length[9]');
        $this->form_validation->set_rules('bi', 'BI', 'required|numeric|exact_length[8]');
        $this->form_validation->set_rules('dataNascimento', 'Data Nascimento', 'required');
        $this->form_validation->set_rules('privilegio', 'Privilegio', 'required');
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
            $dados = elements(array('socio', 'ativo', 'nome', 'alcunha', 'email', 'nif', 'bi', 'dataNascimento', 'privilegio'), $this->input->post());


            $this->load->model('utilizador_m');
            $this->utilizador_m->guardarAtualizacao($id, $dados);

            $data['msg'] = "Alterado com Sucesso.";
            $this->load->view('includes/header_v');
            $this->load->view('includes/msgSucesso_v', $data);
            $this->load->view('utilizador_v');
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
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

        $this->load->model('utilizador_m');
        $id = $this->input->post('idUtilizador');
        if ($this->utilizador_m->alterarDataSocio()) {

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
        $this->load->view('includes/footer_v');
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

    public function comprovativoSocio() {

        $this->load->view('includes/comprovativoSocio_v');
    }

    public function presencasAtuacoes() {
        $dado['tab'] = "tab1";

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
        if (count($result) > 0) {
            foreach ($result as $pr){
                $dados['utilizadores'] = $this->utilizador_m->utilizadoresPorEvento($pr->idEventos);
            }

            $this->load->view('includes/header_v');
            $this->load->view('presencasEventos_v', $dados);
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        } else {

            redirect('utilizador/presencasAtuacoes');
        }
    }
 
//atuacoes num determinado ano 
    public function eventosPorAno() {

        $ano = $this->input->post('ano');
        $this->load->model('utilizador_m');
        $result['eventos'] = $this->utilizador_m->eventosPorAno($ano);

        $result['tab'] = "tab2";
        if (count($result) > 0) {

            $this->load->view('includes/header_v');
            $this->load->view('presencasEventos_v', $result);
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        } else {

//            redirect('utilizador/presencasAtuacoes');
        }
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
        if (count($result) > 0) {
            foreach ($result as $pr){
                $dados['presenca'] = $this->utilizador_m->eventoPorUtilizador($pr->idUtilizador);
            }

            $this->load->view('includes/header_v');
            $this->load->view('presencasEventos_v', $dados);
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
             } else {

             $this->load->view('includes/header_v');
            $this->load->view('presencasEventos_v', $dados);
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        }
    }


}
