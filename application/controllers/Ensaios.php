<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ensaios extends CI_Controller {

    public function index() {

        $this->load->view('includes/header_v');
        $this->load->view('registarEnsaios_v');
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }

    public function registarEnsaios() {
        //strtolower-colocar tudo em minusculo
        //ucwords-colocar iniciais em maiusculo

        $this->form_validation->set_rules('dataEvento', 'Data', 'required');
        $this->form_validation->set_rules('localizacao', 'Localização', 'required|ucwords');



        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/header_v');
            $this->load->view('registarEnsaios_v');
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        } else {
            //insere os dados na base de dados
            $dados = elements(array('tipo', 'dataEvento', 'localizacao', 'estado'), $this->input->post());

            $this->load->model('Ensaios_m');
            $this->Ensaios_m->do_insert($dados);


            redirect('ensaios/consultarEnsaios/' . '/4', 'refresh');
        }
    }

    public function consultarEnsaios($indice = null) {
        $this->load->model('Ensaios_m');
        $dados['Ensaios'] = $this->Ensaios_m->get_ensaios();

        $this->load->view('includes/header_v');
        if ($indice == 1) {
            $data['msg'] = "Para poder Encerrar tem de marcar as Presenças.";
            $this->load->view('includes/msgError_v', $data);
        } else if ($indice == 2) {
            $data['msg'] = "Ensaio encerrado";
            $this->load->view('includes/msgSucesso_v', $data);
        } else if ($indice == 3) {
            $data['msg'] = "Alterado com Sucesso.";
            $this->load->view('includes/msgSucesso_v', $data);
        } else if ($indice == 4) {
            $data['msg'] = "Novo Ensaio Registado.";
            $this->load->view('includes/msgSucesso_v', $data);
        }else if ($indice == 5) {
            $data['msg'] = "Presenças Marcadas.";
            $this->load->view('includes/msgSucesso_v', $data);
        }
        $this->load->view('consultarEnsaios_v', $dados);
        $this->load->view('includes/menu_v');
//        $this->load->view('includes/footer_v');
    }

    // boatao pesquisar (pesquisa por ensaio onde o seu estado e 1)
    public function pesquisar() {

        $this->load->model('Ensaios_m');
        $dados['Ensaios'] = $this->Ensaios_m->pesquisar_ensaios();

        $this->load->view('includes/header_v');
        $this->load->view('consultarEnsaios_v', $dados);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }

    //    vai permitar devolver os dados de um determinado ensaio
    public function atualizar($id = null) {

        $this->load->model('Ensaios_m');
        $data['Ensaios'] = $this->Ensaios_m->compararId($id);


        $this->load->view('includes/header_v');
        $this->load->view('editarEnsaios_v', $data);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }

    public function encerrarEnsaio($id) {
        $this->load->model('Ensaios_m');
//          para saber se ja estao marcadas as presenças  
        $data = $this->Ensaios_m->compararId($id);

        if ($data[0]->totalpresencas == NUll || $data[0]->totalpresencas == 0) {

            redirect('ensaios/consultarEnsaios/' . '/1');
        } else {
//            encerra o ensaio      
            $this->Ensaios_m->encerrarEnsaio($id);
            redirect('ensaios/consultarEnsaios/' . '/2');
        }
    }

    //guarda os dados editados do ensaio
    public function guardarAtualizacao() {
        //strtolower-colocar tudo em minusculo
        //ucwords-colocar iniciais em maiusculo

        $this->form_validation->set_rules('dataEvento', 'Data', 'required');
        $this->form_validation->set_rules('localizacao', 'Localização', 'required|ucwords');

        $id = $this->input->post('idEventos');


        if ($this->form_validation->run() == FALSE) {

            $this->load->model('Ensaios_m');
            $data['Ensaios'] = $this->Ensaios_m->compararId($id);

            $this->load->view('includes/header_v');
            $this->load->view('editarEnsaios_v', $data);
            $this->load->view('includes/menu_v');
            $this->load->view('includes/footer_v');
        } else {
            //insere os dados na base de dados
            $dados = elements(array('dataEvento', 'localizacao'), $this->input->post());


            $this->load->model('Ensaios_m');
            $this->Ensaios_m->guardarAtualizacao($id, $dados);

            redirect('ensaios/consultarEnsaios/' . '/3', 'refresh');
        }
    }

    //    devolve a lista de todos os Eventos que ja foram finalizados
    public function historicoEnsaios() {
        $this->load->model('Ensaios_m');
        $dados['ensaios'] = $this->Ensaios_m->get_historicoEnsaios();

        $this->load->view('includes/header_v');
        $this->load->view('historicoEnsaios_v', $dados);
        $this->load->view('includes/menu_v');
//        $this->load->view('includes/footer_v');
    }

    //  botão pesquisar-  pesquisar historico dos orgaos socias onde seu estado e 0 
//       public function pesquisarHistorico() {
//
//        $this->load->model('Ensaios_m');
//        $dados['ensaios'] = $this->Ensaios_m->pesquisar_HistoricoEnsaios();
//
//        $this->load->view('includes/header_v');
//        $this->load->view('historicoEnsaios_v', $dados);
//        $this->load->view('includes/menu_v');
//        $this->load->view('includes/footer_v');
//    }
    //    devolve a lista de todos os utilizadores
    public function consultarUtilizadores($id = null) {
        $dados['idEventos'] = $id;
        $this->load->model('utilizador_m');
        $dados['utilizadores'] = $this->utilizador_m->get_utilizadoresAtivos();

        $this->load->view('includes/header_v');
        $this->load->view('presencaEnsaios_v', $dados);
        $this->load->view('includes/menu_v');
        $this->load->view('includes/footer_v');
    }

    public function marcarPresencas() {
        $total = 0;
        $dado['eventos_idEventos'] = $this->input->post('eventos_idEventos');

        if (!empty($_POST['check'])) {
            foreach ($_POST['check'] as $check) {

                $total = $total + 1;
                $dado['utilizador_idUtilizador'] = $check;
                $this->load->model('Ensaios_m');
                $this->Ensaios_m->marcarPresencas($dado);
            }
//              echo $total;
            $this->load->model('Ensaios_m');
            $this->Ensaios_m->totalPresencas($total, $dado);
        }
        redirect('ensaios/consultarEnsaios/' . '/5');
    }

}
