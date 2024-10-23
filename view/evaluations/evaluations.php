
<!-- jQuery 3.6.1-->
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<div class='container mb-5'>
    <div class='row'>
        <div class='col-12 mt-3' id='tabsevaluations'>                    
            <b>Evaluaciones 360°</b><br/><br/>        
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="#" id="btn-eva1">Mis evaluaciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active"  href="#" id="btn-eva2">Solicitudes de Evaluación</a>
                </li>
                <?php if($_SESSION['type'] == "Administrador" || $_SESSION['type'] == "RRHH"){?>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="btn-eva3">Asignación de Evaluaciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="btn-eva4">Ver Formulario de Evaluación</a>
                </li>
                <?php }?>
            </ul>            
        </div>
        
        <script>
            $(document).ready(function(){

                $("#btn-eva1").click(function(){
                    RemoveClassTab();
                    $(this).addClass("active");
                    $("#loadevaluations").load("view/evaluations/evaluations.asignations.assignment.php", {                         
                        employee: <?=$_SESSION['iu']?>,
                        state: 'myevaluations'
                    });
                });

                $("#btn-eva2").click(function(){
                    RemoveClassTab();
                    $(this).addClass("active");
                    $("#loadevaluations").load("view/evaluations/evaluations.asignations.assignment.php", {                         
                        employee: <?=$_SESSION['iu']?>,
                        state: 'myassignment' 
                    });
                });
                
                <?php if($_SESSION['type'] == "Administrador" || $_SESSION['type'] == "RRHH"){?>
                $("#btn-eva3").click(function(){
                    RemoveClassTab();
                    $(this).addClass("active");
                    $("#loadevaluations").load("view/evaluations/evaluations.asignations.php");
                });   
                
                $("#btn-eva4").click(function(){
                    RemoveClassTab();
                    $(this).addClass("active");
                    $("#loadevaluations").load("view/evaluations/evaluations.form.view.php");
                });    
                <?php }?>               

            });

            function RemoveClassTab(){
                $(".nav-link").each(function(){
                    $(this).removeClass("active");
                });
            }
        </script>

        <div id='loadevaluations' class='col-12 mb-5 mt-5'>
        </div>

    </div>
</div>

<script>

$(document).ready(function(){
    
        $('#btn-eva2').trigger('click');
    
})
</script>