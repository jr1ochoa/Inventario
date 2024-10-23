<?php include("../../config/net.php"); //Conexión con la BDD
   $type = $_REQUEST["type"];
   $type2 = $_REQUEST["type2"];
   $type3 = $_REQUEST["type3"];
   

//Cabeceras para generar archivo .xls
header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");
header("Content-Disposition: attachment; filename=Reporte_Inventario.xls");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);

?>
<style>
    table, td, th {
        border: 1px solid;
        width: 100%;
    }
</style>


<table class="table">
    <thead>
       
        <tr>
      <th scope="col">Nombre de la Evaluacion</th>
      <th scope="col">Pregunta</th>
      <th scope="col">Resultado Global</th>
      <th scope="col">Año de la Evaluación</th>
      <th scope="col">Empleado</th>
    </tr>
    </thead>
    <tbody>
       
  <?php
  try {
    
           $query = "SELECT s1.*, s2.question,s3.name1,s3.name2,s3.lastname1,s3.lastname2, s4.evaluationtype FROM evaluations_results as s1 inner join evaluations_questions as s2 on s1.idquestion = s2.id inner join employee as s3 on s3.id = s1.idemployee inner join evaluations_assignments as s4 on s1.idassignation = s4.id WHERE YEAR(s1.dtc) = ? and s1.idemployee =?";
            $evaluations = $net_rrhh->prepare($query);
            $evaluations->execute([$type3,$type2]);
        } catch (PDOException $e) {
            echo "Error en la ejecución del query: " . $e->getMessage();
        }

            while($dataE = $evaluations->fetch()){

                echo sanear_string("<tr>
                        <td>$dataE[12]</td>               
                        <td>$dataE[7]</td>
                        <td>$dataE[5]</td>
                        <td>$dataE[6]</td>
                        <td>$dataE[8] $dataE[9], $dataE[10] $dataE[11] </td>
                        
                    </tr>");
            };
        ?>
    </tbody>
</table>
