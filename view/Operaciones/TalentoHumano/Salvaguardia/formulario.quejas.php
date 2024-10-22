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

 //Cargar datos del empleado
$iu = isset($_GET['iu']) ? $_GET['iu'] : $_SESSION['iu'];
?>



<?php
$id = $_REQUEST['idModal'];
$query = "SELECT * FROM `fus_queja` where id=?  ";
 $data3 = $net_fusalmos->prepare($query);
 $data3->execute([$id]);
 $sumador = 1;
 $sede = "";
 $descripcion_queja = "";
 $lugar_queja = "";
 $fh_observacion = "";
 $num_contacto = "";
 $email_contacto = "";
 $estado_contacto = "";
  while ($data = $data3->fetch()) 
  {
    
    $sede =  $data[1];
    $descripcion_queja = $data[2];
    $lugar_queja = $data[3];
    $fh_observacion = $data[4];
    $estado_contacto = $data[5];
    $num_contacto = $data[6];
    $email_contacto = $data[7];
  }
    ?>

<div class="row">
  <div class="col-md-6">
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Sede</label>
        <input type="email" disabled class="form-control" id="exampleFormControlInput1" value="<?=$sede?>">
        </div>

        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
        <textarea class="form-control" disabled id="exampleFormControlTextarea1" rows="3"><?=$descripcion_queja?></textarea>
        </div>

        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Lugar de Queja</label>
        <textarea class="form-control" disabled id="exampleFormControlTextarea1" rows="3"><?=$lugar_queja?></textarea>
        </div>

        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Fecha de Observación</label>
        <textarea class="form-control" disabled id="exampleFormControlTextarea1" rows="3"><?=$fh_observacion?></textarea>
        </div>
  </div>
  <div class="col-md-6">

        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">¿Deseas ser contactemos?</label>
        <textarea class="form-control" disabled id="exampleFormControlTextarea1" rows="3"><?=$estado_contacto?></textarea>
        </div>

        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Número de Contacto</label>
        <textarea class="form-control" disabled id="exampleFormControlTextarea1" rows="3"><?=$num_contacto?></textarea>
        </div>

        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Correo de Contacto</label>
        <textarea class="form-control" disabled id="exampleFormControlTextarea1" rows="3"><?=$email_contacto?></textarea>
        </div>
  </div>
</div>


