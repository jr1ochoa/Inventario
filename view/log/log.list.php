<?php include("../../config/net.php");

    $module = (isset($_REQUEST['module'])) ? "WHERE module LIKE '%".$_REQUEST['module']."%'" : "";
    $action = ($_REQUEST['action'] != '') ? "AND action LIKE '%".$_REQUEST['action']."%'" : "";

    $query = "SELECT l.*, CONCAT(name1, ' ', name2, ' ', name3, ' ', lastname1, ' ', lastname2) FROM log as l 
     INNER JOIN employee as e on l.idemployee = e.id 
     $module $action
     ORDER BY dtc DESC";
    $log = $net_rrhh->prepare($query);  
    $log->execute();
?>

<table id="LogTable" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Módulo</th>
            <th>Proceso</th>
            <th>Acción</th>
            <th>Empleado</th>
            <th>Fecha y Hora</th>
        </tr>
    </thead>
    <tbody>
    <?php
        while($data = $log->fetch())
        {                    
            echo "<tr>
                    <td>$data[0]</td>
                    <td>$data[1]</td>
                    <td>$data[3]</td>
                    <td>".utf8_encode($data[4])."</td>
                    <td>".utf8_encode($data[7])."</td>
                    <td>$data[6]</td>
                    </tr>";
        }

        ?>
    </tbody>
</table>
<script>
    $(document).ready(function () {
        $('#LogTable').DataTable( {
            "order": [[ 0, "asc" ]], 
            "language": { "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json" }
        });
    });
</script>