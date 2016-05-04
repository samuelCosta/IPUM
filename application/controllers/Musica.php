<?php

defined('BASEPATH') OR exit('No direct script access allowed');

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
}
