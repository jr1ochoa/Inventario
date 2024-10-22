<?php
include("../../config/net.php");
$idProyecto = $_REQUEST['idRelacion'];?>

<style>
    .colorFondo{
        background-color: #FEF2D4;
    }
</style>
<table class="table-sm table table table-bordered colorFondo">
    <thead>
        <th>Nombre</th>
        <th>Cargo</th>
        <th>% Tiempo</th>
        <th>Contratado por</th>
    </thead>
    <tbody>
    <?php 
  //  include("../../config/net.php");
    $query = "SELECT * FROM monitor_personal_proyecto where id_ficha_encabezado = ?";
    $data3 = $net_rrhh->prepare($query);
    $data3->execute([$idProyecto]);
    while ($data = $data3->fetch()) {
        echo "
        <tr>       
            <td>".$data[2]."</td>    
            <td>".$data[3]."</td>    
            <td><div class='progress'>
            <div class='progress-bar progress-bar-striped progress-bar-animated bg-success' role='progressbar' style='width: ".$data[4]."%' aria-valuenow='25' aria-valuemin='0' aria-valuemax='100'></div>
          </div>".$data[4]." %</td>    
            <td>".$data[1]."</td>          
         </tr>
                
        
        ";
    }
    ?>
  
    </tbody>
</table>