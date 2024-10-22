let funcioneLIMINARDATO2= (valor) => {
    //    data-bs-target='#exampleModal2'
    /*
    */
   //alert(valor);
    $("#EliminarEncabezado22").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.eliminar.pasajeros.php",{
    idModal: valor
});
   // console.log(valor);
    // Activar el modal
//$('#exampleModal2').modal('show');
  //  $(targetSelector).modal('show');
}



