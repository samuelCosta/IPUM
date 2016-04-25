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
        $this->form_validation->set_rules('designacao', 'Designação', 'required|ucwords');

        
   


        if ($this->form_validation->run() == FALSE) {
             $this->load->view('includes/header_v');
            $this->load->view('registarAtuacoes_v');
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        } else {
            //insere os dados na base de dados
            $dados = elements(array('estado','tipo', 'dataEvento', 'localizacao','orcamento','responsavel','contacto','designacao'), $this->input->post());
           
            $this->load->model('Atuacoes_m');
            $this->Atuacoes_m->do_insert($dados);

            $data['msg'] = "Sucesso.";
            $this->load->view('includes/header_v');
            $this->load->view('includes/msgSucesso_v', $data);
            $this->load->view('bemVindo_v');
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        }
    }
    
    
        public function consultarAtuacoes() {
        $this->load->model('Atuacoes_m');
        $dados['atuacoes'] = $this->Atuacoes_m->get_atuacoes();

        $this->load->view('includes/header_v');
        $this->load->view('consultarAtuacoes_v', $dados);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }
    
    
     //    vai permitar devolver os dados de uma determinado atuacao
    public function atualizar($id = null) {

        $this->load->model('Atuacoes_m');
        $data['atuacao'] = $this->Atuacoes_m->compararId($id);
        
         
        $this->load->view('includes/header_v');
        $this->load->view('editarAtuacao_v', $data);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }
    
    
     
        //guarda os dados editados da atuação
     public function guardarAtualizacao() {
        //strtolower-colocar tudo em minusculo
        //ucwords-colocar iniciais em maiusculo

        $this->form_validation->set_rules('dataEvento', 'Data', 'required');
        $this->form_validation->set_rules('localizacao', 'Localização', 'required|ucwords');
        $this->form_validation->set_rules('responsavel', 'Responsavel', 'required|ucwords');
        $this->form_validation->set_rules('contacto', 'Contacto', 'required');
        $this->form_validation->set_rules('orcamento', 'Orçamento', 'required');
        $this->form_validation->set_rules('despesa', 'Despesa', 'required');
        
        $id = $this->input->post('idEventos');


        if ($this->form_validation->run() == FALSE) {

            $this->load->model('Atuacoes_m');
            $data['atuacao'] = $this->Atuacoes_m->compararId($id);

            $this->load->view('includes/header_v');
            $this->load->view('editarAtuacao_v', $data);
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        } else {
            //insere os dados na base de dados
            $dados = elements(array('dataEvento','localizacao','responsavel','contacto','orcamento','despesa'), $this->input->post());


            $this->load->model('Atuacoes_m');
            $this->Atuacoes_m->guardarAtualizacao($id, $dados);

            $data['msg'] = "Alterado com Sucesso.";
            $this->load->view('includes/header_v');
            $this->load->view('includes/msgSucesso_v', $data);
            $this->load->view('utilizador_v');
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        }
    }
    
    
           public function encerrarAtuacao($id) {

              $this->load->model('Atuacoes_m');
              
        
            if($this->Atuacoes_m->encerrarAtuacao($id)){
                redirect('Atuacoes/consultarAtuacoes');
            }else{
                redirect('Atuacoes/consultarAtuacoes');
            }
             
        }
        
        
        
  // boatao pesquisar (pesquisa por atuacao onde o seu estado e 1)
      public function pesquisar() {

        $this->load->model('Atuacoes_m');
        $dados['atuacoes'] = $this->Atuacoes_m->pesquisar_atuacoes();

        $this->load->view('includes/header_v');
        $this->load->view('consultarAtuacoes_v', $dados);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
      }
      
        //    devolve a lista de todos os Eventos que ja foram finalizados
    public function historicoAtuacoes() {
        $this->load->model('Atuacoes_m');
        $dados['atuacoes'] = $this->Atuacoes_m->get_historicoAtuacoes();

        $this->load->view('includes/header_v');
        $this->load->view('historicoAtuacoes_v', $dados);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }
    
    //  botão pesquisar-  pesquisar historico das atuacoes onde seu estado e 0 
       public function pesquisarAtuacoes() {

        $this->load->model('Atuacoes_m');
        $dados['atuacoes'] = $this->Atuacoes_m->pesquisar_HistoricoAtuacoes();

        $this->load->view('includes/header_v');
        $this->load->view('historicoAtuacoes_v', $dados);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }
    
    //    devolve a lista de todos os utilizadores
    public function consultarUtilizadores($id= null) {
        $dados['idEventos']=$id;
        $this->load->model('utilizador_m');
        $dados['utilizadores'] = $this->utilizador_m->get_utilizadores();

        $this->load->view('includes/header_v');
        $this->load->view('presencaAtuacoes_v', $dados);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }

        public function marcarPresencas() {
        $total=0;
        $dado['eventos_idEventos'] = $this->input->post('eventos_idEventos');

        if (!empty($_POST['check'])) {
            foreach ($_POST['check'] as $check) {

               $total= $total +1;
                $dado['utilizador_idUtilizador'] = $check;
                $this->load->model('Atuacoes_m');
                $this->Atuacoes_m->marcarPresencas($dado);
            }
              echo $total;
         $this->load->model('Atuacoes_m');
         $this->Atuacoes_m->totalPresencas($total,$dado);
        }
      
    }
    
    
}