<style>
    .formatodeTexto{
        font-weight: 400;
    }
    .formatoTituloTexto{
        font-weight: 600;
    }
    .colorFichaProyecto{
        background-color: #F2F2F2;
        color: while;
        margin-right: 534px;
        border-radius: 8px;
    }
</style>
<style>
    .colorFondo{
        background-color: #CFE2FF;
        color: #FFFFFF;
    }
    .colorTitulo{
        background-color: #F2F2F2;
        border-radius: 10px;
        color: #FFFFFF;
        font-size: 15px;
        margin-left: 20px;
    }
    .colorNuevoProyecto{
        background-color: #FFFFFF;
        color: black;
    }
    .colorNuevaFicha{
        background-color: #FFFFFF;
        color: black;
    }
    .colorFondo{
        background-color: #3E9AA5;
    }
    .fondoImagen {
    margin: 0;
    padding: 0;
    background-image: url('assets/images/4750856.jpg'); /* Reemplaza 'ruta_de_tu_imagen.jpg' con la ruta de tu imagen de fondo */
    background-size: cover;
    background-position: center 25%;
    height: 40vh;
    display: flex;
    align-items: center;
    justify-content: center;
    
}
.colorTextoFondo{
    color: while;
    font-weight: 700;
}
.fondoColor{
    background-color: #CFE2FF;
    color: white;
    opacity: 0.7; /* Ajusta la opacidad según tus preferencias */
   
}

</style> 
<?php 
$idEmpleado =  $_SESSION['iu'];
//echo $idEmpleado."<br>";
$idAreaEmpleado;
$query = "SELECT s1.*, s2.idarea FROM workarea_positions_assignment as s1  inner join workarea_positions as s2   WHERE  s2.id = s1.idposition and s1.idemployee = $idEmpleado";
    $spaces = $net_rrhh->prepare($query);
    $spaces->execute();
    while ($data = $spaces->fetch()) 
    {
        //echo $data[8];
        $idAreaEmpleado = $data[8];
    }
?>
<div class="container ">
    <div class="row">
        <div class="fondoImagen">
            <div class="col-md-6">
                <h1 style="background-color: #ffffff7b;">Bitácora de Espacios FUSALMO</h1>
            </div> 
            <div class="col-md-2">

            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#spacesModal">Agregar Bitácora</button>
                
            </div>
           
        </div>
    </div>
    <hr/>
    <span style="color: black;">V 1.0.0</span>
    <div id="loadSpaces" class="my-5"></div>
</div>

<!-- Modal -->
<div class="modal fade" id="spacesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Bitácora</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <input type="hidden" id="idAreaEmpleado" value="<?=$idAreaEmpleado?>"/>
           <div id="loadBinnacle" class="modal-body">
            
      </div>
      <div class="modal-footer">

      <button type="button" class="btn btn-success d-block mx-auto" id="btnSaveBinnacle">
        Guardar
    </button>

        <button id="btnCloseBinnacle" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- DataTables-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $("#loadSpaces").load("/view/spaces/spaces.list.php");
        $("#loadBinnacle").load("/view/spaces/spaces.form.php");
    });
</script>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>

<script>
    $(document).ready(function(){
        $("#btnSaveBinnacle").click(function(){
            $.post("/process/index.php", {
                process: "spaces",
                action: "addBinnacle",
                    
                num: $("#txtNum").val(),
                name:  $("#txtName").val(),
                type: $("#cboType").val(),
                idAreaEmpleado: $("#idAreaEmpleado").val(),
            },
            function(response){
              

                if (response) 
                {
                    $.toast({
                    heading: 'Finalizado',
                    text: 'La Información se ha guardado correctamente',
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: 2000, 
                    position: 'top-center'
                    });
                    document.getElementById("btnCloseBinnacle").click();
                    
                    
                    setTimeout(function() {
                        window.location.href = '?view=spaces';
                        //$("#IdProyecto").load("view/Monitoreo/get_options.php");
                    }, 3000);
                    //$("#btnCloseBinnacle").click();


                }else{
                    $.toast({
                    heading: 'ERRORRRRRRR',
                    text: response,//'El nombre del proyecto es obligatorio',
                    showHideTransition: 'slide',
                    icon: 'error',
                    hideAfter: 5000, 
                    position: 'top-center'
                });
                } 

            });
        });
    });
</script>