<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ensaios_m extends CI_Model {

    public function do_insert($dados = NULL) {
        if ($dados != NULL):
            $this->db->insert('eventos', $dados);
        endif;
    }
    
        public function get_ensaios() {

        $this->db->select('*');
        $this->db->where('designacao','ensaio');
        return $this->db->get('eventos')->result();}
        
            public function compararId($id) {

        $this->db->where('idEvento', $id);
        return $this->db->get('eventos')->result();
    }

    public function pesquisar_eventos() {
//like-Esta função permite gerar cláusulas LIKE, úteis para fazer buscas .
        $pesquisa = $this->input->post('pesquisar');

        $this->db->select('*');
        $this->db->like('local', $pesquisa);
        return $this->db->get('eventos')->result();
    }
    
       //colocar data de Fim no ensaio
    public function encerrarEnsaio($id = null) {
       
        
        $this->db->where('idEvento', $id);
        return $this->db->update('estado', '0');
     
    }
}

