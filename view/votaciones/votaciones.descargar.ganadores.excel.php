<?php 
include("../../config/net.php");
header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=Reporte_Ganadores.xls");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);
echo $valor_Recibido;
$valor_Recibido = $_REQUEST['idModal'];
echo "\xEF\xBB\xBF"; // Añade el BOM para UTF-8
$year = date("Y");
?>
<style>
    table, td, th {
        border: 1px solid;
    }
    td{
        text-align: left;
    }
</style>
<table class="table">
  <thead>
    <tr>
      
      <th scope="col">CANDIDATO</th>
      <th scope="col">N° DE VOTOS</th>
      <th scope="col">Año</th>
    </tr>
  </thead>
  <tbody>
    <?php 
  $queryDatos = "SELECT id_candidato, COUNT(*) as cantidad, s2.name1, s2.name2,s2.lastname1, s2.lastname2 FROM votaciones_resultados as s1 inner join employee as s2 on s1.id_candidato = s2.id 
where s1.id_comite =? and s1.year_votacion = ?
GROUP BY id_candidato order by cantidad desc";
 $data3 = $net_rrhh->prepare($queryDatos);
 $data3->execute([$valor_Recibido,$year]);
 $sumador = 1;
      while ($data = $data3->fetch()) 
 
      {
        echo '<tr>
       
                <td>'.$data[2].' '.$data[3].' '.$data[4].' '.$data[5].'</td>
         <td>'.$data[1].'</td>
                <td>'.$year.' </td>
        
               
              </tr>';
        
      }
?>
   
  </tbody>
</table>