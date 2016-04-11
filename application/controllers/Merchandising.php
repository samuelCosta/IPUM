<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Merchandising extends CI_Controller {

    public function index() {

        $this->load->view('includes/header_v');
        $this->load->view('registarMerchandising_v');
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }
    
    public function criarMerchandising(){
        
        $this->load->view('includes/header_v');
        $this->load->view('registarMerchandising_v');
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
        
    }

    public function registarMerchandising() {
       
        $this->form_validation->set_rules('tipo', 'Tipo', 'required');
        $this->form_validation->set_rules('quantidade', 'Quantidade', 'required');
        $this->form_validation->set_rules('localizacao', 'Localização', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/header_v');
            $this->load->view('registarMerchandising_v');
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        } else {
            //insere os dados na base de dados
            $dados = elements(array('tipo', 'quantidade', 'localizacao'), $this->input->post());
            $this->load->model('Merchandising_m');
            $this->Merchandising_m->do_insert($dados);

            $data['msg'] = "Sucesso.";
            $this->load->view('includes/header_v');
            $this->load->view('includes/msgSucesso_v', $data);
            $this->load->view('registarMerchandising_v');
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        }
    }
    
     public function consultarMerchandising() {
        $this->load->model('Merchandising_m');
        $dados['merchandising'] = $this->Merchandising_m->get_Merchandising();

        $this->load->view('includes/header_v');
        $this->load->view('consultarMerchandising_v', $dados);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }

    public function atualizar($id = null, $indice = null) {

        $this->load->model('Merchandising_m');
        $data['merchandising'] = $this->Merchandising_m->compararId($id);


        $this->load->view('includes/header_v');
        $this->load->view('editarMerchandising_v', $data);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }

    public function guardarAtualizacao() {
        //strtolower-colocar tudo em minusculo
        //ucwords-colocar iniciais em maiusculo

        $this->form_validation->set_rules('tipo', 'Tipo', 'required');
        $this->form_validation->set_rules('quantidade', 'Quantidade', 'required');
        $this->form_validation->set_rules('localizacao', 'Localização', 'required');
        $id = $this->input->post('idStockMerchandising');


        if ($this->form_validation->run() == FALSE) {

            $this->load->model('Merchandising_m');
            $data['merchandising'] = $this->Merchandising_m->compararId($id);

            $this->load->view('includes/header_v');
            $this->load->view('editarMerchandising_v', $data);
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        } else {
            //insere os dados na base de dados
            $dados = elements(array('tipo', 'quantidade', 'localizacao'), $this->input->post());

            $this->load->model('Merchandising_m');
            $this->Merchandising_m->guardarAtualizacao($id, $dados);

            $data['msg'] = "Alterado com Sucesso.";
            $this->load->model('Merchandising_m');
            $dados['merchandising'] = $this->Merchandising_m->get_Merchandising();
            $this->load->view('includes/header_v');
            $this->load->view('includes/msgSucesso_v', $data);
            $this->load->view('consultarMerchandising_v', $dados);
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        }
    }

    
}
