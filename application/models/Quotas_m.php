<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Quotas_m extends CI_Model {

//quando se torna socio faz regista-se no sistema de quotas
    public function do_insert() {
        $id = $this->input->post('idUtilizador');
        $dataSocio = $this->input->post('dataSocio');

//    $dataAviso= date('Y/m/d', strtotime("+365 days",strtotime( $dataSocio)));

        $dados = array(
            'dataAviso' => $dataSocio,
            'tipo' => 'Não Pago',
            'dataPagamento' => null,
            'utilizador_idUtilizador' => $id
        );

        return $this->db->insert('quota', $dados);
    }

//    consultar quotas
    public function consultarQuotas() {

        $this->db->select('*');
        $this->db->where('utilizador.socio', 1);
        $this->db->join('utilizador', 'idUtilizador=utilizador_idUtilizador', 'inner');
        return $this->db->get('quota')->result();
    }

    //    Pagar Quota
    public function pagarQuota($id) {

        $dados = array(
            'tipo' => 'Pago'
        );
        $this->db->where('idQuota', $id);
        $this->db->set('dataPagamento', 'NOW()', FALSE);
        return $this->db->update('quota', $dados);
//                 
    }

    //    cria outra linha em sistema de quotas 
    public function criarLinhaQuota($idUtilizador, $dataAviso) {

        $dataAviso1 = date('Y/m/d', strtotime("+365 days", strtotime($dataAviso)));

        $dados = array(
            'dataAviso' => $dataAviso1,
            'tipo' => 'Não Pago',
            'dataPagamento' => null,
            'utilizador_idUtilizador' => $idUtilizador,
        );
        return $this->db->insert('quota', $dados);
    }

    //    historico quotas
    public function historicoQuotas() {

        $this->db->select('*');
        $this->db->where('utilizador.socio', 0);
        $this->db->join('utilizador', 'idUtilizador=utilizador_idUtilizador', 'inner');
        return $this->db->get('quota')->result();
    }

}
