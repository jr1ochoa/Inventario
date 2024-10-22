<style>
    body {
        margin: 0;
        padding: 0;
        min-height: 100vh; 
        display: flex;
        flex-direction: column; 
    }

    .main-content {
        flex-grow: 1; 
        display: flex;
        align-items: center;
        justify-content: flex-start;
        height: 100vh;
    }

    .left-container {
        width: 40%;
        padding: 20px;
        left: 0;
        top: 50px;
    }

    h1, h3, h5 {
        margin: 0;
    }

    h1 {
        font-size: 2em;
        text-align: center;
        line-height: 1.5; 
    }

    h3 {
        font-size: 1.5em;
        text-align: center;
        line-height: 1.5;
    }

    h5 {
        font-size: 1em;
        text-align: center; /* Cambiado a center */
        line-height: 1.5;
        height: 6em; 
        overflow: hidden; 
    }

    /* Estilo para centrar el texto del h5 */
    .centered-text {
        margin: 200px auto; 
        max-width: 1150px; 
        text-align: justify; /* Alinear el texto justificado */
    }

    /* Aquí agrego los estilos para los botones */
    .button-container {
        display: flex;
        justify-content: center;
        width: 100%;
        margin-top: 20px; 
    }

    .button-container button {
        width: 10%; 
        padding: 8px 0; 
        margin: 0 38px; 
        background-color: white; 
        color: #007BFF; 
        font-size: 0.9em; 
        border: 2px solid #007BFF; 
        cursor: pointer;
        text-transform: uppercase; 
        border-radius: 50px; 
    }

    .button-container button:hover {
        background-color: #007BFF; 
        color: white; 
    }



    .boxes-container {
    display: flex; /* Usar flexbox para alinear los cuadros horizontalmente */
    justify-content: center; /* Centrar los cuadros horizontalmente */
    margin: 20px auto; /* Margen vertical y centrado horizontal */
    max-width: 680px; /* Ajustar el ancho máximo para acomodar los cuadros */
}

.box {
    width: 300px; /* Ancho de cada cuadro */
    height: 300px; /* Altura de cada cuadro */
    background-color: lightgray; /* Color de fondo gris */
    border: 1px solid #ccc; /* Opcional: borde para los cuadros */
    display: flex; /* Usar flexbox para centrar el contenido */
    align-items: center; /* Centrar verticalmente */
    justify-content: center; /* Centrar horizontalmente */
    font-size: 1.2em; /* Tamaño de fuente */
    margin: 0 10px; /* Margen horizontal entre los cuadros */
}



</style>

<div class="main-content">
    <div class="left-container">
        <h1>Bienvenido al SIIF</h1>
        <h3>Sistema de información institucional Fusalmo</h3>
        <h5> Tu plataforma integral para gestionar tus procesos administrativos de manera rápida y eficiente. 
             Aquí podrás acceder a diversos trámites institucionales con solo unos clics. Simplifica tus procesos 
             con nosotros y descubre lo fácil que puede ser.
        <br>
             Como FUSALMO, nos enorgullecemos de nuestra propuesta educativa digital para generar impacto en 
             nuestra juventud salvadoreña.
        </h5> 
    </div>
</div>

<div>
    <h3>Explora nuestras plataformas</h3>
    <div class="button-container">
        <button>Transforma EDU</button>
        <button>Transforma PRO</button>
        <button>FORMA</button>
    </div>
</div>

<div class="centered-text">
    <h3>¿Qué solicitudes puedes realizar en el SIIF?</h3>
    <h5>Descubra una amplia gama de procesos para facilitar su gestión administrativa. 
        Gestiona tus permisos y solicitudes de forma ágil y efectiva. Explora cada 
        sección para optimizar tu experiencia y aprovechar al máximo nuestras herramientas.
    </h5>
</div>


<div class="boxes-container">
    <div class="box">Cuadro 1</div>
    <div class="box">Cuadro 2</div>
    <div class="box">Cuadro 3</div>
</div>