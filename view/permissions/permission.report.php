<?php include("../../config/net.php");

$month = $_REQUEST['month'];
$area = $_REQUEST['area'];
$employee = $_REQUEST['employee'];
$startdate = $_REQUEST['startdate'];
$enddate = ($_REQUEST['enddate'] == "") ? date("Y-m-d") : $_REQUEST['enddate'];
$title = "";
$filter = "";

if ($startdate == "") {
    switch ($month) {
        case "01": $title = "Enero ".date("Y"); break;
        case "02": $title = "Febrero ".date("Y"); break;
        case "03": $title = "Marzo ".date("Y"); break;
        case "04": $title = "Abril ".date("Y"); break;
        case "05": $title = "Mayo ".date("Y"); break;
        case "06": $title = "Junio ".date("Y"); break;
        case "07": $title = "Julio ".date("Y"); break;
        case "08": $title = "Agosto ".date("Y"); break;
        case "09": $title = "Septiembre ".date("Y"); break;
        case "10": $title = "Octubre ".date("Y"); break;
        case "11": $title = "Noviembre ".date("Y"); break;
        case "12": $title = "Diciembre ".date("Y"); break;
    }

    $filter = "WHERE MONTH(p.dtc) = $month";
}else{
    $filter = "WHERE (p.dtc BETWEEN '$startdate' AND '$enddate')";
    $title = "$startdate - $enddate";
}

$filter .= ($area != '') ? " AND wp.idarea = $area" : ""; 
$filter .= ($employee != '') ? " AND wpa.idemployee = $employee" : "";

header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");
header("Content-Disposition: attachment; filename=Reporte_Permisos_$title.xls");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);

?>

<style>
    table, td, th {
        border: 1px solid;
    }
    td{
        text-align: left;
    }
</style>

<h1>Reporte de permisos (<?=$title?>) </h1>

<table id="PermissionsTable" class="display" style="width: 100%;" >
    <thead>
        <tr>
            <th></th>
            <th colspan="3">Datos del Solicitante</th>
            <th colspan="3">Datos del Encargado</th>
            <th colspan="4">Datos del Permiso</th>
        </tr>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Cargo</th>
            <th>Área</th>
            <th>Nombre</th>
            <th>Cargo</th>
            <th>Área</th>
            <th>Fecha/Hora de Inicio</th>
            <th>Fecha/Hora de Finalización</th>
            <th>Tipo de Permiso</th>
            <th>Estado</th>                       
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT p.* FROM processarea_permission as p 
        INNER JOIN workarea_positions_assignment  as wpa ON p.idposition = wpa.id  AND wpa.enddate = '0000-00-00'
        INNER JOIN workarea_positions as wp ON wp.id = wpa.idposition $filter";
        $permissions = $net_rrhh->prepare($query);
        $permissions->execute();
        $i=0;

        while ($data = $permissions->fetch()) {
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
            WHERE wpa.id =".$data[2];
            $employees = $net_rrhh->prepare($query);
            $employees->execute();
            $dataE = $employees->fetch();
            $i++;

        echo "<tr>
                    <td>$i</td>

                    <td>". sanear_string($dataE[3]." ".$dataE[4]." ".$dataE[5]." ".$dataE[6]) ."</td>
                    <td>".sanear_string($dataE[1])."</td>
                    <td>".sanear_string($dataE[0])."</td>

                    <td>". sanear_string($dataE[10]." ".$dataE[11]." ".$dataE[12]." ".$dataE[13]) ."</td>
                    <td>".sanear_string($dataE[8])."</td>
                    <td>".sanear_string($dataE[7])."</td>
                    
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
                    
                    echo "</tr>";
        }
        ?>
    </tbody>
</table>
<br/>

