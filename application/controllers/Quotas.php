<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Quotas extends CI_Controller {

    public function index($indice=NULL) {
        $this->load->model('quotas_m');
        $dados['quotas'] = $this->quotas_m->consultarQuotas();

        $this->load->view('includes/header_v');
        if ($indice == 1) {
            $data['msg'] = "Quota Paga com Sucesso.";
            $this->load->view('includes/msgSucesso_v', $data);
        } else if ($indice == 2) {
            $data['msg'] = "Data alterada com Sucesso.";
            $this->load->view('includes/msgSucesso_v', $data);
        }
        
        $this->load->view('consultarQuotas_v', $dados);
        $this->load->view('includes/menu_v');
//        $this->load->view('includes/footer_v');
    }

    public function pagarQuota() {
        $this->load->model('utilizador_m');
         $this->load->model('quotas_m');

        $dataPagamento=$this->input->post('dataPagamento');
        $id=$this->input->post('idUtilizador');
        $dataAviso=$this->input->post('dataAviso');
        $idQuota=$this->input->post('idQuota');

      // insere a data de pagamento 
           // cria outra linha em sistema de quotas 
        if ($this->quotas_m->pagarQuota($idQuota,$dataPagamento) && $this->quotas_m->criarLinhaQuota($id, $dataAviso)) {

            redirect('Quotas/index'.'/1');
        }
    }

    public function estatisticaQuotas(){        
         $this->load->model('quotas_m');
         
         $idUtilizador=$this->input->post('id');
         $dataAviso=$this->input->post('data');
         $idQuota=$this->input->post('idQuota');

        $tensaios = $this->quotas_m->totalEnsaios($dataAviso);        
        $tatuacoes = $this->quotas_m->totalAtuacoes($dataAviso);
        $tensaiosu = $this->quotas_m->totalEnsaiosElemento($idUtilizador,$dataAviso);
        $tatuacoesu = $this->quotas_m->totalAtuacoesElemento($idUtilizador,$dataAviso);
        
        $estado = 'Tem de Pagar a Quota';
        $pensaios = 0;
        if ($tensaios > 0 && $tensaiosu > 0) {
            $pensaios = ($tensaiosu / $tensaios) * 100;
        }
        $patuacoes = 0;
        if ($tatuacoesu > 0 && $tatuacoes > 0) {
            $patuacoes = ($tatuacoesu / $tatuacoes) * 100;
        }
        $ptotal = $pensaios + $patuacoes;

        if ($pensaios >= 40 && $patuacoes >= 40 && $ptotal >= 115) {
            $estado = 'Está Isento de Pagar';
        }
           // echo $ptotal;
        $dados['Ptotal']=$ptotal;
        $dados['Pensaios']=$pensaios;
        $dados['Patuacoes']=$patuacoes;
        $dados['estado']=$estado;
        $dados['idUtilizador']=$idUtilizador;
        $dados['dataAviso']=$dataAviso;
        $dados['idQuota']=$idQuota;
        echo json_encode($dados);
   
    }




    public function historicoQuotas($indice=null) {

        $this->load->model('quotas_m');
        $dados['historicoQuotas'] = $this->quotas_m->historicoQuotas();
        $this->load->view('includes/header_v');
          if ($indice == 1) {
            $data['msg'] = "Quota Paga com Sucesso.";
            $this->load->view('includes/msgSucesso_v', $data);
        }
        $this->load->view('historicoQuotas_v', $dados);
        $this->load->view('includes/menu_v');
//        $this->load->view('includes/footer_v');
    }

    public function pagarQuotaHistorico($id) {

        $this->load->model('quotas_m');

//       insere a data de pagamento 
        if ($this->quotas_m->pagarQuota($id)) {
            return redirect('Quotas/historicoQuotas'.'/1');
        }
    }

    //    vai permitar devolver os dados de uma determinada quarta
    public function atualizarQuota($id) {

        $this->load->model('quotas_m');
        $data['quota'] = $this->quotas_m->compararId($id);


        $this->load->view('includes/header_v');
        $this->load->view('editarQuota_v', $data);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');         
    }

    //guarda os dados editados da quota
    public function guardarQuota() {
        //strtolower-colocar tudo em minusculo
        //ucwords-colocar iniciais em maiusculo
        $this->load->model('quotas_m');
        $this->form_validation->set_rules('dataAviso', 'Data Aviso', 'required');


        $id = $this->input->post('idQuota');


        if ($this->form_validation->run() == FALSE) {


            $data['quotas'] = $this->quotas_m->atualizarQuota($id);

            $this->load->view('includes/header_v');
            $this->load->view('editarQuota_v', $data);
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        } else {
            //insere os dados na base de dados
            $dados = elements(array('dataAviso'), $this->input->post());



            $this->quotas_m->guardarAtualizacao($id, $dados);
//            consultar quotas
             redirect('Quotas/index'.'/2');
        }
    }

}
