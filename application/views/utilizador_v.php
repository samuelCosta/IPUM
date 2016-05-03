
<!--//vai buscar os dados todos da sessao e mete no array-->
<?php // $dado= $this->session->all_userdata() ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            IPUM
            <small>Universidade do minho</small>

        </h1>
    </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="<?= base_url(); ?>uploads/<?php echo $this->session ->userdata('foto'); ?>" width="150" height="150" alt="User profile picture">
                  <h3 class="profile-username text-center"> <?= $utilizador[0]->nome; ?></h3>
                  
                
                  <p class="text-muted text-center"> <?= $utilizador[0]->email; ?></p>

                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Nº Atuações Presentes</b> <a class="pull-right"><?php echo $totalAtuacoes; ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Nº Ensaios Presentes</b> <a class="pull-right"><?php echo $totalEnsaios ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Próximo Pagamento</b> <a class="pull-right">15-07-2016</a>
                    </li>
                  </ul>

                  <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

             
              
            </div><!-- /.col -->
            
            
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                  
                   <!-- About Me Box -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Sobre Mim</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <strong><i class=" margin-r-5"></i>Nome</strong>
                  <p class="text-muted">
                    <?= $utilizador[0]->nome; ?>
                  </p>

                
                  <strong><i class=" margin-r-5"></i>Alcunha</strong>
                  <p class="text-muted">
                    <?= $utilizador[0]->alcunha; ?>
                  </p>

              

                  <strong><i class="  margin-r-5"></i> Data Entrada</strong>
                  <p class="text-muted">  <?= $utilizador[0]->dataEntrada; ?></p>
                   
                  <strong><i class="  margin-r-5"></i>NIF</strong>
                  <p class="text-muted">  <?= $utilizador[0]->nif; ?></p>
                  
                  <strong><i class="  margin-r-5"></i>BI</strong>
                  <p class="text-muted">  <?= $utilizador[0]->bi; ?></p>
                
                  <strong><i class="  margin-r-5"></i> Data Nascimento</strong>
                  <p class="text-muted">  <?= $utilizador[0]->dataNascimento; ?></p>
                  
                   <strong><i class="  margin-r-5"></i> Email</strong>
                  <p class="text-muted">  <?= $utilizador[0]->email; ?></p>
                  
                   <strong><i class="  margin-r-5"></i> Data Sócio</strong>
                  <p class="text-muted">  <?= $utilizador[0]->dataSocio; ?></p>
                  
                  <hr>
                   <strong><i class="  margin-r-5"></i> Traje</strong>
                  <p class="text-muted">  </p>
                  
                   <strong><i class="  margin-r-5"></i> Instrumento</strong>
                  <p class="text-muted"> </p>

                

                 

                </div><!-- /.box-body -->
              </div><!-- /.box -->
              
                
                
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    
    
    




