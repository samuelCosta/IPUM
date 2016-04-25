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
                    <form action="<?= base_url() ?>utilizador/eventosUtilizadores" method="post" >
                        <div class="box-header">
                            <h3 class="box-title">Estatisticas por Eventos</h3>

                            <div class="box-tools">
                                <div class="input-group" style="width: 400px;">
                                   
                                      <input type="text"  class="form-control input-sm pull-right" name="designacao" id="productname" placeholder="Pesquisar por eventos..." >      
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--                   ------------------------------ ----------------------->
                    <div class="box-body table-responsive no-padding">
                        


                            <table  class="table table-hover">
                                <tr>
                                    <th>Nome </th>
                                    <th>Email </th>

                                </tr>
                              
                                   <?php    if(isset($utilizadores)){
                                   
                                   foreach ($utilizadores as $uti) { ?>
                            
                                    <tr>
                                        <td><?= $uti->nome; ?> </td>
                                        <td>       
                                           <?= $uti->email; ?>
                                        </td>
                                    </tr>
                          

                                   <?php }}else{ ?>
                                       <td>       
                                           Nao existe resulados
                                        </td>
                                       
                                   <?php  } ?>

                            </table>
                          

                           
                        
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </section>

</div><!-- /.content-wrapper -->


<script type="text/javascript">
    $(document).ready(function () {

        $('#productname').autocomplete({
            source: "<?php echo site_url('utilizador/searchEventos/?'); ?>"
        });
    });
</script>
