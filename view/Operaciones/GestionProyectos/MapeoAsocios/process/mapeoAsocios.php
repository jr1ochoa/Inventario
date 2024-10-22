<?php
    if( $group == "gestionTipoEmpresa" ){
        if($action == "showDataListTE"){
            try{
                $query = "SELECT id, nombre_tipo_empresa, descripcion_tipo FROM proyecto_mapeo_asocios_tipos_empresa WHERE habilitada = 1";
                $stm = $connection->prepare($query);
                $stm->execute(); 
                $dataTEList = $stm->fetchAll(PDO::FETCH_ASSOC);

                if(count($dataTEList) != 0){
                    $i = 0;
                    foreach ($dataTEList as $dataTE) {
                        echo generateTEList($dataTE, ++$i);
                    }
                }else{
                    echo <<<HTML
                        <div class="emptyCase text-muted text-center my-5">
                            <h3 class="bi bi-journal-x fs-1 "></h3>
                            <h4>Todavía no se encuentran registros disponibles...</h4>
                        </div>
                    HTML;
                }
            }catch (Exception $e){
                echo $e->getMessage();
            }
        }

        if ($action == "getDetailsTE"){
            try{
                $selectedId = $_POST['selectedId'];

                $query = "SELECT * FROM proyecto_mapeo_asocios_tipos_empresa WHERE id = :selectedId";
                $stm = $connection->prepare($query);
                $stm->bindParam(':selectedId', $selectedId, PDO::PARAM_INT);
                $stm->execute();

                $collectedData = $stm->fetch(PDO::FETCH_ASSOC);

                echo json_encode($collectedData);

            }catch(Exception $e){
                echo $e->getMessage();
            }
        }

        if ($action == "addTE"){
            try{
                $query = "INSERT INTO proyecto_mapeo_asocios_tipos_empresa VALUES (NULL, :n1, :n2, :n3, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
                $stm = $connection->prepare($query);
                $stm->bindParam(':n1', htmlspecialchars($_POST["nomTE"]));
                $stm->bindParam(':n2', htmlspecialchars($_POST["descTE"]));
                $stm->bindParam(':n3', htmlspecialchars(1));
                $stm->execute();

                echo "Success";

            }catch (Exception $e){
                echo $e->getMessage();
            }
        }

        if ($action == "checkNameTE"){
            try{
                $toCheckName = $_POST['nomTE'];
                $formType = $_POST['formType'];

                if($formType == "addForm"){
                    $query = "SELECT COUNT(*) FROM proyecto_mapeo_asocios_tipos_empresa WHERE nombre_tipo_empresa LIKE :toCheckName";
                }else if($formType == "editForm"){
                    $selectedId = $_POST['TEId'];

                    $query = "SELECT COUNT(*) FROM proyecto_mapeo_asocios_tipos_empresa WHERE nombre_tipo_empresa LIKE :toCheckName AND id != :selectedId";
                }
                
                $stm = $connection->prepare($query);
                $stm->bindParam(':toCheckName', $toCheckName);
                if($formType == "editForm"){ $stm->bindParam(':selectedId', $selectedId); }
                $stm->execute();
                $rowCount = $stm->fetchColumn();

                echo json_encode(['valid' => $rowCount == 0]);

            }catch (Exception $e){
                echo json_encode(['valid' => false]);
            }

        }

        if($action == "selectTEList"){
            try{
                $query = "SELECT id, nombre_tipo_empresa FROM proyecto_mapeo_asocios_tipos_empresa WHERE habilitada = 1";
                $stm = $connection->prepare($query);
                $stm->execute(); 
                $dataTEList = $stm->fetchAll(PDO::FETCH_ASSOC);

                if(count($dataTEList) != 0){
                    echo <<<HTML
                        <option selected disabled hidden>Selecciona una opción...</option>
                    HTML;

                    foreach ($dataTEList as $dataTE) {
                        echo generateTESelectList($dataTE);
                    }
                }else{
                    echo <<<HTML
                        <option selected disabled hidden>Todavía no hay opciones...</option>
                    HTML;
                }
            }catch(Exception $e){
                echo "Error: " . $e->getMessage();
            }
        }

        if ($action == "editTE"){
            try{
                $selectedId = $_POST['selectedId'];
                $query = "UPDATE proyecto_mapeo_asocios_tipos_empresa SET nombre_tipo_empresa = :n1 , descripcion_tipo = :n2, fecha_modificacion = CURRENT_TIMESTAMP WHERE id = :selectedId";
                $stm = $connection->prepare($query);
                $stm->bindParam(':n1', htmlspecialchars($_POST["editNombreTE"]));
                $stm->bindParam(':n2', htmlspecialchars($_POST["editDescTE"]));
                $stm->bindParam(':selectedId', $selectedId);
                $stm->execute();
                
                echo "Success";
            }catch(Exception $e){
                error_log($e->getMessage());
            }
        }

        if ($action == "deleteTE"){
            try{
                $selectedId = $_POST['selectedId'];
                $query = "UPDATE proyecto_mapeo_asocios_tipos_empresa AS TE JOIN proyecto_mapeo_asocios_listado_empresas AS empr 
                        ON TE.id = empr.tipo_empresa JOIN proyecto_mapeo_asocios_listado_convenios AS conv ON empr.id = conv.id_empresa
                        SET TE.habilitada = 0,
                            empr.habilitada = 0,
                            conv.habilitada = 0
                        WHERE TE.id = :selectedId;";
                $stm = $connection->prepare($query);
                $stm->bindParam(':selectedId', $selectedId);
                $stm->execute();
                
                echo "Success";
            }catch(Exception $e){
                error_log($e->getMessage());
            }
        }

        if($action == "searchTE"){
            try{
                $toSearchName = '%'.$_POST['toSearchName'].'%';

                $query = "SELECT id, nombre_tipo_empresa, descripcion_tipo FROM proyecto_mapeo_asocios_tipos_empresa WHERE nombre_tipo_empresa LIKE :toSearchName AND habilitada = 1";
                $stm = $connection->prepare($query);
                $stm->bindParam(':toSearchName', $toSearchName);
                $stm->execute(); 
                $dataTEList = $stm->fetchAll(PDO::FETCH_ASSOC);

                if(count($dataTEList) != 0){
                    $i = 0;
                    foreach ($dataTEList as $dataTE) {
                        echo generateTEList($dataTE, ++$i);
                    }
                }else{
                    echo <<<HTML
                        <div class="emptyCase text-muted text-center my-5">
                            <h3 class="bi bi-building-x fs-1 "></h3>
                            <h4>No se han encontrado resultados...</h4>
                        </div>
                    HTML;
                }
            }catch(Exception $e){
                error_log($e->getMessage());
            }
        }
    }

    if( $group == "gestionEmpresas" ){ // Empr = Empresa
        if($action == "showDataListEmpr"){
            try{
                $query = "SELECT id, nombre_empresa, codigo_donante, estado FROM proyecto_mapeo_asocios_listado_empresas WHERE habilitada = 1";
                $stm = $connection->prepare($query);
                $stm->execute(); 
                $dataEmprList = $stm->fetchAll(PDO::FETCH_ASSOC);

                if(count($dataEmprList) != 0){
                    $i = 0;
                    foreach ($dataEmprList as $dataEmpr) {
                        echo generateEmprList($dataEmpr, ++$i);
                    }
                }else{
                    echo <<<HTML
                        <div class="emptyCase text-muted text-center my-5">
                            <h3 class="bi bi-journal-x fs-1 "></h3>
                            <h4>Todavía no se encuentran registros disponibles...</h4>
                        </div>
                    HTML;
                }
            }catch (Exception $e){
                echo $e->getMessage();
            }
        }

        if ($action == "getDetailsEmpr"){
            try{
                $selectedId = $_POST['selectedId'];

                $query = "SELECT emp.*,  tipo.nombre_tipo_empresa AS tipo_empresa_nombre FROM proyecto_mapeo_asocios_listado_empresas AS emp
                    JOIN proyecto_mapeo_asocios_tipos_empresa AS tipo ON emp.tipo_empresa = tipo.id WHERE emp.id = :selectedId;";
                $stm = $connection->prepare($query);
                $stm->bindParam(':selectedId', $selectedId, PDO::PARAM_INT);
                $stm->execute();

                $collectedData = $stm->fetch(PDO::FETCH_ASSOC);
                echo json_encode($collectedData);
                
            }catch (Exception $e){
                echo $e->getMessage();
            }
        }

        if ($action == "addEmpr"){
            try{
                // Espacio para crear el código del donante
                $codeDonante = substr(htmlspecialchars($_POST["tipoCoopEmpr"]), 0, 4).'-'.htmlspecialchars($_POST["abvrEmpr"]).'-'.date("Y");
                // Sintaxis: Primeras 4 letras del tipo de relación + Abreviatura de la empresa + Año actual
                echo $codeDonante;

                $query = "INSERT INTO proyecto_mapeo_asocios_listado_empresas VALUES 
                        (NULL, :n1, :n2, :n3, :n4, :n5, :n6, :n7, :n8, :n9, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
                $stm = $connection->prepare($query);
                if (!$stm) {
                    throw new Exception("Error preparando la consulta.");
                }
                $stm->bindParam(':n1', strtoupper(htmlspecialchars($_POST["abvrEmpr"])));
                $stm->bindParam(':n2', htmlspecialchars($_POST["nomEmpr"]));
                $stm->bindParam(':n3', strtoupper($codeDonante));
                $stm->bindParam(':n4', htmlspecialchars($_POST["tipoCoopEmpr"]));
                $stm->bindParam(':n5', htmlspecialchars($_POST["tipoRelEmpr"]));
                $stm->bindParam(':n6', htmlspecialchars($_POST["tipoEmpr"]));
                $stm->bindParam(':n7', htmlspecialchars($_POST["estadoEmpr"]));
                $stm->bindParam(':n8', htmlspecialchars($_POST["direcEmpr"]));
                $stm->bindParam(':n9', htmlspecialchars(1));
                if (!$stm->execute()) {
                    throw new Exception("Error ejecutando la consulta.");
                }

                echo "Success";

            }catch (Exception $e){
                echo $e->getMessage();
            }
        }

        if ($action == "checkNameEmpr"){

        }

        if ($action == "selectEmprList"){
            try{
                $selectedTE = $_POST['selectedTE'];

                $query = "SELECT id, abreviatura_empresa, nombre_empresa FROM proyecto_mapeo_asocios_listado_empresas WHERE habilitada = 1 AND tipo_empresa = :selectedTE";
                $stm = $connection->prepare($query);
                $stm->bindParam(':selectedTE', $selectedTE);
                $stm->execute(); 
                $dataEmprList = $stm->fetchAll(PDO::FETCH_ASSOC);

                if(count($dataEmprList) != 0){
                    echo <<<HTML
                        <option selected disabled hidden>Selecciona una opción...</option>
                    HTML;

                    foreach ($dataEmprList as $dataEmpr) {
                        echo generateEmprSelectList($dataEmpr);
                    }
                }else{
                    echo <<<HTML
                        <option selected disabled hidden>Todavía no hay opciones...</option>
                    HTML;
                }
            }catch(Exception $e){
                echo "Error: " . $e->getMessage();
            }
        }

        if ($action == "editEmpr"){
            try{
                $selectedId = $_POST['selectedId'];

                $query = "UPDATE proyecto_mapeo_asocios_listado_empresas 
                SET abreviatura_empresa = :n1,
                    nombre_empresa = :n2,
                    codigo_donante = :n3,
                    tipo_cooperacion = :n4,
                    tipo_relacion = :n5,
                    tipo_empresa = :n6,
                    estado = :n7,
                    direccion = :n8,
                    fecha_modificacion = CURRENT_TIMESTAMP
                WHERE id = :selectedId";
                $insert = $connection->prepare($query);
                $insert->bindParam(':n1', htmlspecialchars($_POST['editAbvrEmpr']));
                $insert->bindParam(':n2', htmlspecialchars($_POST['editNomEmpr']));
                $insert->bindParam(':n3', htmlspecialchars($_POST['editCodeDonanteEmpr']));
                $insert->bindParam(':n4', htmlspecialchars($_POST['editTipoCoopEmpr']));
                $insert->bindParam(':n5', htmlspecialchars($_POST['editTipoRelEmpr']));
                $insert->bindParam(':n6', htmlspecialchars($_POST['editTipoEmpr']));
                $insert->bindParam(':n7', htmlspecialchars($_POST['editEstadoEmpr']));
                $insert->bindParam(':n8', htmlspecialchars($_POST['editDirecEmpr']));
                $insert->bindParam(':selectedId', $selectedId);
                $insert->execute();
                //echo true;
                echo "Actualizado con éxito";

            }catch(Exception $e){
                echo $e->getMessage();
            }
        }

        if ($action == "deleteEmpr"){
            try{
                $selectedId = $_POST['selectedId'];
                $query = "UPDATE proyecto_mapeo_asocios_listado_empresas AS empr LEFT JOIN proyecto_mapeo_asocios_listado_convenios AS conv ON empr.id = conv.id_empresa
                SET empr.habilitada = 0,
                    conv.habilitada = 0
                WHERE empr.id = :selectedId OR conv.id_empresa = :selectedId";
                $stm = $connection->prepare($query);
                $stm->bindParam(':selectedId', $selectedId);
                $stm->execute();
                
                echo "Success";
            }catch(Exception $e){
                error_log($e->getMessage());
            }
        }

        if($action == "searchEmpr"){
            $toSearchName = '%'.$_POST['toSearchName'].'%';

            $query = "SELECT id, nombre_empresa, codigo_donante, estado FROM proyecto_mapeo_asocios_listado_empresas WHERE nombre_empresa LIKE :toSearchName AND habilitada = 1";
            $stm = $connection->prepare($query);
            $stm->bindParam(':toSearchName', $toSearchName);
            $stm->execute(); 
            $dataEmprList = $stm->fetchAll(PDO::FETCH_ASSOC);

            if(count($dataEmprList) != 0){
                $i = 0;
                foreach ($dataEmprList as $dataEmpr) {
                    echo generateEmprList($dataEmpr, ++$i);
                }
            }else{
                echo <<<HTML
                    <div class="emptyCase text-muted text-center my-5">
                        <h3 class="bi bi-building-x fs-1 "></h3>
                        <h4>No se han encontrado resultados...</h4>
                    </div>
                HTML;
            }
        }
    }

    if( $group == "gestionConvenios" ){
        // === Consultar el listado completo de convenios ===
        if ($action == "showDataListConv"){
            try{
                $convenioStatus = $_POST['convenioStatus'];
                $query = "SELECT conv.id, conv.sede, conv.situacion_actual, empr.nombre_empresa AS nombre_empresa FROM proyecto_mapeo_asocios_listado_convenios AS conv 
                            JOIN proyecto_mapeo_asocios_listado_empresas AS empr ON conv.id_empresa = empr.id WHERE conv.respaldo_convenio = :convenioStatus AND conv.habilitada = 1";
                $stm = $connection->prepare($query);
                $stm->bindParam(':convenioStatus', $convenioStatus);
                $stm->execute(); 
                $empresaDataList = $stm->fetchAll(PDO::FETCH_ASSOC);

                if(count($empresaDataList) != 0){
                    $i = 0;
                    foreach ($empresaDataList as $empresaData) {
                        echo generateConvList($empresaData, ++$i);
                    }
                }else{
                    echo <<<HTML
                        <div class="emptyCase text-muted text-center my-5">
                            <h3 class="bi bi-journal-x fs-1 "></h3>
                            <h4>Todavía no se encuentran registros disponibles...</h4>
                        </div>
                    HTML;
                }

            }catch(Exception $e){
                error_log($e->getMessage());
            }
        }

        // === Consultando detalles de un convenio ===
        if ($action == "getDetailsConv"){
            try{
                $selectedId = $_POST['selectedId'];

                $query = "SELECT conv.*, empr.tipo_empresa FROM proyecto_mapeo_asocios_listado_convenios AS conv
                        JOIN proyecto_mapeo_asocios_listado_empresas AS empr ON conv.id_empresa = empr.id WHERE conv.id = :selectedId;";
                $stm = $connection->prepare($query);
                $stm->bindParam(':selectedId', $selectedId, PDO::PARAM_INT);
                $stm->execute();

                $collectedData = $stm->fetch(PDO::FETCH_ASSOC);

                echo json_encode($collectedData);

            }catch(Exception $e){
                echo $e->getMessage();
            }
        }

        // === Agregando una convenio ===
        if ($action == "addConv") { 
            try{

                $query = "INSERT INTO proyecto_mapeo_asocios_listado_convenios  
                VALUES(NULL, :n1, :n2, :n3, :n4, :n5, :n6, :n7, :n8, :n9, :n10, :n11, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, :n12, :n13)";
                $stm = $connection->prepare($query);
                $stm->bindParam(':n1', htmlspecialchars($_POST["empresaConv"]));
                $stm->bindParam(':n2', htmlspecialchars($_POST["sedeConv"]));
                $stm->bindParam(':n3', htmlspecialchars($_POST["nombContactoConv"]));
                $stm->bindParam(':n4', htmlspecialchars($_POST["numContactoConv"]));
                $stm->bindParam(':n5', htmlspecialchars($_POST["emailConv"]));
                $stm->bindParam(':n6', htmlspecialchars($_POST["situacionActConv"]));
                $stm->bindParam(':n7', htmlspecialchars($_POST["fechaInicioConv"]));
                $stm->bindParam(':n8', htmlspecialchars($_POST["fechaFinConv"]));
                $stm->bindParam(':n9', htmlspecialchars($_POST["tipoConv"]));
                $stm->bindParam(':n10', htmlspecialchars($_POST["descConv"]));
                $respaldoConv = isset($_POST['respaldoConv']) && $_POST['respaldoConv'] == 'true' ? 1 : 0;
                $stm->bindParam(':n11', $respaldoConv);
                $stm->bindParam(':n12', htmlspecialchars(1));
                $stm->bindParam(':n13', htmlspecialchars(0));
                $stm->execute();

                echo "Se ha registrado el convenio con éxito";
            
            }catch(Exception $e)
            {
                error_log($e->getMessage());
                echo $e->getMessage();
            }
        }

        // === Comprobación para nombre único ===
        if ($action == "checkNameConv"){
            try{
                $toCheckName = $_POST['nombre_empresa'];
                $formType = $_POST['formType'];

                if($formType == "addForm"){
                    $query = "SELECT * FROM proyecto_mapeo_asocios_listado_convenios WHERE nombre_empresa LIKE :toCheckName";
                }else if($formType == "editForm"){
                    $selectedId = $_POST['empresaId'];

                    $query = "SELECT * FROM proyecto_mapeo_asocios_listado_convenios WHERE nombre_empresa LIKE :toCheckName AND WHERE id NOT IN :selectedId";
                }
                
                $stm = $connection->prepare($query);
                $stm->bindParam(':toCheckName', $toCheckName);
                if($formType == "editForm"){ $stm->bindParam(':selectedId', $selectedId); }
                $stm->execute();
                $rowCount = $stm->rowCount();

                // Enviar la respuesta como un objeto JSON con la propiedad 'valid'
                echo json_encode(['valid' => $rowCount == 0]);

            }catch (Exception $e){
                error_log($e->getMessage());
                // Enviar la respuesta como un objeto JSON con la propiedad 'valid'
                echo json_encode(['valid' => false]);
            }
        }

        // === Actualizando datos de una empresa ===
        if ($action == "editConv"){
            try{
                $selectedId = $_POST['selectedId'];

                $query = "UPDATE proyecto_mapeo_asocios_listado_convenios 
                SET id_empresa = :n1,
                    sede = :n2,
                    nombre_contacto = :n3,
                    numero_contacto = :n4,
                    correo_electronico = :n5,
                    situacion_actual = :n6,
                    fecha_inicio = :n7,
                    fecha_finalizacion = :n8,
                    tipo_convenio = :n9,
                    convenio = :n10,
                    respaldo_convenio = :n11,
                    fecha_edicion = CURRENT_TIMESTAMP
                WHERE id = :selectedId";
                $insert = $connection->prepare($query);
                $insert->bindParam(':n1', htmlspecialchars($_POST['editEmpresaConv']));
                $insert->bindParam(':n2', htmlspecialchars($_POST['editSedeConv']));
                $insert->bindParam(':n3', htmlspecialchars($_POST['editNombContactoConv']));
                $insert->bindParam(':n4', htmlspecialchars($_POST['editNumContactoConv']));
                $insert->bindParam(':n5', htmlspecialchars($_POST['editEmailConv']));
                $insert->bindParam(':n6', htmlspecialchars($_POST['editSituacionActConv']));
                $insert->bindParam(':n7', htmlspecialchars($_POST['editFechaInicioConv']));
                $insert->bindParam(':n8', htmlspecialchars($_POST['editFechaFinConv']));
                $insert->bindParam(':n9', htmlspecialchars($_POST['editTipoConv']));
                $insert->bindParam(':n10', htmlspecialchars($_POST['editDescConv']));
                $respaldo_convenio = isset($_POST['editRespaldoConv']) && $_POST['editRespaldoConv'] == 'true' ? 1 : 0;
                $insert->bindParam(':n11', $respaldo_convenio);
                $insert->bindParam(':selectedId', $selectedId);
                $insert->execute();
                //echo true;
                echo "Actualizado con éxito";

            }catch(Exception $e){
                echo $e->getMessage();
            }
        }

        // === Deshabilitando una empresa ===
        if ($action == "deleteConv"){
            try{
                $selectedId = $_POST['selectedId'];

                $query = "UPDATE proyecto_mapeo_asocios_listado_convenios SET habilitada = 0 WHERE id = :selectedId";
                $stm = $connection->prepare($query);
                $stm->bindParam(':selectedId', $selectedId, PDO::PARAM_INT);
                $stm->execute();

                echo $selectedId;

            }catch(Exception $e){
                echo $e->getMessage();
            }
        }

        // === Guardando archivo para el respaldo digital ===
        if($action == "saveFileConv"){
            try{
                $selectedId = $_POST['empresaId'];

                $path = "../storage/evidenciaFiles/"; $extensionFile = strtolower(pathinfo($_FILES['addFile']['name'], PATHINFO_EXTENSION));
                $newFileName = uniqid('MA_', false).".".$extensionFile;

                if(move_uploaded_file($_FILES['addFile']['tmp_name'], $path.$newFileName)){
                    $queryFile = 'INSERT INTO proyecto_mapeo_asocios_archivos_evidencia VALUES(NULL, :n1, :n2, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, :n4)';
                    $stmFile = $connection->prepare($queryFile);
                    $stmFile->bindParam(':n1', $newFileName);
                    $stmFile->bindParam(':n2', $path);
                    $stmFile->bindParam(':n3',  $selectedId, PDO::PARAM_INT);
                    $stmFile->execute();
                    
                    $queryUpdate = 'UPDATE proyecto_mapeo_asocios_listado_convenios SET estado_evidencia = 1 WHERE id = :selectedId';
                    $stmUpdate = $connection->prepare($queryUpdate);
                    $stmUpdate->bindParam(':selectedId', $selectedId, PDO::PARAM_INT);
                    $stmUpdate->execute();
        
                    echo 'Success';
                }
                echo 'Hmm';

            }catch(Exception $e){
                echo $e->getMessage();
            }
        }

        // === Busqueda de convenios ===
        if ($action == "searchConv"){
            try{
                $toSearchName = '%'.$_POST['toSearchName'].'%';
                $convStatus = $_POST['convStatus'];

                $query = "SELECT conv.*, empr.nombre_empresa FROM proyecto_mapeo_asocios_listado_convenios AS conv INNER JOIN proyecto_mapeo_asocios_listado_empresas AS empr ON conv.id_empresa = empr.id
                WHERE empr.nombre_empresa LIKE :toSearchName AND conv.respaldo_convenio = :convStatus AND conv.habilitada = 1";
                $stm = $connection->prepare($query);
                $stm->bindParam(':toSearchName', $toSearchName);
                $stm->bindParam(':convStatus', $convStatus);
                $stm->execute();

                $empresaDataList = $stm->fetchAll(PDO::FETCH_ASSOC);
                if(count($empresaDataList) != 0){
                    $i = 0;
                    foreach ($empresaDataList as $empresaData) {
                        echo generateConvList($empresaData, ++$i);
                    }
                }else{
                    echo <<<HTML
                        <div class="emptyCase text-muted text-center my-5">
                            <h3 class="bi bi-building-x fs-1 "></h3>
                            <h4>No se han encontrado resultados...</h4>
                        </div>
                    HTML;
                }
            }catch(Exception $e){
                error_log($e->getMessage());
            }
        }
    }

    // Función para generar el listados
        // ::: TIPO DE EMPRESA :::
        function generateTEList($dataTE, $i){
            return <<<HTML
                <section class="row-cont">
                    <div>{$i}</div>
                    <div>{$dataTE['nombre_tipo_empresa']}</div>
                    <div>{$dataTE['descripcion_tipo']}</div>
                    <div class="actions-cont p-2">
                        <button value="{$dataTE['id']}" type="button" class="btn editToggleTE" data-bs-toggle="modal" data-bs-target="#modalEditTE">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <button value="{$dataTE['id']}" type="button" class="btn deleteToggleTE" data-bs-toggle="modal" data-bs-target="#modalDeleteTE">
                            <i class="bi bi-trash3"></i>
                        </button>
                    </div>
                </section>
            HTML;
        }

        function generateTESelectList($dataTE){
            return <<<HTML
                <option value="{$dataTE['id']}">{$dataTE['nombre_tipo_empresa']}</option> 
            HTML;
        }

        // ::: LISTADO EMPRESAS :::
        function generateEmprList($dataEmpr, $i){
            return <<<HTML
                <section class="row-cont">
                    <div>{$i}</div>
                    <div>{$dataEmpr['nombre_empresa']}</div>
                    <div>{$dataEmpr['codigo_donante']}</div>
                    <div>{$dataEmpr['estado']}</div>
                    <div class="actions-cont p-2">
                        <button value="{$dataEmpr['id']}" type="button" class="btn detailsToggleEmpr" data-bs-toggle="modal" data-bs-target="#modalDetailsEmpr">
                            <i class="bi bi-eyeglasses"></i>
                        </button>
                        <button value="{$dataEmpr['id']}" type="button" class="btn editToggleEmpr" data-bs-toggle="modal" data-bs-target="#modalEditEmpr">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <button value="{$dataEmpr['id']}" type="button" class="btn deleteToggleEmpr" data-bs-toggle="modal" data-bs-target="#modalDeleteEmpr">
                            <i class="bi bi-trash3"></i>
                        </button>
                    </div>
                </section>
            HTML;
        }

        function generateEmprSelectList($dataEmpr){
            return <<<HTML
                <option value="{$dataEmpr['id']}">{$dataEmpr['abreviatura_empresa']} | {$dataEmpr['nombre_empresa']}</option> 
            HTML;
        }

        // ::: CONVENIO :::
        function generateConvList($empresaData, $i){
            return <<<HTML
            <section class="row-cont">
                <div>{$i}</div>
                <div>{$empresaData['nombre_empresa']}</div>
                <div>{$empresaData['sede']}</div>
                <div>{$empresaData['situacion_actual']}</div>
                <div class="actions-cont p-2">
                    <button value="{$empresaData['id']}" type="button" class="btn detailsToggleConv" data-bs-toggle="modal" data-bs-target="#modalDetailsConv">
                        <i class="bi bi-eyeglasses"></i>
                    </button>
                    <button value="{$empresaData['id']}" type="button" class="btn editToggleConv" data-bs-toggle="modal" data-bs-target="#modalEditConv">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                    <!-- <button value="{$empresaData['id']}" type="button" class="btn importToggle" data-bs-toggle="modal" data-bs-target="#modalImport">
                        <i class="bi bi-cloud-upload"></i>
                    </button> -->
                    <button value="{$empresaData['id']}" type="button" class="btn deleteToggleConv" data-bs-toggle="modal" data-bs-target="#modalDeleteConv">
                        <i class="bi bi-trash3"></i>
                    </button>
                </div>
            </section>
        HTML;
        }
?>