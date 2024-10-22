<?php include("../../config/net.php"); 

    $idb = $_REQUEST["idb"];
?>

<div class="p-3">
    <div class="mb-3">
        <label for="txtNameSpace" class="form-label">Nombre:</label>
        <input type="text" class="form-control" id="txtNameSpace" name="txtNameSpace">
    </div>

    <button type="button" class="btn btn-success d-block mx-auto" id="btnSaveCoordinationSpace">
        Guardar
    </button>
</div>

<script>
    $(document).ready(function(){
        $("#btnSaveCoordinationSpace").click(function(){
            $.post("/process/index.php", {
                process: "spaces",
                action: "addSpace",
                    
                name: $("#txtNameSpace").val(),
                idb: "<?=$idb?>"
            },
            function(response){
                console.log(response);
                
                var header = "";
                var text = "";
                var icon = "";
                var success = false;

                if (response == "00000") {
                    header = "¡Guardado!";
                    text = "La Información se ha guardado correctamente";
                    icon = "success";
                    success = true;
                }else{
                    header = "¡Error!";
                    text = "Ha ocurrido un error al guardar el registro. Intentelo nuevamente.";
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

                $("#loadCoordinationTable").load("/view/spaces/spaces.coordination.table.php",{
                    idb: "<?=$idb?>"
                });

                if (success) {
                    $("#btnCloseCoordination").trigger("click");
                }
            });
        });
    });
</script>