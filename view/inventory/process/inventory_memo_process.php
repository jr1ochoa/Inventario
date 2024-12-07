<?php
include('../../../config/net.php'); // Incluye tu conexión PDO aquí
include('../../../modules/FPDF/fpdf.php');
require '/home/siiffusalmo/public_html/modules/PHPMailer/src/PHPMailer.php';
require '/home/siiffusalmo/public_html/modules/PHPMailer/src/Exception.php';
require '/home/siiffusalmo/public_html/modules/PHPMailer/src/SMTP.php';
session_start();
// Función para formatear la fecha en letras
function formatearFechaEnLetras($fecha) {
    $meses = [
        1 => 'enero', 2 => 'febrero', 3 => 'marzo', 4 => 'abril', 5 => 'mayo', 6 => 'junio',
        7 => 'julio', 8 => 'agosto', 9 => 'septiembre', 10 => 'octubre', 11 => 'noviembre', 12 => 'diciembre'
    ];

    $dia = date('j', strtotime($fecha)); // Día sin ceros a la izquierda
    $mes = $meses[date('n', strtotime($fecha))]; // Mes en letras
    $anio = date('Y', strtotime($fecha)); // Año completo

    return "$dia de $mes de $anio";
}

// Función para obtener el nombre del catálogo (marca o tipo) según el ID
function obtenerNombreCatalogo($id, $net_rrhh) {
    $sql = "SELECT * FROM catalogue WHERE id = :id";
    $stmt = $net_rrhh->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    
    // Si existe el resultado, devolvemos el nombre, de lo contrario, un mensaje de error
    $catalogo = $stmt->fetch(PDO::FETCH_ASSOC);
    return $catalogo ? utf8_decode($catalogo['value']) : 'No encontrado';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['post-data'] = $_POST; //Guardar los datos por si hay error
    $user_id = $_POST['user'];
    $asunto = $_POST['textInput'];
    $descripcion = $_POST['descriptionInput'];
    $fecha_creacion = formatearFechaEnLetras(date('Y-m-d'));

    $marca = isset($_POST['marca']) ? $_POST['marca'] : [];
    $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : [];
    $modelo = isset($_POST['modelo']) ? $_POST['modelo'] : [];
    $serie = isset($_POST['serie']) ? $_POST['serie'] : [];

    $assigned = false;
    $idActiveExist = "";

    foreach ($serie as $value) {
        $query = "SELECT * FROM `inventory_active` as a WHERE a.serial = '$value'";
        $activeVerification = $net_rrhh->prepare($query);
        $activeVerification ->execute();
        
        if ($activeVerification->rowCount() > 0) {
            $dataV = $activeVerification->fetch();

            $query = "SELECT * FROM `inventory_assignation` WHERE active = $dataV[0];";
            $assignationVerification = $net_rrhh->prepare($query);
            $assignationVerification->execute();

            while ($dataVA = $assignationVerification->fetch()) {
                if ($dataVA[5] == "En Prestamo") {
                    $assigned = true;
                }
            }
        }
    }

    if (!$assigned) {

        // Consulta para obtener el nombre completo del usuario
        $sql_user = "SELECT CONCAT(name1, ' ', name2, ' ', lastname1, ' ', lastname2) as full_name FROM employee WHERE id = :user_id";
        $stmt_user = $net_rrhh->prepare($sql_user);
        $stmt_user->bindParam(':user_id', $user_id);
        $stmt_user->execute();
        $user_data = $stmt_user->fetch(PDO::FETCH_ASSOC);
        $user_name = $user_data ? utf8_decode($user_data['full_name']) : 'Usuario no encontrado';

        // Consulta para obtener el nombre completo del usuario
        $sql_user = "SELECT username FROM `users` WHERE id = :user_id";
        $email = $net_rrhh->prepare($sql_user);
        $email->bindParam(':user_id', $user_id);
        $email->execute();
        $user_email = $email->fetch(PDO::FETCH_ASSOC);
        
        // CONSULTA DEL PUESTO
        $sql_puesto = "SELECT p.position, w.id FROM employee as e 
                        INNER JOIN workarea_positions_assignment as wpa ON wpa.idemployee = e.id 
                        INNER JOIN workarea_positions as p ON p.id = wpa.idposition 
                        INNER join workarea as w ON w.id = p.idarea
                        WHERE e.id = :user_id AND wpa.enddate = '0000-00-00'";
        $stmt_puesto = $net_rrhh->prepare($sql_puesto);
        $stmt_puesto->bindParam(':user_id', $user_id);
        $stmt_puesto->execute();
        $puesto_data = $stmt_puesto->fetch(PDO::FETCH_ASSOC);
        $puesto = ($puesto_data['position'] != "") ? utf8_decode($puesto_data['position']) : 'Puesto no encontrado';
    
        if (isset($_FILES['signatureImage']) && $_FILES['signatureImage']['error'] === UPLOAD_ERR_OK) {
            $imgTmpName = $_FILES['signatureImage']['tmp_name'];
            $imgName = 'firma_' . uniqid() . '.png';
            $imgPath = '../img_firmas/' . $imgName;
    
            if (move_uploaded_file($imgTmpName, $imgPath)) {
                try {
                    // Inserción del memorándum en la base de datos
                    $sql = "INSERT INTO inventory_memos (usuario, asunto, descripcion, fecha_creacion, img) VALUES (:user, :asunto, :descripcion, :fecha_creacion, :img)";
                    $stmt = $net_rrhh->prepare($sql);
                    
                    $stmt->bindParam(':user', $user_id);
                    $stmt->bindParam(':asunto', $asunto);
                    $stmt->bindParam(':descripcion', $descripcion);
                    $stmt->bindParam(':fecha_creacion', $fecha_creacion);
                    $stmt->bindParam(':img', $imgName);
                    
                    // Ejecutar la consulta de inserción
                    $stmt->execute();
    
                    // Ahora obtenemos el ID generado
                    $memo_id = $net_rrhh->lastInsertId();
    
                    $i=0;
    
                    
                    foreach ($tipo as $value) {
                        //Insertar activo
                        $fixedasset = "N/A";
                        $status = "4";
        
                        $query = "SELECT * FROM `inventory_active` as a WHERE a.serial = '$serie[$i]'";
                        $activeVerification = $net_rrhh->prepare($query);
                        $activeVerification ->execute();

                        if ($activeVerification->rowCount() > 0) {
                            $dataAV = $activeVerification->fetch();
                            $idActive = $dataAV[0];

                        }else{
                            $query = "INSERT INTO inventory_active (id, fixedasset, type, brand, model, serial, status, dtc)
                                        VALUES (NULL, :n1, :n2, :n3, :n4, :n5, :n6, CURRENT_TIMESTAMP())";
                            $active = $net_rrhh->prepare($query);
                            $active->bindParam(':n1', $fixedasset);
                            $active->bindParam(':n2', $value);
                            $active->bindParam(':n3', $marca[$i]);
                            $active->bindParam(':n4', $modelo[$i]);
                            $active->bindParam(':n5', $serie[$i]);
                            $active->bindParam(':n6', $status);
                            $active->execute();
        
                            $idActive = $net_rrhh->lastInsertId();
                        }

                        $date = date('Y-m-d');
                        $state = "En Prestamo";
    
                        $query = "INSERT INTO inventory_assignation VALUES (NULL, :n1, :n2, :n3, NULL, :n4, :n5);";
                        $assignation = $net_rrhh->prepare($query);
                        $assignation->bindParam(":n1", $user_id);
                        $assignation->bindParam(":n2", $puesto_data['id']);
                        $assignation->bindParam(":n3", $date);
                        $assignation->bindParam(":n4", $state);
                        $assignation->bindParam(":n5", $idActive);
                        $assignation->execute();
    
                        $idAssignation = $net_rrhh->lastInsertId();
    
                        $query = "INSERT INTO inventory_memos_assignation VALUES (NULL, :n1, :n2);";
                        $relation = $net_rrhh->prepare($query);
                        $relation->bindParam(":n1", $memo_id);
                        $relation->bindParam(":n2", $idAssignation);
                        $relation->execute();

                        /*
                        $errorInfo = $relation->errorInfo();
                        if ($errorInfo[0] !== '00000') {
                            $mensaje .= "Error SQLSTATE: " . $errorInfo[0] . "\n";
                            $mensaje .= "Código de Error del Controlador: " . $errorInfo[1] . "\n";
                            $mensaje .= "Mensaje de Error: " . $errorInfo[2] . "\n";
                        } else {
                            $mensaje = "ok";
                        }
    
                        echo $mensaje;*/
                        $i++;
                    }
    
    
                    // Generar el PDF con el memo_id correcto y la firma
                    $file = generarPDF($user_name, $puesto, $asunto, $descripcion, $marca, $tipo, $modelo, $serie, $memo_id, $imgPath, $fecha_creacion, $net_rrhh);
                    enviarCorreoConMemorandum($file, $user_email['username'], $marca, $tipo, $modelo, $serie, $net_rrhh);
                    header("Location: /?view=inventory");

                } catch (PDOException $e) {
                    $_SESSION['error'] = "Error al guardar el memorándum: " . $e->getMessage();
                    header("Location: ../formulario.php"); // Vuelve al formulario con el error
                    exit();
                }
    
            } else {
                echo "Error al subir la firma.";
            }
        } else {
            echo "No se recibió una firma válida.";
        }

    }else{
        echo "Uno de los activos ya existe";
    }
}

function generarPDF($user_name, $puesto, $asunto, $descripcion, $marca, $tipo, $modelo, $serie, $memo_id, $imgPath, $fecha_creacion, $net_rrhh) {
    // Crear un nuevo PDF
    $pdf = new FPDF();
    $pdf->AddPage();
    
    // Agregar las imágenes al encabezado
    // Ruta de las imágenes que tú proporcionarás
    $imageLeft = '../recursos_inventory/Logo Fusalmo 2.png'; // Cambia a la ruta correcta
    $imageRight = '../recursos_inventory/PROPUESTA DE VALOR.png'; // Cambia a la ruta correcta
    
    // Colocar la primera imagen (izquierda)
    $pdf->Image($imageLeft, 10, 10, 50); // Ajusta la posición y el tamaño

    // Colocar la segunda imagen (derecha)
    $pdf->Image($imageRight, 150, 10, 50); // Ajusta la posición y el tamaño

    // Mover el cursor hacia abajo para comenzar el contenido del documento
    $pdf->Ln(30); // Ajusta este valor según el tamaño de las imágenes


    // Configuración general de la fuente
    $pdf->SetFont('Arial', 'B', 9);
    
    // Título "Para:"
    $pdf->Cell(25, 6, 'PARA:', 0, 0, 'L'); // Ajustamos la altura de la celda para hacer más compacto el espacio vertical
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(0, 6, $user_name, 0, 1);  // Nombre en mayúsculas

    // Puesto del usuario (más pegado al nombre)
    $pdf->SetFont('Arial', '', 9);
    $pdf->Cell(25, 5, '', 0, 0, 'L'); // Esto crea un margen a la izquierda para que el texto no quede pegado al borde
    $pdf->Cell(0, 5, strtoupper(utf8_decode($puesto)), 0, 1); // Colocar el puesto justo debajo del nombre

    // Imagen de la firma a la par del nombre
    if (file_exists($imgPath)) {
        $pdf->Image($imgPath, 120, 35, 30, 10); // Ajusta la posición y tamaño según tus necesidades
    }

   

    // Título "VoBo:" y el nombre de Roberto
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(25, 10, 'VoBo:', 0, 0, 'L'); // Alineado con el margen izquierdo
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->MultiCell(0, 6, utf8_decode('José Roberto Ochoa Medrano'), 0, 'L');
    $pdf->SetFont('Arial', '', 9); // Nombre de Roberto
    $pdf->Cell(25, 5, '', 0, 0, 'L'); // Crea el margen izquierdo para el puesto
    $pdf->MultiCell(0, 5, strtoupper('Programador1'), 0, 'L'); // Puesto de Roberto

    $pdf->Image('../img_firmas/FIRMA_ROBERTO.png', 150, 65, 50, 10);//Firma Roberto

    // Asunto en azul y subrayado
    $pdf->Ln(5);  // Espacio adicional
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(25, 10, 'ASUNTO:', 0, 0, 'L');
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->SetTextColor(0, 0, 255);  // Azul
    $pdf->Cell(0, 10, utf8_decode($asunto), 0, 1);
    $pdf->SetTextColor(0, 0, 0);  // Volver al color negro

    // Fecha
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(25, 10, 'FECHA:', 0, 0, 'L');
    $pdf->SetFont('Arial', '', 11);
    $pdf->Cell(0, 10, strtoupper(utf8_decode($fecha_creacion)), 0, 1);

    // Línea divisoria
    $pdf->Ln(5);
    $pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());
    $pdf->Ln(5);

    // Descripción agregada
    $pdf->SetFont('Arial', '', 12);
    $pdf->MultiCell(0, 5, utf8_decode($descripcion), 0, 'L');

    // Tabla
    $pdf->Ln(5);
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->SetFillColor(0, 0, 0);  // Fondo negro
    $pdf->SetTextColor(255, 255, 255);  // Texto blanco

    // Cabecera de la tabla
    $pdf->Cell(40, 10, 'MARCA', 1, 0, 'C', true);
    $pdf->Cell(40, 10, 'TIPO DE EQUIPO', 1, 0, 'C', true);
    $pdf->Cell(40, 10, 'MODELO', 1, 0, 'C', true);
    $pdf->Cell(60, 10, utf8_decode('NÚMERO DE SERIAL'), 1, 1, 'C', true);

    // Relleno de la tabla con los datos (consulta de nombres)
    $pdf->SetFont('Arial', '', 9);
    $pdf->SetFillColor(169, 169, 169);  // Fondo gris claro
    $pdf->SetTextColor(0, 0, 0);  // Texto negro
    for ($i = 0; $i < count($marca); $i++) {
        $nombre_marca = obtenerNombreCatalogo($marca[$i], $net_rrhh);
        $nombre_tipo = obtenerNombreCatalogo($tipo[$i], $net_rrhh);

        $pdf->Cell(40, 10, strtoupper($nombre_marca), 1, 0, 'C');
        $pdf->Cell(40, 10, strtoupper($nombre_tipo), 1, 0, 'C');
        $pdf->Cell(40, 10, strtoupper($modelo[$i]), 1, 0, 'C');
        $pdf->Cell(60, 10, strtoupper($serie[$i]), 1, 1, 'C');
    }

    $pdf->Ln();
    // Guardar el PDF en el servidor
    $filePath = '../memorandums/memorandum_' . $memo_id . '.pdf';
    $pdf->Output('F', $filePath);

    // // Redirigir para descargar el PDF
    // header('Content-Type: application/pdf');
    // header('Content-Disposition: attachment; filename="memorandum_' . $memo_id .   '.pdf"');
    // header('Content-Length: ' . filesize($filePath));

    // // Leer el archivo y enviarlo al navegador
    // readfile($filePath);

    // Terminar el script después de enviar el archivo
    return $filePath;
}

// Función para enviar el correo
 function enviarCorreoConMemorandum($file, $user_email, $marca, $tipo, $modelo, $serie, $net_rrhh) {
    
    $i = 0;
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
    $mail->addAddress($user_email);
    $mail->addAddress('roberto.ochoa@fusalmo.org');
    $mail->addAddress('andres.velasquez@fusalmo.org');
    //$mail->addAddress('hilda_alvarado@fusalmo.org');

    $mail->Subject = utf8_decode("Asignación de equipos tecnológicos");

    $body = utf8_decode("<h1>Asignación de equipos tecnológicos</h1>
     
    <p>
        <b>Estimada/o:</b> <br/>
        Por este medio le hacemos llegar el memorandum de entrega del equipo tecnológico con los siguientes detalles:
    </p>            

    <br/>
    
    <table style='border: 1px solid black; width: 70%; border-collapse: collapse;'>
        <thead>
            <tr>
                <th style='border: 1px solid black; padding: 10px; width: 35%; font-size: 1.1rem;'>Marca</th>
                <th style='border: 1px solid black; padding: 10px; width: 35%; font-size: 1.1rem;'>Tipo</th>
                <th style='border: 1px solid black; padding: 10px; width: 35%; font-size: 1.1rem;'>Modelo</th>
                <th style='border: 1px solid black; padding: 10px; width: 35%; font-size: 1.1rem;'>Serial</th>
            </tr>
        </thead>
        <tbody>");
        foreach ($marca as  $value) {
            $nombre_marca = obtenerNombreCatalogo($value, $net_rrhh);
            $nombre_tipo = obtenerNombreCatalogo($tipo[$i], $net_rrhh);
            $body .= "
                <tr>
                    <td style='border: 1px solid black; padding: 10px; font-size: 1.1rem;'>$nombre_marca </td>
                    <td style='border: 1px solid black; padding: 10px; font-size: 1.1rem;'>$nombre_tipo</td>
                    <td style='border: 1px solid black; padding: 10px; font-size: 1.1rem;'>$modelo[$i]</td>
                    <td style='border: 1px solid black; padding: 10px; font-size: 1.1rem;'>$serie[$i]</td>
                </tr>
                ";
                $i++;
        }
        $body .= utf8_decode("</tbody>
    </table>

    <br/>

    ");

    $mail->Body = $body;
    $mail->addAttachment($file);

    // Envío del correo electrónico

    if (!$mail->send()) {
        echo 'Ha ocurrido un error al enviar el correo: ' . $mail->ErrorInfo;
    
    }

}

