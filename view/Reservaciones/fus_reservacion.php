<?php 
include("../../config/net.php");
try{
    $query2 = "SELECT * FROM `fus_reservacion` where estado <= 3";
    $spaces = $net_rrhh->prepare($query2);
     $spaces->execute(); // Ejecuta la consulta
   //echo $result = $spaces->get_result(); // Obtén el resultado de la consulta
    
    $ids = array();
    
   
        // Recorrer los resultados y almacenar los IDs en un array
        while ($row = $spaces->fetch()) {
            $ids[] = array(
                'id' => $row["mesa_seleccionada"],
                'empresa' => $row["nombre_institucion"],
                'estado' => $row["estado"]
            );
        }
                                                                                                                  
    
    // Devolver los IDs en formato JSON
    $ids_json = json_encode($ids);
   // echo "Hola Mundo".$ids_json;
}catch(Exception $e)
{
    echo $e->getMessage();
}  

//VALOR TOMADO DE LA URL para guardar el id del movimiento 
$idEvento = 1;
?>

<div class="position-relative overflow-hidden p-2 p-md-2 m-md-3 text-center bg-light">
    <div class="col-md-12 p-lg-2 mx-auto my-1">
      <h1 class="display-4 fw-normal">SISTEMA DE RESERVACIÓN</h1>
      <p class="lead fw-normal">V 1.0.0</p>
     
    </div>
    <div class="product-device shadow-sm d-none d-md-block">
   <!--<a type="button" class="btn  btn-sm  " style="background-color: #1A4262; color:white;"  data-bs-toggle="modal" data-bs-target="#exampleModalSddAdmin">
    Reservar Administrador</a>-->

    </div>
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-paint-bucket" viewBox="0 0 16 16">
  <path d="M6.192 2.78c-.458-.677-.927-1.248-1.35-1.643a3 3 0 0 0-.71-.515c-.217-.104-.56-.205-.882-.02-.367.213-.427.63-.43.896-.003.304.064.664.173 1.044.196.687.556 1.528 1.035 2.402L.752 8.22c-.277.277-.269.656-.218.918.055.283.187.593.36.903.348.627.92 1.361 1.626 2.068.707.707 1.441 1.278 2.068 1.626.31.173.62.305.903.36.262.05.64.059.918-.218l5.615-5.615c.118.257.092.512.05.939-.03.292-.068.665-.073 1.176v.123h.003a1 1 0 0 0 1.993 0H14v-.057a1 1 0 0 0-.004-.117c-.055-1.25-.7-2.738-1.86-3.494a4 4 0 0 0-.211-.434c-.349-.626-.92-1.36-1.627-2.067S8.857 3.052 8.23 2.704c-.31-.172-.62-.304-.903-.36-.262-.05-.64-.058-.918.219zM4.16 1.867c.381.356.844.922 1.311 1.632l-.704.705c-.382-.727-.66-1.402-.813-1.938a3.3 3.3 0 0 1-.131-.673q.137.09.337.274m.394 3.965c.54.852 1.107 1.567 1.607 2.033a.5.5 0 1 0 .682-.732c-.453-.422-1.017-1.136-1.564-2.027l1.088-1.088q.081.181.183.365c.349.627.92 1.361 1.627 2.068.706.707 1.44 1.278 2.068 1.626q.183.103.365.183l-4.861 4.862-.068-.01c-.137-.027-.342-.104-.608-.252-.524-.292-1.186-.8-1.846-1.46s-1.168-1.32-1.46-1.846c-.147-.265-.225-.47-.251-.607l-.01-.068zm2.87-1.935a2.4 2.4 0 0 1-.241-.561c.135.033.324.11.562.241.524.292 1.186.8 1.846 1.46.45.45.83.901 1.118 1.31a3.5 3.5 0 0 0-1.066.091 11 11 0 0 1-.76-.694c-.66-.66-1.167-1.322-1.458-1.847z"/>
</svg>
    <span class="badge  text-dark" style="background-color: #E5F3D2; border-radius:12px;">disponible</span>
    <span class="badge  text-dark" style="background-color: #E5999A; border-radius:12px;">ocupado</span>
    <span class="badge  text-dark" style="background-color: #E6E6E6; border-radius:12px;">bloqueado</span>
    <span class="badge  text-dark" style="background-color: #FFFC00; border-radius:12px;">seleccinado</span>
  </div>

  <style>

#container {
    position: relative;
    width: 90vw; /* Ancho relativo al viewport */
    height: 80vh; /* Altura relativa al viewport */
    margin: 0 auto;
    overflow: hidden;
}

.button {
    position: absolute;
    margin-top: 2vh; /* Usar unidades relativas */
    margin-left: 15vw; /* Ajuste relativo para centrado en pantalla grande */
    border: 2px solid green;
    background-color: #E5F3D2;
    cursor: pointer;
    color: black;
    text-align: center;
    z-index: 2;
    width: 5vw; /* Tamaño relativo para adaptabilidad */
    height: 5vh; /* Tamaño relativo para adaptabilidad */
    font-size: 0.9vw; /* Fuente relativa para escalado */
}

@media (max-width: 1400px) {
    /* Ajustes para pantallas más pequeñas */
    .button {
        margin-top: 3.8vh;
        margin-left: 12vw;
        width: 7vw;
        height: 7vh;
        font-size: 1vw;
    }
}

@media (min-width: 1401px) {
    /* Ajustes para pantallas muy grandes */
    .button {
        margin-top: 8.5vh;
        margin-left: 17vw;
        width: 4vw;
        height: 4vh;
        font-size: 0.8vw;
    }
}


.image1 {
    position: absolute; /* Posiciona la imagen de manera absoluta */
    top: 0;
    left: 0;
    width: 100%; /* Asegúrate de que la imagen cubra todo el contenedor */
    height: 100%; /* Asegúrate de que la imagen cubra todo el contenedor */
    z-index: 1; /* Imagen en el fondo */
}
.image2 {
    /*position: absolute;  Posiciona la imagen de manera absoluta */
    top: 0;
    left: 0;
    width: 110%; /* Asegúrate de que la imagen cubra todo el contenedor */
    height: 100%; /* Asegúrate de que la imagen cubra todo el contenedor */
    z-index: 1; /* Imagen en el fondo */
}



  </style>
  <div class="container">
<div id="container2">
<img src="view/Reservaciones/CROQUIS MULTIGIMNASIO.png" class="image2" alt="Imagen" id="image">
  
</div>
  </div>


  <div class="row">
    <div class="col-md-1">
    <div class="row">
        <div class="col-md-12">
            <div id="container">
                
            </div>
        </div>
    </div>

    </div>
    <div class="col-md-8">

    <div id="tablaProcesoFinalizados"></div>
<!--<div class="pagination" id="pagination"></div>-->

  </div>
    </div>
  </div>




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>



<!-- Bootstrap CSS -->
<button id="toastAlerta" style="display: none;">clic me</button>

<script>

function loadPage(page) {
        $.ajax({
            url: 'view/Reservaciones/lista_empresas.php',
            type: 'POST',
            data: { page: page },
            dataType: 'json',
            success: function(response) {
                $('#tablaProcesoFinalizados').html(response.data);

                // Crear enlaces de paginación
                let paginationHtml = '';
                for (let i = 1; i <= response.totalPages; i++) {
                    paginationHtml += '<a href="#" class="' + (i === response.currentPage ? 'active' : '') + ' btn btn-success mx-1" onclick="loadPage(' + i + ')">' + i + '</a>';
                }
                $('#pagination').html(paginationHtml);
            }
        });
    }

    // Cargar la primera página por defecto
    $(document).ready(function() {
        loadPage(1);
    });
 let previousButton = null;
$(document).ready(function(){

// Inicialización del Popover

$('[data-toggle="popover"]').popover({

trigger: 'hover', // Mostrar el popover al pasar el mouse

html: true // Permitir contenido HTML

});

});

document.addEventListener("DOMContentLoaded", function() {
    const container = document.getElementById('container');
    const container2 = document.getElementById('container2');
    var idsToStyle = <?php echo $ids_json; ?>;
    console.log(idsToStyle);
    
    function createButton(id, x, y, width, height) {
        const button = document.createElement('button');
        button.className = 'button';
        button.id = id;
        button.style.left = `${x}px`;
        button.style.top = `${y}px`;
        button.style.width = `${width}px`;
        button.style.height = `${height}px`;
        button.innerText = id;
        button.style.fontSize = '9px';
// Agregar atributos para el popover
button.setAttribute('data-toggle', 'popover');
            button.setAttribute('title', 'ÁREAS QUE INCLUYE');
           


      

button.addEventListener('click', function() {
    const buttonId = button.id;

    let isReserved = idsToStyle.some(space => space.id === buttonId);
    
    if (isReserved) {
        $("#toastAlerta").click();
    } else {
        // Desmarcar el botón anterior, si existe
        if (previousButton) {
            previousButton.style.backgroundColor = '';
        }

        // Marcar el botón actual
        button.style.backgroundColor = '#FFFC00';

       

        // Mostrar el modal
        const modal = new bootstrap.Modal(document.getElementById('exampleModalSdd'));
        modal.show();

        const conocidoComoInput = document.getElementById('conocidoComo2');
        conocidoComoInput.value = buttonId;

         // Guardar el botón actual como el último seleccionado
         previousButton = button;
    }
});


        container.appendChild(button);
        container2.appendChild(button);
    }

    const numButtonsPerColumn = 10;
    const columnsPerGroup = 2;
    const buttonSize = 24;
    const spacingX = 10;
    const spacingY = 5;
    const groupSpacing = 50;

    const numGroups = 5;
    let sumadorMesa = 0;
    for (let group = 0; group < numGroups; group++) {
        for (let row = 0; row < numButtonsPerColumn; row++) {
            for (let col = 0; col < columnsPerGroup; col++) {
                sumadorMesa++;
                const id = `${sumadorMesa}`;
                const x = 225+col * (buttonSize + spacingX) + group * (columnsPerGroup * (buttonSize + spacingX) + groupSpacing);
                const y =492+row * (buttonSize + spacingY);
                createButton(id, x, y, buttonSize, buttonSize);
            }
        }
    }

    idsToStyle.forEach(space => {
    const button = document.getElementById(space.id);
    if(space.estado == 2)
    {
        if (button) {
        button.style.backgroundColor = 'rgba(255, 252, 0 )';
        button.style.border = '2px solid #A79252';
        button.setAttribute('data-toggle', 'popover');
        button.setAttribute('title', `EN PROCESO DE APROBACIÓN: `);
        button.setAttribute('data-bs-content',`${space.empresa}`)
    }
    }
    else if (space.estado == 3)
    {
        if (button) {
        button.style.backgroundColor = 'rgba(255, 0, 0, 0.3)';
        button.style.border = '2px solid red';
        button.setAttribute('data-toggle', 'popover');
        button.setAttribute('title', `EMPRESA APROBADA: `);
        button.setAttribute('data-bs-content',`${space.empresa}`)
    }
    }
   
});

});

</script>

<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap Bundle with Popper -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>


<!-- Modal -->

<div class="modal fade" id="exampleModalSdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
  <div class="modal-content  ">
      <div class="modal-header colorNuevoProyecto">
      <h4 class="modal-title " id="exampleModalLabel" style="color:white; font-weight: 800;">
        Registrando Nuevo Proyecto</h4>
      <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
    </div>

    <div class="modal-body"> 

    <div class="mb-3">
        <input value="<?= $idEvento;?>" disabled class="form-control form-control-sm" type="hidden" id="inputEventoValor" placeholder="escribir" aria-label=".form-control-sm example">
    </div>

    <div class="mb-3">
        <input  value="<?= date("Y");?>" disabled class="form-control form-control-sm" type="hidden" id="inputYearValor" placeholder="escribir" aria-label=".form-control-sm example">
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">NOMBRE DE LA INSTITUCIÓN: </label>
        <input class="form-control form-control-sm" type="text" id="nombreInstitucion" placeholder="escribir" aria-label=".form-control-sm example">
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">TIPO: </label>
        <select class="form-select form-select-sm" id="tipoEmpresa" aria-label=".form-select-sm example">
            <option selected>Seleccionar</option>
            <option value="Institucion">Institución</option>
            <option value="Empresa">Empresa</option>
            <option value="Organizacion">Organización</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">NOMBRE DE CONTACTO: </label>
        <input class="form-control form-control-sm" type="text" id="nombreContacto" placeholder="escribir" aria-label=".form-control-sm example">
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">CORREO: </label>
        <input class="form-control form-control-sm" oninput="validarCorreo(this, mensajeError5)" type="text" id="correoEmpresa" placeholder="escribir" aria-label=".form-control-sm example">
        <p id="mensajeError5"></p>  
    </div>
    

    <div class="mb-3">
        <label for="formFile" class="form-label">MESA SELECCIONADA: </label>
        <input class="form-control form-control-sm" disabled type="text" id="conocidoComo2" placeholder="escribir" aria-label=".form-control-sm example">
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">TIPO DE OPORTUNIDAD: </label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
            <label class="form-check-label" for="inlineCheckbox1">Laborales</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
            <label class="form-check-label" for="inlineCheckbox2">Educativas</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option2">
            <label class="form-check-label" for="inlineCheckbox3">Voluntariado</label>
        </div>
    </div>

    <!--:::::::::::::::::::::::::::::  LABORAL   :::::::::::::::::-->
    <div id="blocLaboral">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">CANTIDAD DE PLAZAS</label>
        <input type="number" class="form-control form-control-sm" oninput="validarNumero(this,mensajeError3)" pattern="^[0-9]+$" id="cantidadPlaza" placeholder="escribir">
        <p id="mensajeError3"></p>   
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">DESCRIPCIÓN</label>
        <textarea class="form-control" maxlength="1500" id="descripcionPlaza" rows="3"></textarea>
        <div id="charCount2"  style="background-color: #CFE2FF; border-radius:5px;">0/1500 caracteres</div>
        <script>
document.getElementById('descripcionPlaza').addEventListener('input', function() {
    // Obtiene el número de caracteres en el textarea
    var charCount2 = this.value.length;
    
    // Actualiza el div con el número de caracteres
    document.getElementById('charCount2').innerText = charCount2 + '/1200 caracteres';
});
</script>
    </div>
    </div>
    


    <!--:::::::::::::::::::::::::::::  EDUCATIVAS   :::::::::::::::::-->
    <div id="blocEducativas">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">CANTIDAD DE CURSOS</label>
        <input type="number" oninput="validarNumero(this,mensajeError4)" pattern="^[0-9]+$" class="form-control form-control-sm" id="cantidadCursos" placeholder="escribir">
        <p id="mensajeError4"></p>   
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">DESCRIPCIÓN</label>
        <textarea class="form-control" id="descripcionCursos" rows="3"></textarea>
        <div id="charCount3"  style="background-color: #CFE2FF; border-radius:5px;">0/1500 caracteres</div>
        <script>
document.getElementById('descripcionCursos').addEventListener('input', function() {
    // Obtiene el número de caracteres en el textarea
    var charCount3 = this.value.length;
    
    // Actualiza el div con el número de caracteres
    document.getElementById('charCount3').innerText = charCount3 + '/1200 caracteres';
});
</script>
    </div>
    </div>
    


    <div class="modal-footer">
    <a type="button" id="btnCerrarModal"  class="btn btn-sm btn-danger" data-bs-dismiss="modal">Cancelar</a>
      <button type="button" id="btnRegistrarReservacion" class="btn btn-success btn-sm">Registrar Reservación</button>
    </div>
  <a class="btn btn-success" id="botonCargando"  style="display:none;"type="button" disabled>
      <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
      Loading...
  </a>
  </div>
</div>
</div>
</div>

<!--:::::::::::::::::::: RESERVAR ADMIN :::::::::::::::::::::::::::-->

<div class="modal fade" id="exampleModalSddAdmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
  <div class="modal-content  ">
      <div class="modal-header colorNuevoProyecto">
      <h4 class="modal-title " id="exampleModalLabel" style="color:white; font-weight: 800;">
        Registrando Nuevo Proyecto</h4>
      <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
    </div>

    <div class="modal-body">

    <div class="mb-3">
        <label for="formFile" class="form-label">NOMBRE DE LA INSTITUCIÓN: </label>
        <input class="form-control form-control-sm" type="text" id="nombreInstitucion2" placeholder="escribir" aria-label=".form-control-sm example">
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">TIPO: </label>
        <select class="form-select form-select-sm" id="tipoEmpresa2" aria-label=".form-select-sm example">
            <option value="">Seleccionar</option>
            <option value="Institucion">Institución</option>
            <option value="Empresa">Empresa</option>
            <option value="Organizacion">Organización</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">NOMBRE DE CONTACTO: </label>
        <input class="form-control form-control-sm" type="text" id="nombreContacto2" placeholder="escribir" aria-label=".form-control-sm example">
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">CORREO: </label>
        <input class="form-control form-control-sm" type="text" id="correoEmpresa2" placeholder="escribir" aria-label=".form-control-sm example">
    </div>


    <div class="mb-3" >
        <label for="formFile" class="form-label">Tipo Registro: </label>
        <select class="form-select form-select-sm" id="tipoEstado" aria-label=".form-select-sm example">
        <option value="3">Premium</option>
            <option value="2">Normal</option>
        </select>
    </div>
    

    <div class="mb-3">
        <label for="formFile" class="form-label">MESA SELECCIONADA: </label>
        <input class="form-control form-control-sm"  type="text" id="conocidoComo3" placeholder="escribir" aria-label=".form-control-sm example">
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">TIPO DE OPORTUNIDAD: </label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="option1">
            <label class="form-check-label" for="inlineCheckbox4">Laborales</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="option2">
            <label class="form-check-label" for="inlineCheckbox5">Educativas</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox6" value="option2">
            <label class="form-check-label" for="inlineCheckbox6">Voluntariado</label>
        </div>
    </div>

    <!--:::::::::::::::::::::::::::::  LABORAL   :::::::::::::::::-->
    <div id="blocLaboral2">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">CANTIDAD DE PLAZAS</label>
        <input type="number" oninput="validarNumero(this,mensajeError)" pattern="^[0-9]+$"  class="form-control form-control-sm" id="cantidadPlaza2" placeholder="escribir">
        <p id="mensajeError"></p>   
    
    
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">DESCRIPCIÓN</label>
        <textarea class="form-control" id="descripcionPlaza2" rows="3"></textarea>
    </div>
    </div>
    


    <!--:::::::::::::::::::::::::::::  EDUCATIVAS   :::::::::::::::::-->
    <div id="blocEducativas2">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">CANTIDAD DE CURSOS</label>
        <input type="number" oninput="validarNumero(this,mensajeError2)" pattern="^[0-9]+$"  class="form-control form-control-sm" id="cantidadCursos2" placeholder="escribir">
        <p id="mensajeError2"></p>   
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">DESCRIPCIÓN</label>
        <textarea class="form-control" id="descripcionCursos2" rows="3"></textarea>
    </div>
    </div>
    


    <div class="modal-footer">
    <a type="button" id="btnCerrarModal2"  class="btn btn-sm btn-danger" data-bs-dismiss="modal">Cancelar</a>
      <button type="button" id="btnRegistrarReservacion2" class="btn btn-success btn-sm">Registrar Reservación</button>
    </div>
  <a class="btn btn-success" id="botonCargando"  style="display:none;"type="button" disabled>
      <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
      Loading...
  </a>
  </div>
</div>
</div>
</div>



<!--:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
<!-- Después, incluye el CSS y JS de jQuery Toast Plugin -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>

<script src="view/Monitoreo/ExpresionRegular.js"></script>



<script>
   $(document).ready(function() {
    // Añadir evento de cambio al checkbox
    $("#inlineCheckbox1").change(function() {
      // Verificar si el checkbox está marcado
      if ($(this).prop('checked')) {
        // El checkbox está marcado
        $("#blocLaboral").css("display", "block");
      } else {
        // El checkbox no está marcado
        $("#blocLaboral").css("display", "none");
      }
    });


    $("#inlineCheckbox2").change(function() {
      // Verificar si el checkbox está marcado
      if ($(this).prop('checked')) {
        // El checkbox está marcado
        $("#blocEducativas").css("display", "block");
      } else {
        // El checkbox no está marcado
        $("#blocEducativas").css("display", "none");
      }
    });

    // Verificar el estado inicial del checkbox
    if ($("#inlineCheckbox1").prop('checked')) {
      // El checkbox está marcado
      $("#blocLaboral").css("display", "block");
    } else {
      // El checkbox no está marcado
      $("#blocLaboral").css("display", "none");
    }


    if ($("#inlineCheckbox2").prop('checked')) {
      // El checkbox está marcado
      $("#blocEducativas").css("display", "block");
    } else {
      // El checkbox no está marcado
      $("#blocEducativas").css("display", "none");
    }
  });




  //::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
  $(document).ready(function() {
    // Añadir evento de cambio al checkbox
    $("#inlineCheckbox4").change(function() {
      // Verificar si el checkbox está marcado
      if ($(this).prop('checked')) {
        // El checkbox está marcado
        $("#blocLaboral2").css("display", "block");
      } else {
        // El checkbox no está marcado
        $("#blocLaboral2").css("display", "none");
      }
    });


    $("#inlineCheckbox5").change(function() {
      // Verificar si el checkbox está marcado
      if ($(this).prop('checked')) {
        // El checkbox está marcado
        $("#blocEducativas2").css("display", "block");
      } else {
        // El checkbox no está marcado
        $("#blocEducativas2").css("display", "none");
      }
    });

    // Verificar el estado inicial del checkbox
    if ($("#inlineCheckbox4").prop('checked')) {
      // El checkbox está marcado
      $("#blocLaboral2").css("display", "block");
    } else {
      // El checkbox no está marcado
      $("#blocLaboral2").css("display", "none");
    }


    if ($("#inlineCheckbox5").prop('checked')) {
      // El checkbox está marcado
      $("#blocEducativas2").css("display", "block");
    } else {
      // El checkbox no está marcado
      $("#blocEducativas2").css("display", "none");
    }
  });


  //::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

  $("#toastAlerta").click(function(){
    $.toast({
                    heading: 'Finalizado',
                    text:'Mesa Reservada ',
                    showHideTransition: 'slide',
                    icon: 'warning',
                    hideAfter: 3000, 
                    position: 'bottom-center'
            
                });
  })


$("#btnRegistrarReservacion").click(function(){



    var bandera_validacion = 0;

if($("#nombreInstitucion").val() == " ")
{
    bandera_validacion = 1;
}
if($("#tipoEmpresa").val() == "")
{

}
if($("#nombreContacto").val() == "")
{

}
if($("#correoEmpresa").val())
{

}
if($("#conocidoComo2").val())
{

}
if($("#inlineCheckbox1").val()=="" && $("#inlineCheckbox2").val()=="" && $("#inlineCheckbox3").val()=="")
{

}


  $.post("process/index.php", {
                    
    process: "reservacion",
action: "fus_reservacion_add",

nombreInstitucion: $("#nombreInstitucion").val(), 
tipoEmpresa: $("#tipoEmpresa").val(), 
nombreContacto: $("#nombreContacto").val(), 
correoEmpresa: $("#correoEmpresa").val(), 
conocidoComo2: $("#conocidoComo2").val(), 
inlineCheckbox1: $("#inlineCheckbox1").is(":checked") ? 1 : 0, 
inlineCheckbox2: $("#inlineCheckbox2").is(":checked") ? 1 : 0, 
inlineCheckbox3: $("#inlineCheckbox3").is(":checked") ? 1 : 0, 
cantidadPlaza: $("#cantidadPlaza").val() || 0,
descripcionPlaza : $("#descripcionPlaza").val(),
cantidadCursos : $("#cantidadCursos").val() || 0,
descripcionCursos : $("#descripcionCursos").val(),
inputYearValor  :  $("#inputYearValor").val(),
inputEventoValor : $("#inputEventoValor").val()



                },
            
            function(response){
            
               
                if(response)
            
                {
                    $("#spinerCargando").css("display", "none");
                    $("#mensajeTerminado").css("display", "block");
                    document.getElementById("btnCerrarModal").click();
                $.toast({
                    heading: 'Finalizado',
                    text:'Reservacion Registrada ',
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: 3000, 
                    position: 'bottom-center'
            
                });
                // Esperar 6 segundos antes de redirigir
                    setTimeout(function () {
                        window.location.href = "?view=reservacion";
                    }, 4000); // 6000 milisegundos = 6 segundos
            
                }
            
                
            }); 
});


//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
$("#btnRegistrarReservacion2").click(function(){


  $.post("process/index.php", {
                    
    process: "reservacion",
action: "fus_reservacion_add_admin",

nombreInstitucion2: $("#nombreInstitucion2").val(), 
tipoEmpresa2: $("#tipoEmpresa2").val(), 
nombreContacto2: $("#nombreContacto2").val(), 
correoEmpresa2: $("#correoEmpresa2").val(), 
tipoEstado: $("#tipoEstado").val(), 
conocidoComo3: $("#conocidoComo3").val(), 
inlineCheckbox4: $("#inlineCheckbox4").is(":checked") ? 1 : 0, 
inlineCheckbox5: $("#inlineCheckbox5").is(":checked") ? 1 : 0, 
inlineCheckbox6: $("#inlineCheckbox6").is(":checked") ? 1 : 0, 
cantidadPlaza2: $("#cantidadPlaza2").val() || 0,
descripcionPlaza2 : $("#descripcionPlaza2").val(),
cantidadCursos2 : $("#cantidadCursos2").val() || 0,
descripcionCursos2 : $("#descripcionCursos2").val()


                },
            
            function(response){
            
               
                if(response)
            
                {
                    $("#spinerCargando").css("display", "none");
                    $("#mensajeTerminado").css("display", "block");
                    document.getElementById("btnCerrarModal2").click();
                $.toast({
                    heading: 'Finalizado',
                    text:'Reservacion Registrada ',
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: 3000, 
                    position: 'bottom-center'
            
                });
                // Esperar 6 segundos antes de redirigir
                    setTimeout(function () {
                        window.location.href = "?view=reservacion";
                    }, 4000); // 6000 milisegundos = 6 segundos
            
                }
            
                
            }); 
});









//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
</script>