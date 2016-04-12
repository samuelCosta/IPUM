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


                    <?php echo form_open_multipart('OrgaosSociais/guardarAtualizacao'); ?>
                    <!--                <form method="post" action="utilizador/registarUtilizador" role="form">-->
                    <div class="box-body">  
<!--                        passar atributo ativo -->
                       <input name="idorgaosSociais" type="hidden" value="<?= $orgaosSociais[0]->idorgaosSociais; ?>">
                        
                      
                       
                       <div class="col-md-6 form-group">
                            <label>Categoria</label>
                            <select class="form-control" name="categoria">                                                            
                              
                                <option value="Direção" <?= $orgaosSociais[0]->categoria == 'Direção' ? ' selected ' : ''; ?> >Direção</option>
                                <option value="Mesa da Assembleia" <?= $orgaosSociais[0]->categoria == 'Mesa da Assembleia' ? ' selected ' : ''; ?>  >Mesa da Assembleia</option>
                                <option value="Conselho Fiscal e Jurisdicional" <?= $orgaosSociais[0]->categoria == 'Conselho Fiscal e Jurisdicional' ? ' selected ' : ''; ?>  >Conselho Fiscal e Jurisdicional</option>
                            </select>     
                        </div>
                    
                       
                        <div class="col-md-6 form-group">
                            <label>Cargo</label>
                            <input type="text" class="form-control" name="cargo" value="<?= $orgaosSociais[0]->cargo; ?>">
                        </div>

                       
                       <div class="col-md-6">
                           <label>Utilizadores:</label>
                           <select class="form-control" name="utilizador_idUtilizador" required="">                          
                               <?php
                               foreach ($utilizadores as $uti) {
                                   if ($uti->idUtilizador == $orgaosSociais[0]->utilizador_idUtilizador) {
                                       ?>          
                                       <option value=" <?= $uti->idUtilizador ?>" selected><?= $uti->nome ?></option> 
                                   <?php } else { ?>
                                       <option value=" <?= $uti->idUtilizador ?>"><?= $uti->nome; ?></option>
                                   <?php }
                                   ?>
                               <?php } ?>
                           </select>
                       </div>

                        <div class="col-md-6 form-group">
                            <label>Data de Ínicio</label>
                            <input type="date" name="dataInicio" class="form-control" value="<?= $orgaosSociais[0]->dataInicio; ?>" >
                        </div>
                        
                    </div><!-- /.box-body -->
                    <p> <?php echo validation_errors(); ?></p>

                    <div class="box-footer">  
                        <button type="submit" value="upload" class="btn btn-primary">Submit</button>
                         <a class="btn btn-danger" href="<?= base_url('OrgaosSociais/encerrarMandato/' . $orgaosSociais[0]->idorgaosSociais) ?>"  onclick="return confirm('Deseja realmente encerrar seu mandato?');">Encerrar</a> 
                    </div>
                   
                    </form>

                </div><!-- /.box -->    
            </div>    


        </div>  
    </section>
</div><!-- /.content-wrapper -->
