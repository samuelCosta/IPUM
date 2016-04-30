<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tranche extends CI_Controller {

    public function index() {

        $this->load->model('Atividades_m');
        $this->load->model('Atuacoes_m');
        $dados['atividades'] = $this->Atividades_m->get_atividades();
        $dados['atuacoes'] = $this->Atuacoes_m->get_atuacoes();

        $this->load->view('includes/header_v');
        $this->load->view('registarTranche_v', $dados);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }

    public function registarTranche() {


        $this->form_validation->set_rules('ano', 'Ano', 'required');



        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/header_v');
            $this->load->view('registarTranche_v');
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        } else {
            //insere os dados na base de dados
            $dados = elements(array('tranche', 'ano', 'fundos'), $this->input->post());
            $this->load->model('Tranche_m');
            $this->Tranche_m->do_insert($dados);

            $data['msg'] = "Sucesso.";
            $this->load->view('includes/header_v');
            $this->load->view('includes/msgSucesso_v', $data);
            $this->load->view('registarTranche_v');
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        }
    }

    public function consultarTranches() {
        $this->load->model('Tranche_m');
        $dados['tranches'] = $this->Tranche_m->get_tranches();

        $this->load->view('includes/header_v');
        $this->load->view('consultarTranches_v', $dados);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }

    public function associarTranche($idApoios) {
        $dados['idApoios'] = $idApoios;
        $this->load->model('Atividades_m');
        $this->load->model('Atuacoes_m');
        $dados['atividades'] = $this->Atividades_m->get_atividades();
        $dados['atuacoes'] = $this->Atuacoes_m->get_atuacoes();

        $this->load->view('includes/header_v');
        $this->load->view('associarTranche_v', $dados);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }

    public function eventosTranche() {
          $this->load->model('Tranche_m');
        $dadoA['apoios_idApoios'] = $this->input->post('apoios_idApoios');
        $dadoE['apoios_idApoios'] = $this->input->post('apoios_idApoios');
      
        if (!empty($_POST['check'])) {
            foreach ($_POST['check'] as $check) {

                $dadoA['atividades_idAtividades'] = $check;              
                $this->Tranche_m->atividadesTranche($dadoA);
            }
        }
      
        if (!empty($_POST['check1'])) {
            foreach ($_POST['check1'] as $check) {

                $dadoE['eventos_idEventos'] = $check;         
                $this->Tranche_m->eventosTranche($dadoE);
            }
        }
    }
    
    
     public function editarTranche($idApoios) {
      
        $this->load->model('Tranche_m');
        //dados do apoio
        $dados['tranche'] = $this->Tranche_m->compararId($idApoios );
        //atividade do apoio
        $dados['atividades'] = $this->Tranche_m->atividadesDoApoio($idApoios );
        //actuacoes do apoio
        $dados['atuacoes'] = $this->Tranche_m->atuacoesPorEvento($idApoios );
        
//        $dados['atuacoes'] = $this->Atuacoes_m->get_atuacoes();

        $this->load->view('includes/header_v');
        $this->load->view('editarTranche_v', $dados);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }
    
    
          // funcao AJAX
    public function verDetalhesAtividade() {

        $this->load->model('Tranche_m');
        $data = $this->Tranche_m->verDetalhesAtividade($this->input->post('id'));

// convertemos em json e colocamos na tela
        echo json_encode($data);
    }
    
             // funcao AJAX
    public function verDetalhesAtuacao() {

        $this->load->model('Tranche_m');
        $data = $this->Tranche_m->verDetalhesAtuacao($this->input->post('id'));

// convertemos em json e colocamos na tela
        echo json_encode($data);
    }
    
    
    
    //guarda os dados editados da tranche
    public function guardarAtualizacao() {

        $id = $this->input->post('idApoios');
        $this->load->model('Tranche_m');        
        $dados = elements(array('fundos'), $this->input->post());
        //insere os dados na base de dados
        $data = $this->Tranche_m->guardarAtualizacao($id, $dados);
        redirect('Tranche/consultarTranches');
    }

}
