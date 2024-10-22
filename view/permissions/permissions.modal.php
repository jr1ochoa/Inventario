<!-- MODAL -->
<div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div id='loadModalPermissions' class="modal-body">
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button id="btnActionPermissions" type="button" class="btn btn-primary" onclick="saveForm()">Guardar</button>
      </div>
    </div>
  </div>  

  <script>
        //Validaciones para guardar formulario
        function saveForm(){
            $('#btnActionPermissions').attr('disabled', true);
            
            if($("#dateStart").val() == "" || $("#timeStart").val() == "" || $("#dateEnd").val() == "" || $("#timeEnd").val() == "" || $("#permissionreason").val() == "" ){
                alert("¡Debe llenar todos los campos del formulario!");
                $('#btnActionPermissions').attr('disabled', false);
            }else
                $('#formPermissions').submit();
        }
  </script>
  
