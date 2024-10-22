let funcioneEliminarMetaActividad= (valor) => {
    //    data-bs-target='#exampleModal2'
    /*
    */
   //alert(valor);
    $("#EliminarMetaActividad22").load("view/Monitoreo/eliminar.meta.actividad.php",{
    idModal: valor
});
   // console.log(valor);
    // Activar el modal
//$('#exampleModal2').modal('show');
  //  $(targetSelector).modal('show');
}

