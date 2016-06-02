<?php

class Merchandising_m extends CI_Model {

    
    public function get_merchandising_stock() {
        $this->db->select('sm.*, ts.descricao as tipo_selecao_descricao');
        $this->db->from('stock_merchandising sm');
        $this->db->having('quantidade >', 0);
        $this->db->join('tipo_selecao ts', 'sm.ts_tipo_id=ts.id', 'left');
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_historico_merchandising() {
        $this->db->select('sm.*, ts.descricao as tipo_selecao_descricao');
        $this->db->from('stock_merchandising sm');
        $this->db->having('quantidade = 0');
        $this->db->join('tipo_selecao ts', 'sm.ts_tipo_id=ts.id', 'left');
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_merchandising() {
        $this->db->select('m.*, u.nome as elemento, ts_m.descricao as motivo, ts_t.descricao as tipo_merchandising' );
        $this->db->from('merchandising m');
        $this->db->join('utilizador u', 'm.elemento=u.idUtilizador', 'left');
        $this->db->join('tipo_selecao ts_m', 'm.ts_motivo_id=ts_m.id', 'left');
        $this->db->join('stock_merchandising sm', 'm.sm_id=sm.id', 'left');
        $this->db->join('tipo_selecao ts_t', 'sm.ts_tipo_id=ts_t.id', 'left');
        
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_merchandising_id($id) {
        $this->db->select('sm.*');
        $this->db->from('stock_merchandising sm');
        $this->db->where('sm.id', $id);

        $query = $this->db->get();
        return $query->row_array();
    }
    
    public function registar() {

        $data = array(
            'ts_tipo_id' => $this->input->post('tipo_merchandising'),
            'quantidade' => $this->input->post('quantidade'),
            'custo_uni' => $this->input->post('custo_uni'),
            'localizacao' => $this->input->post('localizacao'),
            'data_compra' => $this->input->post('data_compra')
        );

        return $this->db->insert('stock_merchandising', $data);
    }
    
    public function editar($id) {
        $data = array(
            'ts_tipo_id' => $this->input->post('tipo_merchandising_hidden'),
            'quantidade' => $this->input->post('quantidade_hidden'),
            'data_compra' => $this->input->post('data_compra_hidden'),
            'localizacao' => $this->input->post('localizacao'),
            'custo_uni' => $this->input->post('custo_uni_hidden'),
        );

        $this->db->where('id', $id);
        return $this->db->update('stock_merchandising', $data);
    }
    
    public function atribuir_merchandising($id) {
        $data = array(
            'data' => $this->input->post('data'),
            'custo' => $this->input->post('custo'),
            'quantidade' => $this->input->post('quantidade'),
            'ts_motivo_id' => $this->input->post('motivo'),
            'elemento' => $this->input->post('elemento'),
            'descricao' => $this->input->post('descricao'),
            'sm_id' => $id           
        );
        
        return $this->db->insert('merchandising', $data);
    }
    
    public function atualiza_quantidade($id, $quantidade) {
        $this->db->set('quantidade', $quantidade);
        $this->db->where('id', $id);
        return $this->db->update('stock_merchandising');
    }

}
