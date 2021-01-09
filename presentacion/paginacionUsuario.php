<?php
$total = count(glob($_GET["idPag"].'/inicio/{*.php}', GLOB_BRACE));
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
                echo "<li class='page-item active'>";
            } else {
                echo "<li class='page-item'>";
            }
            if ($i == 0) {
                echo "<button id='" . $i . "' class='page-link' onclick='pagina(this.id)'>Menu</button></li>";
            } else {
                echo "<button id='" . $i . "' class='page-link' onclick='pagina(this.id)'>" . $i . "</button></li>";
            }
        }
        ?>
    </ul>
</nav>

<script>
    function pagina(id) {
        var f = "<?php echo "&id=".$_GET["id"]."&idPag=".$_GET["idPag"]; ?>";
        var url2 = "indexAjax.php?pid=<?php echo base64_encode("presentacion/paginacionUsuario.php") ?>&select=" + id + f;
        $("#paginacion").load(url2);
        $("#anterior").val($("#editando").val());
        $("#editando").val(id);
        $.ajax({
            url: "presentacion/edicionUsuario/editarArchivo.php?ed=Deselec&val=" + $("#anterior").val()+ f,
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
                url: "presentacion/edicionUsuario/editarArchivo.php?ed=Seleccionar&val=" + $("#editando").val() + f,
                type: "GET",
                processData: false,
                contentType: false,
                cache: false,
                error: function() {
                    console.log("No paso");
                }
            })
            $.ajax({
                url: "presentacion/edicionUsuario/editarArchivo.php?ed=Tipo&val=" + $("#editando").val() + f,
                type: "GET",
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {
                    var tipo = "indexAjax.php?pid=<?php echo base64_encode("presentacion/parteUsuario/TipoAjax.php") ?>&t=" + response + f;
                    $("#tipo").load(tipo);
                },
                error: function() {
                    console.log("No paso");
                }
            })
            var url = "indexAjax.php?pid=<?php echo base64_encode("presentacion/parteUsuario/editar.php") ?>&sec=" + id + f;
            $("#vista").load(url);
        }, 500);

    }
</script>