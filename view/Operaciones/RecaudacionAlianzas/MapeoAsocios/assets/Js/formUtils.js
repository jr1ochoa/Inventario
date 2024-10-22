$.extend({
    openFormModal: function(toModal){
        toModal.addClass("show");

        if (!$('body').attr('class') || !$('body').attr('style') || !$('body').attr('data-bs-overflow') || !$('body').attr('data-bs-padding-right')) {
            $('body').attr({
                'class': 'modal-open',
                'style': 'overflow: hidden; padding-right: 15px;',
                'data-bs-overflow': 'hidden',
                'data-bs-padding-right': '15px'
            });
        }
    },

    closeFormModal: function(toModal){
        $(".modal-backdrop").remove();
        $('body').removeAttr('class style data-bs-overflow data-bs-padding-right');
        toModal.modal("hide");
    },

    generateSelectTE: function(whereInsert) {
        return new Promise(function(resolve, reject) {
            $.post("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/process/index.php", {
                process: "mapeoAsocios",
                action: "selectTEList",
                group: "gestionTipoEmpresa",
            },
            function(response) {
                if (response) {
                    parsedData = JSON.parse(response); // Convertir la respuesta en un JSON
                    $(whereInsert).empty(); // Vaciar el espacio donde se van a colocar las opciones

                    if(Object.keys(parsedData).length == 0){ // Comprueba la longitud del JSON que se recibe, si es 0 remarca que no hay opciones disponibles y termina el proceso
                        if(!whereInsert.endsWith("group")){ // Comprueba si donde se va a insertar el listado no es un group del filtro
                            $(whereInsert).append($('<option selected disabled>').text("No hay opciones disponibles..."));; // Crear la opción default 
                        }
                        return; 
                    }

                    if(!whereInsert.endsWith("group")){ // Comprueba si donde se va a insertar el listado no es un group del filtro
                        $(whereInsert).append($('<option selected hidden disabled>').text("Selecciona una opción...")); // Crear la opción default 
                        $.each(parsedData, function (index, data) { // Recorrer el JSON con los datos de el TE
                            $(whereInsert).append($('<option>').text(data.nombre_tipo_empresa).val(data.id));
                        });
                    }else{
                        $.each(parsedData, function (index, data) { // Recorrer el JSON con los datos de el TE
                            $(whereInsert).append($('<option>').text(data.nombre_tipo_empresa).val("TE_"+data.id));
                        });
                    }
                    
                    resolve(); // Resolvemos la promesa una vez que se ha actualizado el contenido del elemento
                } else {
                    console.log(response);
                    reject(new Error("No se pudo obtener la lista de opciones."));
                }
            });
        });
    },

    generateSelectEmpr: function(whereInsert, selectedTE) {
        return new Promise(function(resolve, reject) {
            $.post("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/process/index.php", {
                process: "mapeoAsocios",
                action: "selectEmprList",
                group: "gestionEmpresas",

                selectedTE: selectedTE
            },
            function(response) {
                console.log(response);
                if (response) {
                    parsedData = JSON.parse(response); // Convertir la respuesta en un JSON
                    $(whereInsert).empty(); // Vaciar el espacio donde se van a colocar las opciones

                    if(Object.keys(parsedData).length == 0){ // Comprueba la longitud del JSON que se recibe, si es 0 remarca que no hay opciones disponibles y termina el proceso
                        $(whereInsert).append($('<option selected disabled>').text("No hay opciones disponibles..."));; // Crear la opción default 
                        $(whereInsert).prop("disabled", true)
                        return; 
                    }

                    $(whereInsert).append($('<option selected hidden disabled>').text("Selecciona una opción...")); // Crear la opción default 
                    
                    $.each(parsedData, function (index, data) { // Recorrer el JSON con los datos de el TE
                        $(whereInsert).append($('<option>').text(data.abreviatura_empresa+" | "+data.nombre_empresa).val(data.id));
                    });

                    resolve(); // Resolvemos la promesa una vez que se ha actualizado el contenido del elemento
                } else {
                    console.log(response);
                    reject(new Error("No se pudo obtener la lista de opciones."));
                }
            });
        });
    }
})

$.validator.addMethod("greaterThan", function(value, element, params) { // Regla para validar que una fecha no sea menor que otra
    if (!/Invalid|NaN/.test(new Date(value))) {
        return new Date(value) > new Date($(params).val()); 
    }

    return isNaN(value) && isNaN($(params).val()) 
    || (Number(value) > Number($(params).val())); 
},'Fecha no válida.');

$('#numContactoConv').on('input', function() { // Limitar input a solo 8 digitos
    var valor = $(this).val().toString();

    if (valor.length > 8) {  $(this).val(valor.slice(0, 8));  }
});

$('#editNumContactoConv').on('input', function() {
    var editValor = $(this).val().toString();

    if (editValor.length > 8) {  $(this).val(editValor.slice(0, 8));  }
});

$(document).ready(function(){ // Limitando la selección de fechas 
    today = new Date().toISOString().split('T')[0]; minDate = new Date('2001-01-01').toISOString().split('T')[0];
    $('#fechaFinConv').prop('max', today);  $('#fechaFinConv').prop('min', minDate);
    $('#fechaInicioConv').prop('max', today);   $('#fechaInicioConv').prop('min', minDate);
    $('#editFechaInicioConv').prop('max', today);   $('#editFechaInicioConv').prop('min', minDate);
    $('#editFechaFinConv').prop('max', today);   $('#editFechaFinConv').prop('min', minDate);
})
