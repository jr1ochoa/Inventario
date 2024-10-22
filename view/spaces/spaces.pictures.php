<?php include("../../config/net.php"); 

    $ids = $_REQUEST["ids"]
?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Imagen</th>
            <th>Detalle</th>
            <?php if (!isset($_REQUEST["view"])) { ?>
            <th>Acciones</th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
                $query = "SELECT * FROM spaces_pictures WHERE idSpace = $ids";
                $pictures = $net_rrhh->prepare($query);
                $pictures->execute();
                $i=0;

                while ($data = $pictures->fetch()) {
                    $i++;
                    echo "<tr>
                            <td>$i</td>
                            <td><a href='/process/documents/$data[1]' target='_blank'>Descargar</a></td>
                            <td>$data[2]</td>";
                    if (!isset($_REQUEST["view"])) { 
                    echo "<td>
                                <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#evidencesModal' onclick='deletePicture($data[0])'>
                                    Eliminar
                                </button>
                            </td>";
                    }
                    echo "</tr>";
                }
            ?>
        </tr>
    </tbody>
</table>

<script>
    function deletePicture(id) {
        $("#loadEvidencesForm").load("/view/spaces/spaces.picture.form.php",{
            ids: "<?=$ids?>",
            id: id,
            action: "delete"
        });
    }
</script>