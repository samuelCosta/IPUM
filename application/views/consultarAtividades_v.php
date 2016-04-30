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
                    <form action="<?= base_url() ?>Atividades/pesquisar" method="post" >
                        <div class="box-header">
                            <h3 class="box-title">Lista de Atividades</h3>

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
                                <th>Nome da Atividade</th>
                                <th>Localização</th>
                               
                              

                            </tr>
                            <?php foreach ($atividades as $ativ) { ?>
                                <tr>
                                    <td><?= $ativ->nomeAtividade; ?></td>
                                    <td><?= $ativ->localizacao; ?></td>
                          
                                    <td> <a class="btn-lg" href="<?= base_url('Atividades/atualizar/' . $ativ->idAtividades) ?>"><i class="fa fa-edit"></i></a> </td>
                                    <td> <a class="btn btn-danger btn-sm" href="<?= base_url('Atividades/encerrarAtividade/' . $atividades[0]->idAtividades) ?>"  onclick="return confirm('Deseja realmente finalizar a Atividade?');"><i class="fa fa-power-off"></i> Encerrar</a> 
                                    
                                   
                                </tr>
                            <?php } ?>



                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </section>
</div><!-- /.content-wrapper -->





