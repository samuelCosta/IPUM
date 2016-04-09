<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Atuacoes extends CI_Controller {
    
    public function index(){
        
        $this->load->view('includes/header_v');
        $this->load->view('registarAtuacoes_v');
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
        
    }
    
    public function registarAtuacoes() {
        //strtolower-colocar tudo em minusculo
        //ucwords-colocar iniciais em maiusculo
       
        $this->form_validation->set_rules('dataEvento', 'Data', 'required');
        $this->form_validation->set_rules('localizacao', 'Localização', 'required|ucwords');
        $this->form_validation->set_rules('orcamento', 'Orçamento', 'required');
        $this->form_validation->set_rules('responsavel', 'Responsável', 'required|ucwords');
        $this->form_validation->set_rules('contacto', 'Contacto', 'required|numeric|exact_length[9]');
        $this->form_validation->set_rules('despesa', 'Despesa', 'required');
        
   


        if ($this->form_validation->run() == FALSE) {
             $this->load->view('includes/header_v');
            $this->load->view('registarAtuacoes_v');
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        } else {
            //insere os dados na base de dados
            $dados = elements(array('designacao', 'dataEvento', 'localizacao','orcamento','responsavel','contacto','despesa'), $this->input->post());
           
            $this->load->model('Atuacoes_m');
            $this->Atuacoes_m->do_insert($dados);

            $data['msg'] = "Sucesso.";
            $this->load->view('includes/header_v');
            $this->load->view('includes/msgSucesso_v', $data);
            $this->load->view('utilizador_v');
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        }
    }
    
    
}