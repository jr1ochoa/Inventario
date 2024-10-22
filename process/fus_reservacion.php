<?php 

$db = "fusalmo_v1";
$dbUser = "fusalmo_wp";
$dbPass = "sV3jGr3lVbTl";
$root = "https://fusalmo.org/";

try 
{
    $net_fusalmos = new PDO("mysql:host=localhost;dbname=$db", $dbUser, $dbPass);
    $net_fusalmos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verifica si la conexión se realizó correctamente
    if ($net_fusalmos) {
       //echo "Conexión exitosa a la base de datos.";
    }
} 
catch (PDOException $e) 
{
    print "Error!: " . $e->getMessage() . "<br/>";
    $net_fusalmos = null;
    die("La conexión a la base de datos falló.");
}


require '/home/fusalmosiif/public_html/modules/PHPMailer/src/PHPMailer.php';

require '/home/fusalmosiif/public_html/modules/PHPMailer/src/Exception.php';

require '/home/fusalmosiif/public_html/modules/PHPMailer/src/SMTP.php';

//$idEmpleado =  $_SESSION['iu'];

if($action == "fus_reservacion_add")
{
    /*
    nombreInstitucion: $("#nombreInstitucion").val(), 
tipoEmpresa: $("#tipoEmpresa").val(), 
nombreContacto: $("#nombreContacto").val(), 
correoEmpresa: $("#correoEmpresa").val(), 
conocidoComo2: $("#conocidoComo2").val(), 
inlineCheckbox1: $("#inlineCheckbox1").is(":checked") ? 1 : 0, 
inlineCheckbox2: $("#inlineCheckbox2").is(":checked") ? 1 : 0, 
inlineCheckbox3: $("#inlineCheckbox3").is(":checked") ? 1 : 0, 
cantidadPlaza: $("#cantidadPlaza").val() || 0,
descripcionPlaza : $("#descripcionPlaza").val(),
cantidadCursos : $("#cantidadCursos").val() || 0,
descripcionCursos : $("#descripcionCursos").val(),
inputYearValor  :  $("#inputYearValor").val(),
inputEventoValor : $("#inputEventoValor").val()
    */
    try{
            $query = "INSERT INTO fus_reservacion 
            VALUES(Null, :n1, :n2, :n3, :n4,:n5,:n6,:n7,:n8,:n9,:n10,:n11,:n12,CURRENT_TIMESTAMP,2,:n13,:n14)";
            $insert = $net_rrhh->prepare($query);
            $insert->bindParam(':n1', htmlspecialchars($_REQUEST['nombreInstitucion']));
            $insert->bindParam(':n2', htmlspecialchars($_REQUEST['tipoEmpresa']));
            $insert->bindParam(':n3', htmlspecialchars($_REQUEST['nombreContacto']));
            $insert->bindParam(':n4', htmlspecialchars($_REQUEST['correoEmpresa']));
            $insert->bindParam(':n5', htmlspecialchars($_REQUEST['conocidoComo2']));
            $insert->bindParam(':n6', htmlspecialchars($_REQUEST['inlineCheckbox1']));
            $insert->bindParam(':n7', htmlspecialchars($_REQUEST['inlineCheckbox2']));
            $insert->bindParam(':n8', htmlspecialchars($_REQUEST['inlineCheckbox3']));
            $insert->bindParam(':n9', htmlspecialchars($_REQUEST['cantidadPlaza']));
            $insert->bindParam(':n10', htmlspecialchars($_REQUEST['descripcionPlaza']));
            $insert->bindParam(':n11', htmlspecialchars($_REQUEST['cantidadCursos']));
            $insert->bindParam(':n12', htmlspecialchars($_REQUEST['descripcionCursos']));
            $insert->bindParam(':n13', htmlspecialchars($_REQUEST['inputEventoValor']));
            $insert->bindParam(':n14', htmlspecialchars($_REQUEST['inputYearValor']));
            $insert->execute();
            foreach ($insert->errorInfo() as $error) {
                $errorList .= "$error <br/>"; 
            }
            echo "Id Sesion".$idEmpleado;
            echo $errorList;


//$id = $dataP[0];
$to = $_REQUEST['correoEmpresa'];//"rene.guevara@fusalmo.org";//$emailBoss;    
$subject = "Reservacion";

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
        color: black;
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
                        <h1>¡Su reservacion ha sido registrada correctamente!</h1>
                        <p>De parte de FUSALMO, le agradecemos su participacion.</p>
             <table class='table table-hover table-sm table-striped' style='border: 1px solid black; width: 70%; border-collapse: collapse;'>
    <tbody>
       
        <tr>
            <th scope='col' style='border: 1px solid black;'>Fecha de Salida</th>
            <td style='border: 1px solid black;'>". $_REQUEST['conocidoComo2']."</td>
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






    }catch(Exception $e)
    {
        echo $e->getMessage();
    }   
}
if($action == "fus_add_evento")
{ 
    /*
    nombreComite: $("#nombreComite").val(), 
    descripcionComite: $("#descripcionComite").val(),
    idMovimiento : $("#idMovimiento").val() 
    */
    try{
            $query = "INSERT INTO fus_evento 
            VALUES(Null, :n1, :n2, CURRENT_TIMESTAMP, :n3,:n5)";
            $insert = $net_rrhh->prepare($query);
            $insert->bindParam(':n1', htmlspecialchars($_POST['nombreComite']));
            $insert->bindParam(':n2', htmlspecialchars($_POST['descripcionComite']));
            $insert->bindParam(':n3', htmlspecialchars(1));
           //$insert->bindParam(':n4', htmlspecialchars($idEmpleado));
           $insert->bindParam(':n5', htmlspecialchars($_POST['idMovimiento']));
            $insert->execute();
            foreach ($insert->errorInfo() as $error) {
                $errorList .= "$error <br/>"; 
                }
            // echo "Id Sesion".$idEmpleado;
            echo $errorList;
    }catch(Exception $e)
    {
        echo $e->getMessage();
    }   
}
if($action == "fus_add_movimiento")
{ 
    try{
            $query = "INSERT INTO fus_movimiento 
            VALUES(Null, :n1, CURRENT_TIMESTAMP,:n2,  :n3)";
            $insert = $net_rrhh->prepare($query);
            $insert->bindParam(':n1', htmlspecialchars($_POST['nombreMovimiento']));
            $insert->bindParam(':n2', htmlspecialchars(1));
            $insert->bindParam(':n3', htmlspecialchars($_POST['descripcionMovimiento']));
            
           // $insert->bindParam(':n4', htmlspecialchars($idEmpleado));
          //  $insert->bindParam(':n5', htmlspecialchars($_POST['conocidoComo']));
            $insert->execute();
            foreach ($insert->errorInfo() as $error) {
                $errorList .= "$error <br/>"; 
                }
            // echo "Id Sesion".$idEmpleado;
            echo $errorList;
    }catch(Exception $e)
    {
        echo $e->getMessage();
    }   
}
//:::::::::::::: registro admin :::::::::::::::::::::::::::::::::::::::::
if($action == "updateEstadoSolicitud")
{
    try{
        $query = "UPDATE fus_reservacion  SET estado = :n1 where id = :n2";
        $insert = $net_fusalmos->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['accionSelet']));
        $insert->bindParam(':n2', htmlspecialchars($_POST['idSolicitud']));
        $insert->execute();
        foreach ($insert->errorInfo() as $error) 
        {
            $errorList .= "$error <br/>"; 
        }
        echo $errorList;
    }catch(Exception $e)
    {
        echo $e->getMessage();
    }   
}

if($action == "fus_reservacion_add_admin")
{
    /*
    nombreInstitucion2: $("#nombreInstitucion2").val(), 
tipoEmpresa2: $("#tipoEmpresa2").val(), 
nombreContacto2: $("#nombreContacto2").val(), 
correoEmpresa2: $("#correoEmpresa2").val(), 
tipoEstado: $("#tipoEstado").val(), 
conocidoComo3: $("#conocidoComo3").val(), 
inlineCheckbox4: $("#inlineCheckbox4").is(":checked") ? 1 : 0, 
inlineCheckbox5: $("#inlineCheckbox5").is(":checked") ? 1 : 0, 
inlineCheckbox6: $("#inlineCheckbox6").is(":checked") ? 1 : 0, 
cantidadPlaza2: $("#cantidadPlaza2").val() || 0,
descripcionPlaza2 : $("#descripcionPlaza2").val(),
cantidadCursos2 : $("#cantidadCursos2").val() || 0,
descripcionCursos2 : $("#descripcionCursos2").val()
    */
    try{
            $query = "INSERT INTO fus_reservacion 
            VALUES(Null, :n1, :n2, :n3, :n4,:n5,:n6,:n7,:n8,:n9,:n10,:n11,:n12,CURRENT_TIMESTAMP,:n13)";
            $insert = $net_rrhh->prepare($query);
            $insert->bindParam(':n1', htmlspecialchars($_REQUEST['nombreInstitucion2']));
            $insert->bindParam(':n2', htmlspecialchars($_REQUEST['tipoEmpresa2']));
            $insert->bindParam(':n3', htmlspecialchars($_REQUEST['nombreContacto2']));
            $insert->bindParam(':n4', htmlspecialchars($_REQUEST['correoEmpresa2']));
            $insert->bindParam(':n5', htmlspecialchars($_REQUEST['conocidoComo3']));
            $insert->bindParam(':n6', htmlspecialchars($_REQUEST['inlineCheckbox4']));
            $insert->bindParam(':n7', htmlspecialchars($_REQUEST['inlineCheckbox5']));
            $insert->bindParam(':n8', htmlspecialchars($_REQUEST['inlineCheckbox6']));
            $insert->bindParam(':n9', htmlspecialchars($_REQUEST['cantidadPlaza2']));
            $insert->bindParam(':n10', htmlspecialchars($_REQUEST['descripcionPlaza2']));
            $insert->bindParam(':n11', htmlspecialchars($_REQUEST['cantidadCursos2']));
            $insert->bindParam(':n12', htmlspecialchars($_REQUEST['descripcionCursos2']));
            $insert->bindParam(':n13', htmlspecialchars($_REQUEST['tipoEstado']));
            $insert->execute();
            foreach ($insert->errorInfo() as $error) {
                $errorList .= "$error <br/>"; 
            }
            echo "Id Sesion".$idEmpleado;
            echo $errorList;


//$id = $dataP[0];
$to = $_REQUEST['correoEmpresa2'];//"rene.guevara@fusalmo.org";//$emailBoss;    
$subject = "Reservación";

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
    background: linear-gradient(135deg, #007bff, #00c6ff);
    padding: 2rem;
    border-radius: 0.625rem;
    box-shadow: 0 0 0.625rem rgba(0, 0, 0, 0.2);
    max-width: 90%;
    width: 400px;
    color: #fff;
}

h1 {
    color: #fff;
    font-size: 1.75rem;
    margin-bottom: 1rem;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

p {
    color: #f1f1f1;
    font-size: 1rem;
    margin-bottom: 1.5rem;
}

h4 {
    color: #ffd700;
    font-size: 1.25rem;
    margin-top: 1rem;
}

.button {
    display: inline-block;
    background-color: #ffd700;
    color: #333;
    padding: 0.625rem 1.25rem;
    text-decoration: none;
    border-radius: 0.3125rem;
    font-size: 1rem;
    margin-top: 1rem;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.button:hover {
    background-color: #ffcc00;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    color: #333;
}

/* Media queries for responsiveness */
@media (max-width: 600px) {
    .container {
        padding: 1rem;
        width: 90%;
    }

    h1 {
        font-size: 1.5rem;
    }

    p, h4 {
        font-size: 1rem;
    }

    .button {
        padding: 0.5rem 1rem;
        font-size: 0.875rem;
    }
}
</style>

<div class='bodyDiv'>
    <div class='container'>
        <h1>¡Su reservación ha sido registrada correctamente!</h1>
        <p>De parte de FUSALMO, le agradecemos su participación. </p>
        <h1> Su mesa registrada es la número". $_REQUEST['conocidoComo3']."</h1>
        <a href='#' class='button'>Ver detalles</a>
    </div> 
</div>

      

";



// Envío del correo electrónico

if ($mail->send()) {

    echo 'El correo se ha enviado correctamente';

} else {

    echo 'Ha ocurrido un error al enviar el correo: ' . $mail->ErrorInfo;

}






    }catch(Exception $e)
    {
        echo $e->getMessage();
    }   
}





?>