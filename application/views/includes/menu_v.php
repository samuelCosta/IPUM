        
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= base_url(); ?>uploads/<?php echo $this->session ->userdata('foto'); ?> "   width="100%" class="img-circle caixa_corte" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>IPUM</p>
                <a href="<?= base_url(); ?>utilizador/detalheUtilizador/<?php echo $this->session ->userdata('id'); ?>"><i class="fa fa-circle text-success"></i> Online</a>
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
                    <li><a href="<?= base_url() ?>utilizador/presencasAtuacoes"><i class="fa fa-circle-o"></i> Presenças</a></li>
                    <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Quotas</a></li>
                 

                    <li class="active">
                        <a href="#"><i class="fa fa-circle-o"></i> Elementos <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu menu-open" style="display: none;">
                            <li><a href="<?= base_url() ?>utilizador/criarUtilizador"><i class="fa fa-circle-o"></i> Registar</a></li>
                            <li><a href="<?= base_url() ?>utilizador/consultarUtilizadores"><i class="fa fa-circle-o"></i> Consultar</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <!--    ----------------------------GESTAO MATERIAIS--------------------------        -->

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
                            <li><a href="<?= base_url() ?>Instrumentos/consultarInstrumentos"><i class="fa fa-circle-o"></i> Consultar</a></li>
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

                </ul>
            </li>
            <!--              ---------------GESTAO EVENTOS--------------------------------------  -->

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Gestão Eventos</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="active">
                        <a href="#"><i class="fa fa-circle-o"></i> Atividades<i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu menu-open" style="display: none;">
                            <li><a href="<?= base_url() ?>Atividades"><i class="fa fa-circle-o"></i> Registar</a></li>
                            <li><a href="<?= base_url() ?>Atividades/consultarAtividades"><i class="fa fa-circle-o"></i> Consultar</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="fa fa-circle-o"></i> Ensaios<i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu menu-open" style="display: none;">
                            <li><a href="<?= base_url() ?>Ensaios"><i class="fa fa-circle-o"></i> Registar</a></li>
                            <li><a href="<?= base_url() ?>Ensaios/consultarEnsaios"><i class="fa fa-circle-o"></i> Consultar</a></li>
                            <li><a href="<?= base_url() ?>Ensaios/historicoEnsaios"><i class="fa fa-circle-o"></i> Historico</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="fa fa-circle-o"></i> Atuações<i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu menu-open" style="display: none;">
                            <li><a href="<?= base_url() ?>Atuacoes"><i class="fa fa-circle-o"></i> Registar</a></li>
                            <li><a href="<?= base_url() ?>Atuacoes/consultarAtuacoes"><i class="fa fa-circle-o"></i> Consultar</a></li>
                            <li><a href="<?= base_url() ?>Atuacoes/historicoAtuacoes"><i class="fa fa-circle-o"></i> Historico</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="fa fa-circle-o"></i> PGCUM<i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu menu-open" style="display: none;">
                            <li><a href="<?= base_url() ?>Tranche"><i class="fa fa-circle-o"></i> Registar</a></li>
                            <li><a href="<?= base_url() ?>Tranche/consultarTranches"><i class="fa fa-circle-o"></i> Consultar</a></li>
                        </ul>
                    </li>    
                </ul>
            </li>

            <!--            ------------------------------------------------------------------->




            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Orgãos Sociais</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url() ?>OrgaosSociais"><i class="fa fa-circle-o"></i> Registar</a></li>
                    <li><a href="<?= base_url() ?>OrgaosSociais/consultarOrgaosSociais"><i class="fa fa-circle-o"></i> Consultar</a></li>
                    <li><a href="<?= base_url() ?>OrgaosSociais/historicoOrgaosSociais"><i class="fa fa-circle-o"></i> Histórico</a></li>
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