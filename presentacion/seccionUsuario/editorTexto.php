<div class="">
    <?php
    $tam = array(1);
    $nom = array('Editor sencillo', 'Editor en linea', 'Imágenes en tarjeta', 'Slide + modal');
    foreach ($tam as $act) {
    ?>
        <div class="card">
            <?php
            include "plantillas/EditorTexto/EditorTexto" . $act . ".php"
            ?>
            <div class="card-body">
                <h5 class="card-title"><?php echo $nom[($act - 1)] ?></h5>
                <button id="<?php echo $act ?>" class="btn btn-primary rounded-pill" onclick="elegirEd(this.id)">Elegir</button>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<script>
    function elegirG(tipo) { 
        var f = "<?php echo "&id=".$_GET["id"]."&idPag=".$_GET["idPag"]; ?>";
        $.ajax({
            url: "presentacion/edicionUsuario/elegir.php?v=0&tipo=" + tipo+ f,
            type: "GET",
            processData: false,
            contentType: false,
            cache: false,
            success: function(response) {
                ElegirSeccion(response);
                $('#secc').collapse('hide');
            }
        })
    }
</script>