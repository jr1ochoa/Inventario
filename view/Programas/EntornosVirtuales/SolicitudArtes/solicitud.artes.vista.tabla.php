<?php 
include("../../../../config/net.php");
 
?>
<div class="container">

<div class="row">
    
    <div class="col-12">

    <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">En Proceso</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Finalizadas</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Reportes</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

    <!--::::::::::: TABLA DE LAS SOLICITUDES DE PROCESO :::::::::-->

      <div id="tablasTablaVista"></div>

    <!--:::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->

  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div id="tablasTablaVistaTerminadas"></div>
  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">


  <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Aviso!!  </strong> Estará listo para la versión 2.0.0
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>


  </div>
</div>


    </div>
</div>


<?php 

$idEmpleado =  $_SESSION['iu'];
//echo $idEmpleado."<br>";
$idAreaEmpleado;
$query = "SELECT s1.*, s2.idarea FROM workarea_positions_assignment as s1  inner join workarea_positions as s2   WHERE  s2.id = s1.idposition and s1.idemployee = $idEmpleado";
    $spaces = $net_rrhh->prepare($query);
    $spaces->execute();
    while ($data = $spaces->fetch()) 
    {
        //echo $data[8];
        $idAreaEmpleado = $data[8];
    }

?>


<!--::::::::::: MODAL PARA REGISTRAR SOLICITUD ::::::::::::::::::-->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header colorNuevaFicha" style="background-color: #1A4262; ">
        <h4 class="modal-title" id="exampleModalLabel"  style="color:white;"> Registrando Solicitud de Arte</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">

       

        <div class="row">
            <div class="col-md">
            <div class="mb-3">
            <label for="formFile" class="form-label">Nombre del Arte:  </label>
            <textarea class="form-control" id="nombreArte" rows="2"></textarea> 
        </div>
      
        <input type="hidden" id="idAreaSolicitud" value="<?php echo  $idAreaEmpleado; ?>"/>
        <div class="mb-3">
            <label for="formFile" class="form-label">Indicaciones de Arte:  </label>
            <textarea class="form-control" id="idIndicacionArtes" rows="3"></textarea> 
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Seleccionar Producto/ Servicio:  </label>
            <select class="form-select form-select-sm" id="idProductoServicio" aria-label=".form-select-sm example">
                <option >Seleccione</option>
                <option >Banner</option>
                <option >Flyer</option>
                <option >Post</option>
                <option >Carrusel</option>
                <option >Afiche </option>
                <option >Presentaciones</option>
                <option >Edición de video y animaciones</option>
                <option >Ilustración</option>
                <option >Editorial</option>
                <option >Vallas</option>
                <option >Logo</option>
                <option >Diseño</option>
            </select>
        </div>


        <div class="mb-3">
            <label for="formFile" class="form-label">Agregar Link de Sharepoint:  </label>
            <textarea class="form-control" id="idLinkSharepoint" rows="2"></textarea>
        </div>
            </div>
            <div class="col-md">
            <div class="mb-3">
            <label for="formFile" class="form-label">Especificar las medidas del arte:  </label>
            <textarea class="form-control" id="idMedidasArte" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Fecha Requerida: </label>
            <input class="form-control form-control-sm" id="idFechaRequerida" type="date" placeholder=".form-control-sm" aria-label=".form-control-sm example">
        </div>



        <div class="mb-3">
            <label for="formFile" class="form-label">Nota adicional:  </label>
            <textarea class="form-control" id="notaAdicionalId" rows="3"></textarea>
        </div>
            </div>
        </div>





     

        


       
      <div class="modal-footer">

      <a type="button" id="btnReturn2"  class="btn btn-sm btn-seconday" style="background-color: #FD9683;" data-bs-dismiss="modal">Cancelar</a>

        <a type="button" id="btnSaveInscription2" class="btn  btn-sm" style="background-color: #CBE8BA;"  >Registrar Solicitud</a>

      </div>

      <a class="btn btn-success" id="botonCargando2"  style="display:none;"type="button" disabled>

  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>

  Loading...

</a>

    </div>

  </div>

</div>

</div>
<script>
$("#vistaSolicitanteNuevasBtn").click(function(){ 
    window.location.href='?view=vistaSolicitanteNueva'; 
});
</script>

<script>
  
  $("#tablasTablaVista").load("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.artes.vista.solicitante.tabla.php");  
  $("#tablasTablaVistaTerminadas").load("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.artes.vista.solicitante.tabla.terminada.php"); 
 
  $("#btnSaveInscription2").click(function() {
        $.post("process/index.php", {
            
        process: "entornos_virtuales",
        action: "addSolicitudArte", 

        idIndicacionArtes: $("#idIndicacionArtes").val(), 
        idProductoServicio: $("#idProductoServicio").val(), 
        idLinkSharepoint: $("#idLinkSharepoint").val(), 
        idMedidasArte: $("#idMedidasArte").val(), 
        idFechaRequerida: $("#idFechaRequerida").val(), 
        notaAdicionalId: $("#notaAdicionalId").val(), 
        nombreArte: $("#nombreArte").val(),
        idAreaSolicitud: $("#idAreaSolicitud").val()
       
    },

 function(response){

     if(response)

     {
     $.toast({
         heading: 'Finalizado',
         text:'Solicitud Enviada ',
         showHideTransition: 'slide',
         icon: 'success',
         hideAfter: 3000, 
         position: 'bottom-center'

     });
      // Esperar 6 segundos antes de redirigir
       /* setTimeout(function () {
            window.location.href = "?view=vistaSolicitanteTransporte";
        }, 4000); // 6000 milisegundos = 6 segundos
       */
      $("#tablasTablaVista").load("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.artes.vista.solicitante.tabla.php");
        document.getElementById("btnReturn2").click();
     }

    
 }); 

});

</script>