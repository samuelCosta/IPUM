<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class OrgaosSociais extends CI_Controller {
    
    public function index(){
        $this->load->model('utilizador_m');
        $dados['utilizador']=  $this->utilizador_m->get_utilizadores();
        $this->load->view('includes/header_v');
        $this->load->view('registarOrgaosSociais_v',$dados);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
        
    }
    
    public function registarOrgaosSociais() {
        //strtolower-colocar tudo em minusculo
        //ucwords-colocar iniciais em maiusculo
       
        $this->form_validation->set_rules('categoria', 'Categoria', 'required');
        $this->form_validation->set_rules('cargo', 'Cargo', 'required|ucwords');
        $this->form_validation->set_rules('dataInicio', 'Data', 'required');
        $this->form_validation->set_rules('utilizador_idUtilizador', 'Utilizador', 'required');
   


        if ($this->form_validation->run() == FALSE) {
            $this->load->model('OrgaosSociais_m');
        $dados['utilizador']=  $this->OrgaosSociais_m->get_utilizadores();
             $this->load->view('includes/header_v');
            $this->load->view('registarOrgaosSociais_v',$dados);
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        } else {
            //insere os dados na base de dados
            $dados = elements(array('categoria', 'cargo', 'dataInicio','utilizador_idUtilizador'), $this->input->post());
           
            $this->load->model('OrgaosSociais_m');
            $this->OrgaosSociais_m->do_insert($dados);

            $data['msg'] = "Sucesso.";
            $this->load->view('includes/header_v');
            $this->load->view('includes/msgSucesso_v', $data);
            $this->load->view('utilizador_v');
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        }
    }
    
    
}