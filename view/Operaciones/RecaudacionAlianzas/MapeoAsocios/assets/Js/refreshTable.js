$.extend({
    // :::: GESTIÓN EMPRESAS ::::

        // === Función pestañas dinamicas ===
        refreshTabsClasses_GE: function(selectedBttn){ // GE = Gestión Empresas
            $('#globalSearchField').val('');
            if($('#btnTipoEmpresa').is(selectedBttn)){
                $(selectedBttn).addClass('btnActive');        $('#btnListadoEmpr').addClass('btnInactive');
                $(selectedBttn).removeClass('btnInactive');   $('#btnListadoEmpr').removeClass('btnActive');

                $('.filter-container').empty();
            }
    
            if($('#btnListadoEmpr').is(selectedBttn)){
                $('#btnTipoEmpresa').addClass('btnInactive');   $(selectedBttn).addClass('btnActive');
                $('#btnTipoEmpresa').removeClass('btnActive');  $(selectedBttn).removeClass('btnInactive');

                $('.filter-container').load("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/components/filterComponent.php #filter-select-Empr", function(){
                    $.generateSelectTE("#tipoEmpresaEmpr-group");
                });
                
            }
        },

        // === Función para imprimir listados de empresas / tipo de empresa ===
        refreshTableContent_GE: function(typeToRefresh){ 
            $("#tbListContainer").load("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/components/listTableComponent.php .table-container-" + (typeToRefresh == 1 ? "TE": "Empr"), function() {

                // El contenido se ha cargado completamente, ahora realiza la solicitud para obtener los datos
                $.post("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/process/index.php", {
                    process: "mapeoAsocios", 
                    group: typeToRefresh == 1 ? "gestionTipoEmpresa": "gestionEmpresas",
                    action: "showDataList" + (typeToRefresh == 1 ? "TE": "Empr"),
                },
                function(response){
                    if(response && response.trim() != ""){
                        $('.dataListContainer').html(response);
                    } else {
                        setTimeout(function(){
                            $.refreshTableContent_GE(typeToRefresh);
                        }, 1000); // Reintenta 
                    }
                })
            });
        },

    // :::: GESTIÓN CONVENIOS ::::

        // === Función pestañas dinamicas ===
        refreshTabsClasses_GC: function(selectedBttn){ // GC = Gestión Convenios
            $('#globalSearchField').val('');
            if($('#btnConvenio').is(selectedBttn)){
                $(selectedBttn).addClass('btnActive');        $('#btnNoConvenio').addClass('btnInactive');
                $(selectedBttn).removeClass('btnInactive');   $('#btnNoConvenio').removeClass('btnActive');

                $(".filter-select").prop('selectedIndex', 0);
                $(".cancelFilter").prop("disabled", true);
            }
    
            if($('#btnNoConvenio').is(selectedBttn)){
                $('#btnConvenio').addClass('btnInactive');   $(selectedBttn).addClass('btnActive');
                $('#btnConvenio').removeClass('btnActive');  $(selectedBttn).removeClass('btnInactive');

                $(".filter-select").prop('selectedIndex', 0);
                $(".cancelFilter").prop("disabled", true);
            }
    
        },
    
        // === Función para imprimir listado de convenios ===
        refreshTableContent_GC: function(statusData){
            $("#tbListContainer").load("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/components/listTableComponent.php .table-container-Conv", function() {

                $.post("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/process/index.php", {
                    process: "mapeoAsocios", 
                    group: "gestionConvenios",
                    action: "showDataListConv",
                    
                    convenioStatus: statusData 
                },
                    function(response){
                        if(response != null && response != ""){
                            $('.dataListContainer').html(response);
                        }else{
                            setTimeout(function() {
                                $.refreshTableContent_GC(statusData);
                            }, 500);
                        }
                    }
                );
            });

        }
})

// :::: FILTRADO DE EMPRESAS / CONVENIOS ::::
    $(document).on('change', '.filter-select',(function(){ 
        if($(this).prop('selectedIndex') != 0){ // Comprobar si el filtro no ha vuelto al estado inicial
            $(".cancelFilter").prop("disabled", false) // Habilitar el botón para cancelar el filtrado

            // Detección de qué tipo de grupo/acción va a realizar
            if ($('#btnListadoEmpr').hasClass('btnActive')){
                actionSuffix = 'Empr'
                typeToRefresh = 0;
            }
            if ($('#btnConvenio').length){
                actionSuffix = 'Conv'
                if ($('#btnConvenio').hasClass('btnActive')){ convenioStatus = 1; }else{ convenioStatus = 0; }
            }

            // Comienza la petición para filtar los datos
            $("#tbListContainer").load("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/components/listTableComponent.php .table-container-" + (actionSuffix), function() {
                $.post("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/process/index.php", {
                    process: "mapeoAsocios", 
                    group: actionSuffix == 'Empr' ? 'gestionEmpresas' : 'gestionConvenios', 
                    action: "filter"+actionSuffix,    
                    
                    optionFilter: $(".filter-select").val(),
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
        }else{ $(".cancelFilter").prop("disabled", true) }
    }))