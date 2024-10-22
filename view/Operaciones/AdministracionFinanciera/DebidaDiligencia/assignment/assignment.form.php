<?php include("../config/net.php");

    $action = $_REQUEST['action'];

    if ($action == 'add') {
?>

<div class="p-3">
    <div class="mb-3">
        <label for="cboForm" class="form-label">Formulario a asignar:</label>
        <select id="cboForm" class="form-select validations" aria-label="Default select example">
            <option value="" selected>Seleccionar</option>
            <option value="supplier">Proveedor</option>
            <option value="customer natural">Cliente Natural</option>
            <option value="customer legal">Cliente Jurídico</option>
            <option value="founders">Miembros Fundadores</option>
            <option value="consultant">Consultor</option>
            <option value="employee">Empleado</option>
            <option value="boardDirectors">Junta Directiva</option>
        </select>
    </div>

    <button id="btnSaveAssignment" type="button" class="btn-siif btn-solid d-block mx-auto">
        Guardar
    </button>
</div>

<script>
    $(document).ready(function() {
        $("#btnSaveAssignment").click(function() {
            emptyValues = false;

            $(".validations").each(function() {
                if ($(this).val() === '') {
                    emptyValues = true;
                    return false; 
                }
            });

            if (!emptyValues) {
                $.post("/process/index.php", {
                    process: "debida-diligencia",
                    action: "addAssignment",

                    idUser: "<?=$_REQUEST["idu"]?>",
                    form: $("#cboForm").val(),
                },
                function(response){
                    let header = "";
                    let text = "";
                    let icon = "";
                    console.log(response);

                    if (response == "ok") {
                        header = "¡Asignación realizada correctamente!";
                        text = "Asignación ha sido realizada correctamente";
                        icon = "success";


                    }else{
                        header = "¡Error!";
                        text = "Error al intentar realizar la asignación";
                        icon = "error";
                    }

                    $.toast({
                        heading: header,
                        text: text,
                        showHideTransition: 'slide',
                        icon: icon,
                        hideAfter: 6000, 
                        position: 'bottom-right',
                    });

                    $("#btnCloseAssignment").trigger("click");
                    loadAssignments('<?=$_REQUEST["idu"]?>');
                });
                
            }else{
                $.toast({
                    heading: "Campos vacios",
                    text: "Debe llenar todos los campos para guardar el dato",
                    showHideTransition: 'slide',
                    icon: "warning",
                    hideAfter: 6000, 
                    position: 'bottom-right',
                });
            }
        });
    });
</script>

<?php }elseif ($action == "delete") {
    
    $query = "SELECT a.id, u.user, a.form_type, a.dtc FROM fus__dd_assignation_form as a 
                INNER JOIN fus__dd_users as u ON a.idUser = u.id
                WHERE a.id = ". $_REQUEST["id"];
    $assignments = $net->prepare($query);
    $assignments->execute();
    $data = $assignments->fetch();
?>

<div class="p-3">
    <p class="text-center fs-5">¿Estás seguro que deseas eliminar la siguiente asignación del formulario?</p>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Formulario</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?=$data[1]?></td>
                <td>
                    <?php
                        switch ($data[2]) {
                            case 'supplier': echo "Proveedor"; break;   
                            case 'customer natural': echo "Cliente Natural"; break;   
                            case 'customer legal': echo "Cliente Jurídico"; break;   
                            case 'founders': echo "Miembros Fundadores"; break;   
                            case 'consultant': echo "Consultor"; break;   
                            case 'employee': echo "Empleado"; break;   
                            case 'boardDirectors': echo "Junta Directiva"; break;   
                        }
                    ?>
                </td>
            </tr>
        </tbody>
    </table>

    <button id="btnDeleteAssignment" type="button" class="btn-siif btn-solid d-block mx-auto mt-3">
        Eliminar
    </button>
</div>

<script>
    $(document).ready(function() {
        $("#btnDeleteAssignment").click(function() {
            $.post("/process/index.php", {
                process: "debida-diligencia",
                action: "deleteAssignments",

                ida: "<?=$_REQUEST["id"]?>",
            },
            function(response){
                let header = "";
                let text = "";
                let icon = "";
                console.log(response);

                if (response == "ok") {
                    header = "¡Asignación eliminada correctamente!";
                    text = "Asignación ha sido eliminada correctamente";
                    icon = "success";


                }else{
                    header = "¡Error!";
                    text = "Error al intentar eliminar la asignación";
                    icon = "error";
                }

                $.toast({
                    heading: header,
                    text: text,
                    showHideTransition: 'slide',
                    icon: icon,
                    hideAfter: 6000, 
                    position: 'bottom-right',
                });

                $("#btnCloseAssignment").trigger("click");
                loadAssignments('<?=$_REQUEST["idu"]?>');
            });
                
        });
    });
</script>
<?php } ?>