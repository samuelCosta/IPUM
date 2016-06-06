
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
                                        <option value="<?php echo $tipo['id']; ?>" <?php if ($edit_data['tipo_selecao_id'] === $tipo['id']) { echo 'selected';} ?> ><?php echo $tipo['descricao']; ?></option>
                                            <?php endforeach; ?>
                                </select>
                                <input type="hidden" name="tipo_instrumento_hidden" value="<?php echo $edit_data['tipo_selecao_id']; ?>"/>
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Número do Instrumento</label>
                                <input type="text" class="form-control" value="<?php echo $edit_data['numero']; ?>" name="numero" disabled="true"/>
                                <input type="hidden" value="<?php echo $edit_data['numero']; ?>" name="numero_hidden" />
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Tamanho</label>
                                <input type="text" class="form-control" value="<?php echo $edit_data['tamanho']; ?>" name="tamanho" disabled="true"/>
                                <input type="hidden" value="<?php echo $edit_data['tamanho']; ?>" name="tamanho_hidden" />
                            </div>
                            <div class="col-md-6 form-group">
                                <label> Estado </label>
                                <div class="row">
                                    <label class="radio-inline"><input type="radio" name="estado" value="1" class="minimal" <?php if ($edit_data['estado'] === '1') {echo 'checked';}?>/>1</label>
                                    <label class="radio-inline"><input type="radio" name="estado" value="2" class="minimal" <?php if ($edit_data['estado'] === '2') {echo 'checked';}?>/>2</label>
                                    <label class="radio-inline"><input type="radio" name="estado" value="3" class="minimal" <?php if ($edit_data['estado'] === '3') {echo 'checked';}?>/>3</label>
                                    <label class="radio-inline"><input type="radio" name="estado" value="4" class="minimal" <?php if ($edit_data['estado'] === '4') {echo 'checked';}?>/>4</label>
                                    <label class="radio-inline"><input type="radio" name="estado" value="5" class="minimal" <?php if ($edit_data['estado'] === '5') {echo 'checked';}?>/>5</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4" id="choice">
                                <label>Localização</label>
                                <div class="row">
                                    <label class="radio-inline"><input type="radio" name="local" id="armazenado" value="armazenado" class="minimal" <?php if ($edit_data['localizacao'] != '') {echo 'checked';}?> />Armazém</label>
                                    <label class="radio-inline"><input type="radio" name="local" id="emprestado" value="emprestar" class="minimal" <?php if ($edit_data['elemento'] > 0) {echo 'checked';}?> />Emprestado</label>
                                </div>
                            </div>
                            <div id="localizacao" style="<?php if ($edit_data['elemento'] > 0) {echo 'display: none';}?>" class="col-md-6 form-group">
                                <label>Local de Armazenamento</label>
                                <input type="text" class="form-control" value="<?php echo $edit_data['localizacao']; ?>" name="localizacao" placeholder="Insira o Local de Armazenamento" />
                            </div>
                            <div id="elemento" style="<?php if ($edit_data['localizacao'] != '') {echo 'display: none';}?>" class="col-md-6 form-group">
                                <label>Elemento</label>
                                <select class="form-control" name="elemento" >
                                    <option value="">Selecione uma opção</option>
                                    <?php foreach ($elementos as $elemento): ?>
                                        <option value="<?php echo $elemento['idUtilizador']; ?>" <?php if ($edit_data['elemento'] === $elemento['idUtilizador']) { echo 'selected';} ?> ><?php echo $elemento['nome']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>




                    </div><!-- /.box-body -->
                    <input hidden id="showtoast" value="<?php echo validation_errors(); ?>">

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
            $("#elemento option[value='']").attr('selected', true);
            $('#elemento').hide();
        });
        $('#emprestado').on('ifChanged', function () {
            $('#elemento').show();
            $('#localizacao').val("");
            $('#localizacao').hide();
        });
    });
</script>



