<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Instrumentos_m extends CI_Model {

    public function do_insert($dados = NULL) {
        if ($dados != NULL):
            $this->db->insert('instrumentos', $dados);
        endif;
    }

}