<?php 
    function detailsEmpresa(){ // Empr = Empresa
        $modalId = "modalDetailsEmpr";

        $modalHeaderCont = <<<HTML
            <img src="../assets/Icons/details.png" width="50px" height="50px">
            <section class="ms-3 w-100 align-middle">
                <h5>Detalles de empresa</h5>
                <p class="text-muted mb-0">Consulta a detalle la información de una empresa</p>
            </section>
        HTML;

        $modalBodyCont = <<<HTML
            <section class="info-grid empr-grid h-100"> 
                <div class="info-cont my-1 mx-1 p-1">
                    <h6>Abreviatura de la empresa</h6>
                    <p id="dataAbvrEmpr"> <!-- Impresión de datos dinámicos --> </p>
                </div>
                <div class="info-cont my-1 mx-1 p-1">
                    <h6>Código donante</h6>
                    <p id="dataCodeDonanteEmpr"> <!-- Impresión de datos dinámicos --> </p>
                </div>
                <div class="info-cont my-1 mx-1 p-1">
                    <h6>Tipo de cooperación</h6>
                    <p id="dataTipoCoopEmpr"> <!-- Impresión de datos dinámicos --> </p>
                </div>
                <div class="info-cont my-1 mx-1 p-1">
                    <h6>Tipo de relación</h6>
                    <p id="dataTipoRelEmpr"> <!-- Impresión de datos dinámicos --> </p>
                </div>
                <div class="info-cont my-1 mx-1 p-1">
                    <h6>Nombre de la empresa</h6>
                    <p id="dataNomEmpr"> <!-- Impresión de datos dinámicos --> </p>
                </div>
                <div class="info-cont my-1 mx-1 p-1">
                    <h6>Estado</h6>
                    <p id="dataEstadoEmpr"> <!-- Impresión de datos dinámicos --> </p>
                </div>
                <div class="info-cont my-1 mx-1 p-1">
                    <h6>Tipo de empresa</h6>
                    <p id="dataTipoEmpr"> <!-- Impresión de datos dinámicos --> </p>
                </div>
                <div class="info-cont my-1 mx-1 p-1">
                    <h6>Dirección</h6>
                    <p id="dataDirecEmpr"> <!-- Impresión de datos dinámicos --> </p>
                </div>
            </section>

            <section class="info-grid special-info">
                <div class="info-cont my-2 mx-1 p-1">
                    <h6>Fecha de registro</h6>
                    <p id="dataFechaRegistroEmpr" class="my-1"> <!-- Impresión de datos dinámicos --> </p>
                </div>
                
                <div class="info-cont my-2 mx-1 p-1">
                    <h6>Fecha de última modificación</h6>
                    <p id="dataFechaModEmpr" class="my-1"> <!-- Impresión de datos dinámicos --> </p>
                </div>
            </section>
        HTML;

        $modalFooterCont = <<<HTML
            <button type="button" class="btn btn-info" data-bs-dismiss="modal">Aceptar</button>
        HTML;

        include('../assets/components/templates/modalTemplates.php');
    }

    function detailsConvenio(){ // Conv = Convenio
        $modalId = "modalDetailsConv";

        $modalHeaderCont = <<<HTML
            <img src="../assets/Icons/details.png" width="50px" height="50px">
            <section class="ms-3 w-100 align-middle">
                <h5>Detalles de convenio</h5>
                <p class="text-muted mb-0">Consulta a detalle la información de un convenio</p>
            </section>
        HTML;

        $modalBodyCont = <<<HTML
            <div class="details-grid">
                <div class="empr-grid info-cont  align-self-center">
                    <section class="info-grid empr-grid"> 
                        <div class="info-cont my-1 mx-1 p-1">
                            <h6>Abreviatura de la empresa</h6>
                            <p id="dataAbvrEmpr"> <!-- Impresión de datos dinámicos --> </p>
                        </div>
                        <div class="info-cont my-1 mx-1 p-1">
                            <h6>Código donante</h6>
                            <p id="dataCodeDonanteEmpr"> <!-- Impresión de datos dinámicos --> </p>
                        </div>
                        <div class="info-cont my-1 mx-1 p-1">
                            <h6>Tipo de cooperación</h6>
                            <p id="dataTipoCoopEmpr"> <!-- Impresión de datos dinámicos --> </p>
                        </div>
                        <div class="info-cont my-1 mx-1 p-1">
                            <h6>Tipo de relación</h6>
                            <p id="dataTipoRelEmpr"> <!-- Impresión de datos dinámicos --> </p>
                        </div>
                        <div class="info-cont my-1 mx-1 p-1">
                            <h6>Nombre de la empresa</h6>
                            <p id="dataNomEmpr"> <!-- Impresión de datos dinámicos --> </p>
                        </div>
                        <div class="info-cont my-1 mx-1 p-1">
                            <h6>Estado</h6>
                            <p id="dataEstadoEmpr"> <!-- Impresión de datos dinámicos --> </p>
                        </div>
                        <div class="info-cont my-1 mx-1 p-1">
                            <h6>Tipo de empresa</h6>
                            <p id="dataTipoEmpr"> <!-- Impresión de datos dinámicos --> </p>
                        </div>
                        <div class="info-cont my-1 mx-1 p-1">
                            <h6>Dirección</h6>
                            <p id="dataDirecEmpr"> <!-- Impresión de datos dinámicos --> </p>
                        </div>
                    </section>

                    <section class="info-grid special-info">
                        <div class="info-cont my-2 mx-1 p-1">
                            <h6>Fecha de registro</h6>
                            <p id="dataFechaRegistroEmpr" class="my-1"> <!-- Impresión de datos dinámicos --> </p>
                        </div>
                        
                        <div class="info-cont my-2 mx-1 p-1">
                            <h6>Fecha de última modificación</h6>
                            <p id="dataFechaModEmpr" class="my-1"> <!-- Impresión de datos dinámicos --> </p>
                        </div>
                    </section>
                </div>

                <div class="info-cont">
                    <hr class="vr align-self-center h-100">
                </div>

                <div class="conv-grid info-cont">
                    <section class="info-grid conv-grid">
                        <div class="info-cont my-2 mx-1 p-1">
                            <h6>Sede</h6>
                            <p id="dataSedeConv" class="my-1"> <!-- Impresión de datos dinámicos --> </p>
                        </div>

                        <div class="info-cont my-2 mx-1 p-1">
                            <h6>Nombre de contacto</h6>
                            <p id="dataNombContactoConv" class="my-1"> <!-- Impresión de datos dinámicos --> </p>
                        </div>

                        <div class="info-cont my-2 mx-1 p-1">
                            <h6>Número de contacto</h6>
                            <p id="dataNumContactoConv" class="my-1"> <!-- Impresión de datos dinámicos --> </p>
                        </div>

                        <div class="info-cont my-2 mx-1 p-1">
                            <h6>Tipo de convenio</h6>
                            <p id="dataTipoConv" class="my-1"> <!-- Impresión de datos dinámicos --> </p>
                        </div>
                    
                        <div class="info-cont my-2 mx-1 p-1">
                            <h6>Correo electrónico</h6>
                            <p id="dataEmailConv" class="my-1"> <!-- Impresión de datos dinámicos --> </p>
                        </div>

                        <div class="info-cont my-2 mx-1 p-1">
                            <h6>Situación actual</h6>
                            <p id="dataSituacionActConv" class="my-1"> <!-- Impresión de datos dinámicos --> </p>
                        </div>

                        <div class="info-cont my-2 mx-1 p-1">
                            <h6>Fecha de inicio</h6>
                            <p id="dataFechaInicioConv" class="my-1"> <!-- Impresión de datos dinámicos --> </p>
                        </div>

                        <div class="info-cont my-2 mx-1 p-1">
                            <h6>Fecha de finalización</h6>
                            <p id="dataFechaFinConv" class="my-1"> <!-- Impresión de datos dinámicos --> </p>
                        </div>
                    </section>

                    <section class="w-100 px-1">
                        <div class="info-cont my-2 p-1 mb-0">
                            <h6>Convenio</h6>
                            <p id="dataDescConv"> <!-- Impresión de datos dinámicos --> </p>

                            <div class="info-check mt-4">
                                <p class="positive-check fs-6 fw-medium d-flex align-items-center d-none mb-0" id="CC"> <!-- Con convenio -->
                                    <i class="bi bi-shield-check text-success fs-5 me-1"></i>
                                    Este convenio está respaldado con documentación
                                </p>
                                <p class="negative-check fs-6 fw-medium d-flex align-items-center d-none mb-0" id="SC"> <!-- Sin convenio -->
                                    <i class="bi bi-shield-x text-danger fs-5 me-1"></i>
                                    Este convenio no está respaldado con documentación
                                </p>
                            </div>
                        </div>
                    </section>

                    <section class="w-100 px-1">
                        <div class="info-cont p-1">
                            <div class="info-check">
                                <p class="positive-check fs-6 fw-medium d-flex align-items-center mb-0 d-none" id="RD"> <!-- Respaldo digital -->
                                    <i class="bi bi-cloud-check text-success fs-5 me-1"></i>
                                    Este convenio cuenta con un respaldo digital

                                    <!-- <p class="download-link link-info mb-1 ms-3"> <i class="bi bi-download"></i> Descargar archivo </p> -->
                                </p>
                                <p class="negative-check fs-6 fw-medium d-flex align-items-center mb-0 d-none" id="SRD"> <!-- Sin respaldo digital -->
                                    <i class="bi bi-cloud-minus text-danger fs-5 me-1"></i>
                                    Este convenio no cuenta con un respaldo digital
                                </p>
                            </div>
                        </div>
                    </section>

                    <section class="info-grid special-info">
                        <div class="info-cont my-2 mx-1 p-1">
                            <h6>Fecha de registro</h6>
                            <p id="dataFechaRegistroConv" class="my-1"> <!-- Impresión de datos dinámicos --> </p>
                        </div>
                        
                        <div class="info-cont my-2 mx-1 p-1">
                            <h6>Fecha de última modificación</h6>
                            <p id="dataFechaModConv" class="my-1"> <!-- Impresión de datos dinámicos --> </p>
                        </div>
                    </section>
                </div>
            </div>
        HTML;

        $modalFooterCont = <<<HTML
            <button type="button" class="btn btn-info" data-bs-dismiss="modal">Aceptar</button>
        HTML;

        include('../assets/components/templates/modalTemplates.php');
    }
?>