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
                        <h3 class="box-title">Novo Elemento</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->


                    <?php echo form_open_multipart('utilizador/guardarAtualizacao'); ?>
                    <!--                <form method="post" action="utilizador/registarUtilizador" role="form">-->
                    <div class="box-body">  
<!--                        passar atributo ativo -->
                       <input name="idUtilizador" type="hidden" value="<?= $utilizador[0]->idUtilizador; ?>">
                        
                        <div class="col-md-6 form-group">    
                            <label >Nome</label>
                            <input type="text" class="form-control" value="<?= $utilizador[0]->nome; ?>" name="nome" >                     
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Alcunha</label>
                            <input type="text" class="form-control" value="<?= $utilizador[0]->alcunha; ?>" name="alcunha" placeholder="Introduza o alcunha...">
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control" name="email" value="<?= $utilizador[0]->email; ?>" placeholder="Introduza email">
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" value="<?= $utilizador[0]->password; ?>" placeholder="Password">
                        </div>

                     

                        <div class="col-md-4 form-group">
                            <label>NIF</label>
                            <input type="text" class="form-control" name="nif" value="<?= $utilizador[0]->nif; ?>" placeholder="Introduza o NIF">
                        </div>

                        <div class="col-md-4 form-group">
                            <label>BI</label>
                            <input type="text" class="form-control" name="bi" value="<?= $utilizador[0]->bi; ?>"placeholder="Introduza o numero de BI">
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Data Nascimento</label>
                            <input type="date" class="form-control" name="dataNascimento" value="<?= $utilizador[0]->dataNascimento; ?>">
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Cargo</label>
                            <select class="form-control" name="cargo">                                
                                <option value="">---</option>                              
                                <option  value="Administrador" <?= $utilizador[0]->cargo == 'Administrador' ? ' selected ' : ''; ?>> Administrador</option>
                                <option  value="Utilizador" <?= $utilizador[0]->cargo == 'Utilizador' ? ' selected ' : ''; ?>> Utilizador </option>
                            </select>     
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



