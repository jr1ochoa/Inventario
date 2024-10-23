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
    $query = "SELECT * FROM `fus_reservacion` WHERE estado <= 3";
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