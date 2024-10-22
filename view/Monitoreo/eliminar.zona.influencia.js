let funcioneZonaInfluencias= (valor) => {
    //    data-bs-target='#exampleModal2'
    /*
    */
   //alert(valor);
    $("#EliminarZonaInfluencia").load("view/Monitoreo/eliminar.zona.influencia.php",{
    idModal: valor
});
   // console.log(valor);
    // Activar el modal
//$('#exampleModal2').modal('show');
  //  $(targetSelector).modal('show');
}

