
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
                        <h3 class="box-title">Novo Material</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->


                    <?php echo form_open('tiposelecao/registar'); ?>
                    <div class="box-body">
                        <div class="row">  
                        <div class="col-md-6 form-group">    
                            <label >Tipo de Material</label>
                            <select class="form-control" name="tipo_selecao" >                                
                                    <option value="">Selecione uma opção</option>
                                    <option value="TIPO_INSTRUMENTO">Tipo de Instrumento</option>
                                    <option value="TIPO_MATERIAL">Tipo de Material</option>
                                    <option value="TIPO_PECA">Tipo de Peça</option>
                                    <option value="TIPO_TAMANHO">Tipo de Tamanho</option>
                                    <option value="TIPO_GENERO">Tipo de Género</option>
                                    <option value="TIPO_MERCHANDISING">Tipo de Merchandising</option>
                                    <option value="TIPO_MOTIVO">Tipo de Motivo</option>
                            </select>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-2 form-group">
                            <label>Descrição</label>
                            <input type="text" class="form-control" value="<?php echo set_value('descricao'); ?>" name="descricao" placeholder="Insira uma Descrição">
                        </div>




                    </div><!-- /.box-body -->
                    <input hidden id="showtoast" value="<?php echo validation_errors(); ?>">

                    <div class="box-footer">  
                        <button type="submit" value="upload" class="btn btn-primary">Registar</button>
                        <a class="btn" href="<?php echo site_url('tiposelecao'); ?>">Cancelar</a>
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


<script src="<?php echo base_url() . 'assets/plugins/jQuery/jQuery-2.2.0.min.js' ?>"></script>
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




