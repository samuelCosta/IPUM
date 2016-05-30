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

                    <div class="box-header">
                        <h3 class="box-title">Lista de Ensaios</h3>
                        <a  data-toggle="tooltip" title="Ver Histórico" href="<?= base_url('Ensaios/historicoEnsaios/') ?>" class="btn-lg pull-right" ><i class="fa fa-info pull-right" ></i> </a>

                        <div class="box-body ">
                            <table id="consultarEnsaios" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                                <thead>
                                    <tr>
                                        <th>Data</th>
                                        <th>Localização</th>
                                        <th>Presenças</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Data</th>
                                        <th>Localização</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach ($Ensaios as $ens) { ?>
                                        <tr>
                                            <td><?= $ens->dataEvento; ?></td>
                                            <td><?= $ens->localizacao; ?></td>

                                            <?php if ($ens->totalpresencas <= 0 || $ens->totalpresencas == NULL) { ?>
                                                <td><a data-toggle="tooltip" title="Marcar Presenças" class="btn-lg" href="<?= base_url('Ensaios/consultarUtilizadores/' . $ens->idEventos) ?>"><i class="fa fa-tasks"></i></a> </td>
                                            <?php } else { ?>
                                                <td><?= $ens->totalpresencas; ?></a>
                                                <?php } ?>
                                            <td><a data-toggle="tooltip" title="Editar" class="btn-lg" href="<?= base_url('Ensaios/atualizar/' . $ens->idEventos) ?>"><i class="fa fa-edit"></i></a> 
                                                <a data-toggle="tooltip" title="Encerrar"class="btn-lg" href="<?= base_url('Ensaios/encerrarEnsaio/' . $ens->idEventos) ?>"  onclick="return confirm('Deseja realmente finalizar o Ensaio?');"> <i class="fa fa-power-off"></i></a> 
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
                                                    $("#consultarEnsaios").DataTable({
                                                        "initComplete": function () {
                                                            this.api().columns().every(function () {
                                                                var column = this;
                                                                if (column.index() < 2) {
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
                                                            "info": "_START_ - _END_ de _TOTAL_ registos"
                                                        },
                                                        "columnDefs": [
                                                            {targets: 3, orderable: false}
                                                        ]
                                                    });
                                                });
</script>



