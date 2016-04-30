<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Atividades_m extends CI_Model {

    public function do_insert($dados = NULL) {
        if ($dados != NULL):
            $this->db->insert('atividades', $dados);
        endif;
    }

      public function get_atividades() {

        $this->db->select('*');
         $this->db->where('estado', '1');
        return $this->db->get('atividades')->result();
    }
    // pesquisa as atividades por nome
    public function pesquisar_atividades() {
//like-Esta função permite gerar cláusulas LIKE, úteis para fazer buscas .
        $pesquisa = $this->input->post('pesquisar');

        $this->db->select('*');
        $this->db->like('nomeAtividade', $pesquisa);
        $this->db->where('estado', '1');
        return $this->db->get('atividades')->result();
    }
    
        public function compararId($id) {

        $this->db->where('idAtividades', $id);
        return $this->db->get('atividades')->result();
    }
    
     // depois de editada a atividade faz update desses dados novos   
    public function guardarAtualizacao($id, $data) {

        $this->db->where('idAtividades', $id);
        return $this->db->update('atividades', $data);
    }
    
        //colocar data de Fim no ensaio
    public function encerrarAtividade($id = null) {
        $data['estado']=0;

        $this->db->where('idAtividades', $id);
        return $this->db->update('atividades', $data);
    }
    
    public function get_historicoAtividades() {
        
        $this->db->select('*');
        $this->db->where('estado', '0'); 
        return $this->db->get('atividades')->result();
    }
    public function pesquisar_HistoricoAtividades() {
//like-Esta função permite gerar cláusulas LIKE, úteis para fazer buscas .
        $pesquisa = $this->input->post('pesquisar');

        $this->db->select('*'); 
        
        $this->db->like('nomeAtividade', $pesquisa); 
         $this->db->where('estado', '0');  
        return $this->db->get('atividades')->result();
    }
    
    
}

