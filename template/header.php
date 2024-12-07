<?php
    $center = (isset($_SESSION['iu'])) ? "" : "d-block mx-auto";
    $text_center = (isset($_SESSION['iu'])) ? "" : "d-block mx-auto";
?>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<style>
    #header{
        background-color: #20376F;
    }
</style>
<header class="colorBarraSuperior" id="header">
    <div class="inner <?=$text_center?>">
        <a class="logo" href="?view=main"> <img src="assets/images/FUSALMO Logo en Blanco 2 PNG.png" style="width: 120px; " class="pt-2 <?=$center?>"></a>
        <?php if(isset($_SESSION['iu'])){?>
        <nav id="nav">
            <ul>
                <li><a href="?view=main">Inicio</a></li>  
                <li><a href="?view=profile">Mi Perfil</a></li> 
                    <?php
                     
                    if($_SESSION['type'] == "RRHH" || $_SESSION['type'] == "Administrador")
                    {
                        ?>
                        <li><a>Empleados</a>
                            <ul>
                                <li><a href="?view=area">Áreas</a></li>
                                <li><a href="?view=employee">Empleados</a></li>
                                <li>
                                    <a href="">Procesos Administrativos</a>
                                    <ul>
                                        <li><a href="?view=permissions">Solicitud de Permisos</a></li>
                                        <li><a href="?view=personnelactions">Acciones de Personal</a></li>
                                    </ul>
                                </li>                                

                            </ul>                                               
                        </li>                           
                        <?php
                    }    
                    else 
                    {
                        ?>
                        <li><a>Empleados</a>
                            <ul>                          
                                <li><a href="?view=evaluations">Evaluaciones 360°</a></li>
                            </ul>                                               
                        </li>                    
                        <li>
                            <a href="">Procesos Administrativos</a>
                            <ul>
                                <li><a href="?view=permissions">Solicitud de Permisos</a></li>
                                <li><a href="?view=personnelactions">Acciones de Personal</a></li>
                            </ul>
                        </li> 
                        <?php
                    }

                    if($_SESSION['type'] == "Administrador")
                    {
                        ?>
                        <li><a href="">Administrativo</a>
                            <ul>
                                <li><a href="?view=user">Usuarios</a></li>
                                <li><a href="?view=log">Log de Registro</a></li>
                            </ul>                                               
                        </li>                          
                        <?php
                    }
                   //codigo escrito por manuel prueba de estructura ....
                   if($_SESSION['type'] == "Administrador" || $_SESSION['type'] == "AdminMonitoreo" || $_SESSION['type'] == "Gestor")
                   {
                        //codigo de html abajo
                     ?>
                     <style>
                        .colorMenu{
                            background-color: #07709C;
                            color: white;   
                        }
                     </style>
                   <!-- <li ><a class="" href="?view=monitoreoHome">Ficha de Proyecto</a>
                       <!-- <ul>-->
                            <?php
                              /*  if($_SESSION['type'] == "AdminMonitoreo" )
                                {*/
                            ?>
                           <!-- <li><a href="?view=monitoreo">Administracion</a></li>
                            <li><a href="?view=myficha">Mis Fichas </a></li>
                            <?php
                             //   }else if( $_SESSION['type'] == "Gestor" ){
                            ?>
                             <li><a href="?view=myficha">Mis Fichas </a></li>
                            <?php 
                            //}else if ($_SESSION['type'] == "Administrador"){
                            ?>
                            <li><a href="?view=monitoreo">Administracion</a></li>
                            <li><a href="?view=myficha">Mis Fichas </a></li>
                            <?php 
                           // }
                            ?>
                           -->
                      <!--  </ul>    --> 
                   <!-- </li> -->
                     <?php
                   }
                    ?>
                  
                   <?php

                    if($_SESSION['type'] == "Inventario" || $_SESSION['type'] == "Administrador" || $_SESSION['iu'] == 2595 || $_SESSION['iu'] == 220610 || $_SESSION['iu']==220748)
                    {
                        ?>
                        <li>
                            <a href="">Inventario</a>
                            <ul>
                                <li><a href="?view=inventory">Inventario</a></li>
                                <li><a href="?view=inventory-memos">Memos</a></li>
                            </ul>
                        </li> 
                        <?php
                    }                    
                    ?> 
                <li><a href="?view=logoff">Salir</a></li>                
            </ul>
        </nav>
        <?php }?>
    </div>
</header>