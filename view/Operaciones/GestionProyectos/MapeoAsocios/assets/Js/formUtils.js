$.extend({
    generateSelectTE: function(whereInsert) {
        return new Promise(function(resolve, reject) {
            $.post("../process/index.php", {
                process: "mapeoAsocios",
                action: "selectTEList",
                group: "gestionTipoEmpresa",
            },
            function(response) {
                if (response) {
                    $(whereInsert).html(response);
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
            $.post("../process/index.php", {
                process: "mapeoAsocios",
                action: "selectEmprList",
                group: "gestionEmpresas",

                selectedTE: selectedTE
            },
            function(response) {
                console.log(response);
                if (response) {
                    $(whereInsert).html(response);
                    resolve(); // Resolvemos la promesa una vez que se ha actualizado el contenido del elemento
                } else {
                    console.log(response);
                    reject(new Error("No se pudo obtener la lista de opciones."));
                }
            });
        });
    }
})

jQuery.validator.addMethod("greaterThan", function(value, element, params) { // Regla para validar que una fecha no sea menor que otra
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
