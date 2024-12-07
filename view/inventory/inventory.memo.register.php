<?php 
session_start();

// Aquí se verifica si hay valores almacenados en $_SESSION['post_data'] (en caso de error)
$user_value = isset($_SESSION['post_data']['user']) ? $_SESSION['post_data']['user'] : '';
$text_input_value = isset($_SESSION['post_data']['textInput']) ? $_SESSION['post_data']['textInput'] : '';
$description_value = isset($_SESSION['post_data']['descriptionInput']) ? $_SESSION['post_data']['descriptionInput'] : '';
$quantity_value = isset($_SESSION['post_data']['quantityInput']) ? $_SESSION['post_data']['quantityInput'] : '';
$marca_values = isset($_SESSION['post_data']['marca']) ? $_SESSION['post_data']['marca'] : [];
$tipo_values = isset($_SESSION['post_data']['tipo']) ? $_SESSION['post_data']['tipo'] : [];
$modelo_values = isset($_SESSION['post_data']['modelo']) ? $_SESSION['post_data']['modelo'] : [];
$serie_values = isset($_SESSION['post_data']['serie']) ? $_SESSION['post_data']['serie'] : [];
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Dinámico y Responsive</title>
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Bootstrap CDN (Opcional para diseño) -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@700&family=Poppins:wght@400&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Toast -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>

    <!-- Estilos personalizados -->
    <style>
        .input-group .form-control {
            flex: 1 1 auto; /* Asegura que los inputs sean flexibles en ancho */
        }

        #signatureCanvas {
            width: 100%; /* El canvas tomará todo el ancho del contenedor */
            height: auto; /* Mantendrá la relación de aspecto */
            border: 1px solid #000; /* Borde del canvas */
            touch-action: none; /* Desactivar la acción táctil predeterminada para evitar desplazamientos */
        }

        #charCount {
            font-size: 0.9em;
            color: gray;
            text-align: right;
        }

        #charCount.warning {
            color: orange; /* Color naranja cuando llega a 150 caracteres */
        }

        #charCount.exceeded {
            color: red; /* Color rojo cuando llega a 200 caracteres */
        }
        

                /* Aplicar la fuente Barlow para los títulos */
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Barlow', sans-serif;
            font-weight: 700; /* Estilo de negrita */
        }

        /* Aplicar la fuente Poppins para el cuerpo del texto */
        body {
            font-family: 'Poppins', sans-serif;
            font-weight: 400; /* Estilo regular */
            color: #1F376F;
        }

        p, a, span, li, label {
            color: #1F376F; /* Aplica el color al resto de textos */
        }

        /* Ajuste adicional para el botón */
        button {
            font-family: 'Poppins', sans-serif;
            font-weight: 400;
            font-size: 16px;
        }


        .btn-enviar {
            border: 2px solid #3F7CFB;
            color: #3F7CFB;
            background-color: transparent;
            border-radius: 25px;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn-enviar:hover {
            background-color: #3F7CFB;
            color: white;
        }

        .btn-limpiar {
            background-color: #f30000;
            margin-top: 15px; 
            color: white;
            border: none;
            border-radius: 25px;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s, color 0.3s;
        }       
    </style>
</head>
<body>

<div class="container mt-5">
    <form id="dynamicForm" method="POST" enctype="multipart/form-data" action="/view/inventory/process/inventory_memo_process.php">
        <!-- 1. Lista de Usuarios -->
        <div class="form-group">
            <label for="user">Usuario a entregar:</label>
            <select class="js-example-basic-single validation" id="user" name="user" required>
                <option value="">Seleccione un usuario</option>
                <!-- Aquí se agregarían dinámicamente las opciones desde la base de datos -->
                <?php
                // Esto deberías configurarlo con tu conexión a la base de datos
                $query = "SELECT e.id, CONCAT(e.name1, ' ', e.name2, ' ', e.lastname1, ' ', e.lastname2) FROM `employee` as e
                            INNER JOIN workarea_positions_assignment as wpa ON wpa.idemployee = e.id 
                            WHERE wpa.enddate = '0000-00-00'";
                $employee = $net_rrhh->prepare($query);
                $employee->execute();

                while ($data = $employee->fetch()) {
                    echo "<option value='$data[0]'>$data[1]</option>";
                }
                ?>
            </select>
            <span class="error" id="selectFieldError"></span>
        </div>

        <!-- 2. Input de Texto con Contador de Caracteres -->
        <div class="form-group">
            <label for="textInput">Asunto (Máximo <small id="charCount">0/200 caracteres</small>):</label>
            <input type="text" class="form-control validation" id="textInput" name="textInput" maxlength="200" required>
            <span class="error" id="textInputError"></span>
        </div>

          <!-- Input adicional de Descripción con Contador de Caracteres y Texto Predefinido -->
          <div class="form-group">
            <label for="descriptionInput">Descripción (Máximo <small id="descCharCount">0/300 caracteres</small>):</label>
            <textarea class="form-control validation" id="descriptionInput" name="descriptionInput" maxlength="1500" required>Ante la requisición del material tecnológico se realiza la entrega del siguiente recurso tecnológico con su respectivo cargador y detalle:</textarea>
            <span class="error" id="descriptionInputError"></span>
        </div>

        <!-- 3. Input de Cantidad (sin límites) -->
        <div class="form-group">
            <label for="quantityInput">Cantidad:</label>
            <input type="number" class="form-control validation" id="quantityInput" name="quantityInput" min="1" required>
        </div>

        <!-- 4. Inputs Dinámicos (según la cantidad seleccionada) -->
        <div id="dynamicInputs" class="form-group">
        <?php
        if (!empty($marca_values)) {
            for ($i = 0; $i < count($marca_values); $i++) {
                ?>
                <div class="input-group mt-3">
                    <select class="form-select" aria-label="Default select example" name="marca[]">
                        <option value="">Selecciona una marca</option>
                        <?php
                        $query = "SELECT * FROM catalogue WHERE type LIKE '%Marca%'";
                        $catalogue = $net_rrhh->prepare($query);
                        $catalogue->execute();

                        while ($dataC = $catalogue->fetch()) {
                            $selected = ($dataC['id'] == $marca_values[$i]) ? "selected" : "";
                            echo "<option value='$dataC[id]' $selected>$dataC[value]</option>";
                        }
                        ?>
                    </select>
                    <select class="form-select" aria-label="Default select example" name="tipo[]">
                        <option value="">Selecciona el tipo</option>
                        <?php
                        $query = "SELECT * FROM catalogue WHERE type LIKE '%Tipo%'";
                        $catalogue = $net_rrhh->prepare($query);
                        $catalogue->execute();

                        while ($dataC = $catalogue->fetch()) {
                            $selected = ($dataC['id'] == $tipo_values[$i]) ? "selected" : "";
                            echo "<option value='$dataC[id]' $selected>$dataC[value]</option>";
                        }
                        ?>
                    </select>
                    <input type="text" class="form-control" name="modelo[]" placeholder="Modelo" value="<?php echo $modelo_values[$i]; ?>" required>
                    <input type="text" class="form-control" name="serie[]" placeholder="N° de Serie" value="<?php echo $serie_values[$i]; ?>" required>
                </div>
                <?php
            }
        }
        ?>
        </div>

        <!-- 5. Canvas para Firma -->
        <div class="form-group d-flex flex-column align-items-center">
            <div style="position: relative; width: 100%; height: 250px; max-width: 550px;">
                <canvas id="signatureCanvas"></canvas>
            </div>
            <input type="file" name="signatureImage" id="signatureImage" style="display: none;">
            <button type="button" id="clearCanvas" class="btn-limpiar">Limpiar Firma</button>
        </div>

        <button type="submit" id="enviar" class="btn-enviar">Enviar</button>
    </form>
</div>

<!-- Script de jQuery -->
<script>
$(document).ready(function() {
    var descMaxLength = 1500;  //Máximo para la Descripción
    var maxLength = 200; //Máximo para el asunto
    $('.js-example-basic-single').select2();

    var canvas = document.getElementById('signatureCanvas');
    var ctx = canvas.getContext('2d');
    var drawing = false;

    function isCanvasBlank(canvas) {
        const blank = document.createElement('canvas');
        blank.width = canvas.width;
        blank.height = canvas.height;
        return canvas.toDataURL() === blank.toDataURL();
    }

    // Ajuste de tamaño dinámico del canvas
    function resizeCanvas() {
        var dataURL = canvas.toDataURL();
        canvas.width = canvas.parentElement.offsetWidth;
        canvas.height = canvas.parentElement.offsetHeight;
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        var img = new Image();
        img.src = dataURL;
        img.onload = function() {
            ctx.drawImage(img, 0, 0);
        };
    }
    resizeCanvas();
    $(window).resize(resizeCanvas);

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
        $('#signatureData').val(canvas.toDataURL());
    }

    $('#signatureCanvas').on('mousedown', startDrawing);
    $('#signatureCanvas').on('mousemove', draw);
    $('#signatureCanvas').on('mouseup', stopDrawing);
    $('#signatureCanvas').on('mouseleave', stopDrawing);

    $('#signatureCanvas').on('touchstart', startDrawing);
    $('#signatureCanvas').on('touchmove', draw);
    $('#signatureCanvas').on('touchend', stopDrawing);

    function getPosition(e) {
        var rect = canvas.getBoundingClientRect();
        var x = (e.clientX || e.touches[0].clientX) - rect.left;
        var y = (e.clientY || e.touches[0].clientY) - rect.top;
        return { x: x, y: y };
    }

    $('#clearCanvas').click(function() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        ctx.beginPath();
        $('#signatureData').val('');
    });


    //Validaciones
    $('#enviar').click(function(event) {
        event.preventDefault(); // Evita el envío del formulario hasta que se valide
        var isValid = true;

        var emptyValues = false;

        $(".validation").each(function() {
            if ($(this).val() === '') {
                emptyValues = true;
                return false;
            }
        });

        if (!emptyValues) {
            
            // Validar la firma
            if (isCanvasBlank(canvas)) {
                event.preventDefault();
                $.toast({
                            heading: "Firma no ingresada",
                            text: "Es necesario que ingreses tu firma para poder enviar el formulario",
                            showHideTransition: 'slide',
                            icon: "error",
                            hideAfter: 6000,
                            position: 'bottom-right',
                        });
                return;
            } else {
                canvas.toBlob(function(blob) {
                    event.preventDefault();
                    var file = new File([blob], 'firma.png', { type: 'image/png' });
                    var dataTransfer = new DataTransfer();
                    dataTransfer.items.add(file);
                    $('#signatureImage')[0].files = dataTransfer.files;
                    $('#dynamicForm').submit();
                }, 'image/png');
            }
        }else{
            $.toast({
                heading: "Hay campos vacíos",
                text: "Revisar los campos vacíos",
                showHideTransition: 'slide',
                icon: "error",
                hideAfter: 6000,
                position: 'bottom-right',
            });
        }
    });

    // Generar inputs dinámicos según la cantidad seleccionada
    $('#quantityInput').on('input', function() {
            var quantity = $(this).val();
            $('#dynamicInputs').empty(); // Limpia los inputs previos

            for (var i = 0; i < quantity; i++) {
                $('#dynamicInputs').append(`
                    <div class="input-group mt-3">
                        <select class="form-select" aria-label="Default select example" name="marca[]">
                    <option selected">Selecciona una marca</option>
                    <?php
                    $query = "SELECT * FROM catalogue WHERE type LIKE '%Marca%'";
                    $catalogue = $net_rrhh->prepare($query);
                    $catalogue->execute();   
    
                    while ($dataC = $catalogue->fetch()) {
                        $selected = ($dataC[0] == $data[3]) ? "selected" : "";
                        echo "<option value='$dataC[0]' $selected>$dataC[2]</option>";
                    }

                    
                    ?>
                    </select>
                    
                    <select class="form-select" aria-label="Default select example" name="tipo[]">
                    <option selected>Selecciona el tipo</option>
                    <?php
                    $query = "SELECT * FROM catalogue WHERE type LIKE '%Tipo%'";
                    $catalogue = $net_rrhh->prepare($query);
                    $catalogue->execute();   
    
                    while ($dataC = $catalogue->fetch()) {
                        $selected = ($dataC[0] == $data[3]) ? "selected" : "";
                        echo "<option value='$dataC[0]' $selected>$dataC[2]</option>";
                    }

                    
                    ?>
                    </select>
                        <input type="text" class="form-control" name="modelo[]" placeholder="Modelo" required>
                        <input type="text" class="form-control" name="serie[]" placeholder="N° de Serie" required>
                    </div>
                `);
            }
        }); 
        
        // Contador de caracteres para el input de Texto 200 caracteres máximo
        $('#textInput').on('input', function() {
        var length = $(this).val().length;
        var charCount = $('#charCount');

        // Actualiza el texto del contador de caracteres
        charCount.text(length + '/' + maxLength + ' caracteres');

        // Cambiar el color según la longitud del texto
        if (length >= 150 && length < 200) {
            charCount.removeClass('exceeded').addClass('warning');
        } 
        else if (length >= 200) {
            charCount.removeClass('warning').addClass('exceeded');
        } 
        else {
            charCount.removeClass('warning exceeded');
        }
    });

    $('#descriptionInput').on('input', function() {
    var length = $(this).val().length;
    var descCharCount = $('#descCharCount');

    descCharCount.text(length + '/' + descMaxLength + ' caracteres');

    if (length >= 1000 && length < descMaxLength) {
        descCharCount.removeClass('exceeded').addClass('warning'); // Se pone en color naranja
    } else if (length >= descMaxLength) {
        descCharCount.removeClass('warning').addClass('exceeded'); // Se pone en color rojo si se pasa del límite
    } else {
        descCharCount.removeClass('warning exceeded'); // Si está por debajo del límite se mantiene en el estilo normal
    }
    });


    
    
});
</script>
</body>
</html>
