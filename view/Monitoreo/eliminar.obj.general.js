let funcioneLIMINARDATO2= (valor) => {
    //    data-bs-target='#exampleModal2'
    /*
    */
   //alert(valor);
    $("#EliminarEncabezado22").load("view/Monitoreo/eliminar.obj.general.php",{
    idModal: valor
});
   // console.log(valor);
    // Activar el modal
//$('#exampleModal2').modal('show');
  //  $(targetSelector).modal('show');
}

