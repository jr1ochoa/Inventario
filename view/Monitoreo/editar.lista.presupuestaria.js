let funcioneEditarListaPresupuestaria= (valor) => {
    //    data-bs-target='#exampleModal2'
    /*
    */
   //alert(valor);
    $("#EditarListaPresupuestaria2").load("view/Monitoreo/editar.lista.presupuestaria.php",{
    idModal: valor
    });
}