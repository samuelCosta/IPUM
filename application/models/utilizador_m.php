<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Utilizador_m extends CI_Model {

    public function do_insert($dados = NULL) {
        if ($dados != NULL):
            $this->db->insert('utilizador', $dados);
        endif;
    }

   public function buscaPorEmailSenha($email,$password){
        $this->db->where("email", $email);
        $this->db->where("password", $password);
        $usuario = $this->db->get('utilizador')->row_array();
        return $usuario;
    }

}