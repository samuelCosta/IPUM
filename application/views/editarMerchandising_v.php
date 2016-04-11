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


                    <?php echo form_open_multipart('Merchandising/guardarAtualizacao'); ?>
                    <!--                <form method="post" action="utilizador/registarUtilizador" role="form">-->
                    <div class="box-body">  
<!--                        passar atributo ativo -->
                        <input type="hidden"  value="<?= $merchandising[0]->idStockMerchandising; ?>" name="idStockMerchandising" >
                        
                        <div class="col-md-6 form-group">    
                            <label >Tipo de Merchandising</label>
                            <input type="text" class="form-control" value="<?= $merchandising[0]->tipo; ?>" name="tipo">                     
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Quantidade</label>
                            <input type="text" class="form-control" value="<?= $merchandising[0]->quantidade; ?>" name="quantidade">
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Localização</label>
                            <input type="text" class="form-control" value="<?= $merchandising[0]->localizacao; ?>" name="localizacao">
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



