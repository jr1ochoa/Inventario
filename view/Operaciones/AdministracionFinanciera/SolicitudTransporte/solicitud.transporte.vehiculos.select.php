<?php 

include("../../../../config/net.php");

// Verificar que idClasificacion esté presente en la solicitud
if (isset($_REQUEST['idClasificacion'])) {
    $valorClasificacion = $_REQUEST['idClasificacion'];
    
    // Preparar la consulta SQL
    $query = "SELECT * FROM admin_finanzas_informacion_vehiculo WHERE clasificacion_vehicular = ? and estado = 1";
    $data3 = $net_rrhh->prepare($query);

    // Ejecutar la consulta con el valor proporcionado
    $data3->execute([$valorClasificacion]);

    // Verificar si se encontraron resultados
    if ($data3->rowCount() > 0) {
        // Iterar sobre los resultados y generar opciones <option>
        echo "<option>SELECCIONAR</option>";
        echo "<option value='0'>CONTRATACIÓN UBER</option>";
        while ($data = $data3->fetch()) {
            // Escapar correctamente los valores para evitar problemas de XSS
            echo "<option value=\"" . htmlspecialchars($data[0]) . "\">" . 
                 htmlspecialchars($data[1]) . " " . 
                 htmlspecialchars($data[2]) . " " . 
                 htmlspecialchars($data[4]) . " " . 
                 htmlspecialchars($data[3]) . " " .  
                 "</option>";
        }
    } else {
        // Opcional: manejar el caso en que no se encuentran resultados
        echo "<option value='0'>CONTRATACIÓN UBER</option>";
        echo "<option value=\"\">No se encontraron resultados</option>";
    }
} else {
    // Opcional: manejar el caso en que idClasificacion no esté presente en la solicitud
    echo "<option value=\"\">ID de clasificación no proporcionado</option>";
}

?>
