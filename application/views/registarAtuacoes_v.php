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


                    <?php echo form_open_multipart('Atuacoes/registarAtuacoes'); ?>
                    <!--                <form method="post" action="utilizador/registarUtilizador" role="form">-->
                    <div class="box-body">  
                         <input type="hidden"  value="atuação" name="designacao" >

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
                            <label>Pessoa Responsável</label>
                            <input type="text" class="form-control"  name="responsavel" value="<?php echo set_value('responsavel'); ?>" placeholder="Introduza a pessoa responsavel...">
                        </div>
                        
                           <div class="col-md-6 form-group">
                            <label>Contacto</label>
                            <input type="text" class="form-control" name="contacto" value="<?php echo set_value('contacto'); ?>" placeholder="Introduza o contacto...">
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Despesa</label>
                            <input type="number" step="0.01" class="form-control" name="despesa" value="<?php echo set_value('despesa'); ?>" placeholder="Introduza as despesas...">
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



