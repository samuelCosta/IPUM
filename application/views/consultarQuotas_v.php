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
                        <h3 class="box-title">Consultar Quotas</h3>
                        <a  data-toggle="tooltip" title="Ver Histórico" href="<?= base_url('Quotas/historicoQuotas/') ?>" class="btn-lg pull-right" ><i class="fa fa-info pull-right" ></i> </a>

                    </div>

                    <div class="box-body  "> 
                        <table id="quotas" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                            <thead>
                                <tr>
                                    <th>Data Aviso</th>
                                    <th>Data De pagamento</th>
                                    <th>Utilizador</th>
                                    <th>Estado</th>
                                    <th></th>


                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Data Aviso</th>
                                    <th>Data De pagamento</th>
                                    <th>Utilizador</th>
                                    <th>Estado</th>
                                    <th></th>

                                </tr>
                            </tfoot>

                            <tbody>
                                <?php foreach ($quotas as $quo): ?>
                                    <tr>
                                        <td><?= $quo->dataAviso; ?></td>
                                        <td><?= $quo->dataPagamento; ?></td>
                                        <td><?= $quo->nome; ?></td>

                                        <td class="<?php
                                        if ($quo->tipo == "Pago") {
                                            echo 'bg-green-active';
                                        } else if ($quo->tipo == "Não Pago") {
                                            echo 'bg-red-active';
                                        } else {
                                            
                                             echo 'bg-yellow-active';
                                        }
                                        ?>">
                                                <?php echo $quo->tipo ?>
                                        </td>

                                        <td>

                                            <?php if ($quo->tipo == 'Não Pago') { ?>

                                                <a id="<?= $quo->utilizador_idUtilizador ?>" id1="<?= $quo->idQuota ?>" id2="<?= $quo->dataAviso; ?>" type="button" class="submit1 btn-lg" data-target="#myModal2" data-toggle="modal"  > <i class="fa fa-euro" ></i></a>                                        


                                                <a data-toggle="tooltip" title="Editar" class="btn-lg" href="<?= base_url('Quotas/atualizarQuota/' . $quo->idQuota) ?>"><i class="fa fa-edit"></i></a>
                                            <?php } else { ?>
                                                <a data-toggle="tooltip" hidden="" title="Pagamento já Efectuado" disabled class="btn-lg" ><i class="fa fa-euro" ></i></a>
                                                <a data-toggle="tooltip" hidden=""title="Pagamento já Efectuado" class="btn-lg" disabled><i class="fa fa-edit"></i></a>

                                            <?php } ?>
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

<!----------------------------------------PAGAR QUOTA----------------------------------->
<div aria-hidden="true" aria-labelledby="myModalLabel2" class="modal fade" id="myModal2" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <form action="<?= base_url() ?>Quotas/pagarQuota" method="post">
            <input id="idUsuario" name="idUtilizador" type="hidden" value="">
            <input id="idUsuario" name="socio" type="hidden" value="1">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel2">Informação</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Percentagem Ensaios:</label>
                            <input class="form-control" type="text"  disabled="" id="Pensaios" name="Pensaios" >  
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Percentagem Atuações:</label>
                            <input class="form-control" type="text"   disabled="" id="Patuacoes" name="Patuacoes" >  
                        </div>
                        <div id="centro" class="col-md-12 form-group">
                            <label>Percentagem Total:</label>
                            <input   class="form-control" type="text"   disabled=""id="Ptotal" name="Ptotal" >  
                        </div>
                        <input   class="form-control" type="hidden" id="idUtilizador" name="idUtilizador" >  
                        <input   class="form-control" type="hidden" id="dataAviso" name="dataAviso" >  
                        <input   class="form-control" type="hidden" id="idQuota" name="idQuota" >  
                        <input   class="form-control" type="hidden" id="tipo" name="tipo" >  
                        
                        <div id="estado" class="alert alert-warning alert-dismissable">
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Data de Pagamento:</label>
                            <input class="form-control" id="dataPagamento" name="dataPagamento" onchange="alterarData()" type="date">
                        </div>
                        <div class="col-md-12 form-group">
                            <div id="divcheck2">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal" type="button">Fechar</button>
                    <button class="btn btn-primary" disabled="" id="enviarData" type="submit">Pagar</button>
                </div>
            </div>
        </form>
    </div>
</div>
                <!-------------------------------------------------------------->

<script src="<?php echo base_url() . 'assets/plugins/jQuery/jQuery-2.1.4.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/bootstrap/js/bootstrap.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/datatables/jquery.dataTables.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/datatables/dataTables.bootstrap.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/slimScroll/jquery.slimscroll.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/fastclick/fastclick.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/dist/js/app.min.js' ?>"></script>
<script>
                                $(function () {
                                    $("#quotas").DataTable({
                                        "initComplete": function () {
                                            this.api().columns().every(function () {
                                                var column = this;
                                                if (column.index() < 4) {
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
                                            {targets: 4, orderable: false}
                                        ]
                                    });
                                });
</script>


<script>

// Ajax post
    $(document).ready(function () {
        $(".submit1").click(function (event) {
            event.preventDefault();

            var id = $(this).attr('id');
            var idQuota = $(this).attr('id1');
            var data = $(this).attr('id2');

            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "Quotas/estatisticaQuotas",
                dataType: 'json',
                data: {id: id, data: data, idQuota: idQuota},
                success: function (res) {
                    $("#Ptotal").val(res.Ptotal + " %");
                    $("#Pensaios").val(res.Pensaios + " %");
                    $("#Patuacoes").val(res.Patuacoes + " %");
                    $("#idUtilizador").val(res.idUtilizador);
                    $("#dataAviso").val(res.dataAviso);
                    $("#idQuota").val(res.idQuota);
                    $("#tipo").val(res.tipo);
                    

                    html = "<i class='icon fa fa-warning'></i>" + res.estado;
                    $("#estado").html(html);
//                    //coloco a variável html na tela

                }
            });
        });
    });



    function alterarData() {
        var data = $("#dataPagamento").val();

        if (data != '') {
            document.getElementById("enviarData").disabled = false;
        } else
            document.getElementById("enviarData").disabled = true;


    }
</script>