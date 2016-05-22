<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class OrgaosSociais_m extends CI_Model {

    public function do_insert($dados = NULL) {
        if ($dados != NULL):
            $this->db->insert('orgaosSociais', $dados);
        endif;
    }

    //vai buscar todos os nomes dos utilizadores a partir do ID que nao tem data de fim
    public function get_orgaosSociais() {
        $this->db->select('*');
        $this->db->where('dataFim', Null);
        $this->db->join('utilizador', 'utilizador_idUtilizador=idUtilizador', 'inner');       
        return $this->db->get('orgaosSociais')->result();
    }

////pesquisar por cargo onde a data e null
//    public function pesquisar_orgaosSociais() {
////like-Esta função permite gerar cláusulas LIKE, úteis para fazer buscas .
//        $pesquisa = $this->input->post('pesquisar');
//
//        $this->db->select('*');
//        $this->db->join('utilizador', 'utilizador_idUtilizador=idUtilizador', 'inner');
//        $this->db->where('dataFim', Null);
//        $this->db->like('cargo', $pesquisa);
//        return $this->db->get('orgaosSociais')->result();
//    }

    //pesquisar por cargo onde existe uma data do fim
    public function pesquisar_HistoricoOrgaosSociais() {
//like-Esta função permite gerar cláusulas LIKE, úteis para fazer buscas .
        $pesquisa = $this->input->post('pesquisar');

        $this->db->select('*');
        $this->db->join('utilizador', 'utilizador_idUtilizador=idUtilizador', 'inner');
        $where="dataFim is NOT NULL";
        $this->db->where($where);
        $this->db->like('cargo', $pesquisa);
        return $this->db->get('orgaosSociais')->result();
    }
    
    // devolve os dados de um determinado utilizador (view-editarUtilizador)   
    public function compararId($id) {

        $this->db->where('idorgaosSociais', $id);
        $this->db->join('utilizador', 'utilizador_idUtilizador=idUtilizador', 'inner');
        return $this->db->get('orgaosSociais')->result();
    }

    // depois de editado os orgaos Sociais faz update desses dados novos   
    public function guardarAtualizacao($id, $dados) {

        $this->db->where('idorgaosSociais', $id);
        return $this->db->update('orgaossociais', $dados);
    }

    //colocar data de Fim no mandato
    public function encerrarMandato($dataInicio,$dataFim) {
               
        $data['dataFim']=$dataFim;        
        $this->db->where('dataInicio', $dataInicio);
        return $this->db->update('orgaosSociais', $data);
     
    }
    
       //vai buscar todos os orgaos sociais na qual tem data de Fim
    public function get_historicoOrgaosSociais() {
        $this->db->select('*');
        $where="dataFim is NOT NULL";
        $this->db->where($where);
        $this->db->group_by("DataFim"); 
        $this->db->join('utilizador', 'utilizador_idUtilizador=idUtilizador', 'inner');       
        return $this->db->get('orgaosSociais')->result();
    }

    public function anoOrgaosSociais($ano){
        $this->db->select('*');
        $this->db->where('dataInicio',$ano);
        $this->db->join('utilizador', 'utilizador_idUtilizador=idUtilizador', 'inner');   
        return $this->db->get('orgaosSociais')->result();
    }
    
    public function validar_data() {
        $this->db->select('*');       
        $this->db->where('dataFim', Null);
        return $this->db->get('orgaosSociais')->result_array();
        
    }

}
