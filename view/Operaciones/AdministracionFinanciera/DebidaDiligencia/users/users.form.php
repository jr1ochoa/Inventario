<?php include("../config/net.php"); 

    $query = "SELECT * FROM fus__dd_users as u WHERE u.id = ". $_REQUEST["id"];
    $user = $net->prepare($query);
    $user->execute();
    $data = $user->fetch();

    if ($_REQUEST["action"] == "Update") {
?>
<div class="p-3">
    <div class="mb-3">
        <label for="txtUsernameForm" class="form-label">Usuario:</label>
        <input type="text" class="form-control validations" id="txtUsernameForm" value="<?=$data[1]?>" />
    </div>
    <div class="mb-3">
        <label for="txtRolForm" class="form-label">Rol:</label>
        <select id="txtRolForm" class="form-select validations" aria-label="Default select example">
            <?php 
                $options = array("administrator" => "Administrador", "participant" => "Participante");

                foreach ($options as $key => $value) {
                    $selected = ($key == $data[5]) ? "selected" : "";
                    echo "<option value='$key' $selected>$value</option>";
                }
            ?>
        </select>
    </div>

    <button id="btnUpdateUsers" type="button" class="btn-siif btn-solid d-block mx-auto px-5">Actualizar</button>
</div>

<script>
    $(document).ready(function(){

        $("#btnUpdateUsers").click(function(){
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
                    action: "updateUsers",
    
                    id: "<?=$_REQUEST["id"]?>",
                    username: $("#txtUsernameForm").val(),
                    rol: $("#txtRolForm").val(),
                },
                function(response){
                    let header = "";
                    let text = "";
                    let icon = "";
                    console.log(response);
    
                    if (response == "ok") {
                        header = "¡Usuario actualizado correctamente!";
                        text = "El usuario ha sido actualizado correctamente";
                        icon = "success";
    
    
                    }else{
                        header = "¡Error!";
                        text = "Error al intentar actualizar el usuario";
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
    
                    $("#btnCloseUsersActions").trigger("click");
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
</script>

<?php }elseif ($_REQUEST["action"] == "Password") { ?>

<div class="p-3">
    <div class="mb-3">
        <label for="txtPasswordForm" class="form-label">Contraseña:</label>
        <div class="input-group mb-3">
            <input id="txtPasswordForm" type="password" class="form-control validations" aria-describedby="btnShowPassword">
            <button class="btn btn-outline-dark" type="button" id="btnShowPassword"><i class="bi bi-eye-fill"></i></button>
        </div>
    </div>
    <div class="mb-3">
        <label for="txtConfirmPasswordForm" class="form-label">Confirmar Contraseña:</label>
        <div class="input-group mb-3">
            <input id="txtConfirmPasswordForm" type="password" class="form-control validations" aria-describedby="btnShowConfirmPassword">
            <button class="btn btn-outline-dark" type="button" id="btnShowConfirmPassword"><i class="bi bi-eye-fill"></i></button>
        </div>
    </div>

    <button id="btnUpdatePassword" type="button" class="btn-siif btn-solid d-block mx-auto px-5">Actualizar</button>
</div>

<script>
    $(document).ready(function() {

        $("#btnShowConfirmPassword").click(function() {
            if($("#txtConfirmPasswordForm").attr('type') == "text"){
                $("#txtConfirmPasswordForm").attr('type', 'password');
                $(this).html('<i class="bi bi-eye-fill"></i>');
            }else{
                $("#txtConfirmPasswordForm").attr('type', 'text');
                $(this).html('<i class="bi bi-eye-slash-fill"></i>');
            }
        });

        $("#btnShowPassword").click(function() {

            if($("#txtPasswordForm").attr('type') == "text"){
                $("#txtPasswordForm").attr('type', 'password')
                $(this).html('<i class="bi bi-eye-fill"></i>');
            }else{
                $("#txtPasswordForm").attr('type', 'text')
                $(this).html('<i class="bi bi-eye-slash-fill"></i>');
            }
        });

        $("#btnUpdatePassword").click(function() {
            emptyValues = false;
    
            $(".validations").each(function() {
                if ($(this).val() === '') {
                    emptyValues = true;
                    return false; 
                }
            });
    
            if (!emptyValues) {

                if ($("#txtPasswordForm").val() == $("#txtConfirmPasswordForm").val()) {
                    $.post("/process/index.php", {
                        process: "debida-diligencia",
                        action: "updateUsersPassword",
        
                        id: "<?=$_REQUEST["id"]?>",
                        password: $("#txtPasswordForm").val(),
                    },
                    function(response){
                        let header = "";
                        let text = "";
                        let icon = "";
                        console.log(response);
        
                        if (response == "ok") {
                            header = "¡Contraseña actualizada correctamente!";
                            text = "La contraseña ha sido actualizada correctamente";
                            icon = "success";
        
        
                        }else{
                            header = "¡Error!";
                            text = "Error al intentar actualizar la contraseña";
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
        
                        $("#btnCloseUsersActions").trigger("click");
                        loadUsers()
                    });
                    
                }else{
                    $.toast({
                        heading: "Las contraseñas no coinciden...",
                        text: "Las contraseñas deben de ser iguales",
                        showHideTransition: 'slide',
                        icon: "warning",
                        hideAfter: 6000, 
                        position: 'bottom-right',
                    });

                }
                
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

<?php }else if ($_REQUEST["action"] == "Disable") { ?>

<div class="p-3">
    <p class="fs-5 text-center">¿Estás seguro que deseas deshabilitar el usuario: <br/><b><?=$data[1]?></b>?</p>
    <button id="btnDisableUser" type="button" class="btn-siif btn-solid d-block mx-auto px-5">Deshabilitar</button>
</div>

<script>
    $(document).ready(function(){
        $("#btnDisableUser").click(function(){

            $.post("/process/index.php", {
                process: "debida-diligencia",
                action: "changeStatusUsers",

                id: "<?=$_REQUEST["id"]?>",
                status: "1"
            },
            function(response){
                let header = "";
                let text = "";
                let icon = "";
                console.log(response);

                if (response == "ok") {
                    header = "¡Usuario deshabilitado correctamente!";
                    text = "El usuario ha sido deshabilitado correctamente";
                    icon = "success";


                }else{
                    header = "¡Error!";
                    text = "Error al intentar deshabilitar el usuario";
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

                $("#btnCloseUsersActions").trigger("click");
                loadUsers()
            });
                
        });
    });
</script>

<?php }else if ($_REQUEST["action"] == "Enable") { ?>

<div class="p-3">
    <p class="fs-5 text-center">¿Estás seguro que deseas habilitar el usuario: <br/><b><?=$data[1]?></b>?</p>
    <button id="btnEnableUser" type="button" class="btn-siif btn-solid d-block mx-auto px-5">Habilitar</button>
</div>

<script>
    $(document).ready(function(){
        $("#btnEnableUser").click(function(){

            $.post("/process/index.php", {
                process: "debida-diligencia",
                action: "changeStatusUsers",

                id: "<?=$_REQUEST["id"]?>",
                status: "0"
            },
            function(response){
                let header = "";
                let text = "";
                let icon = "";
                console.log(response);

                if (response == "ok") {
                    header = "¡Usuario deshabilitado correctamente!";
                    text = "El usuario ha sido deshabilitado correctamente";
                    icon = "success";


                }else{
                    header = "¡Error!";
                    text = "Error al intentar deshabilitar el usuario";
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

                $("#btnCloseUsersActions").trigger("click");
                loadUsers()
            });
                
        });
    });
</script>

<?php } ?>