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
                        <h3 class="box-title">Histórico Atividades</h3>
                        <a data-toggle="tooltip" title="Voltar" class="btn-lg" href="<?php echo site_url('Atividades/consultarAtividades'); ?>"><i class="fa  fa-arrow-circle-left"></i></a>
                        <div class="box-body ">
                            <table id="historicoAtividades" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                                <thead>
                                    <tr>
                                        <th>Nome Atividade</th>
                                        <th>Data Inicio</th>
                                        <th>Localização</th>                               
                                        <th>Duração</th>
                                        <th>Orçamento</th>   
                                        <th>Participantes</th>
                                        <th>Total de Gastos</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nome da Atividade</th>
                                        <th>Data Inicio</th>
                                        <th>Localização</th>
                                        <th>Duração</th>
                                        <th>Orçamento</th>
                                        <th>Participantes</th>
                                        <th>Total de Gastos</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach ($atividades as $atu) { ?>
                                        <tr>
                                            <td><?= $atu->nomeAtividade; ?></td>
                                            <td><?= $atu->dataInicio; ?></td>
                                            <td><?= $atu->localizacao; ?></td>                                   
                                            <td><?= $atu->duracao . ' dias'; ?></td>
                                            <td><?= $atu->orcamento . '€'; ?></td>
                                            <td><?= $atu->participantes; ?></td>
                                            <td><?= $atu->totalGastos . '€'; ?></td>
                                            <td><a  href="<?= $atu->notas; ?>" type="submit" class="submit btn-lg" data-target="#myModal" data-toggle="modal" value="Ver Detalhes" class="input_box"  > <i class="fa fa-info"></i> </a>


                                            </td>
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
<div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="myModal" role="dialog" tabindex="-1">
    <div class="modal-dialog">       
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel"><strong>Notas da Atividade: </strong></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div style="margin: 20px 0px 0px 20px"  id="divResultado">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" type="button">Fechar</button>

            </div>
        </div>      
    </div>
</div>    

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Versão</b> 1.0.0
    </div>
    <strong>INOV Webdesign &copy; 2015-2016 <a href="https://www.uminho.pt/PT">Universidade do Minho</a></strong>.
</footer>

<script src="<?php echo base_url() . 'assets/plugins/jQuery/jQuery-2.1.4.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/bootstrap/js/bootstrap.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/datatables/jquery.dataTables.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/datatables/dataTables.bootstrap.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/slimScroll/jquery.slimscroll.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/fastclick/fastclick.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/dist/js/app.min.js' ?>"></script>

<script  type="text/javascript">
    $(function () {
        $("#historicoAtividades").DataTable({
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
                {targets: 7, orderable: false}
            ]
        });
    });
</script>

<script>
    $(document).ready(function () {
        $(".submit").click(function (event) {

            event.preventDefault();


            var id = $(this).attr('href');

            document.getElementById("divResultado").innerHTML = "<p>" + id + "</p>";

        });
    });
</script>