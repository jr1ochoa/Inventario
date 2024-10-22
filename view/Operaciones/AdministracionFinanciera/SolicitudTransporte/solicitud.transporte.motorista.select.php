<?php 

include("../../../../config/net.php");

// Verificar que idClasificacion esté presente en la solicitud
if (isset($_REQUEST['idClasificacion'])) {
    $valorClasificacion = $_REQUEST['idClasificacion'];
  //  echo $valorClasificacion;
    if($valorClasificacion == "FUSALMO")
    {
        // Preparar la consulta SQL
        $query = "SELECT s1.*, s2.name1,s2.name2, s2.name3, s2.lastname1,s2.lastname2 FROM `admin_finanzas_lista_motorista` as s1 inner join employee as s2 on s1.id_empleado = s2.id  where s1.estado = 1 order by id desc";
        $data3 = $net_rrhh->prepare($query);

        // Ejecutar la consulta con el valor proporcionado
        $data3->execute([$valorClasificacion]);

        // Verificar si se encontraron resultados
        if ($data3->rowCount() > 0) {
            // Iterar sobre los resultados y generar opciones <option>
            while ($data = $data3->fetch()) {
                // Escapar correctamente los valores para evitar problemas de XSS
                echo "<option value=\"" . htmlspecialchars($data[0]) . "\">" . 
                    htmlspecialchars($data[10]) . " " . 
                    htmlspecialchars($data[11]) . " " . 
                    htmlspecialchars($data[12]) . " " . 
                    htmlspecialchars($data[13]) . " " .  
                    "</option>";
            }
        } else {
            // Opcional: manejar el caso en que no se encuentran resultados
            echo "<option value='0'>Externo</option>";
            echo "<option value=\"\">No se encontraron resultados</option>";
        }

    }
    else
    {
        // Preparar la consulta SQL
        $query = "SELECT * FROM `admin_finanzas_lista_motorista`  where estado = 1 and motorista_interno = 'No' order by id desc";
        $data3 = $net_rrhh->prepare($query);

        // Ejecutar la consulta con el valor proporcionado
        $data3->execute([$valorClasificacion]);

        // Verificar si se encontraron resultados
        if ($data3->rowCount() > 0) {
            // Iterar sobre los resultados y generar opciones <option>
            while ($data = $data3->fetch()) {
                // Escapar correctamente los valores para evitar problemas de XSS
                echo "<option value=\"" . htmlspecialchars($data[0]) . "\">" . 
                    htmlspecialchars($data[2]) . ", Empresa:  " . 
                    htmlspecialchars($data[3]) . " " .  
                    "</option>";
            }
        } else {
            // Opcional: manejar el caso en que no se encuentran resultados
            echo "<option value='0'>Externo</option>";
            //echo "<option value=\"\">No se encontraron resultados</option>";
        }
    }

} else {
    // Opcional: manejar el caso en que idClasificacion no esté presente en la solicitud
    echo "<option value=\"\">ID de clasificación no proporcionado</option>";
}

?>
