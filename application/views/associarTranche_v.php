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
                        <h3 class="box-title">Associar Eventos </h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->


                    <?php echo form_open('Tranche/eventosTranche'); ?>
                 
               <div class="box-body">  
                        
                        
                   <input  type="hidden" value="<?php echo $idApoios ?>" name="apoios_idApoios" >
                
<!--   ---------------------------  Atividades------------------------------------------------>
            <div class="col-md-6 form-group">
                     
                    <table class="table table-hover">
                                <tr>
                                    <th>Atividades </th>
                                    <th> <input class="minimal" type="checkbox" id="selecctall"/><span>Selecionar todos</span></th>

                                </tr>

                                <?php foreach ($atividades as $uti) { ?>
                                    <tr>
                                        <td><?= $uti->nomeAtividade; ?>  </td>
                                        <td>       
                                            <input class="checkbox1" type="checkbox" name="check[]" value="<?= $uti->idAtividades; ?>" />
                                        </td>
                                    </tr>
                                <?php } ?>



                     </table> 
                        
</div>

<!--   ---------------------------  Atuacoes------------------------------------------------>
                   
                       <div class="col-md-6 form-group">
                             
                    <table class="table table-hover">
                                <tr>
                                    <th>Atuacoes </th>
                                    <th> <input class="minimal" type="checkbox" id="selecctal2"/><span>Selecionar todos</span></th>

                                </tr>

                                <?php foreach ($atuacoes as $atu) { ?>
                                    <tr>
                                        <td><?= $atu->designacao; ?>  </td>
                                        <td>       
                                            <input class="checkbox2" type="checkbox" name="check1[]" value="<?= $atu->idEventos; ?>" />
                                        </td>
                                    </tr>
                                <?php } ?>



                     </table> 
                         
                       </div>
                   
                   
                   
                   
                   
                   
                       
                    </div><!-- /.box-body -->
                    <p> <?php echo validation_errors(); ?></p>

                    <div class="box-footer">  
                        <button type="submit" value="upload" class="btn btn-primary">Submit</button>
                    </div>
                    </form>

                </div><!-- /.box -->    
            </div>    
        </div>  
    </section>
    

</div><!-- /.content-wrapper -->


<script language=javascript>
    $(document).ready(function () {
        $('#selecctall').click(function (event) {
            if (this.checked) {
                $('.checkbox1').each(function () {
                    this.checked = true;
                });
            } else {
                $('.checkbox1').each(function () {
                    this.checked = false;
                });
            }
        });

    });
</script>



<script language=javascript>
    $(document).ready(function () {
        $('#selecctal2').click(function (event) {
            if (this.checked) {
                $('.checkbox2').each(function () {
                    this.checked = true;
                });
            } else {
                $('.checkbox2').each(function () {
                    this.checked = false;
                });
            }
        });

    });
</script>


