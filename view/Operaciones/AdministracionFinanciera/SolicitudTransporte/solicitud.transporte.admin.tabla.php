<?php 
include("../../../../config/net.php");
?>

<style>
    .tamanoFuente{
        font-size: 12px;
    }
</style>

<div class="row ">
   <div class="col-md-1">

   </div>
<!--<div class="col-2 ">
        <center>
          <div class="row">
            <div class="col-12">
                <div class="card-header mb-2">
    Panel Administrativo
  </div>


              <button type="button" id="creacionRegistroSolicitud" class="btn btn-sm" style="background-color: #1A4262; color:white;" data-bs-toggle="modal" data-bs-target="#exampleModal2"  >Registrar Nuevo Vehiculo</button>
            
            
            </div>
            <div class="col-12 mt-3">
              <button type="button" id="creacionRegistroSolicitud2" class="btn btn-sm" style="background-color: #1A4262; color:white;" data-bs-toggle="modal" data-bs-target="#exampleModal3"  >Crear Nuevo Motorista</button>
           
            </div>
          </div>
            
           
        </center>
        
    </div>-->
    <div class="col-10">

    <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Solicitudes</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link " id="solicitudAsignada-tab" data-bs-toggle="tab" data-bs-target="#solicitudAsignada" type="button" role="tab" aria-controls="solicitudAsignada" aria-selected="true">Solicitudes Aprobadas</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="enviadas-tab" data-bs-toggle="tab" data-bs-target="#enviadas" type="button" role="tab" aria-controls="home" aria-selected="false">Finalizadas</button>
  </li>
 <!-- <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Canceladas</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Reportes</button>
  </li>-->
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="motorista-tab" data-bs-toggle="tab" data-bs-target="#motorista" type="button" role="tab" aria-controls="motorista" aria-selected="false">Motorista</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="vehiculo-tab" data-bs-toggle="tab" data-bs-target="#vehiculo" type="button" role="tab" aria-controls="vehiculo" aria-selected="false">Vehículo</button>
  </li>
  <li class="nav-item" role="presentation">
  <?php 
  try {
      $query2222 = "
      SELECT s1.*, s2.area, s3.name1, s3.name2, s3.lastname1, s3.lastname2 
      FROM admin_finanzas_formulario as s1 
      INNER JOIN workarea as s2 ON s1.id_area_solicitante = s2.id
      INNER JOIN employee as s3 ON s1.id_empleado = s3.id 
      WHERE s1.estado = 1 
      ORDER BY s1.id DESC
      ";
      
      $data333 = $net_rrhh->prepare($query2222);
      $data333->execute();
      $count = $data333->rowCount();
  } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
      $count = 0; // En caso de error, definimos count como 0
  }
  ?>
  
  <button style="color: #0D5DD3;" class="btn btn-ligth position-relative" id="vehiculo-tab" data-bs-toggle="tab" data-bs-target="#todasSolicitud" type="button" role="tab" aria-controls="todasSolicitud" aria-selected="false">
    Nuevas Solicitudes
    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
      <?php echo  $count ?>
      <span class="visually-hidden">unread messages</span>
    </span>
  </button>
</li>



<li class="nav-item" role="presentation">
  <?php 
  try {
      $query2222 = "
      SELECT s1.*, s2.area, s3.name1, s3.name2, s3.lastname1, s3.lastname2 
      FROM admin_finanzas_formulario as s1 
      INNER JOIN workarea as s2 ON s1.id_area_solicitante = s2.id
      INNER JOIN employee as s3 ON s1.id_empleado = s3.id 
      WHERE s1.estado = 3
      ORDER BY s1.id DESC
      ";
      
      $data333 = $net_rrhh->prepare($query2222);
      $data333->execute();
      $count = $data333->rowCount();
  } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
      $count = 0; // En caso de error, definimos count como 0
  }
  ?>
  
  <button style="color: #0D5DD3;" class="btn btn-ligth position-relative" id="nofinalizada-tab" data-bs-toggle="tab" data-bs-target="#nofinalizada" type="button" role="tab" aria-controls="nofinalizada" aria-selected="false">
  Solicitudes No Finalizadas 
    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">
      <?php echo  $count ?>
      <span class="visually-hidden">unread messages</span>
    </span>
  </button>
</li>




</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  
  <div class="row"> 
    <div class="col-6">
        <div class="form-group">
            <label for="exampleFormControlTextarea1" class="p-0 mb-0 mt-2">Buscar solicitudes:  </label>
            <input id="timeStart" class="form-control form-control-sm mb-3" type="date" name="times" value="<?php echo date('Y-m-d'); ?>">
        </div>
    </div>
  </div>
    
    <!--::::::::::: TABLA DE LAS SOLICITUDES DE PROCESO :::::::::-->
        <div id="tablaSolicitudadmin"></div>
    <!--:::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->

  </div>

  <!--:::::::::: SOLICITUDES APROBADAS :::::::::::::::::::::::::::-->
  <div class="tab-pane fade" id="solicitudAsignada" role="solicitudAsignada" aria-labelledby="solicitudAsignada-tab">
    
  <div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="exampleFormControlTextarea1" class="p-0 mb-0 mt-2">Buscar solicitudes:  </label>
            <input id="timeStart2" class="form-control form-control-sm mb-3" type="date" name="times" value="<?php echo date('Y-m-d'); ?>">
        </div>
    </div>
  </div>
    <div id="tablaSolicitudadminAprobadas"></div>
  </div>



  <!--todasSolicitud-->
  <div class="tab-pane fade" id="todasSolicitud" role="todasSolicitud" aria-labelledby="todasSolicitud-tab">
    
  <div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="exampleFormControlTextarea1" class="p-0 mb-0 mt-2">SOLICITUDES SIN RESPUESTAS:  </label>
           
        </div>
    </div>
  </div>
    <div id="tablaSolicitudadmintODAS"></div>
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
      <div id="tablaSolicitudadmintODASNofinalizadas"></div>
    </div>

  <div class="tab-pane fade" id="enviadas" role="tabpanel" aria-labelledby="enviadas-tab">


    <!--::::::::::: TABLA DE LAS SOLICITUDES DE PROCESO :::::::::-->
    <div class="row">
        
        <div class="col-4">
            <!--<div class="form-group">
                <label for="exampleFormControlTextarea1" class="p-0 mb-0 mt-2">Buscar día de la solicitud:  </label>
                <input id="timeStart" class="form-control form-control-sm mb-3" type="date" name="times" value="">
            </div>-->
        </div>
    </div>
  <div class="">
  <table class="table table-hover table-striped">
  <thead>
    <tr>
    <th scope="col">Área</th>
      <th scope="col">Direccion</th>
      <th scope="col">Hora salida FUSALMO</th>
      <th scope="col">Hora de llegada</th>
      <th scope="col">Hora de retorno</th>
      <th scope="col">Estado</th>
      <th scope="col">Codigo</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php 

// 

 $query = "
 
 SELECT s1.*, s2.area FROM admin_finanzas_formulario as s1 inner join workarea as s2 on s1.id_area_solicitante = s2.id  where s1.estado = 4 order by s1.id desc
 
 ";

 $data3 = $net_rrhh->prepare($query); 

 $data3->execute([$idProyecto]);

 while ($data = $data3->fetch()) {

     
     echo '

     <tr>
    <td class="tamanoFuente">'.sanear_string($data[26]).' </td>
        <td>'.$data[3].' </td>
        <td>'.$data[7].' </td>
        <td>'.$data[8].' </td>
     <td style="font-size: 11px; background-color: #C0CBD4;"><span  > 
   <b>Finalizado</b > 
   </span></td>
   <td>
   <form action="?view=SolicitanteVerFormulariotRANSPORTE" method="POST" style="margin-bottom:0px;">
        <input type="hidden" value="'.$data[19].'" name="idProyecto">
        <button type="submit" class="btn btn-sm mt-0  pt-0" style="background-color: #1A4262;color:white;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-check-fill" viewBox="0 0 16 16">
        <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5"/>
        <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585q.084.236.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5q.001-.264.085-.5m6.769 6.854-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708.708"/>
    </svg>
        </button>
    </form>
   </td>
     
      <td style="font-size: 8px;">'.$data[19].' </td>
   </tr>

     ';

 }

 ?>

     
    </tr>

    
  </tbody>
</table>

  </div>
    
   

    <!--:::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->


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

<!--::::::::::: MODAL PARA REGISTRAR SOLICITUD ::::::::::::::::::-->




<script src="view/Operaciones/AdministracionFinanciera/SolicitudTransporte/editar.solicitud.desaprobar.js"></script>  

<script>

$("#tablaVehiculo").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.tabla.vehiculo.php");
$("#tablaMotorista").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.tabla.motoristas.php");

//::::::::::::::::::: REGISTRAR VEHICULOS :::::::::::::::::::::::::::::::::::::::::::::::::::::::::
/*
$("#btnRegistrarVehiculos").click(function() {
        $.post("process/index.php", {
            
        process: "administracion_finanza",
        action: "addVehiculoTransporte",

        marcaVehicular: $("#marcaVehicular").val(), 
        modeloVehicular: $("#modeloVehicular").val(), 
        yearVehicular: $("#yearVehicular").val(), 
        colorVehicular: $("#colorVehicular").val(), 
        serieVehicular: $("#serieVehicular").val(), 
        tipoMotorVehicular: $("#tipoMotorVehicular").val(), 
        potenciaVehicular: $("#potenciaVehicular").val(), 
        transmisionVehicular: $("#transmisionVehicular").val(), 
        capacidaPasajeroVehicular: $("#capacidaPasajeroVehicular").val(),
        capacidadCargaVehicular : $("#capacidadCargaVehicular").val(),
        idDimensionesVehiculos : $("#idDimensionesVehiculos").val(),
        matriculaVehiculos : $("#matriculaVehiculos").val(),
        fhMatriculaVehiculos : $("#fhMatriculaVehiculos").val(),
        fhVencimientoVehiculos  : $("#fhVencimientoVehiculos").val(),
        estadoSeguroId          : $("#estadoSeguroId").val(),
        tipoUsoVehiculo : $("#tipoUsoVehiculo").val(),
        clasificacionVehicular :$("#clasificacionVehicular").val()

    },

 function(response){

     if(response)

     {
     $.toast({
         heading: 'Finalizado',
         text:'Vehiculo Creado ',
         showHideTransition: 'slide',
         icon: 'success',
         hideAfter: 3000, 
         position: 'bottom-center'

     });
     $("#btnCerrarVehiculos").click();
     $("#tablaVehiculo").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.tabla.vehiculo.php");

      // Esperar 6 segundos antes de redirigir
        /*setTimeout(function () {
            window.location.href = "?view=vistaSolicitanteTransporte";
        }, 4000); // 6000 milisegundos = 6 segundos*/

  //   }

    
// });

//});

//:::::::::::: REGISTRAR MOTORISTAS ::::::::::::::::::::::::::::::::::::::::::::::::::::
/*$("#btnRegistrarMotorista222").click(function() {

        $.post("process/index.php", {
            
        process: "administracion_finanza",
        action: "addMotoristaTransporte",

        motoristaId: $("#motoristaId").val(), 
        id_label_single: $("#id_label_single").val(), 
        nombreMotorista: $("#nombreMotorista").val(), 
        nombreEmpresa: $("#nombreEmpresa").val(), 
        duiMotorista: $("#duiMotorista").val(), 
        notaOpcional: $("#notaOpcional").val(),
    },

 function(response){

    $.toast({
         heading: 'Finalizado',
         text:response,//'Vehiculo Creado ',
         showHideTransition: 'slide',
         icon: 'success',
         hideAfter: 3000, 
         position: 'bottom-center'

     });
     $("#btnReturnCerrarMotorista").click();
     $("#tablaMotorista").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.tabla.motoristas.php");

     //$("#tablaVehiculo").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.tabla.vehiculo.php");

      // Esperar 6 segundos antes de redirigir
        /*setTimeout(function () {
            window.location.href = "?view=vistaSolicitanteTransporte";
        }, 4000); // 6000 milisegundos = 6 segundos*/

     

    
// });

//});




//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::







$("#motoristaId").change(function()
    {
        if($(this).val() === "Si"){
            document.getElementById("bloqueNombreMotorista").style.display= "none";
            document.getElementById("bloqueNombreEmpresa").style.display= "none";
            document.getElementById("bloqueDui").style.display= "none";
            document.getElementById("bloqueNombreEmpleadoInterno").style.display= ""; 
        } else if($(this).val() === "No"){
            document.getElementById("bloqueNombreMotorista").style.display= "";
            document.getElementById("bloqueNombreEmpresa").style.display= "";
            document.getElementById("bloqueDui").style.display= "";
            document.getElementById("bloqueNombreEmpleadoInterno").style.display= "none";
        } 
        else {
            document.getElementById("bloqueNombreMotorista").style.display= "none";
            document.getElementById("bloqueNombreEmpresa").style.display= "none";
            document.getElementById("bloqueDui").style.display= "none";
            document.getElementById("bloqueNombreEmpleadoInterno").style.display= "none";
        }
    });

    $('#timeStart').change(function(){
        // Obtener el nuevo valor de fecha
        var nuevaFecha = $(this).val();
        
        // Cargar la tabla de solicitud con la nueva fecha
        $("#tablaSolicitudadmin").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.admin.tabla.solicitudes.php", { fechaActual: nuevaFecha }); 
    });
    $('#timeStart2').change(function(){
        // Obtener el nuevo valor de fecha
        var nuevaFecha = $(this).val();
        
        // Cargar la tabla de solicitud con la nueva fecha
        $("#tablaSolicitudadminAprobadas").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.admin.tabla.solicitudes.aprobadas.php", { fechaActual: document.getElementById("timeStart2").value });
    });
$(document).ready(function(){
 
    //tablaSolicitudadminAprobadas
    $("#tablaSolicitudadmintODAS").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.admin.tabla.todassolicitudes.php");
    $("#tablaSolicitudadmintODASNofinalizadas").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.admin.tabla.nofinalizadas.php");
    
    $("#tablaSolicitudadmin").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.admin.tabla.solicitudes.php", { fechaActual: document.getElementById("timeStart").value });
    $("#tablaSolicitudadminAprobadas").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.admin.tabla.solicitudes.aprobadas.php", { fechaActual: document.getElementById("timeStart2").value });
   
})
$(document).ready(function(){

         

   
$('.js-example-basic-single2').select2({

    dropdownParent:$('#exampleModal3')

})
      });
    </script>

