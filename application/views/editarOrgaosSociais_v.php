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
                        <h3 class="box-title">Novo Elemento</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->


                    <?php echo form_open_multipart('utilizador/guardarAtualizacao'); ?>
                    <!--                <form method="post" action="utilizador/registarUtilizador" role="form">-->
                    <div class="box-body">  
<!--                        passar atributo ativo -->
                       <input name="idorgaosSociais" type="hidden" value="<?= $orgaosSociais[0]->idorgaosSociais; ?>">
                        
                        <div class="col-md-6 form-group">    
                            <label >Categoria</label>
                            <input type="text" class="form-control" value="<?= $orgaosSociais[0]->categoria; ?>" name="categoria" >                     
                        </div>
                       
                        <div class="col-md-6 form-group">
                            <label>Cargo</label>
                            <input type="text" class="form-control" name="cargo" value="<?= $orgaosSociais[0]->cargo; ?>">
                        </div>


                        <div class="col-md-6 form-group">
                            <label>Nome Utilizador</label>
                            <input type="text" class="form-control" value="<?= $orgaosSociais[0]->nome; ?>" name="">
                        </div>
                       

                        <div class="col-md-6 form-group">
                            <label>Data de Ínicio</label>
                            <input type="date" class="form-control" value="<?= $orgaosSociais[0]->dataInicio; ?>" >
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
