<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Quotas extends CI_Controller {
    
    public function index(){
             $this->load->model('quotas_m');
        $dados['quotas']=$this->quotas_m->consultarQuotas();
        
        $this->load->view('includes/header_v');
        $this->load->view('consultarQuotas_v',$dados);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
        
    }
    public function pagarQuota($id,$idUtilizador,$dataAviso){
        
    

       $this->load->model('quotas_m');
    
//       insere a data de pagamento 
         //    cria outra linha em sistema de quotas 
       if($this->quotas_m->pagarQuota($id) && $this->quotas_m->criarLinhaQuota($idUtilizador,$dataAviso)){
           
           return redirect('Quotas');
       }
        
        
    
    }
    
    
        public function historicoQuotas(){
      
       $this->load->model('quotas_m');

       $dados['historicoQuotas']=$this->quotas_m->historicoQuotas();
           
        $this->load->view('includes/header_v');
        $this->load->view('historicoQuotas_v',$dados);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
        
       
        
        
    
    }
    
    
        public function pagarQuotaHistorico($id){
     
       $this->load->model('quotas_m');
    
//       insere a data de pagamento 
         //    cria outra linha em sistema de quotas 
       if($this->quotas_m->pagarQuota($id)){
           
           return redirect('Quotas/historicoQuotas');
       }
        
        
    
    }
    
}