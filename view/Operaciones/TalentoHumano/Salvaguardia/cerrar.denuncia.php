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
        <label for="exampleFormControlTextarea1" class="form-label">Detalle del riesgo</label>
        <textarea class="form-control" disabled id="exampleFormControlTextarea1" rows="3"><?=$detalle_riesgo?></textarea>
        </div>
  </div>
  <div class="col-md-6">
        <br/>
        <p>Agregar Resolución del caso para el registro en la base de datos</p>
        <br/>
        <br/>
       
        <input type="hidden" disabled class="form-control" id="idCaso" value="<?=$id?>">
        
        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Agregar Detalle de la resolución</label>
        <textarea class="form-control"  id="idDetalleResolucion" rows="7"></textarea>
        </div>

       

  </div>
</div>
<div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="cerrarBtnDenuncia" data-bs-dismiss="modal">Close</button>
        <button type="button" id="cerrarCasoDenunciaBtn" class="btn btn-primary">Cerrar Caso</button>
      </div>
<script>
    /*
     <input type="hidden" disabled class="form-control" id="idCaso" value="<?=$id?>">
        
        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Agregar Detalle de la resolución</label>
        <textarea class="form-control"  id="idDetalleResolucion" rows="7"></textarea>
        </div>
    */
$('#cerrarCasoDenunciaBtn').click(function(){
   // alert($("#idDetalleResolucion").val()) 
$.post("process/index.php", {
    process: "salvaguardia",
    action: "updateDenuncia",

    idCaso: $("#idCaso").val(),
    idDetalleResolucion: $("#idDetalleResolucion").val()

},
    function(response){
        if(response){
            $.toast({
                    heading: 'Finalizado',
                    text: "Caso Cerrado con exito",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: 3000, 
                    position: 'bottom-center'
                });
               $('#cerrarBtnDenuncia').click();
              // $("#tablasDenuncia").load("view/Operaciones/TalentoHumano/Salvaguardia/nuevas.denuncias.php");
              setTimeout(function() {
            location.reload(); // Recarga la página completa
        }, 3000); // Recargar después de 3 segundos

               //$("#tablaMotorista").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.tabla.motoristas.php");
               //$("#tablaProceso").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.tabla.publica.php");
            }
    }
);
});
</script>
