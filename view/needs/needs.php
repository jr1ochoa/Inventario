<style>
    a{
        text-decoration: none;
        cursor: pointer;
    }
    i{
        margin-right: 15px;
    }

    body, table th, table td
    {
        font-size: 16px;        
    }
</style>

<!-- Main -->
<div id="main" style='padding: 0rem 0 5rem 0;'>
    <div class="inner">

    <!-- Content -->
        <div id="content">

        <!-- Posts -->
        <section id="contentExp" style="padding-top: 1.5rem;">    
            <div class="row gtr-uniform">

                <div class="col-12 col-12-xsmall">
                    <h2>CUESTIONARIO DETECCIÓN DE NECESIDADES (DNC)</h2>
                    <p>El presente cuestionario tiene como finalidad identificar los requerimientos en materia de capacitación de cada uno de los miembros de la Fundación; por lo que agradeceremos conteste con veracidad los datos que se le solicitan, considerado que cada uno de ellos tiene especial importancia permitiéndonos conocer su perfil de crecimiento personal y profesional, y que estos se proyecten en el Programa de Capacitación para cubrir las necesidades del personal y de la fundación.</p>
                </div>

            </div>

        </section>

        </div>
    </div>
</div>
<?php include("view/needs/transcript.notification.php");?>

<div class="modal fade" id="needs_antiquity" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">  
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="process/">
                    <input type="hidden" name="process" value="Needs">
                    <input type="hidden" name="action" value="Antiquity"> 
                    <div class="row gtr-uniform">

                        <div class="col-12 col-12-xsmall">
                            <h2>Antiguedad del Empleado</h2>
                        </div>
                    
                        <div class="col-3 col-4-xsmall">
                            Año: <input type='number' name='year' class='form-control' max='<?=date("Y")?>' value='<?=$dataa[1]?>' />                                                  
                        </div>

                        <div class="col-3 col-4-xsmall">
                            Mes:
                            <select name='month' class='form-control' style='height: auto;'> 
                                <?php 
                                    
                                    $options = array('', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
                                    foreach($options as $value)
                                    {
                                        $selected = ($value == $dataa[2]) ? "selected='true'" : "" ;
                                        echo "<option value='$value' $selected>$value</option>";
                                    }
                                ?>
                            </select>                          
                        </div>
                                
                        <div class="col-12">
                            <ul class="actions fixed">
                                <li><input type="submit" value="Actualizar Información"></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

