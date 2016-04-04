<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Instrumentos extends CI_Controller {

    public function index() {

        $this->load->view('includes/header_v');
        $this->load->view('registarInstrumentos_v');
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }
    
    public function criarInstrumentos(){
        
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

    
}
