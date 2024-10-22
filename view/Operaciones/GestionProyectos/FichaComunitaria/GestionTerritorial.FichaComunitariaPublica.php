<style>
     .fondoImagen {
    margin: 0;
    padding: 0;
    background-image: url('assets/images/manos.jpg'); /* Reemplaza 'ruta_de_tu_imagen.jpg' con la ruta de tu imagen de fondo */
    background-size: cover;
    background-position: center;
    height: 40vh;
    
    display: flex;
    align-items: center;
    justify-content: center;
    
}
@media only screen and (max-width: 600px){
    .fondoImagen{
        height: 10vh;
    }
}
.tamañoLogoFusalmo{
    width: 50%;
}
.tamañoLogo{
    width: 1%;
    }

@media only screen and (max-width: 600px){
    .tamañoLogoFusalmo{
        width: 10%;
    }
    .bloqueVersion{
    display: none;
    }
   
}
.tamañoLogo{
    width: 20%;
}
.colorBotones{
    background-color: white;
}
.tamañoLetraDetalle{
    font-weight: 800;
    font-size: 44px;
}
</style>
<?php
$ano_actual = date("Y");
?>
<div class="fondoImagen">
      
<div class="row">
    <div class="col-md-8">
    <h1 style="color: white;" class="mx-3 colorTextoFondo tamañoLetraDetalle">Ficha Comunitaria<br>
        FUSALMO  <?php echo $ano_actual; ?>
    </h1>
    </div>
    <div class="col-md">
    <div class="colorTextoFondo ">
    
    <!--<div class="col-md-3 ">
        <a type="button" class="btn  btn-sm mt-3 mb-3 colorBotones"  data-bs-toggle="modal" data-bs-target="#exampleModal">
       NUEVO REGISTRO</a>
    </div>-->

    <div class="col-md-3 ">
        <a type="button" href="?view=fichaComunitariaGraficas" class="btn  btn-sm mt-3 mb-3 colorBotones"  >
       📊      GRAFICAS </a>
    </div>

    

    <div class="col-md-6  " style="background-color: while;">
        <img src="assets/images/LogoFusalmo.png" class="fondoColor mt-4 tamañoLogoFusalmo"  />
        <br/><p style="color:black;" class="bloqueVersion">Version 1.0.0</p>
    </div>
</div>
    </div>
</div>
    



    </div>

    <div id="loadListaListaComunitaria"></div>





    <style>
    .colorEncabezadoLista{
        background-color: #4F6FAE;
    }
    .TAMAÑOMODAL{
        width: 1200px;
    }
    .modal-dialog{
        width: 1200px;
    }
</style>
    <!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg"   >
    <div class="modal-content ">
      <div class="modal-header colorEncabezadoLista">
        <h5 class="modal-title" id="exampleModalLabel" style="color:white;">FICHA COMUNITARIA FUSALMO</h5>
        <button type="button" class="close btn" data-bs-dismiss="modal" aria-bs-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
    

    <div class="row">
    <div class="col">
    <div class="mb-3">
    <div class="form-group" id="departamentoEmpresa" >
			<label for="formGroupExampleInput2">1]- Departamento: </label>
			<select required class="form-control form-control-sm" name="cboDepartment" id="cboDepartment" class="form-control form-control-sm">
						<option value="NA">SELECCIONE </option>
						<option value="Ahuachapan">Ahuachapán</option>
                        <option value="Santa Ana">Santa Ana</option>
                        <option value="Sonsonate">Sonsonate</option>
                        <option value="La Libertad">La Libertad</option>
                        <option value="Chalatenango">Chalatenango</option>
                        <option value="La Paz">La Paz</option>
                        <option value="San Salvador">San Salvador</option>
                        <option value="Cuscatlan">Cuscatlán</option>
                        <option value="Caba&ntilde;as">Cabañas</option>
                        <option value="San Vicente">San Vicente</option>
                        <option value="Usulutan">Usulután</option>
                        <option value="San Miguel">San Miguel</option>
                        <option value="Morazan">Morazán</option>
                        <option value="La Union">La Unión</option>
			</select>
		</div>
      </div>
      <div class="mb-3">
      <label for="cboMunicipality" class="form-label">2]- Municipio:  </label>
            <select required class="form-control form-control-sm"  name="cboMunicipality" aria-label="Default select example" id="cboMunicipality" name="cboMunicipality" required>
			</select>
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label">3]- Nombre Comunidad</label>
        <input class="form-control form-control-sm" id="nombreComunidad"type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label">4]- Radio</label>
        <input class="form-control form-control-sm"id="radio" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label">5]- Ubicación</label>
        <input class="form-control form-control-sm"id="ubicacion" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label">6]- Coordenadas</label>
        <input class="form-control form-control-sm"id="coordenadas" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
      </div>
  </div>


  <div class="col">
  <div class="mb-3">
        <label for="formFile" class="form-label">7]- Total Viviendas</label>
        <input class="form-control form-control-sm" id="totalviviendas"type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label">8]- Casa Comunal</label>
        <select required class="form-control form-control-sm" name="cboDepartment" id="casacomunal" class="form-control form-control-sm">
            <option >No</option>
			<option >Sí</option>            
		</select>
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label">9]- Descripción Casa Comunal</label>
        <textarea rows="2" type="text" maxlength="200" class="form-control form-control-sm" id="descripcionCasaComunal" placeholder="name@example.com"></textarea>
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label">10]- Centro Alcance</label>
        <input class="form-control form-control-sm" id="centroalcance" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
      </div>
      
      <!--<div class="mb-3">
        <label for="formFile" class="form-label">11]- SEDE</label>
            <select required class="form-control form-control-sm" name="sede" id="sede" class="form-control form-control-sm">
                        <option value="Santa Ana">Santa Ana</option>
                        <option value="Soyapando">Soyapango </option>
                        <option value="San Miguel">San Miguel</option>
			</select>
      </div>-->
      <div class="mb-3">
        <label for="formFile" class="form-label">12]- OBSERVACIONES</label>
            <textarea rows="2" type="text" maxlength="200" class="form-control form-control-sm" id="OBSERVACIONES" placeholder="name@example.com"></textarea>
      </div>
  </div>
</div>







      
      
     
      
    
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="btnCerrar"data-bs-dismiss="modal">Close</button>
        <button type="button"id="bntGuardar" class="btn btn-primary">Save changes</button>
      </div>
      <a class="btn btn-success" id="botonCargando"  style="display:none;"type="button" disabled>
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Loading...
    </a>
    </div>
  </div>
</div>
<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>



<script>

 $("#loadListaListaComunitaria").load("view/Operaciones/GestionProyectos/FichaComunitaria/GestionTerritorial.TablaComunitariaPublica.php",{
        idRelacion : $("#idRelacionProyecto").val()
    });

    //:::::::::::::: REGISTRANDO PERSONAL DEL PROYECTO :::::::::::::::::::::::::::::::::::::::
    $("#bntGuardar").click(function() {
           document.getElementById("botonCargando").style.display="";
            $.post("process/index.php", {
                process: "proyectos",
                action: "addFichaGeneral",
                
                
                cboDepartment: $("#cboDepartment").val(), 
                cboMunicipality: $("#cboMunicipality").val(), 
                nombreComunidad: $("#nombreComunidad").val(), 
                radio: $("#radio").val(), 
                ubicacion : $("#ubicacion").val(),
                coordenadas : $("#coordenadas").val(),
                totalviviendas : $("#totalviviendas").val(),
                casacomunal : $("#casacomunal").val(),
                centroalcance : $("#centroalcance").val(),
                //nombrecentroalcance : $("#nombrecentroalcance").val(),
                //sede : $("#sede").val(),
                OBSERVACIONES: $("#OBSERVACIONES").val(),
                descripcionCasaComunal: $("#descripcionCasaComunal").val()
            },
            function(response){
                if(response)
                {
                    document.getElementById("botonCargando").style.display="none";
                $.toast({
                    heading: 'Finalizado',
                    text: 'Registro agregado 😁',
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: 5000, 
                    position: 'bottom-center'
                });
                document.getElementById("btnCerrar").click();
                $("#loadListaListaComunitaria").load("view/PanelProyectos/GestionTerritorial/GestionTerritorialFichaComunitaria/GestionTerritorial.TablaComunitaria.php",{
        idRelacion : $("#idRelacionProyecto").val()
    });
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


$("#cboDepartment").change(function(){
        document.getElementById('cboMunicipality').options.length = 0;
		
        alert($("#cboDepartment :selected").val());
        $.post("functions/loadSelects.php", { data: $("#cboDepartment :selected").val(), action: 'loadMunicipalities' },
            function (resultado) {
                if (resultado == false) {
                    alert("Error");
                }
                else {
                    $('#cboMunicipality').append(resultado);
                }
            }
        );
    });
</script>