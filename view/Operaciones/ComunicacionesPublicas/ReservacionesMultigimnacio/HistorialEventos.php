<?php 
include("../../../../config/net.php");


//Cargar datos del empleado
$iu = isset($_GET['iu']) ? $_GET['iu'] : $_SESSION['iu'];
  
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Evento</th>
      <th scope="col">Movimiento</th>
      <th scope="col">Descripción</th>
      <th scope="col">Link_Generado</th>
      <th scope="col">Estado</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>

  <?php

$query = "SELECT * FROM `fus_evento` as s1 inner join fus_movimiento as s2 on s1.id_movimiento = s2.id ";
 $data3 = $net_rrhh->prepare($query);
 $data3->execute();
 $sumador = 1;
  while ($data = $data3->fetch()) 
  {
    echo '
     <tr>
      <th scope="row">'.$sumador++.'</th>
      <td>'.$data[1].'</td>
      <td>'.$data[7].'</td>
      <td>'.$data[2].'</td>
      <td><a href="https://fusalmo.org/salesianos/?view=inscripcion_empresa&evento_id='.$data[0].'">CLIC AQUÍ</a></td>
      ';

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
            <button id="'.$data[0].'" class="btn btn-sm mt-0  pt-0" style="background-color: #1A4262; color:white;"  onclick="valorFuncion('.$data[0].')" data-bs-toggle="modal" data-bs-target="#exampleEliminarMonitoreoComites"> 
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