<?php  include("../../config/net.php"); $idLIsta = $_REQUEST['idLIsta'];

?>

<center>
            <img src="assets/images/website_1980691.png" width="10%">
        </center>
        <div class="row">
                <!--<input type="hidden" value="<?php echo $idRelacionProyecto; ?>" id="idRelacionProyecto" >-->
                <div class="col">

                <table class="table table-hover">
                    <thead>
                    <th>Previsto para el mes (Proyeccion del mes actual)</th>
                    <th>Logrado para el mes $</th>
                    <th>Previsto para el próximo mes</th>
                    <th>MES</th>
                    </thead>
                <?php  
                           
                            $query = "SELECT Proyeccion_del_mes,logrado_para_elmes ,previstos_para_proximomes,MONTH(fh_creacion )  FROM monitor_avance_financiero_historial where  idListaPresupuestaria = ?";
                            $data3 = $net_rrhh->prepare($query);
                            $data3->execute([$idLIsta]);
                            while ($data = $data3->fetch()) {
                                $nombreMes = '';
                                switch($data[3])
                                {
                                    case 1:
                                        $nombreMes = 'Enero';
                                    break;
                                    case 2:
                                        $nombreMes = 'Febrero';
                                    break;
                                    case 3:
                                        $nombreMes = 'Marzo';
                                    break;
                                    case 4:
                                        $nombreMes = 'Abril';
                                    break;
                                    case 5:
                                        $nombreMes = 'Mayo';
                                    break;
                                    case 6:
                                        $nombreMes = 'Junio';
                                    break;
                                    case 7:
                                        $nombreMes = 'Julio';
                                    break;
                                    case 8:
                                        $nombreMes = 'Agosto';
                                    break;
                                    case 8:
                                        $nombreMes = 'Septiembre';
                                    break;
                                    case 10:
                                        $nombreMes = 'Octubre';
                                    break;
                                    case 11:
                                        $nombreMes = 'Noviembre';
                                    break;
                                    case 12:
                                        $nombreMes = 'Diciembre';
                                    break;
                                }
                            echo '
                            <tr>
                                <td> $'.convertirMiles($data[0]).'</td>
                                <td> $'.convertirMiles($data[1]).'</td>
                                <td> $'.convertirMiles($data[2]).'</td>
                                <td> '.$nombreMes.'</td>
                            </tr>';
                            
                            
                            
                           
                            }
                            ?>
                </table>
                  
                   
                   
               </div>
              
           </div>
<?php 

function convertirMiles($numeroRecibido)
{
    $numero = $numeroRecibido;

    // Formatea el número con separador de miles y dos decimales
    $numeroFormateado = number_format($numero, 2, '.', ',');
    
    return $numeroFormateado;
}
?>
           