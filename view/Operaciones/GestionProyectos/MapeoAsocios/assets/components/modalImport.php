<div  class="modal fade" id="modalImport" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">

    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content w-100">
            <div class="modal-header pb-0 border-0  d-flex justify-content-between align-items-center ">
                <img src="../assets/Icons/upload.png" width="50px" height="50px">
                <section class="ms-3 w-100 align-middle">
                    <h5>Importar un archivo</h5>
                    <p class="text-muted mb-0">Carga un archivo para respaldar tu convenio</p>
                </section>
            </div>

            <!-- Espacio subir archivo -->
            <div class="modal-body pb-1">
                <form id="fileForm" class="d-flex justify-content-center align-items-center" enctype="multipart/form-data" method="post">
                    <label for="addFile" id="div-file" class="px-2 py-5 m-1 d-flex justify-content-center rounded-2 border-3 
                            align-items-center rounded-lg w-100">
                        <input type="file" name="addFile" id="addFile" class="input-file">
                        <div class="d-flex justify-content-center flex-column align-items-center w-100">
                            <i class="bi bi-file-earmark-plus fs-2" id="icon-file"></i>
                            <h5 id="original-text" class="fw-medium">Sube tu archivo aquí</h5>
                            <h5 id="file-upload-filename" class="text-center d-none overflow-hidden fw-medium text-truncate py-1">
                                <!-- Texto del archivo subido -->
                            </h5>
                        </div>
                    </label>
                </form>    

                <div id="errorPlacement" class="text-center"></div>  
            </div>

            <div class="modal-footer p-1 border-0 ">
                <button type="button" id="reset-btn" class="btn btn-secondary" data-bs-dismiss="modal">
                    Cancelar
                </button>
                <button type="button" class="btn btn-info" id="importBtn" value="" disabled>Importar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#addFile').on('change', function(){ // Función agregar nombre del archivo
        filesCheck = $(this)[0].files;
        if(filesCheck.length > 0){
            $('#original-text').addClass('d-none');
            $('#icon-file').addClass('bi-file-earmark-check');
            $('#icon-file').removeClass('bi-file-earmark-plus');

            $('#file-upload-filename').removeClass('d-none');
            $('#file-upload-filename').text($(this)[0].files[0].name);
            $('#importBtn').prop('disabled', false);
        }else{ $.resetFileForm(); }
    });

    $('#reset-btn').on('click', function(){ 
        if($('#addFile').val() != ""){
            $.resetFileForm();
        }
        $('#fileForm')[0].reset();
        $('#fileForm').validate().destroy();

        $("#errorPlacement").empty();
    })

    $('#importBtn').on('click', function(){
        // isFileValid = $.validateFileForm();
        // $(this).prop('disabled', true);

        if(true){
            formData = new FormData($('#fileForm')[0]);

            formData.append('process', 'mapeoAsocios');
            formData.append('action', 'saveFile');
            formData.append('empresaId', $(this).val());

            $.ajax({
                url: 'process/index.php',
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

                    $.resetFileForm();
                    $('#fileForm')[0].reset();
                    $('#fileForm').validate().destroy();

                    $("#errorPlacement").empty();

                    $(this).prop('disabled', false);
                    $('#modalImport').modal('hide');
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

            $('#addFile').val('');

            $('#importBtn').prop('disabled', true);
        },

        validateFileForm: function(){
            $('#fileForm').validate({
                errorClass: 'bi bi-exclamation-diamond',
                errorElement: 'span',
                rules:{
                    addFile:{ 
                        required: true,
                        // extension: "jpg|jpeg|pdf|doc|docx|png|xlsx",
                        // accept: 'image/jpg, image/jpeg, image/png, document/pdf, document/doc, document/docx, document/xlsx'
                    }
                },
                messages:{
                    addFile:{
                        required: "El archivo es obligatorio.",
                        extension: "Tipo de archivo no válido."
                    }
                },
                errorPlacement: function (error, element) {
                    $("#errorPlacement").empty();
                    error.appendTo("#errorPlacement")
                },
                success: function(label) {
                    $("#errorPlacement").empty();
                }
            })
            if($('#fileForm').valid()){ return true }else{ return false }
        }
    })
</script>