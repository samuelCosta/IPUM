<!DOCTYPE html>
<html>
    <head>       
        <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">   
        <title>Bem Vindo - IPUM</title>   
       <meta name="viewport" content="initial-scale=1">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/iCheck/flat/blue.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/morris/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datepicker/datepicker3.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker-bs3.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="index2.html" class="logo">
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>IPU</b>Minho</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="<?= base_url() ?>Welcome/login" class="dropdown-toggle" >
                                    <img src="<?= base_url() ?>assets/dist/img/IPUM.jpg" class="user-image" alt="User Image">
                                    <span class="hidden-xs">LOGIN</span>
                                </a>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <li>
                                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
<!-------------------------------------------------------------------------------------------------------->


            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar" >
                    
                </section>
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?= base_url() ?>assets/dist/img/IPUM.jpg" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p>IPUM</p>
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-table"></i> <span>Tables</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
                                <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
                            </ul>
                        </li>
                        <li class="header">LABELS</li>
                    </ul>
                    <!-- Calendar -->
                    <div class="box box-solid bg-green-gradient">
                        <div class="box-header">
                            <i class="fa fa-calendar"></i>
                            <h3 class="box-title">Calendar</h3>
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                <!-- button with a dropdown -->
                                <div class="btn-group">
                                    <button class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">Add new event</a></li>
                                        <li><a href="#">Clear events</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">View calendar</a></li>
                                    </ul>
                                </div>
                                <button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div><!-- /. tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body no-padding">
                            <!--The calendar -->
                            <div id="calendar" style="width: 100%"></div>
                        </div><!-- /.box-body -->
               </div><!-- /.box -->
                </section>
                <!-- /.sidebar -->
            </aside>

<!--          ----------------------------------------------------------->

<!--CORPO da PAGINA-->
            <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Bem Vindo
                        <small>IPUM</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

<!---------------------------------------------------------------------------------->

                <!-- Main content -->
                <section class="content">
   <!-- corpo horizontal -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>150</h3>
                                    <p>Eventos</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>53<sup style="font-size: 20px">%</sup></h3>
                                    <p>utilizadores</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>44</h3>
                                    <p>User Registrations</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>65</h3>
                                    <p>Unique Visitors</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div><!-- ./col -->
                    </div><!-- /.row -->
                    <!-- Main row -->

                    
<!--                    ---------------------------------------------------------->
                    
                    
                    
                    <div class="row">
                        <!-- coluna a esquerda -->
                        <section class="col-lg-7 connectedSortable">
                            <div class="col-md-12">
                                <!-- USERS LIST -->
                                <div class="box box-danger">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Lista de Membros</h3>
                                        <div class="box-tools pull-right">

                                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                        </div>
                                    </div><!-- /.box-header -->
                                    <div class="box-body no-padding">
                                        <ul class="users-list clearfix">
                                            <li>
                                                <img src="<?= base_url() ?>assets/dist/img/user1-128x128.jpg" alt="User Image">
                                                <a class="users-list-name" href="#">Alexander Pierce</a>
                                                <span class="users-list-date">Today</span>
                                            </li>
                                            <li>
                                                <img src="<?= base_url() ?>assets/dist/img/user8-128x128.jpg" alt="User Image">
                                                <a class="users-list-name" href="#">Norman</a>
                                                <span class="users-list-date">Yesterday</span>
                                            </li>
                                            <li>
                                                <img src="<?= base_url() ?>assets/dist/img/user7-128x128.jpg" alt="User Image">
                                                <a class="users-list-name" href="#">Jane</a>
                                                <span class="users-list-date">12 Jan</span>
                                            </li>
                                            <li>
                                                <img src="<?= base_url() ?>assets/dist/img/user6-128x128.jpg" alt="User Image">
                                                <a class="users-list-name" href="#">John</a>
                                                <span class="users-list-date">12 Jan</span>
                                            </li>
                                            <li>
                                                <img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" alt="User Image">
                                                <a class="users-list-name" href="#">Alexander</a>
                                                <span class="users-list-date">13 Jan</span>
                                            </li>
                                            <li>
                                                <img src="<?= base_url() ?>assets/dist/img/user5-128x128.jpg" alt="User Image">
                                                <a class="users-list-name" href="#">Sarah</a>
                                                <span class="users-list-date">14 Jan</span>
                                            </li>
                                            <li>
                                                <img src="<?= base_url() ?>assets/dist/img/user4-128x128.jpg" alt="User Image">
                                                <a class="users-list-name" href="#">Nora</a>
                                                <span class="users-list-date">15 Jan</span>
                                            </li>
                                            <li>
                                                <img src="<?= base_url() ?>assets/dist/img/user3-128x128.jpg" alt="User Image">
                                                <a class="users-list-name" href="#">Nadia</a>
                                                <span class="users-list-date">15 Jan</span>
                                            </li>
                                        </ul><!-- /.users-list -->
                                    </div><!-- /.box-body -->
                                    <div class="box-footer text-center">
                                        <a href="javascript::" class="uppercase">View All Users</a>
                                    </div><!-- /.box-footer -->
                                </div><!--/.box -->
                            </div><!-- /.col -->

                        </section><!-- /.Left col -->
                   
<!---------------------------------------------------------------->

                        <!--coluna a direita-->
                        <section class="col-lg-5 connectedSortable">
                            <h1>wswsw</h1>      
                        </section><!-- right col -->
                    </div><!-- /.row (main row) -->
                    
                    
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->
            
            
          

            