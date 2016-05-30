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
                        <h3 class="box-title">Editar Quota</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->


                    <?php echo form_open('Quotas/guardarQuota'); ?>
                    <!--                <form method="post" action="utilizador/registarUtilizador" role="form">-->
                    <div class="box-body">  
<!--                        passar atributo ativo -->
                       <input name="idQuota" type="hidden" value="<?= $quota[0]->idQuota; ?>">
                       
                       <div class="col-md-6 form-group">
                            <label>Utilizador</label>
                            <input disabled="" type="t" name="nome" class="form-control" value="<?= $quota[0]->nome; ?>" >
                        </div> 
                       <div class="col-md-6 form-group">
                            <label>Data em que pretende fazer os pagamentos</label>
                            <input type="date"  name="dataAviso" class="form-control" value="<?= $quota[0]->dataAviso; ?>" >
                        </div>
                
                        <div class="col-md-4 form-group">
                            <label>Estado</label>
                            <input disabled="" type="text" class="form-control" name="tipo" value="<?= $quota[0]->tipo; ?>">
                        </div>

                       
                          
                      
                       
                    </div><!-- /.box-body -->
                    <p> <?php echo validation_errors(); ?></p>

                    <div class="box-footer">  
                        <button type="submit" value="upload" class="btn btn-primary">Atualizar</button>
                         <a class="btn" href="<?php echo site_url('Quotas'); ?>">Cancelar</a>
                         
                    </div>
                   
                    </form>

                </div><!-- /.box -->    
            </div>    


        </div>  
    </section>
</div><!-- /.content-wrapper -->

