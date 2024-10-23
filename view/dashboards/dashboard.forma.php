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

    $url = "/view/dashboards/dashboard.forma.data.php";

    //General
    $query = "SELECT COUNT(*) FROM `wp_fm_beneficiaries` as b 
                INNER JOIN wp_fm_relationships as rg ON b.id = rg.idRelation_1 AND rg.type = 'Beneficiary_Group'
                INNER JOIN wp_fm_relationships as rs ON b.id = rs.idRelation_1 AND rs.type = 'Beneficiary_SubGroup'
                INNER JOIN wp_fm_groups as g ON g.id = rg.idRelation_2 
                INNER JOIN wp_fm_subgroups as s ON s.id = rs.idRelation_2
                WHERE rg.status != 0 AND rg.status != 2;";
    $beneficiaries = $net->prepare($query);
    $beneficiaries->execute();
    $dataB = $beneficiaries->fetch();

?>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
<!-- Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

<!-- HighCharts -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/maps/modules/map.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>


<div class="container">
    <div class="row my-5">
        <div class="col-10">
            <p class="text-uppercase fs-4 mb-2">Total de Registros en FORMA</p>
            <p class="fw-bold fs-4"><i class="bi bi-person-fill"></i> <?=$dataB[0]?> participantes</p>
        </div>
        <div class="col-2">
            <button type="button" class="btn btn-outline-dark float-end" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                <i class="bi bi-list"></i>
            </button>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col d-flex">
            <div class="flex-grow-1">
                <div id="loadDashboard"></div>
            </div>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Filtros</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="switchFilters" checked>
            <label class="form-check-label" for="switchFilters">Ver todos</label>
        </div>
        <hr/>

        <?php 
            $query = "SELECT * FROM `wp_fm_programs` as p WHERE p.status = 0 OR p.status = 2;";
            $programs = $net->prepare($query);
            $programs->execute();
            $i=0;

            while ($dataP = $programs->fetch()) {
                $i++;
        ?>
        <div class="form-check mb-3">
            <input class="form-check-input activate" type="checkbox" value="<?=$dataP[0]?>" name="programs[]" id="ckProgram<?=$i?>" disabled>
            <label class="form-check-label" for="ckProgram<?=$i?>">
                <?=$dataP[1]?>
            </label>
        </div>
        <?php
            }
        ?>
    </div>
</div>

<script>
    $(document).ready(function(){
        //Inicializadores
        $("#loadDashboard").load("<?=$url?>");
        
        const collapseElementList = document.querySelectorAll('.collapse')
        const collapseList = [...collapseElementList].map(collapseEl => new bootstrap.Collapse(collapseEl))

        //Control de Filtros
        $("#switchFilters").change(function() {
            if ($("#switchFilters").is(":checked")) {
                $(".activate").prop("disabled", true);
                $(".activate").prop("checked", false);
                $("#loadDashboard").load("<?=$url?>");
                
            } else {
                $(".activate").prop("disabled", false);
            }
        });

        $(".activate").change(function() {
            var programsChecked = [];

            $('input[name="programs[]"]:checked').each(function() {
                programsChecked.push($(this).val());
            });

            $("#loadDashboard").load("<?=$url?>",{
                programs: programsChecked
            });
        });
    });
</script>
