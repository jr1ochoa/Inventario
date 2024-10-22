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
    <h3 class="mb-0 pb-0"><b>Dirección de Operaciones</b></h3>
      <p class="lead fw-normal m-0 p-0" >V 1.0.0 </p>
     
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
  if( $idAreaEmpleado == 11 ||  $idAreaEmpleado == 56 || $idEmpleado == 213634)
  {
 
  
 ?>
 
 
         <div class="col-3 mx-1 my-1 cursor-pointer colorFondo_2" style="border: 1px #B7BCD7  solid;" id="talentoHumanobtn">
         <img src="assets/images/people_14040313.png" class="colorFondo mt-5 mx-5"style="width: 35%; " data-toggle="popover" title="ÁREAS QUE INCLUYE" data-bs-content="<ul><li>✍🏻 Formulación de Proyectos y Consultorias.</li><li>🚀Ejecución de Proyectos y Consultorías.</li></ul>"/>
         <p class=" "style="font-size: 12px;">TALENTO HUMANO</p>
         </div>
 
         <?php 
  }
  else
  {
 
     ?>
 <div class="col-3 mx-1 my-1 cursor-pointer colorFondo_2" style="border: 1px #B7BCD7  solid;" id="errorbtn">
         <img src="assets/images/people_14040313.png" class="colorFondo mt-5 mx-5"style="width: 35%; " data-toggle="popover" title="ÁREAS QUE INCLUYE" data-bs-content="<ul><li>✍🏻 Formulación de Proyectos y Consultorias.</li><li>🚀Ejecución de Proyectos y Consultorías.</li></ul>"/>
         <p class="" style="font-size: 12px;">TALENTO HUMANO</p>
         </div>
     <?php
  }
         ?>
 
         <div class="col-3 mx-1 my-1 cursor-pointer colorFondo_2" style="border: 1px #B7BCD7  solid;" id="administracionfinanciera">
         <img src="assets/images/calculate_14098093.png" class="colorFondo mt-5 mx-5"style="width: 35%; " data-toggle="popover" title="ÁREAS QUE INCLUYE" data-bs-content="<ul><li>🫱🏻‍🫲🏻 Recaudación y Alianzas Estratégicas.</li><li>💵Admón y Finanzas.</li><li>👨🏻‍💻Talento Humano</li><li>🎙️Comunicaciones</li></ul>"/>
         <p class=""style="font-size: 12px;">ADMINISTRACION Y FINANZAS</p>  
         </div>
 
         
 
 
 
         <div class="col-3 mx-1 my-1 cursor-pointer colorFondo_2" style="border: 1px #B7BCD7  solid;" id="recaudacionAlianzas">
         <img src="assets/images/money_14098136.png" class="colorFondo mt-5 mx-5"style="width: 35%; " data-toggle="popover" title="ÁREAS QUE INCLUYE" data-bs-content="<ul><li>🥽Entornos Virtuales.</li><li>📚Clubes STEAM.</li><li>👨🏻‍💻Refuerzo Educativo</li><li>🫱🏻‍🫲🏻Protagonismo Juvenil</li><li>💼Formación para el trabajo</li><li>🏈🏀⚽Academias Deportivas</li><li>🙏🏻Pastoral Juvenil</li><li>🎓Becas P. Evertz </li></ul>"/>
         <p class=""style="font-size: 12px;">GESTIÓN Y ALIANZAS CORPORATIVAS  </p>
         </div>

         <div class="col-3 mx-1 my-1" style="border: 1px #B7BCD7  solid;" id="comunicacionesPublicas">
        <img src="assets/images/marketing_14097977.png" class=" colorFondo mt-5 mx-5"style="width: 35%; " data-toggle="popover" title="ÁREAS QUE INCLUYE" data-bs-content="<ul><li>🫱🏻‍🫲🏻 Recaudación y Alianzas Estratégicas.</li><li>💵Admón y Finanzas.</li><li>👨🏻‍💻Talento Humano</li><li>🎙️Comunicaciones</li></ul>"/>
        <p class="" style="font-size: 12px;">COMUNICACIONES Y RELACIONES PÚBLICAS </p>  
        </div>

        <div  class="col-3 mx-1 my-1" style="border: 1px #B7BCD7  solid;" id="socioLaboralbtn">
        <img src="assets/images/location_14097936.png" class=" colorFondo mt-5 mx-5"style="width: 35%; " data-toggle="popover" title="ÁREAS QUE INCLUYE" data-bs-content="<ul><li>📋🖊️Monitoreo y Evaluación.</li><li>📑Seguimiento de OKR.</li><li>😎IT Y Desarrollo </li></ul>"/>
        <p class=" " style="font-size: 12px;">SOCIOLABORAL</p>
        </div>

        
        <div class="col-3 mx-1 my-1 " style="border: 1px #B7BCD7  solid;" id="encargadacumplimiento" >
        <img src="assets/images/business_14098174.png" class="imagen_gris colorFondo mt-5 mx-5"style="width: 35%; " data-toggle="popover" title="ÁREAS QUE INCLUYE" data-bs-content="<ul><li>📋🖊️Monitoreo y Evaluación.</li><li>📑Seguimiento de OKR.</li><li>😎IT Y Desarrollo </li></ul>"/>
        <p class=" " style="font-size: 12px;"><b>ENCARGADA DE CUMPLIMIENTO</b></p>
        </div>

        <div class="col-3 mx-1 my-1" style="border: 1px #B7BCD7  solid;" id="innovaciongestion">
        <img src="assets/images/arrow_14098189.png" class="imagen_gris colorFondo mt-5 mx-5"style="width: 35%; " data-toggle="popover" title="ÁREAS QUE INCLUYE" data-bs-content="<ul><li>️Monitoreo y Evaluación.</li><li>Seguimiento de OKR.</li><li>IT Y Desarrollo </li></ul>"/>
        <p class=" " style="font-size: 12px;"><b>INNOVACIÓN Y GESTIÓN  DEL APRENDIZAJE</b></p>
        </div>


        <!--<div class="col-3 " id="gestionProyectos">
        <img src="assets/images/web_14097972.png" class="colorFondo"style="width: 30%; " data-toggle="popover" title="ÁREAS QUE INCLUYE" data-bs-content="<ul><li>📋🖊️Monitoreo y Evaluación.</li><li>📑Seguimiento de OKR.</li><li>😎IT Y Desarrollo </li></ul>"/>
        <p class="tamañoTexto ">DIRECCION DE PROYECTOS</p>
        </div>-->

        

        

        


       
        


        

        

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
$("#gestionProyectos").click(function(){
    window.location.href='?view=openGestionTerritorial'; 
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

$("#comunicacionesPublicas").click(function(){
    window.location.href='?view=comunicaciones'; 
});

$("#socioLaboralbtn").click(function(){
    window.location.href='?view=socioLaboral';
})

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