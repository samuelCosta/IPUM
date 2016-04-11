<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Musica extends CI_Controller {

    public function index() {

        $this->load->view('includes/header_v');
        $this->load->view('registarMusica_v');
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }

    public function criarMusica() {

        $this->load->view('includes/header_v');
        $this->load->view('registarMusica_v');
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }

    public function registarMusica() {

        $this->form_validation->set_rules('nomeMusica', 'Nome', 'required');
        $this->form_validation->set_rules('video', 'Vídeo', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/header_v');
            $this->load->view('registarMusica_v');
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        } else {
            //insere os dados na base de dados
            $dados = elements(array('nomeMusica', 'video'), $this->input->post());
            $this->load->model('Musica_m');
            $this->Musica_m->do_insert($dados);

            $data['msg'] = "Sucesso.";
            $this->load->view('includes/header_v');
            $this->load->view('includes/msgSucesso_v', $data);
            $this->load->view('registarMusica_v');
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        }
    }

    public function consultarMusica() {
        $this->load->model('Musica_m');
        $dados['musica'] = $this->Musica_m->get_Musica();

        $this->load->view('includes/header_v');
        $this->load->view('consultarMusica_v', $dados);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }

    public function atualizar($id = null, $indice = null) {

        $this->load->model('Musica_m');
        $data['musica'] = $this->Musica_m->compararId($id);


        $this->load->view('includes/header_v');
        $this->load->view('editarMusica_v', $data);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }

    public function guardarAtualizacao() {
        //strtolower-colocar tudo em minusculo
        //ucwords-colocar iniciais em maiusculo
        
        $this->form_validation->set_rules('nomeMusica', 'Nome', 'required');
        $this->form_validation->set_rules('video', 'Vídeo', 'required');
        $id = $this->input->post('idMusica');


        if ($this->form_validation->run() == FALSE) {

            $this->load->model('Musica_m');
            $data['musica'] = $this->Musica_m->compararId($id);

            $this->load->view('includes/header_v');
            $this->load->view('editarMusica_v', $data);
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        } else {
            //insere os dados na base de dados
            $dados = elements(array('nomeMusica', 'video'), $this->input->post());
            
            $this->load->model('Musica_m');
            $this->Musica_m->guardarAtualizacao($id, $dados);

            $data['msg'] = "Alterado com Sucesso.";
            $this->load->model('Musica_m');
            $dados['musica'] = $this->Musica_m->get_Musica();
            $this->load->view('includes/header_v');
            $this->load->view('includes/msgSucesso_v', $data);
            $this->load->view('consultarMusica_v', $dados);
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        }
    }

}
