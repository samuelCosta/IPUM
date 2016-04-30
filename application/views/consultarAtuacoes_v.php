
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
                    <form action="<?= base_url() ?>Atuacoes/pesquisar" method="post" >
                        <div class="box-header">
                            <h3 class="box-title">Lista de Atuações</h3>

                            <div class="box-tools">
                                <div class="input-group" style="width: 400px;">
                                    <input type="text" name="pesquisar" class="form-control input-sm pull-right" placeholder="Pesquisar por...">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
<!--                   ------------------------------ ----------------------->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>Data</th>
                                <th>Localização</th>
                                 <th>Pessoa Responsavel</th>
                                  <th>Contacto</th>
                                   <th>Orçamento</th>
                                
                               
                              

                            </tr>
                            <?php foreach ($atuacoes as $atu) { ?>
                                <tr>
                                    <td><?= $atu->dataEvento; ?></td>
                                    <td><?= $atu->localizacao; ?></td>
                                      <td><?= $atu->responsavel; ?></td>
                                        <td><?= $atu->contacto; ?></td>
                                        <td><?= $atu->orcamento; ?></td>
                          
                                   

                                        
                                         <td><a class="btn-lg" href="<?= base_url('Atuacoes/atualizar/' . $atu->idEventos) ?>"><i class="fa fa-edit"></i></a> </td>
                                         <?php if($atu->totalpresencas<=0 || $atu->totalpresencas==NULL ){?>
                                   
                                        <td><a class="btn-lg" href="<?= base_url('Atuacoes/consultarUtilizadores/' . $atu->idEventos) ?>"><i class="fa fa-tasks"></i> Marcar Presenças</a> </td>
                                     <?php }else{?>
                                         <td><a class="btn btn-sm" disabled href="">Presenças já Marcadas</a>
                                    <?php  } ?>
                                    <td><a class="btn btn-danger btn-sm" href="<?= base_url('Atuacoes/encerrarAtuacao/'. $atu->idEventos ) ?>"  onclick="return confirm('Deseja realmente finalizar a atuação?');"> <i class="fa fa-power-off"></i> Encerrar</a> 
                                </tr>
                            <?php } ?>



                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </section>
</div><!-- /.content-wrapper -->





