<div class="card" style="width: 40vmax;">
    <?php
    switch ($_GET["t"]) {
        case '0': {
                include "TipoInicio.php";
            }
            break;
        case '1': {
                include "TipoGaleria.php";
            }
            break;
        case '2': {
                include "TipoImgT.php";
            }
            break;
        case '3': {
                include "TipoTexto.php";
            }
            break;
        case '4': {
                include "TipoVideo.php";
            }
            break;
    }
    if (($_GET["t"]) != '0') {
    ?>
        <div class="row">
            <div class="col-4">
                <p class="letra">Nombre:</p>
            </div>
            <div class="col-8">
                <input id="Seccion" type="text" class="form-control i" onchange="nombre(this.value)">
            </div>
        </div>
    <?php
    }
    ?>

</div>
<script>
    function nombre(val) {
        var f = "<?php echo "&id=" . $_GET["id"] . "&idPag=" . $_GET["idPag"]; ?>";
        $.ajax({
            url: "presentacion/edicionUsuario/editarArchivo.php?val=" + val + "&ed=menuEdit" + "&sec=" + $("#editando").val()+f,
            type: "GET",
            processData: false,
            contentType: false,
            cache: false,
            error: function() {
                console.log("No se ha podido obtener la información");
            },
        })
        $(document).ready(function() {
            var url = "indexAjax.php?pid=<?php echo base64_encode("presentacion/parteUsuario/editar.php") ?>&sec=" + $("#editando").val() + f;
            $("#vista").load(url);
        })
    }
</script>