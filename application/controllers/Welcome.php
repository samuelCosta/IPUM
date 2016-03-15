<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{   
            
            $this->load->view('bemVindo_v');
            $this->load->view('includes/footer_v');
    
	}
        
        public function login(){
                $this->load->view('includes/header_v');
                $this->load->view('utilizador_v');
                $this->load->view('includes/menu_v');
                $this->load->view('includes/footer_v');
            
        }
        
        
        public function criarUtilizador(){
            
                $this->load->view('includes/header_v');
                $this->load->view('criarUtilizador_v');
                $this->load->view('includes/menu_v');
                $this->load->view('includes/footer_v');
            
        }
}
