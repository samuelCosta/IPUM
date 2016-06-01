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

                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class=" <?php echo ($tab == 'tab1') ? 'active' : ''; ?>"> <a href="#tab_1" data-toggle="tab">Por Eventos</a></li>
                        <li class=" <?php echo ($tab == 'tab2') ? 'active' : ''; ?>"><a href="#tab_2" data-toggle="tab">Por Ano</a></li>
                        <li class=" <?php echo ($tab == 'tab3') ? 'active' : ''; ?>"><a href="#tab_3" data-toggle="tab">Por Elemento</a></li>
                        <li class=" <?php echo ($tab == 'tab4') ? 'active' : ''; ?>"><a href="#tab_4" data-toggle="tab">Total Eventos</a></li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane <?php echo ($tab == 'tab1') ? 'active' : ''; ?>" id="tab_1">

                            <!-- --------------  -------------------  PESQUISAR POR EVENTO----------------------------->
                            <form action="<?= base_url() ?>utilizador/eventosUtilizadores" method="post" >
                                <div class="box-header">
                                    <h3 class="box-title"></h3>

                                    <div class="box-tools">
                                        <div class="input-group" style="width: 500px;">

                                            <input type="text"  class="form-control input-sm pull-left" name="designacao" id="productname" value="<?php echo set_value('designacao'); ?>"placeholder="Pesquisar por eventos..." >      
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!--                   ------------------------------ ----------------------->
                            <div class="box-body">                       
                                <table  id="porEventos" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nome </th>
                                            <th>Email </th>                                     
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                        if (isset($utilizadores)) {
                                            foreach ($utilizadores as $uti) {
                                                ?>
                                                <tr>
                                                    <td><?= $uti->nome; ?> </td>
                                                    <td>  <?= $uti->email; ?> </td>
                                                
                                                </tr>
                                            <?php } } else { } ?>
                                    </tbody>
                                </table>
                            </div><!-- /.box-body -->
                        </div><!-- /.tab-pane -->





                        <!-- ----------- -- ---------------  PESQUISAR POR ANO---------------------------------->
                        <div class="tab-pane <?php echo ($tab == 'tab2') ? 'active' : ''; ?>" id="tab_2">

                            <form action="<?= base_url() ?>utilizador/eventosPorAno" method="post" >
                                <div class="box-header">
                                    <h3 class="box-title"></h3>

                                    <div class="box-tools">
                                        <div class="input-group" style="width: 500px;">
                                            <input type="text"  class="form-control input-sm pull-left" name="ano" id="productname" value="<?php echo set_value('ano'); ?>" placeholder="Pesquisar por ano...ex:2016" >      
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div  class="box-body ">    
                                <table id="porAno" class="table table-bordered table-hover">                 
                                    <thead>
                                        <tr>
                                            <th>Nome Atuação </th>
                                            <th>Data </th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($eventos)) {

                                            foreach ($eventos as $uti) {
                                                ?>

                                                <tr>
                                                    <td >  <?= $uti->designacao; ?> </td>
                                                    <td >  <?= $uti->dataEvento; ?> </td>
                                                    <td ><a href="<?= $uti->idEventos; ?>"  type="submit" class="submit btn-lg" data-target="#myModal" data-toggle="modal" value="Ver Detalhes" class="input_box"  > <i class="fa fa-info"></i> </a>
                                                    </td> 

                                                </tr>
    <?php }
} else {
    
} ?>
                                    </tbody>
                                </table>                               
                            </div><!-- /.box-body -->
                        </div><!-- /.tab-pane -->

                        <!------------------------------------------------------------POR ELEMENTO---------------------->


                        <div class="tab-pane <?php echo ($tab == 'tab3') ? 'active' : ''; ?>" id="tab_3">                         
                            <form action="<?= base_url() ?>utilizador/utilizadorEventos" method="post" >
                                <div class="box-header">
                                    <h3 class="box-title"></h3>

                                    <div class="box-tools">
                                        <div class="input-group" style="width: 500px;">

                                            <input type="text"  class="form-control input-sm pull-left" name="utilizador"  id="utilizadores" value="<?php echo set_value('utilizador'); ?>" placeholder="Pesquisar por utilizador" >      
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!--                   ------------------------------ ----------------------->

                            <div  class="box-body ">    

                                <table id="porElemento" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nome </th>
                                            <th>Data </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($presenca)) {

                                            foreach ($presenca as $uti) {
                                                ?>
                                                <tr>
                                                    <td>  <?= $uti->designacao; ?> </td>
                                                    <td>  <?= $uti->dataEvento; ?> </td>
                                                    <td></td>
                                                </tr>
                                                      <?php }
                                                            } else {    
                                                         } ?>
                                    </tbody>
                                </table>                               
                            </div><!-- /.box-body -->                    
                        </div><!-- /.tab-pane -->


                        <!--   ------------------------------------------TOTAL Eventos------------------------                     -->

                        <div class="tab-pane <?php echo ($tab == 'tab4') ? 'active' : ''; ?>" id="tab_4">


                            <form action="<?= base_url() ?>utilizador/totalEventos" method="post" >
                                <div class="box-header">
                                    <h3 class="box-title"></h3>

                                    <div class="box-tools">
                                        <div class="input-group" style="width: 500px;">

                                            <input type="text"  class="form-control input-sm pull-left" name="ano"  id="utilizadores" value="<?php echo set_value('ano'); ?>" placeholder="Pesquisar por ano" >      
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!--                   ------------------------------ ----------------------->

                            <div  class="box-body ">                                
                                <table  id="totalEventos"  class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nome </th>
                                            <th>Total de Atuações </th>
                                            <th>Total de Ensaios </th>                                               
                                        </tr>
                                    </thead>
                                    <tbody>

<?php
if (isset($utilizadores1, $totalAtuacoes, $totalEnsaios)) {

    foreach ($utilizadores1 as $ind => $uti) {
        ?>
                                                <tr>
                                                    <td >  <?= $uti->nome; ?> </td>                                                   
                                                    <td >  <?= $totalAtuacoes[$ind]; ?> </td>
                                                    <td >  <?= $totalEnsaios[$ind]; ?> </td>
                                                    <td></td>
                                                </tr>

    <?php }
} else {
    
}
?>
                                    </tbody>
                                </table>                           
                            </div><!-- /.box-body -->                                                   
                        </div><!-- /.tab-pane -->                     
                    </div><!-- /.tab-content -->
                </div><!-- nav-tabs-custom -->
            </div>



            <!--             --------------------------------------UTILAZADORES DO EVENTO     ----- ---->

        </div>
    </section>

</div><!-- /.content-wrapper -->


<!-------------------------------------Detalhes por ano------------------------------>


<div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="myModal" role="dialog" tabindex="-1">
    <div class="modal-dialog">       
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Utilizadores Presentes na Atuação </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div id="listaUtilizadores"  >
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal" type="button">Fechar</button>

                </div>
            </div>      
    </div>
</div>

<!------------------------------------------------------------------>

<script src="<?php base_url('assets/plugins/jQuery/jQuery-2.1.4.min.js') ?>"></script>
<script src="<?php base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/datatables/jquery.dataTables.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/datatables/dataTables.bootstrap.min.js' ?>"></script>
<script src="<?php base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js') ?>"></script>
<script src="<?php base_url( 'assets/plugins/fastclick/fastclick.js') ?>"></script>
<script src="<?php base_url( 'assets/dist/js/app.min.js') ?>"></script>

<script type="text/javascript">
    $(document).ready(function () {

        $('#productname').autocomplete({
            source: "<?php echo site_url('utilizador/searchEventos/?'); ?>"
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {

        $('#utilizadores').autocomplete({
            source: "<?php echo site_url('utilizador/searchUtilizadores/?'); ?>"
        });
    });
</script>
<script type="text/javascript">

// Ajax post

    $(document).ready(function () {
        $(".submit").click(function (event) {
            event.preventDefault();

            var id = $(this).attr('href');


//var user_name = $("input#name").val();
            var password = $("input#pwd").val();
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "utilizador/verDetalhesEvento",
                dataType: 'json',
                data: {name: id},
                success: function (res) {

                    html = "<table class='table table-hover'><thead>";
                    html += "<tr><th>Nome</th><th>Email</th></tr>";
                    html += "</thead><tbody>";
                    for ($i = 0; $i < res.length; $i++) {
                        html += "<tr><td>" + res[$i].nome + "</td><td>" + res[$i].email + "</td></tr>";

                    }//fim do laço
                    html += "</tbody></table>";
                    $("#listaUtilizadores").html(html);
                    //coloco a variável html na tela

                }
            });
        });
    });

</script>


<script type="text/javascript">

    $("#totalEventos").DataTable({
        "initComplete": function () {
            this.api().columns().every(function () {
                var column = this;
                if (column.index() < 3) {
                    var select = $('<select><option value=""></option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function () {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                column.search(val ? '^' + val + '$' : '', true, false).draw();
                            });

                    column.data().unique().sort().each(function (d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>')
                    });
                }
            });
        },
        "language": {
            "lengthMenu": "Ver _MENU_ registos",
            "info": "_START_ - _END_ de _TOTAL_ registos",
            "infoEmpty": "0 - 0 de 0 registos",
            "infoFiltered": "(selecionado de _MAX_ registos totais)",
            "search": "Pesquisar:",
            "zeroRecords": "Não existem registos correspondentes",
            "emptyTable": "Não existem registos disponíveis",
            "paginate": {
                "previous": "Anterior",
                "next": "Seguinte"
            }
        },
        "columnDefs": [
            {targets: 3, orderable: false}
        ]
    });

</script>

<script type="text/javascript">

    $("#porElemento").DataTable({
        "initComplete": function () {
            this.api().columns().every(function () {
                var column = this;
                if (column.index() < 2) {
                    var select = $('<select><option value=""></option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function () {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                column.search(val ? '^' + val + '$' : '', true, false).draw();
                            });

                    column.data().unique().sort().each(function (d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>')
                    });
                }
            });
        },
        "language": {
            "lengthMenu": "Ver _MENU_ registos",
            "info": "_START_ - _END_ de _TOTAL_ registos",
            "infoEmpty": "0 - 0 de 0 registos",
            "infoFiltered": "(selecionado de _MAX_ registos totais)",
            "search": "Pesquisar:",
            "zeroRecords": "Não existem registos correspondentes",
            "emptyTable": "Não existem registos disponíveis",
            "paginate": {
                "previous": "Anterior",
                "next": "Seguinte"
            }
        },
        "columnDefs": [
            {targets: 2, orderable: false}
        ]
    });


</script>
<script type="text/javascript">

    $("#porAno").DataTable({
        "initComplete": function () {
            this.api().columns().every(function () {
                var column = this;
                if (column.index() < 3) {
                    var select = $('<select><option value=""></option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function () {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                column.search(val ? '^' + val + '$' : '', true, false).draw();
                            });

                    column.data().unique().sort().each(function (d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>')
                    });
                }
            });
        },
        "language": {
            "lengthMenu": "Ver _MENU_ registos",
            "info": "_START_ - _END_ de _TOTAL_ registos",
            "infoEmpty": "0 - 0 de 0 registos",
            "infoFiltered": "(selecionado de _MAX_ registos totais)",
            "search": "Pesquisar:",
            "zeroRecords": "Não existem registos correspondentes",
            "emptyTable": "Não existem registos disponíveis",
            "paginate": {
                "previous": "Anterior",
                "next": "Seguinte"
            }
        },
        "columnDefs": [
            {targets: 2, orderable: false}
        ]
    });

</script>
<script type="text/javascript">

    $("#porEventos").DataTable({
        "initComplete": function () {
            this.api().columns().every(function () {
                var column = this;
                if (column.index() < 2) {
                    var select = $('<select><option value=""></option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function () {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                column.search(val ? '^' + val + '$' : '', true, false).draw();
                            });

                    column.data().unique().sort().each(function (d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>')
                    });
                }
            });
        },
        "language": {
            "lengthMenu": "Ver _MENU_ registos",
            "info": "_START_ - _END_ de _TOTAL_ registos",
            "infoEmpty": "0 - 0 de 0 registos",
            "infoFiltered": "(selecionado de _MAX_ registos totais)",
            "search": "Pesquisar:",
            "zeroRecords": "Não existem registos correspondentes",
            "emptyTable": "Não existem registos disponíveis",
            "paginate": {
                "previous": "Anterior",
                "next": "Seguinte"
            }
        },
        "columnDefs": [
            {targets: 1, orderable: false}
        ]
    });

</script>
