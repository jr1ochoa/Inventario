<?php 

$idEmpleado =  $_SESSION['iu'];

if($action == "addproject")

{

    try{

        if($_POST['nombreProyecto']=="")

        {

            echo  false;

        }

        else

        {

            $query = "INSERT INTO monitor_proyecto 

            VALUES(Null, :n1, :n2, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, :n3, :n4,:n5)";

            $insert = $net_rrhh->prepare($query);

            $insert->bindParam(':n1', htmlspecialchars($_POST['nombreProyecto']));

            $insert->bindParam(':n2', htmlspecialchars($_POST['descripcionProyecto']));

            $insert->bindParam(':n3', htmlspecialchars(1));

            $insert->bindParam(':n4', htmlspecialchars($idEmpleado));

            $insert->bindParam(':n5', htmlspecialchars($_POST['conocidoComo']));

            $insert->execute();

            foreach ($insert->errorInfo() as $error) {

                $errorList .= "$error <br/>"; 

                }

                echo "Id Sesion".$idEmpleado;

                    echo $errorList;

        }

        

    }catch(Exception $e)

    {

        echo $e->getMessage();

    }   

}

//::::::::::: Guardar la Sesion Uno :::::::::::::::::::

else if($action == "addSesionuno")

{

    try

    {        

        //VERIFICAR SI EXISTE REGISTRO :::::::::::::

        $query = "SELECT * FROM monitor_ficha_encabezado WHERE id_proyecto_generalidades = ? ";

        $Select = $net_rrhh->prepare($query);

        $Select->execute([$_POST['idRelacion']]);

 

        if($Select->rowCount() == 0)

        {

            try

            {

                //:::::: DATOS A INGRESAR ::::::::::::

                /*

                    codigoproyecto:         $("#codigoproyecto").val(),

                    proyectoconocido:       $("#proyectoconocido").val(),

                    codigoasignado:         $("#codigoasignado").val(),

                    tipocooperante:         $("#tipocooperante").val(),

                    nombrecooperante:       $("#nombrecooperante").val(), 

                    paginaweb:              $("#paginaweb").val(), 

                    consorcio:              $("#consorcio").val(), 

                    nombreprime:            $("#nombreprime").val(),

                    aporteproyecto:         $("#aporteproyecto").val(),

                    organizacionsocia:      $("#organizacionsocia").val(),

                    nombredelaorganizacion: $("#nombredelaorganizacion").val(),

                    idRelacion : $("#idRelacionProyecto").val(),

                */

                $query2 = "INSERT INTO monitor_ficha_encabezado 

                (codigo_proyecto,proyecto_conocido_como,codigo_asignado_cooperante , tipo_cooperante, 

                nombre_cooperante,paginaweb_cooperante,consorcio,nombre_prime,aporte_al_proyecto,

                organizacion_socia,nombre_organizacion,id_proyecto_generalidades,user_creacion) 

                VALUES (:n1,:n13,:n2,:n3,:n4,:n5,:n6,:n7,:n8,:n9,:n10,:n11,:n12)";

                $insert2 = $net_rrhh->prepare($query2);

                $insert2->bindParam(':n1', htmlspecialchars($_POST['codigoproyecto']));

                $insert2->bindParam(':n13', htmlspecialchars($_POST['proyectoconocido']));

                $insert2->bindParam(':n2', htmlspecialchars($_POST['codigoasignado']));

                $insert2->bindParam(':n3', htmlspecialchars($_POST['tipocooperante']));

                $insert2->bindParam(':n4', htmlspecialchars($_POST['nombrecooperante']));

                $insert2->bindParam(':n5', htmlspecialchars($_POST['paginaweb']));

                $insert2->bindParam(':n6', htmlspecialchars($_POST['consorcio']));

                $insert2->bindParam(':n7', htmlspecialchars($_POST['nombreprime']));

                $insert2->bindParam(':n8', htmlspecialchars($_POST['aporteproyecto']));

                $insert2->bindParam(':n9', htmlspecialchars($_POST['organizacionsocia']));

                $insert2->bindParam(':n10', htmlspecialchars($_POST['nombredelaorganizacion']));

                $insert2->bindParam(':n11', htmlspecialchars($_POST['idRelacion']));

                $insert2->bindParam(':n12', htmlspecialchars($idEmpleado));

                $insert2->execute();



                foreach ($insert2->errorInfo() as $error) {

                $errorList .= "$error <br/>"; 

                }

                echo $errorList;

            }catch(Exception $e)

            {

                echo $e->getMessage();

            }

        }

        else

        {

            try{

                //:::::: DATOS A ACTUALIZAR ::::::::::::

                /*

                    codigoproyecto:         $("#codigoproyecto").val(),

                    codigoasignado:         $("#codigoasignado").val(),

                    tipocooperante:         $("#tipocooperante").val(),

                    nombrecooperante:       $("#nombrecooperante").val(), 

                    paginaweb:              $("#paginaweb").val(), 

                    consorcio:              $("#consorcio").val(), 

                    nombreprime:            $("#nombreprime").val(),

                    aporteproyecto:         $("#aporteproyecto").val(),

                    organizacionsocia:      $("#organizacionsocia").val(),

                    nombredelaorganizacion: $("#nombredelaorganizacion").val(),

                    idRelacion : $("#idRelacionProyecto").val(),

                */

                $query3 = "UPDATE  monitor_ficha_encabezado SET codigo_proyecto = ? ,proyecto_conocido_como = ?,  codigo_asignado_cooperante = ?,

                tipo_cooperante = ?,nombre_cooperante = ?,paginaweb_cooperante = ?,consorcio = ?,

                nombre_prime = ?,aporte_al_proyecto = ?,organizacion_socia = ?,nombre_organizacion = ?,

                user_creacion = ? WHERE id_proyecto_generalidades = ?";

                $data3 = $net_rrhh->prepare($query3);

                $data3->execute([$_POST['codigoproyecto'],$_POST['proyectoconocido'],$_POST['codigoasignado'],$_POST['tipocooperante'],$_POST['nombrecooperante'],$_POST['paginaweb'],

                $_POST['consorcio'],$_POST['nombreprime'],$_POST['aporteproyecto'],$_POST['organizacionsocia'],$_POST['nombredelaorganizacion'],$idEmpleado,$_POST['idRelacion']]);

                foreach ($data3->errorInfo() as $error) 

                {

                    $errorList .= "$error <br/>"; 

                }

                echo $errorList;

            }catch(Exception $e)

            {

                echo $e->getMessage();

            }

             

        }

    }

    catch(Exception $e)

    {

        echo $e->getMessage();

    } 

}

else if($action == "addSesiondos")

{

    try

    {        

        //VERIFICAR SI EXISTE REGISTRO :::::::::::::

        $query = "SELECT * FROM monitor_ficha_encabezado WHERE id_proyecto_generalidades = ? ";

        $Select = $net_rrhh->prepare($query);

        $Select->execute([$_POST['idRelacion']]);

 

        if($Select->rowCount() == 0)

        {

            try

            {

                //:::::: DATOS A INGRESAR ::::::::::::

                /*

                    otrosespecifique    :   $("#otrosespecifique").val(),

                    fhinicio            :   $("#fhinicio").val(),

                    fhcierre            :   $("#fhcierre").val(),

                    numerobeneficiario  :   $("#numerobeneficiario").val(), 

                    idRelacion          :   $("#idRelacionProyecto").val(),

                */

                $query2 = "INSERT INTO monitor_ficha_encabezado 

                (otros,fh_inicio , fh_cierre, 

                numero_beneficiarios,id_proyecto_generalidades,user_creacion) 

                VALUES (:n1,:n2,:n3,:n4,:n5,:n6)";

                $insert2 = $net_rrhh->prepare($query2);

                $insert2->bindParam(':n1', htmlspecialchars($_POST['otrosespecifique']));

                $insert2->bindParam(':n2', htmlspecialchars($_POST['fhinicio']));

                $insert2->bindParam(':n3', htmlspecialchars($_POST['fhcierre']));

                $insert2->bindParam(':n4', htmlspecialchars($_POST['numerobeneficiario']));

                $insert2->bindParam(':n5', htmlspecialchars($_POST['idRelacion']));

                $insert2->bindParam(':n6', htmlspecialchars($idEmpleado));

                $insert2->execute();



                foreach ($insert2->errorInfo() as $error) {

                $errorList .= "$error <br/>"; 

                }

                echo $errorList;



                //:::::::: ACTUALIZAR FH DE INICIO Y CIERRE ::::::::

                $query4 = "UPDATE  monitor_generalidad_proyecto SET fh_inicio = ? ,  fh_cierre = ?,

                 user_editor_id = ? 

                WHERE id = ?";

                $data4 = $net_rrhh->prepare($query4);

                $data4->execute([$_POST['fhinicio'],$_POST['fhcierre'],$idEmpleado,$_POST['idRelacion']]);

                foreach ($data4->errorInfo() as $error) 

                {

                    $errorList .= "$error <br/>"; 

                }

                echo $errorList;



            }catch(Exception $e)

            {

                echo $e->getMessage();

            }

        }

        else

        {

            try{

                //:::::: DATOS A ACTUALIZAR ::::::::::::

                /*

                    otrosespecifique    :   $("#otrosespecifique").val(),

                    fhinicio            :   $("#fhinicio").val(),

                    fhcierre            :   $("#fhcierre").val(),

                    numerobeneficiario  :   $("#numerobeneficiario").val(), 

                    idRelacion          :   $("#idRelacionProyecto").val(),

                */

                $query3 = "UPDATE  monitor_ficha_encabezado SET otros = ? ,  fh_inicio = ?,

                fh_cierre = ?,numero_beneficiarios = ?, user_creacion = ? 

                WHERE id_proyecto_generalidades = ?";

                $data3 = $net_rrhh->prepare($query3);

                $data3->execute([$_POST['otrosespecifique'],$_POST['fhinicio'],$_POST['fhcierre'],

                $_POST['numerobeneficiario'],$idEmpleado,$_POST['idRelacion']]);

                foreach ($data3->errorInfo() as $error) 

                {

                    $errorList .= "$error <br/>"; 

                }

                echo $errorList;



                //:::::::: ACTUALIZAR FH DE INICIO Y CIERRE ::::::::

                $query4 = "UPDATE  monitor_generalidad_proyecto SET fh_inicio = ? ,  fh_cierre = ?,

                 user_editor_id = ? 

                WHERE id = ?";

                $data4 = $net_rrhh->prepare($query4);

                $data4->execute([$_POST['fhinicio'],$_POST['fhcierre'],$idEmpleado,$_POST['idRelacion']]);

                foreach ($data4->errorInfo() as $error) 

                {

                    $errorList .= "$error <br/>"; 

                }

                echo $errorList;



            }catch(Exception $e)

            {

                echo $e->getMessage();

            }

             

        }

    }

    catch(Exception $e)

    {

        echo $e->getMessage();

    } 

}

else if($action == "addSesiontres")

{

    try

    {        

        //VERIFICAR SI EXISTE REGISTRO :::::::::::::

        $query = "SELECT * FROM monitor_ficha_encabezado WHERE id_proyecto_generalidades = ? ";

        $Select = $net_rrhh->prepare($query);

        $Select->execute([$_POST['idRelacion']]);

 

        if($Select->rowCount() == 0)

        {

            try

            {

                //:::::: DATOS A INGRESAR ::::::::::::

                /*

                    montodelcooperante:         $("#montodelcooperante").val(),

                    proyectopossecontrapartida:         $("#proyectopossecontrapartida").val(),

                    montocontrapartida:         $("#montocontrapartida").val(),

                    sumademontos:       $("#sumademontos").val(), 

                    idRelacion : $("#idRelacionProyecto").val(),

                */

                $query2 = "INSERT INTO monitor_ficha_encabezado 

                (monto_aportado_cooperante,proyecto_posee_contrapartida , monto_contrapartida, 

                suma_montos_total_proyectos, id_proyecto_generalidades,user_creacion) 

                VALUES (:n1,:n2,:n3,:n4,:n5,:n6)";

                $insert2 = $net_rrhh->prepare($query2);

                $insert2->bindParam(':n1', htmlspecialchars($_POST['montodelcooperante']));

                $insert2->bindParam(':n2', htmlspecialchars($_POST['proyectopossecontrapartida']));

                $insert2->bindParam(':n3', htmlspecialchars($_POST['montocontrapartida']));

                $insert2->bindParam(':n4', htmlspecialchars($_POST['sumademontos']));

                $insert2->bindParam(':n5', htmlspecialchars($_POST['idRelacion']));

                $insert2->bindParam(':n6', htmlspecialchars($idEmpleado));

                $insert2->execute();



                foreach ($insert2->errorInfo() as $error) {

                $errorList .= "$error <br/>"; 

                }

                echo $errorList;

            }catch(Exception $e)

            {

                echo $e->getMessage();

            }

        }

        else

        {

            try{

                //:::::: DATOS A ACTUALIZAR ::::::::::::

                /*

                    montodelcooperante:         $("#montodelcooperante").val(),

                    proyectopossecontrapartida:         $("#proyectopossecontrapartida").val(),

                    montocontrapartida:         $("#montocontrapartida").val(),

                    sumademontos:       $("#sumademontos").val(), 

                    idRelacion : $("#idRelacionProyecto").val(),

                */

                $query3 = "UPDATE  monitor_ficha_encabezado SET monto_aportado_cooperante = ? ,  proyecto_posee_contrapartida = ?,

                monto_contrapartida = ?,suma_montos_total_proyectos = ?, user_creacion = ? 

                WHERE id_proyecto_generalidades = ?";

                $data3 = $net_rrhh->prepare($query3);

                $data3->execute([$_POST['montodelcooperante'],$_POST['proyectopossecontrapartida'],$_POST['montocontrapartida'],

                $_POST['sumademontos'],$idEmpleado,$_POST['idRelacion']]);

                foreach ($data3->errorInfo() as $error) 

                {

                    $errorList .= "$error <br/>"; 

                }

                echo $errorList;

            }catch(Exception $e)

            {

                echo $e->getMessage();

            }

             

        }

    }

    catch(Exception $e)

    {

        echo $e->getMessage();

    } 

}
else if($action == "editarResultado")
{
    try{
        #idTextoObjetivoGeneral : $("#valorObjetivoGeneralEditar").val(),
        #idObjetivoGeneralDelete: $("#idObjetivoGeneralDelete").val()
        $query = "UPDATE  monitor_resultados SET  descripcion_resultado  = :n2 WHERE id = :n1 ";
        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['idObjetivoGeneralDelete']));
        $insert->bindParam(':n2', htmlspecialchars($_POST['idTextoObjetivoGeneral']));
        $insert->execute();
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }

            //echo "Id Sesion".$idEmpleado;
            //echo $errorList;
        echo 1;

    
    }catch(Exception $e)
    {
        echo $e->getMessage();
    } 
}
else if($action == "editarNumeroPoblacionMeta")
{
    try{
        #idTextoObjetivoGeneral : $("#valorObjetivoGeneralEditar").val(),
        #idObjetivoGeneralDelete: $("#idObjetivoGeneralDelete").val()
        #numero_poblacionid : $("#numero_poblacionid").val(),
        #idObjetivoGeneralDelete: $("#idObjetivoGeneralDelete").val()

        $query = "UPDATE  monitor_numero_poblacionmeta SET  cantidad  = :n2 WHERE id = :n1 ";
        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['idObjetivoGeneralDelete']));
        $insert->bindParam(':n2', htmlspecialchars($_POST['numero_poblacionid']));
        $insert->execute();
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }

            //echo "Id Sesion".$idEmpleado;
            //echo $errorList;
        echo 1;

    
    }catch(Exception $e)
    {
        echo $e->getMessage();
    } 
}
else if($action == "editarObjetivoEspecifico")
{
    try{
        #idTextoObjetivoGeneral : $("#valorObjetivoGeneralEditar").val(),
        #idObjetivoGeneralDelete: $("#idObjetivoGeneralDelete").val()
        $query = "UPDATE  monitor_obj_especifico SET  descripcion  = :n2 WHERE id = :n1 ";
        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['idObjetivoGeneralDelete']));
        $insert->bindParam(':n2', htmlspecialchars($_POST['idTextoObjetivoGeneral']));
        $insert->execute();
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }

            //echo "Id Sesion".$idEmpleado;
            //echo $errorList;
        echo 1;

    
    }catch(Exception $e)
    {
        echo $e->getMessage();
    } 
}
else if ($action == "editarobjetivogeneral")
{
    try{
        
        $query = "UPDATE  monitor_obj_generales SET  descripcion  = :n2 WHERE id = :n1 ";
        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['idObjetivoGeneralDelete']));
        $insert->bindParam(':n2', htmlspecialchars($_POST['idTextoObjetivoGeneral']));
        $insert->execute();
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }

            //echo "Id Sesion".$idEmpleado;
            //echo $errorList;
        echo 1;

    
    }catch(Exception $e)
    {
        echo $e->getMessage();
    } 
}
else if ($action == "editarMetaActividad")
{
    try{
        /*
        idTextoObjetivoGeneral : $("#valorObjetivoGeneralEditar").val(),
        idObjetivoGeneralDelete: $("#idObjetivoGeneralDelete").val(),
        fhFinalizacion :  $("fhFinalizacion").val()
         */
        $query = "UPDATE  monitor_metas_actividades SET  descripcion  = :n2, fh_finalizacion = :n3 WHERE id = :n1 ";
        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['idObjetivoGeneralDelete']));
        $insert->bindParam(':n2', htmlspecialchars($_POST['idTextoObjetivoGeneral']));
        $insert->bindParam(':n3', htmlspecialchars($_POST['fhFinalizacion']));
        $insert->execute();
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }

            //echo "Id Sesion".$idEmpleado;
            //echo $errorList;
        echo 1;

    
    }catch(Exception $e)
    {
        echo $e->getMessage();
    }
}
else if ($action == "editarProducto")
{
    try{
        
        $query = "UPDATE  monitor_productos SET  descripcion  = :n2 WHERE id = :n1 ";
        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['idObjetivoGeneralDelete']));
        $insert->bindParam(':n2', htmlspecialchars($_POST['idTextoObjetivoGeneral']));
        $insert->execute();
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }

            //echo "Id Sesion".$idEmpleado;
            //echo $errorList;
        echo 1;

    
    }catch(Exception $e)
    {
        echo $e->getMessage();
    }
}
else if ($action == "editarVinculacionInstitucional")
{
    /*
    idTextoObjetivoGeneral : $("#valorObjetivoGeneralEditar").val(),
    idTextoObjetivoGeneral2 : $("#valorObjetivoGeneralEditar").val(),
    idObjetivoGeneralDelete: $("#idObjetivoGeneralDelete").val()
     */
    try{
        
        $query = "UPDATE  monitor_vinculacion_institucional SET  apoyo  = :n2, descripcion_de_recursos = :n3 WHERE id = :n1 ";
        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['idObjetivoGeneralDelete']));
        $insert->bindParam(':n2', htmlspecialchars($_POST['idTextoObjetivoGeneral']));
        $insert->bindParam(':n3', htmlspecialchars($_POST['idTextoObjetivoGeneral2']));
        $insert->execute();
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }

            //echo "Id Sesion".$idEmpleado;
            //echo $errorList;
        echo 1;

    
    }catch(Exception $e)
    {
        echo $e->getMessage();
    }
}
else if ($action == "editarListaPresupuestaria")
{
    try{
        
        $query = "UPDATE  monitor_lista_presupuestaria SET nombre =:n1,  descripcion  = :n2, monto =:n3 WHERE id = :n4 ";
        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['idTextoObjetivoGeneral']));
        $insert->bindParam(':n2', htmlspecialchars($_POST['idTextoDescripcion']));
        $insert->bindParam(':n3', htmlspecialchars($_POST['idTextoMontoLista']));
        $insert->bindParam(':n4', htmlspecialchars($_POST['idObjetivoGeneralDelete']));
        $insert->execute();
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }

            //echo "Id Sesion".$idEmpleado;
            //echo $errorList;
        echo 1;

    
    }catch(Exception $e)
    {
        echo $e->getMessage();
    }
}
else if($action == "editarAreasSubProgramas")
{
    try{
        
        $query = "UPDATE  monitor_area_cargo SET aporte =:n1 WHERE id = :n3 ";
        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['idTextoObjetivoGeneral']));
        $insert->bindParam(':n3', htmlspecialchars($_POST['idObjetivoGeneralDelete']));
        $insert->execute();
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }

            //echo "Id Sesion".$idEmpleado;
            //echo $errorList;
        echo 1;

    
    }catch(Exception $e)
    {
        echo $e->getMessage();
    }
}
else if($action == "deleteareaPresupuestaria")
{
    try{
        
        $query = "DELETE FROM  monitor_area_cargo WHERE id = :n1 ";
        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['idObjetivoGeneralDelete']));
        $insert->execute();
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }

            //echo "Id Sesion".$idEmpleado;
            //echo $errorList;
        echo 1;

    
    }catch(Exception $e)
    {
        echo $e->getMessage();
    }
}
else if ($action == "deleteoMetaPrinciapal")
{
    try{
        
        $query = "DELETE FROM  monitor_poblacion_meta WHERE id = :n1 ";
        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['idObjetivoGeneralDelete']));
        $insert->execute();
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }

            //echo "Id Sesion".$idEmpleado;
            //echo $errorList;
        echo 1;

    
    }catch(Exception $e)
    {
        echo $e->getMessage();
    }
}
else if($action == "deleteSectorDirigido")
{
    try{
        
        $query = "DELETE FROM  monitor_sector_dirigido WHERE id = :n1 ";
        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['idObjetivoGeneralDelete']));
        $insert->execute();
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }

            //echo "Id Sesion".$idEmpleado;
            //echo $errorList;
        echo 1;

    
    }catch(Exception $e)
    {
        echo $e->getMessage();
    }
}
else if ($action == "deleteproductos")
{
    try{
        
        $query = "DELETE FROM  monitor_productos WHERE id = :n1 ";
        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['idObjetivoGeneralDelete']));
        $insert->execute();
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }

            //echo "Id Sesion".$idEmpleado;
            //echo $errorList;
        echo 1;

    
    }catch(Exception $e)
    {
        echo $e->getMessage();
    }
}
else if($action == "deletelistaPrespuestaria")
{
    try{
        
        $query = "DELETE FROM  monitor_lista_presupuestaria WHERE id = :n1 ";
        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['idObjetivoGeneralDelete']));
        $insert->execute();
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }

            //echo "Id Sesion".$idEmpleado;
            //echo $errorList;
        echo 1;

    
    }catch(Exception $e)
    {
        echo $e->getMessage();
    }
}
else if ($action == "deletemetaactividad")
{
    try{
        
        $query = "DELETE FROM  monitor_metas_actividades WHERE id = :n1 ";
        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['idObjetivoGeneralDelete']));
        $insert->execute();
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }

            //echo "Id Sesion".$idEmpleado;
            //echo $errorList;
        echo 1;

    
    }catch(Exception $e)
    {
        echo $e->getMessage();
    }
}
else if($action == "deleteresultados")
{
    try{
        
        $query = "DELETE FROM  monitor_resultados WHERE id = :n1 ";
        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['idObjetivoGeneralDelete']));
        $insert->execute();
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }

            //echo "Id Sesion".$idEmpleado;
            //echo $errorList;
        echo 1;

    
    }catch(Exception $e)
    {
        echo $e->getMessage();
    }  
}
else if ($action  == "deletenumeropoblacionmetas")
{
    try{
        
        $query = "DELETE FROM  monitor_numero_poblacionmeta WHERE id = :n1 ";
        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['idObjetivoGeneralDelete']));
        $insert->execute();
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }

            //echo "Id Sesion".$idEmpleado;
            //echo $errorList;
        echo 1;

    
    }catch(Exception $e)
    {
        echo $e->getMessage();
    }  
}
else if($action =="deleteobjetivogeneral")
{
    try{
        
        $query = "DELETE FROM  monitor_obj_generales WHERE id = :n1 ";
        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['idObjetivoGeneralDelete']));
        $insert->execute();
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }

            //echo "Id Sesion".$idEmpleado;
            //echo $errorList;
        echo 1;

    
    }catch(Exception $e)
    {
        echo $e->getMessage();
    }   
}
else if($action == "deleteobjetivoespecifico")
{
    try{
        
        $query = "DELETE FROM  monitor_obj_especifico WHERE id = :n1 ";
        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['idObjetivoGeneralDelete']));
        $insert->execute();
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }

            //echo "Id Sesion".$idEmpleado;
            //echo $errorList;
        echo 1;

    
    }catch(Exception $e)
    {
        echo $e->getMessage();
    }
}
else if ($action == "deletevinculacioninstitucional")
{
    try{
        
        $query = "DELETE FROM  monitor_vinculacion_institucional WHERE id = :n1 ";
        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['idObjetivoGeneralDelete']));
        $insert->execute();
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }

            //echo "Id Sesion".$idEmpleado;
            //echo $errorList;
        echo 1;

    
    }catch(Exception $e)
    {
        echo $e->getMessage();
    }
}
else if($action == "deletezonasinfluencias")
{
    try{
        
        $query = "DELETE FROM  monitor_zona_influencia WHERE id = :n1 ";
        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['idObjetivoGeneralDelete']));
        $insert->execute();
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
        }

            //echo "Id Sesion".$idEmpleado;
            //echo $errorList;
        echo 1;

    
    }catch(Exception $e)
    {
        echo $e->getMessage();
    }
}
else if($action == "addpoblacionMetaDetalle")

{

    try

    {        

        /*

            metaoindicador: $("#metaoindicador").val(), 

            tipo: $("#tipo").val(), 

            idRelacion : $("#idRelacionProyecto").val()

        */

        $query2 = "INSERT INTO monitor_numero_poblacionmeta 

        (textPoblacionMeta,cantidad , user_creacion, id_generalidad_proyecto) 

        VALUES (:n1,:n2,  :n3, :n4)";

        $insert2 = $net_rrhh->prepare($query2);

        $insert2->bindParam(':n1', htmlspecialchars($_POST['poblacionMetaDetalle']));

        $insert2->bindParam(':n2', htmlspecialchars($_POST['cantidadPoblacion']));

        $insert2->bindParam(':n3', htmlspecialchars($idEmpleado));

        $insert2->bindParam(':n4', htmlspecialchars($_POST['idRelacion']));

        $insert2->execute();



        foreach ($insert2->errorInfo() as $error) {

        $errorList .= "$error <br/>"; 

        }

            echo $errorList;

        }catch(Exception $e)

        {

            echo $e->getMessage();

        } 

}

else if ($action == "addareassubprogramas")//areassubprogramas

{

    try

    {        

        /*

            metaoindicador: $("#metaoindicador").val(), 

            tipo: $("#tipo").val(), 

            idRelacion : $("#idRelacionProyecto").val()

        */

        $query2 = "INSERT INTO monitor_area_cargo 

        (descripcion, user_creacion, id_generalidad_proyecto, aporte) 

        VALUES (:n1,  :n3, :n4, :n5)";

        $insert2 = $net_rrhh->prepare($query2);

        $insert2->bindParam(':n1', htmlspecialchars($_POST['areassubprogramas']));

        $insert2->bindParam(':n3', htmlspecialchars($idEmpleado));

        $insert2->bindParam(':n4', htmlspecialchars($_POST['idRelacion']));//

        $insert2->bindParam(':n5', htmlspecialchars($_POST['aporteDelProyectoArea']));

        $insert2->execute();



        foreach ($insert2->errorInfo() as $error) {

        $errorList .= "$error <br/>"; 

        }

            echo $errorList;

        }catch(Exception $e)

        {

            echo $e->getMessage();

        } 

}

else if($action == "addproductogenerado")

{

    try

    {        

        /*

            metaoindicador: $("#metaoindicador").val(), 

            tipo: $("#tipo").val(), 

            idRelacion : $("#idRelacionProyecto").val()

        */

        $query2 = "INSERT INTO monitor_productos 

        (descripcion, user_creacion, id_generalidad_proyecto) 

        VALUES (:n1,  :n3, :n4)";

        $insert2 = $net_rrhh->prepare($query2);

        $insert2->bindParam(':n1', htmlspecialchars($_POST['productoGenerado']));

        $insert2->bindParam(':n3', htmlspecialchars($idEmpleado));

        $insert2->bindParam(':n4', htmlspecialchars($_POST['idRelacion']));

        $insert2->execute();



        foreach ($insert2->errorInfo() as $error) {

        $errorList .= "$error <br/>"; 

        }

            echo $errorList;

        }catch(Exception $e)

        {

            echo $e->getMessage();

        } 

}

else if($action == "addasociacion") 

{

    try{



        //echo "Valor de IdProyecto".$_POST["idProyecto"];

        //echo "Valor de Coordinador".$_POST["idCoordinador"];



        if($_POST['idProyecto']=="")

        {

            echo  false;

        }

        else

        {

           

            try

            {

                

            //:::::::::::::: BUSCANDO SI YA ESTA REGISTRADO EL MISMO USUARIO CON EL MISMO PROYECTO ::::::::::::

            $query = "SELECT * FROM monitor_generalidad_proyecto WHERE id_coordinador = ".$_POST['idCoordinador']." AND id_proyecto = ".$_POST['idProyecto'];

            $Select = $net_rrhh->prepare($query);

            $Select->execute();

            

            if($Select->rowCount() == 0)

            {

               

                try

                {

                    $query = "INSERT INTO monitor_generalidad_proyecto 

                    VALUES(Null, :n1, :n2, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, :n3, :n4, :n5, :n6, 0,null,null)";

                    $insert = $net_rrhh->prepare($query);

                    $insert->bindParam(':n1', htmlspecialchars($_POST['idProyecto']));

                    $insert->bindParam(':n2', htmlspecialchars($_POST['idCoordinador']));

                    $insert->bindParam(':n6', htmlspecialchars($_POST['linkSharepoint']));

                    $insert->bindParam(':n3', htmlspecialchars($idEmpleado));

                    $insert->bindParam(':n4', htmlspecialchars($idEmpleado));

                    $insert->bindParam(':n5', htmlspecialchars(1));

                    $insert->execute();

                    foreach ($insert->errorInfo() as $error) 

                    {

                        $errorList .= "$error <br/>";

                    }

                    //echo $errorList;

                }

                catch(Exception $e)

                {

                    echo $e->getMessage();

                }

                

                try{



                    //GUARDO EL HISTORIAL DEL PRIMER COORDINADOR 

                    $query2 = "INSERT INTO monitor_historial_coordinador 

                    VALUES(Null, :n1, :n2, CURRENT_TIMESTAMP, :n3)";

                    $insert2 = $net_rrhh->prepare($query2);

                    $insert2->bindParam(':n1', htmlspecialchars($_POST['idProyecto']));

                    $insert2->bindParam(':n2', htmlspecialchars($_POST['idCoordinador']));

                    $insert2->bindParam(':n3', htmlspecialchars($idEmpleado));

                    $insert2->execute();

                    foreach ($insert2->errorInfo() as $error) {

                        $errorList .= "$error <br/>";

                        

                    }

    

                    echo 10;

                }catch(Exception $e)

                {

                    echo $e->getMessage();

                }

            }

            else

            {

                echo 4;

            }

            

            }catch(Exception $e)

            {

                echo $e->getMessage();

            }

            

            

        }

        

    }catch(Exception $e)

    {

        echo $e->getMessage();

    } 

}

else if($action == "addficha")

{

    //echo "HOLASDASDA";

    /*

               codigoproyecto: $("#codigoproyecto").val(), 

                proyectoconocido: $("#proyectoconocido").val(), 

                codigoasignado: $("#codigoasignado").val(), 

                tipocooperante: $("#tipocooperante").val(), 

                nombrecooperante: $("#nombrecooperante").val(), 



                paginaweb: $("#paginaweb").val(), 

                consorcio: $("#consorcio").val(), 

                nombreprime: $("#nombreprime").val(), 

                organizacionsocia: $("#organizacionsocia").val(), 

                nombredelaorganizacion: $("#nombredelaorganizacion").val(), 



                aporteproyecto: $("#aporteproyecto").val(), 

                objetivoproyecto: $("#objetivoproyecto").val(), 

                otrosespecifique: $("#otrosespecifique").val(), 

                metasyresultados: $("#metasyresultados").val(), 



                productosgenerados: $("#productosgenerados").val(), 

                areaacargo: $("#areaacargo").val(), 

                fhinicio: $("#fhinicio").val(), 

                fhcierre: $("#fhcierre").val(), 



                

                numerobeneficiario: $("#numerobeneficiario").val(), 

                montodelcooperante: $("#montodelcooperante").val(), 

                proyectopossecontrapartida: $("#proyectopossecontrapartida").val(), 

                montocontrapartida: $("#montocontrapartida").val(), 



                sumademontos: $("#sumademontos").val(), 

                idRelacion : $("#idRelacionProyecto").val()

    */

    try

    {

        $query = "SELECT * FROM monitor_lista_presupuestaria WHERE id_generalidad_proyecto = " . $_POST['idRelacion'];



        $Select = $net_rrhh->prepare($query);

        $Select->execute();

       

        if($Select->rowCount() == 0)

        {

            echo 3;

        }

        else

        {

            $query2 = "

            INSERT INTO monitor_ficha_encabezado 

            (codigo_proyecto, proyecto_conocido_como, codigo_asignado_cooperante, tipo_cooperante, nombre_cooperante,paginaweb_cooperante

            ,consorcio,nombre_prime,organizacion_socia,nombre_organizacion,aporte_al_proyecto,objetivo_proyecto,otros,

            metas_principales_proyecto,productos_generados,area_acargo_del_proyecto,fh_inicio,fh_cierre,numero_beneficiarios,

            monto_aportado_cooperante,proyecto_posee_contrapartida,monto_contrapartida,suma_montos_total_proyectos,

            user_creacion, id_proyecto_generalidades,estado,porcentajeAvance) 

            VALUES (:n1, :n2, :n3, :n4, :n5, :n6, :n7, :n8, :n9, :n10, :n11, :n12, :n13, :n14, :n15, :n16, :n17, :n18, :n19, :n20, :n21

            , :n22, :n23, :n24, :n25, :n26,:n27)";

            $insert2 = $net_rrhh->prepare($query2);

            

            $insert2->bindParam(':n1', htmlspecialchars($_POST['codigoproyecto']));

            $insert2->bindParam(':n2', htmlspecialchars($_POST['proyectoconocido']));

            $insert2->bindParam(':n3', htmlspecialchars($_POST['codigoasignado']));

            $insert2->bindParam(':n4', htmlspecialchars($_POST['tipocooperante']));

            $insert2->bindParam(':n5', htmlspecialchars($_POST['nombrecooperante']));

        

            $insert2->bindParam(':n6', htmlspecialchars($_POST['paginaweb']));

            $insert2->bindParam(':n7', htmlspecialchars($_POST['consorcio']));

            $insert2->bindParam(':n8', htmlspecialchars($_POST['nombreprime']));

            $insert2->bindParam(':n9', htmlspecialchars($_POST['organizacionsocia']));

            $insert2->bindParam(':n10', htmlspecialchars($_POST['nombredelaorganizacion']));

        

            $insert2->bindParam(':n11', htmlspecialchars($_POST['aporteproyecto']));

            $insert2->bindParam(':n12', htmlspecialchars($_POST['objetivoproyecto']));

            $insert2->bindParam(':n13', htmlspecialchars($_POST['otrosespecifique']));

            $insert2->bindParam(':n14', htmlspecialchars($_POST['metasyresultados']));

        

            $insert2->bindParam(':n15', htmlspecialchars($_POST['productosgenerados']));

            $insert2->bindParam(':n16', htmlspecialchars($_POST['areaacargo']));

            $insert2->bindParam(':n17', htmlspecialchars($_POST['fhinicio']));

            $insert2->bindParam(':n18', htmlspecialchars($_POST['fhcierre']));

        

            $insert2->bindParam(':n19', htmlspecialchars($_POST['numerobeneficiario']));

            $insert2->bindParam(':n20', htmlspecialchars($_POST['montodelcooperante']));

            $insert2->bindParam(':n21', htmlspecialchars($_POST['proyectopossecontrapartida']));

            $insert2->bindParam(':n22', htmlspecialchars($_POST['montocontrapartida']));

        

            $insert2->bindParam(':n23', htmlspecialchars($_POST['sumademontos']));

            

            $insert2->bindParam(':n24', htmlspecialchars($idEmpleado));

            $insert2->bindParam(':n25', htmlspecialchars($_POST['idRelacion']));

            $insert2->bindParam(':n26', htmlspecialchars(1));

            $insert2->bindParam(':n27', htmlspecialchars(0));

            $insert2->execute();

            foreach ($insert2->errorInfo() as $error) {

                $errorList .= "$error <br/>"; 

                }

                $Query = "update monitor_generalidad_proyecto set estado=2,user_editor_id = :n5  where id=:n4 ";

                    

                $updateUser = $net_rrhh->prepare($Query);

                $updateUser->bindParam(':n5', htmlspecialchars($idEmpleado)); 

                $updateUser->bindParam(':n4', htmlspecialchars($_POST['idRelacion']));

                    

                $updateUser->execute();

                        echo 1;

        }

  



        //:::::::: ACTUALIZAR FH DE INICIO Y CIERRE ::::::::

        $query4 = "UPDATE  monitor_generalidad_proyecto SET fh_inicio = ? ,  fh_cierre = ?,

        user_editor_id = ? 

       WHERE id = ?";

       $data4 = $net_rrhh->prepare($query4);

       $data4->execute([$_POST['fhinicio'],$_POST['fhcierre'],$idEmpleado,$_POST['idRelacion']]);

       foreach ($data4->errorInfo() as $error) 

       {

           $errorList .= "$error <br/>"; 

       }

      // echo $errorList;

       

    }catch(Exception $e)

    {

        echo $e->getMessage()."JPÑASSDFSF ";

    } 

}

//...::::..:::..:::..$idEmpleado =  $_SESSION['iu'];
else if($action == "addfileAdendaLink"){
    ob_start(); // Inicia el control de buffer de salida

try {

    $nombre_archivo = "Adenda";
    $ruta_archivo = $_REQUEST["linkSaherPointAdenda"];

    $query = "INSERT INTO monitor_archivos_guardados 

    VALUES(Null, :n1, :n2, :n3, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP,  :n4, :n5,:n6)";

    $insert = $net_rrhh->prepare($query);

    $insert->bindParam(':n1', htmlspecialchars($nombre_archivo));

    $insert->bindParam(':n2', htmlspecialchars($ruta_archivo));

    $insert->bindParam(':n3', htmlspecialchars(1));

    $insert->bindParam(':n4', htmlspecialchars($idEmpleado));

    $insert->bindParam(':n5', htmlspecialchars($_POST['idEnvio']));

    $insert->bindParam(':n6', htmlspecialchars(0));

    $insert->execute();

    foreach ($insert->errorInfo() as $error) 

    {

        $errorList .= "$error <br/>"; 

    }

    echo  $errorList;



    $nom = $nombre_archivo;

    //echo "<img src=\"$nom\">";





    //:::::::: ACTUALIZAR FH DE INICIO Y CIERRE ::::::::

    $query4 = "UPDATE  monitor_generalidad_proyecto SET   fh_cierre = ?,

    user_editor_id = ? WHERE id = ?";

    $data4 = $net_rrhh->prepare($query4);

    $data4->execute([$_POST['fhcierre'],$idEmpleado,$_POST['idEnvio']]);

    foreach ($data4->errorInfo() as $error) 

    {

        $errorList .= "$error <br/>"; 

    }



    $query5 = "UPDATE  monitor_ficha_encabezado SET   fh_cierre = ?,

    user_creacion = ? WHERE id_proyecto_generalidades = ?";

    $data5 = $net_rrhh->prepare($query5);

    $data5->execute([$_POST['fhcierre'],$idEmpleado,$_POST['idEnvio']]);

    foreach ($data5->errorInfo() as $error) 

    {

        $errorList .= "$error <br/>"; 

    }





    ob_end_clean(); // Limpia el buffer de salida y lo desactiva



    // Redirige a la página anterior

    header("Location: {$_SERVER['HTTP_REFERER']}");

    exit();

} catch (Exception $e) {

    // Error general

    echo $e->getMessage();

}





}
else if($action == "addfile")

{

    ob_start(); // Inicia el control de buffer de salida

    //echo "Hola Entre al addFile";

    // Imprimir información sobre el archivo

    //echo "Información del archivo:<br>";

var_dump($_FILES['formFile']);

try {

    //echo "Intentando copiar el archivo...<br>";



    $directorio_actual = __DIR__;

    //echo "Ruta del directorio" . $directorio_actual;

    // Retroceder un directorio (../)

    $directorio_superior = realpath($directorio_actual . '/..');



    // Construir la ruta completa al directorio deseado

    $carpeta_destino = $directorio_superior . '/view/Monitoreo/SERVIDORMONITOREO/';



    // Imprimir la ruta completa antes de intentar copiar el archivo

    //echo "Ruta completa del directorio de destino: $carpeta_destino<br>";



    $nombre_archivo_original = $_FILES['formFile']['name'];

    $extension_archivo = pathinfo($nombre_archivo_original, PATHINFO_EXTENSION);



    // Generar un nuevo nombre de archivo con la marca de tiempo para evitar duplicados

    $nuevo_nombre_archivo = "fusalmo_" . time() . "_$nombre_archivo_original";



    // Construir la ruta completa al nuevo archivo

    $ruta_nuevo_archivo = $carpeta_destino . '/' . $nuevo_nombre_archivo;







    

    // Copiar el archivo con el nuevo nombre

    copy($_FILES['formFile']['tmp_name'], $ruta_nuevo_archivo);

    //echo "La foto se registró en el servidor con el nuevo nombre: $nuevo_nombre_archivo<br>";



    // Usar el nuevo nombre para cualquier operación adicional

    $nombre_archivo = $nuevo_nombre_archivo;

    $ruta_archivo = $ruta_nuevo_archivo;



    //echo $_POST['idEnvio'];



    

    $query = "INSERT INTO monitor_archivos_guardados 

    VALUES(Null, :n1, :n2, :n3, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP,  :n4, :n5,:n6)";

    $insert = $net_rrhh->prepare($query);

    $insert->bindParam(':n1', htmlspecialchars($nombre_archivo));

    $insert->bindParam(':n2', htmlspecialchars($ruta_archivo));

    $insert->bindParam(':n3', htmlspecialchars(1));

    $insert->bindParam(':n4', htmlspecialchars($idEmpleado));

    $insert->bindParam(':n5', htmlspecialchars($_POST['idEnvio']));

    $insert->bindParam(':n6', htmlspecialchars(0));

    $insert->execute();

    foreach ($insert->errorInfo() as $error) 

    {

        $errorList .= "$error <br/>"; 

    }

    echo  $errorList;



    $nom = $nombre_archivo;

    //echo "<img src=\"$nom\">";





    //:::::::: ACTUALIZAR FH DE INICIO Y CIERRE ::::::::

    $query4 = "UPDATE  monitor_generalidad_proyecto SET   fh_cierre = ?,

    user_editor_id = ? WHERE id = ?";

    $data4 = $net_rrhh->prepare($query4);

    $data4->execute([$_POST['fhcierre'],$idEmpleado,$_POST['idEnvio']]);

    foreach ($data4->errorInfo() as $error) 

    {

        $errorList .= "$error <br/>"; 

    }



    $query5 = "UPDATE  monitor_ficha_encabezado SET   fh_cierre = ?,

    user_creacion = ? WHERE id_proyecto_generalidades = ?";

    $data5 = $net_rrhh->prepare($query5);

    $data5->execute([$_POST['fhcierre'],$idEmpleado,$_POST['idEnvio']]);

    foreach ($data5->errorInfo() as $error) 

    {

        $errorList .= "$error <br/>"; 

    }





    ob_end_clean(); // Limpia el buffer de salida y lo desactiva



    // Redirige a la página anterior

    header("Location: {$_SERVER['HTTP_REFERER']}");

    exit();

} catch (Exception $e) {

    // Error general

    echo $e->getMessage();

}



}
//:::::: GUARDAR ENLACE DOCUMENTOS :::::::::::::::
else if($action == "addLinkPresupuesto")
{
    try{

        #linkSaherPointPresupuesto : $("linkSaherPointPresupuesto").val(),
        #idProyecto : $("#idProyecto").val(),
        $nombre_archivo = "Presupuesto";
        $ruta_archivo = $_POST["linkSaherPointPresupuesto"];
        $query = "INSERT INTO monitor_archivos_guardados 

        VALUES(Null, :n1, :n2, :n3, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP,  :n4, :n5, :n6)";

        $insert = $net_rrhh->prepare($query);

        $insert->bindParam(':n1', htmlspecialchars($nombre_archivo));

        $insert->bindParam(':n2', htmlspecialchars($ruta_archivo));

        $insert->bindParam(':n3', htmlspecialchars(1));

        $insert->bindParam(':n4', htmlspecialchars($idEmpleado));

        $insert->bindParam(':n5', htmlspecialchars($_POST['idProyecto']));

        $insert->bindParam(':n6', htmlspecialchars(1));

        $insert->execute();

        foreach ($insert->errorInfo() as $error) {

            $errorList .= "$error <br/>"; 

            }
            if (!empty($errorList)) {

                echo $errorList; // Solo muestra errores si los hay

            }
    }catch(Exception $e)
    {
        echo $e->getMessage();
    }
}
//:::::: SUBIR PRESUPUESTO ::::::::::...

else if($action == "addfilePresupuesto")

{

    session_start(); // Asegúrate de que la sesión está iniciada al principio del archivo



// Procesa tu formulario aquí...



// Guarda el valor de idProyecto en la sesión

$_SESSION['idProyecto'] = $_POST['idProyecto'];



    ob_start(); // Inicia el control de buffer de salida

  //  echo "Hola Entre al addfilePresupuesto";

// Imprimir información sobre el archivo

//echo "Información del archivo:<br>";

var_dump($_FILES['formFile']);

try {

   // echo "Intentando copiar el archivo...<br>";



    $directorio_actual = __DIR__;

   // echo "Ruta del directorio" . $directorio_actual;

    // Retroceder un directorio (../)

    $directorio_superior = realpath($directorio_actual . '/..');



    // Construir la ruta completa al directorio deseado

    $carpeta_destino = $directorio_superior . '/view/Monitoreo/SERVIDORMONITOREO/';



    // Imprimir la ruta completa antes de intentar copiar el archivo

   // echo "Ruta completa del directorio de destino: $carpeta_destino<br>";



    $nombre_archivo_original = $_FILES['formFile']['name'];

    $extension_archivo = pathinfo($nombre_archivo_original, PATHINFO_EXTENSION);



    // Generar un nuevo nombre de archivo con la marca de tiempo para evitar duplicados

    $nuevo_nombre_archivo = "fusalmo_presupuesto" . time() . "_$nombre_archivo_original";



    // Construir la ruta completa al nuevo archivo

    $ruta_nuevo_archivo = $carpeta_destino . '/' . $nuevo_nombre_archivo;







    

    // Copiar el archivo con el nuevo nombre

    copy($_FILES['formFile']['tmp_name'], $ruta_nuevo_archivo);

   // echo "La foto se registró en el servidor con el nuevo nombre: $nuevo_nombre_archivo<br>";



    // Usar el nuevo nombre para cualquier operación adicional

    $nombre_archivo = $nuevo_nombre_archivo;

    $ruta_archivo = $ruta_nuevo_archivo;



   // echo $_POST['idEnvio'];



    try{

        

        $query = "INSERT INTO monitor_archivos_guardados 

        VALUES(Null, :n1, :n2, :n3, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP,  :n4, :n5, :n6)";

        $insert = $net_rrhh->prepare($query);

        $insert->bindParam(':n1', htmlspecialchars($nombre_archivo));

        $insert->bindParam(':n2', htmlspecialchars($ruta_archivo));

        $insert->bindParam(':n3', htmlspecialchars(1));

        $insert->bindParam(':n4', htmlspecialchars($idEmpleado));

        $insert->bindParam(':n5', htmlspecialchars($_POST['idEnvio']));

        $insert->bindParam(':n6', htmlspecialchars(1));

        $insert->execute();



        foreach ($insert->errorInfo() as $error) {

            $errorList .= "$error <br/>"; 

            }



            if (!empty($errorList)) {

                echo $errorList; // Solo muestra errores si los hay

            }

            

    }catch(Exception $e)

    {

        echo $e->getMessage();

    }

   





    $nom = $nombre_archivo;

    //echo "<img src=\"$nom\">";



    ob_end_clean(); // Limpia el buffer de salida y lo desactiva



    // Redirige a la página anterior

    header("Location: {$_SERVER['HTTP_REFERER']}");

    exit();

} catch (Exception $e) {

    // Error general

    echo $e->getMessage();

}



}

else if($action == "addlistaPresupuesta")

{

    try

    {

        /*

            nombreLista: $("#nombreLista").val(), 

            descripcionLista: $("#descripcionLista").val(),

            montoAsignado: $("#montoAsignado").val(), 

            fhEjecucion: $("#fhEjecucion").val(), 

            fhFinalizacion: $("#fhFinalizacion").val(),

            idRelacion : $("#idRelacionProyecto").val()

        */

        //GUARDO EL HISTORIAL DEL PRIMER COORDINADOR 

        // Formatear las fechas en el formato 'Y-m-d'

$fhEjecucionFormatted = date('Y-m-d', strtotime($_POST['fhEjecucion']));

$fhFinalizacionFormatted = date('Y-m-d', strtotime($_POST['fhFinalizacion']));

 

$query2 = "INSERT INTO monitor_lista_presupuestaria 

(nombre, descripcion, monto, tiempo_ejecucion, tiempo_fin, user_creacion, id_generalidad_proyecto) 

VALUES (:n1, :n2, :n3, :n4, :n5, :n6, :n7)";

$insert2 = $net_rrhh->prepare($query2);

$insert2->bindParam(':n1', htmlspecialchars($_POST['nombreLista']));

$insert2->bindParam(':n2', htmlspecialchars($_POST['descripcionLista']));

$insert2->bindParam(':n3', htmlspecialchars($_POST['montoAsignado']));

$insert2->bindParam(':n4', $fhEjecucionFormatted);

$insert2->bindParam(':n5', $fhFinalizacionFormatted);

$insert2->bindParam(':n6', htmlspecialchars($idEmpleado));

$insert2->bindParam(':n7', htmlspecialchars($_POST['idRelacion']));

$insert2->execute();



foreach ($insert2->errorInfo() as $error) {

$errorList .= "$error <br/>"; 

}

        echo true;

    }catch(Exception $e)

    {

        echo false;

    }

}

else if($action == "addmetasindicadores")

{

    try

    {        

        /*
                metaoindicador: $("#metaoindicador").val(), 
                tipo: $("#tipo").val(), 
                idRelacion : $("#idRelacionProyecto").val(),
                fh_finalizacion : $("#fh_finalizacion").val()


        */

        $query2 = "INSERT INTO monitor_metas_actividades 

        (descripcion,tipo, user_creacion, id_generalidad_proyecto,fh_finalizacion) 

        VALUES (:n1, :n2, :n3, :n4, :n5)";

        $insert2 = $net_rrhh->prepare($query2);

        $insert2->bindParam(':n1', htmlspecialchars($_POST['metaoindicador']));

        $insert2->bindParam(':n2', htmlspecialchars($_POST['tipo']));

        $insert2->bindParam(':n3', htmlspecialchars($idEmpleado));

        $insert2->bindParam(':n4', htmlspecialchars($_POST['idRelacion']));

        $insert2->bindParam(':n5', htmlspecialchars($_POST['fh_finalizacion']));

        $insert2->execute();



        foreach ($insert2->errorInfo() as $error) {

        $errorList .= "$error <br/>"; 

        }

            echo $errorList;

        }catch(Exception $e)

        {

            echo $e->getMessage();

        } 

}

else if($action == "addresultado")

{

    try

    {        

        /*

            zonainfluencia: $("#zonainfluencia").val(), 

            idRelacion : $("#idRelacionProyecto").val()

        */

        $query2 = "INSERT INTO monitor_resultados 

        (descripcion_resultado, user_creacion, id_generalidad_proyecto) 

        VALUES (:n1, :n5, :n7)";

        $insert2 = $net_rrhh->prepare($query2);

        $insert2->bindParam(':n1', htmlspecialchars($_POST['resultado']));

        $insert2->bindParam(':n5', htmlspecialchars($idEmpleado));

        $insert2->bindParam(':n7', htmlspecialchars($_POST['idRelacion']));

        $insert2->execute();



        foreach ($insert2->errorInfo() as $error) {

        $errorList .= "$error <br/>"; 

        }

            echo $errorList;

        }catch(Exception $e)

        {

            echo $e->getMessage();

        }

}

else if($action == "addobjespecifico")

{

    try

    {        

        /*

            zonainfluencia: $("#zonainfluencia").val(), 

            idRelacion : $("#idRelacionProyecto").val()

        */

        $query2 = "INSERT INTO monitor_obj_especifico 

        (descripcion, user_creador, id_generalidad_proyecto) 

        VALUES (:n1, :n5, :n7)";

        $insert2 = $net_rrhh->prepare($query2);

        $insert2->bindParam(':n1', htmlspecialchars($_POST['objetivoEspecifico']));

        $insert2->bindParam(':n5', htmlspecialchars($idEmpleado));

        $insert2->bindParam(':n7', htmlspecialchars($_POST['idRelacion']));

        $insert2->execute();



        foreach ($insert2->errorInfo() as $error) {

        $errorList .= "$error <br/>"; 

        }

            echo $errorList;

        }catch(Exception $e)

        {

            echo $e->getMessage();

        }

}

else if($action == "addobjgeneral")

{

    try

    {        

        /*

            zonainfluencia: $("#zonainfluencia").val(), 

            idRelacion : $("#idRelacionProyecto").val()

        */

        $query2 = "INSERT INTO monitor_obj_generales 

        (descripcion, user_creador, id_generalidad_proyecto) 

        VALUES (:n1, :n5, :n7)";

        $insert2 = $net_rrhh->prepare($query2);

        $insert2->bindParam(':n1', htmlspecialchars($_POST['objetivoGeneral']));

        $insert2->bindParam(':n5', htmlspecialchars($idEmpleado));

        $insert2->bindParam(':n7', htmlspecialchars($_POST['idRelacion']));

        $insert2->execute();



        foreach ($insert2->errorInfo() as $error) {

        $errorList .= "$error <br/>"; 

        }

            echo $errorList;

        }catch(Exception $e)

        {

            echo $e->getMessage();

        }

}

else if($action == "addzonainfluencia")

{

    try

    {        

        /*

            zonainfluencia: $("#zonainfluencia").val(), 

            idRelacion : $("#idRelacionProyecto").val()

        */

        $query2 = "INSERT INTO monitor_zona_influencia 

        (nombre, estado, user_creador, id_generalidad_proyecto) 

        VALUES (:n1, :n5, :n6, :n7)";

        $insert2 = $net_rrhh->prepare($query2);

        $insert2->bindParam(':n1', htmlspecialchars($_POST['zonainfluencia']));

        $insert2->bindParam(':n5', htmlspecialchars(1));

        $insert2->bindParam(':n6', htmlspecialchars($idEmpleado));

        $insert2->bindParam(':n7', htmlspecialchars($_POST['idRelacion']));

        $insert2->execute();



        foreach ($insert2->errorInfo() as $error) {

        $errorList .= "$error <br/>"; 

        }

            echo $errorList;

        }catch(Exception $e)

        {

            echo false;

        }

}

else if($action == "addpoblacionmeta")

{

    try

    {        

        /*

            zonainfluencia: $("#zonainfluencia").val(), 

            idRelacion : $("#idRelacionProyecto").val()

        */

        $query2 = "INSERT INTO monitor_poblacion_meta 

        (nombre, estado, user_creador, id_generalidad_proyecto) 

        VALUES (:n1, :n5, :n6, :n7)";

        $insert2 = $net_rrhh->prepare($query2);

        $insert2->bindParam(':n1', htmlspecialchars($_POST['zonainfluencia']));

        $insert2->bindParam(':n5', htmlspecialchars(1));

        $insert2->bindParam(':n6', htmlspecialchars($idEmpleado));

        $insert2->bindParam(':n7', htmlspecialchars($_POST['idRelacion']));

        $insert2->execute();



        foreach ($insert2->errorInfo() as $error) {

        $errorList .= "$error <br/>"; 

        }

            echo $errorList;

        }catch(Exception $e)

        {

            echo false;

        }

}

else if($action == "addsectordirigido")

{

    try

    {        

        /*

            sectordirigida: $("#sectordirigida").val(), 

            idRelacion : $("#idRelacionProyecto").val()

        */

        $query2 = "INSERT INTO monitor_sector_dirigido 

        (nombre, estado, user_creador, id_generalidad_proyecto) 

        VALUES (:n1, :n5, :n6, :n7)";

        $insert2 = $net_rrhh->prepare($query2);

        $insert2->bindParam(':n1', htmlspecialchars($_POST['sectordirigida']));

        $insert2->bindParam(':n5', htmlspecialchars(1));

        $insert2->bindParam(':n6', htmlspecialchars($idEmpleado));

        $insert2->bindParam(':n7', htmlspecialchars($_POST['idRelacion']));

        $insert2->execute();



        foreach ($insert2->errorInfo() as $error) {

        $errorList .= "$error <br/>"; 

        }

            echo $errorList;

        }catch(Exception $e)

        {

            echo false;

        }

}

else if($action == "addvinculacioninstitucional")

{

    try

    {        

        /*

                area: $("#area").val(), 

                apoyo: $("#apoyo").val(), 

                recursosproporcionados: $("#recursosproporcionados").val(), 

                idRelacion : $("#idRelacionProyecto").val()

        */

        $query2 = "INSERT INTO monitor_vinculacion_institucional 

        (area, apoyo,descripcion_de_recursos,estado, user_creador, id_generalidad_proyecto) 

        VALUES (:n1, :n2, :n3, :n4, :n5, :n6)";

        $insert2 = $net_rrhh->prepare($query2);

        $insert2->bindParam(':n1', htmlspecialchars($_POST['area']));

        $insert2->bindParam(':n2', htmlspecialchars($_POST['apoyo']));

        $insert2->bindParam(':n3', htmlspecialchars($_POST['recursosproporcionados']));

        $insert2->bindParam(':n4', htmlspecialchars(1));

        $insert2->bindParam(':n5', htmlspecialchars($idEmpleado));

        $insert2->bindParam(':n6', htmlspecialchars($_POST['idRelacion']));

        $insert2->execute();



        foreach ($insert2->errorInfo() as $error) {

        $errorList .= "$error <br/>"; 

        }

            echo $errorList;

        }catch(Exception $e)

        {

            echo false;

        }

}

else if($action == "addVinculacionDetalle")

{

    try

    {        

        /*

            nombreOrganizacion: $("#nombreOrganizacion").val(), 

            sectorOrganizacion: $("#sectorOrganizacion").val(), 

            tipoVinculacion: $("#tipoVinculacion").val(), 

           idRelacion : $("#idRelacionProyecto").val()

        */

        $query2 = "INSERT INTO monitor_organizacion_vinculadas

        (nombre_organizacion, tipo_sector,tipo_de_vinculacion,id_ficha_encabezado,user_creador,estado) 

        VALUES (:n1, :n2, :n3, :n4, :n5, :n6)";

        $insert2 = $net_rrhh->prepare($query2);

        $insert2->bindParam(':n1', htmlspecialchars($_POST['nombreOrganizacion']));

        $insert2->bindParam(':n2', htmlspecialchars($_POST['sectorOrganizacion']));

        $insert2->bindParam(':n3', htmlspecialchars($_POST['tipoVinculacion']));

        $insert2->bindParam(':n4', htmlspecialchars($_POST['idRelacion']));

        $insert2->bindParam(':n5', htmlspecialchars($idEmpleado));

        $insert2->bindParam(':n6', htmlspecialchars(1));

        $insert2->execute();



        foreach ($insert2->errorInfo() as $error) {

        $errorList .= "$error <br/>"; 

        }

            echo $_POST['idRelacion'];

        }catch(Exception $e)

        {

            echo false;

        }

}

else if ($action == "addAvanceFinanciero")

{

    try

    {        

        /*  

        notaAvance: $("#notaAvance").text(),

        previstoMes: $("#previstoMes").val(), 

        logradoMes: $("#logradoMes").val(), 

        porcentajeEjecucion: $("#porcentajeEjecucion").val(),

        previstoProximomes: $("#previstoProximomes").val(),  

        idRelacion : $("#idRelacionProyecto").val(),

        idnotaAvance: $("#notaAvance").val(),

        idRelacionProyecto : $("#idRelacionProyecto").val()

        */

       



        $query = "SELECT * FROM monitor_avance_financiero WHERE idListaPresupuestaria = " . $_POST['idnotaAvance'] . " AND id_generalidad_proyecto = " . $_POST['idRelacion'];



        $Select = $net_rrhh->prepare($query);

        $Select->execute();

       

        if($Select->rowCount() == 0)

        {

            //echo "ENTRE SOY NUEVO";

            $query2 = "INSERT INTO monitor_avance_financiero

            (Nota,Proyeccion_del_mes , logrado_para_elmes ,porcentaje_ejecucion, previstos_para_proximomes ,user_creador,id_generalidad_proyecto,estado,idListaPresupuestaria ) 

            VALUES (:n1, :n2, :n3, :n4, :n5, :n6, :n7, :n8, :n9)";

            $insert2 = $net_rrhh->prepare($query2);

            $insert2->bindParam(':n1', htmlspecialchars($_POST['notaAvance']));

            $insert2->bindParam(':n2', htmlspecialchars($_POST['previstoMes']));

            $insert2->bindParam(':n3', htmlspecialchars($_POST['logradoMes']));

            $insert2->bindParam(':n4', htmlspecialchars(0));

            $insert2->bindParam(':n5', htmlspecialchars($_POST['previstoProximomes']));

            $insert2->bindParam(':n6', htmlspecialchars($idEmpleado));

            $insert2->bindParam(':n7', htmlspecialchars($_POST['idRelacion']));

            $insert2->bindParam(':n8', htmlspecialchars(1));

            $insert2->bindParam(':n9', htmlspecialchars($_POST['idnotaAvance']));

            $insert2->execute();

            foreach ($insert2->errorInfo() as $error) {

                $errorList .= "$error <br/>"; 

                }

                 //   echo $errorList;

            //SELECT s1.*, s2.nombre, s2.monto FROM monitor_avance_financiero as s1 inner join  monitor_lista_presupuestaria as s2 on s1.idListaPresupuestaria = s2.id where s1.id_generalidad_proyecto  = ?

            $query = "SELECT * FROM monitor_lista_presupuestaria WHERE id= ?";

            $data3 = $net_rrhh->prepare($query);

            $data3->execute([$_POST['idnotaAvance']]);

            while ($data = $data3->fetch()) {

                $MONTO = $data[3];

            }



            $query = "SELECT * FROM monitor_avance_financiero WHERE idListaPresupuestaria= ?";

            $data4 = $net_rrhh->prepare($query);

            $data4->execute([$_POST['idnotaAvance']]);

            while ($data = $data4->fetch()) {

                $RESTANTE = $data[2];

            }

            $sumador  = 0;//1500   2332.0000000 

            $query = "SELECT * FROM monitor_avance_financiero_historial WHERE idListaPresupuestaria= ?";

            $data4 = $net_rrhh->prepare($query);

            $data4->execute([$_POST['idnotaAvance']]);

            while ($data = $data4->fetch()) {

                $sumador = $sumador+$data[2];

            }

            //echo $sumador;

            $MONTORESTA = $MONTO-$sumador-$_POST['logradoMes'];

            $porcentaje = (100*($sumador+$_POST['logradoMes']))/($MONTO);

            if($MONTORESTA < 0)

            {

                $MONTORESTA = $MONTO;

                $porcentaje = 100;

                //echo 53;

                $bandera = 7;

                $query3 = "UPDATE  monitor_avance_financiero SET Proyeccion_del_mes = ? ,  user_creador = ?,porcentaje_ejecucion =?  WHERE idListaPresupuestaria = ?";

                $data3 = $net_rrhh->prepare($query3);

                $data3->execute([$MONTORESTA,$idEmpleado,$porcentaje,$_POST['idnotaAvance']]);

                foreach ($data3->errorInfo() as $error) {

                    $errorList .= "$error <br/>"; 

                    }

                    echo 1;

            }

            else

            {

                $bandera = 7;

                $query3 = "UPDATE  monitor_avance_financiero SET Proyeccion_del_mes = ? ,  user_creador = ?,porcentaje_ejecucion =?  WHERE idListaPresupuestaria = ?";

                $data3 = $net_rrhh->prepare($query3);

                $data3->execute([$MONTORESTA,$idEmpleado,$porcentaje,$_POST['idnotaAvance']]);

                foreach ($data3->errorInfo() as $error) {

                    $errorList .= "$error <br/>"; 

                    }

                    echo 1;

                 //       echo $MONTO;

            }



           

        }

        else

        {

            //SELECT s1.*, s2.nombre, s2.monto FROM monitor_avance_financiero as s1 inner join  monitor_lista_presupuestaria as s2 on s1.idListaPresupuestaria = s2.id where s1.id_generalidad_proyecto  = ?

            $query = "SELECT * FROM monitor_lista_presupuestaria WHERE id= ?";

            $data3 = $net_rrhh->prepare($query);

            $data3->execute([$_POST['idnotaAvance']]);

            while ($data = $data3->fetch()) {

                $MONTO = $data[3];

            }



            $query = "SELECT * FROM monitor_avance_financiero WHERE idListaPresupuestaria= ?";

            $data4 = $net_rrhh->prepare($query);

            $data4->execute([$_POST['idnotaAvance']]);

            while ($data = $data4->fetch()) {

                $RESTANTE = $data[2];

            }

            $sumador  = 0;//1500   2332.0000000 

            $query = "SELECT * FROM monitor_avance_financiero_historial WHERE idListaPresupuestaria= ?";

            $data4 = $net_rrhh->prepare($query);

            $data4->execute([$_POST['idnotaAvance']]);

            while ($data = $data4->fetch()) {

                $sumador = $sumador+$data[2];

            }

            //echo $sumador;

            $MONTORESTA = $MONTO-$sumador-$_POST['logradoMes'];

            $porcentaje = (100*($sumador+$_POST['logradoMes']))/($MONTO);

            if($MONTORESTA <= 0)

            {

                $MONTORESTA = $MONTO;

                $porcentaje = 100;

                //echo 53;

                $bandera = 7;

                $query3 = "UPDATE  monitor_avance_financiero SET Proyeccion_del_mes = ? ,  user_creador = ?,porcentaje_ejecucion =?  WHERE idListaPresupuestaria = ?";

                $data3 = $net_rrhh->prepare($query3);

                $data3->execute([$MONTORESTA,$idEmpleado,$porcentaje,$_POST['idnotaAvance']]);

                foreach ($data3->errorInfo() as $error) {

                    $errorList .= "$error <br/>"; 

                    }

                    echo 1;

                //echo "❌❌ERROR❌❌, CANTIDAD SUPERA LA LÍNEA PRESUPUESTARIA 😐";

                

            }

            else

            {

                $bandera = 7;

                $query3 = "UPDATE  monitor_avance_financiero SET Proyeccion_del_mes = ? ,  user_creador = ?,porcentaje_ejecucion =?  WHERE idListaPresupuestaria = ?";

                $data3 = $net_rrhh->prepare($query3);

                $data3->execute([$MONTORESTA,$idEmpleado,$porcentaje,$_POST['idnotaAvance']]);

                foreach ($data3->errorInfo() as $error) 

                {

                    $errorList .= "$error <br/>"; 

                    

                }

                echo 1;

                //echo $MONTO;

            } 

           

        }

        

        if($bandera == 7)

        {

            $query = "INSERT INTO monitor_avance_financiero_historial

            (Proyeccion_del_mes , logrado_para_elmes ,porcentaje_ejecucion, previstos_para_proximomes ,user_creador,id_generalidad_proyecto,estado,idListaPresupuestaria ) 

            VALUES (:n2, :n3, :n4, :n5, :n6, :n7, :n8, :n9)";

            $insert = $net_rrhh->prepare($query);

            $insert->bindParam(':n2', htmlspecialchars($_POST['previstoMes']));

            $insert->bindParam(':n3', htmlspecialchars($_POST['logradoMes']));

            $insert->bindParam(':n4', htmlspecialchars(0));

            $insert->bindParam(':n5', htmlspecialchars($_POST['previstoProximomes']));

            $insert->bindParam(':n6', htmlspecialchars($idEmpleado));

            $insert->bindParam(':n7', htmlspecialchars($_POST['idRelacion']));

            $insert->bindParam(':n8', htmlspecialchars(1));

            $insert->bindParam(':n9', htmlspecialchars($_POST['idnotaAvance']));

            $insert->execute();

            foreach ($insert->errorInfo() as $error) {

                $errorList .= "$error <br/>"; 

                }

                //    echo $errorList;

        }

        

        





           



        }catch(Exception $e)

        {

            echo false;

        }

}

else if ($action == "addAvanceActividad")

{

    try

    {        

        /*

              actividadDelProyecto: $("#actividadDelProyecto").val(), 

                descripcionActividad: $("#descripcionActividad").val(), 

                idRelacion : $("#idRelacionProyecto").val(),

        */

        $query2 = "INSERT INTO monitor_actividades_proyecto 

        (actividades_proyecto, avance_deactvidad, estado, user_creador, id_ficha_encabezado) 

        VALUES (:n1, :n2, :n3, :n4, :n5)";

        $insert2 = $net_rrhh->prepare($query2);

        $insert2->bindParam(':n1', htmlspecialchars($_POST['actividadDelProyecto']));

        $insert2->bindParam(':n2', htmlspecialchars($_POST['descripcionActividad']));

        $insert2->bindParam(':n3', htmlspecialchars(1));

        $insert2->bindParam(':n4', htmlspecialchars($idEmpleado));

        $insert2->bindParam(':n5', htmlspecialchars($_POST['idRelacion']));

        $insert2->execute();



        foreach ($insert2->errorInfo() as $error) {

        $errorList .= "$error <br/>"; 

        }

            echo $errorList;

        }catch(Exception $e)

        {

            echo false;

        }

}

else if ($action == "addAvanceMeta")

{

    try

    {        

        /*

              actividadDelProyecto: $("#actividadDelProyecto").val(), 

                descripcionActividad: $("#descripcionActividad").val(), 

                idRelacion : $("#idRelacionProyecto").val(),

        */

        $query2 = "INSERT INTO monitor_metas_proyecto 

        (metas_proyecto, avance_demetas , estado, user_creador, id_ficha_encabezado) 

        VALUES (:n1, :n2, :n3, :n4, :n5)";

        $insert2 = $net_rrhh->prepare($query2);

        $insert2->bindParam(':n1', htmlspecialchars($_POST['actividadDelProyecto']));

        $insert2->bindParam(':n2', htmlspecialchars($_POST['descripcionActividad']));

        $insert2->bindParam(':n3', htmlspecialchars(1));

        $insert2->bindParam(':n4', htmlspecialchars($idEmpleado));

        $insert2->bindParam(':n5', htmlspecialchars($_POST['idRelacion']));

        $insert2->execute();



        foreach ($insert2->errorInfo() as $error) {

        $errorList .= "$error <br/>"; 

        }

            echo $errorList;

        }catch(Exception $e)

        {

            echo false;

        }

}

else if($action == "addPersonalProyeto")

{

    try

    {        

        /*

                nombreCompleto: $("#nombreCompleto").val(), 

                cargoEmpleado: $("#cargoEmpleado").val(), 

                porcentajeTiempo: $("#porcentajeTiempo").val(), 

                contratadoPor: $("#contratadoPor").val(), 

                idRelacion : $("#idRelacionProyecto").val(),

        */

        $query2 = "INSERT INTO monitor_personal_proyecto 

        (tipo_personal , nombre ,cargo  , porcentaje_tiempo, estado, user_creador , id_ficha_encabezado) 

        VALUES (:n1, :n2,:n3,:n4,:n5,:n6,:n7)";

        $insert2 = $net_rrhh->prepare($query2);

        $insert2->bindParam(':n1', htmlspecialchars($_POST['contratadoPor']));

        $insert2->bindParam(':n2', htmlspecialchars($_POST['nombreCompleto']));

        $insert2->bindParam(':n3', htmlspecialchars($_POST['cargoEmpleado']));

        $insert2->bindParam(':n4', htmlspecialchars($_POST['porcentajeTiempo']));

        $insert2->bindParam(':n5', htmlspecialchars(1));

        $insert2->bindParam(':n6', htmlspecialchars($idEmpleado));

        $insert2->bindParam(':n7', htmlspecialchars($_POST['idRelacion']));

        $insert2->execute();



        foreach ($insert2->errorInfo() as $error) {

        $errorList .= "$error <br/>"; 

        }

            echo $errorList;

        }catch(Exception $e)

        {

            echo false;

        }

}

else if ($action == "addModificacionProyecto")

{

    try

    {        

        /*  

            cambiosRelevantes: $("#cambiosRelevantes").val(), 

            nivelPersonal: $("#nivelPersonal").val(), 

            nivelFinanciero: $("#nivelFinanciero").val(), 

            nivelOperativo: $("#nivelOperativo").val(), 

            otrosModificaciones: $("#otrosModificaciones").val(), 

            idRelacion : $("#idRelacionProyecto").val(),



        */

        $query2 = "INSERT INTO monitor_modificacion_mensual 

        (cambio_relevantes , nivel_depersonal ,nivel_financiero, nivel_operativo ,especifique_otros, user_creador , id_ficha_encabezado) 

        VALUES (:n1, :n2,:n3,:n4,:n5,:n6,:n7)";

        $insert2 = $net_rrhh->prepare($query2);

        $insert2->bindParam(':n1', htmlspecialchars($_POST['cambiosRelevantes']));

        $insert2->bindParam(':n2', htmlspecialchars($_POST['nivelPersonal']));

        $insert2->bindParam(':n3', htmlspecialchars($_POST['nivelFinanciero']));

        $insert2->bindParam(':n4', htmlspecialchars($_POST['nivelOperativo']));

        $insert2->bindParam(':n5', htmlspecialchars($_POST['otrosModificaciones']));

        $insert2->bindParam(':n6', htmlspecialchars($idEmpleado));

        $insert2->bindParam(':n7', htmlspecialchars($_POST['idRelacion']));

        $insert2->execute();



        foreach ($insert2->errorInfo() as $error) {

        $errorList .= "$error <br/>"; 

        }

            echo $errorList;

        }catch(Exception $e)

        {

            echo false;

        }

}

else if ($action == "addBuenasPracticas")

{

    try

    {        

        /*  

                logrosSuperados: $("#logrosSuperados").val(), 

                buenasPracticas: $("#buenasPracticas").val(), 

                obstaculos: $("#obstaculos").val(), 

                comentarios: $("#comentarios").val(), 

                idRelacion : $("#idRelacionProyecto").val(),



        */

        $query2 = "INSERT INTO monitor_buenas_practicas 

        (logros_superados , buenas_practicas ,observaciones_problemas, otros_comentarios, user_creador , id_ficha_encabezado) 

        VALUES (:n1, :n2,:n3,:n4,:n5,:n6)";

        $insert2 = $net_rrhh->prepare($query2);

        $insert2->bindParam(':n1', htmlspecialchars($_POST['logrosSuperados']));

        $insert2->bindParam(':n2', htmlspecialchars($_POST['buenasPracticas']));

        $insert2->bindParam(':n3', htmlspecialchars($_POST['obstaculos']));

        $insert2->bindParam(':n4', htmlspecialchars($_POST['comentarios']));

        $insert2->bindParam(':n5', htmlspecialchars($idEmpleado));

        $insert2->bindParam(':n6', htmlspecialchars($_POST['idRelacion']));

        $insert2->execute();



        foreach ($insert2->errorInfo() as $error) {

        $errorList .= "$error <br/>"; 

        }

            echo $errorList;

        }catch(Exception $e)

        {

            echo false;

        }

}

else if($action == "actualizarMeta")

{

    try

    {        

        /*  

                logrosSuperados: $("#logrosSuperados").val(), 

                buenasPracticas: $("#buenasPracticas").val(), 

                obstaculos: $("#obstaculos").val(), 

                comentarios: $("#comentarios").val(), 

                idRelacion : $("#idRelacionProyecto").val(),



        */

        if($_POST['metaTerminada']=="SI")

        {

            $query2 = "UPDATE monitor_metas_actividades set  estado = 1 where id = :n1";

            $insert2 = $net_rrhh->prepare($query2);

            $insert2->bindParam(':n1', htmlspecialchars($_POST['nombreActividad']));

            $insert2->execute();

    

            foreach ($insert2->errorInfo() as $error)

            {

                $errorList .= "$error <br/>"; 

            }

                echo $errorList;

        }

        else

        {

            $query2 = "UPDATE monitor_metas_actividades set  estado = 0 where id = :n1";

            $insert2 = $net_rrhh->prepare($query2);

            $insert2->bindParam(':n1', htmlspecialchars($_POST['nombreActividad']));

            $insert2->execute();

    

            foreach ($insert2->errorInfo() as $error)

            {

                $errorList .= "$error <br/>"; 

            }

                echo $errorList;

        }

        

    }

    catch(Exception $e)

    {

        echo false;

    }  

}

else if($action == "addFichaDetalle")

{

    try

    {        

        /*      

                fhInforme: $("#fhInforme").val(), 

                numeroInforme: $("#numeroInforme").val(), 

                responsablePrime: $("#responsablePrime").val(), 

                contactoPrimer: $("#contactoPrimer").val(), 

                indicador: $("#indicador").val(), 

                resultado: $("#resultado").val(), 

                objetivos: $("#objetivos").val(), 

                actividades: $("#actividades").val(), 

                idRelacion : $("#idRelacionProyecto").val(),



                 idsharepoint: $("#idsharepoint").val(),

                idbitrix : $("#idbitrix").val(),



        */

        $query2 = "INSERT INTO monitor_detalle_general 

        (fh_informe  , numero_informe ,nombre_coordinador_prime, contacto_coordinador_prime, user_creador , id_ficha_encabezado,

         proyecto_indicador,proyecto_resultados,proyecto_objetivos, proyecto_actividades) 

        VALUES (:n1, :n2,:n3,:n4,:n5,:n6,:n7,:n8,:n9,:n10)";

        $insert2 = $net_rrhh->prepare($query2);

        $insert2->bindParam(':n1', htmlspecialchars($_POST['fhInforme']));

        $insert2->bindParam(':n2', htmlspecialchars($_POST['numeroInforme']));

        $insert2->bindParam(':n3', htmlspecialchars($_POST['responsablePrime']));

        $insert2->bindParam(':n4', htmlspecialchars($_POST['contactoPrimer']));

        $insert2->bindParam(':n5', htmlspecialchars($idEmpleado));

        $insert2->bindParam(':n6', htmlspecialchars($_POST['idRelacion']));

        $insert2->bindParam(':n7', htmlspecialchars($_POST['indicador']));

        $insert2->bindParam(':n8', htmlspecialchars($_POST['resultado']));

        $insert2->bindParam(':n9', htmlspecialchars($_POST['objetivos']));

        $insert2->bindParam(':n10', htmlspecialchars($_POST['actividades']));

        $insert2->execute();



        foreach ($insert2->errorInfo() as $error) {

        $errorList .= "$error <br/>"; 

        }

            echo $errorList;



            try{

                $query3 = "INSERT INTO monitor_documentacion_proyecto 

                (sharepoint  , bitrix , user_creador, id_generalidad_proyecto) 

                VALUES (:n1, :n2,:n3,:n4)";

                $insert3 = $net_rrhh->prepare($query3);

                $insert3->bindParam(':n1', htmlspecialchars($_POST['idsharepoint']));

                $insert3->bindParam(':n2', htmlspecialchars($_POST['idbitrix']));

                $insert3->bindParam(':n3', htmlspecialchars($idEmpleado));

                $insert3->bindParam(':n4', htmlspecialchars($_POST['idRelacion']));

                $insert3->execute();

                foreach ($insert3->errorInfo() as $error) {

                $errorList2 .= "$error <br/>"; 

                }

                echo "error en los documentos".$errorList2;

            }

            catch(Exception $e)

            {

                echo "ERROR AL INGRESAR DOCUMENTACION ".$e->getMessage();

            }

           

        }catch(Exception $e)

        {

            echo false;

        }



        

}

else if($action == "extraerDescripcion")

{

    try{

        //echo $_POST['selectedValue'];

        $query = "SELECT * FROM monitor_lista_presupuestaria where id = ?";

        $data3 = $net_rrhh->prepare($query);

        $data3->execute([$_POST['selectedValue']]);

        /*foreach ($data3->errorInfo() as $error) {

            $error .= "$error <br/>"; 

            }*/

        //  echo "error en los documentos".$error;

        while ($data = $data3->fetch()) {

            $valorLista = $data[2];

        }

        echo $valorLista;

    }catch(Exception $e)

    {

        echo $e->getMessage();

    }

    

}

else if($action == "extrarMontoLista")

{

    $valorLista = 0;

    //echo "Buenas tardes";

    //echo $_POST['selectedValue'];monitor_avance_financiero



    //SELECT COUNT(*) AS cantidad_registros FROM monitor_lista_presupuestaria WHERE id = ?





    $query = "SELECT COUNT(*) AS cantidad_registros FROM monitor_avance_financiero WHERE idListaPresupuestaria  = ?";

    $data = $net_rrhh->prepare($query);

    $data->execute([$_POST['selectedValue']]);

    $result = $data->fetch(PDO::FETCH_ASSOC);



    $cantidadRegistros = $result['cantidad_registros'];

    //echo $cantidadRegistros;





    if($cantidadRegistros <= 0)

    {



        $query = "SELECT * FROM monitor_lista_presupuestaria where id = ?";

        $data3 = $net_rrhh->prepare($query);

        $data3->execute([$_POST['selectedValue']]);

        foreach ($data3->errorInfo() as $error) {

            $error .= "$error <br/>"; 

            }

        //  echo "error en los documentos".$error;

        while ($data = $data3->fetch()) {

        $valorLista = $data[3];

        }

        echo $valorLista;

    }

    else

    {

        $query = "SELECT * FROM monitor_avance_financiero WHERE idListaPresupuestaria= ?";

        $data4 = $net_rrhh->prepare($query);

        $data4->execute([$_POST['selectedValue']]);

        while ($data = $data4->fetch()) {

            $RESTANTE = $data[2];

        }

        echo $RESTANTE;

        // $porcentaje = (100*($sumador+$_POST['logradoMes']))/($MONTO);

    }





}

else if ($action == "previstoMes")

{

    $valorLista = 0;

    //echo "Buenas tardes";

    //echo $_POST['selectedValue'];monitor_avance_financiero



//SELECT COUNT(*) AS cantidad_registros FROM monitor_lista_presupuestaria WHERE id = ?





$query = "SELECT COUNT(*) AS cantidad_registros FROM monitor_avance_financiero_historial WHERE idListaPresupuestaria  = ?";

$data = $net_rrhh->prepare($query);

$data->execute([$_POST['selectedValue']]);

$result = $data->fetch(PDO::FETCH_ASSOC);



$cantidadRegistros = $result['cantidad_registros'];

//echo $cantidadRegistros;





if($cantidadRegistros <= 0)

{



    echo 0;

}

else

{

     



     $query = "SELECT * FROM monitor_avance_financiero_historial WHERE idListaPresupuestaria= ?";

     $data4 = $net_rrhh->prepare($query);

     $data4->execute([$_POST['selectedValue']]);

     while ($data = $data4->fetch()) {

         $RESTANTE = $data[4];

     }

     echo $RESTANTE;

    // $porcentaje = (100*($sumador+$_POST['logradoMes']))/($MONTO);

}



}

?>