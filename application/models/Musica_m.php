<?php

class Musica_m extends CI_Model {

    public function get_musicas() {
        $this->db->select('m.*');
        $this->db->from('musica m');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function registar($id = NULL) {
       
        $data = array(
            'parent_id' => $id,
            'link' => $this->input->post('link'),
            'nome' => $this->input->post('nome')
        );

        return $this->db->insert('musica', $data);
    }


}
