
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
                        <h3 class="box-title">Nova Manutenção</h3>
                    </div>
                    <?php echo form_open(); ?>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6 form-group">    
                                <label >Tipo de Material</label>
                                <select class="form-control" name="tipo_material">
                                    <option value="">Selecione uma opção</option>
                                    <?php foreach ($materiais as $material): ?>
                                        <?php if ($material['quantidade'] != 0) { ?>
                                            <option value="<?php echo $material['id']; ?>"><?php echo $material['tipo_material_descricao'] . ' (' . $material['localizacao'] . ' - ' . $material['quantidade'] . ' unid' . ')'; ?></option>
                                        <?php } ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 form-group">
                                <label>Quantidade</label>
                                <input type="text" class="form-control" value="<?php echo set_value('quantidade'); ?>" name="quantidade" placeholder="Insira a quantidade"/>
                            </div>
                            <div class="col-md-2 form-group">
                                <label>Custo</label>
                                <input type="text" class="form-control" value="<?php echo set_value('custo_total'); ?>" name="custo_total" placeholder="Insira o custo">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 form-group">
                                <label>Data da Manutenção</label>
                                <input type="date" class="form-control" value="<?php echo set_value('data_manutencao'); ?>" name="data_manutencao">
                            </div>
                            <div class="col-md-2 form-group">
                                <label>Estado</label>
                                <div class="row">
                                    <label class="radio-inline"><input type="radio" name="estado" value="1" class="minimal" />1</label>
                                    <label class="radio-inline"><input type="radio" name="estado" value="2" class="minimal" />2</label>
                                    <label class="radio-inline"><input type="radio" name="estado" value="3" class="minimal" />3</label>
                                    <label class="radio-inline"><input type="radio" name="estado" value="4" class="minimal" />4</label>
                                    <label class="radio-inline"><input type="radio" name="estado" value="5" class="minimal" />5</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Elemento</label>
                                <select class="form-control" name="elemento" >
                                    <option value="">Selecione uma opção</option>
                                    <?php foreach ($elementos as $elemento): ?>
                                        <option value="<?php echo $elemento['idUtilizador']; ?>"><?php echo $elemento['nome']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                    <input hidden id="showtoast" value="<?php echo validation_errors(); ?>">
                    <div class="box-footer">
                        <button type="submit" value="upload" class="btn btn-primary">Guardar</button>
                        <a class="btn" href="<?php echo site_url('instrumento'); ?>">Cancelar</a>
                    </div>
                    <?php echo form_close(); ?>
                </div><!-- /.box -->    
            </div>    
        </div>  
    </section>
</div><!-- /.content-wrapper -->

<script src="<?php echo base_url() . 'assets/plugins/jQuery/jQuery-2.1.4.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/bootstrap/js/bootstrap.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/datatables/jquery.dataTables.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/datatables/dataTables.bootstrap.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/select2/select2.full.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/slimScroll/jquery.slimscroll.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/iCheck/icheck.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/fastclick/fastclick.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/dist/js/app.min.js' ?>"></script>


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
<script>
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
    });

    $(document).ready(function () {
        $('#armazenado').on('ifChanged', function () {
            $('#localizacao').show();
            $('#elemento').hide();
        });
        $('#emprestado').on('ifChanged', function () {
            $('#elemento').show();
            $('#localizacao').hide();
        });
    });
</script>



