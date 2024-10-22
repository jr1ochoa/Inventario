alert("holas");
let funcionEliminarModificacionesSolicitante= (valor,valor2) => {
    //    data-bs-target='#exampleModal2'
    /*
    */
   alert(valor);
    $("#EliminarModificacionesSolicitantes").load("view/Programas/EntornosVirtuales/SolicitudArtes/eliminar.modificaciones.solicitantes.php",{
    idModal: valor,
    idFormulario: valor2
    }); 
}