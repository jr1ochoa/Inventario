<?php
header('Content-Type: text/html; charset=UTF-8');
?>
<?php 
include("../../config/net.php");

$form = $_REQUEST['form'];

$query = "SELECT * FROM evaluations_topics WHERE idform = $form ";
$topics = $net_rrhh->prepare($query);
$topics->execute();

?>
<table class='table table-bordered table-hover mt-4'>
    <tr>
    <?php

        while($datat = $topics->fetch())
        {
            echo utf8_encode("<tr><th colspan='2'>$datat[2]</th></tr>");
            $query = "SELECT * FROM evaluations_questions WHERE idtopic = $datat[0]";

            $question = $net_rrhh->prepare($query);
            $question->execute();

            $i = 0;
            while($dataq = $question->fetch())
            {
                $i++;
                echo "<tr>
                <td>$i</td>
                <td>" .$dataq[2] . "</td>  
                <td>                        
                    <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#EditQuestion' onclick='editQuestion($dataq[0])'>
                        Editar
                    </button>
                </td>                        
              </tr>";
            }

        }

    ?>
    </tr>
</table>


<!-- Modal -->
<div class="modal fade" id="EditQuestion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar pregunta</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id='loadQuestion'></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>  

<script>

    

    function editQuestion(iq){
        $("#loadQuestion").load("view/evaluations/evaluations.form.edit.questions.php", {
            iq: iq
        });
    }
</script>