<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Utilizador extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {

        $this->load->view('includes/header_v');

        $this->load->view('criarUtilizador_v');
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }

    public function registarUtilizador() {

        $this->form_validation->set_rules('nome', 'Nome', 'required');
         $this->form_validation->set_rules('alcunha', 'Alcunha', 'required');
         $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('senha', 'Senha', 'required', array('required' => 'Senha obrigatoria %s.')
        );
        
               

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('includes/header_v');
            $this->load->view('criarUtilizador_v');
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        } else {
            $data['msg'] = "Sucesso.";
            $this->load->view('includes/header_v');
            $this->load->view('includes/msgSucesso', $data);
            $this->load->view('criarUtilizador_v');
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        }
    }

}
