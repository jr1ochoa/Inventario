<?php include("../config/net.php");

    $action = ($_REQUEST["action"] == "") ? "" : $_REQUEST["action"];

if ($action == "loadMunicipalities") {

    echo "Bueas tardes chele";
        $Departamento =  utf8_decode($_REQUEST['data']);
        $Query = "SELECT Municipality FROM v1_municipality WHERE Department = '$Departamento'";
        $Municipios = $net_rrhh->prepare($Query);
        $Municipios->execute();

        if ($Municipios->rowCount() > 0) {
            while($DataM = $Municipios->fetch())
            {
                echo "<option value='$DataM[0]'> $DataM[0]</option>";    
            }
        }else {
            echo "<option value=''>Seleccione un departamento</option>";
        }

    }
	
	else if ($action == "loadMunicipalities2") {

        $Departamento =  utf8_decode($_REQUEST['data']);
        $Query = "SELECT Municipality FROM v1_municipality WHERE Department = '$Departamento'";
        $Municipios = $net_rrhh->prepare($Query);
        $Municipios->execute();

        if ($Municipios->rowCount() > 0) {
            while($DataM = $Municipios->fetch())
            {
                echo "<option value='$DataM[0]'> $DataM[0]</option>";    
            }
        }else {
            echo "<option value=''>Seleccione un departamento</option>";
        }

    }
	
	else if ($action == "loadMunicipalities3") {

        $Departamento =  utf8_decode($_REQUEST['data']);
        $Query = "SELECT Municipality FROM v1_municipality WHERE Department = '$Departamento'";
        $Municipios = $net_rrhh->prepare($Query);
        $Municipios->execute();

        if ($Municipios->rowCount() > 0) {
           
            while($DataM = $Municipios->fetch())
            {
                echo "<option value='$DataM[0]'> $DataM[0]</option>";    
            }
        }else {
            echo "<option value=''>Seleccione un departamento</option>";
        }

    }
    else if($action == "medidasArtes")
    {
        $idProducto =  utf8_decode($_REQUEST['data']);
        $Query = "SELECT * FROM entornos_virtuales_medidas WHERE id_producto = '$idProducto'";
        $Municipios = $net_rrhh->prepare($Query);
        $Municipios->execute();
        
        if ($Municipios->rowCount() > 0) {
            while($DataM = $Municipios->fetch())
            {
                echo "<option value='$DataM[0]'> $DataM[1]</option>";    
            }
            echo '<option value="N/A/S">Medida Personalizada: </option>';
        }else {
            echo "<option value='0'>NO HAY MEDIDA REGISTRADA</option>";
        }

    }elseif ($action == "loadPositions") {
    
        if (isset($_REQUEST["ida"])) {
            $ida = $_REQUEST["ida"];
        
            $query = "SELECT p.id, CONCAT(e.name1, ' ', e.lastname1) as 'employee', p.position FROM workarea_positions as p 
                        INNER JOIN workarea_positions_assignment as wpa ON wpa.idposition = p.id
                        INNER JOIN employee as e ON e.id = wpa.idemployee
                        WHERE p.idarea = :ida AND wpa.enddate = '0000-00-00'";
            $positions = $net_rrhh->prepare($query);
            $positions->bindParam(':ida', $ida, PDO::PARAM_INT);
            $positions->execute();
        
            while ($data = $positions->fetch()) {
                echo "<option value='$data[0]'>$data[2] - $data[1]</option>";
            }
        } else {
            echo "<option value=''>No hay cargos disponibles</option>";
        }
    }