<?php include('../../config/net.php');

    $idMemo = $_REQUEST['idMemo'];

    $query = "SELECT * FROM `inventory_memos_active` WHERE idMemo = '$idMemo'";
    $memos_active = $net->prepare($query);
    $memos_active->execute();
?>
<div class="p-3">

</div>