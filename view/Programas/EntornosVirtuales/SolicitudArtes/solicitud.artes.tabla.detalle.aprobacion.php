<?php 
include("../../../../config/net.php");
$idValor = $_POST['id_Solicitud'];


?>
<h3><b>PRODUCTOS INDIVIDUALES Y SU PROGRESO</b></h3>
<div style="height: 4px; width:100%; margin-top:-20px;background: linear-gradient(to right, #1A4262 33%, #668196 33%, #668196 66%, #CCD5DC 66%);"></div>
  
<input type="hidden" id="idFormularioCodigo" value="<?=$idValor?>"/>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Producto</th>
      <th scope="col">Medida</th>
      <th scope="col">Información del Arte</th>
      <th scope="col">Img. Referencia</th>
      <th scope="col">Estado </th>
      <th scope="col">Aciones</th>
    </tr>
  </thead>
  <tbody>
    <?php 
if($idValor === "")
{

}
else
{
    $query = "SELECT s1.*, s2.nombre as 'producto', s3.medidas FROM `entornos_virtuales_detalle_solicitud` as s1 
    left join  entornos_virtuales_productos as s2 on s1.producto = s2.id 
    left join entornos_virtuales_medidas as s3 on s1.medidas = s3.id 
    where s1.codigo_solicitud = ?";
    $data3 = $net_rrhh->prepare($query);
    $data3->execute([$idValor]);
    if($data3->rowCount()>0)
    {
        while ($data = $data3->fetch()) {

            if($data[2]=="N/A/S"){
                $medidaDelArte = $data[5];
            }
            else {
                $medidaDelArte = $data[9];
            }
            if($data[6] == 2){
                $estadoValor = "En proceso";
            }
            else if($data[6]==1)
            {
                $estadoValor = "Solicitado";
            }
            else if($data[6] == 3)
            {
                $estadoValor = "Terminado";
            }
            echo "<tr>
            <th scope='row'>".htmlspecialchars($data[8], ENT_QUOTES, 'UTF-8')."</th>
            <td>".htmlspecialchars($medidaDelArte, ENT_QUOTES, 'UTF-8')."</td>
            <td>".htmlspecialchars($data[4], ENT_QUOTES, 'UTF-8')."</td>
             <td><a href=".$data[7]." target='_blank'>Ver Img.</a></td>
            <td>".htmlspecialchars($estadoValor, ENT_QUOTES, 'UTF-8')."</td>
          <td>
                <button 
                    onclick='funcionEliminarSolicitud(\"".htmlspecialchars($data[0], ENT_QUOTES, 'UTF-8')."\", \"".htmlspecialchars($data[6], ENT_QUOTES, 'UTF-8')."\", \"".htmlspecialchars($idValor, ENT_QUOTES, 'UTF-8')."\")' 
                    type='button' class='btn-sm btn btn-light' data-bs-toggle='modal' data-bs-target='#exampleModal'>
                    SELECCIONAR
                </button>
            </td>
  </tr>";
      
            
        }
    }
}

    ?>
    
  </tbody>
</table>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Finalizar Producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="bloque1" style="display: none;">
            <p>Desea poner este producto en proceso? 📌</p>
            <input id="idEstado" type="hidden"/>
            <input id="idDetalleProducto" type="hidden"/>
        </div>
        <div id="bloque2" style="display: none;">
            <p>Desea poner este producto como terminado? ✔</p>
            <input id="idEstado2" type="hidden"/>
            <input id="idDetalleProducto2" type="hidden"/>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" id="btnCerrarModal" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" id="btnAprobar" class="btn-sm btn btn-primary">Finalizar Producto</button>
      </div>
    </div>
  </div>
</div>

<script>
    let funcionEliminarSolicitud=(valor,valor2,valor3) =>{
       // alert(valor);
       $("#idEstado").val(null) ;
        $("#idDetalleProducto").val(null);
        $("#idEstado2").val(null) ;
        $("#idDetalleProducto2").val(null);
        if(valor2 == 1)
    {
        $("#bloque1").css("display","block");
        $("#bloque2").css("display","none");
        $("#idEstado").val(valor2) ;
        $("#idDetalleProducto").val(valor);
        $("#btnAprobar").text("Iniciar Proceso");
    }
    else if(valor2 == 2)
    {
        $("#bloque2").css("display","block");
        $("#bloque1").css("display","none");
        $("#idEstado2").val(valor2) ;
        $("#idDetalleProducto2").val(valor);

        
        $("#btnAprobar").text("Finalizar Producto");
    }
    }

    $("#btnAprobar").click(function(){
        //:::::::::::::::: ENVIAR INFORMACION PARA EL PROCESO ::::::::::::::::::
        let estado1 = $("#idEstado").val();
        let estado2 = $("#idEstado2").val();
        if(estado1 === ""){
          //  alert("Se finalizara producto")

            $.post("process/index.php",{
        
        process: "entornos_virtuales",
        action :"updateTerminarProceso",

        idEstado2: $("#idEstado2").val(),
        idDetalleProducto2: $("#idDetalleProducto2").val(),
        idFormularioCodigo : $("#idFormularioCodigo").val()
    },
    function(response){
        
        if(response)
        {
            document.getElementById("btnCerrarModal").click();
           $.toast({
            heading: 'Finalizado',
            text: 'Se termino el producto',
            showHideTransition: 'slide',
            icon: 'success',
            hideAfter: 2000, 
            position: 'top-center'
            });
            $("#btnDetalleFormulario").load("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.artes.tabla.detalle.aprobacion.php",{ id_Solicitud: $("#idFormularioCodigo").val() });
            setTimeout(function () {
          location.reload(); // Recargar la página después de 2 segundos
        }, 2000); // 2000 milisegundos = 2 segundos
          //  $("#tablaCambiosSolicitudes").load("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.artes.tabla.cambios.php" ,{ id_Solicitud: $("#idSolicitudFormulario").val() });

        }
        else
        {
            $.toast({
            heading: 'ERROR',
            text: '!! Error !!, No se puede iniciar el proceso',
            showHideTransition: 'slide',
            icon: 'error',
            hideAfter: 4000, 
            position: 'top-center'
            });
        }
            
    })


        }
        else
        {
          //  alert("Se iniciara el proceso");
          /**
           * $("#idEstado2").val(null) ;
        $("#idDetalleProducto2").val(null);
           */

// SE INICIARA EL PROCESO ::::::::::::::::::::::::::::;
$.post("process/index.php",{
        
        process: "entornos_virtuales",
        action :"updateIniciarProceso",

        idEstado2: $("#idEstado").val(),
        idDetalleProducto2: $("#idDetalleProducto").val(),
        
    },
    function(response){
        if(response)
        {
            document.getElementById("btnCerrarModal").click();
           $.toast({
            heading: 'Finalizado',
            text: 'Se inicio el Proceso',
            showHideTransition: 'slide',
            icon: 'success',
            hideAfter: 2000, 
            position: 'top-center'
            });
            $("#btnDetalleFormulario").load("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.artes.tabla.detalle.aprobacion.php",{ id_Solicitud: $("#idFormularioCodigo").val() });
            setTimeout(function () {
           location.reload(); // Recargar la página después de 2 segundos
        }, 2000); // 2000 milisegundos = 2 segundos
          //  $("#tablaCambiosSolicitudes").load("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.artes.tabla.cambios.php" ,{ id_Solicitud: $("#idSolicitudFormulario").val() });

        }
        else
        {
            $.toast({
            heading: 'ERROR',
            text: '!! Error !!, No se puede iniciar el proceso',
            showHideTransition: 'slide',
            icon: 'error',
            hideAfter: 4000, 
            position: 'top-center'
            });
        }
            
    })
        }
    });






   
</script>