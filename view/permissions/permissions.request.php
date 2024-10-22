<?php include("../../config/net.php"); //Conexión a la BDD



    $ipm = $_REQUEST['ipm'];



    //Cargar datos de la asignación

    $query = "SELECT * FROM processarea_permission WHERE id = $ipm"; 

    $permissionList = $net_rrhh->prepare($query);

    $permissionList->execute();

    $dataPm = $permissionList->fetch();





    //Obtener datos del empleado y jefe

    $query = "SELECT w.area, wp.position, wpa.id, e.name1, e.name2, e.lastname1, e.lastname2, 

    wb.area, wpb.position,  wpab.id, eb.name1, eb.name2, eb.lastname1, eb.lastname2 

    FROM employee as e 

    INNER JOIN workarea_positions_assignment as wpa ON wpa.idemployee = e.id  AND wpa.enddate = '0000-00-00'

    INNER JOIN workarea_positions as wp ON wp.id = wpa.idposition 

    INNER JOIN workarea as w ON w.id = wp.idarea 

    INNER JOIN workarea_hierarchy as wh ON wh.idposition = wp.id

    INNER JOIN workarea_positions_assignment as wpab ON wh.idboss = wpab.idposition AND wpa.enddate = '0000-00-00'

    INNER JOIN workarea_positions as wpb ON wpab.idposition = wpb.id 

    INNER JOIN workarea as wb ON wb.id = wpb.idarea 

    INNER JOIN employee as eb ON wpab.idemployee = eb.id  

    WHERE wpa.id =". $dataPm[2]." AND wpab.enddate = '0000-00-00'";


/*
    SELECT w.area, wp.position, wpa.id as 'idAreaE', e.name1, e.name2, e.lastname1, e.lastname2, 
    wb.area, wpb.position,  wpab.id as 'idAreaB', eb.name1, eb.name2, eb.lastname1, eb.lastname2, eb.email, e.email, e.id as 'idE', eb.id as 'idB', wpab.enddate
    FROM employee as e 
    INNER JOIN workarea_positions_assignment as wpa ON wpa.idemployee = e.id  
    INNER JOIN workarea_positions as wp ON wp.id = wpa.idposition 
    INNER JOIN workarea as w ON w.id = wp.idarea 
    INNER JOIN workarea_hierarchy as wh ON wh.idposition = wp.id
    INNER JOIN workarea_positions_assignment as wpab ON wh.idboss = wpab.idposition 
    INNER JOIN workarea_positions as wpb ON wpab.idposition = wpb.id 
    INNER JOIN workarea as wb ON wb.id = wpb.idarea 
    INNER JOIN employee as eb ON wpab.idemployee = eb.id 
    WHERE e.id = $iu AND wpab.enddate = '0000-00-00' and e.id != eb.id ORDER BY wb.id;

*/

    $permissions = $net_rrhh->prepare($query); 

    $permissions->execute();

    $dataP = $permissions->fetch();

?>



<!-- Cargar vista de la solicitud -->

<form action="process/" method="post" id="formPermissions">

    <h2 class="text-uppercase fw-bolder">Permisos</h2>

    <input type="hidden" class="form-control" name="process" value="Permissions" />

    <input type="hidden" class="form-control" name="action" value="Permissions Answer" />

    <input type="hidden" name="id" value="<?= $ipm; ?>" />



    <h3>Datos del Empleado</h3>

    <table id="UserTable" class="display" style="width:100%">

        <tr>

            <th>Empleado</th>

            <th><?= sanear_string($dataP[3]) . " " . sanear_string($dataP[4]) . " " . sanear_string($dataP[5]) . " " . sanear_string($dataP[6]); ?></th>

        </tr>

        <tr>

            <th>Cargo</th>

            <th><?= sanear_string($dataP[1]); ?></th>

        </tr>

        <tr>

            <th>Área</th>

            <th><?= sanear_string($dataP[0]); ?></th>

        </tr>

        <tbody>



        </tbody> 

    </table>

    



    <h3>Datos del Jefe</h3>

    <table id="UserTable" class="display" style="width:100%">

        <tr>

            <th>Jefe</th>

            <th><?= sanear_string($dataP[10]) . " " . sanear_string($dataP[11]) . " " . sanear_string($dataP[12]) . " " . sanear_string($dataP[13]); ?></th>

        </tr>

        <tr>

            <th>Cargo</th>

            <th><?= sanear_string($dataP[8]) ?></th>

        </tr>

        <tr>

            <th>Área</th>

            <th><?= sanear_string($dataP[7]) ?></th>

        </tr>

        <tbody>



        </tbody> 

    </table>



    <div class="row">

        <div class="col-6">

            <div class="mb-3">

                <label for="recipient-name" class="col-form-label">Desde:</label>

                <p><?= $dataPm[4]; ?> a las <?= $dataPm[5]; ?></p> 

            </div>

        </div>

        <div class="col-6">

            <div class="mb-3">

                <label for="recipient-name" class="col-form-label">Hasta:</label>

                <p><?= $dataPm[6]; ?> a las <?= $dataPm[7]; ?></p> 

            </div>

        </div>

    </div>

    



    <div class="row">

        <div class="col-6">

            <div class="mb-3">

                <label for="recipient-name" class="col-form-label">Tipo de Permiso:</label>

                <p><?= $dataPm[3]; ?></p> 

            </div>

        </div>

        <div class="col-6">

            <div class="mb-3">

                <label for="recipient-name" class="col-form-label">Motivo:</label>

                <p><?= $dataPm[8]; ?></p>

            </div>

        </div>

    </div>



    <!-- Vista para el jefe -->

    <?php

        if($_REQUEST['mode'] == 'boss'){

    ?>



    <div class="mb-3">

        <label for="recipient-name" class="col-form-label">Respuesta:</label>

        <select class="form-select" name="status">

            <?php 

                $options = array("Aceptar", "Rechazar");

                foreach ($options as $option) {

                    $selected = ($option == $dataPm[9]) ? "selected='true'" : "";

                    echo "<option value='$option' $selected>$option</option>";

                }

            ?>

        </select>

    </div>



    <div class="mb-3">

        <label for="recipient-name" class="col-form-label">Comentario:</label>

        <textarea class="form-control" name="bosscomentary" rows="3"><?=$dataPm[10];?></textarea>

    </div>



    <!-- Vista para el empleado -->

    <?php }else{ ?>



    <div class="row">

        <div class="col-6">

            <div class="mb-3">

                <label for="recipient-name" class="col-form-label">Estado:</label>

                <p><?php 

                if($dataPm[9]=='Aceptar'){

                    echo 'Aceptado';

                }elseif($dataPm[9]=='Rechazar'){

                    echo 'Rechazado';

                }else{

                    echo $dataPm[9];

                } ?></p> 

            </div>

        </div>

        <div class="col-6">

            <div class="mb-3">

                <label for="recipient-name" class="col-form-label">Comentario del jefe:</label>

                <p><?= $dataPm[10]; ?></p>

            </div>

        </div>

    </div>



    <?php } ?>

</form>