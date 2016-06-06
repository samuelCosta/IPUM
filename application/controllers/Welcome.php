<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index() {
         $this->load->view('login_v');
    }


    public function verificaLogin() {

        $this->load->model("utilizador_m"); // chama o modelo usuarios_model

        $email = $this->input->post("email"); // pega via post o email que vem do formulario
        $password = md5($this->input->post("password")); // pega via post a senha que vem do formulario
        $usuario['utilizador'] = $this->utilizador_m->buscaPorEmailSenha($email, $password); // acessa a função buscaPorEmailSenha do modelo

        if (count($usuario['utilizador'])==1) {
            $dados['nome']= $usuario['utilizador'][0]->nome;
            $dados['id']=$usuario['utilizador'][0]->idUtilizador;
            $dados['email']=$usuario['utilizador'][0]->email;
            $dados['foto']=$usuario['utilizador'][0]->foto;
            $dados['conectado']=true;
                        
            $this->session->set_userdata($dados);
                        
            redirect('utilizador','refresh');
        } else {
    
            $this->load->view('login_v');
        }
        
    }
    
    
}
