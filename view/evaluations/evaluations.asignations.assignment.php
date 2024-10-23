<?php 

include("../../config/net.php"); 

$area = (isset($_REQUEST['area'])) ? $_REQUEST['area'] : 0;
$state = (isset($_REQUEST['state'])) ? $_REQUEST['state'] : "";

$employee = $_REQUEST['employee'];

if($state == "myevaluations" || $state == "addassignment")
{
    $query = "SELECT 
                a.id, a.evaluationtype, f.form,
                CONCAT(e1.name1, ' ', e1.name2, ' ', e1.name3, ' ', e1.lastname1, ' ', e1.lastname2) as Evaluador,
                a.state   
              FROM evaluations_assignments AS a 
              INNER JOIN evaluations AS e ON a.idevaluation = e.id AND e.status = 1 
              INNER JOIN evaluations_forms AS f ON a.evaluationform = f.id 
              INNER JOIN employee AS e1 ON a.idevaluator = e1.id 
              WHERE a.idemployee = $employee"; 
}
else if($state == "myassignment")
{
    $query = "SELECT 
                a.id, a.evaluationtype, f.form,
                CONCAT(e1.name1, ' ', e1.name2, ' ', e1.name3, ' ', e1.lastname1, ' ', e1.lastname2) as Evaluador, 
                a.state  
              FROM evaluations_assignments AS a 
              INNER JOIN evaluations AS e ON a.idevaluation = e.id AND e.status = 1 
              INNER JOIN evaluations_forms AS f ON a.evaluationform = f.id 
              INNER JOIN employee AS e1 ON a.idemployee = e1.id 
              WHERE a.idevaluator = $employee";
}
else 
    $query = "";


$evaluations = $net_rrhh->prepare($query);
$evaluations->execute();

if($evaluations->rowCount() > 0)
{
    /** Mis Evaluaciones */
    if($state == "myevaluations"){?>
        <!-- Mis Evaluaciones -->
        <table class='table table-bordered table-hover'>        
            <tr>
                <th>N°</th>
                <th>Enfoque</th>
                <!--<th>Formulario</th>-->
                <th>Estado de Evaluación</th>     
                <th>Evaluador</th>                                     
                <th>Acciones</th>
            </tr>
            <?php
                $i=0;
                while($datae = $evaluations->fetch())
                {        
                        
                    $action = ($datae[4] == "Pendiente") ? "": "<a onclick='ViewResult($datae[0])' style='color: green; cursor: pointer;' data-bs-toggle='modal' data-bs-target='#ResultModal'><b>Ver Resultado</b></a>";
                    $i++;
                    //echo "Valor del campo".$datae[1];
                    if(utf8_encode($datae[1]) == "Autoevaluación")
                    {
                        //<td>$datae[2]</td>
                        echo utf8_encode("<tr>
                        <td>$i</td>
                        <td>$datae[1]</td>
                        
                        <td>$datae[4]</td>
                        <td>Evaluador $i</td>
                        <td>$action</td>
                    </tr>");
                    }
                    else
                    {
                        //<td>$datae[2]</td>
                        echo utf8_encode("<tr>
                        <td>$i</td>
                        <td>$datae[1]</td>
                        
                        <td>$datae[4]</td>
                        <td>Evaluador $i</td>
                        
                    </tr>");
                    }
                   
                }
            ?>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="ResultModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Resultados de Evaluación</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id='loadresult'>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
        </div>

        <script>
            
            function ViewResult(ia){
                $("#loadresult").load("view/evaluations/evaluations.result.php", {
                    ia: ia
                });
            }
        </script>

    <?php }    

    /** Mis Asignaciones para evaluar */
    else if($state == "myassignment"){?>
        
        <!-- Evaluar asignaciones -->
        <table class='table table-bordered'>
            <tr>
                <th colspan='6' class='text-center'>Asignaciones de la evaluación</th>
            </tr>
            <tr>
                <th>N°</th>
                <th>Enfoque</th>
                <th>Formulario</th>
                <th>Estado de Evaluación</th>                        
                <th>A Evaluar</th>            
                <th>Acciones</th>
            </tr>
            <?php
                $i=0;
                while($datae = $evaluations->fetch())
                {                    
                    $i++;

                    $action = ($datae[4] == "Finalizada") ? "<b style='color: blue'>Evaluación Finalizada</b>" : "";
                    $action = ($datae[4] == "Pendiente") ? "<a onclick='evaluar($datae[0])' style='color: green; cursor: pointer;'><b>Evaluar</b></a>" : $action;

                    echo utf8_encode("<tr>
                            <td>$i</td>
                            <td>$datae[1]</td>
                            <td>$datae[2]</td>
                            <td>$datae[4]</td>
                            <td>$datae[3]</td>
                            <td>$action</td>
                        </tr>");
                }
            ?>
        </table>
        <script>
            
            function evaluar(ia){
                $("#tabsevaluations").attr("style", "display:none");
                $("#loadevaluations").load("view/evaluations/evaluations.execute.php", {
                    ia: ia
                });
            }

        </script>

        <!-- Modal -->
        <div class="modal fade" id="ResultModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Resultados de Evaluación</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id='loadresult'>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
        </div>
                
    <?php } 
    
    /** Admin de Asignaciones */
    else if($state == "addassignment") {?>
        <!-- Asignación de Evaluación -->
        <table class='table table-bordered'>
            <tr>
                <th colspan='6' class='text-center'>Personal Evaluador</th>
            </tr>
            <tr>
                <th>N°</th>
                <th>Enfoque</th>
                <th>Formulario</th>
                <th>Estado de Evaluación</th>            
                <?php if($state == "myevaluations" || $state == "addassignment") {?>
                    <th>Evaluador</th>
                <?php }?>
                <th>Acciones</th>
            </tr>
            <?php
                $i=0;
                while($datae = $evaluations->fetch())
                {
                    $action = ($datae[4] == "Pendiente") ? 
                        "<a onclick=\"$('#iadelete').val($datae[0])\" style='color: green; cursor: pointer;' data-bs-toggle='modal' data-bs-target='#DeleteModal'><b>Quitar</b></a>": 
                        "<a onclick='ViewResult($datae[0])' style='color: green; cursor: pointer;' data-bs-toggle='modal' data-bs-target='#ResultModal'><b>Ver Resultado</b></a>";

                    $i++;
                    echo utf8_encode("<tr>
                            <td>$i</td>
                            <td>$datae[1]</td>
                            <td>$datae[2]</td>
                            <td>$datae[4]</td>
                            <td>$datae[3]</td>
                            <td>$action</td>
                        </tr>");
                }
            ?>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="DeleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Quitar asignación de evaluación</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Realmente desea eliminar esta asignación?</p>
                    <input type="hidden" id="iadelete" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick='Quit()'>Quitar</button>
                    
                </div>
            </div>
        </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="ResultModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Resultados de Evaluación</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id='loadresult'>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
        </div>        

        <script>            
            function Quit(){
                $.post("request/", {
                    process: "evaluations",
                    action: "delete assignation",
                    ia: $("#iadelete").val()
                }, function(response){
                    $("#loadassignevaluations").load("view/evaluations/evaluations.asignations.assignment.php", { 
                        area: <?=$area?>,  
                        employee: <?=$employee?>,
                        state: "addassignment"
                    });                     
                });                
            }

            function ViewResult(ia){
                $("#loadresult").load("view/evaluations/evaluations.result.php", {
                    ia: ia
                });
            }            
        </script>
    <?php
    }
}
else
{
    echo "<p style='color: green; text-align: center;'>No se encuentran evaluaciones asignadas a este empleado</p>";
}

?>
