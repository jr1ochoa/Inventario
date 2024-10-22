<?php include("../../config/net.php");
$query = "SELECT * FROM monitor_proyecto where estado = 1";
$data3 = $net_rrhh->prepare($query);
$data3->execute();
$pila = array();
while ($data = $data3->fetch()) {
    echo "<option value=".$data[0].">".$data[7]."</option>";
}
?>
