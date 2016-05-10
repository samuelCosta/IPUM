<?php

class Traje_m extends CI_Model {
    
    public function get_pecas() {
        $this->db->select('st.*, ts_p.descricao as ts_tipo, ts_g.descricao as ts_genero, ts_t.descricao as ts_tamanho');
        $this->db->from('stock_traje st');
        $this->db->join('tipo_selecao ts_p', 'st.ts_tipo_id=ts_p.id', 'left');
        $this->db->join('tipo_selecao ts_g', 'st.ts_genero_id=ts_g.id', 'left');
        $this->db->join('tipo_selecao ts_t', 'st.ts_tamanho_id=ts_t.id', 'left');

        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_traje() {
        $this->db->select('t.*, u.nome as elemento, ts_m.descricao as motivo, ts_p.descricao as ts_tipo, ts_g.descricao as ts_genero, ts_t.descricao as ts_tamanho');
        $this->db->from('traje t');
        $this->db->join('utilizador u', 't.elemento=u.idUtilizador', 'left');
        $this->db->join('tipo_selecao ts_m', 't.ts_motivo_id=ts_m.id', 'left');
        $this->db->join('stock_traje st', 't.st_id=st.id', 'left');
        $this->db->join('tipo_selecao ts_p', 'st.ts_tipo_id=ts_p.id', 'left');
        $this->db->join('tipo_selecao ts_g', 'st.ts_genero_id=ts_g.id', 'left');
        $this->db->join('tipo_selecao ts_t', 'st.ts_tamanho_id=ts_t.id', 'left');

        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_utilizadores() {
        $this->db->select('u.*');
        $this->db->from('utilizador u');
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function registar() {

        $data = array(
            'ts_tipo_id' => $this->input->post('tipo_peca'),
            'ts_genero_id' => $this->input->post('tipo_genero'),
            'ts_tamanho_id' => $this->input->post('tipo_tamanho'),
            'quantidade' => $this->input->post('quantidade'),
            'custo_uni' => $this->input->post('custo_uni'),
            'localizacao' => $this->input->post('localizacao')
        );

        return $this->db->insert('stock_traje', $data);
    }
    
    public function get_traje_id($id) {
        $this->db->select('st.*');
        $this->db->from('stock_traje st');
        $this->db->where('st.id', $id);

        $query = $this->db->get();
        return $query->row_array();
    }

    public function editar($id) {
        $data = array(
            'ts_tipo_id' => $this->input->post('tipo_peca_hidden'),
            'ts_genero_id' => $this->input->post('tipo_genero_hidden'),
            'ts_tamanho_id' => $this->input->post('tipo_tamanho_hidden'),
            'quantidade' => $this->input->post('quantidade_hidden'),
            'localizacao' => $this->input->post('localizacao'),
            'custo_uni' => $this->input->post('custo_uni_hidden'),
        );

        $this->db->where('id', $id);
        return $this->db->update('stock_traje', $data);
    }
    
    public function delete_traje($id) {
        $this->db->where('id', $id);
        $this->db->delete('stock_traje');
    }
    
    public function atribuir_traje($id) {
        $data = array(
            'data' => $this->input->post('data'),
            'custo' => $this->input->post('custo'),
            'descricao' => $this->input->post('descricao'),
            'ts_motivo_id' => $this->input->post('motivo'),
            'elemento' => $this->input->post('elemento'),
            'st_id' => $id           
        );
        
        return $this->db->insert('traje', $data);
    }
    
    public function atualiza_quantidade($id, $quantidade) {
        $this->db->set('quantidade', $quantidade);
        $this->db->where('id', $id);
        return $this->db->update('stock_traje');
    }

}