

<div class="row">
    <div class="col-7">
<center class="mt-3"><h2><b>FICHA DE PROYECTO</b></h2></center>
    <div class="select-cards-cont my-5 mx-5 flex-grow-1 d-flex justify-content-center">
                    <div class="row justify-content-center">
                        <div class="col-5 h-100">
                            <div class="card">
                                <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                                    <div class="mb-2"><img src="assets/images/book_12356943.png" height="75px" width="75px"></div>
                                    <h3 class="card-title">Ingresar a la Fichas de Proyecto</h3>
                                    <p class="card-text">Echa un vistazo a las fichas de proyecto asignadas a tu proyecto.</p>

                                   
                               
                          

                                <?php
                                if($_SESSION['type'] == "AdminMonitoreo" )
                                {
                            ?>
                                <a href="?view=monitoreo" class="btn-info btn">
                                    <i class="bi bi-gear"></i> Acceder
                                </a>
                            <?php
                                } else
                                {
                            ?>
                               <a href="?view=myficha" class="btn-info btn">
                                    <i class="bi bi-gear"></i> Acceder
                                </a>

                               <?php 
                                }
                               ?>
                            


                                    
                                       
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
                                    <h3 class="card-title">Administrar Fichas de Proyecto</h3>
                                    <p class="card-text">
                                    Gestiona las fichas de proyecto o agrega nuevas .    
                                    </p>
                                
                               
                                    <?php
                                if($_SESSION['type'] == "AdminMonitoreo" )
                                {
                            ?>
                                <a href="?view=monitoreo" class="btn-info btn">
                                    <i class="bi bi-gear"></i> Acceder
                                </a>
                            <?php
                                } else
                                {
                            ?>
                               <a class="btn-secondary btn">
                                    <i class="bi bi-gear"></i> Acceso Denegado
                                </a>

                               <?php 
                                }
                               ?>
                               
                               
                               
                             


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="col">
        <div class="mt-3">
            <center>
            <h4 class=" mx-4"><b>Proceso Operativo</b></h4>
        <div style="height: 4px; width:60%; margin-top:-20px;background: linear-gradient(to right, #4F0D97 33%, #9643EF 33%, #AC69F3 66%, #D5B4F8 66%);"></div>

            </center>
            
    </div>
      

            <img src="assets/gifprocesos/Proceso operativo animacion 2.gif" width="100%" class="zoomable" />
            <img src="assets/gifprocesos/Proceso operativo animacion_1.gif" width="100%" class="zoomable"/>
            <img src="assets/gifprocesos/Proceso operativo animacion_2.gif" width="100%" class="zoomable" />
            <img src="assets/gifprocesos/Proceso operativo animacion_3.gif" width="100%" class="zoomable" />
        </div>
        <div class="col-1">

        </div>
    </div>
    <style>
        .zoomable {
        transition: transform 0.3s ease-in-out; /* Suaviza la transición */
    }
    .zoomable:hover {
        transform: scale(1.1); /* Aumenta el tamaño de la imagen al 110% */
    }
    </style>