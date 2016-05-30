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
                        <h3 class="box-title">Instrumentos</h3>
                    </div>
                    <div class="box-body">
                        <table id="instrumentos_dt" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Número</th>
                                    <th>Tamanho</th>
                                    <th>Estado</th>
                                    <th>Localização</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Número</th>
                                    <th>Tamanho</th>
                                    <th>Estado</th>
                                    <th>Localização</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($instrumentos as $instrumento): ?>
                                    <tr>
                                        <td><?php echo $instrumento['tipo_selecao_descricao']; ?></td>
                                        <td><?php echo $instrumento['numero']; ?></td>
                                        <td><?php echo $instrumento['tamanho']; ?></td>
                                        <td class="<?php
                                        if ($instrumento['estado'] < 4) {
                                            echo 'bg-red-active';
                                        }
                                        ?>">
                                                <?php echo $instrumento['estado']; ?>
                                        </td>
                                        <td><?php if ($instrumento['localizacao'] != NULL){ echo $instrumento['localizacao'];} else { echo $instrumento['elemento']; } ?></td>
                                        <td>
                                            <a data-toggle="tooltip" title="Editar" class="btn-lg"  href="<?php echo site_url('instrumento/editar/' . $instrumento['id']); ?>">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a data-toggle="tooltip" title="Eliminar" class="btn-lg" onclick="javascript:deleteConfirm('<?php echo site_url('instrumento/delete_instrumento/' . $instrumento['id']); ?>');" deleteConfirm href="#"/>
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                            <a data-toggle="tooltip" title="Manutenção" class="btn-lg" href="<?php echo site_url('instrumento/manutencao/' . $instrumento['id']); ?>">
                                                <i class="fa fa-wrench"></i>
                                            </a>
                                            <a data-toggle="tooltip" title="Histórico" class="btn-lg" href="<?php echo site_url('instrumento/historico/' . $instrumento['id']); ?>">
                                                <i class="fa fa-info" ></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
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
        $("#instrumentos_dt").DataTable({
            "initComplete": function () {
                this.api().columns().every(function () {
                    var column = this;
                    if (column.index() < 5) {
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
                { targets: 5, orderable: false}
            ]
        });
    });
</script>
<script>
    function deleteConfirm(url)
    {
        if (confirm('Deseja eliminar o resgisto?'))
        {
            window.location.href = url;
        }
    }
</script>