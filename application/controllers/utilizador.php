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
        //strtolower-colocar tudo em minusculo
        //ucwords-colocar iniciais em maiusculo

        $this->form_validation->set_rules('nome','Nome','required|ucwords');
        $this->form_validation->set_rules('alcunha', 'Alcunha', 'required|alpha');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|strtolower|valid_email|is_unique[utilizador.email]');
        $this->form_validation->set_rules('password', 'Password','required|strtolower' );
        $this->form_validation->set_message('matches','O campo %s esta diferente do campo %s');
        $this->form_validation->set_rules('password2','Repita Password','required|strtolower|matches[password]');
        $this->form_validation->set_rules('nif', 'NIF', 'required|numeric|exact_length[9]');
        $this->form_validation->set_rules('bi', 'BI', 'required|numeric|exact_length[8]');
        $this->form_validation->set_rules('dataNascimento', 'Data Nascimento', 'required');
        $this->form_validation->set_rules('cargo', 'Cargo', 'required');

      
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('includes/header_v');
            $this->load->view('criarUtilizador_v');
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        } else {
            
            
            $dados= elements(array('nome','alcunha','email','password','nif','bi','dataNascimento','cargo'), $this->input->post());
            $dados['password']=  md5($dados['password']);
            $this->load->model('utilizador_m');
            $this->utilizador_m->do_insert($dados);
            
            $data['msg'] = "Sucesso.";
            $this->load->view('includes/header_v');
            $this->load->view('includes/msgSucesso_v', $data);
            $this->load->view('criarUtilizador_v');
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        }
    }

}
