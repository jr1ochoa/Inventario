<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $content_MA = <<<HTML
        <div class="base-container bg-white p-3 rounded w-100 ">
            <div id="mapeoAsocios_back" class="text-decoration-none fw-normal btn-link" role="button"><i class="bi bi-caret-left me-1 "></i>Regresar</div>

            <!-- Apartado Header -->
            <div class="header-container mt-2 mx-3 d-flex justify-content-between "> 
                <div class="info-section">
                    <h4 class="fs-2 fw-bold">Gestión de empresas</h4>
                    <!-- Sección botones -->
                    <div class="btns-cont d-flex mt-3">
                        <div class="d-grid gap-2 me-1 ">
                            <button
                                type="button" class="btn" id="addTE"
                                data-bs-toggle="modal" data-bs-target="#modalAddTE">
                                <i class="bi bi-person-plus"></i> Agregar tipo de empresa
                            </button>
                        </div>
                        <div class="d-grid gap-2 me-1 ">
                            <button
                                type="button" class="btn" id="addEmpr"
                                data-bs-toggle="modal" data-bs-target="#modalAddEmpr">
                                <i class="bi bi-person-plus"></i> Agregar empresa
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
                    <span class="me-2 fs-5 fw-normal btnActive" id="btnTipoEmpresa">
                        Tipos de empresa</span>
                    <span class="ms-2 fs-5 fw-normal btnInactive" id="btnListadoEmpr">
                        Listado de empresas</span>
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
    // Modal agregar tipo de empresa / empresa
        include("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/components/modalsAdd.php");
        addTipoEmpresa();  addEmpresa();
    // Modal agregar empresa FIN

    // Modal consultar detalles
        include("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/components/modalsDetails.php");
        detailsEmpresa();
    // Modal consultar empresa FIN

    // Modal editar empresa
        include("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/components/modalsEdit.php");
        editTipoEmpresa();  editEmpresa();
    // Modal editar empresa FIN

    // Modal deshabilitar empresa
        include("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/components/modalsDelete.php");
        deleteTipoEmpresa();  deleteEmpresa();
    // Modal deshabilitar empresa FIN

?>
<script src="view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/Js/refreshTable.js"></script>
<script src="view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/Js/modalBtns.js"></script>
<script src="view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/Js/formUtils.js"></script>

<script>
    $(document).ready(function(){

        $("#mapeoAsocios_back").click(function(){
            window.location.href='?view=mapeoAsocios';
        })

        $('.search-container').load("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/components/searchComponent.php");

        // Ejemplo de mostrar un toast al cargar la página
        $.toast({
            text: 'Bienvenido',
            showHideTransition: 'fade',
            icon: 'info',
            position: 'bottom-left',
            loader: false,
            hideAfter: 2000
        });

        $.refreshTableContent_GE(1); // Consulta de datos - GE = Gestión Empresas
    });

    $('#btnTipoEmpresa').click(function(){
        if ($(this).hasClass('btnInactive')) {
            $.refreshTabsClasses_GE(this);
            $.refreshTableContent_GE(1);
        };
    });

    $('#btnListadoEmpr').click(function(){
        if ($(this).hasClass('btnInactive')) {
            $.refreshTabsClasses_GE(this);
            $.refreshTableContent_GE(0);
        };
    });

    $(document).on('click', '#addTE', function(){ $.openFormModal($("#modalAddTE")); })
    $(document).on('click', '#addEmpr', function(){ $.generateSelectTE("#tipoEmpr"); $.openFormModal($("#modalAddEmpr")); })

    $(document).on('click', '.cancelFilter',(function(){
        $(".filter-select").prop('selectedIndex', 0);
        $(".cancelFilter").prop("disabled", true);
        $.refreshTableContent_GE(0);
    }));
</script>

</html>