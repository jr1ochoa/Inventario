<center class="mt-3"><h2><b>FICHA COMUNIARIA</b></h2></center>
<div class="row">

    <div class="col-12">
    <div class="select-cards-cont my-5 mx-5 flex-grow-1 d-flex justify-content-center">
                    <div class="row justify-content-center">
                        <div class="col-5 h-100">
                            <div class="card">
                                <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                                    <div class="mb-2"><img src="assets/images/book_12356943.png" height="75px" width="75px"></div>
                                    <h3 class="card-title">Consultar Ficha Comunitarias</h3>
                                    <p class="card-text">Echa un vistazo a los nuevos registros comunitarios.</p>
                                    <button id="btnEditarCambios2" class="btn-info btn">
                                        <i class="bi bi-gear"></i> Acceder
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-1 d-flex justify-content-center">
                            <hr class="vr align-self-center h-75">
                        </div>

                        <div class="col-5">
                            <div class="card">
                            <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                                    <div class="mb-2"><img src="assets/images/computer_12356933.png" height="75px" width="75px"></div>
                                    <h3 class="card-title">Gestionar Fichas Comunitarias</h3>
                                    <p class="card-text">Gestiona o agrega nuevas fichas comunitarias dentro del sistema.</p>
                                    <?php 

if($_SESSION['iu']==220727)
{ 
                                    ?>
                                    <button id="btnEditarCambios" class="btn-info btn">
                                        <i class="bi bi-gear"></i> Acceder
                                    </button>
                                    <?php 

}
else
{
?>
    <button  class="btn-secondary btn">
        <i class="bi bi-gear"></i> NO POSEÉ LOS PERMISOS
    </button>
                                    <?php 


}
?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
    <!--<img src="assets/gifprocesos/Proceso operativo animacion 1.gif" width="90%"  />-->
    </div>
           

    </div>
   
</div>

<script>
     $("#btnEditarCambios").click(function() {
        window.location.href='?view=fichaComunitaria';
     });
     $("#btnEditarCambios2").click(function() {
        window.location.href='?view=fichaComunitaria';
     });
</script>