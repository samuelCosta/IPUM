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
                        <h3 class="box-title">Novo Instrumento</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->


                    <?php echo form_open_multipart('Musica/registarMusica'); ?>
                    <!--                <form method="post" action="utilizador/registarUtilizador" role="form">-->
                    <div class="box-body">  
<!--                        passar atributo ativo -->
                        <input type="hidden"  value="1" name="ativo" >
                        
                        <div class="col-md-6 form-group">    
                            <label >Nome da Música</label>
                            <input type="text" class="form-control" value="<?php echo set_value('nomeMusica'); ?>" name="nomeMusica" placeholder="Introduza a Música...">                     
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Vídeo</label>
                            <input type="text" class="form-control" value="<?php echo set_value('video'); ?>" name="video" placeholder="Introduza o Vídeo...">
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



