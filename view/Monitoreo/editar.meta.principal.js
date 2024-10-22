let funcioneEditarMetaPoblacion= (valor) => {
    //    data-bs-target='#exampleModal2'
    /*
    */
   //alert(valor);
    $("#EditarMetasActividades").load("view/Monitoreo/editar.meta.principal.php",{
    idModal: valor
    });
}