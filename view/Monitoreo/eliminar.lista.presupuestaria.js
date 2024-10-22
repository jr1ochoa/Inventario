let funcioneEliminarListaPresupuestaria= (valor) => {
    //    data-bs-target='#exampleModal2'
    /*
    */
   //alert(valor);
    $("#EliminarListaPresupuestaria22").load("view/Monitoreo/eliminar.lista.presupuestaria.php",{
    idModal: valor
    });
}