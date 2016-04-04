<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Musica extends CI_Controller {

    public function index() {

        $this->load->view('includes/header_v');
        $this->load->view('registarMusica_v');
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }
    
    public function criarMusica(){
        
        $this->load->view('includes/header_v');
        $this->load->view('registarMusica_v');
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
        
    }

    public function registarMusica() {
       
        $this->form_validation->set_rules('nomeMusica', 'Nome', 'required');
        $this->form_validation->set_rules('video', 'Vídeo', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/header_v');
            $this->load->view('registarMusica_v');
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        } else {
            //insere os dados na base de dados
            $dados = elements(array('nomeMusica', 'video'), $this->input->post());
            $this->load->model('Musica_m');
            $this->Musica_m->do_insert($dados);

            $data['msg'] = "Sucesso.";
            $this->load->view('includes/header_v');
            $this->load->view('includes/msgSucesso_v', $data);
            $this->load->view('registarMusica_v');
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        }
    }

    
}
