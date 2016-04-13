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
    
    //    devolve a lista de todos os orgaosSociais
    public function consultarOrgaosSociais() {
        $this->load->model('OrgaosSociais_m');
        $dados['orgaosSociais'] = $this->OrgaosSociais_m->get_orgaosSociais();

        $this->load->view('includes/header_v');
        $this->load->view('consultarOrgaosSociais_v', $dados);
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
            $this->load->model('utilizador_m');
            $dados['utilizadores'] = $this->utilizador_m->get_utilizadores();
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
//    pesquisa por cargo
      public function pesquisar() {

        $this->load->model('OrgaosSociais_m');
        $dados['orgaosSociais'] = $this->OrgaosSociais_m->pesquisar_orgaosSociais();

        $this->load->view('includes/header_v');
        $this->load->view('consultarOrgaosSociais_v', $dados);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }
//    pesquisar historico dos orgaos socias 
       public function pesquisarHistorico() {

        $this->load->model('OrgaosSociais_m');
        $dados['orgaosSociais'] = $this->OrgaosSociais_m->pesquisar_HistoricoOrgaosSociais();

        $this->load->view('includes/header_v');
        $this->load->view('historicoOrgaosSociais_v', $dados);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }

    //    vai permitar devolver os dados de um determinado orgao social
    public function atualizar($id = null) {

        $this->load->model('OrgaosSociais_m');
        $data['orgaosSociais'] = $this->OrgaosSociais_m->compararId($id);
        
         $this->load->model('utilizador_m');
         $data['utilizadores'] = $this->utilizador_m->get_utilizadores();
         
        $this->load->view('includes/header_v');
        $this->load->view('editarOrgaosSociais_v', $data);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }
    
     public function guardarAtualizacao() {
        //strtolower-colocar tudo em minusculo
        //ucwords-colocar iniciais em maiusculo

        
        $this->form_validation->set_rules('cargo', 'Cargo', 'required|alpha|ucwords');

        $this->form_validation->set_rules('dataInicio', 'Data de Inicio', 'required');
 
        $id = $this->input->post('idorgaosSociais');


        if ($this->form_validation->run() == FALSE) {

            $this->load->model('OrgaosSociais_m');
            $data['orgaosSociais'] = $this->OrgaosSociais_m->compararId($id);

            $this->load->model('utilizador_m');
            $data['utilizadores'] = $this->utilizador_m->get_utilizadores();

            $this->load->view('includes/header_v');
            $this->load->view('editarOrgaosSociais_v', $data);
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        } else {
            //insere os dados na base de dados
            $dados = elements(array('categoria','cargo','dataInicio', 'utilizador_idUtilizador'), $this->input->post());


            $this->load->model('OrgaosSociais_m');
            $this->OrgaosSociais_m->guardarAtualizacao($id, $dados);

            $data['msg'] = "Alterado com Sucesso.";
            $this->load->view('includes/header_v');
            $this->load->view('includes/msgSucesso_v', $data);
            $this->load->view('utilizador_v');
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        }
    }
    
    
     //    vai permitar encerrar o mandato de um determinado Utilizador
    public function encerrarMandato($id) {

              $this->load->model('OrgaosSociais_m');
              
        
            if($this->OrgaosSociais_m->encerrarMandato($id)){
                redirect('OrgaosSociais/consultarOrgaosSociais');
            }else{
                redirect('OrgaosSociais/consultarOrgaosSociais');
            }
             
        }
        
            //    devolve a lista de todos os orgaosSociais
    public function historicoOrgaosSociais() {
        $this->load->model('OrgaosSociais_m');
        $dados['orgaosSociais'] = $this->OrgaosSociais_m->get_historicoOrgaosSociais();

        $this->load->view('includes/header_v');
        $this->load->view('historicoOrgaosSociais_v', $dados);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }
        
        
    }

