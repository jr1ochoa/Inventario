<?php
    if(isset($_SESSION['iu']))
        redirection("../?view=main");
?>
<style>
    .tamañoLetraLogin{
        font-size: 20px;
        font-weight: 600;
    }
    .colorBotonEntrar{
        background-color: #1a4262;
        color: white;

    }
    .colorCargando{
        background-color: #F9D14A;
    }
</style>
<div id="main" style="height: 100vh; display: flex; justify-content: center; align-items: center;">
    <div class="inner">

    <!-- Content -->
        <div id="content" class="container">
            
            <img src="/assets/new_design/logo_siif.png" class="d-block mx-auto my-5" alt="logo">

            <div class="container">
                <div class="mb-4">
                    <p class="fs-5 mb-2">
                        Nombre de Usuario:
                    </p>
                    <input type="text" id="username" name="username" placeholder="usuario">
                </div>
                <div class="mb-4">
                    <p class="fs-5 mb-2">
                        Contraseña:
                    </p>
                    <div class="input-group mb-3">
                        <input type="password" id="password" name="password" key class="form-control" placeholder="******" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <a class="input-group-text" id="observar">
                            <svg xmlns="http://www.w3.org/2000/svg" id="ojoAbierto" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                            </svg>


                            <svg xmlns="http://www.w3.org/2000/svg" style="display:none;" id="ojoCerrado" width="16" height="16" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
                            <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7 7 0 0 0 2.79-.588M5.21 3.088A7 7 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474z"/>
                            <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12z"/>
                            </svg>
                        </a>    
                    </div>
                </div>

                <div class="col-md-12">
                    <a class="btn colorCargando " id="botonCargandoPersonal" style="display:none;" type="button" disabled="">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Cargando...
                    </a>
                </div>
                <button type="button" id="enviarCredenciales" name="Enviar" class="btn-siif btn-solid-2 d-block mx-auto my-5">Iniciar Sesión</button>

            </div>
        </div>    
    </div>
</div>

<!-- Después, incluye el CSS y JS de jQuery Toast Plugin -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>

<script>
     $(document).ready(function(){
       
     });


     $(document).ready(function(){     
   
        $("#password").keypress(function(e) {
        //no recuerdo la fuente pero lo recomiendan para
        //mayor compatibilidad entre navegadores.
        var code = (e.keyCode ? e.keyCode : e.which);
        if(code==13){
            document.getElementById("botonCargandoPersonal").style.display="";
          
          $.post("process/index.php", {
              process: "LogIn",
              action: "LogIn",

              username: $("#username").val(), 
              password: $("#password").val(), 

          },
          function(response){
              if(response)
              {
                  window.location.href = '?view=profile';
                /*  document.getElementById("botonCargando22").style.display="none";
              $.toast({
                  heading: 'Finalizado',
                  text: 'Vinculacion Agregada ',
                  showHideTransition: 'slide',
                  icon: 'success',
                  hideAfter: 5000, 
                  position: 'bottom-center'
              });
              document.getElementById("cerrarBtnVinculacion").click();
              $("#loadListaVinculacioninstitucional").load("view/Monitoreo/Monitoreo.tabla.vinculacioninstitucional.php",{
      idRelacion : $("#idRelacionProyecto").val()
  });*/
              }
              else
              {
                  document.getElementById("botonCargandoPersonal").style.display="none";
                  $.toast({
                      heading: 'ADVERTENCIA',
                      text: 'EL USUARIO O CONTRASEÑA ES INCORRECTA 😬',
                      showHideTransition: 'slide',
                      icon: 'warning',
                      textColor: 'white',
                      hideAfter: 5000, 
                      bgColor: '#B80000',
                      position: 'top-center'
                  });
              
              }
              
          });
        }
    });


});


//:::::::::::::: REGISTRANDO VINCULACION INSTITUCIONAL :::::::::::::::::::::::::::::::::::::::
$("#enviarCredenciales").click(function() {
    console.log("Buenas tardes Entre");
           document.getElementById("botonCargandoPersonal").style.display="";
          
            $.post("process/index.php", {
                process: "LogIn",
                action: "LogIn",

                username: $("#username").val(), 
                password: $("#password").val(), 

            },
            function(response){
                if(response)
                {
                    window.location.href = '?view=profile';
                  /*  document.getElementById("botonCargando22").style.display="none";
                $.toast({
                    heading: 'Finalizado',
                    text: 'Vinculacion Agregada 😁',
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: 5000, 
                    position: 'bottom-center'
                });
                document.getElementById("cerrarBtnVinculacion").click();
                $("#loadListaVinculacioninstitucional").load("view/Monitoreo/Monitoreo.tabla.vinculacioninstitucional.php",{
        idRelacion : $("#idRelacionProyecto").val()
    });*/
                }
                else
                {
                    document.getElementById("botonCargandoPersonal").style.display="none";
                    $.toast({
                        heading: 'ADVERTENCIA',
                        text: 'EL USUARIO O CONTRASEÑA ES INCORRECTA ',
                        showHideTransition: 'slide',
                        icon: 'warning',
                        textColor: 'white',
                        hideAfter: 5000, 
                        bgColor: '#B80000',
                        position: 'top-center'
                    });
                
                }
                
            });
        });  
//::::: MOSTRAR Y OCULTAR LA CONTRASEÑA :::::::::::::::::::::::..
$("#observar").click(function() {
    
    var input = document.getElementById("password");

    if (input.type === "password") {
        input.type = "text";
        document.getElementById("ojoCerrado").style.display = "";
        document.getElementById("ojoAbierto").style.display = "none";
    } else {
        input.type = "password";
        document.getElementById("ojoCerrado").style.display = "none";
        document.getElementById("ojoAbierto").style.display = "";
    }       
});  
</script>