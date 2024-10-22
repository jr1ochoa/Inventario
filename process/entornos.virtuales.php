<?php 

$idEmpleado =  $_SESSION['iu'];
require '/home/fusalmosiif/public_html/modules/PHPMailer/src/PHPMailer.php';

require '/home/fusalmosiif/public_html/modules/PHPMailer/src/Exception.php';

require '/home/fusalmosiif/public_html/modules/PHPMailer/src/SMTP.php';

if($action == "addSolicitudArte")
{
    /*
       1 idIndicacionArtes: $("#idIndicacionArtes").val(), 
       2 idProductoServicio: $("#idProductoServicio").val(), 
       3 idLinkSharepoint: $("#idLinkSharepoint").val(), 
       4 idMedidasArte: $("#idMedidasArte").val(), 
       5 idFechaRequerida: $("#idFechaRequerida").val(), 
       6 notaAdicionalId: $("#notaAdicionalId").val(), 
       7 nombreArte: $("#nombreArte").val(),
       8 idAreaSolicitud: $("#idAreaSolicitud").val()


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
        
            $query = "INSERT INTO entornos_virtuales_formulario 
            VALUES(Null,null,null, :n1, :n2,:n3,:n4,null,1,null,null,null,null,:n5,:n6, CURRENT_TIMESTAMP,0.0,:n7,null,:n8)";
            $insert = $net_rrhh->prepare($query);
            $insert->bindParam(':n1', htmlspecialchars($_POST['idIndicacionArtes']));
            $insert->bindParam(':n2', htmlspecialchars($_POST['idLinkSharepoint']));
            $insert->bindParam(':n3', htmlspecialchars($_POST['idMedidasArte']));
            $insert->bindParam(':n4', htmlspecialchars($_POST['idFechaRequerida']));
            $insert->bindParam(':n5', htmlspecialchars($_POST['idProductoServicio']));
            $insert->bindParam(':n6', htmlspecialchars($_POST['notaAdicionalId']));
            $insert->bindParam(':n7', htmlspecialchars($_POST['nombreArte']));
            $insert->bindParam(':n8', htmlspecialchars($_POST['idAreaSolicitud']));   
            $insert->execute();
            foreach ($insert->errorInfo() as $error) {
                $errorList .= "$error <br/>"; 
            }

                //echo "Id Sesion".$idEmpleado;
                echo $errorList;

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
                        $emailBoss = "manuel.gamez@fusalmo.org";
                        $banderaErrorCorreo = 1;
                    }
                
                    if($banderaErrorCorreo == 0)
                    {
                        //$id = $dataP[0];
                        $to = "daniel.lopez@fusalmo.org";//$emailBoss;    
                        $subject = "Solicitud de Arte";
    
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
                 
                        $mail->setFrom('desarrollo@fusalmo.org', 'Sistema SIIF');
                        $mail->addAddress($to);
                        $mail->addAddress('desarrollo@fusalmo.org');
                        $mail->addAddress('manuel.gamez@fusalmo.org');
                        $mail->addAddress('ingrid.hernandez@fusalmo.org');
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
        }
        .container {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #007bff;
        }
        p {
            color: #333;
        }
        .button {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
                        
                            
                 <div class='bodyDiv'>
                  <div class='container'>
                            <h1>Nueva Solicitud de Arte dentro del Sistema SIIF</h1>
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
else if ($action == "DeleteDetalleSolicitud")
{
    $query = "DELETE FROM entornos_virtuales_detalle_solicitud WHERE id = :id";
$delete = $net_rrhh->prepare($query);
$delete->bindParam(':id', htmlspecialchars($_POST['inputIdProducto']));  // Asumiendo que el ID se pasa desde un POST
$delete->execute();
foreach ($delete->errorInfo() as $error) {
    $errorList .= "$error <br/>"; 
}

    //echo "Id Sesion".$idEmpleado;
    //echo $errorList;
echo 1;
}
else if ($action == "addDetalleSolicitud")
{
    /*
        idcodigoSolicitudDetalle: $("#idcodigoSolicitudDetalle").val(),
        idSelecProducto: $("#idSelecProducto").val(),
        producto1: $("#producto1").val(),
        medidasPersonalizadas : $("#medidasPersonalizadas").val(),
        informacionDelarte : $("#informacionDelarte").val(),
        informacionDelarte5 : $("#informacionDelarte5").val()

        id
        producto
        medidas
        codigo_solicitud
        informacion_arte
        medida_personalizada
    */
        $query = "INSERT INTO entornos_virtuales_detalle_solicitud
        VALUES(Null, :n1, :n2, :n3,:n4,:n5,1,:n6)";
        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['idSelecProducto']));
        $insert->bindParam(':n2', htmlspecialchars($_POST['producto1']));
        $insert->bindParam(':n3', htmlspecialchars($_POST['idcodigoSolicitudDetalle']));
        $insert->bindParam(':n4', htmlspecialchars($_POST['informacionDelarte']));
        $insert->bindParam(':n5', htmlspecialchars($_POST['medidasPersonalizadas']));
        $insert->bindParam(':n6', htmlspecialchars($_POST['informacionDelarte5']));
        $insert->execute();
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }
    
            //echo "Id Sesion".$idEmpleado;
            //echo $errorList;
        echo 1;
   
}
else if ($action == "addProductosEntornosVirtuales")
{
    
        $query = "INSERT INTO entornos_virtuales_productos
        VALUES(Null, :n1, 1)";
        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['nombreProducto']));
       // $insert->bindParam(':n2', htmlspecialchars($_POST['descripcionCambioId']));
       // $insert->bindParam(':n3', htmlspecialchars($_POST['motivosCambiosId']));
        $insert->execute();
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }
    
            //echo "Id Sesion".$idEmpleado;
            //echo $errorList;
        echo 1;
   
}
else if($action == "addEntornosVirtualesEncabezado")//::::::::::::::::::::::::::::::::::::::::::::
{
    /*
        idcodigoSolicitud           : $("#idcodigoSolicitud").val(),
        idNombreArte                : $("#idNombreArte").val(),
        radioCampana                : $('input[name="flexRadioDefault"]:checked').val(),
        fhEntrega                   : $("#fhEntrega").val(),
        idPrioridades               : $("#idPrioridades").val(),
        idComentariosAdicionales    : $("#idComentariosAdicionales").val(),
        $idEmpleado
    */

    $query = "SELECT s1.*, s2.idarea FROM workarea_positions_assignment as s1  inner join workarea_positions as s2   WHERE  s2.id = s1.idposition and s1.idemployee = $idEmpleado";
    $spaces = $net_rrhh->prepare($query);
    $spaces->execute();
    while ($data = $spaces->fetch())
    {
        //echo $data[8];
        $idAreaEmpleado = $data[8];
    }
//::::::::: verificar productos registrados ::::::::::::::::::::::::::::::
    $query2 = "SELECT COUNT(*) AS total_registros FROM entornos_virtuales_detalle_solicitud  where codigo_solicitud = ?";
    $data3 = $net_rrhh->prepare($query2);
    $data3->execute([$_POST['idcodigoSolicitud']]);
    $result = $data3->fetch(PDO::FETCH_ASSOC);
    // Extraer el valor de la columna total_registros
    $total_registros = $result['total_registros'];
    if($total_registros == 0)
    {
        echo 5;
    }
    else 
    {

        $query = "INSERT INTO entornos_virtuales_formulario(id_empleado, nombre_arte, tipo_producto, fh_requerida, prioridad, nota_adicional, codigo_solicitud,fh_creacion,idArea_solicitante,porcentajeAvance,estado)
        VALUES (:n1,:n2,:n3,:n4,:n5,:n6,:n7,CURRENT_TIMESTAMP,:n8,0.0,1)";
      $insert = $net_rrhh->prepare($query);
      $insert->bindParam(':n1', htmlspecialchars($idEmpleado));
      $insert->bindParam(':n2', htmlspecialchars($_POST['idNombreArte']));
      $insert->bindParam(':n3', htmlspecialchars($_POST['radioCampana']));
      $insert->bindParam(':n4', htmlspecialchars($_POST['fhEntrega']));
      $insert->bindParam(':n5', htmlspecialchars($_POST['idPrioridades']));
      $insert->bindParam(':n6', htmlspecialchars($_POST['idComentariosAdicionales']));
      $insert->bindParam(':n7', htmlspecialchars($_POST['idcodigoSolicitud']));
      $insert->bindParam(':n8', htmlspecialchars($idAreaEmpleado));


      $insert->execute();
      foreach ($insert->errorInfo() as $error) {
          $errorList .= "$error <br/>"; 
      }
  
      $query = "SELECT * FROM employee_institutional
      WHERE idemployee = ". $idEmpleado;
      $email = $net_rrhh->prepare($query);
      $email->execute();
      if ($email->rowCount() > 0) {
          $dataE = $email->fetch();
          $emailBoss = $dataE[2];
          $banderaErrorCorreo = 0;
      }else{
          $emailBoss = "manuel.gamez@fusalmo.org";
          $banderaErrorCorreo = 1;
      }
  
      if($banderaErrorCorreo == 0)
      {
          //$id = $dataP[0];
          $to = "daniel.lopez@fusalmo.org";//$emailBoss;    
          $subject = "Solicitud de Arte";

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
   
          $mail->setFrom('desarrollo@fusalmo.org', 'Sistema SIIF');
          $mail->addAddress($to);
          $mail->addAddress('desarrollo@fusalmo.org');
          $mail->addAddress('manuel.gamez@fusalmo.org');
          $mail->addAddress('ingrid.hernandez@fusalmo.org');
          $mail->addAddress('david.morales@fusalmo.org');
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
}
.container {
text-align: center;
background-color: #fff;
padding: 20px;
border-radius: 10px;
box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
h1 {
color: #007bff;
}
p {
color: #333;
}
.button {
display: inline-block;
background-color: #007bff;
color: #fff;
padding: 10px 20px;
text-decoration: none;
border-radius: 5px;
margin-top: 20px;
}
.button:hover {
background-color: #0056b3;
}
</style>
          
              
   <div class='bodyDiv'>
    <div class='container'>
              <h1>Nueva Solicitud de Arte dentro del Sistema SIIF</h1>
              <p>Puede revisar la solicitud dentro de la plataforma.</p>
              <a href='https://sii.fusalmo.org/' class='button'>Revisar Solicitud</a>
          </div> 
   </div>
                
   
          ";
   
   
   
          // Envío del correo electrónico
   
          if ($mail->send()) {
   
             // echo 'El correo se ha enviado correctamente';
   
          } else {
   
              echo 'Ha ocurrido un error al enviar el correo: ' . $mail->ErrorInfo;
   
          }
      }
      else
      {
          //Error al encontrar el correo ::::::::::::::::::::::::::
      }
  
          //echo "Id Sesion".$idEmpleado;
          //echo $errorList;
          echo 1;
    }




//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
}
else if ($action == "addMedidasEntornosVirtuales")
{
    
        $query = "INSERT INTO entornos_virtuales_medidas
        VALUES(Null,:n1,:n2, 1)";
        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['inputMedida']));
        $insert->bindParam(':n2', htmlspecialchars($_POST['idSelect']));
        
       // $insert->bindParam(':n2', htmlspecialchars($_POST['descripcionCambioId']));
       // $insert->bindParam(':n3', htmlspecialchars($_POST['motivosCambiosId']));
        $insert->execute();
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }
    
            //echo "Id Sesion".$idEmpleado;
            echo $errorList;
        echo 1;
   
}
else if ($action == "addModificacionSolicitud")
{
    /*
         descripcionCambioId: $("#descripcionCambioId").val(),
        motivosCambiosId: $("#motivosCambiosId").val(),
        idSolicitudFormulario: $("#idSolicitudFormulario").val(),
        selectProducto : $("#selectProducto").val()
    */


    
    $query = "SELECT * FROM entornos_virtuales_formulario  where  codigo_solicitud = ? ";

    $data3 = $net_rrhh->prepare($query);
    $data3->execute([$_POST['idSolicitudFormulario']]);
   
    while ($data = $data3->fetch()) { 
        $fh_entrega = $data[16];
    }
    if($fh_entrega < 100){
        $query = "INSERT INTO entornos_virtuales_historial_cambios
        VALUES(Null, :n1, :n2, 1, null,null,:n3,CURRENT_TIMESTAMP, :n4)";
        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['idSolicitudFormulario']));
        $insert->bindParam(':n2', htmlspecialchars($_POST['descripcionCambioId']));
        $insert->bindParam(':n3', htmlspecialchars($_POST['motivosCambiosId']));
        $insert->bindParam(':n4', htmlspecialchars($_POST['selectProducto']));
        $insert->execute();
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }
    
            //echo "Id Sesion".$idEmpleado;
            //echo $errorList;
        echo 1;
    }
    else
    {
        echo "Error no se puede ";
    }
    
}
else if($action == "updateIniciarProceso")
{
    /**
     * 
     * idEstado2: $("#idEstado2").val(),
       * idDetalleProducto2: $("#idDetalleProducto2").val(),
     */
    $query = "UPDATE   entornos_virtuales_detalle_solicitud set  estado = 2 WHERE id = ?";
        $insert = $net_rrhh->prepare($query);
        $insert->execute([$_POST['idDetalleProducto2']]); 
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }
        echo $errorList;
}
else if($action == "updateTerminarProceso")
{
    /**
    * 
    * idEstado2: $("#idEstado").val(),
    *  idDetalleProducto2: $("#idDetalleProducto").val(),
    *  idFormularioCodigo : $("#idFormularioCodigo").val()
    */
    
    $query = "UPDATE   entornos_virtuales_detalle_solicitud set  estado = 3 WHERE id = ?";
        $insert = $net_rrhh->prepare($query);
        $insert->execute([$_POST['idDetalleProducto2']]); 
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }
      //  echo $errorList;




//:::::::::::: SACANDO EL PROMEDIO DE ACTIVIDADES REALIZADAS ::::::::::::::::::::::::::::::
$query = "SELECT COUNT(*) AS total_registros FROM entornos_virtuales_detalle_solicitud  where codigo_solicitud = ?";
$data3 = $net_rrhh->prepare($query);
$data3->execute([$_REQUEST['idFormularioCodigo']]);
$result = $data3->fetch(PDO::FETCH_ASSOC);
// Extraer el valor de la columna total_registros
$total_registros = $result['total_registros'];

$query = "SELECT COUNT(*) AS total_registros2 FROM entornos_virtuales_detalle_solicitud  where codigo_solicitud = ? and estado = 3";
$data4 = $net_rrhh->prepare($query);
$data4->execute([$_REQUEST['idFormularioCodigo']]);
$result2 = $data4->fetch(PDO::FETCH_ASSOC);
// Extraer el valor de la columna total_registros
$total_actividad_termina = $result2['total_registros2'];

$calculo_de_avance = 0; // Inicializar la variable $calculo_de_avance

if($total_registros > 0) {
    $calculo_de_avance = ($total_actividad_termina / $total_registros) * 100;
}

 $calculo_de_avance;


$query = "UPDATE entornos_virtuales_formulario SET porcentajeAvance = ? WHERE codigo_solicitud = ?";
$insert = $net_rrhh->prepare($query);
$insert->execute([$calculo_de_avance, $_REQUEST['idFormularioCodigo']]);

foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }

            //echo "Id Sesion".$idEmpleado;  porcentajeAvance
            echo $errorList;
        echo 1;

   



}



else if($action == "editarActividadComoterminada")
{
    try{

        $iDFormulario =  $_POST['idIdFormulario'];   
        /*
        idObjetivoGeneralDelete: $("#idObjetivoGeneralDelete").val()
        */
        
        $query = "UPDATE   entornos_virtuales_lista_actividades set  estado = 2 WHERE id = ?";
        $insert = $net_rrhh->prepare($query);
        $insert->execute([$_POST['idActividadTerminada']]); 
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }

//:::::::::::: SACANDO EL PROMEDIO DE ACTIVIDADES REALIZADAS ::::::::::::::::::::::::::::::
$query = "SELECT COUNT(*) AS total_registros FROM entornos_virtuales_lista_actividades  where id_formulario = ?";
$data3 = $net_rrhh->prepare($query);
$data3->execute([$iDFormulario]);
$result = $data3->fetch(PDO::FETCH_ASSOC);
// Extraer el valor de la columna total_registros
$total_registros = $result['total_registros'];

$query = "SELECT COUNT(*) AS total_registros2 FROM entornos_virtuales_lista_actividades  where id_formulario = ? and estado = 2";
$data4 = $net_rrhh->prepare($query);
$data4->execute([$iDFormulario]);
$result2 = $data4->fetch(PDO::FETCH_ASSOC);
// Extraer el valor de la columna total_registros
$total_actividad_termina = $result2['total_registros2'];

$calculo_de_avance = 0; // Inicializar la variable $calculo_de_avance

if($total_registros > 0) {
    $calculo_de_avance = ($total_actividad_termina / $total_registros) * 100;
}

echo $calculo_de_avance;

$query = "UPDATE entornos_virtuales_formulario SET porcentajeAvance = ? WHERE id = ?";
$insert = $net_rrhh->prepare($query);
$insert->execute([$calculo_de_avance, $iDFormulario]);

foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }

            //echo "Id Sesion".$idEmpleado;  porcentajeAvance
            echo $errorList;
        echo 1;

    
    }catch(Exception $e)
    {
        echo $e->getMessage();
    }
}
else if($action == "subirDetalleImagenes")
{
    echo "Hola Mundo entre";
    var_dump($_FILES['files']);
    
    $directorio_actual = __DIR__;
    $directorio_superior = realpath($directorio_actual . '/..');
    $carpeta_destino = $directorio_superior . '/view/Programas/EntornosVirtuales/SolicitudArtes/';
    
    $uploadDir = $carpeta_destino . 'ArchivosReferencia/';
    echo "Ruta de la carpeta destino: $uploadDir<br>";
    
    if (!is_dir($uploadDir)) {
        if (mkdir($uploadDir, 0755, true)) {
            echo "Directorio creado correctamente.<br>";
        } else {
            echo "Error al crear el directorio $uploadDir.<br>";
            exit;
        }
    } else {
        echo "El directorio ya existe.<br>";
    }
    
    foreach ($_FILES['files']['name'] as $key => $name) {
        $tmpName = $_FILES['files']['tmp_name'][$key];
        $error = $_FILES['files']['error'][$key];
        $size = $_FILES['files']['size'][$key];
    
        if ($error === UPLOAD_ERR_OK) {
            $uniqueName = uniqid() . '-' . basename($name);
            $uploadFile = $uploadDir . $uniqueName;
            echo "Valor de la dirección: $uploadFile<br>";
    
            if (move_uploaded_file($tmpName, $uploadFile)) {
                echo "El archivo $name se ha subido correctamente.<br>";
            } else {
                echo "Error al mover el archivo $name.<br>";
            }
        } else {
            echo "Error al subir el archivo $name. Código de error: $error.<br>";
        }
    }
    
}

else if($action == "editarActividadComopROCESO")
{
    try{

        $iDFormulario =  $_POST['idIdFormulario'];   
        /*
        idObjetivoGeneralDelete: $("#idObjetivoGeneralDelete").val()
        */
        
        $query = "UPDATE   entornos_virtuales_lista_actividades set  estado = 1 WHERE id = ?";
        $insert = $net_rrhh->prepare($query);
        $insert->execute([$_POST['idActividadTerminada']]); 
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }

//:::::::::::: SACANDO EL PROMEDIO DE ACTIVIDADES REALIZADAS ::::::::::::::::::::::::::::::
$query = "SELECT COUNT(*) AS total_registros FROM entornos_virtuales_lista_actividades  where id_formulario = ?";
$data3 = $net_rrhh->prepare($query);
$data3->execute([$iDFormulario]);
$result = $data3->fetch(PDO::FETCH_ASSOC);
// Extraer el valor de la columna total_registros
$total_registros = $result['total_registros'];

$query = "SELECT COUNT(*) AS total_registros2 FROM entornos_virtuales_lista_actividades  where id_formulario = ? and estado = 2";
$data4 = $net_rrhh->prepare($query);
$data4->execute([$iDFormulario]);
$result2 = $data4->fetch(PDO::FETCH_ASSOC);
// Extraer el valor de la columna total_registros
$total_actividad_termina = $result2['total_registros2'];

$calculo_de_avance = 0; // Inicializar la variable $calculo_de_avance

if($total_registros > 0) {
    $calculo_de_avance = ($total_actividad_termina / $total_registros) * 100;
}

echo $calculo_de_avance;

$query = "UPDATE entornos_virtuales_formulario SET porcentajeAvance = ? WHERE id = ?";
$insert = $net_rrhh->prepare($query);
$insert->execute([$calculo_de_avance, $iDFormulario]);

foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }

            //echo "Id Sesion".$idEmpleado;  porcentajeAvance
            echo $errorList;
        echo 1;

    
    }catch(Exception $e)
    {
        echo $e->getMessage();
    }
}
else if($action == "deletemodificacioncreada")
{
    try{


        $query = "SELECT * FROM entornos_virtuales_historial_cambios  where  id = ? ";

        $data3 = $net_rrhh->prepare($query);
        $data3->execute([$_POST['idObjetivoGeneralDelete']]);
       
        while ($data = $data3->fetch()) { 
            $fh_entrega = $data[3];
        }
        if($fh_entrega != 2){
            //$iDFormulario = $_REQUEST['iDFormulario'];
            //idObjetivoGeneralDelete: $("#idObjetivoGeneralDelete").val(),
            $query = "DELETE FROM  entornos_virtuales_historial_cambios WHERE id = :n1 ";
            $insert = $net_rrhh->prepare($query);
            $insert->bindParam(':n1', htmlspecialchars($_POST['idObjetivoGeneralDelete']));
            $insert->execute();
            foreach ($insert->errorInfo() as $error) {
                $errorList .= "$error <br/>"; 
            }
    
                //echo "Id Sesion".$idEmpleado;
                //echo $errorList;
            echo 1;
        }
        else
        {
            echo "No se puede";
        }



        

    
    }catch(Exception $e)
    {
        echo $e->getMessage();
    } 
}
else if($action == "deleteactividad")
{
    try{
        $iDFormulario = $_REQUEST['iDFormulario'];
        //idObjetivoGeneralDelete: $("#idObjetivoGeneralDelete").val(),
        $query = "DELETE FROM  entornos_virtuales_lista_actividades WHERE id = :n1 ";
        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['idObjetivoGeneralDelete']));
        $insert->execute();




//:::::::::::: SACANDO EL PROMEDIO DE ACTIVIDADES REALIZADAS ::::::::::::::::::::::::::::::
$query = "SELECT COUNT(*) AS total_registros FROM entornos_virtuales_lista_actividades  where id_formulario = ?";
$data3 = $net_rrhh->prepare($query);
$data3->execute([$iDFormulario]);
$result = $data3->fetch(PDO::FETCH_ASSOC);
// Extraer el valor de la columna total_registros
$total_registros = $result['total_registros'];

$query = "SELECT COUNT(*) AS total_registros2 FROM entornos_virtuales_lista_actividades  where id_formulario = ? and estado = 2";
$data4 = $net_rrhh->prepare($query);
$data4->execute([$iDFormulario]);
$result2 = $data4->fetch(PDO::FETCH_ASSOC);
// Extraer el valor de la columna total_registros
$total_actividad_termina = $result2['total_registros2'];

$calculo_de_avance = 0; // Inicializar la variable $calculo_de_avance

if($total_registros > 0) {
    $calculo_de_avance = ($total_actividad_termina / $total_registros) * 100;
}

echo $calculo_de_avance;

$query = "UPDATE entornos_virtuales_formulario SET porcentajeAvance = ? WHERE id = ?";
$insert = $net_rrhh->prepare($query);
$insert->execute([$calculo_de_avance, $iDFormulario]);




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
else if($action == "deletesolicitudarte")
{
    try{
       // $iDFormulario = $_REQUEST['iDFormulario'];
        //idObjetivoGeneralDelete: $("#idObjetivoGeneralDelete").val(),


        $query = "SELECT * FROM entornos_virtuales_formulario  where  codigo_solicitud = ? ";

        $data3 = $net_rrhh->prepare($query);
        $data3->execute([$_POST['idObjetivoGeneralDelete']]);
       
        while ($data = $data3->fetch()) { 
            $fh_entrega = $data[7];
        }
        if($fh_entrega === null){

            $query = "DELETE FROM  entornos_virtuales_formulario WHERE codigo_solicitud = :n1 ";
            $insert = $net_rrhh->prepare($query);
            $insert->bindParam(':n1', htmlspecialchars($_POST['idObjetivoGeneralDelete']));
            $insert->execute();
    
            foreach ($insert->errorInfo() as $error) {
                $errorList .= "$error <br/>"; 
            }
    
                //echo "Id Sesion".$idEmpleado;
            //echo $errorList;
            echo 1;
        }
        else 
        {
            echo "no se puede";
        }

    }catch(Exception $e)
    {
        echo $e->getMessage();
    } 
}


else if ($action == "editarCambiosenlaSolicitud")
{
    try{
        /*
        idObjetivoGeneralDelete: $("#idObjetivoGeneralDelete").val()
        */
        
        $query = "UPDATE   entornos_virtuales_historial_cambios set  estado = 2 WHERE id = ?";
        $insert = $net_rrhh->prepare($query);
        $insert->execute([$_POST['idObjetivoGeneralDelete']]);
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
else if ($action == "actualizarGestion")
{
    /*
        fhEntrega: $("#fhEntrega").val(),
        personaEncargada1: ("$personaEncargada1").val(), 
        personaEncargada2: ("#personaEncargada2").val(),
        idPrioridad: ("#idPrioridad").val(),
        carpetaEntrega: ("#carpetaEntrega").val(),
        idIdFormulario: ("#idIdFormulario").val()
    */

    try{
        /*
        idIdFormulario: $("#idIdFormulario").val(), 
        descripcionActividad: $("#descripcionActividad").val(), 
        fechaInicioid: $("#fechaInicioid").val(), 
        fechaFinalizacionid: $("#fechaFinalizacionid").val(), 
        */
        if($_POST['personaEncargada1'] == 0)
        {
            $query = "UPDATE  entornos_virtuales_formulario set  fh_entrega = ?, prioridad = ? , id_encargado = ?, link_carpeta_entrega = ?, id_encargado2 = ? WHERE codigo_solicitud = ?";
            $insert = $net_rrhh->prepare($query);
            $insert->execute([$_POST['fhEntrega'],$_POST['idPrioridad'],null,$_POST['carpetaEntrega'],$_POST['personaEncargada2'],$_POST['idIdFormulario']]);
            foreach ($insert->errorInfo() as $error) {
                $errorList .= "$error <br/>"; 
            }
    
                //echo "Id Sesion".$idEmpleado;
                echo $errorList;
            echo 1;
        }
        else if($_POST['personaEncargada2'] == 0)
        {
            $query = "UPDATE  entornos_virtuales_formulario set  fh_entrega = ?, prioridad = ? , id_encargado = ?, link_carpeta_entrega = ?, id_encargado2 = ? WHERE codigo_solicitud = ?";
            $insert = $net_rrhh->prepare($query);
            $insert->execute([$_POST['fhEntrega'],$_POST['idPrioridad'],$_POST['personaEncargada1'],$_POST['carpetaEntrega'],null,$_POST['idIdFormulario']]);
            foreach ($insert->errorInfo() as $error) {
                $errorList .= "$error <br/>"; 
            }
    
                //echo "Id Sesion".$idEmpleado;
                echo $errorList;
            echo 1;
        }
        else
        {
            $query = "UPDATE  entornos_virtuales_formulario set  fh_entrega = ?, prioridad = ? , id_encargado = ?, link_carpeta_entrega = ?, id_encargado2 = ? WHERE codigo_solicitud = ?";
            $insert = $net_rrhh->prepare($query);
            $insert->execute([$_POST['fhEntrega'],$_POST['idPrioridad'],$_POST['personaEncargada1'],$_POST['carpetaEntrega'],$_POST['personaEncargada2'],$_POST['idIdFormulario']]);
            foreach ($insert->errorInfo() as $error) {
                $errorList .= "$error <br/>"; 
            }
    
                //echo "Id Sesion".$idEmpleado;
                echo $errorList;
            echo 1;
        }
        

    
    }catch(Exception $e)
    {
        echo $e->getMessage();
    }  


}
else if($action == "addActividades")
{
    try{
        /*
        idIdFormulario: $("#idIdFormulario").val(), 
        descripcionActividad: $("#descripcionActividad").val(), 
        fechaInicioid: $("#fechaInicioid").val(), 
        fechaFinalizacionid: $("#fechaFinalizacionid").val(), 
        */
        
        $query = "INSERT INTO entornos_virtuales_lista_actividades 
        VALUES(Null, :n1, :n2, 1, :n3,:n4)";
        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['idIdFormulario']));
        $insert->bindParam(':n2', htmlspecialchars($_POST['descripcionActividad']));
        $insert->bindParam(':n3', htmlspecialchars($_POST['fechaInicioid']));
        $insert->bindParam(':n4', htmlspecialchars($_POST['fechaFinalizacionid']));
        $insert->execute();
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }

            //echo "Id Sesion".$idEmpleado;
            //echo $errorList;

//:::::::::::: SACANDO EL PROMEDIO DE ACTIVIDADES REALIZADAS ::::::::::::::::::::::::::::::
$query = "SELECT COUNT(*) AS total_registros FROM entornos_virtuales_lista_actividades  where id_formulario = ?";
$data3 = $net_rrhh->prepare($query);
$data3->execute([$_POST['idIdFormulario']]);
$result = $data3->fetch(PDO::FETCH_ASSOC);
// Extraer el valor de la columna total_registros
$total_registros = $result['total_registros'];

$query = "SELECT COUNT(*) AS total_registros2 FROM entornos_virtuales_lista_actividades  where id_formulario = ? and estado = 2";
$data4 = $net_rrhh->prepare($query);
$data4->execute([$_POST['idIdFormulario']]);
$result2 = $data4->fetch(PDO::FETCH_ASSOC);
// Extraer el valor de la columna total_registros
$total_actividad_termina = $result2['total_registros2'];

$calculo_de_avance = 0; // Inicializar la variable $calculo_de_avance

if($total_registros > 0) {
    $calculo_de_avance = ($total_actividad_termina / $total_registros) * 100;
}

//echo $calculo_de_avance;

$query = "UPDATE entornos_virtuales_formulario SET porcentajeAvance = ? WHERE id = ?";
$insert = $net_rrhh->prepare($query);
$insert->execute([$calculo_de_avance, $_POST['idIdFormulario']]);








        echo 1;

    
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