<style>
    .colorBoton{
        background-color: #DFDFDF;
    }
</style>
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


<ul class="list-group">
  <li class="list-group-item mt-1 mb-1 colorFondo" id="solicitudTransporte">📌 Solicitud de transporte </li>
  <li class="list-group-item mt-1 mb-1 colorFondo" id="debidaDiligencia">📌 Debida Diligencia </li>
 <!-- <li class="list-group-item mt-1 mb-1 colorFondo" id="mapeoAsocios">📌 Mapeo de Asocios</li> -->
</ul>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>

<script>
    
//::::::::::::::: Registro Ficha Comunitaria ::::::::::::::::::
$("#solicitudTransporte").click(function(){
    window.location.href='?view=administracionFinanza';  
})
//::::::::::::::: Debida Diligencia ::::::::::::::::::
$("#debidaDiligencia").click(function(){
    window.location.href='?view=debidaDiligencia';  
})

//::::::::::::::: Mapeo Asocios ::::::::::::::::::::::::
$("#mapeoAsocios").click(function(){
    window.location.href='?view=mapeoAsocios';  
})
</script>