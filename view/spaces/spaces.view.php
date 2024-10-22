<?php include("../../config/net.php"); 

$ids = $_REQUEST["ids"];
//echo "Valor Recibido".$ids;
$query = "SELECT * FROM spaces WHERE id = $ids";
$space = $net_rrhh->prepare($query);
$space->execute();
$data = $space->fetch();

$query = "SELECT * FROM `spaces_details` WHERE idSpace = $ids";
$details = $net_rrhh->prepare($query);
$details->execute();

$dataS = $details->fetch();

$query = "SELECT * FROM `spaces_evidences` WHERE idSpace = $ids";
$evidences = $net_rrhh->prepare($query);
$evidences->execute();

$dataE = $evidences->fetch();

$agenda = ($dataS[2] == "Archivo") ? "<a href='/process/documents/$dataS[3]' target='_blank'>Descargar</a>" : $dataS[3];
?>
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
    background-image: url('assets/images/elements_1_hands_make_notes_3.jpg'); /* Reemplaza 'ruta_de_tu_imagen.jpg' con la ruta de tu imagen de fondo */
    background-size: cover;
    background-position: center 50%;
    height: 30vh;
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
<div class="container my-5">
    <div class="fondoImagen">
    <h1 style="background-color: #dbd0d087;"><?=$data[1]?></h1>
    </div>
   
    <hr/>

    <p class="fs-5 mb-3 text-uppercase">INFORMACIÓN GENERAL INTERNA</p>
    <div class="row mb-5">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <p><b>Nombre del espacio:</b><br/><?=$data[1]?></p>
                    <p><b>Dirección que representa el espacio:</b><br/><?=$data[2]?></p>
                    <p><b>Fecha:</b><br/><?=$data[3]?></p>
                    <p><b>Lugar:</b><br/><?=$data[4]?></p>
                    <p>
                        <b>Duración de la reunión:</b><br/>
                            Desde: <?=$data[5]?> - 
                            Hasta: <?=$data[6]?>
                    </p>
                    <p><b>Nombre de los participantes:</b><br/><?=$data[7]?></p>
                </div>
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <p class="text-uppercase"><b>Responsable/s del espacio de coordinación:</b></p>
            <div id="loadTableResponsibles"></div>

            <p class="text-uppercase mt-5"><b>Asistente/s por parte de FUSALMO:</b></p>
            <div id="loadTableParticipants"></div>
        </div>
    </div>

    <p class="fs-5 mb-3 text-uppercase">INFORMACIÓN GENERAL DEL ESPACIO</p>
    <ol class="list-group list-group-numbered mb-5">
        <li class="list-group-item">
            <b class="mb-4">Objetivo del espacio:</b><br/>
            <span class="ms-4"><?=$dataS[1]?></span>
        </li>
        <li class="list-group-item">
            <b class="mb-4">Agenda del espacio:</b><br/>
            <span class="ms-4"><?=$agenda?></span>
        </li>
        <li class="list-group-item">
            <b class="mb-4">¿Qué temas se han abordado y qué puntos de vista, opiniones se han desarrollado en torno a los mismos?</b><br/>
            <span class="ms-4"><?=$dataS[4]?></span>
        </li>
        <li class="list-group-item">
            <b class="mb-4">Espacios de coordinación: ¿Cuáles fueron los acuerdos que se tomaron? ¿Cuáles son los próximos pasos?</b><br/>
            <span class="ms-4"><?=$dataS[5]?></span>
        </li>
        <li class="list-group-item">
            <b class="mb-4">Compromisos asumidos por FUSALMO:</b><br/>
            <span class="ms-4"><?=$dataS[6]?></span>
        </li>
        <li class="list-group-item">
            <b class="mb-4">Comentarios adicionales:</b><br/>
            <span class="ms-4"><?=$dataS[7]?></span>
        </li>
    </ol>

    <p class="fs-5 mb-3 text-uppercase">EVIDENCIAS</p>
    <table class="table table-bordered">
        <thead>
            <tr> 
                <th style="width: 50%;">Invitación</th>
                <th style="width: 50%;">Archivo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?=$dataE[1]?></td>
                <td><?=$invitation = ($dataE[2] == "") ? "Sin archivo" : "<a href='/process/documents/$dataE[2]' target='_blank'>Descargar</a>";?></td>
            </tr>
        </tbody>
    </table>

    <table class="table table-bordered">
        <thead>
            <tr> 
                <th style="width: 50%;">Documento relacionado</th>
                <th style="width: 50%;">Archivo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?=$dataE[3]?></td>
                <td><?=$invitation = ($dataE[4] == "") ? "Sin archivo" : "<a href='/process/documents/$dataE[4]' target='_blank'>Descargar</a>";?></td>
            </tr>
        </tbody>
    </table>

    <p class="fs-5 mb-3 mt-5 text-uppercase">IMAGENES</p>
    <div id="loadPictures"></div>

</div>

<script>
    $(document).ready(function(){
        $("#loadTableResponsibles").load("/view/spaces/spaces.responsibles.table.php",{
            ids: "<?=$ids?>",
            view: true
        });

        $("#loadTableParticipants").load("/view/spaces/spaces.participants.table.php",{
            ids: "<?=$ids?>",
            view: true
        });

        $("#loadPictures").load("/view/spaces/spaces.pictures.php",{
            ids: "<?=$ids?>",
            view: true
        });
    });
</script>
