<?php

if($action == "assignation to employee"){

    $data = array();
    foreach(explode("&", urldecode($_REQUEST['form'])) as $request){
        $values = explode("=", $request);
        $data[$values[0]] = $values[1];
    }

    $query = "INSERT INTO evaluations_assignments 
              VALUES(NULL, :n1, :n2, :n3, :n4, :n5, :n6, 'Pendiente', '', CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP())";
    $insert = $net_rrhh->prepare($query);
    $insert->bindParam(':n1', $data['ideva']);
    $insert->bindParam(':n2', ($data['approach']));
    $insert->bindParam(':n3', ($data['type']));
    $insert->bindParam(':n4', $data['idemp']);
    $insert->bindParam(':n5', $data['idpos']);
    $insert->bindParam(':n6', $data['employee2']);
    $insert->execute();

    if (verificarerrores($insert) == "ok") {
        echo "ok";
    }else{
        echo verificarerrores($insert);
    }

}else if($action == "edit question"){

    $query = "UPDATE evaluations_questions SET question = :n1 WHERE id = :id ";

    $update = $net_rrhh->prepare($query);

    $update->bindParam(':n1', $_REQUEST['question']);

    $update->bindParam(':id', $_REQUEST['iq']);

    $update->execute();



    echo "bien";

}





else if($action == "save question")

{

    $query = "DELETE FROM evaluations_results 

              WHERE idassignation = :ia AND idquestion = :iq AND idemployee = :ie1 AND idevaluator = :ie2";

    $delete = $net_rrhh->prepare($query);

    $delete->bindParam(':ia', $_REQUEST['ia']);

    $delete->bindParam(':iq', $_REQUEST['iq']);

    $delete->bindParam(':ie1', $_REQUEST['ie1']);

    $delete->bindParam(':ie2', $_REQUEST['ie2']);

    $delete->execute();



    $query = "INSERT INTO evaluations_results 

              VALUES(NULL, :ia, :iq, :ie1, :ie2, :result, CURRENT_TIMESTAMP)";



    $insert = $net_rrhh->prepare($query);

    $insert->bindParam(':ia', $_REQUEST['ia']);

    $insert->bindParam(':iq', $_REQUEST['iq']);

    $insert->bindParam(':ie1', $_REQUEST['ie1']);

    $insert->bindParam(':ie2', $_REQUEST['ie2']);

    $insert->bindParam(':result', $_REQUEST['result']);

    $insert->execute();    

    

    echo "Resultado guardado";    

}



else if($action == "save comentary")

{

    $query = "UPDATE evaluations_assignments SET comentary = :commentary WHERE id = :ia";

    $update = $net_rrhh->prepare($query);

    $update->bindParam(':commentary', $_REQUEST['commentary']);

    $update->bindParam(':ia', $_REQUEST['ia']);

    $update->execute();



    echo "Comentario Guardado";

}



else if($action == "finish evaluations")

{

    $query = "UPDATE evaluations_assignments SET state = 'Finalizada' WHERE id = :ia";

    $update = $net_rrhh->prepare($query);

    $update->bindParam(':ia', $_REQUEST['ia']);

    $update->execute();



    echo "Evaluación Finalizada";

}



else if ($action == "delete assignation")

{

    $query = "DELETE FROM evaluations_assignments WHERE id = :ia";

    $delete = $net_rrhh->prepare($query);

    $delete->bindParam(':ia', $_REQUEST['ia']);

    $delete->execute();



    echo "Asignación Eliminada";

}



?>