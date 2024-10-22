<?php
$authent = (isset($_SESSION['iu'])) ? True : False;
$view = (isset($_GET['view'])) ? $_GET['view'] : '';

include("template/breadcrumbles.php");

// Public
if($view == '')
    include("view/public.php"); 

// Login de ACceso    
else if($view == 'login')
    include("view/login/login.php");    

// Página de Inicio    
else if($view == "main" && $authent)
    include("view/main.php");

// Página de Expedientes     
else if($view == "transcript" && $authent)
    include("view/transcript/transcript.php");    

    // Página de Expedientes     
else if($view == "home2" && $authent)
include("view/main2.php"); 

// Página de cuestionario de necesidades     
else if($view == "needs" && $authent)
    include("view/needs/needs.php");        

// Gestión de Usuarios 
else if($view == "user" && $authent)
    include("view/users/user.php"); 
    
// Gestión de Áreas 
else if($view == "area" && $authent)
    include("view/work_area/work_area.php");

// Gestión de Empleados 
else if($view == "employee" && $authent)
    include("view/employees/employees.php");

// Página de Perfil
else if($view == "profile" && $authent)
    include("view/profile/profile.php");

// Página de Permisos
else if($view == "permissions" && $authent)
    include("view/permissions/permissions.php");

else if($view == "permissionAnswer")
    include("view/permissions/permission.view.php");

// Verificación de Acciones de Usuarios
else if($view == "log" && $authent)
    include("view/log/log.php"); 
    
// Verificación de Acciones de Usuarios
else if($view == "personnelactions" && $authent)
    include("view/personnelactions/personnelactions.php");       
    
// Gestión de Inventario
else if($view == "inventory" && $authent)  
    include("view/inventory/inventory.php"); 

    // Gestión de Inventario de MEMOS
else if($view == "inventory-memos" && $authent)  
    include("view/inventory/inventory.memo.php");

        // Gestión de Inventario de MEMOS
else if($view == "inventory-memos-create" && $authent)  
include("view/inventory/inventory.memo.register.php"); 


// Vista Inventario Prueba    
else if($view == "inventarioPrueba" && $authent)
    include("view/inventory_prueba/pruebaBase.php");

//::::::::::::::::::: Vista Monitoreo ::::::::::::::::::::   
else if($view == "monitoreo" && $authent)
include("view/Monitoreo/Monitoreo.php");

//Monitoreo Pagina principal :::::::
else if($view == "monitoreoHome" && $authent)
include("view/Monitoreo/Monitoreo.home.php");



else if($view == "monitoreoaddnew" && $authent)
include("view/Monitoreo/Monitoreo.fichas.addnew.php");

else if($view == "imprimirFicha" && $authent)
include("view/Monitoreo/ImprimiFicha.php");

else if($view == "myficha" && $authent)
include("view/Monitoreo/Monitoreo.ficha.individual.php");

else if($view == "headdocument" && $authent)
    include("view/Monitoreo/Monitoreo.encabezado.php");

else if($view == "monitorview" && $authent)
    include("view/Monitoreo/Monitoreo.verficha.php");

else if($view == "monitoreooption" && $authent)
    include("view/Monitoreo/get_options.php");

else if($view == "votaciones" && $authent)
    include("view/votaciones/votaciones.php");

else if($view == "votacionesEstadisticas" && $authent)
    include("view/votaciones/votaciones.estadisticas.php");

else if($view == "evaluations" && $authent)  
    include("view/evaluations/evaluations.php"); 

else if($view == "evaluationsHistory" && $authent)
    include("view/evaluations/evaluations.history.php");

else if($view == "desarrolloSoftware" && $authent)
    include("view/DesarrolloSoftware/desarrollosoftware.php");

//Bitácora de espacios
else if($view == "spaces" && $authent)
    include("view/spaces/spaces.php");

else if($view == "spacesDetail" && $authent){
    $type = (isset($_GET['type'])) ? $_GET['type'] : '1';

    if ($type == '1') {
        include("view/spaces/spaces.detail.php");
    }else{  
        include("view/spaces/spaces.coordination.php");
    }
}

else if($view == "opeFusalmo" && $authent){
    include("view/Operaciones/operaciones.php");   
}
else if($view == "openGestionTerritorial" && $authent)
{
    include("view/Operaciones/GestionProyectos/gestionProyectos.php");   
}
//############## DIRECCIN DE INNOVACION ##################################
else if($view == "direccion_innovacion" && $authent)
{
    include("view/Innovacion/innovacion_home.php");   
}
//::::::::::::::::: MEAL :::::::::::::::::::::::::::::::::::::
else if($view == "home_monitoreo" && $authent)
{
    include("view/Innovacion/Monitoreo/index.php");   
}
else if($view == "memoria_labores" && $authent)
{
    include("view/Innovacion/Monitoreo/Memoria_Labores/memoria.labores.home.php");   
}
else if($view == "memoria_labores_dashboard" )
{
    include("view/powerbi/memoriaLabores.php");   
}
else if($view == "impacto_fusalmo_dashboar" )
{
    include("view/powerbi/impacto_fusalmo.php");   
}
else if($view == "impacto_forma_dashboar" )
{
    include("view/powerbi/dashboard_forma.php");   
}
//:::::::::::: GESTION DE PROYECTOS :::::::::::::::
else if($view == "fichaComunitaria" && $authent)
{
    if($_SESSION['iu']==220727 || $_SESSION['iu']==220794 )
    {
        include("view/Operaciones/GestionProyectos/FichaComunitaria/GestionTerritorial.FichaComunitaria.php");
    }
    else
    {
        //echo "Sorry no tiene permiso amigo";
        //::::::::::::: VISTA PUBLICA ::::::::::::::::::::::::
        include("view/Operaciones/GestionProyectos/FichaComunitaria/GestionTerritorial.FichaComunitariaPublica.php");  
    }
}

else if($view =="fichaCOmunitariaDetalle" && $authent)
{
    if($_SESSION['iu']==220727 )
    {
        include("view/Operaciones/GestionProyectos/FichaComunitaria/GestionTerritorial.DetalleFichaComunitaria.php");
    }
    else
    {
        //GestionTerritorial.FichaComunitariaPublica.phpGestionTerritorial.DetalleFichaComunitariaPublica
        //echo "Sorry no tiene permiso amigo";
        include("view/Operaciones/GestionProyectos/FichaComunitaria/GestionTerritorial.DetalleFichaComunitariaPublica.php");
    }
}
else if($view =="fichaComunitariaGraficas" && $authent)
{
    if($_SESSION['iu']==220727)
    {
        include("view/Operaciones/GestionProyectos/FichaComunitaria/GestionTerritorial.GraficasFicha.php");
    }
    else
    {
        include("view/Operaciones/GestionProyectos/FichaComunitaria/GestionTerritorial.GraficasFicha.php");
        //echo "Sorry no tiene permiso amigo";
    }
}
else if($view == "homeFichaComunitaria" && $authent){
    include("view/Operaciones/GestionProyectos/FichaComunitaria/home.ficha.comunitaria.php");   
}
//:::::::::: ADMINISTRACION Y FINANZAS :::::::::::::::::::::::
else if($view == "administracionFinanza" && $authent){
    include("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.php");   
}
else if($view == "exportarExcelSolicitudes" && $authent){
    include("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.tabla.excel.php");   
}
else if($view == "homeadministracionfinanciera" && $authent){
    include("view/Operaciones/AdministracionFinanciera/administracionfinanciera.php");   
}
else if($view == "formulario-registro" && $authent){
    include("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.formulario.php");   
}
else if($view == "vistaSolicitanteTransporte" && $authent){
    include("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.vista.solicitante.php");   
}
else if($view == "vistaAdmnTransporte" && $authent){
    include("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.vista.administrador.php");   
}

else if($view == "adminFormulariotRANSPORTE" && $authent){
    include("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.formulario.admin.php");   
}
else if($view == "SolicitanteEditarFormulariotRANSPORTE" && $authent){
    include("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.editar.formulario.php");   
}
else if($view == "SolicitanteVerFormulariotRANSPORTE" && $authent){
    include("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.ver.formulario.php");   
}
else if($view == "exportarExcel" && $authent){
    include("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/exportarExcel.php");   
}
else if($view == "SolicitanteAdminVerFormulariotRANSPORTE23" && $authent){
    include("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.ver.administrador.tabla.php");   
}
else if($view == "statsTransportation" && $authent){
    include("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.estadisticas.filtros.php");   
}

//:::::::::: Debida Diligencia :::::::::::::::::::::::
else if($view == "debidaDiligencia" && $authent){

    $module = $_REQUEST["module"];

    if ($module == "users") {
        include("view/Operaciones/AdministracionFinanciera/DebidaDiligencia/users/users.php"); 
        
    }elseif ($module == "forms") {
        include("view/Operaciones/AdministracionFinanciera/DebidaDiligencia/forms/forms.php"); 
    
    }elseif ($module == "formView") {
        include("view/Operaciones/AdministracionFinanciera/DebidaDiligencia/forms/form.view.php"); 
    
    }elseif ($module == "assignment") {
        include("view/Operaciones/AdministracionFinanciera/DebidaDiligencia/assignment/assignment.php"); 
    
    }elseif ($module == "access") {
        include("view/Operaciones/AdministracionFinanciera/DebidaDiligencia/access/access.php"); 
    
    }else{
        include("view/Operaciones/AdministracionFinanciera/DebidaDiligencia/debidaDiligencia.php");   

    }
}


//:::::::::: Recaudacion y Alianzas ::::::::::::::
else if($view == "mapeoAsocios" && $authent){
    include("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/index.php");    
}
else if($view == "conveniosAsocios" && $authent)
{
    include("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/views/gestion_convenio.php");   
}
else if($view == "adminEmpresas" && $authent)
{
    include("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/views/gestion_empresas.php");   
}
else if($view == "mapeoAsocios_Empr" && $authent)
{
    include("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/views/gestion_empresas.php");
}
else if($view == "mapeoAsocios_Conv" && $authent)
{   
    include("view/Operaciones/RecaudacionAlianzas/MapeoAsocios/views/gestion_convenio.php");

}
else if($view =="recaudacionAlianzas")
{
    include("view/Operaciones/RecaudacionAlianzas/recaudacionFinanzas.php"); 
}
//::::::::::: COMUNICACIONES Y RELACIONES PUBLICAS :::::::::::::::::::::::::
else if($view =="comunicaciones")
{
    include("view/Operaciones/ComunicacionesPublicas/comunicaciones.publicas.php"); 
}
else if ($view == "gestionReservaciones")
{
    include("view/Operaciones/ComunicacionesPublicas/ReservacionesMultigimnacio/HomeAdministrativo.php");
}
else if ($view == "webinnarsAdmin")
{
    include("view/Operaciones/ComunicacionesPublicas/Webinnars/Webinnars.php");
}
else if ($view == "ReservacionesCampa")
{
    include("view/Operaciones/ComunicacionesPublicas/ReservacionesDashboard/Reservaciones.php");
}



//:::::::::: TALENTO HUMANO ::::::::::::::::::::::::::::::::::::::::::::::::
else if($view =="talentoHumanoHome")
{
    include("view/Operaciones/TalentoHumano/talentohumano.php"); 
}
else if($view =="votacionesAdmin")
{
    include("view/Operaciones/TalentoHumano/Votaciones/votaciones.home.php"); 
}
else if($view =="gestionarComites")
{
    include("view/Operaciones/TalentoHumano/Votaciones/votaciones.gestionar.comites.php"); 
}
else if($view =="gestionarSalvaguardia")
{
    include("view/Operaciones/TalentoHumano/Salvaguardia/home.salvaguardia.php"); 
}

//:::::::::::::::::::::: SOCIOLABORAL ::::::::::::::::::::::::::::::::::::::
else if($view == "socioLaboral")
{
    include("view/Operaciones/SocioLaboral/sociolaboral.php");
}

//:::::::: PROYECTOS DE FUSALMO ::::::::::::::::::::::::::

else if($view =="proyectoFusalmo")
{
    include("view/ProyectosFusalmo/proyectos.php"); 
}
//:::::::: Alto Impacto :::::::::::
else if($view =="altoImpacto")
{
    include("view/ProyectosFusalmo/AltoImpacto/altoimpacto.php"); 
}

//::::::::::::: RESERVACIONES :::::::::::::::::::::::::::::::::
else if($view =="reservacion")
{
    include("view/Reservaciones/fus_reservacion.php"); 
}


//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::


//::::::::::::: PROGRAMAS  ::::::::::::::::::::::::::::::::

else if($view =="programasSiif")
{
    include("view/Programas/Programas.php"); 
}

//::::: ENTORNOS VIRTUALES ::::::::::::::::::::
else if($view =="entornosvirtuales")
{
    include("view/Programas/EntornosVirtuales/entornos.virtuales.php"); 
}
else if($view =="solicitudarte")
{
    include("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.artes.php"); 
}
else if($view =="vistaSolicitante")
{
    include("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.artes.vista.solicitante.php"); 
}
else if($view =="formularioSolicitanteArtes")
{
    include("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.artes.formulario.solicitante.php"); 
}
else if($view == "formularioSolicitanteArtesAdmin")
{
    include("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.formulario.solicitante.admin.php");
}
else if($view =="vistaAmdminSolicitudArtes")
{
    include("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.artes.vista.admin.php"); 
}
else if($view =="vistaGestionarSolicitudArte")
{
    include("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.artes.gestionar.admin.php"); 
}
else if ($view == "vistaSolicitanteNueva")
{
    include("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.artes.vista.nueva.php"); 
}
//::::::::: BASE DE DATOS RESERVACION ::::::::::::::::::::::::::::::::;
else if ($view == "reservacionFusalmo")
{
    include("view/dashboards/dashboard.reservacion.data.php"); 
}


//:::::::::::::::::::::::::::::::::::::::::::::::::::::
else if($view == "spacesReunion" && $authent){
    include("view/spaces/spaces.reunion.php");   
}

else if($view == "spacesView" && $authent){
    include("view/spaces/spaces.view.php");   
}

else if($view == "spacesEvidences" && $authent){
    include("view/spaces/spaces.evidences.php");   
}

//:::::::::::::::::::: DASHBOARDS ::::::::::::::::::::
else if($view == "dashboard" && $authent){
    include("view/dashboards/dashboard.forma.php");
}

else if($view == "logoff")
{
    session_destroy();    
    registerLog($net_rrhh, "Login", "Login", "Logoff", "Cerrar de Sesión");
    redirection("?view=login&n=2");
}
else
    redirection("?view=login&n=3");

?>