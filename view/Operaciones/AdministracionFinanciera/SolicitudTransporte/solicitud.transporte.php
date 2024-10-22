<?php 
include("../../../../config/net.php");
?>
<?php
$idEmpleado =  $_SESSION['iu'];
//echo $idEmpleado."<br>";
$idAreaEmpleado;
$query = "SELECT s1.*, s2.idarea FROM workarea_positions_assignment as s1  inner join workarea_positions as s2   WHERE  s2.id = s1.idposition and s1.idemployee = $idEmpleado";
    $spaces = $net_rrhh->prepare($query);
    $spaces->execute();
    while ($data = $spaces->fetch())
    {
        //echo $data[8];
        $idPosicion = $data[1];
        $idAreaEmpleado = $data[8];
    }
?>

<div class="row">
    <div class="col-9">
<center class="mt-3 "><h2><b>SOLICITUD DE TRANSPORTE</b></h2></center>
    <div class="select-cards-cont my-5 mx-5 flex-grow-1 d-flex justify-content-center">
                    <div class="row justify-content-center">
                        <div class="col-5 h-100">
                            <div class="card">
                                <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                                    <div class="mb-2"><img src="assets/images/book_12356943.png" height="75px" width="75px"></div>
                                    <h3 class="card-title">Crear Nueva Solicitud</h3>
                                    <p class="card-text">Gestiona tus solicitudes de transporte o agrega nuevas .</p>
                                    <button id="formularioTransporte" class="btn-info btn">
                                        <i class="bi bi-gear"></i> Acceder
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-1 d-flex justify-content-center">
                            <hr class="vr align-self-center h-75">
                        </div>

                        <div class="col-5">
                            <div class="card">
                            <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                                    <div class="mb-2"><img src="assets/images/computer_12356933.png" height="75px" width="75px"></div>
                                    <h3 class="card-title">Administrar Solicitudes</h3>
                                    <p class="card-text">Echa un vistazo a las nuevas solicitudes actuales o agrega nuevos.</p>
                                    <?php 
                                    //echo $idPosicion;
                                        if($idAreaEmpleado == 12  || $idAreaEmpleado == 56 || $idPosicion == 437 || $idPosicion == 339)
                                        {
                                    ?>
                                    
                                    <button id="btnAdmin" class="btn-info btn">
                                        <i class="bi bi-gear"></i> Acceder
                                    </button>
                                    
                                    <?php
                                        }
                                        else{

                                        
                                    ?>
                                    <button  class=" btn btn-secondary">
                                        <i class="bi bi-gear"></i> Acceso Denegado
                                    </button>
                                    
                                    <?php 
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


<!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->

        <div class="col">
        <div class="mt-2">
            <center>
            <h4 class=" mx-4"><b>PROCESO SOLICITUD DE TRANSPORTE</b></h4>
        <div style="height: 4px; width:100%; margin-top:-20px;background: linear-gradient(to right, #4F0D97 33%, #9643EF 33%, #AC69F3 66%, #D5B4F8 66%);"></div>

            </center>
            
    </div>
            
    <br/>
    <div  style="background-color: #F9D196; border-radius: 12px;" class="col-12">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
  <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z"/>
</svg> TUTORIALES

<div style="height: 4px; width:100%; background: linear-gradient(to right, #1A4262 33%, #B7BCD7 33%, #B8BDD8 66%, #DEE0ED 66%);"></div>

            </div>
    <a href="https://youtu.be/58uhY5lUp2E" style="color: black;" target="_blank" >
        <svg xmlns="http://www.w3.org/2000/svg" style="color: red;" width="16" height="16" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
  <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z"/>
</svg> CREAR NUEVA SOLICITUD </a>   
    
            <br/>
            <br/>
            <div  style="background-color: #F9D196; border-radius: 12px;" class="col-12">
            <svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journals" viewBox="0 0 16 16">
  <path d="M5 0h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2 2 2 0 0 1-2 2H3a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1H1a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v9a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1H3a2 2 0 0 1 2-2"/>
  <path d="M1 6v-.5a.5.5 0 0 1 1 0V6h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V9h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 2.5v.5H.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1H2v-.5a.5.5 0 0 0-1 0"/>
</svg> MANUALES DE USUARIO

<div style="height: 4px; width:100%; background: linear-gradient(to right, #1A4262 33%, #B7BCD7 33%, #B8BDD8 66%, #DEE0ED 66%);"></div>

            </div>
           



    <a href="view/Operaciones/AdministracionFinanciera/Manuales/Manual Solicitud de Transporte2.pdf" style="color: black;" target="_blank" >
    <svg xmlns="http://www.w3.org/2000/svg" style="color: red;" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-pdf" viewBox="0 0 16 16">
  <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
  <path d="M4.603 14.087a.8.8 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.7 7.7 0 0 1 1.482-.645 20 20 0 0 0 1.062-2.227 7.3 7.3 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a11 11 0 0 0 .98 1.686 5.8 5.8 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.86.86 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.7 5.7 0 0 1-.911-.95 11.7 11.7 0 0 0-1.997.406 11.3 11.3 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.8.8 0 0 1-.58.029m1.379-1.901q-.25.115-.459.238c-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361q.016.032.026.044l.035-.012c.137-.056.355-.235.635-.572a8 8 0 0 0 .45-.606m1.64-1.33a13 13 0 0 1 1.01-.193 12 12 0 0 1-.51-.858 21 21 0 0 1-.5 1.05zm2.446.45q.226.245.435.41c.24.19.407.253.498.256a.1.1 0 0 0 .07-.015.3.3 0 0 0 .094-.125.44.44 0 0 0 .059-.2.1.1 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a4 4 0 0 0-.612-.053zM8.078 7.8a7 7 0 0 0 .2-.828q.046-.282.038-.465a.6.6 0 0 0-.032-.198.5.5 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822q.036.167.09.346z"/>
</svg> MANUAL DE USUARIO </a>  
          

        <!--<img src="assets/gifprocesos/Transporte proceso 2 1.gif" width="90%" class="zoomable" />
        <img src="assets/gifprocesos/Transporte proceso 2_1.gif" width="90%" class="zoomable"/>
        <img src="assets/gifprocesos/Transporte proceso 2_2.gif" width="90%" class="zoomable" />
        <img src="assets/gifprocesos/Transporte proceso 2_3.gif" width="90%" class="zoomable" />
                                    --></div>


<!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
        <div class="col-1">
        </div>
    </div>
    <style>
        .zoomable {
        transition: transform 0.3s ease-in-out; /* Suaviza la transición */
    }
    .zoomable:hover {
        transform: scale(1.3); /* Aumenta el tamaño de la imagen al 110% */
    }
    </style>
    <script>
        $("#formularioTransporte").click(function(){
    window.location.href='?view=vistaSolicitanteTransporte';  
})

$("#btnAdmin").click(function(){
    window.location.href='?view=vistaAdmnTransporte'; 
});
    </script>