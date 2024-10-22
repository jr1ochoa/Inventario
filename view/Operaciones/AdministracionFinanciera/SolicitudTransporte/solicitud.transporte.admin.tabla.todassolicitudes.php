<?php 
include("../../../../config/net.php");
?>
<div class="row">
        
        <div class="col-4">

        
            <!--<div class="form-group">
                <label for="exampleFormControlTextarea1" class="p-0 mb-0 mt-2">Buscar día de la solicitud:  </label>
                <input id="timeStart" class="form-control form-control-sm mb-3" type="date" name="times" value="">
            </div>-->

           

        <!--<form action="view/Operaciones/AdministracionFinanciera/SolicitudTransporte/exportarExcel.php" method="POST">
    <input type="hidden" name="fechaActual" value="<?php echo $_REQUEST['fechaActual']; ?>"> <!-- Cambia el valor por la fecha actual 
    <button type="submit" name="export_data" class="btn btn-info">Exportar a Excel</button>
</form>--> 

        </div>
    </div>

    
  <div class="">
  <table class="table table-hover table-sm table-striped">
  <thead>
    <tr>
     <th scope="col">Solicitado por</th>
      <th scope="col">Área</th>
      <th scope="col">Fecha de Salida</th>
      <th scope="col">Direccion</th>
      <th scope="col">Hora de llegada</th>
      <th scope="col">Hora de retorno</th>
      <th scope="col">Estado</th>
     
      <th scope="col">Gestionar</th>
      <th scope="col">Codigo</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php 

// 
//echo $_REQUEST['fechaActual'];
 $query = "
 SELECT s1.*, s2.area, s3.name1,s3.name2,s3.lastname1,s3.lastname2 FROM admin_finanzas_formulario as s1 inner join workarea as s2 on s1.id_area_solicitante = s2.id
 inner join employee as s3 on s1.id_empleado = s3.id where (s1.estado = 1 )  order by s1.id desc
 ";

 $data3 = $net_rrhh->prepare($query);

 $data3->execute();

 while ($data = $data3->fetch()) {

    if($data[14] == 1)
    {
        $fechaData10 = new DateTime($data[24]);
        $fechaFormateada10 = $fechaData10->format('d/m/Y');
        echo '
        <tr>
        <td>'.$data[31].' '.$data[32].' '.$data[33].' '.$data[34].' '.$data[35].' </td>
        <td class="tamanoFuente">'.sanear_string($data[30]).' </td>
        <td>'.$fechaFormateada10.' </td>
        <td>'.$data[3].' </td>
        <td>'.$data[7].' </td>
        <td>'.$data[8].' </td>
        <td style="font-size: 11px; background-color: #FEAD00;"><span  > 
      <b>En espera </b> 
      </span></td>
         <td>
   
   
         <form action="?view=adminFormulariotRANSPORTE" method="POST">
         <input type="hidden" value="'.$data[19].'" name="idProyecto">
         <button type="submit" class="btn btn-sm" style="background-color: #1A4262;color:white;">
         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-check-fill" viewBox="0 0 16 16">
     <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5"/>
     <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585q.084.236.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5q.001-.264.085-.5m6.769 6.854-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708.708"/>
   </svg>
         
         </button>
        </form>
   
   
        
         </td>
       
         <td style="font-size: 8px;">'.$data[19].' </td>
      </tr>
   
        ';
    }
    else
    {
        echo '

        <tr>
        <td>'.$data[31].' '.$data[32].' '.$data[33].' '.$data[34].' '.$data[35].' </td>
         <td class="tamanoFuente">'.sanear_string($data[30]).' </td>
         <td>'.$fechaFormateada10.' </td>
        <td>'.$data[3].' </td>
        <td>'.$data[7].' </td>
        <td>'.$data[8].' </td>
        <td style="font-size: 11px; background-color: #CBE8BA;"><span  > 
      <b>Aprobado </b> 
      </span></td>
         <td>
   
   <div class="btn-group mt-2" role="group" aria-label="Basic example">
       
            <form action="?view=SolicitanteAdminVerFormulariotRANSPORTE23" method="POST">
            <input type="hidden" value="'.$data[19].'" name="idProyecto">
            <button type="submit" class="btn btn-sm" style="background-color: #1A4262;color:white;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-check-fill" viewBox="0 0 16 16">
            <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5"/>
            <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585q.084.236.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5q.001-.264.085-.5m6.769 6.854-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708.708"/>
            </svg>
            </button>
            </form>        

              <div class="btn-group mx-1 mt-0 pt-0 mb-0 pb-0 m-0" role="group" aria-label="Basic outlined example">
         <button id="'.$data[0].'" class="btn btn-sm mt-0  pt-0" style="background-color: #1A4262; color:white;"  onclick="funcionValorEstado('.$data[0].')" data-bs-toggle="modal" data-bs-target="#exampleEditarSolicitudDesaprobar">
                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                   <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                   <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                   </svg>
               </button>
           </div>
        
   </div>
         
   
   
       
        
         </td>
       
         <td style="font-size: 8px;">'.$data[19].' </td>
      </tr>
   
        ';
    }
     
    

 }

 ?>

     
    </tr>

    
  </tbody>
</table>

  </div>
 
  <!--:::::::::::::: EDITAR LA INFORMACION DEL AUTOMOVIL ::::::::::::::::::::::::-->
<div class="modal fade" id="exampleEditarSolicitudDesaprobar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header colorEncabezadoLista">
        <h5 class="modal-title" id="exampleModalLabel" style="color:white;">EDITAR SOLICITUD</h5>
        <button type="button" id="btnCerrarModuloEditarDesaprobado" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

<div id="editarSolicitud"></div>
    <!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
      


    <!--:::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="btnCerrarModalPsajero"data-bs-dismiss="modal">Close</button>
        <!--<button type="button"id="EliminarPasajerobtn2" class="btn btn-primary">Confirmar la Eliminación</button>-->
      </div>
      <a class="btn btn-success" id="botonCargando"  style="display:none;"type="button" disabled>
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Loading...
    </a>
    </div>
  </div>
</div>


<script>
    let funcionValorEstado = (valor) =>{
        //alert(valor)
        $("#editarSolicitud").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/editar.solicitud.desaprobar2.php",{
    idModal: valor
    });
    }
</script>
