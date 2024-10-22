<?php 

 include("../../config/net.php");

?>
<?php 



function convertirMiles($numeroRecibido)

{

    $numero = $numeroRecibido;



    // Formatea el número con separador de miles y dos decimales

    $numeroFormateado = number_format($numero, 2, '.', ',');

    

    return $numeroFormateado;

}

?>
<div class="container">

    <div class="col-md">



    </div>

    <div class="col-md-12">

        <style>

            .colorBoton{

                background-color: #1A4262;

                color: white;

            }

           

            .colorBotonesCambio:hover{

                background-color: #FDDA8A ;

            }

        </style>

    <table class="table table-bordered table-hover "  style="background-color: white;">

  <thead>

    <tr>

      <th scope="col">#</th>
      <th scope="col"><b>PROYECTO CONOCIDO</b></th>
      <th scope="col"><b>COORDINADOR</b></th>
      <th scope="col"><b>MONTO TOTAL</b></th>
      <th scope="col">FECHA INICIO</th>
      <th scope="col">FECHA CIERRE</th>
     <!-- <th scope="col">DÍAS FALTANTES</th>-->
      <th scope="col" style="width: 90px;">% PROYECTO</th>
      <th scope="col" style="width: 90px;">% FINANCIERO</th>
      <th scope="col">SHAREPOINT</th>
      <th scope="col">ACCIONES</th>

    </tr>

  </thead>

  <tbody>

    <style>

      .buttonCrearFicha{

        padding-top: 10px;

        padding-bottom: 10px;

      }

    </style>

    <?php

    $contador =0;

    // include("../../config/net.php");

        $idType =   $_SESSION['type'];

        $idEmpleado =  $_SESSION['iu'];

        //echo "HOLABUENAS".$_SESSION['type'];

            if($idType == "AdminMonitoreo" || $idType == "Administrador")

            {

               // echo "HOLABUENAS";

                $query = "SELECT DISTINCT  s1.*,s2.name1 , s2.name2 ,s2.name3 ,s2.lastname1  ,s2.lastname2 , s3.proyecto, s3.conocidoComo,
s4.suma_montos_total_proyectos, s5.porcentaje_ejecucion
FROM monitor_generalidad_proyecto as s1 
inner join employee as s2 on s1.id_coordinador = s2.id
inner join monitor_proyecto as s3 on s1.id_proyecto = s3.id 
left join monitor_ficha_encabezado as s4 on s4.id_proyecto_generalidades = s1.id
left join monitor_avance_financiero as s5 on s5.id_generalidad_proyecto = s1.id
where s1.estado = 1 or s1.estado = 2 order by s1.id desc";

                $data3 = $net_rrhh->prepare($query);

                $data3->execute();



                

    while ($data = $data3->fetch()) 

    {

        $contador=$contador+1;

        //<th scope="row">'.$data[0].'</th>

echo '



    <tr>

        <td>'.$contador.'</td>

        
        <td>'.$data[18].'</td>
        
        <td>'.sanear_string($data[12].' '.$data[13].' '.$data[14].' '.$data[15].' '.$data[16]).'</td>
        
         <td>$'.convertirMiles($data[19]).'</td>
        ';

        
    
        $fechaData10 = new DateTime($data[10]);
        $fechaFormateada10 = $fechaData10->format('d/m/Y');

echo '<td>'.$fechaFormateada10.'</td>';
        
        $fechaData11 = new DateTime($data[11]);
        $fechaFormateada = $fechaData11->format('d/m/Y');

        if($fechaFormateada10 > $fechaFormateada)
        {
            if($data[9] == 100)
            {
                echo '<td style="background-color: #C0E5B9; ">'.$fechaFormateada.'</td>'; 
            }
            else
            {
                echo '<td style="background-color: #E59A8D; ">'.$fechaFormateada.'</td>';
            }
            
        }
        else if ($fechaFormateada10 == $fechaFormateada)
        {
            echo '<td style="background-color: #F0F0F0; "></td>';
        }
        else if ($fechaFormateada10 < $fechaFormateada)
        {
            echo '<td style="background-color: #FEF5CC; ">'.$fechaFormateada.'</td>';
        }
        else {
            echo '<td>'.$fechaFormateada.'</td>';
        }
       


        /*// Primero, convierte la fecha actual y $data[11] a objetos DateTime para facilitar la comparación

        $fechaActual = new DateTime();

        $fechaData11 = new DateTime($data[11]);

        // Ahora compara las fechas

        if($data[11] != null)

        {

           // Calcula la diferencia

            $diferencia = $fechaActual->diff($fechaData11);



            // Obtén el número de días de la diferencia

            $dias = $diferencia->days;

            //echo $dias;

            if ($fechaData11 <= $fechaActual && $data[9] != 100) {

                 

                //Si $data[11] es menor o igual a la fecha actual, aplica un estilo para cambiar el color de fondo a rojo

                    echo '<td style="background-color: #ED5D59; border-radius: 8px;">'.$data[11].'</td>';

                    echo '<td class="text-center"> '.-$dias.'  🚨</td>';



                    

                }
                else  if ($fechaData11 > $fechaActual && $data[9] != 100) {
                //Si $data[11] es menor o igual a la fecha actual, aplica un estilo para cambiar el color de fondo a rojo

                 echo '<td style=" border-radius: 8px;">'.$data[11].'</td>';

                  echo '<td class="text-center"> '.$dias.'  🕰️</td>';
                }
                else if ($fechaData11 > $fechaActual && $data[9] == 100) 
                {
                    echo '<td>'.$data[11].'</td>';

                    echo '<td style="background-color: #B7D2CA; border-radius: 8px;"> <b><s>Finalizado</s></b>  </td>';
                }

                else 

                {// Si $data[11] es mayor a la fecha actual, muestra la celda sin ningún estilo especial

                    

                    if($dias <=30 && $dias >1 && $data[9] != 100)

                    {

                        //Si $data[11] es menor o igual a la fecha actual, aplica un estilo para cambiar el color de fondo a rojo

                        echo '<td style="background-color: #F2D575; border-radius: 8px;">'.$data[11].'</td>';

                        echo '<td class="text-center"> '.$dias.'  ⚠️</td>';

                    }

                    else if($dias ==1 || $dias <=0 && $data[9] != 100)

                    {

                        //Si $data[11] es menor o igual a la fecha actual, aplica un estilo para cambiar el color de fondo a rojo

                        echo '<td style="background-color: #F2D575; border-radius: 8px;">'.$data[11].'</td>';

                        echo '<td class="text-center"> '.$dias.'  🚨</td>';

                    }

                    else

                    {

                        echo '<td>'.$data[11].'</td>';

                        echo '<td style="background-color: #B7D2CA; border-radius: 8px;"> <b><s>Finalizado</s></b>  </td>';

                    }

                    

                   

                }

        }

        else{

            echo '<td>0000-00-00 </td>';

            echo '<td>0</td>';

        }

        

*/
 
$numero_redondeado = round($data[9], 2);
$numero_redondeado2 = round($data[20], 2);


        echo'

        <td> <div class="mb-3">

        <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label"><span style="font-size:12px;"><b>'.$numero_redondeado.'%</b></span></label>
  <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="'.$numero_redondeado.'" aria-valuemin="0" aria-valuemax="100" style="width:'.$numero_redondeado.'%">'.$numero_redondeado.'%</div>

        </div>
        </div>

       

    </div></td>';

    if($data[20] == null)
    {
        echo '
         <td> <div class="mb-3">
        <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label"><span style="font-size:12px;"><b>0%</b></span></label>
 <div class="progress" >
            
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%;font-size:12px;"> 0% </div>

        </div>
        </div>

    </div></td>';
    }
    else{
        echo '
         <td> <div class="mb-3">

         <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label"><span style="font-size:12px;"><b>'.$numero_redondeado2.'%</b></span></label>
 <div class="progress" >
            
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="'.$numero_redondeado2.'" aria-valuemin="0" aria-valuemax="100" style="width:'.$numero_redondeado2.'%;font-size:12px;">'.$numero_redondeado2.'%</div>

        </div>
        </div>

        

    </div></td>';
    }
    echo '
        <td> 
        <a type="button" href='.sanear_string($data[8]).' class="btn btn-sm  colorBoton colorBotonesCambio" target="_blank">
           INGRESAR
        </a>
        </td>

                    '; 

                     



                    echo '
      

                    <td>
                   <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" style="background-color: #183D5A" type="button"  data-bs-toggle="dropdown" aria-expanded="false">
   Acciones 
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li>
        <form action="?view=monitorview" method="POST" style="margin-bottom:0px;">
            <input type="hidden" value="'.$data[0].'" name="idProyecto">
            <button type="submit" class="btn mb-1  mx-0 mt-0 btn-sm buttonCrearFicha colorBoton colorBotonesCambio">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eyeglasses" viewBox="0 0 16 16">
            <path d="M4 6a2 2 0 1 1 0 4 2 2 0 0 1 0-4m2.625.547a3 3 0 0 0-5.584.953H.5a.5.5 0 0 0 0 1h.541A3 3 0 0 0 7 8a1 1 0 0 1 2 0 3 3 0 0 0 5.959.5h.541a.5.5 0 0 0 0-1h-.541a3 3 0 0 0-5.584-.953A1.993 1.993 0 0 0 8 6c-.532 0-1.016.208-1.375.547M14 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0"/>
            </svg>
            Ver detalles del proyecto
            </button>
        </form>
    </li>
    <li>

        <form action="?view=headdocument" method="POST" style="margin-bottom:0px;">
            <input type="hidden" value="'.$data[0].'" name="idProyecto">
            <button type="submit"  class="btn mb-1 mx-0 mt-0 btn-sm colorBoton colorBotonesCambio buttonCrearFicha">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-post" viewBox="0 0 16 16">
            <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z"/>
            <path d="M4 6.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5H7a.5.5 0 0 1 0 1H4.5a.5.5 0 0 1-.5-.5"/>
            </svg>
            Informacion General
            </button>
        </form>
    </li>
    <li>
        <form action="?view=monitoreoaddnew" method="POST" style="margin-bottom:0px;">
            <input type="hidden" value="'.$data[0].'" name="idProyecto">
            <button type="submit"  class="btn  mb-1 mx-0 mt-0 btn-sm buttonCrearFicha colorBoton colorBotonesCambio">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
            <path d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2m5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672Z"/>
            <path d="M13.5 9a.5.5 0 0 1 .5.5V11h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V12h-1.5a.5.5 0 0 1 0-1H13V9.5a.5.5 0 0 1 .5-.5"/>
            </svg> Agregar Avance Mensual
            </button>
        </form>
    </li>
    
    <li>

        <a type="button"  onclick="funcionEnviarDatos('.$data[0].')" class="btn  mx-0 mt-0 btn-sm btn    btn-danger" data-bs-toggle="modal" data-bs-target="#subirlINKDocumentoPdf" >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-pdf" viewBox="0 0 16 16">
            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
            <path d="M4.603 14.087a.8.8 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.7 7.7 0 0 1 1.482-.645 20 20 0 0 0 1.062-2.227 7.3 7.3 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a11 11 0 0 0 .98 1.686 5.8 5.8 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.86.86 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.7 5.7 0 0 1-.911-.95 11.7 11.7 0 0 0-1.997.406 11.3 11.3 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.8.8 0 0 1-.58.029m1.379-1.901q-.25.115-.459.238c-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361q.016.032.026.044l.035-.012c.137-.056.355-.235.635-.572a8 8 0 0 0 .45-.606m1.64-1.33a13 13 0 0 1 1.01-.193 12 12 0 0 1-.51-.858 21 21 0 0 1-.5 1.05zm2.446.45q.226.245.435.41c.24.19.407.253.498.256a.1.1 0 0 0 .07-.015.3.3 0 0 0 .094-.125.44.44 0 0 0 .059-.2.1.1 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a4 4 0 0 0-.612-.053zM8.078 7.8a7 7 0 0 0 .2-.828q.046-.282.038-.465a.6.6 0 0 0-.032-.198.5.5 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822q.036.167.09.346z"/>
            </svg> Agregar adenda al proyecto
        </a>

    </li>
    <li>
    </li>
    <li>
    </li>
  </ul>
</div>
                    </td>
                  </tr>';

        

        

                }

            }

            /*

            <a target="_blank" href="https://sii.fusalmo.org/view/Monitoreo/ImprimiFicha.php?idProyecto='.$data[0].'">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">

                        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"/>

                        <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1"/>

                      </svg>

                    </a>*/

            

            else

            {
               // echo $idEmpleado;
$query = "

              
    SELECT DISTINCT  s1.*,s2.name1 , s2.name2 ,s2.name3 ,s2.lastname1  ,s2.lastname2 , s3.proyecto, s3.conocidoComo,
    s4.suma_montos_total_proyectos, s5.porcentaje_ejecucion
    FROM monitor_generalidad_proyecto as s1 
    inner join employee as s2 on s1.id_coordinador = s2.id
    inner join monitor_proyecto as s3 on s1.id_proyecto = s3.id 
    left join monitor_ficha_encabezado as s4 on s4.id_proyecto_generalidades = s1.id
    left join monitor_avance_financiero as s5 on s5.id_generalidad_proyecto = s1.id
    where s1.id_coordinador = $idEmpleado order by s1.id desc            
                
                
                ";

                $data3 = $net_rrhh->prepare($query);

                $data3->execute();



                

    while ($data = $data3->fetch()) 

    {

        $contador=$contador+1;

        //<th scope="row">'.$data[0].'</th>

echo '



    <tr>

        <td>'.$contador.'</td>

        
        <td>'.$data[18].'</td>
        
        <td>'.sanear_string($data[12].' '.$data[13].' '.$data[14].' '.$data[15].' '.$data[16]).'</td>
        
         <td>$'.convertirMiles($data[19]).'</td>
        ';

        
    
        $fechaData10 = new DateTime($data[10]);
        $fechaFormateada10 = $fechaData10->format('d/m/Y');

echo '<td>'.$fechaFormateada10.'</td>';
        
        $fechaData11 = new DateTime($data[11]);
        $fechaFormateada = $fechaData11->format('d/m/Y');

        if($fechaFormateada10 > $fechaFormateada)
        {
            if($data[9] == 100)
            {
                echo '<td style="background-color: #C0E5B9; ">'.$fechaFormateada.'</td>'; 
            }
            else
            {
                echo '<td style="background-color: #E59A8D; ">'.$fechaFormateada.'</td>';
            }
            
        }
        else if ($fechaFormateada10 == $fechaFormateada)
        {
            echo '<td style="background-color: #F0F0F0; "></td>';
        }
        else if ($fechaFormateada10 < $fechaFormateada)
        {
            echo '<td style="background-color: #FEF5CC; ">'.$fechaFormateada.'</td>';
        }
        else {
            echo '<td>'.$fechaFormateada.'</td>';
        }
       


        /*// Primero, convierte la fecha actual y $data[11] a objetos DateTime para facilitar la comparación

        $fechaActual = new DateTime();

        $fechaData11 = new DateTime($data[11]);

        // Ahora compara las fechas

        if($data[11] != null)

        {

           // Calcula la diferencia

            $diferencia = $fechaActual->diff($fechaData11);



            // Obtén el número de días de la diferencia

            $dias = $diferencia->days;

            //echo $dias;

            if ($fechaData11 <= $fechaActual && $data[9] != 100) {

                 

                //Si $data[11] es menor o igual a la fecha actual, aplica un estilo para cambiar el color de fondo a rojo

                    echo '<td style="background-color: #ED5D59; border-radius: 8px;">'.$data[11].'</td>';

                    echo '<td class="text-center"> '.-$dias.'  🚨</td>';



                    

                }
                else  if ($fechaData11 > $fechaActual && $data[9] != 100) {
                //Si $data[11] es menor o igual a la fecha actual, aplica un estilo para cambiar el color de fondo a rojo

                 echo '<td style=" border-radius: 8px;">'.$data[11].'</td>';

                  echo '<td class="text-center"> '.$dias.'  🕰️</td>';
                }
                else if ($fechaData11 > $fechaActual && $data[9] == 100) 
                {
                    echo '<td>'.$data[11].'</td>';

                    echo '<td style="background-color: #B7D2CA; border-radius: 8px;"> <b><s>Finalizado</s></b>  </td>';
                }

                else 

                {// Si $data[11] es mayor a la fecha actual, muestra la celda sin ningún estilo especial

                    

                    if($dias <=30 && $dias >1 && $data[9] != 100)

                    {

                        //Si $data[11] es menor o igual a la fecha actual, aplica un estilo para cambiar el color de fondo a rojo

                        echo '<td style="background-color: #F2D575; border-radius: 8px;">'.$data[11].'</td>';

                        echo '<td class="text-center"> '.$dias.'  ⚠️</td>';

                    }

                    else if($dias ==1 || $dias <=0 && $data[9] != 100)

                    {

                        //Si $data[11] es menor o igual a la fecha actual, aplica un estilo para cambiar el color de fondo a rojo

                        echo '<td style="background-color: #F2D575; border-radius: 8px;">'.$data[11].'</td>';

                        echo '<td class="text-center"> '.$dias.'  🚨</td>';

                    }

                    else

                    {

                        echo '<td>'.$data[11].'</td>';

                        echo '<td style="background-color: #B7D2CA; border-radius: 8px;"> <b><s>Finalizado</s></b>  </td>';

                    }

                    

                   

                }

        }

        else{

            echo '<td>0000-00-00 </td>';

            echo '<td>0</td>';

        }

        

*/

        echo'

        <td> <div class="mb-3">

        <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label"><span style="font-size:12px;"><b>'.$numero_redondeado.'%</b></span></label>
  <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="'.$numero_redondeado.'" aria-valuemin="0" aria-valuemax="100" style="width:'.$numero_redondeado.'%">'.$numero_redondeado.'%</div>

        </div>
        </div>

       

    </div></td>';

    if($data[20] == null)
    {
        echo '
         <td> <div class="mb-3">
        <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label"><span style="font-size:12px;"><b>0%</b></span></label>
 <div class="progress" >
            
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%;font-size:12px;"> 0% </div>

        </div>
        </div>

    </div></td>';
    }
    else{
        echo '
         <td> <div class="mb-3">

         <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label"><span style="font-size:12px;"><b>'.$numero_redondeado2.'%</b></span></label>
 <div class="progress" >
            
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="'.$numero_redondeado2.'" aria-valuemin="0" aria-valuemax="100" style="width:'.$numero_redondeado2.'%;font-size:12px;">'.$numero_redondeado2.'%</div>

        </div>
        </div>

        

    </div></td>';
    }
    echo '
        <td> 
        <a type="button" href='.sanear_string($data[8]).' class="btn btn-sm  colorBoton colorBotonesCambio" target="_blank">
           INGRESAR
        </a>
        </td>

                    '; 

                     



                    echo '
      

                    <td>
                   <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" style="background-color: #183D5A" type="button"  data-bs-toggle="dropdown" aria-expanded="false">
   Acciones 
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li>
        <form action="?view=monitorview" method="POST" style="margin-bottom:0px;">
            <input type="hidden" value="'.$data[0].'" name="idProyecto">
            <button type="submit" class="btn mb-1  mx-0 mt-0 btn-sm buttonCrearFicha colorBoton colorBotonesCambio">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eyeglasses" viewBox="0 0 16 16">
            <path d="M4 6a2 2 0 1 1 0 4 2 2 0 0 1 0-4m2.625.547a3 3 0 0 0-5.584.953H.5a.5.5 0 0 0 0 1h.541A3 3 0 0 0 7 8a1 1 0 0 1 2 0 3 3 0 0 0 5.959.5h.541a.5.5 0 0 0 0-1h-.541a3 3 0 0 0-5.584-.953A1.993 1.993 0 0 0 8 6c-.532 0-1.016.208-1.375.547M14 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0"/>
            </svg>
            Ver detalle del proyecto
            </button>
        </form>
    </li>
    <li>

        <form action="?view=headdocument" method="POST" style="margin-bottom:0px;">
            <input type="hidden" value="'.$data[0].'" name="idProyecto">
            <button type="submit"  class="btn mb-1 mx-0 mt-0 btn-sm colorBoton colorBotonesCambio buttonCrearFicha">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-post" viewBox="0 0 16 16">
            <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z"/>
            <path d="M4 6.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5H7a.5.5 0 0 1 0 1H4.5a.5.5 0 0 1-.5-.5"/>
            </svg>
            Informacion General
            </button>
        </form>
    </li>
    <li>
        <form action="?view=monitoreoaddnew" method="POST" style="margin-bottom:0px;">
            <input type="hidden" value="'.$data[0].'" name="idProyecto">
            <button type="submit"  class="btn  mb-1 mx-0 mt-0 btn-sm buttonCrearFicha colorBoton colorBotonesCambio">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
            <path d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2m5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672Z"/>
            <path d="M13.5 9a.5.5 0 0 1 .5.5V11h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V12h-1.5a.5.5 0 0 1 0-1H13V9.5a.5.5 0 0 1 .5-.5"/>
            </svg> Agregar Avances Mensuales
            </button>
        </form>
    </li>
    
    
    <li>
    </li>
    <li>
    </li>
  </ul>
</div>
                    </td>
                  </tr>';

        

        

                }

            }



       



    ?>

  </tbody>

</table>

    </div>

</div>

<script>

function enDesarrollo(){

  $.toast({

                        heading: 'FUNCIONALIDAD',

                        text: 'DESARROLLO PARA LA V 3.0.0',

                        showHideTransition: 'slide',

                        icon: 'info',

                        hideAfter: 5000, 

                        position: 'top-center'

                    });

}



</script> 





<!--:::::::::::::::::::: MODAL PARA SUBIR DOCUMENTOS AL SERVIDOR ::::::::::::::::::::::::::::::-->

<!--::::::::::::::  MODAL PARA SUBIR LINK DE ADENDA ::::::::::::::::::-->
<div class="modal fade" id="subirlINKDocumentoPdf" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header colorTituloModal">

        <h5 class="modal-title" style="color:black;" id="exampleModalLabel">MODIFICANDO FECHA DE CIERRE</h5>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>

     <!-- <form action="process/" method="post" enctype="multipart/form-data">-->

      <div class="modal-body">

            <div class="mb-3">



                <input type="hidden" value="addfile" name="action">

                <input type="hidden" value="monitoreo_proyecto" name="process">



                <input class="form-control" type="hidden" name="idEnvio" id="idEnvio">





                <label for="formFile" class="form-label">SELECCIONE LA NUEVA FECHA</label>

                <input class="form-control" type="date" name="fhcierre" id="fhcierre">



                <label for="formFile" class="form-label">REGISTRAR LINK DEL DOCUMENTO DE ADENDA</label>

                <textarea class="form-control" id="linkSaherPointAdenda" rows="3"></textarea>
                

            </div>

      </div>

      <div class="modal-footer">

        <button type="button" id="cerrarModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

        <button type="submit" class="btn btn-primary" id="subirlINKArchivo">REGISTRAR LINK</button>

      </div>

     <!-- </form> -->

    </div>

  </div>

</div>

<!--:::::::::::::: FIN DEL MODAL PARA SUBIR LINK ED ADENDA :::::::::::::-->

<!--MODAL INICIO PUBLICACION INICIO-->

<!-- Modal -->

<div class="modal fade" id="subirDocumentoPdf" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header colorTituloModal">

        <h5 class="modal-title" style="color:black;" id="exampleModalLabel">MODIFICANDO FECHA DE CIERRE</h5>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>

      <form action="process/" method="post" enctype="multipart/form-data">

      <div class="modal-body">

            <div class="mb-3">



                <input type="hidden" value="addfile" name="action">

                <input type="hidden" value="monitoreo_proyecto" name="process">



                <input class="form-control" type="hidden" name="idEnvio" id="idEnvio">





                <label for="formFile" class="form-label">SELECCIONE LA NUEVA FECHA</label>

                <input class="form-control" type="date" name="fhcierre">



                <label for="formFile" class="form-label">SUBIR DOCUMENTO DE ADENDA</label>

                <input class="form-control" type="file" name="formFile">

                

              







            </div>

      </div>

      <div class="modal-footer">

        <button type="button" id="cerrarModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

        <button type="submit" class="btn btn-primary" id="subirArchivo">SUBIR ARCHIVO</button>

      </div>

      </form>

    </div>

  </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
$("#subirlINKArchivo").click(function(){
    $.post("process/index.php",{
        process: "monitoreo_proyecto",
        action: "addfileAdendaLink",
        linkSaherPointAdenda : $("#linkSaherPointAdenda").val(),
        idEnvio : $("#idEnvio").val(),
        fhcierre : $("#fhcierre").val()
},
    function(response)
    {
        if(response)
        {
            //document.getElementById("btnAvance1").style.display="none";
            $.toast({
                heading: 'Finalizado',
                text: 'Enlace Guardado',
                showHideTransition: 'slide',
                icon: 'success',
                hideAfter: 5000, 
                position: 'bottom-center'
            });
            document.getElementById("CERRARMODALPRESIPUESTO").click();
        }
        else
        {
            //document.getElementById("btnAvance1").style.display="none";
            $.toast({
                heading: 'ERRORRRRRRR',
                text: 'Enlace No guardado',
                showHideTransition: 'slide',
                icon: 'error',
                hideAfter: 5000, 
                position: 'bottom-center'
            });    
        }      
    })
})
const funcionEnviarDatos = (valor) => {

            //    data-bs-target='#exampleModal2'

            /*

            */

           document.getElementById("idEnvio").value = valor;

         

    }

</script>