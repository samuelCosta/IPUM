<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Instrumentos extends CI_Controller {

    public function index() {

        $this->load->view('includes/header_v');
        $this->load->view('registarInstrumentos_v');
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }

    public function criarInstrumentos() {

        $this->load->view('includes/header_v');
        $this->load->view('registarInstrumentos_v');
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }

    public function registarInstrumento() {

        $this->form_validation->set_rules('instrumento', 'Instrumento', 'required');
        $this->form_validation->set_rules('estado', 'Estado', 'required');
        $this->form_validation->set_rules('tipo', 'Tipo', 'required');
        $this->form_validation->set_rules('tamanho', 'Tamanho', 'required');
        $this->form_validation->set_rules('localizacao', 'Localização', 'required');
        $this->form_validation->set_rules('dataUltimaManutencao', 'Ultima Manutenção', 'required');
        $this->form_validation->set_rules('manutencao', 'Tipo Manutenção', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/header_v');
            $this->load->view('registarInstrumentos_v');
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        } else {
            //insere os dados na base de dados
            $dados = elements(array('instrumento', 'estado', 'tipo', 'tamanho', 'localizacao', 'dataUltimaManutencao', 'manutencao'), $this->input->post());
            $this->load->model('Instrumentos_m');
            $this->Instrumentos_m->do_insert($dados);

            $data['msg'] = "Sucesso.";
            $this->load->view('includes/header_v');
            $this->load->view('includes/msgSucesso_v', $data);
            $this->load->view('registarInstrumentos_v');
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        }
    }

    public function consultarInstrumentos() {
        $this->load->model('Instrumentos_m');
        $dados['instrumentos'] = $this->Instrumentos_m->get_Instrumentos();

        $this->load->view('includes/header_v');
        $this->load->view('consultarInstrumentos_v', $dados);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }

    public function atualizar($id = null, $indice = null) {

        $this->load->model('Instrumentos_m');
        $data['instrumentos'] = $this->Instrumentos_m->compararId($id);


        $this->load->view('includes/header_v');
        $this->load->view('editarInstrumentos_v', $data);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }

    public function guardarAtualizacao() {
        //strtolower-colocar tudo em minusculo
        //ucwords-colocar iniciais em maiusculo

        $this->form_validation->set_rules('instrumento', 'Instrumento', 'required');
        $this->form_validation->set_rules('estado', 'Estado', 'required');
        $this->form_validation->set_rules('tipo', 'Tipo', 'required');
        $this->form_validation->set_rules('tamanho', 'Tamanho', 'required');
        $this->form_validation->set_rules('localizacao', 'Localização', 'required');
        $this->form_validation->set_rules('dataUltimaManutencao', 'Ultima Manutenção', 'required');
        $this->form_validation->set_rules('manutencao', 'Tipo Manutenção', 'required');
        $id = $this->input->post('idInstrumentos');


        if ($this->form_validation->run() == FALSE) {

            $this->load->model('Instrumentos_m');
            $data['instrumentos'] = $this->Instrumentos_m->compararId($id);

            $this->load->view('includes/header_v');
            $this->load->view('editarInstrumentos_v', $data);
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        } else {
            //insere os dados na base de dados
            $dados = elements(array('instrumento', 'estado', 'tipo', 'tamanho', 'localizacao', 'dataUltimaManutencao', 'manutencao'), $this->input->post());

            $this->load->model('Instrumentos_m');
            $this->Instrumentos_m->guardarAtualizacao($id, $dados);

            $data['msg'] = "Alterado com Sucesso.";
            $this->load->model('Instrumentos_m');
            $dados['instrumentos'] = $this->Instrumentos_m->get_Instrumentos();
            $this->load->view('includes/header_v');
            $this->load->view('includes/msgSucesso_v', $data);
            $this->load->view('consultarInstrumentos_v', $dados);
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        }
    }

}
