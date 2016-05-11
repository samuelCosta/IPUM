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
<!--                    <form action="<?= base_url() ?>Atividades/pesquisarHistorico" method="post" >-->
                        <div class="box-header">
                            <h3 class="box-title">Histórico Atividades</h3>
                             <a data-toggle="tooltip" title="Voltar" class="btn-lg" href="<?php echo site_url('Atividades/consultarAtividades'); ?>"><i class="fa  fa-arrow-circle-left"></i></a>

<!--                            <div class="box-tools">
                                <div class="input-group" style="width: 400px;">
                                    <input type="text" name="pesquisar" class="form-control input-sm pull-right" placeholder="Pesquisar por...">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>-->
<!--                   ------------------------------ ----------------------->
                    <div class="box-body table-responsive no-padding">
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                             <thead>
                            <tr>
                                <th>Nome Atividade</th>
                                <th>Localização</th>
                                <th>Data Inicio</th>
                                <th>Duração</th>
                                <th>Participantes</th>
                                <th>Total de Gastos</th>
                                <th>Orçamento</th>
                               

                              

                            </tr>
                            </thead>
                            <tbody>
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

                            </tbody>

                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </section>
</div><!-- /.content-wrapper -->


<script src="<?php echo base_url() . 'assets/plugins/jQuery/jQuery-2.1.4.min.js' ?>"></script>
 <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/plugins/datatables/jquery.datatables.css"/>
<script src="<?php echo base_url() . 'assets/plugins/datatables/jquery.dataTables.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/datatables/dataTables.bootstrap.min.js' ?>"></script>
<script>


    $(document).ready(function () {
        $('#example').DataTable({
            "language": {
                "lengthMenu": "Procurar _MENU_ records per page",
                "zeroRecords": "Não foram encontardos resultados - desculpe",
                "info": "Showing page _PAGE_ of _PAGES_",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtered from _MAX_ total records)"
            }
        });
    });
</script>




