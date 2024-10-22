<?php 
    function deleteTipoEmpresa(){ // TE = Tipo Empresa
        $modalId = 'modalDeleteTE';

        $modalHeaderCont = <<<HTML
            <img src="view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/Icons/delete.png" width="50px" height="50px">
            <section class="ms-3 w-100">
                <h5 class="fs-5 fw-bold mb-1">Eliminar tipo de empresa</h5>
                <p class="text-muted mb-0">¿Estas seguro de eliminar este tipo de empresa? Esta acción no se puede deshacer</p>
            </section>
        HTML;

        $modalFooterCont = <<<HTML
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                Cancelar
            </button>
            <button type="button" class="btn btn-danger" id="btnDeleteTE" value="">Eliminar</button>
        HTML;

        include('view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/components/templates/modalTemplates.php'); ?>
        
        <script>
            $('#btnDeleteTE').click(function(){ // Deshabilitar la empresa
                $.post("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/process/index.php", {
                    process: "mapeoAsocios",
                    group: "gestionTipoEmpresa",
                    action: "deleteTE",    
                
                    selectedId: $('#btnDeleteTE').val()

                },
                    function(response){
                        if(response){
                            $.toast({
                                    heading: 'Finalizado',
                                    text: "Tipo de empresa eliminada con éxito",
                                    showHideTransition: 'slide',
                                    icon: 'success',
                                    hideAfter: 5000, 
                                    position: 'bottom-center'
                                });

                                $.closeFormModal($("#modalDeleteTE"));

                                $('#globalSearchField').val('');
                                // Recarga el contenido de la tabla
                                $.refreshTableContent_GE(1);
                        }else{
                            alert(response)
                        }
                    }
                );
            });
        </script>

        <?php
    }

    function deleteEmpresa(){ // Empr = Empresa
        $modalId = 'modalDeleteEmpr';

        $modalHeaderCont = <<<HTML
            <img src="view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/Icons/delete.png" width="50px" height="50px">
            <section class="ms-3 w-100">
                <h5 class="fs-5 fw-bold mb-1">Eliminar empresa</h5>
                <p class="text-muted mb-0">¿Estas seguro de eliminar esta empresa? Esta acción no se puede deshacer</p>
            </section>
        HTML;

        $modalFooterCont = <<<HTML
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                Cancelar
            </button>
            <button type="button" class="btn btn-danger" id="btnDeleteEmpr" value="">Eliminar</button>
        HTML;

        include('view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/components/templates/modalTemplates.php'); ?>

        <script>
            $('#btnDeleteEmpr').click(function(){ // Deshabilitar la empresa
                $.post("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/process/index.php", {
                    process: "mapeoAsocios",
                    group: "gestionEmpresas",
                    action: "deleteEmpr",    
                
                    selectedId: $('#btnDeleteEmpr').val()

                },
                    function(response){
                        if(response){
                            $.toast({
                                    heading: 'Finalizado',
                                    text: "Empresa eliminada con éxito",
                                    showHideTransition: 'slide',
                                    icon: 'success',
                                    hideAfter: 5000, 
                                    position: 'bottom-center'
                                });

                                $.closeFormModal($("#modalDeleteEmpr"));

                                $('#globalSearchField').val('');
                                // Recarga el contenido de la tabla
                                $.refreshTableContent_GE(0);
                        }else{
                            alert(response)
                        }
                    }
                );
            });
        </script>

        <?php
    }

    function deleteConvenio(){ // Conv = Convenio
        $modalId = 'modalDeleteConv';

        $modalHeaderCont = <<<HTML
            <img src="view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/Icons/delete.png" width="50px" height="50px">
            <section class="ms-3 w-100">
                <h5 class="fs-5 fw-bold mb-1">Eliminar convenio</h5>
                <p class="text-muted mb-0">¿Estas seguro de eliminar este convenio? Esta acción no se puede deshacer</p>
            </section>
        HTML;

        $modalFooterCont = <<<HTML
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                Cancelar
            </button>
            <button type="button" class="btn btn-danger" id="btnDeleteConv" value="">Eliminar</button>
        HTML;

        include('view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/components/templates/modalTemplates.php'); ?>
        
        <script>
            $('#btnDeleteConv').click(function(){ // Deshabilitar la empresa
                $.post("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/process/index.php", {
                    process: "mapeoAsocios", 
                    group: "gestionConvenios", 
                    action: "deleteConv",    
                    
                    selectedId: $(this).val()

                },
                    function(response){
                        if(response){
                            $.toast({
                                    heading: 'Finalizado',
                                    text: "Convenio eliminado con éxito",
                                    showHideTransition: 'slide',
                                    icon: 'success',
                                    hideAfter: 5000, 
                                    position: 'bottom-center'
                                });

                                $.closeFormModal($("#modalDeleteConv"));

                                $('#globalSearchField').val('');
                                // Recarga el contenido de la tabla
                                if ($('#btnConvenio').hasClass('btnActive')){ convenioStatus = 1; }else{ convenioStatus = 0; }
                                $.refreshTableContent_GC(convenioStatus);
                        }else{
                            alert(response)
                        }
                    }
                );
            });
        </script>

        <?php
    }

    function deleteEvidencia(){ // ED = Evidencia Digital
        $modalId = "modalDeleteED";

        $modalHeaderCont = <<<HTML
            <img src="view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/Icons/delete.png" width="50px" height="50px">
            <section class="ms-3 w-100 mb-0">
                <h5 class="fs-5 fw-bold mb-1">Eliminar archivo de evidencia</h5>
                <p class="text-muted mb-0">¿Estas seguro de eliminar el archivo de evidencia que respalda este convenio? Esta acción no se puede deshacer</p>
            </section>
        HTML;

        $modalFooterCont = <<<HTML
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cancelDeleteImport">
                Cancelar
            </button>
            <button type="button" class="btn btn-danger" id="btnDeleteED" value="">Eliminar</button>
        HTML;

        include('view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/components/templates/modalTemplates.php'); ?>
        
        <script>
            $("#cancelDeleteImport").click(function () { $('.modal-backdrop').remove(); });

            $('#btnDeleteED').click(function(){ // Deshabilitar la empresa
                $.post("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/process/index.php", {
                    process: "mapeoAsocios", 
                    group: "gestionConvenios", 
                    action: "deleteFileConv",    
                    
                    selectedId: $(this).val()

                },
                    function(response){
                        if(response){
                            $.toast({
                                    heading: 'Finalizado',
                                    text: "Archivo eliminado con éxito",
                                    showHideTransition: 'slide',
                                    icon: 'success',
                                    hideAfter: 5000, 
                                    position: 'bottom-center'
                                });

                                $.closeFormModal($("#modalDeleteED"));

                                $('#globalSearchField').val('');
                                // Recarga el contenido de la tabla
                                if ($('#btnConvenio').hasClass('btnActive')){ convenioStatus = 1; }else{ convenioStatus = 0; }
                                $.refreshTableContent_GC(convenioStatus);
                        }else{
                            alert(response)
                        }
                    }
                );
            });
        </script> <?php
    }
?>