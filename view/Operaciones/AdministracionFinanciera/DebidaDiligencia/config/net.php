<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Iniciar la sesión si aún no ha sido iniciada
}

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

function redireccion($url)
{
    header("Location: $url");
    exit();
    //echo "<script>window.location='$url';</script>";
}

function showerrors($action)
{
    foreach ($action->errorInfo() as $error)
            echo "<br/>$error ";
}

function verificarerrores($query){
    $mensaje = "";

    $errorInfo = $query->errorInfo();
    if ($errorInfo[0] !== '00000') {
        $mensaje .= "Error SQLSTATE: " . $errorInfo[0] . "\n";
        $mensaje .= "Código de Error del Controlador: " . $errorInfo[1] . "\n";
        $mensaje .= "Mensaje de Error: " . $errorInfo[2] . "\n";
    } else {
        $mensaje = "ok";
    }
    
    return $mensaje;
}

?>