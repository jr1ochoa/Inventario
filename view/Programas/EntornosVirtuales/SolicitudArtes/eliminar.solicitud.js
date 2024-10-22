let funcionEliminarSolicitud= (valor,valor2) => {
    //    data-bs-target='#exampleModal2'
    /*
    */
   //alert(valor);
    $("#EliminarSolicitudArte").load("view/Programas/EntornosVirtuales/SolicitudArtes/eliminar.solicitud.php",{
    idModal: valor,
    idFormulario: valor2
    });
}