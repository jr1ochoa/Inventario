let funcioneEditarProductos= (valor) => {
    //    data-bs-target='#exampleModal2'
    /*
    */
   //alert(valor);
    $("#EditarProductos2").load("view/Monitoreo/editar.productos.php",{
    idModal: valor
    });
}