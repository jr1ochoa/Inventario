<?php

   include("../../config/net.php"); 

?>

<div id="main">

    <div class="inner">

        <!-- Encabezado -->

        <div id="content">

            <hr style='margin-top: 0px; padding-top: 0px;' />

            <div class="row">

                <div class="col-lg-12 col-md-12 col-xs-12">

                    <h2>Permisos</h2>

                </div>

            </div>



        </div>

    </div>

    

    <div class="inner">

        <div class="col-lg-12 col-md-12 col-xs-12 mt-4">



            <!-- Pestañas de navegación -->

            <ul class="nav nav-tabs" id="myTab" role="tablist">

                <li class="nav-item" role="presentation">

                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#permissions-tab" type="button" role="tab" aria-controls="home" aria-selected="true">Mis Permisos</a>

                </li>

                <li class="nav-item" role="presentation">

                    <a class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#request-tab" type="button" role="tab" aria-controls="profile" aria-selected="false">Mis Solicitudes</a>

                </li>

                <?php if($_SESSION["type"] == "Administrador" || $_SESSION["type"] == "RRHH"){ ?>

                    <li class="nav-item" role="presentation">

                        <a class="nav-link" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="profile" aria-selected="false">Permisos Realizados</a>

                    </li>

                <?php } ?>



                <?php if($_SESSION["type"] == "Administrador" || $_SESSION["type"] == "RRHH"){ ?>

                    <li class="nav-item" role="penalizacion">

                        

                    </li>

                <?php } ?>



            </ul>

            <div class="tab-content" id="myTabContent">







<!--Realizar Penalizaciones RRHH y Adminstradores -->

<div class="tab-pane fade" id="penalizacion" role="tabpanel" aria-labelledby="all-tab">

    <?php 

    /*



    SELECT w.area, wp.position, wpa.id as 'idAreaE', e.name1, e.name2, e.lastname1, e.lastname2, wb.area,

    wpb.position, wpab.id as 'idAreaB', eb.name1, eb.name2, eb.lastname1, eb.lastname2, eb.email, e.email,

    e.id as 'idE', eb.id as 'idB' FROM employee as e INNER JOIN workarea_positions_assignment as wpa

    ON wpa.idemployee = e.id AND wpa.enddate = '0000-00-00' INNER JOIN workarea_positions as wp ON

    wp.id = wpa.idposition INNER JOIN workarea as w ON w.id = wp.idarea INNER JOIN workarea_hierarchy as wh 

    ON wh.idposition = wp.id INNER JOIN workarea_positions_assignment as wpab ON wh.idboss = wpab.idposition AND

    wpa.enddate = '0000-00-00' INNER JOIN workarea_positions as wpb ON wpab.idposition = wpb.id 

    INNER JOIN workarea as wb ON wb.id = wpb.idarea INNER JOIN employee as eb ON wpab.idemployee = eb.id;

    

    */

    

    ?>

            <table id="tablaPermisosPenalizar" style="width: 100%;" class="mt-5">

            <thead>

                

                <th>EMPLEADO</th>

                <th>CARGO </th>

               

                <th>JEFE </th>

                <th>Registrar</th>

               

            </thead>

            <tbody>

            <?php

          



            

                        //Cargar permisos del empleado

            $query = 

            " SELECT DISTINCT   w.area, wp.position, wpa.id as 'idAreaE',  e.name1, e.name2, e.lastname1, e.lastname2, wb.area,

            wpb.position,wpb.id as 'idPosicionBoss', wpab.id as 'idAreaB', eb.name1, eb.name2, eb.lastname1, eb.lastname2, eb.email, e.email,

            e.id as 'idE', eb.id as 'idB'

            FROM employee as e 

            INNER JOIN workarea_positions_assignment as wpa

            ON wpa.idemployee = e.id AND wpa.enddate = '0000-00-00'

            INNER JOIN workarea_positions as wp ON

            wp.id = wpa.idposition 

            INNER JOIN workarea as w ON w.id = wp.idarea 

            INNER JOIN workarea_hierarchy as wh 

            ON wh.idposition = wp.id 

            INNER JOIN workarea_positions_assignment as wpab ON wh.idboss = wpab.idposition AND

            wpa.enddate = '0000-00-00' 

            INNER JOIN workarea_positions as wpb ON wpab.idposition = wpb.id 

            INNER JOIN workarea as wb ON wb.id = wpb.idarea 

            INNER JOIN employee as eb ON wpab.idemployee = eb.id

            where wpab.enddate = '0000-00-00' and e.id != eb.id

            ";

            $permissions = $net_rrhh->prepare($query);

            $permissions->execute();



            while ($data = $permissions->fetch()) {

            echo "

                <tr>

                   

                    <td>". sanear_string($data[3]." ".$data[4]." ".$data[5]." ".$data[6]) ."</td>

                    <td>$data[0]</td>

                   

                    <td>$data[11] &nbsp $data[12] &nbsp $data[13] &nbsp $data[14]</td>

                    <td><a class='btn btn-success' data-bs-toggle='modal' data-bs-target='#staticBackdrop' 

                    onclick='Penalties($data[2],$data[18],".$_SESSION['iu'].")'

                    style='color: white; cursor: pointer; font-size: 11px;'>

                        REGISTRAR PENALIZACION 

                    </a></td>

                </tr>

                ";

            }

                ?>

                

            </tbody>

                </table>

            </div>





                <!-- Tab "Mis Permisos" -->

                <div class="tab-pane fade show active" id="permissions-tab" role="tabpanel" aria-labelledby="home-tab">

                

                <div class="col-12 col-12-xsmall mt-5">

                    <h2>LISTADO DE PERMISOS SOLICITADOS</h2>

                </div>

                <div class="col-12 col-12-xsmall ms-auto mt-3">

                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#FormModalPermissions" onclick="myPermissions(0, 'add', <?=$_SESSION['iu'];?>)">Añadir</button>

                </div>

                

                    <table style="width: 100%;" class="mt-5">

                        <tr>

                            <th>Fecha/Hora de Inicio</th>

                            <th>Fecha/Hora de Finalización</th>

                            <th>Tipo de Permiso</th>

                            <th>Estado</th>                       

                            <th colspan="2">Acciones</th>

                           

                        </tr>

                        <?php

                        //Cargar permisos del empleado

                        $query = "SELECT p.* FROM processarea_permission as p 

                        INNER JOIN workarea_positions_assignment  as wpa ON p.idposition = wpa.id  AND wpa.enddate = '0000-00-00'

                        WHERE wpa.idemployee =". $_SESSION['iu'];

                        $permissions = $net_rrhh->prepare($query);

                        $permissions->execute();



                        while ($data = $permissions->fetch()) {

                          echo "<tr>

                                    <th>$data[4] $data[5]</th>

                                    <th>$data[6] $data[7]</th>

                                    <th>$data[3]</th>";



                                        //Acciones según estado del permiso

                                        if($data[9] == "Aceptar"){

                                            echo "<th>

                                            <p style='color: #0F9823'>Aceptado</p>

                                            </th>

                                            <th colspan='2'>

                                            <a data-bs-toggle='modal' data-bs-target='#FormModalPermissions' onclick='myRequests($data[0], \"employee\")'

                                                style='color: #0B79DE; cursor: pointer;'>

                                                    <i class='fas fa-search'></i>

                                                </a>

                                            </th>";

                                        }else if($data[9] == "Rechazar"){

                                            echo "<th>

                                            <p style='color: red'>Rechazado</p>

                                            </th>

                                            <th colspan='2'>

                                            <a data-bs-toggle='modal' data-bs-target='#FormModalPermissions' onclick='myRequests($data[0], \"employee\")'

                                                style='color: #0B79DE; cursor: pointer;'>

                                                    <i class='fas fa-search'></i>

                                                </a>

                                            </th>";

                                        }else{

                                            echo "<th>$data[9]</th>

                                            <th>

                                            <a data-bs-toggle='modal' data-bs-target='#FormModalPermissions' 

                                            onclick='myPermissions($data[0], \"update\",".$_SESSION['iu'].")'

                                                style='color: #0B79DE; cursor: pointer;'>

                                                    <i class='fas fa-edit'></i>

                                                </a>

                                            </th>

                                            <th>

                                                <a data-bs-toggle='modal' data-bs-target='#FormModalPermissions' 

                                                onclick='myPermissions($data[0], \"delete\",".$_SESSION['iu'].")'

                                                style='color: #0B79DE; cursor: pointer;'>

                                                    <i class='fas fa-trash-alt'></i>

                                                </a>

                                            </th>";

                                        }

                                    

                                    echo "</tr>";

                        }

                        

                        ?>

                    </table>

                </div>



                <!-- Tab "Mis Solicitudes" -->

                <div class="tab-pane fade" id="request-tab" role="tabpanel" aria-labelledby="profile-tab">

                    <div class="col-12 col-12-xsmall mt-5">

                        <h2>SOLICITUDES DE PERMISO</h2>

                    </div>

                    <table style="width: 100%;" class="mt-5">

                        <tr>

                            <th>Fecha/Hora de Inicio</th>

                            <th>Fecha/Hora de Finalización</th>

                            <th>Tipo de Permiso</th>

                            <th>Estado</th>                       

                            <th>Acciones</th>

                        </tr>

                        <?php

                        //Cargar solicitudes de permiso

                        $query = "SELECT p.* FROM processarea_permission as p 

                        INNER JOIN workarea_positions_assignment  as wpa ON p.idboss = wpa.id  AND wpa.enddate = '0000-00-00'

                        WHERE wpa.idemployee = ". $_SESSION['iu'];

                        $requestP = $net_rrhh->prepare($query);

                        $requestP->execute();



                        while ($data = $requestP->fetch()) {

                          echo "<tr>

                                    <th>$data[4] $data[5]</th>

                                    <th>$data[6] $data[7]</th>

                                    <th>$data[3]</th>";



                                    //Acciones según estado del permiso

                                    if($data[9] == "Aceptar"){

                                        echo "<th>

                                        <p style='color: #0F9823'>Aceptado</p>

                                        </th>

                                        <th>

                                        <a data-bs-toggle='modal' data-bs-target='#FormModalPermissions' onclick='myRequests($data[0], \"employee\")'

                                            style='color: #0B79DE; cursor: pointer;'>

                                                <i class='fas fa-search'></i>

                                            </a>

                                        </th>";

                                    }else if($data[9] == "Rechazar"){

                                        echo "<th>

                                        <p style='color: red'>Rechazado</p>

                                        </th>

                                        <th>

                                        <a data-bs-toggle='modal' data-bs-target='#FormModalPermissions' onclick='myRequests($data[0], \"employee\")'

                                            style='color: #0B79DE; cursor: pointer;'>

                                                <i class='fas fa-search'></i>

                                            </a>

                                        </th>";

                                    }else{

                                        echo "<th>$data[9]</th>

                                        <th>

                                        <a data-bs-toggle='modal' data-bs-target='#FormModalPermissions' onclick='myRequests($data[0], \"boss\")'

                                            style='color: #0B79DE; cursor: pointer;'>

                                                <i class='fas fa-edit'></i>

                                            </a>

                                        </th>";

                                    }

                                

                                echo "</tr>";

                        }

                        ?>

                    </table>

                </div>

                

                <!-- Tab de todos los permisos (RRHH y Administradores) -->

                <?php if($_SESSION["type"] == "Administrador" || $_SESSION["type"] == "RRHH"){ ?>

                <div class="tab-pane fade" id="all" role="tabpanel" aria-labelledby="all-tab">

                

                <div class="col-12 col-12-xsmall mt-5 mb-3">

                    <h2>LISTADO DE PERMISOS</h2>

                </div>

 

                <!-- Generar Reporte de Permisos -->



                <p class="fs-5 text-center my-3">Exportar Listado Mensual</p>



                <div class="mb-3 text-center">

                    <div class="form-check form-check-inline">

                        <input class="form-check-input" type="radio" name="filterRadio" id="rdMonths" value="months" checked>

                        <label class="form-check-label" for="rdMonths">Filtrar por meses</label>

                    </div>

                    <div class="form-check form-check-inline">

                        <input class="form-check-input" type="radio" name="filterRadio" id="rdDates" value="dates">

                        <label class="form-check-label" for="rdDates">Filtrar por fechas</label>

                    </div>

                </div>

                <div class="card mb-5">

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-5">

                                <div class="row">

                                    <div class="col-md-6">

                                        <label for="cboWorkarea" class="form-label">Área: </label>

                                        <select class="form-select" aria-label="Default select example" id="cboWorkarea">

                                            <option value="">Seleccionar Todos</option>

                                            <?php

                                                $query = "SELECT * FROM workarea WHERE visible = 1";

                                                $areas = $net_rrhh->prepare($query);

                                                $areas->execute();



                                                while ($data = $areas->fetch()) {

                                                    echo "<option value='$data[0]'>$data[1]</option>";

                                                }

                                            ?>

                                        </select>

                                    </div>

                                    <div class="col-md-6">

                                        <label for="cboEmployee" class="form-label">Empleado: </label>

                                        <select class="form-select" aria-label="Default select example" id="cboEmployee">

                                            <option value="">Seleccionar Todos</option>

                                        </select>

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-5">

                                <div id="monthFilter">

                                    <label for="cboMonth" class="form-label">Mes del reporte: </label>

                                    <select class="form-select" aria-label="Default select example" id="cboMonth">

                                        <?php

                                        $months = array('01' => "Enero", "02" => "Febrero", "03" => "Marzo", "04" => "Abril", "05" => "Mayo", "06" => "Junio",

                                        "07" => "Julio", "08" => "Agosto", "09" => "Septiembre", "10" => "Octubre", "11" => "Noviembre", "12" => "Diciembre");

                                        

                                        foreach ($months as $key => $value) {

                                            

                                            $selected = (date('m') == $key) ? "selected" : "";

                                            echo "<option value='$key' $selected>$value</option>";

                                            

                                        }

                                        ?>

                                    </select>

                                </div>

                                <div class="row" id="dateFilter" style="display: none;">

                                    <div class="col-md-6">

                                        <label for="txtStartDate" class="form-label">Fecha de inicio: </label>

                                        <input type="date" name="startdate" id="txtStartDate">

                                    </div>

                                    <div class="col-md-6">

                                        <label for="txtEndDate" class="form-label">Fecha de finalización: </label>

                                        <input type="date" name="enddate" id="txtEndDate">

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-2 text-center">

                                <button type="button" class="btn btn-success mt-4" id="btnExport" onclick="exportList()">Exportar</button>

                            </div>

                        </div>

                    </div>

                </div>

                

                    <table id="PermissionsTable" class="display" style="width: 100%;" >

                        <thead>

                            <tr>

                                <th>Solicitante</th>

                                <th>Área</th>

                                <th>Fecha/Hora de Inicio</th>

                                <th>Fecha/Hora de Finalización</th>

                                <th>Tipo de Permiso</th>

                                <th>Estado</th>                       

                                <th></th>

                                <th></th>

                                <th></th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php

                            //Cargar listado de permisos

                            $query = "SELECT p.* FROM processarea_permission as p 

                            INNER JOIN workarea_positions_assignment  as wpa ON p.idposition = wpa.id  AND wpa.enddate = '0000-00-00'";

                            $permissions = $net_rrhh->prepare($query);

                            $permissions->execute();



                            while ($data = $permissions->fetch()) {

                                //Cargar datos del empleado

                                $query = "SELECT w.area, wp.position, wpa.id, e.id, e.name1, e.name2, e.lastname1, e.lastname2 

                                FROM employee as e 

                                INNER JOIN workarea_positions_assignment as wpa ON wpa.idemployee = e.id 

                                INNER JOIN workarea_positions as wp ON wp.id = wpa.idposition 

                                INNER JOIN workarea as w ON w.id = wp.idarea 

                                WHERE wpa.enddate = '0000-00-00' AND wpa.id = ". $data[2];

                                $employees = $net_rrhh->prepare($query);

                                $employees->execute();

                                $dataE = $employees->fetch();



                            echo "<tr>

                                        <td>". sanear_string($dataE[4]." ".$dataE[5]." ".$dataE[6]." ".$dataE[7]) ."</td>

                                        <td>".sanear_string($dataE[0])."</td>

                                        <td>$data[4] $data[5]</td>

                                        <td>$data[6] $data[7]</td>

                                        <td>$data[3]</td>";

                                            if($data[9] == "Aceptar"){

                                                echo "<td><p style='color: #0F9823'>Aceptado</p></td>";

                                            }else if($data[9] == "Rechazar"){ 

                                                echo "<td>

                                                <p style='color: red'>Rechazado</p>

                                                </td>";

                                            }else{

                                                echo "<td>$data[9]</td>";

                                            }

                                        

                                        echo "<td>

                                                <a data-bs-toggle='modal' data-bs-target='#FormModalPermissions' onclick='myRequests($data[0], \"employee\")'

                                                    style='color: #0B79DE; cursor: pointer;'>

                                                        <i class='fas fa-search'></i>

                                                    </a>

                                                </td>

                                                <td>

                                                <a data-bs-toggle='modal' data-bs-target='#FormModalPermissions' 

                                                onclick='myPermissions($data[0], \"update\",".$dataE[3].")'

                                                    style='color: #0B79DE; cursor: pointer;'>

                                                        <i class='fas fa-edit'></i>

                                                    </a>

                                                </td>

                                                <td>

                                                    <a data-bs-toggle='modal' data-bs-target='#FormModalPermissions' 

                                                    onclick='myPermissions($data[0], \"delete\",".$dataE[3].")'

                                                    style='color: #0B79DE; cursor: pointer;'>

                                                        <i class='fas fa-trash-alt'></i>

                                                    </a>

                                                </td>

                                            </tr>";

                            }

                            ?>

                        </tbody>

                    </table>

                </div>

                <?php } ?>

            </div>

        </div>

    </div>



    <!-- Cargar ventana modal -->

    <div class="modal fade" id="FormModalPermissions" tabindex="-1" aria-labelledby="FormModal" aria-hidden="true">

        <?php include("view/permissions/permissions.modal.php"); ?>

    </div>



    <!-- Cargar ventana modal Penalizacion-->

    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

            <div class="modal-dialog">

                <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="staticBackdropLabel">REGISTRANDO PENALIZACION </h5>

                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                    </button>

                </div>

            

                <div id='loadModalPermissions2' class="modal-body">

                    



                

                </div>

                    

                </div>

            </div>

        </div>

</div>



<script src="https://code.jquery.com/jquery-3.5.1.js"></script>    

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>



<script>

    $(document).ready(function () {



        //Activar Datatable

        //$.noConflict();

        $('#PermissionsTable').DataTable({

            "order": [[ 0, "asc" ]], 

            "language": { "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json" }

        }); 

        $('#tablaPermisosPenalizar').DataTable({

            "order": [[ 0, "asc" ]], 

            "language": { "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json" }

        }); 

        



        $('#btnActionPermissions').attr('disabled', false);



        $('input[name="filterRadio"]').on('change', function() {

            if ($('#rdMonths').is(':checked')) {

                $('#dateFilter').css("display", "none");

                $('#monthFilter').css("display", "block");



            } else if ($('#rdDates').is(':checked')) {

                $('#monthFilter').css("display", "none"); 

                $('#dateFilter').css("display", "flex");

            }

        });



        $("#cboWorkarea").on('change', function() {

            $('#cboEmployee').empty();

            $.get("view/employees/_load.employee.php", { workarea: $("#cboWorkarea").val() },

                function (resultado) {

                    if (resultado == false) {

                        alert("Error");

                    }

                    else {

                        $('#cboEmployee').append(resultado);

                    }

                }

            );

        });

    });



    //Cargar acciones de mis permisos

    function myPermissions(ipm, acc, iu) {

        $("#loadModalPermissions").load("view/permissions/permissions.form.php", {ipm: ipm, acc: acc, iu: iu});

        if (acc == 'add'){

            $("#btnActionPermissions").removeClass().addClass('btn btn-success');

            $("#btnActionPermissions").text('Guardar');

        }else if(acc == 'update'){

            $("#btnActionPermissions").removeClass().addClass('btn btn-primary');

            $("#btnActionPermissions").text('Actualizar');

        }else{

            $("#btnActionPermissions").removeClass().addClass('btn btn-danger');

            $("#btnActionPermissions").text('Eliminar');

        }

        $("#btnActionPermissions").css("display", "block");

    }





    // Cargar acciones para penalizacion de horario 

    function Penalties(ipm, acc, iu)

    {

        $("#loadModalPermissions2").load("view/permissions/permission.penalties.php", {ipm: ipm, acc: acc, iu: iu});

    }





    //Cargar acciones de mis solicitudes

    function myRequests(ipm, mode) {

        $("#loadModalPermissions").load("view/permissions/permissions.request.php", {ipm: ipm, mode: mode});

        $("#btnActionPermissions").removeClass().addClass('btn btn-success');

        $("#btnActionPermissions").text('Guardar');

        if(mode == 'employee'){

            $("#btnActionPermissions").css("display", "none");

        }else{

            $("#btnActionPermissions").css("display", "block");

        }

    }



    //Exportar permisos

    function exportList() {

        var month = $("#cboMonth :selected").val();

        var area = $("#cboWorkarea :selected").val();

        var employee = $("#cboEmployee :selected").val();

        var startdate = $("#txtStartDate").val();

        var enddate = $("#txtEndDate").val();

        window.open("view/permissions/permission.report.php?month="+month+"&area="+area+"&startdate="+startdate+"&enddate="+enddate+"&employee="+employee, "_blank");

    }





</script>

<link rel="stylesheet" href='https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css'/>