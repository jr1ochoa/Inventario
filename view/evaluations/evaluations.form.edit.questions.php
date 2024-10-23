<?php

include("../../config/net.php"); 

$iq = $_REQUEST['iq'];

$query = "SELECT f.form, t.topic, q.question, f.id FROM evaluations_forms as f 
          INNER JOIN evaluations_topics as t ON f.id = t.idform 
          INNER JOIN evaluations_questions as q ON t.id = q.idtopic
          WHERE q.id = $iq";

$question = $net_rrhh->prepare($query);
$question->execute();
$dataq = $question->fetch();


?>

<table class='table table-bordered'>
    <tr><th>Formulario: <br/><b><?=utf8_encode($dataq[0])?></b></th></tr>
    <tr><th>Tema: <br/><b><?=utf8_encode($dataq[1])?></b></th></tr>
    <tr><th>
        Pregunta: <br/>
        <textarea class='form-control' id="question" name="question" rows="4"><?=utf8_encode($dataq[2])?></textarea>
    </th></tr>
</table>
<button id='edit' class='btn btn-primary' data-bs-dismiss="modal">Editar</button>

<script>
    $(document).ready(function() {
        $("#edit").click(function() {
            $.post("request/", {             
                process: "evaluations",
                action: "edit question",
                iq: <?=$iq?>,
                question: $("#question").val()
            }, function(response) {
                console.log(response);
                $('#loadquestions').load("view/evaluations/evaluations.form.view.questions.php", {
                    form: <?=$dataq[3]?>
                });                
            });            
        });
    });
</script>