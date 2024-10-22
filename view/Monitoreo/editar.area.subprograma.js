let funcioneEditarAreaSubPrograma= (valor) => {
    //    data-bs-target='#exampleModal2'
    /*
    */
   //alert(valor);
    $("#EditarListaAreasSugProgramas22").load("view/Monitoreo/editar.area.subprograma.php",{
    idModal: valor
    });
}