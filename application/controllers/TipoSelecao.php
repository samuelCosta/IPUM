<?php

class TipoSelecao extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('tiposelecao_m');
        
        if($this->session ->userdata('conectado')==false){
            redirect('Welcome');
            
        } 
    }
    
    public function index() {
        $data['tipo_selecao'] = $this->tiposelecao_m->get_tipos();
        
        $this->load->view('includes/header_v');
        $this->load->view('tiposelecao/index', $data);
        $this->load->view('includes/menu_v');
    }
    
    public function registar() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('tipo_selecao', 'Tipo de Seleção', 'required');
        $this->form_validation->set_rules('descricao', 'Descrição', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/header_v');
            $this->load->view('tiposelecao/registar');
            $this->load->view('includes/menu_v');
        } else {
            $this->tiposelecao_m->registar();
            redirect('tiposelecao/index', 'refresh');
        }
    }
    
    public function editar($id) {
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $data['edit_data'] = $this->tiposelecao_m->get_tiposelecao_id($id);
        $this->form_validation->set_rules('descricao', 'Descrição', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/header_v');
            $this->load->view('tiposelecao/editar', $data);
            $this->load->view('includes/menu_v');
        } else {
            $this->tiposelecao_m->editar($id);
            redirect('tiposelecao/index', 'refresh');
        }
    }
    
    public function delete($id) {
        $this->tiposelecao_m->delete($id);
        redirect('tiposelecao/index', 'refresh');
    }

}