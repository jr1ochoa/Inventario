<?php include("../../config/net.php"); 

    $ids = $_REQUEST["ids"];

    $query = "SELECT * FROM spaces WHERE id = $ids";
    $space = $net_rrhh->prepare($query);
    $space->execute();
    $data = $space->fetch();

    $query = "SELECT * FROM `spaces_details` WHERE idSpace = $ids";
    $details = $net_rrhh->prepare($query);
    $details->execute();

    $dataS = $details->fetch();

?>

<div class="container my-5">
    <h1 class="text-center mb-5"><?=$data[1]?></h1>

    <form action="/process/index.php" method="post" enctype="multipart/form-data">

    <input type="hidden" name="process" value="spaces">
    <input type="hidden" name="action" value="addSpaceDetail">
    <input type="hidden" name="ids" value="<?=$ids?>">

    <p class="fs-5 mb-2 text-uppercase">INFORMACIÓN GENERAL DEL ESPACIO</p>
    <div class="card mb-5">
        <div class="card-body">
            <div class="row">
                <div class="col-12 mb-3">
                    <label for="txtObjetive" class="form-label">Objetivo del espacio:</label>
                    <textarea class="form-control" id="txtObjetive" name="txtObjetive" rows="3"><?=$dataS[1]?></textarea>
                </div>
                <div class="col-12 mb-3">
                    <label for="txtAgenda" class="form-label mb-3">Agenda del espacio:</label>
                    <?php
                        $array = array("rbAgenda1" => "Archivo", "rbAgenda2" => "Texto");

                        foreach ($array as $key => $value) {
                            $checked = ($dataS[2] == $value) ? "checked" : "";
                            echo "<div class='form-check form-check-inline'>
                                    <input class='form-check-input' type='radio' name='rbAgenda' id='$key' value='$value' $checked>
                                    <label class='form-check-label' for='$key'>$value</label>
                                </div>";
                        }
                    ?>

                    <input class="form-control my-3" type="file" id="txtAgendaFile" name="txtAgendaFile" style="display: none;" accept="application/pdf, image/png, image/jpeg">
                    <textarea class="form-control my-3" id="txtAgenda" name="txtAgenda" rows="3" style="display: none;"><?=$dataS[3]?></textarea>
                </div>
                <div class="col-12 mb-3">
                    <label for="txtTopics" class="form-label">¿Qué temas se han abordado y qué puntos de vista, opiniones se han desarrollado en torno a los mismos?</label>
                    <textarea class="form-control" id="txtTopics" name="txtTopics" rows="3"><?=$dataS[4]?></textarea>
                </div>
                <div class="col-12 mb-3">
                    <label for="txtAgreements" class="form-label">Espacios de coordinación: ¿Cuáles fueron los acuerdos que se tomaron? ¿Cuáles son los próximos pasos?</label>
                    <textarea class="form-control" id="txtAgreements" name="txtAgreements" rows="3"><?=$dataS[5]?></textarea>
                </div>
                <div class="col-12 mb-3">
                    <label for="txtCommitments" class="form-label">Compromisos asumidos por FUSALMO:</label>
                    <textarea class="form-control" id="txtCommitments" name="txtCommitments" rows="3"><?=$dataS[6]?></textarea>
                </div>
                <div class="col-12 mb-3">
                    <label for="txtComments" class="form-label">Comentarios adicionales:</label>
                    <textarea class="form-control" id="txtComments" name="txtComments" rows="3"><?=$dataS[7]?></textarea>
                </div>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-success d-block mx-auto px-5 mt-3" id="btnSave">Guardar</button>
    </form>
</div>


<script>
    $(document).ready(function() {
        if ($('#rbAgenda1').is(':checked')) {      
            $('#txtAgendaFile').css('display', "block"); 
            $('#txtAgenda').css('display', "none");
        
        } else if ($('#rbAgenda2').is(':checked')) {
            $('#txtAgendaFile').css('display', "none");
            $('#txtAgenda').css('display', "block");
        }

        $('input[type=radio][name="rbAgenda"]').change(function() {

            if ($('#rbAgenda1').is(':checked')) {
            
                $('#txtAgendaFile').css('display', "block"); 
                $('#txtAgenda').css('display', "none");
            
            } else if ($('#rbAgenda2').is(':checked')) {
            
                $('#txtAgendaFile').css('display', "none");
                $('#txtAgenda').css('display', "block");
            }
        });
    });
</script>