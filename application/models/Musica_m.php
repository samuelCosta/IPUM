<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Musica_m extends CI_Model {

    public function do_insert($dados = NULL) {
        if ($dados != NULL):
            $this->db->insert('musica', $dados);
        endif;
    }
    
    public function get_Musica() {

        $this->db->select('*');
        return $this->db->get('musica')->result();
    }
    
    public function compararId($id) {

        $this->db->where('idMusica', $id);
        return $this->db->get('musica')->result();
    }
    
    public function guardarAtualizacao($id, $data) {

        $this->db->where('idMusica', $id);
        return $this->db->update('musica', $data);
    }

}
