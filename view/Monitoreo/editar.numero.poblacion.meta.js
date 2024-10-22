let funcioneEditarPoblacionMetNumero= (valor) => {
    //    data-bs-target='#exampleModal2'
    /*
    */
   //alert(valor);
    $("#EditarPoblacionMetaNumero").load("view/Monitoreo/editar.numero.poblacion.meta.php",{
    idModal: valor
    });
}