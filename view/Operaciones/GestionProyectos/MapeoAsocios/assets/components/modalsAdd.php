<?php
    function addTipoEmpresa(){ // TE = Tipo Empresa
        $modalId = "modalAddTE";

        $modalHeaderCont = <<<HTML
            <img src="../assets/Icons/add.png" width="50px" height="50px">
            <section class="ms-3 w-100 align-middle">
                <h5>Agregar un tipo de empresa</h5>
                <p class="text-muted mb-0">Proporciona detalles sobre el tipo de empresa a registrar</p>
            </section>
        HTML;

        $modalBodyCont = <<<HTML
            <form id="addTEForm">
                <div class="input-cont my-1 mx-1 p-1">
                    <h6>Nombre del tipo de empresa</h6>
                    <input type="text" name="nomTE" id="nomTE" class="input-form w-100 form-control">
                </div>

                <div class="input-cont my-1 mx-1 p-1">
                    <h6>Descripción del tipo de empresa</h6>
                    <textarea class="input-form w-100 form-control" name="descTE" id="descTE" rows="3"></textarea>
                </div>
            </form>
        HTML;

        $modalFooterCont = <<<HTML
            <button type="button" class="btn btn-secondary-custom" data-bs-dismiss="modal" id="resetAddTEForm">
                Cancelar
            </button>
            <button type="button" class="btn btn-info" id="btnCreateTE" value="">Agregar</button>
        HTML;
        
        include("../assets/components/templates/modalTemplates.php"); ?>

        <script> 
            $(document).on('click', '#btnCreateTE',(function(){
                isValid = $.validateTEForm();
                console.log(isValid);
                //$(this).prop('disabled', true);
                if(isValid){
                    $.post("../process/index.php", {
                        process: "mapeoAsocios",
                        group: "gestionTipoEmpresa",
                        action: "addTE",

                        // Datos a enviar:
                        nomTE: $('#nomTE').val(),
                        descTE: $('#descTE').val()
                    },
                        function(response){
                            $.toast({
                                heading: 'Finalizado',
                                text: "Tipo de empresa añadida con éxito",
                                showHideTransition: 'slide',
                                icon: 'success',
                                loader: false,
                                hideAfter: 3000, 
                                position: 'top-right',
                                stack: false
                            });

                            $('#globalSearchField').val('');
                            $.resetAddTE();
                            $('#btnCreateTE').prop('disabled', false);
                            $('#modalAddTE').modal('hide');

                            if( $('#btnTipoEmpresa').hasClass('btnInactive') ){
                                $.refreshTabsClasses_GE( $('#btnTipoEmpresa') );
                            }
                            $.refreshTableContent_GE(1);
                        }
                    )
                }else{
                    $(this).prop('disabled', false);
                    $.toast({
                        heading: 'ERROR',
                        text: 'Error al validar el tipo de empresa. Inténtalo de nuevo.',
                        showHideTransition: 'slide',
                        icon: 'error',
                        loader: false,
                        hideAfter: 3000, 
                        position: 'top-right',
                        stack: false
                    });
                }
            }))

            $('#resetAddTEForm').click(function () { $.resetAddTE() });

            $.extend({
                resetAddTE: function(){
                    setTimeout(function(){
                        $('#addTEForm')[0].reset();
                        $('#addTEForm').validate().destroy();
                    }, 500)
                },

                validateTEForm: function(){
                    $('#addTEForm').validate({
                        errorClass: 'bi bi-exclamation-diamond',
                        errorElement: 'span',
                        rules:{
                            nomTE: {
                                required: true,
                                remote: {   // Regla para comprobar si el tipo de empresa existe o no
                                    url: "../process/index.php", 
                                    type: "post",
                                    data: {
                                        process: "mapeoAsocios",
                                        group: "gestionTipoEmpresa",
                                        action: "checkNameTE",
                                        formType: "addForm",
                                        nomTE: function(){
                                            return $("#nomTE").val();
                                        }
                                    },
                                    dataType:'json',
                                    dataFilter: function (data) {
                                        jsonData = JSON.parse(data);
                                        console.log(jsonData);
                                        return jsonData.valid;
                                    }
                                }
                            },
                            descTE: { required: true }
                        },
                        messages:{
                            nomTE: { remote: "Este tipo de empresa ya se encuentra registrada." }
                        }
                    })
                    return $('#addTEForm').valid();
                }
            })
        </script>

        <?php
    }

    function addEmpresa(){ // Empr = Empresa
        $modalId = "modalAddEmpr";

        $modalHeaderCont = <<<HTML
            <img src="../assets/Icons/add.png" width="50px" height="50px">
            <section class="ms-3 w-100 align-middle">
                <h5>Agregar una empresa</h5>
                <p class="text-muted mb-0">Proporciona detalles sobre la empresa a registrar</p>
            </section>
        HTML;

        $modalBodyCont = <<<HTML
            <form id="addEmprForm">
                <section class="forms-grid h-100">
                    <div class="input-cont my-1 mx-1 p-1">
                        <h6>Abreviatura de la empresa</h6>
                        <input type="text" name="abvrEmpr" id="abvrEmpr" class="input-form w-100 form-control">
                    </div>
                    <div class="input-cont my-1 mx-1 p-1">
                        <h6>Tipo de cooperación</h6>
                        <select name="tipoCoopEmpr" id="tipoCoopEmpr" class="form-select input-form w-100 form-control">
                            <option selected disabled hidden>Selecciona una opción...</option>
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
                        <h6>Tipo de relación</h6>
                        <select name="tipoRelEmpr" id="tipoRelEmpr" class="form-select input-form w-100 form-control">
                            <option selected disabled hidden>Selecciona una opción...</option>
                            <option value="Proyecto">Proyecto</option>
                            <option value="Consulta">Consultoría</option>
                            <option value="Donaciones">Donaciones</option>
                            <option value="Acuerdo">Acuerdo</option>
                        </select>
                    </div>
                    <div class="input-cont my-1 mx-1 p-1">
                        <h6>Nombre de la empresa</h6>
                        <input type="text" name="nomEmpr" id="nomEmpr" class="input-form w-100 form-control">
                    </div>
                    <div class="input-cont my-1 mx-1 p-1">
                        <h6>Estado</h6>
                        <select name="estadoEmpr" id="estadoEmpr" class="form-select input-form w-100 form-control">
                            <option selected disabled hidden>Selecciona una opción...</option>
                            <option value="Activa">Activa</option>
                            <option value="Inactiva">Inactiva</option>
                            <option value="No iniciada">No iniciada</option>
                        </select>
                    </div>
                    <div class="input-cont my-1 mx-1 p-1">
                        <h6>Tipo de empresa</h6>
                        <select name="tipoEmpr" id="tipoEmpr" class="form-select input-form w-100 form-control">
                            <!-- Generación de opciones dinámicas -->
                        </select>
                    </div>
                </section>

                <div class="input-cont my-1 mx-1 p-1">
                    <h6>Dirección</h6>
                    <textarea type="text" name="direcEmpr" id="direcEmpr" rows="2" class="input-form w-100 form-control"></textarea>
                </div>
            </form>
        HTML;

        $modalFooterCont = <<<HTML
            <button type="button" class="btn btn-secondary-custom" data-bs-dismiss="modal" id="resetAddEmpr">
                Cancelar
            </button>
            <input type="submit" class="btn btn-info" value="Agregar" id="btnCreateEmpr">
        HTML;

        include("../assets/components/templates/modalTemplates.php"); ?>

        <script>
            $(document).on('click', '#btnCreateEmpr', (function(){
                isValid = $.validateEmprForm();
                console.log(isValid);
                // $(this).prop('disabled', true);

                if(isValid){
                    $.post("../process/index.php",{
                        process: "mapeoAsocios",
                        group: "gestionEmpresas",
                        action: "addEmpr",

                        // Datos a enviar:
                        abvrEmpr: $('#abvrEmpr').val(),
                        nomEmpr: $('#nomEmpr').val(),
                        tipoCoopEmpr: $('#tipoCoopEmpr').val(),
                        tipoRelEmpr: $('#tipoRelEmpr').val(),
                        tipoEmpr: $('#tipoEmpr').val(),
                        estadoEmpr: $('#estadoEmpr').val(),
                        direcEmpr: $('#direcEmpr').val()

                    },
                        function(response){
                            console.log(response);
                            $.toast({
                                heading: "Finalizado",
                                text: "Empresa añadida con éxito",
                                showHideTransition: 'slide',
                                icon: 'success',
                                loader: false,
                                hideAfter: 3000, 
                                position: 'top-right',
                                stack: false
                            });

                            $('#globalSearchField').val('');
                            $.resetAddEmpr();
                            $('#btnCreateEmpr').prop('disabled', false);
                            $('#modalAddEmpr').modal('hide');

                            if( $('#btnListadoEmpr').hasClass('btnInactive') ){
                                $.refreshTabsClasses_GE( $('#btnListadoEmpr') );
                            }
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

            $('#resetAddEmpr').click(function (e) { $.resetAddEmpr() });

            $.extend({
                resetAddEmpr: function(){
                    setTimeout(function(){
                        $('#addEmprForm')[0].reset();
                        $('#addEmprForm').validate().destroy();
                    }, 500)
                },

                validateEmprForm: function(){
                    $('#addEmprForm').validate({
                        errorClass: 'bi bi-exclamation-diamond',
                        errorElement: 'span',
                        rules:{
                            abvrEmpr: { required: true },
                            nomEmpr: { 
                                required: true,
                                // remote: {   // Regla para comprobar si la empresa existe o no
                                //     url: "../process/index.php", 
                                //     type: "post",
                                //     data: {
                                //         process: "mapeoAsocios",
                                //         group: "gestionEmpresas",
                                //         action: "checkNameEmpr",
                                //         formType: "addForm",
                                //         nomTE: function(){
                                //             return $("#nomEmpr").val();
                                //         }
                                //     },
                                //     dataType:'json',
                                //     dataFilter: function (data) {
                                //         jsonData = JSON.parse(data);
                                //         console.log(jsonData);
                                //         return jsonData.valid;
                                //     }
                                // }
                            },
                            tipoCoopEmpr: { required: true },
                            tipoRelEmpr: { required: true },
                            tipoEmpr: { required: true },
                            estadoEmpr: { required: true },
                            direcEmpr: { required: true }
                        },
                        messages:{
                            nomEmpr: { remote: "Esta empresa ya se encuentra registrada." }
                        }
                    })
                    return $('#addEmprForm').valid();
                }
            })
        </script>
        <?php
    }

    function addConvenio(){ // Conv = Convenio
        $modalId = "modalAddConv";

        $modalHeaderCont = <<<HTML
            <img src="../assets/Icons/add.png" width="50px" height="50px">
            <section class="ms-3 w-100 align-middle">
                <h5>Agregar un convenio</h5>
                <p class="text-muted mb-0">Proporciona detalles sobre el convenio</p>
            </section>
        HTML;

        $modalBodyCont = <<<HTML
            <form id="addConvForm">
                <section class="forms-grid h-100 conv-grid">
                    <div class="input-cont my-1 mx-1 p-1">
                        <h6>Tipo de empresa</h6>
                        <select name="tipoEmpresaConv" id="tipoEmpresaConv" class="form-select input-form w-100 form-control">
                            <!-- Generación de opciones dinámicas -->
                        </select>
                    </div>

                    <div class="input-cont my-1 mx-1 p-1">
                        <h6>Sede</h6>
                        <select name="sedeConv" id="sedeConv" class="form-select input-form w-100 form-control">
                            <option selected disabled hidden>Selecciona una opción...</option>
                            <option value="San Salvador">San Salvador</option>
                            <option value="San Miguel">San Miguel</option>
                            <option value="Santa Ana">Santa Ana</option>
                        </select>
                    </div>

                    <div class="input-cont my-1 mx-1 p-1">
                        <h6>Nombre de contacto</h6>
                        <input type="text" name="nombContactoConv" id="nombContactoConv" class="input-form w-100 form-control">
                    </div>

                    <div class="input-cont my-1 mx-1 p-1">
                        <h6>Número de contacto</h6>
                        <input type="number" name="numContactoConv" id="numContactoConv" class="input-form w-100 form-control">
                    </div>

                    <div class="input-cont my-1 mx-1 p-1">
                        <h6>Tipo de convenio</h6>
                        <select name="tipoConv" id="tipoConv" class="form-select input-form w-100 form-control">
                            <option selected disabled hidden>Selecciona una opción...</option>
                            <option value="Proyecto">Proyecto</option>
                            <option value="Consulta">Consultoría</option>
                            <option value="Donaciones">Donaciones</option>
                            <option value="Acuerdo">Acuerdo</option>
                        </select>
                    </div>
                
                    <div class="input-cont my-1 mx-1 p-1">
                        <h6>Empresa</h6>
                        <select name="empresaConv" id="empresaConv" class="form-select input-form w-100 form-control" disabled>
                            <!-- Generación de opciones dinámicas -->
                        </select>
                    </div>

                    <div class="input-cont my-1 mx-1 p-1">
                        <h6>Correo electrónico</h6>
                        <input type="email" name="emailConv" id="emailConv" class="input-form w-100 form-control">
                    </div>

                    <div class="input-cont my-1 mx-1 p-1">
                        <h6>Situación actual</h6>
                        <select name="situacionActConv" id="situacionActConv" class="form-select input-form w-100 form-control">
                            <option selected disabled hidden>Selecciona una opción...</option>
                            <option value="Activa">Activa</option>
                            <option value="Finalizada">Finalizada</option>
                        </select>
                    </div>

                    <div class="input-cont my-1 mx-1 p-1">
                        <h6>Fecha de inicio</h6>
                        <input type="date" name="fechaInicioConv" id="fechaInicioConv" class="input-form w-100 form-control">
                    </div>

                    <div class="input-cont my-1 mx-1 p-1">
                        <h6>Fecha de finalización</h6>
                        <input type="date" name="fechaFinConv" id="fechaFinConv" disabled class="input-form w-100 form-control" max="12/02/2024">
                    </div>
                </section>

                <section class="w-100 px-1">
                    <div class="input-cont my-1 mx-2 p-1">
                        <h6>Convenio</h6>
                        <textarea class="input-form w-100 form-control" name="descConv" id="descConv" rows="3"></textarea>

                        <div class="form-check mt-2">
                            <label class="form-check-label fs-6 fw-medium" for="respaldoConv"> Este convenio esta respaldado con documentación</label>
                            <input class="form-check-input input-form" type="checkbox" name="respaldoConv" id="respaldoConv" />
                        </div>
                    </div>
                </section>
            </form>
        HTML;

        $modalFooterCont = <<<HTML
            <button type="button" class="btn btn-secondary-custom" data-bs-dismiss="modal" id="resetAddConvForm">
                Cancelar
            </button>
            <input type="submit" class="btn btn-info" value="Agregar" id="btnCreateConv">
        HTML;

        include("../assets/components/templates/modalTemplates.php");  ?>

        <script>
            $('#tipoEmpresaConv').change(function () {
                $.generateSelectEmpr('#empresaConv', $(this).val()); 
                $('#empresaConv').prop('disabled', false) 
            });

            $('#situacionActConv').change(function(){
                $('#fechaFinConv').prop('disabled', ($(this).prop('selectedIndex') == 2) ? false : true );
                if($(this).prop('selectedIndex') != 2){$('#fechaFinConv').val('')};
            });

            // ==== Empieza el proceso para registrar un convenio
            $("#btnCreateConv").click(function() {
                isValid = $.validateConvForm(); // Llama la función para validar el formulario
                $(this).prop('disabled', true); // Deshabilita el botón para evitar envios innecesarios

                if(isValid){ // Si el formulario es válido entonces...
                    $.post("../process/index.php", {
                        process: "mapeoAsocios", // Manda el proceso en cuestión
                        group: "gestionConvenios", // Manda el grupo donde se va a realizar la operación
                        action: "addConv",    // Manda la acción que se desea realizar
                        
                        // Asignando datos de los valores del formulario
                        empresaConv: $("#empresaConv").val(), 
                        sedeConv: $("#sedeConv").val(), 
                        nombContactoConv: $("#nombContactoConv").val(), 
                        numContactoConv: $("#numContactoConv").val(), 
                        emailConv : $("#emailConv").val(),
                        situacionActConv : $("#situacionActConv").val(),
                        fechaInicioConv : $("#fechaInicioConv").val(),
                        fechaFinConv : $("#fechaFinConv").val(),
                        tipoConv : $("#tipoConv").val(),
                        descConv : $("#descConv").val(),
                        respaldoConv : $("#respaldoConv").is(":checked"),
                    },
                        function(response){ 
                        console.log(response);
                            if(response){ // Si el registro es exitoso entonces...
                                $.toast({
                                    heading: 'Finalizado',
                                    text: "Convenio registrado con exito",
                                    showHideTransition: 'slide',
                                    icon: 'success',
                                    loader: false,
                                    hideAfter: 3000, 
                                    position: 'top-right',
                                    stack: false
                                });

                                if($("#respaldoConv").is(":checked")){
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

                                $('#globalSearchField').val('');
                                $.resetAddConvForm();
                                $('#globalSearchField').val();
                                $("#btnCreateConv").prop('disabled', false);
                                $('#modalAddConv').modal('hide');

                                // Recarga el contenido de la tabla
                                $.refreshTableContent_GC(convenioStatus);
                            }
                    });
                }else{ // En caso de que el formulario no es válido entonces...
                    $(this).prop('disabled', false);
                    $.toast({
                        heading: 'ERROR',
                        text: 'Error al validar el registro del convenio. Inténtalo de nuevo.',
                        showHideTransition: 'slide',
                        icon: 'error',
                        loader: false,
                        hideAfter: 3000, 
                        position: 'top-right',
                        stack: false
                    });
                }
            });

            $('#resetAddConvForm').click(function(){ $.resetAddConvForm(); }) // Ejecuta la función para reiniciar el formulario

            $.extend({
                resetAddConvForm: function(){ // Función para reiniciar el formulario (Con un retraso de 500ms)
                    setTimeout(function(){
                        $('#addConvForm')[0].reset();
                        $('#addConvForm').validate().destroy();
                        $("#respaldoConv").prop('checked', false);
                        $('#fechaFinConv').prop('disabled',true);
                    }, 500)
                },

                validateConvForm: function(){ // Función para validar el formulario
                    $('#addConvForm').validate({
                        errorClass: 'bi bi-exclamation-diamond',
                        errorElement: 'span',
                        rules:{
                            tipoEmpresaConv: { required: true },
                            empresaConv:{ required: true },
                            sedeConv: { required: true },
                            nombContactoConv: { required: true },
                            numContactoConv: {  required: true, digits: true, 
                                                range: [ 10000000, 99999999 ] },
                            emailConv: { required: true, email: true },
                            situacionActConv: { required:true },
                            fechaInicioConv: { required: true, max: new Date().toISOString().split('T')[0], min: new Date('2001-01-01').toISOString().split('T')[0] },
                            fechaFinConv: { required: true, greaterThan: "#fechaInicioConv", max: new Date().toISOString().split('T')[0], min: new Date('2001-01-01').toISOString().split('T')[0]},
                            tipoConv: { required: true },
                            descConv: { required: true }
                        },
                        messages:{
                            numContactoConv: { digits: "Solo se aceptan digitos.", range: "Ingresa un número de teléfono válido.", number: "Dato no válido." },
                            emailConv: { email: "Dirección de correo no válida." },
                            fechaInicioConv: {  max: "La fecha de inicio no puede exeder a la fecha de hoy.", min: "La fecha no puede ser anterior a 2001."},
                            fechaFinConv: { max: "La fecha de finalización no puede exeder a la fecha de hoy.", min: "La fecha no puede ser anterior a 2001." },
                        }
                    })
                    return $('#addConvForm').valid()
                }
            });
        </script> 
        
        <?php
    }
?>