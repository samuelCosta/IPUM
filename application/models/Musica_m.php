<?php

class Musica_m extends CI_Model {

    public function get_musicas() {
        $this->db->select('m.*');
        $this->db->from('musica m');

        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_musica_id($id) {
        $this->db->select('m.*');
        $this->db->from('musica m');
        $this->db->where('m.id', $id);

        $query = $this->db->get();
        return $query->row_array();
    }

    public function registar($id = NULL) {
       
        $data = array(
            'parent_id' => $id,
            'link' => $this->input->post('link'),
            'nome' => $this->input->post('nome')
        );

        return $this->db->insert('musica', $data);
    }
    
    public function editar($id) {
        $data = array(
            'link' => $this->input->post('link'),
            'nome' => $this->input->post('nome')
        );

        $this->db->where('id', $id);
        return $this->db->update('musica', $data);
    }
    
    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('musica');
    }


}
