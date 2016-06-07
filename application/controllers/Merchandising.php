<?php

class Merchandising extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('merchandising_m');
        $this->load->model('tiposelecao_m');
        
        if($this->session ->userdata('conectado')==false){
            redirect('Welcome');
            
        } 
    }
    
    public function index() {
        $data['merchandising'] = $this->merchandising_m->get_merchandising();
        
        $this->load->view('includes/header_v');
        $this->load->view('merchandising/index', $data);
        $this->load->view('includes/menu_v');
    }
    
    public function stock() {
        $data['merchandising_stock'] = $this->merchandising_m->get_merchandising_stock();
        
        $this->load->view('includes/header_v');
        $this->load->view('merchandising/stock', $data);
        $this->load->view('includes/menu_v');
    }
    
    public function historico() {
        $data['merchandising_stock'] = $this->merchandising_m->get_historico_merchandising();
        
        $this->load->view('includes/header_v');
        $this->load->view('merchandising/historico', $data);
        $this->load->view('includes/menu_v');
    }
    
    public function registar() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['tipos_merchandising'] = $this->tiposelecao_m->get_tiposelecao('TIPO_MERCHANDISING');
        
        $this->form_validation->set_rules('tipo_merchandising', 'Tipo de Merchandising', 'required');
        $this->form_validation->set_rules('quantidade', 'Quantidade', 'required');
        $this->form_validation->set_rules('custo_uni', 'Custo Unitário', 'required');
        $this->form_validation->set_rules('localizacao', 'Localização', 'required');
        $this->form_validation->set_rules('data_compra', 'Data de Compra', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/header_v');
            $this->load->view('merchandising/registar', $data);
            $this->load->view('includes/menu_v');
        } else {
            $this->merchandising_m->registar();
            redirect('merchandising/stock', 'refresh');
        }
    }
    
    public function editar($id) {
        $this->load->helper('form');
        $this->load->library('form_validation');


        $data['edit_data'] = $this->merchandising_m->get_merchandising_id($id);
        $data['tipos_merchandising'] = $this->tiposelecao_m->get_tiposelecao('TIPO_MERCHANDISING');
        
        $this->form_validation->set_rules('localizacao', 'Localização', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/header_v');
            $this->load->view('merchandising/editar', $data);
            $this->load->view('includes/menu_v');
        } else {
            $this->merchandising_m->editar($id);
            redirect('merchandising/stock', 'refresh');
        }
    }
    
    public function atribuir_merchandising($id) {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('traje_m');

        $data['edit_data'] = $this->merchandising_m->get_merchandising_id($id);
        $data['tipos_motivo'] = $this->tiposelecao_m->get_tiposelecao('TIPO_MOTIVO');
        $data['elementos'] = $this->traje_m->get_utilizadores();
        $data['merchandising'] = $this->merchandising_m->get_merchandising_stock();
        
        $this->form_validation->set_rules('motivo', 'Motivo', 'required');
        $this->form_validation->set_rules('elemento', 'Elemento');
        $this->form_validation->set_rules('data', 'Data', 'required');
        $this->form_validation->set_rules('quantidade', 'Quantidade', 'required|callback_check_quantidade');
        $this->form_validation->set_rules('custo', 'Custo');
        $this->form_validation->set_rules('descricao', 'Descrição');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/header_v');
            $this->load->view('merchandising/atribuir', $data);
            $this->load->view('includes/menu_v');
        } else {
            $this->merchandising_m->atribuir_merchandising($id);
            $result = $this->merchandising_m->get_merchandising_id($id);
            $result['quantidade'] = $result['quantidade'] - $this->input->post('quantidade');
            $this->merchandising_m->atualiza_quantidade($result['id'], $result['quantidade']);

            redirect('merchandising/stock', 'refresh');
        }
        
    }
    
    function check_quantidade($quantidade) {
        $tipo_merchandising = $this->input->post('tipo_merchandising_hidden');
        $result = $this->merchandising_m->get_merchandising_id($tipo_merchandising);
        if ($result['quantidade'] >= $quantidade) {
            return true;
        }

        $this->form_validation->set_message('check_quantidade', 'Quantidade inserida é superior à quantidade em Stock');
        return false;
    }
        
}
