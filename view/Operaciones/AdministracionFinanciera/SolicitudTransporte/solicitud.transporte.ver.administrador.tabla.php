<?php
include("../../../../config/net.php");
echo"<center>🏷️ Codigo: ".$_REQUEST['idProyecto']."  </center>";
//:::::::::: Variables de Registro ::::::::::::::::::
$direccionDestino;

$hora_de_llegada;
$hora_de_salida;
$hora_de_retorno;

$motivoSalida;
$esProyeto;
$nombreProyecto;
$llevarEquipo;
$descripcionEquipo;
$notaAdicional;
$hora_llegada;
$hora_retorno;
$cantidadPasajeros;
$pasajeroExterno;
$listaPasajeroExterno;
$cantidadExterno;
$estado_formulario = 0;
$idFormulario = 0;
$motorista_Externo1 = "";
$motorista_Externo2 = "";
$query = "SELECT * FROM admin_finanzas_formulario  where codigo_formulario = ?";

 $data3 = $net_rrhh->prepare($query);

 $data3->execute([$_REQUEST['idProyecto']]);

 while ($data = $data3->fetch()) {

    $motorista_Externo1 = $data[28];
    $motorista_Externo2 = $data[29]; 
    $estado_formulario = $data[14];
    $hora_de_llegada = $data[7];
    //echo "ddddddd".$hora_de_llegada;
    $hora_de_retorno = $data[8];
    $hora_de_salida = $data[17];
    $idFormulario = $data[0];
    $direccionDestino = $data[3];
    $motivoSalida = $data[4];
    $esProyeto = $data[5];
    $nombreProyecto = $data[6];
    $llevarEquipo = $data[9];
    $descripcionEquipo = $data[10];
    $notaAdicional = $data[13];
    $hora_llegada = $data[7];
    $hora_retorno = $data[8];

    //::::::::::::::::::::::::: ID EMPLEADO MOTORISTA ::::::::::::::::::::::
    $id_empleado_motorista = $data[12];
    $id_empleado_motorista2 = $data[26];
    //::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

    //:::::::::::::::::::::::: ID VEHICULO ASIGNADO ::::::::::::::::::::::::
    $id_vehiculos = $data[11];
    $id_vehiculos2 = $data[27];
    //::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    $cantidadPasajeros = $data[18];
    $pasajeroExterno = $data[20];
    $listaPasajeroExterno = $data[21];

    $cantidadExterno = $data[23];
 }
?>

<style>

    .formatodeTexto{

        font-weight: 400;

    }

    .formatoTituloTexto{

        font-weight: 600;

    }

    .colorFichaProyecto{

        background-color: #F2F2F2;

        color: while;

        margin-right: 534px;

        border-radius: 8px;

    }

</style>

<style>

    .colorFondo{

        background-color: #CFE2FF;

        color: #FFFFFF;

    }

    .colorTitulo{

        background-color: #F2F2F2;

        border-radius: 10px;

        color: #FFFFFF;

        font-size: 15px;

        margin-left: 20px;

    }

    .colorNuevoProyecto{

        background-color: #FFFFFF;

        color: black;

    }

    .colorNuevaFicha{

        background-color: #FFFFFF;

        color: black;

    }

    .colorFondo{

        background-color: #3E9AA5;

    }

    .fondoImagen {

    margin: 0;

    padding: 0;

    background-image: url('assets/images/Wavy_Tech-11_Single-08.jpg'); /* Reemplaza 'ruta_de_tu_imagen.jpg' con la ruta de tu imagen de fondo */

    background-size: cover;

    background-position: center ;

    height: 20vh;
    width: 20%;

    display: flex;

    align-items: center;

    justify-content: center;

    

}

.colorTextoFondo{

    color: while;

    font-weight: 700;

}

.fondoColor{

    background-color: #CFE2FF;

    color: white;

    opacity: 0.7; /* Ajusta la opacidad según tus preferencias */

   

}



</style> 


<div class="row justify-content-center">
    <div class="mt-3 mx-3 col-4 h-100" >
    <div class="card mb-3" style="background-color: #FBF8F6;">
       
    <div class="card-body  d-flex flex-column ">
     

<h3><b>FORMULARIO PARA SOLICITUD DE TRANSPORTE</b></h3>
<div class="mb-2" style="height: 4px; width:100%; margin-top:-20px; background: linear-gradient(to right, #1A4262 33%, #668196 33%, #668196 66%, #CCD5DC 66%);"></div>
  
<div class="row ">
        <div class="col-md" style="font-size: 9px;">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Hora de llegar al lugar:  </label>
                    <input id="timeStart"style="font-size: 10px;" disabled   class="form-control form-control-sm" type="time" name="times" value="<?php echo $hora_de_llegada; ?>">
                </div>  
          
            
            
        </div>
        <div class="col-md" style="font-size: 9px;">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Hora estimada de retorno:  </label>
                <input id="timeStart" style="font-size: 10px;" disabled  class="form-control form-control-sm" type="time" name="times" value="<?php echo $hora_de_retorno; ?>">
            </div>
        </div>
        
    </div> 
    
   
    <div class="row mt-3 justify-content-center">
    <div class="col-12">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Hora salida FUSALMO:  </label>
                <input id="timeStart" style="font-size: 10px;" disabled class="form-control form-control-sm" type="time" name="times" value="<?php echo $hora_de_salida; ?>">
            </div>
        </div>
       
    </div>

<div class="form-group mt-2">
    <label for="exampleFormControlTextarea1">Dirección de Destino: </label>
    <textarea  class="form-control" disabled id="exampleFormControlTextarea1" rows="8"><?php echo $direccionDestino; ?></textarea>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Motivo de la Salida:  </label>
    <textarea  class="form-control" disabled id="exampleFormControlTextarea1" rows="5"><?php echo $motivoSalida; ?></textarea>
  </div>

  <div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="exampleFormControlSelect1">¿Es proyecto?</label>
            <select disabled class="form-control" id="idProyectoSelec">
            <option value="Si">Si</option>
            <option value="No">No</option>
            </select>
        </div>

    </div>
    <div class="col-6" id="detalleProyectoNombre" style="display:none;">
        <div class="form-group">
        <label for="exampleFormControlTextarea1">Nombre del Proyecto:  </label>
        <textarea disabled   class="form-control" id="exampleFormControlTextarea1" rows="5"><?php echo $nombreProyecto; ?></textarea>
        </div>
    </div>
  </div>


  <div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="exampleFormControlSelect1">¿Llevara equipo o Herramienta?</label>
            <select disabled class="form-control" id="idSelectHerramientas">
            <option>Si</option>
            <option>No</option>
            </select>
        </div>

    </div>
    <div class="col-6"  id="idBloqueHerramienta" style="display:none;"> 
        <div class="form-group">
        <label for="exampleFormControlTextarea1">Describir el equipo o herramienta:  </label>
        <textarea disabled  class="form-control" id="exampleFormControlTextarea1" rows="5"><?php echo $descripcionEquipo;?></textarea>
        </div>
    </div>
  </div>

  

  <div class="form-group mb-3">
        <label for="exampleFormControlTextarea1">Nota adicional:  </label>
        <textarea disabled  class="form-control" id="exampleFormControlTextarea1" rows="6"><?php echo $notaAdicional; ?></textarea>
        </div>


       
      


        <div class="card-footer text-muted">
  </div>
        
        </div>
                            </div>
</div>


                        <div class="col-1 d-flex justify-content-center" >
                            <hr class="vr align-self-center h-75">
                        </div>

                        <div class="col-4 mt-3" >
                            <div class="card" style="background-color: #FBF8F6;">
                            <div class="card-body  d-flex flex-column ">
                      
    
                           
  
    <div class="form-group">
                    <label for="exampleFormControlTextarea1">¿Cantidad de Pasajeros Internos?  </label>
                    <input id="idCantidadInternas" disabled class="form-control form-control-sm" type="number" name="times" value="">
    </div> 


    <div class="form-group mt-4">
           
    
        <div id="tablaPasajerosInternos"></div>


            </div>

    <div class="row ">
        <div class="col-md">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">¿Llevara pasajeros <br/> Externos?  </label>
                    <select disabled class="form-control" id="idPasajeroExterno">
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                    </select>
                </div>  
          
            
            
        </div>
        
        <div class="col-md" id="grupoPasjeroExterno1">
        <div class="form-group">
                    <label for="exampleFormControlTextarea1">¿Cantidad de Pasajeros Externos?  </label>
                    <input disabled  id="cantidadIdExternoPasajero" class="form-control form-control-sm" type="number" name="times" value="<?php echo $cantidadExterno; ?>">
                </div>  
        </div>
    </div>

    <div class="form-group mb-4" id="idPasajeroListaExterno1">
        <label for="exampleFormControlTextarea1">Lista de Pasajeros Externos:  </label>
        <textarea  disabled class="form-control" id="exampleFormControlTextarea1" rows="5"><?php echo $listaPasajeroExterno; ?></textarea>
        </div>
              

 



        <div class="row  justify-content-center">
    
        <div class="col-12">
    
        <div class="form-group">
                <label for="exampleFormControlTextarea1">Motorista Asignado: 👮🏻‍♂️ </label>

            <?php     
            $id_empleado=0;
                $query = "SELECT * FROM admin_finanzas_lista_motorista  where id = ?";
                $data3 = $net_rrhh->prepare($query);
                $data3->execute([$id_empleado_motorista]);
                while ($data = $data3->fetch()) 
                {
                    //echo "idMotorista".$id_empleado_motorista;
                    $id_empleado = $data[1];
                    $nombre_motorista_externo = $data[2];
                    $empresa_externa = $data[17];
                    $estado = $data[0];
                    $motorista_interno = $data[9];
                }
                //echo "Valor del ID Empleado".$id_empleado;
                //echo $id_empleado_motorista.'<--';
                
                if($id_empleado_motorista != 0)
                //if($motorista_interno == 'Si')
                {
                    echo '<span class="badge bg-info  text-dark"> MOTORISTA FUSALMO </span>';
                    //echo "SIII ENTRE".$id_empleado;
                    $query = "SELECT * FROM employee  where id = ?";
                    $data3 = $net_rrhh->prepare($query);
                    $data3->execute([$id_empleado]);
                    while ($data = $data3->fetch()) 
                    {
                        $name1 = $data[1];
                        $name2 = $data[2];
                        $name3 = $data[3];
                        $lastname1 = $data[4];
                        $lastname2 = $data[5];
                    }
            ?>
                <input disabled value="<?php echo $name1." ".$name2." ".$name3." ".$lastname1." ".$lastname2;?>" id="timeStart" style="font-size: 10px;" class="form-control form-control-sm" type="text" name="times" >
            <?php 
                }
                else 
                {
                    echo '<span class="badge bg-warning   text-dark"> MOTORISTA EXTERNO </span>';
            ?>
                <input disabled  id="timeStart" style="font-size: 10px;" class="form-control form-control-sm" type="text" name="times" value="<?php echo ' '. $motorista_Externo1; ?>">
            <?php
                }  
            ?>

            </div>

        </div>
    </div>



    
    <div class="row  justify-content-center">
    
    <div class="col-12">

    <div class="form-group">
            <label for="exampleFormControlTextarea1">Motorista Asignado Retorno: 👮🏻‍♂️ </label>

        <?php     
        $id_empleado=0;
            $query = "SELECT * FROM admin_finanzas_lista_motorista  where id = ?";
            $data3 = $net_rrhh->prepare($query);
            $data3->execute([$id_empleado_motorista2]);
            while ($data = $data3->fetch()) 
            {
                //echo "idMotorista".$id_empleado_motorista;
                $id_empleado = $data[1];
                $nombre_motorista_externo = $data[2];
                $empresa_externa = $data[17];
                $estado = $data[0];
                $motorista_interno = $data[9];
            }
            //echo $id_empleado_motorista2.'<--';
            if($id_empleado_motorista2 != 0)
            {
                echo '<span class="badge bg-info  text-dark">  MOTORISTA FUSALMO </span>';
            //echo "Valor del ID Empleado".$id_empleado;
            //if($motorista_interno == 'Si')
            //{
                //echo "SIII ENTRE".$id_empleado;
                $query = "SELECT * FROM employee  where id = ?";
                $data3 = $net_rrhh->prepare($query);
                $data3->execute([$id_empleado]);
                while ($data = $data3->fetch()) 
                {
                    $name1 = $data[1];
                    $name2 = $data[2];
                    $name3 = $data[3];
                    $lastname1 = $data[4];
                    $lastname2 = $data[5];
                }
        ?>
            <input disabled value="<?php echo $name1." ".$name2." ".$name3." ".$lastname1." ".$lastname2;?>" id="timeStart" style="font-size: 10px;" class="form-control form-control-sm" type="text" name="times" >
        <?php 
            }
            else 
            {
                echo '<span class="badge bg-warning   text-dark"> MOTORISTA EXTERNO </span>';
        ?>
            <input disabled  id="timeStart" style="font-size: 10px;" class="form-control form-control-sm" type="text" name="times" value="<?php echo ''. $motorista_Externo2; ?>">
        <?php
            }  
        ?>

        </div>

    </div>
</div>



    <div class="row mt-3 mb-3 justify-content-center">
   
    <div class="col-12">
    
    <div class="form-group ">
                <label for="exampleFormControlTextarea1">Vehiculo Asignado: 🚘 </label>


                <?php     
            $id_empleado=0;
                $query = "SELECT * FROM admin_finanzas_informacion_vehiculo  where id = ?";
                $data3 = $net_rrhh->prepare($query);
                $data3->execute([$id_vehiculos]);
                while ($data = $data3->fetch()) 
                {
                    //echo "idMotorista".$id_empleado_motorista;
                    $nombreVhiculo = $data[1];
                    $modelovehiculo = $data[2];
                    $colorvehiculo = $data[3];
                    $yearvehiculo = $data[4];
                }
                if($id_vehiculos == 0 && $estado_formulario  != 1)
               {
                ?>
 <textarea disabled class="form-control" id="exampleFormControlTextarea1" rows="1">
        CONTRATACIÓN DE UBER
        </textarea>
    <?php 
        }
        else
        {
    ?>
                
                <input disabled value="<?php echo $nombreVhiculo." ".$modelovehiculo." ".$colorvehiculo." ".$yearvehiculo; ?>" id="timeStart" style="font-size: 10px;" class="form-control form-control-sm" type="text" name="times" >
              
     <?php            
        }
    ?> 
               
       
      
    </div>
    
    </div>
    </div>

    
    <div class="row mt-3 mb-3 justify-content-center">
   
    <div class="col-12">
    
    <div class="form-group ">
                <label for="exampleFormControlTextarea1">Vehiculo Asignado Retorno: 🚘 </label>


                <?php     
            $id_empleado=0;
                $query = "SELECT * FROM admin_finanzas_informacion_vehiculo  where id = ?";
                $data3 = $net_rrhh->prepare($query);
                $data3->execute([$id_vehiculos2]);
                while ($data = $data3->fetch()) 
                {
                    //echo "idMotorista".$id_empleado_motorista;
                    $nombreVhiculo = $data[1];
                    $modelovehiculo = $data[2];
                    $colorvehiculo = $data[3];
                    $yearvehiculo = $data[4];
                }
                if($id_vehiculos2 == 0 && $estado_formulario  != 1)
               {
               ?> 
               <textarea disabled class="form-control" id="exampleFormControlTextarea1" rows="1">
        CONTRATACIÓN DE UBER
        </textarea>
<?php 
               }else{
?>
 <input disabled value="<?php echo $nombreVhiculo." ".$modelovehiculo." ".$colorvehiculo." ".$yearvehiculo; ?>" id="timeStart" style="font-size: 10px;" class="form-control form-control-sm" type="text" name="times" >
<?php 
               }
?>
               
    </div>
    
    </div>
    </div>
    
    <!--:::::::::::::::::::::: btn para actualizar estado :::::::::::::::::::-->
    <button class="btn btn-sm" id="finalizarSolicitud" style="background-color: #CBE8BA;">
                                        <i class="bi bi-gear"></i> Finalizar Solicitud 
</button>

<button class="btn btn-primary" style="display: none;" id="spinerCargando" type="button" disabled>
  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
  Cargando...
</button>

<div class="alert alert-success" id="mensajeTerminado" style="display: none;" role="alert">
  Proceso Terminado
</div>


<div class="card-footer text-muted">
  </div>
                                </div>
                            </div>
                        </div>
</div>





<!--::::::::::: MODAL PARA REGISTRAR SOLICITUD ::::::::::::::::::-->
<div class="modal fade " id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content " >
      <div class="modal-header colorNuevaFicha " style="background-color: #1A4262; ">
        <h4 class="modal-title" id="exampleModalLabel"  style="color:white;"> Registrando Solicitud de Arte</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">


      <div class="row">
        <div class="col-md-5">
            
        <div class="mb-3">
            <label for="formFile" class="form-label">Marca:  </label>
            <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Modelo :  </label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Año:  </label>
            <input class="form-control form-control-sm" type="date" placeholder=".form-control-sm" aria-label=".form-control-sm example">
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Color:  </label>
            <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Número de Serie:  </label>
            <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
        </div>


        <div class="mb-3">
            <label for="formFile" class="form-label">Tipo de Motor:  </label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
              <option selected>Seleccione</option>
              <option >Diesel</option>
              <option >Gasolina</option>
              <option >Electricos</option>
              <option >Hibridos</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Potencia de Motor:  </label>
            <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Transmisión:  </label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
              <option selected>Seleccione</option>
              <option >Automatica</option>
              <option >Manual</option>
            </select>
        </div>

        


        </div>
        <div class="col-1 d-flex justify-content-center">
                            <hr class="vr align-self-center h-75">
                        </div>
        <div class="col-md-5">


        <div class="mb-3">
            <label for="formFile" class="form-label">Capacidad de Pasajeros: </label>
            <input class="form-control form-control-sm" type="number" placeholder=".form-control-sm" aria-label=".form-control-sm example">
        </div>


        <div class="mb-3">
            <label for="formFile" class="form-label">Capacidad de Carga:  </label>
            <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
        </div>
       

        <div class="mb-3">
            <label for="formFile" class="form-label">Dimensiones:  </label>
            <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Matricula: </label>
            <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
        </div>


        <div class="mb-3">
            <label for="formFile" class="form-label">Fecha Matricula: </label>
            <input class="form-control form-control-sm" type="date" placeholder=".form-control-sm" aria-label=".form-control-sm example">
        </div>


        <div class="mb-3">
            <label for="formFile" class="form-label">Fecha Vencimiento Matricula:  </label>
            <input class="form-control form-control-sm" type="date" placeholder=".form-control-sm" aria-label=".form-control-sm example">
        </div>

        
        <div class="mb-3">
            <label for="formFile" class="form-label">Estado del Seguro:  </label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
              <option selected>Seleccione</option>
              <option >Activo</option>
              <option >Inactivo</option>
            </select>
        </div>


        <div class="mb-3">
            <label for="formFile" class="form-label">Tipo de Uso:  </label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
              <option selected>Seleccione</option>
              <option >Activo</option>
              <option >Inactivo</option>
            </select>
        </div>


        </div>
      </div>
       

      



       
      <div class="modal-footer">

      <a type="button" id="btnReturn2"  class="btn btn-sm btn-seconday" style="background-color: #FD9683;" data-bs-dismiss="modal">Cancelar</a>

        <a type="button" id="btnSaveInscription2" class="btn  btn-sm" style="background-color: #CBE8BA;"  >Registrar Vehículo</a>

      </div>

      <a class="btn btn-success" id="botonCargando2"  style="display:none;"type="button" disabled>

  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>

  Loading...

</a>

    </div>

  </div>

</div>
</div>


<!--:::::::::::::::::::::  MODAL MOTORISTAS ::::::::::::::::::::::::::::::-->
<div class="modal fade " id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content " >
      <div class="modal-header colorNuevaFicha " style="background-color: #1A4262; ">
        <h4 class="modal-title" id="exampleModalLabel"  style="color:white;"> Registrando Solicitud de Arte</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">


      <div class="row">
        <div class="col-md">
            
        <div class="mb-3">
            <label for="formFile" class="form-label">¿El motorista es interno?:  </label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
              <option selected>Seleccione</option>
              <option >Si</option>
              <option >No</option>
            </select>
        </div>


        <div class="mb-3">
            <label for="formFile" class="form-label">Empleado :  </label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
              <option selected>Seleccione</option>
              <option >Persona 1</option>
              <option >Persona 2</option>
            </select>
        </div>



        <div class="mb-3">
            <label for="formFile" class="form-label">Nombre del Motorista:  </label>
            <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Nombre de la Empresa :  </label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">DUI:  </label>
            <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
        </div>


        </div>

      </div>
       

      



       
      <div class="modal-footer">

      <a type="button" id="btnReturn2"  class="btn btn-sm btn-seconday" style="background-color: #FD9683;" data-bs-dismiss="modal">Cancelar</a>

        <a type="button" id="btnSaveInscription2" class="btn  btn-sm" style="background-color: #CBE8BA;"  >Registrar Vehículo</a>

      </div>

      <a class="btn btn-success" id="botonCargando2"  style="display:none;"type="button" disabled>

  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>

  Loading...

</a>

    </div>

  </div>

</div>
</div>



<!--:::::::::::::::::::::  MODAL MOTORISTAS ::::::::::::::::::::::::::::::-->
<div class="modal fade " id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content " >
      <div class="modal-header colorNuevaFicha " style="background-color: #1A4262; ">
        <h4 class="modal-title" id="exampleModalLabel"  style="color:white;"> Registrando Pasajero Interno</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">


      <div class="row">
        <div class="col-md">
            
        <div class="col-7">
        <input disabled class="form-control form-sm" id="idcodigoSolicitud" style="font-size: 8px;" value="<?php echo $_REQUEST['idProyecto']; ?>" />
    </div>


        <div class="mb-3">
            <label for="formFile" class="form-label">Empleado :  </label>
            <select class="js-example-basic-single form-control form-control-sm " id="id_label_single" style="width: 100%;"  data-show-subtext="true" data-live-search="true">

<option>N/A</option>

<?php 

include("../../config/net.php");

$query = "SELECT id, CONVERT(name1 USING utf8),CONVERT(name2 USING utf8),CONVERT(name3 USING utf8),CONVERT(lastname1 USING utf8),CONVERT(lastname2 USING utf8)  FROM employee order by name1";

$data3 = $net_rrhh->prepare($query);

$data3->execute();



if($data3->rowCount()>0)

{

    while ($data = $data3->fetch()) {

        echo "<option value=".$data[0].">".$data[1]." ".$data[2]." ".$data[3]." ".$data[4]." ".$data[5]."</option>";

    }

}

?>

</select>
        </div>



    


        </div>

      </div>
       

      



       
      <div class="modal-footer">

      <button type="button" id="btnCancelar3"  class="btn btn-sm btn-seconday" style="background-color: #FD9683;" data-bs-dismiss="modal">Cancelar</button>

        <button type="button" id="btnRegisterPasajero" class="btn  btn-sm" style="background-color: #CBE8BA;"  >Registrar Pasajero</button>

      </div>

      <a class="btn btn-success" id="botonCargando2"  style="display:none;"type="button" disabled>

  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>

  Loading...

</a>

    </div>

  </div>

</div>
</div>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>



<script>

let countRowsAndDisplay = () => {
    let rowCount = $('#tablaBody tr').length; // Cuenta las filas en el tbody de la tabla
    $('#idCantidadInternas').val(rowCount); // Muestra el número de filas en el input
    //$("#idCantidadpASAJERO").text(rowCount);

    var valorInput1 = parseFloat($("#idCantidadInternas").val()) || 0; // Obtener el valor del primer input
    var valorInput2 = parseFloat($("#idCantidadPasajeroExterno").val()) || 0; // Obtener el valor del segundo input
    var resultado = valorInput1 + valorInput2; // Sumar los valores de ambos inputs
    $("#idCantidadpASAJERO").text(resultado); // Actualizar el texto del span con el resultado
            
};


$("#finalizarSolicitud").click(function(){

    $("#finalizarSolicitud").css("display", "none");
    $("#spinerCargando").css("display", "block");
    $("#mensajeTerminado").css("display", "none");

    $.post("process/index.php", {
            
            process: "administracion_finanza",
            action: "updateFinalizarSolicitud",
    
            idcodigoSolicitud : $("#idcodigoSolicitud").val(),
        },
    
     function(response){
    
         
         $.toast({
             heading: 'Finalizado',
             text:'Solicitud Finalizada ',
             showHideTransition: 'slide',
             icon: 'success',
             hideAfter: 3000, 
             position: 'bottom-center'
    
         });
         $("#spinerCargando").css("display", "none");
         $("#mensajeTerminado").css("display", "block");
         //document.getElementById("#btnCancelar").click();
          // Esperar 6 segundos antes de redirigir
            setTimeout(function () {
                window.location.href = "http://sii.fusalmo.org/?view=vistaAdmnTransporte";
            }, 3000); // 6000 milisegundos = 6 segundos
    
         
    
        
     });
    



});


$("#btnRegisterPasajero").click(function(){
        $.post("process/index.php", {
            
            process: "administracion_finanza",
            action: "addPasajerosInternosTransporte",
    
            id_label_single_value: $("#id_label_single").val(), // Valor asociado al elemento seleccionado
            id_label_single_text: $("#id_label_single option:selected").text(), // Texto del elemento seleccionado
            idcodigoSolicitud : $("#idcodigoSolicitud").val(),
        },
    
     function(response){
    
         if(response)
    
         {
         /*$.toast({
             heading: 'Finalizado',
             text:'Pasajero Registrado ',
             showHideTransition: 'slide',
             icon: 'success',
             hideAfter: 3000, 
             position: 'bottom-center'
    
         });*/
         
         $("#tablaPasajerosInternos").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.tabla.admin.pasajeros.php", { idProyecto: <?php echo json_encode($_REQUEST['idProyecto']); ?> });
     
         $("#btnCancelar3").click();

$(document).ready(function() {
    countRowsAndDisplay();
});
         //document.getElementById("#btnCancelar").click();
          // Esperar 6 segundos antes de redirigir
            //setTimeout(function () {
                //window.location.href = "http://sii.fusalmo.org/?view=monitoreo";
            //}, 4000); // 6000 milisegundos = 6 segundos
    
         }
    
        
     });
    
    });  






$(document).ready(function(){

$('.js-example-basic-single').select2({

    dropdownParent:$('#exampleModal4')

})
      });


      $("#tablaPasajerosInternos").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.tabla.admin.pasajeros.php", { idProyecto: <?php echo json_encode($_REQUEST['idProyecto']); ?> });
     
        
 document.getElementById("idProyectoSelec").value = "<?php echo $esProyeto; ?>" ;
    document.getElementById("idSelectHerramientas").value = "<?php echo $llevarEquipo; ?>" ;

$(document).ready(function() {
    document.getElementById("idProyectoSelec").value = "<?php echo $esProyeto; ?>" ;
    document.getElementById("idSelectHerramientas").value = "<?php echo $llevarEquipo; ?>" ;
    document.getElementById("idPasajeroExterno").value = "<?php echo $pasajeroExterno ?>";


    var valorPasajeroExterno = $("#idPasajeroExterno").val();
    $("#idPasajeroExterno").change(function(){
        if ($(this).val() === "Si") {
            $("#grupoPasjeroExterno1").show();
            $("#idPasajeroListaExterno1").show();
        } else {
            $("#grupoPasjeroExterno1").hide();
            $("#idPasajeroListaExterno1").hide();
        }
    })





    // Detectar el valor actual del select con id "idProyectoSelec"
    var valorProyecto = $("#idProyectoSelec").val();

    // Detectar el valor actual del select con id "idSelectHerramientas"
    var valorHerramientas = $("#idSelectHerramientas").val();

    // Configurar el evento change para el select con id "idProyectoSelec"
    $("#idProyectoSelec").change(function() {
        if ($(this).val() === "Si") {
            $("#detalleProyectoNombre").show();
        } else {
            $("#detalleProyectoNombre").hide();
        }
    });

    // Configurar el evento change para el select con id "idSelectHerramientas"
    $("#idSelectHerramientas").change(function() {
        if ($(this).val() === "Si") {
            $("#idBloqueHerramienta").show();
        } else {
            $("#idBloqueHerramienta").hide();
        }
    });

    // Establecer los valores iniciales de los selects según los valores detectados
    if (valorProyecto === "Si") {
        $("#detalleProyectoNombre").show();
    } else {
        $("#detalleProyectoNombre").hide();
    }

    if (valorHerramientas === "Si") {
        $("#idBloqueHerramienta").show();
    } else {
        $("#idBloqueHerramienta").hide();
    }

    if(valorPasajeroExterno == "Si")
    {
        $("#grupoPasjeroExterno1").show();
            $("#idPasajeroListaExterno1").show();
    }
    else
    {
        $("#grupoPasjeroExterno1").hide();
            $("#idPasajeroListaExterno1").hide();
    }
});

</script>