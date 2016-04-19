<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Atuacoes_m extends CI_Model {

    public function do_insert($dados = NULL) {
        if ($dados != NULL):
            $this->db->insert('eventos', $dados);
        endif;
    }
    
    
        public function get_atuacoes() {

        $this->db->select('*');
        $this->db->where('tipo', 'atuação');
        $this->db->where('estado', '1');
        return $this->db->get('eventos')->result();
    }
    
    //devolve os dados de uma atuacao
        public function compararId($id) {

        $this->db->where('idEventos', $id);
        return $this->db->get('eventos')->result();
    }
    
        // depois de editado a atuacao faz update desses dados novos   
    public function guardarAtualizacao($id, $data) {

        $this->db->where('idEventos', $id);
        return $this->db->update('eventos', $data);
    }

    
    
        //colocar 0 no estado
    public function encerrarAtuacao($id = null) {
        $data['estado']=0;

        $this->db->where('idEventos', $id);
        return $this->db->update('eventos', $data);
    }
    
    
        public function pesquisar_atuacoes() {
//like-Esta função permite gerar cláusulas LIKE, úteis para fazer buscas .
        $pesquisa = $this->input->post('pesquisar');

        $this->db->select('*');
        $this->db->like('localizacao', $pesquisa);
        $this->db->where('tipo', 'atuação');
        $this->db->where('estado', '1');
        return $this->db->get('eventos')->result();
    }
}
