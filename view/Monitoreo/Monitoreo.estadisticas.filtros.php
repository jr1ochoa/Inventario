<?php
include("../../config/net.php");
?>


<?php
// Realiza la conexión a la base de datos (asegúrate de que $net_rrhh esté configurado correctamente)
$query = "SELECT DISTINCT s1.*, s2.name1, s2.name2, s2.name3, s2.lastname1, s2.lastname2, s3.proyecto, s3.conocidoComo,
                 s4.suma_montos_total_proyectos, s5.porcentaje_ejecucion
          FROM monitor_generalidad_proyecto AS s1
          INNER JOIN employee AS s2 ON s1.id_coordinador = s2.id
          INNER JOIN monitor_proyecto AS s3 ON s1.id_proyecto = s3.id 
          LEFT JOIN monitor_ficha_encabezado AS s4 ON s4.id_proyecto_generalidades = s1.id
          LEFT JOIN monitor_avance_financiero AS s5 ON s5.id_generalidad_proyecto = s1.id
          WHERE (s1.estado = 1 OR s1.estado = 2) and suma_montos_total_proyectos = 100000.00 
          ORDER BY s1.fh_inicio asc";

$data3 = $net_rrhh->prepare($query);
$data3->execute();

// Almacena los resultados en arrays para pasarlos a JavaScript
$years = [];
$amounts = [];

$yearspUESTOS = range(2021, 2024);

while ($data = $data3->fetch()) {
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
 




 <figure class="highcharts-figure">
        <div id="container"></div>
    </figure>


    <script>
        $(document).ready(function () {
            // Obtén los datos desde PHP
            var years = <?php echo $years_json; ?>;
            var amounts = <?php echo $amounts_json; ?>;
           // var rangoyears = <?php echo $yearspUESTOS_json; ?>;
          
          
           

           Highcharts.chart('container', {
        chart: {
            type: 'area'
        },
        title: {
            text: 'Historial de Proyectos'
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
            max: 1500000.00,  // Establecer el máximo según tu rango de montos
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
