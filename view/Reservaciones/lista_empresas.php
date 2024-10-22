<?php
include("../../config/net.php");

// Definir el número de resultados por página
$resultsPerPage = 100; // Cambiamos el número de elementos por columna a 10

// Obtener el número de página actual
$page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
$offset = ($page - 1) * $resultsPerPage;

// Obtener el total de registros para paginación
$totalQuery = "SELECT COUNT(*) FROM `fus_reservacion`";
$totalResult = $net_rrhh->prepare($totalQuery);
$totalResult->execute();
$totalRecords = $totalResult->fetchColumn();
$totalPages = ceil($totalRecords / $resultsPerPage);

// Consulta SQL con LIMIT y OFFSET
$query2 = "SELECT * FROM `fus_reservacion` LIMIT :offset, :limit";
$spaces = $net_rrhh->prepare($query2);
$spaces->bindValue(':offset', $offset, PDO::PARAM_INT);
$spaces->bindValue(':limit', $resultsPerPage, PDO::PARAM_INT);
$spaces->execute();

function generatePastelColor() {
    $r = mt_rand(100, 200); // Ajustar los rangos según tus necesidades
    $g = mt_rand(50, 150);
    $b = mt_rand(100, 200);
    return sprintf('#%02X%02X%02X', $r, $g, $b);
}

$data = '<div class="row">';
$counter = 0;

while ($row = $spaces->fetch()) {
    $randomColor = generatePastelColor();
    
    // Si es el primer elemento de una nueva columna, añadimos una nueva columna
    if ($counter % 10 == 0) {
        $data .= '<div class="col-md-4">';
    }

    $data .= '
    <div class="d-flex text-muted pt-3">
        <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
</svg>
            
        </svg>
        <p class="pb-3 mb-0 small lh-sm border-bottom">
            <strong class="d-block text-gray-dark">' . htmlspecialchars($row["nombre_institucion"]) . '</strong>
            MESA REGISTRADA : ' . htmlspecialchars($row["mesa_seleccionada"]) . '
        </p>
    </div>';

    $counter++;
    
    // Si alcanzamos el décimo elemento, cerramos la columna
    if ($counter % 10 == 0) {
        $data .= '</div>'; // Cierra la columna actual
    }
}

// Si el contador no es múltiplo de 10, cerramos la última columna
if ($counter % 10 != 0) {
    $data .= '</div>'; // Cierra la última columna
}

$data .= '</div>'; // Cierra la fila

// Devolver datos JSON
echo json_encode(['data' => $data, 'totalPages' => $totalPages, 'currentPage' => $page]);
?>
