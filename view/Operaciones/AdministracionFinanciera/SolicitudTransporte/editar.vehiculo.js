let funcioneEditarVehiculoFusalmo= (valor) => {
    //    data-bs-target='#exampleModal2'
    /*
    */
   //alert(valor);
    $("#EditarVehiculos2024").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/editar.vehiculo.php",{
    idModal: valor
    });
}