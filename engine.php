<?php
$authent = (isset($_SESSION['iu'])) ? True : False;
$view = (isset($_GET['view'])) ? $_GET['view'] : '';
include("template/breadcrumbles.php");
// Public
if ($view == '')
    include("view/public.php");
// Login de ACceso    
else if ($view == 'login')
    include("view/login/login.php");
// Página de Inicio    
else if ($view == "main" && $authent)
    include("view/main2.php");

// Página de Expedientes     
else if ($view == "transcript" && $authent)
    include("view/transcript/transcript.php");

// Página principal     
else if ($view == "home2" && $authent)
    include("view/main2.php");

// Página de Operaciones    
else if ($view == "operaciones" && $authent)
    include("view/operaciones.php");

// Página de Talento Humano   
else if ($view == "talentohumano" && $authent)
    include("view/talentohumano.php");

// Página de cuestionario de necesidades     
else if ($view == "needs" && $authent)
    include("view/needs/needs.php");

// Gestión de Usuarios 
else if ($view == "user" && $authent)
    include("view/users/user.php");

// Gestión de Áreas 
else if ($view == "area" && $authent)
    include("view/work_area/work_area.php");

// Gestión de Empleados 
else if ($view == "employee" && $authent)
    include("view/employees/employees.php");

// Página de Perfil
else if ($view == "profile" && $authent)
    include("view/profile/profile.php");

// Página de Permisos
else if ($view == "permissions" && $authent)
    include("view/permissions/permissions.php");
else if ($view == "permissionAnswer")
    include("view/permissions/permission.view.php");

// Verificación de Acciones de Usuarios
else if ($view == "log" && $authent)
    include("view/log/log.php");

// Verificación de Acciones de Usuarios
else if ($view == "personnelactions" && $authent)
    include("view/personnelactions/personnelactions.php");

// Gestión de Inventario
else if ($view == "inventory" && $authent)
    include("view/inventory/inventory.php");

// Gestión de Inventario de MEMOS
else if ($view == "inventory-memos" && $authent)
    include("view/inventory/inventory.memo.php");

// Gestión de Inventario de MEMOS
else if ($view == "inventory-memos-create" && $authent)
    include("view/inventory/inventory.memo.register.php");


// Vista Inventario Prueba    
else if ($view == "inventarioPrueba" && $authent)
    include("view/inventory_prueba/pruebaBase.php");

else if ($view == "logoff") {
    session_destroy();
    registerLog($net_rrhh, "Login", "Login", "Logoff", "Cerrar de Sesión");
    redirection("../?view=login&n=2");
} else
    redirection("../?view=login&n=3");


?>