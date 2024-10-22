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
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">SEDE</th>
      <th scope="col">DESCRIPCIÓN DE QUEJA</th>
      <th scope="col">ESTADO</th>
      <th scope="col">ACCIONES</th>
    </tr>
  </thead>
  <tbody>
   
  <?php

$query = "SELECT * FROM `fus_queja` where  estado = 1 ";
 $data3 = $net_fusalmos->prepare($query);
 $data3->execute();
 $sumador = 1;
  while ($data = $data3->fetch()) 
  {
    echo '
     <tr>
      <th scope="row">'.$sumador++.'</th>
      <td>'.$data[1].'</td>
      <td>'.$data[2].'</td>
      <td> SIN SEGUIMIENTO</td>';
     echo ' 
      <td>
      
      <button type="submit" class="btn btn-sm mt-0  pt-0" style="background-color: #1A4262;color:white;"  onclick="funcionEnviar('.$data[0].')" data-bs-toggle="modal" data-bs-target="#exampleeDITARcOMITE">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eyeglasses" viewBox="0 0 16 16">
        <path d="M4 6a2 2 0 1 1 0 4 2 2 0 0 1 0-4m2.625.547a3 3 0 0 0-5.584.953H.5a.5.5 0 0 0 0 1h.541A3 3 0 0 0 7 8a1 1 0 0 1 2 0 3 3 0 0 0 5.959.5h.541a.5.5 0 0 0 0-1h-.541a3 3 0 0 0-5.584-.953A2 2 0 0 0 8 6c-.532 0-1.016.208-1.375.547M14 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0"/>
        </svg>
      </button>

             <button type="submit" class="btn btn-sm mt-0  pt-0" style="background-color: #1A4262;color:white;"  onclick="funcionCerrarQueja('.$data[0].')" data-bs-toggle="modal" data-bs-target="#exampleCerrarQueja2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-zip" viewBox="0 0 16 16">
  <path d="M5 7.5a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v.938l.4 1.599a1 1 0 0 1-.416 1.074l-.93.62a1 1 0 0 1-1.11 0l-.929-.62a1 1 0 0 1-.415-1.074L5 8.438zm2 0H6v.938a1 1 0 0 1-.03.243l-.4 1.598.93.62.929-.62-.4-1.598A1 1 0 0 1 7 8.438z"/>
  <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1h-2v1h-1v1h1v1h-1v1h1v1H6V5H5V4h1V3H5V2h1V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z"/>
</svg>
              </button>
   </div>  
      </td>
    </tr>
    
    ';
    // echo ' <option value="'.$data[0].'">'.$data[1].'</option>';
  }
    ?>
  </tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="exampleeDITARcOMITE" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">DETALLE DE LA QUEJA</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <div id="informacionFormulario"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleCerrarQueja2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">CERRAR QUEJA</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <div id="informacionCerraQueja"></div>

      </div>
      
    </div>
  </div>
</div>


<script>
    let funcionEnviar = (valor) =>{
        //alert(valor)
        $("#informacionFormulario").load("view/Operaciones/TalentoHumano/Salvaguardia/formulario.quejas.php",{
    idModal: valor
    });
    }

    let funcionCerrarQueja = (valor) =>{
        //alert(valor)
        $("#informacionCerraQueja").load("view/Operaciones/TalentoHumano/Salvaguardia/cerrar.queja.php",{
    idModal: valor
    });
    }
</script>