!-- Content Wrapper. Contains page content -->
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
                       <input name="idEvento" type="hidden" value="<?= $Ensaios[0]->idEvento; ?>">
                        
                      
                       
                       
                        <div class="col-md-6 form-group">
                            <label>Data de Ensaio</label>
                            <input type="date" name="dataEvento" class="form-control" value="<?= $Ensaios[0]->dataEvento; ?>" >
                        </div>
                    
                       
                        <div class="col-md-6 form-group">
                            <label>Localização</label>
                            <input type="text" class="form-control" name="local" value="<?= $Ensaios[0]->local; ?>">
                        </div>

                       
                      
                       
                    </div><!-- /.box-body -->
                    <p> <?php echo validation_errors(); ?></p>

                    <div class="box-footer">  
                        <button type="submit" value="upload" class="btn btn-primary">Submit</button>
                         <a class="btn btn-danger" href="<?= base_url('Ensaios/encerrarEnsaio/' . $Ensaios[0]->idEvento) ?>"  onclick="return confirm('Deseja realmente finalizar o Ensaio?');">Finalizar</a> 
                    </div>
                   
                    </form>

                </div><!-- /.box -->    
            </div>    


        </div>  
    </section>
</div><!-- /.content-wrapper -->

