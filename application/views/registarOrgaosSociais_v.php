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
   <div class="box-body">  

                    <?php echo form_open_multipart('OrgaosSociais/registarOrgaosSociais'); ?>
                    <!--                <form method="post" action="utilizador/registarUtilizador" role="form">-->
                 


                    <div class="col-md-6 form-group">
                        <label class="col-sm-2 control-label">Data</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="dataInicio" value="<?php echo set_value('participantes'); ?>" >
                        </div>
                    </div>






                        <div class="col-md-12">

                            <div class="box collapsed-box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">
                                        Direcção

                                    </h3>
                                    <div class="box-tools pull-right">
                                        <button data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-plus"></i></button>
                                    </div><!-- /.box-tools -->
                                </div><!-- /.box-header -->
                                <div class="box-body" >


                                    <div class="col-md-4 form-group">
                                        <label>Presidente:</label>
                                        <select class="form-control" name="check[]" required="">
                                            <option value="0" <?php echo set_select('utilizador_idUtilizador', '', TRUE); ?>>---</option>
                                            <?php foreach ($utilizador as $utilizadore) { ?>
                                                <option value=" <?= $utilizadore->idUtilizador ?>"  <?php echo set_select('utilizador_idUtilizador', $utilizadore->idUtilizador); ?>><?php echo $utilizadore->nome; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Vice-Presidente:</label>
                                        <select class="form-control" name="check[]" required="">
                                            <option value="0" <?php echo set_select('utilizador_idUtilizador', '', TRUE); ?>>---</option>
                                            <?php foreach ($utilizador as $utilizadore) { ?>
                                                <option value=" <?= $utilizadore->idUtilizador ?>" <?php echo set_select('utilizador_idUtilizador', $utilizadore->idUtilizador); ?>><?php echo $utilizadore->nome; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                      <div class="col-md-4 form-group">
                                        <label>Tesoureiro:</label>
                                        <select class="form-control" name="check[]" required="">
                                            <option value="0" <?php echo set_select('utilizador_idUtilizador', '', TRUE); ?>>---</option>
                                            <?php foreach ($utilizador as $utilizadore) { ?>
                                                <option value=" <?= $utilizadore->idUtilizador ?>" <?php echo set_select('utilizador_idUtilizador', $utilizadore->idUtilizador); ?>><?php echo $utilizadore->nome; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                      <div class="col-md-4 form-group">
                                        <label>1ªSecretario:</label>
                                        <select class="form-control" name="check[]" required="">
                                            <option value="0" <?php echo set_select('utilizador_idUtilizador', '', TRUE); ?>>---</option>
                                            <?php foreach ($utilizador as $utilizadore) { ?>
                                                <option value=" <?= $utilizadore->idUtilizador ?>" <?php echo set_select('utilizador_idUtilizador', $utilizadore->idUtilizador); ?>><?php echo $utilizadore->nome; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                     <div class="col-md-4 form-group">
                                        <label>2ªSecretario:</label>
                                        <select class="form-control" name="check[]" required="">
                                            <option value="0" <?php echo set_select('utilizador_idUtilizador', '', TRUE); ?>>---</option>
                                            <?php foreach ($utilizador as $utilizadore) { ?>
                                                <option value=" <?= $utilizadore->idUtilizador ?>" <?php echo set_select('utilizador_idUtilizador', $utilizadore->idUtilizador); ?>><?php echo $utilizadore->nome; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                     <div class="col-md-4 form-group">
                                        <label>Diretor Financeiro:</label>
                                        <select class="form-control" name="check[]" required="">
                                            <option value="0" <?php echo set_select('utilizador_idUtilizador', '', TRUE); ?>>---</option>
                                            <?php foreach ($utilizador as $utilizadore) { ?>
                                                <option value=" <?= $utilizadore->idUtilizador ?>" <?php echo set_select('utilizador_idUtilizador', $utilizadore->idUtilizador); ?>><?php echo $utilizadore->nome; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                      <div class="col-md-4 form-group">
                                        <label>Director Secretariado e Burocracia:</label>
                                        <select class="form-control" name="check[]" required="">
                                            <option value="0" <?php echo set_select('utilizador_idUtilizador', '', TRUE); ?>>---</option>
                                            <?php foreach ($utilizador as $utilizadore) { ?>
                                                <option value=" <?= $utilizadore->idUtilizador ?>" <?php echo set_select('utilizador_idUtilizador', $utilizadore->idUtilizador); ?>><?php echo $utilizadore->nome; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                     <div class="col-md-4 form-group">
                                        <label>Director Património e Administração Interna:</label>
                                        <select class="form-control" name="check[]" required="">
                                            <option value="0" <?php echo set_select('utilizador_idUtilizador', '', TRUE); ?>>---</option>
                                            <?php foreach ($utilizador as $utilizadore) { ?>
                                                <option value=" <?= $utilizadore->idUtilizador ?>" <?php echo set_select('utilizador_idUtilizador', $utilizadore->idUtilizador); ?>><?php echo $utilizadore->nome; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                     <div class="col-md-4 form-group">
                                        <label>Director Marketing e Comunicação:</label>
                                        <select class="form-control" name="check[]" required="">
                                            <option value="0" <?php echo set_select('utilizador_idUtilizador', '', TRUE); ?>>---</option>
                                            <?php foreach ($utilizador as $utilizadore) { ?>
                                                <option value=" <?= $utilizadore->idUtilizador ?>" <?php echo set_select('utilizador_idUtilizador', $utilizadore->idUtilizador); ?>><?php echo $utilizadore->nome; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                      <div class="col-md-4 form-group">
                                        <label>Director Social e Recreativo:</label>
                                        <select class="form-control" name="check[]" required="">
                                            <option value="0" <?php echo set_select('utilizador_idUtilizador', '', TRUE); ?>>---</option>
                                            <?php foreach ($utilizador as $utilizadore) { ?>
                                                <option value=" <?= $utilizadore->idUtilizador ?>" <?php echo set_select('utilizador_idUtilizador', $utilizadore->idUtilizador); ?>><?php echo $utilizadore->nome; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Director Prospecção e Arquivo:</label>
                                        <select class="form-control" name="check[]" required="">
                                            <option value="0" <?php echo set_select('utilizador_idUtilizador', '', TRUE); ?>>---</option>
                                            <?php foreach ($utilizador as $utilizadore) { ?>
                                                <option value=" <?= $utilizadore->idUtilizador ?>" <?php echo set_select('utilizador_idUtilizador', $utilizadore->idUtilizador); ?>><?php echo $utilizadore->nome; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Director Relações Externas:</label>
                                        <select class="form-control" name="check[]" required="">
                                            <option value="0" <?php echo set_select('utilizador_idUtilizador', '', TRUE); ?>>---</option>
                                            <?php foreach ($utilizador as $utilizadore) { ?>
                                                <option value=" <?= $utilizadore->idUtilizador ?>" <?php echo set_select('utilizador_idUtilizador', $utilizadore->idUtilizador); ?>><?php echo $utilizadore->nome; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                  
                                    
                                   
                                    
                                  





                                </div><!-- /.box-body -->
                            </div><!-- /.box -->


                            <!--   ---------------- Mesa da assembleia----------------------->
                            <div class="box collapsed-box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">
                                        Mesa Assembleia
                                    </h3>
                                    <div class="box-tools pull-right">
                                        <button data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-plus"></i></button>
                                    </div><!-- /.box-tools -->
                                </div><!-- /.box-header -->
                                <div class="box-body" >
                                    <div class="col-md-4 form-group">
                                        <label>Presidente:</label>
                                        <select class="form-control" name="check1[]" required="">
                                            <option value="0" <?php echo set_select('utilizador_idUtilizador', '', TRUE); ?>>---</option>
                                            <?php foreach ($utilizador as $utilizadore) { ?>
                                                <option value=" <?= $utilizadore->idUtilizador ?>" <?php echo set_select('utilizador_idUtilizador', $utilizadore->idUtilizador); ?>><?php echo $utilizadore->nome; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Vice-Presidente:</label>
                                        <select class="form-control" name="check1[]" required="">
                                            <option value="0" <?php echo set_select('utilizador_idUtilizador', '', TRUE); ?>>---</option>
                                            <?php foreach ($utilizador as $utilizadore) { ?>
                                                <option value=" <?= $utilizadore->idUtilizador ?>" <?php echo set_select('utilizador_idUtilizador', $utilizadore->idUtilizador); ?>><?php echo $utilizadore->nome; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Tesoureiro:</label>
                                        <select class="form-control" name="check1[]" required="">
                                            <option value="0" <?php echo set_select('utilizador_idUtilizador', '', TRUE); ?>>---</option>
                                            <?php foreach ($utilizador as $utilizadore) { ?>
                                                <option value=" <?= $utilizadore->idUtilizador ?>" <?php echo set_select('utilizador_idUtilizador', $utilizadore->idUtilizador); ?>><?php echo $utilizadore->nome; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                      <div class="col-md-4 form-group">
                                        <label>1ªSecretario:</label>
                                        <select class="form-control" name="check1[]" required="">
                                            <option value="0" <?php echo set_select('utilizador_idUtilizador', '', TRUE); ?>>---</option>
                                            <?php foreach ($utilizador as $utilizadore) { ?>
                                                <option value=" <?= $utilizadore->idUtilizador ?>" <?php echo set_select('utilizador_idUtilizador', $utilizadore->idUtilizador); ?>><?php echo $utilizadore->nome; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                     <div class="col-md-4 form-group">
                                        <label>2ªSecretario:</label>
                                        <select class="form-control" name="check1[]" required="">
                                            <option value="0" <?php echo set_select('utilizador_idUtilizador', '', TRUE); ?>>---</option>
                                            <?php foreach ($utilizador as $utilizadore) { ?>
                                                <option value=" <?= $utilizadore->idUtilizador ?>" <?php echo set_select('utilizador_idUtilizador', $utilizadore->idUtilizador); ?>><?php echo $utilizadore->nome; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                     <div class="col-md-4 form-group">
                                        <label>Diretor Financeiro:</label>
                                        <select class="form-control" name="check1[]" required="">
                                            <option value="0" <?php echo set_select('utilizador_idUtilizador', '', TRUE); ?>>---</option>
                                            <?php foreach ($utilizador as $utilizadore) { ?>
                                                <option value=" <?= $utilizadore->idUtilizador ?>" <?php echo set_select('utilizador_idUtilizador', $utilizadore->idUtilizador); ?>><?php echo $utilizadore->nome; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                      <div class="col-md-4 form-group">
                                        <label>Director Secretariado e Burocracia:</label>
                                        <select class="form-control" name="check1[]" required="">
                                            <option value="0" <?php echo set_select('utilizador_idUtilizador', '', TRUE); ?>>---</option>
                                            <?php foreach ($utilizador as $utilizadore) { ?>
                                                <option value=" <?= $utilizadore->idUtilizador ?>" <?php echo set_select('utilizador_idUtilizador', $utilizadore->idUtilizador); ?>><?php echo $utilizadore->nome; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                     <div class="col-md-4 form-group">
                                        <label>Director Património e Administração Interna:</label>
                                        <select class="form-control" name="check1[]" required="">
                                            <option value="0" <?php echo set_select('utilizador_idUtilizador', '', TRUE); ?>>---</option>
                                            <?php foreach ($utilizador as $utilizadore) { ?>
                                                <option value=" <?= $utilizadore->idUtilizador ?>" <?php echo set_select('utilizador_idUtilizador', $utilizadore->idUtilizador); ?>><?php echo $utilizadore->nome; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                     <div class="col-md-4 form-group">
                                        <label>Director Marketing e Comunicação:</label>
                                        <select class="form-control" name="check1[]" required="">
                                            <option value="0" <?php echo set_select('utilizador_idUtilizador', '', TRUE); ?>>---</option>
                                            <?php foreach ($utilizador as $utilizadore) { ?>
                                                <option value=" <?= $utilizadore->idUtilizador ?>" <?php echo set_select('utilizador_idUtilizador', $utilizadore->idUtilizador); ?>><?php echo $utilizadore->nome; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                      <div class="col-md-4 form-group">
                                        <label>Director Social e Recreativo:</label>
                                        <select class="form-control" name="check1[]" required="">
                                            <option value="0" <?php echo set_select('utilizador_idUtilizador', '', TRUE); ?>>---</option>
                                            <?php foreach ($utilizador as $utilizadore) { ?>
                                                <option value=" <?= $utilizadore->idUtilizador ?>" <?php echo set_select('utilizador_idUtilizador', $utilizadore->idUtilizador); ?>><?php echo $utilizadore->nome; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Director Prospecção e Arquivo:</label>
                                        <select class="form-control" name="check1[]" required="">
                                            <option value="0" <?php echo set_select('utilizador_idUtilizador', '', TRUE); ?>>---</option>
                                            <?php foreach ($utilizador as $utilizadore) { ?>
                                                <option value=" <?= $utilizadore->idUtilizador ?>" <?php echo set_select('utilizador_idUtilizador', $utilizadore->idUtilizador); ?>><?php echo $utilizadore->nome; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Director Relações Externas:</label>
                                        <select class="form-control" name="check1[]" required="">
                                            <option value="0" <?php echo set_select('utilizador_idUtilizador', '', TRUE); ?>>---</option>
                                            <?php foreach ($utilizador as $utilizadore) { ?>
                                                <option value=" <?= $utilizadore->idUtilizador ?>" <?php echo set_select('utilizador_idUtilizador', $utilizadore->idUtilizador); ?>><?php echo $utilizadore->nome; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                  
                                    
                                    
                                  
                                  


                                </div><!-- /.box-body -->
                            </div><!-- /.box -->


                            <!----------------conselho fiscal----------------------->
                            <div class="box collapsed-box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">
                                        Conselho Fiscal e Jurisdicional
                                    </h3>
                                    <div class="box-tools pull-right">
                                        <button data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-plus"></i></button>
                                    </div><!-- /.box-tools -->
                                </div><!-- /.box-header -->
                                <div class="box-body" >
                                    <div class="col-md-4 form-group">
                                        <label>Presidente:</label>
                                        <select class="form-control" name="check2[]" required="">
                                            <option value="0" <?php echo set_select('utilizador_idUtilizador', '', TRUE); ?>>---</option>
                                            <?php foreach ($utilizador as $utilizadore) { ?>
                                                <option value=" <?= $utilizadore->idUtilizador ?>" <?php echo set_select('utilizador_idUtilizador', $utilizadore->idUtilizador); ?>><?php echo $utilizadore->nome; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Vice-Presidente:</label>
                                        <select class="form-control" name="check2[]" required="">
                                            <option value="0" <?php echo set_select('utilizador_idUtilizador', '', TRUE); ?>>---</option>
                                            <?php foreach ($utilizador as $utilizadore) { ?>
                                                <option value=" <?= $utilizadore->idUtilizador ?>" <?php echo set_select('utilizador_idUtilizador', $utilizadore->idUtilizador); ?>><?php echo $utilizadore->nome; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                   <div class="col-md-4 form-group">
                                        <label>Tesoureiro:</label>
                                        <select class="form-control" name="check2[]" required="">
                                            <option value="0" <?php echo set_select('utilizador_idUtilizador', '', TRUE); ?>>---</option>
                                            <?php foreach ($utilizador as $utilizadore) { ?>
                                                <option value=" <?= $utilizadore->idUtilizador ?>" <?php echo set_select('utilizador_idUtilizador', $utilizadore->idUtilizador); ?>><?php echo $utilizadore->nome; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                      <div class="col-md-4 form-group">
                                        <label>1ªSecretario:</label>
                                        <select class="form-control" name="check2[]" required="">
                                            <option value="0" <?php echo set_select('utilizador_idUtilizador', '', TRUE); ?>>---</option>
                                            <?php foreach ($utilizador as $utilizadore) { ?>
                                                <option value=" <?= $utilizadore->idUtilizador ?>" <?php echo set_select('utilizador_idUtilizador', $utilizadore->idUtilizador); ?>><?php echo $utilizadore->nome; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                     <div class="col-md-4 form-group">
                                        <label>2ªSecretario:</label>
                                        <select class="form-control" name="check2[]" required="">
                                            <option value="0" <?php echo set_select('utilizador_idUtilizador', '', TRUE); ?>>---</option>
                                            <?php foreach ($utilizador as $utilizadore) { ?>
                                                <option value=" <?= $utilizadore->idUtilizador ?>" <?php echo set_select('utilizador_idUtilizador', $utilizadore->idUtilizador); ?>><?php echo $utilizadore->nome; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                     <div class="col-md-4 form-group">
                                        <label>Diretor Financeiro:</label>
                                        <select class="form-control" name="check2[]" required="">
                                            <option value="0" <?php echo set_select('utilizador_idUtilizador', '', TRUE); ?>>---</option>
                                            <?php foreach ($utilizador as $utilizadore) { ?>
                                                <option value=" <?= $utilizadore->idUtilizador ?>" <?php echo set_select('utilizador_idUtilizador', $utilizadore->idUtilizador); ?>><?php echo $utilizadore->nome; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                      <div class="col-md-4 form-group">
                                        <label>Director Secretariado e Burocracia:</label>
                                        <select class="form-control" name="check2[]" required="">
                                            <option value="0" <?php echo set_select('utilizador_idUtilizador', '', TRUE); ?>>---</option>
                                            <?php foreach ($utilizador as $utilizadore) { ?>
                                                <option value=" <?= $utilizadore->idUtilizador ?>" <?php echo set_select('utilizador_idUtilizador', $utilizadore->idUtilizador); ?>><?php echo $utilizadore->nome; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                     <div class="col-md-4 form-group">
                                        <label>Director Património e Administração Interna:</label>
                                        <select class="form-control" name="check2[]" required="">
                                            <option value="0" <?php echo set_select('utilizador_idUtilizador', '', TRUE); ?>>---</option>
                                            <?php foreach ($utilizador as $utilizadore) { ?>
                                                <option value=" <?= $utilizadore->idUtilizador ?>" <?php echo set_select('utilizador_idUtilizador', $utilizadore->idUtilizador); ?>><?php echo $utilizadore->nome; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                     <div class="col-md-4 form-group">
                                        <label>Director Marketing e Comunicação:</label>
                                        <select class="form-control" name="check2[]" required="">
                                            <option value="0" <?php echo set_select('utilizador_idUtilizador', '', TRUE); ?>>---</option>
                                            <?php foreach ($utilizador as $utilizadore) { ?>
                                                <option value=" <?= $utilizadore->idUtilizador ?>" <?php echo set_select('utilizador_idUtilizador', $utilizadore->idUtilizador); ?>><?php echo $utilizadore->nome; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                      <div class="col-md-4 form-group">
                                        <label>Director Social e Recreativo:</label>
                                        <select class="form-control" name="check2[]" required="">
                                            <option value="0" <?php echo set_select('utilizador_idUtilizador', '', TRUE); ?>>---</option>
                                            <?php foreach ($utilizador as $utilizadore) { ?>
                                                <option value=" <?= $utilizadore->idUtilizador ?>" <?php echo set_select('utilizador_idUtilizador', $utilizadore->idUtilizador); ?>><?php echo $utilizadore->nome; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Director Prospecção e Arquivo:</label>
                                        <select class="form-control" name="check2[]" required="">
                                            <option value="0" <?php echo set_select('utilizador_idUtilizador', '', TRUE); ?>>---</option>
                                            <?php foreach ($utilizador as $utilizadore) { ?>
                                                <option value=" <?= $utilizadore->idUtilizador ?>" <?php echo set_select('utilizador_idUtilizador', $utilizadore->idUtilizador); ?>><?php echo $utilizadore->nome; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Director Relações Externas:</label>
                                        <select class="form-control" name="check2[]" required="">
                                            <option value="0" <?php echo set_select('utilizador_idUtilizador', '', TRUE); ?>>---</option>
                                            <?php foreach ($utilizador as $utilizadore) { ?>
                                                <option value=" <?= $utilizadore->idUtilizador ?>" <?php echo set_select('utilizador_idUtilizador', $utilizadore->idUtilizador); ?>><?php echo $utilizadore->nome; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                  
                                   
                                    


                                </div><!-- /.box-body -->
                            </div><!-- /.box -->


                        </div>


                    </div><!-- /.box-body -->
                    <p> <?php echo validation_errors(); ?></p>

                    <div class="box-footer">  
                        <button type="submit" value="upload" onclick="return confirm('Depois de submeter não sera possivel voltar atrás, tem acerteza que pretende proseguir?');"class="btn btn-primary">Submit</button>
                    </div>
                    </form>




                </div><!-- /.box -->    
            </div>    



        </div><!-- /.box-body -->


    </section>
</div><!-- /.content-wrapper -->



