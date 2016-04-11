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
                        <h3 class="box-title">Registar Orgãos Sociais </h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->


                    <?php echo form_open_multipart('OrgaosSociais/registarOrgaosSociais'); ?>
                    <!--                <form method="post" action="utilizador/registarUtilizador" role="form">-->
                    <div class="box-body">  
                        
                           <div class="col-md-6 form-group">
                            <label>Categoria</label>
                            <select class="form-control" name="categoria">
                                <option value="" <?php echo set_select('categoria', '', TRUE); ?> >---</option>
                                <option value="Direção" <?php echo set_select('categoria', 'Direção'); ?> >Direção</option>
                                <option value="Mesa da Assembleia" <?php echo set_select('categoria', 'Mesa da Assembleia'); ?> >Mesa da Assembleia</option>
                                <option value="Conselho Fiscal e Jurisdicional" <?php echo set_select('categoria', 'Conselho Fiscal e Jurisdicional'); ?> >Conselho Fiscal e Jurisdicional</option>
                                 
                            </select>     
                        </div>
                        


                       
                        <div class="col-md-6 form-group">
                            <label>Cargo</label>
                            <input type="text" class="form-control" value="<?php echo set_value('cargo'); ?>" name="cargo" placeholder="Introduza o cargo...">
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Data</label>
                            <input type="date" class="form-control" name="dataInicio" value="<?php echo set_value('participantes'); ?>" >
                        </div>

                      

                        <div class="col-md-6 form-group">
                            <label>Utilizadores:</label>
                            <select class="form-control" name="utilizador_idUtilizador" required="">
                                <option value="" <?php echo set_select('utilizador_idUtilizador', '', TRUE); ?>>---</option>
                                <?php foreach ($utilizador as $utilizador) { ?>
                                    <option value=" <?= $utilizador->idUtilizador ?>" <?php echo set_select('utilizador_idUtilizador', $utilizador->idUtilizador ); ?>><?php echo $utilizador->nome; ?></option>
                                <?php } ?>
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



