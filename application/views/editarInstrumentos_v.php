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
                        <h3 class="box-title">Editar Instrumento</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->


                    <?php echo form_open_multipart('Instrumentos/guardarAtualizacao'); ?>
                    <!--                <form method="post" action="utilizador/registarUtilizador" role="form">-->
                    <div class="box-body">  
<!--                        passar atributo ativo -->
                        <input type="hidden"  value="<?= $instrumentos[0]->idInstrumentos; ?>" name="idInstrumentos" >
                        
                        <div class="col-md-6 form-group">    
                            <label >Instrumento</label>
                            <input type="text" class="form-control" value="<?= $instrumentos[0]->instrumento; ?>" name="instrumento">                     
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Estado</label>
                            <input type="text" class="form-control" value="<?= $instrumentos[0]->estado; ?>" name="estado" >
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Tipo</label>
                            <input type="text" class="form-control" value="<?= $instrumentos[0]->tipo; ?>" name="tipo" >
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Tamanho</label>
                            <input type="text" class="form-control" value="<?= $instrumentos[0]->tamanho; ?>" name="tamanho" >
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Localização</label>
                            <input type="text" class="form-control" value="<?= $instrumentos[0]->localizacao; ?>" name="localizacao" >
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Ultima Manutenção</label>
                            <input type="text" class="form-control" value="<?= $instrumentos[0]->dataUltimaManutencao; ?>" name="dataUltimaManutencao" >
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Tipo Manutenção</label>
                            <input type="text" class="form-control" value="<?= $instrumentos[0]->manutencao; ?>" name="manutencao">
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



