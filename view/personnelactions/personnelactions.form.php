<!-- FORMULARIO DE ACCIONES DE PERSONAL -->

<?php include("../../config/net.php"); //Conexión a la BDD

    $iu = (isset($_REQUEST['iu'])) ? $_REQUEST['iu'] : "";
    $action = $_REQUEST['action'];


    //Validación de las acciones
    if ($action != 'add'){
        $query = "SELECT * FROM processarea_staffaction where id = ". $iu;
        $personnelaction = $net_rrhh->prepare($query);
        $personnelaction->execute();
        $dataPA = $personnelaction->fetch();
    }

    switch ($action){
        case 'add':
            $actionSend = "Add Action";
            break;
        case 'update':
            $actionSend = "Update Action";
            break;
        case 'delete':
            $actionSend = "Delete Action";
            break;
        case 'doc':
            $actionSend = "Update Document";
            break;
    }

?>

<!-- Formulario -->
<form action="process/" method="post" id="formActions" enctype="multipart/form-data" class="mb-3">
    <h3 class="text-uppercase fw-bolder text-center">Acción de Personal</h3>
    <input type="hidden" class="form-control" name="process" value="PersonnelActions" />
    <input type="hidden" class="form-control" name="action" value="<?= $actionSend; ?>" />
    <input type="hidden" class="form-control" name="id" value="<?= $iu; ?>" />
 
    <!-- Agregar / Actualizar -->
    <?php if ($action == 'add' || $action == 'update'){ ?>
    <div class="mb-4">
            <label for="cboEmployee" class="form-label">Empleado: <?=$dataPA[1]?></label>
            <select id="cboEmployee" name="employee" class="js-example-basic-single" style="width: 100%">
                <?php
                    $query = "SELECT id, CONCAT(name1,' ',name2,' ',name3,' ',lastname1,' ',lastname2) as 'Empleado' FROM `employee`";       
                    $employee = $net_rrhh->prepare($query);  
                    $employee->execute();

                    while($data = $employee->fetch())
                    {
                        $selected = ($data[0] == $dataPA[1]) ? "selected" : "";
                        echo "<option value='$data[0]' $selected>".utf8_encode($data[1])."</option>";
                    }
                ?>
            </select>
    </div>
    <?php } ?>

    <!-- Agregar acción / Agregar documento -->
   <?php if ($action == 'add' || $action == 'doc'){ ?>
    <div class="mb-4">
        <label for="file" class="form-label">Acción de Personal</label>
        <input class="form-control" type="file" name="file" id="file" accept=".pdf">
    </div>
    <?php } ?>

    <!-- Eliminar -->
    <?php if ($action == 'delete'){ ?>
        <div class="row">
            <div class="col-md-3 text-center">
                <i class="bi bi-archive-fill text-danger" style="font-size: 2.5rem;"></i>
            </div>
            <div class="col-md-9">
                <p> <b class="text-uppercase">¿Está seguro que desea eliminar este registro?</b> <br/> (Documento.<?=$dataPA[2]?>)</p>
            </div>
        </div>
    <?php } ?>
</form>

<script>
    //Activar Select2
    $('#cboEmployee').select2({
        dropdownParent: $('#FormModal .modal-body')
    });
</script>
