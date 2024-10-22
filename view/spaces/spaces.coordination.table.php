<?php include("../../config/net.php"); 

    $idb = $_REQUEST["idb"];
?>

<table id="tableBinnacle" class="table table-bordered">
    <thead>
        <tr>
            <th>N° de Bitácora</th>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Lugar</th>
            <th>Detalle</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $query = "SELECT * FROM `spaces` WHERE idBinnacle = $idb";
            $spaces = $net_rrhh->prepare($query);
            $spaces->execute();
            $i=0;

            while ($data = $spaces->fetch()) {
                $i++;
                echo "<tr>
                        <td>$idb.-".sprintf("%05d", $i)."</td>
                        <td>$data[1]</td>
                        <td>";
                            echo $date = ($data[3] == "") ? "(Sin registro)" : $data[3]; 
                        echo "</td>
                        <td>";
                            echo $place = ($data[4] == "") ? "(Sin registro)" : $data[4];
                        echo "</td>
                        <td>
                            <a href='?view=spacesView&ids=$data[0]' style='text-decoration: none;'>
                                Ver
                            </a>
                        </td>
                        <td>
                            <div class='dropdown'>
                                <button class='btn btn-primary dropdown-toggle' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                    Acciones
                                </button>
                                <ul class='dropdown-menu'>
                                    <li>
                                        <a class='dropdown-item' href='?view=spacesDetail&ids=$data[0]'>
                                            Información Interna
                                        </a>
                                    </li>
                                    <li>
                                        <a class='dropdown-item' href='?view=spacesReunion&ids=$data[0]'>
                                            Información del Espacio
                                        </a>
                                    </li>
                                    <li>
                                        <a class='dropdown-item' href='?view=spacesEvidences&ids=$data[0]'>
                                            Evidencias
                                        </a>
                                    </li>
                                </ul>
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
