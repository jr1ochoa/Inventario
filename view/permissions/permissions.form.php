<?php

    include("../../config/net.php");



    $ipm = $_REQUEST['ipm'];

    $acc = $_REQUEST['acc'];

    $iu = $_REQUEST['iu']; 

    $action = "Add Permission";



    if ($ipm != 0){

        if ($acc == "update"){

            $action = "Update Permission";

        }else if ($acc == "delete"){

            $action = "Delete Permission";

        }

        

        $query = "SELECT * FROM processarea_permission WHERE id = $ipm"; 

        $permissionList = $net_rrhh->prepare($query);

        $permissionList->execute();

        $dataPm = $permissionList->fetch();

    }



    /*

    SELECT w.area, wp.position, wpa.id as 'idAreaE', e.name1, e.name2, e.lastname1, e.lastname2, 

    wb.area, wpb.position,  wpab.id as 'idAreaB', eb.name1, eb.name2, eb.lastname1, eb.lastname2, eb.email, e.email, e.id as 'idE', eb.id as 'idB'

    FROM employee as e 

    INNER JOIN workarea_positions_assignment as wpa ON wpa.idemployee = e.id  AND wpa.enddate = '0000-00-00'

    INNER JOIN workarea_positions as wp ON wp.id = wpa.idposition 

    INNER JOIN workarea as w ON w.id = wp.idarea 

    INNER JOIN workarea_hierarchy as wh ON wh.idposition = wp.id

    INNER JOIN workarea_positions_assignment as wpab ON wh.idboss = wpab.idposition AND wpa.enddate = '0000-00-00'

    INNER JOIN workarea_positions as wpb ON wpab.idposition = wpb.id 

    INNER JOIN workarea as wb ON wb.id = wpb.idarea 

    INNER JOIN employee as eb ON wpab.idemployee = eb.id 

    WHERE e.id = $iu ORDER BY wb.id DESC LIMIT 1

    

    */

    $query = "

    

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

    

    

    ";

    $permissions = $net_rrhh->prepare($query);

    $permissions->execute();

    $rows = $permissions->fetchAll();

    $dataP = end($rows);

?>



<form action="process/" method="post" id="formPermissions">

    <h2 class="text-uppercase fw-bolder">Permisos</h2>

    <input type="hidden" class="form-control" name="process" value="Permissions" />

    <input type="hidden" class="form-control" name="action" value="<?= $action; ?>" />

    <input type="hidden" name="idboss" value="<?= $dataP[9]; ?>" />

    <input type="hidden" name="idposition" value="<?= $dataP[2]; ?>" />

    <input type="hidden" name="id" value="<?= $ipm; ?>" />



    <?php if($acc != "delete") { ?> 

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

            <th><?= sanear_string($dataP[8]); ?></th>

        </tr>

        <tr>

            <th>Área</th>

            <th><?= sanear_string($dataP[7]); ?></th>

        </tr>

        <tbody>



        </tbody> 

    </table>



    <div class="mb-3">

        <label for="recipient-name" class="col-form-label">Desde:</label>

        <input id="dateStart" class="form-control mb-2" type="date" name="dates" value="<?= $dataPm[4]; ?>">

        <input id="timeStart" class="form-control" type="time" name="times" value="<?= $dataPm[5]; ?>">

    </div>



    <div class="mb-3">

        <label for="recipient-name" class="col-form-label">Hasta:</label>

        <input id="dateEnd" class="form-control mb-2" type="date" name="datee" value="<?= $dataPm[6]; ?>">

        <input id="timeEnd" class="form-control" type="time" name="timee" value="<?= $dataPm[7]; ?>">

    </div>



    <div class="mb-3">

        <label for="recipient-name" class="col-form-label">Tipo de Permiso:</label>

        <select id="type" class="form-select" name="permissiontype">

            <?php 

                $options = array("Consulta al ISSS", "Consulta privada (Con comprobante)", "Diligencias Personales",

            "Duelo o Enfermedades", "Incapacidad del ISSS", "Obligaciones de Caracter Público", "Penalización",

            "Permiso por Graduación Universitaria", "Permiso por Matrimónio", "Permisos por Paternidad", "Por Capacitación o Talleres",

            "Por Compensación", "Por Evento", "Por Reunión Laboral", "Otros");

                foreach ($options as $option) {

                    $selected = ($option == $dataPm[3]) ? "selected='true'" : "";

                    echo "<option value='$option' $selected>$option</option>";

                }

            ?>

        </select>

    </div>



    <div class="mb-3" id="errands" style="display: none;">

        <label for="recipient-name" class="col-form-label">Horas por Diligencias Personales:</label>

        <div id="salida"></div>

    </div>



    <div class="mb-3">

        <label for="recipient-name" class="col-form-label">Motivo:</label>

        <textarea class="form-control" name="permissionreason" rows="3" maxlength="250"><?= $dataPm[8]; ?></textarea>

    </div>

    <?php }else{ ?>

        <p>¿Está seguro que desea eliminar el permiso <?= $dataPm[3]; ?>?</p>

    <?php } 



        $eName =  $dataP[3] . " " . $dataP[4] . " " . $dataP[5] . " " . $dataP[6];



        $query = "SELECT * FROM employee_institutional 

        WHERE idemployee = ". $dataP[17];

        $email = $net_rrhh->prepare($query);

        $email->execute();



        if ($email->rowCount() > 0) {

            $dataE = $email->fetch();

            $emailBoss = $dataE[2];

        }else{

            $emailBoss = $dataP[14];

        }

        

    ?>



    <input type="hidden" name="correoBoss" value="<?= $emailBoss; ?>" />

    <input type="hidden" name="employeeName" value="<?= sanear_string($eName); ?>" />





</form>

 

<script>

    $(document).ready(function(){



        $("#type").change(function(){

            hoursCheck();

        });

        $("#dateStart").blur(function(){

            hoursCheck();

            dateVerification();

        });

        $("#timeStart").blur(function(){

            hoursCheck();

            dateVerification();

        });

        $("#dateEnd").blur(function(){

            hoursCheck();

            dateVerification();

        });

        $("#timeEnd").blur(function(){

            hoursCheck();

            dateVerification();

        });





    });   



    function dateVerification(){

        var startDate = $("#dateStart").val();

        var endDate = $("#dateEnd").val();



        if(startDate == endDate){

            if($("#timeEnd").val() != ''){

                if($("#timeStart").val() > $("#timeEnd").val()){

                    alert("La hora de inicio no puede ser mayor a la de finalización");

                    $("#btnActionPermissions").css("display", "none");

                }else

                    $("#btnActionPermissions").css("display", "block");

            }

        }else if(startDate > endDate){

            if(endDate != ""){

                alert("La fecha de inicio no puede ser mayor a la de finalización");

                $("#btnActionPermissions").css("display", "none");

            }else

                $("#btnActionPermissions").css("display", "block");

        }

        else

            $("#btnActionPermissions").css("display", "block");

    }



    function hoursCheck(){

        var selectedOption = $("#type :selected").val();



        if(selectedOption == "Diligencias Personales"){

            document.getElementById('errands').style.display = "block";

            var parametros="hInicio="+$("#timeStart").val()+"&hFin="+$("#timeEnd").val()+"&fInicio="

            +$("#dateStart").val()+"&fFin="+$("#dateEnd").val()

            $.ajax({

                    data:  parametros,

                    url:   'view/permissions/permission.errands.php',

                    type:  'POST',

                    beforeSend: function () { },

                    success:  function (response) {                 

                        $("#salida").html(response);

                },

                error:function(){

                    alert("error jquery")

                    }

            });

        }else{

            document.getElementById('errands').style.display = "none";

            $("#btnActionPermissions").css("display", "block");

        }

    }

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>