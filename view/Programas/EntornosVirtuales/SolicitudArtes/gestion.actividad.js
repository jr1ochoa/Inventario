let funcionEditarActividades34= (valor,valor2) => {
    //    data-bs-target='#exampleModal2'
    /*
    */
   //alert(valor);
    $("#editarActividadesGestion22").load("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.gestion.actividad.php",{
    idModal: valor,
    idFormulario: valor2
    });
}