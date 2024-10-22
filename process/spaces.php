<?php

    if($action == "addBinnacle"){

        try {
            $query = "INSERT INTO spaces_binnacle VALUES (NULL, :n1, :n2)";
            $add = $net_rrhh->prepare($query);
            $add->bindParam(":n1", $_REQUEST["num"]);
            $add->bindParam(":n2", $_REQUEST["type"]);
            $add->execute();

            $lastID = $net_rrhh->lastInsertId();

            if ($lastID != 0) {
                $query = "INSERT INTO spaces VALUES (NULL, :n1, NULL, NULL, NULL, NULL, NULL, NULL, 0, :n2,:n3)";
                $add = $net_rrhh->prepare($query);
                $add->bindParam(":n1", $_REQUEST["name"]);
                $add->bindParam(":n2", $lastID);
                $add->bindParam(":n3", $_REQUEST["idAreaEmpleado"]);
                $add->execute();
    
                foreach($add->errorInfo() as $error)
                $mensaje .= $error;
            
                echo $mensaje;

            }else{
                echo "RError: Error al generar la bitácora.";
            }

        } catch (Exception $e) {
            echo "RError: ".$e->getMessage();
        }

    }elseif ($action == "addResponsible") {
        
        try {
            $query = "INSERT INTO spaces_responsibles VALUES (NULL, :n1, :n2)";
            $add = $net_rrhh->prepare($query);
            $add->bindParam(":n1", $_REQUEST["ide"]);
            $add->bindParam(":n2", $_REQUEST["ids"]);
            $add->execute();

            foreach($add->errorInfo() as $error)
                $mensaje .= $error;
            
            echo $mensaje;

        } catch (Exception $e) {
            echo "RError: ".$e->getMessage();
        }

    }elseif ($action == "addParticipant") {
        
        try {
            $query = "INSERT INTO spaces_participants VALUES (NULL, :n1, :n2)";
            $add = $net_rrhh->prepare($query);
            $add->bindParam(":n1", $_REQUEST["ide"]);
            $add->bindParam(":n2", $_REQUEST["ids"]);
            $add->execute();

            foreach($add->errorInfo() as $error)
                $mensaje .= $error;
            
            echo $mensaje;

        } catch (Exception $e) {
            echo "RError: ".$e->getMessage();
        }

    }elseif ($action == "deleteParticipant") {
        
        try {
            $query = "DELETE FROM `spaces_participants` WHERE id = :id";
            $delete = $net_rrhh->prepare($query);
            $delete->bindParam(":id", $_REQUEST["id"]);
            $delete->execute();

            foreach($delete->errorInfo() as $error)
                $mensaje .= $error;
            
            echo $mensaje;

        } catch (Exception $e) {
            echo "RError: ".$e->getMessage();
        }

    }elseif ($action == "deleteResponsible") {
        
        try {
            $query = "DELETE FROM `spaces_responsibles` WHERE id = :id";
            $delete = $net_rrhh->prepare($query);
            $delete->bindParam(":id", $_REQUEST["id"]);
            $delete->execute();

            foreach($delete->errorInfo() as $error)
                $mensaje .= $error;
            
            echo $mensaje;

        } catch (Exception $e) {
            echo "RError: ".$e->getMessage();
        }

    }elseif ($action == "updateSpace") {
        
        try {
            $status = 1;

            $query = "UPDATE spaces as s SET
                        s.name = :n1,
                        s.representative = :n2,
                        s.date = :n3,
                        s.place = :n4,
                        s.timeFrom = :n5,
                        s.timeTo = :n6,
                        s.guest = :n7,
                        s.status = :n8
                        WHERE s.id = :id";
            $update = $net_rrhh->prepare($query);
            $update->bindParam(":n1", $_REQUEST["txtName"]);
            $update->bindParam(":n2", $_REQUEST["txtRepresentative"]);
            $update->bindParam(":n3", $_REQUEST["txtDate"]);
            $update->bindParam(":n4", $_REQUEST["txtPlace"]);
            $update->bindParam(":n5", $_REQUEST["txtTimeFrom"]);
            $update->bindParam(":n6", $_REQUEST["txtTimeTo"]);
            $update->bindParam(":n7", $_REQUEST["txtGuests"]);
            $update->bindParam(":n8", $status);
            $update->bindParam(":id", $_REQUEST["ids"]);
            $update->execute();

            foreach($update->errorInfo() as $error)
                $mensaje .= $error;
            
            echo $mensaje;
            redirection("/?view=spaces");

        } catch (Exception $e) {
            echo "RError: ".$e->getMessage();
        }
        
    }elseif ($action == "addSpaceDetail") {
        
        try {
            $status = 1;
            $agenda = "";

            if($_REQUEST["rbAgenda"] == "Archivo"){

                $tamano = $_FILES["txtAgendaFile"]['size'];
                $tipo = $_FILES["txtAgendaFile"]['type'];
                $archivo = $_FILES["txtAgendaFile"]['name'];
                $prefijo = substr(md5(uniqid(rand())),0,4);     
                $archivo_info = pathinfo($_FILES['txtAgendaFile']['name']);          
    
                if ($archivo != "") 
                {
                    $namefile = $prefijo."_".$archivo;
                    $destino =  $_SERVER['DOCUMENT_ROOT']."/process/documents/$namefile";
                    if (copy($_FILES['txtAgendaFile']['tmp_name'], $destino)) 
                    {       
                        $agenda = $namefile;
                    } 
                    else             
                        echo "Error al subir el archivo. Vuelva a intentarlo";            
                } 
            }else{
                $agenda = $_REQUEST["txtAgenda"];
            }

            $query = "INSERT INTO spaces_details VALUES (NULL, :n1, :n2, :n3, :n4, :n5, :n6, :n7, :n8, :n9);";
            $add = $net_rrhh->prepare($query);
            $add->bindParam(":n1", $_REQUEST["txtObjetive"]);
            $add->bindParam(":n2", $_REQUEST["rbAgenda"]);
            $add->bindParam(":n3", $agenda);
            $add->bindParam(":n4", $_REQUEST["txtTopics"]);
            $add->bindParam(":n5", $_REQUEST["txtAgreements"]);
            $add->bindParam(":n6", $_REQUEST["txtCommitments"]);
            $add->bindParam(":n7", $_REQUEST["txtComments"]);
            $add->bindParam(":n8", $status);
            $add->bindParam(":n9", $_REQUEST["ids"]);
            $add->execute();

            foreach($add->errorInfo() as $error)
                $mensaje .= $error;
            
            echo $mensaje;
            redirection("/?view=spaces");

        } catch (Exception $e) {
            echo "RError: ".$e->getMessage();
        }
        
    }elseif ($action == "addPicture") {
        
        try {
            $tamano = $_FILES["img"]['size'];
            $tipo = $_FILES["img"]['type'];
            $archivo = $_FILES["img"]['name'];
            $prefijo = substr(md5(uniqid(rand())),0,4);  
            $imgSave = "";             

            if ($archivo != "") 
            {
                $namefile = $prefijo."_".str_replace(" ", "_", $archivo);
                $destino =  $_SERVER['DOCUMENT_ROOT']."/process/documents/$namefile";
                if (copy($_FILES['img']['tmp_name'], $destino)) 
                { 
                    $imgSave = $namefile;
                }
            }

            $query = "INSERT INTO spaces_pictures VALUES (NULL, :n1, :n2, :n3)";
            $add = $net_rrhh->prepare($query);
            $add->bindParam(":n1", $imgSave);
            $add->bindParam(":n2", $_REQUEST["detail"]);
            $add->bindParam(":n3", $_REQUEST["ids"]);
            $add->execute();

            foreach($add->errorInfo() as $error)
                $mensaje .= $error;
            
            echo $mensaje;
        } catch (Exception $e) {
            echo "RError: ".$e->getMessage();
        }

    }elseif ($action == "deletePicture") {
        
        try {
            $query = "DELETE FROM `spaces_pictures` WHERE id = :id";
            $delete = $net_rrhh->prepare($query);
            $delete->bindParam(":id", $_REQUEST["id"]);
            $delete->execute();

            foreach($delete->errorInfo() as $error)
                $mensaje .= $error;
            
            echo $mensaje;

        } catch (Exception $e) {
            echo "RError: ".$e->getMessage();
        }

    }elseif ($action == "addSpaceEvidences") {
        
        try {
            $tamano = $_FILES["txtInvitationFile"]['size'];
            $tipo = $_FILES["txtInvitationFile"]['type'];
            $archivo = $_FILES["txtInvitationFile"]['name'];
            $prefijo = substr(md5(uniqid(rand())),0,4);  
            $invitation = "";             

            if ($archivo != "") 
            {
                $namefile = $prefijo."_".str_replace(" ", "_", $archivo);
                $destino =  $_SERVER['DOCUMENT_ROOT']."/process/documents/$namefile";
                if (copy($_FILES['txtInvitationFile']['tmp_name'], $destino)) 
                { 
                    $invitation = $namefile;
                }else{
                    $invitation = "";
                }
            }

            $tamano = $_FILES["txtDocumentFile"]['size'];
            $tipo = $_FILES["txtDocumentFile"]['type'];
            $archivo = $_FILES["txtDocumentFile"]['name'];
            $prefijo = substr(md5(uniqid(rand())),0,4);  
            $document = "";             

            if ($archivo != "") 
            {
                $namefile = $prefijo."_".str_replace(" ", "_", $archivo);
                $destino =  $_SERVER['DOCUMENT_ROOT']."/process/documents/$namefile";
                if (copy($_FILES['txtDocumentFile']['tmp_name'], $destino)) 
                { 
                    $document = $namefile;
                }else{
                    $document = "";
                }
            }

            $query = "INSERT INTO spaces_evidences VALUES (NULL, :n1, :n2, :n3, :n4, :n5)";
            $add = $net_rrhh->prepare($query);
            $add->bindParam(":n1", $_REQUEST["txtInvitation"]);
            $add->bindParam(":n2", $invitation);
            $add->bindParam(":n3", $_REQUEST["txtDocument"]);
            $add->bindParam(":n4", $document);
            $add->bindParam(":n5", $_REQUEST["ids"]);
            $add->execute();

            foreach($add->errorInfo() as $error)
                $mensaje .= $error;
            
            echo $mensaje;
            redirection("/?view=spaces");

        } catch (Exception $e) {
            echo "RError: ".$e->getMessage();
        }

    }elseif ($action == "addSpace") {
        
        try {
            $query = "INSERT INTO spaces VALUES (NULL, :n1, NULL, NULL, NULL, NULL, NULL, NULL, 0, :n2)";
            $add = $net_rrhh->prepare($query);
            $add->bindParam(":n1", $_REQUEST["name"]);
            $add->bindParam(":n2", $_REQUEST["idb"]);
            $add->execute();

            foreach($add->errorInfo() as $error)
            $mensaje .= $error;
        
            echo $mensaje;

        } catch (Exception $e) {
            echo "RError: ".$e->getMessage();
        }
        
    }
