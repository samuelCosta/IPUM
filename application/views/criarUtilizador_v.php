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
                  <h3 class="box-title">Novo Elemento</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
           

                <?php echo form_open('utilizador/registarUtilizador'); ?>
<!--                <form method="post" action="utilizador/registarUtilizador" role="form">-->
                  <div class="box-body">                      
                       <div class="col-md-6 form-group">
                      <label >Nome</label>
                      <input type="text" class="form-control" name="nome" placeholder="Introduza o nome...">
                      <?php echo form_error('name');?>
                    </div>
                      
                       <div class="col-md-6 form-group">
                      <label>Alcunha</label>
                      <input type="text" class="form-control" name="alcunha" placeholder="Introduza o alcunha...">
                    </div>
                      
                    <div class="col-md-6 form-group">
                      <label>Email address</label>
                      <input type="email" class="form-control" name="email" placeholder="Introduza email">
                    </div>
                      
                    <div class="col-md-6 form-group">
                      <label>Password</label>
                      <input type="password" class="form-control" name="senha" placeholder="Password">
                    </div>
                      
                       <div class="col-md-6 form-group">
                      <label>NIF</label>
                      <input type="text" class="form-control" name="nif" placeholder="Introduza o NIF">
                    </div>
                      
                       <div class="col-md-6 form-group">
                      <label>BI</label>
                      <input type="text" class="form-control" name="bi" placeholder="Introduza o numero de BI">
                    </div>
                      
                      <div class="col-md-6 form-group">
                      <label>Data Nascimento</label>
                      <input type="date" class="form-control" name="dataNascimento" placeholder="Password">
                    </div>
                      
                    <div class="col-md-12 form-group">
                      <label for="exampleInputFile">Foto</label>
                      <input type="file">
                      <p class="help-block">Se possivel insira uma foto.</p>
                    </div>
                  
                  </div><!-- /.box-body -->
             <?php echo validation_errors(); ?>
                  <div class="box-footer">  
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
                
              </div><!-- /.box -->    
          </div>    
         
         
         
         
              
     </div>  
         </section>
      </div><!-- /.content-wrapper -->
     
    
      
     