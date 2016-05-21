<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Atividades extends CI_Controller {

    public function index() {

        $this->load->view('includes/header_v');
        $this->load->view('registarAtividades_v');
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }

    public function registarAtividades() {
        //strtolower-colocar tudo em minusculo
        //ucwords-colocar iniciais em maiusculo

        $this->form_validation->set_rules('nomeAtividade', 'Nome da Atividade', 'required|ucwords');
        $this->form_validation->set_rules('localizacao', 'Localização', 'required|ucwords');
        $this->form_validation->set_rules('dataInicio', 'Data de Inicio', 'required');
        $this->form_validation->set_rules('duracao', 'Duração', 'required');
        $this->form_validation->set_rules('orcamento', 'Orçamento', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/header_v');
            $this->load->view('registarAtividades_v');
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        } else {
            //insere os dados na base de dados
            $dados = elements(array('estado', 'nomeAtividade', 'localizacao', 'dataInicio', 'duracao', 'orcamento'), $this->input->post());

            $this->load->model('Atividades_m');
            $this->Atividades_m->do_insert($dados);
            $dados['atividades'] = $this->Atividades_m->get_atividades();

            $data['msg'] = "Sucesso.";
            $this->load->view('includes/header_v');
            $this->load->view('includes/msgSucesso_v', $data);
            $this->load->view('consultarAtividades_v',$dados);
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        }
    }

    public function consultarAtividades() {
        $this->load->model('Atividades_m');
        $dados['atividades'] = $this->Atividades_m->get_atividades();

        $this->load->view('includes/header_v');
        $this->load->view('consultarAtividades_v', $dados);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }

// para o botao pesquisar
    public function pesquisar() {

        $this->load->model('Atividades_m');
        $dados['atividades'] = $this->Atividades_m->pesquisar_atividades();

        $this->load->view('includes/header_v');
        $this->load->view('consultarAtividades_v', $dados);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }

    public function atualizar($id = null) {

        $this->load->model('Atividades_m');
        $data['atividades'] = $this->Atividades_m->compararId($id);

        $this->load->view('includes/header_v');
        $this->load->view('editarAtividades_v', $data);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }

    //guarda os dados editados das atividades e encerra a atividade dependendo do botao onde carrega
    public function guardarAtualizacao() {
        //strtolower-colocar tudo em minusculo
        //ucwords-colocar iniciais em maiusculo
        if ($this->input->post('bt1') == 'upload') {
            $this->form_validation->set_rules('nomeAtividade', 'Nome da Atividade', 'required|ucwords');
            $this->form_validation->set_rules('localizacao', 'Localização', 'required|ucwords');
            $this->form_validation->set_rules('participantes', 'Total de Participantes', 'required');
            $this->form_validation->set_rules('totalGastos', 'Total de Gastos', 'required');
            $this->form_validation->set_rules('notas', 'Notas', 'required|ucwords');
            $this->form_validation->set_rules('dataInicio', 'Data de Inicio', 'required');
            $this->form_validation->set_rules('duracao', 'Duração', 'required');
            $this->form_validation->set_rules('orcamento', 'Orçamento', 'required');

            $id = $this->input->post('idAtividades');


            if ($this->form_validation->run() == FALSE) {

                $this->load->model('Atividades_m');
                $data['atividades'] = $this->Atividades_m->compararId($id);

                $this->load->view('includes/header_v');
                $this->load->view('editarAtividades_v', $data);
                $this->load->view('includes/menu_v');
                $this->load->view('includes/footer_v');
            } else {
                //insere os dados na base de dados
                $dados = elements(array('nomeAtividade', 'localizacao', 'participantes', 'totalGastos', 'notas', 'dataInicio', 'duracao', 'orcamento'), $this->input->post());


                $this->load->model('Atividades_m');
                $this->Atividades_m->guardarAtualizacao($id, $dados);

                $data['msg'] = "Alterado com Sucesso.";
                $this->load->view('includes/header_v');
                $this->load->view('includes/msgSucesso_v', $data);
                $this->load->view('consultarAtividades_v');
                $this->load->view('includes/menu_v');
                $this->load->view('includes/footer_v');
            }
        } else {


            $this->form_validation->set_rules('nomeAtividade', 'Nome da Atividade', 'required|ucwords');
            $this->form_validation->set_rules('localizacao', 'Localização', 'required|ucwords');
            $this->form_validation->set_rules('participantes', 'Total de Participantes', 'required');
            $this->form_validation->set_rules('totalGastos', 'Total de Gastos', 'required');
            $this->form_validation->set_rules('notas', 'Notas', 'required|ucwords');
            $this->form_validation->set_rules('dataInicio', 'Data de Inicio', 'required');
            $this->form_validation->set_rules('duracao', 'Duração', 'required');
            $this->form_validation->set_rules('orcamento', 'Orçamento', 'required');

            $id = $this->input->post('idAtividades');


            if ($this->form_validation->run() == FALSE) {

                $this->load->model('Atividades_m');
                $data['atividades'] = $this->Atividades_m->compararId($id);

                $this->load->view('includes/header_v');
                $this->load->view('editarAtividades_v', $data);
                $this->load->view('includes/menu_v');
                $this->load->view('includes/footer_v');
            } else {
                $dados = elements(array('nomeAtividade', 'localizacao', 'participantes', 'totalGastos', 'notas', 'dataInicio', 'duracao', 'orcamento'), $this->input->post());


                $this->load->model('Atividades_m');
                $this->Atividades_m->guardarAtualizacao($id, $dados);
                $this->load->model('Atividades_m');
                $this->Atividades_m->encerrarAtividade($id);
                redirect('Atividades/consultarAtividades');
            }
        }
    }

    //    devolve a lista de todos os Eventos que ja foram finalizados
    public function historicoAtividades() {
        $this->load->model('Atividades_m');
        $dados['atividades'] = $this->Atividades_m->get_historicoAtividades();

        $this->load->view('includes/header_v');
        $this->load->view('historicoAtividades_v', $dados);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }

    //  botão pesquisar-  pesquisar historico dos orgaos socias onde seu estado e 0 
    public function pesquisarHistorico() {

        $this->load->model('Atividades_m');
        $dados['atividades'] = $this->Atividades_m->pesquisar_HistoricoAtividades();

        $this->load->view('includes/header_v');
        $this->load->view('historicoAtividades_v', $dados);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }

}
