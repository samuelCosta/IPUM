
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
                        <h3 class="box-title">Editar Instrumento</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->


                    <?php echo form_open(); ?>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6 form-group">    
                                <label >Tipo de Instrumento</label>
                                <select class="form-control" name="tipo_instrumento" disabled="true">
                                    <option value="">Selecione uma opção</option>
                                    <?php foreach ($tipos_instrumento as $tipo): ?>
                                        <option value="<?php echo $tipo['id']; ?>" <?php if ($edit_data['tipo_selecao_id'] === $tipo['id']) { echo 'selected';} ?>><?php echo $tipo['descricao']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <input type="hidden" name="tipo_instrumento_hidden" value="<?php echo $edit_data['tipo_selecao_id']; ?>"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 form-group">
                                <label>Número do Instrumento</label>
                                <input type="text" class="form-control" value="<?php echo $edit_data['numero']; ?>" name="numero" />
                            </div>
                            <div class="col-md-2 form-group">
                                <label>Tamanho</label>
                                <input type="text" class="form-control" value="<?php echo $edit_data['tamanho']; ?>" name="tamanho" />
                            </div>
                            <div class="col-md-2 form-group">
                                <label> Estado </label>
                                <div class="row">
                                    <label class="radio-inline"><input type="radio" name="estado" value="1" class="minimal" checked="<?php if ($edit_data['estado'] === 1) {'checked';} ?>"/>1</label>
                                    <label class="radio-inline"><input type="radio" name="estado" value="2" class="minimal" checked="<?php if ($edit_data['estado'] === 2) {'checked';} ?>"/>2</label>
                                    <label class="radio-inline"><input type="radio" name="estado" value="3" class="minimal" checked="<?php if ($edit_data['estado'] === 3) {'checked';} ?>"/>3</label>
                                    <label class="radio-inline"><input type="radio" name="estado" value="4" class="minimal" checked="<?php if ($edit_data['estado'] === 4) {'checked';} ?>"/>4</label>
                                    <label class="radio-inline"><input type="radio" name="estado" value="5" class="minimal" checked="<?php if ($edit_data['estado'] === 5) {'checked';} ?>"/>5</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Localização</label>
                                <input type="text" class="form-control" value="<?php echo $edit_data['localizacao']; ?>" name="localizacao" />
                            </div>
                        </div>




                    </div><!-- /.box-body -->
                    <p> <?php echo validation_errors(); ?></p>

                    <div class="box-footer">  
                        <button type="submit" value="upload" class="btn btn-primary">Editar</button>
                        <a class="btn" href="<?php echo site_url('instrumento'); ?>">Cancelar</a>
                    </div>
                    </form>

                </div><!-- /.box -->    
            </div>    


        </div>  
    </section>
</div><!-- /.content-wrapper -->

<script src="<?php echo base_url() . 'assets/plugins/jQuery/jQuery-2.1.4.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/bootstrap/js/bootstrap.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/select2/select2.full.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/slimScroll/jquery.slimscroll.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/iCheck/icheck.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/fastclick/fastclick.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/dist/js/app.min.js' ?>"></script>

<script>
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
    });
</script>



