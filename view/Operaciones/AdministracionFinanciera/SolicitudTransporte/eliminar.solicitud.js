let funcionEliminarSolicitudTransporte= (valor) => {
    
    $("#eLIMINARsOLICITUDpUBLICA").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/eliminar.solicitud.php",{
    idModal: valor
});
   
}
