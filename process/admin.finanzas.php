<?php 

$idEmpleado =  $_SESSION['iu'];
// Construye la ruta completa a PHPMailer

require '/home/fusalmosiif/public_html/modules/PHPMailer/src/PHPMailer.php';

require '/home/fusalmosiif/public_html/modules/PHPMailer/src/Exception.php';

require '/home/fusalmosiif/public_html/modules/PHPMailer/src/SMTP.php';


if($action == "addSolicitudTransporte")
{
    /*
       1 idDireccionDestino: $("#idDireccionDestino").val(), 
       2 idMotivoSalida: $("#idMotivoSalida").val(), 
       3 idSelectProyecto: $("#idSelectProyecto").val(), 
       4 idNombreProyecto: $("#idNombreProyecto").val(), 
       5 idSelectHerramientas: $("#idSelectHerramientas").val(), 
       6 idDescripcionHerramintas: $("#idDescripcionHerramintas").val(), 
       7 idNotaAdicional: $("#idNotaAdicional").val(), 
       8 idHoraLlegada: $("#idHoraLlegada").val(), 
       9 idHorRetorno: $("#idHorRetorno").val(),
       10 idCantidaPasajeros2 : $("#idCantidaPasajeros2").val(),
       11 selectPasajerExterno : $("#selectPasajerExterno").val(),
       12 idCantidadPasajeroExterno : $("#idCantidadPasajeroExterno").val(),
       13 textIdPsajeroExterno : $("#textIdPsajeroExterno").val(),
       14 idcodigoSolicitud : $("#idcodigoSolicitud").val(),
       15 idAreaEmpleadoTexto : $("#idAreaEmpleadoTexto").val(),
       16 idFechaSolicitud: $("#idFechaSolicitud").val()
    */

    /*echo $_POST['idDireccionDestino'];
    echo $_POST['idMotivoSalida'];
    echo $_POST['idSelectProyecto'];
    echo $_POST['idNombreProyecto'];
    echo $_POST['idSelectHerramientas'];
    echo $_POST['idDescripcionHerramintas'];
    echo $_POST['idNotaAdicional'];
    echo $_POST['idHoraLlegada'];
    echo $_POST['idHorRetorno'];
    echo $_POST['idCantidaPasajeros2'];
    echo $_POST['selectPasajerExterno'];
    echo $_POST['idCantidadPasajeroExterno'];  
    echo $_POST['textIdPsajeroExterno'];
    echo $_POST['idcodigoSolicitud'];*/

    try{
        
        $cantidadTotal = $_POST['idCantidaPasajeros2'] + $_POST['idCantidadPasajeroExterno'];
            $query = "INSERT INTO admin_finanzas_formulario 
            VALUES(Null,:n17,:n16, :n1, :n2,:n3,:n4,:n5,:n6,:n7,:n8,null,null,:n9,1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP,null,:n13,:n10,:n11,:n12,:n14,:n15,:n18,null,null,null,null,null)";
            $insert = $net_rrhh->prepare($query);
            $insert->bindParam(':n1', htmlspecialchars($_POST['idDireccionDestino']));
            $insert->bindParam(':n2', htmlspecialchars($_POST['idMotivoSalida']));
            $insert->bindParam(':n3', htmlspecialchars($_POST['idSelectProyecto']));
            $insert->bindParam(':n4', htmlspecialchars($_POST['idNombreProyecto']));
            $insert->bindParam(':n5', htmlspecialchars($_POST['idHoraLlegada']));
            $insert->bindParam(':n6', htmlspecialchars($_POST['idHorRetorno']));
            $insert->bindParam(':n7', htmlspecialchars($_POST['idSelectHerramientas']));
            $insert->bindParam(':n8', htmlspecialchars($_POST['idDescripcionHerramintas']));
            $insert->bindParam(':n9', htmlspecialchars($_POST['idNotaAdicional']));
            $insert->bindParam(':n10', htmlspecialchars($_POST['idcodigoSolicitud']));
            $insert->bindParam(':n11', htmlspecialchars($_POST['selectPasajerExterno']));
            $insert->bindParam(':n12', htmlspecialchars($_POST['textIdPsajeroExterno']));
            $insert->bindParam(':n13', htmlspecialchars($cantidadTotal));
            $insert->bindParam(':n14', htmlspecialchars($_POST['idCantidaPasajeros2']));
            $insert->bindParam(':n15', htmlspecialchars($_POST['idCantidadPasajeroExterno']));
            $insert->bindParam(':n16', htmlspecialchars($_POST['idAreaEmpleadoTexto']));
            $insert->bindParam(':n17', htmlspecialchars($idEmpleado));//
            $insert->bindParam(':n18', htmlspecialchars($_POST['idFechaSolicitud']));
            $insert->execute();
            foreach ($insert->errorInfo() as $error) {
                $errorList .= "$error <br/>"; 
            }


                //echo "Id Sesion".$idEmpleado;
                echo $errorList;
            //::::::::::::::::::: VAlidación antes de enviar al correo ::::::::::::::::::::::::::
            if($errorList)
            {
                
                $query = "SELECT * FROM employee_institutional
                WHERE idemployee = ". $idEmpleado;
                $email = $net_rrhh->prepare($query);
                $email->execute();
                if ($email->rowCount() > 0) {
                    $dataE = $email->fetch();
                    $emailBoss = $dataE[2];
                    $banderaErrorCorreo = 0;
                }else{

                    $query2 = "SELECT * FROM users
                    WHERE id = ". $idEmpleado;
                    $email2 = $net_rrhh->prepare($query2);
                    $email2->execute();
                    if ($email2->rowCount() > 0) {
                        $dataE2 = $email2->fetch();
                        $emailBoss = $dataE2[1];
                        $banderaErrorCorreo = 0;
                    }
                else
                {
                    $emailBoss = "manuel.gamez@fusalmo.org";
                   // $banderaErrorCorreo = 1;
                   $banderaErrorCorreo = 0;
                }
                    
                }
            
                if($banderaErrorCorreo == 0)
                {
                    //$id = $dataP[0];
                    $to = "ana.garcia@fusalmo.org";//"rene.guevara@fusalmo.org";//$emailBoss;    
                    $subject = "Solicitud de Transporte";

    //:::::::::::::::::::  Configuración del servidor SMTP de Office 365 :::::::::::::::::::::::::::::
                    $mail = new PHPMailer\PHPMailer\PHPMailer();
                    $mail->SMTPDebug = 0;
                    $mail->isSMTP();
                    $mail->Host = 'smtp.office365.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'desarrollo@fusalmo.org'; // Reemplaza con tu correo de Office 365
                    $mail->Password = 'Fusalmo2023'; // Reemplaza con tu contraseña de Office 365
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;
                    $mail->isHTML(true);
    //::::::::::::::::: Contenido del correo electrónico  ::::::::::::::::::::::::::::::::::::::::::::
             
                    $mail->setFrom('desarrollo@fusalmo.org', 'Desarrollo');
                    $mail->addAddress($to);
                    $mail->addAddress('desarrollo@fusalmo.org');
                    $mail->addAddress('manuel.gamez@fusalmo.org');
                    $mail->Subject = $subject;
                    $mail->Body = "
                    
                   <style>
    .bodyDiv {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        box-sizing: border-box;
    }
    .container {
        text-align: center;
        background-color: #fff;
        padding: 2rem;
        border-radius: 0.625rem;
        box-shadow: 0 0 0.625rem rgba(0, 0, 0, 0.1);
        max-width: 90%;
        width: 400px;
    }
    h1 {
        color: #007bff;
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }
    p {
        color: #333;
        font-size: 1rem;
        margin-bottom: 1.5rem;
    }
    .button {
        display: inline-block;
        background-color: #007bff;
        color: #fff;
        padding: 0.625rem 1.25rem;
        text-decoration: none;
        border-radius: 0.3125rem;
        font-size: 1rem;
        margin-top: 1rem;
    }
    .button:hover {
        background-color: #0056b3;
    }

    /* Media queries for responsiveness */
    @media (max-width: 600px) {
        .container {
            padding: 1rem;
            width: 90%;
        }
        h1 {
            font-size: 1.25rem;
        }
        p {
            font-size: 0.875rem;
        }
        .button {
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
        }
    }
</style>
                    
                        
             <div class='bodyDiv'>
              <div class='container'>
                        <h1>Nueva Solicitud de transporte dentro del Sistema</h1>
                        <p>Puede revisar la solicitud dentro de la plataforma.</p>
                        <a href='https://sii.fusalmo.org/' class='button'>Revisar Solicitud</a>
                    </div> 
             </div>
                          
             
                    ";
             
             
             
                    // Envío del correo electrónico
             
                    if ($mail->send()) {
             
                        echo 'El correo se ha enviado correctamente';
             
                    } else {
             
                        echo 'Ha ocurrido un error al enviar el correo: ' . $mail->ErrorInfo;
             
                    }
                }
                else
                {
                    //Error al encontrar el correo ::::::::::::::::::::::::::
                }
            
            }

        
    }catch(Exception $e)
    {
        echo $e->getMessage();
    } 

}
else if ($action == "addMotoristaTransporte")
{
     /*
        2- motoristaId: $("#motoristaId").val(), 
        3- id_label_single: $("#id_label_single").val(), 
        4- nombreMotorista: $("#nombreMotorista").val(), 
        5- nombreEmpresa: $("#nombreEmpresa").val(), 
        6- duiMotorista: $("#duiMotorista").val(), 
        7- notaOpcional: $("#notaOpcional").val(),
    */
    try{
        $query = "SELECT * FROM `admin_finanzas_lista_motorista`  where id_empleado = ? order by id desc";
        $data3 = $net_rrhh->prepare($query);
        $data3->execute([$_POST['id_label_single']]);
        // Verifica si ya hay un dato registrado
        if ($data3->rowCount() > 0) {
           echo 2;
        }
        else
        {
            $query = "INSERT INTO admin_finanzas_lista_motorista 
            VALUES(Null, :n1,:n2,:n3,:n4,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,:n5,:n6,:n7)";
            $insert = $net_rrhh->prepare($query);
            $insert->bindParam(':n1', htmlspecialchars($_POST['id_label_single']));
            $insert->bindParam(':n2', htmlspecialchars($_POST['nombreMotorista']));
            $insert->bindParam(':n3', htmlspecialchars($_POST['nombreEmpresa']));
            $insert->bindParam(':n4', htmlspecialchars(1));
            $insert->bindParam(':n5', htmlspecialchars($_POST['duiMotorista']));
            $insert->bindParam(':n6', htmlspecialchars($_POST['notaOpcional']));
            $insert->bindParam(':n7', htmlspecialchars($_POST['motoristaId']));
            
            $insert->execute();
            foreach ($insert->errorInfo() as $error) {
                $errorList .= "$error <br/>"; 
            }
    
                //echo "Id Sesion".$idEmpleado;
               // echo $errorList;
                echo 1;
        }
        

    
    }catch(Exception $e)
    {
        echo $e->getMessage();
}
    }
else if ($action == "addVehiculoTransporte")
{

    /*
        2- marcaVehicular: $("#marcaVehicular").val(), 
        3- modeloVehicular: $("#modeloVehicular").val(), 
        4- yearVehicular: $("#yearVehicular").val(), 
        5- colorVehicular: $("#colorVehicular").val(), 
        6- serieVehicular: $("#serieVehicular").val(), 
        7- tipoMotorVehicular: $("#tipoMotorVehicular").val(), 
        8- potenciaVehicular: $("#potenciaVehicular").val(), 
        9- transmisionVehicular: $("#transmisionVehicular").val(), 
        10-capacidaPasajeroVehicular: $("#capacidaPasajeroVehicular").val(),
        11-capacidadCargaVehicular : $("#capacidadCargaVehicular").val(),
        12-idDimensionesVehiculos : $("#idDimensionesVehiculos").val(),
        13-matriculaVehiculos : $("#matriculaVehiculos").val(),
        14-estado
        15-fhMatriculaVehiculos : $("#fhMatriculaVehiculos").val(),
        16-fhVencimientoVehiculos  : $("#fhVencimientoVehiculos").val(),
        17-estadoSeguroId          : $("#estadoSeguroId").val(),
        18-tipoUsoVehiculo : $("#tipoUsoVehiculo").val(),
        19-clasificacionVehicular :$("#clasificacionVehicular").val()
    */
    try{
        
            $query = "INSERT INTO admin_finanzas_informacion_vehiculo 
            VALUES(Null, :n1,:n2,:n3,:n4,:n5,:n6,:n7,:n8,:n9,:n10,:n11,:n12,:n13,:n14,:n15,:n16,:n17,:n18)";
            $insert = $net_rrhh->prepare($query);
            $insert->bindParam(':n1', htmlspecialchars($_POST['marcaVehicular']));
            $insert->bindParam(':n2', htmlspecialchars($_POST['modeloVehicular']));
            $insert->bindParam(':n3', htmlspecialchars($_POST['yearVehicular']));
            $insert->bindParam(':n4', htmlspecialchars($_POST['colorVehicular']));
            $insert->bindParam(':n5', htmlspecialchars($_POST['serieVehicular']));
            $insert->bindParam(':n6', htmlspecialchars($_POST['tipoMotorVehicular']));
            $insert->bindParam(':n7', htmlspecialchars($_POST['potenciaVehicular']));
            $insert->bindParam(':n8', htmlspecialchars($_POST['transmisionVehicular']));
            $insert->bindParam(':n9', htmlspecialchars($_POST['capacidaPasajeroVehicular']));
            $insert->bindParam(':n10', htmlspecialchars($_POST['capacidadCargaVehicular']));
            $insert->bindParam(':n11', htmlspecialchars($_POST['idDimensionesVehiculos']));
            $insert->bindParam(':n12', htmlspecialchars($_POST['matriculaVehiculos']));
            $insert->bindParam(':n13', htmlspecialchars(1));
            $insert->bindParam(':n14', htmlspecialchars($_POST['fhMatriculaVehiculos']));
            $insert->bindParam(':n15', htmlspecialchars($_POST['fhVencimientoVehiculos']));
            $insert->bindParam(':n16', htmlspecialchars($_POST['estadoSeguroId']));
            $insert->bindParam(':n17', htmlspecialchars($_POST['tipoUsoVehiculo']));
            $insert->bindParam(':n18', htmlspecialchars($_POST['clasificacionVehicular']));
            $insert->execute();
            foreach ($insert->errorInfo() as $error) {
                $errorList .= "$error <br/>"; 
            }

                //echo "Id Sesion".$idEmpleado;
                echo $errorList;

        
    }catch(Exception $e)
    {
        echo $e->getMessage();
    } 
}
else if ($action == "addPasajerosInternosTransporte")
{
    /*echo $_POST['id_label_single_text'];
    echo $_POST['id_label_single_value'];
    echo $_POST['idcodigoSolicitud'];*/
    try{
        
        $query = "INSERT INTO admin_finanzas_lista_pasajeros 
        VALUES(Null,null, :n1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP,:n2,:n3)";
        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['id_label_single_value']));
        $insert->bindParam(':n2', htmlspecialchars($_POST['id_label_single_text']));
        $insert->bindParam(':n3', htmlspecialchars($_POST['idcodigoSolicitud']));
        $insert->execute();
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }

            //echo "Id Sesion".$idEmpleado;
            //echo $errorList;
        echo 1;

    
    }catch(Exception $e)
    {
        echo $e->getMessage();
    } 
}
else if ($action == "updateSolicitudtransporteAdmin")
{
    try{

        /*  ::::::::::::::::::::    Variables   :::::::::::::::::::::::::::::::::::::::::::
            idOpciones: $("#idOpciones").val(), // Valor asociado al elemento seleccionado
            id_label_single23 : $("#id_label_single23").val(),
            codigoSolicitudid: $("#codigoSolicitudid").val(),
            timeStartAsignacion : $("#timeStartAsignacion").val(),
            idNotaGestion : $("#idNotaGestion").val(),
            idOpciones2: $("#idOpciones2").val(),
            id_label_single2324 : $("#id_label_single2324").val(), 
            MotoristaExternoText : $("#MotoristaExternoText").val(),
            MotoristaExternoText224_2 : $("#MotoristaExternoText224_2").val()
        */
       $query4 = "UPDATE  admin_finanzas_formulario SET id_vehiculo = ? ,  id_empleado_motorista = ?, hora_salida_fusalmo = ?,nota_final = ?, estado = 3, id_empleado_motorista2 = ?, id_vehiculo2 = ?, motorista_externo = ?, motorista_externo2 = ? WHERE codigo_formulario = ?";
       $data4 = $net_rrhh->prepare($query4);
       $data4->execute([$_POST['idOpciones'],$_POST['id_label_single23'],$_POST['timeStartAsignacion'],$_POST['idNotaGestion'],$_POST['id_label_single2324'],$_POST['idOpciones2'],$_POST['MotoristaExternoText'],$_POST['MotoristaExternoText224_2'],$_POST['codigoSolicitudid']]);

        

            //echo "Id Sesion".$idEmpleado;

            $query = "SELECT * FROM admin_finanzas_formulario  where codigo_formulario = ?";
            $data3 = $net_rrhh->prepare($query);
            $data3->execute([$_POST['codigoSolicitudid']]);
            while ($data = $data3->fetch()) 
            {
                $idEmpleadoSolicitante = $data[1];
                $direccion = $data[3];
            }


//:::::::::::::::::::: CODIGO INICIAL :::::::::::::::::::::::::::::::::::::::::::


// 
//echo $_REQUEST['fechaActual'];SELECT s1.*, s2.area FROM admin_finanzas_formulario as s1 inner join workarea as s2 on s1.id_area_solicitante = s2.id  where (s1.estado = 1 or s1.estado = 3) and s1.fh_salida = ? order by s1.id desc
 
 $query = "
 SELECT s1.*, s2.name1, s2.name2, s2.name3, s2.lastname1, s2.lastname2 FROM admin_finanzas_formulario as s1 inner join employee as s2 on s1.id_empleado = s2.id
  WHERE  s1.codigo_formulario = ?  ; 
 ";

 $data3 = $net_rrhh->prepare($query);

 $data3->execute([$_POST['codigoSolicitudid']]);

 while ($data = $data3->fetch()) 
 {
    $solicitanteNombre = $data[30].' '.$data[31].' '.$data[32].' '.$data[33].' '.$data[34];
    $motorista_Externo1 = $data[28];
    $motorista_Externo2 = $data[29];
    $estado_formulario = $data[14];
    $hora_de_llegada = $data[7];
    //echo "ddddddd".$hora_de_llegada;
    $fh_salida = $data[24];
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
   

 }


//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::




            foreach ($data3->errorInfo() as $error) {
                $errorList .= "$error <br/>"; 
            }
            echo $idEmpleadoSolicitante;

        echo $errorList;
        if($errorList)
            {
                echo $idEmpleadoSolicitante;
                $query = "SELECT * FROM employee_institutional
                WHERE idemployee = ". $idEmpleadoSolicitante;
                $email = $net_rrhh->prepare($query);
                $email->execute();
                if ($email->rowCount() > 0) {
                    $dataE = $email->fetch();
                    $emailBoss = $dataE[2];
                    $banderaErrorCorreo = 0;
                }
                
                else{

                    $query2 = "SELECT * FROM users
                    WHERE id = ". $idEmpleadoSolicitante;
                    $email2 = $net_rrhh->prepare($query2);
                    $email2->execute();
                    if ($email2->rowCount() > 0) {
                        $dataE2 = $email2->fetch();
                        $emailBoss = $dataE2[1];
                        $banderaErrorCorreo = 0;
                    }
                else{
                    $emailBoss = "manuel.gamez@fusalmo.org";
                }
                
                /*else{
                    //$emailBoss = "manuel.gamez@fusalmo.org";
                    $query2 = "SELECT * FROM employee WHERE id = ?";
                $email2 = $net_rrhh->prepare($query2);
                $email2->execute([ $idEmpleadoSolicitante]);
            while ($data = $email2->fetch()) 
            {
                $emailBoss  = $data[16];
            }*/
                    //$banderaErrorCorreo = 1;
                }
            
                if($banderaErrorCorreo == 0)
                {
                    //$id = $dataP[0];
                    $to = $emailBoss;    
                    $subject = "Respuesta Solicitud de Transporte";

    //:::::::::::::::::::  Configuración del servidor SMTP de Office 365 :::::::::::::::::::::::::::::
                    $mail = new PHPMailer\PHPMailer\PHPMailer();
                    $mail->SMTPDebug = 0;
                    $mail->isSMTP();
                    $mail->Host = 'smtp.office365.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'desarrollo@fusalmo.org'; // Reemplaza con tu correo de Office 365
                    $mail->Password = 'Fusalmo2023'; // Reemplaza con tu contraseña de Office 365
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;
                    $mail->isHTML(true);
    //::::::::::::::::: Contenido del correo electrónico  ::::::::::::::::::::::::::::::::::::::::::::
             
                    $mail->setFrom('desarrollo@fusalmo.org', 'Desarrollo');
                    $mail->addAddress($to);
                    $mail->addAddress('desarrollo@fusalmo.org');
                    $mail->addAddress('manuel.gamez@fusalmo.org');
                    //$mail->addAddress('recursoshumanos@fusalmo.org');
                    $mail->Subject = $subject;
                    $mail->Body = "
                    
                   <style>
    .bodyDiv {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        box-sizing: border-box;
    }
    .container {
        text-align: center;
        background-color: #fff;
        padding: 2rem;
        border-radius: 0.625rem;
        box-shadow: 0 0 0.625rem rgba(0, 0, 0, 0.1);
        max-width: 90%;
        width: 80%;
    }
    h1 {
        color: #007bff;
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }
    p {
        color: #333;
        font-size: 1rem;
        margin-bottom: 1.5rem;
    }
    .button {
        display: inline-block;
        background-color: #007bff;
        color: #fff;
        padding: 0.625rem 1.25rem;
        text-decoration: none;
        border-radius: 0.3125rem;
        font-size: 1rem;
        margin-top: 1rem;
    }
    .button:hover {
        background-color: #0056b3;
    }

    /* Media queries for responsiveness */
    @media (max-width: 600px) {
        .container {
            padding: 1rem;
            width: 90%;
        }
        h1 {
            font-size: 1.25rem;
        }
        p {
            font-size: 0.875rem;
        }
        .button {
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
        }
    }
        /* Center the table */
    .table {
        margin: auto;
        margin-top:13px;
    }
</style>
                

                        
             <div class='bodyDiv'>
              <div class='container'>
                        <h1>Solicitud de Transporte Aprobada</h1>
                        <p>Puede revisar la solicitud dentro de la plataforma.</p>
                        <a href='https://sii.fusalmo.org/' class='button' style='background-color: #1A4262;  text-decoration: none;'>Revisar Solicitud</a>
             <table class='table table-hover table-sm table-striped' style='border: 1px solid black; width: 70%; border-collapse: collapse;'>
    <tbody>
        <tr>
            <th scope='col' style='border: 1px solid black;'>Solicitado por</th>
            <td style='border: 1px solid black;'>".sanear_string($solicitanteNombre)."</td>
        </tr>
        <tr>
            <th scope='col' style='border: 1px solid black;'>Fecha de Salida</th>
            <td style='border: 1px solid black;'>".$fh_salida."</td>
        </tr>
        <tr>
            <th scope='col' style='border: 1px solid black;'>Hora de Salida FUSALMO</th>
            <td style='border: 1px solid black;'>".$hora_de_salida."</td>
        </tr>
        <tr>
           <th scope='col' style='border: 1px solid black;'>Hora de retorno</th>
           <td style='border: 1px solid black;'>".$hora_de_retorno."</td>
        </tr>
        <tr>
            <th scope='col' style='border: 1px solid black;'>Direccion</th>
            <td style='border: 1px solid black;'>".sanear_string($direccionDestino)."</td>
        </tr>
        <tr>
           <th scope='col' style='border: 1px solid black;'>Vehiculo Salida</th>
           <td style='border: 1px solid black;'>".sanear_string($variable_vehiculo)."</td>
        </tr>
        <tr>
           <th scope='col' style='border: 1px solid black;'>Motorista Salida</th>
           <td style='border: 1px solid black;'>".$nombre_motorista."</td>
        </tr>
        <tr>
            <th scope='col' style='border: 1px solid black;'>Vehiculo Retorno</th>
            <td style='border: 1px solid black;'>".sanear_string($variable_vehiculo_2)."</td>
        </tr>
        <tr>
           <th scope='col' style='border: 1px solid black;'>Motorista Retorno</th>
           <td style='border: 1px solid black;'>".$nombre_motorista2."</td>
        </tr>
    </tbody>
</table>

            </div> 
                    
            
                               

             </div>
                     
             
             




             
                    ";
             
             
             
                    // Envío del correo electrónico
             
                    if ($mail->send()) {
             
                        echo 'El correo se ha enviado correctamente';
             
                    } else {
             
                        echo 'Ha ocurrido un error al enviar el correo: ' . $mail->ErrorInfo;
             
                    }
                }
                else
                {
                    //Error al encontrar el correo ::::::::::::::::::::::::::
                }
            
            }

    
    }catch(Exception $e)
    {
        echo $e->getMessage();
    }  
}
else if ($action == "updateFinalizarSolicitud")
{
    // idcodigoSolicitud : $("#idcodigoSolicitud").val(),
    try{

        /*  ::::::::::::::::::::    Variables   :::::::::::::::::::::::::::::::::::::::::::
            idOpciones: $("#idOpciones").val(), Vehiculo Seleccionado
            id_label_single23 : $("#id_label_single23").val(), Motorista Seleccionado
            codigoSolicitudid: $("#codigoSolicitudid").val(),
            timeStartAsignacion : $("#timeStartAsignacion").val()
        */
       $query4 = "UPDATE  admin_finanzas_formulario SET estado = 4 WHERE codigo_formulario = ?";
       $data4 = $net_rrhh->prepare($query4);
       $data4->execute([$_POST['idcodigoSolicitud']]);

        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }

            //echo "Id Sesion".$idEmpleado;
        echo $errorList;
        echo 1;

    
    }catch(Exception $e)
    {
        echo $e->getMessage();
    } 
}
else if ($action == "updateSolicitudTransporte")
{
    try {
        // Consulta SQL mejorada
        $query4 = "UPDATE admin_finanzas_formulario 
                   SET direccion_destino = ?, 
                       motivo_salida = ?, 
                       proyecto = ?, 
                       nombre_proyecto = ?, 
                       equipo = ?, 
                       detalle_del_equipo = ?, 
                       nota_adicional = ?, 
                       hora_de_llegada = ?, 
                       hora_de_retorno = ?, 
                       cantidad_pasajeros = ?, 
                       pasajero_externo = ?, 
                       lista_pasajero_externo = ?, 
                       cantidad_internos = ?, 
                       cantidad_externos = ? 
                   WHERE codigo_formulario = ?";

        // Preparar y ejecutar la consulta
        $data4 = $net_rrhh->prepare($query4);

        $cantidad_pasajeros_total = intval($_POST['idCantidaPasajeros2']) + intval($_POST['cantidadIdExternoPasajero']);

        $data4->execute([
            $_POST['idDireccionDestino'],
            $_POST['idMotivoSalida'],
            $_POST['idSelectProyecto'],
            $_POST['idNombreProyecto'],
            $_POST['idSelectHerramientas'],
            $_POST['idDescripcionHerramintas'],
            $_POST['idNotaAdicional'],
            $_POST['idHoraLlegada'],
            $_POST['idHorRetorno'],
            $cantidad_pasajeros_total,
            $_POST['selectPasajerExterno'],
            $_POST['textIdPsajeroExterno'],
            $_POST['idCantidaPasajeros2'],
            $_POST['cantidadIdExternoPasajero'],
            $_POST['idcodigoSolicitud']
        ]);

        // Verificar errores en la ejecución de la consulta
        $errorList = '';
        foreach ($data4->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }

        // Mostrar errores si existen
        if ($errorList !== '') {
            echo $errorList;
        } else {
            echo 1;
        }

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
else if ($action == "desaprobarSolicitud")
{
    $query2 = "UPDATE admin_finanzas_formulario set  estado = 1 where id = :n1";
            $insert2 = $net_rrhh->prepare($query2);
            $insert2->bindParam(':n1', htmlspecialchars($_POST['idObjetivoGeneralDelete']));
           
            $insert2->execute();
            foreach ($insert2->errorInfo() as $error)
            {
                $errorList .= "$error <br/>";     
            }
                echo $errorList;
}
else if($action == "editarMotorista23")
{
    //echo $_POST['idEstadoMotorista'];
    /* NOTA: PARA EDITAR ARCHIVOS 
        observacionMotorista : $("observacionMotorista").val(),
        idEstadoMotorista : $("idEstadoMotorista").val(),
        idObjetivoGeneralDelete: $("#idObjetivoGeneralDelete").val()
    */
            $query2 = "UPDATE admin_finanzas_lista_motorista set  estado = :n3, Nota = :n2 where id = :n1";
            $insert2 = $net_rrhh->prepare($query2);
            $insert2->bindParam(':n1', htmlspecialchars($_POST['idObjetivoGeneralDelete']));
            $insert2->bindParam(':n2', htmlspecialchars($_POST['observacionMotorista']));
            $insert2->bindParam(':n3', htmlspecialchars($_POST['idEstadoMotorista']));
            $insert2->execute();
            foreach ($insert2->errorInfo() as $error)
            {
                $errorList .= "$error <br/>";     
            }
                echo $errorList;
}
else if($action == "editarVehiculos2024")
{
   /* NOTA: PARA EDITAR ARCHIVOS 
            
          1.  marca : $("#marcaVehicular").val(), // Asignar el valor de PHP a la variable de JavaScript
            //$("#marcaVehicular").val(marca); // Establecer el valor seleccionado en el <select>

          2.  clasificacion : $("#clasificacionVehicular").val(), 
            //$("#clasificacionVehicular").val(clasificacion);

          3. modelo : $("#modeloVehicular").val(), 
            //$("#modeloVehicular").val(modelo);

          4.  year : $("#yearVehicular").val(), 
            //$("#yearVehicular").val(year);

          5.  fh_matricula : $("#fhMatriculaVehiculos").val(), 
            //$("#fhMatriculaVehiculos").val(fh_matricula);

          6.  color_vehiculo : $("#colorVehicular").val(), 
            //$("#colorVehicular").val(color_vehiculo);

          7.  numero_serie : $("#serieVehicular").val(), 
            //$("#serieVehicular").val(numero_serie);

          8. tipo_motor : $("#tipoMotorVehicular").val(), 
            //$("#tipoMotorVehicular").val(tipo_motor);

          9.  potencia_motor : $("#potenciaVehicular").val(), 
            //$("#potenciaVehicular").val(potencia_motor);

          10.  transmicion : $("#transmisionVehicular").val(),
            //$("#transmisionVehicular").val(transmicion);

          11. capacidad_pasajero : $("#capacidaPasajeroVehicular").val(), 
            //$("#capacidaPasajeroVehicular").val(capacidad_pasajero);


          12. capacidad_carga : $("#capacidadCargaVehicular").val(), 
            //$("#capacidadCargaVehicular").val(capacidad_carga);

          13.  dimensiones : $("#idDimensionesVehiculos").val(), 
            //$("#idDimensionesVehiculos").val(dimensiones);

          14.  matricula : $("#matriculaVehiculos").val(), 
            //$("#matriculaVehiculos").val(matricula);

          15.  vencimiento_matricula : $("#fhVencimientoVehiculos").val(), 
            //$("#fhVencimientoVehiculos").val(vencimiento_matricula);

          16.  estado_seguro : $("#estadoSeguroId").val(), 
            //$("#estadoSeguroId").val(estado_seguro);

          17.  tipo_uso : $("#tipoUsoVehiculo").val(), 
            //$("#tipoUsoVehiculo").val(tipo_uso);

          18.  idObjetivoGeneralDelete : $("#idObjetivoGeneralDelete").val()

    */
    $query2 = "UPDATE admin_finanzas_informacion_vehiculo set  
    marca = :n1, clasificacion_vehicular = :n2, modelo = :n3, year = :n4, fh_matriculacion = :n5, color = :n6,
    numero_de_serie = :n7, tipo_motor = :n8,
    potencia_motor = :n9, transmision = :n10,capacidad_pasajeros = :n11, capacidad_carga = :n12,
    dimensiones = :n13, matricula = :n14,
    fh_vencimiento_matriculacion = :n15, estado_del_seguro = :n16,tipo_de_uso = :n17 where id = :n18";
    $insert2 = $net_rrhh->prepare($query2);

    $insert2->bindParam(':n1', htmlspecialchars($_POST['marca']));
    $insert2->bindParam(':n2', htmlspecialchars($_POST['clasificacion']));
    $insert2->bindParam(':n3', htmlspecialchars($_POST['modelo']));
    $insert2->bindParam(':n4', htmlspecialchars($_POST['year']));
    $insert2->bindParam(':n5', htmlspecialchars($_POST['fh_matricula']));
    $insert2->bindParam(':n6', htmlspecialchars($_POST['color_vehiculo']));
    $insert2->bindParam(':n7', htmlspecialchars($_POST['numero_serie']));
    $insert2->bindParam(':n8', htmlspecialchars($_POST['tipo_motor']));
    $insert2->bindParam(':n9', htmlspecialchars($_POST['potencia_motor']));
    $insert2->bindParam(':n10', htmlspecialchars($_POST['transmicion']));
    $insert2->bindParam(':n11', htmlspecialchars($_POST['capacidad_pasajero']));
    $insert2->bindParam(':n12', htmlspecialchars($_POST['capacidad_carga']));
    $insert2->bindParam(':n13', htmlspecialchars($_POST['dimensiones']));
    $insert2->bindParam(':n14', htmlspecialchars($_POST['matricula']));
    $insert2->bindParam(':n15', htmlspecialchars($_POST['vencimiento_matricula']));
    $insert2->bindParam(':n16', htmlspecialchars($_POST['estado_seguro']));
    $insert2->bindParam(':n17', htmlspecialchars($_POST['tipo_uso']));
    $insert2->bindParam(':n18', htmlspecialchars($_POST['idObjetivoGeneralDelete']));
    //$insert2->bindParam(':n3', htmlspecialchars($_POST['idEstadoMotorista']));
    $insert2->execute();
    foreach ($insert2->errorInfo() as $error)
    {
        $errorList .= "$error <br/>";     
    }
        echo $errorList;
}
else if($action == "DeleteSolicitudTransporte")
{
    try{
        #idObjetivoGeneralDelete: $("#idObjetivoGeneralDelete").val()
        $query = "DELETE FROM  admin_finanzas_formulario WHERE id = :n1 ";
        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['idObjetivoGeneralDelete']));
        $insert->execute();
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }

            //echo "Id Sesion".$idEmpleado;
            //echo $errorList;
        echo 1;

    
    }catch(Exception $e)
    {
        echo $e->getMessage();
    } 
}
else if ($action == "DeleteMotoristaTabla")
{
    try{
        #idObjetivoGeneralDelete: $("#idObjetivoGeneralDelete").val()
        $query = "DELETE FROM  admin_finanzas_lista_motorista WHERE id = :n1 ";
        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['idObjetivoGeneralDelete']));
        $insert->execute();
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }

            //echo "Id Sesion".$idEmpleado;
            //echo $errorList;
        echo 1;

    
    }catch(Exception $e)
    {
        echo $e->getMessage();
    } 
}
else if($action == "DeleteVehiculoTabla")
{
    try{
        #idObjetivoGeneralDelete: $("#idObjetivoGeneralDelete").val()
        $query = "DELETE FROM  admin_finanzas_informacion_vehiculo WHERE id = :n1 ";
        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['idObjetivoGeneralDelete']));
        $insert->execute();
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }

            //echo "Id Sesion".$idEmpleado;
            //echo $errorList;
        echo 1;

    
    }catch(Exception $e)
    {
        echo $e->getMessage();
    } 
}
else if ($action == "deletePasajero")
{
    try{
        
        $query = "DELETE FROM  admin_finanzas_lista_pasajeros WHERE id = :n1 ";
        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['idEncabezadoDelete']));
        $insert->execute();
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }

            //echo "Id Sesion".$idEmpleado;
            //echo $errorList;
        echo 1;

    
    }catch(Exception $e)
    {
        echo $e->getMessage();
    } 
}

?>