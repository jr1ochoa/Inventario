<?php include("../../config/net.php"); ?>

<div class='row'>



    <div class='col-sm-5 mb-3'>

        <label>Seleccione la Evaluación de Desempeño</label>

        <select class='form-control'>

            <?php

            

                $query = "SELECT * FROM evaluations as e ";

                $evaluations = $net_rrhh->prepare($query);

                $evaluations->execute();

                

                while($data = $evaluations->fetch())

                {

                    echo utf8_encode("<option value='$data[0]'>$data[1]</option>");

                }   

            ?>

        </select>

    </div>



</div>

<div class='row'>



    <div class='col-sm-5 mb-3'>

        <label>Seleccione el área</label>

        <select class='form-control' id='area'>

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



    <div class='col-sm-5 mb-3'>

        <label>Seleccione el empleado</label>

        <select class='form-control' id='employees'>

            <option value=''>Seleccione al empleado</option>

        </select>

    </div>    



    <div class='col-sm-2'>

        <br/>

        <button id='btnview' class='btn btn-primary mt-3'>Cargar Evaluaciones</button>

    </div>



    <div class='col-sm-12'>

        <div id='loadevaluationsforemployess'></div>

    </div>

</div>



<script>

    $(document).ready(function(){

        $("#area").change(function(){

            $("#employees").load("view/tools/employees.php", {

                action: "ActiveEmployeesByarea",

                area: $("#area").val()

            });

        });



        $("#btnview").click(function(){

            $("#loadevaluationsforemployess").load("view/evaluations/evaluations.asignations.view.php", {

                action: "ViewByRRHH", 

                area: $("#area").val(),

                employee: $("#employees").val()

            }); 

        });

        

    });

</script>