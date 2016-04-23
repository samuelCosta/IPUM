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
                    <form action="<?= base_url() ?>Merchadising/pesquisar" method="post" >
                        <div class="box-header">
                            <h3 class="box-title">Lista de Merchandising</h3>

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
                                <th style="width:400px">Tipo</th>
                                <th style="width:400px">Quantidade</th>
                                <th>Localização</th>
                                <th style="width:120px"></th>

                            </tr>
                            <?php foreach ($merchandising as $merchandising) { ?>
                                <tr>
                                    <td><?= $merchandising->tipo; ?></td>
                                    <td><?= $merchandising->quantidade; ?></td>
                                    <td><?= $merchandising->localizacao; ?></td>



                                    <td><a class="btn-lg" href="<?= base_url('Merchandising/atualizar/' . $merchandising->idStockMerchandising) ?>"><i class="fa fa-edit"></i></a>
                                        <a class="btn-lg" href="<?= base_url('Merchandising/deleteMerchandising/' . $merchandising->idStockMerchandising) ?>"><i class="fa fa-trash-o"></i></a>
                                        <a class="btn-lg" href="<?= base_url('Merchandising/deleteMerchandising/' . $merchandising->idStockMerchandising) ?>"><i class="fa fa-minus"></i></a>
                                        <a class="btn-lg" href="<?= base_url('Merchandising/deleteMerchandising/' . $merchandising->idStockMerchandising) ?>"><i class="fa fa-plus"></i></a>
                                    </td> 
                                </tr>
                            <?php } ?>



                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </section>
</div><!-- /.content-wrapper -->



