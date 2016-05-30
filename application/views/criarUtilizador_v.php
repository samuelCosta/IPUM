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
                        <!--                        passar atributos ocultos -->
                        <input type="hidden"  value="1" name="ativo" >
                        <input type="hidden"  value="0" name="socio" >

                        <div class="col-md-4 form-group">    
                            <label >Nome</label>
                            <input type="text" class="form-control" value="<?php echo set_value('nome'); ?>" name="nome" placeholder="Introduza o nome completo...">                     
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Alcunha</label>
                            <input type="text" class="form-control" value="<?php echo set_value('alcunha'); ?>" name="alcunha" placeholder="Introduza o alcunha...">
                        </div>


                        <div class="col-md-4 form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" placeholder="Introduza email">
                        </div>


                        <div class="col-md-4 form-group">
                            <label>NIF</label>
                            <input type="text" class="form-control" name="nif" value="<?php echo set_value('nif'); ?>" placeholder="Introduza o seu NIF">
                        </div>

                        <div class="col-md-4 form-group">
                            <label>BI</label>
                            <input type="text" class="form-control" name="bi" value="<?php echo set_value('bi'); ?>"placeholder="Introduza o número de BI">
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Nª aluno</label>
                            <input type="text" class="form-control" name="nAluno" value="<?php echo set_value('nAluno'); ?>" placeholder="Introduza o numero de aluno">
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" value="<?php echo set_value('password'); ?>" placeholder="Introduza uma Password">
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Repita a Password</label>
                            <input type="password" class="form-control" name="password2" value="<?php echo set_value('password2'); ?>" placeholder="Repita Password">
                        </div>



                        <div class="col-md-4 form-group">
                            <label>Data de Nascimento</label>
                            <input type="date" class="form-control" name="dataNascimento" value="<?php echo set_value('dataNascimento'); ?>">
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Data de Entrada</label>
                            <input type="date" class="form-control" name="dataEntrada" value="<?php echo set_value('dataEntrada'); ?>">
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
                            <input type="file"  name="foto" >
                            <p class="help-block">Se possivel insira uma foto.</p>
                        </div>

                    </div><!-- /.box-body -->
                    <input hidden id="showtoast" value="<?php echo validation_errors(); ?>">

                    <div class="box-footer">  
                        <button  type="submit" value="upload"    class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div><!-- /.box -->    
            </div>    
        </div>  
    </section>
</div><!-- /.content-wrapper -->



<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/toastr.js"></script>
<link href="<?= base_url(); ?>assets/build/toastr.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">


    toastr.options.closeButton = true;
    $(document).ready(function () {

        var shortCutFunction = "warning";

        var msg = $('#showtoast').val();
        var title = "AVISO!";

        if (!msg) {
        } else {

            toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
        }

    });

</script>

