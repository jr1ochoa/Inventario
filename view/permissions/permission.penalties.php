<?php 

include("../../config/net.php");



$ipm = $_REQUEST['ipm'];

$acc = $_REQUEST['acc'];

$iu = $_REQUEST['iu'];

$action = "Penalties Permission";



            

//Cargar permisos del empleado

$query = 

"SELECT    w.area, wp.position, wpa.id as 'idAreaE',  e.name1, e.name2, e.lastname1, e.lastname2, wb.area,

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



where wpa.id = $ipm   and eb.id =  $acc

;

";

$permissions = $net_rrhh->prepare($query);

$permissions->execute();

$rows = $permissions->fetchAll();

$dataP = end($rows);

?>

  

        <form action="process/" method="post" id="formPermissions">

       <center><h4 class="text-uppercase fw-bolder"><b>LLENAR LOS DATOS</b> </h4></center> 

        <hr>

        <input type="hidden" class="form-control" name="process" value="Permissions" />

        <input type="hidden" class="form-control" name="action" value="<?= $action; ?>" />

      

        <div class="form-group " style="display: none;">

            <label for="idEmpleadoPositions" >idEmpleadoPositions</label>

            <input type="hidden"  class="form-control"  value="<?= $dataP[2]; ?>" name="idEmpleadoPositions" placeholder="">

        </div>



        <div class="form-group " style="display: none;">

            <label for="idBossPositions">idBossPositions</label>

            <input type="hidden"  class="form-control"  value="<?= $dataP[9]; ?>" name="idBossPositions2" placeholder="">

        </div>

        

        <div class="form-group">

            <label for="exampleFormControlInput1">EMPLEADO SELECCIONADO :</label>

            <input type="text" class="form-control" disabled value="<?echo " $dataP[3] - $dataP[4] - $dataP[5] - $dataP[6]"; ?>" name="exampleFormControlInput1" placeholder="">

        </div>



        <div class="form-group">

            <label for="exampleFormControlInput1">JEFE A CARGO :</label>

            <input type="text" class="form-control" disabled value="<? echo "$dataP[11]  -  $dataP[12]  -  $dataP[13] -  $dataP[14]"; ?>" name="exampleFormControlInput1" placeholder="">

        </div>



        <div class="row">

            <div class="col-sm-6">

            <div class="form-group">

            <label for="exampleFormControlInput1">Digitar Cantidad de  Horas</label>

            <input type="number" min="0" step="1" max="8" class="form-control"  value="0" name="Hora" placeholder="">

        </div>

            </div>

            <div class="col-sm-6">

            <div class="form-group">

            <label for="exampleFormControlInput1">Digitar Cantidad de Minutos</label>

            <input type="number"  min="0" step="1" max="60" class="form-control"  value="0" name="Minutos" placeholder="">

        </div>

            </div>



        </div>



            <div class="form-group">

                <label for="exampleFormControlTextarea1">Escribir la Razon de la Penalizacion </label>

                <textarea class="form-control" name="penalizacion" rows="3"></textarea>

            </div>

            <div class="modal-footer">

                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">CANCELAR</button>

                    <button type="submit" class="btn btn-primary">REGISTRAR</button>

                </div>

        </form>

      

