<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class OrgaosSociais extends CI_Controller {
    
    public function index(){
        $this->load->model('utilizador_m');
        $dados['utilizador']=  $this->utilizador_m->get_utilizadoresAtivos();
        $this->load->view('includes/header_v');
        $this->load->view('registarOrgaosSociais_v',$dados);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
        
    }
    
    //    devolve a lista de todos os orgaosSociais
    public function consultarOrgaosSociais() {
        $this->load->model('OrgaosSociais_m');
        $orgaosSociaisHistorico = $this->OrgaosSociais_m->get_historicoOrgaosSociais();
        $orgaosSociais = $this->OrgaosSociais_m->get_orgaosSociais();
        

        $this->load->view('includes/header_v');
        $this->load->view('consultarOrgaosSociais_v', array('orgaosSociais'=> $orgaosSociais,
            'orgaosSociaisHistorico'=>$orgaosSociaisHistorico));
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }
    
    public function registarOrgaosSociais() {
        //strtolower-colocar tudo em minusculo
        //ucwords-colocar iniciais em maiusculo
       
        $this->form_validation->set_rules('dataInicio', 'Data', 'required|is_unique[orgaosSociais.dataInicio]|callback_validar_data');

   


        if ($this->form_validation->run() == FALSE) {
            $this->load->model('utilizador_m');
            $dados['utilizador'] = $this->utilizador_m->get_utilizadoresAtivos();
            $this->load->view('includes/header_v');
            $this->load->view('registarOrgaosSociais_v',$dados);
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        } else {
            $this->load->model('OrgaosSociais_m');
            $dataInicio= $this->input->post('dataInicio');
            
            
//            DIRECÇÂO
            $direcao="Direcção";
            $cargo =array('Presidente','Vice-Presidente','Tesoureiro','1ªSecratário','2ªSecretário','Director Financeiro','Director Secretariado e Burocracia',
                'Director Património e Administração Interna','Director Marketing e Comunicação','Director Social e Recreativo',
                'Director Prospecção e Arquivo','Director Relações Externas');          
           $i=0;
           foreach ($_POST['check'] as $check) {
                  if($check !=0){
                
             $dados =array(
                 'categoria'=>$direcao,
                 'cargo'=>$cargo[$i],
                 'dataInicio'=>$dataInicio, 
                 'utilizador_idUtilizador'=>$check
             );   
    
                $this->OrgaosSociais_m->do_insert($dados);
                  }
                 $i= $i + 1;
           }  
           
//           MESA ASSEMBLEIA
           $mesaAssembleia="Mesa Assembleia";
           
           $i=0;
           foreach ($_POST['check1'] as $check) {
                  if($check !=0){
                
             $dados =array(
                 'categoria'=>$mesaAssembleia,
                 'cargo'=>$cargo[$i],
                 'dataInicio'=>$dataInicio, 
                 'utilizador_idUtilizador'=>$check
             );   
    
                $this->OrgaosSociais_m->do_insert($dados);
                  }
                 $i= $i + 1;
           }  
           
           
//           CONSELHO FISCAL
           $conselhoF="Conselho Fiscal e Jurisdicional";
           
           $i=0;
           foreach ($_POST['check2'] as $check) {
                  if($check !=0){
                
             $dados =array(
                 'categoria'=>$conselhoF,
                 'cargo'=>$cargo[$i],
                 'dataInicio'=>$dataInicio, 
                 'utilizador_idUtilizador'=>$check
             );   
    
                $this->OrgaosSociais_m->do_insert($dados);
                  }
                 $i= $i + 1;
           } 
           
           
         
           
            redirect('OrgaosSociais/consultarOrgaosSociais');
        
    }
    
    
    
    
                  }
                  
                  
//    verifica se nao existe nenhum orgaoao social em execuçao 
       public function validar_data() {
        $this->load->model('OrgaosSociais_m');
        $dados = $this->OrgaosSociais_m->validar_data();
        if (count($dados) == 0) {
            return true;
        } else {
            $this->form_validation->set_message('validar_data', 'Ja existe Orgãos Sociais  em execuçao  ');
            return false;
        }
    }

////    pesquisa por cargo
//      public function pesquisar() {
//
//        $this->load->model('OrgaosSociais_m');
//        $dados['orgaosSociais'] = $this->OrgaosSociais_m->pesquisar_orgaosSociais();
//
//        $this->load->view('includes/header_v');
//        $this->load->view('consultarOrgaosSociais_v', $dados);
//        $this->load->view('includes/menu_v');
//        $this->load->view('includes/footer_v');
//    }
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
         $data['utilizadores'] = $this->utilizador_m->get_utilizadoresAtivos();
         
        $this->load->view('includes/header_v');
        $this->load->view('editarOrgaosSociais_v', $data);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }
    
     public function guardarAtualizacao() {
        //strtolower-colocar tudo em minusculo
        //ucwords-colocar iniciais em maiusculo

        
        $this->form_validation->set_rules('cargo', 'Cargo', 'required|ucwords');
        $this->form_validation->set_rules('dataInicio', 'Data de Inicio', 'required'); 
        $id = $this->input->post('idorgaosSociais');


        if ($this->form_validation->run() == FALSE) {

            $this->load->model('OrgaosSociais_m');
            $data['orgaosSociais'] = $this->OrgaosSociais_m->compararId($id);

            $this->load->model('utilizador_m');
            $data['utilizadores'] = $this->utilizador_m->get_utilizadoresAtivos();

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
            $this->load->view('bemVindo_v');
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        }
    }
    
    
     //    vai permitar encerrar o mandato em execuçao 
    public function encerrarMandato() {

              $this->load->model('OrgaosSociais_m');
              $dataInicio=$this->input->post('dataInicio');
              $dataFim = $this->input->post('dataFim');
              
        
            if($this->OrgaosSociais_m->encerrarMandato($dataInicio,$dataFim)){
                redirect('OrgaosSociais/consultarOrgaosSociais');
            }else{
                redirect('OrgaosSociais/consultarOrgaosSociais');
            }
             
        }
        
//            //    devolve a lista de todos os orgaosSociais
//    public function historicoOrgaosSociais() {
//        $this->load->model('OrgaosSociais_m');
//        $dados['orgaosSociais'] = $this->OrgaosSociais_m->get_historicoOrgaosSociais();
//
//        $this->load->view('includes/header_v');
//        $this->load->view('historicoOrgaosSociais_v', $dados);
//        $this->load->view('includes/menu_v');
//        $this->load->view('includes/footer_v');
//    }
        
    
               //    devolve lista desse ano 
    public function anoOrgaosSociais() {
        $this->load->model('OrgaosSociais_m');
   
        $data = $this->OrgaosSociais_m->anoOrgaosSociais($this->input->post('data'));
         echo json_encode($data);
    
//        $this->load->view('includes/header_v');
//        $this->load->view('historicoOrgaosSociais_v', $dados);
//        $this->load->view('includes/menu_v');
//        $this->load->view('includes/footer_v');
    }
        
    }

