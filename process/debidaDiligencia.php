<?php include("../view/Operaciones/AdministracionFinanciera/DebidaDiligencia/config/net.php");

/* ::::::::::::::::::::::::::::: USUARIOS ::::::::::::::::::::::::::::: */

    if ($action == "addUsers") {
        
        $query = "INSERT INTO fus__dd_users (id, user, password, rol, status, dtc) VALUES (NULL, :n1, MD5(:n2), :n3, 0, CURRENT_TIMESTAMP())";
        $insert = $net->prepare($query);
        $insert->bindParam(':n1', $_REQUEST["username"]);
        $insert->bindParam(':n2', $_REQUEST["password"]);
        $insert->bindParam(':n3', $_REQUEST["rol"]);
        $insert->execute();

        if (verificarerrores($insert) == "ok") {
            echo "ok";
        }else{
            echo verificarerrores($insert);
        }
        
    }elseif ($action == "updateUsers") {

        $query = "UPDATE fus__dd_users as u SET 
                    u.user = :n1,
                    u.rol = :n2
                    WHERE u.id = :id";
        $update = $net->prepare($query);
        $update->bindParam(':n1', $_REQUEST["username"]);
        $update->bindParam(':n2', $_REQUEST["rol"]);
        $update->bindParam(':id', $_REQUEST["id"]);
        $update->execute();

        if (verificarerrores($update) == "ok") {
            echo "ok";
        }else{
            echo verificarerrores($update);
        }
        
    }elseif ($action == "updateUsersPassword") {

        $query = "UPDATE fus__dd_users as u SET 
                    u.password = MD5(:n1)
                    WHERE u.id = :id";
        $update = $net->prepare($query);
        $update->bindParam(':n1', $_REQUEST["password"]);
        $update->bindParam(':id', $_REQUEST["id"]);
        $update->execute();

        if (verificarerrores($update) == "ok") {
            echo "ok";
        }else{
            echo verificarerrores($update);
        }

    }elseif ($action == "changeStatusUsers") {

        $query = "UPDATE fus__dd_users as u SET 
                    u.status = :n1
                    WHERE u.id = :id";
        $update = $net->prepare($query);
        $update->bindParam(':n1', $_REQUEST["status"]);
        $update->bindParam(':id', $_REQUEST["id"]);
        $update->execute();

        if (verificarerrores($update) == "ok") {
            echo "ok";
        }else{
            echo verificarerrores($update);
        }

    }

    /* ::::::::::::::::::::::::::::: ASIGNACIONES ::::::::::::::::::::::::::::: */

    elseif ($action == "addAssignment") {

        $db = "";
        switch ($_REQUEST["form"]) {
            case 'supplier': $db = "fus__dd_supplier"; break;   
            case 'customer natural': $db = "fus__dd_customer"; break;   
            case 'customer legal': $db = "fus__dd_customer_2"; break;   
            case 'consultant': $db = "fus__dd_consultant"; break;   
            case 'founders': $db = "fus__dd_founders"; break;   
            case 'employee': $db = "fus__dd_employee"; break;   
            case 'boardDirectors': $db = "fus__dd_board_directors"; break;   
        }

        $query = "INSERT INTO $db (id, formversion, status, idUser, dtc) VALUES (NULL, 1, 0, :id, CURRENT_TIMESTAMP());";
        $insert = $net->prepare($query);
        $insert->bindParam(":id", $_REQUEST["idUser"]);
        $insert->execute();

        if (verificarerrores($insert) == "ok") {

            $idf = $net->lastInsertId();

            $query = "INSERT INTO fus__dd_assignation_form VALUES (NULL, :idu, :idf, :n1, CURRENT_TIMESTAMP());";
            $assignation = $net->prepare($query);
            $assignation->bindParam(":idu", $_REQUEST["idUser"]);
            $assignation->bindParam(":idf", $idf);
            $assignation->bindParam(":n1", $_REQUEST["form"]);
            $assignation->execute();

            if (verificarerrores($assignation) == "ok") {
                echo "ok";
            }else{
                echo verificarerrores($assignation);
            }

        }else{
            echo verificarerrores($insert);
        }

    }elseif ($action == "deleteAssignments") {
    
        $query = "DELETE FROM fus__dd_assignation_form WHERE id = :id";
        $delete = $net->prepare($query);
        $delete->bindParam(":id", $_REQUEST["ida"]);
        $delete->execute();

        if (verificarerrores($delete) == "ok") {
            echo "ok";
        }else{
            echo verificarerrores($delete);
        }
    }

    /* ::::::::::::::::::::::::::::: ACCESOS ::::::::::::::::::::::::::::: */

    elseif ($action == "addAccessModule") {
        
        $query = "INSERT INTO debida_diligencia_access VALUES (NULL, :n1, :n2, 0, CURRENT_TIMESTAMP());";
        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(":n1", $_REQUEST["idp"]);
        $insert->bindParam(":n2", $_REQUEST["rol"]);
        $insert->execute();

        if (verificarerrores($insert) == "ok") {
        
            $query = "SELECT u.id, u.username, u.password, p.position FROM `workarea_positions` as p 
                        INNER JOIN workarea_positions_assignment as wpa ON wpa.idposition = p.id
                        INNER JOIN users as u ON u.id = wpa.idemployee
                        WHERE wpa.enddate = '0000-00-00' AND p.id = :idp";
            $user = $net_rrhh->prepare($query);
            $user->bindParam(':idp', $_REQUEST["idp"]);
            $user->execute();
            $dataU = $user->fetch();

            $query = "SELECT * FROM fus__dd_siif_access WHERE idUser = ". $_REQUEST["idp"];
            $validation = $net->prepare($query);
            $validation->execute();

            if ($validation->rowCount() > 0) {
                echo "ok";
            }else{

                $query = "INSERT INTO fus__dd_siif_access VALUES (NULL, :n1, :n2, 0);";
                $insert = $net->prepare($query);
                $insert->bindParam(":n1", $dataU[0]);
                $insert->bindParam(":n2", $dataU[2]);
                $insert->execute();
    
                if (verificarerrores($insert) == "ok") {
                    echo "ok";
                }else{
                    echo verificarerrores($insert);
                }
            }

        }else{
            echo verificarerrores($insert);
        }

    }elseif ($action == "changeStatusAccessModule") {
        
        $status = ($_REQUEST["status"] == 0) ? 1 : 0;
        $query = "UPDATE debida_diligencia_access as a SET
                    a.status = :n1
                    WHERE a.id = :id";

        $update = $net_rrhh->prepare($query);
        $update->bindParam(":n1", $status);
        $update->bindParam(":id", $_REQUEST["ida"]);
        $update->execute();

        if (verificarerrores($update) == "ok") {
            echo "ok";

        }else{
            echo verificarerrores($update);
        }

    }elseif ($action == "changeStatusAccessForms") {
        
        $status = ($_REQUEST["status"] == 0) ? 1 : 0;
        $query = "UPDATE fus__dd_siif_access as a SET
                    a.status = :n1
                    WHERE a.id = :id";

        $update = $net->prepare($query);
        $update->bindParam(":n1", $status);
        $update->bindParam(":id", $_REQUEST["ida"]);
        $update->execute();

        if (verificarerrores($update) == "ok") {
            echo "ok";
        }else{
            echo verificarerrores($update);
        } 

    }

    /* ::::::::::::::::::::::::::::: FORMULARIOS ::::::::::::::::::::::::::::: */

    elseif ($action == "refuseForm") {
        
        $query = "INSERT INTO fus__dd_forms_refused VALUES (NULL, :n1, :n2, :n3, CURRENT_TIMESTAMP())";
        $insert = $net->prepare($query);
        $insert->bindParam(":n1", $_REQUEST["reason"]);
        $insert->bindParam(":n2", $_REQUEST["idf"]);
        $insert->bindParam(":n3", $_REQUEST["formType"]);
        $insert->execute();

        if (verificarerrores($insert) == "ok") {

            $db = "";
            switch ($_REQUEST["formType"]) {
                case 'supplier': $db = "fus__dd_supplier"; break;   
                case 'customer natural': $db = "fus__dd_customer"; break;   
                case 'customer legal': $db = "fus__dd_customer_2"; break;   
                case 'consultant': $db = "fus__dd_consultant"; break;   
                case 'founders': $db = "fus__dd_founders"; break;   
                case 'employee': $db = "fus__dd_employee"; break;   
                case 'boardDirectors': $db = "fus__dd_board_directors"; break;   
            }

            $query = "UPDATE $db as f SET
                        f.status = 2
                        WHERE f.id = :id";
            $update = $net->prepare($query);
            $update->bindParam(':id', $_REQUEST['idf']);
            $update->execute();

            if (verificarerrores($update) == "ok") {
                echo "ok";
            }else{
                echo verificarerrores($update);
            } 

        }else{
            echo verificarerrores($insert);
        } 

    }elseif ($action == "resendForm") {
        
        $db = "";
        switch ($_REQUEST["formType"]) {
            case 'supplier': $db = "fus__dd_supplier"; break;   
            case 'customer natural': $db = "fus__dd_customer"; break;   
            case 'customer legal': $db = "fus__dd_customer_2"; break;   
            case 'consultant': $db = "fus__dd_consultant"; break;   
            case 'founders': $db = "fus__dd_founders"; break;   
            case 'employee': $db = "fus__dd_employee"; break;   
            case 'boardDirectors': $db = "fus__dd_board_directors"; break;   
        }

        $query = "SELECT * FROM $db WHERE id = :id";
        $form = $net->prepare($query);
        $form->bindParam(':id', $_REQUEST["idf"]);
        $form->execute();

        $data = $form->fetch(PDO::FETCH_ASSOC);

        if ($data) {

            unset($data['id']);

            $columns = implode(", ", array_keys($data));
            $placeholders = ":" . implode(", :", array_keys($data));

            $query = "INSERT INTO $db ($columns) VALUES ($placeholders)";
            $insert = $net->prepare($query);

            foreach ($data as $key => $value) {
                $insert->bindValue(":$key", $value);
            }
            $insert->execute();

            if (verificarerrores($insert) == "ok") {

                $idu = $net->lastInsertId();
                $version = $data['formversion'] + 1;

                $query = "UPDATE $db as f SET
                            f.formversion = :n1,
                            f.status = 0
                            WHERE f.id = :id";
                $update = $net->prepare($query);
                $update->bindValue(":n1", $version);
                $update->bindValue(":id", $idu);
                $update->execute();

                if (verificarerrores($update) == "ok") {
                    echo "ok";
                }else{
                    echo verificarerrores($update);
                } 

                $query = "INSERT INTO fus__dd_assignation_form VALUES (NULL, :idu, :idf, :n1, CURRENT_TIMESTAMP())";
                $insert = $net->prepare($query);
                $insert->bindValue(":idu", $data['idUser']);
                $insert->bindValue(":idf", $idu);
                $insert->bindValue(":n1", $_REQUEST["formType"]);
                $insert->execute();

                if (verificarerrores($insert) == "ok") {
                    echo "ok";
                }else{
                    echo verificarerrores($insert);
                } 

            }else{
                echo verificarerrores($insert);
            }

        } else {
            echo "No se encontró el registro con ID: " . $id_to_clone;
        }

    }elseif ($action == "validate") {

        $date = date("Y-m-d");
        if (isset($_FILES["signatureImage"]) && $_FILES["signatureImage"]["error"] === UPLOAD_ERR_OK) {
            $signatureFile = $_FILES["signatureImage"]['name'];
            $prefijo = substr(md5(uniqid(rand())),0,4);               
        

            if ($signatureFile != "") {
                $namefileSignature = $prefijo."_".str_replace(" ", "_", $signatureFile);
                $destino =  $_SERVER['DOCUMENT_ROOT']."/process/signatures/$namefileSignature";
        
                // Mover el archivo subido al destino
                if (move_uploaded_file($_FILES['signatureImage']['tmp_name'], $destino)) { 

                    $query = "INSERT INTO debida_diligencia_forms_validate VALUES (NULL, :n1, :n2, :n3, :n4, :n5, CURRENT_TIMESTAMP());";
                    $insert = $net_rrhh->prepare($query);
                    $insert->bindParam(':n1', $_REQUEST["idf"]);
                    $insert->bindParam(':n2', $_REQUEST["iu"]);
                    $insert->bindParam(':n3', $namefileSignature);
                    $insert->bindParam(':n4', $_REQUEST["formType"]);
                    $insert->bindParam(':n5', $date);
                    $insert->execute();

                    if (verificarerrores($insert) == "ok") {
                        echo "ok";
                    }else{
                        echo verificarerrores($insert);
                    } 
                    
                } else {        
                    echo "Error al subir la firma...";
                }                                     
            }

        } else {
            echo "No se ha recibido la firma...";
        }
    }