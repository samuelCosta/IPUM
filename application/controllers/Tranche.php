<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tranche extends CI_Controller {

    public function index() {
        
                $this->load->model('Atividades_m');
                 $this->load->model('Atuacoes_m');
       $dados['atividades']= $this->Atividades_m->get_atividades();
       $dados['atuacoes']= $this->Atuacoes_m->get_atuacoes();

        $this->load->view('includes/header_v');
        $this->load->view('registarTranche_v',$dados);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }
    

 public function registarTranche() {
       
        
        $this->form_validation->set_rules('ano', 'Ano', 'required');
       


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/header_v');
            $this->load->view('registarTranche_v');
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        } else {
            //insere os dados na base de dados
            $dados = elements(array('tranche', 'ano', 'fundos'), $this->input->post());
            $this->load->model('Tranche_m');
            $this->Tranche_m->do_insert($dados);

            $data['msg'] = "Sucesso.";
            $this->load->view('includes/header_v');
            $this->load->view('includes/msgSucesso_v', $data);
            $this->load->view('registarTranche_v');
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        }
    }
    
    
    
        
    public function consultarTranches() {
        $this->load->model('Tranche_m');
        $dados['tranches'] = $this->Tranche_m->get_tranches();

        $this->load->view('includes/header_v');
        $this->load->view('consultarTranches_v', $dados);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }
    
    public function associarTranche($idApoios){
        $dados['idApoios']=$idApoios;
           $this->load->model('Atividades_m');
                 $this->load->model('Atuacoes_m');
       $dados['atividades']= $this->Atividades_m->get_atividades();
       $dados['atuacoes']= $this->Atuacoes_m->get_atuacoes();

        $this->load->view('includes/header_v');
        $this->load->view('associarTranche_v',$dados);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
        
    }
     public function eventosTranche() {
       
        $dado['apoios_idApoios'] = $this->input->post('apoios_idApoios');
$dado['eventos_idEventos']=NULL;
        if (!empty($_POST['check'])) {
            foreach ($_POST['check'] as $check) {

              
                $dado['atividades_idAtividades'] = $check;
                $this->load->model('Tranche_m');
                $this->Tranche_m->eventosTranche($dado);
            }
           
      
        }
        $dado['atividades_idAtividades']=NULL;
            if (!empty($_POST['check1'])) {
            foreach ($_POST['check1'] as $check) {

              
                $dado['eventos_idEventos'] = $check;
                $this->load->model('Tranche_m');
                $this->Tranche_m->eventosTranche($dado);
            }
           
      
        }    
        
        
        
        
        
        
      
    }
    
}