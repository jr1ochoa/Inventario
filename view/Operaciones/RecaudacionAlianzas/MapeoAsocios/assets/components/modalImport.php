<?php 
    $modalId = "modalImportConv";

    $modalHeaderCont = <<<HTML
        <img src="view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/Icons/upload.png" width="50px" height="50px">
        <section class="ms-3 w-100 align-middle">
            <h5 class="fs-5 fw-bold mb-1">Importar un archivo</h5>
            <p class="text-muted mb-0">Carga un archivo para respaldar tu convenio digitalmente</p>
        </section>
    HTML;

    $modalBodyCont = <<<HTML
        <div class="alert alert-warning d-none" role="alert" id="editFileMsgConv">
            <div class="d-flex gap-3 align-items-center">
                <span><i class="bi bi-exclamation-triangle-fill fs-4"></i></span>
                <div class="d-flex flex-column">
                    <p class="mb-0">El convenio actual ya está respaldado digitalmente. Al registrar un nuevo documento, se actualizará el anterior.</p>
                </div>
            </div>
        </div>

        <button class="alert alert-danger w-100" role="button" data-bs-dismiss="modal" id="deleteFileMsgConv" value="#">
            <div class="d-flex gap-3 align-items-center">
                <span><i class="bi bi-trash-fill fs-4"></i></span>
                <div>
                    <p class="mb-0">¿Desea eliminar el archivo de respaldo del convenio actual?</p>
                </div>
            </div>
        </button>


        <form id="importConvForm" class="d-flex justify-content-center align-items-center" enctype="multipart/form-data" method="post">
            <!-- Checkbox oculto para manejar el comportamiento del proceso a realizar: ¿Es primera vez que se sube el documento? -->
            <input type="checkbox" name="firstFileConv" id="firstFileConv" disabled class="visually-hidden">

            <label for="addFileConv" id="div-file" class="px-2 py-5 m-1 d-flex justify-content-center rounded-2 border-3 
                    align-items-center rounded-lg w-100">
                <input type="file" name="addFileConv" id="addFileConv" class="input-file">
                <div class="d-flex justify-content-center flex-column align-items-center w-100">
                    <i class="bi bi-file-earmark-plus fs-2" id="icon-file"></i>
                    <h5 id="original-text" class="fs-6 fw-bold mb-1">Sube tu archivo aquí</h5>
                    <h5 id="file-upload-filename" class="text-center d-none overflow-hidden fw-medium text-truncate py-1 w-75">
                        <!-- Texto del archivo subido -->
                    </h5>
                </div>
            </label>
        </form>    
        
        <div id="errorPlacement" class="text-center"></div>
    HTML;

    $modalFooterCont = <<<HTML
        <button type="button" id="btnResetImportConv" class="btn btn-secondary" data-bs-dismiss="modal">
            Cancelar
        </button>
        <button type="button" class="btn btn-info" id="btnImportFileConv" value="" disabled>Importar</button>
    HTML;

    include("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/components/templates/modalTemplates.php");
?>
<script>
    $('#addFileConv').on('change', function(){ // Función agregar nombre del archivo
        filesCheck = $(this)[0].files;
        if(filesCheck.length > 0){
            $('#original-text').addClass('d-none');
            $('#icon-file').addClass('bi-file-earmark-check');
            $('#icon-file').removeClass('bi-file-earmark-plus');

            $('#file-upload-filename').removeClass('d-none');
            $('#file-upload-filename').text($(this)[0].files[0].name);
            $('#btnImportFileConv').prop('disabled', false);
        }else{ $.resetFileForm(); }
    });

    $('#btnResetImportConv').on('click', function(){ 
        if($('#addFileConv').val() != ""){
            $.resetFileForm();
        }
        $('#importConvForm')[0].reset();
        $('#importConvForm').validate().destroy();

        $("#errorPlacement").empty();
    })

    $('#btnImportFileConv').on('click', function(){
        isFileValid = $.validateFileForm();
        // $(this).prop('disabled', true);

        if(isFileValid){
            formData = new FormData($('#importConvForm')[0]);

            formData.append('process', 'mapeoAsocios');
            formData.append('group', 'gestionConvenios');
            formData.append('action', 'saveFileConv');
            formData.append('selectedId', $('#btnImportFileConv').val());
            formData.append('firstFileConv', $('#firstFileConv').is(':checked'));

            $.ajax({
                url: 'view/Operaciones/RecaudacionAlianzas/MapeoAsocios/process/index.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false, 
                cache: false,
                success: function(response) {

                    $.toast({
                        heading: 'Finalizado',
                        text: "Evidencia digital registrada con éxito",
                        showHideTransition: 'slide',
                        icon: 'success',
                        loader: false,
                        hideAfter: 5000, 
                        position: 'top-right',
                        stack: false
                    });

                    setTimeout(() => {
                        $.resetFileForm();
                    }, 200);
                    $('#importConvForm')[0].reset();
                    $('#importConvForm').validate().destroy();

                    $("#errorPlacement").empty();

                    $(this).prop('disabled', false);
                    
                    $.closeFormModal($("#modalImportConv"));
                }
            });
        }

    })

    $.extend({
        resetFileForm: function(){
            $('#original-text').removeClass('d-none');
            $('#icon-file').removeClass('bi-file-earmark-check');
            $('#icon-file').addClass('bi-file-earmark-plus');

            $('#file-upload-filename').addClass('d-none');
            $('#file-upload-filename').text('');

            $('#addFileConv').val('');

            $('#btnImportFileConv').prop('disabled', true);
        },

        validateFileForm: function(){
            $('#importConvForm').validate({
                errorClass: 'bi bi-exclamation-diamond',
                errorElement: 'span',
                rules:{
                    addFileConv:{ 
                        required: true,
                        extension: "pdf|jpg|jpeg|png|doc|docx|xlsx"
                    }
                },
                messages:{
                    addFileConv: { extension: "Tipo de archivo no válido." }
                },
                errorPlacement: function (error, element) {
                    $("#errorPlacement").empty();
                    error.appendTo("#errorPlacement")
                },
                success: function(label) {
                    $("#errorPlacement").empty();
                }
            })
            return $('#importConvForm').valid();
        }
    })
</script>