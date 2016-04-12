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
                        <h3 class="box-title">Elemento</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->


                    <?php echo form_open_multipart('utilizador/guardarAtualizacao'); ?>
                    <!--                <form method="post" action="utilizador/registarUtilizador" role="form">-->
                    <div class="box-body">  
<!--                        passar atributo ativo -->
                       <input name="idUtilizador" type="hidden" value="<?= $utilizador[0]->idUtilizador; ?>">
                        
                        <div class="col-md-6 form-group">    
                            <label >Nome</label>
                            <input type="text" class="form-control" value="<?= $utilizador[0]->nome; ?>" name="nome" >                     
                        </div>
                       
                        <div class="col-md-6 form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control" name="email" value="<?= $utilizador[0]->email; ?>" placeholder="Introduza email">
                        </div>


                        <div class="col-md-4 form-group">
                            <label>Alcunha</label>
                            <input type="text" class="form-control" value="<?= $utilizador[0]->alcunha; ?>" name="alcunha" placeholder="Introduza o alcunha...">
                        </div>
                       

                        <div class="col-md-4 form-group">
                            <label>NIF</label>
                            <input type="text" class="form-control" name="nif" value="<?= $utilizador[0]->nif; ?>" placeholder="Introduza o NIF">
                        </div>

                        <div class="col-md-4 form-group">
                            <label>BI</label>
                            <input type="text" class="form-control" name="bi" value="<?= $utilizador[0]->bi; ?>"placeholder="Introduza o numero de BI">
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Data Nascimento</label>
                            <input type="date" class="form-control" name="dataNascimento" value="<?= $utilizador[0]->dataNascimento; ?>">
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Privilegio</label>
                            <select class="form-control" name="privilegio">                                                            
                                <option  value="Administrador" <?= $utilizador[0]->privilegio == 'Administrador' ? ' selected ' : ''; ?>> Administrador</option>
                                <option  value="Utilizador" <?= $utilizador[0]->privilegio == 'Utilizador' ? ' selected ' : ''; ?>> Utilizador </option>
                            </select>     
                        </div>
                       
                          <div class="col-md-4 form-group">
                            <label>Estado</label>
                            <select class="form-control" name="ativo">                                                            
                                <option  value="1" <?= $utilizador[0]->ativo == '1' ? ' selected ' : ''; ?>> Ativo</option>
                                <option  value="0" <?= $utilizador[0]->ativo == '0' ? ' selected ' : ''; ?>> Não Ativo </option>
                            </select>     
                        </div>
                    
                       
                       <!--                       Alteracao da password é feita em java script-->
                       

                       <?php if ($utilizador[0]->socio == 1) { ?>
                           <div class="col-md-4 form-group">
                               <label>Sócio</label>
                               <select class="form-control" name="socio">                                                            
                                   <option  value="1" <?= $utilizador[0]->socio == '1' ? ' selected ' : ''; ?>> Sócio</option>
                                   <option  value="0" <?= $utilizador[0]->socio == '0' ? ' selected ' : ''; ?>> Não Sócio </option>
                               </select>     
                           </div>
                       <?php } else { ?>
                           <div class="col-md-3 form-group">
                               <label>Sócio</label>
                               <input class=" btn btn-default btn-block active" data-target="#myModal2" data-toggle="modal" type="button" value="Tornar Sócio">
                           </div>
                        <input name="socio" type="hidden" value="<?= $utilizador[0]->socio; ?>">

                       <?php } ?>
                        
                        <div class="col-md-3 form-group">
                           <label>Password</label>
                           <input class=" btn btn-default btn-block active" data-target="#myModal" data-toggle="modal" type="button" value="Atualizar Password">
                       </div>                       

                    </div><!-- /.box-body -->
                    <p> <?php echo validation_errors(); ?></p>

                    <div class="box-footer">  
                        <button type="submit" value="upload" class="btn btn-primary">Submit</button>
                    </div>
                    </form>

                </div><!-- /.box -->    
            </div>    


        </div>  
    </section>
</div><!-- /.content-wrapper -->

<!-------------------------------------FORMULARIO PARA ALTERAR SENHA------------------------------>


<div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="myModal" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <form action="<?= base_url() ?>utilizador/salvar_senha" method="post">
            <input id="idUsuario" name="idUtilizador" type="hidden" value="<?= $utilizador[0]->idUtilizador; ?>">


            <div class="modal-content">
                <div class="modal-header">
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>


                    <h4 class="modal-title" id="myModalLabel">
                        Atualizar Password</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label >Senha antiga:</label>
                            <input class="form-control" id="senha_antiga" name="senha_antiga" type="password">
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Nova Senha:</label>
                            <input class="form-control" id="senha_nova" name="senha_nova" onkeyup="checarSenha()" type="password">
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Confirmar Senha:</label>
<!--                         O evento KeyUp Ocorre quando uma tecla do teclado é solta.-->
                            <input class="form-control" id="senha_confirmar" name="senha_confirmar" onkeyup="checarSenha()" type="password">
                        </div>
                        <div class="col-md-12 form-group">
                            <div id="divcheck">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal" type="button">Fechar</button>
                    <button class="btn btn-primary" disabled="" id="enviarsenha" type="submit">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!--------------------------------FORMULARIO PARA A DATA DE ENTRADA DO SOCIO------------------------------->


<div aria-hidden="true" aria-labelledby="myModalLabel2" class="modal fade" id="myModal2" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <form action="<?= base_url() ?>utilizador/alterarDataSocio" method="post">
            <input id="idUsuario" name="idUtilizador" type="hidden" value="<?= $utilizador[0]->idUtilizador; ?>">
             <input id="idUsuario" name="socio" type="hidden" value="1">


            <div class="modal-content">
                <div class="modal-header">
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>


                    <h4 class="modal-title" id="myModalLabel2">
                        Sócio</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        
                        <div class="col-md-12 form-group">
                            <label>Data sócio:</label>
                            <input class="form-control" id="dataSocio" name="dataSocio" onchange="alterarSocio()" type="date">
                        </div>
                      <div class="col-md-12 form-group">
                            <div id="divcheck2">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal" type="button">Fechar</button>
                    <button class="btn btn-primary" disabled="" id="enviarsocio" type="submit">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>




<script>
////    ACHO QUE NAO PRECISO DISTO
//    $(document).ready(function () {
////   O evento KeyUp Ocorre quando uma tecla do teclado é solta.
//        $("#senha_nova").keyup(checkPasswordMatch);
//        $("#senha_confirmar").keyup(checkPasswordMatch);
//
//    });
    function checarSenha() {
        var password = $("#senha_nova").val();
        var confirmPassword = $("#senha_confirmar").val();
        

        if (password == '' || '' == confirmPassword) {
            $("#divcheck").html("<span style='color: red'>Campo de senha vazio!</span>");
            document.getElementById("enviarsenha").disabled = true;
        } else if (password != confirmPassword) {
            $("#divcheck").html("<span style='color: red'>Senhas não conferem!</span>");
            document.getElementById("enviarsenha").disabled = true;
        } else {
            $("#divcheck").html("<span style='color: green'>Senha iguais!</span>");           
            document.getElementById("enviarsenha").disabled = false;
        }
    }
    
    function alterarSocio(){
        var socio = $("#dataSocio").val();
      
        if(socio != ''){
             document.getElementById("enviarsocio").disabled = false;            
        }else            
        document.getElementById("enviarsocio").disabled = true;
        
    
    }
</script>