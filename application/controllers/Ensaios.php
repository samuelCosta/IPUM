<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ensaios extends CI_Controller {
    
    public function index(){
        
        $this->load->view('includes/header_v');
        $this->load->view('registarEnsaios_v');
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
        
    }
    
    public function registarEnsaios() {
        //strtolower-colocar tudo em minusculo
        //ucwords-colocar iniciais em maiusculo
       
        $this->form_validation->set_rules('dataEvento', 'Data', 'required');
        $this->form_validation->set_rules('localizacao', 'Localização', 'required|ucwords');
   


        if ($this->form_validation->run() == FALSE) {
             $this->load->view('includes/header_v');
            $this->load->view('registarEnsaios_v');
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        } else {
            //insere os dados na base de dados
            $dados = elements(array('designacao', 'dataEvento', 'localizacao'), $this->input->post());
           
            $this->load->model('Ensaios_m');
            $this->Ensaios_m->do_insert($dados);

            $data['msg'] = "Sucesso.";
            $this->load->view('includes/header_v');
            $this->load->view('includes/msgSucesso_v', $data);
            $this->load->view('utilizador_v');
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        }
    }
    
    public function consultarEnsaios() {
        $this->load->model('Ensaios_m');
        $dados['Ensaios'] = $this->Ensaios_m->get_ensaios();

        $this->load->view('includes/header_v');
        $this->load->view('consultarEnsaios_v', $dados);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }
    
    //    pesquisa por ensaio
      public function pesquisar() {

        $this->load->model('Ensaios_m');
        $dados['Ensaios'] = $this->Ensaios_m->pesquisar_ensaios();

        $this->load->view('includes/header_v');
        $this->load->view('consultarEnsaios_v', $dados);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
      }
      
       //    vai permitar devolver os dados de um determinado ensaio
    public function atualizar($id = null) {

        $this->load->model('Ensaios_m');
        $data['Ensaios'] = $this->Ensaios_m->compararId($id);
        
         $this->load->model('utilizador_m');
         $data['utilizadores'] = $this->utilizador_m->get_utilizadores();
         
        $this->load->view('includes/header_v');
        $this->load->view('editarEnsaios_v', $data);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }
       public function encerrarEnsaio($id) {

              $this->load->model('Ensaios_m');
              
        
            if($this->Ensaios_m->encerrarEnsaio($id)){
                redirect('Ensaios/consultarEnsaios');
            }else{
                redirect('Ensaios/consultarEnsaios');
            }
             
        }
        
    
    
    
}