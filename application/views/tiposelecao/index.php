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
                        <h3 class="box-title">Tipos de Seleção</h3>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-block btn-primary" onclick="location.href = 'registar'">Registar</button>
                        </div>
                    </div>
                    <div class="box-body">
                        <table id="tipo_dt" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Descrição</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Descrição</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($tipo_selecao as $ts): ?>
                                    <tr>
                                        <td><?php echo $ts['cod_tipo']; ?></td>
                                        <td><?php echo $ts['descricao']; ?></td>
                                        <td>
                                            <a data-toggle="tooltip" title="Editar" class="btn-lg" href="<?php echo site_url('tiposelecao/editar/' . $ts['id']); ?>">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a data-toggle="tooltip" title="Eliminar" class="btn-lg" onclick="javascript:deleteConfirm('<?php echo site_url('tiposelecao/delete/' . $ts['id']); ?>');" deleteConfirm href="#"/>
                                            <i class="fa fa-trash-o"></i>
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
        <b>Versão</b> 1.0.0
    </div>
    <strong>INOV Webdesign &copy; 2015-2016 <a href="https://www.uminho.pt/PT">Universidade do Minho</a></strong>.
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
                                                    $("#tipo_dt").DataTable({
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
                                                            {targets: 2, orderable: true}
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
