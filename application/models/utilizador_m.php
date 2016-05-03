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

//vai buscar todos os utilizadores ativos
    public function get_utilizadoresAtivos() {

        $this->db->select('*');
        $this->db->where("ativo", 1);
        return $this->db->get('utilizador')->result();
    }
    
    //vai buscar todos os utilizadores inativos
    public function get_utilizadoresInativos() {

        $this->db->select('*');
        $this->db->where("ativo", 0);
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
    public function pesquisar_utlizadoresAtivos() {
//like-Esta função permite gerar cláusulas LIKE, úteis para fazer buscas .
        $pesquisa = $this->input->post('pesquisar');
        $this->db->select('*');
        $this->db->where("ativo", 1);
        $this->db->like('nome', $pesquisa);
        return $this->db->get('utilizador')->result();
    }
    
    //    permite pesquisar consoante o que é digitado
    public function pesquisar_utlizadoresInativos() {
//like-Esta função permite gerar cláusulas LIKE, úteis para fazer buscas .
        $pesquisa = $this->input->post('pesquisar');
        $this->db->select('*');
        $this->db->where("ativo", 0);
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
    
  function searchEventos($dado){
        
     
//         $this->db->like('nome', $dado,'both');
//         return $query = $this->db->get('utilizador')->result();
        $this->db->like('designacao', $dado,'both');
        return $this->db->get('eventos')->result();
        
 
 
    }
  
        
//  vai buscar o id do evento
    public function eventosUtilizadores($designacao){
        
        $this->db->where('designacao', $designacao);
        return $this->db->get('eventos')->result();

    }
    
    
//    retorna os utilizadores que estiveram num determinado evento
      public function utilizadoresPorEvento($id){

        $this->db->select('*');
        $this->db->where('eventos_idEventos', $id);
        $this->db->join('utilizador', 'utilizador_idUtilizador=idUtilizador', 'inner');       
        return $this->db->get('presencasEventos')->result();
        
 
    }
    
          public function eventosPorAno($ano) {

        $this->db->select('*');
        $this->db->where('year(dataEvento)', $ano);
        $this->db->where('tipo', 'atuação');
        return $this->db->get('eventos')->result();
    }
    
    
        public function verDetalhes($id) {

        $this->db->select('*');
        $this->db->where('eventos_idEventos', $id);
        $this->db->join('utilizador', 'utilizador_idUtilizador=idUtilizador', 'inner');       
        return $this->db->get('presencasEventos')->result();
    }

    
    
     function searchUtilizadores($dado){
        
        $this->db->like('nome', $dado,'both');
         $this->db->where('ativo', 1);
        return $this->db->get('utilizador')->result();
         
    }
    
    //  vai buscar o id do utilizador
    public function utilizadorEventos($nome){
        
        $this->db->where('nome', $nome);
        return $this->db->get('utilizador')->result();

    }
    
    //    retorna as atuacoes onde teve determinado utilizador
      public function eventoPorUtilizador($id){

        $this->db->select('*');
        $this->db->where('utilizador_idUtilizador', $id);
        $this->db->where('eventos.tipo', 'atuação');
        $this->db->join('eventos', 'eventos_idEventos=idEventos', 'inner');       
        return $this->db->get('presencasEventos')->result();
        
 
    }
    
    
        //    conta o total de atuacoes
    public function totalAtuacoesElemento($id) {

        $this->db->select('*');
        $this->db->where('utilizador_idUtilizador', $id);
        $this->db->where('eventos.tipo', 'atuação');
        $this->db->join('eventos', 'eventos_idEventos=idEventos', 'inner');
        $query = $this->db->get('presencasEventos');
        return $query->num_rows();
    }

            //    conta o total de ensaios
    public function totalEnsaiosElemento($id) {

        $this->db->select('*');
        $this->db->where('utilizador_idUtilizador', $id);
        $this->db->where('eventos.tipo', 'ensaio');
        $this->db->join('eventos', 'eventos_idEventos=idEventos', 'inner');
        $query = $this->db->get('presencasEventos');
        return $query->num_rows();
    }
    
}
