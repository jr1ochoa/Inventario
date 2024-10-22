<?php 
$idEmpleado =  $_SESSION['iu'];
if($action == "addFichaGeneral"){
    if($_POST['cboDepartment'] == "San Miguel")
    {
        $valorSede = "San Miguel";
    }
    else if ($_POST['cboDepartment']== "Santa Ana")
    {
        $valorSede = "Santa Ana";
    }
    else if($_POST['cboDepartment']== "San Salvador")
    {
        $valorSede = "Soyapango";
    }
    else {
        $valorSede = 'N/A';
    }
    
    try{
       
            $query = "INSERT INTO proyecto_mapeo_comunidades  
            VALUES(Null, :n1, :n2,:n3,:n4,:n5,:n6,:n7,:n8,:n9,:n10,:n11, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, :n12,:n13,:n14,:n15,:n16,:n17)";
            $insert = $net_rrhh->prepare($query);
            $insert->bindParam(':n1', htmlspecialchars($_POST['cboDepartment']));
            $insert->bindParam(':n2', htmlspecialchars($_POST['cboMunicipality']));
            $insert->bindParam(':n3', htmlspecialchars($_POST['nombreComunidad']));
            $insert->bindParam(':n4', htmlspecialchars($_POST['radio']));
            $insert->bindParam(':n5', htmlspecialchars($_POST['ubicacion']));
            $insert->bindParam(':n6', htmlspecialchars($_POST['coordenadas']));
            $insert->bindParam(':n7', htmlspecialchars($_POST['totalviviendas']));
            $insert->bindParam(':n8', htmlspecialchars($_POST['casacomunal']));
            $insert->bindParam(':n9', htmlspecialchars($_POST['centroalcance']));
            $insert->bindParam(':n10', htmlspecialchars(''));
            $insert->bindParam(':n11', htmlspecialchars($valorSede));//
            $insert->bindParam(':n12', htmlspecialchars(1));
            $insert->bindParam(':n13', htmlspecialchars($idEmpleado));
            $insert->bindParam(':n14', htmlspecialchars($_POST['OBSERVACIONES']));
            $insert->bindParam(':n15', htmlspecialchars($_POST['descripcionCasaComunal']));//typecomunidad
            $insert->bindParam(':n16', htmlspecialchars($_POST['typecomunidad']));//radio2
            $insert->bindParam(':n17', htmlspecialchars($_POST['radio2']));
            $insert->execute();
            //echo true;
            foreach ($insert->errorInfo() as $error) {
                $errorList .= "$error <br/>"; 
                }
                    echo $errorList;
        
    }catch(Exception $e)
    {
         echo $e->getMessage();
    }   
}
else if($action == "updateFichaGeneral")
{
    /*
        nombreComunidad: $("#nombreComunidad").val(), 
        radio: $("#radio").val(), 
        ubicacion : $("#ubicacion").val(),
        coordenadas : $("#coordenadas").val(),
        totalviviendas : $("#totalviviendas").val(),
        casacomunal : $("#casacomunal").val(),
        centroalcance : $("#centroalcance").val(),
        OBSERVACIONES: $("#OBSERVACIONES").val(),
        descripcionCasaComunal: $("#descripcionCasaComunal").val(),
        idRelacionProyecto: $("#idRelacionProyecto").val()
    
    */
    
    try{
       
          
        if($_POST['cboDepartment'] == "MM")
        {
            $valorDepart = $_POST['departamentoActual'];
        }
        else
        {
            $valorDepart = $_POST['cboDepartment'];
        }
        
        
        if ($_POST['typecomunidad']== "MM")
        {
            $valorComunidad = $_POST['nombreComunidad'];
        }
        else 
        {
            $valorComunidad = $_POST['typecomunidad'];
        }


        if ($_POST['radio']== "MM")
        {
            $valorRadio = $_POST['radioaCTUAL'];
        }
        else 
        {
            $valorRadio = $_POST['radio'];
        }


            $query = "UPDATE proyecto_mapeo_comunidades SET  departamento =:n13,
            nombre_comunidad = :n1, radio = :n2, ubicacion = :n3, coordenadas = :n4, 
            total_viviendas = :n5, descripcion_casa = :n9, centro_alcances = :n7, 
            fh_actualizacion = CURRENT_TIMESTAMP, observacion = :n8 , tipoComunidad  =:n11
            ,radioEscrito =:n12
            WHERE id = :n10";
 
            $insert = $net_rrhh->prepare($query);
            $insert->bindParam(':n1', htmlspecialchars($_POST['nombreComunidad']));
            $insert->bindParam(':n2', htmlspecialchars($valorRadio));
            $insert->bindParam(':n3', htmlspecialchars($_POST['ubicacion']));
            $insert->bindParam(':n4', htmlspecialchars($_POST['coordenadas']));
            $insert->bindParam(':n5', htmlspecialchars($_POST['totalviviendas']));
            $insert->bindParam(':n7', htmlspecialchars($_POST['centroalcance']));
            $insert->bindParam(':n8', htmlspecialchars($_POST['OBSERVACIONES']));
            $insert->bindParam(':n9', htmlspecialchars($_POST['descripcionCasaComunal']));
            $insert->bindParam(':n10', htmlspecialchars($_POST['idRelacionProyecto']));//
            $insert->bindParam(':n11', htmlspecialchars($valorComunidad));//
            $insert->bindParam(':n12', htmlspecialchars($_POST['distancia']));//valorDepart
            $insert->bindParam(':n13', htmlspecialchars($valorDepart));//valorDepart
            $insert->execute();

            //echo true;
            foreach ($insert->errorInfo() as $error) {
                $errorList .= "$error <br/>"; 
                }
                    echo $errorList;
        
    }catch(Exception $e)
    {
        echo false;
    }  
}
else if($action == "deleteFichaGeneral")
{
    try{
        $query = "UPDATE proyecto_mapeo_comunidades SET 
        estado  = 0        WHERE id = :n1";

        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['idEncabezadoDelete']));
       
        $insert->execute();
        //echo true;
        foreach ($insert->errorInfo() as $error)
        {
            $errorList .= "$error <br/>"; 
        }
        echo $errorList;
    
    }
    catch(Exception $e)
    {
        echo false;
    }  
}
else if($action == "updateOrganizacionOtros")
{
    /*
            :::::::::::::::::::::::::::::::::::::::::::::::::::::
            :::::::::: ORGANIZACIONES OTRAS     ::::::::::::::
            :::::::::::::::::::::::::::::::::::::::::::::::::::::

             nombreOrganizacion: $("#nombreOrganizacion").val(), 
                clasificacion: $("#clasificacion").val(), 
                idRelacionProyecto: $("#idRelacionProyecto").val()
    */
    echo  "SELECCION DE TIPO: ".$_POST['tipoSeleccion'];
    if($_POST['tipoSeleccion'] == "SELECCIONE")
    {

        try{
            $query = "UPDATE proyecto_mapeo_comunidades_otros SET 
            descripcion  = :n1, nombreEmpresa =:n2
            WHERE id = :n3";
    
            $insert = $net_rrhh->prepare($query);
            $insert->bindParam(':n1', htmlspecialchars($_POST['descripcionOtros']));
            $insert->bindParam(':n2', htmlspecialchars($_POST['nombreOtros']));
            //$insert->bindParam(':n2', htmlspecialchars($_POST['linkSiges']));
            $insert->bindParam(':n3', htmlspecialchars($_POST['idRelacionProyecto']));
            $insert->execute();
            //echo true;
            foreach ($insert->errorInfo() as $error)
            {
                $errorList .= "$error <br/>"; 
            }
            echo $errorList;
        
        }
        catch(Exception $e)
        {
            echo false;
        }  

    }
    else
    {
    try{
       
       $query = "UPDATE proyecto_mapeo_comunidades_otros SET 
        descripcion  = :n1, nombre = :n2, nombreEmpresa = :n4
        WHERE id = :n3";

        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['descripcionAuto']));
        $insert->bindParam(':n2', htmlspecialchars($_POST['tipoSeleccion']));
        $insert->bindParam(':n4', htmlspecialchars($_POST['nombreOtros']));
        $insert->bindParam(':n3', htmlspecialchars($_POST['idRelacionProyecto']));
        $insert->execute();
        //echo true;
        foreach ($insert->errorInfo() as $error)
        {
            $errorList .= "$error <br/>"; 
        }
        echo $errorList;
    
    }
    catch(Exception $e)
    {
        echo false;
    }  
    }
}
//::::::: ELIMINAR COMUNIDADES OTRAS ::::::::::::::::::
else if($action == "deleteOrganizacionOtros")
{
    /*
            :::::::::::::::::::::::::::::::::::::::::::::::::::::
            :::::::::: ORGANIZACIONES OTRAS     ::::::::::::::
            :::::::::::::::::::::::::::::::::::::::::::::::::::::

             nombreOrganizacion: $("#nombreOrganizacion").val(), 
                clasificacion: $("#clasificacion").val(), 
                idRelacionProyecto: $("#idRelacionProyecto").val()
    */
    
        try{
            $query = "UPDATE proyecto_mapeo_comunidades_otros SET 
            estado = 0
            WHERE id = :n3";
    
            $insert = $net_rrhh->prepare($query);
            //$insert->bindParam(':n1', htmlspecialchars($_POST['descripcionOtros']));
            //$insert->bindParam(':n2', htmlspecialchars($_POST['nombreOtros']));
            //$insert->bindParam(':n2', htmlspecialchars($_POST['linkSiges']));
            $insert->bindParam(':n3', htmlspecialchars($_POST['idRelacionProyecto']));
            $insert->execute();
            //echo true;
            foreach ($insert->errorInfo() as $error)
            {
                $errorList .= "$error <br/>"; 
            }
            echo $errorList;
        
        }
        catch(Exception $e)
        {
            echo false;
        }  

   
}
else if($action == "updateOrganizacionAuto")
{
    /*
            :::::::::::::::::::::::::::::::::::::::::::::::::::::
            :::::::::: ORGANIZACIONES AUTONOMAS    ::::::::::::::
            :::::::::::::::::::::::::::::::::::::::::::::::::::::

             nombreOrganizacion: $("#nombreOrganizacion").val(), 
                clasificacion: $("#clasificacion").val(), 
                idRelacionProyecto: $("#idRelacionProyecto").val()
    */
    echo  "SELECCION DE TIPO: ".$_POST['tipoSeleccion'];
    if($_POST['tipoSeleccion'] == "SELECCIONE")
    {

        try{
            $query = "UPDATE proyecto_mapeo_comunidades_instituciones_autonomas SET 
            descripcion  = :n1
            WHERE id = :n3";
    
            $insert = $net_rrhh->prepare($query);
            $insert->bindParam(':n1', htmlspecialchars($_POST['descripcionAuto']));
            //$insert->bindParam(':n2', htmlspecialchars($_POST['linkSiges']));
            $insert->bindParam(':n3', htmlspecialchars($_POST['idRelacionProyecto']));
            $insert->execute();
            //echo true;
            foreach ($insert->errorInfo() as $error)
            {
                $errorList .= "$error <br/>"; 
            }
            echo $errorList;
        
        }
        catch(Exception $e)
        {
            echo false;
        }  

    }
    else
    {
    try{
       
       $query = "UPDATE proyecto_mapeo_comunidades_instituciones_autonomas SET 
        descripcion  = :n1, nombre = :n2
        WHERE id = :n3";

        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['descripcionAuto']));
        $insert->bindParam(':n2', htmlspecialchars($_POST['tipoSeleccion']));
        $insert->bindParam(':n3', htmlspecialchars($_POST['idRelacionProyecto']));
        $insert->execute();
        //echo true;
        foreach ($insert->errorInfo() as $error)
        {
            $errorList .= "$error <br/>"; 
        }
        echo $errorList;
    
    }
    catch(Exception $e)
    {
        echo false;
    }  
    }
}
//:::::::::: ELIMINAR ORGANIZACIONES AUTONOMAS :::::::::::::::::::::::::
else if($action == "deleteOrganizacionAuto")
{
    /*
            :::::::::::::::::::::::::::::::::::::::::::::::::::::
            :::::::::: ORGANIZACIONES AUTONOMAS    ::::::::::::::
            :::::::::::::::::::::::::::::::::::::::::::::::::::::

             nombreOrganizacion: $("#nombreOrganizacion").val(), 
                clasificacion: $("#clasificacion").val(), 
                idRelacionProyecto: $("#idRelacionProyecto").val()
    */
    
        try{
            $query = "UPDATE proyecto_mapeo_comunidades_instituciones_autonomas SET 
            estado = 0
            WHERE id = :n3";
    
            $insert = $net_rrhh->prepare($query);
            //$insert->bindParam(':n1', htmlspecialchars($_POST['descripcionAuto']));
            //$insert->bindParam(':n2', htmlspecialchars($_POST['linkSiges']));
            $insert->bindParam(':n3', htmlspecialchars($_POST['idRelacionProyecto']));
            $insert->execute();
            //echo true;
            foreach ($insert->errorInfo() as $error)
            {
                $errorList .= "$error <br/>"; 
            }
            echo $errorList;
        
        }
        catch(Exception $e)
        {
            echo false;
        }  

   
}
else if($action == "updateOrganizacionSocial")
{
    /*
            :::::::::::::::::::::::::::::::::::::::::::::::::::::
            :::::::::: ORGANIZACIONES SOCIALES     ::::::::::::::
            :::::::::::::::::::::::::::::::::::::::::::::::::::::

             nombreOrganizacion: $("#nombreOrganizacion").val(), 
                clasificacion: $("#clasificacion").val(), 
                idRelacionProyecto: $("#idRelacionProyecto").val()
    */
    echo  "SELECCION DE TIPO: ".$_POST['tipoSeleccion'];
    if($_POST['tipoSeleccion'] == "SELECCIONE")
    {

        try{
            $query = "UPDATE proyecto_mapeo_comunidades_organizaciones_sociales SET 
            descripcion  = :n1, nombreOrganizacion = :n2
            WHERE id = :n3";
    
            $insert = $net_rrhh->prepare($query);
            $insert->bindParam(':n1', htmlspecialchars($_POST['descripcionSocial']));
            $insert->bindParam(':n2', htmlspecialchars($_POST['nombreOrgasOCIAL']));
            $insert->bindParam(':n3', htmlspecialchars($_POST['idRelacionProyecto']));
            $insert->execute();
            //echo true;
            foreach ($insert->errorInfo() as $error)
            {
                $errorList .= "$error <br/>"; 
            }
            echo $errorList;
        
        }
        catch(Exception $e)
        {
            echo false;
        }  

    }
    else
    {
    try{
       
       $query = "UPDATE proyecto_mapeo_comunidades_organizaciones_sociales SET 
        descripcion  = :n1, nombre = :n2
        WHERE id = :n3";

        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['descripcionSocial']));
        $insert->bindParam(':n2', htmlspecialchars($_POST['tipoSeleccion']));
        $insert->bindParam(':n3', htmlspecialchars($_POST['idRelacionProyecto']));
        $insert->execute();
        //echo true;
        foreach ($insert->errorInfo() as $error)
        {
            $errorList .= "$error <br/>"; 
        }
        echo $errorList;
    
    }
    catch(Exception $e)
    {
        echo false;
    }  
    }
}
//::::::: ELIMINAR ORGANIZACION SOCIAL ::::::::::::::::::::
else if($action == "deleteOrganizacionSocial")
{
    /*
            :::::::::::::::::::::::::::::::::::::::::::::::::::::
            :::::::::: ORGANIZACIONES SOCIALES     ::::::::::::::
            :::::::::::::::::::::::::::::::::::::::::::::::::::::

             nombreOrganizacion: $("#nombreOrganizacion").val(), 
                clasificacion: $("#clasificacion").val(), 
                idRelacionProyecto: $("#idRelacionProyecto").val()
    */
    
        try{
            $query = "UPDATE proyecto_mapeo_comunidades_organizaciones_sociales SET 
            estado = 0
            WHERE id = :n3";
    
            $insert = $net_rrhh->prepare($query);
            //$insert->bindParam(':n1', htmlspecialchars($_POST['descripcionSocial']));
            //$insert->bindParam(':n2', htmlspecialchars($_POST['linkSiges']));
            $insert->bindParam(':n3', htmlspecialchars($_POST['idRelacionProyecto']));
            $insert->execute();
            //echo true;
            foreach ($insert->errorInfo() as $error)
            {
                $errorList .= "$error <br/>"; 
            }
            echo $errorList;
        
        }
        catch(Exception $e)
        {
            echo false;
        }  

    
    
}
else if($action == "updateOrganizacionGubernamentales")
{
    /*
            :::::::::::::::::::::::::::::::::::::::::::::::::::::
            :::::::::: ORGANIZACION GUBERNAMENTALES ::::::::::::::
            :::::::::::::::::::::::::::::::::::::::::::::::::::::

             nombreOrganizacion: $("#nombreOrganizacion").val(), 
                clasificacion: $("#clasificacion").val(), 
                idRelacionProyecto: $("#idRelacionProyecto").val()
    */
    echo  "SELECCION DE TIPO: ".$_POST['tipoSeleccion'];
    if($_POST['tipoSeleccion'] == "SELECCIONE")
    {

        try{
            $query = "UPDATE proyecto_mapeo_comunidades_organizaciones_gubernamentales SET 
            descripcion  = :n1
            WHERE id = :n3";
    
            $insert = $net_rrhh->prepare($query);
            $insert->bindParam(':n1', htmlspecialchars($_POST['descripcionGubernametal']));
            //$insert->bindParam(':n2', htmlspecialchars($_POST['linkSiges']));
            $insert->bindParam(':n3', htmlspecialchars($_POST['idRelacionProyecto']));
            $insert->execute();
            //echo true;
            foreach ($insert->errorInfo() as $error)
            {
                $errorList .= "$error <br/>"; 
            }
            echo $errorList;
        
        }
        catch(Exception $e)
        {
            echo false;
        }  

    }
    else
    {
    try{
       
       $query = "UPDATE proyecto_mapeo_comunidades_organizaciones_gubernamentales SET 
        descripcion  = :n1, nombre = :n2
        WHERE id = :n3";

        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['descripcionGubernametal']));
        $insert->bindParam(':n2', htmlspecialchars($_POST['tipoSeleccion']));
        $insert->bindParam(':n3', htmlspecialchars($_POST['idRelacionProyecto']));
        $insert->execute();
        //echo true;
        foreach ($insert->errorInfo() as $error)
        {
            $errorList .= "$error <br/>"; 
        }
        echo $errorList;
    
    }
    catch(Exception $e)
    {
        echo false;
    }  
    }
}
//:::::::::::::: Eliminar organizaciones Gubernamentales :::::::::::::::::
else if($action == "deleteOrganizacionGubernamentales")
{
    /*
            :::::::::::::::::::::::::::::::::::::::::::::::::::::
            :::::::::: ORGANIZACION GUBERNAMENTALES ::::::::::::::
            :::::::::::::::::::::::::::::::::::::::::::::::::::::

             nombreOrganizacion: $("#nombreOrganizacion").val(), 
                clasificacion: $("#clasificacion").val(), 
                idRelacionProyecto: $("#idRelacionProyecto").val()
    */
    

        try{
            $query = "UPDATE proyecto_mapeo_comunidades_organizaciones_gubernamentales SET 
           estado = 0
            WHERE id = :n3";
    
            $insert = $net_rrhh->prepare($query);
           // $insert->bindParam(':n1', htmlspecialchars($_POST['descripcionGubernametal']));
            //$insert->bindParam(':n2', htmlspecialchars($_POST['linkSiges']));
            $insert->bindParam(':n3', htmlspecialchars($_POST['idRelacionProyecto']));
            $insert->execute();
            //echo true;
            foreach ($insert->errorInfo() as $error)
            {
                $errorList .= "$error <br/>"; 
            }
            echo $errorList;
        
        }
        catch(Exception $e)
        {
            echo false;
        }  

    
    
}
else if($action == "updateNecesidadComunitaria")
{
    /*
            :::::::::::::::::::::::::::::::::::::::::::::::::::::
            :::::::::: NECESIDAD  COMUNITARIAS ::::::::::::::
            :::::::::::::::::::::::::::::::::::::::::::::::::::::

             nombreOrganizacion: $("#nombreOrganizacion").val(), 
                clasificacion: $("#clasificacion").val(), 
                idRelacionProyecto: $("#idRelacionProyecto").val()
    */
    echo  "SELECCION DE TIPO: ".$_POST['tipoSeleccion'];
    if($_POST['tipoSeleccion'] == "SELECCIONE")
    {

        try{
            $query = "UPDATE proyecto_mapeo_comunidades_necesidades SET 
            descripcion  = :n1
            WHERE id = :n3";
    
            $insert = $net_rrhh->prepare($query);
            $insert->bindParam(':n1', htmlspecialchars($_POST['descripcionNecesidades']));
            //$insert->bindParam(':n2', htmlspecialchars($_POST['linkSiges']));
            $insert->bindParam(':n3', htmlspecialchars($_POST['idRelacionProyecto']));
            $insert->execute();
            //echo true;
            foreach ($insert->errorInfo() as $error)
            {
                $errorList .= "$error <br/>"; 
            }
            echo $errorList;
        
        }
        catch(Exception $e)
        {
            echo false;
        }  

    }
    else
    {
    try{
       
       $query = "UPDATE proyecto_mapeo_comunidades_necesidades SET 
        descripcion  = :n1, tipos = :n2
        WHERE id = :n3";

        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['descripcionNecesidades']));
        $insert->bindParam(':n2', htmlspecialchars($_POST['tipoSeleccion']));
        $insert->bindParam(':n3', htmlspecialchars($_POST['idRelacionProyecto']));
        $insert->execute();
        //echo true;
        foreach ($insert->errorInfo() as $error)
        {
            $errorList .= "$error <br/>"; 
        }
        echo $errorList;
    
    }
    catch(Exception $e)
    {
        echo false;
    }  
    }
}

//:::::::::: ELIMINAR NECESIDADES COMUNITARIAS :::::::::::::::::::

else if($action == "deleteNecesidadComunitaria")
{
    /*
            :::::::::::::::::::::::::::::::::::::::::::::::::::::
            :::::::::: NECESIDAD  COMUNITARIAS ::::::::::::::
            :::::::::::::::::::::::::::::::::::::::::::::::::::::

             nombreOrganizacion: $("#nombreOrganizacion").val(), 
                clasificacion: $("#clasificacion").val(), 
                idRelacionProyecto: $("#idRelacionProyecto").val()
    */
    
        try{
            $query = "UPDATE proyecto_mapeo_comunidades_necesidades SET 
            estado = 0
            WHERE id = :n3";
    
            $insert = $net_rrhh->prepare($query);
           // $insert->bindParam(':n1', htmlspecialchars($_POST['descripcionNecesidades']));
            //$insert->bindParam(':n2', htmlspecialchars($_POST['linkSiges']));
            $insert->bindParam(':n3', htmlspecialchars($_POST['idRelacionProyecto']));
            $insert->execute();
            //echo true;
            foreach ($insert->errorInfo() as $error)
            {
                $errorList .= "$error <br/>"; 
            }
            echo $errorList;
        
        }
        catch(Exception $e)
        {
            echo false;
        }  

    
}


else if($action == "updateOrganizacionComunitaria")
{
    /*
            :::::::::::::::::::::::::::::::::::::::::::::::::::::
            :::::::::: ORGANIZACIONES COMUNITARIAS ::::::::::::::
            :::::::::::::::::::::::::::::::::::::::::::::::::::::

             nombreOrganizacion: $("#nombreOrganizacion").val(), 
                clasificacion: $("#clasificacion").val(), 
                idRelacionProyecto: $("#idRelacionProyecto").val()
    */
    echo  "SELECCION DE TIPO: ".$_POST['tipoSeleccion'];
    if($_POST['tipoSeleccion'] == "SELECCIONE")
    {

        try{
            $query = "UPDATE proyecto_mapeo_comunidades_organizaciones_comunitarias SET 
            nombre  = :n1
            WHERE id = :n3";
    
            $insert = $net_rrhh->prepare($query);
            $insert->bindParam(':n1', htmlspecialchars($_POST['nombreOrganizacion']));
            //$insert->bindParam(':n2', htmlspecialchars($_POST['linkSiges']));
            $insert->bindParam(':n3', htmlspecialchars($_POST['idRelacionProyecto']));
            $insert->execute();
            //echo true;
            foreach ($insert->errorInfo() as $error)
            {
                $errorList .= "$error <br/>"; 
            }
            echo $errorList;
        
        }
        catch(Exception $e)
        {
            echo false;
        }  

    }
    else
    {
    try{
       
       $query = "UPDATE proyecto_mapeo_comunidades_organizaciones_comunitarias SET 
        nombre  = :n1, tipos = :n2
        WHERE id = :n3";

        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['nombreOrganizacion']));
        $insert->bindParam(':n2', htmlspecialchars($_POST['tipoSeleccion']));
        $insert->bindParam(':n3', htmlspecialchars($_POST['idRelacionProyecto']));
        $insert->execute();
        //echo true;
        foreach ($insert->errorInfo() as $error)
        {
            $errorList .= "$error <br/>"; 
        }
        echo $errorList;
    
    }
    catch(Exception $e)
    {
        echo false;
    }  
    }
}
//::::::::: Eliminar ORGANIZACIONES Comunitarias :::::::::::::::
else if($action == "deleteOrganizacionComunitaria")
{
    /*
            :::::::::::::::::::::::::::::::::::::::::::::::::::::
            :::::::::: ORGANIZACIONES COMUNITARIAS ::::::::::::::
            :::::::::::::::::::::::::::::::::::::::::::::::::::::

             nombreOrganizacion: $("#nombreOrganizacion").val(), 
                clasificacion: $("#clasificacion").val(), 
                idRelacionProyecto: $("#idRelacionProyecto").val()
    */
    
    try{
       
       $query = "UPDATE proyecto_mapeo_comunidades_organizaciones_comunitarias SET 
       estado = 0
        WHERE id = :n3";

        $insert = $net_rrhh->prepare($query);
        //$insert->bindParam(':n1', htmlspecialchars($_POST['nombreOrganizacion']));
        //$insert->bindParam(':n2', htmlspecialchars($_POST['tipoSeleccion']));
        $insert->bindParam(':n3', htmlspecialchars($_POST['idRelacionProyecto']));
        $insert->execute();
        //echo true;
        foreach ($insert->errorInfo() as $error)
        {
            $errorList .= "$error <br/>"; 
        }
        echo $errorList;
    
    }
    catch(Exception $e)
    {
        echo false;
    }  
    
}


else if($action == "updateZonasVerdes")
{
    /*
            :::::::::::::::::::::::::::::::::::::::
            ::::::::::  ZONAS VERDES ::::::::::::::
            :::::::::::::::::::::::::::::::::::::::
    */
    echo  "SELECCION DE TIPO: ".$_POST['tipoSeleccion'];
    if($_POST['tipoSeleccion'] == "SELECCIONE")
    {

        try{
            $query = "UPDATE proyecto_mapeo_comunidades_zonas_verdes SET 
            cantidad  = :n1
            WHERE id = :n3";
    
            $insert = $net_rrhh->prepare($query);
            $insert->bindParam(':n1', htmlspecialchars($_POST['cantidadActual']));
            //$insert->bindParam(':n2', htmlspecialchars($_POST['linkSiges']));
            $insert->bindParam(':n3', htmlspecialchars($_POST['idRelacionProyecto']));
            $insert->execute();
            //echo true;
            foreach ($insert->errorInfo() as $error)
            {
                $errorList .= "$error <br/>"; 
            }
            echo $errorList;
        
        }
        catch(Exception $e)
        {
            echo false;
        }  

    }
    else
    {
    try{
       
       $query = "UPDATE proyecto_mapeo_comunidades_zonas_verdes SET 
        cantidad  = :n1, tipos = :n2
        WHERE id = :n3";

        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['cantidadActual']));
        $insert->bindParam(':n2', htmlspecialchars($_POST['tipoSeleccion']));
        $insert->bindParam(':n3', htmlspecialchars($_POST['idRelacionProyecto']));
        $insert->execute();
        //echo true;
        foreach ($insert->errorInfo() as $error)
        {
            $errorList .= "$error <br/>"; 
        }
        echo $errorList;
    
    }
    catch(Exception $e)
    {
        echo false;
    }  
    }
   
}
//::::: ELIMINAR ZONA VERDE :::::::::::::::::::::.
else if($action == "eliminarZonasVerdes")
{
    /*
            :::::::::::::::::::::::::::::::::::::::
            ::::::::::  ZONAS VERDES ::::::::::::::
            :::::::::::::::::::::::::::::::::::::::
    */
    echo  "SELECCION DE TIPO: ".$_POST['tipoSeleccion'];
    
    try{
       
       $query = "UPDATE proyecto_mapeo_comunidades_zonas_verdes SET 
        estado = 0
        WHERE id = :n3";

        $insert = $net_rrhh->prepare($query);
        //$insert->bindParam(':n1', htmlspecialchars($_POST['cantidadActual']));
        //$insert->bindParam(':n2', htmlspecialchars($_POST['tipoSeleccion']));
        $insert->bindParam(':n3', htmlspecialchars($_POST['idRelacionProyecto']));
        $insert->execute();
        //echo true;
        foreach ($insert->errorInfo() as $error)
        {
            $errorList .= "$error <br/>"; 
        }
        echo $errorList;
    
    }
    catch(Exception $e)
    {
        echo false;
    }  
    
   
}
else if($action == "updateFichaCENTROS")
{
   /*
    */
    if($_POST['tipo']=="SELECCIONE")
    {

        try{
            $query = "UPDATE proyecto_mapeo_comunidades_centros_educativos SET 
            nombre  = :n1, link_siges = :n2
            WHERE id = :n3";
    
            $insert = $net_rrhh->prepare($query);
            $insert->bindParam(':n1', htmlspecialchars($_POST['centrosEducativos']));
            $insert->bindParam(':n2', htmlspecialchars($_POST['linkSiges']));
            $insert->bindParam(':n3', htmlspecialchars($_POST['idRelacionProyecto']));
            $insert->execute();
            //echo true;
            foreach ($insert->errorInfo() as $error)
            {
                $errorList .= "$error <br/>"; 
            }
            echo $errorList;
        
        }
        catch(Exception $e)
        {
            echo false;
        }  

    }
    else
    {
    try{
       
       $query = "UPDATE proyecto_mapeo_comunidades_centros_educativos SET 
        nombre  = :n1, link_siges = :n2
        WHERE id = :n3";

        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['centrosEducativos']));
        $insert->bindParam(':n2', htmlspecialchars($_POST['linkSiges']));
        $insert->bindParam(':n2', htmlspecialchars($_POST['linkSiges']));
        $insert->bindParam(':n3', htmlspecialchars($_POST['idRelacionProyecto']));
        $insert->execute();
        //echo true;
        foreach ($insert->errorInfo() as $error)
        {
            $errorList .= "$error <br/>"; 
        }
        echo $errorList;
    
    }
    catch(Exception $e)
    {
        echo false;
    }  
    }
   
}
//ELIMINAR CENTROS EDUCATIVOS ::::::::::::::::::::::::::::::
else if($action == "DELETEFichaCENTROS")
{
   /*
    */
    
    try{
       
       $query = "UPDATE proyecto_mapeo_comunidades_centros_educativos SET 
        estado = 0
        WHERE id = :n3";

        $insert = $net_rrhh->prepare($query);
        //$insert->bindParam(':n1', htmlspecialchars($_POST['centrosEducativos']));
        //$insert->bindParam(':n2', htmlspecialchars($_POST['linkSiges']));
        //$insert->bindParam(':n2', htmlspecialchars($_POST['linkSiges']));
        $insert->bindParam(':n3', htmlspecialchars($_POST['idRelacionProyecto']));
        $insert->execute();
        //echo true;
        foreach ($insert->errorInfo() as $error)
        {
            $errorList .= "$error <br/>"; 
        }
        echo $errorList;
    
    }
    catch(Exception $e)
    {
        echo false;
    }  
    
   
}

else if($action == "updateFichaLideresComunitarios")
{
    try{
       
        $query = "UPDATE proyecto_mapeo_comunidades_lideres SET 
          	nombre   = :n1, contacto  = :n2, cargo = :n3, contacto2 = :n4
         WHERE id = :n5";
 
         $insert = $net_rrhh->prepare($query);
         $insert->bindParam(':n1', htmlspecialchars($_POST['nombreLider']));
         $insert->bindParam(':n2', htmlspecialchars($_POST['contacto1']));
         $insert->bindParam(':n3', htmlspecialchars($_POST['cargo']));
         $insert->bindParam(':n4', htmlspecialchars($_POST['contacto2']));
         $insert->bindParam(':n5', htmlspecialchars($_POST['idRelacionProyecto']));
         $insert->execute();
         //echo true;
         foreach ($insert->errorInfo() as $error)
         {
             $errorList .= "$error <br/>"; 
         }
         echo $errorList;
     
     }
     catch(Exception $e)
     {
         echo false;
     }  
}
//elminar lideres comunitarios  ::::::::::::::::::::::::

else if($action == "deleteFichaLideresComunitarios")
{
    try{
       
        $query = "UPDATE proyecto_mapeo_comunidades_lideres SET 
          	estado = 0
         WHERE id = :n5";
 
         $insert = $net_rrhh->prepare($query);
         //$insert->bindParam(':n1', htmlspecialchars($_POST['nombreLider']));
         //$insert->bindParam(':n2', htmlspecialchars($_POST['contacto1']));
         //$insert->bindParam(':n3', htmlspecialchars($_POST['cargo']));
         //$insert->bindParam(':n4', htmlspecialchars($_POST['contacto2']));
         $insert->bindParam(':n5', htmlspecialchars($_POST['idRelacionProyecto']));
         $insert->execute();
         //echo true;
         foreach ($insert->errorInfo() as $error)
         {
             $errorList .= "$error <br/>"; 
         }
         echo $errorList;
     
     }
     catch(Exception $e)
     {
         echo false;
     }  
}


else if($action == "updateFichaCentrosSalud")
{
    try{
       /*
            nombreCentrosSalud: $("#nombreCentrosSalud").val(), 
            idRelacionProyecto: $("#idRelacionProyecto").val()
       */
        $query = "UPDATE proyecto_mapeo_comunidades_centros_desalud SET 
          	nombre   = :n1
         WHERE id = :n5";
 
         $insert = $net_rrhh->prepare($query);
         $insert->bindParam(':n1', htmlspecialchars($_POST['nombreCentrosSalud']));
         $insert->bindParam(':n5', htmlspecialchars($_POST['idRelacionProyecto']));
         $insert->execute();
         //echo true... 
         foreach ($insert->errorInfo() as $error)
         {
             $errorList .= "$error <br/>"; 
         }
         echo $errorList;
     
     }
     catch(Exception $e)
     {
         echo false;
     }  
}
//ELIMINAR CENTROS DE SALUD
else if($action == "deleteFichaCentrosSalud")
{
    try{
       /*
            nombreCentrosSalud: $("#nombreCentrosSalud").val(), 
            idRelacionProyecto: $("#idRelacionProyecto").val()
       */
        $query = "UPDATE proyecto_mapeo_comunidades_centros_desalud SET 
          	estado = 0
         WHERE id = :n5";
 
         $insert = $net_rrhh->prepare($query);
         //$insert->bindParam(':n1', htmlspecialchars($_POST['nombreCentrosSalud']));
         $insert->bindParam(':n5', htmlspecialchars($_POST['idRelacionProyecto']));
         $insert->execute();
         //echo true... 
         foreach ($insert->errorInfo() as $error)
         {
             $errorList .= "$error <br/>"; 
         }
         echo $errorList;
     
     }
     catch(Exception $e)
     {
         echo false;
     }  
}
else if ($action == "updateFichaCanchas")
{
    
    if($_POST['tipoSeleccionar'] != "SELECCIONE")
    {
        try{
            /*
                nombreCentrosSalud: $("#nombreCentrosSalud").val(), 
                idRelacionProyecto: $("#idRelacionProyecto").val()
            */
            $query = "UPDATE proyecto_mapeo_comunidades_canchas SET 
                cantidad   = :n1, tipos =:n2, comentarios = :n3
            WHERE id = :n5";
    
            $insert = $net_rrhh->prepare($query);
            $insert->bindParam(':n1', htmlspecialchars($_POST['cantidadCanchas']));
            $insert->bindParam(':n2', htmlspecialchars($_POST['tipoSeleccionar']));
            $insert->bindParam(':n5', htmlspecialchars($_POST['idRelacionProyecto']));//comentariosCanchas
            $insert->bindParam(':n3', htmlspecialchars($_POST['comentariosCanchas']));
            $insert->execute();
            //echo true... 
            foreach ($insert->errorInfo() as $error)
            {
                $errorList .= "$error <br/>"; 
            }
            echo $errorList;
        
        }
        catch(Exception $e)
        {
            echo false;
        }  
    }
    else
    {
        try{
            /*
                nombreCentrosSalud: $("#nombreCentrosSalud").val(), 
                idRelacionProyecto: $("#idRelacionProyecto").val()
            */
            $query = "UPDATE proyecto_mapeo_comunidades_canchas SET 
                cantidad   = :n1,comentarios = :n3
            WHERE id = :n5";
    
            $insert = $net_rrhh->prepare($query);
            $insert->bindParam(':n1', htmlspecialchars($_POST['cantidadCanchas']));
            $insert->bindParam(':n5', htmlspecialchars($_POST['idRelacionProyecto']));
            $insert->bindParam(':n3', htmlspecialchars($_POST['comentariosCanchas']));
            $insert->execute();
            //echo true... 
            foreach ($insert->errorInfo() as $error)
            {
                $errorList .= "$error <br/>"; 
            }
            echo $errorList;
        
        }
        catch(Exception $e)
        {
            echo false;
        }  
    }
   
}
//::::::::::::ELIMINAR CANCHAS 
else if ($action == "eliminarCanchas")
{
    
 try{
            /*
                nombreCentrosSalud: $("#nombreCentrosSalud").val(), 
                idRelacionProyecto: $("#idRelacionProyecto").val()
            */
            $query = "UPDATE proyecto_mapeo_comunidades_canchas SET 
                estado   = 0 
            WHERE id = :n5";
    
            $insert = $net_rrhh->prepare($query);
           
            $insert->bindParam(':n5', htmlspecialchars($_POST['idRelacionProyecto']));
           
            $insert->execute();
            //echo true... 
            foreach ($insert->errorInfo() as $error)
            {
                $errorList .= "$error <br/>"; 
            }
            echo $errorList;
        
        }
        catch(Exception $e)
        {
            echo false;
        }  
    
   
}
else if($action == "addCentrosEducativos")
{
    try{
       
        $query = "INSERT INTO proyecto_mapeo_comunidades_centros_educativos  
        VALUES(Null, :n4, :n1,:n2,:n3, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, :n5,:n6)";
        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n1', htmlspecialchars($_POST['nombreCompleto']));
        $insert->bindParam(':n2', htmlspecialchars($_POST['linkSiges']));
        $insert->bindParam(':n3', htmlspecialchars($_POST['tipoCentro']));
        $insert->bindParam(':n4', htmlspecialchars($_POST['idRelacion']));
        $insert->bindParam(':n5', htmlspecialchars(1));
        $insert->bindParam(':n6', htmlspecialchars($idEmpleado));
        $insert->execute();
        //echo true;
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
            }
                echo $errorList;
    
    }catch(Exception $e)
    {
        echo false;
    }
}
else if($action == "addLideres")
{
    try{
       
        $query = "INSERT INTO proyecto_mapeo_comunidades_lideres  
        VALUES(Null, :n1, :n2,:n3,:n4, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, :n5,:n6,:n7)";
        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n2', htmlspecialchars($_POST['nombre']));
        $insert->bindParam(':n3', htmlspecialchars($_POST['contactos']));
        $insert->bindParam(':n4', htmlspecialchars($_POST['cargo']));
        $insert->bindParam(':n1', htmlspecialchars($_POST['idRelacion']));
        $insert->bindParam(':n5', htmlspecialchars(1));
        $insert->bindParam(':n6', htmlspecialchars($idEmpleado));//
        $insert->bindParam(':n7', htmlspecialchars($_POST['contactos2']));
        $insert->execute();
        //echo true;
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
            }
                echo $errorList;
    
    }catch(Exception $e)
    {
        echo false;
    }
}
else if($action == "addCentroSalud")
{
    try{
       
        $query = "INSERT INTO proyecto_mapeo_comunidades_centros_desalud  
        VALUES(Null, :n1, :n2, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, :n5,:n6)";
        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n2', htmlspecialchars($_POST['nombre']));
        $insert->bindParam(':n1', htmlspecialchars($_POST['idRelacion']));
        $insert->bindParam(':n5', htmlspecialchars(1));
        $insert->bindParam(':n6', htmlspecialchars($idEmpleado));
        $insert->execute();
        //echo true;
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
            }
                echo $errorList;
    
    }catch(Exception $e)
    {
        echo false;
    }
}
else if($action == "addCancha")
{
    try{
       
        $query = "INSERT INTO proyecto_mapeo_comunidades_canchas  
        VALUES(Null, :n1, :n2,:n3, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, :n5,:n6,:n7)";
        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n2', htmlspecialchars($_POST['cantidad']));
        $insert->bindParam(':n3', htmlspecialchars($_POST['tipoCancha']));
        $insert->bindParam(':n1', htmlspecialchars($_POST['idRelacion']));
        $insert->bindParam(':n5', htmlspecialchars(1));
        $insert->bindParam(':n6', htmlspecialchars($idEmpleado));//comentarioCanchas
        $insert->bindParam(':n7', htmlspecialchars($_POST['comentarioCanchas']));
        $insert->execute();
        //echo true;
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
            }
                echo $errorList;
    
    }catch(Exception $e)
    {
        echo false;
    }
}
else if($action == "addZonaVerde")
{
    try{
       
        $query = "INSERT INTO proyecto_mapeo_comunidades_zonas_verdes  
        VALUES(Null, :n1, :n2,:n3, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, :n5,:n6,:n7)";
        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n2', htmlspecialchars($_POST['cantidadZonaVerde']));
        $insert->bindParam(':n3', htmlspecialchars($_POST['tipoZonaverde']));
        $insert->bindParam(':n1', htmlspecialchars($_POST['idRelacion']));
        $insert->bindParam(':n5', htmlspecialchars(1));
        $insert->bindParam(':n6', htmlspecialchars($idEmpleado));//
        $insert->bindParam(':n7', htmlspecialchars($_POST['COMENTARIOZONAVERDE']));
        $insert->execute();
        //echo true;
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
            }
                echo $errorList;
    
    }catch(Exception $e)
    {
        echo false;
    }
}
else if($action == "addOrganizacionesComunitarias")
{
    try{
       
        $query = "INSERT INTO proyecto_mapeo_comunidades_organizaciones_comunitarias  
        VALUES(DEFAULT, :n1, :n2, :n3, :n4, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, :n5,:n6)";
        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n2', htmlspecialchars($_POST['nombreOrganizacionComunitaria']));
        $insert->bindParam(':n3', htmlspecialchars($_POST['descripcionesOrganizacionComunitaria']));
        $insert->bindParam(':n4', htmlspecialchars($_POST['tipoOrganizacionComunitaria']));
        $insert->bindParam(':n1', htmlspecialchars($_POST['idRelacion']));
        $insert->bindParam(':n5', htmlspecialchars(1));
        $insert->bindParam(':n6', htmlspecialchars($idEmpleado));
        $insert->execute();
        //echo true;
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
            }
                echo $errorList;
    
    }catch(Exception $e)
    {
        echo false;
    }
}
else if($action == "addNecesidadComunitaria")
{
    try{
       /*
        tipoNecesidadesComunitaria     : $("#tipoNecesidadesComunitaria").val(), 
        descripcionComunitaria   : $("#descripcionComunitaria").val(),
        idRelacion     : $("#idRelacionProyecto").val()
       */
        $query = "INSERT INTO proyecto_mapeo_comunidades_necesidades  
        VALUES(DEFAULT, :n1, :n2, :n3,  CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, :n5,:n6)";
        $insert = $net_rrhh->prepare($query);
        $insert->bindParam(':n2', htmlspecialchars($_POST['descripcionComunitaria']));
        $insert->bindParam(':n3', htmlspecialchars($_POST['tipoNecesidadesComunitaria']));
        $insert->bindParam(':n1', htmlspecialchars($_POST['idRelacion']));
        $insert->bindParam(':n5', htmlspecialchars(1));
        $insert->bindParam(':n6', htmlspecialchars($idEmpleado));
        $insert->execute();
        //echo true;
        foreach ($insert->errorInfo() as $error) {
            $errorList .= "$error <br/>"; 
            }
                echo $errorList;
    
    }catch(Exception $e)
    {
        echo false;
    }
}
else if($action == "addOrganizacionGubernametal")
{
    try{
        /*
         tipoNecesidadesComunitaria     : $("#tipoNecesidadesComunitaria").val(), 
         descripcionComunitaria   : $("#descripcionComunitaria").val(),
         idRelacion     : $("#idRelacionProyecto").val()
        */
         $query = "INSERT INTO proyecto_mapeo_comunidades_organizaciones_gubernamentales  
         VALUES(DEFAULT, :n1, :n2, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, :n5,:n6,:n7,:n8)";
         $insert = $net_rrhh->prepare($query);
         $insert->bindParam(':n2', htmlspecialchars($_POST['tipoOrganizacionGubernamentales']));
         $insert->bindParam(':n1', htmlspecialchars($_POST['idRelacion']));
         $insert->bindParam(':n5', htmlspecialchars(1));
         $insert->bindParam(':n6', htmlspecialchars($idEmpleado));//descripcionGubernamentales
         $insert->bindParam(':n7', htmlspecialchars($_POST['descripcionGubernamentales']));
         $insert->bindParam(':n8', htmlspecialchars($_POST['nombreOtros']));
         $insert->execute();
         //echo true;
         foreach ($insert->errorInfo() as $error) {
             $errorList .= "$error <br/>"; 
             }
                 echo $errorList;
     
     }catch(Exception $e)
     {
         echo false;
     }
}
else if($action == "addOrganizacionSocial")
{
    try{
        /*
         tipoNecesidadesComunitaria     : $("#tipoNecesidadesComunitaria").val(), 
         descripcionComunitaria   : $("#descripcionComunitaria").val(),
         idRelacion     : $("#idRelacionProyecto").val()
        */
         $query = "INSERT INTO proyecto_mapeo_comunidades_organizaciones_sociales  
         VALUES(DEFAULT, :n1, :n2, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, :n5,:n6,:n7,:n8)";
         $insert = $net_rrhh->prepare($query);
         $insert->bindParam(':n2', htmlspecialchars($_POST['tipoOrganizacionsSocial']));
         $insert->bindParam(':n1', htmlspecialchars($_POST['idRelacion']));
         $insert->bindParam(':n5', htmlspecialchars(1));
         $insert->bindParam(':n6', htmlspecialchars($idEmpleado));
         $insert->bindParam(':n7', htmlspecialchars($_POST['descripcionOrganizacionSociales']));//
         $insert->bindParam(':n8', htmlspecialchars($_POST['nombreOrganizacionSocia']));
         $insert->execute();
         //echo true;
         foreach ($insert->errorInfo() as $error) {
             $errorList .= "$error <br/>"; 
             }
                 echo $errorList;
     
     }catch(Exception $e)
     {
         echo false;
     }
}
else if ($action == "addOrganizacionAutonoma")
{
    try{
        /*
         tipoNecesidadesComunitaria     : $("#tipoNecesidadesComunitaria").val(), 
         descripcionComunitaria   : $("#descripcionComunitaria").val(),
         idRelacion     : $("#idRelacionProyecto").val()
        */
         $query = "INSERT INTO proyecto_mapeo_comunidades_instituciones_autonomas  
         VALUES(DEFAULT, :n1, :n2, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, :n5,:n6,:n7)";
         $insert = $net_rrhh->prepare($query);
         $insert->bindParam(':n2', htmlspecialchars($_POST['tipoOrganizacionAutonoma']));
         $insert->bindParam(':n1', htmlspecialchars($_POST['idRelacion']));
         $insert->bindParam(':n5', htmlspecialchars(1));
         $insert->bindParam(':n6', htmlspecialchars($idEmpleado));//
         $insert->bindParam(':n7', htmlspecialchars($_POST['descripcionOrganizacionAutonomas']));
         $insert->execute();
         //echo true;
         foreach ($insert->errorInfo() as $error) {
             $errorList .= "$error <br/>"; 
             }
                 echo $errorList;
     
     }catch(Exception $e)
     {
         echo false;
     } 
}
else if($action == "addOtrasEntidades")
{
    try{
        /*
         tipoNecesidadesComunitaria     : $("#tipoNecesidadesComunitaria").val(), 
         descripcionComunitaria   : $("#descripcionComunitaria").val(),
         idRelacion     : $("#idRelacionProyecto").val()
        */
         $query = "INSERT INTO proyecto_mapeo_comunidades_otros  
         VALUES(DEFAULT, :n1, :n2, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, :n5,:n6,:n7,:n8)";
         $insert = $net_rrhh->prepare($query);
         $insert->bindParam(':n2', htmlspecialchars($_POST['tipoOtrasEntidades']));
         $insert->bindParam(':n1', htmlspecialchars($_POST['idRelacion']));
         $insert->bindParam(':n5', htmlspecialchars(1));
         $insert->bindParam(':n6', htmlspecialchars($idEmpleado));//
         $insert->bindParam(':n7', htmlspecialchars($_POST['descripcionEntidadesComunidad']));//
         $insert->bindParam(':n8', htmlspecialchars($_POST['descripcionNombreEntidades']));
         $insert->execute();
         //echo true;
         foreach ($insert->errorInfo() as $error) {
             $errorList .= "$error <br/>"; 
             }
                 echo $errorList;
     
     }catch(Exception $e)
     {
         echo false;
     } 
}
?>