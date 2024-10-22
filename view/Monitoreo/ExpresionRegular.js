function validarNumero(input,parrafo) {

    let regex = /^[0-9]+$/;

    if (regex.test(input.value)) {

        // Si la entrada es válida, eliminar mensaje de error y cambiar estilo

        parrafo.innerHTML = '';

        input.style.border = '2px solid green';

    } else {

        // Si la entrada no es válida, mostrar mensaje de error y cambiar estilo

        parrafo.innerHTML = '❌❌ Ingrese solo números. ❌❌';

        parrafo.style.color = 'red';

        input.style.border = '2px solid red';

    }

}


function validarCorreo(input, parrafo) {
    // Expresión regular para validar un correo electrónico
    let regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    // Validación en tiempo real
    if (regex.test(input.value)) {
        // Si la entrada es válida, eliminar mensaje de error y cambiar estilo
        parrafo.innerHTML = '';
        input.style.border = '2px solid green';
    } else {
        // Si la entrada no es válida, mostrar mensaje de error y cambiar estilo
        parrafo.innerHTML = '❌❌ Ingrese un correo válido. ❌❌';
        parrafo.style.color = 'red';
        input.style.border = '2px solid red';
    }
}



function validarNumeroConDecimal(input,parrafo) {

    console.log("Entre");

    let regex = /^[0-9]+(\.[0-9]+)?$/;

    if (regex.test(input.value)) {

        // Si la entrada es válida, eliminar mensaje de error y cambiar estilo

        parrafo.innerHTML = '';

        input.style.border = '2px solid green';

    } else {

        // Si la entrada no es válida, mostrar mensaje de error y cambiar estilo

        parrafo.innerHTML = '❌❌ Ingrese solo números. ❌❌';

        parrafo.style.color = 'red';

        input.style.border = '2px solid red';

    }

}



function validarPorcentaje(input,parrafo) {

    console.log("Entre");

    let regex = /^(100(\.0{1,2})?|\d{0,2}(\.\d{1,2})?)$/;

    if (regex.test(input.value)) {

        // Si la entrada es válida, eliminar mensaje de error y cambiar estilo

        parrafo.innerHTML = '';

        input.style.border = '2px solid green';

    } else {

        // Si la entrada no es válida, mostrar mensaje de error y cambiar estilo

        parrafo.innerHTML = '❌❌ SOLO NUMEROS DEL RANGO [0.0 -- 100.00] ❌❌';

        parrafo.style.color = 'red';

        input.style.border = '2px solid red';

    }

}