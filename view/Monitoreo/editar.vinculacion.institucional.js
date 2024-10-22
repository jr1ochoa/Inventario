let funcioneEditarVinculoInstitucional= (valor) => {
    //    data-bs-target='#exampleModal2'
    /*
    */
   //alert(valor);
    $("#EditarVinculacionInstitucional3").load("view/Monitoreo/editar.vinculacion.institucional.php",{
    idModal: valor
    });
}