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

    $department = $_REQUEST["department"];
    $groupsList = $_REQUEST["groupsList"];
    $campusFilter = $_REQUEST["campusFilter"];
    $typeProgram = $_REQUEST["typeProgram"];
    
    
    $query = "SELECT b.municipality, COUNT(*) 
                FROM `wp_fm_beneficiaries` as b 
                INNER JOIN wp_fm_relationships as rg ON b.id = rg.idRelation_1 AND rg.type = 'Beneficiary_Group'
                INNER JOIN wp_fm_relationships as rs ON b.id = rs.idRelation_1 AND rs.type = 'Beneficiary_SubGroup'
                INNER JOIN wp_fm_groups as g ON g.id = rg.idRelation_2 
                INNER JOIN wp_fm_subgroups as s ON s.id = rs.idRelation_2
                WHERE rg.status != 0 AND rg.status != 2 AND b.department = '$department'
                GROUP BY b.municipality;";
   
    $municipality = $net->prepare($query);
    $municipality->execute();

    $municipalitiesList = array();
    $countList = array();

    
    while ($data = $municipality->fetch()) {

        array_push($municipalitiesList, $data[0]);                        
        array_push($countList, $data[1]);                        
    }
?>

<table class="table table-bordered mb-5">
    <thead>
        <tr>
            <th style="width: 70%;">Municipio</th>
            <th>Cantidad</th>
        </tr>
    </thead>
    <tbody>
        <?php
            if ($municipality->rowCount() > 0) {
                while ($data = $municipality->fetch()) {
                    echo "<tr>
                            <td>$data[0]</td>
                            <td>$data[1]</td>
                        </tr>";

                    array_push($municipalitiesList, $data[0]);                        
                    array_push($countList, $data[1]);                        
                }
            }else{
                echo "<tr>
                        <td class='text-center text-danger' colspan='2'>Este municipio no cuenta con datos registrados</td>
                    </tr>";
            }
        ?>
    </tbody>
</table>


<div id="municipalityGraphics"></div>
<script>
    Highcharts.chart('municipalityGraphics', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Cantidad de Participantes por Municipio'
        },
        subtitle: {
            text: 'Módulos FORMAS'
        },
        xAxis: {
            categories: [
            <?php
                foreach ($municipalitiesList as $value) {
                    echo "'$value',";
                }
            ?>
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
            name: 'Beneficiarios',
            data: [<?php
                foreach ($countList as $value) {
                    echo "$value,";
                }
            ?>]
        }]
    });
</script>