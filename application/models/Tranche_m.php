<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tranche_m extends CI_Model {

    public function do_insert($dados = NULL) {
        if ($dados != NULL):
            $this->db->insert('apoios', $dados);
        endif;
    }

    public function get_tranches() {

        $this->db->select('*');
        return $this->db->get('apoios')->result();
    }
    
    
    public function eventosTranche($dados = NULL) {
        if ($dados != NULL):

            $this->db->insert('apoioseventos', $dados);
        endif;
    }
    
    
      public function atividadesTranche($dados = NULL) {
        if ($dados != NULL):

            $this->db->insert('apoiosatividades', $dados);
        endif;
    }
    
    
    // devolve os dados de um determinado Apoio (view-editarTranches)   
    public function compararId($id) {

        $this->db->where('idApoios', $id);
        return $this->db->get('apoios')->result();
    }
    
        // devolve a tranche desse ano    
    public function verificaTranche($ano) {

        $this->db->where('ano', $ano);
        return $this->db->get('apoios')->result();
    
//        if ($query->num_rows() == 0)
//    {
//        return  $query->row(); 
//    }
//    elseif ($query->num_rows() == 1)
//    {
//        return $query->result_array(); //This returns an array of results which you can whatever you need with it
//    }
//    else 
//    {
//         
//    }
//        
    }
    
    public function atividadesNaoApoio($dados,$ano){
      
           $this->db->select('*');
           $this->db->where('year(dataInicio)',$ano);
           foreach ($dados as $id){
           $this->db->where_not_in('idAtividades',$id->atividades_idAtividades);
           }
           return $this->db->get('atividades')->result();
       
    }


    
        //    retorna as actividades de um determinado apoio
      public function atividadesDoApoio($id) {

        $this->db->select('*');
        $this->db->where('apoios_idApoios', $id);
        $this->db->join('atividades', 'atividades_idAtividades = idAtividades', 'inner');
        return $this->db->get('apoiosatividades')->result();
    }
        //   associar a atuacao a tranche
    public function associarAtuacaoTranche($idEventos, $idApoio) {
        $dados = array(
            'eventos_idEventos' => $idEventos,
            'apoios_idApoios' => $idApoio,
        );
        return $this->db->insert('apoioseventos', $dados);
    }
    //    eliminar atuacao da tranche
    public function eliminarAtuacaoTranche($idApoiosEventos) {

        $this->db->where('idapoiosEventos', $idApoiosEventos);
        return $this->db->delete('apoioseventos');
    }
    
//    eliminar atividade da tranche
    public function eliminarAtividadeTranche($idApoiosAtividades) {

        $this->db->where('idapoiosAtividades', $idApoiosAtividades);
        return $this->db->delete('apoiosatividades');
    }

    //   associar a ativiade a tranche
    public function associarAtividadeTranche($idAtividade, $idApoio) {
        $dados = array(
            'atividades_idAtividades' => $idAtividade,
            'apoios_idApoios' => $idApoio,
        );
        return $this->db->insert('apoiosatividades', $dados);
    }

    //    retorna as atuacoes um determinado apoio
      public function atuacoesDoApoio($id){

        $this->db->select('*');
        $this->db->where('apoios_idApoios', $id);
        $this->db->where('tipo','atuacao');
        $this->db->join('eventos', 'eventos_idEventos=idEventos', 'inner');       
        return $this->db->get('apoioseventos')->result();
        
 
    }
    
      public function atuacoesNaoApoio($dados,$ano){
      
           $this->db->select('*');
           $this->db->where('year(dataEvento)',$ano);
           $this->db->where('tipo','atuacao');
           foreach ($dados as $id){
           $this->db->where_not_in('idEventos',$id->eventos_idEventos);
           }
           return $this->db->get('eventos')->result();
       
    }

 
    
    //    retorna os detalhes da atividade
      public function verDetalhesAtividade($id){

        $this->db->where('idAtividades', $id);
        return $this->db->get('atividades')->result();
        
 
    }
    
     //    retorna os detalhes da atuacao
      public function verDetalhesAtuacao($id){

        $this->db->where('idEventos', $id);
        return $this->db->get('eventos')->result();
        
 
    }
    
   // depois de editado a tranche faz update desses dados novos   
    public function guardarAtualizacao($id, $data) {

        $this->db->where('idApoios', $id);
        return $this->db->update('apoios', $data);
    }
    
       public function pesquisar_tranches() {
//like-Esta função permite gerar cláusulas LIKE, úteis para fazer buscas .
        $pesquisa = $this->input->post('pesquisar');

        $this->db->select('*');
        $this->db->like('ano', $pesquisa);     
        return $this->db->get('apoios')->result();
    }
    
    
        public function idTranches() {
        $ano = $this->input->post('ano');
        $this->db->select('idApoios');
        $this->db->where('ano', $ano);     
        return $this->db->get('apoios')->result();
    }
    
    
        public function finalizarAssociar() {
            
            $associado=array(
                'associado'=>1
                
            );
      
        
        $this->db->where('idApoios', $this->input->post('apoios_idApoios')); 
        return $this->db->update('apoios', $associado);
       
    }
}
