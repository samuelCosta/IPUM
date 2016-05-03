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
                    <form action="<?= base_url() ?>Tranche/pesquisar" method="post" >
                        <div class="box-header">
                            <h3 class="box-title">Lista de Tranches</h3>

                            <div class="box-tools">
                                <div class="input-group" style="width: 400px;">
                                    <input type="text" name="pesquisar" class="form-control input-sm pull-right" placeholder="Pesquisar por ano...">
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
                                <th>Tranche</th>
                                <th>Ano</th>
                               
                              

                            </tr>
                            <?php foreach ($tranches as $tra) { ?>
                                <tr>
                                    <td><?= $tra->tranche; ?></td>
                                    <td><?= $tra->ano; ?></td>
                                    
                                 
                          
                                   
                                    <td><a class="btn btn-block btn-primary btn-xs" href="<?= base_url('Tranche/associarTranche/' . $tra->idApoios) ?>">Associar</a>
                                        
                                    <td><a class="btn btn-block btn-primary btn-xs" href="<?= base_url('Tranche/editarTranche/' . $tra->idApoios) ?>">Ver Detalhes</a>
                               
                                                                      
                                    
                                </tr>
                            <?php } ?>



                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </section>
</div><!-- /.content-wrapper -->





