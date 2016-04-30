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
                    <form action="<?= base_url() ?>OrgaosSociais/pesquisar" method="post" >
                        <div class="box-header">
                            <h3 class="box-title">Lista de Orgãos Sociais</h3>

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
                                <th>Categoria</th>
                                <th>Cargo</th>
                                <th>Data de Ínicio</th>
                                <th>Nome Utilizador</th>
                              

                            </tr>
                            <?php foreach ($orgaosSociais as $org) { ?>
                                <tr>
                                    <td><?= $org->categoria; ?></td>
                                    <td><?= $org->cargo; ?></td>
                                    <td><?= $org->dataInicio; ?></td>
                                    <td><?= $org->nome; ?></td>
                                   
                                   
                                        <td> <a class="btn-lg" href="<?= base_url('OrgaosSociais/atualizar/' . $org->idorgaosSociais) ?>"><i class="fa fa-edit"></i></a> </td>
                                        <td> <a class="btn btn-danger btn-sm" href="<?= base_url('OrgaosSociais/encerrarMandato/' . $orgaosSociais[0]->idorgaosSociais) ?>"  onclick="return confirm('Deseja realmente encerrar seu mandato?');"> <i class="fa fa-power-off"></i> Encerrar</a> </td>
                                </tr>
                            <?php } ?>



                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </section>
</div><!-- /.content-wrapper -->





