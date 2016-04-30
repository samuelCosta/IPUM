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
                        <h3 class="box-title">Editar Atividade</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->


                    <?php echo form_open('Atividades/guardarAtualizacao'); ?>
                    <!--                <form method="post" action="utilizador/registarUtilizador" role="form">-->
                    <div class="box-body">  
<!--                        passar atributo ativo -->
                       <input name="idAtividades" type="hidden" value="<?= $atividades[0]->idAtividades; ?>">
                       
                        
                                   
                       
                        <div class="col-md-6 form-group">
                            <label>Nome da Atividades</label>
                            <input type="text" name="nomeAtividade" class="form-control" value="<?= $atividades[0]->nomeAtividade; ?>" >
                        </div>
                    
                       
                        <div class="col-md-6 form-group">
                            <label>Localização</label>
                            <input type="text" class="form-control" name="localizacao" value="<?= $atividades[0]->localizacao; ?>">
                        </div>
                       
                       <div class="col-md-4 form-group">
                            <label>Data de Início</label>
                            <input type="date" class="form-control" name="dataInicio" value="<?= $atividades[0]->dataInicio; ?>">
                        </div>
                       
                       <div class="col-md-4 form-group">
                            <label>Duração</label>
                            <input type="numeric" class="form-control" name="duracao" value="<?= $atividades[0]->duracao; ?>">
                        </div>
                       
                       <div class="col-md-4 form-group">
                            <label>Orçamento</label>
                            <input type="text" class="form-control" name="orcamento" value="<?= $atividades[0]->orcamento; ?>">
                        </div>

                       <div class="col-md-6 form-group">
                            <label>Total de Participantes</label>
                            <input type="number" class="form-control" name="participantes" value="<?= $atividades[0]->participantes; ?>">
                        </div>
                       
                       <div class="col-md-6 form-group">
                            <label>Total de Gastos</label>
                            <input type="number" class="form-control" name="totalGastos" value="<?= $atividades[0]->totalGastos;?>">
                        </div>
                       
                        <div class="col-md-12 form-group">
                            <label>Notas</label>
                            <textarea name="notas" value="<?php $atividades[0]->notas ?>" placeholder="intoduza as suas Notas" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>
                       
              
                
             
            
                       
                       
                       
                       
                       
                       
                       
                       
                    </div><!-- /.box-body -->
                    <p> <?php echo validation_errors(); ?></p>

                    <div class="box-footer">  
                        <button type="submit" value="upload" class="btn btn-primary">Submit</button>
                         <a class="btn btn-danger" href="<?= base_url('Atividades/encerrarAtividade/' . $atividades[0]->idAtividades) ?>"  onclick="return confirm('Deseja realmente finalizar a Atividade?');">Finalizar</a> 
                    </div>
                   
                    </form>

                </div><!-- /.box -->    
            </div>    


        </div>  
    </section>
</div><!-- /.content-wrapper -->

