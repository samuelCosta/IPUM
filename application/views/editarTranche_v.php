<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            IPUM
            <small>Universidade do minho</small>
        </h1>

    </section>

    <!--formulario criar utilizador-->

    <section class="content">
        <div class="row">


            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Editar Tranche</h3>
                        <a data-toggle="tooltip" title="Voltar" class="btn-lg" href="<?php echo site_url('Tranche/consultarTranches'); ?>"><i class="fa  fa-arrow-circle-left"></i></a>
                    </div><!-- /.box-header -->
                    <!-- form start -->


                    <?php echo form_open_multipart('Tranche/guardarAtualizacao'); ?>
                    <!--                <form method="post" action="utilizador/registarUtilizador" role="form">-->
                    <div class="box-body">  
                        <!--                        passar atributo ativo -->
                        <input name="idApoios" type="hidden" value="<?= $tranche[0]->idApoios; ?>">



                        <div class="col-md-4 form-group">
                            <label>Tranche</label>
                            <input disabled="" type="text" class="form-control" name="tranche" value="<?= $tranche[0]->tranche; ?>">
                        </div>


                        <div class="col-md-4 form-group">
                            <label>Ano</label>
                            <input disabled="" type="text" class="form-control" name="ano" value="<?= $tranche[0]->ano; ?>">
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Fundos</label>
                            <input type="number" step="0.01" name="fundos" class="form-control" value="<?= $tranche[0]->fundos; ?>" >
                        </div>
                         <p> <?php echo validation_errors(); ?></p>

                    <div class="box-footer">  
                        <button type="submit" value="upload" class="btn btn-primary">Submit</button>
                    </div>
                    
                   
                    </form>
                    </div>
                </div>
                  </div>
                
                    
                            <div class="col-md-6 form-group">
                                
                                 <div class="box box-primary">
                                      <div class="box-body"> 
                        <div class="col-md-6 form-group">
                            
                            <table class="table table-hover">
                                <tr> <th>Eliminar as Atividades </th> 
                                  
                                </tr>

                                <?php foreach ($atividadesApoio as $uti) { ?>
                                    <tr>
                                        <td><?= $uti->nomeAtividade; ?>  </td>
                                        
                                        <td ><a  id="<?= $uti->idAtividades; ?>" type="button" class="submit btn-sm"   data-target="#myModal" data-toggle="modal" class=" btn btn-default btn-block active" > <i class="fa fa-info"></i></a>
                                        <td> <a data-toggle="tooltip" title="Eliminar" class="btn-sm" href="<?= base_url('Tranche/eliminarAtividadeTranche/'.$uti->idapoiosAtividades.'/'.$tranche[0]->idApoios.'/'.$tranche[0]->ano) ?>"  onclick="return confirm('Deseja realmente desassociar a Atividade?');"><i class="fa fa-arrow-right"></i> </a> 
                                    </tr>
                                    
                                <?php } ?>
                            </table>   
                            
                         
                        </div>

                           <div class="col-md-6 form-group">                     
                               <table class="table table-hover">
                                <tr> <th>Associar as Atividades </th> 
                                  
                                </tr>

                                <?php foreach ($atividadesNaoApoio as $uti) { ?>
                                    <tr>
                                        <td><?= $uti->nomeAtividade; ?>  </td>
                                        <td ><a  id="<?= $uti->idAtividades; ?>" type="button" class="submit btn-sm" value="Ver Detalhes"  data-target="#myModal" data-toggle="modal" class=" btn btn-default btn-block active"><i class="fa fa-info"></i> </a>
                                        <td> <a  data-toggle="tooltip" title="Associar" class="btn-sm" href="<?= base_url('Tranche/associarAtividadeTranche/' . $uti->idAtividades.'/'.$tranche[0]->idApoios.'/'.$tranche[0]->ano) ?>"  onclick="return confirm('Deseja realmente associar a Atividade?');"> <i class="fa fa-arrow-left"></i></a> 
                                    </tr>
                                <?php } ?>
                            </table>                   
                        </div>
                            </div>
                        
                    </div>
                </div>
                        
                        <div class="col-md-6 form-group">
                               <div class="box box-primary">
                                      <div class="box-body"> 
                            
                        <div class="col-md-6 form-group">                     
                            <table class="table table-hover">
                                <tr> <th>Eliminar as Atuações</th> </tr>
                                <?php foreach ($atuacoesApoio as $atu) { ?>
                                    <tr>
                                        <td><?= $atu->designacao; ?>  </td>
                                        <td ><a  id="<?= $atu->idEventos; ?>" type="button" class="submit1 btn-sm" value="Ver Detalhes"  data-target="#myModal" data-toggle="modal" class=" btn btn-default btn-block active"> <i class="fa fa-info"></i></a>
                                        <td> <a data-toggle="tooltip" title="Eliminar" class="btn-sm" href="<?= base_url('Tranche/eliminarAtuacaoTranche/'.$atu->idapoiosEventos.'/'.$tranche[0]->idApoios.'/'.$tranche[0]->ano) ?>"  onclick="return confirm('Deseja realmente desassociar a Atuação?');"><i class="fa fa-arrow-right"></i> </a> 
                                    </tr>
                                <?php } ?>
                            </table>                       
                        </div>
                            
                              <div class="col-md-6 form-group">                     
                            <table class="table table-hover">
                                <tr> <th>Associar as Atuacoes  </th> </tr>
                                <?php foreach ($atuacoesNaoApoio as $atu) { ?>
                                    <tr>
                                        <td><?= $atu->designacao; ?>  </td>
                                        <td ><a  id="<?= $atu->idEventos; ?>" type="button" class="submit1 btn-sm" value="Ver Detalhes"  data-target="#myModal" data-toggle="modal"  class=" btn btn-default btn-block active"> <i class="fa fa-info"></i></a>
                                        <td> <a  data-toggle="tooltip" title="Associar" class="btn-sm" href="<?= base_url('Tranche/associarAtuacaoTranche/' . $atu->idEventos.'/'.$tranche[0]->idApoios.'/'.$tranche[0]->ano) ?>"  onclick="return confirm('Deseja realmente associar a atuação?');"> <i class="fa fa-arrow-left"></i></a> 
                                    </tr>
                                <?php } ?>
                            </table>                       
                        </div>
                                          </div>
                                   </div>
                            
                             </div>
                            
                            
                            
                            
                    </div><!-- /.box-body -->
                    
                   
                     </div>
                </div><!-- /.box -->    
            </div>    
        </div>  
    </section>
</div><!-- /.content-wrapper -->




<!-------------------------------------Detalhes da Atividade------------------------------>


<div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="myModal" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <form action="<?= base_url() ?>utilizador/salvar_senha" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Detalhes da Atividade</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div id="listaUtilizadores"  >
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal" type="button">Fechar</button>

                </div>
            </div>
        </form>
    </div>
</div>



<script>

// Ajax post
    $(document).ready(function () {
        $(".submit").click(function (event) {
            event.preventDefault();

            var id = $(this).attr('id');

            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "Tranche/verDetalhesAtividade",
                dataType: 'json',
                data: {id: id},
                success: function (res) {

                    html = "<table class='table table-hover'><thead>";
                    html += "<tr><th>Nome</th><th>Localizacao</th><th>Orçamento</th><th>Notas</th></tr>";
                    html += "</thead><tbody>";
                    for ($i = 0; $i < res.length; $i++) {
                        html += "<tr><td>" + res[$i].nomeAtividade + "</td><td>" + res[$i].localizacao + "</td><td>"
                                + res[$i].orcamento + "</td><td>" + res[$i].notas + "</td><td>";

                    }//fim do laço
                    html += "</tbody></table>";
                    $("#listaUtilizadores").html(html);
                    //coloco a variável html na tela

                }
            });
        });
    });

</script>



<script>

// Ajax post
    $(document).ready(function () {
        $(".submit1").click(function (event) {
            event.preventDefault();

            var id = $(this).attr('id');

            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "Tranche/verDetalhesAtuacao",
                dataType: 'json',
                data: {id: id},
                success: function (res) {

                    html = "<table class='table table-hover'><thead>";
                    html += "<tr><th>Nome</th><th>Localizacao</th><th>Orçamento</th><th>Notas</th></tr>";
                    html += "</thead><tbody>";
                    for ($i = 0; $i < res.length; $i++) {
                        html += "<tr><td>" + res[$i].designacao + "</td><td>" + res[$i].localizacao + "</td><td>"
                                + res[$i].orcamento + "</td><td>" + res[$i].notas + "</td><td>";

                    }//fim do laço
                    html += "</tbody></table>";
                    $("#listaUtilizadores").html(html);
                    //coloco a variável html na tela

                }
            });
        });
    });

</script>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>