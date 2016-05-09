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
                        <h3 class="box-title">Registar Tranche </h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->


                    <?php echo form_open('Tranche/registarTranche'); ?>
                 
               <div class="box-body">  
                        
                        <div class="col-md-4 form-group">
                            <label>Tranche</label>
                            <input disabled="" type="text" class="form-control" value="1ªTranche e 2ªTranche" name="tranche" >
                        </div>
                        
                      <div class="col-md-4 form-group">
                            <label>Ano</label>
                            <input type="text" class="form-control" value="<?php echo set_value('ano'); ?>" name="ano" placeholder="Introduza o ano...">
                        </div>            

                      
                            <div class="col-md-4 form-group">
                            <label>Fundos</label>
                            <input type="number" step="0.01" class="form-control" value="<?php echo set_value('fundos'); ?>" name="fundos" placeholder="Introduza os fundos...">
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


