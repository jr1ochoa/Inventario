<?php



if($action == "Add File")

{

    $tamano = $_FILES["file"]['size'];

    $tipo = $_FILES["file"]['type'];

    //$archivo = $_FILES["file"]['name'];


    $archivo = $_FILES["file"]['name'];

    // Array de caracteres con acento y sus equivalencias sin acento
    $acentos = array(
        'á' => 'a', 'é' => 'e', 'í' => 'i', 'ó' => 'o', 'ú' => 'u',
        'Á' => 'A', 'É' => 'E', 'Í' => 'I', 'Ó' => 'O', 'Ú' => 'U',
        'ñ' => 'n', 'Ñ' => 'N'
    );
    
    // Reemplazar los caracteres con acento por sus equivalentes sin acento
    $archivo_sin_acentos = strtr($archivo, $acentos);
    
    // Usar el nombre de archivo sin acentos
    echo $archivo_sin_acentos;



    echo $archivo;
    $prefijo = substr(md5(uniqid(rand())),0,4);               



    if ($archivo_sin_acentos != "") 

    {

        //if($tipo == "image/jpeg" || $tipo == "image/png" || $tipo == "image/gif")

        //{

            $namefile = $prefijo."_".$archivo_sin_acentos;

            $destino =  $_SERVER['DOCUMENT_ROOT']."/process/documents/$namefile";

            if (copy($_FILES['file']['tmp_name'], $destino)) 

            {            

                $query = "INSERT INTO employee_files 

                        VALUES(NULL, :n1, :n2, :n3, :n4, :n5)";



                $Insert = $net_rrhh->prepare($query);

                $Insert->bindParam(':n1', $_SESSION['iu']);

                $Insert->bindParam(':n2', $_POST['filename']);  

                $Insert->bindParam(':n3', $namefile);  

                $Insert->bindParam(':n4', $_POST['type']);  

                $Insert->bindParam(':n5', $_POST['ide']);  

                $Insert->execute();

                            

                //Guardar Registro de Actualización

                $query = "DELETE FROM employee_updates WHERE part = 'Files' AND idemployee = ".$_SESSION['iu'];

                $Delete = $net_rrhh->prepare($query);

                $Delete->execute();



                $query = "INSERT INTO employee_updates VALUES(NUll, :n1, 'Files', CURRENT_TIMESTAMP)";

                $Insert = $net_rrhh->prepare($query);

                $Insert->bindParam(':n1', $_SESSION['iu']);

                $Insert->execute();              



                $return = ($_POST['type'] == "Education") ? "education" : "documents";



                redirection("../?view=transcript&part=$return&n=8");

            } 

            else             

                $status = "Error al subir el archivo 1";  

        //}                                          

    } 

    else         

        $status = "Error al subir archivo 2";

}

else if ($action == "Delete File")

{

    $query = "DELETE FROM employee_files 

              WHERE id = :n1 AND type = :n2 AND idemployee = :n3 ";

    $delete = $net_rrhh->prepare($query);

    $delete->bindParam(':n1', $_POST['idf']);

    $delete->bindParam(':n2', $_POST['type']);

    $delete->bindParam(':n3', $_SESSION['iu']);

    $delete->execute();



    //Guardar Registro de Actualización

    $query = "DELETE FROM employee_updates WHERE part = 'Files' AND idemployee = ".$_SESSION['iu'];

    $Delete = $net_rrhh->prepare($query);

    $Delete->execute();



    $query = "INSERT INTO employee_updates VALUES(NUll, :n1, 'Files', CURRENT_TIMESTAMP)";

    $Insert = $net_rrhh->prepare($query);

    $Insert->bindParam(':n1', $_SESSION['iu']);

    $Insert->execute();  



    $return = ($_POST['type'] == "Education") ? "education" : "documents";

    redirection("../?view=transcript&part=$return&n=9");

}


//aqui agrego unos cambios para convertir cualquier tipo de imagen en WEBP
else if($action == "Change Picture")
{
    ini_set('upload_max_filesize', '10M');
    ini_set('post_max_size', '10M');

    $tamano = $_FILES["NewPicture"]['size'];
    $tipo = $_FILES["NewPicture"]['type'];
    $archivo = $_FILES["NewPicture"]['name'];
    $prefijo = substr(md5(uniqid(rand())), 0, 4);

    if ($archivo != "") 
    {

        // Crear el nombre del archivo con extensión .webp
        $namefile = $prefijo . "_" . pathinfo($archivo, PATHINFO_FILENAME) . ".webp";
        $destino = $_SERVER['DOCUMENT_ROOT'] . "/process/pictures/$namefile";

        // Convertir la imagen a webp y guardarla
        $tmpFile = $_FILES['NewPicture']['tmp_name'];
        $exito = false;

        // Verificar el tipo de imagen y convertir a webp
        if ($tipo == "image/jpeg" || $tipo == "image/jpg") {
            $imagen = imagecreatefromjpeg($tmpFile);
            $exito = imagewebp($imagen, $destino);
            imagedestroy($imagen);
        } elseif ($tipo == "image/png") {
            $imagen = imagecreatefrompng($tmpFile);
            imagepalettetotruecolor($imagen);
            $exito = imagewebp($imagen, $destino);
            imagedestroy($imagen);
        } elseif ($tipo == "image/gif") {
            $imagen = imagecreatefromgif($tmpFile);
            $exito = imagewebp($imagen, $destino);
            imagedestroy($imagen);

        } else {
            echo "Formato de imagen no soportado. Usa JPEG, PNG, o GIF.";
        }

        // Verificar si la conversión fue exitosa
        if ($exito) 

        {   

            // Procesar el cambio en la base de datos como en el código original
            $query = "DELETE FROM employee_picture WHERE idemployee = " . $_POST['iu'];
            $delete = $net_rrhh->prepare($query);
            $delete->execute();

            $query = "INSERT INTO employee_picture VALUES(NULL, :n1, :n2)";
            $Insert = $net_rrhh->prepare($query);
            $Insert->bindParam(':n1', $_POST['iu']);
            $Insert->bindParam(':n2', $namefile);
            $Insert->execute();

            // Redirigir al perfil
            redirection("../?view=profile&iu=" . $_POST['iu']);
        } else {
            echo "Error al convertir la imagen a formato .webp";
        }
    } 
    else {
        echo "Error al subir archivo 2";
    }
}




?>