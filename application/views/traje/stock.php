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
                        <h3 class="box-title">Stock</h3>
                    </div>
                    <div class="box-body">
                        <table id="stock_dt" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Género</th>
                                    <th>Tamanho</th>
                                    <th>Quantidade</th>
                                    <th>Data de Compra</th>
                                    <th>Custo Unitário</th>
                                    <th>Localização</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Género</th>
                                    <th>Tamanho</th>
                                    <th>Quantidade</th>
                                    <th>Data de Compra</th>
                                    <th>Custo Unitário</th>
                                    <th>Localização</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($pecas as $peca): ?>
                                <tr>
                                        <td><?php echo $peca['ts_tipo']; ?></td>
                                        <td><?php echo $peca['ts_genero']; ?></td>
                                        <td><?php echo $peca['ts_tamanho']; ?></td>
                                        <td><?php echo $peca['quantidade']; ?></td>
                                        <td><?php echo $peca['data_compra']; ?></td>
                                        <td><?php echo $peca['custo_uni'] . '€'; ?></td>
                                        <td><?php echo $peca['localizacao']; ?></td>
                                        <td <?php if ($peca['quantidade'] != 0) { ?>>
                                            <a class="btn-lg" href="<?php echo site_url('traje/editar/' . $peca['id']); ?>">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a class="btn-lg" onclick="javascript:deleteConfirm('<?php echo site_url('traje/delete_traje/' . $peca['id']); ?>');" deleteConfirm href="#"/>
                                            <i class="fa fa-trash-o"></i>
                                            </a>
                                            <a class="btn-lg" href="<?php echo site_url('traje/atribuir_traje/' . $peca['id']); ?>">
                                                <i class="fa fa-share-square-o"></i>
                                            </a>
                                        </td <?php } ?> >
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
                                                    $("#stock_dt").DataTable({
                                                        "initComplete": function () {
                                                            this.api().columns().every(function () {
                                                                var column = this;
                                                                if (column.index() < 7) {
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
                                                            {targets: 7, orderable: false}
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
