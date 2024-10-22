<!-- ESTRUCTURA DEL MODAL -->
<div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div id='loadModalProfile' class="modal-body">
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btnDismiss">Cerrar</button>
        <button id="btnActionProfile" type="button" class="btn btn-primary" onclick="saveForm()" >Guardar</button>
      </div>
    </div>
  </div> 

  <script>
    //Enviar datos de los formularios
    function saveForm(){
        
        /*
        //Vadilación de campos vacios
        if($("#module").val() == 1){
            var vacios = 0;

            $('.form-control').each(function(index) {
                if($(this).attr("id") != "txtThirdName"){
                    if ($(this).val() == "") {
                        vacios++;    
                        console.log($(this).attr("name"));      
                    }
                }
            });

            if (vacios > 0) {
                alert("Debe llenar todos los campos!");
            }else{
                $('#formProfile').submit();
            }
        }else{
            $('#formProfile').submit();
        }     */
        
        $('#formProfile').submit();
            
    }
  </script>