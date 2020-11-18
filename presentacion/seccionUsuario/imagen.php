<div class="">
    <?php
    $tam = array(1, 2, 3, 4);
    $nom = array('Imágenes sencillas', 'Imágenes tipo slide', 'Imágenes en tarjeta', 'Slide + modal');
    foreach ($tam as $act) {
    ?>
        <div class="card">
            <?php
            include "plantillas/galeria/galeria" . $act . ".php"
            ?>
            <div class="card-body">
                <h5 class="card-title"><?php echo $nom[($act - 1)] ?></h5>
                <button id="<?php echo $act ?>" class="btn btn-primary rounded-pill" onclick="elegirG(this.id)">Elegir</button>
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
            }
        })
    }
</script>