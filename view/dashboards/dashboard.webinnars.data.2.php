<?php
$db = "fusalmo_v1";
$dbUser = "fusalmo_wp";
$dbPass = "sV3jGr3lVbTl";
$root = "https://fusalmo.org/";

try 
    {
        $net = new PDO("mysql:host=localhost;dbname=$db", $dbUser, $dbPass);
    } 
    catch (PDOException $e) 
    {
        print "Error!: " . $e->getMessage() . "<br/>";    
        $net = null;
        die();
    }
   

    
try {
    $query = "SELECT 
    r.*,
    CONVERT(r.nombreCompleto USING utf8) AS nombre_convertido
FROM 
    wp_register_jovenessipluss r
INNER JOIN (
    SELECT MAX(id) as max_id
    FROM wp_register_jovenessipluss
    WHERE !(nombreCompleto LIKE '%PRUEBA%' OR nombreCompleto IS NULL OR nombreCompleto = '' OR nombreCompleto LIKE '%www%')
    GROUP BY correoElectronico
) AS max_results ON r.id = max_results.max_id
WHERE 
    !(r.nombreCompleto LIKE '%PRUEBA%' OR r.nombreCompleto IS NULL OR r.nombreCompleto = '' OR r.nombreCompleto LIKE '%www%')
ORDER BY 
    r.id DESC;";
    $usuarios = $net->prepare($query);
    $usuarios->execute();
    
 
    $results = [];
    while ($usuario = $usuarios->fetch(PDO::FETCH_ASSOC)) {
        $results[] = $usuario;
    }
 
    // Convertir los resultados a JSON
    $json_data = json_encode($results, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
 
    // Establecer la cabecera para la descarga del archivo JSON
    header('Content-Type: application/json; charset=utf-8');
    header('Content-Disposition: attachment; filename="usuarios.json"');
    header('Content-Length: ' . strlen($json_data));
 
    // Mostrar los datos JSON
    echo $json_data;
 
} catch (PDOException $e) {
    // Manejo de errores
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['error' => $e->getMessage()]);
}

?>