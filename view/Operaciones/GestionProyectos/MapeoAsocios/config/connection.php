<?php
    $server="localhost"; $db="mapeo_asocios"; 
    $user = "root"; $pw = "";

    try {
        $connection = new PDO("mysql:host=$server;dbname=$db", $user, $pw); 
    } catch (Exception $e) {
        echo $e->getMessage();
    }
?>