
<div class="container">
<?php
// Obtener la fecha y hora actual del sistema
$fecha_actual = date('Y-m-d');
$hora_actual = date('H:i:s');
$idEmpleado =  $_SESSION['iu'];

$codigoVariable = $fecha_actual.$hora_actual.":".$idEmpleado;
//echo $codigoVariable;
?>
<style>
    .bounce-image {
        animation: bounce 1s infinite;
    }
    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% { 
            transform: translateY(0);
        }
        40% {
            transform: translateY(-20px);
        }
        60% {
            transform: translateY(-5px);
        }
    
}
</style>
<div class="row mt-4">
    <div class="col-md-4">
        

    <div class="form-group mt-1">
        <label for="exampleFormControlTextarea1" style="font-size: 10px;">🏷️ CODIGO UNICO: </label>
        <input disabled class="form-control form-sm" id="idcodigoSolicitud" style="font-size: 10px;" value="<?php echo $fecha_actual.$hora_actual.":".$idEmpleado; ?>" />
    </div>

        <div class="mb-3">
            
        <label for="exampleFormControlTextarea1" class="form-label"> 
            <svg id="idIcono_direccion" xmlns="http://www.w3.org/2000/svg" style="display: none; background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle mt-1 bounce-image" viewBox="0 0 16 16">
            <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
            <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
            </svg> Nombre del arte o campaña : <span style="color: red;">(*) </span>  <div class="col-md">
           
        </div></label>
        <textarea class="form-control" id="idNombreArte" rows="3" placeholder="Escribir.."></textarea>
        </div>

        <div class="row">
            <div class="col-md-5">
                <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" value="Arte Individual" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    Arte individual
                </label>
                </div> 
            </div>
            <div class="col-md-5">
                <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" value="Campaña" id="flexRadioDefault2" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                    Campaña 
                </label>
                </div>
            </div>
        </div>
        
        
        <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-sm " style="background-color: #1A4262; color:white;">Agregar Arte</button>

        <?php
    // Obtener la fecha actual en formato YYYY-MM-DD
    $fechaActual = date('Y-m-d');
?>

<div class="mb-3"> 
    <label for="fhEntrega" class="form-label">
        <svg id="idIcono_direccion2" xmlns="http://www.w3.org/2000/svg" style="display: none; background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle mt-1 bounce-image" viewBox="0 0 16 16">
            <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
            <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
            </svg> Fecha que se requiere : <span style="color: red;">(*)</span></label>
    <input type="date" class="form-control" id="fhEntrega" name="fhEntrega" min="<?php echo $fechaActual; ?>" value="<?php echo $fechaActual; ?>">
</div>


        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Prioridad : <span style="color: red;">(*)</span></label>
            <select class="form-control" id="idPrioridades">
            <option>Baja</option>
            <option>Media</option>
            <option>Alta</option>
            </select>
        </div>
        
        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Comentarios adicionales (opcional)</label>
        <textarea class="form-control" id="idComentariosAdicionales" rows="3" placeholder="Escribir.."></textarea>
        </div>

      
    </div> 
    <div class="col-1 d-flex justify-content-center">
        <hr class="vr align-self-center h-75">
    </div>
    <div class="col-md-7">
<!--:::::::::::::: AQUI VA LA TABLA ::::::::::::::::::-->
<button id="btnRecargar" class="btn btn-light">Recargar Información</button>
    <div id="detalleProductosTabla"></div>

<!--::::::::::::::::::::::::::::: fin de la tabla ::::::::::::::::::::::::::::::-->

    </div>
    <div class="col-md-6">

    </div>
    <div class="col-md-6">
    <button  id="btnRegistrarSolicitudModal"  data-bs-toggle="modal" data-bs-target="#exampleModalProducto"  type="button" style="background-color: #183D5A;color:aliceblue; display:none; float: right;" class="btn btn-primary">Registrar Solicitud</button>
    
    </div>
    
</div>



</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content ">
      <div class="modal-header" style="background-color: #183D5A;color: white;">
        <h5 class="modal-title" id="exampleModalLabel" style="color: white;" >
            <center style="font-size: 20px;">Agregar un Arte</center></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body ">
       
      
      
        <div class="row">
            <div class="col-md-12">
                <div class="form-group mt-1">
                    <label for="exampleFormControlTextarea1" style="font-size: 10px;">🏷️ CODIGO UNICO: </label>
                    <input disabled class="form-control form-sm" id="idcodigoSolicitudDetalle" style="font-size: 10px;" value="<?php echo $fecha_actual.$hora_actual.":".$idEmpleado; ?>" />
                </div>
            </div>
            <!--::::::::::::::::::::::::: RESPECTIVOS PRODUCTOS :::::::::::::::: -->
            <div class="col-md-5">
            <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Selecciona Producto/Servicio</label>
                <select id="idSelecProducto" style="font-size: 11px;" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option value="">SELECCIONAR</option>
                <?php 

                    include("../../config/net.php");
                    $query = "SELECT *  FROM entornos_virtuales_productos";
                    $data3 = $net_rrhh->prepare($query);
                    $data3->execute();
                    if($data3->rowCount()>0)
                    {
                        while ($data = $data3->fetch()) {
                        echo "<option value=".$data[0].">".$data[1]."</option>";
                        }
                    }
                ?>
                
                
                
              <!--  <option selected>Seleccione</option>
                    <option value="Tarjetas de Presentación">Tarjetas de Presentación</option>
                    <option value="Flyers">Flyers</option>
                    <option value="Folletos">Folletos</option>
                    <option value="Afiche/Pósters">Afiche/Pósters</option>
                    <option value="Banners">Banners</option>
                    <option value="Anuncios para Redes Sociales">Anuncios para Redes Sociales</option>
                    <option value="Banners Web">Banners Web</option>
                    <option value="Portadas de Redes Sociales">Portadas de Redes Sociales</option>
                    <option value="Papelería Corporativa">Papelería Corporativa</option>
                    <option value="Catálogos">Catálogos</option>
                    <option value="Revistas">Revistas</option>
                    <option value="Packaging">Packaging</option>
                    <option value="Infografías">Infografías</option>
                    <option value="Presentaciones">Presentaciones</option>
                    <option value="Diseño de Tazas">Diseño de Tazas</option>
                    <option value="Camisetas">Camisetas</option>-->
                </select>
            </div>
            </div>

            <!--:::::::::::::: RESPECTIVAS MEDIDAS DEL PRODUCTO ::::::::::::::: -->
            <div class="col-md-5">
            
            <div class="mb-3" id="bloque1" style="display: block;"><!--:::Tarjeta de presentacion  :::-->
            <label for="exampleFormControlTextarea1" class="form-label">Seleccione las medidas </label>
                <select id="producto1" class="form-select form-select-sm" aria-label=".form-select-sm example">
                    
                   
                </select>
               
            </div>

           

            
            

       

            
            <div class="mb-3" id="bloque18" style="display: none;">
                <label for="exampleFormControlTextarea1" class="form-label">Escribir medidas <span style="color: red;">(*)</span></label>
            <div class="col-md" id="idIcono_direccion6" style="display: none; color: red;">
                <svg  xmlns="http://www.w3.org/2000/svg" style=" background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bounce-image bi bi-exclamation-triangle mt-1" viewBox="0 0 16 16">
                <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                </svg> campo obligatorio
            </div>
                <textarea class="form-control" maxlength="800" id="medidasPersonalizadas" rows="3"></textarea>
                <div class="container">
                    <div id="charCount5"  style="background-color: #CFE2FF; border-radius:5px;">0/800 caracteres</div>
                </div>
                <script>
document.getElementById('medidasPersonalizadas').addEventListener('input', function() {
    // Obtiene el número de caracteres en el textarea
    var charCount4 = this.value.length;
    
    // Actualiza el div con el número de caracteres
    document.getElementById('charCount5').innerText = charCount4 + '/800 caracteres';
});
</script>
            </div>


            </div>

           

            <style>
    .img-preview {
      max-width: 150px;
      margin: 5px;
    }
  </style>      
            <!--:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: -->
            
            <div class="col-md-12">
                <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Brindar Información del arte: <span style="color: red;">(*)</span></label>
                <div class="col-md" id="idIcono_direccion5" style="display: none; color: red;">
                    <svg  xmlns="http://www.w3.org/2000/svg" style=" background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bounce-image bi bi-exclamation-triangle mt-1" viewBox="0 0 16 16">
                    <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                    <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                    </svg> campo obligatorio
                </div>
                <textarea class="form-control" id="informacionDelarte" maxlength="1200" rows="3"></textarea>
                <div class="container">
                    <div id="charCount4"  style="background-color: #CFE2FF; border-radius:5px;">0/1200 caracteres</div>
                </div>
                
                </div>
                <script>
document.getElementById('informacionDelarte').addEventListener('input', function() {
    // Obtiene el número de caracteres en el textarea
    var charCount4 = this.value.length;
    
    // Actualiza el div con el número de caracteres
    document.getElementById('charCount4').innerText = charCount4 + '/1200 caracteres';
});
</script>
            </div>



            <div class="col-md-12">
                <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Copiar carpeta de SharePoint (Imagenes de referencia): <span style="color: red;">(*)</span></label>
                <div class="col-md" id="idIcono_direccion5" style="display: none; color: red;">
                    <svg  xmlns="http://www.w3.org/2000/svg" style=" background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bounce-image bi bi-exclamation-triangle mt-1" viewBox="0 0 16 16">
                    <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                    <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                    </svg> campo obligatorio
                </div>
                <textarea class="form-control" id="informacionDelarte5" maxlength="1200" rows="2"></textarea>
                <div class="container">
                    <div id="charCountImg"  style="background-color: #CFE2FF; border-radius:5px;">0/1200 caracteres</div>
                </div>
                
                </div>
                <script>
document.getElementById('informacionDelarte5').addEventListener('input', function() {
    // Obtiene el número de caracteres en el textarea
    var charCount45 = this.value.length;
    
    // Actualiza el div con el número de caracteres
    document.getElementById('charCountImg').innerText = charCount45 + '/1200 caracteres';
});
</script>
            </div>



   <!--<div class="container mt-3">
    <form  action="process/" method="post" enctype="multipart/form-data">
      <div class="input-group mb-3">
        <input type="hidden" name="process" value="entornos_virtuales"/>
        <input type="hidden" name="action" value="subirDetalleImagenes"/>
        <input type="file" class="form-control" id="inputGroupFile02" name="files[]" multiple>
      </div>
      <div id="preview"></div>
      <button type="submit" class="btn btn-primary">Subir Imágenes</button>
    </form>
  </div>-->




            <div>
                <p><b>Nota: </b> Toda la información ingresada en los requerimientos debe contar con validación por parte del área de comunicaciones y relaciones públicas </p>
            </div>






        </div>





      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" id="btnCerrarProductoDetalle" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" id="btnSaveDetalle"    class="btn  btn-sm btn-primary">Registrar Producto</button>
        <button id="spinerProducto" style="display: none;" class="btn btn-primary" type="button" disabled>
  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
 Registrando información...
</button>  
    
    
    </div>
    </div>
  </div>
</div>

<!--:::::::::::::::::::: MODAL REGISTRAR PRODUCTO ::::::::::::::-->

<div class="modal fade" id="exampleModalProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="row">
                <div class="col-md">
                    <img src="../../../../assets/images/Stock Poses -Mo- (112) 1.png"/>
                </div>
                <div class="col-md">
                <p>Tu solicitud de diseño ha sido recibida correctamente. Nuestro equipo revisará los detalles y te contactará en breve para cualquier aclaración adicional.</p>
                <br/>
                <p>Recuerda que puedes monitorear el progreso de tu solicitud a través de nuestra plataforma en todo momento.</p>
                <p class="mt-2">Una ves aceptado todas las modificasiones se aplicaran como cambios.</p>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" id="btnRegistrarSolicitud"  class="btn btn-sm btn-primary">Confirmar Registro</button>
        <button id="enviandoSolicitudSpiner" style="display: none;" class="btn btn-primary" type="button" disabled>
  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
  Enviando la solicitud...
</button>
      </div>
    </div>
  </div>
</div>



<!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
<!-- Incluye jQuery primero -->

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>



<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



<!-- Después, incluye el CSS y JS de jQuery Toast Plugin -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>



<script>

$(document).ready(function() {

$("#btnRecargar").click(function(){
    $("#detalleProductosTabla").load("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.artes.tabla.productos.detalles.php",{ id_Solicitud: $("#idcodigoSolicitud").val() });

})
$(document).on('click', '#btnDeleteProducto', function(){
    //alert("Alerta");

    $.post("process/index.php",{
        
        process: "entornos_virtuales",
        action :"DeleteDetalleSolicitud", 

        inputIdProducto           : $("#inputIdProducto").val(),
       
    },
    function(response){
        if(response)
        {
            //document.getElementById("btnCerrarProductoDetalle").click();
           $.toast({
            heading: 'Finalizado',
            text: 'Eliminar Producto ',
            showHideTransition: 'slide',
            icon: 'success',
            hideAfter: 2000, 
            position: 'top-center'
            });
            $("#btnCancelarEliminacion").click();
            $("#btnRecargar").click();
          // $("#detalleProductosTabla").load("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.artes.tabla.productos.detalle.php" ,{ id_Solicitud: $("#idSolicitudFormulario").val() });
          // $("#detalleProductosTabla").load("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.artes.tabla.productos.detalles.php",{ id_Solicitud: $("#idcodigoSolicitud").val() });

        }
        else 
        {
            $.toast({
            heading: 'ERROR',
            text: '!! Error !!, No se pudo borrar el producto ',
            showHideTransition: 'slide',
            icon: 'error',
            hideAfter: 4000, 
            position: 'top-center'
            });
        }
        
            
    });


});

/*::::::::::::::: GUARDAR INFORMACION GENERAL ::::::::::::::::::: */
$("#btnRegistrarSolicitud").click(function(){


    document.getElementById("enviandoSolicitudSpiner").style.display="block";
    document.getElementById("btnRegistrarSolicitud").style.display="none";
    var banderaValidacion = 0;
    $("#idIcono_direccion2").css("display","none");
    $("#idIcono_direccion").css("display","none");
    //const selectedOption = $('input[name="flexRadioDefault"]:checked').val();
    //alert('Seleccionado: ' + selectedOption);

    var fechaActual = new Date().toISOString().split('T')[0];

var fechaSeleccionada = $("#fhEntrega").val();

if (fechaSeleccionada >= fechaActual) {
// La fecha es válida (mayor o igual a la actual)
//console.log("Fecha válida");
} else {
banderaValidacion = 1;
$("#idIcono_direccion2").css("display","block");
}


   
    if($("#idNombreArte").val() == "")
    {
        banderaValidacion = 1;
        $("#idIcono_direccion").css("display","block");
    }
    if($("#fhEntrega").val() == "")
    {
        banderaValidacion = 1;
    }
    // Obtener la fecha actual en formato YYYY-MM-DD
    





    if(banderaValidacion == 1)
    {
        $.toast({
            heading: 'Advertencia',
            text: 'Por favor, complete los campos obligatorios.',
            showHideTransition: 'slide',
            icon: 'warning',
            hideAfter: 4000, 
            position: 'top-center'
            });

            document.getElementById("enviandoSolicitudSpiner").style.display="none";
    document.getElementById("btnRegistrarSolicitud").style.display="block";
    }
    else
    {

        $.post("process/index.php",{
        
        process: "entornos_virtuales",
        action :"addEntornosVirtualesEncabezado", 

        idcodigoSolicitud           : $("#idcodigoSolicitud").val(),
        idNombreArte                : $("#idNombreArte").val(),
        radioCampana                : $('input[name="flexRadioDefault"]:checked').val(),
        fhEntrega                   : $("#fhEntrega").val(),
        idPrioridades               : $("#idPrioridades").val(),
        idComentariosAdicionales    : $("#idComentariosAdicionales").val(),
    },
    function(response){
        if(response == 1)
        {
            //document.getElementById("btnCerrarProductoDetalle").click();
           $.toast({
            heading: 'Finalizado',
            text: 'Solicitud Enviada Correctamente',
            showHideTransition: 'slide',
            icon: 'success',
            hideAfter: 2000, 
            position: 'top-center'
            });
            
            setTimeout(function() {
            window.location.href = "https://sii.fusalmo.org/?view=vistaSolicitante";
        }, 3000); // 2000 milisegundos = 2 segundos
          // $("#detalleProductosTabla").load("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.artes.tabla.productos.detalle.php" ,{ id_Solicitud: $("#idSolicitudFormulario").val() });
          // $("#detalleProductosTabla").load("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.artes.tabla.productos.detalles.php",{ id_Solicitud: $("#idcodigoSolicitud").val() });
          //window.location.href = "https://sii.fusalmo.org/?view=vistaSolicitante";
        }
        else if(response == 5)
        {
            $.toast({
            heading: 'ERROR',
            text: '!! Error !!, Debe Ingresar al menos un producto ',
            showHideTransition: 'slide',
            icon: 'error',
            hideAfter: 4000, 
            position: 'top-center'
            });
        }
        else
        {
            $.toast({
            heading: 'ERROR',
            text: '!! Error !!, No se puede crear Modificaciones a un Proyecto Terminado',
            showHideTransition: 'slide',
            icon: 'error',
            hideAfter: 4000, 
            position: 'top-center'
            });
        }
            
    });
    }

});



    $("#detalleProductosTabla").load("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.artes.tabla.productos.detalles.php");


  $("#inputGroupFile02").change(function() {
    $("#preview").empty(); // Limpiar las vistas previas anteriores
    var files = this.files;

    for (var i = 0; i < files.length; i++) {
      (function(file) {
        if (file.type.startsWith('image/')) {
          var reader = new FileReader();
          reader.onload = function(e) {
            var img = $('<img>').attr('src', e.target.result).addClass('img-preview');
            $("#preview").append(img);
          };
          reader.readAsDataURL(file);
        }
      })(files[i]);
    }
  });
});



function validacionMedidaPersonalizada ()
{
    if($("#medidasPersonalizadas").val() === "")
    {
        $.toast({
            heading: 'ERROR',
            text: '!! Error !!, Agregue Medida Personalizada',
            showHideTransition: 'slide',
            icon: 'error',
            hideAfter: 4000, 
            position: 'top-center'
        });
        document.getElementById("idIcono_direccion6").style.display = "";
    }
    else {
        $.toast({
            heading: 'TODO BIEN',
            text: 'Texto permitido',
            showHideTransition: 'slide',
            icon: 'success',
            hideAfter: 4000, 
            position: 'top-center'
        });
        document.getElementById("idIcono_direccion6").style.display = "none";
    }
}

$("#btnSaveDetalle").click(function(){
document.getElementById("btnSaveDetalle").style.display="none";
document.getElementById("spinerProducto").style.display="block";
    var banderaDetalle = 0;
    if($("#idSelecProducto").val() == "")
    {
        banderaDetalle = 1;
    }
    if($("#producto1").val() === "N/A/S")
    {
        if($("#medidasPersonalizadas").val() == "")
        {
            banderaDetalle = 1;
        }
    }
    if($("#producto1").val() == 0)
    {
        banderaDetalle = 1;
    }
    if ($("#informacionDelarte").val() == "")
    {
        banderaDetalle = 1;
    }
    if ($("#informacionDelarte").val() == "") {
        banderaDetalle = 1;
    }

    // Validación del campo #informacionDelarte5
    var texto = $("#informacionDelarte5").val();
    if (texto == "") {
        banderaDetalle = 1; // Campo vacío, marca la bandera
    } else if (!texto.startsWith("https://escuelainnovadorafusalmo.sharepoint.com") && 
               !texto.startsWith("https://escuelainnovadorafusalmo-my.sharepoint.com")) {
        banderaDetalle = 5; // No comienza con las URLs requeridas, marca la bandera
    }
    

    if(banderaDetalle == 1)
    {
        $.toast({
            heading: 'ERROR',
            text: '!! Error !!, Llenar la información obligatoria',
            showHideTransition: 'slide',
            icon: 'error',
            hideAfter: 4000, 
            position: 'top-center'
            });

            document.getElementById("btnSaveDetalle").style.display="block";
document.getElementById("spinerProducto").style.display="none";
    }
    else if(banderaDetalle == 5)
    {
        $.toast({
            heading: 'ERROR',
            text: '!! Error !!, Solo se aceptan carpetas de SHAREPOINT',
            showHideTransition: 'slide',
            icon: 'warning',
            hideAfter: 4000, 
            position: 'top-center'
            });

            document.getElementById("btnSaveDetalle").style.display="block";
document.getElementById("spinerProducto").style.display="none";
    }
   else{
    $.post("process/index.php",{
        
        process: "entornos_virtuales",
        action :"addDetalleSolicitud",  

        idcodigoSolicitudDetalle: $("#idcodigoSolicitudDetalle").val(),
        idSelecProducto: $("#idSelecProducto").val(),
        producto1: $("#producto1").val(),
        medidasPersonalizadas : $("#medidasPersonalizadas").val(),
        informacionDelarte : $("#informacionDelarte").val(),
        informacionDelarte5 : $("#informacionDelarte5").val()
    },
    function(response){
        if(response)
        {
            document.getElementById("btnCerrarProductoDetalle").click();
           $.toast({
            heading: 'Finalizado',
            text: 'Producto Agregado Correctamente',
            showHideTransition: 'slide',
            icon: 'success',
            hideAfter: 2000, 
            position: 'top-center'
            });
            document.getElementById("btnRegistrarSolicitudModal").style.display = "block";
            
          // $("#detalleProductosTabla").load("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.artes.tabla.productos.detalle.php" ,{ id_Solicitud: $("#idSolicitudFormulario").val() });
           $("#detalleProductosTabla").load("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.artes.tabla.productos.detalles.php",{ id_Solicitud: $("#idcodigoSolicitud").val() });
         

    //$("#idcodigoSolicitudDetalle").val() = "";
    $("#idSelecProducto").val("");
$("#producto1").val("");
$("#medidasPersonalizadas").val("");
$("#informacionDelarte").val("");
$("#informacionDelarte5").val("");

document.getElementById("btnSaveDetalle").style.display="block";
document.getElementById("spinerProducto").style.display="none";



        }
        else
        {
            $.toast({
            heading: 'ERROR',
            text: '!! Error !!, No se puede crear Modificaciones a un Proyecto Terminado',
            showHideTransition: 'slide',
            icon: 'error',
            hideAfter: 4000, 
            position: 'top-center'
            });
        }
            
    })
   }
    
});






    $("#producto1").change(function()
    {
        if($(this).val() === "N/A/S"){
            document.getElementById("bloque18").style.display= "";
        }
        else {
            document.getElementById("bloque18").style.display= "none";
        }
    });
    $("#idSelecProducto").change(function()
    {
        if($(this).val() === ""){
            $("#bloque18").css("display","none");
        }
        $("#bloque18").css("display","none");
        
    });
    $("#producto2").change(function()
    {
        if($(this).val() === "N/A/S"){
            document.getElementById("bloque18").style.display= "";
        }
        else {
            document.getElementById("bloque18").style.display= "none";
        }
    });
    $("#producto3").change(function()
    {
        if($(this).val() === "N/A/S"){
            document.getElementById("bloque18").style.display= "";
        }
        else {
            document.getElementById("bloque18").style.display= "none";
        }
    });
    $("#producto4").change(function()
    {
        if($(this).val() === "N/A/S"){
            document.getElementById("bloque18").style.display= "";
        }
        else {
            document.getElementById("bloque18").style.display= "none";
        }
    });
    $("#producto5").change(function()
    {
        if($(this).val() === "N/A/S"){
            document.getElementById("bloque18").style.display= "";
        }
        else {
            document.getElementById("bloque18").style.display= "none";
        }
    });
    $("#producto6").change(function()
    {
        if($(this).val() === "N/A/S"){
            document.getElementById("bloque18").style.display= "";
        }
        else {
            document.getElementById("bloque18").style.display= "none";
        }
    });
    $("#producto7").change(function()
    {
        if($(this).val() === "N/A/S"){
            document.getElementById("bloque18").style.display= "";
        }
        else {
            document.getElementById("bloque18").style.display= "none";
        }
    });
    $("#producto8").change(function()
    {
        if($(this).val() === "N/A/S"){
            document.getElementById("bloque18").style.display= "";
        }
        else {
            document.getElementById("bloque18").style.display= "none";
        }
    });
    $("#producto9").change(function()
    {
        if($(this).val() === "N/A/S"){
            document.getElementById("bloque18").style.display= "";
        }
        else {
            document.getElementById("bloque18").style.display= "none";
        }
    });
    $("#producto10").change(function()
    {
        if($(this).val() === "N/A/S"){
            document.getElementById("bloque18").style.display= "";
        }
        else {
            document.getElementById("bloque18").style.display= "none";
        }
    });
    $("#producto11").change(function()
    {
        if($(this).val() === "N/A/S"){
            document.getElementById("bloque18").style.display= "";
        }
        else {
            document.getElementById("bloque18").style.display= "none";
        }
    });
    $("#producto12").change(function()
    {
        if($(this).val() === "N/A/S"){
            document.getElementById("bloque18").style.display= "";
        }
        else {
            document.getElementById("bloque18").style.display= "none";
        }
    });
    $("#producto13").change(function()
    {
        if($(this).val() === "N/A/S"){
            document.getElementById("bloque18").style.display= "";
        }
        else {
            document.getElementById("bloque18").style.display= "none";
        }
    });
    $("#producto14").change(function()
    {
        if($(this).val() === "N/A/S"){
            document.getElementById("bloque18").style.display= "";
        }
        else {
            document.getElementById("bloque18").style.display= "none";
        }
    });
    $("#producto15").change(function()
    {
        if($(this).val() === "N/A/S"){
            document.getElementById("bloque18").style.display= "";
        }
        else {
            document.getElementById("bloque18").style.display= "none";
        }
    });
    $("#producto16").change(function()
    {
        if($(this).val() === "N/A/S"){
            document.getElementById("bloque18").style.display= "";
        }
        else {
            document.getElementById("bloque18").style.display= "none";
        }
    });
    $("#idSelecProducto").change(function()
    {
        document.getElementById('producto1').options.length = 0;
        $.post("../functions/loadSelects.php", { data: $("#idSelecProducto :selected").val(), action: 'medidasArtes' },
            function (resultado) {
                if (resultado == false) {
                    alert("Error");
                }
                else {
                    $('#producto1').append(resultado);
                }
            } 
        );
        /*
            <option value="Tarjetas de Presentación">Tarjetas de Presentación</option>
            <option value="Flyers">Flyers</option>
            <option value="Folletos">Folletos</option>
            <option value="Afiche/Pósters">Afiche/Pósters</option>
            <option value="Banners">Banners</option>
            <option value="Anuncios para Redes Sociales">Anuncios para Redes Sociales</option>
            <option value="Banners Web">Banners Web</option>
            <option value="Portadas de Redes Sociales">Portadas de Redes Sociales</option>
            <option value="Papelería Corporativa">Papelería Corporativa</option>
            <option value="Catálogos">Catálogos</option>
            <option value="Revistas">Revistas</option>
            <option value="Packaging">Packaging</option>
            <option value="Infografías">Infografías</option>
            <option value="Presentaciones">Presentaciones</option>
            <option value="Diseño de Tazas">Diseño de Tazas</option>
            <option value="Camisetas">Camisetas</option>
        */
        /*if($(this).val() === "Tarjetas de Presentación"){
            document.getElementById("bloque1").style.display= "";
            document.getElementById("bloque2").style.display= "none";
            document.getElementById("bloque3").style.display= "none";
            document.getElementById("bloque4").style.display= "none";
            document.getElementById("bloque5").style.display= "none";
            document.getElementById("bloque6").style.display= "none";
            document.getElementById("bloque7").style.display= "none";
            document.getElementById("bloque8").style.display= "none";
            document.getElementById("bloque9").style.display= "none";
            document.getElementById("bloque10").style.display= "none";
            document.getElementById("bloque11").style.display= "none";
            document.getElementById("bloque12").style.display= "none";
            document.getElementById("bloque13").style.display= "none";
            document.getElementById("bloque14").style.display= "none";
            document.getElementById("bloque15").style.display= "none";
            document.getElementById("bloque16").style.display= "none";
            document.getElementById("bloque17").style.display= "none";
            document.getElementById("bloque18").style.display= "none";
            
        }
        else if($(this).val() === "Flyers")
        {
            document.getElementById("bloque1").style.display= "none";
            document.getElementById("bloque2").style.display= "";
            document.getElementById("bloque3").style.display= "none";
            document.getElementById("bloque4").style.display= "none";
            document.getElementById("bloque5").style.display= "none";
            document.getElementById("bloque6").style.display= "none";
            document.getElementById("bloque7").style.display= "none";
            document.getElementById("bloque8").style.display= "none";
            document.getElementById("bloque9").style.display= "none";
            document.getElementById("bloque10").style.display= "none";
            document.getElementById("bloque11").style.display= "none";
            document.getElementById("bloque12").style.display= "none";
            document.getElementById("bloque13").style.display= "none";
            document.getElementById("bloque14").style.display= "none";
            document.getElementById("bloque15").style.display= "none";
            document.getElementById("bloque16").style.display= "none";
            document.getElementById("bloque17").style.display= "none";
            document.getElementById("bloque18").style.display= "none";
        }
        else if($(this).val() === "Folletos")
        {
            document.getElementById("bloque1").style.display= "none";
            document.getElementById("bloque2").style.display= "none";
            document.getElementById("bloque3").style.display= "";
            document.getElementById("bloque4").style.display= "none";
            document.getElementById("bloque5").style.display= "none";
            document.getElementById("bloque6").style.display= "none";
            document.getElementById("bloque7").style.display= "none";
            document.getElementById("bloque8").style.display= "none";
            document.getElementById("bloque9").style.display= "none";
            document.getElementById("bloque10").style.display= "none";
            document.getElementById("bloque11").style.display= "none";
            document.getElementById("bloque12").style.display= "none";
            document.getElementById("bloque13").style.display= "none";
            document.getElementById("bloque14").style.display= "none";
            document.getElementById("bloque15").style.display= "none";
            document.getElementById("bloque16").style.display= "none";
            document.getElementById("bloque17").style.display= "none";
            document.getElementById("bloque18").style.display= "none";
        }
        else if($(this).val() === "Afiche/Pósters")
        {
            document.getElementById("bloque1").style.display= "none";
            document.getElementById("bloque2").style.display= "none";
            document.getElementById("bloque3").style.display= "none";
            document.getElementById("bloque4").style.display= "";
            document.getElementById("bloque5").style.display= "none";
            document.getElementById("bloque6").style.display= "none";
            document.getElementById("bloque7").style.display= "none";
            document.getElementById("bloque8").style.display= "none";
            document.getElementById("bloque9").style.display= "none";
            document.getElementById("bloque10").style.display= "none";
            document.getElementById("bloque11").style.display= "none";
            document.getElementById("bloque12").style.display= "none";
            document.getElementById("bloque13").style.display= "none";
            document.getElementById("bloque14").style.display= "none";
            document.getElementById("bloque15").style.display= "none";
            document.getElementById("bloque16").style.display= "none";
            document.getElementById("bloque17").style.display= "none";
            document.getElementById("bloque18").style.display= "none";
        }
        else if($(this).val() === "Banners")
        {
            document.getElementById("bloque1").style.display= "none";
            document.getElementById("bloque2").style.display= "none";
            document.getElementById("bloque3").style.display= "none";
            document.getElementById("bloque4").style.display= "none";
            document.getElementById("bloque5").style.display= "";
            document.getElementById("bloque6").style.display= "none";
            document.getElementById("bloque7").style.display= "none";
            document.getElementById("bloque8").style.display= "none";
            document.getElementById("bloque9").style.display= "none";
            document.getElementById("bloque10").style.display= "none";
            document.getElementById("bloque11").style.display= "none";
            document.getElementById("bloque12").style.display= "none";
            document.getElementById("bloque13").style.display= "none";
            document.getElementById("bloque14").style.display= "none";
            document.getElementById("bloque15").style.display= "none";
            document.getElementById("bloque16").style.display= "none";
            document.getElementById("bloque17").style.display= "none";
            document.getElementById("bloque18").style.display= "none";
        }
        else if($(this).val() === "Anuncios para Redes Sociales")
        {
            document.getElementById("bloque1").style.display= "none";
            document.getElementById("bloque2").style.display= "none";
            document.getElementById("bloque3").style.display= "none";
            document.getElementById("bloque4").style.display= "none";
            document.getElementById("bloque5").style.display= "none";
            document.getElementById("bloque6").style.display= "";
            document.getElementById("bloque7").style.display= "none";
            document.getElementById("bloque8").style.display= "none";
            document.getElementById("bloque9").style.display= "none";
            document.getElementById("bloque10").style.display= "none";
            document.getElementById("bloque11").style.display= "none";
            document.getElementById("bloque12").style.display= "none";
            document.getElementById("bloque13").style.display= "none";
            document.getElementById("bloque14").style.display= "none";
            document.getElementById("bloque15").style.display= "none";
            document.getElementById("bloque16").style.display= "none";
            document.getElementById("bloque17").style.display= "none";
            document.getElementById("bloque18").style.display= "none";
        }
        else if($(this).val() === "Banners Web")
        {
            document.getElementById("bloque1").style.display= "none";
            document.getElementById("bloque2").style.display= "none";
            document.getElementById("bloque3").style.display= "none";
            document.getElementById("bloque4").style.display= "none";
            document.getElementById("bloque5").style.display= "none";
            document.getElementById("bloque6").style.display= "none";
            document.getElementById("bloque7").style.display= "";
            document.getElementById("bloque8").style.display= "none";
            document.getElementById("bloque9").style.display= "none";
            document.getElementById("bloque10").style.display= "none";
            document.getElementById("bloque11").style.display= "none";
            document.getElementById("bloque12").style.display= "none";
            document.getElementById("bloque13").style.display= "none";
            document.getElementById("bloque14").style.display= "none";
            document.getElementById("bloque15").style.display= "none";
            document.getElementById("bloque16").style.display= "none";
            document.getElementById("bloque17").style.display= "none";
            document.getElementById("bloque18").style.display= "none";
        }
        else if($(this).val() === "Portadas de Redes Sociales")
        {
            document.getElementById("bloque1").style.display= "none";
            document.getElementById("bloque2").style.display= "none";
            document.getElementById("bloque3").style.display= "none";
            document.getElementById("bloque4").style.display= "none";
            document.getElementById("bloque5").style.display= "none";
            document.getElementById("bloque6").style.display= "none";
            document.getElementById("bloque7").style.display= "none";
            document.getElementById("bloque8").style.display= "";
            document.getElementById("bloque9").style.display= "none";
            document.getElementById("bloque10").style.display= "none";
            document.getElementById("bloque11").style.display= "none";
            document.getElementById("bloque12").style.display= "none";
            document.getElementById("bloque13").style.display= "none";
            document.getElementById("bloque14").style.display= "none";
            document.getElementById("bloque15").style.display= "none";
            document.getElementById("bloque16").style.display= "none";
            document.getElementById("bloque17").style.display= "none";
            document.getElementById("bloque18").style.display= "none";
        }
        else if($(this).val() === "Papelería Corporativa")
        {
            document.getElementById("bloque1").style.display= "none";
            document.getElementById("bloque2").style.display= "none";
            document.getElementById("bloque3").style.display= "none";
            document.getElementById("bloque4").style.display= "none";
            document.getElementById("bloque5").style.display= "none";
            document.getElementById("bloque6").style.display= "none";
            document.getElementById("bloque7").style.display= "none";
            document.getElementById("bloque8").style.display= "none";
            document.getElementById("bloque9").style.display= "";
            document.getElementById("bloque10").style.display= "none";
            document.getElementById("bloque11").style.display= "none";
            document.getElementById("bloque12").style.display= "none";
            document.getElementById("bloque13").style.display= "none";
            document.getElementById("bloque14").style.display= "none";
            document.getElementById("bloque15").style.display= "none";
            document.getElementById("bloque16").style.display= "none";
            document.getElementById("bloque17").style.display= "none";
            document.getElementById("bloque18").style.display= "none";
        }
        else if($(this).val() === "Catálogos")
        {
            document.getElementById("bloque1").style.display= "none";
            document.getElementById("bloque2").style.display= "none";
            document.getElementById("bloque3").style.display= "none";
            document.getElementById("bloque4").style.display= "none";
            document.getElementById("bloque5").style.display= "none";
            document.getElementById("bloque6").style.display= "none";
            document.getElementById("bloque7").style.display= "none";
            document.getElementById("bloque8").style.display= "none";
            document.getElementById("bloque9").style.display= "none";
            document.getElementById("bloque10").style.display= "";
            document.getElementById("bloque11").style.display= "none";
            document.getElementById("bloque12").style.display= "none";
            document.getElementById("bloque13").style.display= "none";
            document.getElementById("bloque14").style.display= "none";
            document.getElementById("bloque15").style.display= "none";
            document.getElementById("bloque16").style.display= "none";
            document.getElementById("bloque17").style.display= "none";
            document.getElementById("bloque18").style.display= "none";
        }
        else if($(this).val() === "Revistas")
        {
            document.getElementById("bloque1").style.display= "none";
            document.getElementById("bloque2").style.display= "none";
            document.getElementById("bloque3").style.display= "none";
            document.getElementById("bloque4").style.display= "none";
            document.getElementById("bloque5").style.display= "none";
            document.getElementById("bloque6").style.display= "none";
            document.getElementById("bloque7").style.display= "none";
            document.getElementById("bloque8").style.display= "none";
            document.getElementById("bloque9").style.display= "none";
            document.getElementById("bloque10").style.display= "none";
            document.getElementById("bloque11").style.display= "";
            document.getElementById("bloque12").style.display= "none";
            document.getElementById("bloque13").style.display= "none";
            document.getElementById("bloque14").style.display= "none";
            document.getElementById("bloque15").style.display= "none";
            document.getElementById("bloque16").style.display= "none";
            document.getElementById("bloque17").style.display= "none";
            document.getElementById("bloque18").style.display= "none";
        }
        else if($(this).val() === "Packaging")
        {
            document.getElementById("bloque1").style.display= "none";
            document.getElementById("bloque2").style.display= "none";
            document.getElementById("bloque3").style.display= "none";
            document.getElementById("bloque4").style.display= "none";
            document.getElementById("bloque5").style.display= "none";
            document.getElementById("bloque6").style.display= "none";
            document.getElementById("bloque7").style.display= "none";
            document.getElementById("bloque8").style.display= "none";
            document.getElementById("bloque9").style.display= "none";
            document.getElementById("bloque10").style.display= "none";
            document.getElementById("bloque11").style.display= "none";
            document.getElementById("bloque12").style.display= "";
            document.getElementById("bloque13").style.display= "none";
            document.getElementById("bloque14").style.display= "none";
            document.getElementById("bloque15").style.display= "none";
            document.getElementById("bloque16").style.display= "none";
            document.getElementById("bloque17").style.display= "none";
            document.getElementById("bloque18").style.display= "none";
        }
        else if($(this).val() === "Infografías")
        {
            document.getElementById("bloque1").style.display= "none";
            document.getElementById("bloque2").style.display= "none";
            document.getElementById("bloque3").style.display= "none";
            document.getElementById("bloque4").style.display= "none";
            document.getElementById("bloque5").style.display= "none";
            document.getElementById("bloque6").style.display= "none";
            document.getElementById("bloque7").style.display= "none";
            document.getElementById("bloque8").style.display= "none";
            document.getElementById("bloque9").style.display= "none";
            document.getElementById("bloque10").style.display= "none";
            document.getElementById("bloque11").style.display= "none";
            document.getElementById("bloque12").style.display= "none";
            document.getElementById("bloque13").style.display= "";
            document.getElementById("bloque14").style.display= "none";
            document.getElementById("bloque15").style.display= "none";
            document.getElementById("bloque16").style.display= "none";
            document.getElementById("bloque17").style.display= "none";
            document.getElementById("bloque18").style.display= "none";
        }
        else if($(this).val() === "Presentaciones")
        {
            document.getElementById("bloque1").style.display= "none";
            document.getElementById("bloque2").style.display= "none";
            document.getElementById("bloque3").style.display= "none";
            document.getElementById("bloque4").style.display= "none";
            document.getElementById("bloque5").style.display= "none";
            document.getElementById("bloque6").style.display= "none";
            document.getElementById("bloque7").style.display= "none";
            document.getElementById("bloque8").style.display= "none";
            document.getElementById("bloque9").style.display= "none";
            document.getElementById("bloque10").style.display= "none";
            document.getElementById("bloque11").style.display= "none";
            document.getElementById("bloque12").style.display= "none";
            document.getElementById("bloque13").style.display= "none";
            document.getElementById("bloque14").style.display= "";
            document.getElementById("bloque15").style.display= "none";
            document.getElementById("bloque16").style.display= "none";
            document.getElementById("bloque17").style.display= "none";
            document.getElementById("bloque18").style.display= "none";
        }
        else if($(this).val() === "Diseño de Tazas")
        {
            document.getElementById("bloque1").style.display= "none";
            document.getElementById("bloque2").style.display= "none";
            document.getElementById("bloque3").style.display= "none";
            document.getElementById("bloque4").style.display= "none";
            document.getElementById("bloque5").style.display= "none";
            document.getElementById("bloque6").style.display= "none";
            document.getElementById("bloque7").style.display= "none";
            document.getElementById("bloque8").style.display= "none";
            document.getElementById("bloque9").style.display= "none";
            document.getElementById("bloque10").style.display= "none";
            document.getElementById("bloque11").style.display= "none";
            document.getElementById("bloque12").style.display= "none";
            document.getElementById("bloque13").style.display= "none";
            document.getElementById("bloque14").style.display= "none";
            document.getElementById("bloque15").style.display= "";
            document.getElementById("bloque16").style.display= "none";
            document.getElementById("bloque17").style.display= "none";
            document.getElementById("bloque18").style.display= "none";
        }
        else if($(this).val() === "Camisetas")
        {
            document.getElementById("bloque1").style.display= "none";
            document.getElementById("bloque2").style.display= "none";
            document.getElementById("bloque3").style.display= "none";
            document.getElementById("bloque4").style.display= "none";
            document.getElementById("bloque5").style.display= "none";
            document.getElementById("bloque6").style.display= "none";
            document.getElementById("bloque7").style.display= "none";
            document.getElementById("bloque8").style.display= "none";
            document.getElementById("bloque9").style.display= "none";
            document.getElementById("bloque10").style.display= "none";
            document.getElementById("bloque11").style.display= "none";
            document.getElementById("bloque12").style.display= "none";
            document.getElementById("bloque13").style.display= "none";
            document.getElementById("bloque14").style.display= "none";
            document.getElementById("bloque15").style.display= "none";
            document.getElementById("bloque16").style.display= "";
            document.getElementById("bloque17").style.display= "none";
            document.getElementById("bloque18").style.display= "none";
        }
        else {
            
            document.getElementById("bloque1").style.display= "none";
            document.getElementById("bloque2").style.display= "none";
            document.getElementById("bloque3").style.display= "none";
            document.getElementById("bloque4").style.display= "none";
            document.getElementById("bloque5").style.display= "none";
            document.getElementById("bloque6").style.display= "none";
            document.getElementById("bloque7").style.display= "none";
            document.getElementById("bloque8").style.display= "none";
            document.getElementById("bloque9").style.display= "none";
            document.getElementById("bloque10").style.display= "none";
            document.getElementById("bloque11").style.display= "none";
            document.getElementById("bloque12").style.display= "none";
            document.getElementById("bloque13").style.display= "none";
            document.getElementById("bloque14").style.display= "none";
            document.getElementById("bloque15").style.display= "none";
            document.getElementById("bloque16").style.display= "none";
            document.getElementById("bloque17").style.display= "none";
            document.getElementById("bloque18").style.display= "none";
            
        } */

        // Asumiendo que tu checkbox tiene el ID 'idSelecProducto'
        $("#flexCheckChecked").change(function() {
        // Verifica si el checkbox está marcado o no
            if ($(this).is(':checked')) {
                // Código a ejecutar si el checkbox está marcado
                document.getElementById("bloque18").style.display= "";
                // Aquí puedes activar el bloque de código que desees
                
            //document.getElementById("bloque18").style.display= "none";
            } else {
                // Código a ejecutar si el checkbox está desmarcado
                //document.getElementById("bloque17").style.display= "none";
                document.getElementById("bloque18").style.display= "none";
                // Aquí puedes desactivar el bloque de código que desees
            }
        });
    });
</script>