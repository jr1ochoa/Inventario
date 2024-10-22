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
    background-image: url('assets/images/6242692.jpg'); /* Reemplaza 'ruta_de_tu_imagen.jpg' con la ruta de tu imagen de fondo */
    background-size: cover;
    background-position: center;
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
</style>

<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="fondoImagen mt-1"></div>
        </div>
        <div class="col-8">
        <!---->
        <div class="mt-2 " style="background-color: #F5F5F5; border-radius: 12px;">
<div class="container">
<div class="col-lg-6 col-md-12 col-xs-12">
                        <h2><b>PROYECTOS FUSALMO </b></h2>
                    </div>

    <br>
    <div class="row" >
        
        <div class="col-2 " id="altoImpacto">
        <img src="assets/images/calculate_14098093.png" class="colorFondo"style="width: 80%; " data-toggle="popover" title="ÁREAS QUE INCLUYE" data-bs-content="<ul><li>📋🖊️Monitoreo y Evaluación.</li><li>📑Seguimiento de OKR.</li><li>😎IT Y Desarrollo </li></ul>"/>
        <p class="tamañoTexto ">Alto Impacto</p>
        </div>

       <!-- <div class="col " id="recaudacionAlianzas">
        <img src="assets/images/money_14098136.png" class="colorFondo"style="width: 80%; " data-toggle="popover" title="ÁREAS QUE INCLUYE" data-bs-content="<ul><li>🥽Entornos Virtuales.</li><li>📚Clubes STEAM.</li><li>👨🏻‍💻Refuerzo Educativo</li><li>🫱🏻‍🫲🏻Protagonismo Juvenil</li><li>💼Formación para el trabajo</li><li>🏈🏀⚽Academias Deportivas</li><li>🙏🏻Pastoral Juvenil</li><li>🎓Becas P. Evertz </li></ul>"/>
        <p class="tamañoTexto mt-1">Gestión y Alianzas Corporativas </p>
        </div>

        <div class="col " id="refuerzoeducativo">
        <img src="assets/images/people_14040313.png" class="colorFondo"style="width: 80%; " data-toggle="popover" title="ÁREAS QUE INCLUYE" data-bs-content="<ul><li>✍🏻 Formulación de Proyectos y Consultorias.</li><li>🚀Ejecución de Proyectos y Consultorías.</li></ul>"/>
        <p class="tamañoTexto mt-1">Talento Humano</p>
        </div>

        <div class="col " id="protagonismojuvenil">
        <img src="assets/images/calculate_14098093.png" class="colorFondo"style="width: 80%; " data-toggle="popover" title="ÁREAS QUE INCLUYE" data-bs-content="<ul><li>🫱🏻‍🫲🏻 Recaudación y Alianzas Estratégicas.</li><li>💵Admón y Finanzas.</li><li>👨🏻‍💻Talento Humano</li><li>🎙️Comunicaciones</li></ul>"/>
        <p class="tamañoTexto mt-1">Administracion y Finanzas </p>  
        </div>


        <div class="col " id="formacionparatrabajo">
        <img src="assets/images/marketing_14097977.png" class="colorFondo"style="width: 80%; " data-toggle="popover" title="ÁREAS QUE INCLUYE" data-bs-content="<ul><li>🫱🏻‍🫲🏻 Recaudación y Alianzas Estratégicas.</li><li>💵Admón y Finanzas.</li><li>👨🏻‍💻Talento Humano</li><li>🎙️Comunicaciones</li></ul>"/>
        <p class="tamañoTexto mt-1">Comunicaciones </p>  
        </div>-->

      

    </div>
</div>




</div>        

        <!---->
        </div>
    </div>
</div>


<br/>
<!--<div class="container">
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

<script>
//::::::::::::::: OPCION DE PROGRAMAS ::::::::::::::::::::::
$("#altoImpacto").click(function(){
    window.location.href='?view=altoImpacto'; 
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