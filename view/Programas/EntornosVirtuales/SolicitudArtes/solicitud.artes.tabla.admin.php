<?php 
include("../../../../config/net.php");
?>
<div class="row justify-content-center">
   

    <div class="col-8">

    <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Nuevas Solicitudes 
        📬</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="enviadas-tab" data-bs-toggle="tab" data-bs-target="#enviadas" type="button" role="tab" aria-controls="home" aria-selected="false">Terminadas</button>
  </li> 
  <!--<li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Canceladas</button>
  </li>-->
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Reportes</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="productos-tab" data-bs-toggle="tab" data-bs-target="#productos_artes" type="button" role="tab" aria-controls="productos_artes" aria-selected="false">Productos</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="medidas-tab" data-bs-toggle="tab" data-bs-target="#medidas_artes" type="button" role="tab" aria-controls="medidas_artes" aria-selected="false">Medidas</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

    <!--::::::::::: TABLA DE LAS SOLICITUDES DE PROCESO :::::::::-->
    <div class="row">
        <div class="col-8">

        </div>
        <div class="col-4">
            <!--<div class="form-group">
                <label for="exampleFormControlTextarea1" class="p-0 mb-0 mt-2">Buscar día de la solicitud:  </label>
                <input id="timeStart" class="form-control form-control-sm mb-3" type="date" name="times" value="">
            </div>-->
        </div>
    </div>
    
    
    <table class="table table-hover">
  <thead>
    <tr>
     
      <th scope="col">Área</th>
      <th scope="col">Tipo</th>
      <th scope="col">Proceso</th>
      <th scope="col">Fecha de entrega</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>

<?php 
 $query = "SELECT * FROM entornos_virtuales_formulario as s1 inner JOIN workarea as s2 on s2.id = s1.idArea_solicitante where estado = 1 AND s1.porcentajeAvance < 100 order by s1.id desc";

 $data3 = $net_rrhh->prepare($query);

 $data3->execute([$idProyecto]);

 while ($data = $data3->fetch()) {
/*<td>
     <form action="?view=formularioSolicitanteArtesAdmin" method="POST" style="margin-bottom:0px;">
       <input type="hidden"  value="'.$data[20].'"  name="idSolicitudArtes">
       <button type="submit" class="btn btn-sm" style="background-color: #77AEFE;">Ver</button>
      </form> 
     </td> */
    $width = number_format($data[16], 0); // Limita a 2 decimales
    $date = new DateTime($data[7]);
$formattedDate = $date->format('d/m/Y');
     echo '

     <tr>
    
     <td>'.$data[22].' </td>
     <td>'.$data[13].' </td>
     <td>
     <span>'.$width.'%</span>
       <div class="progress">
      
           <div class="progress-bar" role="progressbar" style="width: '.$width.'%;" aria-valuenow="'.$width.'" aria-valuemin="0" aria-valuemax="100">'.$width.'%</div>
       </div>
     </td>
     <td>'.$formattedDate.'</td>
     
     <td>
     <div class="btn-group" role="group" aria-label="Basic outlined example">
     <form action="?view=vistaGestionarSolicitudArte" method="POST" style="margin-bottom:0px;">
       <input type="hidden" value="'.$data[20].'" name="idFormulario">
           <button type="submit" class="btn btn-sm" style="background-color: #77AEFE;">
              Gestionar
           </button>
     </form>
       </div>
     </td>
   </tr>
     

     ';

 }

 ?>



  
  
    
  </tbody>
</table>

    <!--:::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->

  </div>
  <div class="tab-pane fade" id="enviadas" role="tabpanel" aria-labelledby="enviadas-tab"> 
    <!--::::::::::: TABLA DE LAS SOLICITUDES TERMINADAS :::::::::-->
    <div class="row">
        <div class="col-8">

        </div>
        <div class="col-4">
         <!--   <div class="form-group">
                <label for="exampleFormControlTextarea1" class="p-0 mb-0 mt-2">Buscar día de la solicitud:  </label>
                <input id="timeStart" class="form-control form-control-sm mb-3" type="date" name="times" value="">
            </div>-->
        </div>
    </div>
    
    
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Área</th>
      <th scope="col">Tipo</th>
      <th scope="col">Proceso</th>
      <th scope="col">Fecha de entrega</th>
      <th scope="col">Ver Detalle</th>
    </tr>
  </thead>
  <tbody>

<?php 
 $query = "SELECT * FROM entornos_virtuales_formulario as s1 inner JOIN workarea as s2 on s2.id = s1.idArea_solicitante where estado = 1 AND s1.porcentajeAvance = 100 order by s1.id desc";

 $data3 = $net_rrhh->prepare($query);

 $data3->execute([$idProyecto]);

 while ($data = $data3->fetch()) {

     
     echo '

     <tr>
     <td>'.$data[22].' </td>
     <td>'.$data[13].' </td>
     <td>
     <span>'.$data[16].'%</span>
       <div class="progress">
      
           <div class="progress-bar" role="progressbar" style="width: '.$data[16].'%;" aria-valuenow="'.$data[16].'" aria-valuemin="0" aria-valuemax="100">'.$data[16].'%</div>
       </div>
     </td>
     <td>'.$data[7].'</td>
     <td>
     <form action="?view=formularioSolicitanteArtesAdmin" method="POST" style="margin-bottom:0px;">
       <input type="hidden"  value="'.$data[20].'"  name="idSolicitudArtes">
       <button type="submit" class="btn btn-sm" style="background-color: #77AEFE;">Ver</button>
      </form>
     </td>
     <td>
   
     </td>
   </tr>
     

     ';

 }

 ?>

    
  </tbody>
</table>
<!--:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->

  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

  <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Aviso!!  </strong> Estará listo para la versión 2.0.0
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    
</div>

<!--::::::::::::::::: PRODUCTOS ::::::::::::::::::::::::::::-->
<div class="tab-pane fade" id="productos_artes" role="tabpanel" aria-labelledby="productos_artes-tab">
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Producto</th>
     
    </tr>
  </thead>
  <tbody>

<?php 
 $query = "SELECT * FROM entornos_virtuales_productos ";

 $data3 = $net_rrhh->prepare($query);

 $data3->execute([$idProyecto]);

 while ($data = $data3->fetch()) {

     
     echo '

     <tr>
     <td>'.$data[1].' </td>
     
     
   </tr>
     

     ';

 }

 ?>

    
  </tbody>
</table>
  
</div>
<!--:::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
<!--::::::::::::::::: MEDIDAS :::::::::::::::::::::::::::::-->
<div class="tab-pane fade" id="medidas_artes" role="tabpanel" aria-labelledby="medidas_artes-tab">
MEDIDAS

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Producto</th>
      <th scope="col">Medidas</th>
    </tr>
  </thead>
  <tbody>

<?php 
 $query = "SELECT * FROM entornos_virtuales_productos as s1 inner join entornos_virtuales_medidas as s2 on s2.id_producto = s1.id ";

 $data3 = $net_rrhh->prepare($query);

 $data3->execute([$idProyecto]);

 while ($data = $data3->fetch()) {

     
     echo '

     <tr>
     <td>'.$data[1].' </td>
     <td>'.$data[4].' </td>
     
   </tr>
     

     ';

 }

 ?>

    
  </tbody>
</table>




</div>
<!--:::::::::::::::::::::::::::::::::::::::::::::::::::::::-->



</div>


    </div>
</div>

<!--::::::::::: MODAL PARA REGISTRAR SOLICITUD ::::::::::::::::::-->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header colorNuevaFicha" style="background-color: #1A4262; ">
        <h4 class="modal-title" id="exampleModalLabel"  style="color:white;"> Registrando Solicitud de Arte</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">

       

      

        <div class="mb-3">
            <label for="formFile" class="form-label">Indicaciones de Arte:  </label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Agregar Link de Sharepoint:  </label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Especificar las medidas del arte:  </label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Fecha Requerida: </label>
            <input class="form-control form-control-sm" type="date" placeholder=".form-control-sm" aria-label=".form-control-sm example">
        </div>


        <div class="mb-3">
            <label for="formFile" class="form-label">Nota adicional:  </label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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






<script>
        $("#creacionRegistroSolicitud").click(function(){
    window.location.href='?view=formulario-registro';  
})
    </script>

