<?php include("../../../../config/net.php");
    $valorRecibido = $_REQUEST['idModal'];
   // echo $valorRecibido;


     
        //PARA TOMAR LOS DATOS DE LA SEDE DE SANTA ANA:::::::::::::
        $query = "SELECT * FROM proyecto_mapeo_comunidades where id = ?";
        $data = $net_rrhh->prepare($query);
        $data->execute([$valorRecibido]);
        // Suponiendo que $data es tu conjunto de resultados
        $departamento = "";
        $municipio = "";
        $nombre_comunidad = "";
        $radio = "";
        $ubicacion = "";
        $coordenadas = "";
        $total_viviendas = "";
        $casa_comunal = "";
        $centro_alcances="";
        $observaciones="";
        
        while ($data3 = $data->fetch()) 
        {
            $departamento       =   $data3[1];
            $municipio          =   $data3[2];
            $nombre_comunidad   =   $data3[3];
            $radio              =   $data3[4];
            $ubicacion          =   $data3[5];
            $coordenadas        =   $data3[6];
            $total_viviendas    =   $data3[7];
            $casa_comunal       =   $data3[17];
            $centro_alcances    =   $data3[9];
            $observaciones      =   $data3[16];
        }

  ?>
    
    
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content w-100">
            <div class="modal-body d-flex mb-1 justify-content-center align-items-center ">
                <img src="view/Operaciones/GestionProyectos/FichaComunitaria/assets/Icons/delete.png" width="50px" height="50px">
                <section class="ms-3 w-100">
                    <h2>COMUNIDAD :  <?php echo $nombre_comunidad; ?></h2>
                    <p class="text-muted mb-0">¿Estas seguro de eliminar esta comunidad? Esta acción no se puede deshacer</p>
                </section>
                <input type="hidden" value="<?php echo $valorRecibido; ?>" id="idEncabezadoDelete" name="idEncabezadoDelete"/>
            </div>
            <div class="modal-footer p-1 border-0 ">
               
            </div>
        </div>
    </div>


<script>
  /*  $('#btnDelete').click(function(){ // Deshabilitar la empresa
        $.post("process/index.php", {
        process: "mapeoAsocios", 
        action: "deleteEmpresa",    
        
        empresaId: $(this).val()

        },
            function(response){
                if(response){
                    $.toast({
                            heading: 'Finalizado',
                            text: "Empresa eliminada con éxito",
                            showHideTransition: 'slide',
                            icon: 'success',
                            hideAfter: 5000, 
                            position: 'bottom-center'
                        });

                        $('#modalDelete').modal('hide');

                        // Recarga el contenido de la tabla
                        if ($('#btnConvenio').hasClass('btnActive')){ convenioStatus = 1; }else{ convenioStatus = 0; }
                        $.refreshTableContent(convenioStatus);
                }else{
                    alert(response)
                }
            }
        );
    });*/
</script>
