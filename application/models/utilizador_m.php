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
    
    // devolve os dados de um determinado utilizador (view-editarUtilizador)   
    public function compararIdDetalhes($id) {

        $this->db->where('idUtilizador', $id);
        $query=$this->db->get('utilizador');
        return $query->row_array();
    }

// ativa o utilizador  
    public function ativarUtilizador($id,$ativo) {
       
        $this->db->where('idUtilizador', $id);       
        return $this->db->update('utilizador', $ativo);        
     
    }
    
    // depois de editado o utilizador faz update desses dados novos   
    public function guardarAtualizacao($id, $data) {

        $this->db->where('idUtilizador', $id);
        return $this->db->update('utilizador', $data);
    }

////    permite pesquisar consoante o que é digitado 
//    public function pesquisar_utlizadoresAtivos() {
////like-Esta função permite gerar cláusulas LIKE, úteis para fazer buscas .
//        $pesquisa = $this->input->post('pesquisar');
//        $this->db->select('*');
//        $this->db->where("ativo", 1);
//        $this->db->like('nome', $pesquisa);
//        return $this->db->get('utilizador')->result();
//    }
    
//    //    permite pesquisar consoante o que é digitado
//    public function pesquisar_utlizadoresInativos() {
////like-Esta função permite gerar cláusulas LIKE, úteis para fazer buscas .
//        $pesquisa = $this->input->post('pesquisar');
//        $this->db->select('*');
//        $this->db->where("ativo", 0);
//        $this->db->like('nome', $pesquisa);
//        return $this->db->get('utilizador')->result();
//    }

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
    
    public function dataPagamento($id){
                
        $this->db->select('dataSocio');
        
        $this->db->where('idUtilizador', $id);
        $this->db->query('DATEADD(year,1,@dataSocio)');
        $query=$this->db->get('utilizador');
     
        return $query->row_array();
    
        
    }
    
      
//    verifica se representa algum orgao social 
    public function imprimirOrgaoSocial($id){
                 
        $this->db->where('utilizador_idUtilizador', $id);
        $query=$this->db->get('orgaossociais');     
        return $query->result_array();
    
        
    }
    
    public function get_traje_id($id) {
        $this->db->select('t.*, ts_p.descricao as ts_tipo, ts_g.descricao as ts_genero, ts_t.descricao as ts_tamanho');
        $this->db->from('traje t');
        $this->db->where('t.elemento', $id);
        $this->db->join('stock_traje st', 't.st_id=st.id', 'left');
        $this->db->join('tipo_selecao ts_p', 'st.ts_tipo_id=ts_p.id', 'left');
        $this->db->join('tipo_selecao ts_g', 'st.ts_genero_id=ts_g.id', 'left');
        $this->db->join('tipo_selecao ts_t', 'st.ts_tamanho_id=ts_t.id', 'left');
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_instrumento_id($id) {
        $this->db->select('i.*, ts.descricao as instrumento');
        $this->db->from('instrumento i');
        $this->db->where('i.elemento', $id);
        $this->db->join('tipo_selecao ts', 'i.tipo_selecao_id=ts.id', 'left');
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_manutencoes($id) {
        $this->db->select('im.*, i.numero as numero, ts_i.descricao as instrumento, ts.descricao as material');
        $this->db->from('instrumento_manutencao im');
        $this->db->where('im.elemento', $id);
        $this->db->join('instrumento i', 'im.instrumento_id=i.id', 'left');
        $this->db->join('stock_produto sp', 'im.sp_material_id=sp.id', 'left');
        $this->db->join('tipo_selecao ts', 'sp.ts_tipo_material_id=ts.id', 'left');
        $this->db->join('tipo_selecao ts_i', 'i.tipo_selecao_id=ts_i.id', 'left');

        $query = $this->db->get();
        return $query->result_array();
    }
    
    
        //   estatistica na pagina Inicial 
    public function totalAtuacoes($data) {

        $this->db->select('*');
        $this->db->where('tipo', 'atuação'); 
        $this->db->where('year(dataEvento)',$data); 
        $query = $this->db->get('Eventos');
        return $query->num_rows();
    }
    
           //   estatisticas na pagina Inicial 
    public function totalAtividades($data) {

        $this->db->select('*');   
        $this->db->where('year(dataInicio)',$data); 
        $query = $this->db->get('Atividades');
        return $query->num_rows();
    }
    
               //   estatisticas na pagina Inicial 
    public function totalEnsaios($data) {

        $this->db->select('*');   
        $this->db->where('tipo', 'ensaio');
         $this->db->where('year(dataEvento)',$data); 
        $query = $this->db->get('Eventos');
        return $query->num_rows();
    }
    
                   //   estatisticas na pagina Inicial 
    public function totalAtivos() {

        $this->db->select('*');   
        $this->db->where('ativo', 1);
        $query = $this->db->get('Utilizador');
        return $query->num_rows();
    }
    
    public function proximaAtuacao(){
    $today = date('Y-m-d');  
    $query = $this->db->query(
        "SELECT * FROM eventos WHERE tipo = 'atuacao' AND dataEvento >= '{$today}'");
    return $query->row_array();
    
            
    }
        public function proximaAtividade(){
    $today = date('Y-m-d');  
    $query = $this->db->query(
        "SELECT * FROM atividades WHERE dataInicio >= '{$today}'");
    return $query->row_array();
    
            
    }
        public function proximoEnsaio(){
    $today = date('Y-m-d');  
    $query = $this->db->query(
        "SELECT * FROM eventos WHERE tipo = 'ensaio' AND dataEvento >= '{$today}'");
    return $query->row_array();
    
            
    }
    
            public function todosUtilizadores (){
    
     $this->db->select('*'); 
     $query=$this->db->get('utilizador');     
     return $query->result();
     
            
    }
    
    public function totalAtuacaoPorAnoUtilizador($id,$ano) {
        $this->db->select('*');
        $this->db->where('utilizador_idUtilizador', $id);        
        $this->db->where('eventos.tipo', 'atuação');
        $this->db->where('year(dataEvento)', $ano);
        $this->db->join('eventos', 'eventos_idEventos=idEventos', 'inner');
        $query = $this->db->get('presencasEventos');
        return $query->num_rows();
    }
    
        public function totalEnsaioPorAnoUtilizador($id,$ano) {
        $this->db->select('*');
        $this->db->where('utilizador_idUtilizador', $id);        
        $this->db->where('eventos.tipo', 'ensaio');
        $this->db->where('year(dataEvento)', $ano);
        $this->db->join('eventos', 'eventos_idEventos=idEventos', 'inner');
        $query = $this->db->get('presencasEventos');
        return $query->num_rows();
    }
    
    public function guardarPassword(){
        
        
        $dados['password'] = md5( $this->input->post('password'));
        $id = $this->input->post('idUtilizador');
        
        $this->db->where('idUtilizador', $id);
        $this->db->update('utilizador', $dados);
        
    }
    
    
}
