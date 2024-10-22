let funcioneLIMINARVinculacionInstitucional= (valor) => {
    //    data-bs-target='#exampleModal2'
    /*
    */
   //alert(valor);
    $("#EliminarVinculacionInstitucional2").load("view/Monitoreo/eliminar.vinculacion.institucional.php",{
    idModal: valor
});
   // console.log(valor);
    // Activar el modal
//$('#exampleModal2').modal('show');
  //  $(targetSelector).modal('show');
}

