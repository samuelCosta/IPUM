
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
                        <h3 class="box-title">Atribuir Traje</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->


                    <?php echo form_open(); ?>
                    <div class="box-body">
                        <div class="row">
                        <div class="col-md-4 form-group">    
                            <label >Peça</label>
                            <select class="form-control" name="peca" disabled="true">
                                <?php foreach ($pecas as $peca): ?>
                                    <option value="<?php echo $peca['id']; ?>" <?php if($edit_data['id'] === $peca['id']) { echo 'selected'; } ?>><?php echo $peca['ts_tipo'] . ' - ' . $peca['ts_genero'] . ' - ' . $peca['ts_tamanho']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <input type="hidden" name="tipo_peca_hidden" value="<?php echo $edit_data['id']; ?>"/>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Quantidade</label>
                            <input type="text" class="form-control" value="<?php echo set_value('quantidade'); ?>" name="quantidade" placeholder="Insira a quantidade..."/>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Custo</label>
                            <input type="text" class="form-control" value="<?php echo set_value('custo'); ?>" name="custo" placeholder="Insira o custo">
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-5 form-group">    
                            <label>Motivo</label>
                            <select class="form-control" name="motivo" >
                                <option value="">Selecione uma opção</option>
                                <?php foreach ($tipos_motivo as $motivo): ?>
                                    <option value="<?php echo $motivo['id']; ?>"><?php echo $motivo['descricao']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-5 form-group">
                            <label>Data</label>
                            <input type="date" class="form-control" value="<?php echo set_value('data'); ?>" name="data"/>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-10 form-group">
                            <label>Descrição</label>
                            <textarea  class="form-control" value="<?php echo set_value('descricao'); ?>" rows="4" name="descricao" placeholder="Insira uma descrição..."></textarea>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-10 form-group">
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
                        <button type="submit" value="upload" class="btn btn-primary">Registar</button>
                        <a class="btn" href="<?php echo site_url('traje/stock'); ?>">Cancelar</a>
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



