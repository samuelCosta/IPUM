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
                        <h3 class="box-title">Editar Atuação</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->


                    <?php echo form_open('Atuacoes/guardarAtualizacao'); ?>
                    <!--                <form method="post" action="utilizador/registarUtilizador" role="form">-->
                    <div class="box-body">  
<!--                        passar atributo ativo -->
                       <input name="idEventos" type="hidden" value="<?= $atuacao[0]->idEventos; ?>">
                       
                        <div class="col-md-6 form-group">
                            <label>Nome</label>
                            <input type="text" disabled="" name="dataEvento" class="form-control" value="<?= $atuacao[0]->designacao; ?>" >
                        </div>
                                   
                       
                        <div class="col-md-6 form-group">
                            <label>Data de Atuação</label>
                            <input type="date" name="dataEvento" class="form-control" value="<?= $atuacao[0]->dataEvento; ?>" >
                        </div>
                    
                       
                        <div class="col-md-4 form-group">
                            <label>Localização</label>
                            <input type="text" class="form-control" name="localizacao" value="<?= $atuacao[0]->localizacao; ?>">
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Pessoa responsavel pela Atuação</label>
                            <input type="text" class="form-control" name="responsavel" value="<?= $atuacao[0]->responsavel; ?>">
                        </div>
                       
                       <div class="col-md-4 form-group">
                            <label>Contacto</label>
                            <input type="text" class="form-control" name="contacto" value="<?= $atuacao[0]->contacto; ?>">
                        </div>
                       
                       <div class="col-md-6 form-group">
                            <label>Orçamento</label>
                            <input type="text" class="form-control" name="orcamento" value="<?= $atuacao[0]->orcamento; ?>">
                        </div>
                       
                      
                        <div class="col-md-6 form-group">
                            <label>Despesa</label>
                            <input type="number" step="0.01" class="form-control" name="despesa" value="<?= $atuacao[0]->despesa; ?>" >
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Notas</label>
                            <textarea name="notas"  placeholder="intoduza as suas Notas" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $atuacao[0]->notas; ?></textarea>
                        </div>
                      
          
                      
                       
                    </div><!-- /.box-body -->
                    <p> <?php echo validation_errors(); ?></p>

                    <div class="box-footer">  
                        <button type="submit" value="upload" class="btn btn-primary">Submit</button>
                         <a class="btn" href="<?php echo site_url('Atuacoes/consultarAtuacoes'); ?>">Cancelar</a>
                         
                    </div>
                   
                    </form>

                </div><!-- /.box -->    
            </div>    


        </div>  
    </section>
</div><!-- /.content-wrapper -->

