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
<div class="position-relative overflow-hidden p-3 p-md-2 m-md-3 text-center bg-light">
<button id="btnRegresarSolicitud" type="button" class="btn btn btn-light btn-sm position-absolute" style="left: 0; color:blue; border-bottom: 2px solid #000;">Regresar</button>
    <div class="col-md-12 p-lg-2 mx-auto my-1">
      <h1 class="display-4 fw-normal">Gestión Salvaguardia</h1>
      <p class="lead fw-normal mt-0 mb-0">V 1.0.0 </p>
     
    </div>
    <div class="product-device shadow-sm d-none d-md-block mb-2">
    <!--<button type="button" id="creacionRegistroSolicitud" class="btn btn-sm" style="background-color: #1A4262;color:white;" > Nueva Solicitud</button> 
-->
<!--    <button  style="background-color: #1A4262;color:white;" type="button" class="btn   mt-2   btn-sm text-left"    type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#exampleModal2">CREAR COMITÉ</button>
    <button style="background-color: #1A4262;color:white;" id="gestionarComites" type="button" class="btn   mt-2   btn-sm text-left"    type="button" class="btn btn-primary"  >GESTIONAR COMITÉ</button>
    <button style="background-color: #1A4262;color:white;" type="button" class="btn  mt-2 btn-sm text-left" type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#exampleModal3">AGREGAR CANDIDATO</button>
    
-->
</div>
    
  </div>


<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto">
<div class="container">
<div class="row">


<ul class="nav nav-tabs" id="myTab" role="tablist">
 
  

  <li class="nav-item" role="presentation">
  <?php 
  try {
      $query2222 = "SELECT * FROM fus_queja where estado = 1";
      $data333 = $net_fusalmos->prepare($query2222);
      $data333->execute();
      $count2 = $data333->rowCount();
  } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
      $count2 = 0; // En caso de error, definimos count como 0
  } 
  ?>
  <button style="color: #0D5DD3;" class="btn btn-ligth position-relative" id="vehiculo-tab" data-bs-toggle="tab" data-bs-target="#todasSolicitud" type="button" role="tab" aria-controls="todasSolicitud" aria-selected="false">
    Nuevas Quejas
    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
      <?php echo  $count2 ;?>
      <span class="visually-hidden">unread messages</span>
    </span>
  </button>


</li>



<li class="nav-item" role="presentation">
  <?php 
  try {
      $query = "SELECT * FROM fus_denuncia  where estado = 1";
      $data = $net_fusalmos->prepare($query);
      $data->execute();
      $count = $data->rowCount();
  } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
      $count = 0; // En caso de error, definimos count como 0
  }
  ?>
  
  <button style="color: #0D5DD3;" class="btn btn-ligth position-relative" id="nofinalizada-tab" data-bs-toggle="tab" data-bs-target="#nofinalizada" type="button" role="tab" aria-controls="nofinalizada" aria-selected="false">Nuevas Denuncias
    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
      <?php echo  $count ?>
      <span class="visually-hidden">unread messages</span>
    </span>
  </button>
</li>

<li class="nav-item" role="presentation">
    <button class="nav-link" id="enviadas-tab" data-bs-toggle="tab" data-bs-target="#enviadas" type="button" role="tab" aria-controls="home" aria-selected="false">Historico Denuncia</button>
  </li>

  <li class="nav-item" role="presentation">
    <button class="nav-link" id="enviadas2-tab" data-bs-toggle="tab" data-bs-target="#enviadas2" type="button" role="tab" aria-controls="home" aria-selected="false">Historico Quejas</button>
  </li>


</ul>

<div class="tab-content" id="myTabContent">


  



  <!--todasSolicitud-->
  <div class="tab-pane fade show active" id="todasSolicitud" role="todasSolicitud" aria-labelledby="todasSolicitud-tab">
    
  <div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="exampleFormControlTextarea1" class="p-0 mb-0 mt-2"><b>Nuevas Quejas </b> </label>
           
        </div>
    </div>
  </div>
    <div id="tablasQuejas"></div>
  </div>



<!--::::::: NO FINALIZADAS :::::: -->
  <div class="tab-pane fade" id="nofinalizada" role="nofinalizada" aria-labelledby="nofinalizada-tab">
    
    <div class="row">
      <div class="col-6">
          <div class="form-group">
              <label for="exampleFormControlTextarea1" class="p-0 mb-0 mt-2">SOLICITUDES SIN FINALIZAR:  </label>
             
          </div>
      </div>
    </div>
      <div id="tablasDenuncia"></div>
    </div>



  <div class="tab-pane fade" id="enviadas" role="tabpanel" aria-labelledby="enviadas-tab">

<div id="tablasHistorialDenuncia"></div>


  </div>

  <div class="tab-pane fade" id="enviadas2" role="tabpanel" aria-labelledby="enviadas2-tab">

<div id="tablasHistorialQuejas"></div>


  </div>



  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
  <div class="tab-pane fade" id="motorista" role="tabpanel" aria-labelledby="motorista-tab">

    <!--:::::::::::::::: ESPACIO DE MOTORISTAS REGISTRADOS ::::::::::::::-->
        <div id="tablaMotorista"></div>
    <!--:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
  </div>
  <div class="tab-pane fade" id="vehiculo" role="tabpanel" aria-labelledby="vehiculo-tab">
        <!--::::::::::::::::::::: ESPACIO PARA TABLA Vehiculo ::::::::::::::::::-->
            <div id="tablaVehiculo"></div>
        <!--:::::::::::::::::::::: FIN DE ESPACIO TABLA MOTORISTAS :::::::::::::: -->

  </div>
</div>


</div>
</div>




<!-- Incluye jQuery primero -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
 
 <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 
 <!-- Después, incluye el CSS y JS de jQuery Toast Plugin -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
 


 
<script>
 $(document).ready(function(){
     
  // Cargar la tabla de solicitud con el valor inicial
  $("#tablasQuejas").load("view/Operaciones/TalentoHumano/Salvaguardia/nuevas.quejas.php");
  $("#tablasDenuncia").load("view/Operaciones/TalentoHumano/Salvaguardia/nuevas.denuncias.php");
  $("#tablasHistorialDenuncia").load("view/Operaciones/TalentoHumano/Salvaguardia/tabla.historial.php");
  $("#tablasHistorialQuejas").load("view/Operaciones/TalentoHumano/Salvaguardia/tabla.historial.quejas.php");
 



     $('.js-example-basic-single').select2({
         dropdownParent:$('#exampleModal3')
     })
 })
 //

 $("#btnRegresarSolicitud").click(function(){
    window.location.href='?view=main';  
})

$("#gestionarComites").click(function(){
    window.location.href='?view=gestionarComites';  
})
 //::::::::::::::::::::::::: AGREGAR CANDIDATO ::::::::::::::::::::::::::::::::::::::::::::::::::::
 $("#btnGuardarCandidato").click(function() {
            //document.getElementById("botonCargando").style.display="";
             $.post("process/index.php", {
                 process: "votacion",
                 action: "addcandidato",  
 
 
                 idCandidato: $("#id_label_single").val(), 
                 idComite: $("#idComite").val(),
             },
             function(response){
                //alert(response);
                 if(response ==1)
                 {
                     //document.getElementById("cancelarComite").click();
                     //document.getElementById("botonCargando").style.display="none";
                     $.toast({
                         heading: 'Finalizado',
                         text: 'Candidato Agregado Correctamente',
                         showHideTransition: 'slide',
                         icon: 'success',
                         hideAfter: 2000, 
                         position: 'top-center'
                     });
                     $('#btnCrrarmodalcandi').click();
               setTimeout(function() {
    location.reload(); // Refresca la página
}, 4000);
                 }
                 else if (response == 2)
                 {
                     //document.getElementById("botonCargando").style.display="none";
                     $.toast({
                         heading: 'ERROR',
                         text: 'El candidato ya existe',
                         showHideTransition: 'slide',
                         icon: 'error',
                         hideAfter: 4000, 
                         position: 'top-center'
                     });
                     //document.getElementById("btnCrrarmodalcandi").click();
                 }
                 
             });
             
         });
 //::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
 
     $("#btnRegistrarComite").click(function() {
            //document.getElementById("botonCargando").style.display="";
             $.post("process/index.php", {
                 process: "votacion",
                 action: "addcomite",
 
 
                 nombreComite: $("#nombreComite").val(), 
                 descripcionComite: $("#descripcionComite").val(), 
             },
             function(response){
                 
                     //document.getElementById("cancelarComite").click();
                     //document.getElementById("botonCargando").style.display="none";
                 $.toast({
                     heading: 'Finalizado',
                     text: 'Comite Creado Correctamente',
                     showHideTransition: 'slide',
                     icon: 'success',
                     hideAfter: 2000, 
                     position: 'top-center'
                 });
                     //$("#IdProyecto").load("view/Monitoreo/get_options.php");
                     document.getElementById("cancelarComite").click();

                     setTimeout(function() {
    location.reload(); // Refresca la página
}, 3000); 
                 
                 
             });
         });

$('#selectComite').change(function(){
        // Obtener el nuevo valor de fecha
        var nuevaFecha = $(this).val();
        
        // Cargar la tabla de solicitud con la nueva fecha
        $("#cuerpoVotaciones").load("view/Operaciones/TalentoHumano/Votaciones/votaciones.body.php", { idComite: nuevaFecha });
    });

    $(document).ready(function() {
    // Obtener el valor seleccionado inicialmente
    var selectedValue = $('#selectComite').val();
    
    // Cargar la tabla de solicitud con el valor inicial
    $("#cuerpoVotaciones").load("view/Operaciones/TalentoHumano/Votaciones/votaciones.body.php", { idComite: selectedValue });

    // Manejar el cambio del select
    $('#selectComite').change(function(){
        // Obtener el nuevo valor de fecha
        var nuevaFecha = $(this).val();
        
        // Cargar la tabla de solicitud con la nueva fecha
        $("#cuerpoVotaciones").load("view/Operaciones/TalentoHumano/Votaciones/votaciones.body.php", { idComite: nuevaFecha });
    });
});

</script>



