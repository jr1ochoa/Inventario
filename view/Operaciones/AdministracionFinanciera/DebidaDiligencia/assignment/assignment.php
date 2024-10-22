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
    <h1 class="text-center text-light fw-bold text-uppercase">Asignación de Formularios</h1>
    <p class="text-center text-light fs-5 mb-2">Debida Diligencia <?=date("Y")?></p>

    <a href="/?view=debidaDiligencia" style="text-decoration: none;">
        <button type="button" class="btn-siif btn-transparent d-block mx-auto mt-4 px-5">
            Regresar
        </button>
    </a>
</div>

<div class="container my-5">

    <div class="card mb-5">
        <div class="card-body">
            <div class="row">
                <div class="col-md">
                    <label for="txtStartDate" class="form-label">Fecha de inicio:</label>
                    <input type="date" class="form-control" id="txtStartDate">
                </div>
                <div class="col-md">
                    <label for="txtEndDate" class="form-label">Fecha de fin:</label>
                    <input type="date" class="form-control" id="txtEndDate">
                </div>
                <div class="col-md-3">
                    <button type="button" id="btnSearch" class="btn-siif btn-solid-2 d-block mx-auto mt-4 px-5">
                        <i class="bi bi-search"></i> Buscar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="loadList"></div>
</div>

<script>
    $(document).ready(function() {
        loadUsersList(); 
    });
    
    function loadUsersList() {
        $("#loadList").load("/view/Operaciones/AdministracionFinanciera/DebidaDiligencia/assignment/assignment.users.php")
    }
</script>