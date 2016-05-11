<?php

class Material_m extends CI_Model {

    public function get_materiais() {
        $this->db->select('sp.*, ts.descricao as tipo_material_descricao');
        $this->db->from('stock_produto sp');
        $this->db->join('tipo_selecao ts', 'sp.ts_tipo_material_id=ts.id', 'left');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function registar() {

        $data = array(
            'ts_tipo_material_id' => $this->input->post('tipo_material'),
            'quantidade' => $this->input->post('quantidade'),
            'custo_uni' => $this->input->post('custo_uni'),
            'localizacao' => $this->input->post('localizacao'),
            'data_compra' => $this->input->post('data_compra')
        );

        return $this->db->insert('stock_produto', $data);
    }
    
    public function editar($id) {
        $data = array(
            'ts_tipo_material_id' => $this->input->post('tipo_material_hidden'),
            'custo_uni' => $this->input->post('custo_uni_hidden'),
            'quantidade' => $this->input->post('quantidade_hidden'),
            'localizacao' => $this->input->post('localizacao'),
            'data_compra' => $this->input->post('data_compra_hidden'),
        );

        $this->db->where('id', $id);
        return $this->db->update('stock_produto', $data);
    }
    
    public function get_material_id($id) {
        $this->db->select('sp.*');
        $this->db->from('stock_produto sp');
        $this->db->where('sp.id', $id);

        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_material($id) {
        $query = $this->db->get_where('stock_produto', array('id' => $id));
        return $query->row_array();
    }

    public function atualiza_quantidade($id, $quantidade) {
        $this->db->set('quantidade', $quantidade);
        $this->db->where('id', $id);
        return $this->db->update('stock_produto');
    }
    
    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('stock_produto');
    }

}
