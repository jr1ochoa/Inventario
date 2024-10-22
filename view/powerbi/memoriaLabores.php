<div class="position-relative overflow-hidden p-3 p-md-3 m-md-3 text-center bg-light">
<button id="btnRegresarSolicitud" type="button" class="btn btn btn-light btn-sm position-absolute" style="left: 0; color:blue; border-bottom: 2px solid #000;">Regresar</button>
  
    <div class="col-md-5 p-lg-2 mx-auto my-2">
      <h1 class="display-4 fw-normal">Impacto Fusalmo</h1>
      <p class="lead fw-normal mb-0 pb-0">V 1.0.0 </p>
     
    </div>
    <div class="product-device shadow-sm d-none d-md-block">
  
           
    </div>
    
  </div>



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
        

         <div class="col-3 mx-1 my-1 cursor-pointer colorFondo_2" style="border: 1px #B7BCD7  solid;" id="administracionfinanciera">
         <img src="assets/images/multitarea.png" class="colorFondo mt-5 mx-5"style="width: 35%; " data-toggle="popover" title="ÁREAS QUE INCLUYE" data-bs-content="<ul><li>🫱🏻‍🫲🏻 Recaudación y Alianzas Estratégicas.</li><li>💵Admón y Finanzas.</li><li>👨🏻‍💻Talento Humano</li><li>🎙️Comunicaciones</li></ul>"/>
         <p class=""style="font-size: 12px;">IMPACTO DE PROGRAMAS</p>  
         </div>
 
         
 
 
 
         <div class="col-3 mx-1 my-1 cursor-pointer colorFondo_2" style="border: 1px #B7BCD7  solid;" id="recaudacionAlianzas">
         <img src="assets/images/business_14098174.png" class="colorFondo mt-5 mx-5"style="width: 35%; " data-toggle="popover" title="ÁREAS QUE INCLUYE" data-bs-content="<ul><li>🥽Entornos Virtuales.</li><li>📚Clubes STEAM.</li><li>👨🏻‍💻Refuerzo Educativo</li><li>🫱🏻‍🫲🏻Protagonismo Juvenil</li><li>💼Formación para el trabajo</li><li>🏈🏀⚽Academias Deportivas</li><li>🙏🏻Pastoral Juvenil</li><li>🎓Becas P. Evertz </li></ul>"/>
         <p class=""style="font-size: 12px;">IMPACTO FUSALMO  </p>
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










<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>

<script>
    //:::::::::::::: DASHBOARD FUSALMO ::::::::::::::::::::
$("#recaudacionAlianzas").click(function(){
    window.location.href='?view=impacto_fusalmo_dashboar';
})

    //:::::::::::::: DASHBOARD FUSALMO ::::::::::::::::::::
    $("#administracionfinanciera").click(function(){
    window.location.href='?view=impacto_forma_dashboar';
})


</script>