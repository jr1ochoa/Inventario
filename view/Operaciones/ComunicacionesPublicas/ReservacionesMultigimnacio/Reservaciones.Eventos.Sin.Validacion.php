<?php

 $db = "fusalmo_v1";
 $dbUser = "fusalmo_wp";
 $dbPass = "sV3jGr3lVbTl";
 $root = "https://fusalmo.org/";
 
 try 
 {
     $net_fusalmos = new PDO("mysql:host=localhost;dbname=$db", $dbUser, $dbPass);
     $net_fusalmos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
     // Verifica si la conexión se realizó correctamente
     if ($net_fusalmos) {
        //echo "Conexión exitosa a la base de datos.";
     }
 } 
 catch (PDOException $e) 
 {
     print "Error!: " . $e->getMessage() . "<br/>";
     $net_fusalmos = null;
     die("La conexión a la base de datos falló.");
 }
 
  //Cargar datos del empleado
 $iu = isset($_GET['iu']) ? $_GET['iu'] : $_SESSION['iu'];
  
$Evento = $_REQUEST['idComite'];

?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Institucion/Empresa/Organizacion</th>
      <th scope="col">Mesa Seleccionada</th>
      <th scope="col">Estado</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>

  <?php

$query = "SELECT * FROM `fus_reservacion` where id_evento = ?  and estado = 2";
 $data3 = $net_fusalmos->prepare($query);
 $data3->execute([$Evento]);
 $sumador = 1;
  while ($data = $data3->fetch()) 
  {
    echo '
     <tr>
      <th scope="row">'.$sumador++.'</th>
      <td>'.$data[1].'</td>
      <td>'.$data[5].'</td>';
      if($data[4] == 1)
      {
        echo '
        <td style = "background-color: #D9EDBC"></td>
        ';
      }
      else
      {
        echo '
        <td style = "background-color: #E5999A"></td>
        ';
      }
     echo ' 
      <td>
      
     

              <div class="btn-group mx-1 mt-0 pt-0 mb-0 pb-0 m-0" role="group" aria-label="Basic outlined example">
            <button onclick="funcionEnviarId('.$data[0].')" id="'.$data[0].'" class="btn btn-sm mt-0  pt-0" style="background-color: #1A4262; color:white;"  onclick="valorFuncion('.$data[0].')" data-bs-toggle="modal" data-bs-target="#exampleValidarOno"> 
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-toggles" viewBox="0 0 16 16">
  <path d="M4.5 9a3.5 3.5 0 1 0 0 7h7a3.5 3.5 0 1 0 0-7zm7 6a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5m-7-14a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5m2.45 0A3.5 3.5 0 0 1 8 3.5 3.5 3.5 0 0 1 6.95 6h4.55a2.5 2.5 0 0 0 0-5zM4.5 0h7a3.5 3.5 0 1 1 0 7h-7a3.5 3.5 0 1 1 0-7"/>
</svg>
                  </button>
              </div>
   </div>  
      </td>
    </tr>
    
    ';
    // echo ' <option value="'.$data[0].'">'.$data[1].'</option>';
  }
    ?>




  
  </tbody>
</table>

<!-- Modal Para la Validacion de Reservaciones -->
<div class="modal fade" id="exampleValidarOno" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id='ExtraeriNFORMACION'></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="btnValidacionTerminada" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnGuardarCambios">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>

<script>
//============= EXTRAYENDO LA INFORMACION PARA EL MODAL ========================
let funcionEnviarId = (valor) =>{
        //alert(valor)
        $("#ExtraeriNFORMACION").load("view/Operaciones/ComunicacionesPublicas/ReservacionesMultigimnacio/Formulario.validar.reservaciones.php",{
    idModal: valor
    });
}

//============= ENVIAR LA CONFIRMACION DE LAS SOLICITUDES ======================

$('#btnGuardarCambios').click(function()
{
    $.post("process/index.php", {
        process: "reservacion",
        action: "updateEstadoSolicitud",

        accionSelet: $("#accionSelet").val(),
        idSolicitud: $("#idSolicitud").val()

    },
        function(response){
            if(response){
                $.toast({
                        heading: 'Finalizado',
                        text: "Validacion Terminada",
                        showHideTransition: 'slide',
                        icon: 'success',
                        hideAfter: 2000, 
                        position: 'bottom-center'
                    });
                $('#btnValidacionTerminada').click();
                setTimeout(function() {
                location.reload(); // Recarga la página completa
            }, 3000); // Recargar después de 3 segundos
            }
        }
    );
});
//ggggggggggggggggggggggg 
</script>