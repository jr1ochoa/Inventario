<?php 
 include("../../config/net.php");
?>
<?php
    $valor = $_POST['idModal'];
    $valor_comite = 0;
    $year = date("Y");
    //echo  "vALOR: ".$valor;0000-00-00
?>
 <?php 
       $query = "SELECT 
       s1.id, s1.id_employee, CONVERT(s2.name1 USING utf8), CONVERT(s2.name2 USING utf8), CONVERT(s2.name3 USING utf8), CONVERT(s2.lastname1 USING utf8), CONVERT(s2.lastname2 USING utf8)  ,
       s4.position, s1.id_comite
       FROM votaciones_candidatos as s1 
       inner join employee as s2 on s2.id = s1.id_employee
       inner join workarea_positions_assignment as s3 on s3.idemployee = s1.id_employee
       inner join workarea_positions as s4 on s4.id = s3.idposition where s3.enddate = '0000-00-00' and s1.id = ?";
       $data3 = $net_rrhh->prepare($query);
       $data3->execute([$valor]);
        while ($data = $data3->fetch()) 
        {
            $valor_comite = $data[8];
            //echo "<option value=".$data[0].">".$data[1]."</option>";

            

                //Cargar datos del empleado
                    $iu = isset($_GET['iu']) ? $_GET['iu'] : $_SESSION['iu'];
                    //Cargar fotografía del empleado
                    $query = "SELECT picture FROM employee_picture WHERE idemployee = " . $data[1];
                    $picture = $net_rrhh->prepare($query);
                    $picture->execute();

                    if ($picture->rowCount() > 0) {
                        $dataI = $picture->fetch();
                        $img = $dataI[0];
                    } 
                    else
                    {
                        $img = "Don Bosco.png";
                    }
                
                
                    echo '
                        <h5>EMPLEADO SELECCIONADO</h5>
                    <div class="d-flex text-muted pt-3">
                    <input type="hidden" id="valorVoto" value='.$valor.' />
                    <input type="hidden" id="valorComite" value='.$valor_comite.' />
                    <input type="hidden" id="valorYear" value='.$year.' />
                        <img src="process/pictures/'.$img.'" class="colorFondo"style="width: 35%; border-radius: 5%; " data-toggle="popover" title="VOTACIONES PARA COMITÉS " />
                        <div class="pb-3 mb-0 mx-4 small lh-sm border-bottom w-100">
                            <div class="d-flex justify-content-between">
                            <strong class="text-gray-dark">'.$data[2].' '.$data[3].' '.$data[4].' '.$data[5].'</strong>
                           
                            </div>
                            <span class="d-block">'.$data[7].'</span>
                        </div>
                    </div>
                    <br/>
                    <h5>Porfavor confirmar si esta es la persona por la que desea votar</h5>
                    
                    ';
                
                    
            
           
        }
   ?>