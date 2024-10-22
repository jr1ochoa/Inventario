<?php
include("../../../../config/net.php");

if (isset($_POST["export_data"])) {
    // Recoge la fecha enviada desde el formulario
    $fechaActual = htmlspecialchars($_POST['fechaActual']);

    // Verifica que la fecha no esté vacía y tenga un formato válido
    if (empty($fechaActual) || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $fechaActual)) {
        echo "Fecha no válida. No se puede exportar los datos.";
        exit;
    }

    // Query para obtener los datos basados en la fecha proporcionada
    $query = "SELECT s1.*, s2.area 
              FROM admin_finanzas_formulario AS s1 
              INNER JOIN workarea AS s2 ON s1.id_area_solicitante = s2.id  
              WHERE (s1.estado = 1 OR s1.estado = 3) 
              AND s1.fh_salida = ? 
              ORDER BY s1.id DESC";

    try {
        // Prepara y ejecuta la consulta
        $data3 = $net_rrhh->prepare($query);
        $data3->execute([$fechaActual]);

        // Recoge los datos en un array
        $libros = [];
        while ($data = $data3->fetch(PDO::FETCH_ASSOC)) {
            $libros[] = $data;
        }

        // Si hay datos, procede a la exportación
        if (!empty($libros)) {
            // Nombre del archivo dinámico
            $filename = "libros_" . date('Y-m-d_H-i-s') . ".xls";

            // Evita cualquier salida antes de los encabezados
            ob_clean();
            flush();

            // Configura los encabezados para la descarga
            header("Content-Type: application/vnd.ms-excel");
            header("Content-Disposition: attachment; filename=" . $filename);
            header("Cache-Control: max-age=0");
            header("Expires: 0");
            header("Pragma: public");

            // Inicia la salida del archivo
            $output = fopen("php://output", "w");

            // Imprime las columnas
            $mostrar_columnas = false;
            foreach ($libros as $libro) {
                if (!$mostrar_columnas) {
                    fputcsv($output, array_keys($libro), "\t");
                    $mostrar_columnas = true;
                }
                fputcsv($output, array_values($libro), "\t");
            }

            fclose($output);
        } else {
            echo 'No hay datos a exportar';
        }
    } catch (PDOException $e) {
        echo "Error al realizar la consulta: " . $e->getMessage();
    }
    exit;
} else {
    echo "Acceso no permitido. No se puede exportar los datos.";
    exit;
}
?>
