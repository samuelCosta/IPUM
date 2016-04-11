<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class OrgaosSociais_m extends CI_Model {

    public function do_insert($dados = NULL) {
        if ($dados != NULL):
            $this->db->insert('orgaosSociais', $dados);
        endif;
    }
    

      //vai buscar todos os nomes dos utilizadores a partir do ID
            public function get_orgaosSociais(){
               $this->db->select('*');
            $this->db->join('utilizador','utilizador_idUtilizador=idUtilizador','inner');
           return  $this->db->get('orgaosSociais')->result();
            
            
        }
        
    public function pesquisar_orgaosSociais() {
//like-Esta função permite gerar cláusulas LIKE, úteis para fazer buscas .
        $pesquisa = $this->input->post('pesquisar');

        $this->db->select('*');
         $this->db->join('utilizador','utilizador_idUtilizador=idUtilizador','inner');
        $this->db->like('cargo', $pesquisa);
        return $this->db->get('orgaosSociais')->result();
    }

    // devolve os dados de um determinado utilizador (view-editarUtilizador)   
    public function compararId($id) {

        $this->db->where('idorgaosSociais', $id);
         $this->db->join('utilizador','utilizador_idUtilizador=idUtilizador','inner');
        return $this->db->get('orgaosSociais')->result();
    }
}
