        
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= base_url(); ?>uploads/<?php echo $this->session ->userdata('foto'); ?> "  class="img-circle caixa_corte" alt="User Image" style="width:90px;height:50px;">
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
                    <li><a href="<?= base_url() ?>utilizador/presencasAtuacoes"><i class="fa fa-circle-o"></i>Presenças</a></li>
                    <li><a href="<?= base_url() ?>Quotas"><i class="fa fa-circle-o"></i>Quotas</a></li>
                 

                    <li class="active">
                        <a href="#"><i class="fa fa-circle-o"></i>Elementos<i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu menu-open" style="display: none;">
                            <li><a href="<?= base_url() ?>utilizador/criarUtilizador"><i class="fa fa-circle-o"></i>Registar</a></li>
                            <li><a href="<?= base_url() ?>utilizador/consultarUtilizadoresAtivos"><i class="fa fa-circle-o"></i>Consultar</a></li>
                            <li><a href="<?= base_url() ?>utilizador/consultarUtilizadoresInativos"><i class="fa fa-circle-o"></i>Historico</a></li>
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
                        <a href="#"><i class="fa fa-circle-o"></i>Instrumentos <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu menu-open" style="display: none;">
                            <li><a href="<?= base_url() ?>instrumento/registar"><i class="fa fa-circle-o"></i>Registar</a></li>
                            <li><a href="<?= base_url() ?>instrumento/index"><i class="fa fa-circle-o"></i>Consultar</a></li>
                            <li><a href="<?= base_url() ?>material/index"><i class="fa fa-circle-o"></i>Stock Material</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="fa fa-circle-o"></i>Traje<i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu menu-open" style="display: none;">
                            <li><a href="<?= base_url() ?>traje/registar"><i class="fa fa-circle-o"></i>Registar</a></li>
                            <li><a href="<?= base_url() ?>traje/index"><i class="fa fa-circle-o"></i>Consultar</a></li>
                            <li><a href="<?= base_url() ?>traje/stock"><i class="fa fa-circle-o"></i>Stock</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="fa fa-circle-o"></i>Música<i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu menu-open" style="display: none;">
                            <li><a href="<?= base_url() ?>musica/registar"><i class="fa fa-circle-o"></i>Registar</a></li>
                            <li><a href="<?= base_url() ?>musica/index"><i class="fa fa-circle-o"></i>Consultar</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="fa fa-circle-o"></i>Merchandising<i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu menu-open" style="display: none;">
                            <li><a href="<?= base_url() ?>merchandising/registar"><i class="fa fa-circle-o"></i>Registar</a></li>
                            <li><a href="<?= base_url() ?>merchandising/index"><i class="fa fa-circle-o"></i>Consultar</a></li>
                            <li><a href="<?= base_url() ?>merchandising/stock"><i class="fa fa-circle-o"></i>Stock</a></li>
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
                        <a href="#"><i class="fa fa-circle-o"></i>Atividades<i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu menu-open" style="display: none;">
                            <li><a href="<?= base_url() ?>Atividades"><i class="fa fa-circle-o"></i>Registar</a></li>
                            <li><a href="<?= base_url() ?>Atividades/consultarAtividades"><i class="fa fa-circle-o"></i>Consultar</a></li>
                            <li><a href="<?= base_url() ?>Atividades/historicoAtividades"><i class="fa fa-circle-o"></i>Historico</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="fa fa-circle-o"></i>Ensaios<i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu menu-open" style="display: none;">
                            <li><a href="<?= base_url() ?>Ensaios"><i class="fa fa-circle-o"></i>Registar</a></li>
                            <li><a href="<?= base_url() ?>Ensaios/consultarEnsaios"><i class="fa fa-circle-o"></i>Consultar</a></li>
                            <li><a href="<?= base_url() ?>Ensaios/historicoEnsaios"><i class="fa fa-circle-o"></i>Historico</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="fa fa-circle-o"></i>Atuações<i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu menu-open" style="display: none;">
                            <li><a href="<?= base_url() ?>Atuacoes"><i class="fa fa-circle-o"></i>Registar</a></li>
                            <li><a href="<?= base_url() ?>Atuacoes/consultarAtuacoes"><i class="fa fa-circle-o"></i>Consultar</a></li>
                            <li><a href="<?= base_url() ?>Atuacoes/historicoAtuacoes"><i class="fa fa-circle-o"></i>Historico</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="fa fa-circle-o"></i>PGCUM<i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu menu-open" style="display: none;">
                            <li><a href="<?= base_url() ?>Tranche"><i class="fa fa-circle-o"></i>Registar</a></li>
                            <li><a href="<?= base_url() ?>Tranche/consultarTranches"><i class="fa fa-circle-o"></i>Consultar</a></li>
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
                    <li><a href="<?= base_url() ?>OrgaosSociais/consultarOrgaosSociais"><i class="fa fa-circle-o"></i>Consultar</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gear"></i> <span>Definições</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url() ?>tiposelecao/index"><i class="fa fa-circle-o"></i>Tipos de Seleção</a></li>

                </ul>
            </li>






            
        </ul>
    </section>
    <!-- /.sidebar -->

</aside>