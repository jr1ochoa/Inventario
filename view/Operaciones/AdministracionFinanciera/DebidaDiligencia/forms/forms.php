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


<div class="py-5" style="background-color: #f3f3f3;">
    <h1 class="text-center text-uppercase">Gestión de Información</h1>
    <p class="text-center text-muted fs-5 mb-2">Debida Diligencia <?=date("Y")?></p>
</div>

<div class="container my-5">
    <div class="card mb-5">
        <div class="card-body">
            <div class="row">
                <div class="col-md">
                    <label for="cboForms" class="form-label">Formularios:</label>
                    <select id="cboForms" class="form-select" aria-label="Default select example">
                        <option value="supplier" selected>Proveedor</option>
                        <option value="customer natural">Clientes Naturales</option>
                        <option value="customer legal">Clientes Jurídicos</option>
                        <option value="consultant">Consultor</option>
                        <option value="founders">Miembros Fundadores</option>
                        <option value="employee">Empleado</option>
                        <option value="boardDirectors">Junta Directiva</option>  
                    </select>
                </div>
                <div class="col-md">
                    <label for="txtStartDate" class="form-label">Fecha de inicio:</label>
                    <input type="date" class="form-control" id="txtStartDate">
                </div>
                <div class="col-md">
                    <label for="txtEndDate" class="form-label">Fecha de fin:</label>
                    <input type="date" class="form-control" id="txtEndDate">
                </div>
                <div class="col-md-3">
                    <button type="button" id="btnSearch" class="btn btn-dark d-block mx-auto mt-4 px-5">
                        <i class="bi bi-search"></i> Buscar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending-tab-pane" type="button" role="tab" aria-controls="pending-tab-pane" aria-selected="true">Pendientes</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="approve-tab" data-bs-toggle="tab" data-bs-target="#approve-tab-pane" type="button" role="tab" aria-controls="approve-tab-pane" aria-selected="false">Por validar</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="refused-tab" data-bs-toggle="tab" data-bs-target="#refused-tab-pane" type="button" role="tab" aria-controls="refused-tab-pane" aria-selected="false">Rechazados</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="tracing-tab" data-bs-toggle="tab" data-bs-target="#tracing-tab-pane" type="button" role="tab" aria-controls="tracing-tab-pane" aria-selected="false">Seguimiento</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="pending-tab-pane" role="tabpanel" aria-labelledby="pending-tab" tabindex="0"></div>
    <div class="tab-pane fade" id="approve-tab-pane" role="tabpanel" aria-labelledby="approve-tab" tabindex="0"></div>
    <div class="tab-pane fade" id="refused-tab-pane" role="tabpanel" aria-labelledby="refused-tab" tabindex="0"></div>
    <div class="tab-pane fade" id="tracing-tab-pane" role="tabpanel" aria-labelledby="tracing-tab" tabindex="0"></div>
    </div>

    <div id="loadForms"></div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Formularios</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div id="loadFormModal" class="modal-body">
      </div>
      <div class="modal-footer">
        <button id="btnCloseForms" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function() {
        loadForms();
        
        $("#btnSearch").click(function() {
            loadForms();
        });

        $("#pending-tab").click(function() {
            $("#pending-tab-pane").load("/view/Operaciones/AdministracionFinanciera/DebidaDiligencia/forms/forms.list.php",{
                rol: $("#cboForms").val(),
                startDate: $("#txtStartDate").val(),
                endDate: $("#txtEndDate").val(),
                status: '0'
            })
        });
        $("#approve-tab").click(function() {
            $("#approve-tab-pane").load("/view/Operaciones/AdministracionFinanciera/DebidaDiligencia/forms/forms.list.php",{
                rol: $("#cboForms").val(),
                startDate: $("#txtStartDate").val(),
                endDate: $("#txtEndDate").val(),
                status: '1'
            })
        });
        $("#refused-tab").click(function() {
            $("#refused-tab-pane").load("/view/Operaciones/AdministracionFinanciera/DebidaDiligencia/forms/forms.list.php",{
                rol: $("#cboForms").val(),
                startDate: $("#txtStartDate").val(),
                endDate: $("#txtEndDate").val(),
                status: '2'
            })
        });
        $("#tracing-tab").click(function() {
            $("#tracing-tab-pane").load("/view/Operaciones/AdministracionFinanciera/DebidaDiligencia/forms/forms.list.php",{
                rol: $("#cboForms").val(),
                startDate: $("#txtStartDate").val(),
                endDate: $("#txtEndDate").val(),
                status: '3'
            })
        });
    });
    
    function loadForms() {
        $("#pending-tab-pane").load("/view/Operaciones/AdministracionFinanciera/DebidaDiligencia/forms/forms.list.php",{
            rol: $("#cboForms").val(),
            startDate: $("#txtStartDate").val(),
            endDate: $("#txtEndDate").val(),
            status: '0'
        })
        $("#approve-tab-pane").load("/view/Operaciones/AdministracionFinanciera/DebidaDiligencia/forms/forms.list.php",{
            rol: $("#cboForms").val(),
            startDate: $("#txtStartDate").val(),
            endDate: $("#txtEndDate").val(),
            status: '1'
        })
        $("#refused-tab-pane").load("/view/Operaciones/AdministracionFinanciera/DebidaDiligencia/forms/forms.list.php",{
            rol: $("#cboForms").val(),
            startDate: $("#txtStartDate").val(),
            endDate: $("#txtEndDate").val(),
            status: '2'
        })
        $("#tracing-tab-pane").load("/view/Operaciones/AdministracionFinanciera/DebidaDiligencia/forms/forms.list.php",{
            rol: $("#cboForms").val(),
            startDate: $("#txtStartDate").val(),
            endDate: $("#txtEndDate").val(),
            status: '3'
        })
    }
</script>