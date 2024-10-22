let funcionEliminarMotorista= (valor) => {
    //    data-bs-target='#exampleModal2'
    /*
    */
   //alert(valor);
    $("#EliminarMotorista22").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/eliminar.motorista.php",{
    idModal: valor
});
   // console.log(valor);
    // Activar el modal
//$('#exampleModal2').modal('show');
  //  $(targetSelector).modal('show');
}
