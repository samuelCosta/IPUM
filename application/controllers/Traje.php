<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Traje extends CI_Controller {

    public function index() {

        $this->load->view('includes/header_v');
        $this->load->view('registarTraje_v');
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }
    
    public function criarTraje(){
        
        $this->load->view('includes/header_v');
        $this->load->view('registarTraje_v');
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
        
    }

    public function registarTraje() {
       
        $this->form_validation->set_rules('categoria', 'Peça', 'required');
        $this->form_validation->set_rules('tamanho', 'Tamanho', 'required');
        $this->form_validation->set_rules('localizacao', 'Localização', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/header_v');
            $this->load->view('registarTraje_v');
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        } else {
            //insere os dados na base de dados
            $dados = elements(array('categoria', 'tamanho', 'localizacao'), $this->input->post());
            $this->load->model('Traje_m');
            $this->Traje_m->do_insert($dados);

            $data['msg'] = "Sucesso.";
            $this->load->view('includes/header_v');
            $this->load->view('includes/msgSucesso_v', $data);
            $this->load->view('registarTraje_v');
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        }
    }

    
}
