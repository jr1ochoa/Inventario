let funcioneEditarResultados= (valor) => {
    //    data-bs-target='#exampleModal2'
    /*
    */
   //alert(valor);
    $("#EditarResultados").load("view/Monitoreo/editar.resultados.php",{
    idModal: valor
    });
}