<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Utilizador_m extends CI_Model {

    public function do_insert($dados = NULL) {

        if ($dados != NULL):
            $this->db->insert('utilizador', $dados);
        endif;
    }

//    para fazer login
    public function buscaPorEmailSenha($email, $password) {

        $this->db->where("email", $email);
        $this->db->where("password", $password);
        return $this->db->get('utilizador')->result();
        
    }

//vai buscar todos os utilizadores
    public function get_utilizadores() {

        $this->db->select('*');
        return $this->db->get('utilizador')->result();
    }

// devolve os dados de um determinado utilizador (view-editarUtilizador)   
    public function compararId($id) {

        $this->db->where('idUtilizador', $id);
        return $this->db->get('utilizador')->result();
    }

// depois de editado o utilizador faz update desses dados novos   
    public function guardarAtualizacao($id, $data) {

        $this->db->where('idUtilizador', $id);
        return $this->db->update('utilizador', $data);
    }

//    permite pesquisar consoante o que é digitado
    public function pesquisar_utlizadores() {
//like-Esta função permite gerar cláusulas LIKE, úteis para fazer buscas .
        $pesquisa = $this->input->post('pesquisar');

        $this->db->select('*');
        $this->db->like('nome', $pesquisa);
        return $this->db->get('utilizador')->result();
    }

//verifica se a password digitada e igual a antiga se for guarda na base de dados
    public function salvar_senha() {

        $id = $this->input->post('idUtilizador');

        $senha_antiga = md5($this->input->post('senha_antiga'));
        $senha_nova = md5($this->input->post('senha_nova'));

        $this->db->select('password');
        $this->db->where('idUtilizador', $id);
        $data['password'] = $this->db->get('utilizador')->result();
        $dados['password'] = $senha_nova;

        if ($data['password'] [0]->password == $senha_antiga) {
            $this->db->where('idUtilizador', $id);
            $this->db->update('utilizador', $dados);
            return true;
        } else {
            return FALSE;
        }
    }
    
    public function alterarDataSocio(){
       $id = $this->input->post('idUtilizador');
       $socio['socio'] = $this->input->post('socio');
       $socio['dataSocio'] = $this->input->post('dataSocio');
        
       
       $this->db->where('idUtilizador', $id);
       return $this->db->update('utilizador', $socio);
        
       
    }
    

}
