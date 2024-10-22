<?php include("../../../../config/net.php"); $valor = $_REQUEST['idProyecto'];
//include("../../config/net.php");

?>
<style>
     .fondoImagen {
    margin: 0;
    padding: 0;
    background-image: url('assets/images/retrato-jovenes-estudiantes-escuela.jpg'); /* Reemplaza 'ruta_de_tu_imagen.jpg' con la ruta de tu imagen de fondo */
    background-size: cover;
    background-position: center;
    height: 40vh;
    
    display: flex;
    align-items: center;
    justify-content: center;
    
}
.tamañoLetraDetalle{
    font-weight: 800;
    font-size: 64px;
}
</style>
<?php
$ano_actual = date("Y");
?>
<div class="fondoImagen">
      
<div class="row">
    <div class="col-md-8">
    <h1 style="color: white;" class="mx-3 colorTextoFondo tamañoLetraDetalle">
    
    <?php 
    
    $query = "SELECT * FROM proyecto_mapeo_comunidades where id=?   ";
    $data3 = $net_rrhh->prepare($query);
    $data3->execute([$valor]);
    while ($data = $data3->fetch()) {
       
            echo $data[3];
    }
    ?>
    
    <br>
          <?php echo $ano_actual; ?>
    </h1>
    </div>
    <div class="col-md">
    <div class="colorTextoFondo ">
    
    <div class="col-md-3 ">
       
    </div>

    

    <div class="col-md-6  " style="background-color: while;">
       
    </div>
</div>
    </div>
</div>
    



    </div>
<div class="container mt-4">

   <!-- <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalObjetivosGenerales"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-fill-add" viewBox="0 0 16 16">
  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0M8 1c-1.573 0-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4s.875 1.755 1.904 2.223C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777C13.125 5.755 14 5.007 14 4s-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1"/>
  <path d="M2 7v-.839c.457.432 1.004.751 1.49.972C4.722 7.693 6.318 8 8 8s3.278-.307 4.51-.867c.486-.22 1.033-.54 1.49-.972V7c0 .424-.155.802-.411 1.133a4.51 4.51 0 0 0-4.815 1.843A12 12 0 0 1 8 10c-1.573 0-3.022-.289-4.096-.777C2.875 8.755 2 8.007 2 7m6.257 3.998L8 11c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13h.027a4.55 4.55 0 0 1 .23-2.002m-.002 3L8 14c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-1.3-1.905"/>
</svg> AGREGAR CENTRO EDUCATIVO</button>-->
     
    <div id="loadListaCentrosEducativos"></div>

<div class="row">
        
    <div class="col-md">
       <!-- <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalLiderComunitario">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-fill-add" viewBox="0 0 16 16">
        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0M8 1c-1.573 0-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4s.875 1.755 1.904 2.223C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777C13.125 5.755 14 5.007 14 4s-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1"/>
        <path d="M2 7v-.839c.457.432 1.004.751 1.49.972C4.722 7.693 6.318 8 8 8s3.278-.307 4.51-.867c.486-.22 1.033-.54 1.49-.972V7c0 .424-.155.802-.411 1.133a4.51 4.51 0 0 0-4.815 1.843A12 12 0 0 1 8 10c-1.573 0-3.022-.289-4.096-.777C2.875 8.755 2 8.007 2 7m6.257 3.998L8 11c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13h.027a4.55 4.55 0 0 1 .23-2.002m-.002 3L8 14c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-1.3-1.905"/>
        </svg> AGREGAR LIDER</button>-->
        <div id="loadListaLideresComunitarios"></div>
    </div>


    <div class="col-md">
    <!--    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalCentroSalud"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-fill-add" viewBox="0 0 16 16">
        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0M8 1c-1.573 0-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4s.875 1.755 1.904 2.223C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777C13.125 5.755 14 5.007 14 4s-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1"/>
        <path d="M2 7v-.839c.457.432 1.004.751 1.49.972C4.722 7.693 6.318 8 8 8s3.278-.307 4.51-.867c.486-.22 1.033-.54 1.49-.972V7c0 .424-.155.802-.411 1.133a4.51 4.51 0 0 0-4.815 1.843A12 12 0 0 1 8 10c-1.573 0-3.022-.289-4.096-.777C2.875 8.755 2 8.007 2 7m6.257 3.998L8 11c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13h.027a4.55 4.55 0 0 1 .23-2.002m-.002 3L8 14c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-1.3-1.905"/>
        </svg>AGREGAR CENTRO SALUD</button>-->
        <div id="loadListaSalud"></div>
        </div>
    </div>


    <div class="row">
        <div class="col-md">
       <!-- <button type="button" class="btn btn-sm btn-success"data-bs-toggle="modal" data-bs-target="#exampleModalCanchas"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-fill-add" viewBox="0 0 16 16">
        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0M8 1c-1.573 0-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4s.875 1.755 1.904 2.223C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777C13.125 5.755 14 5.007 14 4s-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1"/>
        <path d="M2 7v-.839c.457.432 1.004.751 1.49.972C4.722 7.693 6.318 8 8 8s3.278-.307 4.51-.867c.486-.22 1.033-.54 1.49-.972V7c0 .424-.155.802-.411 1.133a4.51 4.51 0 0 0-4.815 1.843A12 12 0 0 1 8 10c-1.573 0-3.022-.289-4.096-.777C2.875 8.755 2 8.007 2 7m6.257 3.998L8 11c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13h.027a4.55 4.55 0 0 1 .23-2.002m-.002 3L8 14c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-1.3-1.905"/>
        </svg> AGREGAR CANCHAS</button> -->
            <div id="loadListaCanchas"></div>
        </div>

        <div class="col-md">
       <!-- <button type="button" class="btn btn-sm btn-success"data-bs-toggle="modal" data-bs-target="#exampleModalZonasVerdes"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-fill-add" viewBox="0 0 16 16">
        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0M8 1c-1.573 0-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4s.875 1.755 1.904 2.223C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777C13.125 5.755 14 5.007 14 4s-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1"/>
        <path d="M2 7v-.839c.457.432 1.004.751 1.49.972C4.722 7.693 6.318 8 8 8s3.278-.307 4.51-.867c.486-.22 1.033-.54 1.49-.972V7c0 .424-.155.802-.411 1.133a4.51 4.51 0 0 0-4.815 1.843A12 12 0 0 1 8 10c-1.573 0-3.022-.289-4.096-.777C2.875 8.755 2 8.007 2 7m6.257 3.998L8 11c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13h.027a4.55 4.55 0 0 1 .23-2.002m-.002 3L8 14c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-1.3-1.905"/>
        </svg> AGREGAR ZONA VERDES</button>-->
        <div id="loadListaZonaVerde"></div>
        </div>
    </div>


    <div class="row">
        <div class="col-md">
       <!-- <button type="button" class="btn btn-sm btn-success"data-bs-toggle="modal" data-bs-target="#exampleModalOrganizacionesComunitarias"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-fill-add" viewBox="0 0 16 16">
        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0M8 1c-1.573 0-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4s.875 1.755 1.904 2.223C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777C13.125 5.755 14 5.007 14 4s-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1"/>
        <path d="M2 7v-.839c.457.432 1.004.751 1.49.972C4.722 7.693 6.318 8 8 8s3.278-.307 4.51-.867c.486-.22 1.033-.54 1.49-.972V7c0 .424-.155.802-.411 1.133a4.51 4.51 0 0 0-4.815 1.843A12 12 0 0 1 8 10c-1.573 0-3.022-.289-4.096-.777C2.875 8.755 2 8.007 2 7m6.257 3.998L8 11c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13h.027a4.55 4.55 0 0 1 .23-2.002m-.002 3L8 14c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-1.3-1.905"/>
        </svg> AGREGAR ORGANIZACIONES COMUNITARIAS</button>-->
            <div id="loadListaOrganizacionComunitaria"></div>
        </div>

        <div class="col-md">
       <!-- <button type="button" class="btn btn-sm btn-success"data-bs-toggle="modal" data-bs-target="#exampleModalNecesidadComunitaria"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-fill-add" viewBox="0 0 16 16">
        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0M8 1c-1.573 0-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4s.875 1.755 1.904 2.223C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777C13.125 5.755 14 5.007 14 4s-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1"/>
        <path d="M2 7v-.839c.457.432 1.004.751 1.49.972C4.722 7.693 6.318 8 8 8s3.278-.307 4.51-.867c.486-.22 1.033-.54 1.49-.972V7c0 .424-.155.802-.411 1.133a4.51 4.51 0 0 0-4.815 1.843A12 12 0 0 1 8 10c-1.573 0-3.022-.289-4.096-.777C2.875 8.755 2 8.007 2 7m6.257 3.998L8 11c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13h.027a4.55 4.55 0 0 1 .23-2.002m-.002 3L8 14c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-1.3-1.905"/>
        </svg> AGREGAR NECESIDAD COMUNITARIA </button> -->
            <div id="loadListaNecesidadComunitaria"></div>
        </div>
    </div>

  
    <div class="col-md-12">
<style>
     .fondoImagen2 {
    margin: 0;
    padding: 0;
    background-image: url('assets/images/ejecutivo-negocios-masculino-dando-discurso.jpg'); /* Reemplaza 'ruta_de_tu_imagen.jpg' con la ruta de tu imagen de fondo */
    background-size: cover;
    background-position: center 18%; /* Ajusta aquí para mostrar más arriba o abajo */
    height: 20vh;  
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    margin-bottom: 12px;  
}
.tamañoLetraDetalle2{
    font-weight: 800;
    font-size: 25px;
}
</style>
    <div class="fondoImagen2">
    <div class="col-md-8">
    <h1 style="color: white;" class="mx-3 colorTextoFondo tamañoLetraDetalle2">
    
    
    
    <br>
         INSTITUCIONES QUE TRABAJAN EN EL TERRITORIO
    </h1>
    </div>

    </div>
    </div>
    <div class="row">
        <div class="col-md">
       <!-- <button type="button" class="btn btn-sm btn-success"data-bs-toggle="modal" data-bs-target="#exampleModalOrganizacionGubernamental"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-fill-add" viewBox="0 0 16 16">
        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0M8 1c-1.573 0-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4s.875 1.755 1.904 2.223C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777C13.125 5.755 14 5.007 14 4s-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1"/>
        <path d="M2 7v-.839c.457.432 1.004.751 1.49.972C4.722 7.693 6.318 8 8 8s3.278-.307 4.51-.867c.486-.22 1.033-.54 1.49-.972V7c0 .424-.155.802-.411 1.133a4.51 4.51 0 0 0-4.815 1.843A12 12 0 0 1 8 10c-1.573 0-3.022-.289-4.096-.777C2.875 8.755 2 8.007 2 7m6.257 3.998L8 11c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13h.027a4.55 4.55 0 0 1 .23-2.002m-.002 3L8 14c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-1.3-1.905"/>
        </svg> AGREGAR ORGANIZACION GUBERNAMENTALES</button> -->
        <div id="loadListaGubernamentales"></div>
        </div>


        <div class="col-md">
      <!--  <button type="button" class="btn btn-sm btn-success"data-bs-toggle="modal" data-bs-target="#exampleModalOrganizacionSocial"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-fill-add" viewBox="0 0 16 16">
        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0M8 1c-1.573 0-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4s.875 1.755 1.904 2.223C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777C13.125 5.755 14 5.007 14 4s-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1"/>
        <path d="M2 7v-.839c.457.432 1.004.751 1.49.972C4.722 7.693 6.318 8 8 8s3.278-.307 4.51-.867c.486-.22 1.033-.54 1.49-.972V7c0 .424-.155.802-.411 1.133a4.51 4.51 0 0 0-4.815 1.843A12 12 0 0 1 8 10c-1.573 0-3.022-.289-4.096-.777C2.875 8.755 2 8.007 2 7m6.257 3.998L8 11c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13h.027a4.55 4.55 0 0 1 .23-2.002m-.002 3L8 14c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-1.3-1.905"/>
        </svg> AGREGAR ORGANIZACION SOCIALES</button>-->
        <div id="loadListaSociales"></div>
        </div>

        
    </div>

    <div class="row">
        <div class="col-md">
      <!--  <button type="button" class="btn btn-sm btn-success"data-bs-toggle="modal" data-bs-target="#exampleModalOrganizacionAutonoma"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-fill-add" viewBox="0 0 16 16">
        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0M8 1c-1.573 0-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4s.875 1.755 1.904 2.223C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777C13.125 5.755 14 5.007 14 4s-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1"/>
        <path d="M2 7v-.839c.457.432 1.004.751 1.49.972C4.722 7.693 6.318 8 8 8s3.278-.307 4.51-.867c.486-.22 1.033-.54 1.49-.972V7c0 .424-.155.802-.411 1.133a4.51 4.51 0 0 0-4.815 1.843A12 12 0 0 1 8 10c-1.573 0-3.022-.289-4.096-.777C2.875 8.755 2 8.007 2 7m6.257 3.998L8 11c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13h.027a4.55 4.55 0 0 1 .23-2.002m-.002 3L8 14c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-1.3-1.905"/>
        </svg> AGREGAR ORGANIZACION AUTONOMAS</button>-->
        <div id="loadListaOrganizacionesAutonomas"></div>
        </div>


        <div class="col-md">
      <!--  <button type="button" class="btn btn-sm btn-success"data-bs-toggle="modal" data-bs-target="#exampleModalOtrasEntidades"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-fill-add" viewBox="0 0 16 16">
        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0M8 1c-1.573 0-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4s.875 1.755 1.904 2.223C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777C13.125 5.755 14 5.007 14 4s-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1"/>
        <path d="M2 7v-.839c.457.432 1.004.751 1.49.972C4.722 7.693 6.318 8 8 8s3.278-.307 4.51-.867c.486-.22 1.033-.54 1.49-.972V7c0 .424-.155.802-.411 1.133a4.51 4.51 0 0 0-4.815 1.843A12 12 0 0 1 8 10c-1.573 0-3.022-.289-4.096-.777C2.875 8.755 2 8.007 2 7m6.257 3.998L8 11c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13h.027a4.55 4.55 0 0 1 .23-2.002m-.002 3L8 14c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-1.3-1.905"/>
        </svg> AGREGAR OTRAS ENTIDADES</button> -->
        <div id="loadListaOtros"></div>
        </div>

        
    </div>

</div>
<style>
    .colorEncabezadoLista{
        background-color: #4F6FAE;
    }
</style>
<!--Modal CENTRO EDUCATIVO INICIO  -->
<div class="modal fade" id="exampleModalObjetivosGenerales" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header colorEncabezadoLista">
                    <h5 class="modal-title " id="exampleModalLabel" style="color: white; 
                        font-weight: 500;">REGISTRANDO CENTRO EDUCATIVO</h5>
                    <a type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="modal-body">
            <center>
                <img src="assets/images/maps_501999.png" width="10%">
            </center>
            <div class="row">
                    <!--<input type="hidden" value="<?php echo $idRelacionProyecto; ?>" id="idRelacionProyecto" >-->
                    <div class="col">
                    
                    <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label ">Nombre Centro Educativo: *</label>
                    <input class="form-control form-control-sm" type="text" id="nombre" placeholder=".form-control-sm" aria-label=".form-control-sm example">
                    </div>

                    <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label ">Link Siges: *</label>
                    <textarea rows="2" type="text" maxlength="200" class="form-control form-control-sm" id="linkSiges" placeholder="name@example.com"></textarea>
                    </div>

                    <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label ">Tipo de Centros educativos: *</label>
                    <select class="form-select form-select-sm" id="tipoCentro" aria-label=".form-select-sm example">
                        <option selected>SELEECIONE</option>
                        <option value="PUBLICO">PUBLICO</option>
                        <option value="PRIVADO">PRIVADO</option>
                        <option value="SEMI-PRIVADA">SEMI-PRIVADA</option>
                    </select>
                    </div>


                </div>
                
            </div>

            
            
        </div>
        <div class="modal-footer">
            <a type="button" id="cerrarBtnCentro"class="btn  btn-sm btn-danger" data-bs-dismiss="modal">CANCELAR</a>
            <a type="button" id="btnRegistrarCentro" class="btn  btn-sm btn-primary">REGISTRAR OBJETIVO</a>
        </div>
        <a class="btn btn-success" id="botonCargando"  style="display:none;"type="button" disabled>
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Loading...
    </a>
        </div>
    </div>
    </div> 
<!--MODAL CENTRO EDUCATIVOL FIN -->

<!--:::::::::.. MODAL LIDERES INICIO :::::::::::::::::::::::::::::::-->
<div class="modal fade" id="exampleModalLiderComunitario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header colorEncabezadoLista">
                    <h5 class="modal-title " id="exampleModalLabel" style="color: white; 
                        font-weight: 500;">REGISTRANDO LIDER COMUNITARIO</h5>
                    <a type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="modal-body">
            <center>
                <img src="assets/images/maps_501999.png" width="10%">
            </center>
            <div class="row">
                    <!--<input type="hidden" value="<?php echo $idRelacionProyecto; ?>" id="idRelacionProyecto" >-->
                    <div class="col">
                    
                        <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label ">Nombre Completo: *</label>
                        <input class="form-control form-control-sm" type="text" id="nombreCompleto" placeholder=".form-control-sm" aria-label=".form-control-sm example">
                        </div>

                        <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label ">Contactos: *</label>
                        <input class="form-control form-control-sm" type="text" id="contactos" placeholder=".form-control-sm" aria-label=".form-control-sm example">
                        </div>

                        <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label ">Contactos #2: *</label>
                        <input class="form-control form-control-sm" type="text" id="contactos2" placeholder=".form-control-sm" aria-label=".form-control-sm example">
                        </div>

                        <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label ">Cargo: *</label>
                        <input class="form-control form-control-sm" type="text" id="cargo" placeholder=".form-control-sm" aria-label=".form-control-sm example">
                        </div>

                    </div>
            </div>

            
            
        </div>
        <div class="modal-footer">
            <a type="button" id="cerrarBtnLideres"class="btn  btn-sm btn-danger" data-bs-dismiss="modal">CANCELAR</a>
            <a type="button" id="btnRegistrarLideresComunitarios" class="btn  btn-sm btn-primary">REGISTRAR LIDER COMUNITARIO</a>
        </div>
        <a class="btn btn-success" id="botonCargandoLideres"  style="display:none;"type="button" disabled>
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Loading...
    </a>
        </div>
    </div>
    </div> 
<!--MODAL LIDRES FIN-->

<!--MODAL CENTRO DE SALUD INICIO-->
<div class="modal fade" id="exampleModalCentroSalud" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header colorEncabezadoLista">
                    <h5 class="modal-title " id="exampleModalLabel" style="color: white; 
                        font-weight: 500;">REGISTRANDO CENTRO DE SALUD</h5>
                    <a type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="modal-body">
            <center>
                <img src="assets/images/maps_501999.png" width="10%">
            </center>
            <div class="row">
                    <!--<input type="hidden" value="<?php echo $idRelacionProyecto; ?>" id="idRelacionProyecto" >-->
                    <div class="col">
                    
                        <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label ">Nombre Centro de Salud: *</label>
                        <input class="form-control form-control-sm" type="text" id="nombreCentroSalud" placeholder=".form-control-sm" aria-label=".form-control-sm example">
                        </div>

                    </div>
            </div>

            
            
        </div>
        <div class="modal-footer">
            <a type="button" id="cerrarBtnCentroSalud"class="btn  btn-sm btn-danger" data-bs-dismiss="modal">CANCELAR</a>
            <a type="button" id="btnRegistrarCentroSalud" class="btn  btn-sm btn-primary">REGISTRAR CENTRO DE SALUD</a>
        </div>
        <a class="btn btn-success" id="botonCargandoCentroSalud"  style="display:none;"type="button" disabled>
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Loading...
    </a>
        </div>
    </div>
    </div> 
<!--MODAL CENTRO DE SALUD FIN -->

<!--MODAL INICIO CANCHAS -->
<div class="modal fade" id="exampleModalCanchas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header colorEncabezadoLista">
                    <h5 class="modal-title " id="exampleModalLabel" style="color: white; 
                        font-weight: 500;">REGISTRANDO CANCHAS DE LA COMUNIDAD</h5>
                    <a type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="modal-body">
            <center>
                <img src="assets/images/maps_501999.png" width="10%">
            </center>
            <div class="row">
                    <!--<input type="hidden" value="<?php echo $idRelacionProyecto; ?>" id="idRelacionProyecto" >-->
                    <div class="col">
                    
                        <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label ">CANTIDAD: *</label>
                        <input class="form-control form-control-sm" type="text" id="cantidad" placeholder=".form-control-sm" aria-label=".form-control-sm example">
                        </div>

                        <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label ">TIPO DE CANCHA: *</label>
                        <select class="form-select form-select-sm" id="tipoCancha" aria-label=".form-select-sm example">
                            <option selected>SELEECIONE</option>
                            <option value="FUTBOL">FUTBOL</option>
                            <option value="BÁSQUET">BÁSQUET</option>
                            <option value="VOLIBOL">VOLIBOL</option>
                        </select>
                        </div>
                    </div>
            </div>
            
        </div>
        <div class="modal-footer">
            <a type="button" id="cerrarBtnCanchas"class="btn  btn-sm btn-danger" data-bs-dismiss="modal">CANCELAR</a>
            <a type="button" id="btnRegistrarCanchas" class="btn  btn-sm btn-primary">REGISTRAR LIDER COMUNITARIO</a>
        </div>
        <a class="btn btn-success" id="botonCargandoCanchas"  style="display:none;"type="button" disabled>
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Loading...
    </a>
        </div>
    </div>
    </div> 
<!--MODAL FIN CANCHAS-->

<!--MODAL INICIO ZONA VERDES -->
<div class="modal fade" id="exampleModalZonasVerdes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header colorEncabezadoLista">
                    <h5 class="modal-title " id="exampleModalLabel" style="color: white; 
                        font-weight: 500;">REGISTRANDO ZONAS VERDES</h5>
                    <a type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="modal-body">
            <center>
                <img src="assets/images/maps_501999.png" width="10%">
            </center>
            <div class="row">
                    <!--<input type="hidden" value="<?php echo $idRelacionProyecto; ?>" id="idRelacionProyecto" >-->
                    <div class="col">
                    

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label ">TIPO DE ZONAS VERDES: *</label>
                        <select class="form-select form-select-sm" id="tipoZonaverde" aria-label=".form-select-sm example">
                            <option selected>SELEECIONE</option>
                            <option value="ZONAS VERDDES">ZONAS VERDDES</option>
                            <option value="PARQUESITOS">PARQUESITOS</option>
                        </select>
                        </div>


                        <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label ">CANTIDAD: *</label>
                        <input class="form-control form-control-sm" type="text" id="cantidadZonaVerde" placeholder=".form-control-sm" aria-label=".form-control-sm example">
                        </div>

                        
                    </div>
            </div>
            
        </div>
        <div class="modal-footer">
            <a type="button" id="cerrarBtnZonasVerdes"class="btn  btn-sm btn-danger" data-bs-dismiss="modal">CANCELAR</a>
            <a type="button" id="btnRegistrarZonasVerdes" class="btn  btn-sm btn-primary">REGISTRAR ZONAS VERDES</a>
        </div>
        <a class="btn btn-success" id="botonCargandoZonasVerdes"  style="display:none;"type="button" disabled>
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Loading...
    </a>
        </div>
    </div>
    </div> 
<!--MODAL FIN ZONA VERDES -->
<!--MODAL INICIO ORG COMUNITARIAS -->
<div class="modal fade" id="exampleModalOrganizacionesComunitarias" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header colorEncabezadoLista">
                    <h5 class="modal-title " id="exampleModalLabel" style="color: white; 
                        font-weight: 500;">REGISTRANDO ORGANIZACION COMUNITARIA</h5>
                    <a type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="modal-body">
            <center>
                <img src="assets/images/maps_501999.png" width="10%">
            </center>
            <div class="row">
                    <!--<input type="hidden" value="<?php echo $idRelacionProyecto; ?>" id="idRelacionProyecto" >-->
                    <div class="col">
                    

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label ">TIPO ORGANIZACIÓN COMUNITARIA: *</label>
                        <select class="form-select form-select-sm" id="tipoOrganizacionComunitaria" aria-label=".form-select-sm example">
                            <option selected>SELEECIONE</option>
                            <option>ADESCO</option>
                            <option>Juntas Directivas</option>
                            <option>Comités</option>
                            <option>Asociaciones</option>
                        </select>
                        </div>


                        <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label ">NOMBRE: *</label>
                        <input class="form-control form-control-sm" type="text" id="nombreOrganizacionComunitaria" placeholder=".form-control-sm" aria-label=".form-control-sm example">
                        </div>

                        <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label ">DESCRIPCION: *</label>
                        <textarea rows="2" type="text" maxlength="200" class="form-control form-control-sm" id="descripcionesOrganizacionComunitaria" placeholder="name@example.com"></textarea>
                        </div>

                        
                    </div>
            </div>
            
        </div>
        <div class="modal-footer">
            <a type="button" id="cerrarBtnOrganizacionComunitaria"class="btn  btn-sm btn-danger" data-bs-dismiss="modal">CANCELAR</a>
            <a type="button" id="btnRegistrarOrganizacionComunitaria" class="btn  btn-sm btn-primary">REGISTRAR ZONAS VERDES</a>
        </div>
        <a class="btn btn-success" id="botonCargandoOrganizacionComunitaria"  style="display:none;"type="button" disabled>
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Loading...
    </a>
        </div>
    </div>
    </div> 
<!--MODAL FIN ORG COMUNITARIAS -->

<!--MODAL INICIO NECESIDAD DE LA COMUNIDAD -->
<div class="modal fade" id="exampleModalNecesidadComunitaria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header colorEncabezadoLista">
                    <h5 class="modal-title " id="exampleModalLabel" style="color: white; 
                        font-weight: 500;">REGISTRANDO NECESIDAD COMUNITARIA</h5>
                    <a type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="modal-body">
            <center>
                <img src="assets/images/maps_501999.png" width="10%">
            </center>
            <div class="row">
                    <!--<input type="hidden" value="<?php echo $idRelacionProyecto; ?>" id="idRelacionProyecto" >-->
                    <div class="col">
                    

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label ">TIPO DE NECESIDAD COMUNITARIA: *</label>
                        <select class="form-select form-select-sm" id="tipoNecesidadesComunitaria" aria-label=".form-select-sm example">
                            <option selected>SELEECIONE</option>
                            <option>EDUCACIÓN</option>
                            <option>INFRAESTRUCTURA</option>
                            <option>SALUD</option>
                            <option>AMBIENTALES</option>
                            <option>DEPORTIVO/RECREATIVO</option>
                            <option>JURÍDICO</option>
                            <option>SOCIO LABORAL</option>
                            <option>AYUDA HUMANITARIA</option>
                        </select>
                        </div>


                        <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label ">DESCRIPCIÓN: *</label>
                        <textarea rows="2" type="text" maxlength="200" class="form-control form-control-sm" id="descripcionComunitaria" placeholder="name@example.com"></textarea>
                        </div>

                        

                        
                    </div>
            </div>
            
        </div>
        <div class="modal-footer">
            <a type="button" id="cerrarBtnNecesidadComunitaria"class="btn  btn-sm btn-danger" data-bs-dismiss="modal">CANCELAR</a>
            <a type="button" id="btnRegistrarNecesidadComunitaria" class="btn  btn-sm btn-primary">REGISTRAR ZONAS VERDES</a>
        </div>
        <a class="btn btn-success" id="botonCargandoNecesidadComunitaria"  style="display:none;"type="button" disabled>
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Loading...
    </a>
        </div>
    </div>
    </div> 
<!--MODAL FIN DE LA NECESIDAD DE LA COMUNIDAD-->

<!--MODAL INICIO ORGANIZACIONES GUBERNAMETALES -->
<div class="modal fade" id="exampleModalOrganizacionGubernamental" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header colorEncabezadoLista">
                    <h5 class="modal-title " id="exampleModalLabel" style="color: white; 
                        font-weight: 500;">REGISTRANDO ORGANIZACIÓN GUBERNAMENTAL</h5>
                    <a type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="modal-body">
            <center>
                <img src="assets/images/maps_501999.png" width="10%">
            </center>
            <div class="row">
                    <!--<input type="hidden" value="<?php echo $idRelacionProyecto; ?>" id="idRelacionProyecto" >-->
                    <div class="col">
                    

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label ">TIPO ORGANIZACIÓN GUBERNAMENTAL: *</label>
                        <select class="form-select form-select-sm" id="tipoOrganizacionGubernamentales" aria-label=".form-select-sm example">
                            <option selected>SELEECIONE</option>
                            <option>NINGUNA</option>
                            <option>MINISTERIO DE OBRAS PÚBLICAS</option>
                            <option>MINISTERIO DE JUSTICIA</option>
                            <option>POLICÍA NACIONAL CIVIL</option>
                        </select>
                        </div>

                        <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label ">DESCRIPCIÓN: *</label>
                        <textarea rows="2" type="text" maxlength="150" class="form-control form-control-sm" id="descripcionGubernamentales" placeholder="name@example.com"></textarea>
                        </div>
                    </div>
            </div>
            
        </div>
        <div class="modal-footer">
            <a type="button" id="cerrarBtnGubernamental"class="btn  btn-sm btn-danger" data-bs-dismiss="modal">CANCELAR</a>
            <a type="button" id="btnRegistrarGubernamental" class="btn  btn-sm btn-primary">REGISTRAR ZONAS VERDES</a>
        </div>
        <a class="btn btn-success" id="botonCargandoGubernamentales"  style="display:none;"type="button" disabled>
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Loading...
    </a>
        </div>
    </div>
    </div> 
<!--MODAL FIN ORGANIZACION GUBERNAMENTALES -->

<!--MODAL INICIO ORGANIZACIONES SOCIALES -->
<div class="modal fade" id="exampleModalOrganizacionSocial" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header colorEncabezadoLista">
                    <h5 class="modal-title " id="exampleModalLabel" style="color: white; 
                        font-weight: 500;">REGISTRANDO ORGANIZACIÓN SOCIALES</h5>
                    <a type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="modal-body">
            <center>
                <img src="assets/images/maps_501999.png" width="10%">
            </center>
            <div class="row">
                    <!--<input type="hidden" value="<?php echo $idRelacionProyecto; ?>" id="idRelacionProyecto" >-->
                    <div class="col">
                    

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label ">TIPO ORGANIZACIÓN SOCIAL: *</label>
                        <select class="form-select form-select-sm" id="tipoOrganizacionsSocial" aria-label=".form-select-sm example">
                            <option selected>SELEECIONE</option>
                            <option>FUNDACIONES</option>
                            <option>ONG´S</option>
                        </select>
                        </div>

                        <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label ">DESCRIPCIÓN: *</label>
                        <textarea rows="2" type="text" maxlength="150" class="form-control form-control-sm" id="descripcionOrganizacionSociales" placeholder="name@example.com"></textarea>
                        </div>

                        
                    </div>
            </div>
            
        </div>
        <div class="modal-footer">
            <a type="button" id="cerrarBtnOrgaSocial"class="btn  btn-sm btn-danger" data-bs-dismiss="modal">CANCELAR</a>
            <a type="button" id="btnRegistrarOrgaSocial" class="btn  btn-sm btn-primary">REGISTRAR ZONAS VERDES</a>
        </div>
        <a class="btn btn-success" id="botonCargandoOrgaSocial"  style="display:none;"type="button" disabled>
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Loading...
    </a>
        </div>
    </div>
    </div> 
<!--MODAL FIN ORGANIZACION SOCIAL -->

<!--MODAL INICIO ORGANIZACIONES AUTONOMAS -->
<div class="modal fade" id="exampleModalOrganizacionAutonoma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header colorEncabezadoLista">
                    <h5 class="modal-title " id="exampleModalLabel" style="color: white; 
                        font-weight: 500;">REGISTRANDO ORGANIZACIÓN AUTONOMAS</h5>
                    <a type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="modal-body">
            <center>
                <img src="assets/images/maps_501999.png" width="10%">
            </center>
            <div class="row">
                    <!--<input type="hidden" value="<?php echo $idRelacionProyecto; ?>" id="idRelacionProyecto" >-->
                    <div class="col">
                    

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label ">TIPO ORGANIZACIÓN AUTONOMA: *</label>
                        <select class="form-select form-select-sm" id="tipoOrganizacionAutonoma" aria-label=".form-select-sm example">
                            <option>ALCALDÍA MUNICIPAL</option>
                        </select>
                        </div>
                        
                        
                        <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label ">DESCRIPCIÓN: *</label>
                        <textarea rows="2" type="text" maxlength="150" class="form-control form-control-sm" id="descripcionOrganizacionAutonomas" placeholder="name@example.com"></textarea>
                        </div>
                        
                    </div>
            </div>
            
        </div>
        <div class="modal-footer">
            <a type="button" id="cerrarBtnOrgaAutonoma"class="btn  btn-sm btn-danger" data-bs-dismiss="modal">CANCELAR</a>
            <a type="button" id="btnRegistrarAutonoma" class="btn  btn-sm btn-primary">REGISTRAR ZONAS VERDES</a>
        </div>
        <a class="btn btn-success" id="botonCargandoAutonoma"  style="display:none;"type="button" disabled>
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Loading...
    </a>
        </div>
    </div>
    </div> 
<!--MODAL FIN ORGANIZACION AUTONOMAS -->

<!--MODAL INICIO OTRAS ENTIDADES DE LA COMUNIDAD -->
<div class="modal fade" id="exampleModalOtrasEntidades" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header colorEncabezadoLista">
                    <h5 class="modal-title " id="exampleModalLabel" style="color: white; 
                        font-weight: 500;">REGISTRANDO OTRAS ENTIDADES DE LA COMUNIDAD</h5>
                    <a type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="modal-body">
            <center>
                <img src="assets/images/maps_501999.png" width="10%">
            </center>
            <div class="row">
                    <!--<input type="hidden" value="<?php echo $idRelacionProyecto; ?>" id="idRelacionProyecto" >-->
                    <div class="col">
                    

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label ">OTRAS ENTIDADES DE LA COMUNIDAD: *</label>
                        <select class="form-select form-select-sm" id="tipoOtrasEntidades" aria-label=".form-select-sm example">
                            <option>EMPRESAS PRIVADAS</option>
                        </select>
                        </div>

                        <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label ">Nombre Empresa: </label>
                        <textarea rows="2" type="text" maxlength="150" class="form-control form-control-sm" id="descripcionNombreEntidades" placeholder="name@example.com"></textarea>
                        </div>

                        <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label ">DESCRIPCIÓN: *</label>
                        <textarea rows="2" type="text" maxlength="150" class="form-control form-control-sm" id="descripcionEntidadesComunidad" placeholder="name@example.com"></textarea>
                        </div>
                        
                    </div>
            </div>
            
        </div>
        <div class="modal-footer">
            <a type="button" id="cerrarBtnOtrasEntidades"class="btn  btn-sm btn-danger" data-bs-dismiss="modal">CANCELAR</a>
            <a type="button" id="btnRegistrarOtrasEntidades" class="btn  btn-sm btn-primary">REGISTRAR ZONAS VERDES</a>
        </div>
        <a class="btn btn-success" id="botonCargandoOtrasEntidades"  style="display:none;"type="button" disabled>
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Loading...
    </a>
        </div>
    </div>
    </div> 
<!--MODAL FIN OTRAS ENTIDADES DE LA COMUNIDAD -->





<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>



<input type="hidden" value="<?php echo $valor; ?>" id="idRelacionProyecto" >
<script>
     //OBJETIVOS GENERALES ::::::::::::::::::::::::::::
     $("#loadListaCentrosEducativos").load("view/Operaciones/GestionProyectos/FichaComunitaria/GestionTerritorial.Tabla.CentrosEducativos.php",{
        idRelacion : $("#idRelacionProyecto").val()
    });
    //LIDERES
    $("#loadListaLideresComunitarios").load("view/Operaciones/GestionProyectos/FichaComunitaria/GestionTerritorial.Tabla.LideresComunitarios.php",{
        idRelacion : $("#idRelacionProyecto").val()
    });
    //CENTROS DE SALUD ::::::::::::::::::::::::::
    $("#loadListaSalud").load("view/Operaciones/GestionProyectos/FichaComunitaria/GestionTerritorial.Tabla.CentroSalud.php",{
        idRelacion : $("#idRelacionProyecto").val()
    });
    //CANCHAS ::::::::::::::::::::::::::::::::::
    $("#loadListaCanchas").load("view/Operaciones/GestionProyectos/FichaComunitaria/GestionTerritorial.Tabla.Canchas.php",{
        idRelacion : $("#idRelacionProyecto").val()
    });
    //ZONAS VERDES :::::::::::::::::::::::::::
    $("#loadListaZonaVerde").load("view/Operaciones/GestionProyectos/FichaComunitaria/GestionTerritorial.Tabla.ZonasVerdes.php",{
        idRelacion : $("#idRelacionProyecto").val()
    });
    //ORGANIZACIONES COMUNITARIAS :::::::::::::::::::::::::::::::::::::::::::
    $("#loadListaOrganizacionComunitaria").load("view/Operaciones/GestionProyectos/FichaComunitaria/GestionTerritorial.Tabla.OrganizacionComunitaria.php",{
        idRelacion : $("#idRelacionProyecto").val()
    });
    //NECESIDADES DE LA COMUNIDAD :::::::::::::::::::::::::::::::::::::::::::
    $("#loadListaNecesidadComunitaria").load("view/Operaciones/GestionProyectos/FichaComunitaria/GestionTerritorial.Tabla.NecesidadesComunitarias.php",{
        idRelacion : $("#idRelacionProyecto").val()
    });
    //ORGANIZACIONES GUBERNAMENTALES :::::::::::::::::::::::::::::::::::::::::::
    $("#loadListaGubernamentales").load("view/Operaciones/GestionProyectos/FichaComunitaria/GestionTerritorial.Tabla.Organizacion.Gubernametales.php",{
        idRelacion : $("#idRelacionProyecto").val()
    });
    //ORGANIZACIONES SOCIALES :::::::::::::::::::::::::::::::::::::::::::
    $("#loadListaSociales").load("view/Operaciones/GestionProyectos/FichaComunitaria/GestionTerritorial.Tabla.Organizaciones.Sociales.php",{
        idRelacion : $("#idRelacionProyecto").val()
    });
    //ORGANIZACIONES AUTONOMAS :::::::::::::::::::::::::::::::::::::::::::
    $("#loadListaOrganizacionesAutonomas").load("view/Operaciones/GestionProyectos/FichaComunitaria/GestionTerritorial.Tabla.Instituciones.Autonomas.php",{
        idRelacion : $("#idRelacionProyecto").val()
    });
    //ORGANIZACIONES OTROS :::::::::::::::::::::::::::::::::::::::::::
    $("#loadListaOtros").load("view/Operaciones/GestionProyectos/FichaComunitaria/GestionTerritorial.Tabla.Otros.php",{
        idRelacion : $("#idRelacionProyecto").val()
    });
//::::: REGISTRANDO OTRAS ENTIDADES :::::::::::::::::::::::::::::::::::::::::::
$("#btnRegistrarOtrasEntidades").click(function() {
           document.getElementById("botonCargandoOtrasEntidades").style.display="";
            $.post("process/index.php", {
                process: "proyectos",
                action: "addOtrasEntidades",

                tipoOtrasEntidades     : $("#tipoOtrasEntidades").val(), 
                descripcionEntidadesComunidad : $("#descripcionEntidadesComunidad").val(),
                descripcionNombreEntidades : $("#descripcionNombreEntidades").val(),
                idRelacion     : $("#idRelacionProyecto").val()

            },
            function(response){
                if(response)
                {
                    document.getElementById("botonCargandoOtrasEntidades").style.display="none";
                $.toast({
                    heading: 'Finalizado',
                    text: response,//'Personal del Proyecto Agregado 😁',
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: 5000, 
                    position: 'bottom-center'
                });
                document.getElementById("cerrarBtnOtrasEntidades").click();
                $("#loadListaOtros").load("view/Operaciones/GestionProyectos/FichaComunitaria/GestionTerritorial.Tabla.Otros.php",{
        idRelacion : $("#idRelacionProyecto").val()
    });
                }
                else
                {
                    document.getElementById("botonCargandoOtrasEntidades").style.display="none";
                $.toast({
                    heading: 'ERRORRRRRRR',
                    text: 'Problemas al registrar la vinculacion  😐',
                    showHideTransition: 'slide',
                    icon: 'error',
                    hideAfter: 5000, 
                    position: 'bottom-center'
                });
                
                }
                
            });
        }); 
//::::: REGISTRANDO ORGANIZACION AUTONOMAS ::::::::::::::::::::::::::::::::::::
$("#btnRegistrarAutonoma").click(function() {
           document.getElementById("botonCargandoAutonoma").style.display="";
            $.post("process/index.php", {
                process: "proyectos",
                action: "addOrganizacionAutonoma",

                tipoOrganizacionAutonoma     : $("#tipoOrganizacionAutonoma").val(), 
                descripcionOrganizacionAutonomas : $("#descripcionOrganizacionAutonomas").val(),
                idRelacion     : $("#idRelacionProyecto").val()

            },
            function(response){
                if(response)
                {
                    document.getElementById("botonCargandoAutonoma").style.display="none";
                $.toast({
                    heading: 'Finalizado',
                    text: response,//'Personal del Proyecto Agregado 😁',
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: 5000, 
                    position: 'bottom-center'
                });
                document.getElementById("cerrarBtnOrgaAutonoma").click();
                $("#loadListaOrganizacionesAutonomas").load("view/Operaciones/GestionProyectos/FichaComunitaria/GestionTerritorial.Tabla.Instituciones.Autonomas.php",{
        idRelacion : $("#idRelacionProyecto").val()
    });
                }
                else
                {
                    document.getElementById("botonCargandoAutonoma").style.display="none";
                $.toast({
                    heading: 'ERRORRRRRRR',
                    text: 'Problemas al registrar la vinculacion  😐',
                    showHideTransition: 'slide',
                    icon: 'error',
                    hideAfter: 5000, 
                    position: 'bottom-center'
                });
                
                }
                
            });
        }); 
//::::: REGISTRANDO ORGANIZACION AUTONOMAS ::::::::::::::::::::::::::::::::::::
$("#btnRegistrarOrgaSocial").click(function() {
           document.getElementById("botonCargandoOrgaSocial").style.display="";
            $.post("process/index.php", {
                process: "proyectos",
                action: "addOrganizacionSocial",

                tipoOrganizacionsSocial     : $("#tipoOrganizacionsSocial").val(), 
                descripcionOrganizacionSociales : $("#descripcionOrganizacionSociales").val(),
                idRelacion     : $("#idRelacionProyecto").val()

            },
            function(response){
                if(response)
                {
                    document.getElementById("botonCargandoOrgaSocial").style.display="none";
                $.toast({
                    heading: 'Finalizado',
                    text: response,//'Personal del Proyecto Agregado 😁',
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: 5000, 
                    position: 'bottom-center'
                });
                document.getElementById("cerrarBtnOrgaSocial").click();
                $("#loadListaSociales").load("view/PanelProyectos/GestionTerritorial/GestionTerritorialFichaComunitaria/GestionTerritorial.Tabla.Organizaciones.Sociales.php",{
        idRelacion : $("#idRelacionProyecto").val()
    });
                }
                else
                {
                    document.getElementById("botonCargandoOrgaSocial").style.display="none";
                $.toast({
                    heading: 'ERRORRRRRRR',
                    text: 'Problemas al registrar la vinculacion  😐',
                    showHideTransition: 'slide',
                    icon: 'error',
                    hideAfter: 5000, 
                    position: 'bottom-center'
                });
                
                }
                
            });
        }); 
//::::: REGISTRANDO ORGANIZACIONES GUBERNAMENTALES :::::::::::::::::::::::::
$("#btnRegistrarGubernamental").click(function() {
           document.getElementById("botonCargandoGubernamentales").style.display="";
            $.post("process/index.php", {
                process: "proyectos",
                action: "addOrganizacionGubernametal",

                tipoOrganizacionGubernamentales     : $("#tipoOrganizacionGubernamentales").val(), 
                descripcionGubernamentales : $("#descripcionGubernamentales").val(),
                idRelacion     : $("#idRelacionProyecto").val()

            },
            function(response){
                if(response)
                {
                    document.getElementById("botonCargandoGubernamentales").style.display="none";
                $.toast({
                    heading: 'Finalizado',
                    text: response,//'Personal del Proyecto Agregado 😁',
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: 5000, 
                    position: 'bottom-center'
                });
                document.getElementById("cerrarBtnGubernamental").click();
                $("#loadListaGubernamentales").load("view/PanelProyectos/GestionTerritorial/GestionTerritorialFichaComunitaria/GestionTerritorial.Tabla.Organizacion.Gubernametales.php",{
        idRelacion : $("#idRelacionProyecto").val()
    });
                }
                else
                {
                    document.getElementById("botonCargandoGubernamentales").style.display="none";
                $.toast({
                    heading: 'ERRORRRRRRR',
                    text: 'Problemas al registrar la vinculacion  😐',
                    showHideTransition: 'slide',
                    icon: 'error',
                    hideAfter: 5000, 
                    position: 'bottom-center'
                });
                
                }
                
            });
        }); 
//::::: REGISTRANDO NECESIDADES COMUNITARIAS  ::::::::::::::::::::::::::::::
$("#btnRegistrarNecesidadComunitaria").click(function() {
           document.getElementById("botonCargandoNecesidadComunitaria").style.display="";
            $.post("process/index.php", {
                process: "proyectos",
                action: "addNecesidadComunitaria",
                tipoNecesidadesComunitaria     : $("#tipoNecesidadesComunitaria").val(), 
                descripcionComunitaria   : $("#descripcionComunitaria").val(),
                idRelacion     : $("#idRelacionProyecto").val()

            },
            function(response){
                if(response)
                {
                    document.getElementById("botonCargandoNecesidadComunitaria").style.display="none";
                $.toast({
                    heading: 'Finalizado',
                    text: response,//'Personal del Proyecto Agregado 😁',
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: 5000, 
                    position: 'bottom-center'
                });
                document.getElementById("cerrarBtnNecesidadComunitaria").click();
                $("#loadListaNecesidadComunitaria").load("view/PanelProyectos/GestionTerritorial/GestionTerritorialFichaComunitaria/GestionTerritorial.Tabla.NecesidadesComunitarias.php",{
        idRelacion : $("#idRelacionProyecto").val()
    });
                }
                else
                {
                    document.getElementById("botonCargandoNecesidadComunitaria").style.display="none";
                $.toast({
                    heading: 'ERRORRRRRRR',
                    text: 'Problemas al registrar la vinculacion  😐',
                    showHideTransition: 'slide',
                    icon: 'error',
                    hideAfter: 5000, 
                    position: 'bottom-center'
                });
                
                }
                
            });
        }); 
//::::: REGISTRANDO ORGANIZACIONES COMUNITARIAS ::::::::::::::::::::::::::::
$("#btnRegistrarOrganizacionComunitaria").click(function() {
           document.getElementById("botonCargandoOrganizacionComunitaria").style.display="";
            $.post("process/index.php", {
                process: "proyectos",
                action: "addOrganizacionesComunitarias",
                tipoOrganizacionComunitaria     : $("#tipoOrganizacionComunitaria").val(), 
                nombreOrganizacionComunitaria   : $("#nombreOrganizacionComunitaria").val(),
                descripcionesOrganizacionComunitaria   : $("#descripcionesOrganizacionComunitaria").val(), 
                idRelacion     : $("#idRelacionProyecto").val()

            },
            function(response){
                if(response)
                {
                    document.getElementById("botonCargandoOrganizacionComunitaria").style.display="none";
                $.toast({
                    heading: 'Finalizado',
                    text: response,//'Personal del Proyecto Agregado 😁',
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: 5000, 
                    position: 'bottom-center'
                });
                document.getElementById("cerrarBtnOrganizacionComunitaria").click();
                $("#loadListaOrganizacionComunitaria").load("view/PanelProyectos/GestionTerritorial/GestionTerritorialFichaComunitaria/GestionTerritorial.Tabla.OrganizacionComunitaria.php",{
        idRelacion : $("#idRelacionProyecto").val()
    });
                }
                else
                {
                    document.getElementById("botonCargandoOrganizacionComunitaria").style.display="none";
                $.toast({
                    heading: 'ERRORRRRRRR',
                    text: 'Problemas al registrar la vinculacion  😐',
                    showHideTransition: 'slide',
                    icon: 'error',
                    hideAfter: 5000, 
                    position: 'bottom-center'
                });
                
                }
                
            });
        }); 
//::::: REGISTRANDO ZONAS VERDES  ::::::::::::::::::::::::::::::::::::::::::
$("#btnRegistrarZonasVerdes").click(function() {
           document.getElementById("botonCargandoZonasVerdes").style.display="";
            $.post("process/index.php", {
                process: "proyectos",
                action: "addZonaVerde",

                tipoZonaverde       : $("#tipoZonaverde").val(), 
                cantidadZonaVerde   : $("#cantidadZonaVerde").val(), 
                idRelacion     : $("#idRelacionProyecto").val()

            },
            function(response){
                if(response)
                {
                    document.getElementById("botonCargandoZonasVerdes").style.display="none";
                $.toast({
                    heading: 'Finalizado',
                    text: response,//'Personal del Proyecto Agregado 😁',
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: 5000, 
                    position: 'bottom-center'
                });
                document.getElementById("cerrarBtnZonasVerdes").click();
                $("#loadListaZonaVerde").load("view/PanelProyectos/GestionTerritorial/GestionTerritorialFichaComunitaria/GestionTerritorial.Tabla.ZonasVerdes.php",{
        idRelacion : $("#idRelacionProyecto").val()
    });
                }
                else
                {
                    document.getElementById("botonCargandoZonasVerdes").style.display="none";
                $.toast({
                    heading: 'ERRORRRRRRR',
                    text: 'Problemas al registrar la vinculacion  😐',
                    showHideTransition: 'slide',
                    icon: 'error',
                    hideAfter: 5000, 
                    position: 'bottom-center'
                });
                
                }
                
            });
        });  
//::::: REGISTRANDO CANCHAS ::::::::::::::::::::::::::::::::::::::::::::::::
$("#btnRegistrarCanchas").click(function() {
           document.getElementById("botonCargandoCanchas").style.display="";
            $.post("process/index.php", {
                process: "proyectos",
                action: "addCancha",

                cantidad      : $("#cantidad").val(), 
                tipoCancha      : $("#tipoCancha").val(), 
                idRelacion  : $("#idRelacionProyecto").val()

            },
            function(response){
                if(response)
                {
                    document.getElementById("botonCargandoCanchas").style.display="none";
                $.toast({
                    heading: 'Finalizado',
                    text: response,//'Personal del Proyecto Agregado 😁',
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: 5000, 
                    position: 'bottom-center'
                });
                document.getElementById("cerrarBtnCanchas").click();
                $("#loadListaCanchas").load("view/PanelProyectos/GestionTerritorial/GestionTerritorialFichaComunitaria/GestionTerritorial.Tabla.Canchas.php",{
        idRelacion : $("#idRelacionProyecto").val()
    });
                }
                else
                {
                    document.getElementById("botonCargandoCanchas").style.display="none";
                $.toast({
                    heading: 'ERRORRRRRRR',
                    text: 'Problemas al registrar la vinculacion  😐',
                    showHideTransition: 'slide',
                    icon: 'error',
                    hideAfter: 5000, 
                    position: 'bottom-center'
                });
                
                }
                
            });
        });  
//::::: REGISTRANDO CENTRO DE SALUD ::::::::::::::::::::::::::::::::::::::::
$("#btnRegistrarCentroSalud").click(function() {
           document.getElementById("botonCargandoCentroSalud").style.display="";
            $.post("process/index.php", {
                process: "proyectos",
                action: "addCentroSalud",

                nombre      : $("#nombreCentroSalud").val(), 
                idRelacion  : $("#idRelacionProyecto").val()

            },
            function(response){
                if(response)
                {
                    document.getElementById("botonCargandoCentroSalud").style.display="none";
                $.toast({
                    heading: 'Finalizado',
                    text: response,//'Personal del Proyecto Agregado 😁',
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: 5000, 
                    position: 'bottom-center'
                });
                document.getElementById("cerrarBtnCentroSalud").click();
                $("#loadListaSalud").load("view/PanelProyectos/GestionTerritorial/GestionTerritorialFichaComunitaria/GestionTerritorial.Tabla.CentroSalud.php",{
        idRelacion : $("#idRelacionProyecto").val()
    });
                }
                else
                {
                    document.getElementById("botonCargandoCentroSalud").style.display="none";
                $.toast({
                    heading: 'ERRORRRRRRR',
                    text: 'Problemas al registrar la vinculacion  😐',
                    showHideTransition: 'slide',
                    icon: 'error',
                    hideAfter: 5000, 
                    position: 'bottom-center'
                });
                
                }
                
            });
        });  

//::::: REGISTRANDO LIDERES COMUNITARIOS :::::::::::::::::::::::::::::::::::.
$("#btnRegistrarLideresComunitarios").click(function() {
           document.getElementById("botonCargandoLideres").style.display="";
            $.post("process/index.php", {
                process: "proyectos",
                action: "addLideres",

                nombre      : $("#nombreCompleto").val(), 
                contactos   : $("#contactos").val(), 
                cargo       : $("#cargo").val(), 
                contactos2  : $("#contactos2").val(),
                idRelacion  : $("#idRelacionProyecto").val()

            },
            function(response){
                if(response)
                {
                    document.getElementById("botonCargandoLideres").style.display="none";
                $.toast({
                    heading: 'Finalizado',
                    text: response,//'Personal del Proyecto Agregado 😁',
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: 5000, 
                    position: 'bottom-center'
                });
                document.getElementById("cerrarBtnLideres").click();
                $("#loadListaLideresComunitarios").load("view/PanelProyectos/GestionTerritorial/GestionTerritorialFichaComunitaria/GestionTerritorial.Tabla.LideresComunitarios.php",{
        idRelacion : $("#idRelacionProyecto").val()
    });
                }
                else
                {
                    document.getElementById("botonCargando").style.display="none";
                $.toast({
                    heading: 'ERRORRRRRRR',
                    text: 'Problemas al registrar la vinculacion  😐',
                    showHideTransition: 'slide',
                    icon: 'error',
                    hideAfter: 5000, 
                    position: 'bottom-center'
                });
                
                }
                
            });
        });  

//:::::::::::::: REGISTRANDO VINCULACION INSTITUCIONAL :::::::::::::::::::::::::::::::::::::::
$("#btnRegistrarCentro").click(function() {
           document.getElementById("botonCargando").style.display="";
            $.post("process/index.php", {
                process: "proyectos",
                action: "addCentrosEducativos",

                nombreCompleto: $("#nombre").val(), 
                linkSiges: $("#linkSiges").val(), 
                tipoCentro: $("#tipoCentro").val(), 
                idRelacion : $("#idRelacionProyecto").val()

            },
            function(response){
                if(response)
                {
                    document.getElementById("botonCargando").style.display="none";
                $.toast({
                    heading: 'Finalizado',
                    text: response,//'Personal del Proyecto Agregado 😁',
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: 5000, 
                    position: 'bottom-center'
                });
                document.getElementById("cerrarBtnCentro").click();
                $("#loadListaCentrosEducativos").load("view/PanelProyectos/GestionTerritorial/GestionTerritorialFichaComunitaria/GestionTerritorial.Tabla.CentrosEducativos.php",{
                        idRelacion : $("#idRelacionProyecto").val()
                });
                }
                else
                {
                    document.getElementById("botonCargando").style.display="none";
                $.toast({
                    heading: 'ERRORRRRRRR',
                    text: 'Problemas al registrar la vinculacion  😐',
                    showHideTransition: 'slide',
                    icon: 'error',
                    hideAfter: 5000, 
                    position: 'bottom-center'
                });
                
                }
                
            });
        });  
</script>