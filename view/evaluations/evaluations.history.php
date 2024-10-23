    <?php include("../../../config/net.php"); 
    ?>
    
    <link rel="stylesheet" href="view/evaluations/style.history.css">
    <!--===================== Titulo de la Vista ======================================-->
   <div class="d-block mx-auto  mt-4">
        <center><h3 class="bodyColor"><b> HISTORIAL DE EVALUACIONES 360 </b></h3></center> 
    </div>
    <!-- ==================== Filtro de la Vista ======================================-->
    <div class="col-md-6 container ">
        <div class="row borderFiltro colorFiltro mx-3 ">
            <div class="col-md-4">


            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><b>Área</b></label>
                <select class="form-select form-select-sm tamañoLetra" id="area" name="area" aria-label=".form-select-sm example">
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

               
            </div>
            <div class="col-md-4">

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><b>Empleado</b></label>
                <select class="form-select form-select-sm" id="employees" name="employees" aria-label=".form-select-sm example">
                <option value=''>Seleccione empleado</option>
                </select>
            </div>

            </div>
            <div class="col-md-4 ">

            <div class="mb-3 mx-3">
                <label for="exampleFormControlInput1" class="form-label"><b>Año de Evaluación</b></label>
                <select class="form-select form-select-sm" id="year" name="year" aria-label=".form-select-sm example">
                <option value=''>Seleccione año</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                </select>
            </div>

            </div>
            <button type="button" id="idBuscarBtn" class="btn btn-primary">🔍 Buscar</button>


        </div>
    </div>
    <br/>
    <!--=================== TABLA CON INFORMACION =================================-->
  <!-- Contenido -->
<div class="card p-4 mt-4" id="loadList2"></div>

<script>
    $(document).ready(function(){
        $("#area").change(function(){
            console.log($("#area").val());
            $("#employees").load("view/tools/employees.php", {
                action: "ActiveEmployeesByarea",
                area: $("#area").val()
            });
        });


        $("#idBuscarBtn").click(function(){
            $("#loadList2").load("view/evaluations/evaluations.history.table.php",{
            type: $("#area :selected").val(),
            type2: $("#employees :selected").val(),
            type3: $("#year :selected").val(),
            });
        })

        $("#btnview").click(function(){
            $("#loadevaluationsforemployess").load("view/evaluations/evaluations.asignations.view.php", {
                action: "ViewByRRHH",
                area: $("#area").val(),
                employee: $("#employees").val()
            }); 
        });


       

        $("#year").change(function(){
            $("#loadList2").load("view/evaluations/evaluations.history.table.php",{
            type: $("#area :selected").val(),
            type2: $("#employees :selected").val(),
            type3: $("#year :selected").val(),
            });
        });
        
    });



    

</script>