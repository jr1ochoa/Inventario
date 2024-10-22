<!-- Select 2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<!-- Main -->
<div id="main">
    <div class="inner">
        
    <!-- Content -->
        <div id="content">
            <div class="row mt-5 mb-3">
                <div class="col-8">
                    <h2 class="title">Acciones de Personal</h2>
                </div>
                <div class="col-4">

                    <?php if($_SESSION['type'] == "RRHH" || $_SESSION['type'] == "Administrador"){ ?>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#FormModal" onclick='personnelActions(0, "add")'>Añadir Acción de Personal</button>
                    <?php } ?>

                </div>
            </div>
            <hr style='margin-top: 0px; padding-top: 0px;'/>  

            <?php if($_SESSION['type'] == "RRHH" || $_SESSION['type'] == "Administrador"){?>
            <div class="card mb-3">
                <div class="card-body">
                    <select name="list" id="cboList">
                        <option value="all">Todas las acciones</option>
                        <option value="personal">Mis acciones</option>
                    </select>
                </div>
            </div>
            <?php } ?>

            <div id="actionsList"></div>         
        </div>
    </div>
</div>

<div class="modal fade" id="FormModal" tabindex="-1" aria-labelledby="FormModal" aria-hidden="true">  
    <?php include("view/personnelactions/personnelactions.modal.php");?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>    
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#UserTable').DataTable( {
            "order": [[ 0, "asc" ]], 
            "language": { "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json" }
        });

        $("#actionsList").load('view/personnelactions/personnelactions.list.php', {
            list: $("#cboList").val()
        });
    });
    
    $("#cboList").change(function(){
        $("#actionsList").load('view/personnelactions/personnelactions.list.php', {
            list: $("#cboList").val()
        });
    });
         
    function personnelActions(iu, action){
        $("#loadModalActions").load("view/personnelactions/personnelactions.form.php", {iu: iu, action: action} );

        if(action == "show"){
            $("#btnActionActions").css("display", "none");
        }else{
            $("#btnActionActions").css("display", "block");
        }

        if(action == "add"){
            $("#btnActionActions").removeClass().addClass('btn btn-success');
            $("#btnActionActions").text('Guardar');
        }else if(action == "update"){
            $("#btnActionActions").removeClass().addClass('btn btn-primary');
            $("#btnActionActions").text('Actualizar');
        }else if(action == "delete"){
            $("#btnActionActions").removeClass().addClass('btn btn-danger');
            $("#btnActionActions").text('Eliminar');
        }else{
            $("#btnActionActions").removeClass().addClass('btn btn-primary');
            $("#btnActionActions").text('Actualizar');
        }
    } 

</script>                    
<link rel="stylesheet" href='https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css'/>
