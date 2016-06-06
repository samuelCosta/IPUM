<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Quotas_m extends CI_Model {

//quando se torna socio faz regista-se no sistema de quotas
    public function do_insert($id,$dataSocio) {
       

//    $dataAviso= date('Y/m/d', strtotime("+365 days",strtotime( $dataSocio)));

        $dados = array(
            'dataAviso' => $dataSocio,
            'tipo' => 'Pago',
            'dataPagamento' => $dataSocio,
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
    public function pagarQuota($idQuota, $dataPagamento, $tipo) {
       
        if ($tipo == '') {
            $tipo = 'Pago';
        }

        $this->db->where('idQuota', $idQuota);
        $this->db->set('dataPagamento', $dataPagamento);
        $this->db->set('tipo', $tipo);
        return $this->db->update('quota');
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
    
//    devolve os dados de uma quota   
    public function compararId($id) {

        $this->db->where('idQuota', $id);
        $this->db->join('utilizador', 'idUtilizador=utilizador_idUtilizador', 'inner');
        return $this->db->get('quota')->result();
    }

        // depois de editado a quota faz update desses dados novos   
    public function guardarAtualizacao($id, $data) {

        $this->db->where('idQuota', $id);
        return $this->db->update('quota', $data);
    }
    
    
     //   estatisticas
    public function totalEnsaios($dataAviso) {
        $dataInicio= date('Y/m/d', strtotime("-365 days",strtotime( $dataAviso)));
            
        $this->db->select('*');   
        $this->db->where('tipo', 'ensaio');
        $this->db->where('dataEvento >',$dataInicio); 
        $this->db->where('dataEvento <',$dataAviso); 
        $query = $this->db->get('Eventos');
        return $query->num_rows();
    }
    
    //   estatisticas 
    public function totalAtuacoes($dataAviso) {
        
        $dataInicio= date('Y/m/d', strtotime("-365 days",strtotime( $dataAviso)));
        $this->db->select('*');
        $this->db->where('tipo', 'atuação'); 
        $this->db->where('dataEvento >',$dataInicio); 
        $this->db->where('dataEvento <',$dataAviso); 
        $query = $this->db->get('Eventos');
        return $query->num_rows();
    }
    
      //    conta o total de ensaios
    public function totalEnsaiosElemento($id,$dataAviso) {
        $dataInicio= date('Y/m/d', strtotime("-365 days",strtotime( $dataAviso)));
        
        $this->db->select('*');
        $this->db->where('utilizador_idUtilizador', $id);
        $this->db->where('eventos.tipo', 'ensaio');
        $this->db->where('eventos.dataEvento >',$dataInicio); 
        $this->db->where('eventos.dataEvento <',$dataAviso); 
        $this->db->join('eventos', 'eventos_idEventos=idEventos', 'inner');
        $query = $this->db->get('presencasEventos');
        return $query->num_rows();
    }
    
         //    conta o total de atuacoes
    public function totalAtuacoesElemento($id,$dataAviso) {
        $dataInicio= date('Y/m/d', strtotime("-365 days",strtotime( $dataAviso)));

        $this->db->select('*');
        $this->db->where('utilizador_idUtilizador', $id);
        $this->db->where('eventos.tipo', 'atuação');
        $this->db->where('eventos.dataEvento >',$dataInicio); 
        $this->db->where('eventos.dataEvento <',$dataAviso); 
        $this->db->join('eventos', 'eventos_idEventos=idEventos', 'inner');
        $query = $this->db->get('presencasEventos');
        return $query->num_rows();
    }
    
    //   lista as quotas em atraso (pagina bem vindo)
    public function quotasEmFalta() {

        $dataAtual=date('Y/m/d');
      
        $this->db->select('*');
        $this->db->where('utilizador.socio', 1); 
        $this->db->where('quota.tipo', 'Não Pago'); 
        $this->db->where('quota.dataAviso <=', $dataAtual);        
        $this->db->join('utilizador', 'idUtilizador=utilizador_idUtilizador', 'inner');
       $this->db->group_by("utilizador.nome");
        return $this->db->get('quota')->result();
    }

}
