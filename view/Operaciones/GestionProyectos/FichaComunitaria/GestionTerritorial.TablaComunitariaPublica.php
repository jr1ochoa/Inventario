<?php  include("../../../../config/net.php"); ?>
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
            .colorBoton{
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
        $query = "SELECT * FROM proyecto_mapeo_comunidades where sede = 'Santa Ana'";
        $data = $net_rrhh->prepare($query);
        $data->execute();
        //PARA TOMAR LOS DATOS DE LA SEDE DE SAN MIGUEL ::::::::::
        $query2 = "SELECT * FROM proyecto_mapeo_comunidades where sede = 'San Miguel'";
        $data2 = $net_rrhh->prepare($query2);
        $data2->execute();
        //PARA TOMAR LOS DATOS DE LA SEDE DE SOYAPANGO :::::::::::
        $query3 = "SELECT * FROM proyecto_mapeo_comunidades where sede = 'Soyapango'";
        $data4 = $net_rrhh->prepare($query3);
        $data4->execute();

        //LISTA DE SOYAPANGO ----------------------------------------------------------
        echo '<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <table class="table table-hover">
        <thead>
            <th>COMUNIDAD</th>
            <th>RADIO</th>
            <th>VIVIENDAS</th>
            <th>CASA COMUNAL</th>
            <th>GOOGLE MAPS</th>
            <th>OBSERVACIONES</th>
            <th>ACCIONES</th>
        </thead>';
        while ($data3 = $data4->fetch()) {
            echo "
                <tr>       
                    <td>".$data3[3]."</td> 
                    <td>".$data3[4]." 🗺️</td>
                    <td>".$data3[7]." 🏘️</td>  
                    ".($data3[8]=="SI" ? ("<td style='background-color: #C0E5B9'>".$data3[8]."</td>") : (" <td style='background-color: #F17F7B'>".$data3[8]."</td>"))."
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
                        <button type='submit' class='btn  mx-1 buttonCrearFicha colorBoton colorBotonesCambio'>
                          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eyeglasses' viewBox='0 0 16 16'>
                          <path d='M4 6a2 2 0 1 1 0 4 2 2 0 0 1 0-4m2.625.547a3 3 0 0 0-5.584.953H.5a.5.5 0 0 0 0 1h.541A3 3 0 0 0 7 8a1 1 0 0 1 2 0 3 3 0 0 0 5.959.5h.541a.5.5 0 0 0 0-1h-.541a3 3 0 0 0-5.584-.953A1.993 1.993 0 0 0 8 6c-.532 0-1.016.208-1.375.547M14 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0'/>
                          </svg>
                      </button>
                      </form>
                      

                      
                



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
            <th>COMUNIDAD</th>
            <th>RADIO</th>
            <th>VIVIENDAS</th>
            <th>GOOGLE MAP</th>
            <th>OBSERVACIONES</th>
            <th>ACCIONES</th>
            </thead>';
            while ($data3 = $data2->fetch()) {
                echo "
                <tr>       
                <td>".$data3[3]."</td> 
                <td>".$data3[4]." 🗺️</td>
                <td>".$data3[7]." 🏘️</td>  
                ".($data3[8]=="SI" ? ("<td style='background-color: #C0E5B9'>".$data3[8]."</td>") : (" <td style='background-color: #F17F7B'>".$data3[8]."</td>"))."
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
                    <button type='submit' class='btn  mx-1 buttonCrearFicha colorBoton colorBotonesCambio'>
                      <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eyeglasses' viewBox='0 0 16 16'>
                      <path d='M4 6a2 2 0 1 1 0 4 2 2 0 0 1 0-4m2.625.547a3 3 0 0 0-5.584.953H.5a.5.5 0 0 0 0 1h.541A3 3 0 0 0 7 8a1 1 0 0 1 2 0 3 3 0 0 0 5.959.5h.541a.5.5 0 0 0 0-1h-.541a3 3 0 0 0-5.584-.953A1.993 1.993 0 0 0 8 6c-.532 0-1.016.208-1.375.547M14 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0'/>
                      </svg>
                  </button>
                  </form>
                  

                 


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
            <th>COMUNIDAD</th>
            <th>RADIO</th>
            <th>VIVIENDAS</th>
            <th>GOOGLE MAP</th>
            <th>OBSERVACIONES</th>
                <th>ACCIONES</th>
            </thead>';
            while ($data3 = $data->fetch()) {
                echo "
                <tr>       
                <td>".$data3[3]."</td> 
                <td>".$data3[4]." 🗺️</td>
                <td>".$data3[7]." 🏘️</td>  
                ".($data3[8]=="SI" ? ("<td style='background-color: #C0E5B9'>".$data3[8]."</td>") : (" <td style='background-color: #F17F7B'>".$data3[8]."</td>"))."
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
                <button type='submit' class='btn  mx-1 buttonCrearFicha colorBoton colorBotonesCambio'>
                  <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eyeglasses' viewBox='0 0 16 16'>
                  <path d='M4 6a2 2 0 1 1 0 4 2 2 0 0 1 0-4m2.625.547a3 3 0 0 0-5.584.953H.5a.5.5 0 0 0 0 1h.541A3 3 0 0 0 7 8a1 1 0 0 1 2 0 3 3 0 0 0 5.959.5h.541a.5.5 0 0 0 0-1h-.541a3 3 0 0 0-5.584-.953A1.993 1.993 0 0 0 8 6c-.532 0-1.016.208-1.375.547M14 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0'/>
                  </svg>
              </button>
              </form>



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
            $("#EditarEncabezado").load("view/Operaciones/GestionProyectos/FichaComunitaria/GestonTerritorial.FormularioEditarCabezado.php",{
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
        <h5 class="modal-title" id="exampleModalLabel" style="color:white;">Editar Encabezado</h5>
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


<script>
    //:::::::::::::: REGISTRANDO PERSONAL DEL PROYECTO :::::::::::::::::::::::::::::::::::::::
    $("#btnEditarCambios").click(function() {
          // document.getElementById("botonCargando").style.display="";
            $.post("process/index.php", {
                process: "proyectos",
                action: "updateFichaGeneral",
                
                
                //cboDepartment: $("#cboDepartment").val(), 
                //cboMunicipality: $("#cboMunicipality").val(), 
                nombreComunidad: $("#nombreComunidad").val(), 
                radio: $("#radio").val(), 
                ubicacion : $("#ubicacion").val(),
                coordenadas : $("#coordenadas").val(),
                totalviviendas : $("#totalviviendas").val(),
                casacomunal : $("#casacomunal").val(),
                centroalcance : $("#centroalcance").val(),
                OBSERVACIONES: $("#OBSERVACIONES").val(),
                descripcionCasaComunal: $("#descripcionCasaComunal").val(),
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