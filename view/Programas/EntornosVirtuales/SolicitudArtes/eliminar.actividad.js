let funcionEliminarActividad= (valor,valor2) => {
    //    data-bs-target='#exampleModal2'
    /*
    */
   //alert(valor);
    $("#EliminarActividadesGestion24").load("view/Programas/EntornosVirtuales/SolicitudArtes/eliminar.actividad.php",{
    idModal: valor,
    idFormulario: valor2
    });
}