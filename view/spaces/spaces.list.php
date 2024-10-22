<?php include("../../config/net.php"); ?>

<table id="tableBinnacle" class="table table-bordered">
    <thead>
        <tr>
            <th>N° de Bitácora</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Detalle</th>
            <th>Acciones</th>
        </tr>
    </thead> 
    <tbody>

    <?php 
$idEmpleado =  $_SESSION['iu'];
//echo $idEmpleado."<br>";
$idAreaEmpleado;
$query = "SELECT s1.*, s2.idarea FROM workarea_positions_assignment as s1  inner join workarea_positions as s2   WHERE  s2.id = s1.idposition and s1.idemployee = $idEmpleado";
    $spaces = $net_rrhh->prepare($query);
    $spaces->execute();
    while ($data = $spaces->fetch()) 
    {
       // echo $data[8];
        $idAreaEmpleado = $data[8];
    }
?>

        <?php

            if($idAreaEmpleado == 15 || $idAreaEmpleado == 44)
            {
                $query = "SELECT sb.*, s.name, s.id as 'ids' FROM `spaces_binnacle` as sb 
                INNER JOIN spaces as s ON s.idBinnacle = sb.id where s.status != 2 ";// GROUP BY sb.id
                $spaces = $net_rrhh->prepare($query);
                $spaces->execute();
            }
            else{
                $query = "SELECT sb.*, s.name, s.id as 'ids' FROM `spaces_binnacle` as sb 
                        INNER JOIN spaces as s ON s.idBinnacle = sb.id where s.idarea = $idAreaEmpleado and s.status != 2
                       ";// GROUP BY sb.id
            $spaces = $net_rrhh->prepare($query);
            $spaces->execute();
            }



            

            while ($data = $spaces->fetch()) {
                $redirect = ($data[2] == "Representación") ? "1" : "2";
                $viewRedirect = ($data[2] != "Coordinación") ? "?view=spacesView&ids=$data[4]" : "?view=spacesDetail&type=$redirect&idb=$data[0]";

                echo "<tr>
                        <td>".sprintf("%05d", $data[1])."</td>
                        <td>".sanear_string($data[3])."</td>
                        <td>".sanear_string($data[2])."</td>
                        <td>
                            <a href='$viewRedirect' style='text-decoration: none;'>
                                Ver
                            </a>
                        </td>
                        <td>
                            <div class='dropdown'>
                                <button class='btn btn-primary dropdown-toggle' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                    Acciones
                                </button>
                                <ul class='dropdown-menu'>";
                                if($data[2] != "Coordinación"){
                                    echo "<li>
                                        <a class='dropdown-item' href='?view=spacesDetail&type=$redirect&ids=$data[4]'>
                                            Información Interna
                                        </a>
                                    </li>
                                    <li>
                                        <a class='dropdown-item' href='?view=spacesReunion&ids=$data[4]'>
                                            Información del Espacio
                                        </a>
                                    </li>
                                    <li>
                                        <a class='dropdown-item' href='?view=spacesEvidences&ids=$data[4]'>
                                            Evidencias
                                        </a>
                                    </li>";
                                }else{
                                    echo "<li>
                                            <a class='dropdown-item' href='?view=spacesDetail&type=$redirect&idb=$data[0]'>
                                                Mensualidades
                                            </a>
                                        </li>";
                                }
                                echo "</ul>
                            </div>
                        </td>
                    </tr>";
            }
        ?>
    </tbody>
</table>


<script>
    $(document).ready(function(){
        $("#tableBinnacle").DataTable();
    });
</script>
