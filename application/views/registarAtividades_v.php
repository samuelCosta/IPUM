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


                        <div class="col-md-6 form-group">    
                            <label >Nome da Atividade</label>
                            <input type="text" class="form-control" value="<?php echo set_value('nomeAtividade'); ?>" name="nomeAtividade" placeholder="Introduza o nome da atividade...">                     
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Localização</label>
                            <input type="text" class="form-control" value="<?php echo set_value('localizacao'); ?>" name="localizacao" placeholder="Introduza a localização...">
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Número de Participantes</label>
                            <input type="number" class="form-control" name="participantes" value="<?php echo set_value('participantes'); ?>" placeholder="Introduza o número de participantes...">
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Total de Gastos</label>
                            <input type="number" class="form-control" step="0.01" name="totalGastos" value="<?php echo set_value('totalGastos'); ?>" placeholder="Introduza o total dos Gastos...">
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Notas</label>
                            <input type="text" class="form-control" name="notas" value="<?php echo set_value('notas'); ?>" placeholder="Introduza as Notas...">
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



