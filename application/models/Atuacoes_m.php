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
    
           public function get_atuacoesAno($ano) {

        $this->db->select('*');
        $this->db->where('tipo', 'atuação');
        $this->db->where('estado', '1');
        $this->db->where('year(dataEvento)', $ano);
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
    
    
//        public function pesquisar_atuacoes() {
////like-Esta função permite gerar cláusulas LIKE, úteis para fazer buscas .
//        $pesquisa = $this->input->post('pesquisar');
//
//        $this->db->select('*');
//        $this->db->like('localizacao', $pesquisa);
//        $this->db->where('tipo', 'atuação');
//        $this->db->where('estado', '1');
//        return $this->db->get('eventos')->result();
//    }
//    
    //vai buscar todas as atuacoes onde o seu estado e 0 ou seja eventos finalizado //consultarAtuacoes
    public function get_historicoAtuacoes() {
        
        $this->db->select('*');
        $this->db->where('tipo', 'atuação');
        $this->db->where('estado', '0'); 
        return $this->db->get('eventos')->result();
    }
    
    //botao de pesquisa do historico de atuacoes onde  
    public function pesquisar_HistoricoAtuacoes() {
//like-Esta função permite gerar cláusulas LIKE, úteis para fazer buscas .
        $pesquisa = $this->input->post('pesquisar');

        $this->db->select('*'); 
        
        $this->db->like('localizacao', $pesquisa); 
         $this->db->where('estado', '0');  
        return $this->db->get('eventos')->result();
    }
    
    
     public function marcarPresencas($dados=NULL){
if ($dados != NULL):
        
         $this->db->insert('presencaseventos', $dados);
         endif;
        
    }
    //total de presencas por evento
    public function totalPresencas($total,$dado){
        $to['totalpresencas']=$total;
        $id['idEventos']= $dado['eventos_idEventos'];
    
         $this->db->where('idEventos', $id['idEventos']);
        return $this->db->update('eventos', $to);
    
        
    }
}
