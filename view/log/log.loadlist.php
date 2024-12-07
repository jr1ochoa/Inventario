<?php include("../../config/net.php");

    $module = $_REQUEST["module"];

    $query = "SELECT action FROM `log` WHERE module LIKE '%$module%' GROUP BY action";
    $process = $net_rrhh->prepare($query);  
    $process->execute();

    $options = '<option value="" selected>Seleccionar Todos</option>';
    
    while ($data = $process->fetch()) {
        $options .= "<option value='$data[0]'>$data[0]</option>";
    }

    echo $options;
?>