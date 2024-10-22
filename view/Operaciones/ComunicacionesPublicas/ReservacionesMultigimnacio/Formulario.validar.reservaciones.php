<?php
 $db = "fusalmo_v1";
 $dbUser = "fusalmo_wp";
 $dbPass = "sV3jGr3lVbTl";
 $root = "https://fusalmo.org/";
 
 try 
 {
     $net_fusalmos = new PDO("mysql:host=localhost;dbname=$db", $dbUser, $dbPass);
     $net_fusalmos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
     // Verifica si la conexión se realizó correctamente
     if ($net_fusalmos) {
        //echo "Conexión exitosa a la base de datos.";
     }
 } 
 catch (PDOException $e) 
 {
     print "Error!: " . $e->getMessage() . "<br/>";
     $net_fusalmos = null;
     die("La conexión a la base de datos falló.");
 }
 
  //Cargar datos del empleado
 $iu = isset($_GET['iu']) ? $_GET['iu'] : $_SESSION['iu'];
  
//===========================================================
$valorId = $_REQUEST['idModal'];
 $query = "SELECT * FROM `fus_reservacion` where id = ? ";
 $data12 = $net_fusalmos->prepare($query);
 $data12->execute([$valorId]);

 //==== VARIABLES DEL FORMULARIO =======================
$nombreInstitucion = '';
$tipoInstitucion = '';
$nombreContacto = '';
$correoContacto = '';
$mesaSeleccionada = '';
$interes = '';
$cantidadPlaza = 0;
$descripcionPlaza = '';
$cantidadCursos = 0;
$descripcionCursos = '';
 while ($data = $data12->fetch()) 
{

    $nombreInstitucion = $data[1];
    $tipoInstitucion = $data[2];
    $nombreContacto = $data[3];
    $correoContacto = $data[4];
    $mesaSeleccionada = $data[5];
    if($data[6] ==  1)
    {
        $interes = 'Laborales, ';
    }
    if($data[7] ==  1)
    {
        $interes .= 'Educativas, ';
    }
    if($data[8] ==  1)
    {
        $interes .= ' Voluntariado';
    }
    
    $cantidadPlaza = $data[9];
    $descripcionPlaza = $data[10];
    $cantidadCursos = $data[11];
    $descripcionCursos = $data[12];
}
?>

<div class="row">
    <div class="col-6">
    <input type="hidden" disabled value="<?=$valorId?>" class="form-control"  id="idSolicitud" placeholder="name@example.com">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Institución</label>
            <input type="text" disabled value="<?=$nombreInstitucion?>" class="form-control"  id="nombreInstitucion" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tipo Institución</label>
            <input type="text" disabled value="<?=$tipoInstitucion?>" class="form-control" id="tipoInstitucion" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nombre Contacto</label>
            <input type="text" disabled value="<?=$nombreContacto?>" class="form-control" id="nombreContacto" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email Contacto</label>
            <input type="text" disabled value="<?=$correoContacto?>" class="form-control" id="emailContacto" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Mesa Seleccionada</label>
            <input type="text" disabled value="<?=$mesaSeleccionada?>" class="form-control" id="mesaSeleccionada" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label" style="background-color: #1A4262; color: white;">Seleccionar Acción</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="accionSelet">
                <option selected>Seleccionar Accion</option>
                <option value="3">Aprobar Solicitud </option>
                <option value="4">Eliminar Solicitud</option>
            </select>
        </div>
    </div>
    <div class="col-6">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Interés de la Empresa</label>
            <input type="text" disabled value="<?=$interes?>" class="form-control" id="interesEmpresa" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Cantidad de Plaza</label>
            <input type="text" disabled value="<?=$cantidadPlaza?>" class="form-control" id="cantidadPlaza" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Descripción de la Plaza</label>
            <textarea disabled class="form-control" id="descripcionPlaza" rows="3"><?=$descripcionPlaza?></textarea>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Cantidad de Cursos</label>
            <input type="text" disabled value="<?=$cantidadCursos?>" class="form-control" id="cantidadCurso" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Descripción de la Plaza</label>
            <textarea disabled class="form-control" id="descripcionPlaza" rows="3"><?=$descripcionCursos?></textarea>
        </div>


    </div>
</div>