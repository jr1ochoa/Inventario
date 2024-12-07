
<!-- Estilos personalizados -->
<style>
    .btn-transparent:hover{
        background-color: #182A54;
        color: #ffffff;
        border: 2px solid #182A54;
    }
    .table th {
        background-color: #1F376F;
        color: white;
    }
    .page-item.active .page-link {
        background-color: #007bff;
        border-color: #007bff;
    }
    .dataTables_length {
        float: left;
    }
    .dataTables_filter {
        float: right;
    }
    .pagination {
        margin-top: 20px;
    }
</style>

<div class="p-5" style="background-color: #3971FF;">
    <h1 class="text-center text-uppercase text-light fw-bold mb-5">Gestión de Memorándums</h1>
    
    <button type="button" class="btn-siif btn-transparent d-block mx-auto px-5 mb-4">
        <a href="?view=inventory-memos-create" style="text-decoration: none;">Crear Memorándum</a>
    </button>
</div>

<div class="container my-5">

    <div class="card mb-5">
        <div class="card-body">
            <div class="row">
                <div class="col-md mb-3">
                    <label for="txtStartDate" class="form-label">Fecha de inicio:</label>
                    <input type="date" class="form-control" id="txtStartDate">
                </div>
                <div class="col-md mb-3">
                    <label for="txtEndDate" class="form-label">Fecha de fin:</label>
                    <input type="date" class="form-control" id="txtEndDate">
                </div>
                <div class="col-md-3 mb-3">
                    <button type="button" id="btnSearch" class="btn-siif btn-solid-2 d-block mx-auto px-5 mt-4">
                        <i class="bi bi-search"></i> Buscar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="loadMemos"></div>
    
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
<script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $("#loadMemos").load("/view/inventory/inventory.memo.list.php",{
            startDate: $("#txtStartDate").val(),
            endDate: $("#txtEndDate").val(),
        });

        $("#btnSearch").click(function() {
            $("#loadMemos").load("/view/inventory/inventory.memo.list.php",{
                startDate: $("#txtStartDate").val(),
                endDate: $("#txtEndDate").val(),
            });
        });
    });
</script>

