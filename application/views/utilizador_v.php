
<!--//vai buscar os dados todos da sessao e mete no array-->
<?php // $dado= $this->session->all_userdata()?>
<?php // echo $this->session->userdata('foto'); ?>
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
            <div class="col-md-4">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="<?= base_url(); ?>uploads/<?php echo $utilizador['foto']; ?>"  alt="User profile picture" style="width:90px;height:90px;">
                        <h3 class="profile-username text-center">  <?php echo $utilizador['nome']; ?> </h3>


                        <p class="text-muted text-center"> <?php echo $utilizador['email'];  ?></p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Nº Atuações Presentes</b> <a class="pull-right"><?php echo $totalAtuacoes; ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Nº Ensaios Presentes</b> <a class="pull-right"><?php echo $totalEnsaios ?></a>
                            </li>
                            <li class="list-group-item">
                                <b><i class="fa fa-warning"></i>Próximo Pagamento</b> <a class="pull-right "><?php echo $pagamento ?></a>
                            </li>
 

                            
                        </ul>
                        <h3>Histórico de Orgãos Sociais:</h3>
                         <?php foreach ($orgaosSociais as $p) { ?>
                        <ul>
                            <li><?php echo $p['cargo'] ?> da <?php echo $p['categoria'] ?> desde <?php echo $p['dataInicio'] ?>  <?php if ($p['dataFim'] == null) {
                                echo "até à presente data. <br>"; ?>   </li> </ul> <?php
                        } else {
                            echo "a " . $p['dataFim']; ?>   </ul> <?php
                            } ?> 
<?php } ?>
                       
                            <?php if($orgaosSociais!=NULL){ ?>
                            <a onclick="imprimir(<?php echo  $utilizador['idUtilizador'] ?>)" class="btn btn-primary btn-block"><i class="fa fa-download"></i><b>  Imprimir Certificado de Orgão Social</b></a>
                            <?php }else {} ?>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->



            </div><!-- /.col -->

            <!--            -----------------------SOBRE MIM---------------------------------->
            <div class="col-md-4">
                <div class="nav-tabs-custom">

                    <!-- About Me Box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Sobre Mim</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                  

                            <strong><i class=" margin-r-5"></i>Alcunha</strong>
                            <p class="text-muted"> <?php echo $utilizador['alcunha'];  ?></p>
                  
                            <strong><i class="  margin-r-5"></i>NIF</strong>
                            <p class="text-muted"> <?php echo $utilizador['nif'];  ?></p>

                            <strong><i class="  margin-r-5"></i>BI</strong>
                            <p class="text-muted">  <?php echo $utilizador['bi'];  ?></p>

                            <strong><i class="  margin-r-5"></i> Data Nascimento</strong>
                            <p class="text-muted"> <?php echo $utilizador['dataNascimento'];  ?></p>  
                            
   


                        </div><!-- /.box-body -->
                    </div><!-- /.box -->               
                </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->

            <!--            ----------------------NA IPUM-------------------------------->


            <div class="col-md-4">
                <div class="nav-tabs-custom">

                    <!-- About Me Box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">NA IPUM</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                                         
                            <strong><i class="  margin-r-5"></i> Data Entrada</strong>
                            <p class="text-muted"> <?php echo $utilizador['dataEntrada'];  ?></p>                         

                            <strong><i class="  margin-r-5"></i> Data Sócio</strong>
                            <p class="text-muted"> <?php if($utilizador['dataSocio']!=0) { echo $utilizador['dataSocio'];}else{ echo "Não é Sócio";} ?></p>

                            <hr>
                            
                            <strong><i class="  margin-r-5"></i> Traje</strong>
                            <?php foreach ($traje as $atribuido): ?>
                            <p class="text-muted"><?php echo $atribuido['ts_tipo'] . ' - ' . $atribuido['ts_genero'] . ' - ' . $atribuido['ts_tamanho']; ?>  </p>
                            <?php endforeach; ?>
                            <strong><i class="  margin-r-5"></i> Instrumento</strong>
                            <?php foreach ($instrumento as $emprestado): ?>
                            <p class="text-muted"><?php echo $emprestado['instrumento']. ' - ' . $emprestado['numero']; ?> </p>
                            <?php endforeach; ?>
                            <strong><i class="  margin-r-5"></i> Manutenções</strong>
                            <?php foreach ($manutencao as $manu): ?>
                            <p class="text-muted"><?php echo $manu['instrumento'] . ' - ' . $manu['numero'] . ' - ' . $manu['material']; ?> </p>
                            <?php endforeach; ?>

                        </div><!-- /.box-body -->
                    </div><!-- /.box -->               
                </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
            
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->



 <script> 
function imprimir($id) {
   
 
    window.open("<?= base_url('utilizador/comprovativoOrgaosSociais/') ?>"+ "/"+ $id);
}
</script>



