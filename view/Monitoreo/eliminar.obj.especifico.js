let funcioneObjEspecifico= (valor) => {
    //    data-bs-target='#exampleModal2'
    /*
    */
   //alert(valor);
    $("#EliminarObjetivoEspecifico").load("view/Monitoreo/eliminar.obj.especifico.php",{
    idModal: valor
});
   // console.log(valor);
    // Activar el modal
//$('#exampleModal2').modal('show');
  //  $(targetSelector).modal('show');
}

