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


                    <?php echo form_open_multipart('utilizador/registarUtilizador'); ?>
                    <!--                <form method="post" action="utilizador/registarUtilizador" role="form">-->
                    <div class="box-body">  
<!--                        passar atributo ativo -->
                        <input type="hidden"  value="1" name="ativo" >
                        
                        <div class="col-md-6 form-group">    
                            <label >Nome</label>
                            <input type="text" class="form-control" value="<?php echo set_value('nome'); ?>" name="nome" placeholder="Introduza o nome...">                     
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Alcunha</label>
                            <input type="text" class="form-control" value="<?php echo set_value('alcunha'); ?>" name="alcunha" placeholder="Introduza o alcunha...">
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" placeholder="Introduza email">
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" value="<?php echo set_value('password'); ?>" placeholder="Password">
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Repita a Password</label>
                            <input type="password" class="form-control" name="password2" value="<?php echo set_value('password2'); ?>" placeholder="Repita Password">
                        </div>

                        <div class="col-md-4 form-group">
                            <label>NIF</label>
                            <input type="text" class="form-control" name="nif" value="<?php echo set_value('nif'); ?>" placeholder="Introduza o NIF">
                        </div>

                        <div class="col-md-4 form-group">
                            <label>BI</label>
                            <input type="text" class="form-control" name="bi" value="<?php echo set_value('bi'); ?>"placeholder="Introduza o numero de BI">
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Data Nascimento</label>
                            <input type="date" class="form-control" name="dataNascimento" value="<?php echo set_value('dataNascimento'); ?>">
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Privilégios</label>
                            <select class="form-control" name="privilegio">
                                <option value="" <?php echo set_select('privilegio', '', TRUE); ?> >---</option>
                                <option value="Administrador" <?php echo set_select('privilegio', 'Administrador'); ?> >Administrador</option>
                                <option value="Utilizador" <?php echo set_select('privilegio', 'Utilizador'); ?> >Utilizador</option>
                            </select>     
                        </div>

                        <div class="col-md-12 form-group">
                            <label for="exampleInputFile">Foto</label>
                            <input type="file"  name="foto" size="20">
                            <p class="help-block">Se possivel insira uma foto.</p>
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



