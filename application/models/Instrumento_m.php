<?php

class Instrumento_m extends CI_Model {

    public function get_instrumentos() {
        $this->db->select('i.*, u.nome as nome_elemento, ts.descricao as tipo_selecao_descricao');
        $this->db->from('instrumento i');
        $this->db->join('tipo_selecao ts', 'i.tipo_selecao_id=ts.id', 'left');
        $this->db->join('utilizador u', 'i.elemento=u.idUtilizador', 'left');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function registar() {

        $data = array(
            'tipo_selecao_id' => $this->input->post('tipo_instrumento'),
            'numero' => $this->input->post('numero'),
            'tamanho' => $this->input->post('tamanho'),
            'localizacao' => $this->input->post('localizacao'),
            'elemento' => $this->input->post('elemento'),
            'estado' => $this->input->post('estado')
        );

        return $this->db->insert('instrumento', $data);
    }

    public function registar_manutencao($id) {

        $data = array(
            'elemento' => $this->input->post('elemento'),
            'data_manutencao' => $this->input->post('data_manutencao'),
            'custo_total' => $this->input->post('custo_total'),
            'sp_material_id' => $this->input->post('tipo_material'),
            'instrumento_id' => $id
        );

        return $this->db->insert('instrumento_manutencao', $data);
    }

    public function get_historico($id) {
        $this->db->select('im.*, u.nome as elemento, ts.descricao as tipo_material_descricao');
        $this->db->from('instrumento_manutencao im');
        $this->db->join('utilizador u', 'im.elemento=u.idUtilizador', 'left');
        $this->db->join('stock_produto sp', 'im.sp_material_id=sp.id', 'left');
        $this->db->join('tipo_selecao ts', 'sp.ts_tipo_material_id=ts.id', 'left');
        $this->db->where('im.instrumento_id', $id);

        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_instrumento_id($id) {
        $this->db->select('i.*');
        $this->db->from('instrumento i');
        $this->db->where('i.id', $id);

        $query = $this->db->get();
        return $query->row_array();
    }

    public function editar($id) {
        $elemento = $this->input->post('elemento');
        
        if ($elemento === 0) {
            $elemento = NULL;
        }
        
        $data = array(
            'tipo_selecao_id' => $this->input->post('tipo_instrumento_hidden'),
            'numero' => $this->input->post('numero_hidden'),
            'tamanho' => $this->input->post('tamanho_hidden'),
            'localizacao' => $this->input->post('localizacao'),
            'elemento' => $elemento,
            'estado' => $this->input->post('estado'),
        );
        
        $this->db->where('id', $id);
        return $this->db->update('instrumento', $data);
    }
    
    public function delete_manutencao($id) {
        $this->db->where('id', $id);
        $this->db->delete('instrumento_manutencao');
    }
    
    public function delete_instrumento($id) {
        $this->db->where('id', $id);
        $this->db->delete('instrumento');
    }
    
    public function atualiza_estado($id, $estado) {
        $this->db->set('estado', $estado);
        $this->db->where('id', $id);
        return $this->db->update('instrumento');
    }

}
