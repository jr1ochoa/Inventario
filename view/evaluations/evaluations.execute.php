<?php 
    
    include("../../config/net.php"); 
    $ia = $_REQUEST['ia'];

    $query = "SELECT 
                a.id, a.evaluationtype, f.form,
                CONCAT(e1.name1, ' ', e1.name2, ' ', e1.name3, ' ', e1.lastname1, ' ', e1.lastname2) as 'A evaluar', 
                p.position, ar.area, a.state  
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

<div class='container-fluid' >
    <div class='row' id='loadtest'>
        <div class='col-12'>Evaluación de Desempleño</div>
        <div class='col-6 mt-3'>
            <div class="card">
                <div class="card-body">
                    <b>Empleado a Evaluar</b>                    
                    <table class='table table-bordered mt-2'>
                        <tr>
                            <td><b>Empleado: </b><br/><?=$dataa[3]?></td>
                        </tr>
                        <tr>
                            <td><b>Cargo:</b><br/><?=$dataa[4]?></td>
                        </tr>
                        <tr>
                            <td><b>Área:</b><br/><?=$dataa[5]?></td>
                        </tr>
                    </table>
                    <br/>
                    <b>Detalles de Evaluación</b>
                    <table class='table table-bordered mt-2'>
                        <tr>
                            <td><b>Evaluación:</b><br/><?=$dataa[1]?></td>
                        </tr>
                        <tr>
                            <td><b>Formulario:</b><br/><?=$dataa[2]?></td>
                        </tr>
                        <tr>
                            <td><b>Estado de Evaluación:</b><br/><?=$dataa[6]?></td>
                        </tr>
                    </table>                    
                </div>
            </div>
        </div>


        <div class='col-6 mt-3'>
            <div class="card">
                <div class="card-body">
                    <b>Instrucciones</b>
                    <p>Se detallan los factores a evaluar con su respectivos criterios, los cuales todos deben ser calificados de acuerdo a la escala siguiente:</p>
                    <ol>
                        <li>Deficiente</li>
                        <li>Regular</li>
                        <li>Buen Dominio</li>
                        <li>Muy Buen Dominio</li>
                        <li>Excelente</li>
                    </ol>
                    <p>Procura finalizar la evaluación una vez iniciada, si es interrumpirda y no puede proseguirla notificar a RRHH para su seguimiento.</p>
                    <p>Una vez terminada la evaluación, ya no podras acceder a la evaluación</p>
                    <hr/>
                    <button id='btnStart' type="button" class="btn btn-primary">Iniciar Evaluación</button>
                </div>
            </div>
        </div>  

        <script>
            $(document).ready(function() {
                $('#btnStart').click(function() {
                    $("#loadevaluations").load("view/evaluations/evaluations.execute.load.php", {
                        ia: <?=$ia?>,
                        topic: 1
                    });
                });
            })
        </script>

    </div>
</div>
