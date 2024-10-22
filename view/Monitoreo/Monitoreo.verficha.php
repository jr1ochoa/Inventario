<?php

include("../../config/net.php");

$valor = $_REQUEST['idProyecto'];





$query = "SELECT s1.*,  s2.name1 ,s2.name2,s2.name3,s2.lastname1,s2.lastname2, s3.proyecto 

 FROM monitor_generalidad_proyecto as s1 

 inner join employee as s2 on s1.id_coordinador = s2.id

 inner join monitor_proyecto as s3 on s1.id_proyecto = s3.id WHERE s1.id = ?";

$data3 = $net_rrhh->prepare($query);

$data3->execute([$valor]);

while ($data = $data3->fetch()) {

    $nombreProyecto = $data['proyecto'];

    $coordinadorOpe = sanear_string($data['name1']) . " " . sanear_string($data['name2']) . " " . sanear_string($data['name3']) . " " . sanear_string($data['lastname1']) . " " . sanear_string($data['lastname2']);

    $idRelacionProyecto = $data[0];

}



//::::::::: ENLACE DE ADENDA ::::::::::::::::::::::::::::::::::::::::

$query = "SELECT * FROM monitor_archivos_guardados  WHERE id_generalidad_proyecto = ? and presupuesto = 0";

$data3 = $net_rrhh->prepare($query);

$data3->execute([$valor]);

while ($data = $data3->fetch()) {

    $nombreArchivoSubido = $data['ruta_archivo'];

}









$query = "SELECT *   FROM monitor_proyecto  WHERE id = ?";

$data3 = $net_rrhh->prepare($query);

$data3->execute([$valor]);

while ($data = $data3->fetch()) {

    $proyecto = $data['proyecto'];

}



$query = "SELECT *   FROM monitor_ficha_encabezado  WHERE id_proyecto_generalidades = ?";

$data3 = $net_rrhh->prepare($query);

$data3->execute([$valor]);

while ($data = $data3->fetch()) {

    $codigoProyecto = $data['codigo_proyecto'];

    $codigoCooperan = $data['codigo_asignado_cooperante'];

    $tipocooperante = $data['tipo_cooperante'];

    $nombreCooperante = $data['nombre_cooperante'];

    $paginaWebCooperante = $data['paginaweb_cooperante'];

    $consorcio = $data['consorcio'];

    $nombre_prime = $data['nombre_prime'];

    $organizacion_socia  = $data['organizacion_socia'];

    $nombre_organizacion = $data['nombre_organizacion'];

    $aporte_al_proyecto = $data['aporte_al_proyecto'];

    $objetivo_proyecto = $data['objetivo_proyecto'];

    $otros  = $data['otros'];

    $metas_principales_proyecto = $data['metas_principales_proyecto'];

    $productos_generados = $data['productos_generados'];

    $area_acargo_del_proyecto = $data['area_acargo_del_proyecto'];

    $fh_inicio = $data['fh_inicio'];

    $fh_cierre = $data['fh_cierre'];

    $ampliacion_adenda  = $data['ampliacion_adenda'];

    $numero_beneficiarios = $data['numero_beneficiarios'];

    $monto_aportado_cooperante = $data['monto_aportado_cooperante'];

    $proyecto_posee_contrapartida = $data['proyecto_posee_contrapartida'];

    $monto_contrapartida  = $data['monto_contrapartida'];

    $suma_montos_total_proyectos = $data['suma_montos_total_proyectos'];

}







$query = "SELECT s1.*, s2.name1,s2.name2,s2.name3,s2.lastname1,s2.lastname2, s3.proyecto,s3.conocidoCOmo 

                FROM monitor_generalidad_proyecto as s1 

                inner join employee as s2 on s1.id_coordinador = s2.id

                inner join monitor_proyecto as s3 on s1.id_proyecto = s3.id WHERE s1.id = ?";

$data3 = $net_rrhh->prepare($query);

$data3->execute([$valor]);

while ($data = $data3->fetch()) {

    $nombreProyecto = $data[17];

    $proyectoConocido = $data[18];

    $idRelacionProyecto = $data[0];

}

?>



<style>

    .colorFondoContenedor {

        background-color: #FFFFFF;

        border-radius: 20px;

        border: 1px solid #9E998E;

    }

</style>

<div class="position-relative overflow-hidden p-3 p-md-3 m-md-3 text-center bg-light">
    <div class="col-md-12 p-lg-2 mx-auto my-2">
      <h1 class="display-4 fw-normal">Detalle del Proyecto</h1>
      <p class="lead fw-normal">V 1.0.0 </p>
     
    </div>
    <div class="product-device shadow-sm d-none d-md-block">
    </div>
    
  </div>


<div class="row">
    <div class="col-1">

    </div>
    <div class="col-11">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">General</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="objetivos-tab" data-bs-toggle="tab" data-bs-target="#objetivos" type="button" role="tab" aria-controls="objetivos" aria-selected="false">Objetivos y Resultados</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Metas e Indicadores</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Gestión  y Relaciones Externas</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab" aria-controls="general" aria-selected="false">Avance Financiero</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="avances-tab" data-bs-toggle="tab" data-bs-target="#avances" type="button" role="tab" aria-controls="avances" aria-selected="false">Avance mensual</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="personalProyecto-tab" data-bs-toggle="tab" data-bs-target="#personalProyecto" type="button" role="tab" aria-controls="personalProyecto" aria-selected="false">Personal del proyecto</button>
        </li>
    </ul>
    </div>
</div>

 
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
<!--::::::::::::::::::::::: INFORMACION GENERAL  ::::::::::::::::::::::::::::::::-->
<div class="row mt-2">
    <div class="col-1"></div>
    <div class="col-10">
        <center>
        <div class="row">
<p><b>ENLACE DE ADENDA:</b> <?php if(isset($nombreArchivoSubido)) { ?>
   👉🏻<a  target="_blank" href="<?php echo $nombreArchivoSubido; ?>">VER ARCHIVO</a><?php } else { ?><span style="background-color: #F5E6BD; border-radius: 12px;">No existe ningun archivo</span><?php } ?> </p>
</div>
        </center>
    
<!--:::::::::::::::::::::: BLOQUE ::::::::::::::::::::::-->
    <div class="row mx-2">
    <div class="col-sm-12">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Proyecto conocido como: </label>
            <input type="email" class="form-control" readonly value="<?php echo $proyectoConocido; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
    </div>
    <div class="col-sm-12">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombre Proyecto: </label>
            <!--<input type="email" class="form-control" readonly value="<?php echo $coordinadorOpe; ?>" id="exampleInputEmail2" aria-describedby="emailHelp">-->
            <textarea rows="3" class="form-control" readonly value="" id="exampleInputEmail1" aria-describedby="emailHelp"><?php echo $nombreProyecto; ?></textarea>
        </div>
    </div>
    </div>
<!--:::::::::::::::::::::: BLOQUE ::::::::::::::::::::::-->
    <div class="row mx-2">
                <div class="col-sm-12">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Coordinador: </label>
                        <input type="email" class="form-control" readonly value="<?php echo $coordinadorOpe; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Codigo Proyecto: </label>
                        <input type="email" class="form-control" readonly value="<?php echo $codigoProyecto; ?>" id="exampleInputEmail2" aria-describedby="emailHelp">
                    </div>
                </div>
    </div>
<!--:::::::::::::::::::::: BLOQUE ::::::::::::::::::::::-->
    <div class="row mx-2">
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Código o número de referencia asignado por el cooperante: </label>
                        <input type="email" class="form-control" readonly value="<?php echo $codigoCooperan; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="col mt-4">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tipo de cooperante: </label>
                        <input type="email" class="form-control" readonly value="<?php echo $tipocooperante; ?>" id="exampleInputEmail2" aria-describedby="emailHelp">
                    </div>
                </div>

                <div class="col mt-4">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nombre del cooperante: </label>
                        <input type="email" class="form-control" readonly value="<?php echo $nombreCooperante; ?>" id="exampleInputEmail2" aria-describedby="emailHelp">
                    </div>
                </div>

                <div class="col-12 mt-4">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Página web del cooperante: </label>
                        <input type="email" class="form-control" readonly value="<?php echo $paginaWebCooperante; ?>" id="exampleInputEmail2" aria-describedby="emailHelp">
                    </div>
                </div>
            </div>
<!--:::::::::::::::::::::: BLOQUE ::::::::::::::::::::::-->
            <div class="row mx-2">
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">¿Es un consorcio?: </label>
                        <input type="email" class="form-control" readonly value="<?php echo $consorcio; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                </div>

                <div class="col ">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nombre del prime: </label>
                        <input type="email" class="form-control" readonly value="<?php echo $nombre_prime; ?>" id="exampleInputEmail2" aria-describedby="emailHelp">
                    </div>
                </div>

                <div class="col ">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Organizacion socia: </label>
                        <input type="email" class="form-control" readonly value="<?php echo $organizacion_socia; ?>" id="exampleInputEmail2" aria-describedby="emailHelp">
                    </div>
                </div>
            </div>
<!--:::::::::::::::::::::: BLOQUE ::::::::::::::::::::::-->
<div class="row mx-2">
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nombre de la organización: </label>
                        <input type="email" class="form-control" readonly value="<?php echo $nombre_organizacion; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="col ">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Aporte al proyecto : </label>
                        <input type="email" class="form-control" readonly value="<?php echo $aporte_al_proyecto; ?>" id="exampleInputEmail2" aria-describedby="emailHelp">
                    </div>
                </div>
                <!--<div class="col ">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Objetivos del proyecto : </label>
                        <input type="email" class="form-control" readonly value="<?php echo $objetivo_proyecto; ?>" id="exampleInputEmail2" aria-describedby="emailHelp">
                    </div>
                </div>-->
            </div>
    </div>
</div>


<!--:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    
<div class="row mt-3">
    <div class="col-1">

    </div>
    <div class="col-10">
<!--::::::::::::::::::::::::::: METAS Y/O ACTIVIDADES ::::::::::::::--> 
<div class="col-12">
                <div class="col">
                   <div class="row">
                   <div class="col-md">

                   <center><h4 class="fondoTema">METAS /INDICADORES DEL PROYECTO</h4></center>
                   <a type="button" id="refrescarVinculada" class="btn btn-sm colorRefrescarDatos"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
 <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"></path>
 <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"></path>
</svg> REFRESCAR</a> <b>METAS /INDICADORES DEL PROYECTO</b>
                   </div>
               </div>
               </div>
               <div id="loadMetasoindicadores"></div>
                </div> 

                

<!--::::::::::::::::::::::::: PRODUCTOS :::::::::::::::::::::::::::::::::-->
<div class="col-12">
                <div class="col">
                   <div class="row">
                   <div class="col-md">
                   <center><h4 class="fondoTema">PRODUCTOS DEL PROYECTO</h4></center>
                   <a type="button" id="refrescarVinculada" class="btn btn-sm colorRefrescarDatos"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
 <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"></path>
 <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"></path>
</svg> REFRESCAR</a> <b>PRODUCTOS  DEL PROYECTO</b>
                   </div>
               </div>
               </div>
               <div id="loadProductosProye"></div>
                </div>
    </div>
</div>

  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
    <!--:::::::::::::::::: -->
    <div class="row">
        <div class="col-1">
        </div>
        <div class="col-10">
        <div class="row mx-2">
                <center>
                    <h4 class="fondoTema">OTRAS ORGANIZACIONES VINCULADAS</h4>
                </center>
                <div class="col">
                    <div class="col">
                        <div class="row">
                            <div class="col-md">
                                <a type="button" id="refrescarVinculada" class="btn btn-sm colorRefrescarDatos"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"></path>
                                        <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"></path>
                                    </svg> REFRESCAR</a>
                            </div>
                        </div>
                    </div>
                    <div id="loadListaOrganizacionVinculada">
                    </div>
                </div>
            </div>

            <div class="row mx-2">
                <center>
                    <h4 class="fondoTema">ZONA DE INFLUENCIA</h4>
                </center>
                <div class="col">
                    <div class="col">
                        <div class="row">
                            <div class="col-md">
                                <a type="button" id="refrescarVinculada" class="btn btn-sm colorRefrescarDatos"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"></path>
                                        <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"></path>
                                    </svg> REFRESCAR</a>
                            </div>
                        </div>
                    </div>
                    <div id="loadListaZonaInfluencia"></div>
                </div>
            </div>

            <div class="row ">
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Otras zonas de influencia: </label>
                        <input type="email" class="form-control" readonly value="<?php echo $otros; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                </div>
            </div>

            <div class="row">
<!--::::::: AREAS A CARGO DEL PROYECTO ::::::::::::::-->
<div class="col-12">
                <div class="col">
                   <div class="row">
                   <div class="col-md">
                   <a type="button" id="refrescarVinculada" class="btn btn-sm colorRefrescarDatos"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
 <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"></path>
 <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"></path>
</svg> REFRESCAR</a> <b>ÁREAS A CARGO DEL PROYECTO</b>
                   </div>
               </div>
               </div>
               <div id="loadAreasAcargo"></div>
                </div> 
            </div>

            
            <div class="row ">
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Fecha de inicio : </label>
                        <input type="email" class="form-control" readonly value="<?php echo $fh_inicio; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="col ">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Fecha de cierre : </label>
                        <input type="email" class="form-control" readonly value="<?php echo $fh_cierre; ?>" id="exampleInputEmail2" aria-describedby="emailHelp">
                    </div>
                </div>

                <div class="col ">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Ampliación con adenda : </label>
                        <input type="email" class="form-control" readonly value="<?php echo $ampliacion_adenda; ?>" id="exampleInputEmail2" aria-describedby="emailHelp">
                    </div>
                </div>
            </div>

            <div class="row ">
                <div class="col ">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Número de beneficiarios esperados : </label>
                        <input type="email" class="form-control" readonly value="<?php echo $numero_beneficiarios; ?>" id="exampleInputEmail2" aria-describedby="emailHelp">
                    </div>
                </div>
            </div>
            <div class="row ">
                <center><h4 class="fondoTema">SECTOR AL QUE VA DIRIGIDO</h4></center>
                <div class="col">
                <div class="col">
                   <div class="row">
                   <div class="col-md">
                   <a type="button" id="refrescarVinculada" class="btn btn-sm colorRefrescarDatos"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
 <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"></path>
 <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"></path>
</svg> REFRESCAR</a>
                   </div>
               </div>
               </div>
               <div id="loadListaSectorDirigido"></div>
                </div>
            </div>   
            
            <div class="row ">
                <center><h4 class="fondoTema">POBLACIÓN META PRINCIPAL</h4></center>
               <!-- <div class="col">
                <div class="col">
                   <div class="row">
                   <div class="col-md">
                   <a type="button" id="refrescarVinculada" class="btn btn-sm colorRefrescarDatos"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
 <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"></path>
 <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"></path>
</svg> REFRESCAR</a>
                   </div>
               </div>
               </div>
               <div id="loadListaPoblacionMeta"></div>
                </div>-->



                <!--::::::::: NUMERO DE POBLACION META :::::::::::::-->

                <div class="col-12">
                <div class="col">
                   <div class="row">
                   <div class="col-md">
                   <a type="button" id="refrescarVinculada" class="btn btn-sm colorRefrescarDatos"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
 <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"></path>
 <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"></path>
</svg> REFRESCAR</a> <b>NÚMERO POBLACIÓN META</b>
                   </div>
               </div>
               </div>
               <div id="loadPoblacionMetaNumero"></div>
                </div> 
            </div>

            <div class="row ">
                <center><h4 class="fondoTema">VINCULACIÓN INSTITUCIONAL</h4></center>
                <div class="col">
                <div class="col">
                   <div class="row">
                   <div class="col-md">
                   <a type="button" id="refrescarVinculada" class="btn btn-sm colorRefrescarDatos"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
 <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"></path>
 <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"></path>
</svg> REFRESCAR</a>
                   </div>
               </div>
               </div>
               <div id="loadListaVinculacioninstitucional"></div>
                </div>
            </div>


        </div>
    </div>
    
    <!--:::::::::::::::::: -->
  </div>
  <div class="tab-pane fade" id="general" role="tabpanel" aria-labelledby="general-tab">
<!--:::::::::::::::: BLOQUE FINANCIERO ::::::::::::::::::::::::::::::::-->
<div class="row mt-3">
    <div class="col-1"></div>

    <div class="col-10">
    <div class="row ">
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Monto que aporta el cooperante : </label>
                        <input type="email" class="form-control" readonly value="$<?php echo $monto_aportado_cooperante; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="col ">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">El proyecto posee contrapartida : </label>
                        <input type="email" class="form-control" readonly value="<?php echo $proyecto_posee_contrapartida; ?>" id="exampleInputEmail2" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="col ">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Monto de contrapartida : </label>
                        <input type="email" class="form-control" readonly value="$<?php echo $monto_contrapartida; ?>" id="exampleInputEmail2" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="col ">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Suma de los montos total  : </label>
                        <input type="email" class="form-control" readonly value="$<?php echo $suma_montos_total_proyectos; ?>" id="exampleInputEmail2" aria-describedby="emailHelp">
                    </div>
                </div>
            </div>


            <div class="row ">

<div class="col-md-12">
<center><h4 class="fondoTema">LISTA PRESUPUESTARIA</h4></center>
<div class="col">
<div class="col">
   <div class="row">
   <div class="col-md">
   <a type="button" id="refrescarVinculada" class="btn btn-sm colorRefrescarDatos"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"></path>
<path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"></path>
</svg> REFRESCAR</a>
   </div>
   <div class="col-md">
<!--descargar el archivo -->
<?php 
//::::::::: ENLACE PRESUPUESTO  ::::::::::::::::::::::::::::::::::::::::

$query = "SELECT * FROM monitor_archivos_guardados  WHERE id_generalidad_proyecto = ? and presupuesto = 1";
$data3 = $net_rrhh->prepare($query);
$data3->execute([$valor]);
while ($data = $data3->fetch()) {
$nombreArchivoSubido2 = $data['ruta_archivo'];
}
?>
<p ><b>ENLACE DEL PRESUPUESTO:</b> <?php if(isset($nombreArchivoSubido2)) { ?> 
👉🏻<a  target="_blank" href="<?php echo $nombreArchivoSubido2; ?>">VER ARCHIVO</a><?php } else { ?><span style="background-color: #F5E6BD; border-radius: 12px;">No existe ningun archivo</span><?php } ?> </p>
    </div>
</div>
</div>
<div id="loadListaPresupuestaria"></div>
</div>
</div>
<div class="col-md-12">
<!--:::::::::::::::::: AVANCE FINANCIERO :::::::::::::::::::::::::::::::;;;;-->
<div class="row ">
                <center><h4 class="fondoTema">AVANCE FINANCIERO</h4></center>
                <div class="col">
                <div class="col">
                   <div class="row">
                   <div class="col-md">
                   <a type="button" id="refrescarVinculada" class="btn btn-sm colorRefrescarDatos"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
 <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"></path>
 <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"></path>
</svg> REFRESCAR</a>
                   </div>
               </div>
               </div>
               <div id="loadListaAvanceFinanciero">
                </div>
            </div>
   </div>
<!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
</div>



</div>




    </div>
</div>

<!--:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->

  </div>
  <div class="tab-pane fade" id="avances" role="tabpanel" aria-labelledby="avances-tab">

<!--:::::::::::::: AVANCES MENSUALES ::::::::::::::::-->
<div class="row">
    <div class="col-1">

    </div>
    <div class="col-10">

    <div class="row ">
        <center><h4 class="fondoTema">Historial de actualizacion de documentos</h4></center>
            <div class="col">
                <div class="col">           
                   <div class="row">
                        <div class="col-md">
                            <a type="button" id="refrescarVinculadaHistorialDocumentos" class="btn btn-sm colorRefrescarDatos">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"></path>
                                <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"></path>
                                </svg> REFRESCAR
                            </a>
                        </div>
                    </div>
               </div>
               <div id="loadDocumentacionProyecto"></div>
            </div>
            </div>

            <div class="row ">
                <center><h4 class="fondoTema">Modificaciones Registradas</h4></center>
                <div class="col">
                <div class="col">
                   <div class="row">
                   <div class="col-md">
                   <a type="button" id="refrescarVinculada" class="btn btn-sm colorRefrescarDatos"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
 <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"></path>
 <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"></path>
</svg> REFRESCAR</a>
                   </div>
               </div>
               </div>
                 <div id="loadListaModificaciones"></div>
</div>
            </div>

            <div class="row ">
                <center><h4 class="fondoTema">Buenas Practicas  Registradas</h4></center>
                <div class="col">
                <div class="col">
                   <div class="row">
                   <div class="col-md">
                   <a type="button" id="refrescarVinculada" class="btn btn-sm colorRefrescarDatos"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
 <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"></path>
 <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"></path>
</svg> REFRESCAR</a>
                   </div>
               </div>
               </div>
               <div id="loadListaBuenasPracticas"></div>
                </div>
            </div>
    </div>
</div>
<!--::::::::::::::::::::::::::::::::::::::::::::::::::-->
  </div>
  <div class="tab-pane fade" id="objetivos" role="tabpanel" aria-labelledby="objetivos-tab">
    <!--:::::::::: OBJETIVOS Y RESULTADOS ::::::::::::::::-->
    <div class="row">
        <div class="col-1">

        </div>
        <div class="col-10">

       
                <div class="col-12">
                <div class="col">
                   <div class="row">
                   <div class="col-md mt-5">
                   <center><h4 class="fondoTema">OBJETIVOS GENERALES</h4></center>
                   <a type="button" id="refrescarVinculada" class="btn btn-sm colorRefrescarDatos">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"></path>
                    <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"></path>
                    </svg> REFRESCAR</a> <b>OBJETIVOS GENERALES</b>
                   </div>
               </div>
               </div>
               <div id="loadProyectoPosee"></div>
                </div>
<!--:::::::::::::: OBJETIVOS ESPECIFICOS :::::::::::::::::::-->
<div class="col-12">
                <div class="col">
                   <div class="row">
                   <div class="col-md">
                   <center><h4 class="fondoTema">OBJETIVOS ESPECIFÍCOS</h4></center>
                   <a type="button" id="refrescarVinculada" class="btn btn-sm colorRefrescarDatos">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"></path>
                    <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"></path>
                    </svg> REFRESCAR</a> <b>OBJETIVOS ESPECIFÍCOS</b>
                   </div>
               </div>
               </div>
               <div id="loadProyectoPoseeoBJeSPECIFICOS"></div>
                </div>
                


<!--::::::::: RESULTADOS :::::::::::::::-->

<div class="col-12">
                <div class="col">
                   <div class="row">
                   <div class="col-md">
                   <center><h4 class="fondoTema">RESULTADOS DEL PROYECTO</h4></center>
                   <a type="button" id="refrescarVinculada" class="btn btn-sm colorRefrescarDatos"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
 <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"></path>
 <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"></path>
</svg> REFRESCAR</a> <b>RESULTADOS DEL PROYECTO</b>
                   </div>
               </div>
               </div>
               <div id="loadProyectoRESULTADOSPRO"></div>
                </div> 
        </div>
    </div>
    <!--::::::::::::::::::::::::::::::::::::::::::::::::::-->
  </div>
  <div class="tab-pane fade" id="personalProyecto" role="tabpanel" aria-labelledby="personalProyecto-tab">
 <!--:::::::::::::: PERSONAL DEL PROYECTO :::::-->
 <div class="row">
    <div class="col-2">

    </div>
    <div class="col-9">
    <div class="row ">
                <center><h4 class="fondoTema">Personal del Proyecto</h4></center>
                <div class="col">
                <div class="col">
                   <div class="row">
                   <div class="col-md">
                   <a type="button" id="refrescarVinculada" class="btn btn-sm colorRefrescarDatos"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
 <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"></path>
 <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"></path>
</svg> REFRESCAR</a>
                   </div>
               </div>
               </div>
                <div id="loadListaPersonal">
</div>
                </div>
            </div>
    </div>
 </div>
 
 <!--::::::::::::::::::::::::::::::::::::::::::-->
    </div>

  
</div>





<div class="container ">

    <div class="row">

        <div class="col-6  mt-4 mb-4">

        <input type="hidden" value="<?php echo $idRelacionProyecto; ?>" id="idRelacionProyecto">

        <style>

            .colorFondo{

                background-color: #FEF2D4;

                border-radius: 12px;

            }

            .Negritadeltexto{

                font-weight:800;

            }

        </style>

        

        <!--  <center>

          <p><b>Objetivo:</b> Sintetizar información de manera mensual sobre la ejecución de proyectos a fin de brindar reportes actualizados y estandarizados. </p>

        </center>-->





        





        






<hr/>
           




















            


























           



















        </div>







<!--//::::::::::::::::::::: DETALLE MENSUAL :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->

        <div class="col-6 mt-4 mb-4">







<div class=" ">

   <style>

                       .colorRefrescarDatos{

                           background-color: #CFE2FF;

                       }

                       .fondoTema{

                        background-color: #419BA6;

                        color: white;

                        border-radius: 12px;

                        font-size: 600

                       }

                   </style>


























   <div class="row ">



<!--::::::::::::: ZONAS DE INFLUENCIAS ::::::::::::::::::::::::-->

<!--<div class="col-12">

                <div class="col">

                   

                   <div class="row">

                 

                  

                   <div class="col-md">

                   

                   <a type="button" id="refrescarVinculada" class="btn btn-sm colorRefrescarDatos"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">

 <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"></path>

 <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"></path>

</svg> REFRESCAR</a> <b>ZONA DE INFLUENCIA</b>

          

                   </div>

               </div>









               </div>



               <div id="loadProyectoZonaInfluencia"></div>

                </div> -->

            </div>



            







            



















            













            
   </div>













        </div>

    </div>

</div>



<script>

    //LISTA DE ACTUALIZACION DE DOCUMENTOS :::::::::::::::::::::::::::::

    //LISTA DE ACTUALIZACIONES DOCUMENTOS :::::::::::::::::::::::::::::::::::::

$("#loadDocumentacionProyecto").load("view/Monitoreo/Monitoreo.tabla.documentacionproyecto.php",{

        idRelacion : $("#idRelacionProyecto").val()//refrescarVinculadaHistorialDocumentos

    });

    $("#refrescarVinculadaHistorialDocumentos").click(function(){

        $("#loadDocumentacionProyecto").load("view/Monitoreo/Monitoreo.tabla.documentacionproyecto.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $.toast({

        text : 'Informacion cargada',

        showHideTransition: 'slide',

                    icon:'',

                    hideAfter: 5000, 

                    position: 'bottom-left'

    })

    });

    //LISTA DE BUENAS PRACTICAS :::::::::::::::::::::::::::::::::::::::::

$("#loadListaBuenasPracticas").load("view/Monitoreo/Monitoreo.tabla.buenaspracticas.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $("#refrescarModificaciones").click(function(){

        $("#loadListaBuenasPracticas").load("view/Monitoreo/Monitoreo.tabla.buenaspracticas.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $.toast({

        text : 'Informacion cargada',

        showHideTransition: 'slide',

                    icon: '',

                    hideAfter: 5000, 

                    position: 'bottom-left'

    })

    });

    //LISTA DE MODIFICACIONES :::::::::::::::::::::::::::::::::::::::::

$("#loadListaModificaciones").load("view/Monitoreo/Monitoreo.tabla.modificaciones.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $("#refrescarModificaciones").click(function(){

        $("#loadListaModificaciones").load("view/Monitoreo/Monitoreo.tabla.modificaciones.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $.toast({

        text : 'Informacion cargada',

        showHideTransition: 'slide',

                    icon: '',

                    hideAfter: 5000, 

                    position: 'bottom-left'

    })

    });

    //LISTA PERSONAL :::::::::::::::::::::::::::::::

$("#loadListaPersonal").load("view/Monitoreo/Monitoreo.tabla.personalproyecto.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $("#refrescarPersonalProyecto").click(function(){

        $("#loadListaPersonal").load("view/Monitoreo/Monitoreo.tabla.personalproyecto.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $.toast({

        text : 'Informacion cargada',

        showHideTransition: 'slide',

                    icon: '',

                    hideAfter: 5000, 

                    position: 'bottom-left'

    })

    });



    //LISTA METAS :::::::::::::::::::::::::::::::

$("#loadListaMetas").load("view/Monitoreo/Monitoreo.tabla.metas.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $("#refrescarAvanceMeta").click(function(){

        $("#loadListaMetas").load("view/Monitoreo/Monitoreo.tabla.metas.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $.toast({

        text : 'Informacion cargada',

        showHideTransition: 'slide',

                    icon: '',

                    hideAfter: 5000, 

                    position: 'bottom-left'

    })

    });

    //LISTA ACTIVIDADES ::::::::::::::::::::::::::::::: 

$("#loadListaActividades").load("view/Monitoreo/Monitoreo.tabla.actividades.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $("#refrescarActividades").click(function(){

        $("#loadListaActividades").load("view/Monitoreo/Monitoreo.tabla.actividades.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $.toast({

        text : 'Informacion cargada',

        showHideTransition: 'slide',

                    icon: '',

                    hideAfter: 5000, 

                    position: 'bottom-left'

    })

    });

 //DETALLE DE FICHA PROYECTO :::::::::::::::::::::::::::::::

 $("#loadProyectoPosee").load("view/Monitoreo/Monitoreo.tabla.obj.general.php",{

        idRelacion : $("#idRelacionProyecto").val(), 

        

    });

    $("#refrescarAvance").click(function(){

        $("#loadProyectoPosee").load("view/Monitoreo/Monitoreo.tabla.obj.general.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $.toast({

        text : 'Informacion cargada',

        showHideTransition: 'slide',

                    icon: '',

                    hideAfter: 5000, 

                    position: 'bottom-left'

    })

    });



//::::: OBJETIVOS ESPECIFICOS ::::::::::::..

$("#loadProyectoPoseeoBJeSPECIFICOS").load("view/Monitoreo/Monitoreo.tabla.obj.especifico.php",{

        idRelacion : $("#idRelacionProyecto").val(), 

        

    });

    $("#refrescarAvance").click(function(){

        $("#loadProyectoPoseeoBJeSPECIFICOS").load("view/Monitoreo/Monitoreo.tabla.obj.especifico.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $.toast({

        text : 'Informacion cargada',

        showHideTransition: 'slide',

                    icon: '',

                    hideAfter: 5000, 

                    position: 'bottom-left'

    })

    });

//:::::: ZONAS DE INFLUENCIA :::::::::::

$("#loadProyectoZonaInfluencia").load("view/Monitoreo/Monitoreo.tabla.zonainfluencia.php",{

        idRelacion : $("#idRelacionProyecto").val(), 

        

    });

    $("#refrescarAvance").click(function(){

        $("#loadProyectoZonaInfluencia").load("view/Monitoreo/Monitoreo.tabla.zonainfluencia.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $.toast({

        text : 'Informacion cargada',

        showHideTransition: 'slide',

                    icon: '',

                    hideAfter: 5000, 

                    position: 'bottom-left'

    })

    });

//:::::::: RESULTADOS DEL PROYECTO :::::::::::::::::::

$("#loadProyectoRESULTADOSPRO").load("view/Monitoreo/Monitoreo.tabla.resultados.php",{

        idRelacion : $("#idRelacionProyecto").val(), 

        

    });

    $("#refrescarAvance").click(function(){

        $("#loadProyectoRESULTADOSPRO").load("view/Monitoreo/Monitoreo.tabla.resultados.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $.toast({

        text : 'Informacion cargada',

        showHideTransition: 'slide',

                    icon: '',

                    hideAfter: 5000, 

                    position: 'bottom-left'

    })

    });

//:::::::: METAS Y/O INDICADORES :::::::::::::::::::::::::::

$("#loadMetasoindicadores").load("view/Monitoreo/Monitoreo.tabla.meta.activiades.php",{

        idRelacion : $("#idRelacionProyecto").val(), 

        

    });

    $("#refrescarAvance").click(function(){

        $("#loadMetasoindicadores").load("view/Monitoreo/Monitoreo.tabla.meta.activiades.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $.toast({

        text : 'Informacion cargada',

        showHideTransition: 'slide',

                    icon: '',

                    hideAfter: 5000, 

                    position: 'bottom-left'

    })

    });

//:::::::::: PRODUCTOS  :::::::::::::::::::::::::::::::::::::

$("#loadProductosProye").load("view/Monitoreo/Monitoreo.tabla.productos.php",{

        idRelacion : $("#idRelacionProyecto").val(), 

        

    });

    $("#refrescarAvance").click(function(){

        $("#loadProductosProye").load("view/Monitoreo/Monitoreo.tabla.productos.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $.toast({

        text : 'Informacion cargada',

        showHideTransition: 'slide',

                    icon: '',

                    hideAfter: 5000, 

                    position: 'bottom-left'

    })

    });

//::::::::::::: AREAS ACARGO DEL PROYECTO ::::::::::::::::

$("#loadAreasAcargo").load("view/Monitoreo/Monitoreo.tabla.areasyprogramas.php",{

        idRelacion : $("#idRelacionProyecto").val(), 

        

    });

    $("#refrescarAvance").click(function(){

        $("#loadAreasAcargo").load("view/Monitoreo/Monitoreo.tabla.areasyprogramas.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $.toast({

        text : 'Informacion cargada',

        showHideTransition: 'slide',

                    icon: '',

                    hideAfter: 5000, 

                    position: 'bottom-left'

    })

    });

//:::::::::::::: numero de poblacion meta ::::::::::::::::::::::::

$("#loadPoblacionMetaNumero").load("view/Monitoreo/Monitoreo.tabla.numero.poblacionmeta.php",{

        idRelacion : $("#idRelacionProyecto").val(), 

        

    });

    $("#refrescarAvance").click(function(){

        $("#loadPoblacionMetaNumero").load("view/Monitoreo/Monitoreo.tabla.numero.poblacionmeta.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $.toast({

        text : 'Informacion cargada',

        showHideTransition: 'slide',

                    icon: '',

                    hideAfter: 5000, 

                    position: 'bottom-left'

    })

    });

    //AVANCE FINANCIERO :::::::::::::::::::::::::::::::

 $("#loadListaAvanceFinanciero").load("view/Monitoreo/Monitoreo.tabla.avancefinanciero.php",{

        idRelacion : $("#idRelacionProyecto").val(),

        

    });

    $("#refrescarAvance").click(function(){

        $("#loadListaAvanceFinanciero").load("view/Monitoreo/Monitoreo.tabla.avancefinanciero.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $.toast({

        text : 'Informacion cargada',

        showHideTransition: 'slide',

                    icon: '',

                    hideAfter: 5000, 

                    position: 'bottom-left'

    })

    });

        //VINCULACION INSTITUCIONAL :::::::::::::::::::::::::::::::

        $("#loadListaVinculacioninstitucional").load("view/Monitoreo/Monitoreo.tabla.vinculacioninstitucional.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $("#refrescarVinculacion").click(function(){

        $("#loadListaVinculacioninstitucional").load("view/Monitoreo/Monitoreo.tabla.vinculacioninstitucional.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $.toast({

        text : 'Informacion cargada',

        showHideTransition: 'slide',

                    icon: '',

                    hideAfter: 5000, 

                    position: 'bottom-left'

    })

    });

     //LINE PRESUPUESTARIA ::::::::::::::::::::::::::::

     $("#loadListaPresupuestaria").load("view/Monitoreo/Monitoreo.tabla.listapresupuestaria.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $("#refrescarListaPresu").click(function(){

        $("#loadListaPresupuestaria").load("view/Monitoreo/Monitoreo.tabla.listapresupuestaria.php",{

            idRelacion : $("#idRelacionProyecto").val()

        });

    });

    //LINE PRESUPUESTARIA ::::::::::::::::::::::::::::

 $("#loadListaOrganizacionVinculada").load("view/Monitoreo/Monitoreo.tabla.organizacionesvinculadas.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $("#refrescarVinculada").click(function(){

        $("#loadListaOrganizacionVinculada").load("view/Monitoreo/Monitoreo.tabla.organizacionesvinculadas.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $.toast({

        text : 'Informacion cargada',

        showHideTransition: 'slide',

                    icon: '',

                    hideAfter: 5000, 

                    position: 'bottom-left'

    })

    });

     //ZONA DE INFLUENCIA ::::::::::::::::::::::

     $("#loadListaZonaInfluencia").load("view/Monitoreo/Monitoreo.tabla.zonainfluencia.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $("#refrescarzona").click(function(){

        $("#loadListaZonaInfluencia").load("view/Monitoreo/Monitoreo.tabla.zonainfluencia.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    });

    //POBLACION META :::::::::::::::::::::::::

    $("#loadListaPoblacionMeta").load("view/Monitoreo/Monitoreo.tabla.poblacionmeta.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $("#refrescarpoblacion").click(function(){

        $("#loadListaPoblacionMeta").load("view/Monitoreo/Monitoreo.tabla.poblacionmeta.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $.toast({

        text : 'Informacion cargada',

        showHideTransition: 'slide',

                    icon: '',

                    hideAfter: 5000, 

                    position: 'bottom-left'

    })

    });

     //SECTOR DIRIGIDO :::::::::::::::::::::::::::::::

     $("#loadListaSectorDirigido").load("view/Monitoreo/Monitoreo.tabla.sectordirigido.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $("#refrescarsector").click(function(){

        $("#loadListaSectorDirigido").load("view/Monitoreo/Monitoreo.tabla.sectordirigido.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $.toast({

        text : 'Informacion cargada',

        showHideTransition: 'slide',

                    icon: '',

                    hideAfter: 5000, 

                    position: 'bottom-left'

    })

    });

</script>