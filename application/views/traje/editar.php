
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
                        <h3 class="box-title">Editar Traje</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->


                    <?php echo form_open(); ?>
                    <div class="box-body">
                        <div class="row">
                        <div class="col-md-2 form-group">    
                            <label >Tipo de Peça</label>
                            <select class="form-control" name="tipo_peca" disabled="true">
                                <option value="">Selecione uma opção</option>
                                <?php foreach ($tipos_peca as $tipo_p): ?>
                                <option value="<?php echo $tipo_p['id']; ?>" <?php if($edit_data['ts_tipo_id'] === $tipo_p['id']) { echo 'selected'; } ?>><?php echo $tipo_p['descricao']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <input type="hidden" name="tipo_peca_hidden" value="<?php echo $edit_data['ts_tipo_id']; ?>"/>
                        </div>
                        <div class="col-md-2 form-group">    
                            <label >Género</label>
                            <select class="form-control" name="tipo_genero" disabled="true">
                                <option value="">Selecione uma opção</option>
                                <?php foreach ($tipos_genero as $tipo_g): ?>
                                <option value="<?php echo $tipo_g['id']; ?>" <?php if($edit_data['ts_genero_id'] === $tipo_g['id']) { echo 'selected'; } ?>><?php echo $tipo_g['descricao']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <input type="hidden" name="tipo_genero_hidden" value="<?php echo $edit_data['ts_genero_id']; ?>"/>
                        </div>
                        <div class="col-md-2 form-group">    
                            <label >Tamanho</label>
                            <select class="form-control" name="tipo_tamanho" disabled="true">
                                <option value="">Selecione uma opção</option>
                                <?php foreach ($tipos_tamanho as $tipo_t): ?>
                                <option value="<?php echo $tipo_t['id']; ?>" <?php if($edit_data['ts_tamanho_id'] === $tipo_t['id']) { echo 'selected'; } ?>><?php echo $tipo_t['descricao']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <input type="hidden" name="tipo_tamanho_hidden" value="<?php echo $edit_data['ts_tamanho_id']; ?>"/>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-3 form-group">
                            <label>Custo Unitário</label>
                            <input type="text" class="form-control" value="<?php echo $edit_data['custo_uni']; ?>" name="custo_uni" />
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Quantidade</label>
                            <input type="text" class="form-control" value="<?php echo $edit_data['quantidade']; ?>" name="quantidade" />
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
                        <a class="btn" href="<?php echo site_url('traje'); ?>">Cancelar</a>
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


