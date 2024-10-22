let funcioneEliminarMetaNumeroPoblacion= (valor) => {
    //    data-bs-target='#exampleModal2'
    /*
    */
   //alert(valor);
    $("#EliminarMetaNumerosPoblacion").load("view/Monitoreo/eliminar.numero.poblacion.meta.php",{
    idModal: valor
});
   // console.log(valor);
    // Activar el modal
//$('#exampleModal2').modal('show');
  //  $(targetSelector).modal('show');
}

