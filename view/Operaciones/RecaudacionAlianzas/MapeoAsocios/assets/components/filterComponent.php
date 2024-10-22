<!-- Datos para filtrar empresas -->
<div class="d-flex form-control p-0" id="filter-select-Empr">
    <i class="bi bi-funnel-fill align-self-center mx-1"></i>

    <select class="filter-select p-1 shadow-none">
        <option selected disabled hidden>Filtrar listado...</option>

        <!-- Grupos de opciones -->
        <optgroup label="Tipo de empresa" id="tipoEmpresaEmpr-group">
            <!-- Opciones dinámicas -->
        </optgroup>

        <optgroup label="Tipo de cooperación"> <!-- TCoop = Tipo de cooperación -->
            <option value="TCoop_Multilateral">Multilateral</option>
            <option value="TCoop_Bilateral">Bilateral</option>
            <option value="TCoop_Empresa">Empresa</option>
            <option value="TCoop_ONGI">ONGI</option>
            <option value="TCoop_ONGNA">ONGNA</option>
            <option value="TCoop_FUND">FUND</option>
            <option value="TCoop_Comunicaciones">Comunicaciones</option>
            <option value="TCoop_Deportivo">Deportivo</option>
        </optgroup>
        
        <optgroup label="Tipo de relación"> <!-- TRel = Tipo de relación -->
            <option value="TRel_Proyecto">Proyecto</option>
            <option value="TRel_Consulta">Consultoría</option>
            <option value="TRel_Donaciones">Donaciones</option>
            <option value="TRel_Acuerdo">Acuerdo</option>
        </optgroup>
        
        <optgroup label="Estado"> <!-- EmprEst = Estado -->
            <option value="EmprEst_Activa">Activa</option>
            <option value="EmprEst_Inactiva">Inactiva</option>
        </optgroup>
    </select>

    <button class="cancelFilter btn btn-danger rounded-0 rounded-end" type="button" disabled><i class="bi bi-arrow-counterclockwise"></i></button>
</div>

<div class="d-flex form-control p-0" id="filter-select-Conv">
    <i class="bi bi-funnel-fill align-self-center mx-1"></i>

    <!-- Datos para filtrar convenios -->
    <select class="filter-select p-1 shadow-none">
        <option selected disabled hidden>Filtrar listado...</option>
    
        <!-- Grupos de opciones -->
        <optgroup label="Tipo de empresa" id="tipoEmpresaConv-group">
            <!-- Opciones dinámicas -->
        </optgroup>
        
        <optgroup label="Sede"> <!-- ConvSede = Sede del convenio -->
            <option value="ConvSede_San Salvador">San Salvador</option>
            <option value="ConvSede_San Miguel">San Miguel</option>
            <option value="ConvSede_Santa Ana">Santa Ana</option>
        </optgroup>
    
        <optgroup label="Tipo de convenio"> <!-- TConv = Tipo convenio -->
            <option value="TConv_Proyecto">Proyecto</option>
            <option value="TConv_Consulta">Consultoría</option>
            <option value="TConv_Donaciones">Donaciones</option>
            <option value="TConv_Acuerdo">Acuerdo</option>
        </optgroup>
    
        <optgroup label="Situación actual"> <!-- SitAct = Situación actual -->
            <option value="SitAct_Activa">Activa</option>
            <option value="SitAct_Finalizada">Finalizada</option>
        </optgroup>
    </select>

    <button class="cancelFilter btn btn-danger rounded-0 rounded-end" type="button" disabled><i class="bi bi-arrow-counterclockwise"></i></button>
</div>