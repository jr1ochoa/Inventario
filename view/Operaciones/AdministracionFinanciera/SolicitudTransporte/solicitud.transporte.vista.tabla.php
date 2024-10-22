
<div class="row">
    <div class="col-1"></div>
    <div class="col-10">

    <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">En Proceso</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Finalizadas</button>
  </li>
  <!--<li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Reportes</button>
  </li>-->
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

    <!--::::::::::: TABLA DE LAS SOLICITUDES DE PROCESO :::::::::-->

    <div id="tablaProceso"></div>
  <!--  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Direccion</th>
      <th scope="col">Hora de llegada</th>
      <th scope="col">Hora de retorno</th>
      <th scope="col">Estado</th>
      <th scope="col">Detalle</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea, optio autem. Odio, excepturi esse omnis, recusandae ipsum totam ad eveniet nam impedit nostrum qui facere provident, cupiditate tempora fugit! Rem. </td>
      <td>
       8:00
      </td>
      <td>17:00</td>
      <td><span title="finalizado" style=" border-radius: 12px; padding-left: 3px; padding-right: 3px;"> 
     ✅
    </span></td>
      <td>
      <form action="?view=SolicitanteEditarFormulariotRANSPORTE" method="POST" style="margin-bottom:0px;">
        <input type="hidden" value="1" name="idProyecto">
        <button type="submit" class="btn " style="background-color: #77AEFE;">Ver</button>
       </form>
      </td>
      <td>
      <div class="btn-group" role="group" aria-label="Basic outlined example">
            <button type="button" class="btn " style="background-color: #77AEFE;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                </svg>
            </button>
        </div>
      </td>
    </tr>

    <tr>
      <th scope="row">1</th>
      <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea, optio autem. Odio, excepturi esse omnis, recusandae ipsum totam ad eveniet nam impedit nostrum qui facere provident, cupiditate tempora fugit! Rem. </td>
      <td>
       8:00
      </td>
      <td>17:00</td>
      <td><span title="enviado" style="padding-left: 3px; padding-right: 3px;"> 
    
      <svg id="Layer_1" enable-background="new 0 0 512 512" height="20%" viewBox="0 0 512 512" width="20%" xmlns="http://www.w3.org/2000/svg"><path d="m256.1 424.3c0-7.7-6.3-14-14-14h-129.3c-7.7 0-14 6.3-14 14s6.3 14 14 14h129.2c7.8 0 14.1-6.3 14.1-14z"/><path d="m353.8 438.3c7.7 0 14-6.3 14-14s-6.3-14-14-14h-39.9c-7.7 0-14 6.3-14 14s6.3 14 14 14z"/><path d="m363.2 101.7h129.2c7.7 0 14-6.3 14-14s-6.3-14-14-14h-129.2c-7.7 0-14 6.3-14 14s6.3 14 14 14z"/><path d="m251.5 101.7h39.9c7.7 0 14-6.3 14-14s-6.3-14-14-14h-39.9c-7.7 0-14 6.3-14 14s6.3 14 14 14z"/><path d="m89 322.2c0-7.7-6.3-14-14-14h-42.6c-7.7 0-14 6.3-14 14s6.3 14 14 14h42.6c7.7 0 14-6.2 14-14z"/><path d="m17.9 263.6h76.2c7.7 0 14-6.3 14-14s-6.3-14-14-14h-76.2c-7.7 0-14 6.3-14 14s6.3 14 14 14z"/><path d="m44.8 191.3h68.1c7.7 0 14-6.3 14-14s-6.3-14-14-14h-68.1c-7.7 0-14 6.3-14 14 0 7.8 6.2 14 14 14z"/><path d="m508 138.7c0-1.3 0-2.5-.3-3.7-.2-.8-.6-1.5-.9-2.2-.3-.8-.5-1.6-1-2.3-.2-.3-.5-.4-.6-.6-.2-.2-.2-.5-.4-.7-.4-.5-1-.7-1.4-1-.8-.7-1.6-1.4-2.6-1.9-.7-.4-1.5-.6-2.2-.9-1-.3-2-.6-3.1-.7-.4 0-.8-.3-1.2-.3h-331.7c-1.7 0-3.4.3-5 .9-.4.1-.7.4-1.1.6-1.2.6-2.3 1.3-3.3 2.2-.2.1-.3.2-.5.3-.3.3-.4.7-.7 1-.7.8-1.4 1.8-1.9 2.8-.3.6-.6 1.3-.8 1.9-.2.5-.4.9-.5 1.4l-49.8 236c-.9 4.1.2 8.5 2.8 11.7 2.7 3.3 6.7 5.2 10.9 5.2h348.3c7 0 12.9-5.1 13.9-12.1l33.2-236c.1-.6-.1-1.1-.1-1.6zm-59.4 13.7-151.6 102.8-101-102.8zm.2 207.9h-318.7l40.8-193.5 114.3 116.4c2.7 2.8 6.4 4.2 10 4.2 2.7 0 5.5-.8 7.9-2.4l172.8-117.3z"/><path d="m475.9 167.7-27.1 192.6h-318.7l40.8-193.5 114.3 116.4c2.7 2.8 6.4 4.2 10 4.2 2.7 0 5.5-.8 7.9-2.4z" fill="#ffc107"/><path d="m448.6 152.4-151.6 102.8-100.9-102.8z" fill="#ffd54f"/></svg>
      
    </span></td>
      <td>
      <form action="?view=SolicitanteEditarFormulariotRANSPORTE" method="POST" style="margin-bottom:0px;">
        <input type="hidden" value="1" name="idProyecto">
        <button type="submit" class="btn " style="background-color: #77AEFE;">Ver</button>
       </form>
      </td>
      <td>
      <div class="btn-group" role="group" aria-label="Basic outlined example">
            <button type="button" class="btn " style="background-color: #77AEFE;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                </svg>
            </button>
        </div>
      </td>
    </tr>

    <tr>
      <th scope="row">1</th>
      <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea, optio autem. Odio, excepturi esse omnis, recusandae ipsum totam ad eveniet nam impedit nostrum qui facere provident, cupiditate tempora fugit! Rem. </td>
      <td>
       8:00
      </td>
      <td>17:00</td>
      <td><span style=" border-radius: 12px; padding-left: 3px; padding-right: 3px;" title="recibido"> 
   
      <svg id="Layer_1" enable-background="new 0 0 512 512" height="20%" viewBox="0 0 512 512" width="20%" xmlns="http://www.w3.org/2000/svg"><g><g><g><path d="m451 189.3h-158.4-72.1-159.4c-7.1 0-13.1 5.7-13.1 12.7v239.7c0 2.3.6 4.4 1.9 6.3.5.8 1 1.6 1.8 2.3 2.3 2.5 5.6 4.1 9.4 4.1h390c3.5 0 6.8-1.4 9-3.6 1.3-1.3 2.3-2.7 2.9-4.2.6-1.4 1-3.1 1-4.8v-239.8c-.1-7-5.7-12.7-13-12.7z" fill="#ffd54f"/></g></g><g><path d="m460 450.8c-2.2 2.2-5.4 3.5-9 3.5h-390c-3.6 0-7.1-1.5-9.3-4l157-114.5 47.5 23.8 47.3-23.8z" fill="#ffa000"/></g><g><path d="m464 247.4v194.4c0 3.5-1.6 6.7-4 9.1l-156.7-115z" fill="#ffc107"/></g><g><g><path d="m208.6 335.8-157 114.5c-2.3-2.2-3.6-5.2-3.6-8.6v-193.5z" fill="#ffc107"/></g></g></g><g><g><path d="m399.8 83.2v188.7l-115.8 63.8-27.7 15.3-143.6-79.1v-188.7z" fill="#e5e5e5"/></g><g><path d="m399.8 83.2v188.7l-115.8 63.8-141.1-77.9v-174.6z" fill="#fff"/></g></g><path d="m438.2 130.3c0 41.2-33.4 74.7-74.7 74.7-16.8 0-32.3-5.6-44.8-14.9-18.1-13.6-29.9-35.3-29.9-59.8 0-41.2 33.4-74.7 74.7-74.7 7.6 0 14.9 1.1 21.8 3.2 30.6 9.4 52.9 37.9 52.9 71.5z" fill="#d60000"/><path d="m413.9 116.9c0 41.2-33.4 74.7-74.7 74.7-7.6 0-14.9-1.1-21.8-3.2-18.1-13.6-29.9-35.3-29.9-59.8 0-41.2 33.4-74.7 74.7-74.7 7.6 0 14.9 1.1 21.8 3.2 18.2 13.7 29.9 35.4 29.9 59.8z" fill="#f00"/><path d="m460.8 173.5h-25.7c6.2-11.7 10-24.9 10-39 0-46.7-38-84.7-84.7-84.7-21.1 0-40.2 8.1-55.1 20.9h-191.1c-6.5 0-11.8 5.3-11.8 11.8v91h-51.2c-6.5 0-11.8 5.3-11.8 11.8v265.1c0 6.5 5.3 11.8 11.8 11.8h409.7c6.5 0 11.8-5.3 11.8-11.8v-265.1c0-6.5-5.3-11.8-11.9-11.8zm-397.8 89.1 131.2 73.1-131.2 92.5zm153.2 85.4 34.1 19c1.8 1 3.8 1.5 5.8 1.5s4-.5 5.8-1.5l34.1-19 128.5 90.6h-336.8zm101.7-12.3 131.1-73.1v165.6zm131.1-100.2-39.4 22v-54.4c2.5-1.8 4.9-3.9 7.2-6h32.2zm-27.6-101c0 33.7-27.4 61.1-61.1 61.1s-61.1-27.4-61.1-61.1 27.4-61.1 61.1-61.1 61.1 27.4 61.1 61.1zm-295.4-40.2h160.3c-6.5 12-10.6 25.6-10.6 40.2v.2h-110.8c-6.5 0-11.8 5.3-11.8 11.8s5.3 11.8 11.8 11.8h114.6c2.5 8.5 5.9 16.5 10.8 23.6h-125.4c-6.5 0-11.8 5.3-11.8 11.8s5.3 11.8 11.8 11.8h146.2c.9 0 1.8-.3 2.6-.5 13.4 8.9 29.4 14.1 46.6 14.1 9 0 17.5-1.8 25.6-4.4v55.9l-130 72.5-130-72.5v-176.3zm-23.6 102.9v60.3l-39.4-22v-38.4h39.4z"/><path d="m164.9 252.9h182.2c6.5 0 11.8-5.3 11.8-11.8s-5.3-11.8-11.8-11.8h-182.2c-6.5 0-11.8 5.3-11.8 11.8s5.3 11.8 11.8 11.8z"/><path d="m338.1 117.1c1 1 2.3 1.5 3.8 1.5l1-.1c.9-.2 2-.5 3.5-1.2l6.4-3.6v39.1h-10.3c-1.2 0-2.4.4-3.5 1.2-.7.6-1.4 1.4-1.8 2.4-.4.8-.7 1.8-.8 3-.1.9-.2 2-.2 3.3s.1 2.5.2 3.4c.2 1.2.5 2.1.8 3 .5 1.1 1.2 1.9 2 2.4l1.9 1.1h43.4c1.2 0 2.3-.4 3.1-1 .9-.6 1.6-1.5 2.1-2.5.4-.8.7-1.8.8-2.9.1-.9.2-2.1.2-3.4s-.1-2.5-.2-3.3c-.1-1.2-.4-2.2-.8-3-.5-1-1.1-1.9-2-2.6-1-.7-2.1-1.1-3.3-1.1h-8.5v-59.1l-.2-2.1-.7-1c-.7-1-1.7-1.7-3.1-2.1-.8-.2-1.7-.4-3-.5-1.8-.1-5.3-.1-6.9 0-.9 0-1.7.1-2.3.1-.8.1-1.5.2-1.8.4l-17.9 11.5c-.7.5-1.3.9-1.7 1.4-.7.7-1.2 1.5-1.6 2.5-.3.8-.5 1.7-.5 2.6 0 .7-.1 1.5-.1 2.6 0 1.7.1 3.1.2 4 .2 1.7.9 3.1 1.8 4z" fill="#fff"/><path d="m326.3 396.9h-140.6c-6.5 0-11.8 5.3-11.8 11.8s5.3 11.8 11.8 11.8h140.6c6.5 0 11.8-5.3 11.8-11.8s-5.3-11.8-11.8-11.8z"/></svg>
   
    </span></td>
      <td>
      <form action="?view=SolicitanteEditarFormulariotRANSPORTE" method="POST" style="margin-bottom:0px;">
        <input type="hidden" value="1" name="idProyecto">
        <button type="submit" class="btn " style="background-color: #77AEFE;">Ver</button>
       </form>
      </td>
      <td>
      <div class="btn-group" role="group" aria-label="Basic outlined example">
            <button type="button" class="btn " style="background-color: #77AEFE;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                </svg>
            </button>
        </div>
      </td>
    </tr>

    
    
  </tbody>
</table>-->

    <!--:::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->

  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div id="tablaProcesoFinalizados"></div>
  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
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

$("#tablaProceso").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.tabla.publica.php");
//
$("#tablaProcesoFinalizados").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.tabla.publica.finalizadas.php");
 
       
    </script>

