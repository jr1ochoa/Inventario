<?php
include("../../config/net.php");
$idProyecto = $_REQUEST['idRelacion'];?>
<style>
    .colorFondo{
        background-color: #FEF2D4;
    }
    .colorSi{
        background-color: #CCE7B5;
    }
    .colorNo{
        background-color: #F17F7B;
    }
</style>
<div class="table-responsive">
<table class="table table-sm table-bordered mt-2 colorFondo ">
                <thead>
                    <tr>
                    <th scope="col">SHAREPOINT</th>
                    <th scope="col">BITRIX</th>
                    <th scope="col">ULTIMA ACTUALIZACION MES</th>
                    <th scope="col">ULTIMA ACTUALIZACION</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
   // include("../../config/net.php");
    $query = "SELECT * FROM monitor_documentacion_proyecto where id_generalidad_proyecto = ?";
    $data3 = $net_rrhh->prepare($query);
    $data3->execute([$idProyecto]);
    while ($data = $data3->fetch()) {
        if($data[1] == "Si" && $data[2] == "No")
        {
            echo "
                <tr>     
                        <td class='colorSi' style='background-color: #CCE7B5;'>".$data[1]."</td>
                        <td class='colorNo' style='background-color: #F17F7B;'>".$data[2]."</td>
                        <td>";             
                        $fecha = $data[3];
                        // Configurar la configuración regional a español
                        setlocale(LC_TIME, 'es_ES');
                        
                        // Obtener el nombre del mes en español
                        $mesEnLetras = strftime("%B", strtotime($fecha));
                        
                        // Convertir a mayúsculas
                        $mesEnLetrasMayuscula = mb_strtoupper($mesEnLetras, 'UTF-8');
                        
                        // Restablecer la configuración regional a la predeterminada (por si acaso)
                        setlocale(LC_TIME, '');
                        
                        echo $mesEnLetrasMayuscula;"</td>";
                        echo "
                        <td>".$data[3]."</td>
                </tr>
            ";
        }
        else if($data[1] == "Si" && $data[2]== "Si")
        {
            echo "
            <tr>     
                    <td class='colorSi' style='background-color: #CCE7B5;'>".$data[1]."</td>
                    <td class='colorSi' style='background-color: #CCE7B5;'>".$data[2]."</td>
                    <td>";             
                    $fecha = $data[3];
                    // Configurar la configuración regional a español
                    setlocale(LC_TIME, 'es_ES');
                    
                    // Obtener el nombre del mes en español
                    $mesEnLetras = strftime("%B", strtotime($fecha));
                    
                    // Convertir a mayúsculas
                    $mesEnLetrasMayuscula = mb_strtoupper($mesEnLetras, 'UTF-8');
                    
                    // Restablecer la configuración regional a la predeterminada (por si acaso)
                    setlocale(LC_TIME, '');
                    
                    echo $mesEnLetrasMayuscula;"</td>";
                    echo "
                    <td>".$data[3]."</td>
            </tr>
        ";
        }
        else if($data[1] == "No" && $data[2]== "Si")
        {
            echo "
            <tr>     
                    <td class='colorNo' style='background-color: #F17F7B;'>".$data[1]."</td>
                    <td class='colorSi' style='background-color: #CCE7B5;'>".$data[2]."</td>
                    <td>";             
                    $fecha = $data[3];
                    // Configurar la configuración regional a español
                    setlocale(LC_TIME, 'es_ES');
                    
                    // Obtener el nombre del mes en español
                    $mesEnLetras = strftime("%B", strtotime($fecha));
                    
                    // Convertir a mayúsculas
                    $mesEnLetrasMayuscula = mb_strtoupper($mesEnLetras, 'UTF-8');
                    
                    // Restablecer la configuración regional a la predeterminada (por si acaso)
                    setlocale(LC_TIME, '');
                    
                    echo $mesEnLetrasMayuscula;"</td>";
                    echo "
                    <td>".$data[3]."</td>
            </tr>
        ";
        }
        else if($data[1] == "No" && $data[2]== "No")
        {
            echo "
            <tr>     
                    <td class='colorNo' style='background-color: #F17F7B;'>".$data[1]."</td>
                    <td class='colorSi' style='background-color: #F17F7B;'>".$data[2]."</td>
                    <td>";             
                    $fecha = $data[3];
                    // Configurar la configuración regional a español
                    setlocale(LC_TIME, 'es_ES');
                    
                    // Obtener el nombre del mes en español
                    $mesEnLetras = strftime("%B", strtotime($fecha));
                    
                    // Convertir a mayúsculas
                    $mesEnLetrasMayuscula = mb_strtoupper($mesEnLetras, 'UTF-8');
                    
                    // Restablecer la configuración regional a la predeterminada (por si acaso)
                    setlocale(LC_TIME, '');
                    
                    echo $mesEnLetrasMayuscula;"</td>";
                    echo "
                    <td>".$data[3]."</td>
            </tr>
        ";
        }
        
       
    }
?>
                    
                    
                </tbody>
            </table>
</div>