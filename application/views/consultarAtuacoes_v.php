
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
  <!--   ---------------  botão para pesquisar-->
<!--                    <form action="<?= base_url() ?>Atuacoes/pesquisar" method="post" >-->
                        <div class="box-header">
                            <h3 class="box-title">Lista de Atuações</h3>

<!--                            <div class="box-tools">
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
                    <div class="box-body table-responsive no-padding">
                         <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                             <thead>
                            <tr>
                                 <th>Nome</th>
                                <th>Data</th>
                                <th>Localização</th>
                                 <th>Pessoa Responsavel</th>
                                  <th>Contacto</th>
                                   <th>Orçamento</th>
                                   <th></th>
                                   <th></th>
                                   <th></th>
                                
                               
                              

                            </tr>
                             </thead>
                             <tbody>
                            <?php foreach ($atuacoes as $atu) { ?>
                                <tr>
                                    <td><?= $atu->designacao; ?></td>
                                    <td><?= $atu->dataEvento; ?></td>
                                    <td><?= $atu->localizacao; ?></td>
                                      <td><?= $atu->responsavel; ?></td>
                                        <td><?= $atu->contacto; ?></td>
                                        <td><?= $atu->orcamento; ?></td>
                          
                                   

                                        
                                         <td><a  data-toggle="tooltip" title="Editar" class="btn-lg" href="<?= base_url('Atuacoes/atualizar/' . $atu->idEventos) ?>"><i class="fa fa-edit"></i></a> </td>
                                         <?php if($atu->totalpresencas<=0 || $atu->totalpresencas==NULL ){?>
                                   
                                        <td><a data-toggle="tooltip" title="Marcar Presenças" class="btn-lg" href="<?= base_url('Atuacoes/consultarUtilizadores/' . $atu->idEventos) ?>"><i class="fa fa-tasks"></i></a> </td>
                                     <?php }else{?>
                                         <td><a data-toggle="tooltip" title="Presenças Marcadas" class="btn-lg" disabled href=""><i class="fa fa-ban"></i></a>
                                    <?php  } ?>
                                    <td><a data-toggle="tooltip" title="Encerrar" class="btn-lg" href="<?= base_url('Atuacoes/encerrarAtuacao/'. $atu->idEventos ) ?>"  onclick="return confirm('Deseja realmente finalizar a atuação?');"> <i class="fa fa-power-off"></i></a> 
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




