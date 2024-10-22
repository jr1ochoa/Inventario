let funcioneEditarObjetivoEspecifico= (valor) => {
    //    data-bs-target='#exampleModal2'
    /*
    */
   //alert(valor);
    $("#EditarObjetivoEspecificos").load("view/Monitoreo/editar.obj.especifico.php",{
    idModal: valor
    });
}