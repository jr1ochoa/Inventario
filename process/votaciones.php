<?php 
$idEmpleado =  $_SESSION['iu'];
if($action == "addcomite"){
    /*
        nombreComite: $("#nombreComite").val(), 
        descripcionComite: $("#descripcionComite").val(),
    */
    try{
       
            $query = "INSERT INTO votaciones_comites 
            VALUES(Null, :n1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, :n2, :n3,:n4)";
            $insert = $net_rrhh->prepare($query);
            $insert->bindParam(':n1', htmlspecialchars($_POST['nombreComite']));
            $insert->bindParam(':n2', htmlspecialchars(1));
            $insert->bindParam(':n3', htmlspecialchars(1));
            $insert->bindParam(':n4', htmlspecialchars($_POST['descripcionComite']));
            $insert->execute();
            foreach ($insert->errorInfo() as $error) {
                $errorList .= "$error <br/>"; 
            }
                    //echo $errorList;
                    echo 1;
       
        
    }catch(Exception $e)
    {
        echo $e->getMessage();
    }   
}
else if($action == "addcandidato")
{
    try
    {
       /*
            idCandidato: $("#idCandidato").val(), 
            idComite: $("#idComite").val(), 
       */

        $query = "SELECT *  FROM votaciones_candidatos where id_employee = ? and id_comite = ?" ;
        $data3 = $net_rrhh->prepare($query);
        $data3->execute([$_POST['idCandidato'],$_POST['idComite']]);
        if ($data3->rowCount() > 0) {
            echo 2;
        }
        else{
            $query = "INSERT INTO votaciones_candidatos 
            VALUES(Null, :n1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, :n2, :n3,:n4)";
            $insert = $net_rrhh->prepare($query);
            $insert->bindParam(':n1', htmlspecialchars($_POST['idCandidato']));
            $insert->bindParam(':n2', htmlspecialchars(1));
            $insert->bindParam(':n3', htmlspecialchars(1));
            $insert->bindParam(':n4', htmlspecialchars($_POST['idComite']));
            $insert->execute();
            foreach ($insert->errorInfo() as $error) {
                $errorList .= "$error <br/>"; 
            }
                    //echo $errorList;
                    echo 1;
        }

       
   
    
    }catch(Exception $e)
    {
        echo $e->getMessage();
    } 
}
else if ($action == "editarComite")
{
    try{

       /*
       editarNombre    : $("#editarNombre").val(),
    editarDescripcion       : $("#editarDescripcion").val(),
    idObjetivoGeneralDelete : $("#idObjetivoGeneralDelete").val()
       */
       $query4 = "UPDATE  votaciones_comites SET nombre_comite = ?, descripcion = ? WHERE id = ?";
       $data4 = $net_rrhh->prepare($query4);
       $data4->execute([$_POST['editarNombre'],$_POST['editarDescripcion'],$_POST['idObjetivoGeneralDelete']]);

        foreach ($data4->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }

            //echo "Id Sesion".$idEmpleado;
        echo $errorList;
        echo 1;

    
    }catch(Exception $e)
    {
        echo $e->getMessage();
    }
}
else if ($action == "deletecomite")
{
    try{

        $query = "SELECT *  FROM votaciones_comites";
    $data3 = $net_rrhh->prepare($query);
    $data3->execute([$_POST['idObjetivoGeneralDelete']]);
    while ($data = $data3->fetch()) 
    {
        $estado = $data[4];
    }
    $estadoInvertido = $estado == 1 ? 0 : 1;
    //$estadoDato != $estado;
       $query4 = "UPDATE  votaciones_comites SET estado = ? WHERE id = ?";
       $data4 = $net_rrhh->prepare($query4);
       $data4->execute([$estadoInvertido,$_POST['idObjetivoGeneralDelete']]);

        foreach ($data4->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }

            //echo "Id Sesion".$idEmpleado;
        echo $errorList;
        echo 1;

    
    }catch(Exception $e)
    {
        echo $e->getMessage();
    }
}
else if($action == "deletecandidato")
{
    try{

        $query4 = "DELETE FROM  votaciones_candidatos WHERE id = ?";
        $data4 = $net_rrhh->prepare($query4);
        $data4->execute([$_POST['idObjetivoGeneralDelete']]);
 
         foreach ($data4->errorInfo() as $error) {
             $errorList .= "$error <br/>"; 
         }
 
             //echo "Id Sesion".$idEmpleado;
        // echo $errorList;
         echo 1;
 
     
     }catch(Exception $e)
     {
         echo $e->getMessage();
     }
}
else if ($action == "savevoto")
{
    //echo "valor id del votante".$_POST['valorVoto'];
    /*
      valorVoto: $("#valorVoto").val(), 
                valorComite: $("#valorComite").val(), 
                valorYear: $("#valorYear").val(),
     */
    $idEmpleadoCandidato = 0;
    $query = "SELECT s1.id, s1.id_employee, CONVERT(s2.name1 USING utf8), CONVERT(s2.name2 USING utf8), CONVERT(s2.name3 USING utf8), CONVERT(s2.lastname1 USING utf8), CONVERT(s2.lastname2 USING utf8)  FROM votaciones_candidatos as s1 inner join employee as s2 on s2.id = s1.id_employee where s1.id = ?";
    $data3 = $net_rrhh->prepare($query);
    $data3->execute([$_POST['valorVoto']]);
    while ($data = $data3->fetch()) 
    {
        $idEmpleadoCandidato = $data[1];
    }


    try
    {
       /*
            idCandidato: $("#idCandidato").val(), 
            idComite: $("#idComite").val(), 
       */
        $query = "INSERT INTO votaciones_resultados 
        VALUES(Null, :n1,:n2, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, :n3, :n4, :n5, :n6)";
        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($idEmpleadoCandidato));
        $insert->bindParam(':n2', htmlspecialchars($idEmpleado));
        $insert->bindParam(':n3', htmlspecialchars(1));
        $insert->bindParam(':n4', htmlspecialchars($idEmpleado));
        $insert->bindParam(':n5', htmlspecialchars($_POST['valorComite']));
        $insert->bindParam(':n6', htmlspecialchars($_POST['valorYear']));
        $insert->execute();
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }
                echo $errorList;
   
    
    }catch(Exception $e)
    {
        echo $e->getMessage();
    } 

}

?>