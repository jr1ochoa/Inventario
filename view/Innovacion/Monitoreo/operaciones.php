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
                        <style>
        .img-container {
            text-align: center;
        }
        .img-container img {
            display: block;
            margin: 0 auto;
        }
        .img-caption {
            margin-top: 10px;
            font-weight: bold;
            font-size: 12px;
        }
        .cursor-pointer {
            cursor: pointer;
        }
        .colorFondo2 {
            background-color: #f8f9fa; /* Puedes cambiar esto por el color de fondo que prefieras */
            border-radius: 12px;
            padding-top: 5px;
            margin-top: 8px;
        }
    </style>
<div class="row ">

<div class="col-md-3 colorFondo2 img-container cursor-pointer mx-2" id="modulovotaciones">
    <img src="assets/images/elements_6473770.png" width="40%" class="img-thumbnail colorFondo" alt="...">
    <div class="img-caption">MEMORIA DE LABORES</div>
</div>


<div class="col-md-3 colorFondo2 img-container  mx-2" >
    <img src="assets/images/swtich_17407468.png" width="40%" class="img-thumbnail " alt="...">
    <div class="img-caption">...</div>
</div>

<div class="col-md-3 colorFondo2 img-container  mx-2" >
    <img src="assets/images/swtich_17407468.png" width="40%" class="img-thumbnail " alt="...">
    <div class="img-caption">...</div>
</div>

<div class="col-md-3 colorFondo2 img-container  mx-2" >
    <img src="assets/images/swtich_17407468.png" width="40%" class="img-thumbnail " alt="...">
    <div class="img-caption">...</div>
</div>
<div class="col-md-3 colorFondo2 img-container  mx-2" >
    <img src="assets/images/swtich_17407468.png" width="40%" class="img-thumbnail " alt="...">
    <div class="img-caption">...</div>
</div>


</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>

<script>
    
//::::::::::::::: Registro Ficha Comunitaria ::::::::::::::::::
$("#modulovotaciones").click(function(){
    window.location.href='?view=memoria_labores';  
})
//::::::::::::::: Mapeo Asocios ::::::::::::::::::::::::
$("#mapeoAsocios").click(function(){
    window.location.href='?view=mapeoAsocios';  
})
</script>