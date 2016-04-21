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
                            <h3 class="box-title">Marcar Presenças de Atuacoes</h3>

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
                        <?php echo form_open('Atuacoes/marcarPresencas'); ?>
                        <form name="formulario">

                            <input type="hidden"  value="<?php echo $idEventos ?>" name="eventos_idEventos" >

                            <table class="table table-hover">
                                <tr>
                                    <th>Nome </th>
                                    <th> <input type="checkbox" id="selecctall"/><span>Selecionar todos</span></th>

                                </tr>

                                <?php foreach ($utilizadores as $uti) { ?>
                                    <tr>
                                        <td><?= $uti->nome; ?>  </td>
                                        <td>       
                                            <input class="checkbox1" type="checkbox" name="check[]" value="<?= $uti->idUtilizador; ?>" />
                                        </td>
                                    </tr>
                                <?php } ?>



                            </table>
                            <p> <?php echo validation_errors(); ?></p>

                            <div class="box-footer">  
                                <button type="submit" value="upload" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </section>

</div><!-- /.content-wrapper -->



<script language=javascript>
    $(document).ready(function () {
        $('#selecctall').click(function (event) {
            if (this.checked) {
                $('.checkbox1').each(function () {
                    this.checked = true;
                });
            } else {
                $('.checkbox1').each(function () {
                    this.checked = false;
                });
            }
        });

    });
</script>


