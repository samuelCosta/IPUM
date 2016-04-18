
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
                    <form action="<?= base_url() ?>Ensaios/pesquisar" method="post" >
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
                          
                                   
                                    <td><a class="btn btn-block btn-primary btn-xs" href="<?= base_url('Atuacoes/atualizar/' . $atu->idEventos) ?>">Atualizar</a>
                                    <td><a class="btn btn-block btn-primary btn-xs" href="<?= base_url('Ensaios/marcarPresencas/' . $atu->idEventos) ?>">Marcar Presenças</a>
                                </tr>
                            <?php } ?>



                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </section>
</div><!-- /.content-wrapper -->





