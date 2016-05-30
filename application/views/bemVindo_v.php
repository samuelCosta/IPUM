<!--colocar a data em portugues por extenso-->
<?php setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese'); ?>
<!--CORPO da PAGINA-->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fa fa-warning"></i> <Strong>Alert!</strong><br><strong> Proxima Atuação: </strong> <?php if ($proximaAtuacao['dataEvento'] == Null) {
    echo " Não existe próxima Atuação";
} else {
    echo strftime(' %d de %B de %Y', strtotime($proximaAtuacao['dataEvento']));
} ?> 
        <br>


        <strong>Proxima Atividade: </strong> <?php if ($proximaAtividade['dataInicio'] == Null) {
    echo " Não existe próxima Atividade";
} else {
    echo strftime(' %d de %B de %Y', strtotime($proximaAtividade['dataInicio']));
} ?> 

        <br>

        <strong> Proximo Ensaio: </strong>  <?php if ($proximoEnsaio['dataEvento'] == Null) {
    echo " Não existe próximo Ensaio";
} else {
    echo strftime(' %d de %B de %Y', strtotime($proximoEnsaio['dataEvento']));
} ?> 

    </div>


    <section class="content-header">
        <h1>
            Bem Vindo
            <small>IPUM</small>
        </h1>

        </ol>
    </section>

    <!---------------------------------------------------------------------------------->

    <!-- Main content -->
    <section class="content">
        <h4> Dados em <?php echo date('Y'); ?> </h4>
        <!-- corpo horizontal -->
        <div class="row">


            <div class="col-lg-3 col-xs-6 ">
                <!-- small box -->
                <div class="small-box bg-gray box box-primary">
                    <div class="inner">
                        <h3><?php echo $totalAtuacoes ?></h3>
                        <p>Atuações</p>
                    </div>


                    <div class="icon">
                        <i class="ion ion-information-circled"></i>
                    </div>

                </div>


            </div>
            <div class="col-lg-3 col-xs-6 ">
                <!-- small box -->
                <div class="small-box bg-gray box box-primary">
                    <div class="inner">
                        <h3><?php echo $totalAtividades ?></h3>
                        <p>Atividades</p>
                    </div>


                    <div class="icon">
                        <i class="ion ion-information-circled"></i>
                    </div>

                </div>


            </div>
            <div class="col-lg-3 col-xs-6 ">
                <!-- small box -->
                <div class="small-box bg-gray box box-primary">
                    <div class="inner">
                        <h3><?php echo $totalEnsaios ?></h3>
                        <p>Ensaios</p>
                    </div>


                    <div class="icon">
                        <i class="ion ion-information-circled"></i>
                    </div>

                </div>


            </div>
            <div class="col-lg-3 col-xs-6 ">
                <!-- small box -->
                <div class="small-box bg-gray box box-primary">
                    <div class="inner">
                        <h3><?php echo $totalAtivos ?></h3>
                        <p>Elementos Ativos</p>
                    </div>


                    <div class="icon">
                        <i class="ion ion-android-people"></i>
                    </div>

                </div>


            </div>
        </div>
        <!--                    ---------------------------------------------------------->



        <div class="row">
            <!-- coluna a esquerda -->
            <section class="col-lg-7 connectedSortable">
                <div class="col-md-12">
                    <!-- USERS LIST -->
                    <div class="box box-default">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <img src="<?= base_url() ?>assets/dist/img/1.jpg" alt="1">

                                </div>
                                <div class="item">
                                    <img src="<?= base_url() ?>assets/dist/img/2.jpg" alt="2">

                                </div>
                                <div class="item">
                                    <img src="<?= base_url() ?>assets/dist/img/3.jpg" alt="3">

                                </div>

                            </div>

                            <!-- Controls -->
                            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>



                    </div><!--/.box -->
                </div><!-- /.col -->

            </section><!-- /.Left col -->

            <!---------------------------------------------------------------->

            <!--coluna a direita-->
            <section class="col-lg-5 connectedSortable">
                <!-- Calendar -->
                <div class="box box-solid bg-gray-light">
                    <div class="box-header">
                        <i class="fa fa-calendar"></i>
                        <h3 class="box-title">Calendar</h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <!-- button with a dropdown -->
                            <div class="btn-group">
                                <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li><a href="#">Add new event</a></li>
                                    <li><a href="#">Clear events</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">View calendar</a></li>
                                </ul>
                            </div>
                            <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div><!-- /. tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                        <!--The calendar -->
                        <div id="calendar" style="width: 100%"></div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->     
            </section><!-- right col -->
        </div><!-- /.row (main row) -->


    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


