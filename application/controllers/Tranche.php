<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tranche extends CI_Controller {

    public function index() {

        $this->load->model('Atividades_m');
        $this->load->model('Atuacoes_m');
        $dados['atividades'] = $this->Atividades_m->get_atividades();
        $dados['atuacoes'] = $this->Atuacoes_m->get_atuacoes();

        $this->load->view('includes/header_v');
        $this->load->view('registarTranche_v', $dados);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }
    
  
    public function vericaTranche(){
        $this->load->model('Tranche_m');       
              
        $verifica=$this->Tranche_m->verificaTranche( $this->input->post('ano'));
       
       if(count($verifica)==0){
            return true;
            
        }

        else{
              
         $this->form_validation->set_message('vericaTranche', 'Já foram registadas as duas Tranches para esse ano');
             return FALSE;
        }
         
        
    }

    public function registarTranche() {
         
       $this->form_validation->set_rules('ano', 'Ano', 'required|callback_vericaTranche');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/header_v');
            $this->load->view('registarTranche_v');
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        } else {

               $dados1 = array(
            'tranche' => '1ªTranche',
            'ano' => $this->input->post('ano'),
        );
                $this->Tranche_m->do_insert($dados1);
                
                  $dados2 = array(
            'tranche' => '2ªTranche',
            'ano' => $this->input->post('ano'),
        );
             $this->Tranche_m->do_insert($dados2);   

             redirect('Tranche/consultarTranches'.'/1','refresh');
        }
    }

    public function consultarTranches($indice = null) {
        $this->load->model('Tranche_m');
        $dados['tranches'] = $this->Tranche_m->get_tranches();

        $this->load->view('includes/header_v');
         if ($indice == 1) {
            $data['msg'] = "Nova Tranche Registada.";
            $this->load->view('includes/msgSucesso_v', $data);
        } else if ($indice == 2) {
            $data['msg'] = "Alterado com Sucesso.";
            $this->load->view('includes/msgSucesso_v', $data);
        }
        
        $this->load->view('consultarTranches_v', $dados);
        $this->load->view('includes/menu_v');
//        $this->load->view('includes/footer_v');
    }

    public function associarTranche($idApoios,$ano) {
        $dados['ano']=$ano;
        $dados['idApoios'] = $idApoios;
        $this->load->model('Atividades_m');
        $this->load->model('Atuacoes_m');
        $dados['atividades'] = $this->Atividades_m->get_atividadesAno($ano);
        $dados['atuacoes'] = $this->Atuacoes_m->get_atuacoesAno($ano);

        $this->load->view('includes/header_v');
        $this->load->view('associarTranche_v', $dados);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }

//    public function eventosTranche() {
//          $this->load->model('Tranche_m');
////          finaliza a tranche
//          $this->Tranche_m->finalizarAssociar();
//          
////          retorna os dois id dos apoios ao ocorridos no ano
//          $idApoios= $this->Tranche_m->idTranches();
//          
//         
//          
//          
//          foreach($idApoios as $id){  
//        $dadoA['apoios_idApoios'] = $id->idApoios;
//     
//      
//        if (!empty($_POST['check'])) {
//            foreach ($_POST['check'] as $check) {
//
//                $dadoA['atividades_idAtividades'] = $check;              
//                $this->Tranche_m->atividadesTranche($dadoA);
//                           
//            }
//        }
//          }
//      
//          foreach ($idApoios as $id){
//                 $dadoE['apoios_idApoios'] = $id->idApoios;
//        if (!empty($_POST['check1'])) {
//            foreach ($_POST['check1'] as $check) {
//
//                $dadoE['eventos_idEventos'] = $check;         
//                $this->Tranche_m->eventosTranche($dadoE);
//            }
//        }
//          }
//          redirect('Tranche/consultarTranches','refresh');
//          
//    }
    
    
     public function editarTranche($idApoios,$ano) {
      
        $this->load->model('Tranche_m');
        //dados do apoio
        $dadosTranche= $this->Tranche_m->compararId($idApoios );
        //atividade do apoio
        $atividadesApoio = $this->Tranche_m->atividadesDoApoio($idApoios );

//        atividades que nao estao no apoio
        $atividadesNaoApoio = $this->Tranche_m->atividadesNaoApoio($atividadesApoio,$ano);
          
        //actuacoes do apoio
        $atuacoesApoio = $this->Tranche_m->atuacoesDoApoio($idApoios );
        //actuacoes nao do apoio
        $atuacoesNaoApoio = $this->Tranche_m->atuacoesNaoApoio($atuacoesApoio,$ano );

        $this->load->view('includes/header_v');
        $this->load->view('editarTranche_v',array('tranche' => $dadosTranche, 
            'atividadesApoio'=>$atividadesApoio,'atividadesNaoApoio'=>  $atividadesNaoApoio,'atuacoesApoio'=>  $atuacoesApoio,'atuacoesNaoApoio'=>  $atuacoesNaoApoio));
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }
    
   
     public function  editarPrimeiraTranche($idApoios) {
      
        $this->load->model('Tranche_m');
        //dados do apoio
        $dadosTranche= $this->Tranche_m->compararId($idApoios );
        //atividade do apoio
        $atividadesApoio = $this->Tranche_m->atividadesDoApoio($idApoios );

          
        //actuacoes do apoio
        $atuacoes = $this->Tranche_m->atuacoesDoApoio($idApoios );

        $this->load->view('includes/header_v');
        $this->load->view('editarPrimeiraTranche_v',array('tranche' => $dadosTranche, 
            'atividadesApoio'=>$atividadesApoio,'atuacoes'=>  $atuacoes));
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }
    
    
    
//    elimina a atividade associada a tranche
    public function eliminarAtividadeTranche($idapoiosAtividades,$idApoio, $ano){
     
        $this->load->model('Tranche_m');
        $this->Tranche_m->eliminarAtividadeTranche($idapoiosAtividades);        
        redirect('Tranche/editarTranche/'.$idApoio.'/'.$ano);
        
   
    }
    
//    associa uma actividade a tranche
      public function associarAtividadeTranche($idAtividade,$idApoio,$ano){
        
         $this->load->model('Tranche_m');
         $this->Tranche_m->associarAtividadeTranche($idAtividade,$idApoio);
         redirect('Tranche/editarTranche/'.$idApoio.'/'.$ano);
    }

    //    elimina a atuacao associada a tranche
    public function eliminarAtuacaoTranche($idapoiosEventos,$idApoio, $ano){
     
        $this->load->model('Tranche_m');
        $this->Tranche_m->eliminarAtuacaoTranche($idapoiosEventos);        
        redirect('Tranche/editarTranche/'.$idApoio.'/'.$ano);
        
   
    }
    
    //    associa uma atuacao a tranche
      public function associarAtuacaoTranche($idEventos,$idApoio,$ano){
        
         $this->load->model('Tranche_m');
         $this->Tranche_m->associarAtuacaoTranche($idEventos,$idApoio);
         redirect('Tranche/editarTranche/'.$idApoio.'/'.$ano);
    }

    
          // funcao AJAX
    public function verDetalhesAtividade() {

        $this->load->model('Tranche_m');
        $data = $this->Tranche_m->verDetalhesAtividade($this->input->post('id'));

// convertemos em json e colocamos na tela
        echo json_encode($data);
    }
    
             // funcao AJAX
    public function verDetalhesAtuacao() {

        $this->load->model('Tranche_m');
        $data = $this->Tranche_m->verDetalhesAtuacao($this->input->post('id'));

// convertemos em json e colocamos na tela
        echo json_encode($data);
    }
    
    
    
    //guarda os dados editados da tranche
    public function guardarAtualizacao() {

        $id = $this->input->post('idApoios');
        $this->load->model('Tranche_m');        
        $dados = elements(array('fundos'), $this->input->post());
        //insere os dados na base de dados
        $data = $this->Tranche_m->guardarAtualizacao($id, $dados);
   
         redirect('Tranche/consultarTranches'.'/2');
    }
    
    
      // boatao pesquisar (pesquisa por ano)
      public function pesquisar() {

         $this->load->model('Tranche_m');   
        $dados['tranches'] = $this->Tranche_m->pesquisar_tranches();

        $this->load->view('includes/header_v');
        $this->load->view('consultarTranches_v', $dados);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
      }

}
