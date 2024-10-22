<?php 
    $cssRoute = "assets/CSS/managerStyle.css"; $faviconRoute = "assets/favicon.png";

    $content = <<<HTML
            <div class="base-container bg-white p-3 rounded w-100 d-flex flex-column">
                <div class="header-cont mt-2 mx-3 d-flex justify-content-between "> 
                    <div class="info-section">
                        <h4 class="fs-3">Gestión de empresas y convenios</h4>
                        <h6 class="text-muted fw-normal">Accede al panel de control para gestionar tus empresas y convenios.</h6>
                    </div>

                    <div class="logo-section">
                        <img src="view/Operaciones/GestionProyectos/MapeoAsocios/assets/FUSALMO_logo.png" height="85" class="m-0">
                    </div>
                </div> <!-- Apartado Header FIN -->

                <div class="select-cards-cont my-5 mx-5 flex-grow-1 d-flex justify-content-center">
                    <div class="row justify-content-center">
                        <div class="col-5 h-100">
                            <div class="card">
                                <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                                    <div class="mb-2"><img src="view/Operaciones/GestionProyectos/MapeoAsocios/assets/Icons/empresa.png" height="75px" width="75px"></div>
                                    <h3 class="card-title">Administrar empresas</h3>
                                    <p class="card-text">Gestiona tipos de empresa o agrega nuevas empresas.</p>
                                    <a href="views/gestion_empresas.php" class="btn-info btn">
                                        <i class="bi bi-gear"></i> Acceder
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-1 d-flex justify-content-center">
                            <hr class="vr align-self-center h-75">
                        </div>

                        <div class="col-5">
                            <div class="card">
                            <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                                    <div class="mb-2"><img src="view/Operaciones/GestionProyectos/MapeoAsocios/assets/Icons/convenio.png" height="75px" width="75px"></div>
                                    <h3 class="card-title">Administrar convenios</h3>
                                    <p class="card-text">Echa un vistazo a los convenios actuales o agrega nuevos.</p>
                                    <a href="views/gestion_convenio.php" class="btn-info btn">
                                        <i class="bi bi-gear"></i> Acceder
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        HTML;

    include('assets/components/templates/baseTemplate.php')
?>
