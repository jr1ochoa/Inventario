<?php 
include("../../../../config/net.php");
?>
<div class="row">
    <div class="col-2">

    </div>
    
    <style>
        .colorBOton {
            background-color: #33C481 !important;
            color: black !important;
        }
        </style>
<div class="col-8">

<!--::::::::: DIVISION DE LOS MOTORISTAS :::::::::::::::-->
<ul class="nav nav-tabs mt-2" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active btn-sm  "  style="height:32px; font-size:11px;   border-radius:5px;" id="home2-tab" data-bs-toggle="tab" data-bs-target="#home2" type="button" role="tab" aria-controls="home" aria-selected="true">Motoristas FUSALMO</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link btn-sm" id="profile2-tab" style="height:32px; font-size:11px;  color:black; border-radius:5px;" data-bs-toggle="tab" data-bs-target="#profile2" type="button" role="tab" aria-controls="profile" aria-selected="false">Motoristas Externos</button>
  </li>
  <!--<li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">...</button>
  </li>-->
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home2" role="tabpanel" aria-labelledby="home2-tab">

    <!--:::::::::::::: INICIO MOTORISTAS FUSALMO :::::::::::-->


    <table class="table table-hover table-striped table-sm" style="font-size: 12px;">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Estado</th>
      <th scope="col">Nota</th>
      <th scope="col">Acciones</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php 

// 

 $query = "SELECT s1.*, s2.name1,s2.name2, s2.name3, s2.lastname1,s2.lastname2 FROM `admin_finanzas_lista_motorista` as s1 inner join employee as s2 on s1.id_empleado = s2.id  where s1.estado in(1,2) order by id desc";

 $data3 = $net_rrhh->prepare($query);

 $data3->execute([$idProyecto]);

 while ($data = $data3->fetch()) {

     if($data[4] == 1)
     {
        echo '

        <tr>
        <td>'.$data[10].' '.$data[11].' '.$data[12].' '.$data[13].' </td>
       
        <td style="background-color:#E6F5E3;"> ACTIVO </td>
        
        <td>'.$data[8].' </td>
   
         </td>
         <td style="font-size: 8px;">'.$data[19].' </td>
         <td>
         <div class="btn-group " role="group" aria-label="Basic example">
     
     
              <button type="submit" class="btn btn-sm mt-0  pt-0" style="background-color: #1A4262;color:white;"  onclick="funcioneEditarMotoristaFusalmo('.$data[0].')" data-bs-toggle="modal" data-bs-target="#exampleEliminarMonitoreo">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                  </svg>
              </button>
            
   
     <div class="btn-group mx-1 mt-0 pt-0 mb-0 pb-0 m-0" role="group" aria-label="Basic outlined example">
            <button id="'.$data[0].'" class="btn btn-sm mt-0  pt-0" style="background-color: #1A4262; color:white;"  onclick="funcionEliminarMotorista('.$data[0].')" data-bs-toggle="modal" data-bs-target="#exampleEliminarMonitoreo"> 
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                      <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                      </svg>
                  </button>
              </div>
   </div>  
         </td>
      </tr>
        ';
     }
     else
     {
        echo '

        <tr>
        <td>'.$data[10].' '.$data[11].' '.$data[12].' '.$data[13].' </td>
       
        <td style="background-color:#E59A8D;"> INCAPACITADO </td>
        
        <td>'.$data[8].' </td>
   
         </td>
         <td style="font-size: 8px;">'.$data[19].' </td>
         <td>
         <div class="btn-group " role="group" aria-label="Basic example">
     
     
              <button type="submit" class="btn btn-sm mt-0  pt-0" style="background-color: #1A4262;color:white;"  onclick="funcioneEditarMotoristaFusalmo('.$data[0].')" data-bs-toggle="modal" data-bs-target="#exampleEliminarMonitoreo">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                  </svg>
              </button>
            
   
     <div class="btn-group mx-1 mt-0 pt-0 mb-0 pb-0 m-0" role="group" aria-label="Basic outlined example">
            <button id="'.$data[0].'" class="btn btn-sm mt-0  pt-0" style="background-color: #1A4262; color:white;"  onclick="funcionEliminarMotorista('.$data[0].')" data-bs-toggle="modal" data-bs-target="#exampleEliminarMonitoreo">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                      <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                      </svg>
                  </button>
              </div>
   </div>  
         </td>
      </tr>
        ';
     }
    
 }

 ?>
    </tr>  
    <!--
<td>
      <form action="?view=adminFormulariotRANSPORTE" method="POST">
      <input type="hidden" value="'.$data[19].'" name="idProyecto">
      <button type="submit" class="btn " style="background-color: #1A4262;color:white;">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-check-fill" viewBox="0 0 16 16">
  <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5"/>
  <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585q.084.236.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5q.001-.264.085-.5m6.769 6.854-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708.708"/>
</svg>
      </button>
     </form>


     
      </td>
      <td>
      <div class="btn-group" role="group" aria-label="Basic outlined example">
            <button type="button" class="btn " style="background-color: #1A4262;color:white;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                </svg>
            </button>
        </div>    
-->
  </tbody>
</table>

    <!--::::::::::::::::::::::::::::::::::::::::::::::::::::-->


  </div>
  <div class="tab-pane fade" id="profile2" role="tabpanel" aria-labelledby="profile-tab">

    <!--:::::::::::::: INICIO MOTORISTAS EXTERNOS :::::::::::-->

    <table class="table table-striped table-sm" style="font-size: 12px;">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Empresa</th>
      <th scope="col">Dui</th>
      <th scope="col">Estado</th>
      <th scope="col">Nota</th>
      
      
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php 

// 

 $query = "SELECT * FROM `admin_finanzas_lista_motorista`  where estado = 1  and motorista_interno = 'No' order by id desc";

 $data3 = $net_rrhh->prepare($query);

 $data3->execute([$idProyecto]);

 while ($data = $data3->fetch()) {

     
     echo '

     <tr>
     <td>'.$data[2].' </td>
     <td>'.$data[3].' </td>
     <td>'.$data[7].' </td>
     <td> ACTIVO </td>
     <td>'.$data[8].' </td>


      <td style="font-size: 8px;">'.$data[19].' </td>
   </tr>
     ';
 }

 ?>
    </tr>   
  </tbody>
</table>
    <!--::::::::::::::::::::::::::::::::::::::::::::::::::::-->

<!-- 
<td>
      <form action="?view=adminFormulariotRANSPORTE" method="POST">
      <input type="hidden" value="'.$data[19].'" name="idProyecto">
      <button type="submit" class="btn " style="background-color: #1A4262;color:white;">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-check-fill" viewBox="0 0 16 16">
  <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5"/>
  <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585q.084.236.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5q.001-.264.085-.5m6.769 6.854-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708.708"/>
</svg>
      </button>
     </form>


     
      </td>
      <td>
      <div class="btn-group" role="group" aria-label="Basic outlined example">
            <button type="button" class="btn " style="background-color: #1A4262;color:white;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                </svg>
            </button>
        </div>
      </td>    

-->


  </div>
 
</div>
</div>

</div>
<!--::::::: MODAL PARA EDITAR MOTORISTA  ::::::::::::::::::::-->
<div class="modal fade" id="exampleEliminarMonitoreo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header colorEncabezadoLista">
        <h5 class="modal-title" id="exampleModalLabel" style="color:white;">EDITAR MOTORISTA</h5>
        <button type="button" id="btnCerrarModalEditarMotorista" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
      <div id="EDITARMotorista22"></div>
    
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="btnCerrarModalPsajero"data-bs-dismiss="modal">Close</button>
        <!--<button type="button"id="EliminarPasajerobtn2" class="btn btn-primary">Confirmar la Eliminación</button>-->
      </div>
      <a class="btn btn-success" id="botonCargando"  style="display:none;"type="button" disabled>
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Loading...
    </a>
    </div>
  </div>
</div>

<!-- MODAL ELIMINAR MOTORISTA -->
<div class="modal fade" id="exampleEliminarMonitoreo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header colorEncabezadoLista">
        <h5 class="modal-title" id="exampleModalLabel" style="color:white;">ELIMINAR MOTORISTA</h5>
        <button type="button" id="btnCerrrarModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
      <div id="EliminarMotorista22"></div>
    
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="btnCerrarModalPsajero"data-bs-dismiss="modal">Close</button>
        <!--<button type="button"id="EliminarPasajerobtn2" class="btn btn-primary">Confirmar la Eliminación</button>-->
      </div>
      <a class="btn btn-success" id="botonCargando"  style="display:none;"type="button" disabled>
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Loading...
    </a>
    </div>
  </div>
</div>


<script src="view/Operaciones/AdministracionFinanciera/SolicitudTransporte/editar.motorista.js"></script>
<script src="view/Operaciones/AdministracionFinanciera/SolicitudTransporte/eliminar.motorista.js"></script>
<script>
        document.addEventListener("DOMContentLoaded", function () {
            const fusalmoButton = document.getElementById('home2-tab');
            const externosButton = document.getElementById('profile2-tab');

            function resetButtons() {
                fusalmoButton.classList.remove('colorBOton');
                externosButton.classList.remove('colorBOton');
            }

            fusalmoButton.addEventListener('click', function () {
                resetButtons();
                fusalmoButton.classList.add('colorBOton');
            });

            externosButton.addEventListener('click', function () {
                resetButtons();
                externosButton.classList.add('colorBOton');
            });
        });
    </script>