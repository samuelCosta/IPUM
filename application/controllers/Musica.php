<?php


class Musica extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('instrumento_m');
        $this->load->model('tiposelecao_m');
    }

    public function index() {
//        if ($this->session->userdata('logged_in')) {
        $data['musicas'] = $this->musica_m->get_musicas();

        $this->load->view('includes/header_v');
        $this->load->view('musica/index', $data);
        $this->load->view('includes/menu_v');
//        }  else {
//            redirect('Welcome', 'refresh');
//        }
    }
    
    public function registar($id) {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('link', 'Link', 'required');
        $this->form_validation->set_rules('nome', 'Descrição', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/header_v');
            $this->load->view('musica/registar');
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        } else {
            $this->musica_m->registar($id);
            redirect('musica', 'refresh');
        }
    }
}
