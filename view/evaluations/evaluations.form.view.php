<?php include("../../config/net.php"); ?>
<div class='container'>
    <div class='row'>
        <div class='col-6'>
            <lable>Seleccione el formulario: </lable>
            <select class='form-control' id='form'>
                <option value=''></option>
                <?php 
                    $query = "SELECT * FROM evaluations_forms";
                    $forms = $net_rrhh->query($query);
                    $forms->execute();

                    while($data = $forms->fetch()) {
                        echo "<option value='$data[0]'>$data[1]</option>";
                    }
                ?>
            </select>
        </div>
        <div id='loadquestions' class='col-12'>

        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#form").change(function() {
            $('#loadquestions').load("view/evaluations/evaluations.form.view.questions.php", {
                form: $("#form").val()
            });            
        });
    });
</script>