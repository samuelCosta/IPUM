<?php

class TipoSelecao_m extends CI_Model {

    public function get_tipos() {
        $this->db->select('ts.*');
        $this->db->from('tipo_selecao ts');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_tiposelecao($cod_tipo) {
        $query = $this->db->get_where('tipo_selecao', array('cod_tipo' => $cod_tipo));
        return $query->result_array();
    }
    
    public function registar() {

        $data = array(
            'cod_tipo' => $this->input->post('tipo_selecao'),
            'descricao' => $this->input->post('descricao')
        );

        return $this->db->insert('tipo_selecao', $data);
    }
    
    public function get_tiposelecao_id($id) {
        $query = $this->db->get_where('tipo_selecao', array('id' => $id));
        return $query->row_array();
    }
    
    public function editar($id) {
        $data = array(
            'cod_tipo' => $this->input->post('tipo_selecao_hidden'),
            'descricao' => $this->input->post('descricao')
        );

        $this->db->where('id', $id);
        return $this->db->update('tipo_selecao', $data);
    }
    
    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('tipo_selecao');
    }

}
