<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Instrumentos_m extends CI_Model {

    public function do_insert($dados = NULL) {
        if ($dados != NULL):
            $this->db->insert('instrumentos', $dados);
        endif;
    }
    
     public function get_Instrumentos() {

        $this->db->select('*');
        return $this->db->get('instrumentos')->result();
    }
    
    public function compararId($id) {

        $this->db->where('idInstrumentos', $id);
        return $this->db->get('instrumentos')->result();
    }
    
    public function guardarAtualizacao($id, $data) {

        $this->db->where('idInstrumentos', $id);
        return $this->db->update('instrumentos', $data);
    }
    
    

}
