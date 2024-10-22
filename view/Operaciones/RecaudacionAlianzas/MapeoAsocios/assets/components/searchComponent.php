<div class="search-component d-inline-flex align-content-center">
    <i class="bi bi-search mx-1 fw-bolder align-self-center"></i>
    <input type="text" name="globalSearchField" id="globalSearchField" class="border-0 bg-transparent shadow-none" placeholder="Realiza tu búsqueda...">
</div>

<script>
    $('#globalSearchField').on('input', function(){ 
        if ($('#btnTipoEmpresa').hasClass('btnActive')){ typeToRefresh = 1; actionSuffix = 'TE' }else{ typeToRefresh = 0; actionSuffix = 'Empr' }
        if ($('#btnConvenio').length){
            actionSuffix = 'Conv'
            if ($('#btnConvenio').hasClass('btnActive')){ convenioStatus = 1; }else{ convenioStatus = 0; }
        }

        if($(this).val().length >= 2){
            $("#tbListContainer").load("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/components/listTableComponent.php .table-container-" + (actionSuffix), function() {
                    $.post("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/process/index.php", {
                    process: "mapeoAsocios", 
                    group: actionSuffix == 'TE' ? 'gestionTipoEmpresa' :
                            actionSuffix == 'Empr' ? 'gestionEmpresas' : 'gestionConvenios', 
                    action: "search"+actionSuffix,    
                    
                    toSearchName: $('#globalSearchField').val(),
                    convStatus: actionSuffix == 'Conv' ? convenioStatus : undefined,
                },
                    function(response){
                        if(response){
                            // Recarga el contenido de la tabla
                            $('.dataListContainer').html(response);
                        }
                    }
                );
            });
        }else{
            // Recarga el contenido de la tabla
            actionSuffix == 'Conv' ? $.refreshTableContent_GC(convenioStatus) :  $.refreshTableContent_GE(typeToRefresh) 
        }
    });
</script>