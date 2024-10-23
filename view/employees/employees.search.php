<?php 

include("../../config/net.php");



if(isset($_REQUEST['search']))

{

    $nombre = $_REQUEST['search'];



    if($nombre != "")

    {

        $query = "SELECT DISTINCT e.id, e.name1, e.name2, e.name3, e.lastname1, e.lastname2, a.area

                  FROM employee as e 

                  LEFT JOIN workarea_positions_assignment as ca on ca.idemployee = e.id AND ca.enddate = '0000-00-00'

                  LEFT JOIN workarea_positions as c on c.id = ca.idposition 

                  LEFT JOIN workarea as a on c.idarea = a.id

                  WHERE e.name1 LIKE '%$nombre%' OR e.name2 LIKE '%$nombre%' OR e.name3 LIKE '%$nombre%' OR e.lastname1 LIKE '%$nombre%' OR e.lastname2 LIKE '%$nombre%' 

                  ";



        $Employees = $net_rrhh->prepare($query);

        $Employees->execute();

?>



    <table id='UserTable' class='display' style='width:100%'>

        <thead>

            <tr>

                <th>Id</th>

                <th>Empleado</th>

                <th>Área</th>

                <th>Perfil</th>

            </tr>

        </thead>

        <tbody>



<?php

        if($Employees->rowCount() > 0){

            while($data = $Employees->fetch())        

            {

                echo "<tr>

                        <td>$data[0]</td>

                        <td>". sanear_string($data[1]." ".$data[2]." ".$data[3]." ".$data[4]." ".$data[5]) ."</td>

                        <td>". sanear_string($data[6]) ."</td>

                        <td>

                            <a href='?view=profile&iu=$data[0]'>

                                <i class='far fa-clipboard'></i>

                            </a>

                        </td>

                    </tr>";

            }

        }else{

            echo "<tr>

                    <td colspan='3'>No hay resultados para su búsqueda</td> 

                </tr>";

        }

        

    }else{

        echo "<tr>

                <td colspan='3'>No ha ingresado valores en el buscador</td> 

            </tr>";

    }



    ?>

    </tbody>

    </table>

    <?php

}else{

    echo "Error";

}

?>

<script>

    $('#UserTable').DataTable();

</script>