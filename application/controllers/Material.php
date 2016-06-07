<?php

class Material extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('material_m');
        
        if($this->session ->userdata('conectado')==false){
            redirect('Welcome');
            
        } 
    }
    
    public function index() {
        $data['materiais'] = $this->material_m->get_materiais();
        
        $this->load->view('includes/header_v');
        $this->load->view('material/index', $data);
        $this->load->view('includes/menu_v');
    }
    
    public function historico() {
        $data['materiais'] = $this->material_m->get_historico_materiais();
        
        $this->load->view('includes/header_v');
        $this->load->view('material/historico', $data);
        $this->load->view('includes/menu_v');
    }
    
    public function registar() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('tiposelecao_m');

        $data['tipos_material'] = $this->tiposelecao_m->get_tiposelecao('TIPO_MATERIAL');


        $this->form_validation->set_rules('tipo_material', 'Tipo de Material', 'required|xss_clean|trim');
        $this->form_validation->set_rules('quantidade', 'Quantidade', 'required|xss_clean|trim');
        $this->form_validation->set_rules('custo_uni', 'Custo Unitario', 'required|xss_clean|trim');
        $this->form_validation->set_rules('localizacao', 'Localização', 'required|xss_clean|trim');
        $this->form_validation->set_rules('data_compra', 'Data de Compra', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/header_v');
            $this->load->view('material/registar', $data);
            $this->load->view('includes/menu_v');
        } else {
            $this->material_m->registar();
            redirect('material', 'refresh');
        }
    }
    
    public function editar($id) {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('tiposelecao_m');


        $data['edit_data'] = $this->material_m->get_material($id);
        $data['tipos_material'] = $this->tiposelecao_m->get_tiposelecao('TIPO_MATERIAL');

        
        $this->form_validation->set_rules('localizacao', 'Localização', 'required|xss_clean|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/header_v');
            $this->load->view('material/editar', $data);
            $this->load->view('includes/menu_v');
        } else {
            $this->material_m->editar($id);
            redirect('material', 'refresh');
        }
    }
    
    public function delete_material($id) {
        $this->material_m->delete($id);
        redirect('material', 'refresh');
    }

}
