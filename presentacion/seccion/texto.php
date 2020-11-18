<div class="">
    <?php
    $tam = array(1, 2);
    $nom = array('Texto sencillo', 'Texto en tarjeta', 'Imagenes cirtulares');
    foreach ($tam as $act) {
    ?>
        <div class="card">
            <?php
            include "plantillas/Texto/texto" . $act . ".php"
            ?>
            <div class="card-body">
                <h5 class="card-title"><?php echo $nom[($act - 1)] ?></h5>
                <button id="<?php echo $act ?>" class="btn btn-primary rounded-pill" onclick="elegirT(this.id)">Elegir</button>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<script>
    function elegirT(tipo) {
        $.ajax({
            url: "presentacion/edicion/elegir.php?v=2&tipo=" + tipo,
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