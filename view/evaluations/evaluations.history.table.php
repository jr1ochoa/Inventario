<?php 
 include("../../config/net.php"); 
    $type = $_REQUEST["type"];
    $type2 = $_REQUEST["type2"];
    $type3 = $_REQUEST["type3"];
    

    /*
    type: $("#area :selected").val(),
            type2: $("#employees :selected").val(),
            type3: $("#year :selected").val(),
    
    */
    //echo "Valor del Tipo1: ".$type;
    //echo "Valor del Tipo2: ".$type2;
    //echo "Valor del Tipo3: ".$type3;

    //SELECT * FROM evaluations_results WHERE YEAR(dtc) = 2023 and idemployee = 220732; 
    /*SELECT s1.*, s2.question,s3.name1,s3.name2,s3.lastname1,s3.lastname2, s4.evaluationtype
		FROM evaluations_results as s1 inner join evaluations_questions as s2 on s1.idquestion = s2.id
        inner join employee as s3 on s3.id = s1.idemployee
        inner join evaluations_assignments as s4 on s1.idassignation = s4.id
        WHERE YEAR(s1.dtc) = 2023 and idemployee = s1.220732; */
?>

<div class="col-md-12 borderFiltro  ">
        <br/>
        <div class="row">
           <center>
           <div class="col-md-8">
           <a type="button" id="btnExport" class="btn btn-success btn-sm mb-2">Descargar en Excel 📎</a>
            <table class="table table-striped colorFiltro ">
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
            </div>
           </center>
            
            <div class="col-md-1">

            </div>
       
        </div>
    
    </div>

    <script>

         //Exportar los registros en excel
         $("#btnExport").click(function(){
           // window.open('view/inventory/inventory.report.php', '_blank'),
           // Obtener los valores seleccionados
    var type = $("#area :selected").val();
    var type2 = $("#employees :selected").val();
    var type3 = $("#year :selected").val();

    // Construir la URL con los parámetros de consulta
    var url = 'view/evaluations/evaluations.excel.php?type=' + encodeURIComponent(type) +
              '&type2=' + encodeURIComponent(type2) +
              '&type3=' + encodeURIComponent(type3);

    // Abrir la nueva pestaña con la URL construida
    window.open(url, '_blank');
        });
    </script>