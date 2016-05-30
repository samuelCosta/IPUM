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
                        <h3 class="box-title">Editar Atividade</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->

                    <?php echo form_open_multipart('Atividades/guardarAtualizacao'); ?>                
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
                            <input type="number" class="form-control" name="totalGastos" value="<?= $atividades[0]->totalGastos; ?>">
                        </div>

                        <div class="col-md-12 form-group">
                            <label>Notas</label>
                            <textarea name="notas"  placeholder="intoduza as suas Notas" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $atividades[0]->notas ?></textarea>
                        </div>

                    </div><!-- /.box-body -->
                    <input hidden id="showtoast" value="<?php echo validation_errors(); ?>">

                    <div class="box-footer">  
                        <button type="submit" name="bt1" value="upload" class="btn btn-primary">Atualizar</button>
                        <button type="submit" name="bt1" value="encerrar" class="btn btn-danger"   onclick="return confirm('Deseja realmente finalizar a Atividade?');">Encerrar</button>
                        <a class="btn" href="<?php echo site_url('Atividades/consultarAtividades'); ?>">Cancelar</a>

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

