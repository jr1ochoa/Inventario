<?php
                  //Cargar datos del empleado
$iu = isset($_GET['iu']) ? $_GET['iu'] : $_SESSION['iu'];
            //Cargar fotografía del empleado
            $query = "SELECT picture FROM employee_picture WHERE idemployee = " . $iu;
            $picture = $net_rrhh->prepare($query);
            $picture->execute();

            if ($picture->rowCount() > 0) {
                $dataI = $picture->fetch();
                $img = $dataI[0];
            } else
                $img = "h.jpg";
            ?>


<div class="row mt-3">

<!--OPCIONES OPERATIVAS INICIO-->
    <div class="col-md-3">
        <!--<h2>HOLA MUNDO</h2> -->
            <div class="container marketing">
                <div class="row" style="background-color: #F5F5F5; border-radius: 12px;">
                    <!--<img class="mx-auto d-block circle" src="process/pictures/<?=$img?>" style='width: 10%' />
                    <h4 class="fw-normal">NOMBRE DEL USUARIO</h4>-->
                    
                    <img src="assets/images/business_14098174.png" style="width: 40%; " data-toggle="popover" title="ÁREAS QUE INCLUYE" data-bs-content="<ul><li>📋🖊️Monitoreo y Evaluación.</li><li>📑Seguimiento de OKR.</li><li>😎IT Y Desarrollo </li></ul>"/>
                    <p class=" "><b>Gestión de Proyectos</b></p>
                    
                    <?php
                        include("gestionProyectos.operaciones.php");
                    ?>
                </div>
            </div>
    </div>
<!--OPCIONES OPERATIVAS FIN-->
   
  <!--PUBLICAR CONTENIDO INICIO--> 
    <div class="col-md-5">
        <!--<h2>PUBLICAR CONTENIDO</h2>-->
        <div class="card mb-2">
            <div class="card-body">
            <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
            <div class="container mt-2">
                <div class="row">
                    <div class="col-md-6"><button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal2">CONTENIDO MULTIMEDIA</button></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-4"> <input class="btn btn-primary btn-sm" type="button" value="TEXTO"></div>
                </div>
            </div>
            </div>
        </div>


        <?php 
            include("ClubesSTEAM.noticias.php");
        ?>

<!--MODAL INICIO PUBLICACION INICIO-->
<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header colorTituloModal">
        <h5 class="modal-title" style="color:white;" id="exampleModalLabel">CREANDO NUEVA PUBLICACION</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="process/" method="post" enctype="multipart/form-data">
      <div class="modal-body">
            <div class="mb-3">

                <input type="hidden" value="publicacionMultimedia" name="action">
                <input type="hidden" value="proyectos" name="process">


                <label for="formFile" class="form-label">ESCRIBIR ENCABEZADO</label>
                <input class="form-control" type="text" name="encabezado">

                <label for="formFile" class="form-label">SUBIR IMAGEN PARA COMPARTIR</label>
                <input class="form-control" type="file" name="formFile">
                
                <div class="form-floating mt-3">
                <textarea class="form-control" placeholder="" name="articulo"></textarea>
                <label for="floatingTextarea">ESCRIBIR ARTICULOS</label>
                </div>



            </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="cerrarModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="subirArchivo">SUBIR ARCHIVO</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--MODAL INICIO PUBLICACION FIN-->
    </div>
  <!--PUBLICAR CONTENIDO FIN -->



<!--CARPETAS DE SHAREPOINT  INICIO-->
    <div class="col-md-3">
        <h2>SHAREPOINT</h2>
        <div class="row">
            <div class="col-md">
            <button type="button" class="btn btn-sm  btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            SUBIR DOCUMENTOS
        </button>
            </div>
            <div class="col-md">

            <div class="input-group mb-3">
  <span class="input-group-text transparent-bg border border-end-0" id="basic-addon1 " style="height:33px; background-color: #FFFFFF; border-right:0;">🔍</span>
  <input type="text" class="form-control transparent-bg border border-start-0" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
</div>

            </div>
        </div>
        
        
        <?php 
            include("GestionTerritorial.servidor.php");
        ?>


<!-- Modal -->
<style>
 .colorTituloModal{
    background-color: #005E8D;
    color: white;
 }
</style>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header colorTituloModal">
        <h5 class="modal-title " style="color:white;" id="exampleModalLabel">SUBIENDO DOCUMENTOS AL SERVIDOR 📑</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="process/" method="post" enctype="multipart/form-data">
      <div class="modal-body">
            <div class="mb-3">


           
                <input type="hidden" value="addFile" name="action">
                <input type="hidden" value="programas" name="process">
                <label for="formFile" class="form-label">Default file input example</label>
                <input class="form-control" type="file" name="formFile">
            



            </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="cerrarModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="subirArchivo">SUBIR ARCHIVO</button>
      </div>
      </form>
      <a class="btn btn-success" id="botonCargando"  style="display:none;"type="button" disabled>
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Loading...
    </a>
    </div>
  </div>
</div>
<!--Modal Estilo -->
    </div>

<!--CARPETAS DE SHAREPOINT FIN-->

</div>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>

<script>
/*$("#subirArchivo").click(function() {
    document.getElementById("botonCargando").style.display = "";


    var form_data = new FormData();
    var file_data = $("#formFile").prop("files")[0];

            form_data.append("file", file_data);
            form_data.append("process", "programas");
            form_data.append("action", "addFile");
            form_data.append("type", "file");
            console.log(form_data);
            
            $.ajax({
                cache: false,
                contentType: false,
                data: form_data,
                enctype: 'multipart/form-data',
                processData: false,
                method: "POST",
                url: "process/",
                success: function (response) {
                    document.getElementById("botonCargando").style.display = "none";
            try {
                var responseData = JSON.parse(response);
                if (responseData.success) {
                    $.toast({
                        heading: 'Finalizado',
                        text: 'Se subió el archivo correctamente 😁',
                        showHideTransition: 'slide',
                        icon: 'success',
                        hideAfter: 5000,
                        position: 'top-center'
                    });
                    document.getElementById("cerrarModal").click();
                    /*$("#loadListaBuenasPracticas").load("view/Monitoreo/Monitoreo.tabla.buenaspracticas.php", {
                        idRelacion: $("#idRelacionProyecto").val()
                    });*/
               /* } else {
                    $.toast({
                        heading: 'ERROR',
                        text: 'Problemas al subir el archivo: ' + responseData.message,
                        showHideTransition: 'slide',
                        icon: 'error',
                        hideAfter: 5000,
                        position: 'top-center'
                    });
                }
            } catch (error) {
                $.toast({
                    heading: 'ERROR',
                    text: 'Error en el formato de respuesta del servidor',
                    showHideTransition: 'slide',
                    icon: 'error',
                    hideAfter: 5000,
                    position: 'top-center'
                });
            }
        },
            });
});*/
</script>