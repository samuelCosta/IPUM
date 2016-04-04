        
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= base_url(); ?>assets/dist/img/IPUM.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>IPUM</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>


        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MENU</li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Gestão Utilizadores</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> Presenças</a></li>
                    <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Quotas</a></li>
                    <li><a href="<?= base_url() ?>utilizador"><i class="fa fa-circle-o"></i> Novos Elementos</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>Gestão Materiais</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="active">
                        <a href="#"><i class="fa fa-circle-o"></i> Instrumentos <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu menu-open" style="display: none;">
                            <li><a href="<?= base_url() ?>Instrumentos/registarInstrumento"><i class="fa fa-circle-o"></i> Registar</a></li>
                            <li><a href="<?= base_url() ?>Instrumentos/consultarInstrumento"><i class="fa fa-circle-o"></i> Consultar</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="fa fa-circle-o"></i> Traje<i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu menu-open" style="display: none;">
                            <li><a href="<?= base_url() ?>Traje/registarTraje"><i class="fa fa-circle-o"></i> Registar</a></li>
                            <li><a href="<?= base_url() ?>Traje/consultarTraje"><i class="fa fa-circle-o"></i> Consultar</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="fa fa-circle-o"></i> Música<i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu menu-open" style="display: none;">
                            <li><a href="<?= base_url() ?>Musica/registarMusica"><i class="fa fa-circle-o"></i> Registar</a></li>
                            <li><a href="<?= base_url() ?>Musica/consultarMusica"><i class="fa fa-circle-o"></i> Consultar</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="fa fa-circle-o"></i> Merchandising<i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu menu-open" style="display: none;">
                            <li><a href="<?= base_url() ?>Merchandising/registarMerchandising"><i class="fa fa-circle-o"></i> Registar</a></li>
                            <li><a href="<?= base_url() ?>Merchandising/consultarMerchandising"><i class="fa fa-circle-o"></i> Consultar</a></li>
                        </ul>
                    </li>
                    <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
                    <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
                    <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Gestão Eventos</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> Atividades</a></li>
                    <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> PGCUM</a></li>
                    <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Ensaios</a></li>
                </ul>
            </li>
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
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->

</aside>