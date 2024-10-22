<?php include("../../../../config/net.php"); 

    //FILTROS
    $filters = "";
    if (!empty($_REQUEST["startDate"])) {
        $filters = "AND r.fh_salida >= '" . $_REQUEST["startDate"] . "' ";

        if (!empty($_REQUEST["endDate"])) {
            $filters .= "AND r.fh_salida <= '" . $_REQUEST["endDate"] . "' ";
        }
    } elseif (!empty($_REQUEST["endDate"])) {
        $filters = "AND r.fh_salida <= '" . $_REQUEST["endDate"] . "' ";
    }

    // CANTIDAD TOTAL DE SOLICITUDES
    $query = "SELECT * FROM `admin_finanzas_formulario` as r
                WHERE r.estado > 2 $filters;";
    $requests = $net_rrhh->prepare($query);
    $requests->execute();

    // CANTIDAD DE SOLICITUDES POR EMPLEADO
    if (isset($_REQUEST["workarea"])) {
        $idw = $_REQUEST["workarea"];
        $query = "SELECT CONCAT(e.name1,' ', e.name2, ' ', e.lastname1, ' ', e.lastname2) as 'Empleado', COUNT(*) FROM `admin_finanzas_formulario` as r
                    INNER JOIN employee as e ON e.id = r.id_empleado
                    WHERE r.estado > 2 AND r.id_area_solicitante = $idw $filters
                    GROUP BY CONCAT(e.name1,' ', e.name2, ' ', e.lastname1, ' ', e.lastname2) ORDER BY COUNT(*) DESC;";

    }else{
        $query = "SELECT CONCAT(e.name1,' ', e.name2, ' ', e.lastname1, ' ', e.lastname2) as 'Empleado', COUNT(*) FROM `admin_finanzas_formulario` as r
                    INNER JOIN employee as e ON e.id = r.id_empleado
                    WHERE r.estado > 2 $filters
                    GROUP BY CONCAT(e.name1,' ', e.name2, ' ', e.lastname1, ' ', e.lastname2) ORDER BY COUNT(*) DESC LIMIT 10;";
                    
    }
    $employee = $net_rrhh->prepare($query);
    $employee->execute();
    $i=0;
    $name = "";
    $nameCount = "";

    while ($data = $employee->fetch()) {
        $i++;
        if ($i == 10) {
            $name .= ("'".$data[0]."'");
            $nameCount .= $data[1];

        }else{
            $name .= ("'".$data[0]."',");
            $nameCount .= $data[1].",";
            
        }
        
    }


    // CANTIDAD DE SOLICITUDES POR ÁREA
    $query = "SELECT w.area, COUNT(*) FROM `admin_finanzas_formulario` as r
                INNER JOIN workarea as w ON w.id = r.id_area_solicitante
                WHERE r.estado > 2 $filters
                GROUP BY w.area ORDER BY COUNT(*) DESC;";
    $workarea = $net_rrhh->prepare($query);
    $workarea->execute();
    $i=0;
    $areas = "";
    $areasCount = "";

    while ($data = $workarea->fetch()) {
        $i++;
        if ($i == $workarea->rowCount()) {
            $areas .= ("'".$data[0]."'");
            $areasCount .= $data[1];

        }else{
            $areas .= ("'".$data[0]."',");
            $areasCount .= $data[1].",";
            
        }
        
    }


    // PORCENTAJE DE ASIGNACIONES POR VEHÍCULO
    $query = "SELECT CONCAT(v.marca,' ', v.modelo, ' ', v.year, ' ', v.color) as 'Vehículo', COUNT(*) 
                FROM `admin_finanzas_formulario` as r
                INNER JOIN admin_finanzas_informacion_vehiculo as v ON r.id_vehiculo = v.id
                WHERE r.estado > 2 $filters
                GROUP BY CONCAT(v.marca,' ', v.modelo, ' ', v.year, ' ', v.color) 
                ORDER BY COUNT(*) DESC";
    $car = $net_rrhh->prepare($query);
    $car->execute();
    $i=0;
    $totalRequestCar=0;
    $nameCarPercentage = "";
    $nameCar = array();
    $nameCarCount = array();

    while ($data = $car->fetch()) {
        $i++;
        array_push($nameCarCount, $data[1]);
        array_push($nameCar, $data[0]);
        $totalRequestCar += $data[1];
    }

    $i=0;
    $cont=0;
    foreach ($nameCarCount as $value) {
        $i++;
        $num = round(($value/$totalRequestCar) * 100, 2);
        if ($i == $car->rowCount()) {
            $nameCarPercentage .= "{
                            name: '".$nameCar[$cont]."',
                            y: $num
                        }";
        }else{
            $nameCarPercentage .= "{
                name: '".$nameCar[$cont]."',
                y: $num
            },";
        }
        $cont++;
    }


    //PORCENTAJE DE ASIGNACIONES POR MOTORISTAS
    $query = "SELECT CONCAT(e.name1,' ', e.name2, ' ', e.lastname1, ' ', e.lastname2) as 'Empleado', COUNT(*) 
                FROM `admin_finanzas_formulario` as r 
                INNER JOIN admin_finanzas_lista_motorista as m ON m.id = r.id_empleado_motorista 
                INNER JOIN employee as e ON e.id = m.id_empleado 
                WHERE r.estado > 2 $filters
                GROUP BY CONCAT(e.name1,' ', e.name2, ' ', e.lastname1, ' ', e.lastname2) ORDER BY COUNT(*) DESC";
    $driver = $net_rrhh->prepare($query);
    $driver->execute();
    $i=0;
    $totalRequest=0;
    $nameDriverPercentage = "";
    $nameDriver = array();
    $nameDriverCount = array();


    while ($data = $driver->fetch()) {
        $i++;
        array_push($nameDriverCount, $data[1]);
        array_push($nameDriver, $data[0]);
        $totalRequest += $data[1];
    }

    $i=0;
    $cont=0;
    foreach ($nameDriverCount as $value) {
        $i++;
        $num = round(($value/$totalRequest) * 100, 2);
        if ($i == $driver->rowCount()) {
            $nameDriverPercentage .= "{
                            name: '".$nameDriver[$cont]."',
                            y: $num
                        }";
        }else{
            $nameDriverPercentage .= "{
                name: '".$nameDriver[$cont]."',
                y: $num
            },";
        }
        $cont++;
    }


    //CANTIDAD DE SOLICITUDES POR DÍA DE LA SEMANA
    $query = "SELECT 
                CASE DAYOFWEEK(r.fh_salida)
                    WHEN 1 THEN 'Domingo'
                    WHEN 2 THEN 'Lunes'
                    WHEN 3 THEN 'Martes'
                    WHEN 4 THEN 'Miércoles'
                    WHEN 5 THEN 'Jueves'
                    WHEN 6 THEN 'Viernes'
                    WHEN 7 THEN 'Sábado'
                END AS dia_semana,
                COUNT(*) AS total FROM `admin_finanzas_formulario` as r
                WHERE r.estado > 2 $filters
                GROUP BY dia_semana
                ORDER BY FIELD(dia_semana, 'Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');";
    $days = $net_rrhh->prepare($query);
    $days->execute();
    $i=0;
    $day = "";
    $dayCount = "";

    while ($data = $days->fetch()) {
        $i++;
        if ($i == $days->rowCount()) {
            $day .= ("'".$data[0]."'");
            $dayCount .= $data[1];

        }else{
            $day .= ("'".$data[0]."',");
            $dayCount .= $data[1].",";
            
        }
        
    }
?>
<!-- :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: -->

<h2 class="text-center mb-4">TOTAL: <b><?=$requests->rowCount()?> Solicitudes</b></h2>


<!-- Filtro de empleados por área -->
<div class="card mb-5">
    <div class="card-body">
        <label for="txtWorkarea" class="form-label">Empleados por área:</label>
        <select id="txtWorkarea" class="form-select" aria-label="Default select example">
            <option value="" selected>Seleccionar Todos</option>
            <?php
                $query = "SELECT * FROM `workarea` WHERE visible = 1;";
                $areaList = $net_rrhh->prepare($query);
                $areaList->execute();
                while ($dataAL = $areaList->fetch()) {
                    $selected = ($_REQUEST["workarea"] == $dataAL[0]) ? "selected" : "";
                    echo "<option value='$dataAL[0]' $selected>$dataAL[1]</option>";
                }
            ?>
        </select>
    </div>
</div>

<!-- CANTIDAD DE SOLICITUDES POR EMPLEADO -->
<div class="card mb-5">
    <div class="card-body">
        <div id="graphic1"></div>
    </div>
</div>   

<!-- CANTIDAD DE SOLICITUDES POR ÁREA -->   
<div class="card mb-5">
    <div class="card-body">
        <div id="graphic2"></div>
    </div>
</div>

<div class="row">

    <!-- PORCENTAJE DE ASIGNACIONES POR VEHÍCULO -->  
    <div class="col-md mb-5">
         <div class="card">
            <div class="card-body">
                <div id="graphic3"></div>
            </div>
         </div> 
    </div>

    <!-- PORCENTAJE DE ASIGNACIONES POR MOTORISTAS -->  
    <div class="col-md mb-5">
         <div class="card">
            <div class="card-body">
                <div id="graphic4"></div>
            </div>
         </div> 
    </div>

</div>

<!-- CANTIDAD DE SOLICITUDES POR DÍA -->
<div class="card mb-5">
    <div class="card-body">
        <div id="graphic5"></div>
    </div>
</div>   

<!-- :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: -->

<script>
    $(document).ready(function(){

        //Filtro por área
        $("#txtWorkarea").change(function(){
            $("#loadStats").load("/view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.estadisticas.php",{
                startDate: $("#txtStartDate").val(),
                endDate: $("#txtEndDate").val(),
                workarea: $("#txtWorkarea").val()
            });
        });


        //CANTIDAD DE SOLICITUDES POR EMPLEADO
        Highcharts.chart('graphic1', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'EMPLEADOS CON MÁS SOLICITUDES',
                align: 'center'
            },
            subtitle: {
                text:
                    'Source: <a target="_blank" ' +
                    'href="https://sii.fusalmo.org/?view=administracionFinanza">Sistema de Transporte</a>',
                align: 'center'
            },
            xAxis: {
                categories: [<?=$name?>],
                crosshair: true,
                accessibility: {
                    description: 'Empleado'
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Solicitudes'
                }
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [
                {
                    name: 'Solicitudes',
                    data: [<?=$nameCount?>]
                }
            ]
        });


        //CANTIDAD DE SOLICITUDES POR ÁREA
        Highcharts.chart('graphic2', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'LISTADO DE ÁREAS CON MÁS SOLICITUDES',
                align: 'center'
            },
            subtitle: {
                text:
                    'Source: <a target="_blank" ' +
                    'href="https://sii.fusalmo.org/?view=administracionFinanza">Sistema de Transporte</a>',
                align: 'center'
            },
            xAxis: {
                categories: [<?=$areas?>],
                crosshair: true,
                accessibility: {
                    description: 'Áreas'
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Solicitudes'
                }
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [
                {
                    name: 'Solicitudes',
                    data: [<?=$areasCount?>]
                }
            ]
        });


        //PORCENTAJE DE ASIGNACIONES POR VEHÍCULO
        Highcharts.chart('graphic3', {
            chart: {
                type: 'pie',
                custom: {},
                events: {
                    render() {
                        const chart = this,
                            series = chart.series[0];
                        let customLabel = chart.options.chart.custom.label;

                        if (!customLabel) {
                            customLabel = chart.options.chart.custom.label =
                                chart.renderer.label(
                                    'Total<br/>' +
                                    '<strong><?=$totalRequestCar?></strong>'
                                )
                                    .css({
                                        color: '#000',
                                        textAnchor: 'middle'
                                    })
                                    .add();
                        }

                        const x = series.center[0] + chart.plotLeft,
                            y = series.center[1] + chart.plotTop -
                            (customLabel.attr('height') / 2);

                        customLabel.attr({
                            x,
                            y
                        });
                        customLabel.css({
                            fontSize: `${series.center[2] / 12}px`
                        });
                    }
                }
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            title: {
                text: 'Porcentajes de Asignaciones a Vehículos'
            },
            subtitle: {
                text:
                    'Source: <a target="_blank" ' +
                    'href="https://sii.fusalmo.org/?view=administracionFinanza">Sistema de Transporte</a>',
                align: 'center'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.0f}%</b>'
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    borderRadius: 8,
                    dataLabels: [{
                        enabled: true,
                        distance: 20,
                        format: '{point.name}'
                    }, {
                        enabled: true,
                        distance: -15,
                        format: '{point.percentage:.0f}%',
                        style: {
                            fontSize: '0.9em'
                        }
                    }],
                    showInLegend: true
                }
            },
            series: [{
                name: 'Registrations',
                colorByPoint: true,
                innerSize: '75%',
                data: [<?=$nameCarPercentage?>]
            }]
        });


        //PORCENTAJE DE ASIGNACIONES POR MOTORISTAS
        Highcharts.chart('graphic4', {
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Porcentaje de Asignaciones a Motoristas'
            },
            tooltip: {
                valueSuffix: '%'
            },
            subtitle: {
                text:
                    'Source: <a target="_blank" ' +
                    'href="https://sii.fusalmo.org/?view=administracionFinanza">Sistema de Transporte</a>',
                align: 'center'
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
            series: [
                {
                    name: 'Percentage',
                    colorByPoint: true,
                    data: [<?=$nameDriverPercentage?>]
                }
            ]
        });


        //CANTIDAD DE SOLICITUDES POR DÍA
        Highcharts.chart('graphic5', {
            title: {
                text: 'Cantidad de Solicitudes por Día de la Semana'
            },

            accessibility: {
                point: {
                    valueDescriptionFormat:
                        '{xDescription}{separator}{value}'
                }
            },

            xAxis: {
                title: {
                    text: 'Días de la semana'
                },
                categories: [<?=$day?>]
            },

            yAxis: {
                type: 'logarithmic',
                title: {
                    text: 'Solicitudes'
                }
            },

            tooltip: {
                headerFormat: '<b>{series.name}</b><br />',
                pointFormat: '{point.y}'
            },

            series: [{
                name: 'Solicitudes',
                keys: ['y'],
                data: [<?=$dayCount?>]
            }]
        });

    });
</script>