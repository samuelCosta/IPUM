<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Merchandising_m extends CI_Model {

    public function do_insert($dados = NULL) {
        if ($dados != NULL):
            $this->db->insert('stockmerchandising', $dados);
        endif;
    }
    
    public function get_Merchandising() {

        $this->db->select('*');
        return $this->db->get('stockmerchandising')->result();
    }
    
    public function compararId($id) {

        $this->db->where('idStockMerchandising', $id);
        return $this->db->get('stockmerchandising')->result();
    }
    
    public function guardarAtualizacao($id, $data) {

        $this->db->where('idStockMerchandising', $id);
        return $this->db->update('stockmerchandising', $data);
    }
    
    public function delete($id, $data) {
        
        $this->db->where('idStockMerchandising', $id);
        return $this->db->delete('stockmerchandising', $data);
    }

}
