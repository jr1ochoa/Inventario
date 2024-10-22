<?php
include("../../config/net.php");
?>

<?php
$sumador =0;
$monto_inicial = $_REQUEST['montoInicial'];
$monto_final = $_REQUEST['montofinal'];

if($monto_inicial == 0 && $monto_final ==0)
{
// Realiza la conexión a la base de datos (asegúrate de que $net_rrhh esté configurado correctamente)
$query = "SELECT DISTINCT s1.*, s2.name1, s2.name2, s2.name3, s2.lastname1, s2.lastname2, s3.proyecto, s3.conocidoComo,
                 s4.suma_montos_total_proyectos, s5.porcentaje_ejecucion
          FROM monitor_generalidad_proyecto AS s1
          INNER JOIN employee AS s2 ON s1.id_coordinador = s2.id
          INNER JOIN monitor_proyecto AS s3 ON s1.id_proyecto = s3.id 
          LEFT JOIN monitor_ficha_encabezado AS s4 ON s4.id_proyecto_generalidades = s1.id
          LEFT JOIN monitor_avance_financiero AS s5 ON s5.id_generalidad_proyecto = s1.id
          WHERE (s1.estado = 1 OR s1.estado = 2) 
          ORDER BY s1.fh_inicio asc";

$data3 = $net_rrhh->prepare($query);
$data3->execute();
}
else {
    // Realiza la conexión a la base de datos (asegúrate de que $net_rrhh esté configurado correctamente)
$query = "SELECT DISTINCT s1.*, s2.name1, s2.name2, s2.name3, s2.lastname1, s2.lastname2, s3.proyecto, s3.conocidoComo,
s4.suma_montos_total_proyectos, s5.porcentaje_ejecucion
FROM monitor_generalidad_proyecto AS s1
INNER JOIN employee AS s2 ON s1.id_coordinador = s2.id
INNER JOIN monitor_proyecto AS s3 ON s1.id_proyecto = s3.id 
LEFT JOIN monitor_ficha_encabezado AS s4 ON s4.id_proyecto_generalidades = s1.id
LEFT JOIN monitor_avance_financiero AS s5 ON s5.id_generalidad_proyecto = s1.id
WHERE (s1.estado = 1 OR s1.estado = 2) and (suma_montos_total_proyectos >= $monto_inicial and  suma_montos_total_proyectos <= $monto_final)
ORDER BY s1.fh_inicio asc";

$data3 = $net_rrhh->prepare($query);
$data3->execute();
}


// Almacena los resultados en arrays para pasarlos a JavaScript
$years = [];
$amounts = [];

$yearspUESTOS = range(2021, 2024);

while ($data = $data3->fetch()) {
    $sumador++;
    $fechaData10 = new DateTime($data[10]);
    $fechaFormateada10 = $fechaData10->format('d/m/Y');
    $years[] = $fechaFormateada10;  // Asumiendo que $data[10] es el año
    $amounts[] = $data[19]; // Asumiendo que $data[19] es el monto
}

// Ejemplo de generación de datos en PHP (reemplaza con tus datos reales)
//$years = [2021, 2022, 2023, 2024];
//$amounts = [1000, 2000, 3000, 4000]; // Ejemplo de cantidades
//$rangoyears = ['2017','2018','2019','2020','2021','2021', '2022', '2023', '2024'];
// Convierte los arrays a JSON para que puedan ser utilizados en JavaScript
$years_json = json_encode($years);
// Convertir la cadena JSON a un array de PHP
$amounts_cleaned = array_map(function($amount) {
    return ($amount === null || $amount === "null") ? 0 : floatval($amount);
}, $amounts);
$amounts_json = json_encode($amounts_cleaned);
$yearspUESTOS_json = json_encode($yearspUESTOS);

if($monto_final == 0)
{
    $escalaMaxima_json = 1500000.00;
}
else
{
    $escalaMaxima_json = $monto_final;
}

?>

<style>.highcharts-figure,
.highcharts-data-table table {
    min-width: 320px;
    max-width: 800px;
    margin: 1em auto;
}

#container {
    height: 450px;
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

    </style>
 

<div class="row">
    <div class="col-md-5">

    </div>
    <div class="col-auto">
    <div  class="d-flex align-items-center text-dark text-decoration-none">
    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="21" fill="currentColor" class="bi bi-easel3-fill" viewBox="0 0 16 16">
  <path d="M8.5 12v1.134a1 1 0 1 1-1 0V12h-5A1.5 1.5 0 0 1 1 10.5V3h14v7.5a1.5 1.5 0 0 1-1.5 1.5zm7-10a.5.5 0 0 0 0-1H.5a.5.5 0 0 0 0 1z"/>
</svg>
        <span class="fs-4">TOTAL DE PROYECTOS : <?php echo $sumador; ?></span>
</div>
    </div>
</div>
 

 <figure class="highcharts-figure">
        <div id="container"></div>
    </figure>

<div class="row">
    <div class="col-md-2">

    </div>
    <div class="col-md-8">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">CONOCIDO COMO</th>
      <th scope="col">MONTO</th>
      <th scope="col">FECHA INICIO</th>
    </tr>
  </thead>
  <tbody>
  <?php 



function convertirMiles($numeroRecibido)

{

    $numero = $numeroRecibido;



    // Formatea el número con separador de miles y dos decimales

    $numeroFormateado = number_format($numero, 2, '.', ',');

    

    return $numeroFormateado;

}

?>
    <?php 
    $contador =1;
    if($monto_inicial == 0 && $monto_final ==0)
    {
    // Realiza la conexión a la base de datos (asegúrate de que $net_rrhh esté configurado correctamente)
    $query = "SELECT DISTINCT s1.*, s2.name1, s2.name2, s2.name3, s2.lastname1, s2.lastname2, s3.proyecto, s3.conocidoComo,
                     s4.suma_montos_total_proyectos, s5.porcentaje_ejecucion
              FROM monitor_generalidad_proyecto AS s1
              INNER JOIN employee AS s2 ON s1.id_coordinador = s2.id
              INNER JOIN monitor_proyecto AS s3 ON s1.id_proyecto = s3.id 
              LEFT JOIN monitor_ficha_encabezado AS s4 ON s4.id_proyecto_generalidades = s1.id
              LEFT JOIN monitor_avance_financiero AS s5 ON s5.id_generalidad_proyecto = s1.id
              WHERE (s1.estado = 1 OR s1.estado = 2) 
              ORDER BY s1.fh_inicio asc";
    
    $data3 = $net_rrhh->prepare($query);
    $data3->execute();
    }
    else {
        // Realiza la conexión a la base de datos (asegúrate de que $net_rrhh esté configurado correctamente)
    $query = "SELECT DISTINCT s1.*, s2.name1, s2.name2, s2.name3, s2.lastname1, s2.lastname2, s3.proyecto, s3.conocidoComo,
    s4.suma_montos_total_proyectos, s5.porcentaje_ejecucion
    FROM monitor_generalidad_proyecto AS s1
    INNER JOIN employee AS s2 ON s1.id_coordinador = s2.id
    INNER JOIN monitor_proyecto AS s3 ON s1.id_proyecto = s3.id 
    LEFT JOIN monitor_ficha_encabezado AS s4 ON s4.id_proyecto_generalidades = s1.id
    LEFT JOIN monitor_avance_financiero AS s5 ON s5.id_generalidad_proyecto = s1.id
    WHERE (s1.estado = 1 OR s1.estado = 2) and (suma_montos_total_proyectos >= $monto_inicial and  suma_montos_total_proyectos <= $monto_final)
    ORDER BY s1.fh_inicio asc";
    
    $data3 = $net_rrhh->prepare($query);
    $data3->execute();
    }
while ($data = $data3->fetch()) {
    $fechaData10 = new DateTime($data[10]);
    $fechaFormateada10 = $fechaData10->format('d/m/Y');
   
    echo
    '
    <tr>
      <th scope="row">'.$contador++.'</th>
      <td>'.$data[18].'</td>
      <td>$ '.convertirMiles($data[19]).'</td>
      <td>'.$fechaFormateada10 .'</td>
    </tr>
    ';
}
    ?>
    
    
  </tbody>
</table>
    </div>
</div>
   
    <script>
        $(document).ready(function () {
            // Obtén los datos desde PHP
            var years = <?php echo $years_json; ?>;
            var amounts = <?php echo $amounts_json; ?>;
           var escalaMAXIMA = <?php echo $escalaMaxima_json; ?>;
          
          
           

           Highcharts.chart('container', {
        chart: {
            type: 'area'
        },
        title: {
            text: 'Tendencias Financieras de Proyectos  en FUSALMO'
        },
        xAxis: {
            categories: years,
            title: {
                text: 'Años'
            }
        },
        yAxis: {
            title: {
                text: 'Montos'
            },
            min: 0,  // Establecer el mínimo en 0
            max: escalaMAXIMA,  // Establecer el máximo según tu rango de montos
            labels: {
                formatter: function () {
                    return '$' + this.axis.defaultLabelFormatter.call(this);
                }
            },
            tickAmount: 5  // Establecer la cantidad de ticks deseados
        },
        tooltip: {
            pointFormat: '<b>${point.y}</b> en el año {point.category}'
        },
        series: [{
            name: 'Montos',
            data: amounts
        }]
    });        });
    </script>
