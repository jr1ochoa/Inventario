
<div class="bg-light py-5 mb-5">
    <h1 class="text-uppercase text-center mt-4">Dashboard Estadístico</h1>
    <hr style="border: 2px solid #1a4262; width: 50%;" class="d-block mx-auto" />
    <p class="fs-4 text-center">Sistema de Transporte</p>

    <div class="container">
        <div class="card" style="background-color: #fff;">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <label for="txtStartDate" class="form-label">Fecha de inicio:</label>
                        <input type="date" class="form-control" id="txtStartDate">
                    </div>
                    <div class="col-md-5">
                        <label for="txtEndDate" class="form-label">Fecha de fin:</label>
                        <input type="date" class="form-control" id="txtEndDate">
                    </div>
                    <div class="col-md-2">
                        <button id="btnSearch" type="button" class="btn btn-dark d-block mx-auto px-3 mt-4">
                            Buscar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="loadStats" class="container"></div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
    $(document).ready(function(){
        loadStats();

        $("#btnSearch").click(function(){
            loadStats();
        });
    });

    function loadStats() {
        $("#loadStats").load("/view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.estadisticas.php",{
            startDate: $("#txtStartDate").val(),
            endDate: $("#txtEndDate").val(),
        });
    }
</script>