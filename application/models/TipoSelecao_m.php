<?php

class TipoSelecao_m extends CI_Model{

    public function get_tiposelecao($cod_tipo) {
        $query= $this->db->get_where('tipo_selecao', array('cod_tipo' => $cod_tipo));
        return $query->result_array();
    }

}
