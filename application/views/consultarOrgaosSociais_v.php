<?php setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');?>



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

    <section class="content"  onload="iniciar()">
        
        
        <div class="row">
            <div class="col-xs-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Lista de Orgãos Sociais</h3>
                    </div><!-- /.box-header -->
                    
         
                        
                        <div class="box-body">

                            <div class="btn-group">
                                <?php if ($orgaosSociais != Null) { ?>
                                <button value=" <?= $orgaosSociais[0]->dataInicio; ?>" type="button" class="org btn btn-default"> <strong> Data de Posse do Mandato:</strong> <?= strftime(' %d de %B de %Y', strtotime($orgaosSociais[0]->dataInicio)); ?> </button>


 <?php } else { ?>
                                    <button value="" disabled="" type="button" class="org btn btn-default">Não Existe Orgaos Sociais em Execução</button>
                                <?php } ?>


                                <div class="btn-group">
                                    <button type="button" class="btn btn-info-outline dropdown-toggle" data-toggle="dropdown">
                                        Historico Orgãos Sociais  <span class="caret"></span>
                                    </button>

                                    <ul class="dropdown-menu">
                                        <?php foreach ($orgaosSociaisHistorico as $orge) { ?>

                                            <li><a value=" <?= $orge->dataInicio; ?>" class="org" ><?php echo $orge->dataInicio; ?> - <?php echo $orge->dataFim; ?></a></li>

                                        <?php } ?>  
                                    </ul>

                                </div>         


                            </div>
                            <br>
                            <br>
                            <br>
                            
                           

                    <div id="listaOrgaosSociais" class="col-md-12" >
                                <div class="col-md-12">
                                    <div class="box box-solid">
                                        <div class="box-header with-border">
                                            <i class="fa fa-text-width"></i>
                                            <h3 class="box-title">Nota</h3>
                                        </div><!-- /.box-header -->
                                        <div class="box-body">
                                            <dl class="dl-horizontal">
                                                <dt>Nota</dt>
                                                <dd>Cada elemento pode imprimir seu certificado na sua pagina de Utilizador.</dd>
                                            </dl>
                                        </div><!-- /.box-body -->
                                    </div><!-- /.box -->
                                </div><!-- ./col -->
            
                </div>
              
                     </div>
                 </div>
                     </div>

                        </div>
        
        
              
            
    </section>
</div><!-- /.content-wrapper -->


<!--------------------------------FORMULARIO PARA  encerrar Orgaos------------------------------>


<div aria-hidden="true" aria-labelledby="myModalLabel2" class="modal fade" id="myModal2" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <form action="<?= base_url() ?>OrgaosSociais/encerrarMandato" method="post">
            <input  name="dataInicio" type="hidden" value="<?= $orgaosSociais[0]->dataInicio; ?>">



            <div class="modal-content">
                <div class="modal-header">
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>


                    <h4 class="modal-title" id="myModalLabel2">
                        Orgãos Sociais</h4>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-12 form-group">
                            <label>Data Encerramento:</label>
                            <input class="form-control" id="dataFim" name="dataFim" onchange="encerrar()" type="date">
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

// Ajax post
    $(document).ready(function () {
        $(".org").click(function (event) {
            event.preventDefault();

            var data = $(this).attr('value');

//        alert(data);
//var user_name = $("input#name").val();

            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "OrgaosSociais/anoOrgaosSociais",
                dataType: 'json',
                data: {data: data},
                success: function (res) {

                    html = "<div class='col-md-12'>";
                    html += "<div class='box box-solid'>";
//                    html += " <i class='fa fa-text-width'></i>";
                    if (res[0].dataFim == null) {
                        html += "<a  title='Encerrar' data-target='#myModal2' data-toggle='modal' class='btn-lg pull-right'> <i class='fa fa-power-off'></i> Encerrar </a>";
                    }
                    html += " <h4 class='box-title col-md-4'>Data de Inicio: " + res[0].dataInicio + "</h4>";
//                    if (res[0].dataFim == null) {
//                        html += "<div class='col-md-4'> <a  title='Encerrar' data-target='#myModal2' data-toggle='modal' class='btn-lg'> <i class='fa fa-power-off'></i> </a></div>";
//                    }
                    html += "<div class='box-body col-md-12'>"; 
                      html += "<div class='col-md-4'>";
//                    html += " <dl class='dl-horizontal col-md-4'>";
                    html += " <ul> <dt><u> <h4> Direcção </h4></u></dt>";
                    for ($i = 0; $i < res.length; $i++) {
                        if (res[$i].categoria == "Direcção") {

                            html += "  <li> <dd ><strong>" + res[$i].cargo + ": </strong>" + res[$i].nome + ".</dd> </li>";
                            //  html += "<tr><td>" + res[$i].categoria + "</td><td>" + res[$i].cargo +"</td><td>" + res[$i].nome + "</td>";
                            //  html += "<td> <a data-toggle='tooltip' title='Encerrar' class='btn-lg'> <i class='fa fa-power-off'></i> </a> </td></tr>";
                        }
                       
                    }
                     html += "</dl></div></ul>"
                    
//                    html += " <dl class='dl-horizontal col-md-4'>";
                    html += "<div class='col-md-4'>";
                    html += "<ul> <dt ><u> <h4>Mesa Assembleia</h4></u></dt>";
                    for ($i = 0; $i < res.length; $i++) {
                        if (res[$i].categoria == "Mesa Assembleia") {
                            html += "  <li> <dd ><strong>" + res[$i].cargo + ": </strong>" + res[$i].nome + ".</dd> </li>";

                        }
                          
                    }
                    html += "</dl></div></ul>"
//                
//                    html += " <dl class='dl-horizontal col-md-4'>";
                    html += "<div class='col-md-4'>";
                    html += " <ul> <dt ><u> <h4>Conselho Fiscal e Jurisdicional</h4></u></dt>";
                    for ($i = 0; $i < res.length; $i++) {
                        if (res[$i].categoria == "Conselho Fiscal e Jurisdicional") {
                            html += "  <li> <dd><strong>" + res[$i].cargo + ": </strong>" + res[$i].nome + ".</dd></li>";

                        }
                       


                    }//fim do laço
                       html += "</dl></div></ul>"
                    html += "</div></div></div>";


                    $("#listaOrgaosSociais").html(html);

                    //coloco a variável html na tela

                }
            });
        });
    });

</script>
<script>
    function encerrar() {
        var socio = $("#dataFim").val();

        if (socio != '') {
            document.getElementById("enviarsocio").disabled = false;
        } else
            document.getElementById("enviarsocio").disabled = true;


    }
</script>

<script language="JavaScript"> 
function iniciar(){ 
   	if (confirm("Esta página está muito legal (como pode ser vista). Dê o seu voto!")){ 
      	window.open("http://www.oquefor.com/votar.php?idvoto=12111","","") 
   	} 
} 
</script> 