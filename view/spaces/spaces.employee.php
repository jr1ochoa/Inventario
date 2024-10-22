<?php include("../../config/net.php"); 

    $action = ($_REQUEST["action"] == "delete") ? "delete" : "add";
    $ids = $_REQUEST["ids"];

    if ($action == "add") {

        $type = ($_REQUEST["type"] == "responsible") ? "addResponsible" : "addParticipant";
?>

<!-- DataTables-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>


<div class="p-3">
    <p class="fs-5 text-center">Empleados</p>

    <table id="tableEmployees" class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Cargo</th>
                <th>Agregar</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = "SELECT DISTINCT e.id, e.name1, e.name2, e.lastname1, e.lastname2, wp.position 
                            FROM `employee` as e 
                            INNER JOIN workarea_positions_assignment as wpa ON wpa.idemployee = e.id 
                            INNER JOIN workarea_positions as wp ON wp.id = wpa.idposition 
                            WHERE wpa.enddate = '0000-00-00' ORDER BY name1;";
                $employee = $net_rrhh->prepare($query);
                $employee->execute();

                while ($data = $employee->fetch()) {
                    echo "<tr>
                            <td>$data[0]</td>
                            <td>$data[1] $data[2] $data[3] $data[4]</td>
                            <td>$data[5]</td>
                            <td>
                                <button type='button' class='btn btn-success' onclick='saveRelation($data[0])'>Agregar</button>
                            </td>
                        </tr>";
                }
            ?>
        </tbody>
    </table>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>

<script>
    $(document).ready(function(){
        $("#tableEmployees").DataTable();
    });

    function saveRelation(ide) {


        $.post("/process/index.php", {
            process: "spaces",
            action: "<?=$type?>",
                
            ide: ide,
            ids:  "<?=$ids?>"
        },
        function(response){
            console.log(response);
            
            var header = "";
            var text = "";
            var icon = "";
            var success = false;

            if (response == "00000") {
                header = "¡Guardado!";
                text = "La Información se ha guardado correctamente";
                icon = "success";
                success = true;
            }else{
                header = "¡Error!";
                text = "Ha ocurrido un error al guardar el registro. Intentelo nuevamente.";
                icon = "error";
            } 

            $.toast({
                heading: header,
                text: text,
                showHideTransition: 'slide',
                icon: icon,
                hideAfter: 3000, 
                position: 'bottom-right',
            });

            $("#loadEmployees").load("/view/spaces/spaces.employee.php",{
                type: "<?=$_REQUEST["type"]?>",
                ids: "<?=$ids?>",
            });

            <?php if($type == "addResponsible"){ ?>
            $("#loadTableResponsibles").load("/view/spaces/spaces.responsibles.table.php",{
                ids: "<?=$ids?>",
            });
            <?php }else{ ?>
            $("#loadTableParticipants").load("/view/spaces/spaces.participants.table.php",{
                ids: "<?=$ids?>",
            });
            <?php } ?>

        });
    }
</script>

<?php 
    }else{ 
        $type = ($_REQUEST["type"] == "responsible") ? "deleteResponsible" : "deleteParticipant";
        $typeTitle = ($_REQUEST["type"] == "responsible") ? "Responsable" : "Participante";
?>

    <div class="p-3">
        <p class="fs-5 text-center">Eliminar <?=$typeTitle?></p>
        <p class="text-center">¿Estás seguro que deseas quitar el <?=$typeTitle?> del listado?</p>

        <button type="button" class="btn btn-danger d-block mx-auto" id="confirmDelete">
            Eliminar
        </button>
    </div>

    <script>
        $(document).ready(function(){
            $("#confirmDelete").click(function(){

                $.post("/process/index.php", {
                    process: "spaces",
                    action: "<?=$type?>",
                        
                    id: "<?=$_REQUEST["id"]?>",
                },
                function(response){
                    console.log(response);
                    
                    var header = "";
                    var text = "";
                    var icon = "";
                    var success = false;

                    if (response == "00000") {
                        header = "¡Removido!";
                        text = "EL <?=$typeTitle?> se ha removido correctamente";
                        icon = "success";
                        success = true;
                    }else{
                        header = "¡Error!";
                        text = "Ha ocurrido un error al remover el <?=$typeTitle?>. Intentelo nuevamente.";
                        icon = "error";
                    } 

                    alert(text);
                    /*
                    $.toast({
                        heading: header,
                        text: text,
                        showHideTransition: 'slide',
                        icon: icon,
                        hideAfter: 3000, 
                        position: 'bottom-right',
                    });*/

                
                <?php if($type == "deleteResponsible"){ ?>
                    $("#loadTableResponsibles").load("/view/spaces/spaces.responsibles.table.php",{
                        ids: "<?=$ids?>",
                    });
                <?php }else{ ?>
                    $("#loadTableParticipants").load("/view/spaces/spaces.participants.table.php",{
                        ids: "<?=$ids?>",
                    });
                <?php } ?>
                        
                    $("#btnCloseEmployee").trigger("click");
                        
                }); 
            });
        });
    </script>
<?php }?>