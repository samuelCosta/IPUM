<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            IPUM
            <small>Universidade do minho</small>
        </h1>

    </section>

    <!-- listar utilizador-->

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Histórico de Manutenções</h3>
                        <a class="btn-lg" href="<?php echo site_url('instrumento'); ?>">
                            <i class="fa fa-arrow-left"></i>
                        </a>
                    </div>
                    <div class="box-body">
                        <table id="instrumentos_dt" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Tipo de Material</th>
                                    <th>Data da Manutenção</th>
                                    <th>Custo</th>
                                    <th>Elemento</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($historico as $hist): ?>
                                    <tr>
                                        <td><?php echo $hist['tipo_material_descricao']; ?></td>
                                        <td><?php echo $hist['data_manutencao']; ?></td>
                                        <td><?php echo $hist['custo_total']; ?></td>
                                        <td><?php echo $hist['elemento']; ?></td>
                                        <td>
                                            <a class="btn-lg" href="<?php echo site_url('instrumento/delete_manutencao/' . $hist['id']); ?>">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>