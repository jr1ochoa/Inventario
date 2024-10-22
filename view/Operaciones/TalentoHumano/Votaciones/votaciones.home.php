<?php 
 include("../../../../config/net.php");


 //Cargar datos del empleado
$iu = isset($_GET['iu']) ? $_GET['iu'] : $_SESSION['iu'];
?>
<div class="position-relative overflow-hidden p-3 p-md-2 m-md-3 text-center bg-light">
<button id="btnRegresarSolicitud" type="button" class="btn btn btn-light btn-sm position-absolute" style="left: 0; color:blue; border-bottom: 2px solid #000;">Regresar</button>
    <div class="col-md-12 p-lg-2 mx-auto my-1">
      <h1 class="display-4 fw-normal">Gestión de comites</h1>
      <p class="lead fw-normal">V 1.0.0 </p>
     
    </div>
    <div class="product-device shadow-sm d-none d-md-block mb-2">
    <!--<button type="button" id="creacionRegistroSolicitud" class="btn btn-sm" style="background-color: #1A4262;color:white;" > Nueva Solicitud</button> 
-->
    <button  style="background-color: #1A4262;color:white;" type="button" class="btn   mt-2   btn-sm text-left"    type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#exampleModal2">CREAR COMITÉ</button>
    <button style="background-color: #1A4262;color:white;" id="gestionarComites" type="button" class="btn   mt-2   btn-sm text-left"    type="button" class="btn btn-primary"  >GESTIONAR COMITÉ</button>
    <button style="background-color: #1A4262;color:white;" type="button" class="btn  mt-2 btn-sm text-left" type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#exampleModal3">AGREGAR CANDIDATO</button>
    

</div>
    
  </div>


<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto">
<div class="container">
<div class="row">
   <!-- <div class="col-md-2">
        <button type="button" class="btn btn-primary  mt-2   btn-sm text-left"    type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#exampleModal2">CREAR COMITÉ</button>
        <button id="gestionarComites" type="button" class="btn btn-primary  mt-2   btn-sm text-left"    type="button" class="btn btn-primary"  >GESTIONAR COMITÉ</button>
        <button type="button" class="btn btn-primary mt-2 btn-sm text-left" type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#exampleModal3">AGREGAR CANDIDATO</button>
    </div>-->
    <div class="col-md-12">
    <label style=" border-radius: 5px;">SELECCIONAR COMITE</label>
<select id="selectComite" class="form-select form-select-sm" aria-label=".form-select-sm example">
<option selected>Seleccione un comite</option>
    <?php 

$query = "SELECT * FROM `votaciones_comites` where estado = 1 ";
 $data3 = $net_rrhh->prepare($query);
 $data3->execute();
  while ($data = $data3->fetch()) 
  {
     echo ' <option value="'.$data[0].'">'.strtoupper($data[1]).'</option>';
  }
    ?>

</select>
    <div id="cuerpoVotaciones"></div>
    </div>
</div>



 
</div>




<!--:::::::::  MODAL AGREGAR COMITE A LA BASE DE DATOS ::::::::::::::::-->
 <!-- Modal -->
 <style>
     .colorCabecera {
         background-color: #1E1E1E;
     }
 </style>
 <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header colorCabecera">
         <h5 class="modal-title " id="exampleModalLabel"><b  style="color: white;">CREANDO COMITÉ DENTRO DEL SISTEMA</b></h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
         
       
       <div class="mb-3">
   <label for="exampleFormControlInput1" class="form-label">Nombre del Comité</label>
   <input type="email" class="form-control form-sm" id="nombreComite" placeholder="escribir...">
 </div>
 <div class="mb-3">
   <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
   <textarea class="form-control" id="descripcionComite" rows="2"></textarea>
 </div>
 
 
 
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-danger btn-sm" id="cancelarComite" data-bs-dismiss="modal">Cancelar</button>
         <button type="button" id="btnRegistrarComite" class="btn btn-success btn-sm">Registrar comité</button>
       </div>
     </div>
   </div>
 </div>
 
 
 <!--:::::::::  MODAL AGREGAR CANDIDATOS A LA BASE DE DATOS ::::::::::::::::-->
 <!-- Modal -->
 <style>
     .colorCabecera {
         background-color: #1E1E1E;
     }
 </style>
 <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header colorCabecera">
         <h5 class="modal-title " id="exampleModalLabel"><b  style="color: white;">CREAR CANDIDATOS DENTRO DEL SISTEMA</b></h5>
         <button type="button" id="btnCrrarmodalcandi" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
         
       
       <div class="mb-3">
   <label for="exampleFormControlInput1" class="form-label">📌Comité</label>
   <select class="form-select form-select-sm" id="idComite" aria-label=".form-select-sm example">
   <option selected>N/A</option>
     <?php 
        
         $query = "SELECT id, CONVERT(nombre_comite USING utf8)  FROM votaciones_comites where estado = 1 order by id";
         $data3 = $net_rrhh->prepare($query);
         $data3->execute();
         while ($data = $data3->fetch()) 
         {
             echo "<option value=".$data[0].">".$data[1]."</option>";
         }
     ?>
 </select>
 </div>
 <div class="mb-3">
   <label for="id_label_single" class="form-label"> 👨🏻‍💻Candidato</label>
   <select class="js-example-basic-single form-control form-control-sm " id="id_label_single" style="width: 100%;" aria-label=".form-select-sm example">
   <option selected>N/A</option>
   <?php 
        
        $query = "SELECT s1.id, CONVERT(s1.name1 USING utf8),CONVERT(s1.name2 USING utf8),CONVERT(s1.name3 USING utf8),CONVERT(s1.lastname1 USING utf8),CONVERT(s1.lastname2 USING utf8)  FROM employee AS s1
          LEFT JOIN users AS s2 ON s2.id = s1.id
          WHERE s2.enabled = 1  ";
        $data3 = $net_rrhh->prepare($query);
        $data3->execute();
        while ($data = $data3->fetch())  
        {
            echo "<option value=".utf8_encode($data[0]).">".($data[1])." ".($data[2])." ".($data[3])." ".($data[4])." ".($data[5])."</option>";
        }
    ?>
 </select>
 
    
     
 </div>
 
 
 
       </div>
       <div class="modal-footer">
         <button type="button" id="btnCerrarCandidato" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancelar</button>
         <button type="button" id="btnGuardarCandidato" class="btn btn-success btn-sm">Registrar Candidato</button>
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



