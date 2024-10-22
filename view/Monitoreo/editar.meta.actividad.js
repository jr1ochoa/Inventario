let funcioneEditarMetaActividad= (valor) => {
    //    data-bs-target='#exampleModal2'
    /*
    */
   //alert(valor);
    $("#EditarMetasActividades").load("view/Monitoreo/editar.meta.actividad.php",{
    idModal: valor
    });
}