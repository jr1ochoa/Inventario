<?php

    $action = (isset($_POST['action'])) ? $_POST['action'] : "";

    if($action == 'onlinesecurity'){

        $to = $_POST['email'];                        
        $subject = "Credenciales de Acceso a la Plataforma - Seguridad en Línea";
                
        $message = utf8_decode("<h1>Credenciales de Acceso a la Plataforma</h1>
                
        <p style='font-size: 1.2rem;'>
            <b>Usuario:</b> ".$_POST['user']." <br />
            
            <b>Contraseña:</b> ".$_POST['pass']."<br /><br />
                                            
            Entra  
            <a href='https://transforma.fusalmo.org/'>aquí</a>
            para acceder a la plataforma
                    
        </p>
        
        <img src='https://transforma.fusalmo.org/wp-content/scripts/assets/onlinesecurity/Encabezado.jpg' alt='Encabezado' width='100%'>");
        

        // More headers
        $headers .= "From: <comunicaciones@fusalmo.org>" . "\r\n";
        //$headers .= "Cc: desarrollo@fusalmo.org, permisos@fusalmo.org" . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                
        mail($to,$subject,$message,$headers); 
        echo "Credenciales enviadas correctamente...";

    }elseif($action == 'onlinesecurityInscription'){

        $to = $_POST['email'];                        
        $subject = "¡Inscripción Completada! - Seguridad en Línea";
                
        $message = utf8_decode("<h1 class='text-align: center;'>Bienvenido Internauta</h1>
                
                    <p style='font-size: 1.2rem;'>Muy pronto aprenderás a navegar seguro por la red, mantente pendiente de tu correo, ya que por este medio te daremos más información para ingresar.</p>
                    
                    <img src='https://transforma.fusalmo.org/wp-content/scripts/assets/onlinesecurity/Encabezado.jpg' alt='Encabezado' width='100%'>
                    ");

        // More headers
        $headers .= "From: <comunicaciones@fusalmo.org>" . "\r\n";
        //$headers .= "Cc: desarrollo@fusalmo.org, permisos@fusalmo.org" . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                
        mail($to,$subject,$message,$headers); 
        echo "Credenciales enviadas correctamente...";

    }elseif ($action == 'mailOffice365') {


        require '/home/siif/public_html/modules/PHPMailer/src/PHPMailer.php';
        require '/home/siif/public_html/modules/PHPMailer/src/Exception.php';
        require '/home/siif/public_html/modules/PHPMailer/src/SMTP.php';

        // Configuración del servidor SMTP de Office 365
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.office365.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'comunicaciones@fusalmo.org'; // Reemplaza con tu correo de Office 365
        $mail->Password = 'Donbosco2023'; // Reemplaza con tu contraseña de Office 365
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->isHTML(true);
        $email = $_REQUEST['email'];

        // Contenido del correo electrónico
        $mail->setFrom('comunicaciones@fusalmo.org', 'FUSALMO');
        $mail->addAddress($email);
        $mail->Subject = utf8_decode('Inscripción FUSALMO Virtual Party');
        $mail->Body = utf8_decode("
                
        <h1>¡Tu inscripción se ha realizado con éxito!</h1> 
        <br/>         
        <img src='https://fusalmo.org/salesianos/view/public/banner.gif' width='100%' height='100%' alt='Fondo'>  
        <br/>");

        // Envío del correo electrónico
        if ($mail->send()) {
            echo 'El correo se ha enviado correctamente';
        } else {
            echo 'Ha ocurrido un error al enviar el correo: ' . $mail->ErrorInfo;
        }

        
    }elseif ($action == 'credentialsSEL') {


        require '/home/siif/public_html/modules/PHPMailer/src/PHPMailer.php';
        require '/home/siif/public_html/modules/PHPMailer/src/Exception.php';
        require '/home/siif/public_html/modules/PHPMailer/src/SMTP.php';

        // Configuración del servidor SMTP de Office 365
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.office365.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'comunicaciones@fusalmo.org'; // Reemplaza con tu correo de Office 365
        $mail->Password = 'Donbosco2023'; // Reemplaza con tu contraseña de Office 365
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->isHTML(true);
        $email = $_REQUEST['email'];

        // Contenido del correo electrónico
        $mail->setFrom('comunicaciones@fusalmo.org', 'FUSALMO');
        $mail->addAddress($email);
        $mail->Subject = utf8_decode('¡Bienvenido al Curso de Seguridad en Línea de la Niñez y Adolescencia');
        $mail->Body = utf8_decode("
                
        <p>Bienvenidas y bienvenidos al 'Curso de Seguridad en Línea de la Niñez y Adolescencia' que tiene como objetivo hacer el uso responsable, respetuoso, creativo y crítico de la red en la niñez y juventud, así como de personas adultas responsables de la crianza y de la educación.</p> 
        <p>Por este medio se comparte las credenciales de acceso en la plataforma <a href='https://transforma.fusalmo.org' target='_blank'>https://transforma.fusalmo.org</a></p> 
        
         
        <p><b>Credencial:</b> $email</p>
        <p><b>Contraseña:</b> Fusalmo23</p>
        
        <p>También compartimos un manual práctico de los pasos a seguir para ingresar al taller virtual dentro de la plataforma Transforma.</p>  
         
        
        <p><a href='https://escuelainnovadorafusalmo-my.sharepoint.com/:b:/g/personal/melvin_benitez_fusalmo_org/EY-5rzgJDuFHkBIpBPaOH-4BcTXUgI0DwIdAfSaK0kogPA?e=ckqLjc' target='_blank'>
        MANUAL DE INGRESO A LA PLATAFORMA TRANSFORMA</a></p> 
        <br/>         
        <img src='https://fusalmo.org/salesianos/assets/resource/WhatsApp Image 2023-09-27 at 9.40.22 AM.jpeg' width='100%' height='100%' alt='Bienvenido'>  
        <br/>");

        // Envío del correo electrónico
        if ($mail->send()) {
            echo 'El correo se ha enviado correctamente';
        } else {
            echo 'Ha ocurrido un error al enviar el correo: ' . $mail->ErrorInfo;
        }

        
    }elseif ($action == 'virtual') {


        require '/home/siif/public_html/modules/PHPMailer/src/PHPMailer.php';
        require '/home/siif/public_html/modules/PHPMailer/src/Exception.php';
        require '/home/siif/public_html/modules/PHPMailer/src/SMTP.php';

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
        $email = $_REQUEST['email'];

        // Contenido del correo electrónico
        $mail->setFrom('desarrollo@fusalmo.org', 'FUSALMO');
        $mail->addAddress("lissette.portillo@fusalmo.org");
        $mail->Subject = utf8_decode('Patrocinio FUSALMO Virtual Party');
        $mail->Body = utf8_decode("
                
        <h1>Ha llegado una nueva inscripción para ser patrocinador</h1>
        <p>Una persona ha llenado el formulario de inscripción para ser patrocinador del evento, estos son sus datos:</p> 
        <br/>         
        <table style='border: 1px solid black; width: 70%; border-collapse: collapse;'>
            <tbody>
                <tr>
                    <th style='border: 1px solid black; padding: 10px; width: 35%; font-size: 1.1rem;'>Patrocinio:</th>
                    <td style='border: 1px solid black; padding: 10px; font-size: 1.1rem;'>".utf8_decode($_POST['tipo'])."</td>
                </tr>
                <tr>
                    <th style='border: 1px solid black; padding: 10px; width: 35%; font-size: 1.1rem;'>Nombre de la empresa:</th>
                    <td style='border: 1px solid black; padding: 10px; font-size: 1.1rem;'>".$_POST['empresa']."</td>
                </tr>
                <tr>
                    <th style='border: 1px solid black; padding: 10px; width: 35%; font-size: 1.1rem;'>Nombres</th>
                    <td style='border: 1px solid black; padding: 10px; font-size: 1.1rem;'>".$_POST['nombres']."</td>
                </tr>
                <tr>
                    <th style='border: 1px solid black; padding: 10px; width: 35%; font-size: 1.1rem;'>Apellidos</th>
                    <td style='border: 1px solid black; padding: 10px; font-size: 1.1rem;'>".$_POST['apellidos'] ."</td>
                </tr>
                <tr>
                    <th style='border: 1px solid black; padding: 10px; width: 35%; font-size: 1.1rem;'>Correos</th>
                    <td style='border: 1px solid black; padding: 10px; font-size: 1.1rem;'>".$_POST['correo'] ."</td>
                </tr>
                <tr>
                    <th style='border: 1px solid black; padding: 10px; width: 35%; font-size: 1.1rem;'>Telêfono de contacto</th>
                    <td style='border: 1px solid black; padding: 10px; font-size: 1.1rem;'>".$_POST['telefono'] ."</td>
                </tr>
                <tr>
                    <th style='border: 1px solid black; padding: 10px; width: 35%; font-size: 1.1rem;'>Dirección</th>
                    <td style='border: 1px solid black; padding: 10px; font-size: 1.1rem;'>".$_POST['direccion'] ."</td>
                </tr>
                <tr>
                    <th style='border: 1px solid black; padding: 10px; width: 35%; font-size: 1.1rem;'>Ciudad</th>
                    <td style='border: 1px solid black; padding: 10px; font-size: 1.1rem;'>".$_POST['ciudad'] ."</td>
                </tr>
                <tr>
                    <th style='border: 1px solid black; padding: 10px; width: 35%; font-size: 1.1rem;'>Departamento o Estado</th>
                    <td style='border: 1px solid black; padding: 10px; font-size: 1.1rem;'>".$_POST['departamento'] ."</td>
                </tr>
                <tr>
                    <th style='border: 1px solid black; padding: 10px; width: 35%; font-size: 1.1rem;'>País</th>
                    <td style='border: 1px solid black; padding: 10px; font-size: 1.1rem;'>".$_POST['pais'] ."</td>
                </tr>
            </tbody>
        </table> 
        <br/>");

        // Envío del correo electrónico
        if ($mail->send()) {
            echo '<script>alert("Su inscripción se ha realizado correctamente");
                        window.location="https://party.fusalmo.org/star/";
                    </script>';
        } else {
            echo ' <script>alert("Ocurrió un error al realizar su inscripción, intente realizarla nuevamente");
                        window.location="https://party.fusalmo.org/star/?view=registro";
                    </script>';
        }

        //. $mail->ErrorInfo
        
    }else
        echo "Error Mail";
?>
