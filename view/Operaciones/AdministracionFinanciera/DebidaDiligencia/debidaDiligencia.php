<?php include("../../../config/net.php");

    $query = "SELECT * FROM `workarea_positions_assignment` WHERE idemployee = ". $_SESSION['iu'];
    $position = $net_rrhh->prepare($query);
    $position->execute();

    $dataP = $position->fetch();
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<div class="py-5" style="background-color: #3971FF;">
    <h1 class="text-center text-light fw-bold text-uppercase">Debida Diligencia</h1>
    <p class="text-center text-light fs-5 mb-2">Administración Financiera</p>
</div>
<div class="container pt-4 my-5">

    <div class="row">

        <?php if ($dataP[1] == 393 || $_SESSION["type"] == "Administrador") { ?>
        <div class="col-md-4 mb-3">
            <div class="card border border-0 shadow-sm p-3 mb-5 bg-body-tertiary rounde">
                <div class="card-body text-center">
                    <i class="bi bi-gear" style="font-size: 5rem; color: #3971FF;"></i>
                    <h2 class="text-center fw-bold">Accesos</h2>
                    <button id="btnAccess" type="button" class="btn-siif btn-solid d-block mx-auto mb-3 px-5">
                        Ingresar <i class="bi bi-arrow-right"></i>
                    </button>    
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card border border-0 shadow-sm p-3 mb-5 bg-body-tertiary rounde">
                <div class="card-body text-center">
                    <i class="bi bi-people" style="font-size: 5rem; color: #3971FF;"></i>
                    <h2 class="text-center fw-bold">Gestión de Usuarios</h2>
                    <button id="btnUsers" type="button" class="btn-siif btn-solid d-block mx-auto mb-3 px-5">
                        Ingresar <i class="bi bi-arrow-right"></i>
                    </button>    
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card border border-0 shadow-sm p-3 mb-5 bg-body-tertiary rounde">
                <div class="card-body text-center">
                    <i class="bi bi-clipboard" style="font-size: 5rem; color: #3971FF;"></i>
                    <h2 class="text-center fw-bold">Asignación de Formularios</h2>
                    <button id="btnAssignment" type="button" class="btn-siif btn-solid d-block mx-auto mb-3 px-5">
                        Ingresar <i class="bi bi-arrow-right"></i>
                    </button>    
                </div>
            </div>
        </div>
        <?php } ?>

        <?php
            $query = "SELECT * FROM `debida_diligencia_access` WHERE idPosition = $dataP[1]";
            $access = $net_rrhh->prepare($query);
            $access->execute();
            
            $disabled = ($access->rowCount() > 0) ? "" : "disabled";
            $text = ($access->rowCount() > 0) ? "Ingresar <i class='bi bi-arrow-right'></i>" : "<i class='bi bi-lock'></i> Sin acceso";
        ?>
        <div class="col-md mb-3">
            <div class="card border border-0 shadow-sm p-3 mb-5 bg-body-tertiary rounde">
                <div class="card-body text-center">
                    <i class="bi bi-inboxes" style="font-size: 5rem; color: #3971FF;"></i>
                    <h2 class="text-center fw-bold">Gestión de Información</h2>
                    <button id="btnForms" type="button" class="btn-siif btn-solid d-block mx-auto mb-3 px-5" <?=$disabled?>>
                        <?=$text?>
                    </button>    
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#btnAccess").click(function(){
            window.location.href='?view=debidaDiligencia&module=access';  
        })
        $("#btnUsers").click(function(){
            window.location.href='?view=debidaDiligencia&module=users';  
        })
        $("#btnAssignment").click(function(){
            window.location.href='?view=debidaDiligencia&module=assignment';  
        })
        $("#btnForms").click(function(){
            window.location.href='?view=debidaDiligencia&module=forms';  
        })
    });
</script>