<?php 
$db = "fusalmo_v1";
$dbUser = "fusalmo_wp";
$dbPass = "sV3jGr3lVbTl";
$root = "https://fusalmo.org/";

try 
{
    $net_fusalmos = new PDO("mysql:host=localhost;dbname=$db", $dbUser, $dbPass);
    $net_fusalmos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verifica si la conexión se realizó correctamente
    if ($net_fusalmos) {
       //echo "Conexión exitosa a la base de datos.";
    }
} 
catch (PDOException $e) 
{
    print "Error!: " . $e->getMessage() . "<br/>";
    $net_fusalmos = null;
    die("La conexión a la base de datos falló.");
}

//$idEmpleado =  $_SESSION['iu'];
if($action == "updateDenuncia")
{
    /*
    idCaso: $("#idCaso").val(),
    idDetalleResolucion: $("#idDetalleResolucion").val()
    */
    $query4 = "UPDATE  fus_denuncia SET resolucion_caso = ?, estado = 2   WHERE id = ?";
    $data4 = $net_fusalmos->prepare($query4);
    $data4->execute([$_POST['idDetalleResolucion'],$_POST['idCaso']]);

    foreach ($data4->errorInfo() as $error) {
        $errorList .= "$error <br/>"; 
    }


        //echo "Id Sesion".$idEmpleado;
        echo $errorList;
     
}
else if($action == "updateQueja")
{
    /*
    idCasoQueja: $("#idCasoQueja").val(),
    idDetalleResolucionQueja: $("#idDetalleResolucionQueja").val()
    */
    $query4 = "UPDATE  fus_queja SET resolucion_caso = ?, estado = 2   WHERE id = ?";
    $data4 = $net_fusalmos->prepare($query4);
    $data4->execute([$_POST['idDetalleResolucionQueja'],$_POST['idCasoQueja']]);

    foreach ($data4->errorInfo() as $error) {
        $errorList .= "$error <br/>"; 
    }
        //echo "Id Sesion".$idEmpleado;
        echo $errorList;
     
}
?>