<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            IPUM
            <small>Universidade do minho</small>
        </h1>

        <!-- listar utilizador-->

        <section class="content">
            <div class="row">
                <?php foreach ($musicas as $musica) : ?>
                <?php if ($musica['parent_id'] === NULL): ?>
                <div class="col-md-6">
                    <!-- Box Comment -->
                    
                        <div class="box box-primary box-solid collapsed-box" >
                            <div class="box-header with-border">
                                <div class="user-block">
                                    <h3 class="box-title">Música: <?php echo $musica['nome']; ?></h3>
                                </div>
                                <!-- /.user-block -->
                                <div class="box-tools">
                                    <div class="btn-group ">
                                        <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li><a href="#" style="color:#777;">Editar</a></li>
                                            <li><a href="<?php echo site_url('musica/registar/' . $musica['id']); ?>" style="color:#777;">Adicionar instrumento</a></li>
                                        </ul>
                                    </div>
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                    <button type="button" class="btn btn-box-tool"><i class="fa fa-times"></i></button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="<?php echo $musica['link']; ?>" allowfullscreen="true"></iframe>
                                </div>
                            </div>
                            <div class="box-footer">
                                <div class="row">
                                    <?php foreach ($musicas as $instrumento) : ?>
                                    <?php if ($instrumento['parent_id'] === $musica['id']): ?>
                                    <div class="col-md-6">
                                        <div class="box box-widget">
                                            <div class="box-header with-border">
                                                <div class="user-block">
                                                    <h3 class="box-title">Instrumento: <?php echo $instrumento['nome']; ?></h3>
                                                </div>
                                                <div class="box-tools">
                                                    <button type="button" class="btn btn-box-tool"><i class="fa fa-pencil"></i></button>
                                                    <button type="button" class="btn btn-box-tool"><i class="fa fa-times"></i></button>
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="<?php echo $instrumento['link']; ?>"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <!-- /.box-footer -->
                        </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                    <!-- /.box -->
                </div>
            </div>
        </section>
</div>

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Versão</b> 0.0.1
    </div>
    <strong>Copyright &copy; 2016.</strong> All rights reserved.
</footer>
</div>
<script src="<?php echo base_url() . 'assets/plugins/jQuery/jQuery-2.1.4.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/bootstrap/js/bootstrap.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/slimScroll/jquery.slimscroll.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/fastclick/fastclick.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/dist/js/app.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/dist/js/demo.js' ?>"></script>
</section>
</div>


