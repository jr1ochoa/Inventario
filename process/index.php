<?php

include("../config/net.php");



$process = (isset($_POST['process'])) ? $_POST['process'] : "";

$action = (isset($_POST['action'])) ? $_POST['action'] : "";





//echo $process;

//echo $action;

if($process == "LogIn")

    include("login.php");



else if($process == "Transcript")

    include("transcript.php");



else if($process == "Transcript File")

    include("transcript.file.php");



else if($process == "Needs")

    include("need.php");    

    

else if($process == "Users")

    include("users.php");



else if($process == "Area")

    include("workarea.php"); 



else if($process == "Profile")

    include("profile.php"); 



else if($process == "Permissions")

    include("permissions.php"); 



else if($process == "PersonnelActions")

    include("personnelactions.php"); 



else if($process == "Email")

    include("email.php");



else if($process == "votacion") 

    include("votaciones.php");

    else if($process == "proyectos") 
    include("proyectos.php");


else if($process == "monitoreo_proyecto")

    include("monitoreo.php");


else if ($process == "administracion_finanza")
    include("admin.finanzas.php");

else if ($process == "entornos_virtuales")
    include("entornos.virtuales.php");


else if($process == "spaces") 
    include("spaces.php");

else if($process == "reservacion") 
    include("fus_reservacion.php");

else if($process == "salvaguardia")
    include("salvaguardia.php");

else if($process == "debida-diligencia")
    include("debidaDiligencia.php");
