<?php include("../../../../../config/net.php");

    $action = $_REQUEST['action'];

    if ($action == "add-module") {
?>

<div class="p-3">
    <div class="mb-3">
        <label for="cboWorkareas" class="form-label">Área:</label>
        <select id="cboWorkareas" class="form-control js-example-basic-single validations" aria-label="Default select example">
            <option value="">Seleccionar</option>
            <?php
                $query = "SELECT * FROM `workarea` WHERE visible = 1";
                $workareas = $net_rrhh->prepare($query);
                $workareas->execute();

                while ($data = $workareas->fetch()) {
                    echo "<option value='$data[0]'>$data[1]</option>";
                }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="cboPositions" class="form-label">Cargo:</label>
        <select id="cboPositions" class="form-control js-example-basic-single validations" aria-label="Default select example">
            <option value="">Seleccione un área</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="cboRol" class="form-label">Rol:</label>
        <select id="cboRol" class="form-control js-example-basic-single validations" aria-label="Default select example">
            <option value="">Seleccionar</option>
            <option value="supplier" selected>Proveedor</option>
            <option value="customer natural">Clientes Naturales</option>
            <option value="customer legal">Clientes Jurídicos</option>
            <option value="consultant">Consultor</option>
            <option value="founders">Miembros Fundadores</option>
            <option value="employee">Empleado</option>
            <option value="boardDirectors">Junta Directiva</option>
        </select>
    </div>

    <button type="button" id="btnSaveModuleAccess" class="btn-siif btn-solid-2 d-block mx-auto mt-4">
        Guardar
    </button>
</div>

<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2({
            dropdownParent: $('#accessModal')
        });

        $("#cboWorkareas").on("change", function() {
            var selectedAreaId = $(this).val(); // Obtener el valor seleccionado de cboWorkareas

            // Enviar la solicitud con el valor de ida
            $("#cboPositions").load("/functions/loadSelects.php", {
                action: "loadPositions",
                ida: selectedAreaId // Pasar el valor de ida
            });
        });

        $("#btnSaveModuleAccess").click(function() {
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
                    action: "addAccessModule",

                    idp: $("#cboPositions").val(),
                    rol: $("#cboRol").val(),
                },
                function(response){
                    let header = "";
                    let text = "";
                    let icon = "";
                    console.log(response);

                    if (response == "ok") {
                        header = "¡Acceso otorgado correctamente!";
                        text = "El acceso ha sido otorgado correctamente";
                        icon = "success";


                    }else{
                        header = "¡Error!";
                        text = "Error al intentar otorgar el acceso";
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

                    $("#btnCloseAccess").trigger("click");
                    loadModuleAccessList();
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

<?php }elseif ($action == "changeStatus-module") { 
    
    $query = "SELECT a.id, CONCAT(e.name1, ' ', e.lastname1) as 'employee', p.position, a.rol, a.status, a.dtc, p.id as 'idp' FROM `debida_diligencia_access` as a 
                INNER JOIN workarea_positions as p ON p.id = a.idPosition
                INNER JOIN workarea_positions_assignment as wpa ON wpa.idposition = p.id
                INNER JOIN employee as e ON e.id = wpa.idemployee
                WHERE wpa.enddate = '0000-00-00' AND a.id = ". $_REQUEST["id"];
    $access = $net_rrhh->prepare($query);
    $access->execute();
    $data = $access->fetch();

    $btnClass = ($data[4] == 0) ? 'btn-danger' : 'btn-success';
    $btnText = ($data[4] == 0) ? 'Deshabilitar' : 'Habilitar';

    
?>

<div class="p-3">
    <p class="text-center fs-5">¿Estás seguro que deseas deshabilitar el siguiente acceso?</p>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Empleado</th>
                <th>Cargo</th>
                <th>Rol</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?=$data[1]?></td>
                <td><?=$data[2]?></td>
                <td>
                    <?php
                        switch ($data[3]) {
                            case 'administrator': echo "Administrador"; break;   
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

    <button id="btnChangeAccess" type="button" class="btn <?=$btnClass?> d-block mx-auto mt-3">
        <?=$btnText?>
    </button>   
</div>

<script>
    $(document).ready(function() {

        $("#btnChangeAccess").click(function() {
            
            $.post("/process/index.php", {
                process: "debida-diligencia",
                action: "changeStatusAccessModule",

                ida: "<?=$_REQUEST["id"]?>",
                idp: "<?=$data[6]?>",
                status: "<?=$data[4]?>"
            },
            function(response){
                let header = "";
                let text = "";
                let icon = "";
                console.log(response);

                if (response == "ok") {
                    header = "¡Acceso deshabilitado correctamente!";
                    text = "El acceso ha sido deshabilitado correctamente";
                    icon = "success";


                }else{
                    header = "¡Error!";
                    text = "Error al intentar deshabilitar el acceso";
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

                $("#btnCloseAccess").trigger("click");
                loadModuleAccessList();
            });
                
            
        });
    });
</script>

<?php }elseif ($action == "changeStatus-forms") { 
    
    include("../config/net.php"); 

    $query = "SELECT * FROM `fus__dd_siif_access` WHERE id= ". $_REQUEST["id"];
    $siifAccess = $net->prepare($query);
    $siifAccess->execute();
    $data = $siifAccess->fetch();

    $btnClass = ($data[3] == 0) ? 'btn-danger' : 'btn-success';
    $btnText = ($data[3] == 0) ? 'Deshabilitar' : 'Habilitar';

    $query = "SELECT * FROM `employee` WHERE id = $data[1]";
    $employee = $net_rrhh->prepare($query);
    $employee->execute();
    $dataE = $employee->fetch();
?>


<div class="p-3">
    <p class="text-center fs-6">¿Estás seguro que deseas deshabilitar el acceso a <b><?=$dataE[1]?> <?=$dataE[2]?> <?=$dataE[4]?> <?=$dataE[5]?></b>?</p>

    <button id="btnChangeAccess" type="button" class="btn <?=$btnClass?> d-block mx-auto mt-3">
        <?=$btnText?>
    </button>   
</div>

<script>
    $(document).ready(function() {

        $("#btnChangeAccess").click(function() {
            
            $.post("/process/index.php", {
                process: "debida-diligencia",
                action: "changeStatusAccessForms",

                ida: "<?=$data[0]?>",
                status: "<?=$data[3]?>",
            },
            function(response){
                let header = "";
                let text = "";
                let icon = "";
                console.log(response);

                if (response == "ok") {
                    header = "¡Acceso deshabilitado correctamente!";
                    text = "El acceso ha sido deshabilitado correctamente";
                    icon = "success";


                }else{
                    header = "¡Error!";
                    text = "Error al intentar deshabilitar el acceso";
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

                $("#btnCloseAccess").trigger("click");
                loadFormsAccessList();
            });
                
            
        });
    });
</script>

<?php } ?>