<?php 
include("../../../../config/net.php");
$fecha = $_REQUEST['fechaActual'];
//echo $fecha;
?>
<div class="row">
        <div class="col-2"> 
        <a href="view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.tabla.excel.php?fecha=<?php echo $fecha; ?>" target="_blank">Descargar</a>
        </div>
        <div class="col-8">
            <!--<div class="form-group">
                <label for="exampleFormControlTextarea1" class="p-0 mb-0 mt-2">Buscar día de la solicitud:  </label>
                <input id="timeStart" class="form-control form-control-sm mb-3" type="date" name="times" value="">
            </div>-->

           

        <!--<form action="view/Operaciones/AdministracionFinanciera/SolicitudTransporte/exportarExcel.php" method="POST">
    <input type="hidden" name="fechaActual" value="<?php echo $_REQUEST['fechaActual']; ?>"> <!-- Cambia el valor por la fecha actual 
    <button type="submit" name="export_data" class="btn btn-info">Exportar a Excel</button>
</form>-->
<?php
// Recuperar la fecha desde $_REQUEST


// Convertir la fecha a un objeto DateTime
$fechaObj = new DateTime($fecha);

// Definir los nombres de los días y meses en español
$dias = [
    'Sunday' => 'domingo',
    'Monday' => 'lunes',
    'Tuesday' => 'martes',
    'Wednesday' => 'miércoles',
    'Thursday' => 'jueves',
    'Friday' => 'viernes',
    'Saturday' => 'sábado'
];
$meses = [
    'January' => 'enero',
    'February' => 'febrero',
    'March' => 'marzo',
    'April' => 'abril',
    'May' => 'mayo',
    'June' => 'junio',
    'July' => 'julio',
    'August' => 'agosto',
    'September' => 'septiembre',
    'October' => 'octubre',
    'November' => 'noviembre',
    'December' => 'diciembre'
];

// Obtener los valores necesarios en inglés
$diaSemanaIngles = $fechaObj->format('l');
$dia = $fechaObj->format('d');
$mesIngles = $fechaObj->format('F');
$anio = $fechaObj->format('Y');

// Traducir los valores al español
$diaSemana = $dias[$diaSemanaIngles];
$mes = $meses[$mesIngles];

// Formatear la fecha en español
$fechaTexto = "$diaSemana, $dia de $mes de $anio";

// Convertir a mayúsculas la primera letra de cada palabra
$fechaTexto = ucwords($fechaTexto);

// Mostrar la fecha formateada
echo "<div style='font-size:20px; background-color:#5D6B99; border-radius:8px; color:white;'><center>".$fechaTexto."</center></div>";
//echo $fechaTexto;
?>



        </div>
        <div class="col-2"></div>
    </div>
  <div class="">
  <table class="table table-hover table-sm table-striped">
  <thead>
    <tr>
      <th scope="col">Solicitado por</th>
     <th scope="col">Fecha Salida</th>
      <th scope="col">Hora de Salida</th>
      <th scope="col">Hora de retorno</th>
      <th scope="col">Direccion</th>
      <th scope="col">Proyecto</th>
      <th scope="col">Comentarios</th>
      <th scope="col">Vehiculo Salida</th>
      <th scope="col">Motorista Salida</th>
      <th scope="col">Vehiculo Retorno</th>
      <th scope="col">Motorista Retorno</th>
      <th scope="col">Accion</th>
      <th scope="col">Codigo</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php 

// 
//echo $_REQUEST['fechaActual'];SELECT s1.*, s2.area FROM admin_finanzas_formulario as s1 inner join workarea as s2 on s1.id_area_solicitante = s2.id  where (s1.estado = 1 or s1.estado = 3) and s1.fh_salida = ? order by s1.id desc
 
 $query = "
 SELECT s1.*, s2.name1, s2.name2, s2.name3, s2.lastname1, s2.lastname2 FROM admin_finanzas_formulario as s1 inner join employee as s2 on s1.id_empleado = s2.id
  WHERE estado = 3  and fh_salida = ?  ORDER BY hora_salida_fusalmo ASC; 
 ";

 $data3 = $net_rrhh->prepare($query);
//echo $fecha;
 $data3->execute([$fecha]);

 while ($data = $data3->fetch()) 
 {
    $solicitanteNombre = $data[30].' '.$data[31].' '.$data[32].' '.$data[33].' '.$data[34];
    $motorista_Externo1 = $data[28];
    $motorista_Externo2 = $data[29];
    $estado_formulario = $data[14];
    $hora_de_llegada = $data[7];
    //echo "ddddddd".$hora_de_llegada;
    $fecha_salida = $data[24];
    $hora_de_retorno = $data[8];
    $hora_de_salida = $data[17];
    $idFormulario = $data[0];
    $direccionDestino = $data[3];
    $motivoSalida = $data[4];
    $esProyeto = $data[5];
    $nombreProyecto = $data[6];
    $llevarEquipo = $data[9];
    $descripcionEquipo = $data[10];
    $notaAdicional = $data[13];
    $hora_llegada = $data[7];
    $hora_retorno = $data[8];
    $nota_nina_ani = $data[25];

    //::::::::::::::::::::::::: ID EMPLEADO MOTORISTA ::::::::::::::::::::::
    $id_empleado_motorista = $data[12];
    $id_empleado_motorista2 = $data[26];
    //::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

    //:::::::::::::::::::::::: ID VEHICULO ASIGNADO ::::::::::::::::::::::::
    $id_vehiculos = $data[11];
    $id_vehiculos2 = $data[27];
  
    //::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    $cantidadPasajeros = $data[18];
    $pasajeroExterno = $data[20];
    $listaPasajeroExterno = $data[21];

    $cantidadExterno = $data[23];

    
 $query = "SELECT * FROM admin_finanzas_lista_motorista  where id = ?";
 $data4 = $net_rrhh->prepare($query);
 $data4->execute([$id_empleado_motorista]);
 while ($dataA = $data4->fetch()) 
 {
    $id_empleado = $dataA[1];
    $nombre_motorista_externo = $dataA[2];
    $empresa_externa = $dataA[17];
    $estado = $dataA[0];
    $motorista_interno = $dataA[9];
}
//:::: motoristas 1 _________________________________________________
$nombre_motorista = "";
if($id_empleado_motorista != 0)
{
    $query = "SELECT * FROM employee  where id = ?";
        $data5 = $net_rrhh->prepare($query);
        $data5->execute([$id_empleado]);
        while ($dataB = $data5->fetch()) 
        {
            $name1 = $dataB[1];
            $name2 = $dataB[2];
            $name3 = $dataB[3];
            $lastname1 = $dataB[4];
            $lastname2 = $dataB[5];
        }
    $nombre_motorista = $name1.' '.$name2.' '.$name3.' '.$lastname1.' '.$lastname2;
}
else
{
    $nombre_motorista = $motorista_Externo1;
}

$query = "SELECT * FROM admin_finanzas_lista_motorista  where id = ?";
$data6 = $net_rrhh->prepare($query);
$data6->execute([$id_empleado_motorista2]);
while ($dataC = $data6->fetch()) 
{
    //echo "idMotorista".$id_empleado_motorista;
    $id_empleado = $dataC[1];
    $nombre_motorista_externo = $dataC[2];
    $empresa_externa = $dataC[17];
    $estado = $dataC[0];
    $motorista_interno = $dataC[9];
}

//:::::: motoristas 2 ______________________________
$nombre_motorista2 = "";
if($id_empleado_motorista2 != 0)
{
    $query = "SELECT * FROM employee  where id = ?";
    $data7 = $net_rrhh->prepare($query);
    $data7->execute([$id_empleado]);
    while ($dataD = $data7->fetch()) 
    {
        $name1 = $dataD[1];
        $name2 = $dataD[2];
        $name3 = $dataD[3];
        $lastname1 = $dataD[4];
        $lastname2 = $dataD[5];
    }
    $nombre_motorista2 = $name1.' '.$name2.' '.$name3.' '.$lastname1.' '.$lastname2;
}
else
{
    $nombre_motorista2 = $motorista_Externo2;
}

//VARIABLE DE UBER ___________
$variable_vehiculo = "";
//echo "Valor Vehiculo".$id_vehiculos2;
if($id_vehiculos == "")
{

}
else
{
    $query = "SELECT * FROM admin_finanzas_informacion_vehiculo  where id = ?"; 
    $data8 = $net_rrhh->prepare($query);
    $data8->execute([$id_vehiculos]);
    while ($dataE = $data8->fetch()) 
    {
        //echo "idMotorista".$id_empleado_motorista;
        $nombreVhiculo = $dataE[1];
        $modelovehiculo = $dataE[2];
        $colorvehiculo = $dataE[3];
        $yearvehiculo = $dataE[4];
    }
    
    if($id_vehiculos == 0 && $estado_formulario  != 1)
    {
        $variable_vehiculo = "CONTRATACIÓN DE UBER";
    }
    else
    {
        $variable_vehiculo =  $nombreVhiculo." ".$modelovehiculo." ".$colorvehiculo." ".$yearvehiculo;
    }
}

if($id_vehiculos2 == "")
{

}
else
{
    //VARIABLE DE UBER2 ___________
$variable_vehiculo_2 = "";
$query = "SELECT * FROM admin_finanzas_informacion_vehiculo  where id = ?";
$data9 = $net_rrhh->prepare($query);
$data9->execute([$id_vehiculos2]);
while ($dataF = $data9->fetch()) 
{
    //echo "idMotorista".$id_empleado_motorista;
    $nombreVhiculo = $dataF[1];
    $modelovehiculo = $dataF[2];
    $colorvehiculo = $dataF[3];
    $yearvehiculo = $dataF[4];
}
if($id_vehiculos2 == 0 && $estado_formulario  != 1)
{
$variable_vehiculo_2 = "CONTRATACIÓN DE UBER";
}

else
{
$variable_vehiculo_2 = $nombreVhiculo." ".$modelovehiculo." ".$colorvehiculo." ".$yearvehiculo;
}
}


    echo '

    <tr>
     <td >'.sanear_string($solicitanteNombre).' </td>
     <td>'.$fecha_salida.'</td>
    <td>'.$hora_de_salida.' </td>
    <td>'.$hora_de_retorno.' </td>
    <td>'.$direccionDestino.' </td>
    <td>'.$nombreProyecto.' </td>
    <td>'.$nota_nina_ani.' </td>
    <td>'.$variable_vehiculo.'</td>
    <td>'.$nombre_motorista.' </td>
    <td>'.$variable_vehiculo_2.'</td>
    <td>'.$nombre_motorista2.' </td>
    <td style="font-size: 11px; background-color: #CBE8BA;"><span  > 
  <b>Aprobado </b> 
  </span></td>
     <td>


     <form action="?view=SolicitanteAdminVerFormulariotRANSPORTE23" method="POST">
     <input type="hidden" value="'.$data[19].'" name="idProyecto">
     <button type="submit" class="btn btn-sm" style="background-color: #1A4262;color:white;">
     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-check-fill" viewBox="0 0 16 16">
 <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5"/>
 <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585q.084.236.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5q.001-.264.085-.5m6.769 6.854-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708.708"/>
</svg>
     
     </button>
    </form>
     </td>
     <td style="font-size: 8px;">'.$data[19].' </td>
  </tr>

    ';

 


 }

     
    

 

 ?>

     
    </tr>

    
  </tbody>
</table>

  </div>
    
