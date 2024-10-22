<?php 
include("../../../../config/net.php");
header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=Reporte_TRANSPORTE.xls");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);
echo "\xEF\xBB\xBF"; // Añade el BOM para UTF-8
?>
<style>
    table, td, th {
        border: 1px solid;
    }
    td{
        text-align: left;
    }
</style>
 <table class="table table-hover table-sm table-striped">
  <thead>
    <tr>
      <th scope="col">Solicitado por</th>
     
      <th scope="col">Hora de Salida</th>
      <th scope="col">Hora de retorno</th>
      <th scope="col">Direccion</th>
      <th scope="col">Motivo de Salida</th>
      <th scope="col">Nota Solicitante </th>
      <th scope="col">Proyecto</th>
      <th scope="col">Descripcion Equipo </th>
      <th scope="col">Comentarios Niña Any</th>
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

 $data3->execute([$_REQUEST['fecha']]);

 while ($data = $data3->fetch()) 
 {
    $solicitanteNombre = $data[30].' '.$data[31].' '.$data[32].' '.$data[33].' '.$data[34];
    $motorista_Externo1 = $data[28];
    $motorista_Externo2 = $data[29];
    $estado_formulario = $data[14];
    $hora_de_llegada = $data[7];
    //echo "ddddddd".$hora_de_llegada;
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
    while ($data = $data4->fetch()) 
    {
       $id_empleado = $data[1];
       $nombre_motorista_externo = $data[2];
       $empresa_externa = $data[17];
       $estado = $data[0];
       $motorista_interno = $data[9];
   }
   //:::: motoristas 1 _________________________________________________
   $nombre_motorista = "";
   if($id_empleado_motorista != 0)
   {
       $query = "SELECT * FROM employee  where id = ?";
           $data5 = $net_rrhh->prepare($query);
           $data5->execute([$id_empleado]);
           while ($data = $data5->fetch()) 
           {
               $name1 = $data[1];
               $name2 = $data[2];
               $name3 = $data[3];
               $lastname1 = $data[4];
               $lastname2 = $data[5];
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
   while ($data = $data6->fetch()) 
   {
       //echo "idMotorista".$id_empleado_motorista;
       $id_empleado = $data[1];
       $nombre_motorista_externo = $data[2];
       $empresa_externa = $data[17];
       $estado = $data[0];
       $motorista_interno = $data[9];
   }
   
   //:::::: motoristas 2 ______________________________
   $nombre_motorista2 = "";
   if($id_empleado_motorista2 != 0)
   {
       $query = "SELECT * FROM employee  where id = ?";
       $data7 = $net_rrhh->prepare($query);
       $data7->execute([$id_empleado]);
       while ($data = $data7->fetch()) 
       {
           $name1 = $data[1];
           $name2 = $data[2];
           $name3 = $data[3];
           $lastname1 = $data[4];
           $lastname2 = $data[5];
       }
       $nombre_motorista2 = $name1.' '.$name2.' '.$name3.' '.$lastname1.' '.$lastname2;
   }
   else
   {
       $nombre_motorista2 = $motorista_Externo2;
   }
   
   //VARIABLE DE UBER ___________
   $variable_vehiculo = "";
   $query = "SELECT * FROM admin_finanzas_informacion_vehiculo  where id = ?";
   $data8 = $net_rrhh->prepare($query);
   $data8->execute([$id_vehiculos]);
   while ($data = $data8->fetch()) 
   {
       //echo "idMotorista".$id_empleado_motorista;
       $nombreVhiculo = $data[1];
       $modelovehiculo = $data[2];
       $colorvehiculo = $data[3];
       $yearvehiculo = $data[4];
   }
   if($id_vehiculos == 0 && $estado_formulario  != 1)
   {
       $variable_vehiculo = "CONTRATACIÓN DE UBER";
   }
   else
   {
       $variable_vehiculo =  $nombreVhiculo." ".$modelovehiculo." ".$colorvehiculo." ".$yearvehiculo;
   }
   //VARIABLE DE UBER2 ___________
   $variable_vehiculo_2 = "";
       $query = "SELECT * FROM admin_finanzas_informacion_vehiculo  where id = ?";
       $data9 = $net_rrhh->prepare($query);
       $data9->execute([$id_vehiculos2]);
       while ($data = $data9->fetch()) 
       {
           //echo "idMotorista".$id_empleado_motorista;
           $nombreVhiculo = $data[1];
           $modelovehiculo = $data[2];
           $colorvehiculo = $data[3];
           $yearvehiculo = $data[4];
       }
   if($id_vehiculos2 == 0 && $estado_formulario  != 1)
   {
       $variable_vehiculo_2 = "CONTRATACIÓN DE UBER";
   }
   else
   {
       $variable_vehiculo_2 = $nombreVhiculo." ".$modelovehiculo." ".$colorvehiculo." ".$yearvehiculo;
   }
   
           echo '
   
           <tr>
            <td >'.sanear_string($solicitanteNombre).' </td>
           <td>'.$hora_de_salida.' </td>
           <td>'.$hora_de_retorno.' </td>
           <td>'.sanear_string($direccionDestino).' </td>
           <td>'.sanear_string($motivoSalida).'</td>
           <td>'.sanear_string($notaAdicional).'</td>
           <td>'.sanear_string($nombreProyecto).' </td>
           <td>'.sanear_string($descripcionEquipo).'</td>
           <td>'.sanear_string($nota_nina_ani).' </td>
           <td>'.sanear_string($variable_vehiculo).'</td>
           <td>'.sanear_string($nombre_motorista).' </td>
           <td>'.sanear_string($variable_vehiculo_2).'</td>
           <td>'.sanear_string($nombre_motorista2).' </td>
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