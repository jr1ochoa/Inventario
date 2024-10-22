<?php

include("../../config/net.php");



$query = "SELECT p.* FROM processarea_permission as p 

    INNER JOIN workarea_positions_assignment  as wpa ON p.idposition = wpa.id  AND wpa.enddate = '0000-00-00'

    WHERE wpa.idemployee =" . $_SESSION['iu'] . " and p.permissiontype = 'Diligencias Personales' and p.status = 'Aceptar' AND YEAR(p.dtc) = YEAR(NOW())";

$permissions = $net_rrhh->prepare($query);

$permissions->execute();



$contHoras = 0;

$contMin = 0;

$html = '';



$html .= "<table style='width: 100%;' class='mt-3'>

    <tr>

        <th>Fecha/Hora de Inicio</th>

        <th>Fecha/Hora de Finalización</th>

        <th>Tipo de Permiso</th>

        <th>Horas</th>

    </tr>";



  

    while ($data = $permissions->fetch()) {

        $arrayHoras = calcularHoras($data[4], $data[6], $data[5], $data[7]);

        $ht = $arrayHoras[0];

        $mt = $arrayHoras[1];

        $contHoras+=$ht;

        $contMin+=$mt;

        $html.= "<tr>

            <th>$data[4] $data[5]</th>

            <th>$data[6] $data[7]</th>

            <th>$data[3]</th>

            <th>$ht:$mt</th>

        </tr>";

        if ($contMin <= 60){

            $contMin = $contMin;

        }

        else {

            $contMin = $contMin-60;

            $contHoras+=1;

        }

    }

    

    

    $html.= "<tr>

            <th colspan='3'>Horas Totales</th>

            <th>$contHoras:$contMin</th>

        </tr></table>";



    $mesActual = date('m');

    switch($mesActual){

        case '01':

        case '02':

        case '03':

            $horasPermitidas = 8;

            break;

        case '04':

        case '05':

        case '06':

            $horasPermitidas = 16;

            break;

        case '07':

        case '08':

        case '09':

            $horasPermitidas = 24;

            break;

        case '10':

        case '11':

        case '12':

            $horasPermitidas = 40;

            break;

    }



    $diferencias = $horasPermitidas - $contHoras;

    $html.= "<label for='recipient-name' class='col-form-label'>El total de horas permitidas hasta la fecha es: $horasPermitidas horas</label>

    <label for='recipient-name' class='col-form-label'>Sus horas restantes son: $diferencias horas</label>";

   

    if($contHoras <= $horasPermitidas){

        //Verificar hora y fecha para poder guardar

        if($_REQUEST['fInicio'] != '' && $_REQUEST['fFin'] != '' && $_REQUEST['hInicio'] != '' && $_REQUEST['hFin'] != ''){

            $date1  = new DateTime($_REQUEST['fInicio']);

            if($date1->format('l')=="Sunday"){

                $html.= "<p>No puede solicitar permisos para día Domingo</p>";

                $html.= "<script>$('#btnActionPermissions').css('display', 'none');</script>";

            }else{

                $horasSolicitadas = calcularHoras($_REQUEST['fInicio'], $_REQUEST['fFin'], $_REQUEST['hInicio'], $_REQUEST['hFin']);

                $hs = $horasSolicitadas[0];

                $ms = $horasSolicitadas[1];

                $html .= "<label for='recipient-name' class='col-form-label'>Cantidad de horas solicitadas: $hs:$ms horas</label>";

                $ms = round($ms/60, 2);

                $hs = $hs + $ms;

                if($hs > $diferencias){

                    $html.= "<p style='background-color: #FFABAF;'>La cantidad de horas que solicita sobrepasa el limite permitido</p>";

                    $html.= "<script>$('#btnActionPermissions').css('display', 'none');</script>";

                }else{

                    $html.= "<p>El permiso puede extenderse de manera correcta</p>";

                    $html.= "<script>$('#btnActionPermissions').css('display', 'block');</script>";

                }

            }

        }else{

            $html .= "<label for='recipient-name' class='col-form-label'>Debe ingresar la hora y fecha de inicio y finalización del permiso si desea saber si puede extender el permiso</label>";

            $html.= "<script>$('#btnActionPermissions').css('display', 'none');</script>";

        }

        

    }else{

        //Bloquear la opción de guardar hasta actualización de mes 

        $html.= "<p>Ya no es posible solicitar más permisos de este tipo</p>";

        $html.= "<script>$('#btnActionPermissions').css('display', 'none');</script>";

    }



    echo $html;



    function calcularHoras($fInicio, $fFin, $hInicio, $hFin){

        $firstDate  = new DateTime($fInicio);

        $secondDate = new DateTime($fFin);

        $intvl = $firstDate->diff($secondDate);



        $limite1 = date_create("12:00");

        $limite2 = date_create("13:00");



        $pd = $firstDate;

        $pd2 = $secondDate;



        if ($intvl->d == 0) {

            $dateTimeObject1 = date_create($hInicio);

            $dateTimeObject2 = date_create($hFin);



            $difference = date_diff($dateTimeObject1, $dateTimeObject2);

            $nuevaFecha = new DateTime('00:00');

            $nuevaFecha->add($difference);



            if ($dateTimeObject1 <= $limite1 && $dateTimeObject2 >= $limite2) {

                $nuevaFecha->modify("-1 hours");

            }



            $horasTotales = $nuevaFecha->format('H:i');

            $arrayHoras = explode(":", $horasTotales);

            return $arrayHoras;



        } else {

            //Día de Fecha de Inicio

            $dateTimeObject1 = date_create($hInicio);

            if($pd->format('l')=='Saturday'){

                $dateTimeObject2 = date_create("12:00");

            }else{

                $dateTimeObject2 = date_create("17:00");

            }



            $difference = date_diff($dateTimeObject1, $dateTimeObject2);

            $nuevaFecha = new DateTime('00:00');

            $nuevaFecha->add($difference);



            if($pd->format('l') !='Saturday' &&  $pd->format('l') !='Sunday'){

                if ($dateTimeObject1 <= $limite1) {

                    $nuevaFecha->modify("-1 hours");

                }

            }

            

            //Día de Fecha de Finalización

            $dateTimeObject1 = date_create("08:00");

            $dateTimeObject2 = date_create($hFin);



            $difference = date_diff($dateTimeObject1, $dateTimeObject2);

            $nuevaFecha2 = new DateTime('00:00');

            $nuevaFecha2->add($difference);



            if($pd2->format('l') !='Saturday' &&  $pd2->format('l') !='Sunday'){

                if ($dateTimeObject2 >= $limite2) {

                    $nuevaFecha2->modify("-1 hours");

                }

            }



            if($pd2->format('l') != 'Sunday') {

                $timeSum = "+" . $nuevaFecha2->format('H') . " hours " . $nuevaFecha2->format('i') . " minutes";

                $nuevaFecha->modify($timeSum);

            }

            

            if ($intvl->d != 1) {

                $horasxDia = 0;

                $fechaRecorrido = $firstDate;

                for($i=0; $i<$intvl->d-1; $i++) {

                    $fechaRecorrido->modify("+1 days");

                    $day = $fechaRecorrido->format('l');

                    if($day == 'Saturday') {

                        $horasxDia += 4;        

                    }elseif($day == 'Sunday') {

                        $horasxDia += 0;

                    }else{

                        $horasxDia += 8;

                    }

                }

                $horasTotales = $nuevaFecha->format('H:i');

                $arrayHoras = explode(":", $horasTotales);

                $arrayHoras[0] = $arrayHoras[0] + $horasxDia;

                return $arrayHoras;

            } else {

                $horasTotales = $nuevaFecha->format('H:i');

                $arrayHoras = explode(":", $horasTotales);

                return $arrayHoras;

            }

        }

    }



?> 