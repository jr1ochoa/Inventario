let funcioneEditarObjetivoGeneral= (valor) => {
    //    data-bs-target='#exampleModal2'
    /*
    */
   //alert(valor);
    $("#EditarObjetivoGeneral").load("view/Monitoreo/editar.obj.general.php",{
    idModal: valor
    });
}