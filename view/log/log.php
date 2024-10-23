<?php include("../../config/net.php");?>

<!-- jQuery 3.6.1-->
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<!-- DataTables-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

<!-- Main -->
<div id="main"> 
    <div class="inner">

    <!-- Content -->
        <div id="content">
            <h2 class="mt-3">Logs de Registro</h2>
            <hr style='margin-top: 0px; padding-top: 0px;'/>
            
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <label for="cboModulo" class="form-label">Módulo</label>
                            <select class="form-select" id="cboModulo" aria-label="Default select example">
                                <option value="" selected>Seleccionar Todos</option>
                                <?php
                                    $query = "SELECT module FROM log GROUP BY module";
                                    $module = $net_rrhh->prepare($query);  
                                    $module->execute();

                                    while ($data = $module->fetch()) {
                                        echo "<option value='$data[0]'>$data[0]</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <label for="cboAction" class="form-label">Acción</label>
                            <select class="form-select" id="cboAction" aria-label="Default select example">
                                <option value="" selected>Seleccione un modulo</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div id="loadList"></div>

        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#loadList").load("view/log/log.list.php");
    });

    $("#cboModulo").change(function(){
        $("#cboAction").load("view/log/log.loadlist.php", {
            module: $("#cboModulo").val()
        });
        loadList()
    });
    $("#cboAction").change(function(){
        loadList();
    });

    function loadList(){
        $("#loadList").load("view/log/log.list.php", {
            module: $("#cboModulo").val(),
            action: $("#cboAction").val()
        });
    }
</script>

