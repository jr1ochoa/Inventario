<?php 
    include("../config/connection.php");

    $process = (isset($_POST['process'])) ? $_POST['process'] : "";
    $action = (isset($_POST['action'])) ? $_POST['action'] : "";
    $group = (isset($_POST['group'])) ? $_POST['group'] : "";

    if ($process == "mapeoAsocios") {
        include("./mapeoAsocios.php");
    }
?>