<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

<!-- DataTables -->
<link href="https://cdn.datatables.net/v/bs5/dt-1.13.6/r-2.5.0/datatables.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/2.1.7/css/dataTables.bootstrap5.css" rel="stylesheet">
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.6/r-2.5.0/datatables.min.js"></script>

<!-- Toast -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>


<div class="py-5" style="background-color: #3971FF;">
    <h1 class="text-center text-light fw-bold text-uppercase">Gestión de Usuarios</h1>
    <p class="text-center text-light fs-5 mb-2">Debida Diligencia <?=date("Y")?></p>
    <div class="row" style="width: 100%;">
        <div class="col-md">
            <button type="button" class="btn-siif btn-transparent float-md-end d-block mx-auto mt-3 px-5" data-bs-toggle="modal" data-bs-target="#usersModal">
                Agregar
            </button>
        </div>
        <div class="col-md">
            <a href="/?view=debidaDiligencia" style="text-decoration: none;">
                <button type="button" class="btn-siif btn-transparent float-md-start d-block mx-auto mt-3 px-5">
                    Regresar
                </button>
            </a>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md mb-3">
                    <label for="cboRol" class="form-label">Roles:</label>
                    <select id="cboRol" class="form-select" aria-label="Default select example">
                        <option value="" selected>Seleccionar Todos</option>
                        <option value="administrator">Administradores</option>
                        <option value="participant">Participantes</option>
                    </select>
                </div>
                <div class="col-md mb-3">
                    <label for="cboStatus" class="form-label">Estados:</label>
                    <select id="cboStatus" class="form-select" aria-label="Default select example">
                        <option value="0" selected>Activos</option>
                        <option value="1">Inactivos</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <button id="btnSearch" type="button" class="btn-siif btn-solid-2 d-block mx-auto px-5 mt-4">
                        <i class="bi bi-search"></i> Buscar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="loadUsers" class="my-5"></div>

</div>

<script>
    $(document).ready(function(){
        loadUsers();

        $("#btnSearch").click(function(){
            loadUsers();
        });
    });

    function loadUsers() {
        $("#loadUsers").load("/view/Operaciones/AdministracionFinanciera/DebidaDiligencia/users/users.list.php",{
           rol: $("#cboRol").val(), 
           status: $("#cboStatus").val(), 
        });
    }
</script>