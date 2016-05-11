<?php

class Instrumento extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('instrumento_m');
        $this->load->model('tiposelecao_m');
    }

    public function index() {
//        if ($this->session->userdata('logged_in')) {
        $data['instrumentos'] = $this->instrumento_m->get_instrumentos();

        $this->load->view('includes/header_v');
        $this->load->view('instrumento/index', $data);
        $this->load->view('includes/menu_v');
//        }  else {
//            redirect('Welcome', 'refresh');
//        }
    }

    public function registar() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['tipos_instrumento'] = $this->tiposelecao_m->get_tiposelecao('TIPO_INSTRUMENTO');


        $this->form_validation->set_rules('tipo_instrumento', 'Tipo de Instrmuento', 'required');
        $this->form_validation->set_rules('numero', 'Numero do Instrumento', 'required');
        $this->form_validation->set_rules('tamanho', 'Tamanho', 'required');
        $this->form_validation->set_rules('localizacao', 'Localização', 'required');
        $this->form_validation->set_rules('estado', 'Estado', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/header_v');
            $this->load->view('instrumento/registar', $data);
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        } else {
            $this->instrumento_m->registar();
            redirect('instrumento', 'refresh');
        }
    }

    public function manutencao($id) {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('material_m');
        $this->load->model('traje_m');

        $data['materiais'] = $this->material_m->get_materiais();
        $data['elementos'] = $this->traje_m->get_utilizadores();

        $this->form_validation->set_rules('tipo_material', 'Tipo de Material', 'required');
        $this->form_validation->set_rules('quantidade', 'Quantidade', 'required|callback_check_quantidade');
        $this->form_validation->set_rules('custo_total', 'Custo', 'required');
        $this->form_validation->set_rules('data_manutencao', 'Data da Manutenção', 'required');
        $this->form_validation->set_rules('elemento', 'Elemento', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/header_v');
            $this->load->view('instrumento/manutencao', $data);
            $this->load->view('includes/menu_v');
        } else {
            $this->instrumento_m->registar_manutencao($id);
            $result = $this->material_m->get_material($this->input->post('tipo_material'));
            $result['quantidade'] = $result['quantidade'] - $this->input->post('quantidade');
            $this->material_m->atualiza_quantidade($result['id'], $result['quantidade']);

            redirect('instrumento', 'refresh');
        }
    }

    function check_quantidade($quantidade) {
        $tipo_material = $this->input->post('tipo_material');
        $result = $this->material_m->get_material($tipo_material);
        if ($result['quantidade'] >= $quantidade) {
            return true;
        }

        $this->form_validation->set_message('check_quantidade', 'Quantidade inserida é superior à quantidade em Stock');
        return false;
    }

    public function historico($id) {
        $data['historico'] = $this->instrumento_m->get_historico($id);

        $this->load->view('includes/header_v');
        $this->load->view('instrumento/historico', $data);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }

    public function editar($id) {
        $this->load->helper('form');
        $this->load->library('form_validation');


        $data['edit_data'] = $this->instrumento_m->get_instrumento_id($id);
        $data['tipos_instrumento'] = $this->tiposelecao_m->get_tiposelecao('TIPO_INSTRUMENTO');

        $this->form_validation->set_rules('localizacao', 'Localização', 'required');
        $this->form_validation->set_rules('estado', 'Estado', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/header_v');
            $this->load->view('instrumento/editar', $data);
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        } else {
            $this->instrumento_m->editar($id);
            redirect('instrumento', 'refresh');
        }
    }

    public function delete_manutencao($id) {
        $this->instrumento_m->delete_manutencao($id);
        redirect('instrumento', 'refresh');
    }

    public function delete_instrumento($id) {
        $this->instrumento_m->delete_instrumento($id);
        redirect('instrumento', 'refresh');
    }

}
