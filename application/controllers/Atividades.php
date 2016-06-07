<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Atividades extends CI_Controller {

    function __construct() {
        parent::__construct();
     
          if($this->session ->userdata('conectado')==false){
            redirect('Welcome');
            
        }       
        
    }
    
    public function index() {

        $this->load->view('includes/header_v');
        $this->load->view('registarAtividades_v');
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
        
    }

    public function registarAtividades() {
        //strtolower-colocar tudo em minusculo
        //ucwords-colocar iniciais em maiusculo

        $this->form_validation->set_rules('nomeAtividade', 'Nome da Atividade', 'required|ucwords|xss_clean|trim');
        $this->form_validation->set_rules('localizacao', 'Localização', 'required|ucwords|xss_clean|trim');
        $this->form_validation->set_rules('dataInicio', 'Data de Inicio', 'required');
        $this->form_validation->set_rules('duracao', 'Duração', 'required|xss_clean|trim');
        $this->form_validation->set_rules('orcamento', 'Orçamento', 'required|xss_clean|trim');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/header_v');
            $this->load->view('registarAtividades_v');
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        } else {
            //insere os dados na base de dados
            $dados = elements(array('estado', 'nomeAtividade', 'localizacao', 'dataInicio', 'duracao', 'orcamento'), $this->input->post());

            $this->load->model('Atividades_m');
            $this->Atividades_m->do_insert($dados);
            redirect('atividades/consultarAtividades' . '/3');
        }
    }

    public function consultarAtividades($indice = NULL) {
        $this->load->model('Atividades_m');
        $dados['atividades'] = $this->Atividades_m->get_atividades();

        $this->load->view('includes/header_v');
        if ($indice == 1) {
            $data['msg'] = "Atualização feita com Sucesso.";
            $this->load->view('includes/msgSucesso_v', $data);
        } else if ($indice == 2) {
            $data['msg'] = "Atividade encerrada com Sucesso.";
            $this->load->view('includes/msgSucesso_v', $data);
        } else if ($indice == 3) {
            $data['msg'] = "Nova Atividade Registada.";
            $this->load->view('includes/msgSucesso_v', $data);
        }
        $this->load->view('consultarAtividades_v', $dados);
        $this->load->view('includes/menu_v');
//        $this->load->view('includes/footer_v');
    }

//// para o botao pesquisar
//    public function pesquisar() {
//
//        $this->load->model('Atividades_m');
//        $dados['atividades'] = $this->Atividades_m->pesquisar_atividades();
//
//        $this->load->view('includes/header_v');
//        $this->load->view('consultarAtividades_v', $dados);
//        $this->load->view('includes/menu_v');
//        $this->load->view('includes/footer_v');
//    }

    public function atualizar($id = null) {

        $this->load->model('Atividades_m');
        $data['atividades'] = $this->Atividades_m->compararId($id);

        $this->load->view('includes/header_v');
        $this->load->view('editarAtividades_v', $data);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }

    //guarda os dados editados das atividades e encerra a atividade dependendo do botao onde carrega
    public function guardarAtualizacao() {
        //strtolower-colocar tudo em minusculo
        //ucwords-colocar iniciais em maiusculo
        if ($this->input->post('bt1') == 'upload') {
            $this->form_validation->set_rules('nomeAtividade', 'Nome da Atividade', 'required|ucwords|xss_clean|trim');
            $this->form_validation->set_rules('localizacao', 'Localização', 'required|ucwords|xss_clean|trim');
            $this->form_validation->set_rules('participantes', 'Total de Participantes', 'required|xss_clean|trim');
            $this->form_validation->set_rules('totalGastos', 'Total de Gastos', 'required|xss_clean|trim');
            $this->form_validation->set_rules('notas', 'Notas', 'required|ucwords|xss_clean|trim');
            $this->form_validation->set_rules('dataInicio', 'Data de Inicio', 'required');
            $this->form_validation->set_rules('duracao', 'Duração', 'required|xss_clean|trim');
            $this->form_validation->set_rules('orcamento', 'Orçamento', 'required|xss_clean|trim');

            $id = $this->input->post('idAtividades');


            if ($this->form_validation->run() == FALSE) {

                $this->load->model('Atividades_m');
                $data['atividades'] = $this->Atividades_m->compararId($id);

                $this->load->view('includes/header_v');
                $this->load->view('editarAtividades_v', $data);
                $this->load->view('includes/menu_v');
                $this->load->view('includes/footer_v');
            } else {
                //insere os dados na base de dados
                $dados = elements(array('nomeAtividade', 'localizacao', 'participantes', 'totalGastos', 'notas', 'dataInicio', 'duracao', 'orcamento'), $this->input->post());


                $this->load->model('Atividades_m');
                $this->Atividades_m->guardarAtualizacao($id, $dados);

                redirect('atividades/consultarAtividades' . '/1');
            }
        } else {


            $this->form_validation->set_rules('nomeAtividade', 'Nome da Atividade', 'required|ucwords|xss_clean|trim');
            $this->form_validation->set_rules('localizacao', 'Localização', 'required|ucwords|xss_clean|trim');
            $this->form_validation->set_rules('participantes', 'Total de Participantes', 'required|xss_clean|trim');
            $this->form_validation->set_rules('totalGastos', 'Total de Gastos', 'required|xss_clean|trim');
            $this->form_validation->set_rules('notas', 'Notas', 'required|ucwords|xss_clean|trim');
            $this->form_validation->set_rules('dataInicio', 'Data de Inicio', 'required');
            $this->form_validation->set_rules('duracao', 'Duração', 'required|xss_clean|trim');
            $this->form_validation->set_rules('orcamento', 'Orçamento', 'required|xss_clean|trim');

            $id = $this->input->post('idAtividades');


            if ($this->form_validation->run() == FALSE) {

                $this->load->model('Atividades_m');
                $data['atividades'] = $this->Atividades_m->compararId($id);

                $this->load->view('includes/header_v');
                $this->load->view('editarAtividades_v', $data);
                $this->load->view('includes/menu_v');
                $this->load->view('includes/footer_v');
            } else {
                $dados = elements(array('nomeAtividade', 'localizacao', 'participantes', 'totalGastos', 'notas', 'dataInicio', 'duracao', 'orcamento'), $this->input->post());


                $this->load->model('Atividades_m');
                $this->Atividades_m->guardarAtualizacao($id, $dados);
                $this->Atividades_m->encerrarAtividade($id);
                redirect('atividades/consultarAtividades' . '/2');
            }
        }
    }

    //    devolve a lista de todos os Eventos que ja foram finalizados
    public function historicoAtividades() {
        $this->load->model('Atividades_m');
        $dados['atividades'] = $this->Atividades_m->get_historicoAtividades();

        $this->load->view('includes/header_v');
        $this->load->view('historicoAtividades_v', $dados);
        $this->load->view('includes/menu_v');
      //  $this->load->view('includes/footer_v');
    }

    //  botão pesquisar-  pesquisar historico dos orgaos socias onde seu estado e 0 
    public function pesquisarHistorico() {

        $this->load->model('Atividades_m');
        $dados['atividades'] = $this->Atividades_m->pesquisar_HistoricoAtividades();

        $this->load->view('includes/header_v');
        $this->load->view('historicoAtividades_v', $dados);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }

}
