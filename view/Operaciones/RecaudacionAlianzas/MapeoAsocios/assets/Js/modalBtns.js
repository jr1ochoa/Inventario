$(document).ready(function(){ // Archivo donde se manejan las acciones de los modales dependiendo de qué sección está haciendo la consulta
    // ::::: TIPO DE EMPRESA :::::
        // ==== BOTÓN PARA EDITAR TIPO DE EMPRESA ====
        $(document).on('click', '.editToggleTE',(function(){ 
            $.openFormModal($("#modalEditTE"));

            $('#btnUpdateTE').val($(this).val());

            $.post("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/process/index.php", {
                process: "mapeoAsocios",
                action: "getDetailsTE",
                group: "gestionTipoEmpresa",

                selectedId: $(this).val()
            },
                function(response){
                if(response){
                        selectedData = $.parseJSON(response);

                        $('#editNombreTE').val(selectedData.nombre_tipo_empresa);
                        $('#editDescTE').val(selectedData.descripcion_tipo);

                    }else{
                        alert(response)
                    }
                }
            )
        }));

        //==== BOTÓN PARA ELIMINAR UN TIPO DE EMPRESA ====
        $(document).on('click', '.deleteToggleTE', function(){ $('#btnDeleteTE').val($(this).val()); $.openFormModal($("#modalDeleteTE")); })

    // ::::: LISTADO EMPRESAS :::::
        // ==== BOTÓN PARA MOSTRAR DETALLES DE UNA EMPRESA ====
        $(document).on('click', '.detailsToggleEmpr',(function(){ 
            $.openFormModal($("#modalDetailsEmpr"));

            $.getEmprData($(this).val())
        }));

        // ==== BOTÓN PARA EDITAR TIPO DE EMPRESA ====
        $(document).on('click', '.editToggleEmpr',(function(){ 
            $.openFormModal($("#modalEditEmpr"));

            $('#btnUpdateEmpr').val($(this).val());
            $.generateSelectTE("#editTipoEmpr").then(function(){
                $.post("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/process/index.php", {
                    process: "mapeoAsocios",
                    group: "gestionEmpresas",
                    action: "getDetailsEmpr",

                    selectedId: $('#btnUpdateEmpr').val()
                },
                    function(response){
                    if(response){
                            selectedData = $.parseJSON(response);

                            $('#editAbvrEmpr').val(selectedData.abreviatura_empresa);
                            $('#editCodeDonanteEmpr').val(selectedData.codigo_donante);
                            $('#editTipoCoopEmpr').val(selectedData.tipo_cooperacion);
                            $('#editTipoRelEmpr').val(selectedData.tipo_relacion);
                            $('#editNomEmpr').val(selectedData.nombre_empresa);
                            $('#editEstadoEmpr').val(selectedData.estado);
                            $('#editTipoEmpr').val(selectedData.tipo_empresa);
                            $('#editDirecEmpr').val(selectedData.direccion);
                        }else{
                            alert(response)
                        }
                    }
                )
            });
        }));
        
        //==== BOTÓN PARA ELIMINAR UNA EMPRESA ====
        $(document).on('click', '.deleteToggleEmpr', function(){ $('#btnDeleteEmpr').val($(this).val()); $.openFormModal($("#modalDeleteEmpr")); })

    // ::::: GESTIÓN DE EMPRESAS :::::
        // ==== BOTÓN PARA REVISAR DETALLES DE UN CONVENIO ====
        $(document).on('click', '.detailsToggleConv',(function(){ 
            $.openFormModal($("#modalDetailsConv"));

            $.post("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/process/index.php", {
                process: "mapeoAsocios", 
                group: "gestionConvenios",
                action: "getDetailsConv",
                
                selectedId: $(this).val()
            },
                function(response){
                    
                    if(response){
                        selectedData = $.parseJSON(response);

                        $('#dataSedeConv').text(selectedData.sede);
                        $('#dataNombContactoConv').text(selectedData.nombre_contacto);
                        var toEditValue = selectedData.numero_contacto.toString(); 
                        var newValue = toEditValue.slice(0, 4) + '-' + toEditValue.slice(4);
                        $('#dataNumContactoConv').text(newValue);
                        $('#dataTipoConv').text(selectedData.tipo_convenio);
                        $('#dataEmailConv').text(selectedData.correo_electronico);
                        $('#dataSituacionActConv').text(selectedData.situacion_actual);
                        $('#dataFechaInicioConv').text(selectedData.fecha_inicio);
                        $('#dataFechaFinConv').text((selectedData.fecha_finalizacion != "0000-00-00" && selectedData.fecha_finalizacion != null ? selectedData.fecha_finalizacion : "Pendiente a determinar" ));
                        $('#dataDescConv').text(selectedData.convenio);
                        selectedData.respaldo_convenio == 1 ? ($('#CC').removeClass('d-none'), $('#SC').addClass('d-none')) : ($('#SC').removeClass('d-none'), $('#CC').addClass('d-none'));
                        selectedData.habilitada_evidencia == 1 ? ($('#RD').removeClass('d-none'), $('#SRD').addClass('d-none'), $('#downloadConv').attr('href', 'view/mapeo_asocios/storage/evidenciaFiles/'+selectedData.nombre_archivo)) : ($('#SRD').removeClass('d-none'), $('#RD').addClass('d-none'));
                        $('#dataFechaRegistroConv').text(selectedData.fecha_registro);
                        $('#dataFechaModConv').text(selectedData.fecha_modificacion);

                        $.getEmprData(selectedData.id_empresa);
                    }else{
                        console.log('Nada')
                    }
                }
            );
        }));

        // ==== BOTÓN PARA EDITAR DATOS DE UNA EMPRESA ====
        // Se va a plasmar los datos de la empresa actual a los campos necesarios para la edición
        $(document).on('click', '.editToggleConv',(function(){
            $.openFormModal($("#modalEditConv"));
            
            $('#btnUpdateConv').val($(this).val());

            $.generateSelectTE('#editTipoEmpresaConv').then(function(){
                
                $.post("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/process/index.php", {
                    process: "mapeoAsocios", 
                    group: "gestionConvenios",
                    action: "getDetailsConv",  // Reutilizando este ACTION para agilizar el proceso de pedido de datos
                    
                    selectedId: $('#btnUpdateConv').val()
                },
                    function(response){
                        if(response){
                            selectedData = $.parseJSON(response);

                            $('#editTipoEmpresaConv').val(selectedData.tipo_empresa);
                            $.generateSelectEmpr('#editEmpresaConv', selectedData.tipo_empresa).then(function(){
                                $('#editSedeConv').val(selectedData.sede);
                                $('#editNombContactoConv').val(selectedData.nombre_contacto);
                                $('#editNumContactoConv').val(selectedData.numero_contacto);
                                $('#editTipoConv').val(selectedData.tipo_convenio);
                                $('#editEmpresaConv').val(selectedData.id_empresa);
                                $('#editEmailConv').val(selectedData.correo_electronico);
                                $('#editSituacionActConv').val(selectedData.situacion_actual);
                                $('#editFechaInicioConv').val(selectedData.fecha_inicio);
                                $('#editFechaFinConv').val((selectedData.fecha_finalizacion != "0000-00-00" && selectedData.fecha_finalizacion != null ? selectedData.fecha_finalizacion : "" ));
                                $('#editFechaFinConv').prop('disabled', (selectedData.situacion_actual == "Finalizada") ? false : true );
                                $('#editDescConv').val(selectedData.convenio);
                                $('#editRespaldoConv').prop('checked', (selectedData.respaldo_convenio == 1) ? true : false )
                            })
                        }else{
                            alert(response)
                        }
                    }
                )
            })
        }));

        // ==== BOTÓN PARA IMPORTAR EVIDENCIA ====
        $(document).on('click', '.importToggleConv', function(){ 
            $.openFormModal($("#modalImportConv"));

            $('#btnImportFileConv').val($(this).val()); 
            
            $.post("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/process/index.php", {
                process: "mapeoAsocios", 
                group: "gestionConvenios",
                action: "getDetailsConv",  // Reutilizando este ACTION para agilizar el proceso de pedido de datos
                
                selectedId: $('#btnImportFileConv').val()
            },
                function(response){
                    if(response){
                        selectedData = $.parseJSON(response);

                        $('#firstFileConv').prop('checked', (selectedData.estado_evidencia == 0) ? true : false )

                        $('#deleteFileMsgConv').val(selectedData.id_evidencia);
                        $('#deleteFileMsgConv').toggleClass('d-none', selectedData.habilitada_evidencia != 1);
                        $('#editFileMsgConv').toggleClass('d-none', selectedData.habilitada_evidencia != 1);
                    }
                }
            )
        })

        // ==== BOTÓN PARA ELIMINAR UN CONVENIO ====
        $(document).on('click', '.deleteToggleConv', function(){ $('#btnDeleteConv').val($(this).val()); $.openFormModal($("#modalDeleteConv")); })

        // ==== BOTÓN PARA ELIMINAR LA EVIDENCIA DE UN CONVENIO ====
        $(document).on('click', '#deleteFileMsgConv', function(){
            $('#modalImportConv').modal('hide');
            $('#modalDeleteED').modal('show');

            $('#btnDeleteED').val($(this).val());
        })
})

$.extend({
    getEmprData: function(selectedId){
        $.post("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/process/index.php", {
            process: "mapeoAsocios",
            group: "gestionEmpresas",
            action: "getDetailsEmpr",

            selectedId: selectedId
        },
            function(response){
                if(response){
                    selectedData = $.parseJSON(response);
                    
                    $('#dataAbvrEmpr').text(selectedData.abreviatura_empresa.toUpperCase());
                    $('#dataCodeDonanteEmpr').text(selectedData.codigo_donante);
                    $('#dataTipoCoopEmpr').text(selectedData.tipo_cooperacion);
                    $('#dataTipoRelEmpr').text(selectedData.tipo_relacion);
                    $('#dataNomEmpr').text(selectedData.nombre_empresa);
                    $('#dataEstadoEmpr').text(selectedData.estado);
                    $('#dataTipoEmpr').text(selectedData.tipo_empresa_nombre);
                    $('#dataDirecEmpr').text(selectedData.direccion);
                    $('#dataFechaRegistroEmpr').text(selectedData.fecha_registro);
                    $('#dataFechaModEmpr').text(selectedData.fecha_modificacion);

                }else{
                    alert(response)
                }
            }
        )
    }
})