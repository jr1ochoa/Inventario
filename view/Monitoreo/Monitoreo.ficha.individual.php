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

        border-radius: 20px;

        color: #FFFFFF;

    }

    .colorNuevoProyecto{

        background-color: #3E9AA5;

        color: white;

    }

    .colorNuevaFicha{

        background-color: #F5A257;

    }

    .fondoImagen {

    margin: 0;

    padding: 0;

    background-image: url('assets/images/5180200.jpg'); /* Reemplaza 'ruta_de_tu_imagen.jpg' con la ruta de tu imagen de fondo */
    background-size: cover;

background-position: center 40%;

height: 40vh;
width: 25%;

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
    <div class="row">
        <div class="col-md-12">
            
        <div class="position-relative overflow-hidden p-3 p-md-2 m-md-3 text-center bg-light">
            <div class="col-md-12 p-lg-2 mx-auto my-2">
            <h1 class="display-4 fw-normal">Ficha de Proyecto | Reporte de actividades mensual</h1>
            <p class="lead fw-normal">V 1.4.0 </p>
            
            </div>
            <div class="product-device shadow-sm d-none d-md-block">
           
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-paint-bucket" viewBox="0 0 16 16">
            <path d="M6.192 2.78c-.458-.677-.927-1.248-1.35-1.643a3 3 0 0 0-.71-.515c-.217-.104-.56-.205-.882-.02-.367.213-.427.63-.43.896-.003.304.064.664.173 1.044.196.687.556 1.528 1.035 2.402L.752 8.22c-.277.277-.269.656-.218.918.055.283.187.593.36.903.348.627.92 1.361 1.626 2.068.707.707 1.441 1.278 2.068 1.626.31.173.62.305.903.36.262.05.64.059.918-.218l5.615-5.615c.118.257.092.512.05.939-.03.292-.068.665-.073 1.176v.123h.003a1 1 0 0 0 1.993 0H14v-.057a1 1 0 0 0-.004-.117c-.055-1.25-.7-2.738-1.86-3.494a4 4 0 0 0-.211-.434c-.349-.626-.92-1.36-1.627-2.067S8.857 3.052 8.23 2.704c-.31-.172-.62-.304-.903-.36-.262-.05-.64-.058-.918.219zM4.16 1.867c.381.356.844.922 1.311 1.632l-.704.705c-.382-.727-.66-1.402-.813-1.938a3.3 3.3 0 0 1-.131-.673q.137.09.337.274m.394 3.965c.54.852 1.107 1.567 1.607 2.033a.5.5 0 1 0 .682-.732c-.453-.422-1.017-1.136-1.564-2.027l1.088-1.088q.081.181.183.365c.349.627.92 1.361 1.627 2.068.706.707 1.44 1.278 2.068 1.626q.183.103.365.183l-4.861 4.862-.068-.01c-.137-.027-.342-.104-.608-.252-.524-.292-1.186-.8-1.846-1.46s-1.168-1.32-1.46-1.846c-.147-.265-.225-.47-.251-.607l-.01-.068zm2.87-1.935a2.4 2.4 0 0 1-.241-.561c.135.033.324.11.562.241.524.292 1.186.8 1.846 1.46.45.45.83.901 1.118 1.31a3.5 3.5 0 0 0-1.066.091 11 11 0 0 1-.76-.694c-.66-.66-1.167-1.322-1.458-1.847z"/>
            </svg>
                <span class="badge  text-dark" style="background-color: #F0F0F0; border-radius:12px;">no iniciado</span>
                <span class="badge  text-dark" style="background-color: #FEF5CC; border-radius:12px;">proceso</span>
                <span class="badge  text-dark" style="background-color: #AFB6CC; border-radius:12px;">pausa</span>
                <span class="badge  text-dark" style="background-color: #E59A8D; border-radius:12px;">atrasado</span>
                <span class="badge  text-dark" style="background-color: #C0E5B9; border-radius:12px;">finalizado</span>
        </div>
        
        
            


        </div>
        <div class="col-md-12">
          <?php
            include('view/Monitoreo/Monitoreo.fichas.table.php');
            ?>   
        </div>
      </div>


   

   