<?php

    $db = "transformaedu_db";
    $dbUser = "transformaedu_user";
    $dbPass = "Eh4bdmCqlfv4";
    $root = "https://fusalmo.org/";

    try 
    {
        $net = new PDO("mysql:host=localhost;dbname=$db", $dbUser, $dbPass);
    } 
    catch (PDOException $e) 
    {
        print "Error!: " . $e->getMessage() . "<br/>";    
        $net = null;
        die();
    }

    //Filtros
    $programs = $_REQUEST["programs"];
    $filters = "";
    $cont = 0;

    if ($programs != "") {
        
        $filters = " AND (";
        foreach ($programs as $value) {
            if ($cont == 0) {
                $filters .= "g.idProgram = $value";
            }else{
                $filters .= " OR g.idProgram = $value";
            }
            $cont++;
        }
        $filters .= ")";
    }
    
    //General
    $query = "SELECT COUNT(*) FROM `wp_fm_beneficiaries` as b 
                INNER JOIN wp_fm_relationships as rg ON b.id = rg.idRelation_1 AND rg.type = 'Beneficiary_Group'
                INNER JOIN wp_fm_relationships as rs ON b.id = rs.idRelation_1 AND rs.type = 'Beneficiary_SubGroup'
                INNER JOIN wp_fm_groups as g ON g.id = rg.idRelation_2 
                INNER JOIN wp_fm_subgroups as s ON s.id = rs.idRelation_2
                WHERE rg.status != 0 AND rg.status != 2 $filters;";
    $beneficiaries = $net->prepare($query);
    $beneficiaries->execute();
    $dataB = $beneficiaries->fetch();

    //Sexo
    $query = "SELECT
                    SUM(CASE WHEN b.idCampus = '1' THEN 1 ELSE 0 END) as 'Soyapango', 
                    SUM(CASE WHEN b.idCampus = '2' THEN 1 ELSE 0 END) as 'Santa Ana', 
                    SUM(CASE WHEN b.idCampus = '3' THEN 1 ELSE 0 END) as 'San Miguel'
                FROM `wp_fm_beneficiaries` as b 
                INNER JOIN wp_fm_relationships as rg ON b.id = rg.idRelation_1 AND rg.type = 'Beneficiary_Group'
                INNER JOIN wp_fm_relationships as rs ON b.id = rs.idRelation_1 AND rs.type = 'Beneficiary_SubGroup'
                INNER JOIN wp_fm_groups as g ON g.id = rg.idRelation_2 
                INNER JOIN wp_fm_subgroups as s ON s.id = rs.idRelation_2
                WHERE rg.status != 0 AND rg.status != 2 $filters;";

    $campus = $net->prepare($query);
    $campus->execute();
    $dataC = $campus->fetch();
    
    //Sexo
    $query = "SELECT
                    SUM(CASE WHEN b.gender = 'Masculino' THEN 1 ELSE 0 END) as 'Masculino', 
                    SUM(CASE WHEN b.gender = 'Femenino' THEN 1 ELSE 0 END) as 'Femenino'  
                FROM `wp_fm_beneficiaries` as b 
                INNER JOIN wp_fm_relationships as rg ON b.id = rg.idRelation_1 AND rg.type = 'Beneficiary_Group'
                INNER JOIN wp_fm_relationships as rs ON b.id = rs.idRelation_1 AND rs.type = 'Beneficiary_SubGroup'
                INNER JOIN wp_fm_groups as g ON g.id = rg.idRelation_2 
                INNER JOIN wp_fm_subgroups as s ON s.id = rs.idRelation_2
                WHERE rg.status != 0 AND rg.status != 2 $filters;";
    $gender = $net->prepare($query);
    $gender->execute();
    $dataG = $gender->fetch();
    
    //Departamentos
    $query = "SELECT b.department, COUNT(*)  
                FROM `wp_fm_beneficiaries` as b 
                INNER JOIN wp_fm_relationships as rg ON b.id = rg.idRelation_1 AND rg.type = 'Beneficiary_Group'
                INNER JOIN wp_fm_relationships as rs ON b.id = rs.idRelation_1 AND rs.type = 'Beneficiary_SubGroup'
                INNER JOIN wp_fm_groups as g ON g.id = rg.idRelation_2 
                INNER JOIN wp_fm_subgroups as s ON s.id = rs.idRelation_2
                WHERE rg.status != 0 AND rg.status != 2 $filters
                GROUP BY b.department;";
    $department = $net->prepare($query);
    $department->execute();
    $i=0;

    while ($dataD = $department->fetch()) {
        $i++;
        if($i == $department->rowCount()){

            switch($dataD[0]){
                case 'La Union':
                    $dataMap .= "['sv-un', $dataD[1]]";
                    break;
                case 'La Libertad':
                    $dataMap .= "['sv-li', $dataD[1]]";
                    break;
                case 'La Paz':
                    $dataMap .= "['sv-pa', $dataD[1]]";
                    break;
                case 'Cuscatlan':
                    $dataMap .= "['sv-cu', $dataD[1]]";
                    break;
                case 'Son Sonate':
                    $dataMap .= "['sv-so', $dataD[1]]";
                    break;
                case 'San Salvador':
                    $dataMap .= "['sv-ss', $dataD[1]]";
                    break;
                case 'Morazan':
                    $dataMap .= "['sv-mo', $dataD[1]]";
                    break;
                case 'San Miguel':
                    $dataMap .= "['sv-sm', $dataD[1]]";
                    break;
                case 'San Vicente':
                    $dataMap .= "['sv-sv', $dataD[1]]";
                    break;
                case 'Usulutan':
                    $dataMap .= "['sv-us', $dataD[1]]";
                    break;
                case 'Chalatenango':
                    $dataMap .= "['sv-ch', $dataD[1]]";
                    break;
                case 'Santa Ana':
                    $dataMap .= "['sv-sa', $dataD[1]]";
                    break;
                case 'Ahuachapan':
                    $dataMap .= "['sv-ah', $dataD[1]]";
                    break;
                case utf8_decode('Cabañas'):
                    $dataMap .= "['sv-ca', $dataD[1]]";
                    break;
            }
        }else{

            switch($dataD[0]){
                case 'La Union':
                    $dataMap .= "['sv-un', $dataD[1]], ";
                    break;
                case 'La Libertad':
                    $dataMap .= "['sv-li', $dataD[1]], ";
                    break;
                case 'La Paz':
                    $dataMap .= "['sv-pa', $dataD[1]], ";
                    break;
                case 'Cuscatlan':
                    $dataMap .= "['sv-cu', $dataD[1]], ";
                    break;
                case 'Son Sonate':
                    $dataMap .= "['sv-so', $dataD[1]], ";
                    break;
                case 'San Salvador':
                    $dataMap .= "['sv-ss', $dataD[1]], ";
                    break;
                case 'Morazan':
                    $dataMap .= "['sv-mo', $dataD[1]], ";
                    break;
                case 'San Miguel':
                    $dataMap .= "['sv-sm', $dataD[1]], ";
                    break;
                case 'San Vicente':
                    $dataMap .= "['sv-sv', $dataD[1]], ";
                    break;
                case 'Usulutan':
                    $dataMap .= "['sv-us', $dataD[1]], ";
                    break;
                case 'Chalatenango':
                    $dataMap .= "['sv-ch', $dataD[1]], ";
                    break;
                case 'Santa Ana':
                    $dataMap .= "['sv-sa', $dataD[1]], ";
                    break;
                case 'Ahuachapan':
                    $dataMap .= "['sv-ah', $dataD[1]], ";
                    break;
                case utf8_decode('Cabañas'):
                    $dataMap .= "['sv-ca', $dataD[1]], ";
                    break;
            }
        }
    }

    //Edades
    $query = "SELECT
                    SUM(CASE WHEN TIMESTAMPDIFF(YEAR, b.birthday, NOW()) BETWEEN 5 AND 7 THEN 1 ELSE 0 END) as '5-7',
                    SUM(CASE WHEN TIMESTAMPDIFF(YEAR, b.birthday, NOW()) BETWEEN 8 AND 10 THEN 1 ELSE 0 END) as '8-10',
                    SUM(CASE WHEN TIMESTAMPDIFF(YEAR, b.birthday, NOW()) BETWEEN 11 AND 13 THEN 1 ELSE 0 END) as '11-13',
                    SUM(CASE WHEN TIMESTAMPDIFF(YEAR, b.birthday, NOW()) BETWEEN 14 AND 17 THEN 1 ELSE 0 END) as '14-17',
                    SUM(CASE WHEN TIMESTAMPDIFF(YEAR, b.birthday, NOW()) >= 18 THEN 1 ELSE 0 END) as '+18',   
                    SUM(CASE WHEN TIMESTAMPDIFF(YEAR, b.birthday, NOW()) >= 15 AND TIMESTAMPDIFF(YEAR, b.birthday, NOW()) < 36  THEN 1 ELSE 0 END) as '+18'   
                FROM `wp_fm_beneficiaries` as b 
                INNER JOIN wp_fm_relationships as rg ON b.id = rg.idRelation_1 AND rg.type = 'Beneficiary_Group'
                INNER JOIN wp_fm_relationships as rs ON b.id = rs.idRelation_1 AND rs.type = 'Beneficiary_SubGroup'
                INNER JOIN wp_fm_groups as g ON g.id = rg.idRelation_2 
                INNER JOIN wp_fm_subgroups as s ON s.id = rs.idRelation_2
                WHERE rg.status != 0 AND rg.status != 2 $filters;";
    $age = $net->prepare($query);
    $age->execute();
    $dataA = $age->fetch();

    //Religiones
    $query = "SELECT
                    SUM(CASE WHEN b.religious = 'Cristiano Católico' THEN 1 ELSE 0 END) as 'Cristiano Católico', 
                    SUM(CASE WHEN b.religious = 'Cristiano Evangélico' THEN 1 ELSE 0 END) as 'Cristiano Evangélico',  
                    SUM(CASE WHEN b.religious = 'Otro' THEN 1 ELSE 0 END) as 'Otro',
                    SUM(CASE WHEN (b.religious != 'Otro' AND b.religious = 'Cristiano Evangélico' AND b.religious = 'Cristiano Católico') THEN 1 ELSE 0 END) as 'Sin respuesta' 
                FROM `wp_fm_beneficiaries` as b 
                INNER JOIN wp_fm_relationships as rg ON b.id = rg.idRelation_1 AND rg.type = 'Beneficiary_Group'
                INNER JOIN wp_fm_relationships as rs ON b.id = rs.idRelation_1 AND rs.type = 'Beneficiary_SubGroup'
                INNER JOIN wp_fm_groups as g ON g.id = rg.idRelation_2 
                INNER JOIN wp_fm_subgroups as s ON s.id = rs.idRelation_2
                WHERE rg.status != 0 AND rg.status != 2 $filters;";
    $religious = $net->prepare($query);
    $religious->execute();
    $dataR = $religious->fetch();
?>

<!-- Animate.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<div class="mt-3">

    <p class="text-center fs-5 mb-5"><b>Visualizando:</b> <label id="animated-counter" class="counter">0</label> participantes</p>
    <div class="row">
        <div class="col-md-4 mb-3 animate__animated animate__fadeInUp">
            <div class="card">
                <div class="card-body">
                    <div id="graphicsGender"></div>
                </div>
            </div>
        </div>
        <div class="col-md-8 mb-3 animate__animated animate__fadeInUp">
            <div class="card">
                <div class="card-body">
                    <div id="graphicsCampus"></div>
                </div>
            </div>
        </div>

        <div class="col-md-12 animate__animated animate__fadeInUp">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">Ver estadísticas por municipios</label>
            </div>
        </div>
        <div class="col-md-12 mb-3 animate__animated animate__fadeInUp">
            <div class="card">
                <div class="card-body">
                    <div id="graphicsMap"></div>
                </div>
            </div>
        </div>
        <div id="depatartmentBlock" class="col-md-12 mb-3 animate__animated animate__fadeInUp" style="display: none;">
            <div class="card">
                <div class="card-body">
                    <label for="cboDepartment" class="form-label">Departamento: </label>
                    <select class="form-select mb-3" aria-label="Default select example" id="cboDepartment" name="cboDepartment" required>
                        <option value="">Seleccione un departamento</option>
                        <option value="Ahuachapan">Ahuachapán</option>
                        <option value="Santa Ana">Santa Ana</option>
                        <option value="Sonsonate">Sonsonate</option>
                        <option value="La Libertad">La Libertad</option>
                        <option value="Chalatenango">Chalatenango</option>
                        <option value="La Paz">La Paz</option>
                        <option value="San Salvador">San Salvador</option>
                        <option value="Cuscatlan">Cuscatlán</option>
                        <option value="Caba&ntilde;as">Cabañas</option>
                        <option value="San Vicente">San Vicente</option>
                        <option value="Usulutan">Usulután</option>
                        <option value="San Miguel">San Miguel</option>
                        <option value="Morazan">Morazán</option>
                        <option value="La Union">La Unión</option>
                    </select>
                    <div id="municipalityLoad"></div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 mb-3 animate__animated animate__fadeInUp">
            <div class="card">
                <div class="card-body">
                    <div id="graphicsAge"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3 animate__animated animate__fadeInUp">
            <div class="card">
                <div class="card-body">
                    <div id="graphicsReligious"></div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function(){

        const counterElement = document.getElementById('animated-counter');
        const endValue = <?=$dataB[0]?>; // Reemplaza esto con tu valor final
        animateCounter(counterElement, 0, endValue, 2000);

        $("#flexSwitchCheckDefault").change(function() {
            if ($("#flexSwitchCheckDefault").is(":checked")) {
                $("#depatartmentBlock").css("display","block");
            } else {
                $("#depatartmentBlock").css("display","none");
            }
        });

        $("#cboDepartment").change(function(){
            $("#municipalityLoad").load("/view/dashboards/dashboard.forma.municipality.php",{
                department: $("#cboDepartment").val(),
                view: "siifview",
            });
        });

        // Sexo
        Highcharts.chart('graphicsGender', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: 0,
                plotShadow: false
            },
            title: {
                text: 'Participantes por<br>Sexo',
                align: 'center',
                verticalAlign: 'top',
                y: 60,
                style: {
                    fontSize: '1.1em'
                }
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    dataLabels: {
                        enabled: true,
                        distance: -50,
                        style: {
                            fontWeight: 'bold',
                            color: 'white'
                        }
                    },
                    startAngle: -90,
                    endAngle: 90,
                    center: ['50%', '75%'],
                    size: '110%'
                }
            },
            series: [{
                type: 'pie',
                name: 'participantes',
                innerSize: '50%',
                data: [
                    ['Masculino', <?=$dataG[0]?>],
                    ['Femenino', <?=$dataG[1]?>],
                ]
            }]
        });

        //Sede
        Highcharts.chart('graphicsCampus', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Participantes por Sede'
            },
            subtitle: {
                text: 'Módulo FORMA'
            },
            xAxis: {
                categories: [
                    'Soyapango',
                    'Santa Ana',
                    'San Miguel',
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Participantes'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Participantes',
                data: [<?=$dataC[0]?>, <?=$dataC[1]?>, <?=$dataC[2]?>]
            }]
        });

        //Departamentos

        (async () => {

            const topology = await fetch(
                'https://code.highcharts.com/mapdata/countries/sv/sv-all.topo.json'
            ).then(response => response.json());

            // Prepare demo data. The data is joined to map using value of 'hc-key'
            // property by default. See API docs for 'joinBy' for more info on linking
            // data and map.
            const data = [
                <?= $dataMap ?>
            ];

            // Create the chart
            Highcharts.mapChart('graphicsMap', {
                chart: {
                    map: topology
                },

                title: {
                    text: 'Cantidad de Participantes por Departamento'
                },

                subtitle: {
                    text: 'Source map: <a href="http://code.highcharts.com/mapdata/countries/sv/sv-all.topo.json">El Salvador</a>'
                },

                mapNavigation: {
                    enabled: true,
                    buttonOptions: {
                        verticalAlign: 'bottom'
                    }
                },

                colorAxis: {
                    min: 0
                },

                series: [{
                    data: data,
                    name: 'Beneficiaros',
                    states: {
                        hover: {
                            color: '#BADA55'
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}'
                    }
                }]
            });

        })();

        //Edades
        Highcharts.chart('graphicsAge', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Participantes por Rango de Edad'
            },
            subtitle: {
                text: 'Módulo FORMA'
            },
            xAxis: {
                categories: [
                    '5-7 años',
                    '8-10 años',
                    '11-13 años',
                    '14-17 años',
                    '+18 años',
                    '15-35 años'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Participantes'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Participantes',
                data: [<?=$dataA[0]?>, <?=$dataA[1]?>, <?=$dataA[2]?>, <?=$dataA[3]?>, <?=$dataA[4]?>, <?=$dataA[5]?>]
            }]
        });

        //Religión
        Highcharts.chart('graphicsReligious', {
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Participantes por Religión'
            },
            tooltip: {
                valueSuffix: '%'
            },
            subtitle: {
                text:
                'Módulo FORMA'
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
                        format: '{point.y}',
                        style: {
                            fontSize: '1.2em',
                            textOutline: 'none',
                            opacity: 0.7
                        }
                    }]
                }
            },
            series: [
                {
                    name: 'Participantes',
                    colorByPoint: true,
                    data: [
                        {
                            name: 'Cristiano Católico',
                            y: <?=$dataR[0]?>,
                            sliced: true,
                            selected: true,
                        },
                        {
                            name: 'Cristiano Evangélico',
                            y: <?=$dataR[1]?>
                        },
                        {
                            name: 'Otro',
                            y: <?=$dataR[2]?>
                        },
                        {
                            name: 'Sin respuesta',
                            y: <?=$dataR[3]?>
                        } 
                    ]
                }
            ]
        });
    });

    function easeInOutQuad(t) {
        return t < 0.5 ? 2 * t * t : -1 + (4 - 2 * t) * t;
    }

    function animateCounter(element, start, end, duration) {
        let startTime = null;

        function step(timestamp) {
            if (!startTime) startTime = timestamp;
            const progress = Math.min((timestamp - startTime) / duration, 1);
            const easedProgress = easeInOutQuad(progress);
            const value = Math.floor(easedProgress * (end - start) + start);
            element.textContent = value;
            if (progress < 1) {
                window.requestAnimationFrame(step);
            }
        }

        window.requestAnimationFrame(step);
    }

</script>
