<?php 
 include("../../config/net.php");


 //Cargar datos del empleado
$iu = isset($_GET['iu']) ? $_GET['iu'] : $_SESSION['iu'];
?>

<div class="position-relative overflow-hidden p-3 p-md-2 m-md-3 text-center bg-light">
<button id="btnRegresarSolicitud" type="button" class="btn btn btn-light btn-sm position-absolute" style="left: 0; color:blue; border-bottom: 2px solid #000;">Regresar</button>
    <div class="col-md-12 p-lg-2 mx-auto my-1">
      <h1 class="display-4 fw-normal">Bienvenido a  las votaciones de comite</h1>
      <p class="lead fw-normal">V 1.0.0 </p>
     
    </div>
    <div class="product-device shadow-sm d-none d-md-block mb-2">
    <!--<button type="button" id="creacionRegistroSolicitud" class="btn btn-sm" style="background-color: #1A4262;color:white;" > Nueva Solicitud</button> 
-->

</div>
    
  </div>


<div class="container">
<label style=" border-radius: 12px;">SELECCIONAR COMITE</label>
<select id="selectComite" class="form-select form-select-sm" aria-label=".form-select-sm example">
<option selected>SELECCIONAR COMITE</option>
    <?php

$query = "SELECT * FROM `votaciones_comites` where estado = 1 ";
 $data3 = $net_rrhh->prepare($query);
 $data3->execute();
  while ($data = $data3->fetch()) 
  {
     echo ' <option value="'.$data[0].'">'.  strtoupper($data[1]).'</option>';
  }
    ?>
</select>
</div>

<div id="btnCandidatos"></div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Después, incluye el CSS y JS de jQuery Toast Plugin -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>


<script>
    $("#btnRegresarSolicitud").click(function(){
    window.location.href='?view=main';  
})
$('#selectComite').change(function(){
        // Obtener el nuevo valor de fecha
        var nuevaFecha = $(this).val();
        
        // Cargar la tabla de solicitud con la nueva fecha
        $("#btnCandidatos").load("view/votaciones/lista.candidatos.php", { idComite: nuevaFecha });
    });

     $(document).ready(function() {
    // Obtener el valor seleccionado inicialmente
    var selectedValue = $('#selectComite').val();
    
    // Cargar la tabla de solicitud con el valor inicial
    $("#btnCandidatos").load("view/votaciones/lista.candidatos.php", { idComite: selectedValue });

    // Manejar el cambio del select
    $('#selectComite').change(function(){
        // Obtener el nuevo valor de fecha
        var nuevaFecha = $(this).val();
        
        // Cargar la tabla de solicitud con la nueva fecha
        $("#btnCandidatos").load("view/votaciones/lista.candidatos.php", { idComite: nuevaFecha });
    });
});
</script>