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
                        <h3 class="box-title">Histórico</h3>
                        <a data-toggle="tooltip" title="Retroceder" class="btn-lg" href="<?php echo site_url('material'); ?>">
                            <i class="fa fa-arrow-left"></i>
                        </a>
                    </div>
                    <div class="box-body">
                        <table id="materiais_dt" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Quantidade</th>
                                    <th>Custo Unitário</th>
                                    <th>Data de Compra</th>
                                    <th>Localização</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Quantidade</th>
                                    <th>Custo Unitário</th>
                                    <th>Data de Compra</th>
                                    <th>Localização</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($materiais as $mat): ?>
                                    <tr>
                                        <td><?php echo $mat['tipo_material_descricao']; ?></td>
                                        <td><?php echo $mat['quantidade']; ?></td>
                                        <td><?php echo $mat['custo_uni'] . '€'; ?></td>
                                        <td><?php echo $mat['data_compra']; ?></td>
                                        <td><?php echo $mat['localizacao']; ?></td>
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

<script src="<?php echo base_url() . 'assets/plugins/jQuery/jQuery-2.2.0.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/bootstrap/js/bootstrap.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/datatables/jquery.dataTables.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/datatables/dataTables.bootstrap.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/slimScroll/jquery.slimscroll.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/fastclick/fastclick.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/dist/js/app.min.js' ?>"></script>
<script>
                                                $(function () {
                                                    $("#materiais_dt").DataTable({
                                                        "initComplete": function () {
                                                            this.api().columns().every(function () {
                                                                var column = this;
                                                                    var select = $('<select><option value=""></option></select>')
                                                                            .appendTo($(column.footer()).empty())
                                                                            .on('change', function () {
                                                                                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                                                                column.search(val ? '^' + val + '$' : '', true, false).draw();
                                                                            });
                                                                    column.data().unique().sort().each(function (d, j) {
                                                                        select.append('<option value="' + d + '">' + d + '</option>')
                                                                    });
                                                                
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
                                                            "paginate": {
                                                                "previous": "Anterior",
                                                                "next": "Seguinte"
                                                            }
                                                        },
                                                        "columnDefs": [
                                                            {targets: 4, orderable: false}
                                                        ]
                                                    });
                                                });</script>
<script>
    function deleteConfirm(url)
    {
        if (confirm('Deseja eliminar o resgisto?'))
        {
            window.location.href = url;
        }
    }
</script>