<?php 
    $content_MA = <<<HTML
        <div class="base-container bg-white p-3 rounded w-100 ">
            <div id="mapeoAsocios_back22" class="text-decoration-none fw-normal btn-link" role="button"><i class="bi bi-caret-left me-1 "></i>Regresar</div>

            <!-- Apartado Header -->
            <div class="header-container mt-2 mx-3 d-flex justify-content-between "> 
                <div class="info-section">
                    <h4 class="fs-2 fw-bold">Listado de convenios</h4>
                    <!-- Sección botones -->
                    <div class="btns-cont d-flex mt-3">
                        <div class="d-grid gap-2 me-1 ">
                            <button
                                type="button" class="btn"
                                data-bs-toggle="modal" data-bs-target="#modalAddConv" id="addConv">
                                <i class="bi bi-person-plus"></i> Agregar convenio
                            </button>
                        </div>
                    </div>
                </div>

                <div class="logo-section">
                    <img src="view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/FUSALMO_logo.png" height="85" class="m-0">
                </div>
                
            </div> <!-- Apartado Header FIN -->

            <!-- Apartado Listado de empresas -->
            <div class="content-container mt-4 mx-4">

                <!-- Apartado Pestañas de tabla -->
                <div class="tabs-container border-bottom border-2 text-muted fw-medium "> 
                    <span class="me-2 fs-5 fw-normal btnActive" id="btnConvenio">
                        Empresas con convenio</span>
                    <span class="ms-2 fs-5 fw-normal btnInactive" id="btnNoConvenio">
                        Empresas sin convenio</span>
                </div> <!-- Apartado Pestañas de tabla FIN -->

                <!-- Apartado Filtro y búsqueda -->
                <div id="filter-search-container" class="options-cont my-4 d-flex justify-content-between">
                    <div class="search-container d-inline-block align-content-center">
                        <!-- Apartado para la búsqueda -->
                    </div>

                    <div class="filter-container d-inline-block align-content-center">
                        <!-- Apartado para el filrado -->
                    </div>
                </div> <!-- Apartado Filtro y búsqueda FIN -->

                <!-- Apartado Tabla -->
                <div id="tbListContainer"><!-- CONTENIDO DE LA TABLA ACTUALIZABLE --></div>
                <!-- Apartado Tabla FIN -->

            </div> <!-- Apartado Listado de empresas FIN -->

        </div>
        HTML;

    include("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/components/templates/baseTemplate.php");

    // Sección de Modals 
    // Modal agregar convenio
        include("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/components/modalsAdd.php");
        addConvenio();
    // Modal agregar convenio FIN

    // Modal importar archivo
        include("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/components/modalImport.php");
    // Modal importar archivo

    // Modal consultar detalles
        include("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/components/modalsDetails.php");
        detailsConvenio();
    // Modal consultar convenio FIN

    // Modal editar convenio
        include("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/components/modalsEdit.php");
        editConvenio();
    // Modal editar convenio FIN

    // Modal deshabilitar convenio
        include("view/Operaciones/RecaudacionAlianzas/MapeoAsocioss/assets/components/modalsDelete.php");
        //deleteConvenio(); deleteEvidencia();
    // Modal deshabilitar convenio FIN
?>
<script src="view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/Js/refreshTable.js"></script>
<script>
    $(document).ready(function(){
        $("#mapeoAsocios_back22").click(function(){
            window.location.href='?view=mapeoAsocios';
        })

        $('.search-container').load("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/components/searchComponent.php");
        $('.filter-container').load("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/components/filterComponent.php #filter-select-Conv");
        $('.filter-container').load("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/components/filterComponent.php #filter-select-Conv", function(){
                    $.generateSelectTE("#tipoEmpresaConv-group");
                });

        // Ejemplo de mostrar un toast al cargar la página
        $.toast({
            text: 'Bienvenido',
            showHideTransition: 'fade',
            icon: 'info',
            position: 'bottom-left',
            loader: false,
            hideAfter: 2000 
        });

        $.refreshTableContent_GC(1); // Consulta de datos
    });

    $('#btnConvenio').click(function(){
        if ($(this).hasClass('btnInactive')) {
            $.refreshTabsClasses_GC(this);
            $.refreshTableContent_GC(1);
        };
    });

    $('#btnNoConvenio').click(function(){
        if ($(this).hasClass('btnInactive')) {
            $.refreshTabsClasses_GC(this);
            $.refreshTableContent_GC(0);
        };
    });

    $(document).on('click', '#addConv', function(){ $.generateSelectTE("#tipoEmpresaConv"); $.openFormModal($("#modalAddConv")) })

    $(document).on('click', '.cancelFilter',(function(){
        $(".filter-select").prop('selectedIndex', 0);
        $(".cancelFilter").prop("disabled", true);
        $.refreshTableContent_GC(($('#btnConvenio').hasClass('btnActive') ? 1 : 0));
    }));
</script>

<script src="view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/Js/modalBtns.js"></script>
<script src="view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/Js/formUtils.js"></script>

