<div class="">
    <?php
    $tam = array(1, 2);
    $nom = array('Video sencillo', 'Video en tarjeta');
    foreach ($tam as $act) {
    ?>
        <div class="card">
            <?php
            include "plantillas/Video/video" . $act . ".php"
            ?>
            <div class="card-body">
                <h5 class="card-title"><?php echo $nom[($act - 1)] ?></h5>
                <button id="<?php echo $act ?>" class="btn btn-primary rounded-pill" onclick="elegirV(this.id)">Elegir</button>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<script>
    function elegirV(tipo) {
        var f = "<?php echo "&id=".$_GET["id"]."&idPag=".$_GET["idPag"]; ?>";
        $.ajax({
            url: "presentacion/edicionUsuario/elegir.php?v=3&tipo=" + tipo + f,
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