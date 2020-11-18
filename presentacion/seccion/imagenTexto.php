<div class="">
    <?php
    $tam = array(1, 2, 3, 4);
    $nom = array('Texto sobre imágen ', 'Texto debajo de la imágen', 'Texto a la derecha de la imágen',
    'Texto a la izquierda de la imágen');
    foreach ($tam as $act) {
    ?>
        <div class="card">
            <?php
            include "plantillas/ImagenTexto/imagenTexto" . $act . ".php"
            ?>
            <div class="card-body">
                <h5 class="card-title"><?php echo $nom[($act - 1)] ?></h5>
                <button id="<?php echo $act ?>" class="btn btn-primary rounded-pill" onclick="elegirGT(this.id)">Elegir</button>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<script>
    function elegirGT(tipo) {
        $.ajax({
            url: "presentacion/edicion/elegir.php?v=1&tipo=" + tipo,
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