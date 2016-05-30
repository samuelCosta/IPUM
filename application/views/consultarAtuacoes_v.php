
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
                  <!--                    <form action="<?= base_url() ?>Atuacoes/pesquisar" method="post" >-->
                    <div class="box-header">
                        <h3 class="box-title">Lista de Atuações</h3>
                        <a  data-toggle="tooltip" title="Ver Histórico" href="<?= base_url('Atuacoes/historicoAtuacoes/') ?>" class="btn-lg pull-right" ><i class="fa fa-info pull-right" ></i> </a>


                        <div class="box-body ">
                            <table id="consultarAtucoes" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Data</th>
                                        <th>Localização</th>
                                        <th>Pessoa Responsavel</th>
                                        <th>Contacto</th>
                                        <th>Orçamento</th>
                                        <th>Presenças</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Data</th>
                                        <th>Localização</th>
                                        <th>Pessoa Responsavel</th>
                                        <th>Contacto</th>
                                        <th>Orçamento</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach ($atuacoes as $atu) { ?>
                                        <tr>
                                            <td><?= $atu->designacao; ?></td>
                                            <td><?= $atu->dataEvento; ?></td>
                                            <td><?= $atu->localizacao; ?></td>
                                            <td><?= $atu->responsavel; ?></td>
                                            <td><?= $atu->contacto; ?></td>
                                            <td><?= $atu->orcamento . '€'; ?></td>

                                            <?php if ($atu->totalpresencas <= 0 || $atu->totalpresencas == NULL) { ?>
                                                <td><a data-toggle="tooltip" title="Marcar Presenças" class="btn-lg" href="<?= base_url('Atuacoes/consultarUtilizadores/' . $atu->idEventos) ?>"><i class="fa fa-tasks"></i></a> </td>
                                            <?php } else { ?>
                                                <td><?= $atu->totalpresencas ?></a>
                                                <?php } ?>
                                            <td><a  data-toggle="tooltip" title="Editar" class="btn-lg" href="<?= base_url('Atuacoes/atualizar/' . $atu->idEventos) ?>"><i class="fa fa-edit"></i></a> </td>
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

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.0
    </div>
    <strong>INOV Webdesign &copy; 2015-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
</footer>

<script src="<?php echo base_url() . 'assets/plugins/jQuery/jQuery-2.1.4.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/bootstrap/js/bootstrap.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/datatables/jquery.dataTables.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/datatables/dataTables.bootstrap.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/slimScroll/jquery.slimscroll.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/fastclick/fastclick.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/dist/js/app.min.js' ?>"></script>
<script>
    $(function () {
        $("#consultarAtucoes").DataTable({
            "initComplete": function () {
                this.api().columns().every(function () {
                    var column = this;
                    if (column.index() < 6) {
                        var select = $('<select><option value=""></option></select>')
                                .appendTo($(column.footer()).empty())
                                .on('change', function () {
                                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                    column.search(val ? '^' + val + '$' : '', true, false).draw();
                                });

                        column.data().unique().sort().each(function (d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>')
                        });
                    }
                });
            },
            "language": {
            "lengthMenu": "Ver _MENU_ registos",
                "info": "_START_ - _END_ de _TOTAL_ registos",
                "infoEmpty": "0 - 0 de 0 registos",
                "infoFiltered": "(selecionado de _MAX_ registos totais)",
                "search": "Pesquisar:",
                "zeroRecords": "Não existem registos correspondentes",
                "emptyTable": "Não existem registos disponíveis",
                "paginate":{
                "previous": "Anterior",
                "next": "Seguinte"
                }
                },
            "columnDefs": [
                {targets: 7, orderable: false}
            ]
        });
    });
</script>



