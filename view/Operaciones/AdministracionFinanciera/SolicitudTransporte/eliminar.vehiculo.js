let funcionEliminarVehiculos= (valor) => {
    //    data-bs-target='#exampleModal2'
    /*
    */
   //alert(valor);
    $("#EliminarVehiculos22").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/eliminar.vehiculo.php",{
    idModal: valor
});
   // console.log(valor);
    // Activar el modal
//$('#exampleModal2').modal('show');
  //  $(targetSelector).modal('show');
}