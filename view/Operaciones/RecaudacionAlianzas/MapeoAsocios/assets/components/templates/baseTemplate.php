    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>

    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

    <!-- Mensajes de jQuery Validation por defecto traducidos  -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/localization/messages_es.js"></script>

<div class="main-container p-3">
    <?php echo $content_MA; ?> <!-- Datos dinámicos -->
    <p id="--ver" class="mt-2 text-end mb-0">Ver. 2.1.1 | Eleazar</p>
</div>

<script>
    $(document).ready(function() { // Añadiendo CSS dedicado a la página
        var linkCSS = $('<link>', {
            rel: 'stylesheet',
            type: 'text/css',
            href: 'view/Operaciones/RecaudacionAlianzas/MapeoAsocios/assets/CSS/managerStyle.css'
        });

        var linkBS_ico = $('<link>', {
            rel: 'stylesheet',
            href: 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css'
        });

        var linkjQToast = $('<link>', {
            rel: 'stylesheet',
            href: 'https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css'
        });

        $('head').append(linkCSS);
        $('head').append(linkBS_ico);
        $('head').append(linkjQToast);
    });
</script>