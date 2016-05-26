<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ensaios_m extends CI_Model {

    public function do_insert($dados = NULL) {
        if ($dados != NULL):
            $this->db->insert('eventos', $dados);
        endif;
    }

    public function get_ensaios() {

        $this->db->select('*');
        $this->db->where('tipo', 'ensaio');
        $this->db->where('estado', '1');
        return $this->db->get('eventos')->result();
    }

    public function compararId($id) {

        $this->db->where('idEventos', $id);
        return $this->db->get('eventos')->result();
    }

    public function pesquisar_ensaios() {
//like-Esta função permite gerar cláusulas LIKE, úteis para fazer buscas .
        $pesquisa = $this->input->post('pesquisar');

        $this->db->select('*');
        $this->db->like('localizacao', $pesquisa);
        $this->db->where('estado', '1');
        return $this->db->get('eventos')->result();
    }

    //colocar data de Fim no ensaio
    public function encerrarEnsaio($id = null) {
        $data['estado']=0;

        $this->db->where('idEventos', $id);
        return $this->db->update('eventos', $data);
    }
    
    // depois de editado o evento faz update desses dados novos   
    public function guardarAtualizacao($id, $data) {

        $this->db->where('idEventos', $id);
        return $this->db->update('eventos', $data);
    }
    
    
 //vai buscar todos os ensaios onde o seu estado e 0 ou seja eventos finalizado //consultarEnsaios
    public function get_historicoEnsaios() {
        
        $this->db->select('*');
        $this->db->where('tipo', 'ensaio');
        $this->db->where('estado', '0'); 
        return $this->db->get('eventos')->result();
    }
    
 //botao de pesquisa do historico de ensaios onde  
    public function pesquisar_HistoricoEnsaios() {
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
