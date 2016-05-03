<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tranche_m extends CI_Model {

    public function do_insert($dados = NULL) {
        if ($dados != NULL):
            $this->db->insert('apoios', $dados);
        endif;
    }

    public function get_tranches() {

        $this->db->select('*');
        return $this->db->get('apoios')->result();
    }
    
    
    public function eventosTranche($dados = NULL) {
        if ($dados != NULL):

            $this->db->insert('apoioseventos', $dados);
        endif;
    }
    
    
      public function atividadesTranche($dados = NULL) {
        if ($dados != NULL):

            $this->db->insert('apoiosatividades', $dados);
        endif;
    }
    
    
    // devolve os dados de um determinado Apoio (view-editarTranches)   
    public function compararId($id) {

        $this->db->where('idApoios', $id);
        return $this->db->get('apoios')->result();
    }
    
    
        //    retorna as actividades de um determinado apoio
      public function atividadesDoApoio($id){

        $this->db->select('*');
        $this->db->where('apoios_idApoios', $id);
        $this->db->join('atividades', 'atividades_idAtividades=idAtividades', 'inner');       
        return $this->db->get('apoiosatividades')->result();
        
 
    }
        //    retorna as atuacoes um determinado apoio
      public function atuacoesPorEvento($id){

        $this->db->select('*');
        $this->db->where('apoios_idApoios', $id);
        $this->db->join('eventos', 'eventos_idEventos=idEventos', 'inner');       
        return $this->db->get('apoioseventos')->result();
        
 
    }
    
 
    
    //    retorna os detalhes da atividade
      public function verDetalhesAtividade($id){

        $this->db->where('idAtividades', $id);
        return $this->db->get('atividades')->result();
        
 
    }
    
     //    retorna os detalhes da atuacao
      public function verDetalhesAtuacao($id){

        $this->db->where('idEventos', $id);
        return $this->db->get('eventos')->result();
        
 
    }
    
   // depois de editado a tranche faz update desses dados novos   
    public function guardarAtualizacao($id, $data) {

        $this->db->where('idApoios', $id);
        return $this->db->update('apoios', $data);
    }
    
       public function pesquisar_tranches() {
//like-Esta função permite gerar cláusulas LIKE, úteis para fazer buscas .
        $pesquisa = $this->input->post('pesquisar');

        $this->db->select('*');
        $this->db->like('ano', $pesquisa);     
        return $this->db->get('apoios')->result();
    }
    

}
