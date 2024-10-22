let funcionEditarHistorialCambios= (valor,valor2) => {
    //    data-bs-target='#exampleModal2'
    /*
    */
   //alert(valor);
    $("#EditarAprobarCambios").load("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.aprobar.historial.cambios.php",{
    idModal: valor,
    idFormulario: valor2
    });
}