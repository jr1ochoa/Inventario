$.extend({
    // :::: GESTIÓN EMPRESAS ::::

        // === Función pestañas dinamicas ===
        refreshTabsClasses_GE: function(selectedBttn){ // GE = Gestión Empresas
            $('#globalSearchField').val('');
            if($('#btnTipoEmpresa').is(selectedBttn)){
                $(selectedBttn).addClass('btnActive');        $('#btnListadoEmpr').addClass('btnInactive');
                $(selectedBttn).removeClass('btnInactive');   $('#btnListadoEmpr').removeClass('btnActive');
            }
    
            if($('#btnListadoEmpr').is(selectedBttn)){
                $('#btnTipoEmpresa').addClass('btnInactive');   $(selectedBttn).addClass('btnActive');
                $('#btnTipoEmpresa').removeClass('btnActive');  $(selectedBttn).removeClass('btnInactive');
            }
        },

        // === Función para imprimir listados de empresas / tipo de empresa ===
        refreshTableContent_GE: function(typeToRefresh){ // typeToRefresh: 1 = Tipo Empresa, 0 = Listado Empresas
            $("#tbListContainer").load("../assets/components/listTableComponent.php .table-container-" + (typeToRefresh == 1 ? "TE": "Empr"));
    
            $.post("../process/index.php", {
                process: "mapeoAsocios", 
                group: typeToRefresh == 1 ? "gestionTipoEmpresa": "gestionEmpresas",
                action: "showDataList"+ (typeToRefresh == 1 ? "TE": "Empr"),
            },
                function(response){
                    if(response != null && response != ""){
                        $('#dataListContainer').html(response);
                    }else{
                        $.refreshTableContent_GE(typeToRefresh);
                    }
                }
            );
        },

    // :::: GESTIÓN CONVENIOS ::::

        // === Función pestañas dinamicas ===
        refreshTabsClasses_GC: function(selectedBttn){ // GC = Gestión Convenios
            $('#globalSearchField').val('');
            if($('#btnConvenio').is(selectedBttn)){
                $(selectedBttn).addClass('btnActive');        $('#btnNoConvenio').addClass('btnInactive');
                $(selectedBttn).removeClass('btnInactive');   $('#btnNoConvenio').removeClass('btnActive');
            }
    
            if($('#btnNoConvenio').is(selectedBttn)){
                $('#btnConvenio').addClass('btnInactive');   $(selectedBttn).addClass('btnActive');
                $('#btnConvenio').removeClass('btnActive');  $(selectedBttn).removeClass('btnInactive');
            }
    
        },
    
        // === Función para imprimir listado de convenios ===
        refreshTableContent_GC: function(statusData){
            $('#globalSearchField').val('');
            $("#tbListContainer").load("../assets/components/listTableComponent.php .table-container-Conv");
    
            $.post("../process/index.php", {
                process: "mapeoAsocios", 
                group: "gestionConvenios",
                action: "showDataListConv",
                
                convenioStatus: statusData 
            },
                function(response){
                    if(response != null && response != ""){
                        $('#dataListContainer').html(response);
                    }else{
                        setTimeout(function() {
                            $.refreshTableContent_GC(statusData);
                        }, 500);
                    }
                }
            );
        }
})