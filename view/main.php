<?php include("../config/net.php");

//SISTEMA SIIF TALENTO HUMANO PRINCIPAL

    $query = "SELECT * FROM employee_transcript_personal WHERE id = :n1";

    $employe = $net_rrhh->prepare($query);

    $employe->bindParam(':n1', $_SESSION['iu']);

    $employe->execute();

    

?>

<script src="https://cdn.jsdelivr.net/npm/@floating-ui/core@1.5.3"></script>

<script src="https://cdn.jsdelivr.net/npm/@floating-ui/dom@1.5.4"></script>

<!-- Main -->

<div id="main">

    <div class="inner">



    <!-- Content -->

        <div id="content">

            <hr style='margin-top: 0px; padding-top: 0px;'/>

            <!-- Posts -->

                <div class="row">

                    <div class="col-lg-6 col-md-12 col-xs-12">

                        <h2><b>Bienvenido al SIIF</b></h2>

                        

                        <p>Sistema de Información Institucional FUSALMO</p>

                        <br/>

                    </div>

                    <div class="col-lg-6 col-md-12 col-xs-12">

                       <!-- <img src="assets/images/LogoFusalmo.png" style="width: 90%; margin-left: 5%"/>-->

                    </div>



                    <div class="col-lg-12 col-md-12 col-xs-12">

                    

                        <?php

                            $query = "Select * from employee_institutional where idemployee = ". $_SESSION['iu'];

                            $DatosInstitucionales = $net_rrhh->prepare($query);

                            $DatosInstitucionales->execute();

                            

                            if($DatosInstitucionales->rowCount() > 0)

                            {

                                    $Datos = $DatosInstitucionales->fetch();

                                    $correo = $Datos[2];

                                    $ext = $Datos[3] ;

                                    $color = "blue";

                            }

                            else

                            {

                                    $color = "black";//red

                                    $correo = "(Información pendiente de ingresar)";

                                    $ext    = "(Información pendiente de ingresar)";

                            }

                        ?>    

                        <!--MENÚ DE LAS AREAS ::::::::::::::::::::::::-->

                        <style>

                            .tamañoTexto{

                                font-size: 9px;

                                font-weight: 700;

                            }

                            .colorFondo{

                                background-color: #EEE6D6;

                                border-radius: 12px;

                            }

                            .colorFondo:hover{

                                background-color: #C0E5B9;

                            }

                        </style>

                        <div class="row">

                         <!-- <div class="col-md-2">
                          <div class="col-md " id="programassasda">

<img src="assets/images/money_14098066.png" class="colorFondo"style="width: 80%; " data-toggle="popover" title="ÁREAS QUE INCLUYE" data-bs-content="<ul><li><Entornos Virtuales.</li><li>Clubes STEAM.</li><li>Refuerzo Educativo</li><li>Protagonismo Juvenil</li><li>Formación para el trabajo</li><li>cademias Deportivas</li><li>Pastoral Juvenil</li><li>Becas P. Evertz </li></ul>"/>

<p class="tamañoTexto mt-1">DIRECCIÓN EJECUTIVA </p>

</div>
                          </div> -->


                          <div class="col-1 d-flex justify-content-center">
                            <hr class="vr align-self-center h-75">
                        </div>



                          <div class="col-md">
<div class="row">


<!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
<div class="col-md-3 " id="programas">
<img src="assets/images/delivery_14097912.png" class="colorFondo"style="width: 60%; " data-toggle="popover" title="ÁREAS QUE INCLUYE" data-bs-content="<ul><li>ESTRATEGIAS EDUCATIVAS Y PEDAGOGICAS</li><li>STEAM.</li><li>ENTORNOS VIRTUALES</li><li>PASTORAL JUVENIL</li><li>ACADEMIAS DEPORTIVAS</li><li>PROTAGONISMO JUVENIL</li></ul>"/>
<p class="tamañoTexto mt-1"> DIRECCIÓN DE PROGRAMAS </p>
</div>
<!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
<div class="col-md-3 " id="OperacionesFusalmo">

<img src="assets/images/commerce_14098177.png" class="colorFondo"style="width: 60%; " data-toggle="popover" title="ÁREAS QUE INCLUYE" data-bs-content="<ul><li>ENCARGADA DE CUMPLIMIENTO</li><li>INNOVACIÓN Y GESTIÓN DEL APRENDIZAJE</li><li>SOCIOLABORAL</li><li>COMUNICACIONES Y RELACIONES PÚBLICAS</li><li>TALENTO HUMANO</li><li>ADMINISTRACIÓN Y FINANZAS</li><li>GESTIÓN Y ALIANZAS CORPORATIVAS</li></ul>"/>

<p class="tamañoTexto mt-1">DIRECCIÓN DE OPERACIONES </p>  

</div>
<!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->

<?php

//Cargar datos del empleado

$iu = isset($_GET['iu']) ? $_GET['iu'] : $_SESSION['iu'];

if($iu ==220687 || $iu == 218030 || $iu == 220732)
{
?>
<div class="col-md-3 " id="proyectos">
<?php
} else
{
?>
<div class="col-md-3 " id="inovacionygestion">
<?php

}
?>


<img src="assets/images/web_14097972.png" class="colorFondo"style="width: 60%; " data-toggle="popover" title="ÁREAS QUE INCLUYE" data-bs-content="<ul><li>El registro de la información de todos los proyectos</li></ul>"/>

<p class="tamañoTexto mt-1">DIRECCIÓN DE <br> PROYECTOS &nbsp; &nbsp; </p>

</div>
<!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->

<div class="col-md-3 " id="innovacion_direccion">

<img src="assets/images/business_14098051.png" class="colorFondo"style="width: 60%; " data-toggle="popover" title="ÁREAS QUE INCLUYE" data-bs-content="<ul><li>IT Y DESARROLLO</li><li>MEAL</li></ul>"/>

<p class="tamañoTexto mt-1">DIRECCIÓN DE INNOVACIÓN  </p>

</div>


<div class="col-md-3 " id="DASHOBOAR">

<img src="assets/images/business_14098174.png" class="colorFondo"style="width: 60%; " data-toggle="popover" title="ÁREAS QUE INCLUYE" data-bs-content="<ul><li>IMPACTO FUSALMO</li></ul>"/>

<p class="tamañoTexto mt-1">DASHBOARD FUSALMO  </p>

</div>

<!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->

</div>




                       








                          </div>



                           

                           


                         



                           






                           <!-- <div class="col-md-3 " id="desarrollosoftware">

                            <img src="assets/images/web_14098143.png" class="colorFondo"style="width: 50%; " data-toggle="popover" title="ÁREAS QUE INCLUYE" data-bs-content="<ul><li>Formulación de Proyectos y Consultorias.</li><li>Ejecución de Proyectos y Consultorías.</li></ul>"/>

                            <p class="tamañoTexto mt-1">DESARROLLO SOFTWARE </p>

                            </div> -->



                           

                            <script>

                            $(document).ready(function(){

                                // Inicialización del Popover

                                $('[data-toggle="popover"]').popover({

                                trigger: 'hover', // Mostrar el popover al pasar el mouse

                                html: true // Permitir contenido HTML

                                });

                            });

                            </script>



                        </div>

                       <!-- <table class="table table-hover table-borderless" style="width: 100%; ">

                        <thead>

                            <th><b>DATOS INSTITUCIONALES</b></th>

                            <th>INFORMACIÓN</th>

                        </thead>

                        <tbody>

                        

                            <tr style='background-color: white;' ><td>Mi Correo Institucional: </td>

                                <td style="padding-left: 20px; color: <?=$color?>"><?=$_SESSION['user']?> </td>

                            </tr>

                            <tr>

                                <td>Mi Extensión de Contacto:</td>

                                <td style="padding-left: 20px; color: <?=$color?>"><?=$ext;?></td>

                            </tr>

                        </tbody>

                        

                        </table>-->

                        <style>

                            .tituloCumpleañeros{

                                background-color: #F1ECE2;

                                border-radius: 10px;

                                text-align: center;

                                margin-bottom: -40px;

                            }

                            </style>

                        <?php

                            

                            $query = "SELECT 

                            e.id, 

                            CONCAT_WS(' ', e.name1, e.name2, e.name3, e.lastname1, e.lastname2) AS FullName,

                            DAY(e.birthday) AS BirthdayDay,

                            a.area

                        FROM 

                            employee AS e 

                        INNER JOIN 

                            workarea_positions_assignment AS ca ON ca.idemployee = e.id 

                        INNER JOIN 

                            workarea_positions AS c ON c.id = ca.idposition 

                        INNER JOIN 

                            workarea AS a ON c.idarea = a.id

                        WHERE 

                            MONTH(e.birthday) = ".date("m")." AND ca.enddate = '0000-00-00' 

                        ORDER BY 

                            DAY(e.birthday) ASC

                        ";



                            $Cumpleañeros = $net_rrhh->prepare($query);

                            $Cumpleañeros->execute();

                            

                            $mes = (date("m") == "01") ? "Enero" : "";

                            $mes = (date("m") == "02") ? "Febrero" : $mes;

                            $mes = (date("m") == "03") ? "Marzo" : $mes;

                            $mes = (date("m") == "04") ? "Abril" : $mes;

                            $mes = (date("m") == "05") ? "Mayo" : $mes;

                            $mes = (date("m") == "06") ? "Junio" : $mes;

                            $mes = (date("m") == "07") ? "Julio" : $mes;

                            $mes = (date("m") == "08") ? "Agosto" : $mes;

                            $mes = (date("m") == "09") ? "Septiembre" : $mes;

                            $mes = (date("m") == "10") ? "Octubre" : $mes;

                            $mes = (date("m") == "11") ? "Noviembre" : $mes;

                            $mes = (date("m") == "12") ? "Diciembre" : $mes;

                            

                           

                            

                            echo "<br /><div class='tituloCumpleañeros'> Cumpleañeros del Mes de <b>$mes: </b></div><br /><br />";

                            if($Cumpleañeros->rowCount() > 0)

                            {   

                                echo "<table class='table table-hover table-borderless' style='width: 100%;'>

                                      <tr><th style='width: 40%; padding: 10px; background-color: #ECECEC;'>Empleado</th>

                                        <th style='width: 10%; text-align: center; padding: 10px; background-color: #ECECEC;'>Dia</th>

                                        <th style='width: 50%; padding: 10px; background-color: #ECECEC;'>Area de Trabajo</th><tr>";



                                while($Empleados = $Cumpleañeros->fetch())        

                                {

                                    $color = ($Empleados[2] == date("d")) ? "Green" : "#4F6FAE";

                                    echo "<tr style='background-color: white;'>

                                                        <th style='color: $color; padding: 10px;'>  ". sanear_string(strtoupper($Empleados[1]))."</th>

                                                        <th style='color: $color; padding: 10px; text-align: center;'>  $Empleados[2]</th>

                                                        <th style='color: black; padding: 10px;'>".sanear_string(strtoupper($Empleados[3]))."</th>

                                                     </tr>";

                                }

                                echo "</table>";

                            }

                        ?>                        



                    </div>                    

                </div>



        </div>



    <!-- Sidebar -->

        <div id="sidebar">



        <!-- Features -->

            <section class="features">

                <style>

                    .miInformacion{

                        background-color: #F1ECE2;

                                border-radius: 10px;

                                text-align: center;

                               

                    }

                </style>

                  <?php

                  //Cargar datos del empleado

$iu = isset($_GET['iu']) ? $_GET['iu'] : $_SESSION['iu'];

            //Cargar fotografía del empleado

            $query = "SELECT picture FROM employee_picture WHERE idemployee = " . $iu;

            $picture = $net_rrhh->prepare($query);

            $picture->execute();



            if ($picture->rowCount() > 0) {

                $dataI = $picture->fetch();

                $img = $dataI[0];

            } else

                $img = "profile_14082740.png";

            ?>



<style>

    .colorFondoTike{

        background-color: #f3f3f3a6;

    }

    .borderFotoPerfil{

        border-radius: 50%;

    }

</style>

<!--$_COOKIE
<img class="mx-auto d-block borderFotoPerfil" src="process/pictures/<?=$img?>" style='width: 50%' />

  <div class="card-body">

    <h5 class="card-title"><b><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">

  <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>

</svg> Foto Institucional</b></h5>

    <p class="card-text"></p>

  </div>-->

<div class=" mx-5 mt-3 " style="width: 80%;">

<img class="mx-auto d-block borderFotoPerfil" src="process/pictures/<?=$img?>" style='width: 50%' />
<center>
<div class=" card-body">
    <div  id="actualizarMiPerfil" class=" btn btn-sm" style="background-color: #FEF5CC; border-radius:8px; height:25px; ">
        <p style="color:black; text-decoration: underline;">Actualizar mi  Perfil</p><!--<h2>Actualización de Expendiente</h2><p>Recursos Humanos requiere la atualización de tu información</p>-->
    </div>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-feather" viewBox="0 0 16 16">
        <path d="M15.807.531c-.174-.177-.41-.289-.64-.363a3.8 3.8 0 0 0-.833-.15c-.62-.049-1.394 0-2.252.175C10.365.545 8.264 1.415 6.315 3.1S3.147 6.824 2.557 8.523c-.294.847-.44 1.634-.429 2.268.005.316.05.62.154.88q.025.061.056.122A68 68 0 0 0 .08 15.198a.53.53 0 0 0 .157.72.504.504 0 0 0 .705-.16 68 68 0 0 1 2.158-3.26c.285.141.616.195.958.182.513-.02 1.098-.188 1.723-.49 1.25-.605 2.744-1.787 4.303-3.642l1.518-1.55a.53.53 0 0 0 0-.739l-.729-.744 1.311.209a.5.5 0 0 0 .443-.15l.663-.684c.663-.68 1.292-1.325 1.763-1.892.314-.378.585-.752.754-1.107.163-.345.278-.773.112-1.188a.5.5 0 0 0-.112-.172M3.733 11.62C5.385 9.374 7.24 7.215 9.309 5.394l1.21 1.234-1.171 1.196-.027.03c-1.5 1.789-2.891 2.867-3.977 3.393-.544.263-.99.378-1.324.39a1.3 1.3 0 0 1-.287-.018Zm6.769-7.22c1.31-1.028 2.7-1.914 4.172-2.6a7 7 0 0 1-.4.523c-.442.533-1.028 1.134-1.681 1.804l-.51.524zm3.346-3.357C9.594 3.147 6.045 6.8 3.149 10.678c.007-.464.121-1.086.37-1.806.533-1.535 1.65-3.415 3.455-4.976 1.807-1.561 3.746-2.36 5.31-2.68a8 8 0 0 1 1.564-.173"/>
        </svg>
    <p class="card-text"></p>
  </div>

</center>
 
  <ul class="list-group list-group-flush">

    <li class="list-group-item"><b>Usuario:</b> <td><?=$_SESSION['user']?></td></li>

    <li class="list-group-item"><b>Tipo de Usuario:</b>  <td><?=$_SESSION['type']?></td></li>

    <!--<li class="list-group-item">A third item</li>-->

  </ul>

  

</div>

<style>

    .borderBOton{

        border-radius: 6%;

    }

</style>

<center class="mt-1">
<!--card-header-->
<div class="container">
<div  style="background-color: #183D5A; color:azure; border-radius:6px;">
Acceso Rápido
  </div>
  <style>
        
        .valortabla {
            border: 0.5px dashed  #7F8AAE; /* Bordes de celdas */
            padding: 8px; /* Espacio interno de celdas */
            text-align: center; /* Alineación centrada del texto */
            border-radius: 12px;
            background-color: #ffffff; /* Color de fondo por defecto */
    transition: background-color 0.3s ease; /* Efecto de transición */
        }
        .th-hover {
            transition: background-color 0.3s ease; /* Efecto de transición */
            
        }
        .th-hover:hover {
            background-color: #D3D3D3; /* Color de fondo al pasar el mouse */
        }
        .highlight {
    background-color: #ffff00; /* Color amarillo para el efecto de iluminación */
}
    </style>
<div class="row">
<div class="col-1">

</div>
<div class="col-10">
<center >
<table class="table table-bordered border-primary table-sm" style="border-radius: 22px;">
    
    <tbody >
        <tr>
            <th class="valortabla  th-hover">
                <div class="col-md pt-3" id="bitacora">
                <a href="?view=spaces" style="text-decoration: none;">
                <img src="assets/images/sign_14098168.png" class="colorFondo"style="width: 70%; "/>
                <p class="tamañoTexto mt-1" style="color: black;"> BITÁCORA &nbsp;</p>  
                </a>
                </div>
            </th>
            <th class=" valortabla1 valortabla th-hover">
                <div class="col-md  " id="registroTransporte">
                <img src="assets/images/travel_14098017.png" class="colorFondo"style="width: 55%; "/>   
                <p class="tamañoTexto mt-1">STIF </p>  
                </div>
            </th>

            <style>
                  .imagen_gris {
            display: block;
            margin: 0 auto;
            filter: grayscale(100%); /* Aplicar blanco y negro */
        }
                </style>
            <th class="valortabla th-hover"  >
<!--id="votacionesFusalmo" class_"" id="elemento" -->
                <div class="col-md  " id="votacionCerrada" >
                <img src="assets/images/vote_3553615.png" class=" imagen_gris "style="width: 55%; "/>   
                <p class="tamañoTexto mt-1">VOTACIONES  <br>FUSALMO </p>  
                </div>
            </th>




        </tr>
        <tr>
            <th class="valortabla pt-3 th-hover">
                <div class="col-md" id="idProyecto">
                <img src="assets/images/arrow_14098189.png" class="colorFondo"style="width: 70%; "/>
                <p class="tamañoTexto mt-1">Mis Proyectos</p>  
                </div>
            </th>
            <th class="valortabla th-hover">
                <center>
                <div class="col-md" id="registroTransporte">
                <div class="cuadrado-doble-borde "></div>
                </div>
                </center>
                
            </th>
            <th class="valortabla th-hover">
                <center>
                <div class="col-md" id="registroTransporte">
                <div class="cuadrado-doble-borde "></div>
                </div>
                </center>
            </th>
        </tr>
    </tbody>
</table>

</center>
</div>
<script>
  function startColorAnimation() {
    const elemento = document.getElementById('elemento');
    
    // Aplica la animación con una duración de 2 segundos
    elemento.style.animation = 'changeColor 2s infinite';
  }

  document.addEventListener('DOMContentLoaded', (event) => {
    startColorAnimation();
  });
</script>


<style>
    .valortabla1 {
  background-color: #D3D3D3; /* Color de fondo inicial */
}

.valortabla1.th-hover {
  transition: background-color 0.5s ease; /* Transición suave entre colores */
}

@keyframes changeColor {
  0% { background-color: #C0E5B9; }
  50% { background-color: #FFFFFF; }
  100% { background-color: #C0E5B9; }
}
        .cuadrado-doble-borde {
            width: 70px;
            height: 50px;
            background-color: #EEE6D6;
            border-radius: 12px;

            
        }
    </style>











</div>


</div>




</center>







<style>
    .tamanoBotn{
        width: 80px;
        height: 18px;
    }
    </style>



















            <!--<section class="features">

                <img class="mx-auto d-block" src="process/pictures/<?=$img?>" style='width: 80%' />

            </section>

                <table class='table table-hover table-borderless table-sm' >

                    

                <tr ><th colspan='2' class="miInformacion">MI INFORMACIÓN </th></tr>

                    <tr><td><b>Usuario:</b></td>

                        <td><?=$_SESSION['user']?></td>

                    </tr>

                    <tr style=" background-color: white;"><td><b>Tipo de Usuario:</b></td>

                        <td><?=$_SESSION['type']?></td>

                    </tr>  



                    <?php



                        $query = "SELECT a.area, c.position 

                                  FROM employee as e 

                                  INNER JOIN workarea_positions_assignment as ca on ca.idemployee = e.id 

                                  INNER JOIN workarea_positions as c on c.id = ca.idposition 

                                  INNER JOIN workarea as a on c.idarea = a.id

                                  WHERE enddate = '0000-00-00' AND ca.idemployee = ".$_SESSION['iu'];



                        $Positions = $net_rrhh->prepare($query);

                        $Positions->execute();        

                        

                        if($Positions->rowCount() > 0)

                        {

                            $datap = $Positions->fetch();

                            echo utf8_encode("<tr style=' background-color: white;'><td><b>&Aacute;rea:</b> </td><td>$datap[0]</td></tr>

                                    <tr style=' background-color: white;'><td ><b>Cargo:</b> </td><td>$datap[1]</td></tr>");

                        }

                        else                        

                            echo "<tr style=' background-color: #F2D575;'><td colspan='2'><b style='color: darkred;  '>Cargo no Asignado</b></td></tr>";

                        



                    ?>

                    

                </table> --> 

                <style>

                  

                        .elemento {

                            transition: transform 0.3s cubic-bezier(0.25, 0.1, 0.25, 1); /* Cubic Bezier para una transición más suave */

                        }



                        .elemento:hover {

                            transform: scale(1.1); /* Aumenta el tamaño al 110% al pasar el mouse */

                            } 

                        .tamañoActualizaPerfil{

                            width: 180px;

                            height: 40px;

                        }

                    



                        @keyframes salto {

  0%, 20%, 50%, 80%, 100% {

    transform: translateY(0); /* Posición inicial y final */

  }

  40% {

    transform: translateY(-30px); /* Punto más alto del salto */

  }

  60% {

    transform: translateY(-15px); /* Punto medio del salto */

  }

}



.elemento2 {

  width: 120%;

  padding-bottom: -40px;

  background-color: #C29078;

  color:black;

  display: flex;

  align-items: center;

  justify-content: center;

  cursor: pointer;

  border: 1px solid #ccc;

  animation: salto 1s ease  2; /* Nombre de la animación, duración, tipo de temporización y repetición infinita */

}



@keyframes agrandarDisminuir {

  0%, 100% {

    transform: scale(1);

  }

  50% {

    transform: scale(1.05); /* Ajusta el valor según tu preferencia para el tamaño máximo durante la animación */

  }

}



.elemento3 {

  

  animation: agrandarDisminuir 2s ease infinite; /* Duración de 2 segundos, función de temporización ease, repetición infinita */

}

.tamañoAlerta{

    font-size: 18px;

}

             </style>



<?php

                $employee = $_SESSION['iu'];

                 $query = "SELECT 

                 a.id, a.evaluationtype, f.form,

                 CONCAT(e1.name1, ' ', e1.name2, ' ', e1.name3, ' ', e1.lastname1, ' ', e1.lastname2) as Evaluador, 

                 a.state  

               FROM evaluations_assignments AS a 

               INNER JOIN evaluations AS e ON a.idevaluation = e.id AND e.status = 1 

               INNER JOIN evaluations_forms AS f ON a.evaluationform = f.id 

               INNER JOIN employee AS e1 ON a.idemployee = e1.id 

               WHERE a.idevaluator = $employee";



                $evaluations = $net_rrhh->prepare($query);

                $evaluations->execute();



                if($evaluations->rowCount() > 0)

                {

                    $contador =0;

                    while($datae = $evaluations->fetch())

                    { 

                        if($datae[4] == "Pendiente")

                        {

                            $contador++;

                        }

                       

                    }  

                    if($contador >0 )//==-1 >0

                    {

                        echo "

                        <a href='?view=evaluations'type='button' class='btn btn-sm elemento2'>

                        <p class='elemento3 tamañoAlerta'>Evaluación Pendiente</p>

                        </a>";



                        echo '<button id="btnModal"  style="display:none;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">

                        Launch demo modal

                      </button>

                      ';

                    }

                    else

                    {



                    }

                   

                    

                }

                ?>



                

               

                

               

               

                            

            </section>

           

        

        </div>

    </div>

</div>

<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <div class="modal-header">

     

        <h1 class="modal-title fs-5 d-block mx-auto"  id="exampleModalLabel">

       

              EVALUACION PENDIENTE QUE REALIZAR     </h1>

           

       

      </div>

      <div class="modal-body">

        <center>

        <b>Recordatorio de Evaluaciones Pendientes</b>

        </center>

      

      <br/>



Estimado Usuario ,<br/>



Queremos recordarte amablemente que actualmente tienes evaluaciones pendientes de completar. Por favor, toma un momento para completar las evaluaciones asignadas antes de la fecha de vencimiento correspondiente.  



Accede a tu cuenta y dirígete a la sección de "Evaluaciones 360°" para completarlas. Si tienes alguna pregunta o necesitas asistencia, no dudes en ponerte en contacto con nuestro equipo de soporte. <br/><br/>

<center>



<br/>

Atentamente,

<br/>

<b>Talento Humano</b>

</center>



      </div>

      <div class="modal-footer">

        <a type="button" class="btn  btn-secondary" data-bs-dismiss="modal">IGNORAR</a>

        <a href='?view=evaluations' class="btn btn-primary">IR A LAS EVALUACIONES</a>

      </div>

    </div>

  </div>

</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>



<script>

    

$(document).ready(function(){



    var contador = '<?=$contador?>';

    if(contador!=0)

    {

        $('#btnModal').trigger('click');

    }



     // Ejemplo de mostrar un toast al cargar la página

     $.toast({

      text: '¡Hola! Bienvenido al sistema SIIF. ',

      showHideTransition: 'fade',

      icon: 'info',

      position: 'bottom-left',

      hideAfter: 6000   // in milli seconds

    });

});

//::::::::::::::: OPCIONES DE VOTACIONES ::::::::::::::::::

$("#votacionesFusalmo").click(function(){

    window.location.href='?view=votaciones'; 

})
//::::::::::::: INNOVACION :::::::::::::::::::::::::::::
$("#innovacion_direccion").click(function(){
    window.location.href='?view=direccion_innovacion';
})

//:::::::::::::: DASHBOARD FUSALMO ::::::::::::::::::::
$("#DASHOBOAR").click(function(){
    window.location.href='?view=memoria_labores_dashboard';
})


//::::::::::::::::::::::::::::::::::::::::::::::::::::::
$("#actualizarMiPerfil").click(function(){
    window.location.href='?view=transcript';
})
$("#idProyecto").click(function(){
    window.location.href='?view=monitoreoHome';
})
//::::::::::::::::: OPERACIONES :::::::::::::::::::::::::::::::::::
$("#OperacionesFusalmo").click(function(){

window.location.href='?view=opeFusalmo'; 

})



//::::::::::::::::: VER ESTADISTICAS ::::::::::::::::::::::::::::::::

$("#ESTADISTICAS").click(function(){

    window.location.href='?view=votacionesEstadisticas'; 

})

//::::::::::::::: OPCIONES DE OPERACIONES ::::::::::::::::::

$("#operaciones").click(function(){

    $.toast({

  text: '¡Hola! Actualmente seguimos en desarrollo. ',

  showHideTransition: 'fade',

  bgColor: '#f7d794',

    textColor: 'black',

    position: 'top-center',

  hideAfter: 6000   // in milli seconds

}); 

})


//::::::::: VOTACIONES CERRADAS :::::::::::::::::::::::::::::::::
$("#votacionCerrada").click(function(){

$.toast({

text: '¡Hola! Sistema de votaciones finalizado. ',

showHideTransition: 'fade',

bgColor: '#FFFC00',

textColor: 'black',

position: 'top-center',

hideAfter: 6000   // in milli seconds

}); 

})
//::::::::::::::: DESARROLLO SOFTWARE ::::::::::::::::::::::

//

$("#desarrollosoftware").click(function(){

   // window.location.href='?view=transcript';

   window.location.href='?view=desarrolloSoftware';

});

//registroTransporte
$("#registroTransporte").click(function(){

// window.location.href='?view=transcript';

window.location.href='?view=administracionFinanza';

});
//::::::::::::::: OPCION DE PROYECTOS ::::::::::::::::::::::

$("#proyectos").click(function(){

  window.location.href='?view=proyectoFusalmo';

  /*  $.toast({

  text: '¡Hola! Actualmente seguimos en desarrollo. ',

  showHideTransition: 'fade',

  bgColor: '#f7d794',

    textColor: 'black',

    position: 'top-center',

  hideAfter: 6000   // in milli seconds

}); */

});

//::::::::::::::: OPCION DE PROGRAMAS ::::::::::::::::::::::

$("#programas").click(function(){

    window.location.href='?view=programasSiif'; 

});



//:::::::::::::: OPCION DE INNOVACION Y GESTION :::::::::::::::

$("#inovacionygestion").click(function() {

    

    $.toast({

  text: '¡Hola! Actualmente seguimos en desarrollo. ',

  showHideTransition: 'fade',

  bgColor: '#f7d794',

    textColor: 'black',

    position: 'top-center',

  hideAfter: 6000   // in milli seconds

});   

}); 

</script>