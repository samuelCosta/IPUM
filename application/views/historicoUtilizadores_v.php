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
                        <h3 class="box-title">Histórico Utilizadores</h3>
                        <a data-toggle="tooltip" title="Voltar" class="btn-lg" href="<?php echo site_url('Utilizador/consultarUtilizadoresAtivos'); ?>"><i class="fa  fa-arrow-circle-left"></i></a>

                    </div>

                    <!--                   ------------------------------ ----------------------->
                    <div class="box-body  "> 
                        <table id="utilizadoresInativos"class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Alcunha</th>
                                    <th>Email</th>
                                    <th></th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Nome</th>
                                    <th>Alcunha</th>
                                    <th>Email</th>
                                    <th></th>
                                    <th></th>

                                </tr>
                            </tfoot>
                            <tbody >
                                <?php foreach ($utilizadoresInativos as $uti) { ?>
                                    <tr style="cursor: pointer" onclick= script:location.href="<?= base_url(); ?>utilizador/detalheUtilizador/<?php echo $uti->idUtilizador; ?>">
                                        <td><?= $uti->nome; ?></td>
                                        <td><?= $uti->alcunha; ?></td>
                                        <td><?= $uti->email; ?></td>

                                        <?php if ($uti->socio == 1) { ?>
                                            <td><span class="label label-success">Sócio</span></td>
                                        <?php } else { ?>
                                            <td><span class="label label-danger">Não Sócio</span></td>
                                        <?php } ?>    


                                        <td>
                                            <a data-toggle="tooltip" title="Ativar" class="btn-lg" href="<?= base_url('utilizador/ativarUtilizador/' . $uti->idUtilizador) ?>"><i class="fa  fa-user" ></i></a>
                                        </td>
                                    </tr>


                                <?php } ?>


                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
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

<script src="<?php echo base_url() . 'assets/plugins/jQuery/jQuery-2.1.4.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/bootstrap/js/bootstrap.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/datatables/jquery.dataTables.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/datatables/dataTables.bootstrap.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/slimScroll/jquery.slimscroll.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/fastclick/fastclick.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/dist/js/app.min.js' ?>"></script>
<script>
                                      $(function () {
                                          $("#utilizadoresInativos").DataTable({
                                              "initComplete": function () {
                                                  this.api().columns().every(function () {
                                                      var column = this;
                                                      if (column.index() < 3) {
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

