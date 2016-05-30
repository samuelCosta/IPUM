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
                        <h3 class="box-title">Editar Ensaio</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->


                    <?php echo form_open_multipart('Ensaios/guardarAtualizacao'); ?>
                    <!--                <form method="post" action="utilizador/registarUtilizador" role="form">-->
                    <div class="box-body">  
<!--                        passar atributo ativo -->
                       <input name="idEventos" type="hidden" value="<?= $Ensaios[0]->idEventos; ?>">
                       
                        
                                   
                       
                        <div class="col-md-6 form-group">
                            <label>Data de Ensaio</label>
                            <input type="date" name="dataEvento" class="form-control" value="<?= $Ensaios[0]->dataEvento; ?>" >
                        </div>
                    
                       
                        <div class="col-md-6 form-group">
                            <label>Localização</label>
                            <input type="text" class="form-control" name="localizacao" value="<?= $Ensaios[0]->localizacao; ?>">
                        </div>

                       
                      
                       
                    </div><!-- /.box-body -->
                     <input hidden id="showtoast" value="<?php echo validation_errors(); ?>">

                    <div class="box-footer">  
                        <button type="submit" value="upload" class="btn btn-primary">Atualizar</button>
                         <a class="btn" href="<?php echo site_url('Ensaios/consultarEnsaios'); ?>">Cancelar</a>
                    </div>
                   
                    </form>

                </div><!-- /.box -->    
            </div>    


        </div>  
    </section>
</div><!-- /.content-wrapper -->



<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/toastr.js"></script>
 <link href="<?= base_url(); ?>assets/build/toastr.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">


        toastr.options.closeButton = true;
        $(document).ready(function () {
            
            var shortCutFunction = "warning";
//            var erro = "error";
            
            var msg = $('#showtoast').val();
            var title = "Erros";
  
            
          if(!msg ){
          }else{
       
             toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
           
        }
         
        });

     
      
     
    
</script>

