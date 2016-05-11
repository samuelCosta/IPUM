<?php

class Traje extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('traje_m');
        $this->load->model('tiposelecao_m');
    }

    public function index() {
        $data['traje'] = $this->traje_m->get_traje();

        $this->load->view('includes/header_v');
        $this->load->view('traje/index', $data);
        $this->load->view('includes/menu_v');
    }
    
    public function stock() {
        $data['pecas'] = $this->traje_m->get_pecas();

        $this->load->view('includes/header_v');
        $this->load->view('traje/stock', $data);
        $this->load->view('includes/menu_v');
    }
    
    public function registar() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['tipos_peca'] = $this->tiposelecao_m->get_tiposelecao('TIPO_PECA');
        $data['tipos_genero'] = $this->tiposelecao_m->get_tiposelecao('TIPO_GENERO');
        $data['tipos_tamanho'] = $this->tiposelecao_m->get_tiposelecao('TIPO_TAMANHO');


        $this->form_validation->set_rules('tipo_peca', 'Tipo de Peça', 'required');
        $this->form_validation->set_rules('tipo_genero', 'Género', 'required');
        $this->form_validation->set_rules('tipo_tamanho', 'Tamanho', 'required');
        $this->form_validation->set_rules('localizacao', 'Localização', 'required');
        $this->form_validation->set_rules('quantidade', 'Quantidade', 'required');
        $this->form_validation->set_rules('custo_uni', 'Custo Unitário', 'required');
        $this->form_validation->set_rules('data_compra', 'Data de Compra', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/header_v');
            $this->load->view('traje/registar', $data);
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        } else {
            $this->traje_m->registar();
            redirect('traje/stock', 'refresh');
        }
    }

    public function editar($id) {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['edit_data'] = $this->traje_m->get_traje_id($id);
        $data['tipos_peca'] = $this->tiposelecao_m->get_tiposelecao('TIPO_PECA');
        $data['tipos_genero'] = $this->tiposelecao_m->get_tiposelecao('TIPO_GENERO');
        $data['tipos_tamanho'] = $this->tiposelecao_m->get_tiposelecao('TIPO_TAMANHO');

        $this->form_validation->set_rules('localizacao', 'Localização', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/header_v');
            $this->load->view('traje/editar', $data);
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        } else {
            $this->traje_m->editar($id);
            redirect('traje/stock', 'refresh');
        }
    }

    public function delete_traje($id) {
        $this->traje_m->delete_traje($id);
        redirect('traje', 'refresh');
    }
    
    public function atribuir_traje($id) {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['edit_data'] = $this->traje_m->get_traje_id($id);
        $data['tipos_motivo'] = $this->tiposelecao_m->get_tiposelecao('TIPO_MOTIVO');
        $data['elementos'] = $this->traje_m->get_utilizadores();
        $data['pecas'] = $this->traje_m->get_pecas();
        
        $this->form_validation->set_rules('motivo', 'Motivo', 'required');
        $this->form_validation->set_rules('elemento', 'Elemento');
        $this->form_validation->set_rules('data', 'Data', 'required');
        $this->form_validation->set_rules('quantidade', 'Quantidade', 'required|callback_check_quantidade');
        $this->form_validation->set_rules('descricao', 'Descricao');
        $this->form_validation->set_rules('custo', 'Custo');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/header_v');
            $this->load->view('traje/atribuir', $data);
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        } else {
            $this->traje_m->atribuir_traje($id);
            $result = $this->traje_m->get_traje_id($id);
            $result['quantidade'] = $result['quantidade'] - $this->input->post('quantidade');
            $this->traje_m->atualiza_quantidade($result['id'], $result['quantidade']);

            redirect('traje/stock', 'refresh');
        }
        
    }
    
    function check_quantidade($quantidade) {
        $tipo_peca = $this->input->post('tipo_peca_hidden');
        $result = $this->traje_m->get_traje_id($tipo_peca);
        if ($result['quantidade'] >= $quantidade) {
            return true;
        }

        $this->form_validation->set_message('check_quantidade', 'Quantidade inserida é superior à quantidade em Stock');
        return false;
    }
    
//    public function aumenta_stock($id) {
//        $this->load->helper('form');
//        $this->load->library('form_validation');
//        
//        $this->form_validation->set_rules('quantidade', 'Quantidade', 'required');
//        
//        $result= $this->traje_m->get_traje_id($id);
//        $result['quantidade'] = $result['quantidade'] + $this->input->post('quantidade');
//        
//        $this->traje_m->atualiza_quantidade($result['id'], $result['quantidade']);
//        
//        redirect('traje', 'refresh');
//    }

}
