let funcioneEditarMotoristaFusalmo= (valor) => {
    //    data-bs-target='#exampleModal2'
    /*
    */
   //alert(valor);
    $("#EDITARMotorista22").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/editar.motorista.php",{
    idModal: valor
    });
}