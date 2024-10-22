<?php 
include("../../config/net.php");
$idProyecto = $_REQUEST['idRelacion'];?>

<style>
    .colorFondo{
        background-color: #FEF2D4;
    }
</style>
<div class="table-responsive">
<table class="table-sm table table table-bordered colorFondo mt-2">
    <thead>
        <th>Logros Superados</th>
        <th>Buenas Practicas</th>
        <th>Observaciones de Problemas</th>
        <th>Otros Comentarios</th>
    </thead>
    <tbody>
    <?php 
   // include("../../config/net.php");
    $query = "SELECT * FROM monitor_buenas_practicas where id_ficha_encabezado = ?";
    $data3 = $net_rrhh->prepare($query);
    $data3->execute([$idProyecto]);
    while ($data = $data3->fetch()) {
        echo "
        <tr>       
            <td>".$data[1]."</td> 
            <td>".$data[2]."</td>   
            <td>".$data[3]."</td>  
            <td>".$data[4]."</td>            
         </tr>
                
        
        ";
    }
    ?>
  
    </tbody>
</table>
</div>