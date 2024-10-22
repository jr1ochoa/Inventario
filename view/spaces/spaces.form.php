<?php include("../../config/net.php"); 

    $query = "SELECT MAX(num) FROM spaces_binnacle";
    $numBinnacle = $net_rrhh->prepare($query);
    $numBinnacle->execute();
    $data = $numBinnacle->fetch();

    if ($data[0] != "") {

        $num = $data[0]+1;
        $numSet = sprintf("%05d", $num);

    }else{
        $num = 1;
        $numSet = sprintf("%05d", $num); // :o con todo
    }
?>

<div class="p-3">
    <div class="mb-3">
        <label for="txtNum" class="form-label">Num. de bitácora:</label>
        <input type="text" class="form-control" id="txtNum" name="txtNum" value="<?=$numSet?>" disabled>
    </div>
    <div class="mb-3">
        <label for="txtName" class="form-label">Nombre:</label>
        <input type="text" class="form-control" id="txtName" name="txtName">
    </div>
    <div class="mb-3">
        <label for="cboType" class="form-label">Tipo de Espacio:</label>
        <select id="cboType" class="form-select" name="cboType">
            <option value="">Seleccione</option>
            <option value="Coordinación">Coordinación</option>
            <option value="Representación">Representación</option>
        </select>
    </div>

   
</div>


