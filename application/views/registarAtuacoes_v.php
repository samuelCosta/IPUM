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
                        <h3 class="box-title">Registar Atuações</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->


                    <?php echo form_open('Atuacoes/registarAtuacoes'); ?>
                    <!--                <form method="post" action="utilizador/registarUtilizador" role="form">-->
                    <div class="box-body">  
                         <input type="hidden"  value="atuação" name="tipo" >
                         <input type="hidden"  value="1" name="estado" >
                         
                        <div class="col-md-6 form-group">
                            <label>Nome da Atuação</label>
                            <input type="text" class="form-control" name="designacao" value="<?php echo set_value('designacao'); ?>" placeholder="Introduza o nome da atuação...">
                        </div>

                        <div class="col-md-6 form-group">    
                            <label >Data</label>
                            <input type="date" class="form-control" value="<?php echo set_value('dataEvento'); ?>" name="dataEvento">                     
                        </div>
<!--                        alterar na base de dados-->
                        <div class="col-md-6 form-group">
                            <label>Localização</label>
                            <input type="text" class="form-control" value="<?php echo set_value('localizacao'); ?>" name="localizacao" placeholder="Introduza a localização...">
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Orçamento</label>
                            <input type="number" step="0.01" class="form-control" name="orcamento" value="<?php echo set_value('orcamento'); ?>" placeholder="Introduza o orcamento...">
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Pessoa Responsável Pela Atuação</label>
                            <input type="text" class="form-control"  name="responsavel" value="<?php echo set_value('responsavel'); ?>" placeholder="Introduza a pessoa responsavel...">
                        </div>
                        

                           <div class="col-md-6 form-group">
                            <label>Contacto</label>
                            <input type="text" class="form-control" name="contacto" value="<?php echo set_value('contacto'); ?>" placeholder="Introduza o contacto...">
                        </div>


                    </div><!-- /.box-body -->
                    <input hidden id="showtoast" value="<?php echo validation_errors(); ?>">

                    <div class="box-footer">  
                        <button type="submit" value="upload" class="btn btn-primary">Submit</button>
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
                                var title = "AVISO!";


                                if (!msg) {
                                } else {

                                    toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists

                                }

                            });





</script>