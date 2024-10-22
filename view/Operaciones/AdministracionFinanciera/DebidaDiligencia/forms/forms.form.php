<?php include("../config/net.php");

    $action = $_REQUEST['action'];
    $idf = $_REQUEST['id'];
    $formType = $_REQUEST['formType'];

    if ($action == 'validate') {

        include("../../../../../config/net.php");

        $query = "SELECT e.id, CONCAT(e.name1, ' ', e.lastname1) as 'Empleado', p.position FROM `employee` as e 
                    INNER JOIN workarea_positions_assignment as wpa ON wpa.idemployee = e.id
                    INNER JOIN workarea_positions as p ON p.id = wpa.idposition
                    WHERE e.id = ". $_SESSION["iu"];
        $validate = $net_rrhh->prepare($query);
        $validate->execute();
        $dataU = $validate->fetch();
?>
<style>
    .input-group .form-control {
        flex: 1 1 auto; 
    }

    #signatureCanvas {
        width: 100%;
        height: auto; 
        border: 1px solid #000; 
        touch-action: none;
    }
</style>

<div class="p-3">

    <p class="text-center fs-5">Datos de la persona que valida la información</p>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Cargo</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?=$dataU[1]?></td>
                <td><?=$dataU[2]?></td>
                <td><?=date("d/m/y")?></td>
            </tr>
        </tbody>
    </table>

    <hr class="mt-4" />

    <p class="text-center text-uppercase fs-5 mt-4">Firma</p>

    <div class="form-group d-flex flex-column align-items-center">
        <div style="position: relative; width: 100%; height: 250px; max-width: 550px;">
            <canvas id="signatureCanvas"></canvas>
        </div>
        <input type="file" name="signatureImage" id="signatureImage" style="display: none;">
    </div>
    
    <div class="text-center my-4">
        <div class="btn-group" role="group" aria-label="Basic example">
            <button id="btnValidate" type="button" class="btn btn-dark px-5">Validar</button>
            <button type="button" id="clearCanvas" class="btn btn-danger px-4">Limpiar Firma</button>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $("#btnValidate").click(function() {
            event.preventDefault(); // Prevenir el envío del formulario por defecto

            if (isCanvasBlank(canvas)) {
                $.toast({
                    heading: "Firma no ingresada",
                    text: "Es necesario que ingreses tu firma para poder enviar el formulario",
                    showHideTransition: 'slide',
                    icon: "error",
                    hideAfter: 6000, 
                    position: 'bottom-right',
                });
                return; // Detener la ejecución si el canvas está vacío
            }

            canvas.toBlob(function(blob) {
                var file = new File([blob], '<?=$_SESSION["iu"]?>_firma.png', { type: 'image/png' });

                var formData = new FormData();
                formData.append('signatureImage', file); // Agregar la firma como archivo

                formData.append('process', 'debida-diligencia');
                formData.append('action', 'validate');
                formData.append('idf', '<?=$idf?>');
                formData.append('formType', '<?=$formType?>');
                formData.append('iu', '<?=$_SESSION["iu"]?>');

                $.ajax({
                    url: "/process/index.php", 
                    type: "POST",
                    data: formData,
                    processData: false, // Evitar que jQuery procese los datos
                    contentType: false, // Evitar que jQuery configure el tipo de contenido
                    success: function(response) {
                        let header = "";
                        let text = "";
                        let icon = "";
                        console.log(response);

                        if (response == "ok") {
                            header = "¡Validación realizada correctamente!";
                            text = "La validación ha sido realizada correctamente";
                            icon = "success";
                        } else {
                            header = "¡Error!";
                            text = "Error al intentar realizar la validación";
                            icon = "error";
                        }

                        $.toast({
                            heading: header,
                            text: text,
                            showHideTransition: 'slide',
                            icon: icon,
                            hideAfter: 6000, 
                            position: 'bottom-right',
                        });

                        $("#btnCloseForms").trigger("click");
                        loadForms();
                    }
                });
            }, 'image/png');
        });

        var canvas = document.getElementById('signatureCanvas');
        var ctx = canvas.getContext('2d');
        var drawing = false;

        // Ajuste de tamaño dinámico del canvas
        function resizeCanvas() {
            var dataURL = canvas.toDataURL(); // Guardar contenido actual del canvas
            canvas.width = canvas.parentElement.offsetWidth;
            canvas.height = canvas.parentElement.offsetHeight;
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            
            // Restaurar contenido después de redimensionar
            var img = new Image();
            img.src = dataURL;
            img.onload = function() {
                ctx.drawImage(img, 0, 0);
            };
        }
        resizeCanvas();
        // Escuchar el evento cuando el modal se muestre
        $('#signatureModal').on('shown.bs.modal', function () {
            resizeCanvas();
        });
        //$(window).resize(resizeCanvas);

        // Función para iniciar y detener el dibujo
        function startDrawing(e) {
            e.preventDefault();
            drawing = true;
            var pos = getPosition(e);
            ctx.beginPath();
            ctx.moveTo(pos.x, pos.y);
        }

        function draw(e) {
            if (drawing) {
                e.preventDefault();
                var pos = getPosition(e);
                ctx.lineTo(pos.x, pos.y);
                ctx.stroke();
            }
        }

        function stopDrawing(e) {
            e.preventDefault();
            drawing = false;
            $('#signatureData').val(canvas.toDataURL()); // Guardar la firma en el input oculto
        }

        // Eventos de ratón y táctiles para dibujar en el canvas
        $('#signatureCanvas').on('mousedown', startDrawing);
        $('#signatureCanvas').on('mousemove', draw);
        $('#signatureCanvas').on('mouseup', stopDrawing);
        $('#signatureCanvas').on('mouseleave', stopDrawing);

        // Eventos táctiles
        $('#signatureCanvas').on('touchstart', startDrawing);
        $('#signatureCanvas').on('touchmove', draw);
        $('#signatureCanvas').on('touchend', stopDrawing);

        // Función para obtener la posición del cursor o toque en el canvas
        function getPosition(e) {
            var rect = canvas.getBoundingClientRect();
            var x = (e.clientX || e.touches[0].clientX) - rect.left;
            var y = (e.clientY || e.touches[0].clientY) - rect.top;
            return { x: x, y: y };
        }

        // Limpiar el canvas
        $('#clearCanvas').click(function() {
            ctx.clearRect(0, 0, canvas.width, canvas.height); // Limpiar el canvas
            ctx.beginPath(); // Reiniciar el camino de dibujo
            $('#signatureData').val('');
        });

        // Función para verificar si el canvas está en blanco
        function isCanvasBlank(canvas) {
            const blank = document.createElement('canvas'); // Crear un canvas en blanco temporal
            blank.width = canvas.width;
            blank.height = canvas.height;
            return canvas.toDataURL() === blank.toDataURL(); // Comparar los datos de ambos canvas
        }

    });
</script>

<?php }elseif ($action == 'refuse') { ?>

<div class="p-3">
    <div class="mb-3">
        <label for="txtReason" class="form-label">Ingrese la razón por la cuál no puede validar la información:</label>
        <textarea class="form-control validations" id="txtReason" rows="3"></textarea>
    </div>

    <button id="btnRefuse" type="button" class="btn btn-dark d-block mx-auto px-5">
        Rechazar
    </button>
</div>

<script>
    $(document).ready(function() {
        $("#btnRefuse").click(function() {
            emptyValues = false;

            $(".validations").each(function() {
                if ($(this).val() === '') {
                    emptyValues = true;
                    return false; 
                }
            });

            if (!emptyValues) {
                $.post("/process/index.php", {
                    process: "debida-diligencia",
                    action: "refuseForm",

                    idf: "<?=$idf?>",
                    formType: "<?=$formType?>",
                    reason: $("#txtReason").val(),
                },
                function(response){
                    let header = "";
                    let text = "";
                    let icon = "";
                    console.log(response);

                    if (response == "ok") {
                        header = "¡Formulario rechazado correctamente!";
                        text = "El formulario ha sido rechazado correctamente";
                        icon = "success";


                    }else{
                        header = "¡Error!";
                        text = "Error al intentar rechazado el formulario";
                        icon = "error";
                    }

                    $.toast({
                        heading: header,
                        text: text,
                        showHideTransition: 'slide',
                        icon: icon,
                        hideAfter: 6000, 
                        position: 'bottom-right',
                    });

                    $("#btnCloseForms").trigger("click");
                    loadForms();
                });
                
            }else{
                $.toast({
                    heading: "Campos vacios",
                    text: "Debe llenar todos los campos para guardar el dato",
                    showHideTransition: 'slide',
                    icon: "warning",
                    hideAfter: 6000, 
                    position: 'bottom-right',
                });
            }
        });
    });
</script>

<?php }elseif ($action == 'resend') { ?>

<div class="p-3">
    <p class="text-center fs-5">¿Estás seguro que deseas solicitar una actualización de datos?</p>
    <p class="text-center text-muted">Al realizar está acción se generará una nueva versión del formulario que permitirá a la persona actualizar los campos solicitados</p>

    <button type="button" id="btnResend" class="btn btn-dark d-block mx-auto mt-4">
        Solicitar actualización
    </button>
</div>

<script>
    $(document).ready(function() {

        $("#btnResend").click(function() {
            $.post("/process/index.php", {
                process: "debida-diligencia",
                action: "resendForm",

                idf: "<?=$idf?>",
                formType: "<?=$formType?>",
            },
            function(response){
                let header = "";
                let text = "";
                let icon = "";
                console.log(response);

                if (response == "okok") {
                    header = "¡Actualización solicitada correctamente!";
                    text = "El actualización ha sido solicitada correctamente";
                    icon = "success";


                }else{
                    header = "¡Error!";
                    text = "Error al intentar solicitar la actualización";
                    icon = "error";
                }

                $.toast({
                    heading: header,
                    text: text,
                    showHideTransition: 'slide',
                    icon: icon,
                    hideAfter: 6000, 
                    position: 'bottom-right',
                });

                $("#btnCloseForms").trigger("click");
                loadForms();
            });
        });
    });
</script>

<?php } ?>