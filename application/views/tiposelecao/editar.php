
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
                        <h3 class="box-title">Editar Material</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->


                    <?php echo form_open(); ?>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-9 form-group">    
                                <label>Tipo de Material*</label>
                                <select class="form-control" name="tipo_selecao" disabled="true">                                
                                    <option value="">Selecione uma opção</option>
                                    <option value="TIPO_INSTRUMENTO" <?php if ($edit_data['cod_tipo'] === 'TIPO_INSTRUMENTO') {echo 'selected';} ?> ><?php echo $edit_data['cod_tipo']; ?></option>
                                    <option value="TIPO_MATERIAL" <?php if ($edit_data['cod_tipo'] === 'TIPO_MATERIAL') {echo 'selected';} ?> ><?php echo $edit_data['cod_tipo']; ?></option>
                                    <option value="TIPO_PECA" <?php if ($edit_data['cod_tipo'] === 'TIPO_PECA') {echo 'selected';} ?> ><?php echo $edit_data['cod_tipo']; ?></option>
                                    <option value="TIPO_TAMANHO" <?php if ($edit_data['cod_tipo'] === 'TIPO_TAMANHO') {echo 'selected';} ?> ><?php echo $edit_data['cod_tipo']; ?></option>
                                    <option value="TIPO_GENERO" <?php if ($edit_data['cod_tipo'] === 'TIPO_GENERO') {echo 'selected';} ?> ><?php echo $edit_data['cod_tipo']; ?></option>
                                    <option value="TIPO_MERCHANDISING" <?php if ($edit_data['cod_tipo'] === 'TIPO_MERCHANDISING') {echo 'selected';} ?> ><?php echo $edit_data['cod_tipo']; ?></option>
                                    <option value="TIPO_MOTIVO" <?php if ($edit_data['cod_tipo'] === 'TIPO_MOTIVO') {echo 'selected';} ?> ><?php echo $edit_data['cod_tipo']; ?></option>                                   
                                </select>
                                <input type="hidden" name="tipo_selecao_hidden" value="<?php echo $edit_data['cod_tipo']; ?>"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9 form-group">
                                <label>Descrição*</label>
                                <input type="text" class="form-control" value="<?php echo $edit_data['descricao']; ?>" name="descricao"/>
                            </div>
                        </div>




                    </div><!-- /.box-body -->
                    <input hidden id="showtoast" value="<?php echo validation_errors(); ?>">

                    <div class="box-footer">  
                        <button type="submit" value="upload" class="btn btn-primary">Editar</button>
                        <a class="btn" href="<?php echo site_url('tiposelecao/index'); ?>">Cancelar</a>
                    </div>
                    </form>

                </div><!-- /.box -->    
            </div>    


        </div>  
    </section>
</div><!-- /.content-wrapper -->

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Versão</b> 1.0.0
    </div>
    <strong>INOV Webdesign &copy; 2015-2016 <a href="https://www.uminho.pt/PT">Universidade do Minho</a></strong>.
</footer>


<script src="<?php echo base_url() . 'assets/plugins/jQuery/jQuery-2.1.4.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/bootstrap/js/bootstrap.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/select2/select2.full.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/slimScroll/jquery.slimscroll.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/iCheck/icheck.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/fastclick/fastclick.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/dist/js/app.min.js' ?>"></script>
<script src="<?= base_url(); ?>assets/toastr.js"></script>
<link href="<?= base_url(); ?>assets/build/toastr.css" rel="stylesheet" type="text/css" />  


<script type="text/javascript">


                            toastr.options.closeButton = true;
                            $(document).ready(function () {

                                var shortCutFunction = "warning";
//            var erro = "error";

                                var msg = $('#showtoast').val();
                                var title = "AVISO!";


                                if (!msg) {
                                } else {

                                    toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists

                                }

                            });

</script>


