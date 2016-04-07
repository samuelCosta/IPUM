<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            IPUM
            <small>Universidade do minho</small>
        </h1>

    </section>

    <!--formulario listar utilizador-->

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Lista de elementos</h3>
                        <div class="box-tools">
                            <div class="input-group" style="width: 250px;">
                                <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>Nome</th>
                                <th>Alcunha</th>
                                <th width="300">Email</th>
                                <th>Sócio</th>
                                <th>Estado</th>

                            </tr>
                            <?php foreach ($utilizadores as $uti) { ?>
                                <tr>
                                    <td><?= $uti->nome; ?></td>
                                    <td><?= $uti->alcunha; ?></td>
                                    <td><?= $uti->email; ?></td>

                                    <?php if ($uti->socio == 1) { ?>
                                        <td><span class="label label-success">Sócio</span></td>
                                    <?php } else { ?>
                                        <td><span class="label label-danger">Não Sócio</span></td>
                                    <?php } ?>    


                                    <?php if ($uti->ativo == 1) { ?>
                                        <td><span class="label label-success">Ativo</span></td>
                                    <?php } else { ?>
                                        <td><span class="label label-danger">Inativo</span></td>
                                    <?php } ?>   
                                        
                                        <td><a class="btn btn-block btn-primary btn-xs" href="<?= base_url('utilizador/atualizar/'.$uti->idUtilizador)?>">Atualizar</a> 
                                </tr>
                            <?php } ?>
                                
                                 

                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </section>
</div><!-- /.content-wrapper -->



