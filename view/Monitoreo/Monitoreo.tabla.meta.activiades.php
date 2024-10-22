<?php 

include("../../config/net.php");

$idProyecto = $_REQUEST['idRelacion'];?>



<style>

    .colorFondo{

        background-color: #FEF2D4;

    }

    .colorFondoMeta{

        background-color: #CCE7B5;

    }
    .colorFechaenProceso{
        background-color: #FEF5CC;
    }
    .colorFechaFinalizado{
        background-color: #C0E5B9;
    }
    .colorFechaAtrasado
    {
        background-color: #E59A8D;
    }
</style>


<!--:::::::::::::::::::::::::::: consulta de metas e indicadores :::::::::::::::::::::::::::::::::::-->

<?php

 //include("../../config/net.php");

//$valor1 = 

$metasNocompletadas =0;

$query = "SELECT COUNT(*) as total_registros FROM monitor_metas_actividades WHERE estado =1  AND id_generalidad_proyecto = ?";

$data3 = $net_rrhh->prepare($query);

$data3->execute([$idProyecto]);



while ($data = $data3->fetch()) {

    $metasNocompletadas = $data['total_registros'];

}





$query2 = "SELECT COUNT(*) as total_registros FROM monitor_metas_actividades WHERE  id_generalidad_proyecto = ?";

$data4 = $net_rrhh->prepare($query2);

$data4->execute([$idProyecto]);



while ($data = $data4->fetch()) {

    $metasNocompletadas2 = $data['total_registros'];

}



$valorTotal = ($metasNocompletadas/$metasNocompletadas2)*100;





if(is_nan($valorTotal))

{

    $valorTotal = 0;

}

else

{

   // echo "valorTotal: ".$valorTotal;

   // echo "<p>".$idProyecto."</p>";

    $query3 = "UPDATE monitor_generalidad_proyecto SET porcentajeAvance = ? WHERE id = ?";

    $data5 = $net_rrhh->prepare($query3);

    $data5->execute([$valorTotal, $idProyecto]);

    

    

}





?>
        

<!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->

                    <div class="mb-3 mt-2">

                        <div class="progress">

<?php 
$numero_redondeado = round($valorTotal, 2);
?>

                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="<?php echo $valorTotal; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $valorTotal; ?>%"><?php echo 'Progreso Terminado: '.$numero_redondeado; ?>%</div>

                        </div>

                    </div>
<center>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-paint-bucket" viewBox="0 0 16 16">
  <path d="M6.192 2.78c-.458-.677-.927-1.248-1.35-1.643a3 3 0 0 0-.71-.515c-.217-.104-.56-.205-.882-.02-.367.213-.427.63-.43.896-.003.304.064.664.173 1.044.196.687.556 1.528 1.035 2.402L.752 8.22c-.277.277-.269.656-.218.918.055.283.187.593.36.903.348.627.92 1.361 1.626 2.068.707.707 1.441 1.278 2.068 1.626.31.173.62.305.903.36.262.05.64.059.918-.218l5.615-5.615c.118.257.092.512.05.939-.03.292-.068.665-.073 1.176v.123h.003a1 1 0 0 0 1.993 0H14v-.057a1 1 0 0 0-.004-.117c-.055-1.25-.7-2.738-1.86-3.494a4 4 0 0 0-.211-.434c-.349-.626-.92-1.36-1.627-2.067S8.857 3.052 8.23 2.704c-.31-.172-.62-.304-.903-.36-.262-.05-.64-.058-.918.219zM4.16 1.867c.381.356.844.922 1.311 1.632l-.704.705c-.382-.727-.66-1.402-.813-1.938a3.3 3.3 0 0 1-.131-.673q.137.09.337.274m.394 3.965c.54.852 1.107 1.567 1.607 2.033a.5.5 0 1 0 .682-.732c-.453-.422-1.017-1.136-1.564-2.027l1.088-1.088q.081.181.183.365c.349.627.92 1.361 1.627 2.068.706.707 1.44 1.278 2.068 1.626q.183.103.365.183l-4.861 4.862-.068-.01c-.137-.027-.342-.104-.608-.252-.524-.292-1.186-.8-1.846-1.46s-1.168-1.32-1.46-1.846c-.147-.265-.225-.47-.251-.607l-.01-.068zm2.87-1.935a2.4 2.4 0 0 1-.241-.561c.135.033.324.11.562.241.524.292 1.186.8 1.846 1.46.45.45.83.901 1.118 1.31a3.5 3.5 0 0 0-1.066.091 11 11 0 0 1-.76-.694c-.66-.66-1.167-1.322-1.458-1.847z"/>
</svg>
    <span class="badge  text-dark" style="background-color: #FEF5CC; border-radius:12px;">proceso</span>
    <span class="badge  text-dark" style="background-color: #E59A8D; border-radius:12px;">atrasado</span>
    <span class="badge  text-dark" style="background-color: #C0E5B9; border-radius:12px;">finalizado</span>
</center>

                    <div class="table-responsive">

<table class="table-sm table table table-bordered colorFondo mt-2 table-hover" style="background-color: #FFFFFF; border-radius:8px;">

    <tbody>

    <?php 

   

    $query = "SELECT * FROM monitor_metas_actividades where id_generalidad_proyecto = ? ordER BY tipo";

    $data3 = $net_rrhh->prepare($query);

    $data3->execute([$idProyecto]);

    while ($data = $data3->fetch()) {
        if($data[8] == '')
        {
            $fechaFormateada10 = '--/--/----';
        }
        else
        {
            $fh_actual = new DateTime();
            $fechaActual = $fh_actual->format('Y-m-d'); 
           // echo $fh_actual;
            $fechaData10 = new DateTime($data[8]);
            $fechaFormateada10 = $fechaData10->format('d/m/Y');
        }
        


        if($data[4] =="META")

        {

            if($data[3] == 1)

            {

                echo '

                <tr>       

                    <td>'.$data[1].'</td>    

                    <td class="colorFondoMeta">'.$data[4].' </td>';
                if($fechaActual <= $fechaFormateada10)
                {
                    echo '<td class="colorFondoMeta colorFechaFinalizado" style="background-color: #C0E5B9;" >'.$fechaFormateada10.' </td>';
                }
                else
                {
                    echo '<td class="colorFondoMeta colorFechaFinalizado" style="background-color: #C0E5B9;">'.$fechaFormateada10.' </td>';
                }
                    echo '
                        
                    <td class="colorFondoMeta"> ✅ Completado</td>  

                    <td> <button id="'.$data[0].'" class="btn btn-sm mt-0  pt-0" style="background-color: #1A4262; color:white;"  onclick="funcioneEditarMetaActividad('.$data[0].')" data-bs-toggle="modal" data-bs-target="#EditarMetasActividades2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                    </svg>
                    </button>
                </td> 
        
        
                <td> <button id="'.$data[0].'" class="btn btn-sm mt-0  pt-0" style="background-color: #1A4262; color:white;"  onclick="funcioneEliminarMetaActividad('.$data[0].')" data-bs-toggle="modal" data-bs-target="#EliminarMetaActividad">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                </svg>
            </button></td>  
                 </tr>

                ';

            }

            else

            {

                echo '

                <tr>       

                    <td>'.$data[1].'</td>    

                    <td class="colorFondoMeta">'.$data[4].' </td>   ';
                    if($fechaActual >= $fechaFormateada10)
                {
                    echo '<td class="colorFechaAtrasado" style="background-color: #E59A8D;">'.$fechaFormateada10.' </td>';
                }
                else
                {
                    echo '<td class="colorFondoMeta colorFechaFinalizado" style="background-color: #FEF5CC;">'.$fechaFormateada10.'... </td>';
                }
                echo '
                            
                    <td> <button id="'.$data[0].'" class="btn btn-sm mt-0  pt-0" style="background-color: #1A4262; color:white;"  onclick="funcioneEditarMetaActividad('.$data[0].')" data-bs-toggle="modal" data-bs-target="#EditarMetasActividades2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                    </svg>
                    </button>
                </td> 
        
        
                <td> <button id="'.$data[0].'" class="btn btn-sm mt-0  pt-0" style="background-color: #1A4262; color:white;"  onclick="funcioneEliminarMetaActividad('.$data[0].')" data-bs-toggle="modal" data-bs-target="#EliminarMetaActividad">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                </svg>
            </button></td>  
                 </tr>

                        

                

                ';

            }

            

        }
        else if($data[4] =="HITOS")

        {

            if($data[3] == 1)

            {

                echo '

                <tr>       

                    <td>'.$data[1].'</td>    

                    <td class="colorFondoMeta">'.$data[4].' </td>    ';
                    if($fechaActual <= $fechaFormateada10)
                {
                    echo '<td class="colorFondoMeta colorFechaFinalizado" >'.$fechaFormateada10.' </td>';
                }
                else
                {
                    echo '<td class="colorFondoMeta colorFechaFinalizado" style="background-color: #C0E5B9;">'.$fechaFormateada10.' </td>';
                }
                echo '  
                    <td class="colorFondoMeta"> ✅ Completado</td>  

                    <td> <button id="'.$data[0].'" class="btn btn-sm mt-0  pt-0" style="background-color: #1A4262; color:white;"  onclick="funcioneEditarMetaActividad('.$data[0].')" data-bs-toggle="modal" data-bs-target="#EditarMetasActividades2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                    </svg>
                    </button>
                </td> 
        
        
                <td> <button id="'.$data[0].'" class="btn btn-sm mt-0  pt-0" style="background-color: #1A4262; color:white;"  onclick="funcioneEliminarMetaActividad('.$data[0].')" data-bs-toggle="modal" data-bs-target="#EliminarMetaActividad">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                </svg>
            </button></td>  
                 </tr>

                ';

            }

            else

            {

                echo '

                <tr>       

                    <td>'.$data[1].'</td>    

                    <td class="colorFondoMeta">'.$data[4].' </td>   ';
                    if($fechaActual >= $fechaFormateada10)
                {
                    echo '<td class="colorFondoMeta colorFechaAtrasado" style="background-color: #E59A8D;">'.$fechaFormateada10.' </td>';
                }
                else
                {
                    echo '<td class="colorFondoMeta colorFechaenProceso" style="background-color: #FEF5CC;">'.$fechaFormateada10.' </td>';
                }
                echo '        
                    <td> <button id="'.$data[0].'" class="btn btn-sm mt-0  pt-0" style="background-color: #1A4262; color:white;"  onclick="funcioneEditarMetaActividad('.$data[0].')" data-bs-toggle="modal" data-bs-target="#EditarMetasActividades2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                    </svg>
                    </button>
                </td> 
        
        
                <td> <button id="'.$data[0].'" class="btn btn-sm mt-0  pt-0" style="background-color: #1A4262; color:white;"  onclick="funcioneEliminarMetaActividad('.$data[0].')" data-bs-toggle="modal" data-bs-target="#EliminarMetaActividad">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                </svg>
            </button></td>  
                 </tr>

                        

                

                ';

            }

            

        }
        
        else 

        {

            if($data[3] == 1)

            {

                echo '

                <tr>       

                    <td>'.$data[1].'</td>    

                    <td>'.$data[4].' </td>  ';
                    if($fechaActual <= $fechaFormateada10)
                {
                    echo '<td class="colorFondoMeta colorFechaFinalizado" >'.$fechaFormateada10.' </td>';
                }
                else
                {
                    echo '<td class="colorFondoMeta colorFechaFinalizado" style="background-color: #C0E5B9;">'.$fechaFormateada10.' </td>';
                }
                echo '
                    <td class="colorFondoMeta"> ✅ Completado</td>               

                    <td> <button id="'.$data[0].'" class="btn btn-sm mt-0  pt-0" style="background-color: #1A4262; color:white;"  onclick="funcioneEditarMetaActividad('.$data[0].')" data-bs-toggle="modal" data-bs-target="#EditarMetasActividades2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                    </svg>
                    </button>
                </td> 
        
        
                <td> <button id="'.$data[0].'" class="btn btn-sm mt-0  pt-0" style="background-color: #1A4262; color:white;"  onclick="funcioneEliminarMetaActividad('.$data[0].')" data-bs-toggle="modal" data-bs-target="#EliminarMetaActividad">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                </svg>
            </button></td>  
                 </tr>
                ';

            }

            else

            {

                echo '

                <tr>       

                    <td>'.$data[1].'</td>    

                    <td>'.$data[4].' </td>     ';
                    if($fechaActual >= $fechaFormateada10)
                {
                    echo '<td class="colorFondoMeta colorFechaAtrasado" style="background-color: #E59A8D;">'.$fechaFormateada10.' </td>';
                }
                else
                {
                    echo '<td class="colorFondoMeta colorFechaenProceso" style="background-color: #FEF5CC;">'.$fechaFormateada10.' </td>';
                }
                echo '  
                    <td> <button id="'.$data[0].'" class="btn btn-sm mt-0  pt-0" style="background-color: #1A4262; color:white;"  onclick="funcioneEditarMetaActividad('.$data[0].')" data-bs-toggle="modal" data-bs-target="#EditarMetasActividades2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                    </svg>
                    </button>
                </td> 
        
        
                <td> <button id="'.$data[0].'" class="btn btn-sm mt-0  pt-0" style="background-color: #1A4262; color:white;"  onclick="funcioneEliminarMetaActividad('.$data[0].')" data-bs-toggle="modal" data-bs-target="#EliminarMetaActividad">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                </svg>
            </button></td>  
                 </tr>

                        

                

                ';

            }

           

        }

        

    }

    ?>

  

    </tbody>

</table>

                    </div>

<!--::::::::: EDITAR OBJETIVO GENERAL :::::::::::: -->
<div class="modal fade" id="EditarMetasActividades2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header colorEncabezadoLista">
        <h5 class="modal-title" id="exampleModalLabel" style="color:white;">EDITAR METAS, INDICADORES E HITOS DE LA FICHA</h5>
        <button type="button" id="BTNcERRARiNDICADORES" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
      <div id="EditarMetasActividades"></div>
    
     
      </div>
      <div class="modal-footer">
       
        <!--<button type="button"id="EliminarPasajerobtn2" class="btn btn-primary">Confirmar la Eliminación</button>-->
      </div>
      <a class="btn btn-success" id="botonCargando"  style="display:none;"type="button" disabled>
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Loading...
    </a>
    </div>
  </div>
</div>


<!--::::::::: ELIMINAR META Y ACTIVIDAD :::::::::::: -->
<div class="modal fade" id="EliminarMetaActividad" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header colorEncabezadoLista">
        <h5 class="modal-title" id="exampleModalLabel" style="color:white;">EDITAR RESULTADOS DE LA FICHA</h5>
        <button type="button" id="btnCerrarMODALObjGeneral" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
      <div id="EliminarMetaActividad22"></div>
    
      
      </div>
      <div class="modal-footer">
       
        <!--<button type="button"id="EliminarPasajerobtn2" class="btn btn-primary">Confirmar la Eliminación</button>-->
      </div>
      <a class="btn btn-success" id="botonCargando"  style="display:none;"type="button" disabled>
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Loading...
    </a>
    </div>
  </div>
</div>

<script src="view/Monitoreo/editar.meta.actividad.js"></script>
<script src="view/Monitoreo/eliminar.meta.actividad.js"></script>