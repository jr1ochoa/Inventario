<?php include("../config/net.php"); 

    $condition = "";
    $title = "";
    $subtitle = "";

    if ($_REQUEST["rol"] != "") {
        $condition .= "WHERE rol = '".$_REQUEST['rol']."'"; 
        $condition .= ($_REQUEST["status"] != "") ? " AND status = " . $_REQUEST['status'] : "";
    }else{
        $condition .= ($_REQUEST["status"] != "") ? "WHERE status = " . $_REQUEST['status'] : "";
    }

    $query = "SELECT * FROM `fus__dd_users` $condition";
    $users = $net->prepare($query);
    $users->execute();
    $i=0;
    $status="";
    $rol="";

    $title = ($_REQUEST["rol"] == "administrator") ? "Administradores" : "Participantes";
    $subtitle = ($_REQUEST["status"] == 0) ? "Activos" : "Inactivos";

    $title = ($_REQUEST["rol"] != "") ? $title : "Todos los Usuarios";
?>

<h2 class="text-uppercase text-center"><?=$title?></h2>
<p class="text-center text-muted fs-5"><?=$subtitle?></p>
<hr class="d-block mx-auto" style="border: 1px solid #1a4262; width: 50%;" />

<table id="usersTable" class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Usuario</th>
            <th>Rol</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while ($data = $users->fetch()) {
                $status = ($data[6] == 0) ? "Activo" : "Inactivo";
                $rol = ($data[5] == "administrator") ? "Administrador" : "Participante";
                $i++;
                echo "
                    <tr>
                        <td>$i</td>
                        <td>$data[1]</td>
                        <td>$rol</td>
                        <td>$status</td>
                        <td>
                            <div class='dropdown'>
                                <button class='btn-siif btn-solid-2 dropdown-toggle' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                    <i class='bi bi-wrench-adjustable-circle'></i> Acciones
                                </button>
                                <ul class='dropdown-menu'>
                                    <li><a class='dropdown-item' href='#' data-bs-toggle='modal' data-bs-target='#usersActionsModal' onclick='loadForm($data[0], \"Update\")'>Editar</a></li>
                                    <li><a class='dropdown-item' href='#' data-bs-toggle='modal' data-bs-target='#usersActionsModal' onclick='loadForm($data[0], \"Password\")'>Cambiar contraseña</a></li>";
                                    
                                    if($_REQUEST["status"] == 0){
                                        echo "<li><a class='dropdown-item' href='#' data-bs-toggle='modal' data-bs-target='#usersActionsModal' onclick='loadForm($data[0], \"Disable\")'>Deshabilitar</a></li>";
                                    }else{
                                        echo "<li><a class='dropdown-item' href='#' data-bs-toggle='modal' data-bs-target='#usersActionsModal' onclick='loadForm($data[0], \"Enable\")'>Habilitar</a></li>";
                                    }
                
                echo "
                                </ul>
                            </div>
                        </td>
                    </tr>
                ";
            }
        ?>
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="usersModal" tabindex="-1" aria-labelledby="usersModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title text-uppercase fs-5" id="usersModalLabel">Usuarios</h1>
            </div>
            <div class="modal-body">
                <div class="p-4">
                    <div class="mb-3">
                        <label for="txtUsername" class="form-label">Usuario:</label>
                        <input type="text" class="form-control validations-user" id="txtUsername" />
                    </div>
                    <div class="mb-3">
                        <label for="txtPassword" class="form-label">Contraseña:</label>
                        <input type="password" class="form-control validations-user" id="txtPassword" />
                    </div>
                    <div class="mb-3">
                        <label for="txtRol" class="form-label">Rol:</label>
                        <select id="txtRol" class="form-select validations-user" aria-label="Default select example">
                            <option value="" selected>Seleccionar</option>
                            <option value="administrator">Administrador</option>
                            <option value="participant">Participante</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="btnSaveUsers" type="button" class="btn-siif btn-solid">Guardar</button>
                <button id="btnCloseUsers" type="button" class="btn-siif btn-solid-2" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="usersActionsModal" tabindex="-1" aria-labelledby="usersActionsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="usersActionsModalLabel">Usuarios</h1>
            </div>
            <div id="loadFormUsers" class="modal-body"></div>
            <div class="modal-footer">
                <button id="btnCloseUsersActions" type="button" class="btn-siif btn-solid-2" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#usersTable").DataTable();
        
        $("#btnSaveUsers").click(function(){
            emptyValues = false;

            $(".validations-user").each(function() {
                if ($(this).val() === '') {
                    emptyValues = true;
                    return false; 
                }
            });

            if (!emptyValues) {
                $.post("/process/index.php", {
                    process: "debida-diligencia",
                    action: "addUsers",

                    username: $("#txtUsername").val(),
                    password: $("#txtPassword").val(),
                    rol: $("#txtRol").val(),
                },
                function(response){
                    let header = "";
                    let text = "";
                    let icon = "";
                    console.log(response);

                    if (response == "ok") {
                        header = "¡Usuario ingresado correctamente!";
                        text = "El usuario ha sido ingresado correctamente";
                        icon = "success";


                    }else{
                        header = "¡Error!";
                        text = "Error al intentar ingresar el usuario";
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

                    $("#btnCloseUsers").trigger("click");
                    loadUsers()
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

    function loadForm(id, action) {
        $("#loadFormUsers").load("/view/Operaciones/AdministracionFinanciera/DebidaDiligencia/users/users.form.php",{
            id: id,
            action: action,
        });
    }
</script>