<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Utilizador extends CI_Controller {

    public function index() {

        $this->load->view('includes/header_v');
        $this->load->view('criarUtilizador_v', array('error' => ' '));
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }

    public function registarUtilizador() {
        //strtolower-colocar tudo em minusculo
        //ucwords-colocar iniciais em maiusculo

        $this->form_validation->set_rules('nome', 'Nome', 'required|ucwords');
        $this->form_validation->set_rules('alcunha', 'Alcunha', 'required|alpha');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|strtolower|valid_email|is_unique[utilizador.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|strtolower');
        $this->form_validation->set_message('matches', 'O campo %s esta diferente do campo %s');
        $this->form_validation->set_rules('password2', 'Repita Password', 'required|strtolower|matches[password]');
        $this->form_validation->set_rules('nif', 'NIF', 'required|numeric|exact_length[9]');
        $this->form_validation->set_rules('bi', 'BI', 'required|numeric|exact_length[8]');
        $this->form_validation->set_rules('dataNascimento', 'Data Nascimento', 'required');
        $this->form_validation->set_rules('cargo', 'Cargo', 'required');
        $this->form_validation->set_rules('foto', 'Imagem', 'callback_validar_foto');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/header_v');
            $this->load->view('criarUtilizador_v');
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        } else {
            //insere os dados na base de dados
            $dados = elements(array('nome', 'alcunha', 'email', 'password', 'nif', 'bi', 'dataNascimento', 'cargo', 'foto'), $this->input->post());
            $dados['password'] = md5($dados['password']);
            $this->load->model('utilizador_m');
            $this->utilizador_m->do_insert($dados);

            $data['msg'] = "Sucesso.";
            $this->load->view('includes/header_v');
            $this->load->view('includes/msgSucesso_v', $data);
            $this->load->view('utilizador_v');
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        }
    }

    
    public function validar_foto() {
        //FOTO
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';

        $this->load->library('upload', $config);
        
        //isset-Determinar se uma variável está definido e não é NULL
        //empty — Informa se a variável é vazia
        if (isset($_FILES['foto']) && !empty($_FILES['foto']['name'])) {
            if ($this->upload->do_upload('foto')) {
                // coloca o nome do ficheiro na variavel
                $upload_data = $this->upload->data();
                $_POST['foto'] = $upload_data['file_name'];
                return true;
            } else {
                // mostrar os erros 
                $this->form_validation->set_message('validar_foto', $this->upload->display_errors());
                return false;
            }
        } else {
            // lançar um erro porque nada foi carregado
            $this->form_validation->set_message('validar_foto', "Insira uma imagem!");
            return false;
        }
    }

}
