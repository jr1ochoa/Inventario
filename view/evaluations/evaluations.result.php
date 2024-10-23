<?php 
    
include("../../config/net.php"); 
$ia = $_REQUEST['ia'];
$order = $_REQUEST['topic'];

$query = "SELECT 
            a.id, a.evaluationtype, f.form,
            CONCAT(e1.name1, ' ', e1.name2, ' ', e1.name3, ' ', e1.lastname1, ' ', e1.lastname2) as 'A evaluar', 
            e1.id, p.position, ar.area, a.idevaluator, a.state , a.comentary
          FROM evaluations_assignments AS a 
          INNER JOIN evaluations AS e ON a.idevaluation = e.id AND e.status = 1 
          INNER JOIN evaluations_forms AS f ON a.evaluationform = f.id 
          INNER JOIN employee AS e1 ON a.idemployee = e1.id 
          INNER JOIN workarea_positions as p ON p.id = a.idposition  
          INNER JOIN workarea as ar ON p.idarea = ar.id 
          WHERE a.id = $ia";

$assignment = $net_rrhh->prepare($query);
$assignment->execute();
$dataa = $assignment->fetch();

?>
<style>
    input[type="checkbox"], input[type="radio"]{
        display: block;          
        margin-right: 0rem; 
        opacity: 1; 
        width: auto; 
        z-index: -1;
        width: 20px;
        height: 20px;
    }
</style>

<div class='container-fluid' >
    <div class='row' id='loadtest'>
        <div class='col-6 mt-3'>
            <div class="card">
                <div class="card-body">
                    <b>Empleado a Evaluar</b>                    
                    <table class='table table-bordered mt-2'>
                        <tr>
                            <td><b>Empleado: </b><br/><?=utf8_encode($dataa[3])?></td>
                        </tr>
                        <tr>
                            <td><b>Cargo:</b><br/><?=utf8_encode($dataa[5])?></td>
                        </tr>
                        <tr>
                            <td><b>Área:</b><br/><?=utf8_encode($dataa[6])?></td>
                        </tr>
                    </table>                
                </div>
            </div>
        </div>

        <div class='col-6 mt-3'>
            <div class="card">
                <div class="card-body">
                    <b>Detalles de Evaluación</b>
                    <table class='table table-bordered mt-2'>
                        <tr>
                            <td><b>Evaluación:</b><br/><?=utf8_encode($dataa[1])?></td>
                        </tr>
                        <tr>
                            <td><b>Formulario:</b><br/><?=utf8_encode($dataa[2])?></td>
                        </tr>
                        <tr>
                            <td><b>Estado de Evaluación:</b><br/><?=utf8_encode($dataa[8])?></td>
                        </tr>
                    </table>    
                </div>
            </div>
        </div>


        <div class='col-12'>
            <div class='card mt-3'>
                <div class='card-body'>
                    <table class='table table-bordered'>
                        <tr>
                            <th>N°</th>
                            <th>Factor de Evaluación</th>
                            <th>Promedio</th>
                        </tr>
                        <?php 

                        $query = "SELECT t.* FROM evaluations_forms as f 
                                  INNER JOIN evaluations_topics as t ON f.id = t.idform 
                                  WHERE f.form = '$dataa[2]'";

                        $topic = $net_rrhh->prepare($query);
                        $topic->execute();

                        $i = 0;
                        $promedio = 0;
                        $topicc = 0; 

                        $tablechart = "<table id='datatable1' style='display: none;'>
                                        <tr>
                                            <th></th>
                                            <th>Promedio de Evaluación</th>
                                        </tr>";

                        while($datat = $topic->fetch())
                        {
                            $query = "SELECT SUM(result), COUNT(r.id) FROM evaluations_results as r 
                                      INNER JOIN evaluations_questions as q ON r.idquestion = q.id 
                                      WHERE q.idtopic = $datat[0] AND r.idassignation = $ia";

                            $result = $net_rrhh->prepare($query);
                            $result->execute();

                            if($result->rowCount() == 0)
                                continue;

                            $datar = $result->fetch();
                            $i++;
                            echo utf8_encode("<tr>
                                    <th>$i</th>
                                    <th>$datat[2]</th>");
                            
                            $promedio += number_format($datar[0]/$datar[1], 2);
                            $topicc++;

                            echo "<th>".number_format($datar[0]/$datar[1], 2)."</th>
                                </tr>";

                            $tablechart .= utf8_encode("<tr>
                                              <th>$datat[2]</th>
                                              <th>".number_format($datar[0]/$datar[1], 2)."</th>
                                            </tr>");
                        }
                        ?>
                        <tr>
                            <th colspan='2' style='text-align: right;'>Promedio de Evaluación:</th>
                            <th><?=number_format($promedio/$topicc, 2)?></th>
                        </tr>
                    </table>
                    <?php 
                        $tablechart .=  "</table>";
                    ?>
                    <b>Comentario del Evaluador:</b>
                    <p><?=utf8_encode($dataa[9])?></p>

                    
                    <?=$tablechart?>



                    <div id="chart"></div>

                    <script>

                        BuildChart('chart', 'datatable1')

                        function BuildChart(div, datatable) {
                            Highcharts.chart(div, {
                                data: {
                                    table: datatable
                                },
                                chart: {
                                    type: 'column'
                                },
                                title: {
                                    text: 'Promedio en evaluación de desempeño'
                                },
                                subtitle: {
                                    text:
                                        'Fuente: Sistema de Información Institucional'
                                },
                                xAxis: {
                                    type: 'category'
                                },
                                yAxis: {
                                    allowDecimals: false,
                                    title: {
                                        text: 'Amount'
                                    }
                                },
                                credits: {
                                    enabled: false
                                },
                                tooltip: {
                                    formatter: function () {
                                        return '<b>' + this.series.name + '</b><br/>' +
                                            this.point.y + ' ' + this.point.name.toLowerCase();
                                    }
                                }
                            });
                        }

                    </script>
                </div>
            </div>
        </div>
        
    </div>
</div>