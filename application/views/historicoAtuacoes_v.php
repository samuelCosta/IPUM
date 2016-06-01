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
                        <h3 class="box-title">Histórico Atuações</h3>
                        <a data-toggle="tooltip" title="Voltar" class="btn-lg" href="<?php echo site_url('Atuacoes/consultarAtuacoes'); ?>"><i class="fa  fa-arrow-circle-left"></i></a>


                        <div class="box-body ">
                            <table id="historicoAtucoes" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                                <thead>
                                    <tr>
                                        <th>Nome da Atuação</th>
                                        <th>Data da Atuação</th>
                                        <th>Localização da Atuação</th>
                                        <th>Cliente/Responsável</th>
                                        <th>Contacto</th>
                                        <th>Orçamento</th>
                                        <th>Despesas</th>
                                        <th>Presenças</th>
                                        
                                         <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Data</th>
                                        <th>Localização</th>
                                        <th>Cliente/Responsável</th>
                                        <th>Contacto</th>
                                        <th>Orçamento</th>
                                        <th>Despesas</th>
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
                                            <td><?= $atu->despesa.'€'; ?></td>
                                            <td><?= $atu->totalpresencas; ?></td>
                                            
                                            <td><a  href="<?= $atu->idEventos; ?>" id="<?= $atu->notas; ?>"type="submit" class="submit btn-lg" data-target="#myModal" data-toggle="modal" value="Ver Detalhes" class="input_box"  > <i class="fa fa-info"></i> </a>
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
                <h4 class="modal-title" id="myModalLabel"><strong>Mais Informação: </strong></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div style="margin: 20px 0px 0px 20px"  id="listaUtilizadores">
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
<script type="text/javascript">
    $(function () {
        $("#historicoAtucoes").DataTable({
            "initComplete": function () {
                this.api().columns().every(function () {
                    var column = this;
                    if (column.index() < 8) {
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
                {targets: 8, orderable: false}
            ]
        });
    });
</script>



<script type="text/javascript">

// Ajax post

    $(document).ready(function () {
        $(".submit").click(function (event) {
            event.preventDefault();

            var id = $(this).attr('href');
             var notas = $(this).attr('id');


            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "utilizador/verDetalhesEvento",
                dataType: 'json',
                data: {name: id},
                success: function (res) {
                    html = "<strong>Notas: </strong>"+notas+"<br><br><br>";
                    html += "<h4><strong>Presentes:  </strong></h4>";
                    html += "<table class='table table-hover'><thead>";
                    html += "<tr><th>Nome</th><th>Email</th></tr>";
                    html += "</thead><tbody>";
                    for ($i = 0; $i < res.length; $i++) {
                        html += "<tr><td>" + res[$i].nome + "</td><td>" + res[$i].email + "</td></tr>";

                    }//fim do laço
                    html += "</tbody></table>";
                    $("#listaUtilizadores").html(html);
                    //coloco a variável html na tela

                }
            });
        });
    });

</script>

