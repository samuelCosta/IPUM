<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Quotas extends CI_Controller {

    public function index() {
        $this->load->model('quotas_m');
        $dados['quotas'] = $this->quotas_m->consultarQuotas();

        $this->load->view('includes/header_v');
        $this->load->view('consultarQuotas_v', $dados);
        $this->load->view('includes/menu_v');
//        $this->load->view('includes/footer_v');
    }

    public function pagarQuota($id, $idUtilizador, $dataAviso) {
        $this->load->model('utilizador_m');

        $estado = 'Não Pago';
        $tensaios = $this->utilizador_m->totalEnsaios(date('Y'));
        $tatuacoes = $this->utilizador_m->totalAtuacoes(date('Y'));
        $tensaiosu = $this->utilizador_m->totalEnsaiosElemento($idUtilizador);
        $tatuacoesu = $this->utilizador_m->totalAtuacoesElemento($idUtilizador);
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
            $estado = 'Isento';
        }

        $this->load->model('quotas_m');

//       insere a data de pagamento 
        //    cria outra linha em sistema de quotas 
        if ($this->quotas_m->pagarQuota($id) && $this->quotas_m->criarLinhaQuota($idUtilizador, $dataAviso, $estado)) {

            return redirect('Quotas');
        }
    }

    public function historicoQuotas() {

        $this->load->model('quotas_m');

        $dados['historicoQuotas'] = $this->quotas_m->historicoQuotas();

        $this->load->view('includes/header_v');
        $this->load->view('historicoQuotas_v', $dados);
        $this->load->view('includes/menu_v');
//        $this->load->view('includes/footer_v');
    }

    public function pagarQuotaHistorico($id) {

        $this->load->model('quotas_m');

//       insere a data de pagamento 
        //    cria outra linha em sistema de quotas 
        if ($this->quotas_m->pagarQuota($id)) {

            return redirect('Quotas/historicoQuotas');
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
            $dados['quotas'] = $this->quotas_m->consultarQuotas();

            $data['msg'] = "Data Alterada com Sucesso.";
            $this->load->view('includes/header_v');
            $this->load->view('includes/msgSucesso_v', $data);
            $this->load->view('consultarQuotas_v', $dados);
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        }
    }

}
