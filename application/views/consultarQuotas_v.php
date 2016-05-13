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
                      <a  data-toggle="tooltip" title="Ver Histórico" href="<?= base_url('Quotas/historicoQuotas/')?>" class="btn-lg pull-right" ><i class="fa fa-info pull-right" ></i> </a>

                    </div>
                    
                    <div class="box-body  "> 
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                            <thead>
                                <tr>
                                    <th>Data Aviso</th>
                                    <th>Data De pagamento</th>
                                    <th>Utilizador</th>
                                    <th>Estado</th>
                                    <th></th>
                                  

                                </tr>
                            </thead>
                        
                            <tbody>
                                <?php foreach ($quotas as $quo): ?>
                                    <tr>
                                        <td><?= $quo->dataAviso; ?></td>
                                        <td><?= $quo->dataPagamento; ?></td>
                                        <td><?= $quo->nome; ?></td>
                                        <td><?= $quo->tipo; ?></td>
                                        
                                        <td>
                                          
                                            <?php if($quo->tipo == 'Não Pago'){ ?>
                                            <a data-toggle="tooltip" title="Pagar Quota" class="btn-lg" href="<?= base_url('Quotas/pagarQuota/' . $quo->idQuota.'/'.$quo->idUtilizador.'/'.$quo->dataAviso ) ?>"><i class="fa fa-euro" onclick="return confirm('Deseja realmente regostar o pagamento ?');"></i></a>
                                              <a data-toggle="tooltip" title="Editar" class="btn-lg" href="<?= base_url('Quotas/atualizarQuota/' . $quo->idQuota) ?>"><i class="fa fa-edit"></i></a>
                                                <?php }else{ ?>
                                            <a data-toggle="tooltip" title="Pagamento já Efectuado" disabled class="btn-lg" ><i class="fa fa-euro" ></i></a>
                                             <a data-toggle="tooltip" title="Pagamento já Efectuado" class="btn-lg" disabled><i class="fa fa-edit"></i></a>

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