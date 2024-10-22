<?php include("../../../../config/net.php"); ?>
<style>
    @media screen and (max-width: 980px) {

.navTamaño {
    display: "block";
}

#header a[href="#navPanel"] {
    display: block;
}

}
</style>
<div class="container mt-5">
    <nav class="navTamaño" style="display: block;">
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">SOYAPANGO</button>
        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">SAN MIGUEL</button>
        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">SANTA ANA</button>
    </div>
    </nav>
    <style>
            .colorBoton2{
                background-color: #1A4262;
                color: white;
            }
           
            .colorBotonesCambio:hover{
                background-color: #FDDA8A ;
            }
        </style>
    <div class="tab-content" id="nav-tabContent">
        <?php 
        
        //PARA TOMAR LOS DATOS DE LA SEDE DE SANTA ANA:::::::::::::
        $query = "SELECT * FROM proyecto_mapeo_comunidades where sede = 'Santa Ana' and estado = 1 order by id desc ";
        $data = $net_rrhh->prepare($query);
        $data->execute();
        //PARA TOMAR LOS DATOS DE LA SEDE DE SAN MIGUEL ::::::::::
        $query2 = "SELECT * FROM proyecto_mapeo_comunidades where sede = 'San Miguel' and estado = 1 order by id desc";
        $data2 = $net_rrhh->prepare($query2);
        $data2->execute();
        //PARA TOMAR LOS DATOS DE LA SEDE DE SOYAPANGO :::::::::::
        $query3 = "SELECT * FROM proyecto_mapeo_comunidades where sede = 'Soyapango' and estado = 1 order by id desc";
        $data4 = $net_rrhh->prepare($query3);
        $data4->execute();

        //LISTA DE SOYAPANGO ----------------------------------------------------------
        echo '<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <table class="table table-hover">
        <thead>
            <th>ID</th>
            <th>TIPO</th>
            <th>COMUNIDAD</th>
            <th>RADIO</th>
            <th>DISTANCIA</th>
            <th>VIVIENDAS</th>
            <th>CASA COMUNAL</th>
            <th>GOOGLE MAPS</th>
            <th>OBSERVACIONES</th>
            <th>ACCIONES</th>
        </thead>';
        while ($data3 = $data4->fetch()) {
            echo "
                <tr>       
                    <td>".$data3[0]."</td> 
                    <td>".sanear_string($data3[18])."</td> 
                    <td>".sanear_string($data3[3])."</td> 
                    <td>".sanear_string($data3[4])." </td>
                    <td>".sanear_string($data3[19])." </td>
                    <td>".sanear_string($data3[7])." </td>  
                    ".($data3[8]=="SI" ? ("<td style=''>".$data3[8]."</td>") : (" <td style=''>".$data3[8]."</td>"))."
                    <td class='text-center'><a href='".$data3[5]."' target='_blank'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-file-earmark-text-fill' viewBox='0 0 16 16'>
                    <path d='M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z'/>
                  </svg></a></td> 
                    <td>".sanear_string($data3[16])."</td> 
                     
                    <td>
                    
                    
                    <div class='btn-group' role='group' aria-label='Basic example'>

                    <form action='?view=fichaCOmunitariaDetalle' method='POST' style='margin-bottom:0px;'>
                        <input type='hidden' value=".$data3[0]." name='idProyecto'>
                        <button type='submit' class='btn  mx-1 buttonCrearFicha colorBoton2 colorBotonesCambio'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-file-earmark-text-fill' viewBox='0 0 16 16'>
                        <path d='M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z'/>
                      </svg>
                      </button>
                      </form>
                      

                      
                  <button type='button' class='btn btn-primary' data-bs-toggle='modal' onclick='funcionEnviarDatos(".$data3[0].")'  data-bs-target='#exampleModal2'>
                  
                  <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                  <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                  <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z'/>
                </svg>
                </button>

           

                <button type='button' class='btn btn-danger' data-bs-toggle='modal' onclick='funcioneLIMINARDATO(".$data3[0].")'  data-bs-target='#exampleModal3Encabezado'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z'/>
                <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z'/>
                </svg> 
                </button> 

                    </div>
                      </td>        
                </tr>
        "; 
        }
        echo' </table></div>
        ';
        
        //LISTA DE SAN MIGUEL ---------------------------------------------------------
        echo '<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <table class="table table-hover">
            <thead>
            <th>TIPO</th>
            <th>COMUNIDAD</th>
            <th>RADIO</th>
            <th>DISTANCIA</th>
            <th>VIVIENDAS</th>
            <th>GOOGLE MAP</th>
            <th>OBSERVACIONES</th>
            <th>ACCIONES</th>
            </thead>';
            while ($data3 = $data2->fetch()) {
                echo "
                <tr>       
                <td>".$data3[18]."</td> 
                <td>".$data3[3]."</td> 
                <td>".$data3[4]."</td>
                <td>".$data3[19]." </td>
                <td>".$data3[7]."</td>  
                ".($data3[8]=="SI" ? ("<td style=''>".$data3[8]."</td>") : (" <td style=''>".$data3[8]."</td>"))."
                <td class='text-center'><a href='".$data3[5]."' target='_blank'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pin-map-fill' viewBox='0 0 16 16'>
                <path fill-rule='evenodd' d='M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8z'/>
                <path fill-rule='evenodd' d='M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z'/>
              </svg></a></td> 
                <td>".$data3[16]."</td> 
                 
                <td> 
                
                <div class='btn-group' role='group' aria-label='Basic example'>
                
                <form action='?view=fichaCOmunitariaDetalle' method='POST' style='margin-bottom:0px;'>
                    <input type='hidden' value=".$data3[0]." name='idProyecto'>
                    <button type='submit' class='btn  mx-1 buttonCrearFicha colorBoton2 colorBotonesCambio'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-file-earmark-text-fill' viewBox='0 0 16 16'>
                    <path d='M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z'/>
                  </svg>
                  </button>
                  </form>
                  

                  <button type='button' class='btn btn-primary' data-bs-toggle='modal' onclick='funcioneLIMINARDATO(".$data3[0].")'  data-bs-target='#exampleModal2' >
                  
                  <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                  <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                  <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z'/>
                </svg>
                </button>


                <button type='button' class='btn btn-danger' data-bs-toggle='modal' onclick='funcioneLIMINARDATO(".$data3[0].")'  data-bs-target='#exampleModal3Encabezado'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z'/>
                <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z'/>
                </svg> 
                </button>

                </div>  
                  
                  </td>       
            </tr>
            "; 
            }
            echo' </table></div>
            ';


        //LISTA DE SANTA ANA ---------------------------------------------------------
        echo '
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <table class="table table-hover table table-sm table-borderless">
            <thead>
            <th>TIPO</th>
            <th>COMUNIDAD</th>
            <th>RADIO</th>
            <th>DISTANCIA</th>
            <th>VIVIENDAS</th>
            <th>GOOGLE MAP</th>
            <th>OBSERVACIONES</th>
                <th>ACCIONES</th>
            </thead>';
            while ($data3 = $data->fetch()) {
                echo "
                <tr>    
                <td>".$data3[18]."</td>    
                <td>".$data3[3]."</td> 
                <td>".$data3[4]." </td>
                <td>".$data3[19]." </td>
                <td>".$data3[7]." </td>  
                ".($data3[8]=="SI" ? ("<td style=''>".$data3[8]."</td>") : (" <td style=''>".$data3[8]."</td>"))."
                <td class='text-center'><a href='".$data3[5]."' target='_blank'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pin-map-fill' viewBox='0 0 16 16'>
                <path fill-rule='evenodd' d='M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8z'/>
                <path fill-rule='evenodd' d='M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z'/>
              </svg></a></td> 
                <td>".$data3[16]."</td> 
                 
                <td>
                <div class='btn-group' role='group' aria-label='Basic example'>
              
                <form action='?view=fichaCOmunitariaDetalle' method='POST' style='margin-bottom:0px;'>
                <input type='hidden' value=".$data3[0]." name='idProyecto'>
                <button type='submit' class='btn  mx-1 buttonCrearFicha colorBoton2 colorBotonesCambio'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-file-earmark-text-fill' viewBox='0 0 16 16'>
                <path d='M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z'/>
              </svg>
              </button>
              </form>


              <button type='button'  class='btn btn-primary' data-bs-toggle='modal' onclick='funcioneLIMINARDATO(".$data3[0].")'  data-bs-target='#exampleModal3'>
                  
              <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
              <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
              <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z'/>
            </svg>
            </button>


            <button type='button' class='btn btn-danger' data-bs-toggle='modal' onclick='funcioneLIMINARDATO(".$data3[0].")'  data-bs-target='#exampleModal3Encabezado'>
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
            <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z'/>
            <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z'/>
            </svg> 
            </button>
                </div>

                  </td>    
                      
            </tr>
            "; 
            }
            echo' </table></div>
            ';
        ?>
    </div>
</div>

<script>
    const funcionEnviarDatos = (valor) => {
            //    data-bs-target='#exampleModal2'
            /*
            */
            $("#EditarEncabezado").load("view/Operaciones/GestionProyectos/FichaComunitaria/GestionTerritorial.FormularioEditarCabezado.php",{
            idModal: valor
        });
           // console.log(valor);
            // Activar el modal
        //$('#exampleModal2').modal('show');
          //  $(targetSelector).modal('show');
    }
    const funcioneLIMINARDATO= (valor) => {
            //    data-bs-target='#exampleModal2'
            /*
            */
            $("#EliminarEncabezado").load("view/Operaciones/GestionProyectos/FichaComunitaria/eliminarEncabezado.php",{
            idModal: valor
        });
           // console.log(valor);
            // Activar el modal
        //$('#exampleModal2').modal('show');
          //  $(targetSelector).modal('show');
    }
</script>
<style>
    .colorEncabezadoLista{
        background-color: #F7CD5A;
    }
    .TAMAÑOMODAL{
        width: 1200px;
    }
    .modal-dialog{
        width: 1200px;
    }
</style>

<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header colorEncabezadoLista">
        <h5 class="modal-title" id="exampleModalLabel" style="color:white;">EDITAR ENCABENZADO DE LA FICHA</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
      <div id="EditarEncabezado"></div>
    
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="btnCerrar"data-bs-dismiss="modal">Close</button>
        <button type="button"id="btnEditarCambios" class="btn btn-primary">Editar Cambios</button>
      </div>
      <a class="btn btn-success" id="botonCargando"  style="display:none;"type="button" disabled>
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Loading...
    </a>
    </div>
  </div>
</div>


<!-- MODAL ELIMINAR ENCABEZADO -->
<div class="modal fade" id="exampleModal3Encabezado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header colorEncabezadoLista">
        <h5 class="modal-title" id="exampleModalLabel" style="color:white;">ELIMINAR COMUNIDAD</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
      <div id="EliminarEncabezado"></div>
    
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="btnCerrarEliminar"data-bs-dismiss="modal">Close</button>
        <button type="button"id="btnEliminarComunidad" class="btn btn-primary">Confirmar la Eliminación</button>
      </div>
      <a class="btn btn-success" id="botonCargando"  style="display:none;"type="button" disabled>
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Loading...
    </a>
    </div>
  </div>
</div>

<script>
    //:::::::::::::: REGISTRANDO PERSONAL DEL PROYECTO :::::::::::::::::::::::::::::::::::::::
    $("#btnEditarCambios").click(function() {
          // document.getElementById("botonCargando").style.display="";
            $.post("process/index.php", {
                process: "proyectos",
                action: "updateFichaGeneral",
                
                
                cboDepartment: $("#cboDepartment").val(), 
                //cboMunicipality: $("#cboMunicipality").val(), 
                departamentoActual : $("#departamentoActual").val(),
                municipioActual : $("#municipioActual").val(),
                nombreComunidad: $("#nombreComunidad").val(), 
                radio: $("#radio").val(), 
                radioaCTUAL: $("#radioaCTUAL").val(),
                ubicacion : $("#ubicacion").val(),
                coordenadas : $("#coordenadas").val(),
                totalviviendas : $("#totalviviendas").val(),
                casacomunal : $("#casacomunal").val(),
                centroalcance : $("#centroalcance").val(),
                OBSERVACIONES: $("#OBSERVACIONES").val(),
                descripcionCasaComunal: $("#descripcionCasaComunal").val(),
                idRelacionProyecto: $("#idRelacionProyecto").val(),
                typecomunidad:$("#typecomunidad").val(),
                distancia: $("#distancia").val(),
                tipoComunidadActual : $("#tipoComunidadActual").val(),
            },
            function(response){
                if(response)
                {
                   // document.getElementById("botonCargando").style.display="none";
                $.toast({
                    heading: 'Finalizado',
                    text: response,//'Registro Actualizado 😁',
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
//Eliminar comunidad 
$("#btnEliminarComunidad").click(function() {
          // document.getElementById("botonCargando").style.display="";
            $.post("process/index.php", {
                process: "proyectos",
                action: "deleteFichaGeneral",
                idEncabezadoDelete:$("#idEncabezadoDelete").val(),
            },
            function(response){
                if(response)
                {
                   // document.getElementById("botonCargando").style.display="none";
                $.toast({
                    heading: 'Eliminacion Correcta',
                    text: response,//'Registro Actualizado 😁',
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: 3000, 
                    position: 'bottom-center',
                    afterHidden: function () {
                        location.reload(true);
                            }
                });
                document.getElementById("btnCerrarEliminar").click();
               
         /*       $("#loadListaListaComunitaria").load("view/PanelProyectos/GestionTerritorial/GestionTerritorialFichaComunitaria/GestionTerritorial.TablaComunitaria.php",{
        idRelacion : $("#idRelacionProyecto").val()
    });*/
                }
                else
                {
                   // document.getElementById("botonCargando").style.display="none";
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