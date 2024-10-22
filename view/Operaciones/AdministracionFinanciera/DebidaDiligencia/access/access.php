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

<!-- Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<div class="py-5" style="background-color: #3971FF;">
    <h1 class="text-center text-light fw-bold text-uppercase">Accesos</h1>
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
                <div class="col-md mb-3">
                    <label for="cboStatus" class="form-label">Estado:</label>
                    <select id="cboStatus" class="form-select" aria-label="Default select example">
                        <option value="0">Activos</option>
                        <option value="1">Inactivos</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <button type="button" id="btnSearch" class="btn-siif btn-solid-2 d-block mx-auto mt-4 px-5">
                        <i class="bi bi-search"></i> Buscar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="module-tab" data-bs-toggle="tab" data-bs-target="#module-tab-pane" type="button" role="tab" aria-controls="module-tab-pane" aria-selected="true">Módulo</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="forms-tab" data-bs-toggle="tab" data-bs-target="#forms-tab-pane" type="button" role="tab" aria-controls="forms-tab-pane" aria-selected="false">Formularios</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="module-tab-pane" role="tabpanel" aria-labelledby="module-tab" tabindex="0"></div>
        <div class="tab-pane fade" id="forms-tab-pane" role="tabpanel" aria-labelledby="forms-tab" tabindex="0"></div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="accessModal" tabindex="-1" aria-labelledby="accessModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="accessModalLabel">Accesos</h1>
            </div>
            <div id="loadAccessForm" class="modal-body">
            </div>
            <div class="modal-footer">
                <button id="btnCloseAccess" type="button" class="btn-siif btn-solid-2" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        loadModuleAccessList();
        loadFormsAccessList()

        $("#btnSearch").click(function() {
            loadModuleAccessList();
            loadFormsAccessList()
        });
    });
    
    function loadModuleAccessList() {
        $("#module-tab-pane").load("/view/Operaciones/AdministracionFinanciera/DebidaDiligencia/access/access.module.php",{
            status: $("#cboStatus").val(),
        })
    }
    function loadFormsAccessList() {
        $("#forms-tab-pane").load("/view/Operaciones/AdministracionFinanciera/DebidaDiligencia/access/access.forms.php",{
            status: $("#cboStatus").val(),
        })
    }
</script>