<?php
include('../../config/net.php'); // Asegúrate de incluir la conexión a la base de datos

// Verificar si se ha recibido el ID del memorándum por GET
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $memo_id = $_GET['id'];

    // Consulta SQL para obtener los datos del memorándum, incluyendo la ruta de la imagen de la firma
    $sql = "SELECT memos.id, memos.asunto, memos.fecha_creacion, memos.descripcion, memos.img, emp.name1, emp.lastname1, emp.name2, emp.lastname2
            FROM inventory_memos AS memos
            INNER JOIN employee AS emp ON memos.usuario = emp.id
            WHERE memos.id = :memo_id";
    $stmt = $net_rrhh->prepare($sql);
    $stmt->bindParam(':memo_id', $memo_id, PDO::PARAM_INT);
    $stmt->execute();
    
    // Obtener los resultados
    $memo = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar si el memorándum existe
    if ($memo) {
        $nombre_completo = $memo['name1'] . ' ' . $memo['name2'] . ' ' . $memo['lastname1'] . ' ' . $memo['lastname2'];
        $firma_path = '../inventory/img_firmas/' . $memo['img']; // Ruta de la firma guardada
    } else {
        echo "Memorándum no encontrado.";
        exit;
    }
} else {
    echo "ID de memorándum no válido.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Memorándum</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
        }
        .memo-container {
            margin-top: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #007bff;
        }
        .signature {
            margin-top: 20px;
            text-align: center;
        }
        .signature img {
            width: 200px; /* Ajusta el tamaño de la imagen de la firma */
        }
    </style>
</head>
<body>

<div class="container">
    <div class="memo-container">
        <h2>Memorándum ID: <?php echo $memo_id; ?></h2>
        <p><strong>Asunto:</strong> <?php echo $memo['asunto']; ?></p>
        <p><strong>Fecha de Creación:</strong> <?php echo $memo['fecha_creacion']; ?></p>
        <p><strong>Usuario:</strong> <?php echo $nombre_completo; ?></p>
        <p><strong>Descripción:</strong></p>
        <p><?php echo nl2br($memo['descripcion']); ?></p>

        <!-- Mostrar la firma -->
        <div class="signature">
            <?php if (file_exists($firma_path)) : ?>
                <p><strong>Firma del Usuario:</strong></p>
                <img src="<?php echo $firma_path; ?>" alt="Firma del Usuario">
                <p><p><?php echo $firma_path; ?></p></p>
            <?php else : ?>
                <p><strong>Firma no disponible.</strong></p>
                <p><?php echo $firma_path; ?></p>
            <?php endif; ?>
        </div>

        <a href="javascript:history.back()" class="btn btn-primary">Volver</a>
    </div>
</div>

</body>
</html>
