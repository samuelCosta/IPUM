<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Traje_m extends CI_Model {

    public function do_insert($dados = NULL) {
        if ($dados != NULL):
            $this->db->insert('stocktraje', $dados);
        endif;
    }

    public function get_Traje() {

        $this->db->select('*');
        return $this->db->get('stocktraje')->result();
    }

    public function compararId($id) {

        $this->db->where('idStock', $id);
        return $this->db->get('stocktraje')->result();
    }

    public function guardarAtualizacao($id, $data) {

        $this->db->where('idStock', $id);
        return $this->db->update('stocktraje', $data);
    }

}
