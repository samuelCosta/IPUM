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
<!--                       ---------------  botão para pesquisar
                    <form action="<?= base_url() ?>Atuacoes/pesquisar" method="post" >
                        <div class="box-header">
                            <h3 class="box-title">Marcar Presenças de Atuacoes</h3>

                            <div class="box-tools">
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
                    <div class="box-body">
                        <?php echo form_open('Atuacoes/marcarPresencas'); ?>
                        <form name="formulario">

                            <input type="hidden"  value="<?php echo $idEventos ?>" name="eventos_idEventos" >

                            <table id="presencasEnsaios" class="table table-hover">
                                 <thead>
                                <tr>
                                    <th>Nome </th>
                                    <th> <input type="checkbox" id="selecctall"/><small>Selecionar todos</small></th>

                                </tr>
                                 </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nome</th>                                  
                                    </tr>
                                </tfoot>
                                 <tbody>
                                <?php foreach ($utilizadores as $uti) { ?>
                                    <tr>
                                        <td><?= $uti->nome; ?>  </td>
                                        <td>       
                                            <input class="checkbox1" type="checkbox" name="check[]" value="<?= $uti->idUtilizador; ?>" />
                                        </td>
                                    </tr>
                                <?php } ?>
                                     </tbody>


                            </table>
                            <p> <?php echo validation_errors(); ?></p>

                            <div class="box-footer">  
                                <button type="submit" value="upload" class="btn btn-primary">Guardar</button>
                                <a class="btn" href="<?php echo site_url('Atuacoes/consultarAtuacoes'); ?>">Cancelar</a>
                            </div>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
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

<script language=javascript>
    $(document).ready(function () {
        $('#selecctall').click(function (event) {
            if (this.checked) {
                $('.checkbox1').each(function () {
                    this.checked = true;
                });
            } else {
                $('.checkbox1').each(function () {
                    this.checked = false;
                });
            }
        });

    });
</script>




<script src="<?php echo base_url() . 'assets/plugins/jQuery/jQuery-2.1.4.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/bootstrap/js/bootstrap.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/datatables/jquery.dataTables.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/datatables/dataTables.bootstrap.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/slimScroll/jquery.slimscroll.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/fastclick/fastclick.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/dist/js/app.min.js' ?>"></script>
<script>
                                        $(function () {
                                            $("#presencasEnsaios").DataTable({
                                                "initComplete": function () {
                                                    this.api().columns().every(function () {
                                                        var column = this;
                                                        if (column.index() < 1) {
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
                                                    {targets: 1, orderable: false}
                                                ]
                                            });
                                        });
</script>
