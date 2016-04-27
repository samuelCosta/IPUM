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
              
                
                
                
                

              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li <?php if($dado=="tab1"):?> class="active"><?php else:?>><?php endif;?> <a href="#tab_1" data-toggle="tab">Por Eventos</a></li>
                  <li <?php if($dado=="tab2"):?> class="active"><?php else:?>><?php endif;?><a href="#tab_2" data-toggle="tab">Por Ano</a></li>
                  <li><a href="#tab_3" data-toggle="tab">Por Elemento</a></li>
                
                 
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
              
                    
                      
                        <!--   ---------------  botão para pesquisar-->
                    <form action="<?= base_url() ?>utilizador/eventosUtilizadores" method="post" >
                        <div class="box-header">
                            <h3 class="box-title"></h3>

                            <div class="box-tools">
                                <div class="input-group" style="width: 400px;">
                                   
                                      <input type="text"  class="form-control input-sm pull-left" name="designacao" id="productname" placeholder="Pesquisar por eventos..." >      
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
                                        <td>  <?= $uti->email; ?> </td>
                                    </tr>
                          
                                   <?php }}else{ ?>
                                       <td>  Não existe resultados </td>                                      
                                   <?php  } ?>

                            </table>

                    </div><!-- /.box-body -->
                      
                      
                      
                      
                      
                    
                    
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                   
                      
                      
                      
                      
                      
                        <!--   ---------------  botão para pesquisar-->
                    <form action="<?= base_url() ?>utilizador/eventosPorAno" method="post" >
                        <div class="box-header">
                            <h3 class="box-title"></h3>

                            <div class="box-tools">
                                <div class="input-group" style="width: 400px;">
                                   
                                    <input type="text"  class="form-control input-sm pull-left" name="ano" id="productname" placeholder="Pesquisar por ano..." >      
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--                   ------------------------------ ----------------------->
                
                    <div id='result' class="box-body table-responsive no-padding">    
                        <form name="userForm" id="userForm" action="">
                            <table  class="table table-hover">
                                <tr>
                                    <th>Nome </th>
                                    <th>Data </th>

                                </tr>
                              
                                   <?php    if(isset($eventos)){
                                   
                                   foreach ($eventos as $uti) { ?>
                            
                                    <tr>
                                        <td >  <?= $uti->designacao; ?> </td>
                                        <td >  <?= $uti->dataEvento; ?> </td>
                                  
                                        <td ><input  type="submit" class="submit" class="input_box" > 
                                        </td> 
                                         <td> <input type="text" name="userName" id="userName" value=""> </td>
                                        <td><input type="button" onclick="javascript:makeAjaxCall(<?= $uti->designacao; ?>);" value="Submit"/>  </td>
                                        
                                     <td><div id='value'> </div </td>
                                        <td> <div id='value_pwd'></td>
                                         
                                    </tr>
                          
                                   <?php }}else{ ?>
                                       <td>  Não existe resultados </td>                                      
                                   <?php  } ?>

                            </table>
                        </form>
                    </div><!-- /.box-body -->
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_3">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    It has survived not only five centuries, but also the leap into electronic typesetting,
                    remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                    sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                    like Aldus PageMaker including versions of Lorem Ipsum.
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom -->
          
   
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
            </div>
        </div>
    </section>

</div><!-- /.content-wrapper -->

<!--
<div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="myModal" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <form action="<?= base_url() ?>utilizador/salvar_senha" method="post">
            <input id="idUsuario" name="idUtilizador" type="hidden" value="">


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
                            <input class="form-control" id="senha_antiga" name="senha_antiga" type="text" value="<?php $utilizador->nome?>">
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Nova Senha:</label>
                            <input class="form-control" id="senha_nova" name="senha_nova" onkeyup="checarSenha()" type="password">
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Confirmar Senha:</label>
                         O evento KeyUp Ocorre quando uma tecla do teclado é solta.
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
</div>-->

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $('#productname').autocomplete({
            source: "<?php echo site_url('utilizador/searchEventos/?'); ?>"
        });
    });
</script>
<!--
<script>
    $(document).ready(function(){
        $('#bttHello').click(function(){
           
           var fullname= = $('#fullname').val();
           $.ajax({
            type:'POST',
            data:{fullname: fullname},
            url:"http://localhost/IPUM/index.php/utilizador/verDetalhes",
            success: function(result){
                $('#result1').html(result);
            }
           });
        });
        
        
    });
    </script>-->
 
    
    <script>

// Ajax post
$(document).ready(function() {
$(".submit").click(function(event) {
event.preventDefault();
var user_name = $("input#name").val();
var password = $("input#pwd").val();
jQuery.ajax({
type: "POST",
url: "<?php echo base_url(); ?>" + "utilizador/user_data_submit/"+"<?php echo $uti->designacao; ?>",
dataType: 'json',
data: {name: user_name, pwd: password},
success: function(res) {
if (res)
{
// Show Entered Value
jQuery("div#result").show();
jQuery("div#value").html(res.username);
jQuery("div#value_pwd").html(res.pwd);
}
}
});
});
});
</script>


<script>
    
    
function makeAjaxCall(<?php $id ?> ){
	$.ajax({
		type: "GET",
		url: "http://localhost/IPUM/index.php/utilizador/verifyUser/"+'<?php $id ?>',
		cache: false,				
		success: function(json){						
		try{		
			var obj = jQuery.parseJSON(json);
			alert( obj['pwd']);
					
			
		}catch(e) {		
			alert('Exception while request..');
		}		
		},
		error: function(){						
			alert('Error while request..');
		}
 });
}
</script>