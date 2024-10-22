<?php 
include("../../config/net.php");
$idProyecto = $_REQUEST['idRelacion'];?>
<style>
    .colorFondo{
        background-color: #FEF2D4;
    }
</style>
<div class="table-responsive">
<table class="table-sm table table table-bordered colorFondo">
    <thead>
        <th>Metas del Proyecto</th>
        <th>Descripcion de la Meta</th>
        <th>MES DE REGISTRO</th>
    </thead>
    <tbody>
    <?php 
   // include("../../config/net.php");
    $query = "SELECT metas_proyecto  , avance_demetas , MONTH(fh_creacion) FROM monitor_metas_proyecto where id_ficha_encabezado = ?";
    $data3 = $net_rrhh->prepare($query);
    $data3->execute([$idProyecto]);
    while ($data = $data3->fetch()) {
        switch($data['MONTH(fh_creacion)'])
        {
            case 1:
                $nombreMes2 = 'Enero';
            break;
            case 2:
                $nombreMes2 = 'Febrero';
            break;
            case 3:
                $nombreMes2 = 'Marzo';
            break;
            case 4:
                $nombreMes2 = 'Abril';
            break;
            case 5:
                $nombreMes2 = 'Mayo';
            break;
            case 6:
                $nombreMes2 = 'Junio';
            break;
            case 7:
                $nombreMes2 = 'Julio';
            break;
            case 8:
                $nombreMes2 = 'Agosto';
            break;
            case 8:
                $nombreMes2 = 'Septiembre';
            break;
            case 10:
                $nombreMes2 = 'Octubre';
            break;
            case 11:
                $nombreMes2 = 'Noviembre';
            break;
            case 12:
                $nombreMes2 = 'Diciembre';
            break;
        }
        echo "
        <tr>       
            <td>".$data[0]."</td>    
            <td>".$data[1]."</td>  
            <td>".$nombreMes2."</td>          
         </tr>
                
        
        ";
    }
    ?>
  
    </tbody>
</table>
</div>