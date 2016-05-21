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
                        <table id="historicoUtilizadores" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Alcunha</th>
                                    <th>Email</th>
                                    <th>Sócio</th>
                                    <th></th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($utilizadoresInativos as $uti) { ?>
                                    <tr  onclick= script:location.href = "<?= base_url(); ?>utilizador/detalheUtilizador/<?php echo $uti->idUtilizador; ?>">
                                        <td><?= $uti->nome; ?></td>
                                        <td><?= $uti->alcunha; ?></td>
                                        <td><?= $uti->email; ?></td>

                                        <?php if ($uti->socio == 1) { ?>
                                            <td><span class="label label-success">Sócio</span></td>
                                        <?php } else { ?>
                                            <td><span class="label label-danger">Não Sócio</span></td>
                                        <?php } ?>    


                                        <td>
                                            <a class="btn-lg" href="<?= base_url('utilizador/ativarUtilizador/' . $uti->idUtilizador) ?>">Ativar</a>
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


<!--            para as tabelas-->
       <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/plugins/datatables/datatables.min.css"/>
 <!--           para as tabelas-->
       <script type="text/javascript" src="<?= base_url(); ?>assets/plugins/datatables/datatables.min.js"></script>
            
            
<script>


    $(document).ready(function () {
        $('#historicoUtilizadores').DataTable({
            "language": {
                "lengthMenu": "Procurar _MENU_ records per page",
                "zeroRecords": "Não foram encontardos resultados - desculpe",
                "info": "Showing page _PAGE_ of _PAGES_",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtered from _MAX_ total records)"
            }
        });
    });
</script>

