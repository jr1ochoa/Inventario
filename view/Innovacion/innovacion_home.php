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
    background-image: url('assets/images/4529196.jpg'); /* Reemplaza 'ruta_de_tu_imagen.jpg' con la ruta de tu imagen de fondo */
    background-size: cover;
    background-position: center;
    height: 50vh;
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

<style>
    .tamañoTexto{
        font-size: 9px;
        font-weight: 700;
    }
    .colorFondo{
        background-color: #EEE6D6;
        border-radius: 12px;
    }
    .colorFondo:hover{
        background-color: #C0E5B9;
    }
    .colorFondo_2{
        background-color: #FFFFFF;
       
    }
    .colorFondo_2:hover{
        background-color: #F6F1F1;
    }
    .imagen_gris {
            display: block;
            margin: 0 auto;
            filter: grayscale(100%); /* Aplicar blanco y negro */
        }
        .cursor-pointer {
            cursor: pointer;
        }
</style>

<div class="container">
    <div class="row">

    <div class="position-relative overflow-hidden p-3 p-md-3 m-md-3 text-center bg-light">
<button id="btnRegresarSolicitud" type="button" class="btn btn btn-light btn-sm position-absolute" style="left: 0; color:blue; border-bottom: 2px solid #000;">Regresar</button>
    <div class="col-md-12 p-lg-2 mx-auto my-2">
    <h3 class=""><b>Dirección de Innovación</b></h3>
      <!--<p class="lead fw-normal">V 1.0.0 </p>-->
     
    </div>
    
    
  </div>
       <!-- <div class="col-6">
            <div class="fondoImagen mt-1"></div>
        </div>-->
        <div class="col-md-3">
        
        </div>
        <div class="col-9" >
        <!---->
        <div class="mt-2 " style=" border-radius: 12px;">
<div class="">
<!--<div class="col-lg-6 col-md-12 col-xs-12">
                        <h2><b>ÁREAS DE FUSALMO </b></h2>
                    </div>-->

  

    
    <div class="row" >
        

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
  if( $idAreaEmpleado == 44 ||  $idAreaEmpleado == 56 )
  {
 
  
 ?>
 
 
         <div class="col-3 mx-1 my-1 cursor-pointer colorFondo_2" style="border: 1px #B7BCD7  solid;" id="mealHome">
         <img src="assets/images/people_14040313.png" class="colorFondo mt-5 mx-5"style="width: 35%; " data-toggle="popover" title="ÁREAS QUE INCLUYE" data-bs-content="<ul><li>✍🏻 Formulación de Proyectos y Consultorias.</li><li>🚀Ejecución de Proyectos y Consultorías.</li></ul>"/>
         <p class=" "style="font-size: 12px;">MEAL</p>
         </div>
 
         <?php 
  }
  else
  {
 
     ?>
 <div class="col-3 mx-1 my-1 cursor-pointer colorFondo_2" style="border: 1px #B7BCD7  solid;" id="errorbtn">
         <img src="assets/images/people_14040313.png" class="colorFondo mt-5 mx-5"style="width: 35%; " data-toggle="popover" title="ÁREAS QUE INCLUYE" data-bs-content="<ul><li>✍🏻 Formulación de Proyectos y Consultorias.</li><li>🚀Ejecución de Proyectos y Consultorías.</li></ul>"/>
         <p class="" style="font-size: 12px;">MEAL</p>
         </div>
     <?php
  }
         ?>
 
         <div class="col-3 mx-1 my-1 cursor-pointer colorFondo_2" style="border: 1px #B7BCD7  solid;" id="administracionfinanciera">
         <img src="assets/images/calculate_14098093.png" class="colorFondo mt-5 mx-5"style="width: 35%; " data-toggle="popover" title="ÁREAS QUE INCLUYE" data-bs-content="<ul><li>🫱🏻‍🫲🏻 Recaudación y Alianzas Estratégicas.</li><li>💵Admón y Finanzas.</li><li>👨🏻‍💻Talento Humano</li><li>🎙️Comunicaciones</li></ul>"/>
         <p class=""style="font-size: 12px;">IT Y DESARROLLO</p>  
         </div>
 
        

    </div>
</div>




</div>        

        <!---->
        </div>
    </div>
</div>


<!--<br/>
<div class="container">
  <div class="row">
    <center>
        <div class="col-md-8">
        <h2><b>ULTIMAS NOTICIAS </b></h2>
        <div style="height: 5px; background: linear-gradient(to right, #4F0D97 33%, #9643EF 33%, #AC69F3 66%, #D5B4F8 66%);"></div>

        </div>
   
    </center>
  </div>
</div>-->
<br/>
<?php  

include("Programs.noticias.php");

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>


<script>
//::::::::::::::: OPCION DE PROGRAMAS ::::::::::::::::::::::
$("#mealHome").click(function(){
    window.location.href='?view=home_monitoreo'; 
});
// 

$("#talentoHumanobtn").click(function(){
    window.location.href='?view=talentoHumanoHome'; 
});

//::::: homeadministracionfinanciera
$("#administracionfinanciera").click(function(){
    window.location.href='?view=homeadministracionfinanciera'; 
});



$("#errorbtn").click(function(){
    $.toast({
            text: 'No poseé permisos para entrar a este modulo',
            showHideTransition: 'fade',
            bgColor: '#f7d794',
            textColor: 'black',
            position: 'top-center',
            hideAfter: 4000   // in milli seconds
    }); 
});


$("#encargadacumplimiento").click(function(){
    $.toast({
            text: '¡Hola! Actualmente seguimos en desarrollo. ',
            showHideTransition: 'fade',
            bgColor: '#f7d794',
            textColor: 'black',
            position: 'top-center',
            hideAfter: 3000   // in milli seconds
    }); 
});

$("#innovaciongestion").click(function(){
    $.toast({
            text: '¡Hola! Actualmente seguimos en desarrollo. ',
            showHideTransition: 'fade',
            bgColor: '#f7d794',
            textColor: 'black',
            position: 'top-center',
            hideAfter: 3000   // in milli seconds
    }); 
});

$("#desarrollo").click(function(){
    $.toast({
            text: '¡Hola! Actualmente seguimos en desarrollo. ',
            showHideTransition: 'fade',
            bgColor: '#f7d794',
            textColor: 'black',
            position: 'top-center',
            hideAfter: 3000   // in milli seconds
    }); 
});

$("#desarrollo").click(function(){
    $.toast({
            text: '¡Hola! Actualmente seguimos en desarrollo. ',
            showHideTransition: 'fade',
            bgColor: '#f7d794',
            textColor: 'black',
            position: 'top-center',
            hideAfter: 3000   // in milli seconds
    }); 
});

$("#desarrollo").click(function(){
    $.toast({
            text: '¡Hola! Actualmente seguimos en desarrollo. ',
            showHideTransition: 'fade',
            bgColor: '#f7d794',
            textColor: 'black',
            position: 'top-center',
            hideAfter: 3000   // in milli seconds
    }); 
});

$("#desarrollo").click(function(){
    $.toast({
            text: '¡Hola! Actualmente seguimos en desarrollo. ',
            showHideTransition: 'fade',
            bgColor: '#f7d794',
            textColor: 'black',
            position: 'top-center',
            hideAfter: 3000   // in milli seconds
    }); 
});



$("#recaudacionAlianzas").click(function(){
    window.location.href='?view=recaudacionAlianzas'; 
});


$("#steam").click(function(){
    window.location.href='?view=panelprograms&parametro=2'; 
});

$("#refuerzoeducativo").click(function(){
    window.location.href='?view=panelprograms&parametro=3'; 
});

$("#protagonismojuvenil").click(function(){
    window.location.href='?view=panelprograms&parametro=4'; 
});

$("#formacionparatrabajo").click(function(){
    window.location.href='?view=panelprograms&parametro=5'; 
});

$("#academiasdeportivas").click(function(){
    window.location.href='?view=panelprograms&parametro=6'; 
});

$("#pastoraljuvenil").click(function(){
    window.location.href='?view=panelprograms&parametro=7'; 
});

$("#becas").click(function(){
    window.location.href='?view=panelprograms&parametro=8'; 
});
</script>