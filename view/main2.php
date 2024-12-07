<style>



/* Importación de la fuente Poppins desde Google Fonts */

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Barlow:wght@300;400;600&display=swap');
@import url('https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');

body {
    margin: 0;
    padding: 0;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    font-family: 'Poppins', sans-serif;
}

.main-content {
    flex-grow: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 10%;
    font-family: 'Poppins', sans-serif;
    
}



h5 {
    font-size: 1em;
    text-align: justify;
    line-height: 1.5;
    max-width: 500px;
    color: #20376F;
    margin-top: 20px;
    font-family: 'Poppins', sans-serif;
}


img {
    max-width: 100%;
    height: auto;
    display: block;
    overflow: hidden;
    transition: transform 0.3s ease;
}

img:hover {
    transform: scale(1.05);
}

.computadorasiif {
    width: 100%;
    max-width: 500px;
}


@media (max-width: 576px) {
    .main-content {
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .left-container img {
        width: 100%;
        max-height: 135px;
    }
}


/*aqui agrego el css y lo responsivo de las solicitudes*/
/* Estilo general para pantallas grandes */
.centered-text h3, .centered-text h5 {
    text-align: center; /* Centra el texto */
    color: #20376F; /* Aplica el color deseado */
    margin-top: 10%;
}

/* Estilo de <h5> en pantallas grandes */
.centered-text h5 {
    max-width: 800px;
    margin: 0 auto;
    font-size: 1.0em;
    line-height: 1.5;
}

/* Ajuste de responsividad */
@media (max-width: 576px) {
    .centered-text h3 {
        font-size: 1.5em; /* Reduce el tamaño de h3 en móviles */
    }

    .centered-text h5 {
        font-size: 1em; /* Reduce el tamaño de h5 en móviles */
        max-width: 90%; /* Limita el ancho en móviles */
    }
}



/* Aquí empiezo el diseño de los permisos */
/* Estilos para el carrusel */
.carousel-container {
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
}

.carousel-view {
    overflow: hidden;
    width: 950px; /* Ajusta este ancho para mostrar tres elementos */
}

.box-img {
    display: flex;
    transition: transform 0.5s ease;
}


.overlay-text {
    display: flex; /* Hace que el contenedor del botón use flexbox */
    align-items: center; /* Centra el contenido verticalmente */
    justify-content: center; /* Centra el contenido horizontalmente */
    position: absolute;
    top: 48%; /* Ajusta la posición vertical según sea necesario */
    left: 50%;
    transform: translateX(-50%);
    background-color: #ffffff; /* Fondo blanco */
    color: #20376F; /* Color de texto */
    padding: 10px 20px;
    border-radius: 50px;
    font-size: 16px; /* Tamaño de fuente */
    font-family: 'Barlow', sans-serif; /* Tipo de letra */
    font-weight: bold;
    width: 75%; /* Ancho igual al de los botones */
    height: 5%;
    text-align: center;
    z-index: 1;
}


.image-wrapper {
    flex: 0 0 300px; /* Ancho fijo para que se ajusten tres en la vista */
    margin: 0 10px;
    display: flex;
    flex-direction: column; /* Organiza los elementos verticalmente */
    align-items: center; /* Centra horizontalmente */
    justify-content: center; /* Centra verticalmente */
    height: 400px; /* Ajusta la altura según sea necesario */
    box-sizing: border-box;
    position: relative;
    overflow: hidden; /* Evita que el contenido desborde */
    transition: transform 0.3s ease; /* Suaviza la transición */
}


.image-wrapper:hover {
    transform: scale(1.05); /* Agranda todo el contenedor al pasar el cursor */
}

.image-wrapper img {
    max-width: 100%;
    max-height: 200px; /* Ajusta según la altura deseada */
    object-fit: contain; /* Mantiene la proporción de la imagen */
    margin-bottom: 10px; /* Espacio entre la imagen y el botón */
    display: block;
    
}

.img-new {
    position: absolute; /* Posiciona la imagen encima */
    top: 15%; /* Ajusta para colocarla en la parte superior */
    left: 50%; /* Centra horizontalmente */
    transform: translateX(-50%); /* Centra la imagen `img-new` en el contenedor */
    z-index: 2; /* Asegura que esté encima de la otra imagen */
    width: 15%; /* Ajusta el tamaño según tus necesidades */
}

.image-wrapper img:first-child {
    z-index: 1; /* Envía la imagen de fondo a un nivel inferior */
}



.image-wrapper-1 img {
    margin-top: 55px; /* Ajusta según la posición deseada */
}

.image-wrapper-2 img {
    margin-top: 20px; /* Ajusta según la posición deseada */
}

.image-wrapper-3 img {
    margin-top: 25px; /* Ajusta según la posición deseada */
}

/* Ajustes individuales para cada imagen img-new */
.image-wrapper-1 .img-new {
    top: 20%; /* Ajusta la posición vertical de la primera imagen */
    
}

.image-wrapper-2 .img-new {
    top: 30%; /* Ajusta la posición vertical de la segunda imagen */
    
}

.image-wrapper-3 .img-new {
    top: 28%; /* Ajusta la posición vertical de la tercera imagen */
    
}


.image-container {
    text-align: center;
    width: 100%; /* Asegura que el contenedor ocupe todo el ancho disponible */
}

/* Estilos para los botones */
.carousel-button {
    background-color: #ffffff; /* Fondo blanco */
    border: 2px solid #ffffff; /* Borde blanco */
    border-radius: 50%;
    width: 40px;
    height: 40px;
    cursor: pointer;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 2;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.carousel-button::before {
    content: '';
    display: inline-block;
    width: 12px;
    height: 12px;
    border-top: 2px solid #4270FF; /* Color celeste para el icono */
    border-right: 2px solid #4270FF; /* Color celeste para el icono */
    transform: rotate(45deg);
}

.carousel-button.prev {
    left: 5%; /* Ajustado para estar más cerca */
}

.carousel-button.prev::before {
    transform: rotate(-135deg);
}

.carousel-button.next {
    right: 5%; /* Ajustado para estar más cerca */
}

.carousel-button.next::before {
    transform: rotate(45deg);
}

.carousel-button:hover {
    background-color: #4270FF;
    border-color: #4270FF;
}

.carousel-button:hover::before {
    border-color: #ffffff;
}

/* Estilos para los botones dentro de las imágenes */
.image-container button {
    display: flex; /* Hace que el contenedor del botón use flexbox */
    align-items: center; /* Centra el contenido verticalmente */
    justify-content: center; /* Centra el contenido horizontalmente */
    padding: 10px 20px;
    background-color: #4270FF;
    color: white;
    border: none;
    cursor: pointer;
    border-radius: 50px;
    font-size: 0.9em;
    width: 75%;
    height: 70%;
    margin: 0 auto;
}


/* Botón para la primera imagen */
.btn-img1 {
    position: relative;
    top: -75px;


}

/* Botón para la segunda imagen */
.btn-img2 {
    position: relative;
    top: -65px;
    

}

/* Botón para la tercera imagen */
.btn-img3 {
    position: relative;
    top: -65px;

}

.image-container button:hover {
    background-color: rgba(0, 86, 179, 0.8);
}


/* Responsivo para dispositivos de más de 768px de ancho (tablets y pantallas grandes) */
@media (min-width: 769px) and (max-width: 1024px) {
   
    .carousel-view {
        overflow-x: scroll;
        scroll-snap-type: x mandatory;
        -webkit-overflow-scrolling: touch;
        display: flex;
        justify-content: center;
        scroll-padding-left: 5%; /* Desplazamiento inicial desde la primera imagen */
    }

    /* Estilos para el scrollbar en el carrusel */
.carousel-view::-webkit-scrollbar {
    height: 8px; /* Altura de la barra de desplazamiento horizontal */
}

.carousel-view::-webkit-scrollbar-track {
    background: #f0f0f0; /* Color de fondo de la pista de la barra */
}

.carousel-view::-webkit-scrollbar-thumb {
    background-color: #4270FF; /* Color de la barra de desplazamiento (celeste) */
    border-radius: 25%; /* Borde redondeado */
}

/* Para navegadores compatibles con scrollbar-color */
.carousel-view {
    scrollbar-color: #4270FF #f0f0f0; /* Color de la barra y el fondo */
    scrollbar-width: thin; /* Ancho del scrollbar en Firefox */
}


    .carousel-button {
        display: none;
    }

   
    /* Margen solo para la primera imagen y alineación */
    .image-wrapper:first-child {
        margin-left: 10%;
    }
}



/* Responsivo para dispositivos entre 600px y 768px de ancho */
@media (min-width: 601px) and (max-width: 768px) {
    .carousel-view {
        overflow-x: scroll;
        scroll-snap-type: x mandatory;
        -webkit-overflow-scrolling: touch;
        display: flex;
        justify-content: center;
        
    }

    /* Estilos para el scrollbar en el carrusel */
.carousel-view::-webkit-scrollbar {
    height: 8px; /* Altura de la barra de desplazamiento horizontal */
}

.carousel-view::-webkit-scrollbar-track {
    background: #f0f0f0; /* Color de fondo de la pista de la barra */
}

.carousel-view::-webkit-scrollbar-thumb {
    background-color: #4270FF; /* Color de la barra de desplazamiento (celeste) */
    border-radius: 25%; /* Borde redondeado */
}

/* Para navegadores compatibles con scrollbar-color */
.carousel-view {
    scrollbar-color: #4270FF #f0f0f0; /* Color de la barra y el fondo */
    scrollbar-width: thin; /* Ancho del scrollbar en Firefox */
}
    .carousel-button {
        display: none;
    }


    .image-wrapper {
        margin-right: 5%;
        scroll-snap-align: center; /* Centra cada imagen en el viewport */
    }

    
    /* Margen solo para la primera imagen y alineación */
    .image-wrapper:first-child {
        margin-left: 10%;
    }
}



/* Responsivo */
@media (max-width: 600px) {
    .carousel-view {
        overflow-x: scroll;
        scroll-snap-type: x mandatory;
        -webkit-overflow-scrolling: touch;
        display: flex;
        scroll-padding-left: 5%; /* Desplazamiento inicial desde la primera imagen */
    }


    /* Estilos para el scrollbar en el carrusel */
.carousel-view::-webkit-scrollbar {
    height: 8px; /* Altura de la barra de desplazamiento horizontal */
}

.carousel-view::-webkit-scrollbar-track {
    background: #f0f0f0; /* Color de fondo de la pista de la barra */
}

.carousel-view::-webkit-scrollbar-thumb {
    background-color: #4270FF; /* Color de la barra de desplazamiento (celeste) */
    border-radius: 50%; /* Borde redondeado */
}

/* Para navegadores compatibles con scrollbar-color */
.carousel-view {
    scrollbar-color: #4270FF #f0f0f0; /* Color de la barra y el fondo */
    scrollbar-width: thin; /* Ancho del scrollbar en Firefox */
}


    .carousel-button {
        display: none;
    }

    .image-wrapper {
        margin-right: 5%;
        scroll-snap-align: center; /* Centra cada imagen en el viewport */
    }

    /* Agrega margen solo a la primera imagen y alinea */
    .image-wrapper:first-child {
        margin-left: 5%;
    }
}


/* Estilo para el encabezado */
h3 {
    text-align: center;
    color: #20376F;
    font-family: 'Barlow', sans-serif;
    margin-top: 0px;
    margin-bottom: 60px;
    font-weight: 600;
}

/* Contenedor de los botones */
.button-container {
    display: flex;
    justify-content: center; /* Distribuye el espacio pero con menos separación */
    width: 100%;
    margin-top: 20px;
    flex-wrap: wrap; /* Permite que los botones se apilen si el espacio es pequeño */
}

/* Estilo para cada enlace (botón) */
.button-container a {
    display: inline-block;
    width: 180px; /* Mantiene el ancho fijo en pantallas grandes */
    padding: 8px 0;
    margin: 0 30px; /* Reduce el margen lateral para menos separación */
    background-color: white;
    color: #007BFF;
    font-size: 1em;
    border: 2px solid #007BFF;
    cursor: pointer;
    border-radius: 50px;
    text-align: center;
    text-decoration: none;
    overflow: hidden;
    transition: transform 0.3s ease;
}

/* Efecto al pasar el cursor sobre los botones */
.button-container a:hover {
    background-color: #007BFF;
    color: white;
    transform: scale(1.1);
}

/* Responsividad para pantallas pequeñas */
@media (max-width: 768px) {
    .button-container {
        flex-direction: column; /* Apila los botones en una columna */
        align-items: center; /* Centra los botones */
    }
    
    .button-container a {
        width: 100%; /* Los botones ocupan todo el ancho disponible */
        margin: 10px 0; /* Agrega márgenes verticales entre los botones */
    }
}



/*estilo para los cumpleaneros de la pagina */ 

/* Estilo general del calendario  y contenedor de color blanco */
.calendar {
    max-width: 85%;
    margin: auto;
    padding: 9%;
    background: #fff;
    text-align: center;
    margin-top: -20px; /* Ajusta este valor según sea necesario */
    margin-left: -20px;
    margin-bottom: 0; /* Elimina el margen en la parte inferior */
    border-bottom-right-radius: 100px;
}

.calendar h3 {
    margin-top: -100px; /* Ajusta según sea necesario */
    margin-bottom: 5px;
    text-align: left;
    font-size: 24px;

}


/* Contenido del calendario */
.calendar-content {
    text-align: center;
}



/* Estilo de cada entrada de cumpleaños */
.birthday-entry {
    display: flex;
    align-items: center; /* Alinea verticalmente en el centro */
    margin: 10px 0;
    width: 80%; /* Ancho completo */
    background-color: #F4F4F4; /* Color de fondo para el recuadro */
    border-radius: 50px; /* Bordes redondeados */
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Sombra ligera para resaltar el recuadro */
    overflow: hidden; /* Evita que el contenido desborde */
    transition: transform 0.3s ease; /* Suaviza la transición */
}

.birthday-entry:hover {
    background-color: #3871F9; /* Color de fondo al pasar el cursor */
    color: white; /* Cambia el color del texto a blanco para mejor contraste */
    cursor: pointer; /* Cambia el cursor a pointer */
    transition: background-color 0.3s ease; /* Transición suave */
    transform: scale(1.05); /* Agranda todo el contenedor al pasar el cursor */
}

.birthday-entry:hover .birthday-name,
.birthday-entry:hover .birthday-cargo,
.birthday-entry:hover .birthday-date {
    color: white;
}


/* Estilo de las imágenes de cumpleaños */
.birthday-image {
    width: 40px; /* Tamaño de la imagen más pequeño */
    height: 40px; /* Tamaño de la imagen más pequeño */
    border-radius: 50%; /* Forma circular */
    object-fit: cover; /* Ajusta la imagen al contenedor */
    margin: 0; /* Elimina el margen derecho para evitar desalineación */
}

/* Estilo para los nombres, cargos y fechas */
.birthday-name,
.birthday-cargo,
.birthday-date {
    margin-left: 20px;
    margin-right: 10px; /* Espacio entre los elementos */
    font-family: 'Poppins', sans-serif; /* Fuente común */
    flex: 1; /* Permite que cada elemento ocupe el mismo espacio */
}

/* Opcional: puedes definir un ancho máximo si lo deseas */
.birthday-name {
    max-width: 40%; /* Ajusta el ancho según sea necesario */
    text-align: left;
}

.birthday-cargo {
    max-width: 30%; /* Ajusta el ancho según sea necesario */
    text-align: left;
}

.birthday-date {
    max-width: 5%; /* Ajusta el ancho según sea necesario */
    text-align: left;
}

/* Estilo para el borde circular alrededor de la imagen */
.birthday-image-wrapper {
    border: 3px solid #3971FF; /* Color del borde */
    border-radius: 50%; /* Forma circular para el borde */
    display: flex; /* Para centrar la imagen dentro */
    align-items: center; /* Centrar verticalmente */
    justify-content: center; /* Centrar horizontalmente */
    width: 50px; /* Ajusta el tamaño del contenedor */
    height: 50px; /* Ajusta el tamaño del contenedor */
    margin-bottom: 5px; /* Espacio debajo del círculo */
    box-sizing: border-box; /* Asegura que el padding no afecte el tamaño total */
}

/* Contenedor del calendario en sí */

.calendar-container {
    position: absolute; /* Posición fija para que no se mueva */
    top: 250px; /* Ajusta según la posición que desees */
    left: 83%; /* Centrado horizontalmente */
    transform: translateX(-50%); /* Centra la mitad afuera y mitad adentro */
    background-color: #ffffff;
    border-radius: 50px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 40px; /* Espacio interno */
    max-width: 20%; /* Ancho del calendario */
    margin-top: 0;
    margin-bottom: 0; /* Sin margen inferior */ 
    
}


/*contendor de color azul de fondo */
/* Contenedor principal del calendario */
.calendar-wrapper {
    width: 100vw; /* Ocupa todo el ancho de la pantalla */
    background-color: #3971FF; /* Color azul */
    padding: 20px; /* Espaciado interno */
    color: black; /* Cambia el color del texto si es necesario */
    margin-top: 100px;
    margin-bottom: -150px;
    position: relative; /* Importante para el posicionamiento absoluto del calendario */
}




/* Estilo para el nombre en negrita y color específico */
.bold-name {
    color: #20376F; /* Color deseado para el nombre */
    font-weight: bold; /* Hacer el texto en negrita */
    font-family: 'Poppins', sans-serif; /* Aplicar la fuente Poppins */
}

/* Estilo para el cargo y el día */
.job-day {
    color: #20376F; /* Color deseado para el texto */
    font-family: 'Poppins', sans-serif; /* Aplicar la fuente Poppins */
    font-weight: normal; /* Sin negrita */
    font-size: 12px; /* Ajusta el tamaño de fuente según lo necesites */
}


/* Barra del mes con botones para cambiar de mes */
.month {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.month button {
    font-size: 18px;
    color: #4A90E2;
    background: none;
    border: none;
    cursor: pointer;
}

.month h4 {
    font-size: 20px;
    color: #333;
    font-weight: bold;
    text-transform: capitalize;
    margin: 0;
}




/* Nombres de los días de la semana */
.calendar-grid ol {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 5px;
    padding: 0;
    list-style: none;
    margin: 0;
}

.day-name {
    background: #4A90E2; /* Color de fondo azul */
    color: #3971FF; /* Color de texto deseado */
    padding: 10px;
    border-radius: 4px;
    font-size: 14px;
}

.calendar-grid .day-name {
    color: #3971FF; /* Color de texto deseado */
}


/* Estilo para los días del mes */
.calendar-grid li {
    background: transparent;
    color: #333;
    width: 40px; /* Ancho del círculo */
    height: 40px; /* Alto del círculo */
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    text-align: center;
    transition: background 0.3s, color 0.3s, transform 0.3s;
    border-radius: 50%; /* Forma circular */
}

/* Efecto hover con círculo azul */
.calendar-grid li:hover {
    background: #4A90E2; /* Fondo azul al pasar el cursor */
    color: #fff; /* Color de texto blanco */
    cursor: pointer;
    transform: scale(1.1); /* Ampliación ligera */
}



/* Día actual */
.calendar-grid li.current-day {
    background: #4A90E2;
    color: #ffffff;
    font-weight: bold;
}

/* Espacios en blanco para los días antes del inicio del mes */
.calendar-grid li.empty {
    background: transparent;
    cursor: default;
}


/*aqui empiezan los responsividad de los diferentes dispositivos */


@media (min-width: 1441px) {

    .calendar-wrapper {
        padding: 0; /* Más padding en pantallas grandes */
    }

    .calendar-container {
        width: 80%; /* Cambia este valor para ajustar el tamaño del contenedor */
        max-width: 25%; /* Ajusta el ancho máximo según sea necesario */
        margin: 0 auto; /* Centra el contenedor */
    }

    .calendar-grid {
        grid-template-columns: repeat(7, 1fr); /* Mantiene la cuadrícula de 7 columnas */
        font-size: 1.2em; /* Ajusta el tamaño de fuente si es necesario */
    }
}

/* Responsividad para dispositivos de tamaño grande (pantallas entre 1024px y 1440px) */
@media (min-width: 1025px) and (max-width: 1440px) {

/* Reducir el tamaño del contenedor general del calendario */
.calendar-container {
    max-width: 60%; /* Reduce el ancho del contenedor */
    padding: 2%; /* Ajusta el padding general */
    margin: 0 auto; /* Centra el contenedor */
}

.calendar {
    max-width: 85%; /* Ajusta el ancho máximo del calendario dentro del contenedor */
    padding: 2%; /* Reduce el padding interno del calendario */
    margin-top: -2vw; /* Elimina márgenes adicionales */
    margin-left: -2%; /* Ajusta el margen izquierdo */
}

.calendar h3 {
    font-size: 1.5vw; /* Tamaño de fuente más pequeño para el encabezado */
    margin-top: 0.5vw; /* Ajusta el espacio superior */
    margin-bottom: 1vw; /* Ajusta el espacio inferior */
}

/* Estilo de cada entrada de cumpleaños */
.birthday-entry {
    width: 70%; /* Reduce el ancho */
    margin: 1vw 0; /* Ajusta el margen entre las entradas */
    padding: 0.5vw; /* Ajusta el padding interno */
    flex-direction: row; /* Mantiene la disposición en fila */
    justify-content: space-between; /* Espacio entre elementos */
}

.birthday-image-wrapper {
    width: 3vw; /* Tamaño del contenedor de la imagen */
    height: 3vw; /* Tamaño del contenedor de la imagen */
    border: 0.2vw solid #3971FF; /* Bordes proporcionados */
    margin-right: 1vw; /* Espacio a la derecha de la imagen */
}

.birthday-image {
    width: 2.5vw; /* Tamaño de la imagen */
    height: 2.5vw;
}

.birthday-name,
.birthday-cargo,
.birthday-date {
    font-size: 0.9vw; /* Tamaño de fuente más pequeño para nombres, cargos y fechas */
}

/* Ajustes del contenedor azul que rodea al calendario */
.calendar-wrapper {
    padding: 2vw; /* Padding del contenedor azul */
    margin-top: 4vw; /* Ajuste en el margen superior */
}

/* Ajustar el tamaño de los días en el calendario */
.calendar .day {
    font-size: 1vw; /* Tamaño de fuente para los números de los días */
    padding: 0.8vw; /* Ajusta el tamaño de los cuadros de días */
    width: 2vw; /* Ancho del cuadro del día */
    height: 2vw; /* Alto del cuadro del día */
}
}


/* Responsividad para dispositivos de tamaño mediano (pantallas entre 600px y 1024px) */
@media (min-width: 601px) and (max-width: 1024px) {
    .calendar {
        max-width: 85%; /* Usa un ancho máximo del 85% */
        padding: 5%; /* Ajusta el padding */
        margin-top: -5vw; /* Ajusta el margen superior */
        margin-left: -5%; /* Ajusta el margen izquierdo */
    }

    .calendar h3 {
        font-size: 2.5vw; /* Tamaño de fuente adaptable */
        margin-top: -2vw; /* Ajusta el espacio superior */
        margin-bottom: 2vw; /* Ajusta el espacio inferior */
    }

    .birthday-entry {
        width: 100%; /* Ocupa un poco más del ancho */
        margin: 2vw 0; /* Ajusta el margen entre las entradas */
        padding: 0.3vw; /* Padding interno */
        flex-direction: row; /* Mantiene la disposición en fila */
        justify-content: space-between; /* Espacio entre elementos */
    }

    .birthday-image {
        width: 6vw; /* Ajusta el tamaño de la imagen */
        height: 6vw; /* Ajusta el tamaño de la imagen */
    }

    .birthday-image-wrapper {
        width: 7vw; /* Ajusta el tamaño del contenedor de la imagen */
        height: 7vw; /* Ajusta el tamaño del contenedor de la imagen */
        border: 0.5vw solid #3971FF; /* Bordes proporcionalmente más pequeños */
        margin-right: 2vw; /* Espacio a la derecha de la imagen */
    }


    .calendar-container {
    max-width: 90%; /* Ancho máximo del contenedor */
    padding: 5%; /* Aumenta el padding para más espacio interno */
    position: relative;
    margin-top: -25vw; /* Ajusta el margen superior según sea necesario */
    margin-left: -20vw; /* Centra el contenedor */
    margin-right: auto; /* Centra el contenedor */
    margin-bottom: 35vw; /* Ajusta el margen inferior según sea necesario */
}


    .calendar-wrapper {
        padding: 4vw; /* Padding para el contenedor azul */
        margin-top: 15vw; /* Ajuste en el margen superior */
    }
}

.birthday-name,
.birthday-cargo {
    
    white-space: nowrap; /* Evita que el texto se divida en dos líneas */
    overflow: hidden; /* Oculta el texto que desborda */
    text-overflow: ellipsis; /* Muestra "..." al final del texto que se desborda */
    display: inline-block; /* Asegura que el texto ocupe una sola línea */
}

/* Ajusta los anchos máximos para nombres y cargos */
.birthday-name {
    max-width: 50vw; /* Aumenta el ancho máximo para el nombre */
    margin-right: 2vw; /* Espacio entre el nombre y el cargo */
}

.birthday-cargo {
    max-width: 30vw; /* Aumenta el ancho máximo para el cargo */
    margin-right: 2vw; /* Espacio entre el cargo y la fecha */
}

.birthday-date {
   
    max-width: 5vw; /* Ajusta el ancho máximo para la fecha */
    
}


/* Responsividad para dispositivos móviles */
@media (max-width: 600px) {
    .calendar {
        max-width: 100%; /* Utiliza todo el ancho disponible */
        padding: 5%; /* Reduce el padding para dispositivos pequeños */
        margin-top: -4vw; /* Espacio adicional arriba */
    }

    .calendar h3 {
        font-size: 4.5vw; /* Tamaño de fuente más pequeño para el h3 */
        margin-top: 10vw; /* Ajusta según sea necesario */
    }

    .calendar h5 {
        font-size: 3.5vw; /* Tamaño de fuente más pequeño para el h5 */
        margin-top: 5vw; /* Ajusta según sea necesario */
        margin-bottom: 10vw;
    }

    .birthday-entry {
        width: 100%; /* Ancho completo para las entradas de cumpleaños */
        margin: 1.3vw 0; /* Reduce el margen entre entradas */
        flex-direction: row; /* Mantiene la dirección en fila */
        align-items: center; /* Alinea los elementos verticalmente en el centro */
        justify-content: flex-start; /* Alinea todos los elementos a la izquierda */
    }

    .birthday-entry:last-child {
        margin-bottom: 0; /* Elimina el margen inferior del último cumpleañero */
    }

    .birthday-image {
        width: 8vw; /* Tamaño de imagen más pequeño */
        height: 8vw; /* Tamaño de imagen más pequeño */
    }

    /* Ajusta el tamaño del contenedor de la imagen */
    .birthday-image-wrapper {
        width: 10vw; /* Ajusta el tamaño del contenedor según el tamaño de la imagen */
        height: 10vw; /* Ajusta el tamaño del contenedor según el tamaño de la imagen */
        border: 0.8vw solid #3971FF; /* Color del borde */
        border-radius: 50%; /* Forma circular para el borde */
        display: flex; /* Para centrar la imagen dentro */
        align-items: center; /* Centrar verticalmente */
        justify-content: center; /* Centrar horizontalmente */
        margin-right: 3vw; /* Aumenta el margen a la derecha para separación */
        box-sizing: border-box; /* Asegura que el padding no afecte el tamaño total */
    }

    /* Espacio para el nombre y cargo */
    .birthday-name,
    .birthday-cargo {
        margin-left: 2vw; /* Reduce los márgenes laterales */
        margin-right: 0; /* Elimina el margen derecho */
        font-size: 2.5vw; /* Ajusta el tamaño de la fuente para los textos */
        white-space: nowrap; /* Evita que el texto se divida en dos líneas */
        overflow: hidden; /* Oculta el texto que desborda */
        text-overflow: ellipsis; /* Muestra "..." al final del texto que se desborda */
        max-width: 30vw; /* Aumenta el ancho máximo para el truncamiento */
    }

    .birthday-date {
        margin-left: 1.3vw; /* Espacio adicional para la fecha */
        font-size: 2.5vw; /* Ajusta el tamaño de la fuente para la fecha */
        white-space: nowrap; /* Evita que la fecha se divida en dos líneas */
    }

    .calendar-container {
        max-width: 100%; /* Utiliza todo el ancho disponible */
        padding: 5%; /* Ajusta el padding */
        position: relative; /* Cambia a relativo para evitar problemas de posición */
        left: 0; /* Asegura que esté alineado a la izquierda */
        transform: none; /* Elimina la transformación */
        margin-bottom: 80vw; /* Aumenta el margen inferior del contenedor */
        margin-top: -55vw; /* Reduce el espacio superior del contenedor del calendario */
    }

    .calendar-wrapper {
        margin-top: 5vw; /* Espacio adicional arriba para el contenedor azul */
        padding: 2.5vw; /* Ajusta el padding del contenedor azul */
    }
}


/* aqui va el diseno de la ultima parte de las actividades */
.full-box {
    width: 100vw; /* Ocupa todo el ancho de la pantalla */
    height: 600px; /* Ajusta la altura del cuadro según lo necesario */
    background-color: #3971FF; /* Color de fondo */
    margin-top: 150px;
    padding: 0; /* Sin padding alrededor del div */
    display: flex; /* Flexbox para centrar elementos dentro */
    flex-direction: column; /* Cambia la dirección del flex a columna */
    align-items: center; /* Centra el contenido horizontalmente */
    justify-content: flex-start; /* Alinea el contenido al inicio (parte superior) */
}

.title {
    color: white; /* Color de texto en blanco para el título */
    margin: 20px 0 0 0; /* Espaciado superior, sin margen inferior */
    text-align: center; /* Centra el título */
    font-size: 24px; /* Ajusta el tamaño de la fuente según lo necesario */
    font-weight: bold; /* Aplica negrita si es necesario */
}

.full-box .title {
    color: white; /* Asegúrate de que el color blanco se aplique aquí */
}

.description {
    color: white; /* Color de texto en blanco para la descripción */
    margin: 5px 0 0 0; /* Espaciado superior, sin margen inferior */
    text-align: center; /* Centra la descripción */
}


.gradient-box {
    width: 70vw; /* Ocupa el 80% del ancho de la pantalla */
    height: 300px; /* Ajusta la altura según lo necesario */
    background: linear-gradient(to right, #3971FF, #1F376F); /* Degradado de izquierda a derecha */
    margin-top: 20px; /* Espacio entre el texto y el cuadro de degradado */
    border-radius: 25px; /* Bordes redondeados */
    display: flex; /* Flexbox para centrar elementos dentro */
    flex-direction: column; /* Cambia la dirección del flex a columna */
    align-items: center; /* Centra horizontalmente el contenido */
    justify-content: center; /* Centra verticalmente el contenido */
}


.grid-container {
    display: grid; /* Usamos grid para la cuadrícula */
    grid-template-columns: repeat(6, 1fr); /* 6 columnas */
    grid-template-rows: repeat(2, 1fr); /* 2 filas */
    gap: 10px; /* Espacio entre los elementos de la cuadrícula */
    width: 80%; /* Ocupa todo el ancho del gradient-box */
    height: 80%; /* Ocupa toda la altura del gradient-box */
    

}


.number {
    font-size: 24px;
    font-weight: bold;
    text-align: center;
    margin: 0;
    padding: 5px 0;
    line-height: 1;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #87CEFA; /* Color celeste para el texto */
}

.event-text {
    font-size: 9px;
    text-align: center;
    margin: 0;
    padding: 5px 0;
    line-height: 1;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #87CEFA; /* Color celeste para el texto */
}



.grid-item {
    background-color: white;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 10px;
    gap: 5px;
    height: 100px; /* Ajusta según el tamaño deseado */
    overflow: hidden; /* Evita que el contenido desborde */
    transition: transform 0.3s ease; /* Suaviza la transición */

}

.grid-item:hover{
    transform: scale(1.05); /* Agranda todo el contenedor al pasar el cursor */
}



/* Ajustes generales para dispositivos móviles */
@media (max-width: 768px) {
    .full-box {
        height: auto; /* Permitir que la altura se ajuste automáticamente */
        padding: 20px; /* Agregar algo de padding */
    }

    .title {
        font-size: 20px; /* Ajustar tamaño de fuente para el título */
        margin: 10px 0; /* Reducir margen superior */
    }

    .description {
        font-size: 12px; /* Ajustar tamaño de fuente para la descripción */
        margin: 5px 0; /* Reducir margen superior */
    }

    .gradient-box {
        width: 90vw; /* Ajustar ancho del cuadro degradado */
        height: auto; /* Permitir que la altura se ajuste automáticamente */
        padding: 10px; /* Agregar padding interno */
    }

    .grid-container {
        grid-template-columns: repeat(3, 1fr); /* 3 columnas en móviles */
        width: 100%; /* Asegurar que ocupe todo el ancho disponible */
        height: auto; /* Permitir que la altura se ajuste automáticamente */
    }

    .grid-item {
        height: auto; /* Ajustar altura automáticamente */
        padding: 5px; /* Reducir padding */
    }
}


/* Ajustes para tabletas */
@media (min-width: 769px) and (max-width: 1024px) {
    .full-box {
        height: 550px; /* Altura fija para tabletas */
    }

    .title {
        font-size: 22px; /* Ajustar tamaño de fuente para el título */
    }

    .description {
        font-size: 14px; /* Ajustar tamaño de fuente para la descripción */
    }

    .gradient-box {
        width: 80vw; /* Ajustar ancho del cuadro degradado */
        height: 400px; /* Altura fija para tabletas */
    }

    .grid-container {
        grid-template-columns: repeat(4, 1fr); /* 4 columnas en tabletas */
    }
}


/* Ajustes para pantallas grandes */
@media (min-width: 1025px) {
    .full-box {
        height: 500px; /* Altura original para pantallas grandes */
    }

    .gradient-box {
        width: 70vw; /* Mantener ancho original */
        height: 300px; /* Mantener altura original */
    }

    .grid-container {
        grid-template-columns: repeat(6, 1fr); /* 6 columnas en pantallas grandes */
    }
}


</style>






<div class="container main-content">
        <div class="row justify-content-center align-items-center">
            <!-- Contenedor Izquierdo -->
            <div class="col-12 col-md-6 text-center">
                <img src="images/bienvenidosiif.png" alt="Bienvenidos" class="img-fluid">
                <h5>Tu plataforma integral para gestionar tus procesos administrativos de manera rápida y eficiente. 
                    Aquí podrás acceder a diversos trámites institucionales con solo unos clics. Simplifica tus procesos 
                    con nosotros y descubre lo fácil que puede ser.
                    <br><br>
                    Como FUSALMO, nos enorgullecemos de nuestra propuesta educativa digital para generar impacto en 
                    nuestra juventud salvadoreña.
                </h5>
            </div>
            <!-- Imagen Derecha -->
            <div class="col-12 col-md-6 text-center">
                <img src="images/computadorasiif.png" alt="Computadora SIIF" class="img-fluid computadorasiif">
            </div>
        </div>
    </div>

</br>
<div>
    <h3>Explora nuestras plataformas</h3>
    <div class="button-container">
        <a href="https://transformaedu.fusalmo.org" class="button">Transforma EDU</a>
        <a href="https://transformapro.fusalmo.org" class="button">Transforma PRO</a>
        <a href="https://transformaedu.fusalmo.org/formas-home/" class="button">FORMA</a>
    </div>
</div>


<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



// Define el mes actual como valor por defecto
$currentMonth = isset($_GET['month']) ? intval($_GET['month']) : date('n'); // 'n' devuelve el mes sin ceros
$currentYear = date('Y'); // Año actual

// Arreglo de meses en español
$meses = [
    1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
    5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
    9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
];

// Consulta de cumpleaños
$query = "
SELECT
    e.id,
    CONCAT_WS(
        ' ',
        e.name1,
        e.name2,
        e.name3,
        e.lastname1,
        e.lastname2
    ) AS FullName,
    DAY(e.birthday) AS BirthdayDay,
    a.area, p.picture
FROM
    employee AS e 
    INNER JOIN employee_picture AS p ON p.idemployee = e.id
    INNER JOIN workarea_positions_assignment AS ca ON ca.idemployee = e.id
    INNER JOIN workarea_positions AS c ON c.id = ca.idposition
    INNER JOIN workarea AS a ON c.idarea = a.id
WHERE
    MONTH(e.birthday) = :selectedMonth AND ca.enddate = '0000-00-00'
    AND a.visible=1
ORDER BY
    DAY(e.birthday) ASC;
";

$bithday = $net_rrhh->prepare($query);
$bithday->bindParam(':selectedMonth', $currentMonth, PDO::PARAM_INT);
$bithday->execute();
?>

<script>
let currentMonth = <?php echo $currentMonth - 1; ?>; // Mes 0-11 para JavaScript
let currentYear = <?php echo $currentYear; ?>; // Obtener el año actual
const monthTitle = document.getElementById('monthTitle');

// Función para actualizar los días del calendario
function updateCalendarDays() {
    const daysContainer = document.querySelector('.calendar-grid ol');
    daysContainer.innerHTML = ''; 

    // Agregando los nombres de los días
    const dayNames = ['D', 'L', 'M', 'M', 'J', 'V', 'S'];
    dayNames.forEach(day => {
        const dayNameElement = document.createElement('li');
        dayNameElement.className = 'day-name';
        dayNameElement.textContent = day;
        daysContainer.appendChild(dayNameElement);
    });

    // Calcular el primer día del mes y el total de días
    const firstDay = new Date(currentYear, currentMonth, 1);
    const lastDay = new Date(currentYear, currentMonth + 1, 0);
    const firstDayIndex = firstDay.getDay();

    // Agregar días en blanco antes del primer día del mes
    for (let i = 0; i < firstDayIndex; i++) {
        const blankDay = document.createElement('li');
        daysContainer.appendChild(blankDay);
    }

    // Agregar los días del mes actual
    for (let day = 1; day <= lastDay.getDate(); day++) {
        const dayElement = document.createElement('li');
        dayElement.textContent = day;
        daysContainer.appendChild(dayElement);
    }
}


// Función para actualizar el mes
function updateMonth(increment) {
    currentMonth += increment;

    if (currentMonth < 0) {
        currentMonth = 11;
        currentYear--;
    } else if (currentMonth > 11) {
        currentMonth = 0;
        currentYear++;
    }

    // Cargar los nuevos datos del mes usando AJAX
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '?view=home2&month=' + (currentMonth + 1), true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            const response = xhr.responseText;
            const tempDiv = document.createElement('div');
            tempDiv.innerHTML = response;
            document.querySelector('.calendar-content').innerHTML = tempDiv.querySelector('.calendar-content').innerHTML;

            monthTitle.textContent = new Date(currentYear, currentMonth).toLocaleString('es-ES', { month: 'long' }) + ' ' + currentYear;

            updateCalendarDays();

            // Cargar imágenes visibles inicialmente
            const birthdayImages = document.querySelectorAll('.birthday-image');
            birthdayImages.forEach(img => {
                // Carga la imagen si ya está en la ventana de visualización
                if (img.getBoundingClientRect().top < window.innerHeight && img.getBoundingClientRect().bottom >= 0) {
                    img.src = img.dataset.src; // Asigna el src
                } else {
                    // Si no está visible, configurar el IntersectionObserver
                    const observer = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                img.src = img.dataset.src; // Asigna el src
                                observer.disconnect(); // Deja de observar una vez que se carga la imagen
                            }
                        });
                    });
                    observer.observe(img); // Observar la imagen
                }
            });
        }
    };
    xhr.send();
}

// Al cargar la página por primera vez, carga imágenes iniciales
document.addEventListener('DOMContentLoaded', () => {
    const birthdayImages = document.querySelectorAll('.birthday-image');
    birthdayImages.forEach(img => {
        img.src = img.dataset.src; // Cargar la imagen inicialmente
    });
});



// Botones de mes anterior y siguiente
document.getElementById('prevMonth').addEventListener('click', () => updateMonth(-1));
document.getElementById('nextMonth').addEventListener('click', () => updateMonth(1));

// Inicializa los días del calendario la primera vez
updateCalendarDays();
</script>


<div class="full-box">
    <div class="title">Actividades de Noviembre</div>
    <p class="description">Mantente al tanto de las actividades por realizar este mes.</p>
    <div class="gradient-box">
    <div class="grid-container">
            <div class="grid-item">
                <span class="number">07</span>
                <span class="event-text">Entrega de donativo</span>
            </div>
            <div class="grid-item">
                <span class="number">08</span>
                <span class="event-text">Feria de Oportunidades</span>
            </div>
            <div class="grid-item">
                <span class="number">09</span>
                <span class="event-text">Premiación final de torneo infantil y pony del Oratorio FUSALMO Soyapango</span>
            </div>
            <div class="grid-item">
                <span class="number">13</span>
                <span class="event-text">Clausura de Talleres FABLAB</span>
            </div>
            <div class="grid-item">
                <span class="number">15</span>
                <span class="event-text">¿Inteligencia emocional o coeficiente intelectual?</span>
            </div>
            <div class="grid-item">
                <span class="number">17</span>
                <span class="event-text">Recibimiento del sacramento de la Confirmación, Oratorio FUSALMO Soyapango</span>
            </div>
            <div class="grid-item">
                <span class="number">18</span>
                <span class="event-text">Inicio de Verano Aventura FUSALMO Soyapango y Santa Ana</span>
            </div>
            <div class="grid-item">
                <span class="number">19</span>
                <span class="event-text">Inicio de Verano Aventura FUSALMO San Miguel</span>
            </div>
            <div class="grid-item">
                <span class="number">22</span>
                <span class="event-text">Webinar: Conoce TransformaPro</span>
            </div>
            <div class="grid-item">
                <span class="number">26</span>
                <span class="event-text">Comunidad de Práctica Educativa, Proyecto Innovación Educativa</span>
            </div>
            <div class="grid-item">
                <span class="number">29</span>
                <span class="event-text">Webinar: Los sí los no en una entrevista de trabajo, por Global Outsorcing</span>
            </div>
            <div class="grid-item">
                <span class="number">30</span>
                <span class="event-text">sin actividades</span>
            </div>
            
        </div>     
    </div>
</div>
