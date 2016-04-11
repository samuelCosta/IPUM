<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Traje extends CI_Controller {

    public function index() {

        $this->load->view('includes/header_v');
        $this->load->view('registarTraje_v');
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }
    
    public function criarTraje(){
        
        $this->load->view('includes/header_v');
        $this->load->view('registarTraje_v');
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
        
    }

    public function registarTraje() {
       
        $this->form_validation->set_rules('categoria', 'Peça', 'required');
        $this->form_validation->set_rules('tamanho', 'Tamanho', 'required');
        $this->form_validation->set_rules('localizacao', 'Localização', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/header_v');
            $this->load->view('registarTraje_v');
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        } else {
            //insere os dados na base de dados
            $dados = elements(array('categoria', 'tamanho', 'localizacao'), $this->input->post());
            $this->load->model('Traje_m');
            $this->Traje_m->do_insert($dados);

            $data['msg'] = "Sucesso.";
            $this->load->view('includes/header_v');
            $this->load->view('includes/msgSucesso_v', $data);
            $this->load->view('registarTraje_v');
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        }
    }
    
    public function consultarTraje() {
        $this->load->model('Traje_m');
        $dados['stocktraje'] = $this->Traje_m->get_Traje();

        $this->load->view('includes/header_v');
        $this->load->view('consultarTraje_v', $dados);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }

    public function atualizar($id = null, $indice = null) {

        $this->load->model('Traje_m');
        $data['stocktraje'] = $this->Traje_m->compararId($id);


        $this->load->view('includes/header_v');
        $this->load->view('editarTraje_v', $data);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }

    public function guardarAtualizacao() {
        //strtolower-colocar tudo em minusculo
        //ucwords-colocar iniciais em maiusculo

        $this->form_validation->set_rules('categoria', 'Peça', 'required');
        $this->form_validation->set_rules('tamanho', 'Tamanho', 'required');
        $this->form_validation->set_rules('localizacao', 'Localização', 'required');
        $id = $this->input->post('idStock');


        if ($this->form_validation->run() == FALSE) {

            $this->load->model('Traje_m');
            $data['stocktraje'] = $this->Traje_m->compararId($id);

            $this->load->view('includes/header_v');
            $this->load->view('editarTraje_v', $data);
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        } else {
            //insere os dados na base de dados
            $dados = elements(array('categoria', 'tamanho', 'localizacao'), $this->input->post());
            $this->load->model('Traje_m');
            $this->Traje_m->guardarAtualizacao($id, $dados);

            $data['msg'] = "Alterado com Sucesso.";
            $this->load->model('Traje_m');
            $dados['stocktraje'] = $this->Traje_m->get_Traje();
            $this->load->view('includes/header_v');
            $this->load->view('includes/msgSucesso_v', $data);
            $this->load->view('consultarTraje_v', $dados);
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        }
    }

    
}
