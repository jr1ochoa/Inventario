<?php 
 include("../../config/net.php");

 $valorRecibido = $_REQUEST['idComite'];
 //Cargar datos del empleado
$iu = isset($_GET['iu']) ? $_GET['iu'] : $_SESSION['iu'];


//$nombre_Comite = "";
$query = "SELECT * FROM `votaciones_comites` where id = ?";
$data3 = $net_rrhh->prepare($query);
$data3->execute([$_POST['idComite']]);
while ($data = $data3->fetch()) 
{
    $nombre_Comite = $data[1];
    //echo ' <option value="'.$data[0].'">'.$data[1].'</option>';
}
if ($data3->rowCount() > 0) {



?>

<?php
$nombre_Comite = "";
$query = "SELECT * FROM `votaciones_comites` where id = ?";
 $data3 = $net_rrhh->prepare($query);
 $data3->execute([$_POST['idComite']]);

  while ($data = $data3->fetch()) 
  {
    $nombre_Comite = $data[1];
    // echo ' <option value="'.$data[0].'">'.$data[1].'</option>';
  }


$bandera =0; 
$year = date("Y");
  $checkQuery = "SELECT COUNT(*) as count FROM votaciones_resultados WHERE id_votante = ? AND year_votacion =? AND id_comite =?";
                        $checkData = $net_rrhh->prepare($checkQuery);
                        $checkData->execute([$iu, $year, $_POST['idComite']]);
                        $count = $checkData->fetchColumn();
                        if ($count > 0) 
                        {
                            $bandera = 1;
                        }
?>
<?php 
 if($bandera == 1)
 {
?>

<div class="col-md  " id="registroTransporte">
    <center>
    <p class="tamañoTexto mt-1"><b>YA TIENE VOTO REGISTRADO</b> </p>
    <img src="/assets/images/message_16049752.png" class="colorFondo"style="width: 15%; "/>   
      
    </center>
               
                </div>
<?php
 }
 else
 {

 

?>
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">


  <h5 class="display-4"><?php echo strtoupper($nombre_Comite); ?></h5>
  <p class="lead">Agradezco a todos por su participación y votos, su contribución es vital para fortalecer los comités de FUSALMO. ¡Gracias!.</p>
</div>
<div class="btn-group-vertical">
<?php 


    $query = "SELECT 
      *
       FROM users WHERE id = ?";
       $data3 = $net_rrhh->prepare($query);
       $data3->execute([$iu]);
        while ($data = $data3->fetch()) 
        {
            $tipo = $data[2];
        }
        if($tipo == "Administrador" || $tipo == "RRHH")
        {
?>

<?PHP
        }

if($tipo == "Administrador")
{
?>

     <!--AQUI EL BOTON DE LAS ESTADISTICAS-->


<?php 
}
?>
</div>
<div class="container">
   
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0">Candidatos</h6>
    
    <?php 
   
    ?>
    <div class="row">
        <div class="col-md">
        <?php 
       $query = "SELECT s1.id, s1.id_employee, CONVERT(s2.name1 USING utf8), CONVERT(s2.name2 USING utf8), CONVERT(s2.name3 USING utf8), CONVERT(s2.lastname1 USING utf8), CONVERT(s2.lastname2 USING utf8)  
       ,s4.position FROM votaciones_candidatos as s1 
       inner join employee as s2 on s2.id = s1.id_employee 
       inner join workarea_positions_assignment as s3 on s3.idemployee = s1.id_employee
       inner join workarea_positions as s4 on s4.id = s3.idposition where s3.enddate = '0000-00-00' and
       s1.id_comite = ?
       order by id";
       $data3 = $net_rrhh->prepare($query);
       $data3->execute([$valorRecibido]);
        while ($data = $data3->fetch()) 
        {
            //echo "<option value=".$data[0].">".$data[1]."</option>";

            if($data[0]%2==0)
            {

                //Cargar datos del empleado
                    $iu = isset($_GET['iu']) ? $_GET['iu'] : $_SESSION['iu'];
                    //Cargar fotografía del empleado
                    $query = "SELECT picture FROM employee_picture WHERE idemployee = " . $data[1];
                    $picture = $net_rrhh->prepare($query);
                    $picture->execute();

                    if ($picture->rowCount() > 0) {
                        $dataI = $picture->fetch();
                        $img = $dataI[0];
                    } 
                    else
                    {
                        $img = "Don Bosco.png";
                    }
                
                
                    echo '
            
                    <div class="d-flex text-muted pt-3">
                        <img src="process/pictures/'.$img.'" class="colorFondo"style="width: 15%; border-radius: 5%; " data-toggle="popover" title="VOTACIONES PARA COMITÉS " />
                        <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                            <div class="d-flex justify-content-between">
                            <strong class="text-gray-dark">'.$data[2].' '.$data[3].' '.$data[4].' '.$data[5].'</strong>
                            <button onclick="funcionEnviarDatos2(\'' . $data[0] . '\')" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">

                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-fingerprint" viewBox="0 0 16 16">
                                <path d="M8.06 6.5a.5.5 0 0 1 .5.5v.776a11.5 11.5 0 0 1-.552 3.519l-1.331 4.14a.5.5 0 0 1-.952-.305l1.33-4.141a10.5 10.5 0 0 0 .504-3.213V7a.5.5 0 0 1 .5-.5Z"/>
                                <path d="M6.06 7a2 2 0 1 1 4 0 .5.5 0 1 1-1 0 1 1 0 1 0-2 0v.332q0 .613-.066 1.221A.5.5 0 0 1 6 8.447q.06-.555.06-1.115zm3.509 1a.5.5 0 0 1 .487.513 11.5 11.5 0 0 1-.587 3.339l-1.266 3.8a.5.5 0 0 1-.949-.317l1.267-3.8a10.5 10.5 0 0 0 .535-3.048A.5.5 0 0 1 9.569 8m-3.356 2.115a.5.5 0 0 1 .33.626L5.24 14.939a.5.5 0 1 1-.955-.296l1.303-4.199a.5.5 0 0 1 .625-.329"/>
                                <path d="M4.759 5.833A3.501 3.501 0 0 1 11.559 7a.5.5 0 0 1-1 0 2.5 2.5 0 0 0-4.857-.833.5.5 0 1 1-.943-.334m.3 1.67a.5.5 0 0 1 .449.546 10.7 10.7 0 0 1-.4 2.031l-1.222 4.072a.5.5 0 1 1-.958-.287L4.15 9.793a9.7 9.7 0 0 0 .363-1.842.5.5 0 0 1 .546-.449Zm6 .647a.5.5 0 0 1 .5.5c0 1.28-.213 2.552-.632 3.762l-1.09 3.145a.5.5 0 0 1-.944-.327l1.089-3.145c.382-1.105.578-2.266.578-3.435a.5.5 0 0 1 .5-.5Z"/>
                                <path d="M3.902 4.222a5 5 0 0 1 5.202-2.113.5.5 0 0 1-.208.979 4 4 0 0 0-4.163 1.69.5.5 0 0 1-.831-.556m6.72-.955a.5.5 0 0 1 .705-.052A4.99 4.99 0 0 1 13.059 7v1.5a.5.5 0 1 1-1 0V7a3.99 3.99 0 0 0-1.386-3.028.5.5 0 0 1-.051-.705M3.68 5.842a.5.5 0 0 1 .422.568q-.044.289-.044.59c0 .71-.1 1.417-.298 2.1l-1.14 3.923a.5.5 0 1 1-.96-.279L2.8 8.821A6.5 6.5 0 0 0 3.058 7q0-.375.054-.736a.5.5 0 0 1 .568-.422m8.882 3.66a.5.5 0 0 1 .456.54c-.084 1-.298 1.986-.64 2.934l-.744 2.068a.5.5 0 0 1-.941-.338l.745-2.07a10.5 10.5 0 0 0 .584-2.678.5.5 0 0 1 .54-.456"/>
                                <path d="M4.81 1.37A6.5 6.5 0 0 1 14.56 7a.5.5 0 1 1-1 0 5.5 5.5 0 0 0-8.25-4.765.5.5 0 0 1-.5-.865m-.89 1.257a.5.5 0 0 1 .04.706A5.48 5.48 0 0 0 2.56 7a.5.5 0 0 1-1 0c0-1.664.626-3.184 1.655-4.333a.5.5 0 0 1 .706-.04ZM1.915 8.02a.5.5 0 0 1 .346.616l-.779 2.767a.5.5 0 1 1-.962-.27l.778-2.767a.5.5 0 0 1 .617-.346m12.15.481a.5.5 0 0 1 .49.51c-.03 1.499-.161 3.025-.727 4.533l-.07.187a.5.5 0 0 1-.936-.351l.07-.187c.506-1.35.634-2.74.663-4.202a.5.5 0 0 1 .51-.49"/>
                                </svg> Votar</button>
                            </div>
                            <span class="d-block">'.$data[7].'</span>
                        </div>
                    </div>';
                
                    
            }
           
        }
   ?>
        
        </div>






    <div class="col-md">
        <?php 
       $query = "SELECT s1.id, s1.id_employee, CONVERT(s2.name1 USING utf8), CONVERT(s2.name2 USING utf8), CONVERT(s2.name3 USING utf8), CONVERT(s2.lastname1 USING utf8), CONVERT(s2.lastname2 USING utf8)  
       ,s4.position FROM votaciones_candidatos as s1 
       inner join employee as s2 on s2.id = s1.id_employee 
       inner join workarea_positions_assignment as s3 on s3.idemployee = s1.id_employee
       inner join workarea_positions as s4 on s4.id = s3.idposition where s3.enddate = '0000-00-00' and
       s1.id_comite = ?
       order by id";
       $data3 = $net_rrhh->prepare($query);
       $data3->execute([$valorRecibido]);
        while ($data = $data3->fetch()) 
        {
            //echo "<option value=".$data[0].">".$data[1]."</option>";

            if($data[0]%2!=0)
            {

                //Cargar datos del empleado
                    $iu = isset($_GET['iu']) ? $_GET['iu'] : $_SESSION['iu'];
                    //Cargar fotografía del empleado
                    $query = "SELECT picture FROM employee_picture WHERE idemployee = " . $data[1];
                    $picture = $net_rrhh->prepare($query);
                    $picture->execute();

                    if ($picture->rowCount() > 0) {
                        $dataI = $picture->fetch();
                        $img = $dataI[0];
                    } 
                    else
                    {
                        $img = "Don Bosco.png";
                    }
                
                
                    echo '
            
                    <div class="d-flex text-muted pt-3">
                        <img src="process/pictures/'.$img.'" class="colorFondo"style="width: 15%; border-radius: 5%; " data-toggle="popover" title="VOTACIONES PARA COMITÉS " />
                        <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                            <div class="d-flex justify-content-between">
                            <strong class="text-gray-dark">'.$data[2].' '.$data[3].' '.$data[4].' '.$data[5].'</strong>
                            <button onclick="funcionEnviarDatos2(\'' . $data[0] . '\')" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">

                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-fingerprint" viewBox="0 0 16 16">
                                <path d="M8.06 6.5a.5.5 0 0 1 .5.5v.776a11.5 11.5 0 0 1-.552 3.519l-1.331 4.14a.5.5 0 0 1-.952-.305l1.33-4.141a10.5 10.5 0 0 0 .504-3.213V7a.5.5 0 0 1 .5-.5Z"/>
                                <path d="M6.06 7a2 2 0 1 1 4 0 .5.5 0 1 1-1 0 1 1 0 1 0-2 0v.332q0 .613-.066 1.221A.5.5 0 0 1 6 8.447q.06-.555.06-1.115zm3.509 1a.5.5 0 0 1 .487.513 11.5 11.5 0 0 1-.587 3.339l-1.266 3.8a.5.5 0 0 1-.949-.317l1.267-3.8a10.5 10.5 0 0 0 .535-3.048A.5.5 0 0 1 9.569 8m-3.356 2.115a.5.5 0 0 1 .33.626L5.24 14.939a.5.5 0 1 1-.955-.296l1.303-4.199a.5.5 0 0 1 .625-.329"/>
                                <path d="M4.759 5.833A3.501 3.501 0 0 1 11.559 7a.5.5 0 0 1-1 0 2.5 2.5 0 0 0-4.857-.833.5.5 0 1 1-.943-.334m.3 1.67a.5.5 0 0 1 .449.546 10.7 10.7 0 0 1-.4 2.031l-1.222 4.072a.5.5 0 1 1-.958-.287L4.15 9.793a9.7 9.7 0 0 0 .363-1.842.5.5 0 0 1 .546-.449Zm6 .647a.5.5 0 0 1 .5.5c0 1.28-.213 2.552-.632 3.762l-1.09 3.145a.5.5 0 0 1-.944-.327l1.089-3.145c.382-1.105.578-2.266.578-3.435a.5.5 0 0 1 .5-.5Z"/>
                                <path d="M3.902 4.222a5 5 0 0 1 5.202-2.113.5.5 0 0 1-.208.979 4 4 0 0 0-4.163 1.69.5.5 0 0 1-.831-.556m6.72-.955a.5.5 0 0 1 .705-.052A4.99 4.99 0 0 1 13.059 7v1.5a.5.5 0 1 1-1 0V7a3.99 3.99 0 0 0-1.386-3.028.5.5 0 0 1-.051-.705M3.68 5.842a.5.5 0 0 1 .422.568q-.044.289-.044.59c0 .71-.1 1.417-.298 2.1l-1.14 3.923a.5.5 0 1 1-.96-.279L2.8 8.821A6.5 6.5 0 0 0 3.058 7q0-.375.054-.736a.5.5 0 0 1 .568-.422m8.882 3.66a.5.5 0 0 1 .456.54c-.084 1-.298 1.986-.64 2.934l-.744 2.068a.5.5 0 0 1-.941-.338l.745-2.07a10.5 10.5 0 0 0 .584-2.678.5.5 0 0 1 .54-.456"/>
                                <path d="M4.81 1.37A6.5 6.5 0 0 1 14.56 7a.5.5 0 1 1-1 0 5.5 5.5 0 0 0-8.25-4.765.5.5 0 0 1-.5-.865m-.89 1.257a.5.5 0 0 1 .04.706A5.48 5.48 0 0 0 2.56 7a.5.5 0 0 1-1 0c0-1.664.626-3.184 1.655-4.333a.5.5 0 0 1 .706-.04ZM1.915 8.02a.5.5 0 0 1 .346.616l-.779 2.767a.5.5 0 1 1-.962-.27l.778-2.767a.5.5 0 0 1 .617-.346m12.15.481a.5.5 0 0 1 .49.51c-.03 1.499-.161 3.025-.727 4.533l-.07.187a.5.5 0 0 1-.936-.351l.07-.187c.506-1.35.634-2.74.663-4.202a.5.5 0 0 1 .51-.49"/>
                                </svg> Votar</button>
                            </div>
                            <span class="d-block">'.$data[7].'</span>
                        </div>
                    </div>';
                
                    
            }
            
        }
   ?>
        
        </div>

       
    </div>
    
   


<?php
 }
   ?> 




   


    <small class="d-block text-end mt-3">
      <a href="#">Todos los Candidatos</a>
    </small>
  </div>
</div>
<?php 
}else{
?>
<div class="col-md  " id="registroTransporte">
    <center>
    <p class="tamañoTexto mt-1"><b>SELECCIONE UN COMITE PARA VOTAR</b> </p>
    <img src="/assets/images/web_13011615.png" class="colorFondo"style="width: 15%; "/>   
      
    </center>
               
                </div>
<?php


}
?>

<!--:::::::::  MODAL DE VOTACIONES ::::::::::::::::-->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      
      <div id="EditarEncabezado"></div>


      </div>
      <div class="modal-footer">
        <button type="button"  id="btnCancelarEleccion" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar Seleccion</button>
        <button type="button" id="guardarVoto" class="btn btn-primary">Si, Confirmar</button>
      </div>
    </div>
  </div>
</div>


<!--:::::::::  MODAL AGREGAR COMITE A LA BASE DE DATOS ::::::::::::::::-->
<!-- Modal -->
<style>
    .colorCabecera {
        background-color: #1E1E1E;
    }
</style>
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header colorCabecera">
        <h5 class="modal-title " id="exampleModalLabel"><b  style="color: white;">CREANDO COMITÉ DENTRO DEL SISTEMA</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      
      <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Nombre del Comité</label>
  <input type="email" class="form-control form-sm" id="nombreComite" placeholder="escribir...">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
  <textarea class="form-control" id="descripcionComite" rows="2"></textarea>
</div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" id="cancelarComite" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnRegistrarComite" class="btn btn-success btn-sm">Registrar Domité</button>
      </div>
    </div>
  </div>
</div>


<!--:::::::::  MODAL AGREGAR CANDIDATOS A LA BASE DE DATOS ::::::::::::::::-->
<!-- Modal -->
<style>
    .colorCabecera {
        background-color: #1E1E1E;
    }
</style>
<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header colorCabecera">
        <h5 class="modal-title " id="exampleModalLabel"><b  style="color: white;">CREAR CANDIDATOS DENTRO DEL SISTEMA</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      
      <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">📌Comité</label>
  <select class="form-select form-select-sm" id="idComite" aria-label=".form-select-sm example">
  <option selected>N/A</option>
    <?php 
       
        $query = "SELECT id, CONVERT(nombre_comite USING utf8)  FROM votaciones_comites order by id";
        $data3 = $net_rrhh->prepare($query);
        $data3->execute();
        while ($data = $data3->fetch()) 
        {
            echo "<option value=".$data[0].">".$data[1]."</option>";
        }
    ?>
</select>
</div>
<div class="mb-3">
  <label for="id_label_single" class="form-label"> Candidato</label>
  <select class="js-example-basic-single form-control form-control-sm " id="id_label_single" style="width: 100%;" aria-label=".form-select-sm example">
  <option selected>N/A</option>
  <?php 
       
       $query = "SELECT id, CONVERT(name1 USING utf8),CONVERT(name2 USING utf8),CONVERT(name3 USING utf8),CONVERT(lastname1 USING utf8),CONVERT(lastname2 USING utf8)  FROM employee order by id";
       $data3 = $net_rrhh->prepare($query);
       $data3->execute();
       while ($data = $data3->fetch())  
       {
           echo "<option value=".utf8_encode($data[0]).">".utf8_decode($data[1])." ".utf8_decode($data[2])." ".utf8_decode($data[3])." ".utf8_decode($data[4])." ".utf8_decode($data[5])."</option>";
       }
   ?>
</select>

   
    
</div>



      </div>
      <div class="modal-footer">
        <button type="button" id="btnCerrarCandidato" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnGuardarCandidato" class="btn btn-success btn-sm">Registrar Candidato</button>
      </div>
    </div>
  </div>
</div>
<!-- Incluye jQuery primero -->

<script>

$(document).ready(function(){
    
    $('.js-example-basic-single').select2({
        dropdownParent:$('#exampleModal3')
    })
})
$("#votacionesEstadisticas").click(function(){
    window.location.href='?view=votacionesEstadisticas'; 
})
//:::::::::::::::::::::::::: FUNCION GUARDAR VOTO :::::::::::::::::::::::::::::::::::::::::::::::
$("#guardarVoto").click(function() {
           //document.getElementById("botonCargando").style.display="";
            $.post("process/index.php", {
                process: "votacion",
                action: "savevoto",


                valorVoto: $("#valorVoto").val(), 
                valorComite: $("#valorComite").val(), 
                valorYear: $("#valorYear").val(), 
               // idComite: $("#idComite").val(),
               // <input type="hidden" id="valorComite" value='.$valor_comite.' />
               //<input type="hidden" id="valorYear" value='.$year.' />
            },
            function(response){
                if(response)
                {
                    //document.getElementById("cancelarComite").click();
                    //document.getElementById("botonCargando").style.display="none";
                    $.toast({
                        heading: 'Finalizado',
                        text: 'Voto Guardado Correctamente',
                        showHideTransition: 'slide',
                        icon: 'success',
                        hideAfter: 2000, 
                        position: 'top-center'
                    });
                    //$("#IdProyecto").load("view/Monitoreo/get_options.php");
                   // Configurar un temporizador para redireccionar después de 5000 milisegundos (5 segundos)

                    document.getElementById("btnCancelarEleccion").click();
                    setTimeout(function() {
    window.location.href = '?view=main';
}, 3000);
                }
                else
                {
                    //document.getElementById("botonCargando").style.display="none";
                    $.toast({
                        heading: 'ERROR',
                        text: 'El voto no se guardo',
                        showHideTransition: 'slide',
                        icon: 'error',
                        hideAfter: 5000, 
                        position: 'top-center'
                    });
                  //  document.getElementById("btnCerrarCandidato").click();
                }
                
            });
            
        });


//:::::::::::: ENVIAR EL ID AL MODAL Y MOSTRAR LOS DATOS EN EL MODAL :::::::::::::::::::::::::::
function funcionEnviarDatos2(valor){
            //    data-bs-target='#exampleModal2'
            /*
            */
           
           //alert("buenas tardes");
            $("#EditarEncabezado").load("/view/votaciones/votaciones.formuario.php",
            {
                idModal: valor
            });
    }

//::::::::::::::::::::::::: AGREGAR CANDIDATO ::::::::::::::::::::::::::::::::::::::::::::::::::::
$("#btnGuardarCandidato").click(function() {
           //document.getElementById("botonCargando").style.display="";
            $.post("process/index.php", {
                process: "votacion",
                action: "addcandidato",


                idCandidato: $("#id_label_single").val(), 
                idComite: $("#idComite").val(),
            },
            function(response){
                //alert(response);
                if(response == 1)
                {
                    //document.getElementById("cancelarComite").click();
                    //document.getElementById("botonCargando").style.display="none";
                    $.toast({
                        heading: 'Finalizado',
                        text: 'Candidato Agregado Correctamente',
                        showHideTransition: 'slide',
                        icon: 'success',
                        hideAfter: 5000, 
                        position: 'top-center'
                    });
                    //$("#IdProyecto").load("view/Monitoreo/get_options.php");
                    document.getElementById("btnCerrarCandidato").click();
                }
                else if(response == 2)
                {
                    //document.getElementById("botonCargando").style.display="none";
                    $.toast({
                        heading: 'ERROR',
                        text: 'Candidato ya registrado',
                        showHideTransition: 'slide',
                        icon: 'error',
                        hideAfter: 5000, 
                        position: 'top-center'
                    });
                    //document.getElementById("btnCerrarCandidato").click();
                }
                
            });
            
        });
//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

    $("#btnRegistrarComite").click(function() {
           //document.getElementById("botonCargando").style.display="";
            $.post("process/index.php", {
                process: "votacion",
                action: "addcomite",


                nombreComite: $("#nombreComite").val(), 
                descripcionComite: $("#descripcionComite").val(), 
            },
            function(response){
                if(response)
                {
                    //document.getElementById("cancelarComite").click();
                    //document.getElementById("botonCargando").style.display="none";
                $.toast({
                    heading: 'Finalizado',
                    text: 'Comite Creado Correctamente',
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: 5000, 
                    position: 'top-center'
                });
                    //$("#IdProyecto").load("view/Monitoreo/get_options.php");
                    document.getElementById("cancelarComite").click();
                }
                else
                {
                    //document.getElementById("botonCargando").style.display="none";
                    $.toast({
                        heading: 'ERROR',
                        text: 'El nombre del proyecto es obligatorio',
                        showHideTransition: 'slide',
                        icon: 'error',
                        hideAfter: 5000, 
                        position: 'top-center'
                    });
                    document.getElementById("cancelarComite").click();
                }
                
            });
        });
</script>