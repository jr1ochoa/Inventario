<?php
include("../../config/net.php");
$idProyecto = $_REQUEST['idRelacion'];




?>
<style>
    .colorFondo{
        background-color: #FEF2D4;
    }
</style>
<div class="table-responsive">
<table class="table-sm table table table-bordered colorFondo">
    <thead>
        <th>Actividades de Proyecto</th>
        <th>Descripcion de Avance</th>
        <th>MES DE REGISTRO</th>
    </thead>
    <tbody>
    <?php 
    
    $query = "SELECT  actividades_proyecto , avance_deactvidad , MONTH(fh_creacion) FROM monitor_actividades_proyecto where id_ficha_encabezado = ?";
    $data3 = $net_rrhh->prepare($query);
    $data3->execute([$idProyecto]);
    while ($data = $data3->fetch()) {
        switch($data['MONTH(fh_creacion)'])
        {
            case 1:
                $nombreMes1 = 'Enero';
            break;
            case 2:
                $nombreMes1 = 'Febrero';
            break;
            case 3:
                $nombreMes1 = 'Marzo';
            break;
            case 4:
                $nombreMes1 = 'Abril';
            break;
            case 5:
                $nombreMes1 = 'Mayo';
            break;
            case 6:
                $nombreMes1 = 'Junio';
            break;
            case 7:
                $nombreMes1 = 'Julio';
            break;
            case 8:
                $nombreMes1 = 'Agosto';
            break;
            case 8:
                $nombreMes1 = 'Septiembre';
            break;
            case 10:
                $nombreMes1 = 'Octubre';
            break;
            case 11:
                $nombreMes1 = 'Noviembre';
            break;
            case 12:
                $nombreMes1 = 'Diciembre';
            break;
        }
        echo "
        <tr>       
            <td>".$data[0]."</td>  
            <td>".$data[1]."</td> 
            <td>".$nombreMes1."</td>          
         </tr>
                
        
        ";
    }
    ?>
  
    </tbody>
</table>
</div>