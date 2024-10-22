<?php 
    function editTipoEmpresa(){ // TE = Tipo Empresa
        $modalId = "modalEditTE"; 

        $modalHeaderCont = <<<HTML
            <img src="view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/Icons/edit.png" width="50px" height="50px">
            <section class="ms-3 w-100 align-middle">
                <h5 class="fs-5 fw-bold mb-1">Editar el tipo de empresa</h5>
                <p class="text-muted mb-0">Puedes modificar la información del tipo de empresa</p>
            </section>
        HTML;

        $modalBodyCont = <<<HTML
            <form id="editTEForm">
                <div class="input-cont my-1 mx-1 p-1">
                    <h6 class="fs-6 fw-bold mb-1">Nombre del tipo de empresa</h6>
                    <input type="text" name="editNombreTE" id="editNombreTE" class="input-form w-100 form-control">
                </div>

                <div class="input-cont my-1 mx-1 p-1">
                    <h6 class="fs-6 fw-bold mb-1">Descripción del tipo de empresa</h6>
                    <textarea class="input-form w-100 form-control" name="editDescTE" id="editDescTE" rows="3"></textarea>
                </div>
            </form>
        HTML;

        $modalFooterCont = <<<HTML
            <button type="button" class="btn btn-secondary-custom" data-bs-dismiss="modal" id="resetEditTEForm">
                Cancelar
            </button>
            <button type="button" class="btn btn-info" id="btnUpdateTE" value="">Editar</button>
        HTML;

        include("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/components/templates/modalTemplates.php"); ?>

        <script>
            $("#btnUpdateTE").click(function() { 
                isEditable = $.validateEditTE(); // Validar formulario
                //$(this).prop('disabled', true); 

                if(isEditable){
                    $.post("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/process/index.php", {
                        process: "mapeoAsocios",
                        group: "gestionTipoEmpresa",
                        action: "editTE",

                        editNombreTE: $('#editNombreTE').val(),
                        editDescTE: $('#editDescTE').val(),
                        
                        selectedId : $("#btnUpdateTE").val(),
                    },
                        function(response){ 
                            if(response){ // Si el registro es exitoso entonces...
                                $.toast({
                                    heading: 'Finalizado',
                                    text: "Tipo de empresa actualizada con éxito.",
                                    showHideTransition: 'slide',
                                    icon: 'success',
                                    hideAfter: 5000, 
                                    position: 'bottom-center'
                                });


                                $.resetEditTE();
                                $('#btnUpdateTE').prop('disabled', false);
                                
                                $.closeFormModal($("#modalEditTE"));

                                $('#globalSearchField').val('');
                                // Recarga el contenido de la tabla
                                $.refreshTableContent_GE(1);
                            }
                    });
                }else{
                    $(this).prop('disabled', false);
                    $.toast({
                        heading: 'ERROR',
                        text: 'Error al validar la edición. Inténtalo de nuevo.',
                        showHideTransition: 'slide',
                        icon: 'error',
                        loader: false,
                        hideAfter: 5000, 
                        position: 'top-right',
                        stack: false
                    });
                }
            });

            $('#resetEditTEForm').click(function (e) { $.resetEditTE(); });

            $.extend({
                resetEditTE: function(){
                    setTimeout(function(){
                        $('#editTEForm')[0].reset();
                        $('#editTEForm').validate().destroy();
                    }, 500)
                },

                validateEditTE: function(){

                    $('#editTEForm').validate({
                        errorClass: 'bi bi-exclamation-diamond',
                        errorElement: 'span',
                        rules:{
                            editNombreTE: {
                                required: true,
                                // remote: {   // Regla para comprobar si el tipo de empresa existe o no
                                //     url: "view/mapeo_asocios/process/index.php", 
                                //     type: "post",
                                //     data: {
                                //         process: "mapeoAsocios",
                                //         group: "gestionTipoEmpresa",
                                //         action: "checkNameTE",
                                //         formType: "addForm",
                                //         editNombreTE: function(){
                                //             return $("#editNombreTE").val();
                                //         }
                                //     },
                                //     dataType:'json',
                                //     dataFilter: function (data) {
                                //         jsonData = JSON.parse(data);
                                //         return false;
                                //     }
                                // }
                            },
                            editDescTE: { required: true }
                        },
                        messages:{
                            editNombreTE: { required: "Este campo es obligatorio.", remote: "Tipo de empresa ya registrada." },
                            editDescTE: { required: "Este campo es obligatorio." }
                        }
                    })
                    return $('#editTEForm').valid();
                }
            })

        </script>
        <?php
    }

    function editEmpresa(){ // Empr = Empresa
        $modalId = "modalEditEmpr";

        $modalHeaderCont = <<<HTML
            <img src="view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/Icons/edit.png" width="50px" height="50px">
            <section class="ms-3 w-100 align-middle">
                <h5 class="fs-5 fw-bold mb-1">Editar información de empresa</h5>
                <p class="text-muted mb-0">Puedes modificar la información de la empresa</p>
            </section>
        HTML;

        $modalBodyCont = <<<HTML
            <form id="editEmprForm">
                <section class="forms-grid empr-grid h-100">
                    <div class="input-cont my-1 mx-1 p-1">
                        <h6 class="fs-6 fw-bold mb-1">Abreviatura de la empresa</h6>
                        <input type="text" name="editAbvrEmpr" id="editAbvrEmpr" class="input-form w-100 form-control">
                    </div>
                    <div class="input-cont my-1 mx-1 p-1">
                        <h6 class="fs-6 fw-bold mb-1">Código donante</h6>
                        <input type="text" name="editCodeDonanteEmpr" id="editCodeDonanteEmpr" class="input-form w-100 form-control">
                    </div>
                    <div class="input-cont my-1 mx-1 p-1">
                        <h6 class="fs-6 fw-bold mb-1">Tipo de cooperación</h6>
                        <select name="editTipoCoopEmpr" id="editTipoCoopEmpr" class="form-select input-form w-100 form-control">
                            <option value="Multilateral">Multilateral</option>
                            <option value="Bilateral">Bilateral</option>
                            <option value="Empresa">Empresa</option>
                            <option value="ONGI">ONGI</option>
                            <option value="ONGNA">ONGNA</option>
                            <option value="FUND">FUND</option>
                            <option value="Comunicaciones">Comunicaciones</option>
                            <option value="Deportivo">Deportivo</option>
                        </select>
                    </div>
                    <div class="input-cont my-1 mx-1 p-1">
                        <h6 class="fs-6 fw-bold mb-1">Tipo de relación</h6>
                        <select name="editTipoRelEmpr" id="editTipoRelEmpr" class="form-select input-form w-100 form-control">
                            <option value="Proyecto">Proyecto</option>
                            <option value="Consulta">Consultoría</option>
                            <option value="Donaciones">Donaciones</option>
                            <option value="Acuerdo">Acuerdo</option>
                        </select>
                    </div>
                    <div class="input-cont my-1 mx-1 p-1">
                        <h6 class="fs-6 fw-bold mb-1">Nombre de la empresa</h6>
                        <input type="text" name="editNomEmpr" id="editNomEmpr" class="input-form w-100 form-control">
                    </div>
                    <div class="input-cont my-1 mx-1 p-1">
                        <h6 class="fs-6 fw-bold mb-1">Estado</h6>
                        <select name="editEstadoEmpr" id="editEstadoEmpr" class="form-select input-form w-100 form-control">
                            <option value="Activa">Activa</option>
                            <option value="Inactiva">Inactiva</option>
                            <option value="No iniciada">No iniciada</option>
                        </select>
                    </div>
                    <div class="input-cont my-1 mx-1 p-1">
                        <h6 class="fs-6 fw-bold mb-1">Tipo de empresa</h6>
                        <select name="editTipoEmpr" id="editTipoEmpr" class="form-select input-form w-100 form-control">
                            <!-- Generación de opciones dinámicas -->
                        </select>
                    </div>
                    <div class="input-cont my-1 mx-1 p-1">
                        <h6 class="fs-6 fw-bold mb-1">Dirección</h6>
                        <textarea type="text" name="editDirecEmpr" id="editDirecEmpr" rows="2" class="input-form w-100 form-control"></textarea>
                    </div>
                </section>
            </form>
        HTML;

        $modalFooterCont = <<<HTML
            <button type="button" class="btn btn-secondary-custom" data-bs-dismiss="modal" id="resetEditEmpr">
                Cancelar
            </button>
            <button type="submit" class="btn btn-info" value="" id="btnUpdateEmpr">Actualizar</button>
        HTML;

        include("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/components/templates/modalTemplates.php"); ?>

        <script>
            $(document).on('click', '#btnUpdateEmpr', (function(){
                isValid = $.validateEditEmpr();
                // $(this).prop('disabled', true);

                if (isValid) {
                    $.post("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/process/index.php",{
                        process: "mapeoAsocios",
                        group: "gestionEmpresas",
                        action: "editEmpr",

                        // Datos a enviar:
                        editAbvrEmpr: $('#editAbvrEmpr').val(),
                        editNomEmpr: $('#editNomEmpr').val(),
                        editCodeDonanteEmpr: $('#editCodeDonanteEmpr').val(),
                        editTipoCoopEmpr: $('#editTipoCoopEmpr').val(),
                        editTipoRelEmpr: $('#editTipoRelEmpr').val(),
                        editTipoEmpr: $('#editTipoEmpr').val(),
                        editEstadoEmpr: $('#editEstadoEmpr').val(),
                        editDirecEmpr: $('#editDirecEmpr').val(),

                        selectedId: $('#btnUpdateEmpr').val()
                    },
                        function(response){

                            $.toast({
                                heading: "Finalizado",
                                text: "Empresa actualizada con éxito",
                                showHideTransition: 'slide',
                                icon: 'success',
                                loader: false,
                                hideAfter: 3000, 
                                position: 'top-right',
                                stack: false
                            });

                            $.resetEditEmpr();
                            $('#btnUpdateEmpr').prop('disabled', false);
                            
                            $.closeFormModal($("#modalEditEmpr"));

                            $('#globalSearchField').val('');
                            $.refreshTableContent_GE(0);
                        }
                    )
                }else{
                    $(this).prop('disabled', false);
                    $.toast({
                        heading: 'ERROR',
                        text: 'Error al validar la empresa. Inténtalo de nuevo.',
                        showHideTransition: 'slide',
                        icon: 'error',
                        loader: false,
                        hideAfter: 3000, 
                        position: 'top-right',
                        stack: false
                    });
                }
            }))

            $('#resetEditEmpr').click(function () { $.resetEditEmpr() });

            $.extend({
                resetEditEmpr: function(){
                    setTimeout(function(){
                        $('#editEmprForm')[0].reset();
                        $('#editEmprForm').validate().destroy();
                    }, 500)
                },

                validateEditEmpr: function(){
                    $('#editEmprForm').validate({
                        errorClass: 'bi bi-exclamation-diamond',
                        errorElement: 'span',
                        rules:{
                            editAbvrEmpr: { required: true },
                            editNomEmpr: { 
                                required: true,
                                // remote: {   // Regla para comprobar si la empresa existe o no
                                //     url: "view/mapeo_asocios/process/index.php", 
                                //     type: "post",
                                //     data: {
                                //         process: "mapeoAsocios",
                                //         group: "gestionEmpresas",
                                //         action: "checkNameEmpr",
                                //         formType: "editForm",
                                //         nomTE: function(){
                                //             return $("#editNomEmpr").val();
                                //         }
                                //     },
                                //     dataType:'json',
                                //     dataFilter: function (data) {
                                //         jsonData = JSON.parse(data);
                                //         return jsonData.valid;
                                //     }
                                // }
                            },
                            editCodeDonanteEmpr: { required: true },
                            editTipoCoopEmpr: { required: true },
                            editTipoRelEmpr: { required: true },
                            editTipoEmpr: { required: true },
                            editEstadoEmpr: { required: true },
                            editDirecEmpr: { required: true }
                        },
                        messages:{
                            editNomEmpr: { remote: "Esta empresa ya se encuentra registrada." }
                        }
                    })
                    return $('#editEmprForm').valid();
                }
            })
        </script>

        <?php
    }

    function editConvenio(){ // Conv = Convenio
        $modalId = "modalEditConv";

        $modalHeaderCont = <<<HTML
            <img src="view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/Icons/edit.png" width="50px" height="50px">
            <section class="ms-3 w-100 align-middle">
                <h5 class="fs-5 fw-bold mb-1">Editar información del convenio</h5>
                <p class="text-muted mb-0">Puedes modificar la información del convenio</p>
            </section>
        HTML;

        $modalBodyCont = <<<HTML
            <form id="editConvForm">
                <section class="forms-grid h-100 conv-grid">

                    <div class="input-cont my-1 mx-1 p-1">
                        <h6 class="fs-6 fw-bold mb-1">Tipo de empresa</h6>
                        <select name="editTipoEmpresaConv" id="editTipoEmpresaConv" class="form-select input-form w-100 form-control">
                            <!-- Generación de opciones dinámicas -->
                        </select>
                    </div>

                    <div class="input-cont my-2 mx-1 p-1">
                        <h6 class="fs-6 fw-bold mb-1">Sede</h6>
                        <select name="editSedeConv" id="editSedeConv" class="form-select input-form w-100 form-control">
                            <option value="San Salvador">San Salvador</option>
                            <option value="San Miguel">San Miguel</option>
                            <option value="Santa Ana">Santa Ana</option>
                        </select>
                    </div>

                    <div class="input-cont my-2 mx-1 p-1">
                        <h6 class="fs-6 fw-bold mb-1">Nombre de contacto</h6>
                        <input type="text" name="editNombContactoConv" id="editNombContactoConv" class="input-form w-100 form-control">
                    </div>

                    <div class="input-cont my-2 mx-1 p-1">
                        <h6 class="fs-6 fw-bold mb-1">Número de contacto</h6>
                        <input type="number" name="editNumContactoConv" id="editNumContactoConv" class="input-form w-100 form-control">
                    </div>

                    <div class="input-cont my-2 mx-1 p-1">
                        <h6 class="fs-6 fw-bold mb-1">Tipo de convenio</h6>
                        <select name="editTipoConv" id="editTipoConv" class="form-select input-form w-100 form-control">
                            <option selected disabled hidden>Selecciona una opción...</option>
                            <option value="Proyecto">Proyecto</option>
                            <option value="Consulta">Consultoría</option>
                            <option value="Donaciones">Donaciones</option>
                            <option value="Acuerdo">Acuerdo</option>
                        </select>
                    </div>
                
                    <div class="input-cont my-1 mx-1 p-1">
                        <h6 class="fs-6 fw-bold mb-1">Empresa</h6>
                        <select name="editEmpresaConv" id="editEmpresaConv" class="form-select input-form w-100 form-control">
                            <!-- Generación de opciones dinámicas -->
                        </select>
                    </div>

                    <div class="input-cont my-2 mx-1 p-1">
                        <h6 class="fs-6 fw-bold mb-1">Correo electrónico</h6>
                        <input type="text" name="editEmailConv" id="editEmailConv" class="input-form w-100 form-control">
                    </div>

                    <div class="input-cont my-2 mx-1 p-1">
                        <h6 class="fs-6 fw-bold mb-1">Situación actual</h6>
                        <select name="editSituacionActConv" id="editSituacionActConv" class="form-select input-form w-100 form-control">
                            <option value="Activa">Activa</option>
                            <option value="Finalizada">Finalizada</option>
                        </select>
                    </div>

                    <div class="input-cont my-2 mx-1 p-1">
                        <h6 class="fs-6 fw-bold mb-1">Fecha de inicio</h6>
                        <input type="date" name="editFechaInicioConv" id="editFechaInicioConv" class="input-form w-100 form-control">
                    </div>

                    <div class="input-cont my-2 mx-1 p-1">
                        <h6 class="fs-6 fw-bold mb-1">Fecha de finalización</h6>
                        <input type="date" name="editFechaFinConv" id="editFechaFinConv" disabled class="input-form w-100 form-control">
                    </div>
                </section>

                <section class="w-100 px-1">
                    <div class="input-cont my-2 mx-2 p-1">
                        <h6 class="fs-6 fw-bold mb-1">Convenio</h6>
                        <textarea class="input-form w-100 form-control" name="editDescConv" id="editDescConv" rows="3"></textarea>

                        <div class="form-check mt-2 d-flex mx-4">
                            <input class="form-check-input opacity- mt-1" type="checkbox" id="editRespaldoConv" name="editRespaldoConv" />
                            <label class="form-check-label fs-6 fw-medium ms-2" for="editRespaldoConv"> Este convenio esta respaldado con documentación</label>
                        </div>
                    </div>
                </section>
            </form>
        HTML;

        $modalFooterCont = <<<HTML
            <button type="button" class="btn btn-secondary-custom" data-bs-dismiss="modal" id="resetEditConv">
                Cancelar
            </button>
            <button type="button" class="btn btn-info" id="btnUpdateConv">
                Actualizar
            </button>
        HTML; 
        include('view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/components/templates/modalTemplates.php');  ?>

        <script>
            $("#btnUpdateConv").click(function() { 
                isEditable = $.validateEditConv(); // Validar formulario
                $(this).prop('disabled', true); 

                if(isEditable){
                    $.post("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/process/index.php", {
                        process: "mapeoAsocios", // Manda el proceso en cuestión
                        group: "gestionConvenios", // Grupo de acciones
                        action: "editConv",    // Manda la acción que se desea realizar

                        selectedId : $(this).val(),
                        
                        // Asignando datos de los valores del formulario
                        editEmpresaConv: $("#editEmpresaConv").val(), 
                        editSedeConv: $("#editSedeConv").val(), 
                        editNombContactoConv: $("#editNombContactoConv").val(), 
                        editNumContactoConv: $("#editNumContactoConv").val(), 
                        editEmailConv : $("#editEmailConv").val(),
                        editSituacionActConv : $("#editSituacionActConv").val(),
                        editFechaInicioConv : $("#editFechaInicioConv").val(),
                        editFechaFinConv : $("#editFechaFinConv").val(),
                        editTipoConv : $("#editTipoConv").val(),
                        editDescConv : $("#editDescConv").val(),
                        editRespaldoConv : $("#editRespaldoConv").is(":checked"),
                    },
                        function(response){ 
                            if(response){ // Si el registro es exitoso entonces...
                                $.toast({
                                    heading: 'Finalizado',
                                    text: "Convenio actualizado con éxito.",
                                    showHideTransition: 'slide',
                                    icon: 'success',
                                    hideAfter: 5000, 
                                    position: 'bottom-center'
                                });
                                
                                if($("#editRespaldoConv").is(":checked")){
                                    if ($('#btnConvenio').hasClass('btnInactive')){
                                        $.refreshTabsClasses_GC($('#btnConvenio'))
                                    }
                                    convenioStatus = 1;
                                }else{
                                    if ($('#btnConvenio').hasClass('btnActive')){
                                        $.refreshTabsClasses_GC($('#btnNoConvenio'))
                                    }
                                    convenioStatus = 0; 
                                }
                                
                                $.resetEditConv();
                                $("#btnUpdateConv").prop('disabled', false);
                                
                                $.closeFormModal($("#modalEditConv"));

                                $('#globalSearchField').val('');
                                // Recarga el contenido de la tabla
                                $.refreshTableContent_GC(convenioStatus);
                            }
                    });
                }else{
                    $(this).prop('disabled', false);
                    $.toast({
                        heading: 'ERROR',
                        text: 'Error al validar la edición del convenio. Inténtalo de nuevo.',
                        showHideTransition: 'slide',
                        icon: 'error',
                        loader: false,
                        hideAfter: 5000, 
                        position: 'top-right',
                        stack: false
                    });
                }
            });

            $('#editTipoEmpresaConv').change(function(){
                $.generateSelectEmpr('#editEmpresaConv', $(this).val()); 
                $('#editEmpresaConv').prop('disabled', false) 
            })

            $('#editSituacionActConv').change(function(){
                $('#editFechaFinConv').prop('disabled', ($(this).prop('selectedIndex') == 1) ? false : true );
                if($(this).prop('selectedIndex') != 1){$('#editFechaFinConv').val('')};
            });

            $('#resetEditConv').click(function(){ $.resetEditConv(); })

            $.extend({
                resetEditConv: function(){
                    setTimeout(function(){
                        $('#editConvForm')[0].reset();
                        $('#editConvForm').validate().destroy();
                        $("#editRespaldoConv").prop('checked', false);
                        $('#fechaFinConv').prop('disabled',true);
                    }, 500)
                },

                validateEditConv: function(){
                    $('#editConvForm').validate({
                        errorClass: 'bi bi-exclamation-diamond',
                        errorElement: 'span',
                        rules:{
                            editTipoEmpresaConv: { required: true },
                            editEmpresaConv: { required: true },
                            editSedeConv: { required: true },
                            editNombContactoConv: { required: true },
                            editNumContactoConv: {  required: true, digits: true, 
                                                range: [ 10000000, 99999999 ] },
                            editEmailConv: { required: true, email: true },
                            editTipoConv: { required: true },
                            editSituacionActConv: { required:true },
                            editFechaInicioConv: { required: true, max: new Date().toISOString().split('T')[0], min: new Date('2001-01-01').toISOString().split('T')[0] },
                            editFechaFinConv: { required: true, greaterThan: "#editFechaInicioConv", max: new Date().toISOString().split('T')[0], min: new Date('2001-01-01').toISOString().split('T')[0]},
                            editDescConv: { required: true }
                        },
                        messages:{
                            editNumContactoConv: { digits: "Solo se aceptan digitos.", range: "Ingresa un número de teléfono válido.", number: "Dato no válido." },
                            editEmailConv: { email: "Dirección de correo no válida." },
                            editFechaInicioConv: { max: "La fecha de inicio no puede exeder a la fecha de hoy.", min: "La fecha no puede ser anterior a 2001."},
                            editFechaFinConv: { max: "La fecha de finalización no puede exeder a la fecha de hoy.", min: "La fecha no puede ser anterior a 2001." },
                        }
                    })
                    return $('#editConvForm').valid();
                }
            })
        </script>

        <?php
    }

?>