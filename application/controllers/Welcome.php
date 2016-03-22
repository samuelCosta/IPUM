<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{   
            
            $this->load->view('bemVindo_v');
            $this->load->view('includes/footer_v');
    
	}
        
        public function login(){
//                $this->load->view('includes/header_v');
//                $this->load->view('utilizador_v');
                 $this->load->view('login_v');
//                $this->load->view('includes/menu_v');
//                $this->load->view('includes/footer_v');
            
        }
        
        public function verificaLogin() {

       $this->load->model("utilizador_m");// chama o modelo usuarios_model
        $email = $this->input->post("email");// pega via post o email que venho do formulario
        $password = md5($this->input->post("password")); // pega via post a senha que venho do formulario
        $usuario = $this->utilizador_m->buscaPorEmailSenha($email,$password); // acessa a função buscaPorEmailSenha do modelo
 
        if($usuario){
            $this->session->set_userdata("usuario_logado", $usuario);
            $dados = array("mensagem" => "Logado com sucesso!");
        }else{
            $dados = array("mensagem" => "Não foi possível fazer o Login!");
               
        }
 
        $this->load->view("utilizador_v", $dados);
    }


    public function criarUtilizador(){
            
                $this->load->view('includes/header_v');
                $this->load->view('criarUtilizador_v');
                $this->load->view('includes/menu_v');
                $this->load->view('includes/footer_v');
            
        }
}
