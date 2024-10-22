<?php 
include("../../config/net.php");
header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=Reporte_Votaciones_Historial.xls");
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

    <th scope="col">#</th>

      <th scope="col">VOTANTE</th>

      <th scope="col"></th>

      <th scope="col">CANDIDATO</th>

    </tr>

  </thead>

  <tbody>

    <?php 

    
try{
    $query = "SELECT  CONVERT(s2.name1 USING utf8) , CONVERT(s2.name2 USING utf8),  CONVERT(s2.lastname1 USING utf8) as apellido_votante, CONVERT(s2.lastname2 USING utf8) as apellido2_votante, 

    s3.name1 AS nombre_candidato, s3.name2 as nombre2_candidato, s3.lastname1 as apellido1_candidato, s3.lastname2 as apellido2_candidato

    FROM `votaciones_resultados` AS s1

    INNER JOIN `employee` AS s2 ON s2.id = s1.id_votante

    INNER JOIN `employee` AS s3 ON s3.id = s1.id_candidato
    
    where s1.id_comite = ? and s1.year_votacion = ?
    
    ";

    $data3 = $net_rrhh->prepare($query);

    $data3->execute([$valor_Recibido,$year]);
$sumador = 1;
     while ($data = $data3->fetch()) 

     {

        echo '<tr>
<td>'.($sumador++).'</td>
        <td>'.$data[0].' '.$data[1].' '.$data[2].' '.$data[3].'</td>

        <td>voto por   👉</td>

        <td> '.$data[4].' '.$data[5].' '.$data[6].' '.$data[7].'</td>

      </tr>';

     }



}catch(Exception $e)
{
    echo $e->getMessage();
} 
 
    ?>

    

   

  </tbody>

</table>