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
  <li class="list-group-item mt-1 mb-1 colorFondo" id="fichaComunitaria">📌 Ficha Comunitaria </li>
 <!-- <li class="list-group-item mt-1 mb-1 colorFondo" id="mapeoAsocios">📌 Mapeo de Asocios</li> -->
  <li class="list-group-item">A third item</li>
  <li class="list-group-item">A fourth item</li>
  <li class="list-group-item">And a fifth one</li>
</ul>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>

<script>
    
//::::::::::::::: Registro Ficha Comunitaria ::::::::::::::::::
$("#fichaComunitaria").click(function(){
    window.location.href='?view=homeFichaComunitaria';  
})
/*
$("#fichaComunitaria").click(function(){
    window.location.href='?view=fichaComunitaria';  
}) */
//::::::::::::::: Mapeo Asocios ::::::::::::::::::::::::
$("#mapeoAsocios").click(function(){
    window.location.href='?view=mapeoAsocios';  
})
</script>