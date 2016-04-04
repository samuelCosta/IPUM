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

    
}
