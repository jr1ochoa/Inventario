<?php
include("../../config/net.php");
$idProyecto = $_REQUEST['idRelacion'];?>

<style>
    .colorFondo{
        background-color: #FEF2D4;
    }
</style>
<table class="table-sm table table table-bordered colorFondo mt-2">
    <thead>
        <th>Cambios relevantes del proyecto</th>
        <th>A nivel personal</th>
        <th>A nivel financiero</th>
        <th>A nivel operativo</th>
        <th>Otros</th>
    </thead>
    <tbody>
    <?php 
    //include("../../config/net.php");
    $query = "SELECT * FROM monitor_modificacion_mensual where id_ficha_encabezado = ?";
    $data3 = $net_rrhh->prepare($query);
    $data3->execute([$idProyecto]);
    while ($data = $data3->fetch()) {
        echo "
        <tr>       
            <td>".$data[1]."</td> 
            <td>".$data[2]."</td>   
            <td>".$data[3]."</td>  
            <td>".$data[4]."</td>    
            <td>".$data[6]."</td>          
         </tr>
                
        
        ";
    }
    ?>
  
    </tbody>
</table>