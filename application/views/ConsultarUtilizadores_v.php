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
                        <h3 class="box-title">Consultar Utilizadores</h3>
                        <a  data-toggle="tooltip" title="Ver Histórico" href="<?= base_url('Utilizador/consultarUtilizadoresInativos/')?>" class="btn-lg pull-right" ><i class="fa fa-info pull-right" ></i> </a>


                    </div>
                    <div class="box-body  "> 
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" >
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
                                <?php foreach ($utilizadoresAtivos as $uti): ?>
                                    <tr  onclick= script:location.href="<?= base_url(); ?>utilizador/detalheUtilizador/<?php echo $uti->idUtilizador; ?>">
                                        <td><?= $uti->nome; ?></td>
                                        <td><?= $uti->alcunha; ?></td>
                                        <td><?= $uti->email; ?></td>

                                        <?php if ($uti->socio == 1) { ?>
                                            <td><span class="label label-success">Sócio</span></td>
                                        <?php } else { ?>
                                            <td><span class="label label-danger">Não Sócio</span></td>
                                        <?php } ?>    

                                        <td>
                                            <a data-toggle="tooltip" title="Editar" class="btn-lg" href="<?= base_url('utilizador/atualizar/' . $uti->idUtilizador) ?>"> <i class="fa fa-edit"></i></a>
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


<script src="<?php echo base_url() . 'assets/plugins/jQuery/jQuery-2.1.4.min.js' ?>"></script>
 <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/plugins/datatables/jquery.datatables.css"/>
<script src="<?php echo base_url() . 'assets/plugins/datatables/jquery.dataTables.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/datatables/dataTables.bootstrap.min.js' ?>"></script>

<script>


    $(document).ready(function () {
        $('#example').DataTable({
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

<script>

</script>