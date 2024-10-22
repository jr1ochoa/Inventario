<?php include("../../config/net.php"); 

    $ids = $_REQUEST["ids"];

    $query = "SELECT * FROM spaces WHERE id = $ids";
    $space = $net_rrhh->prepare($query);
    $space->execute();
    $data = $space->fetch();

?>


<div class="container my-5">
    <h1 class="text-center mb-5"><?=$data[1]?></h1>

    <form action="/process/index.php" method="post" enctype="multipart/form-data">

    <input type="hidden" name="process" value="spaces">
    <input type="hidden" name="action" value="addSpaceEvidences">
    <input type="hidden" name="ids" value="<?=$ids?>">

    <div class="row">
        <div class="col-md-8">
            <p class="fs-5 mb-2 text-uppercase">IMAGENES</p>
        </div>
        <div class="col-md-4">
            <button type="button" id="addPicture" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#evidencesModal">Agregar Imagen</button>
        </div>
    </div>
    <div id="loadPictures" class="mb-5"></div>

    <p class="fs-5 mb-2 text-uppercase">EVIDENCIAS</p>
    <div class="card mb-5">
        <div class="card-body">
            <div class="row">
                <div class="col-12 mb-3">
                    <label for="txtInvitation" class="form-label">Invitación:</label>
                    <select id="txtInvitation" class="form-select" name="txtInvitation" aria-label="Default select example">
                        <option value="No">No</option>
                        <option value="Si">Si</option>
                    </select>
                </div>
                <div id="invitationFile" class="col-12 mb-3" style="display: none;">
                    <label for="txtInvitationFile" class="form-label mb-3">Seleccione la invitación:</label>
                    <input class="form-control my-3" type="file" id="txtInvitationFile" name="txtInvitationFile" accept="application/pdf, image/png, image/jpeg">
                </div>
                <div class="col-12 mb-3">
                    <label for="txtDocument" class="form-label">Documento relacionado</label>
                    <select id="txtDocument" class="form-select" name="txtDocument" aria-label="Default select example">
                        <option value="No">No</option>
                        <option value="Si">Si</option>
                    </select>
                </div>
                <div id="documentFile" class="col-12 mb-3" style="display: none;">
                    <label for="txtDocumentFile" class="form-label mb-3">Seleccione el documento:</label>
                    <input class="form-control my-3" type="file" id="txtDocumentFile" name="txtDocumentFile" accept="application/pdf, image/png, image/jpeg">
                </div>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-success d-block mx-auto px-5 mt-3" id="btnSave">Guardar</button>
    </form>
</div>

<!-- Modal -->
<div class="modal fade" id="evidencesModal" tabindex="-1" aria-labelledby="evidencesModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="evidencesModalLabel">Evidencias</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div id="loadEvidencesForm" class="modal-body"></div>
      <div class="modal-footer">
        <button id="btnCloseEvidence" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function(){
        $("#addPicture").click(function(){
            $("#loadEvidencesForm").load("/view/spaces/spaces.picture.form.php",{
                ids: "<?=$ids?>"
            });
        });

        $("#loadPictures").load("/view/spaces/spaces.pictures.php",{
            ids: "<?=$ids?>"
        });
        
        $("#txtInvitation").change(function(){
            if ($(this).val() == "Si"){
                $("#invitationFile").css("display", "block");
            }else{
                $("#invitationFile").css("display", "none");
            }
        });
        $("#txtDocument").change(function(){
            if ($(this).val() == "Si"){
                $("#documentFile").css("display", "block");
            }else{
                $("#documentFile").css("display", "none");
            }
        });
    });
</script>
