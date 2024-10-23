<?php

include("../../config/net.php"); 
$action = $_REQUEST['action'];

if($action == "ViewByRRHH")
{    
    $area = $_REQUEST['area'];
    $employee = $_REQUEST['employee'];

    $query = "SELECT p.id, p.position, e.name1, e.name2, e.name3, e.lastname1, e.lastname2, p.id
              FROM workarea_positions AS p 
              INNER JOIN workarea_positions_assignment AS a ON p.id = a.idposition 
              INNER JOIN employee AS e ON a.idemployee = e.id 
              WHERE p.idarea = $area  AND enddate = '0000-00-00' AND e.id = $employee";    
    
    $dataemployee = $net_rrhh->prepare($query);  
    $dataemployee->execute();    
    $data = $dataemployee->fetch();
    
}

?>

<div class='row mt-5'>
    <div class='col-10'>
        <div class='row'>
            <div class='col-12'><b>Asignación de Evaluaciones de Desempeño</b></div>
            <div class='col-2'>Empleado:</div>
            <div class='col-10'><?=utf8_encode("$data[2] $data[3] $data[4] $data[5] $data[6]")?></div>
            <div class='col-2'>Cargo:</div>
            <div class='col-10'><?=utf8_encode("$data[1]")?></div>
        </div>
    </div>
    <div class='col-2'>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Añadir Evaluación
        </button>
    </div>
    <div class='col-12'>
        <hr/>
    </div>  
    <div id='loadassignevaluations'></div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Asignación de Evaluaciones </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form id='formevaluation'>
        <div class="modal-body row">
            <div class='col-sm-12 mb-3'>
                <?php
                    $query = "SELECT * FROM evaluations as e WHERE e.status = 1";
                    $evaluations = $net_rrhh->prepare($query);
                    $evaluations->execute();                
                    $dataf = $evaluations->fetch();
                ?>                
                <div class='row'>
                    <div class='col-12 mb-3'>
                        <b><?=$dataf[1]?></b>
                        <input type='hidden' name='ideva' value='<?=$dataf[0]?>'/>
                        <input type='hidden' name='idemp' value='<?=$employee?>'/>
                        <input type='hidden' name='idpos' value='<?=$data[7]?>'/>
                    </div>
                    <div class='col-3 mb-3'>Empleado:</div>
                    <div class='col-9 mb-3'><?=utf8_encode("$data[2] $data[3] $data[4] $data[5] $data[6]")?></div>
                    <div class='col-3 mb-3'>Cargo:</div>
                    <div class='col-9 mb-3'><?=utf8_encode("$data[1]")?></div>
                    <hr/>
                </div>            

            </div>

            <div class='col-sm-6 mb-3'>
                    <label>Tipo de Formulario:</label>
                    <select class='form-control' name='type' id='type'>
                    <option value=''>Seleccione el tipo de evaluación</option>
                    <?php
                        
                        $query = "SELECT * FROM evaluations_forms ORDER BY id ASC";
                        $areas = $net_rrhh->prepare($query);
                        $areas->execute();
                        
                        while($data = $areas->fetch())
                        {
                            echo utf8_encode("<option value='$data[0]'>$data[1]</option>");
                        }   
                    ?>
                </select>
            </div>   
            
            <div class='col-sm-6 mb-3'>
                    <label>Enfoque de Evaluación:</label>
                    <select class='form-control' name='approach' id='approach'>
                    <option value=''>Seleccione el enfoque</option>
                    <?php
                        
                        $array = array("Autoevaluación", "Evaluación - Cliente interno", "Evaluación - Colaborador", "Evaluación - Colega de trabajo", "Evaluación - Jefe inmediato");
                        
                        foreach($array as $value)
                        {
                            echo ("<option value='$value'>$value</option>");
                        }   
                    ?>
                </select>
            </div>               

            <div class='col-sm-6 mb-3'>
                    <label>Seleccione el área:</label>
                    <select class='form-control' name='area2' id='area2'>
                    <option value=''>Seleccione el área</option>
                    <?php                        
                        $query = "SELECT * FROM workarea WHERE visible = 1";
                        $areas = $net_rrhh->prepare($query);
                        $areas->execute();
                        
                        while($data = $areas->fetch())
                        {
                            echo utf8_encode("<option value='$data[0]'>$data[1]</option>");
                        }   
                    ?>
                </select>
            </div>

            <div class='col-sm-6 mb-3'>
                <label>Seleccione el empleado:</label>
                <select class='form-control' name='employee2' id='employee2'>
                    <option value=''>Seleccione al empleado</option>
                </select>

            </div>    
            

      </div>
      </form>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id='btn-assing'>
            <div id='load-assing' class="spinner-border" role="status" style='display: none'>
                <span class="visually-hidden">Loading...</span>
            </div>                        
            Asignar
        </button>
      </div>

    </div>
  </div>
</div>


<script>
    $(document).ready(function(){

        $("#loadassignevaluations").load("view/evaluations/evaluations.asignations.assignment.php", { 
            area: <?=$area?>,  
            employee: <?=$employee?>, 
            state: "addassignment"
        }); 

        $("#area2").change(function(){
            $("#employee2").empty();
            $("#employee2").load("view/tools/employees.php", {
                action: "ActiveEmployeesByarea",
                area: $("#area2").val()
            });
        });

        $("#btn-assing").click(function(){
            $("#load-assing").attr("style", "display: inline-block;")
            $.post("request/", {
                process: "evaluations",
                action: "assignation to employee",
                form: $("#formevaluation").serialize()
            }, function(response){                
                $("#load-assing").attr("style", "display: none;");
                $("#loadassignevaluations").load("view/evaluations/evaluations.asignations.assignment.php", { 
                    area: <?=$area?>,  
                    employee: <?=$employee?>,
                    state: "addassignment"
                });                 
                console.log(response)
            })
        });  
    });  
</script> 