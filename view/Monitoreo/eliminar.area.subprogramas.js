let funcioneEliminarAreaSubPrograma= (valor) => {
    //    data-bs-target='#exampleModal2'
    /*
    */
   //alert(valor);
    $("#EliminarAreaPresupuestaria22").load("view/Monitoreo/eliminar.area.subprogramas.php",{
    idModal: valor
    });
}