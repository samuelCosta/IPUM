<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
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
