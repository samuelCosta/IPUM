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
<!--                    <form action="<?= base_url() ?>OrgaosSociais/pesquisar" method="post" >-->
                        <div class="box-header">
                            <h3 class="box-title">Lista de Orgãos Sociais</h3>

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
                                <th>Categoria</th>
                                <th>Cargo</th>
                                <th>Data de Ínicio</th>
                                <th>Nome Utilizador</th>
                                <th></th>
                                <th></th>
                              

                            </tr>
                             </thead>
                             <tbody>
                            <?php foreach ($orgaosSociais as $org) { ?>
                                <tr onclick=script:location.href="<?= base_url(); ?>utilizador/detalheUtilizador/<?php echo $org->utilizador_idUtilizador; ?>">
                                    <td><?= $org->categoria; ?></td>
                                    <td><?= $org->cargo; ?></td>
                                    <td><?= $org->dataInicio; ?></td>
                                    <td><?= $org->nome; ?></td>
                                   
                                   
                                        <td> <a data-toggle="tooltip" title="Editar" class="btn-lg" href="<?= base_url('OrgaosSociais/atualizar/' . $org->idorgaosSociais) ?>"><i class="fa fa-edit"></i></a> </td>
                                        <td> <a data-toggle="tooltip" title="Encerrar" class="btn-lg" href="<?= base_url('OrgaosSociais/encerrarMandato/' . $orgaosSociais[0]->idorgaosSociais) ?>"  onclick="return confirm('Deseja realmente encerrar seu mandato?');"> <i class="fa fa-power-off"></i> </a> </td>
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




