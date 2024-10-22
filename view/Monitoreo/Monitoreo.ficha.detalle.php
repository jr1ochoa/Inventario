<?php $idProyecto = $_REQUEST['idRelacion'];?>
<style>
    .colorFondo{
        background-color: #FEF2D4;
    }
</style>

<table class="table-sm table table table-bordered colorFondo">
    <thead>
        <th>Indicadores</th>
        <th>Resultados</th>
        <th>Objetivos</th>
        <th>Actividades</th>
        <th>MES DE REGISTRO</th>
    </thead>
    <tbody>
    <?php 
    include("../../config/net.php");
    $query = "SELECT proyecto_indicador,proyecto_resultados,proyecto_objetivos,proyecto_actividades,MONTH(fh_informe ) FROM monitor_detalle_general where id_ficha_encabezado = ?";
    $data3 = $net_rrhh->prepare($query);
    $data3->execute([$idProyecto]);
    while ($data = $data3->fetch()) {
        switch($data['MONTH(fh_informe )'])
        {
            case 1:
                $nombreMes = 'Enero';
            break;
            case 2:
                $nombreMes = 'Febrero';
            break;
            case 3:
                $nombreMes = 'Marzo';
            break;
            case 4:
                $nombreMes = 'Abril';
            break;
            case 5:
                $nombreMes = 'Mayo';
            break;
            case 6:
                $nombreMes = 'Junio';
            break;
            case 7:
                $nombreMes = 'Julio';
            break;
            case 8:
                $nombreMes = 'Agosto';
            break;
            case 8:
                $nombreMes = 'Septiembre';
            break;
            case 10:
                $nombreMes = 'Octubre';
            break;
            case 11:
                $nombreMes = 'Noviembre';
            break;
            case 12:
                $nombreMes = 'Diciembre';
            break;
        }
        echo "
        <tr>       
            <td>".$data['proyecto_indicador']."</td>    
            <td>".$data['proyecto_resultados']."</td>   
            <td>".$data['proyecto_objetivos']."</td>   
            <td>".$data['proyecto_actividades']."</td>  	         
            <td>".$nombreMes."</td>   	         
         </tr>
                
        
        ";
    }
    ?>
  
    </tbody>
</table>