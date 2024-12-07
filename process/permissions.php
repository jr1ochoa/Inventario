<?php

// Obtén la ruta base del servidor web

$base_path = $_SERVER['DOCUMENT_ROOT'];



// Construye la ruta completa a PHPMailer

require '/home/siiffusalmo/public_html/modules/PHPMailer/src/PHPMailer.php';

require '/home/siiffusalmo/public_html/modules/PHPMailer/src/Exception.php';

require '/home/siiffusalmo/public_html/modules/PHPMailer/src/SMTP.php';


if($action == "Add Permission"){

    $status = "Pendiente";

    $bosscomentary = ""; 



    echo "entre";

    $query = "SELECT MAX(id) AS id FROM processarea_permission";

    $lastIDP= $net_rrhh->prepare($query);    

    $lastIDP->execute();

    $datalip = $lastIDP->fetch();



    $query = "Insert into processarea_permission values(null, ";

    for ($i = 1; $i <= 11; $i++) {

        if($i == 11)

            $query .= "CURRENT_TIMESTAMP)";

        else

            $query .= ":n".$i.", ";

    } 

    $insertPermission = $net_rrhh->prepare($query);

    $insertPermission->bindParam(':n1', htmlspecialchars($_POST['idboss']));

    $insertPermission->bindParam(':n2', htmlspecialchars($_POST['idposition']));

    $insertPermission->bindParam(':n3', htmlspecialchars($_POST['permissiontype']));

    $insertPermission->bindParam(':n4', htmlspecialchars($_POST['dates']));

    $insertPermission->bindParam(':n5', htmlspecialchars($_POST['times']));

    $insertPermission->bindParam(':n6', htmlspecialchars($_POST['datee']));

    $insertPermission->bindParam(':n7', htmlspecialchars($_POST['timee']));

    $insertPermission->bindParam(':n8', htmlspecialchars($_POST['permissionreason']));

    $insertPermission->bindParam(':n9', htmlspecialchars($status));

    $insertPermission->bindParam(':n10', htmlspecialchars($bosscomentary));

    $insertPermission->execute();



    registerLog($net_rrhh, "Administrative Processes", "Permissions", "Add Permissions", "Agregar Permiso");     



    $errorList = "";

    foreach ($insertPermission->errorInfo() as $error) {

        $errorList .= "$error <br/>";

    }



    echo $e = ($_SESSION['type'] == "Administrador") ? $errorList : "";



    if ( $datalip == $net_rrhh->lastInsertId() ) {

        echo "<script>alert('Error al ingresar los datos, intente nuevamente');</script>";  

    } else {

        $query = "SELECT MAX(id) AS id FROM processarea_permission";

        $permissions = $net_rrhh->prepare($query);

        $permissions->execute();

        $dataP = $permissions->fetch();



        $url = 'http'.(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 's' : '').'://'.$_SERVER['HTTP_HOST'];

    



        $id = $dataP[0];

        $to = $_POST['correoBoss'];     

        //$to = 'renealfaro753@gmail.com';                   

        $subject = "Solicitud de Permiso";

       



        // Configuración del servidor SMTP de Office 365

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



        // Contenido del correo electrónico

        $mail->setFrom('desarrollo@fusalmo.org', 'Desarrollo');

        $mail->addAddress($to);

        $mail->addAddress('desarrollo@fusalmo.org');

        $mail->addAddress('recursoshumanos@fusalmo.org');
       

        $mail->Subject = $subject;

        $mail->Body = "<h1>Solicitud de Permiso</h1>

                

        <table style='border: 1px solid black; width: 70%; border-collapse: collapse;'>

            <tbody>

                <tr>

                    <th style='border: 1px solid black; padding: 10px; width: 35%; font-size: 1.1rem;'>Nombre del Empleado</th>

                    <td style='border: 1px solid black; padding: 10px; font-size: 1.1rem;'>".sanear_string($_POST['employeeName'])."</td>

                </tr>

                <tr>

                    <th style='border: 1px solid black; padding: 10px; width: 35%; font-size: 1.1rem;'>Fecha de Inicio</th>

                    <td style='border: 1px solid black; padding: 10px; font-size: 1.1rem;'>".$_POST['dates'].", ".$_POST['times']."</td>

                </tr>

                <tr>

                    <th style='border: 1px solid black; padding: 10px; width: 35%; font-size: 1.1rem;'>Fecha de ". sanear_string("Finalización") ."</th>

                    <td style='border: 1px solid black; padding: 10px; font-size: 1.1rem;'>".$_POST['datee'].", ".$_POST['timee']."</td>

                </tr>

                <tr>

                    <th style='border: 1px solid black; padding: 10px; width: 35%; font-size: 1.1rem;'>Motivo del Permiso</th>

                    <td style='border: 1px solid black; padding: 10px; font-size: 1.1rem;'>".$_POST['permissiontype'] . ", ".sanear_string($_POST['permissionreason'])."</td>

                </tr>

            </tbody>

        </table>              

        <br/>

        <p style='font-size: 1.2rem;'>Para ". sanear_string("más") ." detalles y responder al permiso entrar 

            <a href='$url?view=permissionAnswer&p=$id&u=".$_SESSION['iu']."'>". sanear_string("aquí") ."</a>

        </p>";



        // Envío del correo electrónico

        if ($mail->send()) {

            echo 'El correo se ha enviado correctamente';

        } else {

            echo 'Ha ocurrido un error al enviar el correo: ' . $mail->ErrorInfo;

        }

    }


    redirection("../?view=permissions");



}

else if ($action == "Penalties Permission")

{

    echo "<h1>entre</h1>";

    echo "idBossPositions = ".$_POST['idEmpleadoPositions'];

    echo "<br>";

    echo "idBossPositions = ".$_POST['idBossPositions2'];

    echo "<br>";

    echo "idBossPositions = ".$_POST['Hora'];

    echo "<br>";

    echo "idBossPositions = ".$_POST['Minutos'];

    echo "<br>";

    echo "idBossPositions = ".$_POST['penalizacion'];

    echo "<br>";

$status = "Aceptar";

    date_default_timezone_set('America/El_Salvador'); // Reemplaza 'America/Los_Angeles' con tu zona horaria



// Crear un objeto DateTime con la fecha y hora actuales

$inicio = new DateTime();



// Formatear para obtener el día actual con la hora actual

$horaInicio = $inicio->format('Y-m-d H:i:s');



// Clonar el objeto $inicio para no modificar el original

$fin = clone $inicio;



// Sumar 3 horas

$hour = isset($_POST['Hora']) ? (int)$_POST['Hora'] : 0;

$minute = isset($_POST['Minutos']) ? (int)$_POST['Minutos'] : 0;



$cadenaHora = "+ $hour hours $minute minutes";

$fin->modify($cadenaHora);



// Formatear para obtener el día actual con la hora 3 horas después

$horaFin = $fin->format('Y-m-d H:i:s');



// Imprimir

echo "Hora de inicio: " . $horaInicio . "\n";

echo "Hora de fin: " . $horaFin . "\n";



// Dividir $horaInicio en fecha y hora

list($fechaInicio, $tiempoInicio) = explode(' ', $horaInicio);



// Dividir $horaFin en fecha y hora

list($fechaFin, $tiempoFin) = explode(' ', $horaFin);



$limite1 = date_create("12:00");

$limite2 = date_create("13:00");



if (strtotime($tiempoInicio) <= strtotime($limite1) && strtotime($tiempoFin) >= strtotime($limite2)) {

    $tiempoInicio = date_create($tiempoInicio)->modify("+1 hours")->format('H:i:s');

    $tiempoFin = date_create($tiempoFin)->modify("+1 hours")->format('H:i:s');

}



// Imprimir

echo "Fecha de inicio: " . $fechaInicio . "\n";

echo "Tiempo de inicio: " . $tiempoInicio . "\n";

echo "Fecha de fin: " . $fechaFin . "\n";

echo "Tiempo de fin: " . $tiempoFin . "\n";









$query = "INSERT INTO processarea_permission VALUES(null, ";

for ($i = 1; $i <= 11; $i++) {

    if ($i == 11) {

        $query .= "CURRENT_TIMESTAMP)";

    } else {

        $query .= ":n" . $i . ", ";

    }

}

$insertPermission = $net_rrhh->prepare($query);



$insertPermission->bindParam(':n1', htmlspecialchars($_POST['idBossPositions2'])); 

$insertPermission->bindParam(':n2', htmlspecialchars($_POST['idEmpleadoPositions']));  

$insertPermission->bindParam(':n3', htmlspecialchars('Diligencias Personales'));  

$insertPermission->bindParam(':n4', htmlspecialchars($fechaInicio));  

$insertPermission->bindParam(':n5', htmlspecialchars($tiempoInicio));  

$insertPermission->bindParam(':n6', htmlspecialchars($fechaFin)); 

$insertPermission->bindParam(':n7', htmlspecialchars($tiempoFin)); 

$insertPermission->bindParam(':n8', htmlspecialchars('Penalización')); 

$insertPermission->bindParam(':n9', htmlspecialchars($status)); 

$insertPermission->bindParam(':n10', htmlspecialchars($_POST['penalizacion'])); 



$insertPermission->execute();



echo "idBossPositions = ".$_POST['idBossPositions2'];

echo "<br>";

echo "idEmpleadoPositions = ".$_POST['idEmpleadoPositions'];



registerLog($net_rrhh, "Administrative Processes", "Permissions", "Add Permissions", "Agregar Permiso");     



$errorList = "";

foreach ($insertPermission->errorInfo() as $error) {

    $errorList .= "$error <br/>";

}



echo $e = ($_SESSION['type'] == "Administrador") ? $errorList : "";



redirection("../?view=permissions");





}



else if($action == "Update Permission"){



    $query = "Update processarea_permission set permissiontype=:n1, dates=:n2, times=:n3, datee=:n4, timee=:n5,

    permissionreason=:n6 where id=:n7";

   

    $updatePermission = $net_rrhh->prepare($query);

    $updatePermission->bindParam(':n1', htmlspecialchars($_POST['permissiontype']));

    $updatePermission->bindParam(':n2', htmlspecialchars($_POST['dates']));

    $updatePermission->bindParam(':n3', htmlspecialchars($_POST['times']));

    $updatePermission->bindParam(':n4', htmlspecialchars($_POST['datee']));

    $updatePermission->bindParam(':n5', htmlspecialchars($_POST['timee']));

    $updatePermission->bindParam(':n6', htmlspecialchars($_POST['permissionreason']));

    $updatePermission->bindParam(':n7', htmlspecialchars($_POST['id']));

    $updatePermission->execute();



    registerLog($net_rrhh, "Administrative Processes", "Permissions", "Update Permissions", "Actualizar Permiso");

    redirection("../?view=permissions");



}else if($action == "Delete Permission"){



    $Query = "Delete from processarea_permission where id=:n1";

        

    $deletePermission = $net_rrhh->prepare($Query);

    $deletePermission->bindParam(':n1', $_POST['id']);        

    $deletePermission->execute();



    registerLog($net_rrhh, "Administrative Processes", "Permissions", "Delete Permissions", "Eliminar Permiso");

    redirection("../?view=permissions");



}else if($action == "Permissions Answer"){

    unset($_SESSION["pTemp"]);

    unset($_SESSION["uTemp"]); 



    $query = "Update processarea_permission set status=:n1, bosscomentary=:n2 where id=:n3";

   

    $answerPermission = $net_rrhh->prepare($query);

    $answerPermission->bindParam(':n1', htmlspecialchars($_POST['status']));

    $answerPermission->bindParam(':n2', htmlspecialchars($_POST['bosscomentary']));

    $answerPermission->bindParam(':n3', htmlspecialchars($_POST['id']));

    $answerPermission->execute();



    $to = $_POST['emailEmployee'];     

    //$to = 'renealfaro753@gmail.com';                   

    $subject = "Respuesta de Permiso";

    $result = ($_POST['status'] == "Aceptar") ? "ACEPTADO" : "RECHAZADO";

    

    // Configuración del servidor SMTP de Office 365

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



    // Contenido del correo electrónico

    $mail->setFrom('desarrollo@fusalmo.org', 'Desarrollo');

    $mail->addAddress($to);

    $mail->addAddress('desarrollo@fusalmo.org');

    $mail->addAddress('recursoshumanos@fusalmo.org');
  

    $mail->Subject = $subject;

    $mail->Body = "<h1>Respuesta de Permiso</h1>

            

    <p>Estimado usuario, le notificamos que su solicitud de permiso ha sido <b>$result</b> por su Jefe Inmediato. Compartimos con usted la respuesta brindada: </p>

    <table style='border: 1px solid black; width: 70%; border-collapse: collapse;'>

        <tbody>

            <tr>

                <th style='border: 1px solid black; padding: 10px; width: 35%; font-size: 1.1rem;'>Respuesta</th>

                <td style='border: 1px solid black; padding: 10px; font-size: 1.1rem;'>".sanear_string($_POST['status'])."</td>

            </tr>

            <tr>

                <th style='border: 1px solid black; padding: 10px; width: 35%; font-size: 1.1rem;'>Comentarios</th>

                <td style='border: 1px solid black; padding: 10px; font-size: 1.1rem;'>".$_POST['bosscomentary']."</td>

            </tr>

        </tbody>

    </table>              

    <br/>";



    // Envío del correo electrónico

    if ($mail->send()) {

        echo 'El correo se ha enviado correctamente';

    } else {

        echo 'Ha ocurrido un error al enviar el correo: ' . $mail->ErrorInfo;

    }



    registerLog($net_rrhh, "Administrative Processes", "Permissions", "Permissions Answer", "Respuesta de Permiso");

    redirection("../?view=permissions");



}

?>