<?php 

$ids = $_REQUEST["ids"]; 
if (!isset($_REQUEST["action"]) && $_REQUEST["action"] != "delete") {
?>

<div class="p-3">
    <div class="mb-3">
        <label for="imgFile" class="form-label">Imagen:</label>
        <input class="form-control" type="file" id="imgFile" name="imgFile" accept="image/*">
    </div>
    <div class="mb-3">
        <label for="txtDetail" class="form-label">Detalle:</label>
        <input type="text" class="form-control" id="txtDetail" name="txtDetail">
    </div>

    <button id="btnSaveIMG" type="button" class="btn btn-success d-block mx-auto" id="btnSaveBinnacle">
        Guardar
    </button>
</div>

<script>
    $(document).ready(function(){
        $("#btnSaveIMG").click(function(){

            $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Subiendo...');
            $("#btnSaveIMG").prop('disabled', true);

            var form_data = new FormData();
            var file_data = $("#imgFile").prop("files")[0];

            form_data.append("img", file_data);
            form_data.append("process", "spaces");
            form_data.append("action", "addPicture");
            form_data.append("ids", "<?=$ids?>");
            form_data.append("detail", $("#txtDetail").val());

            console.log(form_data);
            

            $.ajax({
                cache: false,
                contentType: false,
                data: form_data,
                enctype: 'multipart/form-data',
                processData: false,
                method: "POST",
                url: "/process/", 
                success: function (response) {

                    console.log(response);
                    var text = "";
                    var header = "";
                    var icon = "";
                    if (response == "00000") {
                        header = "¡Guardado!";
                        text = "La imagen se ha guardado correctamente";
                        icon = "success";
                        success = true;
                    }else{
                        header = "¡Error!";
                        text = "Ha ocurrido un error al guardar la imagen. Intentelo nuevamente.";
                        icon = "error";
                    } 

                    alert(text);
                    /*
                    $.toast({
                        heading: header,
                        text: message,
                        showHideTransition: 'slide',
                        icon: icon,
                        hideAfter: 6000, 
                        position: 'bottom-right'
                    });*/

                    $("#loadPictures").load("/view/spaces/spaces.pictures.php",{
                        ids: "<?=$ids?>"
                    });
                    $("#btnSaveIMG").empty();
                    $("#btnSaveIMG").html("Guardar");
                    $("#btnSaveIMG").prop('disabled', false);
                    $("#btnCloseEvidence").trigger("click");
                }
            });
        });
    });
</script>

<?php }else{ 
    
    $id = $_REQUEST["id"];
?>

    <div class="p-3">
        <p class="fs-5 text-center">Eliminar Imagen</p>
        <p class="text-center">¿Estás seguro que deseas eliminar la imagen?</p>

        <button type="button" class="btn btn-danger d-block mx-auto" id="confirmDelete">
            Eliminar
        </button>
    </div>

    <script>
        $(document).ready(function(){
            $("#confirmDelete").click(function(){

                $.post("/process/index.php", {
                    process: "spaces",
                    action: "deletePicture",
                        
                    id: "<?=$id?>",
                },
                function(response){
                    console.log(response);
                    
                    var header = "";
                    var text = "";
                    var icon = "";
                    var success = false;

                    if (response == "00000") {
                        header = "¡Removido!";
                        text = "La imagen se ha removido correctamente";
                        icon = "success";
                        success = true;
                    }else{
                        header = "¡Error!";
                        text = "Ha ocurrido un error al elimnar la imagen. Intentelo nuevamente.";
                        icon = "error";
                    } 

                    alert(text);
                    /*
                    $.toast({
                        heading: header,
                        text: text,
                        showHideTransition: 'slide',
                        icon: icon,
                        hideAfter: 3000, 
                        position: 'bottom-right',
                    });*/
                
                    $("#loadPictures").load("/view/spaces/spaces.pictures.php",{
                        ids: "<?=$ids?>"
                    });
                        
                    $("#btnCloseEvidence").trigger("click");
                        
                }); 
            });
        });
    </script>

<?php }?>