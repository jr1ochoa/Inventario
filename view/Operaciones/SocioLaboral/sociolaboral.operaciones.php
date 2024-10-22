<style>
    .colorBoton{
        background-color: #DFDFDF;
    }
</style>
<style>
                            .tamañoTexto{
                                font-size: 9px;
                                font-weight: 700;
                            }
                            .colorFondo {
    background-color: #ffffff;
    border-radius: 12px;
    transition: background-color 0.3s ease, transform 0.3s ease; /* Añade transición suave */
}

.colorFondo:hover {
   
    transform: scale(1.05); /* Aumenta el tamaño un 5% al hacer hover */
}
                        </style>
                        <style>
        .img-container {
            text-align: center;
        }
        .img-container img {
            display: block;
            margin: 0 auto;
        }
        .img-caption {
            margin-top: 10px;
            font-weight: bold;
            font-size: 12px;
        }
        .cursor-pointer {
            cursor: pointer;
        }
        .colorFondo2 {
            background-color: #ffffff; /* Puedes cambiar esto por el color de fondo que prefieras */
            border-radius: 12px;
            padding-top: 5px;
            margin-top: 8px;
            
        }
    </style>
<div class="row ">


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
  if(  $idAreaEmpleado == 58 || $idAreaEmpleado == 56 )
  {
 
  
 ?>


<div class="col-md-3 colorFondo2 img-container cursor-pointer mx-2 colorFondo" id="modulovotaciones">
    <img src="assets/images/sesion-de-servidor-terminal.png" width="40%" class="" alt="...">
    <div class="img-caption">Administración de Reservaciones</div>
</div>

<?php
  }
  else
  {
?>
<div class="col-md-3 colorFondo2 img-container cursor-pointer mx-2 colorFondo" id="NoPermiso1">
    <img src="assets/images/sesion-de-servidor-terminal.png" width="40%" class="" alt="...">
    <div class="img-caption">Administración de Reservaciones</div>
</div>
<?php
  }
?>

<div class="col-md-3 colorFondo2 img-container  mx-2" >
    <img src="assets/images/swtich_17407468.png" width="40%" class="img-thumbnail " alt="...">
    <div class="img-caption">...</div>
</div>

<div class="col-md-3 colorFondo2 img-container  mx-2" >
    <img src="assets/images/swtich_17407468.png" width="40%" class="img-thumbnail " alt="...">
    <div class="img-caption">...</div>
</div>

<div class="col-md-3 colorFondo2 img-container  mx-2" >
    <img src="assets/images/swtich_17407468.png" width="40%" class="img-thumbnail " alt="...">
    <div class="img-caption">...</div>
</div>
<div class="col-md-3 colorFondo2 img-container  mx-2" >
    <img src="assets/images/swtich_17407468.png" width="40%" class="img-thumbnail " alt="...">
    <div class="img-caption">...</div>
</div>


</div>
<br/>
<br/>
<br/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>

<script>
    //::::::::::::::: Salvaguardia ::::::::::::::::::::
$("#NoPermiso1").click(function(){
    $.toast({
         heading: 'Finalizado',
         text:'No poseé permisos',
         showHideTransition: 'slide',
         icon: 'warning',
         hideAfter: 3000, 
         position: 'bottom-center'

     });
    //window.location.href='?view=gestionarSalvaguardia';  
});
//::::::::::::::: Registro Ficha Comunitaria ::::::::::::::::::
$("#modulovotaciones").click(function(){
    window.location.href='?view=gestionReservaciones';  
})
//::::::::::::::: Mapeo Asocios ::::::::::::::::::::::::
$("#mapeoAsocios").click(function(){
    window.location.href='?view=mapeoAsocios';  
})
</script>