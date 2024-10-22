<?php include("../../../../config/net.php"); $idProyecto = $_REQUEST['idRelacion'];?>

<style>
    .colorFondo{
        background-color: #FEF2D4;
    }
</style>
<h3><b>ORGANIZACIONES COMUNITARIAS</b>  </h3>
<table class="table-sm table table table-bordered colorFondo">
<thead>
            <th>NOMBRE</th>
            <th>DESCRIPCIÓN</th>
            <th>CLASIFICACIÓN</th>
            <th>ACCIONES</th>
        </thead>
    <tbody>
    <?php 
    
    if($_SESSION['iu']==220727)
    {
        $query = "SELECT * FROM proyecto_mapeo_comunidades_organizaciones_comunitarias where id_ficha_comunitaria=? and estado = 1   ";
    $data3 = $net_rrhh->prepare($query);
    $data3->execute([$idProyecto]);
    while ($data = $data3->fetch()) {
       
            echo "
            <tr>       
                <td>".$data[2]."</td>   
                <td>".$data[3]."</td>  
                <td>".$data[4]."</td> 
                <td><button type='button' class='btn btn-warning' data-bs-toggle='modal' onclick='funcionEnviarDatosOrganizacionesComunitarias(".$data[0].")'  data-bs-target='#exampleModalOrganizacionComunitaria'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z'/>
                </svg>
                </button></td> 


                <td><button type='button' class='btn btn-danger' data-bs-toggle='modal' onclick='funcionEnviarDatosOrganizacionesComunitariasEliminar(".$data[0].")'  data-bs-target='#exampleModalEliminarOrganizacomuni'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                    <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z'/>
                    <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z'/>
                    </svg>
                    </button></td> 
             </tr>
            ";
    }
    }
    else
    {
        $query = "SELECT * FROM proyecto_mapeo_comunidades_organizaciones_comunitarias where id_ficha_comunitaria=? AND estado = 1   ";
        $data3 = $net_rrhh->prepare($query);
        $data3->execute([$idProyecto]);
        while ($data = $data3->fetch()) {
           
                echo "
                <tr>       
                    <td>".$data[2]."</td>   
                    <td>".$data[3]."</td>  
                    <td>".$data[4]."</td> 
                   
                 </tr>
                ";
        }
    }
    
    ?>
  
    </tbody>
</table>


 <!-- Modal -->
 <div class="modal fade" id="exampleModalOrganizacionComunitaria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header colorEncabezadoLista">
        <h5 class="modal-title" id="exampleModalLabel" style="color:white;">Editar Organizaciones Comunitarios</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
      <div id="EDITAROrganizacionComunitaria"></div>
    
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="btnCerrar"data-bs-dismiss="modal">Close</button>
        <button type="button"id="btnEditarCambiosOrganiazcionComnu" class="btn btn-primary">Editar Cambios</button>
      </div>
      <a class="btn btn-success" id="botonCargando"  style="display:none;"type="button" disabled>
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Loading...
    </a>
    </div>
  </div>
</div>


<!--Modal eliminar Organizacion Comunitaria-->
<!-- Modal -->
<div class="modal fade" id="exampleModalEliminarOrganizacomuni" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header colorEncabezadoLista">
        <h5 class="modal-title" id="exampleModalLabel" style="color:white;">Editar Organizaciones Comunitarios</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
      <div id="EliminarOrganizacionComunitaria"></div>
    
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="btnCerrar"data-bs-dismiss="modal">Close</button>
        <button type="button"id="btnEliminarCambiosOrganiazcionComnu" class="btn btn-primary">Eliminar Cambios</button>
      </div>
      <a class="btn btn-success" id="botonCargando"  style="display:none;"type="button" disabled>
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Loading...
    </a>
    </div>
  </div>
</div>



<script>
    const funcionEnviarDatosOrganizacionesComunitarias = (valor) => {
            //    data-bs-target='#exampleModal2'
            /*
            */
            $("#EDITAROrganizacionComunitaria").load("/view/Operaciones/GestionProyectos/FichaComunitaria/GestionTerritorial.FormularioEditarOrganizacionesComunitarias.php",{ 
            idModal: valor
        });
           // console.log(valor);
            // Activar el modal
        //$('#exampleModal2').modal('show');
          //  $(targetSelector).modal('show');
    }


    const funcionEnviarDatosOrganizacionesComunitariasEliminar = (valor) => {
            //    data-bs-target='#exampleModal2'
            /*
            */
            $("#EliminarOrganizacionComunitaria").load("/view/Operaciones/GestionProyectos/FichaComunitaria/GestionTerritorial.FormularioEliminarOrganizacionesComunitarias.php",{ 
            idModal: valor
        });
           // console.log(valor);
            // Activar el modal
        //$('#exampleModal2').modal('show');
          //  $(targetSelector).modal('show');
    }

</script>


<script>
    //:::::::::::::: REGISTRANDO PERSONAL DEL PROYECTO :::::::::::::::::::::::::::::::::::::::
    $("#btnEditarCambiosOrganiazcionComnu").click(function() {
          // document.getElementById("botonCargando").style.display="";
            $.post("process/index.php", {
                process: "proyectos",
                action: "updateOrganizacionComunitaria",
                
                
                nombreOrganizacion: $("#nombreOrganizacion").val(), 
                tipoSeleccion: $("#tipoSeleccion").val(), 
                idRelacionProyecto: $("#idRelacionProyecto").val()
            },
            function(response){
                if(response)
                {
                   // document.getElementById("botonCargando").style.display="none";
                $.toast({
                    heading: 'Finalizado',
                    text: 'Registro Actualizado 😁',
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: 3000, 
                    position: 'bottom-center',
                    afterHidden: function () {
                        location.reload(true);
                            }
                });
                document.getElementById("btnCerrar").click();
               
         /*       $("#loadListaListaComunitaria").load("view/PanelProyectos/GestionTerritorial/GestionTerritorialFichaComunitaria/GestionTerritorial.TablaComunitaria.php",{
        idRelacion : $("#idRelacionProyecto").val()
    });*/
                }
                else
                {
                    document.getElementById("botonCargando").style.display="none";
                    $.toast({
                        heading: 'ERRORRRRRRR',
                        text: 'Problemas al registrar la vinculacion  😐',
                        showHideTransition: 'slide',
                        icon: 'error',
                        hideAfter: 5000, 
                        position: 'bottom-center'
                    });
                }
            });
        });

    
    //:::::::::::::::::::: ELIMINAR INFORMACION REGISTRADA :::::::::::::::::::::::::::::::
    $("#btnEliminarCambiosOrganiazcionComnu").click(function() {
          // document.getElementById("botonCargando").style.display="";
            $.post("process/index.php", {
                process: "proyectos",
                action: "deleteOrganizacionComunitaria",
                
                
                //nombreOrganizacion: $("#nombreOrganizacion").val(), 
                //tipoSeleccion: $("#tipoSeleccion").val(), 
                idRelacionProyecto: $("#idRelacionProyecto").val()
            },
            function(response){
                if(response)
                {
                   // document.getElementById("botonCargando").style.display="none";
                $.toast({
                    heading: 'Finalizado',
                    text: 'Registro Actualizado 😁',
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: 3000, 
                    position: 'bottom-center',
                    afterHidden: function () {
                        location.reload(true);
                            }
                });
                document.getElementById("btnCerrar").click();
               
         /*       $("#loadListaListaComunitaria").load("view/PanelProyectos/GestionTerritorial/GestionTerritorialFichaComunitaria/GestionTerritorial.TablaComunitaria.php",{
        idRelacion : $("#idRelacionProyecto").val()
    });*/
                }
                else
                {
                    document.getElementById("botonCargando").style.display="none";
                    $.toast({
                        heading: 'ERRORRRRRRR',
                        text: 'Problemas al registrar la vinculacion  😐',
                        showHideTransition: 'slide',
                        icon: 'error',
                        hideAfter: 5000, 
                        position: 'bottom-center'
                    });
                }
            });
        });
</script>