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
$query = "SELECT * FROM `fus_denuncia` where id=?  ";
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
    
    $nombre_afectado =  $data[1];
    $pro_proy_perteneciente = $data[2];
    $sede = $data[3];
    $nombre_perpretador = $data[4];
    $persona_interna = $data[5];
    $perpetuador_pertenece = $data[6];
    $fh_hechos = $data[7];
    $descripcion_hechos = $data[8];
    $estado_nino_situacion_riesgo = $data[9];
    $detalle_riesgo = $data[10];
    $nombre_persona_informante = $data[11];
    $estado_contacto = $data[12];
    $num_contacto = $data[13];
    $email_contacto = $data[14];
  }
    ?>

<div class="row">
  <div class="col-md-6">
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nombre del Afectado</label>
        <input type="email" disabled class="form-control" id="exampleFormControlInput1" value="<?=$nombre_afectado?>">
        </div>

        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Programa o proyecto en el que participa la niña, niño, adolescente, joven o persona adulta afectada</label>
        <textarea class="form-control" disabled id="exampleFormControlTextarea1" rows="3"><?=$pro_proy_perteneciente?></textarea>
        </div>

        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Sede</label>
        <textarea class="form-control" disabled id="exampleFormControlTextarea1" rows="3"><?=$sede?></textarea>
        </div>

        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Persona perpetradora(agresor/agresora):</label>
        <textarea class="form-control" disabled id="exampleFormControlTextarea1" rows="3"><?=$perpetuador_pertenece?></textarea>
        </div>

        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Identifica si la niña, niño, adolescente, joven o persona adulta afectada se encuentra en una situación de riesgo o vulnerabilidad:</label>
        <textarea class="form-control" disabled id="exampleFormControlTextarea1" rows="3"><?=$estado_nino_situacion_riesgo?></textarea>
        </div>

        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Detalle del riesgo</label>
        <textarea class="form-control" disabled id="exampleFormControlTextarea1" rows="3"><?=$detalle_riesgo?></textarea>
        </div>
  </div>
  <div class="col-md-6">

        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">La persona es interna o externa de FUSALMO?</label>
        <textarea class="form-control" disabled id="exampleFormControlTextarea1" rows="3"><?=$persona_interna?></textarea>
        </div>

        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Área a la que pertenece el perpetrador/ar</label>
        <textarea class="form-control" disabled id="exampleFormControlTextarea1" rows="3"><?=$perpetuador_pertenece?></textarea>
        </div>

        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Descripción de los hechos</label>
        <textarea class="form-control" disabled id="exampleFormControlTextarea1" rows="3"><?=$descripcion_hechos?></textarea>
        </div>

        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Persona quien informa</label>
        <textarea class="form-control" disabled id="exampleFormControlTextarea1" rows="3"><?=$nombre_persona_informante?></textarea>
        </div>

        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">¿Deseas le contactemos?</label>
        <textarea class="form-control" disabled id="exampleFormControlTextarea1" rows="3"><?=$estado_contacto?></textarea>
        </div>

        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Telefono de Contacto:</label>
        <textarea class="form-control" disabled id="exampleFormControlTextarea1" rows="3"><?=$num_contacto?></textarea>
        </div>

        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Correo de Contacto:</label>
        <textarea class="form-control" disabled id="exampleFormControlTextarea1" rows="3"><?=$email_contacto?></textarea>
        </div>
  </div>
</div>


