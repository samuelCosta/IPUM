<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class OrgaosSociais_m extends CI_Model {

    public function do_insert($dados = NULL) {
        if ($dados != NULL):
            $this->db->insert('orgaosSociais', $dados);
        endif;
    }
    
    
       public function get_utilizadores(){
               $this->db->select('*');
           
           return $this->db->get('utilizador')->result();
            
            
        }

}
