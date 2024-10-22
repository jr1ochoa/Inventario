<?php include("../config/net.php");

    $tables =  $_REQUEST["rol"];
    $status =  ($_REQUEST["status"] != "") ? "AND f.status = '".$_REQUEST["status"]."'" : "";
    $form = "";
    $link = "";
    $title = "";

    switch ($_REQUEST["status"]) {
        case '0': $idTable = "pendingsTable"; break;
        case '1': $idTable = "approveTable"; break;
        case '2': $idTable = "refuseTable"; break;
        case '3': $idTable = "tracingTable"; break;
    }

    switch ($tables) {
        case 'supplier':
            $title = "Proveedor";
            $db = "fus__dd_supplier";
            $form = "Formulario \"CONOZCA A TU PROVEEDOR\"";
            $link = "https://fusalmo.org/debidadiligencia/?view=forms&form=supplier&ius=". $_SESSION["iu"];
            break;   
        case 'customer natural':
            $title = "Cliente/Donante/Institución <br/> <span class='text-muted fs-5'>(Persona natural)</span>";
            $db = "fus__dd_customer";
            $form = "Formulario \"CONOZCA A SU CLIENTE/DONANTE/INSTITUCION\"";
            $link = "https://fusalmo.org/debidadiligencia/?view=forms&form=customer&tp=nt&ius=". $_SESSION["iu"];
            break;   
            case 'customer legal':
            $title = "Cliente/Donante/Institución <br/> <span class='text-muted fs-5'>(Persona jurídica)</span>";
            $db = "fus__dd_customer_2";
            $form = "Formulario \"CONOZCA A SU CLIENTE/DONANTE/INSTITUCION\"";
            $link = "https://fusalmo.org/debidadiligencia/?view=forms&form=customer&tp=lg&ius=". $_SESSION["iu"];
        break;   
        case 'consultant':
            $title = "Consultor";
            $db = "fus__dd_consultant";
            $form = "Formulario \"FORMULARIO DE ACTUALIZACION DE DATOS - CONSULTOR\"";
            $link = "https://fusalmo.org/debidadiligencia/?view=forms&form=consultant&ius=". $_SESSION["iu"];
            break;   
        case 'founders':
            $title = "Fundadores";
            $db = "fus__dd_founders";
            $form = "Formulario \"CONOZCA A FUNDADORES FUSALMO\"";
            $link = "https://fusalmo.org/debidadiligencia/?view=forms&form=founders&ius=". $_SESSION["iu"];
            break;   
        case 'employee':
            $title = "Empleado";
            $db = "fus__dd_employee";
            $form = "Formulario \"Política Conozca a su Empleado\"";
            $link = "https://fusalmo.org/debidadiligencia/?view=forms&form=employee&ius=". $_SESSION["iu"];
            break;   
        case 'boardDirectors':
            $title = "Junta Directiva";
            $db = "fus__dd_board_directors";
            $form = "Formulario ACTUALIZACION DE DATOS \"MIEMBROS JUNTA DIRECTIVA\"";
            $link = "https://fusalmo.org/debidadiligencia/?view=forms&form=board-directors&ius=". $_SESSION["iu"];
            break;   
    }
?>


<p class="text-center fs-4 mt-5"><?=$title?></p>
<hr class="d-block mx-auto mb-5" style="border: 1px solid #1e49c3; width: 50%;" />

<div class="card">
    <div class="card-body">
        <div class="text-center">
            <button type="button" class="btn btn-dark" disabled>
                <i class='bi bi-eye-fill'></i> Ver Formulario
            </button>
            <button type="button" class="btn btn-success" disabled>
                <i class='bi bi-clipboard2-check'></i> Validar Información
            </button>
            <button type="button" class="btn btn-danger" disabled>
                <i class='bi bi-x-circle'></i> Rechazar
            </button>
            <button type="button" class="btn btn-primary" disabled>
                <i class="bi bi-arrow-clockwise"></i> Solicitar actualización
            </button>
        </div>
        
    </div>
</div>

<div class="my-5">
    <table id="<?=$idTable?>" class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Usuario</th>
                <th>Formulario</th>
                <th>Versión</th>
                <th>Estado</th>
                <th>Ver</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                
                $query = "SELECT f.id, u.user, f.formversion, f.status, a.dtc FROM `fus__dd_assignation_form` as a 
                            INNER JOIN $db as f ON f.id = a.idForm
                            INNER JOIN fus__dd_users as u ON u.id = a.idUser
                            WHERE a.form_type = '$tables' $status;";
    
                $forms = $net->prepare($query);
                $forms->execute();
                $i = 0;
                $status = "";
                while ($data = $forms->fetch()) {
                    $i++;
                    echo "<tr>
                            <td>$i</td>
                            <td>$data[1]</td>
                            <td>$form</td>
                            <td>".$data["formversion"]."</td>
                            <td>";
                                switch ($data["status"]) {
                                    case '0': 
                                        echo "Pendiente</td>"; 
                                        echo "<td>
                                                <a href='$link&fid=$data[0]' target='_blank' style='text-decoration: none;'>
                                                    <button type='button' class='btn btn-dark px-3'>
                                                        <i class='bi bi-eye-fill'></i>
                                                    </button>
                                                </a>
                                            </td>";
                                        break;
                                    case '1': 
                                        echo "Validar</td>"; 
                                        echo "<td>
                                                <a href='$link&fid=$data[0]' target='_blank' style='text-decoration: none;'>
                                                    <button type='button' class='btn btn-dark px-3'>
                                                        <i class='bi bi-eye-fill'></i>
                                                    </button>
                                                </a>
                                                <button type='button' class='btn btn-success px-3' data-bs-toggle='modal' data-bs-target='#exampleModal' onclick='loadFormsModal($data[0], \"validate\", \"$tables\")'>
                                                    <i class='bi bi-clipboard2-check'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger px-3' data-bs-toggle='modal' data-bs-target='#exampleModal' onclick='loadFormsModal($data[0], \"refuse\", \"$tables\")'>
                                                    <i class='bi bi-x-circle'></i>
                                                </button>
                                            </td>";
                                        break;
                                    case '2': 
                                        echo "Rechazado</td>"; 
                                        echo "<td>
                                                <a href='$link&fid=$data[0]' target='_blank' style='text-decoration: none;'>
                                                    <button type='button' class='btn btn-dark px-3'>
                                                        <i class='bi bi-eye-fill'></i>
                                                    </button>
                                                </a>
                                                <button type='button' class='btn btn-primary px-3' data-bs-toggle='modal' data-bs-target='#exampleModal' onclick='loadFormsModal($data[0], \"resend\", \"$tables\")'>
                                                    <i class='bi bi-arrow-clockwise'></i>
                                                </button>
                                            </td>";
                                        break;
                                    case '3': 
                                        echo "Solicitud de Actualización</td>"; 
                                        echo "<td>
                                                <a href='$link&fid=$data[0]' style='text-decoration: none;'>
                                                    <button type='button' class='btn btn-dark px-3'>
                                                        <i class='bi bi-clipboard2'></i> Llenar
                                                    </button>
                                                </a>
                                            </td>";
                                        break;
                                }
                                
                    echo "
                        </tr>";
                }
            ?>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function(){
        $("#<?=$idTable?>").DataTable();
    });

    function loadFormsModal(id, action, formType) {
        $("#loadFormModal").load("/view/Operaciones/AdministracionFinanciera/DebidaDiligencia/forms/forms.form.php",{
            id: id,
            action: action,
            formType: formType
        })
    }
</script>