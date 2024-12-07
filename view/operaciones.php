<style>
    /* Importar la fuente Barlow desde Google Fonts */
    @import url('https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;700&display=swap');
    @import url('https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');

/* Estilos para el contenedor y el título */
.container {
    margin-top: 8%;
}

.title h2 {
    text-align: center;
    font-family: 'Barlow', sans-serif;  
    font-weight: 700;  
    font-size: 2.5em;
    color: #f5f7fb; 
    margin-bottom: 15px;
}

.title p {
    text-align: center;
    font-family: 'Barlow', sans-serif;  
    font-size: 1.5em;
    color: #20376F;  
    margin-top: 0;
}

.line {
    width: 100%; 
    height: 5px; /* Espesor de la línea */
    background-color: #ADD8E6; 
    margin-top: 10px; 
    margin-bottom: 50px;
}



/* Ajustes para pantallas pequeñas */
@media (max-width: 768px) {
    .title h2 {
        font-size: 2em;  
    }

    .title p {
        font-size: 1.2em; 
    }
}

@media (max-width: 576px) {
    .title h2 {
        font-size: 1.5em;  
    }

    .title p {
        font-size: 1.1em;  
    }
}


/*aqui va el CSS para los cuadros para los botones*/

/* Estilo general */
.carousel-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    padding: 20px;
    width: 100%;
}

/* Vista del carrusel */
.carousel-view {
    flex: 1 1 30%; 
    max-width: 30%;
    margin-bottom: 20px;
}

/* Contenedor gris */
.gray-box {
    background-color: #f5f7fb;
    width: 100%; /* Ocupa todo el ancho disponible */
    max-width: 350px; /* Límite máximo del ancho */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 5px;
    transition: transform 0.3s ease-in-out;
    margin: 0 auto;  
}



/* Efecto de zoom */
.gray-box:hover {
    transform: scale(1.1);
}

/* Imagen */
.img-new {
    width: 80px;
    height: 80px;
    object-fit: contain;
    margin-bottom: 10px;
}

/* Texto */
.overlay-text {
    font-size: 18px;
    color: #20376F;
    font-weight: bold;
    font-family: 'Arial', sans-serif;
}

/* Botón */
.btn-img1 {
    padding: 5px 40px;
    background-color: #4270FF;
    color: white;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    font-size: 14px;
    font-family: 'Arial', sans-serif;
    transition: background-color 0.3s ease;
}

.btn-img1:hover {
    background-color: #365bbf;
}

/* Responsividad */

/* Pantallas grandes (>1024px) */
@media (min-width: 1024px) {
    .carousel-view {
        flex: 1 1 30%; /* 3 elementos por fila */
        max-width: 30%;
    }
}

/* Pantallas medianas (768px - 1024px) */
@media (min-width: 768px) and (max-width: 1024px) {
    .carousel-view {
        flex: 1 1 45%; /* 2 elementos por fila */
        max-width: 45%;
    }
}

/* Pantallas pequeñas (menos de 768px) */
@media (max-width: 768px) {
    .carousel-view {
        flex: 1 1 90%; /* 1 elemento por fila */
        max-width: 90%;
    }

    .gray-box {
        width: 100%; /* Cuadro usa todo el ancho disponible */
        padding: 15px; /* Reducir el padding */
    }

    .btn-img1 {
        padding: 5px 30px; /* Ajustar tamaño del botón */
        font-size: 12px; /* Reducir tamaño del texto del botón */
    }

    .img-new {
        width: 60px; /* Reducir tamaño de la imagen */
        height: 60px;
    }
}


</style>

<!--Primera Parte del codigo-->

<div class="container">
    <div class="row">
        <div class="col-12 title">
            <h2>Direcciones de Operaciones</h2>
            <p>Completa el formulario correspondiente y envíalo para obtener la autorización necesaria</p>
            <div class="line"></div>
        </div>
    </div>
</div>

<!--Segunda Parte del codigo-->

<div class="carousel-container">

    <div class="carousel-view">
        <div class="box-img">
            <div class="gray-box">
                <img class="img-new" src="images/talentohumano.png" alt="Icono Talento Humano">
                <div class="overlay-text">Talento Humano</div>
                <a href="https://sii.fusalmo.org/?view=talentoHumanoHome" style="text-decoration: none;">
                    <button class="btn-img1">Acceder</button>
                </a>
            </div>
        </div>
    </div>


    <div class="carousel-view">
        <div class="box-img">
            <div class="gray-box">
                <img class="img-new" src="images/administracionyfinanzas.png" alt="Icono Talento Humano">
                <div class="overlay-text">Administracion Y finanzas</div>
                <a href="https://sii.fusalmo.org/?view=talentoHumanoHome" style="text-decoration: none;">
                    <button class="btn-img1">Acceder</button>
                </a>
            </div>
        </div>
    </div>


    <div class="carousel-view">
        <div class="box-img">
            <div class="gray-box">
                <img class="img-new" src="images/gestionalianzas.png" alt="Icono Talento Humano">
                <div class="overlay-text">Gestion y Alianzas</div>
                <a href="https://sii.fusalmo.org/?view=talentoHumanoHome" style="text-decoration: none;">
                    <button class="btn-img1">Acceder</button>
                </a>
            </div>
        </div>
    </div>


    <div class="carousel-view">
        <div class="box-img">
            <div class="gray-box">
                <img class="img-new" src="images/relacionespublicas.png" alt="Icono Talento Humano">
                <div class="overlay-text">Comunicacion y Relacion publica</div>
                <a href="https://sii.fusalmo.org/?view=talentoHumanoHome" style="text-decoration: none;">
                    <button class="btn-img1">Acceder</button>
                </a>
            </div>
        </div>
    </div>


    <div class="carousel-view">
        <div class="box-img">
            <div class="gray-box">
                <img class="img-new" src="images/sociolaborales.png" alt="Icono Talento Humano">
                <div class="overlay-text">Sociolaboral</div>
                <a href="https://sii.fusalmo.org/?view=talentoHumanoHome" style="text-decoration: none;">
                    <button class="btn-img1">Acceder</button>
                </a>
            </div>
        </div>
    </div>


    <div class="carousel-view">
        <div class="box-img">
            <div class="gray-box">
                <img class="img-new" src="images/encargadacumplimiento.png" alt="Icono Talento Humano">
                <div class="overlay-text">Encargada de cumplimiento</div>
                <a href="https://sii.fusalmo.org/?view=talentoHumanoHome" style="text-decoration: none;">
                    <button class="btn-img1">Acceder</button>
                </a>
            </div>
        </div>
    </div>


    <div class="carousel-view">
        <div class="box-img">
            <div class="gray-box">
                <img class="img-new" src="images/gestionaprendizaje.png" alt="Icono Talento Humano">
                <div class="overlay-text">Innovacion y Gestion de aprendizaje</div>
                <a href="https://sii.fusalmo.org/?view=talentoHumanoHome" style="text-decoration: none;">
                    <button class="btn-img1">Acceder</button>
                </a>
            </div>
        </div>
    </div>


</div>


