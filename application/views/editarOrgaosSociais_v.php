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
                        <h3 class="box-title">Editar Orgãos Sociais</h3>
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
                         
                            
                              <select class="form-control" name="cargo" data-live-search="true">
                           
                                <option value="Presidente"<?= $orgaosSociais[0]->cargo == 'Presidente' ? ' selected ' : ''; ?>>Presidente</option>
                                <option value="Vice-Presidente" <?= $orgaosSociais[0]->cargo == 'Vice-Presidente' ? ' selected ' : ''; ?> >Vice-Presidente</option>
                                <option value="Tesoureiro" <?= $orgaosSociais[0]->cargo == 'Tesoureiro' ? ' selected ' : ''; ?>  >Tesoureiro</option>
                                <option value="Secretário" <?= $orgaosSociais[0]->cargo == 'Secretário' ? ' selected ' : ''; ?>  >Secretário</option>
                                <option value="1º Secretário" <?= $orgaosSociais[0]->cargo == '1º Secretário' ? ' selected ' : ''; ?> >1º Secretário</option>
                                <option value="2º Secretário" <?= $orgaosSociais[0]->cargo == '2º Secretário' ? ' selected ' : ''; ?> >2º Secretário</option>
                                <option value="Diretor Financeiro" <?= $orgaosSociais[0]->cargo == 'Diretor Financeiro' ? ' selected ' : ''; ?> >Diretor Financeiro</option>
                                <option value="Diretor Secretariado e Burocracia" <?= $orgaosSociais[0]->cargo == 'Diretor Secretariado e Burocracia' ? ' selected ' : ''; ?>  >Diretor Secretariado e Burocracia</option>
                                <option value="Diretor Património e Administração Interna" <?= $orgaosSociais[0]->cargo == 'Diretor Património e Administração Interna' ? ' selected ' : ''; ?> >Diretor Património e Administração Interna</option>
                                <option value="Diretor Marketing e Comunicação" <?= $orgaosSociais[0]->cargo == 'Diretor Marketing e Comunicação' ? ' selected ' : ''; ?>  >Diretor Marketing e Comunicação</option>
                                <option value="Diretor Social e Recreativo" <?= $orgaosSociais[0]->cargo == 'Diretor Social e Recreativo' ? ' selected ' : ''; ?>  >Diretor Social e Recreativo</option>
                                <option value="Diretor Prospeção e Arquivo" <?= $orgaosSociais[0]->cargo == 'Diretor Prospeção e Arquivo' ? ' selected ' : ''; ?>  >Diretor Prospeção e Arquivo</option>
                                <option value="Diretor Relações Externas" <?= $orgaosSociais[0]->cargo == 'Diretor Relações Externas' ? ' selected ' : ''; ?>  >Diretor Relações Externas</option>

                              </select>
                            
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
                         <a class="btn" href="<?php echo site_url('OrgaosSociais/consultarOrgaosSociais'); ?>">Cancelar</a>
                          
                    </div>
                   
                    </form>

                </div><!-- /.box -->    
            </div>    


        </div>  
    </section>
</div><!-- /.content-wrapper -->
