<div  class="modal fade" id=<?php echo $modalId; ?> tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    role="dialog" aria-labelledby=<?php echo $modalId."label"; ?>>

    <div class="modal-dialog modal-dialog-centered form-modal" role="document">
        <div class="modal-content w-100">
            <!-- Apartado del encabezado del MODAL -->
            <div class="modal-header pb-0 border-0  d-flex justify-content-between align-items-center ">
                <?php echo $modalHeaderCont; ?>
            </div>
            
            <!-- Cuerpo del modal -->
            <div class="modal-body mx-1"> 
                <?php echo $modalBodyCont ?? ""; ?>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer p-1 border-0 ">
                <?php echo $modalFooterCont; ?>
            </div>
        </div>
    </div>
</div>
