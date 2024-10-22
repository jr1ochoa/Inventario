<?php 

session_start();

date_default_timezone_set('Etc/GMT+6');

$root = $_SERVER['DOCUMENT_ROOT']."/";

try

{

    $net_rrhh = new PDO('mysql:host=localhost;dbname=fusalmosiif_user', 'root', '');  

    function redirection($Redirecion)

    {    

        echo"<script language='javascript'>window.location='$Redirecion'</script>";

    }

}

catch (PDOException $e)

{

    echo $e;

}



function sanear_string($string)

{

    $string = trim($string);

    $string = str_replace(

        array('�', '�', '�', '�', '�', '�', '�', '�', '�'),

        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),

        $string

    );

    $string = str_replace(

        array('�', '�', '�', '�', '�', '�', '�', '�'),

        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),

        $string

    );

    $string = str_replace(

        array('�', '�', '�', '�', '�', '�', '�', '�'),

        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),

        $string

    );

    $string = str_replace(

        array('�', '�', '�', '�', '�', '�', '�', '�'),

        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),

        $string

    );

    $string = str_replace(

        array('�', '�', '�', '�', '�', '�', '�', '�'),

        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),

        $string

    );

    $string = str_replace(

        array('�', '�', '�', '�'),

        array('n', 'N', 'c', 'C'),

        $string

    );

    $string = str_replace(

        array('Ã¡', 'Ã©', 'Ã³','Ã“', 'Ã±', 'Ã'),

        array('á', 'é', 'ó', 'Ó', 'ñ', 'í'),

        $string

    );

    return $string;

}

function registerLog($con, $module, $process, $action, $comment)

{

    $query = "Insert into log values(null, :n1, :n2, :n3, :n4, :n5, CURRENT_TIMESTAMP);";

    $Log = $con->prepare($query);

    $Log->bindParam(':n1', $module);

    $Log->bindParam(':n2', $process);

    $Log->bindParam(':n3', $action);

    $Log->bindParam(':n4', $comment);

    $Log->bindParam(':n5', $_SESSION['iu']);

    $Log->execute();

}

error_reporting(0);

