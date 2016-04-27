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

}
