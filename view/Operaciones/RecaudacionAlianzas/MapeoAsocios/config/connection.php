<?php
 
try
{
    $connection = new PDO('mysql:host=localhost;dbname=fusalmosiif_db', 'fusalmosiif_user', 'u$.smHh~S@hY');  
    function redirection($Redirecion)
    {    
        echo"<script language='javascript'>window.location='$Redirecion'</script>";
    }
}
catch (PDOException $e)
{
    echo $e;
}

?> 