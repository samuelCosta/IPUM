
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
                        <h3 class="box-title">Novo Merchandising</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->


                    <?php echo form_open('merchandising/registar'); ?>
                    <div class="box-body">
                        <div class="row">  
                        <div class="col-md-9 form-group">    
                            <label >Tipo de Merchandising*</label>
                            <select class="form-control" name="tipo_merchandising" >
                                <?php foreach ($tipos_merchandising as $tipo): ?>
                                    <option value="<?php echo $tipo['id']; ?>"><?php echo $tipo['descricao']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-3 form-group">
                            <label>Quantidade*</label>
                            <input type="text" class="form-control" value="<?php echo set_value('quantidade'); ?>" name="quantidade" placeholder="Insira a quantidade">
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Custo Unitário*</label>
                            <input type="text" class="form-control" value="<?php echo set_value('custo_uni'); ?>" name="custo_uni" placeholder="Insira o custo">
                        </div>
                        <div class="col-md-3 form-group">
                            <label> Data de Compra *</label>
                            <input type="date" class="form-control" value="<?php echo set_value('data_compra'); ?>" name="data_compra">
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-9 form-group">
                            <label>Localização*</label>
                            <input type="text" class="form-control" value="<?php echo set_value('localizacao'); ?>" name="localizacao" placeholder="Insira a Localização">
                        </div>
                        </div>




                    <!-- /.box-body -->
                    <input hidden id="showtoast" value="<?php echo validation_errors(); ?>">

                    <div class="box-footer">  
                        <button type="submit" value="upload" class="btn btn-primary">Registar</button>
                        <a class="btn" href="<?php echo site_url('merchandising/stock'); ?>">Cancelar</a>
                    </div>
                    </form>
                </div>
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




