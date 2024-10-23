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



$query = "SELECT t.* FROM evaluations_forms as f 
INNER JOIN evaluations_topics as t ON f.id = t.idform 
WHERE f.form = '$dataa[2]'";

$topic = $net_rrhh->prepare($query);
$topic->execute();

$arrayt = array("");
while($datat = $topic->fetch())
{
    array_push($arrayt, $datat[2]);
}

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
        <div class='col-12'>Evaluación de Desempleño</div>

        <div class='col-4 mt-3'>
            <div class="card">
                <div class="card-body">
                    <b>Empleado a Evaluar</b>                    
                    <table class='table table-bordered mt-2'>
                        <tr>
                            <td><b>Empleado: </b><br/><?=$dataa[3]?></td>
                        </tr>
                        <tr>
                            <td><b>Cargo:</b><br/><?=$dataa[5]?></td>
                        </tr>
                        <tr>
                            <td><b>Área:</b><br/><?=$dataa[6]?></td>
                        </tr>
                    </table>                
                </div>
            </div>
        </div>


        <div class='col-4 mt-3'>
            <div class="card">
                <div class="card-body">
                    <b>Detalles de Evaluación</b>
                    <table class='table table-bordered mt-2'>
                        <tr>
                            <td><b>Evaluación:</b><br/><?=$dataa[1]?></td>
                        </tr>
                        <tr>
                            <td><b>Formulario:</b><br/><?=$dataa[2]?></td>
                        </tr>
                        <tr>
                            <td><b>Estado de Evaluación:</b><br/><?=$dataa[8]?></td>
                        </tr>
                    </table>    
                </div>
            </div>
        </div>


        <div class='col-4 mt-3'>
            <div class="card">
                <div class="card-body">
                    <b>Desarrollo de Evaluación</b>
                    <table class='table table-bordered mt-2'>
                        <tr>
                            <td><b>Factor de Evaluación:</b><br/><?=$arrayt[$order]?></td>
                        </tr>
                        <tr>
                            <td><b> <?=$order?> de <?=$topic->rowCount()?></b><br/>.</td>
                        </tr>
                        <tr>
                            <td style='color: transparent'>.<br/>.</td>
                        </tr>
                    </table>    
                </div>
            </div>
        </div>        
        
        <div class='col-12 mt-3'>
        
            <table class="table table-bordered">
                <tr>
                    <th style='width: 5%'>N°</th>
                    <th style='width: 65%'>Pregunta</th>
                    <th style='width: 5%'>1</th>
                    <th style='width: 5%'>2</th>
                    <th style='width: 5%'>3</th>
                    <th style='width: 5%'>4</th>
                    <th style='width: 5%'>5</th>
                    <th style='width: 5%'>Resultado</th>
                </tr>        
            <?php 

                $query = "SELECT q.* FROM evaluations_forms as f 
                          INNER JOIN evaluations_topics as t ON f.id = t.idform 
                          INNER JOIN evaluations_questions as q ON t.id = q.idtopic
                          WHERE f.form = '$dataa[2]' AND t.topic = '$arrayt[$order]'";
                
                $questions = $net_rrhh->prepare($query);
                $questions->execute();

                $i = 0;
                $total = 0;
                while($dataq = $questions->fetch())
                {
                    $query = "SELECT result FROM evaluations_results
                              WHERE idassignation = $ia AND idquestion = $dataq[0] AND idemployee = $dataa[4] AND idevaluator = $dataa[7]";
          
                    $result = $net_rrhh->prepare($query);
                    $result->execute();
                    $datar = $result->fetch();

                    $i++;
                    echo "<tr>
                            <td>$i</td>
                            <td>$dataq[2]
                                <input type='hidden' name='questions[]' value='$dataq[0]' />
                            </td>";
                    
                    for($j = 1; $j<=5; $j++)
                    {
                        $isCheck = ($datar[0] == $j) ? "checked='true'" : "";
                        echo "<td>
                                <input type='radio' id='q$dataq[0]q$j' name='q$dataq[0]' class='form-check-input q$dataq[0]' value='$j' $isCheck/>
                              </td>";
                    }
                            
                    echo "  <td><label id='t$dataq[0]' class='totals'>".number_format($datar[0], 2)."</label></td>
                          </tr>";

                    $total += $datar[0];
                }

            ?>
            <tr>
                <th colspan='7' style='text-align: right; padding-right: 25px;'>Total</th>
                <th><label id="total"><?=number_format($total / $questions->rowCount(), 2)?></label></th>
            </tr>
            </table>

        </div>
                        
        <?php if($order == $topic->rowCount()) {?>
            <div class='col-12 mt-3 mb-3'>
                <b>Escribe tu comentario para el empleado:</b>
                <textarea id='textCommentary' class="form-control" rows='5'><?=$dataa[9]?></textarea>
            </div>
        <?php }?>
        

        <div class='col-6'>
            <?php if($order > 1) {?>
                <button id='btnBefore' class='btn btn-primary'>Regresar</button>
            <?php }?>
        </div>

        <div class='col-6' style='text-align: right;'>
            <?php if($order == $topic->rowCount()) {?>
                <button id='btnFinish' class='btn btn-primary'>Finalizar</button>
            <?php }else {?>
                <button id='btnNext' class='btn btn-primary'>Siguiente</button>
            <?php }?>
        </div>

        <script>
            $(document).ready(function() {

                $(".form-check-input").change(function() {
                    result = $(this).val();                    
                    iq = $(this).attr("id").split("q")
                    $.post("request/", {                             
                        process: "evaluations",
                        action: "save question",
                        ia: <?=$ia?>,
                        iq: iq[1],
                        ie1: <?=$dataa[4]?>,
                        ie2: <?=$_SESSION['iu']?>,
                        result: result
                    }, function(response) {
                        console.log(response);
                        $("#t"+iq[1]).html(result+ ".00");  

                        var average = 0;
                        $(".totals").each(function(){                    
                            average += parseInt($(this).text());                              
                            console.log($(this).text())
                        })              
                        $("#total").text((average/<?=$questions->rowCount()?>).toFixed(2));                        
                        
                    });


                });

                $("#textCommentary").blur(function() {                                        
                    $.post("request/", {                             
                        process: "evaluations",
                        action: "save comentary",
                        ia: <?=$ia?>,
                        commentary: $("#textCommentary").val()
                    }, function(response) {
                        console.log(response);
                    });
                });                

                $('#btnNext').click(function() {
                    $("#loadevaluations").load("view/evaluations/evaluations.execute.load.php", {
                        ia: <?=$ia?>,
                        topic: <?=$order+1?>
                    });
                });

                $('#btnBefore').click(function() {
                    $("#loadevaluations").load("view/evaluations/evaluations.execute.load.php", {
                        ia: <?=$ia?>,
                        topic: <?=$order-1?>
                    });
                }); 
                
                $('#btnFinish').click(function() {
                    $.post("request/", {                                               
                        process: "evaluations",
                        action: "finish evaluations",
                        ia: <?=$ia?>
                    }, function(response){
                        console.log(response);
                        alert("Evaluación Finalizada");
                        window.location = "?view=evaluations";
                    })                    
                });                 
            })
        </script>

    </div>
</div>
