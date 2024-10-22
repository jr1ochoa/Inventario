<?php

 include("../../config/net.php");


 $valor_Recibido = $_POST['idModal'];
 $year = date("Y");
// Consulta SQL para contar los grupos iguales basados en id_candidato

$query = "SELECT id_candidato, COUNT(*) as cantidad, s2.name1, s2.name2,s2.lastname1, s2.lastname2 FROM votaciones_resultados as s1 inner join employee as s2 on s1.id_candidato = s2.id 
where s1.id_comite =". $valor_Recibido . " and s1.year_votacion = ".$year."
GROUP BY id_candidato";

$result = $net_rrhh->query($query);

 

// Crear un arreglo para almacenar los datos

$dataArray = array();



// Recorrer los resultados de la consulta y agregarlos al arreglo

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

    $fullName = $row['name1'] . ' ' . $row['name2'] . ' ' . $row['lastname1']. ' ' . $row['lastname2'].' || VOTOS: '.$row['cantidad'];

    $data = array(

        'name' => $fullName,

        'y' => intval($row['cantidad'])

    );

    $dataArray[] = $data;

   

}

// Imprimir el contenido del arreglo

/*echo '<pre>';

print_r($dataArray);

echo '</pre>';*/

// Convertir el arreglo a formato JSON

$jsonData = json_encode($dataArray);



// Cerrar la conexión a la base de datos si es necesario



?> 

<script src="https://code.highcharts.com/highcharts.js"></script>

<script src="https://code.highcharts.com/highcharts-3d.js"></script>

<script src="https://code.highcharts.com/modules/exporting.js"></script>

<script src="https://code.highcharts.com/modules/export-data.js"></script>

<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<div class="container">
<button id="btnRegresarSolicitud" type="button" class="btn btn btn-light btn-sm position-absolute" style="left: 0; color:blue; border-bottom: 2px solid #000;">Regresar</button>
    
<div class="row">
    <div class="col-md-5">
  
<figure class="highcharts-figure">

    <div id="container"></div>

    <!--<p class="highcharts-description">

        Pie charts are very popular for showing a compact overview of a

        composition or comparison. While they can be harder to read than

        column charts, they remain a popular choice for small datasets.

    </p>-->

</figure>
    </div>
    <div class="col-md mt-4">
    <div class="col-2"> 
        
        <!--view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.tabla.excel.php?fecha=<?php echo $valor_Recibido; ?>-->
        <a href="view/votaciones/votaciones.descargar.ganadores.excel.php?idModal=<?php echo $valor_Recibido; ?>" target="_blank">Descargar</a>
        </div>
        <center style="background-color: #555; color:#f8f8f8;"><b style="color: #f1f7ff;">CANDIDATOS vs # DE VOTOS</b></center>
        
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
    </div>

</div>
</div>







<div class="container">
<a href="view/votaciones/votaciones.descargar.historial.excel.php?idModal=<?php echo $valor_Recibido; ?>" target="_blank">Descargar</a>
<center style="background-color: #555; color:#f8f8f8;"><b style="color: #f1f7ff;">VOTANTES VS CANDIDATOS</b></center>
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

</div>

<style>

    .highcharts-figure,

.highcharts-data-table table {

    min-width: 320px;

    max-width: 800px;

    margin: 1em auto;

}



.highcharts-data-table table {

    font-family: Verdana, sans-serif;

    border-collapse: collapse;

    border: 1px solid #ebebeb;

    margin: 10px auto;

    text-align: center;

    width: 100%;

    max-width: 500px;

}



.highcharts-data-table caption {

    padding: 1em 0;

    font-size: 1.2em;

    color: #555;

}



.highcharts-data-table th {

    font-weight: 600;

    padding: 0.5em;

}



.highcharts-data-table td,

.highcharts-data-table th,

.highcharts-data-table caption {

    padding: 0.5em;

}



.highcharts-data-table thead tr,

.highcharts-data-table tr:nth-child(even) {

    background: #f8f8f8;

}



.highcharts-data-table tr:hover {

    background: #f1f7ff;

}



input[type="number"] {

    min-width: 50px;

}



</style>

<script>

$("#btnRegresarSolicitud").click(function(){
    window.location.href='?view=votacionesAdmin';  
})


 var jsonData = <?php echo $jsonData; ?>;

 Highcharts.chart('container', {

    chart: {

        type: 'pie'

    },

    title: {

        text: 'COMITÉ DE SEGURIDAD OCUPACIONAL'

    },

    tooltip: {

        valueSuffix: '%'

    },

    subtitle: {

        text:

        'ESTADISTICAS FUSALMO'

    },

    plotOptions: {

        series: {

            allowPointSelect: true,

            cursor: 'pointer',

            dataLabels: [{

                enabled: true,

                distance: 20

            }, {

                enabled: true,

                distance: -40,

                format: '{point.percentage:.1f}%',

                style: {

                    fontSize: '1.2em',

                    textOutline: 'none',

                    opacity: 0.7

                },

                filter: {

                    operator: '>',

                    property: 'percentage',

                    value: 10

                }

            }]

        }

    },

    series:  [{

        name: 'Cantidad',

        colorByPoint: true,

        data: jsonData

    }]





   

    

});



  

</script>

