<
                            
                               <input class=" btn btn-default btn-block active" data-target="#myModal2" data-toggle="modal" type="button" value="Tornar Sócio">
                         
                           <input class=" btn btn-default btn-block active" data-target="#myModal" data-toggle="modal" type="button" value="Atualizar Password">
                    

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
    
function imprimir() {
    window.open("<?= base_url('utilizador/comprovativoSocio/') ?>");
}
</script>