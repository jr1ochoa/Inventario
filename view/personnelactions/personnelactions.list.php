<?php include("../../config/net.php"); //Conexión a la BDD



    $list = ($_REQUEST['list'] == "personal") ? "WHERE idemployee = ".$_SESSION['iu'] : "";



    //Mostrar listado según el rol del usuario

    $query = ($_SESSION['type'] == "RRHH" || $_SESSION['type'] == "Administrador")  

            ? "SELECT sa.id, CONCAT(e.name1,' ',e.name2,' ',e.name3,' ',e.lastname1,' ',e.lastname2) as 'Empleado', sa.file, DATE(dtc)

            FROM processarea_staffaction as sa

            INNER JOIN employee as e ON e.id = sa.idemployee $list" 

            : "SELECT * FROM processarea_staffaction WHERE idemployee = ".$_SESSION['iu'];

    $list = $net_rrhh->prepare($query);

    $list->execute();

    

?>

<style>

    a {

        text-decoration: none;

        cursor: pointer;

    }

</style>



<!-- IMPRIMIR LISTADO -->

<table id="UserTable" class="display mt-3" style="width:100%">

    <thead>

        <tr>

            <th>#</th>

            <?php

                if($_REQUEST['list'] == "all") 

                    echo "<th>Empleado</th>";

            ?>

            <th>Acción de Personal</th>

            <th>Fecha</th>

            <?php

                if($_SESSION['type'] == "RRHH" || $_SESSION['type'] == "Administrador") 

                    echo "<th>Acciones</th>";

            ?>

        </tr>

    </thead>

    <tbody>

        <?php

            if($list->rowCount() > 0){

                $i=0;

                while ($data = $list->fetch()) {

                    $i++;

                    echo "<tr>

                            <td>$i</td>";



                    if($_REQUEST['list'] == "all") 

                        echo ("<td>$data[1]</td>");



                    echo "  <td>

                                <i class='bi bi-filetype-pdf' style='font-size: 1.7rem;'></i>

                                <a href='process/documents/$data[2]' target='_blank' rel='noopener noreferrer'>Descargar</a>

                            </td>

                            <td>$data[3]</td>";



                    if($_SESSION['type'] == "RRHH" || $_SESSION['type'] == "Administrador") {

                        echo "<td>

                                <div class='dropdown'>

                                    <a class='btn btn-primary dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>

                                        Acciones

                                    </a>

                            

                                    <ul class='dropdown-menu'>

                                        <li><a class='dropdown-item text-primary' data-bs-toggle='modal' data-bs-target='#FormModal' onclick='personnelActions($data[0], \"update\")'><i class='bi bi-pencil-square'></i> Editar</a></li>

                                        <li><a class='dropdown-item text-secondary' data-bs-toggle='modal' data-bs-target='#FormModal' onclick='personnelActions($data[0], \"doc\")'><i class='bi bi-filetype-pdf'></i> Cambiar Documento</a></li>

                                        <li><a class='dropdown-item text-danger' data-bs-toggle='modal' data-bs-target='#FormModal' onclick='personnelActions($data[0], \"delete\")'><i class='bi bi-trash3-fill'></i> Eliminar</a></li>

                                    </ul>

                                </div>

                            </td>";

                    }

                        

                    echo "</tr>";

                }

            }else{

                if($_SESSION['type'] == "RRHH" || $_SESSION['type'] == "Administrador"){

                    $colspan = ($_REQUEST['list'] == "all") ? 5 : 4; 

                    echo "<tr>

                        <td class='text-center text-danger' colspan='$colspan'>No hay registros por mostrar</td>

                    </tr>";

                }else

                    echo "<tr> <td class='text-center text-danger' colspan='3'>No hay registros por mostrar</td> </tr>";

                

            }

        ?>

    </tbody>

</table>