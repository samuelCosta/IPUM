<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            IPUM
            <small>Universidade do minho</small>
        </h1>

    </section>

    <!-- listar utilizador-->

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
  <!--   ---------------  botão para pesquisar-->
                    <form action="<?= base_url() ?>Atividades/pesquisarHistorico" method="post" >
                        <div class="box-header">
                            <h3 class="box-title">Histórico Atividades</h3>

                            <div class="box-tools">
                                <div class="input-group" style="width: 400px;">
                                    <input type="text" name="pesquisar" class="form-control input-sm pull-right" placeholder="Pesquisar por...">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
<!--                   ------------------------------ ----------------------->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>Nome Atividade</th>
                                <th>Localização</th>
                                <th>Data Inicio</th>
                                <th>Duração</th>
                                <th>Participantes</th>
                                <th>Total de Gastos</th>
                                <th>Orçamento</th>
                               

                              

                            </tr>
                            <?php foreach ($atividades as $atu) { ?>
                                <tr>
                                    <td><?= $atu->nomeAtividade; ?></td>
                                    <td><?= $atu->localizacao; ?></td>
                                    <td><?= $atu->dataInicio; ?></td>
                                    <td><?= $atu->duracao; ?></td>
                                    <td><?= $atu->participantes; ?></td>
                                    <td><?= $atu->totalGastos; ?></td>
                                    <td><?= $atu->orcamento; ?></td>
                                             
                                     
                                </tr>
                            <?php } ?>



                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </section>
</div><!-- /.content-wrapper -->







