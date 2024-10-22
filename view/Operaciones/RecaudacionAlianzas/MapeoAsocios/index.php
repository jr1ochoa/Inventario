<?php   
    $content_MA = <<<HTML
            <div class="base-container bg-white p-3 rounded w-100 d-flex flex-column">
                <div class="header-cont mt-2 mx-3 d-flex justify-content-between "> 
                    <div class="info-section">
                        <h4 class="fs-2 fw-bold mb-1">Gestión de empresas y convenios</h4>
                        <h6 class="fs-6 text-muted fw-normal">Accede al panel de control para gestionar tus empresas y convenios.</h6>
                    </div>

                    <div class="logo-section">
                        <img src="view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/FUSALMO_logo.png" height="85" class="m-0">
                    </div>
                </div> <!-- Apartado Header FIN -->

                <div class="select-cards-cont my-5 mx-5 flex-grow-1 d-flex justify-content-center">
                    <div class="row justify-content-center">
                        <div class="col-5 h-100">
                            <div class="card">
                                <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                                    <div class="mb-2"><img src="view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/Icons/convenio.png" height="75px" width="75px"></div>
                                    <h3 class="card-title fw-bold">Administrar empresas</h3>
                                    <p class="card-text">Gestiona tipos de empresa o agrega nuevas empresas.</p>
                                    <div class="btn-info btn" id="mapeoAsocios_Empr">
                                        <i class="bi bi-gear"></i> Acceder
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-1 d-flex justify-content-center">
                            <hr class="vr align-self-center h-75">
                        </div>

                        <div class="col-5">
                            <div class="card">
                            <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                                    <div class="mb-2"><img src="view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/Icons/convenio.png" height="75px" width="75px"></div>
                                    <h3 class="card-title fw-bold">Administrar convenios</h3>
                                    <p class="card-text">Echa un vistazo a los convenios actuales o agrega nuevos.</p>
                                    <div class="btn-info btn" id="mapeoAsocios_Conv">
                                        <i class="bi bi-gear"></i> Acceder
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        HTML;

    include('view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/components/templates/baseTemplate.php');
?>

<script>    
    $(document).ready(function () {
        $("#mapeoAsocios_Empr").click(function(){
            window.location.href='?view=mapeoAsocios_Empr';
        })

        $("#mapeoAsocios_Conv").click(function(){
            window.location.href='?view=mapeoAsocios_Conv';
        })
    });
</script>