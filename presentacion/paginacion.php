<?php
$total = count(glob('pagina/inicio/{*.php}', GLOB_BRACE));
$seleccionado = 0;
if (isset($_GET["select"])) {
    $seleccionado = $_GET["select"];
}
?>
<nav class="borde" aria-label="...">
    <ul class="pagination">
        <?php
        for ($i = 0; $i < $total; $i++) {
            if ($seleccionado == $i) {
                echo "<li class='page-item letra active'>";
            } else {
                echo "<li class='page-item letra'>";
            }
            if ($i == 0) {
                echo "<button id='" . $i . "' class='page-link letra' onclick='pagina(this.id)'>Inicio</button></li>";
            } else {
                echo "<button id='" . $i . "' class='page-link letra' onclick='pagina(this.id)'>Seccion " . $i . "</button></li>";
            }
        }
        ?>
    </ul>
</nav>

<script>
    function pagina(id) {
        var url2 = "indexAjax.php?pid=<?php echo base64_encode("presentacion/paginacion.php") ?>&select=" + id;
        $("#paginacion").load(url2);
        $("#anterior").val($("#editando").val());
        $("#editando").val(id);
        $.ajax({
            url: "presentacion/edicion/editarArchivo.php?ed=Deselec&val=" + $("#anterior").val(),
            type: "GET",
            processData: false,
            contentType: false,
            cache: false,
            error: function() {
                console.log("No paso");
            }
        })
        setTimeout(function() {
            $.ajax({
                url: "presentacion/edicion/editarArchivo.php?ed=Seleccionar&val=" + $("#editando").val(),
                type: "GET",
                processData: false,
                contentType: false,
                cache: false,
                error: function() {
                    console.log("No paso");
                }
            })
            $.ajax({
                url: "presentacion/edicion/editarArchivo.php?ed=Tipo&val=" + $("#editando").val(),
                type: "GET",
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {
                    var tipo = "indexAjax.php?pid=<?php echo base64_encode("presentacion/partes/TipoAjax.php") ?>&t=" + response;
                    $("#tipo").load(tipo);
                },
                error: function() {
                    console.log("No paso");
                }
            })
            var url = "indexAjax.php?pid=<?php echo base64_encode("presentacion/partes/header.php") ?>&sec=" + id;
            $("#vista").load(url);
        }, 500);

    }
</script>