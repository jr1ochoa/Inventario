<?php
 
 $db = "transformaedu_db";
 $dbUser = "transformaedu_user";
 $dbPass = "Eh4bdmCqlfv4";
 $root = "https://fusalmo.org/";
$net = new PDO("mysql:host=localhost;dbname=$db", $dbUser, $dbPass);
 

try {
    $query = "SELECT * FROM `wp_fm_beneficiaries`";
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

