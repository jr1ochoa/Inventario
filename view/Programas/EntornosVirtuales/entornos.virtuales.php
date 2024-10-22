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


<div class="row ">

<!--OPCIONES OPERATIVAS INICIO-->
    <div class="col-md-3" style="">
        <!--<h2>HOLA MUNDO</h2> -->
            <div class="container marketing">
                <div class="row" style="border-radius: 12px;">
                    <!--<img class="mx-auto d-block circle" src="process/pictures/<?=$img?>" style='width: 10%' />
                    <h4 class="fw-normal">NOMBRE DEL USUARIO</h4>-->
                    
                    <img class="mt-3" src="assets/images/multitarea.png" style="width: 40%; " data-toggle="popover" title="TALENTO HUMANO" data-bs-content="<ul><li>📋🖊️Monitoreo y Evaluación.</li><li>📑Seguimiento de OKR.</li><li>😎IT Y Desarrollo </li></ul>"/>
                    <p class=" "><b>ENTORNOS VIRTUALES</b></p>
                    
                    
                </div>
            </div>
    </div>
<!--OPCIONES OPERATIVAS FIN-->
   <style>
    .subrayado {
    text-decoration: underline;
    text-decoration-color: #1A4262; /* Cambia el color del subrayado */
    text-decoration-thickness: 2px; /* Ajusta el grosor del subrayado */
    text-decoration-style: solid; /* Cambia el estilo del subrayado (puede ser solid, dotted, dashed, etc.) */

}

    </style>
  <!--PUBLICAR CONTENIDO INICIO--> 
    <div class="col-md-9">
        <h3 class="mx-5 mt-3 text-aling subrayado">*<b>PANEL ADMINISTRATIVO DE ENTORNOS VIRTUALES  </b></h3>
    <?php
                        include("entornos.virtuales.operaciones.php");
                    ?>
<!--MODAL INICIO PUBLICACION FIN-->
    </div>
  <!--PUBLICAR CONTENIDO FIN -->



<!--CARPETAS DE SHAREPOINT  INICIO--> 
    <div class="col-md">
      
<!--Modal Estilo -->
    </div>

<!--CARPETAS DE SHAREPOINT FIN-->
<br/>
<br/>
<br/>
<br/>
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