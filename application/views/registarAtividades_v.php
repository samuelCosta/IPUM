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
                        <h3 class="box-title">Registar Atividades</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->


                    <?php echo form_open_multipart('Atividades/registarAtividades'); ?>
                    <!--                <form method="post" action="utilizador/registarUtilizador" role="form">-->
                    <div class="box-body">  

                        <input type="hidden"  value="1" name="estado" >
                        <div class="col-md-6 form-group">    
                            <label >Nome da Atividade*</label>
                            <input type="text" class="form-control" value="<?php echo set_value('nomeAtividade'); ?>" name="nomeAtividade" placeholder="Introduza o nome da atividade...">                     
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Localização*</label>
                            <input type="text" class="form-control" value="<?php echo set_value('localizacao'); ?>" name="localizacao" placeholder="Introduza a localização...">
                        </div>
                        
                        <div class="col-md-6 form-group">
                            <label>Data de Início*</label>
                            <input type="date" class="form-control" value="<?php echo set_value('dataInicio'); ?>" name="dataInicio" placeholder="Introduza a data de início...">
                        </div>
                        
                        <div class="col-md-6 form-group">
                            <label>Duração (em dias)*</label>
                            <input type="number" class="form-control" name="duracao" value="<?php echo set_value('duracao'); ?>" placeholder="Introduza a duração da atividade...">
                        </div>
                        
                        <div class="col-md-6 form-group">
                            <label>Orçamento*</label>
                            <input type="number" step="0.01" class="form-control" name="orcamento" value="<?php echo set_value('orcamento'); ?>" placeholder="Introduza o orçamento...">
                        </div>
                 


                    </div><!-- /.box-body -->
                    <input hidden id="showtoast" value="<?php echo validation_errors(); ?>">

                    <div class="box-footer">  
                        <button type="submit" value="upload" class="btn btn-primary">Registar</button>
                         <a class="btn" href="<?php echo site_url('Atividades/consultarAtividades'); ?>">Cancelar</a>
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

